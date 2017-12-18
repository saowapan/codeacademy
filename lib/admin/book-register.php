<?php 
function book_register() {
	// show html
	echo '<!doctype html>';
	echo '<html ';
	language_attributes();
	echo '>';
  	get_template_part('templates/head');
  	echo '<body ';
  	body_class();
  	echo '>';
  	do_action('get_header');
    get_template_part('templates/header');
    echo '<div class="wrap section-wrap" role="document"><div class="content section-content"><main class="main section-content">';
	echo '<section class="container-fluid section-header-pricing header-info"><div class="container"><div class="row"><div class="col-xs-12 col-md-12 main-text">';
	echo '<h1>ขอบคุณ คุณ '.$_POST['name'].'</h1>';
	echo '<h1>สำหรับการลงทะเบียนเรียน</h1>';
	echo '<h2>(Thank you '.$_POST['name'].' for class registration)</h2>';
	echo '</div></div></div></section>';
	get_template_part('widgets/section', 'web-course');
    echo '</main></div></div>';
    do_action('get_footer');
    get_template_part('templates/footer');
    wp_footer();
  	echo '</body></html>';


	if (isset($_POST['submit'])){	

		$booking = [];

		date_default_timezone_set('Asia/Bangkok');

		if (isset($_POST['coures_name']))
			$booking['coures_name'] = $_POST['coures_name'];
			
		if (isset($_POST['name']))
			$booking['name'] = $_POST['name'];

		if (isset($_POST['email']))
			$booking['email'] = $_POST['email'];

		if (isset($_POST['phone']))
			$booking['phone'] = $_POST['phone'];

		if (isset($_POST['time_contact'])){
			$booking['time_contact'] = $_POST['time_contact'];
		}else{
			$booking['time_contact'] = '';
		}

		if (isset($_POST['message'])) {
			$post_content = '<h3 style="color: #000;">Send @'.date('l jS \of F Y h:i:s A').'</h3><p>'.$_POST['message'].'</p>';
		} else {
			$post_content = '';
		}

		if (isset($_POST['post_id']))
			$booking['coures_id'] = $_POST['post_id'];

		if (isset($_POST['cate']))
			$booking['cate'] = $_POST['cate'];

	}
	$booking_post = [
		'post_title' => $booking['cate'] . ' - ' .$booking['name'] . ' - ' . get_post_field('post_title', $booking['coures_id']),
		'post_content' => $post_content,
		'meta_input' => $booking,
		'post_type' => 'register',
		'post_status' => 'publish'
	];

	$booking_id = wp_insert_post($booking_post);

	$from_email = $booking['email'];
	$to = 'new@saowapan.com';
	$subject = ''.$booking['cate'].':'.$booking['coures_name'].'';
	$message = 'Name :'.$booking['name'].' Phone : '.$booking['phone'].' Message : '.$post_content.'';
	mail($to,$from_email, $subject, $message );
}
add_action( 'admin_post_book_register', 'book_register' );
add_action( 'admin_post_nopriv_book_register', 'book_register' );



