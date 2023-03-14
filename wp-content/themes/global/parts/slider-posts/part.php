<?php

if (isset($args['tax']) & $args['tax']) {
  $tax = array($args['tax']);
} else {
  $tax = null;
}

$query = new WP_Query(array(
  'post_type' => $args['post_type'],
  'posts_per_page' => 12,
  'tax_query' => $tax
));

if ($query->found_posts >= 6) :
?>

<div class="container tac">
  <div class="row">
    <div class="col-12 mb-2">
      <?php echo $args['title']; ?>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Slider main container -->
            <div class="swiper posts-swiper">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper" >
                <!-- Slides -->
                <?php
                while($query->have_posts()) {
                  $query->the_post(); ?>
                  <div class="swiper-slide df" >
                    <?php 
                    get_template_part($args['template']); 
                    ?>
                  </div>
                  <?php 
                }
        
                ?>
                
     
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
<?php endif; ?>