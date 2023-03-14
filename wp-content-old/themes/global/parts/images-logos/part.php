<?php

$styles = output_styles([
    'background-color'  => $args['color'],
    'color'             => $args['text-color']
]);

$compStyles = output_component_styles($args);


?>

<div class="images-logos bg-primary--blue c-primary--white <?php echo $compStyles['container']['padding'] ? $compStyles['container']['padding'] : "pv-3 ph-3 pv-md-3 ph-md-3 pv-lg-3 ph-lg-3 pv-xl-3 ph-xl-3"; ?>" <?php echo $styles; ?>>
    <div class="container">
        <div class="row justify-content--center tac">
            <div class="<?php echo $compStyles['container']['width'] ? $compStyles['container']['width'] : "col-12 col-md-10 col-lg-8 col-xl-8"; ?>">
                <?php 
                if ($args['title']) {
                    echo '<div class="mb-2">';
                    echo apply_filters('the_content', $args['title']); 
                    echo "</div>";
                }
                ?>
                <div class="row  justify-content--center">
                    <?php foreach($args['images'] as $logo) :  ?>
                        <?php media_output($logo['image'], 'large', ['class' => $compStyles['content']['width'] ? $compStyles['content']['width'] : "col-6 col-md-4 col-lg-3 col-xl-2"]); ?>
                    <?php endforeach; ?>



                </div>
            </div>
        </div>
    </div>
</div>