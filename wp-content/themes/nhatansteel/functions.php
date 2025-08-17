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

// Include custom post types in search và mở rộng search cho custom fields
function include_custom_post_types_in_search($query) {
    if ($query->is_search() && $query->is_main_query() && !is_admin()) {
        $query->set('post_type', array('post', 'project'));
        
        // Thêm meta query để tìm trong custom fields
        $search_term = $query->get('s');
        if (!empty($search_term)) {
            $meta_query = array(
                'relation' => 'OR',
                array(
                    'key' => 'investor',
                    'value' => $search_term,
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'location',
                    'value' => $search_term,
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'steel_tonnage',
                    'value' => $search_term,
                    'compare' => 'LIKE'
                ),
                array(
                    'key' => 'industry',
                    'value' => $search_term,
                    'compare' => 'LIKE'
                )
            );
            $query->set('meta_query', $meta_query);
        }
    }
}
add_action('pre_get_posts', 'include_custom_post_types_in_search');

// Custom search function để tìm trong cả content và custom fields
function custom_search_where($where, $wp_query) {
    global $wpdb;
    
    if (!$wp_query->is_search() || $wp_query->is_admin()) {
        return $where;
    }
    
    $search_term = $wp_query->get('s');
    if (empty($search_term)) {
        return $where;
    }
    
    // Tạo custom WHERE clause
    $custom_where = $wpdb->prepare("
        OR EXISTS (
            SELECT 1 FROM {$wpdb->postmeta} 
            WHERE {$wpdb->postmeta}.post_id = {$wpdb->posts}.ID 
            AND (
                ({$wpdb->postmeta}.meta_key = 'investor' AND {$wpdb->postmeta}.meta_value LIKE %s) OR
                ({$wpdb->postmeta}.meta_key = 'location' AND {$wpdb->postmeta}.meta_value LIKE %s) OR
                ({$wpdb->postmeta}.meta_key = 'steel_tonnage' AND {$wpdb->postmeta}.meta_value LIKE %s) OR
                ({$wpdb->postmeta}.meta_key = 'industry' AND {$wpdb->postmeta}.meta_value LIKE %s)
            )
        )", 
        '%' . $search_term . '%',
        '%' . $search_term . '%', 
        '%' . $search_term . '%',
        '%' . $search_term . '%'
    );
    
    $where .= $custom_where;
    
    return $where;
}
add_filter('posts_where', 'custom_search_where', 10, 2);

// Live Search AJAX Handler
add_action('wp_ajax_live_search', 'handle_live_search');
add_action('wp_ajax_nopriv_live_search', 'handle_live_search');

function handle_live_search() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'live_search_nonce')) {
        wp_die('Security check failed');
    }

    $query = sanitize_text_field($_POST['query']);
    $current_language = substr(get_locale(), 0, 2);
    
    $args = array(
        'post_type' => array('post', 'project'),
        'post_status' => 'publish',
        's' => $query,
        'posts_per_page' => 5,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'investor',
                'value' => $query,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'location', 
                'value' => $query,
                'compare' => 'LIKE'
            )
        )
    );

    $search_query = new WP_Query($args);
    $results = array();

    if ($search_query->have_posts()) {
        while ($search_query->have_posts()) {
            $search_query->the_post();
            
            $image_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            if (!$image_url) {
                if (get_post_type() == 'project') {
                    $gallery = get_field('gallery');
                    if (!empty($gallery) && is_array($gallery)) {
                        $image_url = $gallery[0]['sizes']['thumbnail'];
                    }
                }
                if (!$image_url) {
                    $image_url = get_stylesheet_directory_uri() . '/assets/images/img.jpg';
                }
            }

            $type_label = get_post_type() == 'project' 
                ? ($current_language == 'vi' ? 'Dự án' : 'Project')
                : ($current_language == 'vi' ? 'Tin tức' : 'News');

            $results[] = array(
                'title' => get_the_title(),
                'url' => get_permalink(),
                'image' => $image_url,
                'type' => $type_label
            );
        }
        wp_reset_postdata();
    }

    wp_send_json_success($results);
}
