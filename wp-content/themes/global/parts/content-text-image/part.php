<?php

$styles = output_styles([
    'background-color' => $args['content-color'],
    'color' => $args['text-color']
]);

$rounded = $args['rounded'] ? true : false;

?>

<div class="content-image-split <?php echo $rounded ? 'rounded' : ''; ?>">
    <div class="container">

        <div class="row mh-0">
        <?php if ($args['content-overlay']) { media_output($args['background'], 'large', ['class' => 'bg-media']); } ?>

        <?php 
        if (!$args['content-overlay'] && !$args['layout-reverse']) {
            echo '<div class="col-12 col-xl-6 order-1 small-image-holder">';
            media_output($args['background'], 'large', ['class' => 'bg-media']);
            echo "</div>";
        }
        ?>
        <div class="col-12 col-xl-6 order-2 order-xl-1 <?php if ($args['content-overlay'] && $args['layout-reverse']) { echo "offset-xl-6"; } ?> bg-secondary content-secondary para content-area-default" <?php echo $styles; ?>>
            
            <div class="wrap pv-<?php echo $args['content-padding-vertical']; ?> ph-<?php echo $args['content-padding-horizontal']; ?>">
                <<?php echo $args['title-heading']; ?> class="mb-1">
                    <?php echo $args['content-title']; ?>
                </<?php echo $args['title-heading']; ?>>
                <?php echo apply_filters('the_content', $args['content']); ?>
                <?php
                if ($args['content-links']) {
                    echo '<div class="mt-2"></div>';
                    output_buttons($args['content-links']);
                }
                ?>
            </div>


        </div>

        <?php 
        if (!$args['content-overlay'] && $args['layout-reverse']) {
            echo '<div class="col-12 col-xl-6 order-1 order-xl-2 small-image-holder">';
            media_output($args['background'], 'large', ['class' => 'bg-media']);
            echo "</div>";
        }
        ?>
     
        </div>
    </div>
</div>

