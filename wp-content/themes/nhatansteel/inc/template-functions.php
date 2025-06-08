<?php
if (!function_exists('render_custom_pagination')) {
    function render_custom_pagination($query) {
        $paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
        $total_pages = $query->max_num_pages;

        if ($total_pages <= 1) {
            return; // Không cần hiển thị nếu chỉ có 1 trang
        }

        $paginate_links = paginate_links([
            'total' => $total_pages,
            'current' => $paged,
            'type' => 'array',
            'add_args' => false,
            'prev_next' => false,
        ]);

        if (!is_array($paginate_links)) {
            return;
        }

        $pages_to_show = [];
        $range = 2;

        $pages_to_show[] = 1;
        $pages_to_show[] = $total_pages;

        for ($i = $paged - $range; $i <= $paged + $range; $i++) {
            if ($i > 1 && $i < $total_pages) {
                $pages_to_show[] = $i;
            }
        }

        $pages_to_show = array_unique($pages_to_show);
        sort($pages_to_show);

        echo '<nav class="custom-pagination mt-4" aria-label="Pagination">';
        echo '<ul class="pagination-list">';

        $last_page = 0;

        foreach ($pages_to_show as $page_num) {
            $index = $page_num - 1;

            if ($last_page && $page_num > $last_page + 1) {
                echo '<li class="pagination-item"><span class="page-separator">...</span></li>';
            }

            echo '<li class="pagination-item">' . $paginate_links[$index] . '</li>';
            $last_page = $page_num;
        }

        echo '</ul></nav>';
    }
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'nav_active ';
  }
  return $classes;
}