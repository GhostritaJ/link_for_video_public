<?php

function get_video_iframe() {
    ob_start();
    ?>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/FN35GHUwNVM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <?php
    $iframe = ob_get_clean();
    return $iframe;
}

function video_iframe_endpoint() {
    register_rest_route('custom/v1', '/video/', array(
        'methods' => 'GET',
        'callback' => 'get_video_iframe',
    ));
}

add_action('rest_api_init', 'video_iframe_endpoint');