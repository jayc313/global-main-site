<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Slider Logos', [
    'Logos' => [
        'type'  => 'complex',
        'fields' => [
            Field::make('image', 'logo', __('Logo'))
        ],
        'set_layout' => 'tabbed-horizontal'
    ],
    'Logo Size' => [
        'type' => 'select',
        'set_width' => 100,
        'set_options' => [
            'small' => 'Small',
            'medium' => 'Medium',
            'large' => 'Large'
        ]
    ],
    'Border Color' => [
        'type' => 'color',
        'set_width' => 100
    ],
    'Padding Vertical'    => [
        'type'  => 'text',
        'set_width' => '100',
        'set_default_value' => '4',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
    ],
    'Navigation Arrows' => [
        'type' => 'checkbox',
        'set_width' => 100,
        'set_default_value' => false
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


function slider_logo_enqueues() {
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
add_action('wp_enqueue_scripts', 'slider_logo_enqueues');