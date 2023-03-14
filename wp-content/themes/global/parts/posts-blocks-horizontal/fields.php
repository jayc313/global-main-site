<?php

$gbcCF->create_component('Posts Blocks Horizontal', [
    'Posts' => [
        'type' => 'association',
        'set_min' => 1,
        'set_max' => 6,
        'set_types' => [
            array(
                'type' => 'post',
                'post_type' => 'page',
            ),
            array(
                'type' => 'post',
                'post_type' => 'post',
            ),
        ]
    ],
    'Posts Column Span Desktop' => ['type' => 'text', 'set_width' => 33.333, 'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],
    'Posts Column Span Tablet' => ['type' => 'text', 'set_width' => 33.333,  'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],
    'Posts Column Span Mobile' => ['type' => 'text', 'set_width' => 33.333,  'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],
    'Post Color' => ['type'  => 'color', 'set_width' => '33.333',],
    'Text Color' => ['type'  => 'color', 'set_width' => '33.333',],
    'Alt Post Color' => ['type'  => 'color', 'set_width' => '33.333',],
    'Alt Text Color' => ['type'  => 'color', 'set_width' => '33.333',],

]);
