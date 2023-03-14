<?php

// Theme Supports

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'after_setup_theme', 'gbc_crb_load' );
function gbc_crb_load() {
    require_once( get_stylesheet_directory() . '/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}


add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

add_filter( 'wp_calculate_image_srcset_meta', '__return_empty_array' );

add_filter( 'big_image_size_threshold', '__return_false' );



// Post Type support
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'post', 'excerpt' );

// Preload CDNs
function gbc_preload_enqueues() {
  wp_enqueue_style('freight-display','https://use.typekit.net/uuu3pgy.css');
}
add_action('wp_enqueue_scripts', 'gbc_preload_enqueues', 1);


function gbc_enqueues() {

	//wp_enqueue_script ( 'main-script' );
  wp_dequeue_script( 'jquery');


  wp_enqueue_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.6/swiper-bundle.min.css', array(), false);
  wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.6/swiper-bundle.min.js', array(), false. true);

  wp_enqueue_script( 'main-script', get_stylesheet_directory_uri()  . '/dist/script.js', [], false, true );

  wp_enqueue_style('font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
  

}
add_action('wp_enqueue_scripts', 'gbc_enqueues');




if ( ! function_exists( 'gbc_stell__register_nav_menu' ) ) {

	function gbc_stell__register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'stell' ),
	    	'footer_menu_1'  => __( 'Footer Menu 1', 'stell' ),
        'footer_menu_2'  => __( 'Footer Menu 2', 'stell' ),
		) );
	}
	add_action( 'after_setup_theme', 'gbc_stell__register_nav_menu', 0 );
}


//Disable emojis in WordPress
add_action( 'init', 'smartwp_disable_emojis' );

function smartwp_disable_emojis() {
 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
 remove_action( 'wp_print_styles', 'print_emoji_styles' );
 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
 remove_action( 'admin_print_styles', 'print_emoji_styles' );
 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
 add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}



