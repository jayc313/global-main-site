<?php get_header(); ?>


<?php

$components = carbon_get_the_post_meta( 'components' );

foreach($components as $comp) {
    get_template_part('parts/' . $comp['_type'] . '/part', null, $comp);
}

?>
   


 
<?php get_footer(); ?>