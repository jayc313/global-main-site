<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Images Logos', [
    'Title' => [
        'type' => 'rich_text'
    ],
    
    'Images' => [
        'type' => 'complex',
        'fields' => [
            Field::make('image', 'image'),
        ],
        'set_layout' => 'tabbed-horizontal'
    ],
    'Styling' => [
        'type' => 'separator',
    ],
    'Styling' => [
        'type' => 'styles',
    ],

    'Color' => [
        'type'  => 'color'   
    ],
    'Text Color' => [
        'type'  => 'color'
    ],



]);
