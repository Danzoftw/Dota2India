<?php

/*
=============================================================
  Enqueue Scripts and Styles
=============================================================
*/
function theme_enqueue_scripts() {
  //CSS
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.1', 'all');
  wp_enqueue_style('slick-slider',get_template_directory_uri() . '/css/slick.css', array(), '3.3.4', 'all');
  wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css', array(), '3.3.4', 'all');
  wp_enqueue_style('aos',get_template_directory_uri() . '/css/aos.css', array(), '3.3.4', 'all');
  wp_enqueue_style('magnific-css', get_template_directory_uri() . '/css/magnific-popup.css', array(), '3.3.4', 'all');
  wp_enqueue_style('gaspar-dias', get_template_directory_uri() . '/css/style.css', array(), '3.3.4', 'all');

 	//JS
  wp_enqueue_style('font-awesome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array('jquery'), false);
  wp_enqueue_script('popper', get_stylesheet_directory_uri() . '/js/popper.min.js', array('jquery'), false);
  wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false);
  wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.js', array('jquery'), false);
  wp_enqueue_script('aos-js', get_stylesheet_directory_uri() . '/js/aos.js', array('jquery'), false);
  wp_enqueue_script('magnific-js', get_stylesheet_directory_uri() . '/js/jquery.magnific-popup.js', array('jquery'), false);
  wp_enqueue_script('gaspar-dias', get_stylesheet_directory_uri() . '/js/script.js', array('jquery'), false);

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
=============================================================
  Register Menus
=============================================================
*/
function register_my_menus() {
    add_theme_support('menus');
    register_nav_menu('primary','Primary header navigation');
}
add_action('init', 'register_my_menus');


/*
===================================
  Theme support function
===================================
*/
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link', 'audio', 'gallery', 'status'));
add_theme_support('custom-background');
add_theme_support('custom-header');


function cc_customize_register($wp_customize) {
	/* Site Logo */
	$wp_customize->add_section("site_logo", array(
    "title" => __("Site Logo", "gaspar-dias"),
    "priority" => 30,
	));
  //header logo
  $wp_customize->add_setting("logo_url", array(
    "default" => "",
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize, "logo_url", array(
    'label' => __('Upload a logo', 'gaspar-dias'),
    'section' => 'site_logo',
    'settings' => 'logo_url'
    )
  ));
  //footer logo
  $wp_customize->add_setting("footer_logo_url", array(
    "default" => "",
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control(
    $wp_customize, "footer_logo_url", array(
    'label' => __('Upload a text logo', 'gaspar-dias'),
    'section' => 'site_logo',
    'settings' => 'footer_logo_url'
    )
  ));
  //logo text
  $wp_customize->add_setting("logo-text", array(
    "default" => "",
  ));

  $wp_customize->add_control(new WP_Customize_Control(
    $wp_customize, "logo-text", array(
    'label' => __('Logo Title', 'gaspar-dias'),
    'section' => 'site_logo',
    'settings' => 'logo-text'
    )
  ));

  /*Site copyright*/
  $wp_customize->add_section("site_copyright", array(
	    "title" => __("Site copyright", "gaspar-dias"),
	    "priority" => 30,
	));
  $wp_customize->add_setting("copyright_text", array(
    "default" => "",
  ));
  $wp_customize->add_control(new WP_Customize_Control(
      $wp_customize, "copyright_text", array(
      'label' => __('Copyright Text', 'gaspar-dias'),
      'section' => 'site_copyright',
      'settings' => 'copyright_text'
      )
  ));

  /*Footer bg image*/
  /*Site copyright*/
  $wp_customize->add_section("footer_bg", array(
      "title" => __("Footer background", "gaspar-dias"),
      "priority" => 30,
  ));
  $wp_customize->add_setting("footer_bg", array(
    "default" => "",
  ));
  $wp_customize->add_control(new WP_Customize_Image_Control(
      $wp_customize, "copyright_text", array(
      'label' => __('Footer Background', 'gaspar-dias'),
      'section' => 'footer_bg',
      'settings' => 'footer_bg'
      )
  ));
}
add_action("customize_register", "cc_customize_register");

/*
  ===================================
  Excerpt Limit
  ===================================
*/
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*
  ===================================
  Excerpt Custom
  ===================================
*/
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/*
  ===================================
  Sidebar function
  ===================================
*/
function awesome_widget_setup1(){
    register_sidebar(
        array(
            'name'=>'ADDRESS',
            'id' => 'address_section',
            'class'=> 'address-section',
            'description' => 'Address Sidebar',
            'before_widget' => '<aside id="%1$s" class="mb-4 mb-sm-0 widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title theme color-body-text mb-2 mb-sm-4">',
            'after_title' => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'=>'EMAIL',
            'id' => 'email_section',
            'class'=> 'email-section',
            'description' => 'Email Sidebar',
            'before_widget' => '<aside id="%1$s" class="mb-4 mb-sm-0 widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title theme color-body-text mb-2 mb-sm-4">',
            'after_title' => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'=>'PHONE',
            'id' => 'phone_section',
            'class'=> 'phone-section',
            'description' => 'Phone Sidebar',
            'before_widget' => '<aside id="%1$s" class="mb-4 mb-sm-0 widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title theme color-body-text mb-2 mb-sm-4">',
            'after_title' => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'=>'WEBSITE',
            'id' => 'website_section',
            'class'=> 'website-section',
            'description' => 'Phone Sidebar',
            'before_widget' => '<aside id="%1$s" class="mb-4 mb-sm-0 widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title theme color-body-text mb-2 mb-sm-4">',
            'after_title' => '</h4>',
        )
    );
    register_sidebar(
        array(
            'name'=>'Instagram Feed',
            'id' => 'insta_section',
            'class'=> 'insta-section',
            'description' => 'Insta Sidebar',
            'before_widget' => '<aside id="%1$s" class="mb-4 mb-sm-0 widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title theme color-body-text mb-0">',
            'after_title' => '</h4>',
        )
    );
}
add_action('widgets_init','awesome_widget_setup1');

/*-------------------------------------------------------------
  Custom Post Types - Services
---------------------------------------------------------------*/
function my_custom_services_post() {
  $labels = array(
    'name'               => _x( 'services', 'post type general name' ),
    'singular_name'      => _x( 'service', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Service' ),
    'add_new_item'       => __( 'Add New Service' ),
    'edit_item'          => __( 'Edit Service' ),
    'new_item'           => __( 'New Service' ),
    'all_items'          => __( 'All Services' ),
    'view_item'          => __( 'View Service' ),
    'search_items'       => __( 'Search Service' ),
    'not_found'          => __( 'No Service found' ),
    'not_found_in_trash' => __( 'No Service found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Services'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Add your Service',
    'public'        => true,
    'menu_position' => 3,
    'taxonomies'    => array( 'category' ),
    'supports'      => array( 'title', 'thumbnail','editor', 'page-attributes','excerpt','comments'),
    'has_archive'   => true,
  );
  register_post_type( 'services', $args );
}
add_action( 'init', 'my_custom_services_post' );
/*-------------------------------------------------------------
     Custom Post Types - Services Ends
---------------------------------------------------------------*/

/*
=============================================================
  Custom post type for Latest Project section
=============================================================
*/
function post_type_events() {

  register_post_type( 'events',
  // CPT Options
  array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )),
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'rewrite' => array('slug' => 'events'),
      'menu_icon' => 'dashicons-calendar',
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
add_action( 'init', 'post_type_events' );

//moving label out
add_filter('frm_replace_shortcodes', 'frm_change_my_html', 10, 3);
function frm_change_my_html($html, $field, $args){
    if ( in_array ( $field['type'], array( 'radio' ) ) ) {
        $temp_array = explode('/>', $html);
        $new_html = '';
        foreach ( $temp_array as $key => $piece ) {
            // Get current for attribute
            if ( ( $pos = strpos( $piece, 'field_' . $field['field_key'] . '-' ) ) !== FALSE ) {
                $new_key = substr( $piece, $pos );
                $key_parts = explode( '"', $new_key, 2);
                $new_key = reset( $key_parts );
            } else {
                $new_html .= $piece;
                continue;
            }
            // Move opening label tag
            $label = '<label for="' . $new_key . '"><div class="img-shell img-shell'. $new_key .'"><div class="common black '. $new_key .'"></div><div class="common white"></div></div>';
            $new_html .= str_replace( $label, '', $piece );
            $new_html .= '/>' . $label;
        }
      $html = $new_html;
    }
  return $html;
}

//taxonomy for location
function register_taxonomy_location()
{
  $labels = [
    'name'              => _x('Location', 'taxonomy general name'),
    'singular_name'     => _x('Location', 'taxonomy singular name'),
    'search_items'      => __('Search Location'),
    'all_items'         => __('All Locations'),
    'parent_item'       => __('Parent Location'),
    'parent_item_colon' => __('Parent Location:'),
    'edit_item'         => __('Edit Location'),
    'update_item'       => __('Update Location'),
    'add_new_item'      => __('Add New Location'),
    'new_item_name'     => __('New Location Name'),
    'menu_name'         => __('Location'),
  ];
  $args = [
    'hierarchical'      => true, // make it hierarchical (like categories)
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => ['slug' => 'location'],
  ];
  register_taxonomy('Location', ['post'], $args);
}
add_action('init', 'register_taxonomy_location');


// function register_taxonomy_city()
// {
//   $labels = [
//     'name'              => _x('City', 'taxonomy general name'),
//     'singular_name'     => _x('City', 'taxonomy singular name'),
//     'search_items'      => __('Search City'),
//     'all_items'         => __('All Cities'),
//     'parent_item'       => __('Parent City'),
//     'parent_item_colon' => __('Parent City:'),
//     'edit_item'         => __('Edit City'),
//     'update_item'       => __('Update City'),
//     'add_new_item'      => __('Add New City'),
//     'new_item_name'     => __('New City Name'),
//     'menu_name'         => __('City'),
//   ];
//   $args = [
//     'hierarchical'      => true, // make it hierarchical (like categories)
//     'labels'            => $labels,
//     'show_ui'           => true,
//     'show_admin_column' => true,
//     'query_var'         => true,
//     'rewrite'           => ['slug' => 'city'],
//   ];
//   register_taxonomy('City', ['post'], $args);
// }
// add_action('init', 'register_taxonomy_city');

// function register_taxonomy_country()
// {
//   $labels = [
//     'name'              => _x('Country', 'taxonomy general name'),
//     'singular_name'     => _x('Country', 'taxonomy singular name'),
//     'search_items'      => __('Search Country'),
//     'all_items'         => __('All Countries'),
//     'parent_item'       => __('Parent Country'),
//     'parent_item_colon' => __('Parent Country:'),
//     'edit_item'         => __('Edit Country'),
//     'update_item'       => __('Update Country'),
//     'add_new_item'      => __('Add New Country'),
//     'new_item_name'     => __('New Country Name'),
//     'menu_name'         => __('Country'),
//   ];
//   $args = [
//     'hierarchical'      => true, // make it hierarchical (like categories)
//     'labels'            => $labels,
//     'show_ui'           => true,
//     'show_admin_column' => true,
//     'query_var'         => true,
//     'rewrite'           => ['slug' => 'country'],
//   ];
//   register_taxonomy('Country', ['post'], $args);
// }
// add_action('init', 'register_taxonomy_country');

// function register_taxonomy_state()
// {
//   $labels = [
//     'name'              => _x('State', 'taxonomy general name'),
//     'singular_name'     => _x('State', 'taxonomy singular name'),
//     'search_items'      => __('Search State'),
//     'all_items'         => __('All States'),
//     'parent_item'       => __('Parent State'),
//     'parent_item_colon' => __('Parent State:'),
//     'edit_item'         => __('Edit State'),
//     'update_item'       => __('Update State'),
//     'add_new_item'      => __('Add New State'),
//     'new_item_name'     => __('New State Name'),
//     'menu_name'         => __('State'),
//   ];
//   $args = [
//     'hierarchical'      => true, // make it hierarchical (like categories)
//     'labels'            => $labels,
//     'show_ui'           => true,
//     'show_admin_column' => true,
//     'query_var'         => true,
//     'rewrite'           => ['slug' => 'state'],
//   ];
//   register_taxonomy('State', ['post'], $args);
// }
// add_action('init', 'register_taxonomy_state');