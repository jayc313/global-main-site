<?php 
$mobileAlign = "ta${args['text-alignment-mobile']}";
$tabletAlign = "ta${args['text-alignment-tablet']}-lg"; 
$desktopAlign = "ta${args['text-alignment-desktop']}-xl"; 

$bgImage = $args['background-image'] ? wp_get_attachment_url($args['background-image']) : false;

$styles = output_styles([
    'background-color'  => $args['background-color'],
    'color'             => $args['text-color'],
    'background-image'  => $bgImage ? "url({$bgImage})" : false,
    'background-position' => $args['background-position'],
    'background-size'   => $args['background-size'],
    'background-repeat' => $args['background-repeat'],
]);

?>


<div class="content-split-three pv-<?php echo $args['padding-vertical']; ?> " <?php echo $styles; ?>>
    <div class="container">
        <div class="row justify-content--center content-area-default">
            <?php 

            if ($args['reverse-mobile-layout']) {
                $reverse = true;
                $order = count($args['columns']);
            } else {
                $reverse = false;
                $order = 1;
            }
            
            foreach($args['columns'] as $index => $column) :  
                $lgOrder = $index + 1;
            ?>

 
                <div class="col-<?php echo $args['posts-column-span-mobile']; ?>
                            col-lg-<?php echo $args['posts-column-span-tablet']; ?> 
                            col-xl-<?php echo $args['posts-column-span-desktop']; ?>
                            <?php echo " $mobileAlign $tabletAlign $desktopAlign"; ?>
                            content-split-three__wrap
                            <?php echo "order-{$order} order-lg-{$lgOrder}"; ?>
                            mb-<?php echo $args['column-bottom-margin']; ?>
                            ">
                    <div class="content-split-three__col">
                        <?php echo apply_filters('the_content', $column['content']); ?>
                    </div>
                </div>

            <?php 
                $reverse ? $order-- : $order++;

            endforeach; ?>

            
        </div>
    </div>
</div>