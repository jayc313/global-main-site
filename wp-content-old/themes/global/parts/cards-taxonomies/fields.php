<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Cards Taxonomies', [
    'Cards' => [
        'type' => 'taxonomies',
    ],
    'Url' => [
        'type' => 'text',
    ],
    'Styling' => [
        'type' => 'separator',
    ],
    'Styling' => [
        'type' => 'styles',
    ],
    'Active Color' => [
        'type' => 'color',
    ],
    'Active Text Color' => [
        'type' => 'color',
    ],
    'Text Alignment Mobile' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Tablet' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Desktop' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Cards Column Span Desktop' => ['type' => 'text', 'set_width' => 33.333, 'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],
    'Cards Column Span Tablet' => ['type' => 'text', 'set_width' => 33.333,  'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],
    'Cards Column Span Mobile' => ['type' => 'text', 'set_width' => 33.333,  'set_help_text' => 'Max 12 Columns', 'set_default_value' => '6'],

]);
