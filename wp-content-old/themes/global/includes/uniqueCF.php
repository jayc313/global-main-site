<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Field\Complex_Field;

// Load fields and containers
add_action( 'carbon_fields_register_fields', 'gbc_unique_fields' );
function gbc_unique_fields() {
    // Case studies
    Container::make( 'post_meta', 'Custom Data' )
        ->where( 'post_type', '=', 'case-studies' )        
        ->add_fields( array(
         

        ) );
        
}









