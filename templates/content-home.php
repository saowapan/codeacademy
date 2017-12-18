<?php echo apply_filters('the_content', $post->post_content);  ?>
<section class="container-fluid section-courses-home">
	<div class="container">
		<div class="row">
			<h2 class="text-title text-center">คอร์สยอดนิยม</h2>
			<div class="items-courses">	
				<?php get_template_part('widgets/items', 'courseHome'); ?>
			</div>
			<div class="col-xs-12 text-center flex">
				<a href="<?php echo home_url('/courses/'); ?>" class="col-lg-3 col-md-4 col-sm-5 col-xs-9 button-large">ดูคอร์สทั้งหมด</a>
			</div>	
		</div>
	</div>
</section>
<section class="container-fluid section-courses">
	<div class="container">
		<div class="row">
			<h1 class="text-title text-center">โปรโมชั่นยอดนิยม</h1>
			<div class="items-courses">	
				<?php get_template_part('widgets/items', 'promotionHome'); ?>
			</div>
			<div class="col-xs-12 text-center flex">
				<a href="<?php echo home_url('/promotions/'); ?>" class="col-lg-3 col-md-4 col-sm-5 col-xs-9 button-large">ดูโปรโมชั่นทั้งหมด</a>
			</div>	
		</div>
	</div>
</section>
<section class="container-fluid section-trainers">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 text-center detail-trainers">
				<h2 class="text-title">ความประทับใจของลูกค้าหลังเรียนจบคอร์ส</h2>
				<p>เราเชื่อว่าทุกคนมีแนวทางการเรียนรู้ในรูปแบบของตัวเอง ดังนั้นเราจะปรับการสอนให้เหมาะสมกับคุณ</p>
				<P>คุณจะได้ทั้งความรู้และความสนุกจากพวกเรา !!!</p>
			</div>
		</div>
		<div class="row trainer">
			<div class="col-md-6 col-xs-12">
				<div class="row">
					<div class="col-sm-6 col-xs-12 item-trainer">
						<div class="trainer-header">
							<p>ฉันเป็นคนที่ไม่มีความรู้พื้นฐานเกี่ยวกับการเขียนเว็บมาก่อน แต่ตอนนี้ฉันสามารถเข้าใจภาษา HTML และ CSS ภายใน 3 คอร์สเท่านั้น หากฉันทำได้ คุณก็ต้องทำได้ !!</p>
						</div>
						<div class="trainer-footer text-center">
							<img src="<? build_url('/assets/images/review.jpg');?>">
						</div>
					</div>
					<div class="col-sm-6 col-xs-12 item-trainer">
						<div class="trainer-header">
							<p>ครูที่นี่มีประสบการณ์และลักษณะการสอนที่ยอดเยี่ยม พวกเค้าสามารถปรับลักษณะการสอนให้เข้ากับความต้องการของนักเรียนได้ทุกรูปแบบ ที่สำคัญเค้ามีคอร์สสำหรับชาวต่างชาติอีกด้วย มันยิ่งทำให้การเรียนรู้สนุกยิ่งขึ้น</p>
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
							<p>การมาเรียนที่นี่จะช่วยให้คุณประหยัดมากกว่าการศึกษาด้วยตัวเองอย่างแน่นอน พวกเค้าสามารถตอบคำถามที่คุณไม่รู้ และพร้อมให้คำปรึกษาแก่คุณ</p>
						</div>
						<div class="trainer-footer text-center">
							<img src="<? build_url('/assets/images/review-3.jpg');?>">
						</div>
					</div>
					<div class="col-sm-6 col-xs-12 item-trainer">
						<div class="trainer-header">
							<p>ผมได้เรียนรู้เทคนิคมากมายจากที่นี่ พวกเค้าสอนให้ผมเข้าใจถึงโครงสร้างของเว็บทั้งหมด และเข้าใจถึงตรรกะการทำงานของแต่ละส่วน ดังนั้นการมาเรียนที่นี่ จึงเป็นการเปิดมุมมองใหม่ของผมให้เข้าใจกระบวนการทำเว็บไซต์จริงๆ</p>
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
