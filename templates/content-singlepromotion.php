<section class="container-fluid header-info">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 main-text details-course">
				<h1 class="text-capitalize"><?=the_title();?></h1>
			</div>
		</div>
	</div>
</section>
<?php 
	if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
        $start = 'Promotion Start : ';
		$end   = 'Promotion End : ';
		$submit_value = 'register course';
		$pricing = 'Pricing';
    }else{
		$start = 'โปรโมชั่นเริ่มวันที่ : ';
		$end   = 'โปรโมชั่นสิ้นสุดวันที่ : ';
		$submit_value = 'ลงทะเบียนเรียน';
		$pricing = 'ราคาคอร์ส';
    } 
?>
<section class="container-fluid section-course">
	<div class="container">
		<div class="row">
			<? $promotion_details = get_post_meta( get_the_ID(), 'promotion_details', true );  ?>
			<div class="col-xs-12">
				<div class="row">
					<div class="col-md-8 col-sm-7 col-xs-12 ">
						<div class="row">
						<?php if (has_post_thumbnail( $post->ID ) ) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
							echo '<img class="col-md-offset-2 col-md-8 col-xs-12 img-responsive" src="'.$image[0].'" />';
						}else {
							echo '<img class="col-md-offset-2 col-md-8 col-xs-12 img-responsive" src="'.get_bloginfo('template_url') . '/assets/images/default-image-course.jpg'.'"/>';
						} ?>
						</div>
					</div>
					<aside class="col-md-4 col-sm-5 col-xs-12">
						<div class="right-affix" data-spy="affix" data-offset-top="400">
							<? if($promotion_details['pricing']) {?>
									<h2>฿ <?=$promotion_details['pricing']?></h2>
								<? }else{?>
									<h2><?=$pricing?> : <a href="<?php echo home_url(); ?>">Contact Us</a></h2> <?
							}?>
							<?  $post_id = $post->ID;
								$page_url = home_url('/book-register/?pid='.$post_id.'');
							?>
							<form action="<?php echo $page_url; ?>"  method="post" >
								<input type="hidden" name='title' value="<?=the_title();?>"/>
								<input type='submit' name='submit' value="<?=$submit_value?>" class="text-center col-lg-9 col-xs-12 button-large text-uppercase">
							</form> 
							<table class="table">
								<tr>
								<? if($promotion_details['date_start']) {
									echo '<td><strong>'.$start.'</strong></td>';	
									echo '<td class="text-right">'.$promotion_details['date_start'].'</td>';
								}?>
								</tr>

								<tr>
								<? if($promotion_details['date_end']) {
									echo '<td><strong>'.$end.'</strong></td>';	
									echo '<td class="text-right">'.$promotion_details['date_end'].'</td>';
								}?>
								</tr>
							</table>
						</div>
					</aside>
				</div>	
			</div>	
		</div>
	</div>	
</section>
<section class="container-fluid single-details">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-7 col-xs-12">
				<?php echo apply_filters('the_content', $post->post_content);  ?>
			</div>	
		</div>
	</div>
</section>
<?php get_template_part('widgets/timeto', 'choose'); ?>
<?php get_template_part('widgets/section', 'web-course'); ?>