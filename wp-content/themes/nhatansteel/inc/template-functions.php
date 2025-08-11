<?php
if (!function_exists('render_custom_pagination')) {
    function render_custom_pagination($query) {
        $paged = (get_query_var('paged')) ? (int) get_query_var('paged') : 1;
        $total_pages = $query->max_num_pages;

        if ($total_pages <= 1) {
            return;
        }

        echo '<nav class="custom-pagination mt-4" aria-label="Pagination">';
        echo '<ul class="pagination-list">';

        $range = 2;
        $pages_to_show = [];

        // Logic cải tiến để tạo danh sách trang
        if ($total_pages <= 7) {
            // Nếu ít hơn 7 trang, hiển thị tất cả
            for ($i = 1; $i <= $total_pages; $i++) {
                $pages_to_show[] = $i;
            }
        } else {
            // Luôn hiển thị trang đầu
            $pages_to_show[] = 1;

            // Xác định range xung quanh trang hiện tại
            $start = max(2, $paged - $range);
            $end = min($total_pages - 1, $paged + $range);

            // Thêm range xung quanh trang hiện tại
            for ($i = $start; $i <= $end; $i++) {
                $pages_to_show[] = $i;
            }

            // Luôn hiển thị trang cuối (nếu khác trang đầu)
            if ($total_pages > 1) {
                $pages_to_show[] = $total_pages;
            }
        }

        // Loại bỏ duplicate và sắp xếp
        $pages_to_show = array_unique($pages_to_show);
        sort($pages_to_show);

        // Render từng trang với ellipsis
        $last_page = 0;
        foreach ($pages_to_show as $page_num) {
            // Thêm ellipsis nếu có gap
            if ($last_page && $page_num > $last_page + 1) {
                echo '<li class="pagination-item"><span class="page-separator">...</span></li>';
            }

            $is_current = ($page_num == $paged);
            $page_url = get_pagenum_link($page_num);
            
            if ($is_current) {
                echo '<li class="pagination-item"><span class="page-numbers current" aria-current="page">' . $page_num . '</span></li>';
            } else {
                echo '<li class="pagination-item"><a class="page-numbers" href="' . esc_url($page_url) . '">' . $page_num . '</a></li>';
            }
            
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