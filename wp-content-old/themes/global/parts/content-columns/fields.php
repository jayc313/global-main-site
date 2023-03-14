<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;


$contentColumns = $gbcCF->create_component('Content Columns',[
    'Columns' => [
        'type' => 'complex',
        'fields' => [
            Field::make('rich_text', 'content'),
        ],
        'set_header_template' => '<%- content %>',
    ],
    'Column Bottom Margin'    => [
        'type'  => 'text',
        'set_width' => '100',
        'set_default_value' => '2',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
    ],
    'Background Color' => [ 'type'  => 'color', 'set_width' => '50'],
    'Text Color' => ['type'  => 'color', 'set_width' => '50'],

    'Background Image' => ['type'  => 'image', 'set_width' => '50'],
    
    'Background Size' => [
        'type' => 'select',
        'add_options' => array(
            'cover' => 'Cover',
            'contain' => 'Contain',
        )
    ],
    'Background Position' => [
        'type' => 'select',
        'add_options' => array(
            'center center' => 'Center Center',
            'center top' => 'Center Top',
            'center bottom' => 'Center Bottom',
            'left center' => 'Left Center',
            'left top' => 'Left Top',
            'left bottom' => 'Left Bottom',
            'right center' => 'Right Center',
            'right top' => 'Right Top',
            'right bottom' => 'Right Bottom',
        )
    ],
    'Background Repeat' => [
        'type' => 'select',
        'add_options' => array(
            'no-repeat' => 'No Repeat',
            'repeat' => 'Repeat',
            'repeat-x' => 'Repeat X',
            'repeat-y' => 'Repeat Y',
        )
    ],
    'Posts Column Span Desktop' => ['type'=>'text', 'set_width' => 33.333, 'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6' ],
    'Posts Column Span Tablet' => ['type'=>'text', 'set_width' => 33.333,  'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6' ],
    'Posts Column Span Mobile' => ['type'=>'text', 'set_width' => 33.333,  'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6' ],
    'Text Alignment Mobile' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Tablet' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Desktop' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Reverse Mobile Layout' => ['type'  => 'checkbox', 'set_width' => '100',],
    'Padding Vertical'    => [
        'type'  => 'text',
        'set_width' => '100',
        'set_default_value' => '4',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
    ],

]);
