<section class="container-fluid section-webcourse">
	<div class="container webcourse">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="row">
					<div class="col-sm-6 col-xs-12  webcourse-item">
						<h4 class="text-uppercase">basic</h4>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#webcourse1">
							<i class="fa-2x fa fa-angle-up aria-hidden="true"></i>
						</button>
						<div id="webcourse1" class="collapse navbar-collapse">
							<ul>
								<?
								$args = array(
									'post_type' => 'course',
									'posts_per_page' => -1 ,
									'order'           => 'ASC',
									'post_status'     => 'publish',
									'tax_query' => array(
										array(
											'taxonomy' => 'course_types',
											'field'    => 'slug',
											'terms'    => 'basic',
										),
									),
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); 
									$tilte = get_the_title();
								?>
								<li><a href="<?=get_permalink();?>"><?=$tilte?></a></li>
								<?endwhile; ?>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-xs-12  webcourse-item">
						<h4 class="text-uppercase">WordPress</h4>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#webcourse4">
							<i class="fa-2x fa fa-angle-up aria-hidden="true"></i>
						</button>
						<div id="webcourse4" class="collapse navbar-collapse">
							<ul>
								<?
								$args = array(
									'post_type' => 'course', 
									'posts_per_page' => -1 ,
									'order'           => 'ASC',
									'post_status'     => 'publish',
									'tax_query' => array(
										array(
											'taxonomy' => 'course_types',
											'field'    => 'slug',
											'terms'    => 'wordpress',
										),
									),
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); 
									$tilte = get_the_title();
								?>
								<li><a href="<?=get_permalink();?>"><?=$tilte?></a></li>
								<?endwhile; ?>
							</ul>
						</div>
					</div>		
				</div>
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="row">		
					<div class="col-sm-6 col-xs-12  webcourse-item">
						<h4 class="text-uppercase">web design</h4>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#webcourse3">
							<i class="fa-2x fa fa-angle-up aria-hidden="true"></i>
						</button>
						<div id="webcourse3" class="collapse navbar-collapse">
							<ul>
								<?
								$args = array(
									'post_type' => 'course',  
									'posts_per_page' => -1 ,
									'order'           => 'ASC',
									'post_status'     => 'publish',
									'tax_query' => array(
										array(
											'taxonomy' => 'course_types',
											'field'    => 'slug',
											'terms'    => 'web-design',
										),
									),
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); 
									$tilte = get_the_title();
								?>
								<li><a href="<?=get_permalink();?>"><?=$tilte?></a></li>
								<?endwhile; ?>
							</ul>
						</div>	
					</div>
					<div class="col-sm-6 col-xs-12  webcourse-item">
						<h4 class="text-uppercase">web development</h4>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#webcourse2">
							<i class="fa-2x fa fa-angle-up aria-hidden="true"></i>
						</button>
						<div id="webcourse2" class="collapse navbar-collapse">
							<ul>
								<?
								$args = array(
									'post_type' => 'course',  
									'posts_per_page' => -1 ,
									'order'           => 'ASC',
									'post_status'     => 'publish',
									'tax_query' => array(
										array(
											'taxonomy' => 'course_types',
											'field'    => 'slug',
											'terms'    => 'web-development',
										),
									),
								);
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); 
									$tilte = get_the_title();
								?>
								<li><a href="<?=get_permalink();?>"><?=$tilte?></a></li>
								<?endwhile; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>		
		</div>	
	</div>
</section>