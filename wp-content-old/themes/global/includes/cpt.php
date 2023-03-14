<?php
use Carbon_Fields\Field;
use Carbon_Fields\Container;


function gbc_create_post_type($singleName, $pluralName, $public = true, $textDomain, $description = null, $hierarchical = true) {
    $description = $description ? $description : "$singleName Posts";

    $labels = array(
        'name'                => _x( $pluralName, 'Post Type General Name', $textDomain ),
        'singular_name'       => _x(  $singleName, 'Post Type Singular Name', $textDomain ),
        'menu_name'           => __( $pluralName, $textDomain ),
        'parent_item_colon'   => __( 'Parent ' . $singleName, $textDomain ),
        'all_items'           => __( 'All ' . $pluralName, $textDomain ),
        'view_item'           => __( 'View ' . $singleName, $textDomain ),
        'add_new_item'        => __( 'Add New ' . $singleName, $textDomain ),
        'add_new'             => __( 'Add New', $textDomain ),
        'edit_item'           => __( 'Edit ' . $singleName, $textDomain ),
        'update_item'         => __( 'Update ' . $singleName, $textDomain ),
        'search_items'        => __( 'Search ' . $singleName, $textDomain ),
        'not_found'           => __( 'Not Found', $textDomain ),
        'not_found_in_trash'  => __( 'Not found in Trash', $textDomain ),
    );

    $args = array(
        'label'               => __( sanitize_title($pluralName), $textDomain ),
        'description'         => __( $description, $textDomain ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => $hierarchical,
        'public'              => $public,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
  
    );
      
    // Registering your Custom Post Type
    register_post_type( sanitize_title($pluralName), $args );
}


function gbc_create_taxonomy($singleName, $pluralName, $postTypes = array()) {
  
    $labels = array(
        'name' => _x( $pluralName, 'taxonomy general name' ),
        'singular_name' => _x( $singleName, 'taxonomy singular name' ),
        'search_items' =>  __( 'Search ' . $pluralName ),
        'all_items' => __( 'All ' . $pluralName ),
        'parent_item' => __( 'Parent ' . $singleName ),
        'parent_item_colon' => __( 'Parent : . $singleName' ),
        'edit_item' => __( 'Edit ' . $singleName ), 
        'update_item' => __( 'Update ' . $singleName ),
        'add_new_item' => __( 'Add New ' . $singleName ),
        'new_item_name' => __( 'New '.$singleName.' Name' ),
        'menu_name' => __( $pluralName ),
      );    
      
    // Now register the taxonomy
      register_taxonomy(sanitize_title($singleName),$postTypes, array(
        'hierarchical' => true,
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => sanitize_title($singleName) ),
      ));
}



  add_action( 'carbon_fields_register_fields', 'gbc_attach_term_meta' );
  function gbc_attach_term_meta() {

    $taxes = [];
    $args = array(
        '_builtin' => false,
    );
    $custom_taxonomies = get_taxonomies( $args );
    foreach ( $custom_taxonomies as $taxonomy ) {
        $taxes[] = $taxonomy;
    }

    Container::make( 'term_meta', __( 'Term Options', 'safetell' ) )
        ->where( 'term_taxonomy', 'IN', $taxes ) // only show our new field for categories
        ->add_fields( array(
            Field::make( 'text', 'term-nice-name', 'Nice Name' ),
            Field::make( 'image', 'term-image', 'Image' ),
            Field::make( 'text', 'term-order', 'Order' )
                ->set_attribute( 'type', 'number' )
                ->set_attribute( 'min', '0' )


        ) );
  }





