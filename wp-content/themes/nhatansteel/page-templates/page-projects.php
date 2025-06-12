<?php
/**
 * Template Name: Projects Page
 * @package Nhatansteel
 */

get_header();
?>

<?php
// Banner image
$image_url_banner = get_field('projects_page_banner');
$default_image_url = get_stylesheet_directory_uri() . '/assets/images/banner-project.jpg';
$image_url = !empty($image_url_banner) && isset($image_url_banner['url'])
    ? esc_url($image_url_banner['url'])
    : $default_image_url;

// Title
$projects_page_title = get_field('projects_page_title') ?? '';

// Posts configurations
$projects_page_desc = get_field('projects_page_desc') ?? '';
$no_projects_found = get_field('no_projects_found') ?? 'Không có dự án nào'
    ?>

<section class="about-banner project-banner" style="
    background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0)), url('<?php echo $image_url; ?>');
    background-position: center center<?php if ($image_url === $default_image_url): ?>, center -62rem<?php else: ?>, center center<?php endif; ?>;
    background-repeat: no-repeat;
    background-size: cover;
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

<section class="project-types py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <h2 class="title"><?php echo $projects_page_title ?></h2>
            </div>
            <div class="col-md-8 mt-3 mt-md-0">
                <p class="description mb-0">
                    <?php echo $projects_page_desc ?>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="project-filter py-4">
    <div class="container">
        <form id="project-filter-form" method="get" class="filter-form d-flex flex-wrap align-items-center gap-3">
            <!-- Loại dự án -->
            <div class="form-group">
                <div class="custom-select">
                    <select name="project_category">
                        <option value="" selected>Tất cả danh mục</option>
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'project_category',
                            'hide_empty' => false,
                        ));
                        foreach ($terms as $term) {
                            $selected = (isset($_GET['project_category']) && $_GET['project_category'] == $term->slug) ? 'selected' : '';
                            echo "<option value='{$term->slug}' {$selected}>{$term->name}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Tên dự án -->
            <div class="form-group search-group position-relative">
                <input type="text" class="form-control" name="search_term" placeholder="Tên dự án"
                    value="<?php echo isset($_GET['search_term']) ? esc_attr($_GET['search_term']) : ''; ?>">
                <span class="search-icon">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/i-search.svg' ?>"
                        alt="search" width="18">
                </span>
            </div>

            <!-- Nút tìm kiếm -->
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
</section>

<section class="project-list py-5">
    <div class="container">
        <ul class="projects-grid list-unstyled">
            <?php
            $paged = get_query_var('paged') ?: 1;

            $tax_query = [];
            if (!empty($_GET['project_category'])) {
                $tax_query[] = array(
                    'taxonomy' => 'project_category',
                    'field' => 'slug',
                    'terms' => sanitize_text_field($_GET['project_category']),
                );
            }

            $args = array(
                'post_type' => 'project',
                'posts_per_page' => 9,
                'post_status' => 'publish',
                'paged' => $paged,
                's' => isset($_GET['search_term']) ? sanitize_text_field($_GET['search_term']) : '',
            );

            if (!empty($tax_query)) {
                $args['tax_query'] = $tax_query;
            }

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                    if (!$image_url) {
                        $gallery = get_post_meta(get_the_ID(), 'gallery', true);
                        if (!empty($gallery) && is_array($gallery)) {
                            $image_url = wp_get_attachment_url($gallery[0]);
                        }
                    }

                    $investor = get_post_meta(get_the_ID(), 'investor', true);
                    $steel_tonnage = get_post_meta(get_the_ID(), 'steel_tonnage', true);
                    $location = get_post_meta(get_the_ID(), 'location', true);
                    ?>
                    <li class="project-item">
                        <div class="project-thumb">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php the_title_attribute(); ?>"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="project-content">
                            <h5 class="project-title d-flex justify-content-between align-items-center">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?> <span class="arrow">→</span>
                                </a>
                            </h5>
                            <ul class="project-meta list-unstyled mb-0">
                                <?php if ($investor): ?>
                                    <li><strong>Chủ đầu tư:</strong> <?php echo esc_html($investor); ?></li>
                                <?php endif; ?>
                                <?php if ($steel_tonnage): ?>
                                    <li><strong>Khối lượng:</strong> <?php echo esc_html($steel_tonnage); ?></li>
                                <?php endif; ?>
                                <?php if ($location): ?>
                                    <li><strong>Địa điểm:</strong> <?php echo esc_html($location); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </li>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<li class="no-post-found">' . esc_html($no_projects_found) . '</li>';
            endif;
            ?>
        </ul>

        <!-- Pagination -->
        <?php render_custom_pagination($query); ?>

    </div>
</section>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/custom-page-projects.js"></script>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles-projects.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles-pagination.css">

<?php get_footer(); ?>