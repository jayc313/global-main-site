<?php
$bgImage = $args['background-image'] ? wp_get_attachment_image_src($args['background-image'], 'full')[0] : false;

$styles = output_styles([
    'background-color'  => $args['background-color'],
    'color'             => $args['text-color'],
    'background-image'  => $bgImage ? "url({$bgImage})" : false,
    'background-position' => $args['background-position'],
    'background-size'   => $args['background-size'],
    'background-repeat' => $args['background-repeat'],
]);


?>

<!-- Image Section -->
<div class="image-section <?php echo $args['section-size']; ?>" <?php echo $styles; ?>>

</div>