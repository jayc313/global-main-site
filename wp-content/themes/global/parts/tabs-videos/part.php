<?php
$styles = output_styles(array(
    'background-color' => $args['background-color'],
    'color' => $args['text-color'],
));

?>

<div class="tabs-videos" <?php echo $styles; ?>>
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-12 col-lg-10">
                <div style="min-height: 650px; position: relative;" class="mb-lg-half">
                    <video class="bg-media" width="100%" preload="auto" playsinline="playsinline" controls style="transition: 0.3s opacity ease;">
                        <source src="<?php echo wp_get_attachment_url($args['videos'][0]['video']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <div class="row tabs tac justify-content--center">
                    <?php foreach ($args['videos'] as $video) : ?>
                    <div class="col-12 col-lg-3">
                        <button class="no-style full-width tac mr-0 tabs-videos__tab pv-1" data-videosrc="<?php echo wp_get_attachment_url($video['video']); ?>"><?php echo $video['title']; ?></button>
                    </div>
                    <?php endforeach; ?>
          
                    <div class="underline col-12 dn db-lg">
                        <div class="wrap">
                            <div class="line col-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row content-areas ">

            <?php foreach ($args['videos'] as $index => $video) : ?>
            <div class="offset-lg-1 col-12 col-lg-10 tac pv-2 content-area <?php echo $index !== 0 ? 'dn' : ''; ?>">
                <?php echo apply_filters('the_content', $video['content']); ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
