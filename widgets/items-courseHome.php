<? 	
	$args = array(
		'post_type' 	  => 'course' ,
		'posts_per_page'  => 4,
		'post_status'     => 'publish',
		'tax_query' 	  => array(
			array(
				'taxonomy' => 'popular_types',
				'field'    => 'slug',
				'terms'    => 'popular',
			),
		),	
	);
	$loop = new WP_Query( $args );
	$count = $loop->post_count;
	if ($count == 1 ){
		echo '<div class="flex">';
	}elseif ($count < 4 ) {
		echo '<div class="flex block-sm">';
	}
	while ( $loop->have_posts() ) : $loop->the_post();
		$course_details = get_post_meta( get_the_ID(), 'course_details', true ); 	

		$course_img =  get_img_src_bypostid($post->ID, 'large');
		if(!$course_img){  
			$course_img = get_bloginfo('template_url') . '/assets/images/default-image-course.jpg'; // default set image 
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
			$course_term   = $course_taxo[array_rand($course_taxo,1)]->slug;
			$textcourse_term = ucwords(str_replace("-"," ",$course_term)); 
		}else{
			$course_term = 'all'; //default set 
			$textcourse_term = '';
		} ?>

		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-course">
			<a class="blog cate-<?=$course_term;?>" href="<?=get_permalink();?>">
				<div class="blog-header flex">
					<img class="img-responsive" src="<?=$course_img?>"/>
					<div class="absolute-top text-right">
						<h2><?=$textcourse_term;?></h2>
						<p class="pop">Popular</p>
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
	<?endwhile;
	if ($count < 4 ){
		echo '</div>';
	}?>	