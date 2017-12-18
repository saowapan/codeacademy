<?php /* Template Name: Articles Page */ ?>
<?php while (have_posts()) : the_post(); ?>
<section class="container-fluid header-info section-header-pricing">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 main-text">
				<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){ ?>
					<h1 class="text-uppercase">Article</h1>
					<p>Share ideas, tips</p> 
				<?php	}else{ ?>
					<h1 class="text-uppercase">บทความ</h1>
					<p>แบ่งปันความคิดและเคล็ดลับ</p> 
				<?php } ?>	
			</div>
		</div>
	</div>
</section>
<section class="container-fluid section-article">
	<div class="container">
		<div class="row">
			<h2 class="text-center text-title">CODE ACADEMY SONGKHLA</h2>
			<div class="items-courses">
				<?php get_template_part('widgets/items', 'article'); ?>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('widgets/section', 'web-course'); ?>
<?php endwhile; ?>