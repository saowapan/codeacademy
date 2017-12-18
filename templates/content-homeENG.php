<?php echo apply_filters('the_content', $post->post_content);  ?>
<section class="container-fluid section-courses-home">
	<div class="container">
		<div class="row">
			<h2 class="text-title text-center">POPULAR COURSES</h2>
			<div class="items-courses">	
				<?php get_template_part('widgets/items', 'courseHome'); ?>
			</div>
			<div class="col-xs-12 text-center flex">
				<a href="<?php echo home_url('/courses/'); ?>" class="col-lg-3 col-md-4 col-sm-5 col-xs-9 button-large">VIEW MOER COURSES</a>
			</div>	
		</div>
	</div>
</section>
<section class="container-fluid section-courses">
	<div class="container">
		<div class="row">
			<h1 class="text-title text-center">POPULAR PROMOTION</h1>
			<div class="items-courses">	
				<?php get_template_part('widgets/items', 'promotionHome'); ?>
			</div>
			<div class="col-xs-12 text-center flex">
				<a href="<?php echo home_url('/promotions/'); ?>" class="col-lg-3 col-md-4 col-sm-5 col-xs-9 button-large">VIEW MOER PROMOTION</a>
			</div>	
		</div>
	</div>
</section>
<section class="container-fluid section-trainers">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 text-center detail-trainers">
				<h2 class="text-title text-uppercase">The impression of the customer after studying the course</h2>
				<p>We believe that everyone has their own learning approach in the form So we should adjust teaching to suit you.</p>
				<P>You will be both educational and fun of us !!!</p>
			</div>
		</div>
		<div class="row trainer">
			<div class="col-md-6 col-xs-12">
				<div class="row">
					<div class="col-sm-6 col-xs-12 item-trainer">
						<div class="trainer-header">
							<p>I was the one who have basic knowledge of web programming. But now I can understand the language and HTML CSS within 3 courses only. If I can do it, you can do it!</p>
						</div>
						<div class="trainer-footer text-center">
							<img src="<? build_url('/assets/images/review.jpg');?>">
						</div>
					</div>
					<div class="col-sm-6 col-xs-12 item-trainer">
						<div class="trainer-header">
							<p>The teachers here are experienced and excellent teaching styles they can adjust instruction to suit the needs of students in all major formats, there are course outline for foreigners too. It makes learning more fun.</p>
						</div>
						<div class="trainer-footer text-center">
							<img src="<? build_url('/assets/images/review-2.jpg');?>">
						</div>
					</div>
				</div>	
			</div>
			<div class="col-md-6 col-xs-12">
				<div class="row">	
					<div class="col-sm-6 col-xs-12 item-trainer">
						<div class="trainer-header">
							<p>The study here will help you save more education by yourself. They can answer the questions that you don"t know. Consultation and to you.</p>
						</div>
						<div class="trainer-footer text-center">
							<img src="<? build_url('/assets/images/review-3.jpg');?>">
						</div>
					</div>
					<div class="col-sm-6 col-xs-12 item-trainer">
						<div class="trainer-header">
							<p>I learn many techniques from here. They taught me to understand the structure of the web. And to understand the logic function of each part. So here. It is a new perspective to understand the process on my website.</p>
						</div>
						<div class="trainer-footer text-center">
							<img src="<? build_url('/assets/images/review-4.jpg');?>">
						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>
</section>
<?php get_template_part('widgets/section', 'web-course'); ?>
