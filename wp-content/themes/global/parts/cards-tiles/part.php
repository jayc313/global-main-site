<?php
$mobileAlign = "ta{$args['text-alignment-mobile']}";
$tabletAlign = "ta{$args['text-alignment-tablet']}-lg"; 
$desktopAlign = "ta{$args['text-alignment-desktop']}-xl"; 



$styles = output_styles([
    'background-color'  => $args['background-color'],
    'color'             => $args['text-color']
]);


?>

<div class="cards-tiles"  <?php echo $styles; ?>>
    <div class="container ">
        <div class="row">
            <?php
    
            $cards = $args['cards'];
            $currentWidth = 0;
    
            for ($i=0; $i < count($cards); $i++) :
                $card = $cards[$i];
            ?>
    
                <div class="col-12 col-lg-<?php echo $card['width']; ?> mb-2 <?php echo $currentWidth == 0 ? "offset-lg-1" : ""; ?> <?php echo "{$mobileAlign} {$tabletAlign} {$desktopAlign}"; ?>">
                    <div class=" pv-2 ph-2 bg-primary--grey-light card-rounded wrap df fdir-c" style="background-color: <?php echo $args['content-background-color']; ?>">
                        <?php if ($i % 2 == 0) : ?>
                            <h3 class="mb-1 order-1"><?php echo $card['title']; ?></h3>
                            <div class="order-2">
                                <?php
                                if ($card['content']) {
                                    echo apply_filters('the_content', $card['content']);
                                }
                                ?>
                            </div>
                            <div class="mt-1 order-3" style="position: relative; flex: 1 1 auto;">
                                <?php media_output($card['image'], 'full', array('class' => 'card-rounded')); ?>
                            </div>
    
                        <?php else: ?>
                            <?php media_output($card['image'], 'full', array('class' => 'card-rounded mt-1 mt-lg-0 mb-lg-1 order-3 order-lg-1')); ?>
                            <h3 class="mb-1 mb-lg-0 mt-lg-1 order-1 order-lg-2"><?php echo $card['title']; ?></h3>
                            <div class="order-2 order-lg-3"><?php echo apply_filters('the_content', $card['content']); ?></div>
                        <?php endif; ?>
    
    
    
                    </div>
                </div>
    
    
    
    
    
    
    
    
    
            <?php
            $currentWidth += $card['width'];
    
            if ($currentWidth >= 10) : ?>
            <?php $currentWidth = 0; ?>
            <?php endif; ?>
    
    
            <?php endfor; ?>
    
    
    
    
    
    
    
    
    
        </div>
    </div>
</div>