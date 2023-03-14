<?php

$styles = output_styles([
    'background-color' => $args['color']
]);

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Slider main container -->
            <div class="swiper testimonial-swiper">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper" >
                <!-- Slides -->
                <?php
                foreach ($args['posts'] as $testimonial) :
                    $postID = $testimonial['id']; ?>
                    <div class="swiper-slide df" >
                        <div class="small-image-holder"><?php the_media_output($postID); ?></div>
                        <div class="content pt-2 pb-5 ph-4" <?php echo $styles; ?>>
                            <h4 class="mb-1"><?php echo get_the_title($postID); ?></h4>
                            <?php echo apply_filters('the_content', carbon_get_post_meta($postID, 'content')); ?>
                            <div class="logo df">
                                <?php media_output(carbon_get_post_meta($postID, 'logo'), 'large'); ?>
                               
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="83.225" height="69" viewBox="0 0 83.225 69">
                                    <path id="Path_121" data-name="Path 121" d="M93.93-121.016H60.737v-28.633q0-18.3,8.42-29.332T93.93-190.015v13.409q-16.192,0-16.192,26.957H93.93Zm-50.032,0H10.705v-28.633q0-18.3,8.42-29.332T43.9-190.015v13.409q-16.354,0-16.354,26.957H43.9Z" transform="translate(-10.705 190.015)" fill="<?php echo $args['quote-color']; ?>"/>
                                </svg>

                        </div>
                    </div>
                    <?php
                endforeach; ?>
                
     
              </div>
       
            
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
            
  
            </div>
        </div>
    </div>
</div>