<?php
function get_page_permalink_by_template($template_filename) {
    $pages = get_posts(array(
        'post_type' => 'page',
        'meta_key' => '_wp_page_template',
        'meta_value' => $template_filename,
        'posts_per_page' => 1,
        'fields' => 'ids',
    ));

    if (!empty($pages)) {
        return get_permalink($pages[0]);
    }

    return false;
}
?>