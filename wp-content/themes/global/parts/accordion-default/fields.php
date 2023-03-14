<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Accordion Default', [
    'Title' => [
        'type' => 'rich_text'
    ],
    'Accordions' => [
        'type' => 'complex',
        'fields' => [
            Field::make('rich_text', 'title'),
            Field::make('rich_text', 'content'),
            
        ],
        'set_layout' => 'tabbed-vertical'
    ],
    'Styling' => [
        'type' => 'separator',
    ],
    'Color' => [
        'type'  => 'color'   
    ],
    'Text Color' => [
        'type'  => 'color'
    ]

]);
