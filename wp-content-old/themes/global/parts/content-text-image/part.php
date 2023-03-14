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

<!-- <div class="content-image-split">
    <div class="container">
        <div class="row">

        <div class="col-6">
        <img src="https://via.placeholder.com/600" alt="" class="bg-media">

        </div>

        <div class="col-6 bg-primary--red c-primary--white pv-4 ph-3 para">
            <h3 class="mb-1">Standard PPM’s<br />(Planned Preventative Maintenance) include:</h3>

            <p>Our products have been tried and tested for over 30 years and are designed to provide comprehensive levels of protection for employees and company assets, protecting against attacks, intrusions and theft.</p>

            <ul>
            <li>We are an ADSA member company with trained and qualified engineers to all relevant standards including BS EN16005</li>
                <li>We service all major manufacturers equipment</li>
                <li>We have strength in depth with engineers providing full national coverage and have 24/7 helpdesk support</li>
                <li>Our engineers hold UKPIA/SPA Safety Passports, required for work on petrol filling stations</li>
                <li>Our engineers are directly employed, and security vetted to BS 7858</li>
                <li>Multiple technologies combined to provide an integrated solution for our clients</li>
                <li>Real-time vehicle location tracking, for realistic response times</li>
                <li>We work direct to customer as well as via many Facilities • Management companies and currently maintain systems for some of the UKs largest businesses including High St Banks,  </li>
                <li>National and Local Retailers and count many Universities, </li>
            </ul>
        </div>

        </div>
    </div>
</div> -->