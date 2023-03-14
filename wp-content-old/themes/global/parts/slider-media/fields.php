<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Slider Media', [
    'Media' => [
        'type'  => 'complex',
        'fields' => [
            [
                'media',
                [
                    Field::make('image', 'logo', __('Logo'))
                ]
            ],
            [
            'youtube',
                [
                    Field::make('text', 'title', __('Video Title')),
                    Field::make('text', 'url', __('Video URL'))
                ]
            ],
        ],
        'set_layout' => 'tabbed-horizontal'
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


function slider_media_enqueues() {
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
add_action('wp_enqueue_scripts', 'slider_media_enqueues');