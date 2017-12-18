<?php /* Template Name: Contact Page */ ?>
<?php while (have_posts()) : the_post(); ?>
<section class="container-fluid section-header-contact header-info">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 main-text">
			<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){ ?>
				<h1>CONTACT & DIRECTIONS</h1>
				<p>Feel free to talk to our online representative at any time</p>
				<p>TEL <a href="tel:06-3082-6001">06-3082-6001</a></p>
				<p>Line ID : <a class="text-lowercase" href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p>
				<p>E-mail: <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>
			<?php	}else{ ?>
				<h1>ติดต่อ & เส้นทาง</h1>
				<p>พูดคุยกับทีมงานของเราได้ตลอดเวลาที่คุณต้องการ</p>
				<p>โทรศัพท์ <a href="tel:06-3082-6001">06-3082-6001</a></p>
				<p>Line ID : <a class="text-lowercase" href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p>
				<p>E-mail: <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>
			<?php } ?>	
			</div>
		</div>
	</div>
</section>
<section class="container-fluid section-address">
	<div class="container">
		<div class="row">
			<div class="col-lg-offset-5 col-lg-7 col-xs-12">
				<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
					echo '<h2 class="text-title">HOW TO FIND US</h2>';
				}else{
				 	echo '<h2 class="text-title">ค้นหาที่อยู่บริษัท</h2>';
				} ?>
			</div>					
			<div class="col-xs-12 address">
				<div class="row">
					<div class="col-xs-12 col-lg-5 address-details">
						<ul>
							<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
								echo '<li><p>Our Address : House No. 99/14 Soi Thawon Pawong Sub-district Mueang Songkhla District Songkhla Province 90100</p></li>';
								echo '<li><p>TEL : <a href="tel:06-3082-6001">06-3082-6001</a></p></li>';
							}else{
								echo '<li><p>ที่อยู : 99/14 ซอย ถาวร ตำบลพะวง อำเภอเมืองสงขลา จังหวัดสงขลา รหัสไปรษณีย์ 90100 </p></li>';
								echo '<li><p>โทรศัพท์ : <a href="tel:06-3082-6001">06-3082-6001</a></p></li>';
							} 
							echo '<li><p>Line ID : <a class="text-lowercase" href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p></li>';
							?>
							<li><p>E-mail : <a class="break-word text-lowercase" href="mailto:new@saowapan.com">new@saowapan.com</a></p></li>
						</ul>
					</div>
					<div class="col-xs-12 col-lg-7 address-map">
						<?php get_template_part('/widgets/section', 'map'); ?>	
				    </div>    
				</div>
			</div>	
		</div>
	</div>
</section>
<?/*
<section class="container-fluid section-contact" style="display: none;">
	<div class="container">
		<div class="row">
			<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
					echo '<h2 class="text-center text-title">GET IN TOUCH</h2>';
			}else{
				 	echo '<h2 class="text-center text-title">ติดต่อเรา</h2>';
			} ?>
			<div class="col-xs-12 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
				<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
					<?php get_template_part('widgets/section', 'form'); ?> 		
					<div class="form-group flex">
						<input type="hidden" name="cate" value="Contact">
						<input type="hidden" name="action" value="book_register">
						<input type='submit' name='submit' value="send" class="col-lg-3 col-md-4 col-sm-5 col-xs-9 button-large text-uppercase">
					</div>
				</form> 
			</div>
		</div>
	</div>
</section>
<section class="container-fluid section-directions">
	<div class="container">
		<div class="row"> 
			<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
					echo '<h2 class="text-title text-center">EASY TO FOLLOW DIRECTIONS</h2>';
			}else{
				 	echo '<h2 class="text-title text-center">เส้นทางไปออฟฟิต</h2>';
			} ?>
			<div class="col-lg-6 col-xs-12">
				<div class="row">
					<div class="col-sm-6 col-xs-12 directions-item">
						<img class="img-responsive" src="<? build_url('/assets/images/address.jpg');?>">
						<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
								echo '<p class="text-center">Drive from Hat Yai ,Driving through Koh Yor Intersection about 300 meters. Met. Soi Thawon.</p>';
						}else{
							 	echo '<p class="text-center">มาจากหาดใหญ่ ผ่านห้าแยกเกาะยอ ประมาณ 300 เมตรจะเจอปากทางเข้า ซอยถาวร</p>';
						} ?>
					</div>
					<div class="col-sm-6 col-xs-12 directions-item">
						<img class="img-responsive" src="<? build_url('/assets/images/address2.jpg');?>">
						<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
								echo '<p class="text-center">Drove into the Soi Thawon, Met. Tanavadee Resort drive straight ahead to meet the forced to turn left.</p>';
						}else{
							 	echo '<p class="text-center">เมื่อไปในซอย จะผ่าน ธนาวดีรีสอร์ท ตรงไปอีกจะเจอทางบังคับให้เลี้ยวซ้าย</p>';
						} ?>
					</div>
				</div>	
			</div>		
			<div class="col-lg-6 col-xs-12">
				<div class="row">
					<div class="col-sm-6 col-xs-12 directions-item">
						<img class="img-responsive" src="<? build_url('/assets/images/address.jpg');?>">
						<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
								echo '<p class="text-center">When turn left, find the intersections drive straight. See the house townhouse colored o rose</p>';
						}else{
							 	echo '<p class="text-center">เมื่อเลี้ยวซ้ายแล้วจะเจอทางแยก ให้ขับตรงไป จนเห็นบ้านทาวเฮ้าส์หลังสีส้มโอโรสอ่อน</p>';
						} ?>
					</div>
					<div class="col-sm-6 col-xs-12 directions-item">
						<img class="img-responsive" src="<? build_url('/assets/images/address.jpg');?>">
						<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
								echo '<p class="text-center">Turn right at that house townhouse drive straight almost the end of the SOI ,Met. office</p>';
						}else{
							 	echo '<p class="text-center">เลี้ยวขวาตรงบ้านทาวเฮ้าส์หลังสีส้มโอโรส ขับตรงไปเกือบสุดซอยจะเจอออฟฟิต</p>';
						} ?>
					</div>
				</div>	
			</div>
		</div>
	</div>
</section>
*/?>
<?php get_template_part('widgets/timeto', 'choose'); ?>
<?php get_template_part('widgets/section', 'web-course'); ?>
<?php endwhile; ?>