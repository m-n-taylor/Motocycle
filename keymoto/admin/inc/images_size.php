<?php

/**
 * Initialize Theme Support Features
 */
function keymoto_init_theme_support() {
    if (function_exists('keymoto_get_images_sizes')) {
        foreach (keymoto_get_images_sizes() as $post_type => $sizes) {
            foreach ($sizes as $config) {
                keymoto_add_image_size($post_type, $config);
            }
        }
    }
}
add_action('init', 'keymoto_init_theme_support');

/**
 * Add custom image size wrapper
 * @param string $post_type
 * @param array $config
 */
function keymoto_add_image_size($post_type, $config) {
    add_image_size($config['name'], $config['width'], $config['height'], $config['crop']);
}



// THIS INCLUDES THE THUMBNAIL IN OUR RSS FEED
function keymoto_insert_feed_image($content) {
    global $post;

    if ( has_post_thumbnail( $post->ID ) ){
        $content = ' ' . get_the_post_thumbnail( $post->ID, 'medium' ) . " " . $content;
    }
    return $content;
}

add_filter('the_excerpt_rss', 'keymoto_insert_feed_image');
add_filter('the_content_rss', 'keymoto_insert_feed_image');