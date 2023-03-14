<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Accordion Bento', [
    'Title' => [
        'type' => 'rich_text'
    ],
    'Accordions' => [
        'type' => 'complex',
        'fields' => [
            Field::make('rich_text', 'title'),
            Field::make('rich_text', 'content'),
            Field::make('image', 'media'),

        ],
        'set_layout' => 'tabbed-vertical'
    ],
    'Styling' => [
        'type' => 'separator',
    ],

    'Padding Vertical'    => [
        'type'  => 'text',
        'set_width' => '100',
        'set_default_value' => '4',
        'atts'  => [
            ['type', 'number'],
            ['max', 8],
            ['min', 1]
        ],
    ],
    'Section Background Color' => [
        'type'  => 'color'
    ],
    'Background Color' => [
        'type'  => 'color'
    ],
    'Content Background Color' => [
        'type'  => 'color'
    ],
    'Text Color' => [
        'type'  => 'color'
    ]

]);
