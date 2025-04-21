<?php

function nhatan_enqueue_styles() {
    // wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
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

// function theme_add_page_templates() {
//     // Get all PHP files in the page-templates directory
//     $templates = glob(get_stylesheet_directory() . '/page-templates/*.php');
    
//     // If templates exist, add them to the page template dropdown
//     if ($templates) {
//         foreach ($templates as $template) {
//             $template_data = get_file_data($template, array(
//                 'Template Name' => 'Template Name',
//                 'Description'   => 'Description',
//             ));
//             $count = 0;
//             // Only add templates that have a Template Name
//             if (!empty($template_data['Template Name'])) {
//                 add_filter('theme_page_templates', function($post_templates) use ($template, $template_data) {
//                     $file_name = basename($template);
//                     $post_templates[$file_name] = $template_data['Template Name'];
//                     return $post_templates.$count++;
//                 });
//             }
//         }
//     }
// }
// add_action('after_setup_theme', 'theme_add_page_templates');

function theme_register_page_templates() {
   // WordPress tự động nhận diện các template trong thư mục page-templates
   // nhưng chúng ta có thể thêm đoạn code này để đảm bảo
   add_filter('theme_page_templates', function($post_templates) {
       // Đường dẫn đến thư mục page-templates
       $templates_dir = get_template_directory() . '/page-templates/';
       
       // Lấy tất cả các file PHP trong thư mục
       $template_files = glob($templates_dir . '*.php');
       
       foreach ($template_files as $template_file) {
           $template_data = get_file_data($template_file, array(
               'Template Name' => 'Template Name',
           ));
           
           // Nếu file có Template Name header
           if (!empty($template_data['Template Name'])) {
               $template_name = basename($template_file);
               $post_templates[$template_name] = $template_data['Template Name'];
           }
       }
       
       return $post_templates;
   });
}
add_action('after_setup_theme', 'theme_register_page_templates');

add_action('init', 'do_output_buffer');
function do_output_buffer() {
    ob_start();
}