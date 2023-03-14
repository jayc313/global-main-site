<?php

$gbcCF->create_component('Banner Split', [
    'Banner Title' => [
        'set_width' => '80',
        'type' => 'text',
        'header_template' => '
            <% if (banner_title) { %>
                Banner Split: <%- banner_title %>
            <% } else { %>
                Banner Split
            <% } %>
        '
    ],
    'Title Heading'  => ['type' => 'heading_select', 'set_width' => '20', 'set_default_value' => 'h3'],
    'Banner Content'    => ['type' => 'rich_text'],
    'Banner Image'    => ['type' => 'image'],

    'Banner Links'    => ['type' => 'links'],

    'Banner Styles'     => ['type' => 'separator'],
    'Full Width' => ['type'  => 'checkbox', 'set_width' => '100',],
    'Reverse' => ['type'  => 'checkbox', 'set_width' => '100',],
    'Rounded' => ['type'  => 'checkbox', 'set_width' => '100',],
    'Content Width'    => [
        'type'  => 'text',
        'set_width' => '33.333',
        'set_default_value' => '6',
        'atts'  => [
            ['type', 'number'],
            ['max', 8],
            ['min', 1]
        ],
    ],
    'Image Width'    => [
        'type'  => 'text',
        'set_width' => '33.333',
        'set_default_value' => '6',
        'atts'  => [
            ['type', 'number'],
            ['max', 8],
            ['min', 1]
        ],
    ],

    'Banner Padding'    => [
        'type'  => 'text',
        'set_width' => '33.333',
        'set_default_value' => '4',
        'atts'  => [
            ['type', 'number'],
            ['max', 8],
            ['min', 1]
        ],
    ],
    'Banner Color' => ['type'  => 'color', 'set_width' => '33.333', 'set_default_value' => '#9E2A2F'],
    'Text Color' => ['type'  => 'color', 'set_width' => '33.333',],
    'Text Alignment Mobile' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Tablet' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Desktop' => ['type'  => 'text_align', 'set_width' => '33.333',],


]);

// // create a new component called hero image
// $gbcCF->create_component('Hero Image', [
//     'Hero Image' => ['type' => 'image'],
//     'Hero Image Mobile' => ['type' => 'image'],
//     'Hero Image Tablet' => ['type' => 'image'],
//     'Hero Image Desktop' => ['type' => 'image'],
//     'Hero Title' => ['type' => 'text'],
//     'Hero Subtitle' => ['type' => 'text'],
//     'Hero Content' => ['type' => 'rich_text'],
//     'Hero Links' => ['type' => 'links'],
//     'Hero Styles' => ['type' => 'separator'],
//     'Hero Background Color' => ['type'  => 'color', 'set_width' => '33.333', 'set_default_value' => '#9E2A2F'],
//     'Hero Text Color' => ['type'  => 'color', 'set_width' => '33.333',],
//     'Hero Text Alignment' => ['type'  => 'text_align', 'set_width' => '33.333',],
//     'Hero Padding' => [
//         'type'  => 'text',
//         'set_width' => '33.333',
//         'set_default_value' => '4',
//         'atts'  => [
//             ['type', 'number'],
//             ['max', 6],
//             ['min', 1]
//         ],
//     ],
//     'Hero Height' => ['type'  => 'checkbox', 'set_width' => '33.333',],
//     'Hero Full Width' => ['type'  => 'checkbox', 'set_width' => '33.333',],
// ]);

