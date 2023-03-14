<?php

$styles = output_styles([
    'background-color'  => $args['color'],
    'color'             => $args['text-color']
]);


$isArchive = $args['archive-page'] ? true : false;  
$taxonomy = $args['archive-taxonomies'] ? get_taxonomy($args['archive-taxonomies']) : false; 

$compStyles = output_component_styles($args);

$chevron = output_chevron();


?>
<div class="gbc-posts-grid">
    <!-- <img src="https://via.placeholder.com/1280x720.png" alt="" class="bg-media"> -->
    <div class="container">
        <div class="row justify-content--center tac <?php echo $compStyles['container']['padding'] ? $compStyles['container']['padding'] : ""; ?>">

            <div class="<?php echo $compStyles['container']['width'] ? $compStyles['container']['width'] : "col-12"; ?>">
                <div class="row justify-content--center">
                    <?php foreach ($args['posts'] as $i => $blockPost) :
                    
                        $isTax = ($blockPost['type'] == 'term') ? true : false;
                        $id = $isTax ? get_term($blockPost['id']) : $blockPost['id'];
                        $isFilter = isset($args['filter-page']) && $args['filter-page'] ? true : false;

                        if ($isFilter) {
                            $termID = get_term_by('slug', $args['terms'], $args['taxonomies'])->term_id;

                            $url = esc_url(get_the_permalink($blockPost['id']) . "?tax_input[{$args['taxonomies']}][]=$termID");
                        } else {
                            $url = $isTax ? esc_url(get_permalink( get_page_by_path( $args['post-type'] ) ) . "?tax_input[{$taxonomy->name}][]=" .get_term($blockPost['id'], $taxonomy->name)->term_id) : get_permalink($blockPost['id']);
                        }
                    
                    
                        ?>
                        <div class="<?php echo $compStyles['content']['width'] ? $compStyles['content']['width'] : "col-12 col-lg-6 col-xl-3"; ?> mb-2">
                            <a href="<?php echo $url; ?>">
                                <div class="small-image-holder">
                                    <?php
                                     if ($blockPost['type'] == 'term') {
                                        media_output(carbon_get_term_meta($blockPost['id'], 'term-image'), 'full', ['class' => 'bg-media']);
                                     } else {
                                        the_media_output($blockPost['id'], ['class' => 'bg-media']);
                                     }
                                    ?>
                                </div>
                                <div class="gbc-posts-grid__title pv-1 c-primary--white bg-primary--grey ph-1" <?php echo $styles; ?>>
                                    <h4><?php
                                        if ($blockPost['type'] == 'term') {
                                            if (carbon_get_term_meta($blockPost['id'], 'term-nice-name')) {
                                                echo carbon_get_term_meta($blockPost['id'], 'term-nice-name');
                                            } else {
                                                echo get_term($blockPost['id'])->name;
                                            }
                                        } else {
                                            echo get_the_title($blockPost['id']);
                                        }

                                        echo $chevron['horizontal'];
                                    ?>
                                    </h4>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>

