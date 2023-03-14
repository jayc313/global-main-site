<?php

$bannerTitle = $gbcCF->create_component('Banner Title',[
    'Banner Subtitle' => [
        'set_width' => '80',
        'type' => 'text',
        'header_template' => '
            <% if (banner_subtitle) { %>
                Banner Subtitle: <%- banner_subtitle %>
            <% } else { %>
                Banner Subtitle
            <% } %>
        '
    ],
    'Subtitle Color' => ['type'  => 'color', 'set_width' => '20',],

    'Banner Title' => [
        'set_width' => '80',
        'type' => 'text',
        'header_template' => '
            <% if (banner_title) { %>
                Banner Title: <%- banner_title %>
            <% } else { %>
                Banner Title
            <% } %>
        '
    ],
    'Title Heading'  => [ 'type' => 'heading_select','set_width' => '20', 'set_default_value' => 'h3'],
    'Banner Content'    => [ 'type' => 'rich_text' ],
    'Banner Links'    => [ 'type' => 'links' ],

    'Banner Styles'     => [ 'type' => 'separator', 'set_classes' => 'data-seperate' ],
    'Full Width' => [ 'type'  => 'checkbox', 'set_width' => '100',],

    'Banner Padding Vertical'    => [
        'type'  => 'text',
        'set_width' => '100',
        'set_default_value' => '4',
        'atts'  => [
            ['type', 'number'],
            ['max', 8],
            ['min', 1]
        ],
    ],
    // 'Banner Padding Horizontal'    => [
    //     'type'  => 'text',
    //     'set_width' => '50',
    //     'set_default_value' => '1',
    //     'atts'  => [
    //         ['type', 'number'],
    //         ['max', 6],
    //         ['min', 1]
    //     ],
    // ],
    'Banner Width Desktop'    => [
        'type'  => 'text',
        'set_width' => '33.333',
        'set_default_value' => '12',
        'atts'  => [
            ['type', 'number'],
            ['max', 12],
            ['min', 1]
        ],
    ],
    'Banner Width Tablet'    => [
        'type'  => 'text',
        'set_width' => '33.333',
        'set_default_value' => '12',
        'atts'  => [
            ['type', 'number'],
            ['max', 12],
            ['min', 1]
        ],
    ],
    'Banner Width Mobile'    => [
        'type'  => 'text',
        'set_width' => '33.333',
        'set_default_value' => '12',
        'atts'  => [
            ['type', 'number'],
            ['max', 12],
            ['min', 1]
        ],
    ],
    'Banner Color' => [ 'type'  => 'color', 'set_width' => '50',],
    'Text Color' => ['type'  => 'color', 'set_width' => '50',],

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

    'Banner Overlay Image' => [ 'type'  => 'image', 'set_width' => '50',],
    'Banner Overlay Align' => ['type' => 'text_align', 'set_width' => '50'],

    'Text Alignment Mobile' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Tablet' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Desktop' => ['type'  => 'text_align', 'set_width' => '33.333',],
   

]);


// $gbcCF->create_component_block($bannerTitle);

