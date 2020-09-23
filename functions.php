<?php

add_action('wp_enqueue_scripts', 'mylisting_child_enqueue_styles');
function mylisting_child_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

add_filter('publishpress_authors_supported_post_types', 'mylisting_child_add_authors_support_to_post_type');
add_action('add_meta_boxes', 'mylisting_child_remove_author_metabox', 85);

/**
 * @param array $supported_post_types
 * @return array
 */
function mylisting_child_add_authors_support_to_post_type($supported_post_types)
{
    $supported_post_types[] = 'job_listing';

    return $supported_post_types;
}

function mylisting_child_remove_author_metabox()
{
    remove_meta_box('mylisting_author_metabox', 'job_listing', 'side');
}
