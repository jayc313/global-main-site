<?php 
$bgColor = "style='background-color: ${args['banner-color']};'"; 
$txtColor = "style='color: ${args['text-color']};'"; 
$mobileAlign = "ta${args['text-alignment-mobile']}";
$tabletAlign = "ta${args['text-alignment-tablet']}-lg"; 
$desktopAlign = "ta${args['text-alignment-desktop']}-xl"; 
$fullWidth = isset($args['full-width']) && $args['full-width'];

$bgImage = $args['background-image'] ? wp_get_attachment_url($args['background-image']) : false;

$styles = output_styles([
    'background-color'  => $args['banner-color'],
    'color'             => $args['text-color'],
    'background-image'  => $bgImage ? "url({$bgImage})" : false,
    'background-position' => $args['background-position'],
    'background-size'   => $args['background-size'],
    'background-repeat' => $args['background-repeat'],
]);

?>

<div class="gbc-title-banner <?php echo "${mobileAlign} ${tabletAlign} ${desktopAlign}"; ?>" <?php echo $styles; ?>>
    <!-- <img src="https://via.placeholder.com/1280x720.png" alt="" class="bg-media"> -->
    <div class="container" >
        <div class="row justify-content--center" <?php if ($args['text-color']) { echo $txtColor; } ?>>
            <div class="col-12"  >
                <div class="wrap pv-<?php echo $args['banner-padding-vertical']; ?> " <?php if (!$fullWidth) { echo $bgColor; } ?>>
                <?php media_output($args['banner-overlay-image'], 'large', ['class' => 'banner-overlay-media ' . $args['banner-overlay-align'] . ' ']); ?>
                <div class="col-12 col-md-<?php echo $args['banner-width-mobile']; ?> col-lg-<?php echo $args['banner-width-tablet']; ?> col-xl-<?php echo $args['banner-width-desktop']; ?>  banner-content"  >
    
                    <?php echo $args['banner-subtitle'] ? "<div class='mb-1 para' style='color: {$args['subtitle-color']}'>{$args['banner-subtitle']}</div>" : ''; ?>

                    <?php if ( $args['banner-title'] ) : ?>

                        <<?php echo $args['title-heading']; ?> class="mb-1">
                            <?php echo $args['banner-title']; ?>
                        </<?php echo $args['title-heading']; ?>>

                    <?php endif; ?>
                    <?php echo apply_filters('the_content', $args['banner-content']); ?>

                    <?php output_buttons($args['banner-links']); ?>
                </div>
      
                    
                </div>
            </div>
        </div>
    </div>
</div>

