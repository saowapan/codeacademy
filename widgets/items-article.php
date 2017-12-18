<?
	$args = array(
		'post_type' 	  => 'article',
		'posts_per_page'  => -1,
		'post_status'     => 'publish',
		'order'           => 'ASC',
	);

	$loop = new WP_Query( $args );

	$count = $loop->post_count;
	if ($count == 1 ){
		echo '<div class="flex">';
	}elseif ($count < 4 ) {
		echo '<div class="flex block-sm">';
	}

	while ( $loop->have_posts() ) : $loop->the_post();
		$article_img =  get_img_src_bypostid($post->ID, 'large');
		if(!$article_img) {
			$article_img = get_bloginfo('template_url') . '/assets/images/default-image-article.jpg'; 
		}
		$article_title = get_the_title();
	?>				
		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 item-course">
			<a class="blog cate-wordpress" href="<?=get_permalink();?>">
				<div class="blog-header flex">
					<img class="img-responsive" src="<?=$article_img?>">
					<div class="absolute-top text-right">
						<h2>Article</h2>
					</div>
				</div>
				<div class="blog-body">
					<span class="title"><?=$article_title?></span>
					<div class="absolute-bottom">
						<p class="date"><?php echo the_time('d M y');?></p>
					</div>
				</div>
			</a>
		</div>	
	<?php endwhile;
	if ($count < 4 ){
		echo '</div>';
	}
?>