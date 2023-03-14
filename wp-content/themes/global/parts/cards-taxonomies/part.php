<?php

$terms = get_terms( array(
    'taxonomy' => $args['cards'], // Change this to your custom taxonomy
    'hide_empty' => false
) );

global $post;
$post_slug = $post->post_name;

$styles = output_styles([
    'background-color' => $args['active-color'],
    'color' => $args['active-text-color']

]);


$mobileAlign = "ta{$args['text-alignment-mobile']}";
$tabletAlign = "ta{$args['text-alignment-tablet']}-lg"; 
$desktopAlign = "ta{$args['text-alignment-desktop']}-xl"; 

$compStyles = output_component_styles($args);




?>

<div class="cards">
    <div class="container">
        <div class="row justify-content--center <?php echo "$mobileAlign $tabletAlign $desktopAlign"; ?>">
            <div class="<?php echo $compStyles['container']['width'] ? $compStyles['container']['width'] : "col-12 col-md-10"; ?>">
                <div class="row justify-content--center">
                    <?php foreach($terms as $term) :
                        $active = $term->slug == $post_slug ? true : false;
                        $image = carbon_get_term_meta( $term->term_id, 'term-image' );
                    ?>
                        <div class="<?php echo $compStyles['content']['width'] ? $compStyles['content']['width'] : "col-12 col-md-3"; ?>">
                            <a href="<?php echo site_url() . '/' . $args['url'] . '/' . $term->slug; ?>">
                                <div class="small-image-holder">
                                    <?php media_output($image, 'full', ['class' => 'bg-media']); ?>
                                </div>
                                <div class="card__content pv-2 ph-1 bg-primary--grey-light" <?php echo $active ? $styles : ''; ?>>
                                    <h4 class="mb-half"><?php echo $term->name; ?></h4>
                                    <p><?php echo $term->description; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div> 