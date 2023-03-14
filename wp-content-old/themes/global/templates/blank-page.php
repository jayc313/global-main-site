<?php
/*
 * Template Name: Blank Canvas
 */

 get_header(); 

$components = carbon_get_the_post_meta( 'components' );

foreach($components as $comp) {
    get_template_part('parts/' . $comp['_type'] . '/part', null, $comp);
}

get_footer();
   


