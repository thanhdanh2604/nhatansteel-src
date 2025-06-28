<?php
/**
 * Template Name: Posts page
 * @package Nhatansteel
 */

get_header();
?>

<?php
// Current language
$current_lang = function_exists('pll_current_language') ? pll_current_language() : 'vi';

// Banner image
$image_url_banner = get_field('banner_image');
$image_url = !empty($image_url_banner) && isset($image_url_banner['url'])
  ? esc_url($image_url_banner['url'])
  : get_stylesheet_directory_uri() . '/assets/images/tintuc01.jpg';

// Title
$news_title = get_field('news_title') ?? '';

// Categories and category auto-navigation
$default_cat_id = get_option('default_category');
$categories = get_categories(array(
  'taxonomy' => 'category',
  'hide_empty' => true,
  'exclude' => $default_cat_id,
  'orderby' => 'name',
  'order' => 'DES',
));

// Get the first category's slug or use 'uncategorized' as default
$first_category_slug = 'uncategorized';
foreach ($categories as $category) {
    $posts = get_posts(array(
        'post_type' => 'post',
        'posts_per_page' => 1,
        'category' => $category->term_id,
        'post_status' => 'publish',
    ));

    if (!empty($posts)) {
        $first_category_slug = $category->slug;
        break;
    }
}

// Check if the 'cat' parameter is in the URL, otherwise default to the first category
$category_slug = isset($_GET['cat']) ? sanitize_text_field($_GET['cat']) : $first_category_slug;

// Redirect to the first category if no 'cat' parameter is set
if (empty($_GET['cat']) && !empty($categories)) {
  wp_redirect(add_query_arg('cat', $first_category_slug, get_permalink()));
  exit;
}

// Dynamic contents
$front_page_id = get_option('page_on_front');
if (function_exists('pll_get_post')) {
    $front_page_id = pll_get_post($front_page_id, $current_lang);
}
$front_page_title = $front_page_id ? get_the_title($front_page_id) : '';

$see_more_button_content = "Xem thêm";
$no_post_found = "Không có bài viết nào.";
if ( $current_lang === 'en' ) {
    $see_more_button_content = "See more";
    $no_post_found = "No posts found.";
}
?>

<section class="about-banner" style="
    background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0))<?php if ($image_url): ?>, url('<?php echo $image_url; ?>')<?php endif; ?>;
    background-repeat: no-repeat;
    background-size: cover;
">
  <div class="container">
    <div class="banner-text">
      <h1><?php echo esc_html(get_the_title()); ?></h1>
      <p class="breadcrumb-text mb-0">
        <a href="<?php echo home_url(); ?>"><?php echo $front_page_title ?></a> / <?php echo esc_html(get_the_title()); ?>
      </p>
    </div>
  </div>
</section>

<?php if (!empty($categories)): ?>
  <section class="section-news-categories">
    <div class="container">
      <div class="categories-wrapper">
        <?php foreach ($categories as $category):
          $cat_slug = $category->slug;
          $cat_name = esc_html($category->name);
          $is_active = isset($_GET['cat']) && $_GET['cat'] === $cat_slug;
          ?>
          <a class="category-btn <?php echo $is_active ? 'active' : ''; ?>"
            href="<?php echo esc_url(add_query_arg('cat', $cat_slug, get_permalink(get_option('page_posts')))); ?>">
            <?php echo $cat_name; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

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

      if (!empty($category_slug)) {
        $args['category_name'] = $category_slug;
      }

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
        echo '<li class="no-post-found">' . esc_html($no_post_found) . '</li>';
      endif;
      ?>
    </ul>

    <!-- Pagination -->
    <?php render_custom_pagination($news_query); ?>
  </div>
</section>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles-posts.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles-pagination.css">

<?php get_footer((substr(get_locale(), 0, 2) === 'en') ? 'en':''); ?>