<?php if ( isset($args['section-title']) && $args['section-title']) : ?>

<div class="title-section">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-12 col-lg-8 tac pt-2 pt-lg-5 pb-4">

                <div>
                    <?php echo $args['section-title']; ?>
                </div>
                

                <?php if($args['title-content']) : ?>
                <div class="para mt-1 h3 c-<?php // echo $args['text_color']; ?>">
                    <?php echo apply_filters('the_content', $args['title-content']); ?>
                </div>
                <?php endif; ?>

                <?php if(isset($args['links'])) : ?>
                <p class="h4 mt-1 mt-lg-2">
                    <?php //gbc_links_output($args['links'], $args['text_color']); ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>