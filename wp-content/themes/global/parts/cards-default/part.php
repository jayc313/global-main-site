<?php 
$mobileAlign = "ta${args['text-alignment-mobile']}";

$tabletAlign = "ta${args['text-alignment-tablet']}-lg"; 
$desktopAlign = "ta${args['text-alignment-desktop']}-xl"; 

$contain = $args['image-size'] == 'contain' ? 'contain' : null;


$compStyles = output_component_styles($args);


?>

<div class="cards ">
    <!-- <img src="https://via.placeholder.com/1280x720.png" alt="" class="bg-media"> -->
    <div class="container">
        <div class="row justify-content--center">
            <div class="<?php echo $compStyles['container']['width'] ? $compStyles['container']['width'] : "col-12 col-md-10"; ?>  cards__wrap <?php echo "$mobileAlign $tabletAlign $desktopAlign"; ?>">

                <div class="row justify-content--center">
                    <?php foreach ($args['cards'] as $i => $card) :
                        $styles = output_styles([
                            'background-color'  => $card['color'],
                            'color'             => $card['text-color']
                        ]);
                        ?>
                        <div class="<?php echo $compStyles['content']['width'] ? $compStyles['content']['width'] : "col-12 col-md-6 col-xl-3"; ?>  cards__card " >
                            <div class="wrap bg-primary--grey-light" <?php echo $styles ? $styles : null; ?>>
                                <?php echo isset($card['link'][0]) ? "<a href='" . get_the_permalink($card['link'][0]['id']) . "'>" : ''; ?>
                                <?php if($card['image']) : ?>
                                <div class="small-image-holder">
                                    <?php media_output($card['image'], 'large', ['class' => "bg-media {$contain}"]); ?>
                                </div>
                                <?php endif; ?>
                                <div class="card__content pv-2 ph-1" >
                                    <h4 class="mb-half"><?php echo $card['title']; ?></h4>
                                    <?php echo apply_filters('the_content', $card['content']); ?>
                                </div>
                                <?php echo $card['link'] ? "</a>" : ""; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </div>
</div>