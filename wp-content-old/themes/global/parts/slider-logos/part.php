<?php

$styles = output_styles([
    'background-color' => $args['color']
]);

$arrows = $args['navigation-arrows'] ? $args['navigation-arrows'] : false;
$logoSize = $args['logo-size'] ? $args['logo-size'] : 'large';
$borderColor = $args['border-color'] ? "border-top: 2px solid {$args['border-color']}; border-bottom: 2px solid {$args['border-color']}" : false;
?>

<div class="slider-logos" style="<?php echo $borderColor; ?>">
  <div class="container  pv-<?php echo $args['padding-vertical']; ?>" >
      <div class="row">
          <div class="col-12">
              <!-- Slider main container -->
              <div class="swiper logos-swiper <?php echo $logoSize; ?>">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper" >
                  <!-- Slides -->
                  <?php
                  foreach ($args['logos'] as $logo) :
                      $postID = $logo['logo'];  ?>
                      <div class="swiper-slide df" >
                      <?php media_output($postID, 'large', array('class' => 'logo')); ?>
                      </div>
                      <?php
                  endforeach; ?>
  
  
                </div>
  
  
                <?php if ($arrows) : ?>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="11.182" height="18.121" viewBox="0 0 11.182 18.121">
                      <path id="Path_122" data-name="Path 122" d="M4218.768,2779.7l8,8-8,8" transform="translate(-4217.708 -2778.642)" fill="none" stroke="#55585a" stroke-width="3"/>
                  </svg>
  
  
                </div>
                <div class="swiper-button-next">
                  <svg xmlns="http://www.w3.org/2000/svg" width="11.182" height="18.121" viewBox="0 0 11.182 18.121">
                      <path id="Path_122" data-name="Path 122" d="M4218.768,2779.7l8,8-8,8" transform="translate(-4217.708 -2778.642)" fill="none" stroke="#55585a" stroke-width="3"/>
                  </svg>
  
                </div>
                <?php endif; ?>
  
  
              </div>
          </div>
      </div>
  </div>
</div>