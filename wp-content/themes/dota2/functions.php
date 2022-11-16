<?php
/*
=============================================================
  Enqueue Scripts and Styles
=============================================================
*/
function theme_enqueue_scripts() {
  //CSS
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1.3', 'all');
  wp_enqueue_style('slick-slider',get_template_directory_uri() . '/css/slick.css', array(), '3.3.4', 'all');
 	wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/css/magnific-popup.css', array(), '3.3.4', 'all');
  wp_enqueue_style('dota2', get_template_directory_uri() . '/css/stylesheet.css', array(), '3.3.4', 'all');

 	//JS
  wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.js', array('jquery'), false);
  wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false);
  wp_enqueue_script('rellax-parallax', get_stylesheet_directory_uri() . '/js/rellax.min.js', array('jquery'), false);
  wp_enqueue_script('magnific-popup-js', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.js', array('jquery'), false);
  wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.js', array('jquery'), false);
  wp_enqueue_script('dota2', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), false);
 }
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

/*
=============================================================
  Hide admin bar
=============================================================
*/
function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

function remove_admin_bar(){
// if (!current_user_can('administrator') && !is_admin()) {
  show_admin_bar(false);
// }
}
add_action('after_setup_theme', 'remove_admin_bar');

/*
===================================
  Theme supports
===================================
*/
add_theme_support('menus');
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'audio', 'gallery', 'status'));
add_theme_support('custom-background');
add_theme_support('custom-header');

/*
=============================================================
  Register Menus
=============================================================
*/
function register_my_menus() {
  register_nav_menu('primary','Primary header navigation');
  register_nav_menu('secondary','Secondary navigation');
  register_nav_menu('footer','Footer navigation');
}
add_action('init', 'register_my_menus');

/*
=============================================================
  Customize Fields
=============================================================
*/
function customized_register($wp_customize) {
  /* Loading screen */
  $wp_customize->add_section("loading_screen", array(
    "title" => __("Loading screen", "dota2"),
    "priority" => 30,
  ));
  $wp_customize->add_setting("loading_screen", array(
    "default" => "",
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize, "loading_screen", array(
    'label' => __('Loading logo', 'dota2'),
    'section' => 'loading_screen',
    'settings' => 'loading_screen'
    )
  ));

	/* Site Logo */
	$wp_customize->add_section("site_logo", array(
    "title" => __("Site Logo", "dota2"),
    "priority" => 30,
	));
  $wp_customize->add_setting("logo_img", array(
    "default" => "",
  ));
	$wp_customize->add_setting("logo_text", array(
    "default" => "",
  ));
  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize, "logo_text", array(
    'label' => __('Logo Title', 'dota2'),
    'section' => 'site_logo',
    'settings' => 'logo_text'
    )
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize, "logo_img", array(
    'label' => __('Site logo', 'dota2'),
    'section' => 'site_logo',
    'settings' => 'logo_img'
    )
  ));
  /* Site Logo Ends */

  /* Footer text */
  $wp_customize->add_section("footer_text", array(
      "title" => __("Footer text", "dota2"),
      "priority" => 30,
  ));

  $wp_customize->add_setting("footer_link", array(
      "default" => "",
  ));

  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "footer_text", array(
      'label' => __('Footer text', 'dota2'),
      'section' => 'footer_text',
      'settings' => 'footer_link'
      )
  ));

  /* Social media */
  $wp_customize->add_section("social_links", array(
    "title" => __("Social icon links", "dota2"),
    "priority" => 30,
  ));
  
  $wp_customize->add_setting("facebook_link", array(
      "default" => "",
  ));
  $wp_customize->add_setting("twitter_link", array(
      "default" => "",
  ));
  $wp_customize->add_setting("linkedin_link", array(
      "default" => "",
  ));
  $wp_customize->add_setting("insta_link", array(
      "default" => "",
  ));
    
  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "facebook_link", array(
      'label' => __('Facebook link', 'dota2'),
      'section' => 'social_links',
      'settings' => 'facebook_link'
      )
  ));

  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "twitter_link", array(
      'label' => __('Twitter link', 'dota2'),
      'section' => 'social_links',
      'settings' => 'twitter_link'
      )
  ));
  
  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "linkedin_link", array(
      'label' => __('Linkedin link', 'dota2'),
      'section' => 'social_links',
      'settings' => 'linkedin_link'
      )
  ));

  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "insta_link", array(
      'label' => __('Instagram link', 'dota2'),
      'section' => 'social_links',
      'settings' => 'insta_link'
      )
  ));

  /* Personal info field */
  $wp_customize->add_section("info_text", array(
      "title" => __("Personal info", "dota2"),
      "priority" => 30,
  ));

  $wp_customize->add_setting("info_email", array(
      "default" => "",
  ));

  $wp_customize->add_setting("info_phone", array(
      "default" => "",
  ));
  
  $wp_customize->add_setting("info_location", array(
      "default" => "",
  ));

  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "info_email", array(
      'label' => __('Email', 'dota2'),
      'section' => 'info_text',
      'settings' => 'info_email'
      )
  ));

  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "info_phone", array(
      'label' => __('Phone', 'dota2'),
      'section' => 'info_text',
      'settings' => 'info_phone'
      )
  ));

  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "info_location", array(
      'label' => __('Location', 'dota2'),
      'section' => 'info_text',
      'settings' => 'info_location'
      )
  ));
}
add_action("customize_register", "customized_register");


/*
=============================================================
  Custom post type for tournaments on events page
=============================================================
*/
function post_type_tournaments() {
    register_post_type( 'our_events',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Tournaments' ),
                'singular_name' => __( 'Tournaments' )),
            'public' => true,
            'has_archive' => true,
            'taxonomies'  => array( 'category' ),
            'show_ui' => true,
            'rewrite' => array('slug' => 'tournaments'),
            'menu_icon' => 'dashicons-tickets-alt',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'custom-fields',
                'page-attributes')
            )
    );

}
add_action( 'init', 'post_type_tournaments' );

/*
=============================================================
  Custom post type for whats new
=============================================================
*/
function post_type_news() {
    register_post_type( 'news',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'News' )),
            'public' => true,
            'has_archive' => true,
            'taxonomies'  => array( 'category' ),
            'show_ui' => true,
            'rewrite' => array('slug' => 'news'),
            'menu_icon' => 'dashicons-tickets-alt',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'custom-fields',
                'page-attributes')
            )
    );

}
add_action( 'init', 'post_type_news' );

/*
=============================================================
  Custom post type for patch updates
=============================================================
*/
function post_type_patch_updates() {
    register_post_type( 'patch_updates',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Patch Updates' ),
                'singular_name' => __( 'Patch Update' )),
            'public' => true,
            'has_archive' => true,
            'taxonomies'  => array( 'category' ),
            'show_ui' => true,
            'rewrite' => array('slug' => 'patch update'),
            'menu_icon' => 'dashicons-tickets-alt',
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'excerpt',
                'custom-fields',
                'page-attributes')
            )
    );

}
add_action( 'init', 'post_type_patch_updates' );


function filter_recent_get_posts($query) {
    if (isset($_POST['tab']) && ($_POST['tab'] == 'recent')) {
        $query->set('post_type', 'news');
    }
}
add_action( 'pre_get_posts', 'filter_recent_get_posts' );

/*
    ===================================
    ACF google map
    ==================================
*/

function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyCd_7IFdjaL9fd5VGzEF31faoSulQEqdMI';
    return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');