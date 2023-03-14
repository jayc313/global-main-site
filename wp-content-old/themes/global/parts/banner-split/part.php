<?php

$rounded = $args['rounded'] ? true : false;
?>

<div class="content-image-split">
    <div class="container">
        <div class="row">
            <div class="col-12 " >

                <div class="row fdir-cr <?php  if ($args['reverse']) { echo 'fdir-rr-lg'; } else {echo 'fdir-r-lg';}  echo $rounded ? ' rounded' : '';?> ">
                    <div class="content-side pv-2 pv-lg-<?php echo $args['banner-padding']; ?> ph-1 ph-lg-3 c-primary--white content col-12 col-lg-<?php echo $args['content-width']; ?>" style="
                    background-color: <?php echo $args['banner-color']; ?>;
                    color: <?php echo $args['text-color']; ?>;">
                        <?php if ( $args['banner-title']) : ?>
                            <h3 class="mb-1"><?php echo $args['banner-title']; ?></h3>
                        <?php endif; ?>
                    
                        <?php echo apply_filters('the_content', $args['banner-content']); ?>
                        <?php output_buttons($args['banner-links']); ?>
                    </div>
                    <div class="img-side small-image-holder col-12 col-lg-<?php echo $args['image-width']; ?>" style=" background-color: <?php echo $args['banner-color']; ?>;">
                    <?php media_output($args['banner-image'], 'large', array('class' => $rounded ? 'bg-media card-rounded' : 'bg-media ')); ?>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>