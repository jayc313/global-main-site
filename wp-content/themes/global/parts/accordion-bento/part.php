<style>


  

    .accordion-item.active .title {
        font-size: 2.8rem;
    }

    .accordion-header {
        transition: 0.3s font-size ease-in-out;
        cursor: pointer;
    }

    .accordion-content {
        max-height: 0px;
        transition: 0.3s max-height ease-in-out;
        overflow: hidden;
    }

    .accordion-item.active .accordion-content {
        max-height: 800px;
    }

    .image-or-video {
        transition: 0.5s opacity ease-in-out;
    }

    img,
    video {
        max-width: 100%;
    }
</style>


<?php
$sectionStyles = output_styles(array(
    'background-color' => $args['section-background-color'],
));

$bgStyles = output_styles(array(
    'background-color' => $args['background-color'],
    'color' => $args['text-color']
));

$contentStyles  = output_styles(array(
    'background-color' => $args['content-background-color'],
));

?>

<?php if ($args['accordions']) : ?>

    <div class="bento-accordion pv-<?php echo $args['padding-vertical']; ?>" <?php echo $sectionStyles; ?>>
        <div class="container" >
            <div class="row card-rounded" <?php echo $bgStyles; ?>>
                <div class="dn db-sm col-12 col-sm-6 image-or-video small-image-holder aspect">
                    <?php media_output($args['accordions'][0]['media'], 'full', array('class' => 'bg-media')); ?>
                </div>
                <div class="col-12 col-sm-6 pb-5">
                    <div class="row justify-content--center">
                        <div class="col-12 col-sm-10">
                            <?php echo isset($args['title']) ? "<div class='pv-2'>" .apply_filters('the_content', $args['title']) . "</div>" : null; ?>
                            <div class="accordion card-rounded" <?php echo $contentStyles; ?>>
                                <?php foreach ($args['accordions'] as $index => $accordion) : ?>
                                    <div class="accordion-item <?php echo $index == 0 ? 'active' : null; ?>" style="<?php echo $index + 1 !== count($args['accordions']) ? 'border-bottom: 3px solid '.$args['background-color'].';' : null; ?>">
                                        <div class="accordion-header ph-1 pv-1 title"><?php echo $accordion['title']; ?></div>
                                        <div class="accordion-content pr-2">
                                            <div class="ph-1 pv-1">
                                                
                                                <?php media_output($accordion['media'], 'full', array('class' => 'db dn-sm card-rounded mb-1', 'loading' => false)); ?>

                                                <div class="mb-1"><?php echo apply_filters('the_content', $accordion['content']); ?></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

<?php endif; ?>

<script>
    const accordionItems = document.querySelectorAll('.accordion-item');
    const imageOrVideo = document.querySelector('.image-or-video');

    let isAnimating = false;

    accordionItems.forEach(item => {
        const header = item.querySelector('.accordion-header');
        const content = item.querySelector('.accordion-content');

        header.addEventListener('click', () => {
            if (item.classList.contains('active')) return;
            if (isAnimating) return;

            isAnimating = true;

            // Remove active class from all accordion items
            accordionItems.forEach(item => {
                item.classList.remove('active');
                item.querySelector('.accordion-content').style.maxHeight = 0;
            });

            // Add active class to clicked item
            item.classList.add('active');

            content.style.maxHeight = content.scrollHeight + 'px';

            // Fade out the image or video
            imageOrVideo.style.opacity = 0;

            // Change image or video based on accordion item content
            let newMedia = '';
            if (content.querySelector('img')) {
                newMedia = `<img src="${content.querySelector('img').src}" class="bg-media">`;
            } else if (content.querySelector('video')) {
                newMedia = `<video src="${content.querySelector('video').src}" class="bg-media"></video>`;
            }

            // Wait for the fade-out animation to complete before changing the media
            setTimeout(() => {
                imageOrVideo.innerHTML = newMedia;

                // Fade in the new image or video
                imageOrVideo.style.opacity = 1;

                isAnimating = false;
            }, 500);
        });
    });
</script>