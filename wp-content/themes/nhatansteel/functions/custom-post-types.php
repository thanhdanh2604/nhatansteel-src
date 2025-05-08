<?php
function register_project_post_type() {
    $labels = array(
        'name' => 'Projects',
        'singular_name' => 'Project',
        'menu_name' => 'Projects',
        'name_admin_bar' => 'Project',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Project',
        'new_item' => 'New Project',
        'edit_item' => 'Edit Project',
        'view_item' => 'View Project',
        'all_items' => 'All Projects',
        'search_items' => 'Search Projects',
        'not_found' => 'No projects found.',
        'not_found_in_trash' => 'No projects found in Trash.',
    );

    $args = array(
        'labels' => $labels,
        'description' => 'Custom Post Type cho dự án',
        'public' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('project_category'),
        'show_in_rest' => true,
    );

    register_post_type('project', $args);
}
add_action('init', 'register_project_post_type');

function register_project_category_taxonomy()
{
    $labels = array(
        'name' => 'Project categories',
        'singular_name' => 'Project category',
        'search_items' => 'Search Project categories',
        'all_items' => 'All Project categories',
        'parent_item' => 'Parent Project category',
        'parent_item_colon' => 'Parent Project category:',
        'edit_item' => 'Edit Project category',
        'update_item' => 'Update Project category',
        'add_new_item' => 'Add New Project category',
        'new_item_name' => 'New Project category Name',
        'menu_name' => 'Project categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'project-category'),
        'show_in_rest' => true,
    );

    register_taxonomy('project_category', array('project'), $args);
}
add_action('init', 'register_project_category_taxonomy');
?>