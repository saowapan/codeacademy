<?php /* Template Name: Promotions Page  */ ?>
<?php while (have_posts()) : the_post(); ?>
<section class="container-fluid section-header-courses header-info">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 main-text">
			<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){ ?>
				<h1>Promotions</h1>
				<p>If you need help choosing the right course you can</p>
				<p>E mail : <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>
				<p>Call : <a href="tel:06-3082-6001">06-3082-6001</a></p>
				<p>Line ID : <a class="text-lowercase" href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p>
			<?php	}else{ ?>	
				<h1>โปรโมชั่น</h1>
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
			<div class="items-courses">	
				<?php get_template_part('widgets/items', 'promotion'); ?>
			</div>	
		</div>
	</div>
</section>	
<?php get_template_part('widgets/timeto', 'choose'); ?>	
<?php get_template_part('widgets/section', 'web-course'); ?>
<?php endwhile; ?>