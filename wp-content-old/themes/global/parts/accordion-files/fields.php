<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

$gbcCF->create_component('Accordion Files', [
    'Title' => [
        'type' => 'rich_text'
    ],
    'Accordions' => [
        'type' => 'complex',
        'fields' => [
            Field::make('rich_text', 'title'),
            Field::make( 'complex', 'content', __( 'Accordion Content' ) )
            ->add_fields( array(
                Field::make( 'text', 'title', __( 'File Title' ) ),
                Field::make('file', 'file'),
            ) )
            ->set_layout('tabbed-vertical')
            ->set_header_template( '
                <% if (title) { %>
                    <%- title %>
                <% } %>
            ' ),
            
        ],
        'set_layout' => 'tabbed-vertical',
        'set_header_template' => '
        <% if (title) { %>
            <%- title %>
        <% } %>',
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
