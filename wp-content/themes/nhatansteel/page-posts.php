<?php

/**
 * Template Name: News page
 */
get_header();
?>

<?php
// Banner image
$image_url_banner = get_field('banner_image');
$image_url = !empty($image_url_banner) && isset($image_url_banner['url'])
  ? esc_url($image_url_banner['url'])
  : get_stylesheet_directory_uri() . '/assets/images/banner-gioithieu.jpg';

// Title
$news_title = get_field('news_title') ?? '';

// Posts configurations
$see_more_button_content = get_field('see_more_button_content') ?? "Xem thêm";
$no_post_found = get_field('no_post_found') ?? "Không có bài viết nào"
?>

<section class="about-banner" style="
  background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0))<?php if ($image_url): ?>, url('<?php echo $image_url; ?>')<?php endif; ?>;
">
  <div class="container">
    <div class="banner-text">
      <h1><?php echo esc_html(get_the_title()); ?></h1>
      <p class="breadcrumb-text mb-0">
        <a href="<?php echo home_url(); ?>">Trang chủ</a> / <?php echo esc_html(get_the_title()); ?>
      </p>
    </div>
  </div>
</section>

<section class="section-news">
  <div class="container">
    <h2 class="title"><?php echo $news_title ?></h2>

    <ul class="news-list">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'paged' => $paged,
      );

      $news_query = new WP_Query($args);

      if ($news_query->have_posts()):
        while ($news_query->have_posts()):
          $news_query->the_post();
          $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
          if (!$thumbnail_url) {
            // If the thumbnail image not set, render the first post's image
            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', get_the_content(), $image);
            if (!empty($image['src'])) {
              $thumbnail_url = $image['src'];
            }
          }
          ?>
          <li class="news-item">
            <div class="news-thumb">
              <?php if ($thumbnail_url): ?>
                <a href="<?php the_permalink(); ?>">
                  <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid">
                </a>
              <?php endif; ?>
            </div>

            <div class="news-content">
              <h5 class="news-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h5>
              <p class="news-desc">
                <?php echo wp_trim_words(get_the_content(), 50, ''); ?>...
              </p>
              <p class="d-flex justify-content-end">
                <a href="<?php the_permalink(); ?>" class="read-more">
                  <?php echo $see_more_button_content ?> <span class="arrow">→</span>
                </a>
              </p>
            </div>
          </li>
          <?php
        endwhile;
        wp_reset_postdata();
      else:
        echo '<li class="no-post-found">Không có bài viết nào.</li>';
      endif;
      ?>
    </ul>

    <!-- Pagination -->
    <nav class="custom-pagination mt-4" aria-label="Pagination">
      <ul class="pagination-list">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $total_pages = $news_query->max_num_pages;

        if ($total_pages > 1):
          $paginate_links = paginate_links(array(
            'total' => $total_pages,
            'current' => $paged,
            'type' => 'array',
            'add_args' => false,
            'prev_next' => false,
          ));

          if (is_array($paginate_links)):
            $first_pages = array_slice($paginate_links, 0, 3);
            $last_page = end($paginate_links);

            foreach ($first_pages as $page):
              echo '<li class="pagination-item">' . $page . '</li>';
            endforeach;

            if ($total_pages > 3):
              echo '<li class="pagination-item"><span class="page-separator">...</span></li>';
              echo '<li class="pagination-item">' . $last_page . '</li>';
            endif;
          endif;
        endif;
        ?>
      </ul>
    </nav>
  </div>
</section>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles-news.css">

<?php get_footer(); ?>