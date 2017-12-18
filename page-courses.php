<?php /* Template Name: Courses Page */ ?>
<?php while (have_posts()) : the_post(); ?>
<section class="container-fluid section-header-courses header-info">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 main-text">
			<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){ ?>
				<h1>COURSES</h1>
				<p>If you need help choosing the right course you can</p>
				<p>E mail : <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>
				<p>Call : <a href="tel:06-3082-6001">06-3082-6001</a></p>
				<p>Line ID : <a class="text-lowercase" href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p>
			<?php	}else{ ?>	
				<h1>คอร์สทั้งหมด</h1>
				<p>หากต้องการความช่วยเหลือในการเลือกคอร์สที่เหมาะสมกับคุณ สามารถติดสอบถามรายละเอียดได้ที่</p>
				<p>E mail : <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>
				<p>โทรศัพท์ : <a href="tel:06-3082-6001">06-3082-6001</a></p>
				<p>Line ID : <a class="text-lowercase" href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p>
			<?php } ?>	
			</div>
		</div>
	</div>
</section>
<section class="container-fluid section-detail-about">
	<div class="container">
		<div class="col-xs-12 text-center">
			<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
				echo '<h2>" Have fun together !! "</h2>';
				echo '<p>" The course teaches no age limits. Whether kids or adults can learn. "</p>';
			}else{
				echo '<h2>" มาสนุกด้วยกัน !! "</h2>';
				echo '<p>" คอร์สที่สอนไม่มีการจำกัดอายุ ไม่ว่าจะเป็นเด็กหรือผู้ใหญ่ ก็สามารถเรียนได้ "</p>';
			} ?>
		</div>
	</div>
</section>
<section id="courses" class="container-fluid section-courses">
	<div class="container">
		<div class="row">
			<h2 class="text-center text-title">CODE ACADEMY SONGKHLA</h2>
			<?php get_template_part('widgets/header', 'course'); // TABS ?>
			<div class="tab-content loadajax">
				<div id="loadPage" class="row text-center">
					<img style="margin: 30px;" src="<?=get_bloginfo('template_url').'/assets/images/ring-alt.svg'?>">
				</div>
				<div class="items-courses">	

				</div>
				<div id="courses-moreBtn">
					
				</div>
			</div>	
		</div>
	</div>
</section>
<section class="professional">
	<div class="container-fluid ">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-7 col-md-offset-5 col-sm-10">
					<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
						echo '<h2 class="text-title">You will learn techniques to do professional</h2>';
						echo '<p>E mail : <a style="color: #fff;" class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>';
						echo '<p>Call : <a style="color: #fff;" href="tel:06-3082-6001">06-3082-6001</a></p>';
					}else{
						echo '<h2 class="text-title">คุณจะได้เรียนรู้เทคนิคในการทำเว็บไซต์</h2>';
						echo '<p>สอนโดยทีมงานที่มีประสบการณ์ในการทำเว็บไซต์มากกว่า 10 ปี</p>';
						echo '<p>E mail : <a style="color: #fff;" class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>';
						echo '<p>โทรศัพท์ : <a style="color: #fff;" href="tel:06-3082-6001">06-3082-6001</a></p>';
					} ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('widgets/section', 'web-course'); ?>
<?php endwhile; ?>
