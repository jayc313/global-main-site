<?php


$gbcCF->create_component('Spacer Default',[
    'Spacer Height Mobile' => [
        'type'  => 'text',
        'set_width' => '33.333',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
        'set_help_text' => 'Add space between components (Min: 1, Max: 6)',
        'header_template' => '
        <% if (spacer_height_desktop) { %>
            Spacer: <%- spacer_height_desktop %>
        <% } else { %>
            Spacer
        <% }  %>


        '
    ],
    'Spacer Height Tablet' => [
        'type'  => 'text',
        'set_width' => '33.333',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
        'set_help_text' => 'Add space between components (Min: 1, Max: 6)',

    ],
    'Spacer Height Desktop' => [
        'type'  => 'text',
        'set_width' => '33.333',
        'atts'  => [
            ['type', 'number'],
            ['max', 6],
            ['min', 1]
        ],
        
        'set_help_text' => 'Add space between components (Min: 1, Max: 6)',
      
    ],
]);