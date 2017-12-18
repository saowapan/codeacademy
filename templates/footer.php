<footer class="content-info">
    <?php //dynamic_sidebar('sidebar-footer'); ?>
	<div class="container footer-info">
		<div class="row">
			<div class="col-xs-12 col-md-6">
				<div class="row">
					<div class="col-sm-6 col-xs-12 menu-footer-item">
						<?php if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){?>
							<h4 class="text-uppercase">Guide courses</h4>
						<?php }else{?>
							<h4>แนะนำลำดับคอร์สเรียน</h4>
						<?php }  ?>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-item-1">
		                    <i class="fa-2x fa fa-angle-up aria-hidden=" true></i>
		               	</button>
						<ul id="footer-item-1" class="collapse navbar-collapse">
							<?
								$args = array(
									'post_type' => 'course',
									'posts_per_page' => 5 ,
									'order'           => 'ASC',
									'post_status'     => 'publish',
								);
								$loop = new WP_Query( $args );
								$n = 1;
								while ( $loop->have_posts() ) : $loop->the_post(); ?>

									<li><a href="<?=get_permalink();?>"><?=$n?> <?=get_the_title()?></a></li>
							<?	$n = $n+1;
								endwhile;	?>
						</ul>	
						</ul>
					</div>

					<?php if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){?>
					<div class="col-sm-6 col-xs-12 menu-footer-item">
						<h4 class="text-uppercase">About us</h4>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-item-2">
		                    <i class="fa-2x fa fa-angle-up" aria-hidden="true"></i>
		               	</button>
		               	<div id="footer-item-2" class="collapse navbar-collapse">
							<p>Teaching website in Songkhla province. By a team of experienced website more than 10 years. No need to have a basic knowledge in the website, also can learn.</p>
							<p>Our company website design quality, affordable. Along with the knowledge of marketing and customization SEO.</p>
						</div>	
					</div>
					<?php }else{?>
					<div class="col-sm-6 col-xs-12 menu-footer-item">
						<h4>เกี่ยวกับเรา</h4>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-item-2">
		                    <i class="fa-2x fa fa-angle-up" aria-hidden="true"></i>
		               	</button>
		               	<div id="footer-item-2" class="collapse navbar-collapse">
							<p>สอนทำเว็บไซต์ในจังหวัดสงขลา โดยทีมงานที่มีประสบการณ์ทำเว็บไซต์มากกว่า 10 ปี ไม่จำเป็นต้องมีความรู้พื้นฐานในการทำเว็บไซต์ ก็สามารถลงเรียนได้</p>
							<p>บริษัทเรารับทำเว็บไซต์คุณภาพราคาประหยัด พร้อมกับให้ความรู้เรื่องการตลาดออนไลน์ และการปรับแต่ง SEO </p>
						</div>	
					</div>
					<?php }  ?>

				</div>	
			</div>
			<div class="col-xs-12 col-md-6">
				<div class="row">
					<div class="col-sm-6 col-xs-12 menu-footer-item">
						<?php if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){?>
							<h4 class="text-uppercase">Recent Promotion</h4>
						<?php }else{?>
							<h4>โปรโมชั่นล่าสุด</h4>
						<?php }  ?>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-item-3">
		                    <i class="fa-2x fa fa-angle-up" aria-hidden="true"></i>
		               	</button>
		            	<ul id="footer-item-3" class="collapse navbar-collapse">
							<?
								$args = array(
									'post_type' => 'promotion',
									'posts_per_page' => 5 ,
									'order'           => 'ASC',
									'post_status'     => 'publish',
								);
								$loop = new WP_Query( $args );
								$n = 1;
								while ( $loop->have_posts() ) : $loop->the_post(); ?>

									<li><a href="<?=get_permalink();?>"><?=$n?> <?=get_the_title()?></a></li>
							<?	$n = $n+1;
								endwhile;	?>
						</ul>	
					</div>
					<?php if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){?>
					<div class="col-sm-6 col-xs-12 menu-footer-item">
						<h4 class="text-uppercase">Contact Us</h4>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-item-4">
		                    <i class="fa-2x fa fa-angle-up" aria-hidden="true"></i>
		               	</button>
		               	<div id="footer-item-4" class="collapse navbar-collapse">
							<p>House No. 99/14 Soi Thawon Pawong Sub-district Mueang Songkhla District Songkhla Province 90100 <a href="<?php echo home_url('/contact/'); ?>">find us.</a></p>
							<p>Call: <a href="tel:06-3082-6001">06-3082-6001</a> 9am - 6pm</p>
							<p>Line ID : <a href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p>
							<p>Email: <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>
						</div>	
					</div>
					<?php }else{?>	
					<div class="col-sm-6 col-xs-12 menu-footer-item">
						<h4>ติดต่อเรา</h4>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-item-4">
		                    <i class="fa-2x fa fa-angle-up" aria-hidden="true"></i>
		               	</button>
		               	<div id="footer-item-4" class="collapse navbar-collapse">
							<p>99/14 ซอย ถาวร ตำบลพะวง อำเภอเมืองสงขลา จังหวัดสงขลา รหัสไปรษณีย์ 90100 <a href="<?php echo home_url('/contact/'); ?>">ติดต่อ</a></p>
							<p>โทร: <a href="tel:06-3082-6001">06-3082-6001</a> 09.00 - 18.00</p>
							<p>Line ID : <a href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p>
							<p>Email: <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>
						</div>	
					</div>
					<?php }  ?>

				</div>	
			</div>
		</div>
	</div>
	<div class="container footer-social">
		<div class="row">
			<div class="social-content flex">
				<div class="social-icon">
					<a class="flex facebook" target="_blank" href="https://www.facebook.com/CodeAcademyAsia/"><i class="fa-2x fa fa-facebook-square" aria-hidden="true"></i></a>
				</div>
				<div class="social-icon">
					<a class="flex twitter" href="#"><i class="fa-2x fa fa-twitter-square" aria-hidden="true"></i></a>
				</div>
				<div class="social-icon">
					<a class="flex google" href="#"><i class="fa-2x fa fa-google-plus-square" aria-hidden="true"></i></a>
				</div>
				<div class="social-icon">
					<a class="flex linkedin" href="#"><i class="fa-2x fa fa-linkedin-square" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-12 copyright">
				<p>&#169; Copyright 2016 - Code Academy</p>
			</div>
		</div>
	</div>
</footer>