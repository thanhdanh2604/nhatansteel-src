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
$area = get_field('area', $project->ID);
$location = get_field('location', $project->ID);
$description = get_field('description', $project->ID);
$gallery = get_field('gallery', $project->ID);
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
                    <li><strong>Khối lượng:</strong> <?php echo esc_html($steel_tonnage) ?></li>
                    <li><strong>Diện tích:</strong> <?php echo esc_html($area) ?></li>
                    <li><strong>Địa điểm:</strong> <?php echo esc_html($location) ?></li>
                    <li><strong>Mô tả:</strong> <?php echo wp_kses_post($description) ?></li>
                </ul>
            </div>

            <!-- Right: Gallery -->
            <div class="col-12 col-md-8">
                <!-- Main Image Carousel -->
                <?php if ($gallery): ?>
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
                    <!-- Thumbnail Nav Carousel -->
                    <div class="carousel-nav"
                        data-flickity='{"asNavFor": "#gallery", "contain": true, "pageDots": false, "prevNextButtons": true}'>
                        <?php foreach ($gallery as $image): ?>
                            <div class="carousel-cell">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
                                    class="img-fluid rounded">
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>


<section class="project-detail-section py-5">
    <div class="container">
        <div class="d-flex mb-4 align-items-center">
            <h2 class="title mb-0">Dự án liên quan</h2>
            <a href="#" class="btn btn-xemtatca ms-auto">Xem tất cả
                <img src="<?= esc_url(get_stylesheet_directory_uri() . '/assets/images/icons/i-arrow-right-blue.svg'); ?>"
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
                                    <?php if ($area): ?>
                                        <li><strong>Diện tích:</strong> <?php echo esc_html($area); ?></li>
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

<?php get_footer(); ?>