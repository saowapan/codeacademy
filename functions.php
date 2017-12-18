<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
    'lib/assets.php',    // Scripts and stylesheets
    'lib/extras.php',    // Custom functions
    'lib/setup.php',     // Theme setup
    'lib/titles.php',    // Page titles
    'lib/wrapper.php',   // Theme wrapper class
    'lib/customizer.php', // Theme customizer
    'lib/wp_bootstrap_navwalker.php', // Bootstrap nav walker
    'lib/admin/post-types.php', 
    'lib/admin/taxonomies.php',
    'lib/admin/courses.php',
    'lib/admin/promotion.php',
    'lib/admin/registers.php',
    'lib/admin/book-register.php',
    'lib/admin/post_type_ajax.php',
];

foreach ($sage_includes as $file) {
    if (!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}
unset($file, $filepath);

function texttest( $atts, $content = null) {
    previous_post_link('<div calss="previous"><p><span>บทความก่อนหน้า >> </span>%link</p></div>');
    next_post_link('<div calss="next"><p><span>บทความต่อไป >> </span>%link</p></div>');
}
add_shortcode('text_test', 'texttest');
// call path url 
function build_url($path = '', $image = false, $return = false, $page = false) {
    $url = home_url();
    if ($path != '' && $page == false) {
      $url = get_stylesheet_directory_uri() . $path;
    }

    if ($page == true) {
      $url = $url . $path;
    }

    if ($return === true) {
      return $url;
    } else {
      echo $url;
    }
}



function get_img_src_bypostid($post_id, $image_size = 'thumbnail') {
  $post_thumbnail_id = get_post_thumbnail_id($post_id);
  $image = wp_get_attachment_image_src( $post_thumbnail_id, $image_size );
  $image_src = $image[0];
  return $image_src;
}






/**
 * Function Name: front_end_login_fail.
 * Description: This redirects the failed login to the custom login page instead of default login page with a modified url
**/
add_action( 'wp_login_failed', 'front_end_login_fail' );
function front_end_login_fail( $username ) {

  // Getting URL of the login page
  $referrer = $_SERVER['HTTP_REFERER'];    
  // if there's a valid referrer, and it's not the default log-in screen
  if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) {
      wp_redirect( home_url('/login/') . "?login=failed" ); 
      exit;
  }

}

/**
 * Function Name: check_username_password.
 * Description: This redirects to the custom login page if user name or password is   empty with a modified url
**/
add_action( 'authenticate', 'check_username_password', 1, 3);
function check_username_password( $login, $username, $password ) {
  if(isset($_SERVER['HTTP_REFERER'])) {
    // Getting URL of the login page
    $referrer = $_SERVER['HTTP_REFERER'];

    // if there's a valid referrer, and it's not the default log-in screen
    if( !empty( $referrer ) && !strstr( $referrer,'wp-login' ) && !strstr( $referrer,'wp-admin' ) ) { 
        if( $username == "" || $password == "" ){
            wp_redirect( home_url('/login/') . "?login=empty" );
            exit;
        }
    }
  } 
}












