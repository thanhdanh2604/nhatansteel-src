<?php

function nhatan_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'nhatan_enqueue_styles');

// Include các file từ thư mục functions
function nhatan_include_functions() {
    $function_files = array(
        'custom-post-types.php',
        'shortcodes.php',
    );
    
    // Include từng file
    foreach ($function_files as $file) {
        $filepath = get_stylesheet_directory() . '/functions/' . $file;
        if (file_exists($filepath)) {
            require_once $filepath;
        }
    }
}
add_action('after_setup_theme', 'nhatan_include_functions');

function flatsome_child_include_inc_files() {
    $inc_files = array(
        'helpers.php'
    );
    
    // Include từng file
    foreach ($inc_files as $file) {
        $filepath = get_stylesheet_directory() . '/inc/' . $file;
        if (file_exists($filepath)) {
            require_once $filepath;
        }
    }
}
add_action('after_setup_theme', 'flatsome_child_include_inc_files');