<?php

$contentImage = $gbcCF->create_component('Content Text/Image',[
    'Content Title' => [
        'set_width' => '80',
        'type' => 'text',
        'header_template' => '
            <% if (content_title) { %>
                Content Title: <%- content_title %>
            <% } else { %>
                Content Title
            <% } %>
        '
    ],
    'Title Heading'  => [ 'type' => 'heading_select','set_width' => '20', 'set_default_value' => 'h3'],
    'Content'    => [ 'type' => 'rich_text' ],
    'Background'    => [ 'type' => 'image' ],
    'Content Overlay' => ['type' => 'checkbox'],
    'Layout Reverse' => ['type' => 'checkbox'],
    'Rounded' => ['type' => 'checkbox'],

    'Content Links'    => [ 'type' => 'links' ],

    'Content Styles'     => [ 'type' => 'separator', 'set_classes' => 'data-seperate' ],

    'Content Padding Vertical'    => [
        'type'  => 'text',
        'set_width' => '50',
        'set_default_value' => '4',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
    ],

    'Content Padding Horizontal'    => [
        'type'  => 'text',
        'set_width' => '50',
        'set_default_value' => '4',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
    ],
    'Content Color' => [ 'type'  => 'color', 'set_width' => '50', 'set_alpha_enabled' => true],
    'Text Color' => ['type'  => 'color', 'set_width' => '50',],

   
]);