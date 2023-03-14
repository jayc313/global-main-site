<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

$gbcCF->create_component('Sticky Navigation',[
    'Logo' => [
        'type' => 'image',
        'set_width' => '50',
    ],
    'Menu' => [
        'type' => 'complex',
        'fields' => [
            Field::make('text', 'label', 'Label'),
            Field::make('text', 'url', 'URL'),
        ],
        'set_layout' => 'tabbed-horizontal',

    ],
    'CTA' => [
        'type' => 'text',
    ],
]);