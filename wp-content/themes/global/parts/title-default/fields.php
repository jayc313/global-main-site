<?php

$gbcCF->create_component('Title Default', [
    'Section Title' => [
        'type' => 'rich_text',
        'header_template' => '
        <% if (section_title) { %>
            Title: <%- section_title %>
        <% } else { %>
            Title
        <% } %>
        '
    ],
    'Title Content' => [
        'type' => 'rich_text'
    ],
    'Title links' => [
        'type' => 'links'
    ]
    
]);