<?php

$gbcCF->create_component('Posts Blocks', [
    'Posts' => [
        'type' => 'custom_association',
        'set_min' => 1,
        'set_max' => 6,
    ],
    'Filter Page' => [
        'type' => 'checkbox'
    ],
    'Taxonomies' => [
        'type' => 'taxonomies',
        'set_conditional_logic' => [
            'relation' => 'AND',
            [
                'field' => 'filter-page',
                'value' => true,
                'compare' => '='
            ]
        ]
    ],
    'Terms' => [
        'type' => 'terms',
        'set_conditional_logic' => [
            'relation' => 'AND',
            [
                'field' => 'filter-page',
                'value' => true,
                'compare' => '='
            ]
        ]
    ],

    'Page Anchor' => [
        'type' => 'checkbox'
    ],


    'Anchor' => [
        'type' => 'text',
        'set_width' => 50,
        'set_conditional_logic' => [
            'relation' => 'AND',
            [
                'field' => 'page-anchor',
                'value' => true,
                'compare' => '='
            ]
        ]
    ],


    'Archive Page' => [
        'type' => 'checkbox'
    ],
    'Post Type' => [
        'type' => 'post_types',
        'set_conditional_logic' => [
            'relation' => 'AND',
            [
                'field' => 'archive-page',
                'value' => true,
                'compare' => '='
            ]
        ]
    ],
    'Archive Taxonomies' => [
        'type' => 'taxonomies',
        'set_conditional_logic' => [
            'relation' => 'AND',
            [
                'field' => 'archive-page',
                'value' => true,
                'compare' => '='
            ]
        ]
    ],

    'Styling' => [
        'type' => 'styles',
    ],

    'Color' => [
        'type' => 'color',
        'set_width' => 50
    ],
    'Text Color' => [
        'type' => 'color',
        'set_width' => 50
    ],

]);
