<?php

$gbcCF->create_component('Buttons Default', [
    'Links' => [
        'type' => 'association',
        'set_min' => 1,
        'set_max' => 6,
        'set_types' => [
            array(
                'type' => 'post',
                'post_type' => 'page',
            ),
            array(
                'type' => 'post',
                'post_type' => 'post',
            ),
        ]
    ],
    'Button Text' => ['type'=>'text' ],
  

]);
