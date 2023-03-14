<?php


$gbcCF->create_component('Section Image',[
    'Section Size' => [
        'type' => 'select',
        'add_options' => array(
            'xl' => 'XL',
            'lg' => 'LG',
            'md' => 'MD',
            'sm' => 'SM',
        )
    ],
    'Background Color' => [ 'type'  => 'color', 'set_width' => '50',],
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
]);

