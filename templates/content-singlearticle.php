<?php if (is_user_logged_in() ){ ?>
	<section class="container-fluid header-info section-header-pricing">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 main-text">
					<h1 class="text-uppercase"><?=the_title();?></h1>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid section-article">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 title-article">
					<h1 class="text-capitalize"><?//=the_title();?></h1>
				</div>
				<div class="col-xs-12 details-article">
					<?php echo apply_filters('the_content', $post->post_content); ?>
				</div>
				<div class="text-center col-xs-12 col-md-6 col-md-offset-3" style="margin-top: 60px;">
					<div class="flex">
						<a href="<?php echo home_url('/articles/'); ?>" class="text-center col-md-6 col-sm-4 col-xs-9 button-large">บทความทั้งหมด</a>
					</div>
				</div>
			</div>
		</div>	
	</section>
<?php }else{ ?> 
	<section class="container-fluid header-info">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 main-text">
					<h1 class="text-uppercase">ขออภัย บทความนี้ มีไว้สำหรับ</h1>
					<h1>ผู้ที่ลงทะเบียนเท่านั้น</h1>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part('widgets/timeto', 'choose'); ?>
<?php } ?>	
<?php get_template_part('widgets/section', 'web-course'); ?>