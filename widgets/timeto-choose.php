<section class="container-fluid section-bottompricing">
	<div class="container">
		<div class="row">
			<div class="text-center col-xs-12 col-md-6 col-md-offset-3">
				<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
					echo '<h2 class="text-title">TIME TO CHOOSE A COURSE</h2>';
					echo '<p>Do you want to know how we can tailor the courses, or the cost? Do you want</p>';
					echo '<p>to learn more about the teachers profiles</p>';
					$textbtn = 'CHOOSE A COURSE';
				}else{
					echo '<h2 class="text-title">ถึงเวลาที่ต้องเลือกคอร์ส</h2>';
					echo '<p>อยากทราบว่าเราสามารถปรับคอร์ส หรือต้นทุนตามที่คุณต้องการได้หรือไม่ ?</p>';
					echo '<p>คุณสามารถดูรายละเอียดของคอร์สต่างๆได้ที่นี้</p>';
					$textbtn = 'คอร์สทั้งหมด';
				} ?>		
				<div class="flex">
					<a href="<?php echo home_url('/courses/'); ?>" class="text-center col-md-6 col-sm-4 col-xs-9 button-large"><?=$textbtn?></a>
				</div>
			</div>
		</div>
	</div>
</section>