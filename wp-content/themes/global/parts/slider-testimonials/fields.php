<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Slider Testimonials', [
    'Posts' => [
        'type' => 'association',
        'set_min' => 1,
        'set_max' => 6,
        'set_types' => [
            array(
                'type' => 'post',
                'post_type' => 'testimonials',
            ),
        ]
    ],
    'Color' => [
        'type'  => 'color',
        'set_width' => 50
    ],
    'Quote Color' => [
        'type' => 'color',
        'set_width' => 50
    ]
]);


function testimonial_enqueues() {
    if (!wp_script_is('swiper-js', 'registered')) {
        wp_register_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], false, true);
    }
    if (!wp_script_is('swiper-js', 'queue')) {
        wp_enqueue_script('swiper-js');
    }

    if (!wp_style_is('swiper-css', 'registered')) {
        wp_register_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
    }
    if (!wp_style_is('swiper-css', 'queue')) {
        wp_enqueue_style('swiper-css');
    }

}
add_action('wp_enqueue_scripts', 'testimonial_enqueues');


// Our custom post type function
function create_testimonial_post_type() {
  
    register_post_type( 'testimonials',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'publicly_queryable'  => false,
            'has_archive' => false,
            'menu_icon' => 'dashicons-format-quote',
            'rewrite' => array('slug' => 'testimonial'),
            'show_in_rest' => true,
            'supports'  => array('title', 'thumbnail')
  
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_testimonial_post_type' );


// Post type fields 
Container::make( 'post_meta', 'Testimonial Information' )
    ->where( 'post_type', '=', 'testimonials' )
    ->add_fields( array(
        Field::make( 'rich_text', 'content' ),
        Field::make( 'image', 'logo' ),
    ));

