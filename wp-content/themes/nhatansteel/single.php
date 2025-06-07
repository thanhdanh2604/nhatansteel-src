<?php

get_header();

$default_cat_id = get_option('default_category');
$categories = get_categories(array(
  'taxonomy' => 'category',
  'hide_empty' => true,
  'exclude' => $default_cat_id,
  'orderby' => 'name',
  'order' => 'DES',
));

$post_categories = get_the_category();
$post_cat_slugs = wp_list_pluck($post_categories, 'slug');
?>

<section class="about-banner">
    <div class="container">
        <div class="banner-text">
            <h1>Tin tức</h1>
            <p class="breadcrumb-text mb-0">
                <a href="<?php echo home_url(); ?>">Trang chủ</a> /
                <a href="<?php echo get_page_permalink_by_template('page-posts.php'); ?>">Bài viết</a> /
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
          $is_active = in_array($cat_slug, $post_cat_slugs);
          ?>
          <a class="category-btn <?php echo $is_active ? 'active' : ''; ?>"
            href="<?php echo esc_url(add_query_arg('cat', $cat_slug, get_page_permalink_by_template('page-posts.php'))); ?>">
            <?php echo $cat_name; ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="news-detail-section py-5">
    <div class="container">
        <div class="row">
            <!-- Main content -->
            <div class="col-lg-9 news-detail-content">
                <h2 class="news-title"><?php the_title(); ?></h2>
                <div class="news-meta">
                    <?php echo get_the_date('l, d-m-Y'); ?>
                </div>
                <div class="news-content text-dark-blue">
                    <?php the_content(); ?>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="latest-news-widget">
                    <div class="widget-title">Tin mới nhất</div>

                    <?php
                    $latest_posts = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        'post_status' => 'publish'
                    ));

                    if ($latest_posts->have_posts()):
                        $post_count = 0;
                        while ($latest_posts->have_posts()):
                            $latest_posts->the_post();
                            $post_count++;
                            ?>
                            <div class="news-item">
                                <?php if ($post_count === 1): ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('medium', array('class' => 'img-fluid'));
                                        } else {
                                            $content = get_the_content();
                                            preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $content, $image);
                                            if (!empty($image['src'])) {
                                                echo '<img src="' . esc_url($image['src']) . '" class="img-fluid" />';
                                            } else {
                                                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/default-thumbnail.jpg') . '" class="img-fluid" />';
                                            }
                                        }
                                        ?>
                                    </a>
                                <?php endif; ?>
                                <a class="latest-new-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                    <a class="read-more" href="<?php echo get_page_permalink_by_template('page-posts.php'); ?>">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles-single-post.css">

<?php get_footer(); ?>