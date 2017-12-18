<?php 
//Enqueue Ajax Scripts
function enqueue_courses_ajax_scripts() {
    wp_register_script( 'courses-ajax-js', get_bloginfo('template_url') . '/assets/scripts/courses_ajax.js', array( 'jquery' ), '', true );
    wp_localize_script( 'courses-ajax-js', 'ajax_courses_params', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
	wp_enqueue_script( 'courses-ajax-js' );
}
add_action('wp_enqueue_scripts', 'enqueue_courses_ajax_scripts');

//Add Ajax Actions : County Post Show
add_action('wp_ajax_courses_show', 'ajax_courses_show');
add_action('wp_ajax_nopriv_courses_show', 'ajax_courses_show');
function ajax_courses_show()
{
	display_courses();
}
//Add Ajax Actions : More County Post Show
add_action('wp_ajax_more_courses', 'ajax_more_courses');
add_action('wp_ajax_nopriv_more_courses', 'ajax_more_courses');
function ajax_more_courses()
{
	display_courses();
}

//Add Ajax Actions : More County Post Show
add_action('wp_ajax_display_btn', 'ajax_display_btn');
add_action('wp_ajax_nopriv_display_btn', 'ajax_display_btn');
function ajax_display_btn()
{
	display_btnMore();
}

function display_courses(){
	$query_data = $_POST;
	$courses_term = (isset($query_data['courses_cate']) ) ? $query_data['courses_cate'] : '';
	$ppp = (isset($query_data["ppp"])) ? $query_data["ppp"] : 4;
    $page = (isset($query_data['pageNumber'])) ? $query_data['pageNumber'] : 0;

    header("Content-Type: text/html");
    wp_reset_query(); 
    if ($courses_term != 'all') {
    	$args = array(
			'post_type' => 'course',  
			'posts_per_page'  => $ppp, 
			'paged' 		  => $page, 
			'order'           => 'ASC',
			'post_status'     => 'publish',
			'tax_query' => array(
				array(
					'taxonomy' => 'course_types',
					'field'    => 'slug',
					'terms'    => $courses_term,
				),
			),
		);
    }else{
    	$args = array(
			'post_type' 		=> 'course',  
			'posts_per_page'  => $ppp, 
			'paged' 		  => $page, 
			'order'           => 'ASC',
			'post_status'     => 'publish',
		);
    }

    $loop = new WP_Query( $args );
	$count = $loop->post_count;

	if ($count == 1 && $page == 0 ){
		echo '<div class="col-xs-12 flex" style="padding:0;">';
	}elseif ($count < 4 && $page == 0  ) {
		echo '<div class="col-xs-12 flex block-sm" style="padding:0;">';
	}

		if( $loop->have_posts() ):
			while( $loop->have_posts() ): $loop->the_post(); 
				$course_details = get_post_meta( get_the_ID(), 'course_details', true );
				 	
				$course_img =  get_img_src_bypostid($post->ID, 'large');
				if(!$course_img){  
					$course_img = get_bloginfo('template_url') . '/assets/images/default-image-course.jpg'; 
				}

				$course_title = get_the_title();
				if(strlen($course_title) > 100) {
					$course_title = iconv_substr($course_title, 0, 100,"UTF-8"). '...'; 
				} 

				$course_content = get_the_content();

				$pricing 	= $course_details['pricing']; 

				if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){

					if(strlen($course_content) > 180) {
						$course_content = substr($course_content, 0, 180). '...'; 
					}

					if(!empty($pricing)) {	
						$show_pricing = $show_pricing = 'Pricing : '.$pricing.' ฿';
					}else{
						$show_pricing = '';
					}

				}else{

					if(strlen($course_content) > 150) {
						$course_content = iconv_substr($course_content, 0, 150,"UTF-8"). '...'; 
					}   

					if(!empty($pricing)) {	
						$show_pricing = $show_pricing = 'ราคา : '.$pricing.' ฿';
					}else{
						$show_pricing = '';
					}
				} 
					
				$course_taxo = get_the_terms(get_the_ID(),'course_types');
				if(isset($course_taxo[0]->slug)) { 
					if ($courses_term == 'all') {
						$course_term = $course_taxo[array_rand($course_taxo,1)]->slug;
					}else{
						$course_term = $courses_term;
					}
					$textcourse_term = str_replace("-"," ",$course_term); 
				}else{
					$course_term     = 'all'; //default set 
					$textcourse_term = '';
				}

				$popular = wp_get_object_terms( $post->ID, 'popular_types', array('fields'=>'slugs'));
				if(!empty($popular)){
					$popular = 'Popular';
				}else{
					$popular = '';
				}
			?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-course">
					<a class="blog cate-<?=$course_term;?>" href="<?=get_permalink();?>">
						<div class="blog-header flex">
							<img class="img-responsive" src="<?=$course_img?>">
							<div class="absolute-top text-right">
								<h2><?=$textcourse_term;?></h2>
								<p class="pop"><?=$popular;?></p>
							</div>
						</div>
						<div class="blog-body">
							<span class="title"><?=$course_title?></span> 
							<p><span class="contents"><?=$course_content;?></span></p>
							<div class="absolute-bottom">
								<p class="date"><?=$show_pricing;?></p>
							</div>
						</div>
					</a>	
				</div>		
			<?php endwhile; ?>
		<?php else: ?>
			<div id="no_more_courses" class="col-xs-12" style="text-align: center;margin-top: 30px;">Sorry, we don't have anymore course</div>
		<?php endif;
	if ($count < 4  && $page == 0){
		echo '</div>';
	}	
	die();
}

function display_btnMore(){
	$query_data = $_POST;
	$courses_term = (isset($query_data['courses_cate']) ) ? $query_data['courses_cate'] : '';
	header("Content-Type: text/html");

	wp_reset_query();

	 if ($courses_term != 'all') {
    	$args = array(
			'post_type'       => 'course',  
			'posts_per_page'  => -1,
			'post_status'     	=> 'publish',  
			'tax_query'       => array(
				array(
					'taxonomy' => 'course_types',
					'field'    => 'slug',
					'terms'    => $courses_term,
				),
			),
		);
    }else{
    	$args = array(
			'post_type' 		=> 'course',  
			'posts_per_page'    => -1, 
			'post_status'     	=> 'publish', 
		);
    }
    $loop = new WP_Query($args);
	$count 	= $loop->post_count;
	if ($count > 4 ){ ?>
		<div id="more_courses"  class="col-xs-12 text-center flex">
			<a onClick="more_courses('<?=$courses_term?>');" class="col-lg-3 col-md-4 col-sm-5 col-xs-9 button-large">see more course</a>
		</div>
	<?php } 	
	die();
}
?>