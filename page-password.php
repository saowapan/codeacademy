<?php /* Template Name: Password Page */ ?>
<?php while (have_posts()) : the_post(); ?>
	<section class="container-fluid section-header-pricing header-info">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 main-text">
					<h1>ลืมรหัสผ่าน</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="container-fluid section-detail-about">
		<div class="container">
			<div class="col-xs-12 text-center">
				<?php
					global $wpdb;
					
					$error = '';
					$success = '';
					
					// check if we're in reset form
					if( isset( $_POST['action'] ) && 'reset' == $_POST['action'] ) {
						$email = trim($_POST['user_login']);

						if( empty( $email ) ) {
							$error = 'โปรดกรอก E-mail ก่อนกดปุ่ม Get New Password';
						} else if( ! is_email( $email )) {
							$error = 'กรอก E-mail ไม่ถูกต้อง โปรดกรอกใหม่';
						} else if( ! email_exists( $email ) ) {
							$error = 'ไม่ได้มีการลงทะเบียนกับ E-mail นี้ โปรดกรอก E-mail ที่ลงทะเบียนเท่านั้น';
						} else {
							
							$random_password = wp_generate_password( 12, false );
							//$user = get_user_by( 'email', $email );
							
							/*$update_user = wp_update_user( array (
									'ID' => $user->ID, 
									'user_pass' => $random_password
								)
							);*/
							
							// if  update user return true then lets send user an email containing the new password
							if(isset($email) ) {
								
								$to = $email;
								$subject = 'Forgotten Password from codeacademy.asia';
								//$sender = get_option('name');
								
								$arrContextOptions = array(
								    "ssl"	=>	array(
								    	"verify_peer"		=>	false,
								        "verify_peer_name"	=>	false,
								    ),
								);
								$email_form = get_option('admin_email'); 

								$message = 'Your new password is: '.$random_password;

								$message = file_get_contents(Assets\asset_email('forgotten-password.html'),false, stream_context_create($arrContextOptions));
								$message = str_replace('[NAME]', $email, $message);
								$message = str_replace('[PASSWORD]', $random_password, $message);
								
								
								$headers[] = 'MIME-Version: 1.0' . "\r\n";
								$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
								$headers[] = "X-Mailer: PHP \r\n";
								$headers[] = 'From: '.'codeacademy.asia'.' < '.$email_form.'>' . "\r\n";
								
								$mail = wp_mail( $to, $subject, $message, $headers );
							
								if( $mail ){
									$success = 'โปรดตรวจสอบรหัสผ่านใหม่ใน E-mail ของคุณ';
								}

							}else {
								$error = 'ขออภัย!! มีบางอย่างผิดพลาด';
							}
						}
						
						if( !empty( $error ) ){
							echo '<h2>'. $error .'</h2>';
							echo '<p style="margin-bottom:40px;">( มีปัญาในการขอรหัสใหม่ โปรดติดต่อเรา <a style="color:#fff;" class="break-word" href="mailto:new@saowapan.com">new@saowapan.com</a> )</p>';
						}
					
						if( !empty( $success ) ){
							echo '<h2 style="margin-bottom:40px;">'. $success .'</h2>';
						}
					}
				?>
				<div class="custom-login">
					<form method="post" class="new-password">
						<p>กรอก E-mail ที่ใช้ในการสมัคร</p>
						<p>
							<label for="user_login">E-mail:</label>
							<?php $user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : ''; ?>
							<input type="text" name="user_login" id="user_login" value="<?php echo $user_login;?>"/>
						</p>
						<p>
							<input type="hidden" name="action" value="reset"/>
							<input type="submit" value="Get New Password" id="submit" />
						</p>
					</form>
				</div>
			</div>
		</div>
	</section>
<?php endwhile; ?>