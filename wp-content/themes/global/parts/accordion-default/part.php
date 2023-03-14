<?php

$styles = output_styles([
    'background-color'  => $args['color'],
    'color'             => $args['text-color']
]);

?>

<div class="accordion-default">
    <div class="container">
        <div class="row">
            <div class="col-12 pb-1">
                <?php echo apply_filters('the_content', $args['title']); ?>
            </div>
        </div>
        <div class="row c-primary--white">
            <?php foreach($args['accordions'] as $accord) : ?>
                <div class="col-12 mb-1 bg-primary--blue " <?php echo $styles; ?>>
                    <button class="no-style bg-primary--blue c-primary--white full-width pv-half ph-4 accord" <?php echo $styles; ?>>
                        <?php echo apply_filters('the_content', $accord['title']); ?>
                        <svg class="accord-arrow" xmlns="http://www.w3.org/2000/svg" width="28.242" height="15.621" viewBox="0 0 28.242 15.621">
                            <path id="Path_117" data-name="Path 117" d="M4218.769,2779.7l12,12-12,12" transform="translate(2805.823 -4216.647) rotate(90)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        </svg>

                    </button>
                    <div class="accord-panel ph-6 content">
                        <div class="pt-1 pb-2"><?php echo apply_filters('the_content', $accord['content']); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
 

            
        </div>
    </div>
  </div>