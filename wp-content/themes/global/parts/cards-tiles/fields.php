<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Cards Tiles', [
    'Cards' => [
        'type' => 'complex',
        'fields' => [
            Field::make('image', 'image'),
            Field::make('text', 'title'),
            Field::make('rich_text', 'content'),

            Field::make('text', 'width')
                ->set_attribute('type', 'number')
                ->set_attribute('min', '1')
                ->set_attribute('max', '10')
                ->set_default_value('5'),
            
        ],
        'set_layout' => 'tabbed-horizontal'
    ],
    'Background Color' => ['type'  => 'color', 'set_width' => '50',],
    'Text Color' => ['type'  => 'color', 'set_width' => '50',],
    'Content Background Color' => ['type'  => 'color', 'set_width' => '50',],
    'Text Alignment Mobile' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Tablet' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Desktop' => ['type'  => 'text_align', 'set_width' => '33.333',],
]);