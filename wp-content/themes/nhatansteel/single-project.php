<?php

/**
 * Template Name: Project Detail
 */
get_header();
?>

<?php
$project_slug = get_query_var('project');
$project = get_page_by_path($project_slug, OBJECT, 'project');

$title = $project ? get_the_title($project->ID) : '';

// ACF fields
$investor = get_field('investor', $project->ID);
$steel_tonnage = get_field('steel_tonnage', $project->ID);
$location = get_field('location', $project->ID);
$industry = get_field('industry', $project->ID);
$fdi_ddi = get_field('fdi_ddi', $project->ID);
$gallery = get_field('gallery', $project->ID);
$categories = get_the_terms($project->ID, 'project_category');
$category_slug = "";
if ($project && isset($project->ID)) {
    $categories = get_the_terms($project->ID, 'project_category');
    if (!empty($categories) && !is_wp_error($categories)) {
        $category_slug = $categories[0]->slug;
    }
}
$base_projects_url = get_page_permalink_by_template('page-projects.php');
$link = !empty($category_slug) ? $base_projects_url . '?project_category=' . $category_slug : $base_projects_url;
?>

<section class="about-banner">
    <div class="container">
        <div class="banner-text">
            <h1>Dự án</h1>
            <p class="breadcrumb-text mb-0">
                <a href="<?php echo home_url(); ?>">Trang chủ</a> /
                <a href="<?php echo get_page_permalink_by_template('page-projects.php'); ?>">Dự án</a> /
                <a href="<?php echo get_permalink($project->ID); ?>"><?php echo $title; ?></a>
            </p>
        </div>
    </div>
</section>

<section class="project-detail-section py-5">
    <div class="container">
        <h2 class="title"><?php echo $title ?></h2>
        <div class="row align-items-start gy-4">
            <!-- Left: Info -->
            <div class="col-12 col-md-4">
                <ul class="list-unstyled project-info">
                    <li><strong>Chủ đầu tư:</strong> <?php echo esc_html($investor) ?></li>
                    <li><strong>Địa điểm:</strong> <?php echo esc_html($location) ?></li>
                    <li><strong>Khối lượng:</strong> <?php echo esc_html($steel_tonnage) ?></li>
                    <li><strong>Ngành nghề:</strong> <?php echo esc_html($industry) ?></li>
                    <li><strong>FDI/DDI:</strong> <?php echo esc_html($fdi_ddi) ?></li>
                </ul>
            </div>

            <!-- Right: Gallery -->
            <div class="col-12 col-md-8">
                <!-- Main Image Carousel -->
                <div id="gallery" class="carousel-main mb-3"
                    data-flickity='{"pageDots": false, "wrapAround": true, "contain": true, "prevNextButtons": false}'>
                    <?php foreach ($gallery as $image): ?>
                        <div class="carousel-cell">
                            <a href="<?php echo esc_url($image['url']); ?>" data-lg-size="1600-1200">
                                <img src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid rounded w-100">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Thumbnail Carousel Wrapper (for positioning buttons) -->
                <div class="position-relative">
                    <!-- Left Button -->
                    <button id="thumbPrevBtn"
                        class="btn btn-secondary position-absolute top-50 start-0 translate-middle-y z-3 custom-nav-btn">
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <!-- Thumbnail Nav Carousel -->
                    <div class="carousel-nav" id="thumbnailGallery"
                        data-flickity='{"asNavFor": "#gallery", "contain": true, "pageDots": false, "prevNextButtons": false}'>
                        <?php foreach ($gallery as $image): ?>
                            <div class="carousel-cell">
                                <img src="<?php echo esc_url($image['url']); ?>"
                                    alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid rounded">
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Right Button -->
                    <button id="thumbNextBtn"
                        class="btn btn-secondary position-absolute top-50 end-0 translate-middle-y z-3 custom-nav-btn">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="project-detail-section py-5">
    <div class="container">
        <div class="d-flex mb-4 align-items-center">
            <h2 class="title mb-0">Dự án liên quan</h2>
            <a href="<?php echo esc_url($link); ?>" class="btn btn-xemtatca ms-auto">
                Xem tất cả
                <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/icons/i-arrow-right-blue.svg'); ?>"
                    alt="22">
            </a>
        </div>

        <div class="project-list">
            <ul class="projects-grid list-unstyled">
                <?php
                $current_project_id = $project->ID;
                $terms = wp_get_post_terms($current_project_id, 'project_category', array('fields' => 'ids'));

                $args = array(
                    'post_type' => 'project',
                    'posts_per_page' => 3,
                    'post__not_in' => array($current_project_id),
                    'post_status' => 'publish',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'project_category',
                            'field' => 'term_id',
                            'terms' => $terms,
                        ),
                    ),
                );

                $related_projects = new WP_Query($args);

                if ($related_projects->have_posts()):
                    while ($related_projects->have_posts()):
                        $related_projects->the_post();
                        $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                        if (!$image_url) {
                            $gallery = get_post_meta(get_the_ID(), 'gallery', true);
                            if (!empty($gallery) && is_array($gallery)) {
                                $image_url = wp_get_attachment_url($gallery[0]);
                            }
                        }

                        $investor = get_field('investor');
                        $area = get_field('area');
                        $location = get_field('location');
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
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?> <span class="arrow">→</span></a>
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
                    echo '<li>Không có dự án liên quan.</li>';
                endif;
                ?>
            </ul>
        </div>
    </div>
</section>

<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles-single-project.css">

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var galleryElement = document.querySelector('#gallery');

        if (!galleryElement) return;

        var mainGallery = new Flickity(galleryElement, {
            pageDots: false,
            wrapAround: true,
            contain: true,
            prevNextButtons: false
        });

        const prevBtn = document.getElementById('thumbPrevBtn');
        const nextBtn = document.getElementById('thumbNextBtn');

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', function () {
                mainGallery.previous();
            });

            nextBtn.addEventListener('click', function () {
                mainGallery.next();
            });
        }
    });
</script>


<?php get_footer(); ?>