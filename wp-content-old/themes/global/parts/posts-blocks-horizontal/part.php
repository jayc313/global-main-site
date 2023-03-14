<?php 


$styles = output_styles([
    'background-color'  => $args['post-color'],
    'color'             => $args['text-color']
]);

$altStyles = output_styles([
    'background-color'  => $args['alt-post-color'],
    'color'             => $args['alt-text-color']
]);

$chevron = output_chevron();


?>
<div class="gbc-posts-grid horizontal">
    <!-- <img src="https://via.placeholder.com/1280x720.png" alt="" class="bg-media"> -->
    <div class="container">
        <div class="row justify-content--center">
            <?php foreach ($args['posts'] as $i => $blockPost) :  ?>

                <div class="col-<?php echo $args['posts-column-span-mobile']; ?> col-lg-<?php echo $args['posts-column-span-tablet']; ?> col-xl-<?php echo $args['posts-column-span-desktop']; ?> mb-2 ">
                    <a href="<?php the_permalink($blockPost['id']); ?>" class="df fdir-cr fdir-r-xl wrap">
                        <div class="wrap  pv-2 pv-lg-4 ph-1 ph-lg-5  bg-primary--blue" <?php echo $altStyles && (($i + 1) % 2 == 0) ? $altStyles : $styles; ?>>
                            <h3 class="mb-1"><?php echo get_the_title($blockPost['id']); echo $chevron['horizontal']; ?></h3>
                            <p><?php echo get_the_excerpt($blockPost['id']); ?></p>
                        </div>
                        <div class="wrap small-image-holder">
                        <?php the_media_output($blockPost['id']); ?>
                        </div>
                    </a>
                </div>


            <?php endforeach; ?>
        </div>
    </div>
</div>