<?php
// Process URL
if (str_contains($args['url'], 'youtube')) {
    $videoID = explode('/watch?v=', $args['url'])[1];
} else {
    $videoID = $args['url'];
}

$videoTitle = $args['title'];

$content = '';
$videoHTML = "<div class='youtube-player' data-id='$videoID'><h4>$videoTitle</h4></div>";

if (isset($args['container']) && $args['container']) {
    $content .= '<div class="container">';
        $content .= '<div class="row">';
            $content .= '<div class="col-12">';
                $content .= $videoHTML;
            $content .= '</div>';
        $content .= '</div>';
    $content .= '</div>';
} else {
    $content = $videoHTML;
}

echo $content;

?>

