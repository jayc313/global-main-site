<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

// Setup
require_once(get_stylesheet_directory() . '/includes/setup.php');
require_once(get_stylesheet_directory() . '/includes/gbcCF.php');
require_once(get_stylesheet_directory() . '/includes/output.php');
require_once(get_stylesheet_directory() . '/includes/cpt.php');
require_once(get_stylesheet_directory() . '/includes/uniqueCF.php');

require_once(get_stylesheet_directory() . '/includes/theme-settings.php');


// Load fields and containers
add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {

    $gbcCF = new GBC_CF();

    //Color pallete
    $gbcCF->colorPallet = [
        carbon_get_theme_option('bg-primary-color'),
        carbon_get_theme_option('bg-secondary-color'),
        carbon_get_theme_option('bg-tertiary-color'),
        carbon_get_theme_option('content-primary-color'),
        carbon_get_theme_option('content-secondary-color'),
        carbon_get_theme_option('content-tertiary-color'),
        
    ];

    // Autoload Fields
    require_once(get_stylesheet_directory() . '/parts/autoload.php');

    // Create Container
    $builderContainer = $gbcCF->post_meta_container([
        'front',
        'templates/blank-page.php',
    ], 'Builder' ); // Done


}

// CPT
// gbc_create_post_type('Case Study', 'Case Studies', true, 'safetell', null, true);





