<?php

$gbcCF->create_component('Banner Blocks', [
    'Block 1'     => ['type' => 'separator', 'set_classes' => 'data-seperate'],
    'Block 1 Image'    => ['type' => 'image'],

    'Block 1 Title' => [
        'set_width' => '80',
        'type' => 'text',
        'header_template' => '
      <% if (block_1_title && block_2_title) { %>
            Banner Blocks: <%- block_1_title %> +  <%- block_2_title %>
        <% } else if(block_1_title) { %>
            Banner Block: <%- block_1_title %> 
         <% } else { %>
            Banner Blocks:
        <% } %>

        '
    ],
    'Title 1 Heading'  => ['type' => 'heading_select', 'set_width' => '20', 'set_default_value' => 'h3'],
    'Block 1 Content'    => ['type' => 'rich_text'],

    'Block 1 Links'    => ['type' => 'links'],
    'Block 2'     => ['type' => 'separator', 'set_classes' => 'data-seperate'],
    'Block 2 Image'    => ['type' => 'image'],

    'Block 2 Title' => [
        'set_width' => '80',
        'type' => 'text',
    ],
    'Title 2 Heading'  => ['type' => 'heading_select', 'set_width' => '20', 'set_default_value' => 'h3'],
    'Block 2 Content'    => ['type' => 'rich_text'],

    'Block 2 Links'    => ['type' => 'links'],

    'Block Styles'     => ['type' => 'separator', 'set_classes' => 'data-seperate'],
    'Full set_width' => ['type'  => 'checkbox', 'set_width' => '100',],

    'Block Padding'    => [
        'type'  => 'text',
        'set_width' => '33.333',
        'set_default_value' => '4',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
    ],
    'Block Color' => ['type'  => 'color', 'set_width' => '33.333',],
    'Text Color' => ['type'  => 'color', 'set_width' => '33.333',],
    'Text Alignment Mobile' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Tablet' => ['type'  => 'text_align', 'set_width' => '33.333',],
    'Text Alignment Desktop' => ['type'  => 'text_align', 'set_width' => '33.333',],


]);
