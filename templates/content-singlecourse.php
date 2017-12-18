<section class="container-fluid header-info">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12 main-text details-course">
				<h1 class="text-capitalize"><?=the_title();?></h1>
				<? 
					$terms = wp_get_object_terms( $post->ID, 'course_types', array('fields'=>'slugs'));
					$arrlength = count($terms);
					if (empty($terms)) { // default set
						echo '';
					}else{
						for($x = 0; $x < $arrlength; $x++) {
						   	echo '<span> '.ucwords(str_replace("-"," ",$terms[$x])).'</span>';
						   	echo '<span>,</span>';
						}
					}
				?>
			</div>
		</div>
	</div>
</section>
<?php 
	if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
        $pricing  = 'Pricing';
        $start 	  = 'Date Start';
        $end 	  = 'Date End';
        $time 	  = 'Time';
        $unittime = 'Hour';
        $contactus= 'Contact Us';
        $lecturer = 'Lecturer';
        $unitnumbers 	 = 'Times';
        $pricing_group 	 = 'Pricing Group';
        $pricing_private = 'Pricing Private';
        $submit_value 	 = 'register course';
    }else{
        $pricing  = 'ราคาคอร์ส';
        $start 	  = 'เริ่มเรียนวันที่';
        $end 	  = 'จบหลักสูตรวันที่';
        $time 	  = 'เวลาเรียน';
        $unittime = 'ชั่วโมง';
        $contactus= 'ติดต่อเรา';
        $lecturer = 'ผู้สอน';
        $unitnumbers 	 = 'ครั้ง';
        $pricing_group 	 = 'เรียนแบบกลุ่ม';
        $pricing_private = 'เรียนแบบส่วนตัว';
        $submit_value 	 = 'ลงทะเบียนเรียน';
    } 

    $course_details = get_post_meta( get_the_ID(), 'course_details', true ); 
    $current_user   = wp_get_current_user();
    $name_current_user = $current_user->user_login;
?>
<section class="container-fluid section-course">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<div class="col-md-8 col-sm-7 col-xs-12 ">
						<div class="row">
							<?php if (has_post_thumbnail( $post->ID ) ) {
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
								echo '<img class="col-md-offset-2 col-md-8 col-xs-12 img-responsive" src="'.$image[0].'" />';
						 	}else {
								echo '<img class="col-md-offset-2 col-md-8 col-xs-12 img-responsive" src="'.get_bloginfo('template_url') . '/assets/images/default-image-course.jpg'.'"/>';
							} ?>

							<?php if($course_details['vdo']){  // have VDO link
								echo '<div class="col-xs-12 content-vdo-login">';
								echo '<h4>สิทธิพิเศษสำหรับผู้ที่ลงทะเบียนเรียน คุณสามารถทบทวนความรู้ได้จากวีดีโอคอร์ส</h4>';
									if (is_user_logged_in() ){ // User login
										$users = get_users( array( 'fields' => array( 'display_name' ) ) );
        								$count_users = count($users);
        								$out = 0;
									  	for ($i=0; $i < $count_users; $i++) {
									    	if (  $course_details[$i]['checkbox'] == 'yes' && $name_current_user == $course_details[$i]['name'] ) {
									      		$out = $out + 1;
									    	}
									  	}

									  	if ($out > 0  || current_user_can('administrator') ) {?>
									  		<video  controls preload=metadata width=100% style="background-color: #000;">
												<source src='<?=$course_details['vdo']?>' type='video/mp4'>
												<source src='<?=$course_details['vdo']?>' type='video/webm'>
												<source src='<?=$course_details['vdo']?>' type='video/ogg'>
												<p>Web Browser นี้ยังไม่รองรับ HTML Video</p>
											</video>
										<?php }elseif ($out == 0) {
									  		echo 'ขออภัยคุณ '.$name_current_user.' ไม่สามารถรับชมวีดีโอคอร์สได้เนื่องจากไม่ได้ลงเบียนในคอร์สนี้';
									  	}
			                        }else{  // User Not login
			                        	echo '<p>โปรด Login ก่อน รับชมวีดีโอคอร์ส</p>';
			                            echo '<div class="text-center text-uppercase flex-left"><a style="margin:0;" class="col-lg-3 col-md-5 col-sm-8 col-xs-12 button-large" href="'.home_url('/login/').'">Login</a></div>';	
			                        }
		                        echo '</div>';
	                        }?>
                        </div>
					</div>
					<aside class="col-md-4 col-sm-5 col-xs-12">
						<div class="right-affix" data-spy="affix" data-offset-top="500">
							<?php 
								if($course_details['pricing']) {
									echo '<h2>฿ '.$course_details['pricing'].'</h2>';
								}else{
									echo '<h2>'.$pricing.' : <a href="'.home_url('/contact/').'">'.$contactus.'</a></h2>';
								}
								$post_id = $post->ID;
								$page_url = home_url('/book-register/?pid='.$post_id.'');
							?>
							<form action="<?php echo $page_url; ?>"  method="post" >
								<input type="hidden" name='title' value="<?=the_title();?>"/>
								<input type='submit' name='submit' value="<?=$submit_value?>" class="text-center col-lg-6 col-xs-12 button-large text-uppercase">
							</form>
							<table class="table">
								<?php if($course_details['pricing_group']) {
									echo '<tr><td><strong>'.$pricing_group.'</strong></td>';	
									echo '<td class="text-right" >'.$course_details['pricing_group'].' ฿</td></tr>';
								}
								if($course_details['pricing_private']) {
									echo '<tr><td><strong>'.$pricing_private.'</strong></td>';	
									echo '<td class="text-right">'.$course_details['pricing_private'].' ฿</td></tr>';
								}
								if($course_details['lecturer']) {
									echo '<tr><td><strong>'.$lecturer.'</strong></td>';	
									echo '<td class="text-right">'.$course_details['lecturer'].'</td></tr>';
								}
								if($course_details['date_start']) {
									echo '<tr><td><strong>'.$start.'</strong></td>';	
									echo '<td class="text-right">'.$course_details['date_start'].'</td></tr>';
								}
								if($course_details['date_end']) {
									echo '<tr><td><strong>'.$end.'</strong></td>';	
									echo '<td class="text-right">'.$course_details['date_end'].'</td></tr>';
								}
								if($course_details['hours_start'] && $course_details['hours_end']) {
									echo '<tr><td><strong>'.$time.'</strong></td>';	
									echo '<td class="text-right">'.$course_details['hours_start'].' - '.$course_details['hours_end'].'</td></tr>';
								}
								if($course_details['hours'] && $course_details['numbers']) {
									echo '<tr><td><strong>'.$course_details['hours'].' '.$unittime.' / '.$course_details['numbers'].' '.$unitnumbers.'</strong></td>';
									echo '<td></td></tr>';
								}?>
							</table>
						</div>
					</aside>
				</div>	
			</div>	
		</div>
	</div>	
</section>
<section class="container-fluid single-details">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-7 col-xs-12">
				<?php echo apply_filters('the_content', $post->post_content);  ?>
			</div>	
		</div>
	</div>
</section>
<?php get_template_part('widgets/timeto', 'choose'); ?>
<?php get_template_part('widgets/section', 'web-course'); ?>