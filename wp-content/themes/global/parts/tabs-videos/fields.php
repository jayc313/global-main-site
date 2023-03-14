<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Tabs Videos', [
    'Videos' => [
        'type' => 'complex',
        'fields' => [
            Field::make('file', 'video'),
            Field::make('text', 'title'),
            Field::make('rich_text', 'content'),
            
        ],
        'set_layout' => 'tabbed-horizontal'
    ],
    'Background Color' => [ 'type'  => 'color', 'set_width' => '50',],
    'Text Color' => ['type'  => 'color', 'set_width' => '50',],
]);