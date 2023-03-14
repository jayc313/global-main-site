<?php

$defaultHero = $gbcCF->create_component('Hero Default',[
    'Hero Image' => [
        'set_width' => '50',
        'type' => 'image',
        'set_classes' => 'focal-pick-activate'

    ],
    'Full Screen' => [
        'type' => 'checkbox',
    ],
    'Multiply Color' => [
        'type' => 'color',
    ],

]);

$gbcCF->create_component_block($defaultHero);