<?php /* Template Name: Pricing Page */ ?>
<?php while (have_posts()) : the_post(); ?>
<section class="container-fluid section-header-pricing header-info">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 main-text">
			<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){ ?>
				<h1>PRICING</h1>
				<p>If you need help choosing the right course you can</p>
				<p>E mail : <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>
				<p>Call : <a href="tel:06-3082-6001">06-3082-6001</a></p>
				<p>Line ID : <a class="text-lowercase" href="http://line.me/ti/p/~codeacademy" target="_blank">codeacademy</a></p>
			<?php	}else{ ?>	
				<h1>ราคา</h1>
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
<section class="container-fluid pricing-table">
	<div class="container">
		<div class="row">
			<table  class="table table-bordered">
				<tbody>
					<tr>
						<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
							echo '<th>COURSE</th>';
							echo '<th class="text-center">PRICING (฿)</th>';
							echo '<th class="text-center">GROUP COURSE (฿)</th>';
							echo '<th class="text-center">PRIVATE COURSE (฿)</th>';
						}else{
							echo '<th>คอร์ส</th>';
							echo '<th class="text-center">ราคาปกติ (฿)</th>';
							echo '<th class="text-center">ราคาสอนแบบ group (฿)</th>';
							echo '<th class="text-center">ราคาสอนแบบส่วนตัว (฿)</th>';
						} ?>
					</tr>
					<?
					if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
						$not_pricing = 'Contact';
					}else{
						$not_pricing = 'ติดต่อเรา';
					} 
					$args = array(
						'post_type' 	 => 'course',  
						'posts_per_page' => -1, 
						'order'           => 'ASC',
						'post_status'     => 'publish',
					);

					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); 

						$course_details = get_post_meta( get_the_ID(), 'course_details', true );
						$pricing 	= $course_details['pricing']; 
						if(!($pricing)) {	
							$pricing_out = '<a href="'.home_url('/contact/').'">'.$not_pricing.'</a>';
						}else{
							$pricing_out = $pricing;
						}

						$pricing_group 	= $course_details['pricing_group'];
						if(!($pricing_group)) {	
							$pricing_group_out = '<a href="'.home_url('/contact/').'">'.$not_pricing.'</a>';	
						}else{
							$pricing_group_out = $pricing_group;
						}

						$pricing_private 	= $course_details['pricing_private']; 
						if(!($pricing_private)) {	
							$pricing_private_out = '<a href="'.home_url('/contact/').'">'.$not_pricing.'</a>';	
						}else{
							$pricing_private_out = $pricing_private;
						}
						?>
							<tr>
								<td><a href="<?=get_permalink();?>"><?=get_the_title()?></a></td>
								<td class="text-center"><?=$pricing_out?></td>
								<td class="text-center"><?=$pricing_group_out?></td>
								<td class="text-center"><?=$pricing_private_out?></td>
							</tr>
					<?endwhile;?>
					<tr>
						<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
							echo '<th>PROMOTION</th>';
							echo '<th class="text-center">PRICING (฿)</th>';
							echo '<th></th>';
							echo '<th></th>';
						}else{
							echo '<th>โปรโมชั่น</th>';
							echo '<th class="text-center">ราคา (฿)</th>';
							echo '<th></th>';
							echo '<th></th>';
						} ?>
					</tr>
					<?
					$args_pro = array(
						'post_type' => 'promotion',
						'posts_per_page'  => -1,
						'order'           => 'ASC',
						'post_status'     => 'publish',
					);

					$loop_pro = new WP_Query( $args_pro );
					$current_month = date('m'); 
					$current_day   = date('d');
					$current_year  = date('Y');
					while ( $loop_pro->have_posts() ) : $loop_pro->the_post(); 
						$promotion_details = get_post_meta( get_the_ID(), 'promotion_details', true );// meta box

						$promotion_date_start = $promotion_details['date_start']; 
						$start_month = substr($promotion_date_start, 0, 2);
						$start_day   = substr($promotion_date_start, 3, 2);
						$start_year  = substr($promotion_date_start, 6, 4);

						$promotion_date_end = $promotion_details['date_end']; 
						$end_month   = substr($promotion_date_end, 0, 2);
						$end_day     = substr($promotion_date_end, 3, 2);
						$end_year    = substr($promotion_date_end, 6, 4);
						
						if( ($current_year >= $start_year ) && ( $current_year <= $end_year) ){
							if( ($current_month >= $start_month) && ($current_month <= $end_month) ){
								if($current_day  <= $end_day){ 
									$promotion_pricing 		= $promotion_details['pricing']; 
									if(!($promotion_pricing)) {	
										$pricing_out = '<a href="'.home_url('/contact/').'">'.$not_pricing.'</a>';
									}else{
										$pricing_out = $promotion_pricing;
									}?>
									<tr>
										<td><a href="<?=get_permalink();?>"><?=get_the_title()?></a></td>
										<td class="text-center"><?=$pricing_out?></td>
										<td></td>
										<td></td>
									</tr>
								<? } // end if current_day		
							}// end if current_month
						} // end if current_year  
						
					endwhile; ?>
				</tbody>	
			</table>			
		</div>
	</div>
</section>
<?php get_template_part('widgets/timeto', 'choose'); ?>
<?php get_template_part('widgets/section', 'web-course'); ?>
<?php endwhile; ?>