<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Cards Default', [
    'Cards' => [
        'type' => 'complex',
        'fields' => [
            Field::make('image', 'image'),
            Field::make('text', 'title'),
            Field::make('rich_text', 'content'),
            $gbcCF->color_component('color'),
            $gbcCF->color_component('text-color'),
            Field::make( 'association', 'link' )
            ->set_types( array(
                array(
                    'type' => 'post',
                )
            ) )
            
        ],
        'set_layout' => 'tabbed-horizontal'
    ],
    'Image Size' => [
        'type' => 'select',
        'add_options' => array(
            'cover' => 'Cover',
            'contain' => 'Contain',
        )
    ],
    'Styling' => [
        'type' => 'separator',
    ],
    'Styling' => [
        'type' => 'styles',
    ],
    'Text Alignment Mobile' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Tablet' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Desktop' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Cards Column Span Desktop' => ['type' => 'text', 'set_width' => 33.333, 'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],
    'Cards Column Span Tablet' => ['type' => 'text', 'set_width' => 33.333,  'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],
    'Cards Column Span Mobile' => ['type' => 'text', 'set_width' => 33.333,  'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],

]);
