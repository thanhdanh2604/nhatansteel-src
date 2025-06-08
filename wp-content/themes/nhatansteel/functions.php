<?php

function nhatan_enqueue_styles() {
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css');
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0', true);
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

add_action('init', 'do_output_buffer');
function do_output_buffer() {
    ob_start();
}

add_theme_support('post-thumbnails');
function nhatansteel_register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu', 'nhatansteel' ),
        )
    );
}
add_action( 'after_setup_theme', 'nhatansteel_register_menus' );
class Bootstrap_NavWalker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';
        if ( in_array( 'menu-item-has-children', $classes ) ) {
            $classes[] = 'dropdown';
        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= '<li' . $class_names .'>';

        $atts = array();
        $atts['class'] = 'nav-link';
        if ( in_array( 'menu-item-has-children', $classes ) ) {
            $atts['class'] .= ' dropdown-toggle';
            $atts['data-bs-toggle'] = 'dropdown';
        }
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $output .= '<a'. $attributes .'>'. $title .'</a>';
    }
}

add_action('wp_enqueue_scripts', 'enqueue_custom_pagination_styles');

require_once get_stylesheet_directory() . '/inc/template-functions.php';
