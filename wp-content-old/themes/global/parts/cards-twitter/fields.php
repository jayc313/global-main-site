<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Cards Twitter', [
    'Cards' => [
        'type' => 'complex',
        'fields' => [
            Field::make('image', 'image'),
            Field::make('text', 'name'),
            Field::make('text', 'title'),
            Field::make('rich_text', 'content'),
        ],
        'set_layout' => 'tabbed-horizontal'
    ]
]);