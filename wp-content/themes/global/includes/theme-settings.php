<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Field\Complex_Field;

add_action( 'carbon_fields_register_fields', 'gbc_theme_options_meta' );
function gbc_theme_options_meta() {

        global $gbcCF;
      $themeOptionsPage = Container::make( 'theme_options', 'Theme Options' )
        ->add_tab( __('Identity'), array(
            Field::make( 'separator', 'identity-sep', 'Identity' ),
            Field::make( 'image', 'site-logo', 'Site Logo' ),
            Field::make( 'image', 'site-footer-logo', 'Site Footer Logo' ),
            Field::make( 'image', 'favicon', 'Favicon' ),




        ) )
        ->add_tab( __('Styling'), array(
          Field::make( 'separator', 'colors-sep', 'Colors' ),
          Field::make( 'color', 'bg-primary-color', 'Background Primary Color' )->set_width(33.333),
          Field::make( 'color', 'bg-secondary-color', 'Background Secondary Color' )->set_width(33.333),
          Field::make( 'color', 'bg-tertiary-color', 'Background Tertiary Color' )->set_width(33.333),
          Field::make( 'color', 'content-primary-color', 'Content Primary Color' )->set_width(33.333),
          Field::make( 'color', 'content-secondary-color', 'Content Secondary Color' )->set_width(33.333),
          Field::make( 'color', 'content-tertiary-color', 'Content Tertiary Color' )->set_width(33.333),
 



        ) )
        ->add_tab( __('Links'), array(
          Field::make( 'separator', 'chev-sep', 'Chevrons' ),
          Field::make( 'checkbox', 'link-chevron-enable', __( 'Enable Chevrons' ) ),
          Field::make( 'icon', 'link-h-chevron', 'Chevron Icon Horizontal' )
               ->set_conditional_logic( array(
                  array(
                    'field' => 'link-chevron-enable',
                    'value' => true,
                  )
                ) ),
          Field::make( 'icon', 'link-v-chevron', 'Chevron Icon Vertical' )
               ->set_conditional_logic( array(
                  array(
                    'field' => 'link-chevron-enable',
                    'value' => true,
                  )
                ) ),

 



        ) );

        Container::make( 'theme_options', 'Footer' )
        ->set_page_parent( $themeOptionsPage ) 
        ->add_tab( __('Content'), array(
          Field::make( 'separator', 'social-sep', 'Social' ),

            Field::make( 'complex', 'social', 'Social' )
              ->set_layout('tabbed-horizontal')
              ->add_fields( array(
                Field::make( 'icon', 'icon', 'Icon' ),
                Field::make( 'text', 'link', 'Link' )
                  ->set_attribute('type','url')
              ) ),
              Field::make( 'separator', 'contact-sep', 'Contact' ),

              Field::make( 'text', 'contact-mobile', 'Mobile' ),
              Field::make( 'text', 'contact-email', 'Email' ),
              Field::make( 'text', 'contact-extra', 'Extra Details' ),

              Field::make( 'separator', 'content-sep', 'Content Areas' ),
              Field::make( 'rich_text', 'content-1', 'Content area 1' ),
              Field::make( 'rich_text', 'content-2', 'Content area 2' ),



        ) );
}

add_action( 'wp_head', 'glo_generate_default_styles');
function glo_generate_default_styles() {

  echo "<style>
    .bg-primary { background-color: ".carbon_get_theme_option('bg-primary-color')."; }
    .bg-secondary { background-color: ".carbon_get_theme_option('bg-secondary-color')."; }
    .bg-tertiary { background-color: ".carbon_get_theme_option('bg-tertiary-color')."; }

    .content-primary { color: ".carbon_get_theme_option('content-primary-color')."; }
    .content-secondary { color: ".carbon_get_theme_option('content-secondary-color')."; }
    .content-tertiary { color: ".carbon_get_theme_option('content-tertiary-color')."; }
    </style>";

}