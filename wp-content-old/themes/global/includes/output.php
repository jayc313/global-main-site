<?php

function media_output($id, $size = 'full', $atts = null){
    
    if (wp_attachment_is( 'video', $id)) {
        
        $videoURL = wp_get_attachment_url($id);
       

        $videoAttributes = '';
        if (isset($atts['class_video'])) { 
            $videoAttributes .= 'class="' .$atts['class_video'].'" ';
        } else {
            $videoAttributes .= 'class="' .$atts['class'].'" ';
        }

        if (isset($atts['autoplay'])) { $videoAttributes .= 'autoplay '; $videoAttributes .= 'playsinline '; }
        if (isset($atts['muted'])) { $videoAttributes .= 'muted '; }
        if (isset($atts['loop'])) { $videoAttributes .= 'loop '; }

        if (isset($atts['replay']) && $atts['replay']) { 
            echo "<div class='replay-video-btn'></div>";
         }

         if (isset($atts['style']) && $atts['style']) {
            $style = $atts['style'];
         } else {
            $style = '';
         }


        echo "<video $videoAttributes $style><source src='$videoURL'></video>";

    } else {
        echo wp_get_attachment_image($id, $size, false, $atts);
    }
}

function output_styles($styles = array()){
    if (count($styles)) {
        $styleHTML = "style='";

        foreach ($styles as $key => $style) {
            if (!$style) continue;
            $styleHTML .= "$key: $style; ";
        }

        $styleHTML .= "'";

    } else {
        $styleHTML = ''; 
    }

    if ($styleHTML == "style=''") { return false; }

    return $styleHTML;

}

function output_chevron() {
    $chevrons = carbon_get_theme_option( 'link-chevron-enable' );

    $chevron = array();

    if ($chevrons && isset(carbon_get_theme_option('link-h-chevron')['class'])) {
        $chevronH = "<i class='".carbon_get_theme_option('link-h-chevron')['class']."'></i>";
    } else {
        $chevronH = "";
    }

    $chevron['horizontal'] = $chevronH;

    if ($chevrons && isset(carbon_get_theme_option('link-v-chevron')['class'])) {
        $chevronV = "<i class='".carbon_get_theme_option('link-v-chevron')['class']."'></i>";
    } else {
        $chevronV = "";
    }

    $chevron['vertical'] = $chevronV;


    return $chevron;
}

function output_buttons($buttons){


    foreach($buttons as $button) {
        $title = $button['title'];
        $outline = $button['outline'] ? 'outline' : '';
        $color = $button['color'] ?  $button['color'] : '';
        $outlineColor = $button['outline-color'] ?  $button['outline-color'] : '';
        $textColor = $button['text-color'] ?  $button['text-color'] : '';
        $borderRadius = $button['border-radius'] ?  '15px' : '';

        $chevron = output_chevron();



        
        $styles = output_styles([
            'background-color' => $color,
            'border'    => $outline ? "1px solid $outlineColor" : null,
            'color' => $textColor,
            'border-radius' => $borderRadius
        ]);

        if ($button['_type'] == 'links-url') {
            $url = $button['url'];
        } else {
            $url = get_the_permalink($button['url'][0]['id']);
        }



        echo "<a href='$url' $styles class='btn $outline'>$title {$chevron['horizontal']}</a>";
    }
}

function the_media_output($postID, $options = ['class' => 'bg-media'], $post = true){
    if ($post) {
        $imageID = get_post_thumbnail_id($postID);
    } elseif(isset(carbon_get_post_meta($postID, 'components')[0])) {
        
        
    }elseif(carbon_get_term_meta( $postID, 'term-image' )) {
        $imageID =  carbon_get_term_meta( $postID, 'term-image' );
    } else {
        $imageID = null;
    }
    media_output($imageID, 'full', $options); 
    unset($imageID);
}





function gbc_btn_sc( $atts, $content = null ) {
	$a = shortcode_atts( array(
		'url' => '#',
        'color' => 'red',
        'fullwidth' => false,
        'direction' => 'horizontal',
        'rounded' => false,
        'size'  => 'md'
	), $atts );

    $chevron = output_chevron();
    $fullWidth = $a['fullwidth'] ? 'fw--mob' : '';
    $rounded = $a['rounded'] ? 'rounded' : '';
    $size = $a['size'] ? $a['size'] : '';



    if ($a['direction'] == 'vertical') {
        $chevron = $chevron['vertical'];
    } else {
        $chevron = $chevron['horizontal'];
    }


	return "<a href='{$a['url']}' class='btn {$fullWidth} {$rounded} btn-{$size} bg-primary c-primary'>{$content} {$chevron}</a>";

}
add_shortcode( 'button', 'gbc_btn_sc' );

function output_component_styles($styles) {

    $compStyles = array();

    if (!isset($compStyles['container'])) { $compStyles['container'] = array(); }
    if (!isset($compStyles['content'])) { $compStyles['content'] = array(); }

    $gridSizes = array(
        'md',
        'lg',
        'xl'
    );

    $compStyles['container']['padding'] = $styles['container-vertical-padding'] ? "pv-{$styles['container-vertical-padding']}" : "";
    $compStyles['container']['padding'] .= $styles['container-horizontal-padding'] ? " ph-{$styles['container-horizontal-padding']}" : "";
    $compStyles['container']['width'] = $styles['container-width'] ? "col-{$styles['container-width']}" : "";

    $compStyles['content']['padding'] = $styles['content-vertical-padding'] ? "pv-{$styles['content-vertical-padding']}" : "";
    $compStyles['content']['padding'] .= $styles['content-horizontal-padding'] ? " ph-{$styles['content-horizontal-padding']}" : "";
    $compStyles['content']['width'] = $styles['content-width'] ? "col-{$styles['content-width']}" : "";


    foreach ($gridSizes as $gs) {
        $compStyles['container']['padding'] .= $styles["container-vertical-padding-{$gs}"] ? " pv-{$gs}-{$styles["container-vertical-padding-{$gs}"]}" : "";
        $compStyles["container"]["padding"] .= $styles["container-horizontal-padding-{$gs}"] ? " ph-{$gs}-{$styles["container-horizontal-padding-{$gs}"]}" : "";
        $compStyles["container"]["width"] .= $styles["container-width-{$gs}"] ? " col-{$gs}-{$styles["container-width-{$gs}"]}" : "";

        $compStyles["content"]["padding"] .= $styles["content-vertical-padding-{$gs}"] ? " pv-{$gs}-{$styles["content-vertical-padding-{$gs}"]}" : "";
        $compStyles["content"]["padding"] .= $styles["content-horizontal-padding-{$gs}"] ? " ph-{$gs}-{$styles["content-horizontal-padding-{$gs}"]}" : "";
        $compStyles["content"]["width"] .= $styles["content-width-{$gs}"] ? " col-{$gs}-{$styles["content-width-{$gs}"]}" : "";
    }

    // foreach ($styles as $style) {
    //     switch ($style['_type']) {
    //         case 'container-padding':
    //             $compStyles['container']['padding'] = "pv-{$style['container-vertical-padding']}";
    //             $compStyles['container']['padding'] .= " ph-{$style['container-horizontal-padding']}";

    //             foreach ($gridSizes as $gridSize) {
    //                 $compStyles['container']['padding'] .= " pv-{$gridSize}-" . $style['container-vertical-padding-' . $gridSize];
    //                 $compStyles['container']['padding'] .= " ph-{$gridSize}-" . $style['container-horizontal-padding-' . $gridSize];
    //             }

    //             break;

    //         case 'container-width':
    //             $compStyles['container']['width'] = "col-{$style['container-width']}";

    //             foreach ($gridSizes as $gridSize) {
    //                 $compStyles['container']['width'] .= " col-{$gridSize}-" .$style['container-width-' . $gridSize ];
    //             }

    //             break;
    //         case 'content-width':
    //             $compStyles['content']['width'] = "col-{$style['content-width']}";

    //             foreach ($gridSizes as $gridSize) {
    //                 $compStyles['content']['width'] .= " col-{$gridSize}-" .$style['content-width-' . $gridSize ];
    //             }

    //             break;
    //         default:
    //             # code...
    //             break;
    //     }
    // }
    return $compStyles;
}
