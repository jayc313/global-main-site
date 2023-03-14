<?php

$sections = $args['media' ];

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Slider main container -->
            <div class="swiper media-swiper">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper" >
                <!-- Slides -->
                <?php
                foreach ($sections as $section) :  ?>
                    <div class="swiper-slide" >
                    <?php 
                        switch ( $section['_type'] ) {
                            case 'youtube':
                               get_template_part('parts/media-'.$section['_type'].'/part', null, $section);
                            break;
                        default:
                            break;
                        }
                    ?>
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

