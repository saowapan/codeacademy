<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/
  add_theme_support('soil-clean-up');
  add_theme_support('soil-nav-walker');
  add_theme_support('soil-nice-search');
  add_theme_support('soil-jquery-cdn');
  add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage')
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('styles/main.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {
  register_sidebar([
    'name'          => __('Primary', 'sage'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>'
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    //is_front_page(),
    //is_page_template('template-custom.php'),
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  wp_enqueue_style('sage/css', Assets\asset_path('styles/main.css'), false, null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_enqueue_script('sage/js', Assets\asset_path('scripts/main.js'), ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);

/* 
function page_setup  
auto
*/
function page_setup() {

  if (is_admin()) {

  // Always set up user id =1 to administrator role
  wp_update_user(array(
    'ID' => 1,
    'role' => 'administrator'
  ));

  $admin_page_author_id = 1; // We have to update this because right now we are still got different database

    // Register Home Page
    $home_title         = 'Home';
    $home_page_template = 'page-home.php';
    $home_page          = array(
      'post_type'     => 'page',
      'post_title'    => $home_title,
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_home_check = get_page_by_title($home_title);

    if(!isset($page_home_check->ID)) {
      $new_page_id = wp_insert_post($home_page);

      if(!empty($home_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $home_page_template);
      }
    }

    // About Page
    $about_title          = 'About';
    $about_page_template  = 'page-about.php';
    $about_page           = array(
      'post_type'     => 'page',
      'post_title'    => $about_title,
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_about_check = get_page_by_title($about_title);

    if(!isset($page_about_check->ID)) {
      $new_page_id = wp_insert_post($about_page);

      if(!empty($about_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $about_page_template);
      }
    }

     // Course  Page
    $courses_title          = 'Courses';
    $courses_page_template  = 'page-courses.php';
    $courses_page           = array(
      'post_type'     => 'page',
      'post_title'    => $courses_title,
      'post_name'     => 'courses',
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_courses_check = get_page_by_title($courses_title);

    if(!isset($page_courses_check->ID)) {
      $new_page_id = wp_insert_post($courses_page);

      if(!empty($courses_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $courses_page_template);
      }
    }

    // Pricing  Page
    $pricing_title          = 'Pricing';
    $pricing_page_template  = 'page-pricing.php';
    $pricing_page           = array(
      'post_type'     => 'page',
      'post_title'    => $pricing_title,
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_pricing_check = get_page_by_title($pricing_title);

    if(!isset($page_pricing_check->ID)) {
      $new_page_id = wp_insert_post($pricing_page);

      if(!empty($pricing_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $pricing_page_template);
      }
    }

    // Articles Page
    $articles_title         = 'Articles';
    $articles_page_template = 'page-articles.php';
    $articles_page          = array(
      'post_type'     => 'page',
      'post_title'    => $articles_title,
      'post_name'     => 'article',
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_articles_check = get_page_by_title($articles_title);

    if(!isset($page_articles_check->ID)) {
      $new_page_id = wp_insert_post($articles_page);

      if(!empty($articles_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $articles_page_template);
      }
    }

    // Promotion Page
    $promotion_title          = 'Promotions';
    $promotion_page_template  = 'page-promotions.php';
    $promotion_page           = array(
      'post_type'     => 'page',
      'post_title'    => $promotion_title,
      'post_name'     => 'promotion',
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );

    $page_promotion_check = get_page_by_title($promotion_title);

    if (!isset($page_promotion_check->ID)) {
      $new_page_id = wp_insert_post($promotion_page);
      
      if (!empty($promotion_page_template)) {
        update_post_meta($new_page_id,'_wp_page_template', $promotion_page_template);      
      }    
    }

    // Contact Page
    $contact_title          = 'Contact';
    $contact_page_template  = 'page-contact.php';
    $contact_page           = array(
      'post_type'     => 'page',
      'post_title'    => $contact_title,
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_contact_check = get_page_by_title($contact_title);

    if(!isset($page_contact_check->ID)) {
      $new_page_id = wp_insert_post($contact_page);

      if(!empty($contact_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $contact_page_template);
      }
    }

    // Book Register Courses Page
    $register_title         = 'Book Register';
    $register_page_template = 'page-bookregister.php';
    $register_page          = array(
      'post_type'     => 'page',
      'post_title'    => $register_title,
      'post_name'     => 'book-register',
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_register_check = get_page_by_title($register_title);

    if(!isset($page_register_check->ID)) {
      $new_page_id = wp_insert_post($register_page);

      if(!empty($register_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $register_page_template);
      }
    }

    // Register Login Page
    $login_title          = 'Login';
    $login_page_template  = 'page-login.php';
    $login_page           = array(
      'post_type'     => 'page',
      'post_title'    => $login_title,
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_login_check = get_page_by_title($login_title);

    if(!isset($page_login_check->ID)) {
      $new_page_id = wp_insert_post($login_page);

      if(!empty($login_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $login_page_template);
      }
    }

    // Register Lost Password Page
    $password_title         = 'Password';
    $password_page_template = 'page-password.php';
    $password_page          = array(
      'post_type'     => 'page',
      'post_title'    => $password_title,
      'post_name'     => 'password',
      'post_content'  => '',
      'post_status'   => 'publish',
      'post_author'   => $admin_page_author_id,
    );
    
    $page_password_check = get_page_by_title($password_title);

    if(!isset($page_password_check->ID)) {
      $new_page_id = wp_insert_post($password_page);

      if(!empty($password_page_template)) {
        update_post_meta($new_page_id, '_wp_page_template', $password_page_template);
      }
    }

  }
}
add_action('after_setup_theme', __NAMESPACE__ . '\\page_setup');
