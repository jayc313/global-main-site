   <div class="container banner-blocks">
       <div class="row">
           <div class="col-12 col-lg-6 mb-2 mb-lg-0 df banner-blocks__block">
               <div class="small-image-holder medium">
                   <?php media_output( $args['block-1-image'], 'full', ['class' => 'bg-media']); ?>

               </div>

               <div class="content ph-2 pv-3 bg-primary--blue c-primary--white">
                   <<?php echo $args['title-1-heading']; ?> class="mb-1">
                       <?php echo $args['block-1-title']; ?>
                   </<?php echo $args['title-1-heading']; ?>>

                   <?php echo apply_filters('the_content', $args['block-1-content']); ?>
               </div>
           </div>
           <div class="col-12 col-lg-6 mb-2 mb-lg-0 df banner-blocks__block">
               <div class="small-image-holder medium">
               <?php media_output( $args['block-2-image'], 'full', ['class' => 'bg-media']); ?>
               </div>

               <div class="content ph-2 pv-3 bg-primary--red c-primary--white">
                   <<?php echo $args['title-2-heading']; ?> class="mb-1">
                       <?php echo $args['block-2-title']; ?>
                   </<?php echo $args['title-2-heading']; ?>>

                   <?php echo apply_filters('the_content', $args['block-2-content']); ?>
               </div>
           </div>
       </div>
   </div>