<?php
$fullScreen = $args['full-screen'] ? 'full-screen' : '';
$multiply = $args['multiply-color'] ? $args['multiply-color'] : '';

?>
<div class="gbc-banner <?php echo "{$fullScreen}"; ?>" <?php echo $multiply ? "style='background-color: {$multiply};'" : ""; ?>>
    <?php 
    media_output($args['hero-image'], 'full', array(
    'class'     => $multiply ? 'multiply bg-media ' : 'bg-media ',
     'loading'  => false,
     'autoplay' => true,
     'muted'    => true,
     'playsinline' => true,
     'loop'     => true,
    )); 
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo isset($args['inner_blocks']) ? $args['inner_blocks'] : null; ?>
            </div>
        </div>
    </div>
</div>