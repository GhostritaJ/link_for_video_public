<?php
/*
Plugin Name: Video Widget Plugin
Description: A plugin to fetch and display video from a specified widget HTML page.
Version: 1.0
Author: Your Name
*/

function fetch_video_from_widget_page() {
    $url = 'https://www.huaykeys789.com/api-for-get-video/';
    $ovl_image = 'https://www.huaykeys789.com/wp-content/uploads/2024/07/%E0%B8%9B%E0%B8%81Cover-%E0%B8%9B%E0%B8%81%E0%B8%AA%E0%B8%A5%E0%B8%B2%E0%B8%81160767.png';

    $response = wp_remote_get($url);

    if (is_wp_error($response)) {
        return 'Error: ' . $response->get_error_message();
    }

    $body = wp_remote_retrieve_body($response);

    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($body);
    libxml_clear_errors();

    $xpath = new DOMXPath($doc);
    $iframes = $xpath->query('//iframe');

    if ($iframes->length > 0) {
        $output = '';
        //foreach ($iframes as $iframe) {
            $src = $iframes[1]->getAttribute('src');
            $output .= '<iframe width="600" height="600" src="' . esc_url($src) . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        //}
        return $output;
    } else {
        return 'No video found.';
    }
}

function video_widget_shortcode() {
    return fetch_video_from_widget_page();
}

add_shortcode('video_widget', 'video_widget_shortcode');

function video01($atts, $content = null ) {
  
    //echo '<div id="my-plugin-value-container"></div>';
    $a = shortcode_atts( array(
        'width' => '100%',
        'height' => '600px',
    ), $atts );
        
    return '<iframe src="/wp-content/plugins/link-for-video/video01.php" width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';
}

add_shortcode('add_video01', 'video01');