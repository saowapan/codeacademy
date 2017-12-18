<?php /* Template Name: Login Page */ ?>
<?php while (have_posts()) : the_post(); ?>
	<section class="container-fluid header-info">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 main-text">
					<h1 style="padding: 0;">LOGIN</h1>	
					<? if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
						echo '<h3>Special benefits for members​. You can refresher the knowledge from courses online.</h3>';
						echo '<p>There are problems in the login, please contact us. <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>';
					}else{
						echo '<h3>สิทธิพิเศษสำหรับผู้ที่ลงทะเบียนเรียน คุณสามารถทบทวนความรู้ได้จากวีดีโอคอร์ส</h3>';
						echo '<p>มีปัญาในการ login โปรดติดต่อเรา <a class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a></p>';
					} ?>
					
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid section-detail-about">
		<div class="container">
			<div class="col-xs-12 text-center">
				<?php
					if (!is_user_logged_in() ){ // Login 
						echo '<div class="custom-login">'; ?>
						<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" name="loginform-custom" id="loginform-custom">
							<?php if( isset( $_GET['login'] ) && $_GET['login'] == 'failed' ) { 
							    echo '<p style="display: inline-block;font-size: 18px;background: #2750a8;padding: 10px;">* รหัสผ่าน / ชื่อผู้ใช้  ที่คุณป้อนไม่ถูกต้องโปรดลองอีกครั้ง</p>';								    
							}elseif( isset( $_GET['login'] ) && $_GET['login'] == 'empty' ) { 
							    echo '<p style="display: inline-block;font-size: 18px;background: #2750a8;padding: 10px;">* กรุณากรอกชื่อผู้ใช้และรหัสผ่าน</p>';
							} ?>
							<p class="login-username">
								<label>Username</label>
							    <input name="log" type="text" id="username"/>
							</p>
							<p class="login-password">
								<label>Password</label>
								<input name="pwd" type="password" id="password"/>	
							</p>
							<p><button type="submit" id="wp-submit-1">login</button></p>
						</form>
						<p class="text-left"><a style="color:#fff;" href='<?=home_url( '/password/' )?>'>ลืมรหัสผ่าน? update password</a></p>
					<?	echo '</div>';
					}else{  // Logout  
						if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
							echo '<h2>Are already login, want to</h2>';
							echo '<p class="btn-logout"><a href="'.wp_logout_url( get_permalink() ).'">Logout</a></p>';
						}else{
							echo '<h2>ตอนนี้คุณได้อยู่ในระบบแล้ว</h2>';
							echo '<h2>คุณต้องการออกจากระบบ ?</h2>';
							echo '<p class="btn-logout"><a href="'.wp_logout_url( get_permalink() ).'">Logout</a></p>';
						}
					} 
				?>
			</div>
		</div>
	</section>
<?php endwhile; ?>