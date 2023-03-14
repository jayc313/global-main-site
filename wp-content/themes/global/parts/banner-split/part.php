<?php

$rounded = $args['rounded'] ? true : false;
$contain = $args['contain-image'] ? 'contain' : null;
?>

<div class="content-image-split pv-<?php echo $args['banner-padding']; ?>" style="background-color: <?php echo $args['background-color']; ?>;">
    <div class="container">
        <div class="row">
            <div class="col-12 " >

                <div class="row fdir-cr <?php  if ($args['reverse']) { echo 'fdir-rr-lg'; } else {echo 'fdir-r-lg';}  echo $rounded ? ' rounded' : '';?> ">
                    <div class="content-side df pv-2 ph-1 ph-lg-3 c-primary--white content col-12 col-lg-<?php echo $args['content-width']; ?>" style="
                    background-color: <?php echo $args['banner-color']; ?>;
                    color: <?php echo $args['text-color']; ?>;
                    align-items: center; ">

                        <div>
                            <?php if ( $args['banner-title']) : ?>
                                <h3 class="mb-1"><?php echo $args['banner-title']; ?></h3>
                            <?php endif; ?>
                            <?php echo apply_filters('the_content', $args['banner-content']); ?>
                            <?php output_buttons($args['banner-links']); ?>
                        </div>

                    </div>
                    <div class="img-side small-image-holder col-12 col-lg-<?php echo $args['image-width']; ?> df" style="align-items: center; background-color: <?php echo $args['banner-color']; ?>;  color: <?php echo $args['text-color']; ?>; <?php echo !$args['banner-content-2'] ? 'aspect-ratio: 1/1;' : null; ?>">
                    
                    <?php echo $args['banner-content-2'] ? apply_filters('the_content', $args['banner-content-2']) : null; ?>
                    <?php !$args['banner-content-2'] ? media_output($args['banner-image'], 'large', array('class' => $rounded ? 'bg-media card-rounded ' . $contain : 'bg-media ' . $contain)) : null; ?>

                    </div>
                </div>


            </div>

        </div>
    </div>
</div>