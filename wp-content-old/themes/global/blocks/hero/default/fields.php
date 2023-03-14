<?php

use Carbon_Fields\Block;
use Carbon_Fields\Field;



function gbc_hero_block(){

    wp_register_style(
        'gbc-block-styles',
        get_stylesheet_directory_uri() .'/main.css'
    );
    wp_enqueue_style('gbc-block-styles');


Block::make( __( 'Hero' ) )
	->add_fields( array(
        Field::make( 'separator', 'hero-seperator', __( 'Hero - block' ) ),

	) )
    ->set_inner_blocks_template( array(
		array( 'core/cover' ),
	) )
    ->set_style( 'gbc-block-styles' )
    ->set_inner_blocks( true )
    ->set_inner_blocks_position( 'below' )
	->set_inner_blocks_template_lock( 'all' )

	->set_render_callback( function ( $args, $attributes, $inner_blocks ) {

		?>

        <div class="gbc-banner">
            <?php 
            $container = isset($args['full-width']) && !$args['full-width'] ? "<div class='container'><div class='row'><div class='col-12'>$inner_blocks</div></div></div>" : $inner_blocks; 
            echo $container;
             ?>
        </div>


		<?php
	} );
}
add_action( 'carbon_fields_register_fields', 'gbc_hero_block' );
