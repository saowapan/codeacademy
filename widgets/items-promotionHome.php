<? 
	$args = array(
		'post_type' => 'promotion',
		'posts_per_page' => 4,
		'tax_query' => array(
			array(
				'taxonomy' => 'popular_types',
				'field'    => 'slug',
				'terms'    => 'popular',
			),
		),
	);
	$loop = new WP_Query( $args );

	$current_month = date('m'); 
	$current_day   = date('d');
	$current_year  = date('Y');

	$count = $loop->post_count;
	if ($count == 1 ){
		echo '<div class="flex">';
	}elseif ($count < 4 ) {
		echo '<div class="flex block-sm">';
	}

	while ( $loop->have_posts() ) : $loop->the_post(); 
		$promotion_details = get_post_meta( get_the_ID(), 'promotion_details', true );// meta box

		$promotion_date_start = $promotion_details['date_start']; 
		$start_month = substr($promotion_date_start, 0, 2);
		$start_day   = substr($promotion_date_start, 3, 2);
		$start_year  = substr($promotion_date_start, 6, 4);

		$promotion_date_end = $promotion_details['date_end']; 
		$end_month   = substr($promotion_date_end, 0, 2);
		$end_day     = substr($promotion_date_end, 3, 2);
		$end_year    = substr($promotion_date_end, 6, 4);
		
		if( ($current_year >= $start_year ) && ( $current_year <= $end_year) ){
			if( ($current_month >= $start_month) && ($current_month <= $end_month) ){
				if($current_day  <= $end_day){
					$promotion_img =  get_img_src_bypostid($post->ID, 'large');
					if(!$promotion_img){  
						$promotion_img = get_bloginfo('template_url') . '/assets/images/default-image-course.jpg'; // default set image 
					}

					$promotion_title = get_the_title();
					if(strlen($promotion_title) > 100) {
						$promotion_title = iconv_substr($promotion_title, 0, 100,"UTF-8"). '...'; 
					} 

					$popular = wp_get_object_terms( $post->ID, 'popular_types', array('fields'=>'slugs'));
					if(!empty($popular)){
						$popular = 'Popular';
					}else{
						$popular = '';
					}

					$promotion_pricing 		= $promotion_details['pricing']; 
					if(!empty($promotion_pricing)){
						$promotion_pricing = '<h2>฿ '.$promotion_pricing.'</h2>';
					}else{
						$promotion_pricing = '';
					}

					$promotion_content = get_the_content();
					if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
						$start = 'Promotion Start : ';
						$end   = 'Promotion End : ';
						if(strlen($promotion_content) > 180) {
							$promotion_content = substr($promotion_content, 0, 180). '...'; 
						}
					}else{
						$start = 'โปรโมชั่นเริ่มวันที่ : ';
						$end   = 'โปรโมชั่นสิ้นสุดวันที่ : ';
						if(strlen($promotion_content) > 150) {
							$promotion_content = iconv_substr($promotion_content, 0, 150,"UTF-8"). '...'; 
						}
					}
					?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-course">
							<a class="blog cate-wordpress" href="<?=get_permalink();?>">
								<div class="blog-header flex">
									<img class="img-responsive" src="<?=$promotion_img?>">
									<div class="absolute-top text-right">
										<?=$promotion_pricing?>
										<p class="pop"><?=$popular;?></p>
									</div>
								</div>
								<div class="blog-body">
									<span class="title"><?=$promotion_title?></span> 
									<p><span class="contents"><?=$promotion_content;?></span></p>
									<div class="absolute-bottom">
										<p class="date"><?=$end?><?=$end_day;?>/<?=$end_month;?>/<?=$end_year;?></p>
									</div>
								</div>
							</a>	
						</div>
					<?
				} // end if current_day		
			}// end if current_month
		}// end if current_year
	endwhile;
	if ($count < 4 ){
		echo '</div>';
	}
?>