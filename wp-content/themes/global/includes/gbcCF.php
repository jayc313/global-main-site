<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

class GBC_CF {

public $allComponents = [];
public $colorPallet = [];
public $currentComponentSlug;

/**
 * Create CF Component
 *
 * @param String $name
 * @param Array $fields
 * @return Array
 */
function create_component($name, $fields) {

    $componentIndex = 0;
    $componentFields = [];
    $headerTemplate = null;

    $componentFields[] = Field::make('separator', sanitize_title($name) . '_sep', $name);

    $componentFields[] =  Field::make('html', 'crb_html', __('Section Description'))
        ->set_html('<img src="'. get_stylesheet_directory_uri() . '/parts/' . sanitize_title($name) . '/preview.png" />');

    foreach ($fields as $fName => $field) {

        // Create Field Name
        $fieldName = !isset($name) ? $field['type'] . '_' . $componentIndex : $fieldName = $fName;

        $hasHeaderTemplate = isset($field['header_template']) && $field['header_template'];
        $hasAttributes = isset($field['atts']) && $field['atts'];
        $hasOptions = isset($field['options']) && $field['options'];

        // Create field type
        switch ($field['type']) {
            case 'links':
                $newField = $this->link_component(sanitize_title($fieldName));
                break;
            case 'color':
                $newField = $this->color_component(sanitize_title($fieldName));
                break;
            case 'heading_select':
                $newField = $this->heading_select_component(sanitize_title($fieldName));
                break;
            case 'text_align':
                $newField = $this->content_align_component(sanitize_title($fieldName));
                break;
            case 'taxonomies':
                $newField = $this->get_registered_taxonomies(sanitize_title($fieldName));
                break;
            case 'post_types':
                $newField = $this->get_registered_post_types(sanitize_title($fieldName));
                break;
            case 'tab':
                $newField = $this->get_registered_taxonomies(sanitize_title($fieldName));
                break;
            case 'terms':
                $newField = $this->get_registered_taxonomy_terms(sanitize_title($fieldName));
                break;
            case 'styles':
                $newField = $this->component_styles(sanitize_title($fieldName));

                foreach($newField as $field) {
                    $componentFields[] = $field;
                    $componentIndex++;
                }
                continue 2;
                
                break;
            case 'complex':
                if (is_array(($field['fields'][0]))) {
                    $newField = Field::make($field['type'], sanitize_title($fieldName), $fieldName);
                    foreach($field['fields'] as $field) {
                        $newField->add_fields($field[0], $field[1]);
                    }
                } else {
                    $newField = Field::make($field['type'], sanitize_title($fieldName), $fieldName)
                        ->add_fields($field['fields']);
                }
         
                break;
            case 'custom_association':

                $types = [];
                $postTypes = get_post_types(array('_builtin' => false));

                $types[] = array('type' => 'post', 'post_type' => 'page');

                foreach ($postTypes as $postType) {
                    $types[] = array(
                        'type' => 'post',
                        'post_type' => $postType
                    );
                }

                $taxonomies = $this->get_registered_taxonomies(null, true);

                foreach($taxonomies as $taxSlug => $taxName) {
                    $types[] = array(
                        'type' => 'term',
                        'taxonomy' => $taxSlug
                    );
                }

              // var_dump($types);

                $newField = Field::make('association', sanitize_title($fieldName), $fieldName)
                          ->set_types( $types );
                        

                break;
            default:
                $newField = Field::make($field['type'], sanitize_title($fieldName), $fieldName);
                break;
        }

        foreach ($field as $fieldSettingName => $fieldSetting) {
            // Type already set
      
            if (in_array($fieldSettingName, ['type', 'header_template', 'atts', 'fields',]) || !is_string($fieldSettingName)) {
                continue;
            }

            // Assign all options
            $newField->$fieldSettingName($fieldSetting);
        }

        // if (isset($field['conditions'])) {
        //     $newField->set_conditional_logic($field['conditions']);
        // }


        if ($hasHeaderTemplate) {
            $headerTemplate = $field['header_template'];
        }

        // Set Field Atts
        if ($hasAttributes) {
            foreach ($field['atts'] as $att) {
                $newField->set_attribute($att[0], $att[1]);
            }
        }

        // Field options
        if ($hasOptions) {
            $newField->add_options($field['options']);
        }

        // echo "added ${fieldName} <br/>";
        // Add component fields to collection
        $componentFields[] = $newField;

        unset($newField);

        $componentIndex++;
    }



    // Add component fields collection to component collection
    $this->allComponents[$name] = [$name, $componentFields,  $headerTemplate];

    return [$name, $componentFields, $headerTemplate];
}

function create_component_block($component) {


    
    

    wp_register_style(
        sanitize_title($component[0]),
        get_stylesheet_directory_uri() . '/parts/' . sanitize_title($component[0]) . '/style.css'
    );

    array_shift($component[1]);

   // wp_enqueue_style(sanitize_title($component[0]));

    Block::make(__($component[0]))
        ->add_fields($component[1])
      ->set_editor_style( sanitize_title($component[0]) )
      ->set_inner_blocks(true)
      ->set_category( strtok(sanitize_title($component[0]),'-'), strtok($component[0], ' '))
        ->set_inner_blocks_position('below')

        ->set_render_callback(function ($args, $attributes, $inner_blocks) {
    

            $currentPart = str_replace('_sep', '', array_keys($args)[0]);

            $args['inner_blocks'] = $inner_blocks;
            
            get_template_part('parts/'.$currentPart.'/part', null, $args);
        });
}

function get_registered_taxonomy_terms($slug) {
    $terms = get_terms( array(
        'hide_empty' => true,
    ) );
    $taxes = [];
 
    foreach ( $terms as $term ) {
        $taxes[sanitize_title($term->slug)] = ucfirst($term->name);
    }


    $comp = Field::make('select', $slug)
    ->add_options($taxes);

    return $comp;
}

function get_registered_taxonomies($slug, $return = false){
    $taxes = [];
    $args = array(
        'public'   => false,
        '_builtin' => false,
    );
    $custom_taxonomies = get_taxonomies( $args );
    foreach ( $custom_taxonomies as $taxonomy ) {
        $taxes[sanitize_title($taxonomy)] = ucfirst($taxonomy);
    }

    if ($return) {
        return $taxes;
    }

    $comp = Field::make('select', $slug)
    ->add_options($taxes);

    return $comp;
}

function get_registered_post_types($slug, $return = false){
    $post_types = [];
    $args = array(
        'public'   => true,
        '_builtin' => false,
    );
    $custom_post_types = get_post_types( $args );
    foreach ( $custom_post_types as $post_type ) {
        $post_types[sanitize_title($post_type)] = ucfirst($post_type);
    }

    if ($return) {
        return $post_types;
    }

    $comp = Field::make('select', $slug)
    ->add_options($post_types);

    return $comp;
}

function post_meta_container($templates, $name, $postType = null){
    $container  = Container::make( 'post_meta', sanitize_title($name), $name );

    // Display on post template
    $container->where( 'post_template', 'IN', $templates );

    // Show on post type
    if ($postType) {
        $container->or_where( 'post_type', 'IN', $postType );
    }

    // Show on front page
    if (in_array("front", $templates) ) {
        $container->or_where('post_id', '=', get_option('page_on_front'));
    }


    $complex = Field::make( 'complex', sanitize_title('components'), 'Components' )
        ->set_layout('tabbed-vertical');

    $container->add_fields([
        $complex
    ]);

    foreach ($this->allComponents as $component) {

        $complex->add_fields(sanitize_title($component[0]), $component[1])->set_header_template( $component[2] );
        
    }


    
    return [$container, $complex];
}

function link_component($slug) {
    $comp = Field::make('complex', $slug)
        ->setup_labels( ['plural_name' => 'Links', 'singular_name' => 'Link'] )
        ->add_fields('links-url', array(
            Field::make('text', 'title'),
            Field::make('text', 'url', __('URL'))
            ->set_attribute('type', 'url'),
            Field::make('checkbox', 'border-radius', __('Round Corners'))
                ->set_width(50),
            $this->color_component('color'),
            Field::make( 'checkbox', 'outline', __( 'Outline' ) )
                ->set_width(50),
            $this->color_component('outline-color')
                ->set_width(50),
            $this->color_component('text-color'),
            


    
        ))
        ->set_header_template( '
        <% if (title) { %>
            <%- title %>
        <% } %>
        ' )
        ->add_fields('links-page', array(
            Field::make('text', 'title'),
            Field::make( 'association', 'url', __( 'Page' ) )
            ->set_types( array(
                array( 'type' => 'post', 'post_type' => 'post'),
                array( 'type' => 'post', 'post_type' => 'page')
            ) )
            ->set_max( 1 )
            ->set_min( 1 ),
            Field::make('checkbox', 'border-radius', __('Round Corners'))
            ->set_width(50),
            $this->color_component('color'),
            Field::make( 'checkbox', 'outline', __( 'Outline' ) )
                ->set_width(50),
            $this->color_component('outline-color')
                ->set_width(50),
            $this->color_component('text-color'),


        ))
        ->set_header_template( '
        <% if (title) { %>
           <%- title %>
        <% } %>
        ' )
        ->set_layout('tabbed-horizontal');;
        
        return $comp;
    }


    function color_component($slug) {
        $comp = Field::make( 'color', $slug )
        ->set_palette( $this->colorPallet );

        return $comp;
    }

    function heading_select_component($slug) {
        $comp = Field::make('select', $slug)
            ->add_options(array(
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
            ));

            return $comp;

    }


    function content_align_component($slug) {
        $comp = Field::make('select', $slug)
            ->add_options(array(
                ''  => 'Default',
                'l' => 'Left',
                'c' => 'Center',
                'r' => 'Right',
            ));

        return $comp;
    }




    function component_styles($slug) {

        $comp = [
            Field::make('separator', 'open-sep-1', ''),

            Field::make('separator', 'open-sep-2', 'Styling   V')->set_classes( 'accord-open' ),


            Field::make('separator', 'container-pad-sep', 'Container Padding'),
            Field::make('text', 'container-vertical-padding-xl', __('Container Vertical Padding (Desktop)'))->set_width(25),
            Field::make('text', 'container-vertical-padding-lg', __('Container Vertical Padding (Laptop)'))->set_width(25),
            Field::make('text', 'container-vertical-padding-md', __('Container Vertical Padding (Tablet)'))->set_width(25),
            Field::make('text', 'container-vertical-padding', __('Container Vertical Padding (Mobile)'))->set_width(25),
            Field::make('text', 'container-horizontal-padding-xl', __('Container Horizontal Padding (Desktop)'))->set_width(25),
            Field::make('text', 'container-horizontal-padding-lg', __('Container Horizontal Padding (Laptop)'))->set_width(25),
            Field::make('text', 'container-horizontal-padding-md', __('Container Horizontal Padding (Tablet)'))->set_width(25),
            Field::make('text', 'container-horizontal-padding', __('Container Horizontal Padding (Mobile)'))->set_width(25),


            Field::make('separator', 'container-width-sep', 'Container Width'),
            Field::make('text', 'container-width-xl', __('Container Width (Desktop)'))->set_width(25),
            Field::make('text', 'container-width-lg', __('Container Width (Laptop)'))->set_width(25),
            Field::make('text', 'container-width-md', __('Container Width (Tablet)'))->set_width(25),
            Field::make('text', 'container-width', __('Container Width (Mobile)'))->set_width(25),

            Field::make('separator', 'content-pad-sep', 'Content Padding'),
            Field::make('text', 'content-vertical-padding-xl', __('Content Vertical Padding (Desktop)'))->set_width(25),
            Field::make('text', 'content-vertical-padding-lg', __('Content Vertical Padding (Laptop)'))->set_width(25),
            Field::make('text', 'content-vertical-padding-md', __('Content Vertical Padding (Tablet)'))->set_width(25),
            Field::make('text', 'content-vertical-padding', __('Content Vertical Padding (Mobile)'))->set_width(25),
            Field::make('text', 'content-horizontal-padding-xl', __('Content Horizontal Padding (Desktop)'))->set_width(25),
            Field::make('text', 'content-horizontal-padding-lg', __('Content Horizontal Padding (Laptop)'))->set_width(25),
            Field::make('text', 'content-horizontal-padding-md', __('Content Horizontal Padding (Tablet)'))->set_width(25),
            Field::make('text', 'content-horizontal-padding', __('Content Horizontal Padding (Mobile)'))->set_width(25),

            Field::make('separator', 'content-width-sep', 'Content Width'),
            Field::make('text', 'content-width-xl', __('Content Width (Desktop)'))->set_width(25),
            Field::make('text', 'content-width-lg', __('Content Width (Laptop)'))->set_width(25),
            Field::make('text', 'content-width-md', __('Content Width (Tablet)'))->set_width(25),
            Field::make('text', 'content-width', __('Content Width (Mobile)'))->set_width(25),

            Field::make('separator', 'colors-sep', 'Colors'),
            Field::make('color', 'container-bg-color', __('Container Background Color'))->set_width(50),

            Field::make('color', 'content-bg-color', __('Content Background Color'))->set_width(50),
            Field::make('color', 'content-color', __('Content Text Color'))->set_width(50),

            Field::make('separator', 'close-sep-2', '')->set_classes( 'accord-close' ),


        ];

        return $comp;

 
    }



}
$gbcCF = new GBC_CF();



add_action('admin_footer', 'gbc_cf_seperators');
function gbc_cf_seperators() {
    echo "
    <script>
  var active = false;

    document.querySelector('fieldset.container-carbon_fields_container_builder').addEventListener('click', function(){
          if (active == false) {
            var test = document.querySelectorAll('.cf-complex__inserter-item')
            var oldWord = \"\"
            var wrapCont = [];


    for (let index = 0; index < test.length; index++) {
        var newWord = test[index].innerText;
        if (!newWord.includes('-')) { continue; }

        var firstWord = newWord.replace(/-.*/,'');

   
        var compName = newWord.split('-');
        compName.shift();
        test[index].innerText = compName.join(' ');

        test[index].innerHTML += '<img src=\'../wp-content/themes/global/parts/'+newWord+'/preview.png\' />';

        if (firstWord !== oldWord){
 
            oldWord = firstWord;
            

            test[index].insertAdjacentHTML('beforebegin', '<li class=\"asterisk\" style=\"\">'+firstWord+'</li>');
        }

    }
}
})




</script>
    <style>
    ul.cf-complex__inserter-menu[hidden] {
        display: none;
    }
    ul.cf-complex__inserter-menu {
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        width: 100%;
        max-width: 100%;
        min-width: 450px;

    }

    ul.cf-complex__inserter-menu li.asterisk {
        background: #fbfbfc;
        padding: 10px;
        border-bottom: 1px solid #d7d7d7;
        border-top: 1px solid #d7d7d7;
        margin-bottom: 0px;
        flex-basis: 100%;
        font-weight: bold;
    }

    ul.cf-complex__inserter-menu li {
        flex: 0 0 15%;
        box-sizing: border-box;
  
    }

    ul.cf-complex__inserter-menu .cf-complex__inserter-item {
        border-right: 1px solid #d7d7d7;
        font-weight: 300;
    }

    ul.cf-complex__inserter-menu .cf-complex__inserter-item:hover {
        background: #fbfbfc;
    }

    .focal-pointer {
        background: lightgrey;
        width:20px;
        height:20px;
        border-radius: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        border: 2px solid lightgrey;
    }

    .focal-picker-img {
            -webkit-user-drag: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }

    .data-seperate {
        background: #f0f0f1;
    }

    .postbox ul.cf-complex__inserter-menu li {
        color: #000;
    }
    .postbox ul.cf-complex__inserter-menu {
        background: #f0f0f1;
        color: #000;
    }


    .editor-styles-wrapper {
        background: #e5e5e5;
    }

    div.cf-complex__tabs.cf-complex__tabs--tabbed-vertical {
        position: relative;
        z-index: 9999;
    }

    .cf-container .cf-field.accord-open {
        display: block;
        cursor: pointer;
    }
    .cf-container .cf-field.closed {
        display: none;
    }

    .cf-separator.accord-open.open h3:after {
        transform: rotate(180deg);
    }
    .cf-separator.accord-open h3:after {
        content: 'V';
        position: absolute;
        right: 20px;
        transition: 0.3s transform ease-in-out;
    }

    .cf-field.cf-separator.accord-field {
        background: #f0f0f1;
    }
    .cf-field.accord-field {
        
    }

    .postbox ul.cf-complex__inserter-menu li:hover > img {
        display: block;
    }
    .postbox ul.cf-complex__inserter-menu li > img {
        position: absolute;
        left: 100%;
        bottom: 100%;
        width: 400px;
        height: auto;
        max-width: 400px;
        transform: translate(0%, 50%);
        z-index: 9;
        border: 1px solid grey;
        display: none;
    }
    .postbox ul.cf-complex__inserter-menu li {
        position: relative;
    }
    
    
    </style>
    ";
}