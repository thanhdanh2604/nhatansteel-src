<?php
/**
 * Template Name: Trang chủ
 *
 * @package Nhatansteel
 */

get_header(); 
?>
<?php 
$projects = get_posts(array(
    'post_type' => 'project',
    'posts_per_page' => 6,
));
$posts = get_posts(array(
    'post_type' => 'post',
    'posts_per_page' => 4,
));
?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/styles-home.css">

<?php
$banners = get_field('banners');
$customers_partners = get_field('gallery_of_customer_and_partner');
?>
<div class="homepage">
    <section class="section-banner">
        <div class="carousel" data-flickity>
            <?php
                foreach ($banners as $banner){ 
                $image_src = $banner['image'];
                $title = $banner['title'];
                $sub_title = $banner['sub_title'];
            ?>
                <div class="carousel-cell">
                    <img src="<?php echo $image_src ?>" alt="banner" class="img-fluid"
                    onerror="this.onerror=null; this.src='<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner01.jpg';">
                    <div class="box-content">
                    <div class="container">
                        <p><?php echo esc_html($title) ?><`/p>
                        <h1><?php echo esc_html($title) ?></h1>
                    </div>
                    </div>
                </div>
            <?php }
             ?>
        </div>
    </section>
    <section class="about-section">
        <div class="container">
        <div class="row justify-content-center align-items-center top-head">
            <div class="col-lg-6 mb-4 mb-lg-0 position-relative">
            <div class="box-about-img">
                <div class="about-image-center">
                    <img src="<?php echo get_field('home_image_center') ?>" alt="ảnh giữa" class="img-fluid rounded shadow">
                </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="about-content">
                <h3><?php echo get_field('home_main_title') ?></h3>
                <p class="blockquote"><?php echo get_field('home_slogan') ?></p>
                <p class="mb-3">
                    <?php echo get_field('home_short_description') ?>
                </p>
                <a href="#" class="btn-aboutus text-orange text-decoration-none"><?php echo get_field('home_label_link_to_about_us') ?> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow-right" class="img-fluid" width="16"></a>
            </div>
            </div>
        </div>

        <div class="row text-center mt-5 stats-row">
            <div class="col-md-4 mb-4">
            <img src="<?php echo get_field('about_image_number_project') ?>" alt="Dự án" class="mb-4" style="height: 120px;">
            <h4><span class="count-number" data-target="<?php echo get_field('about_number_project') ?>">0</span>+</h4>
            <p class="mb-0"><?php echo get_field('about_title_number_projects') ?></p>
            </div>
            <div class="col-md-4 mb-4">
            <img src="<?php echo get_field('about_image_steel_output_number') ?>" alt="Sản lượng" class="mb-4" style="height: 120px;">
            <h4><span class="count-number" data-target="<?php echo get_field('about_number_output_steel') ?>">0</span>+</h4>
            <p class="mb-0"><?php echo get_field('about_image_title_output_steel_number') ?></p>
            </div>
            <div class="col-md-4 mb-4">
            <img src="<?php echo get_field('about_image_number_customer') ?>" alt="Khách hàng" class="mb-4" style="height: 120px;">
            <h4><span class="count-number" data-target="<?php echo get_field('about_number_of_customer') ?>">0</span>+</h4>
            <p class="mb-0"><?php echo get_field('about_title_number_customer') ?></p>
            </div>
        </div>
        </div>
    </section>

    <section class="product-section text-white position-relative" style="background-image: url('<?php echo wp_get_upload_dir()['baseurl']; ?>/2025/06/san-pham-background.jpg');background-position: center;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: #283678; opacity: 0.7; pointer-events: none; z-index: 1;"></div>
        <div class="position-relative" style="z-index: 2;">
        <div class="container">
        <h2 class="title">Sản phẩm</h2>
        <div class="row align-items-center">
            <div class="col-md-5 mb-4">
            <div class="product-main-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/san pham/feature san pham.jpg" alt="Sản phẩm" class="img-fluid shadow">
            </div>
            </div>
            <div class="col-md-7">
            <div class="row gy-3 gx-2">
                <div class="col-sm-6">
                <div class="product-item">
                    <div class="product-item-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/san pham/1.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="product-item-content">
                    <p class="mb-0">Mô hình nhà xưởng tiêu chuẩn</p>
                    <span class="arrow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow" class="img-fluid" width="22"></span>
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="product-item">
                    <div class="product-item-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/san pham/2.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="product-item-content">
                    <p class="mb-0">Kết cấu phụ khác</p>
                    <span class="arrow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow" class="img-fluid" width="22"></span>
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="product-item">
                    <div class="product-item-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/san pham/3.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="product-item-content">
                    <p class="mb-0">Hệ thống khung tiêu chuẩn</p>
                    <span class="arrow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow" class="img-fluid" width="22"></span>
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="product-item">
                    <div class="product-item-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/san pham/4.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="product-item-content">
                    <p class="mb-0">Hệ thống bao che hoàn thiện</p>
                    <span class="arrow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow" class="img-fluid" width="22"></span>
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="product-item">
                    <div class="product-item-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/san pham/5.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="product-item-content">
                    <p class="mb-0 small fw-bold text-uppercase">Chi tiết kết cấu</p>
                    <span class="arrow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow" class="img-fluid" width="22"></span>
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="product-item">
                    <div class="product-item-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/san pham/6.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="product-item-content">
                    <p class="mb-0 small fw-bold text-uppercase">Phụ kiện khác</p>
                    <span class="arrow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow" class="img-fluid" width="22"></span>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="service-section">
        <div class="container">
        <h2 class="title text-center">Dịch vụ</h2>

        <div class="row g-4 justify-content-center">
            <!-- Block 1 (Active/Default) -->
            <div class="col-md-4">
            <div class="service-box">
                <div class="image-box">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/thiet ke.jpg" class="img-fluid w-100 h-100 object-cover" alt="THIẾT KẾ">
                </div>
                <div class="description">
                <h6 class="fw-bold text-uppercase mb-2"><?php echo get_field('title_block_1') ?></h6>
                <p>
                  <?php echo get_field('noi_dung_dich_vu_1') ?>
                </p>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow blue" class="img-fluid" width="22"></a>
                </div>
                <a href="#" class="custom-btn">
               <?php echo get_field('title_block_1') ?> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow white" class="img-fluid" width="22">
                </a>
            </div>
            </div>

            <!-- Block 2 -->
            <div class="col-md-4">
            <div class="service-box">
                <div class="image-box">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/gia cong.jpg" class="img-fluid w-100 h-100 object-cover" alt="Gia công">
                </div>
                 <div class="description">
                <h6 class="fw-bold text-uppercase mb-2"><?php echo get_field('title_dich_vu_2') ?></h6>
                <p>
                    <?php echo get_field('noi_dung_dich_vu_2') ?>
                </p>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow blue" class="img-fluid" width="22"></a>
                </div>
                <a href="#" class="custom-btn">
               <?php echo get_field('title_dich_vu_2') ?> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow white" class="img-fluid" width="22">
                </a>
            </div>
            </div>

            <!-- Block 3 -->
            <div class="col-md-4">
            <div class="service-box">
                <div class="image-box">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homepage/lap dat.jpg" class="img-fluid w-100 h-100 object-cover" alt="Lắp dựng">
                </div>
                <div class="description">
                <h6 class="fw-bold text-uppercase mb-2"><?php echo get_field('title_dich_vu_3') ?></h6>
                <p>
                    <?php echo get_field('noi_dung_dich_vu_3') ?>
                </p>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow blue" class="img-fluid" width="22"></a>
                </div>
                <a href="#" class="custom-btn">
               <?php echo get_field('title_dich_vu_3') ?> <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow white" class="img-fluid" width="22">
                </a>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="project-section">
        <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <h2 class="title mb-0">Dự án tiêu biểu</h2>
            <a href="#" class="btn-xemtatca fw-medium text-decoration-none">Xem tất cả
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-all.svg" alt="Xem tất cả" width="16">
            </a>
        </div>

        <div class="row g-4">
            <?php
            // Loop through projects
            foreach ($projects as $project) {
                $project_image = get_the_post_thumbnail_url($project->ID, 'full');
                $project_title = get_the_title($project->ID);
                $project_investor = get_field('investor', $project->ID);
                $project_area = get_field('area', $project->ID);
                $project_location = get_field('location', $project->ID); ?>
            <div class="col-xl-4 col-md-6">
            <div class="project-card">
                <div class="project-card-img">
                <a href="#"><img src="<?php echo $project_image; ?>" class="img-fluid" alt="Dự án"></a>
                </div>
                <a href="#" class="project-title">
                <strong><?php echo $project_title ?></strong>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow-right" class="img-fluid" width="22">
                </a>
                <ul class="project-info ps-0 mb-0">
                <li><strong>Chủ đầu tư:</strong> <?php echo $project_investor ?></li>
                <li><strong>Diện tích:</strong> <?php echo $project_area ?></li>
                <li><strong>Địa điểm:</strong> <?php echo $project_location ?></li>
                </ul>
            </div>
            </div>
            <?php } ?>
        </div>
        </div>
    </section>

    <section class="customers-partners-section">
        <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="title">Khách hàng & Đối tác</h2>
            <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false }'>
                <?php
                foreach ($customers_partners as $customer_partner) {
                ?>
                
                    <div class="carousel-cell">
                    <a href="#"><img class="img-fluid" src="<?php echo $customer_partner['url'];?>" alt="đối tác"></a>
                </div>
                <?php } ?>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac02.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac01.png" alt="đối tác"></a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
   
    <section class="news-section text-white">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                <h2 class="title mb-0">Tin tức nổi bật</h2>
                <a href="#" class="btn-xemtatca text-white text-decoration-none fw-medium">Xem tất cả →</a>
            </div>
            <div class="row">
                <!-- Tin chính -->
                <div class="col-12 col-lg-5 mb-4">
                    <?php
                    // Lấy bài viết đầu tiên
                    $first_post = array_shift($posts); // Lấy bài viết đầu tiên và loại bỏ khỏi mảng
                    $thumbnail_feature_url = get_the_post_thumbnail_url($first_post->ID, 'thumbnail');
                    // Nếu không có ảnh đại diện, lấy ảnh đầu tiên trong nội dung bài viết
                    if (!$thumbnail_feature_url) {
                        preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $first_post->post_content, $image);
                        if (!empty($image['src'])) {
                            $thumbnail_feature_url = $image['src'];
                        }
                    }
                    ?>
                    <div class="highlight-news">
                        <span class="badge-new">Tin mới</span>
                        <div class="highlight-news-img">
                            <img src="<?php echo esc_url($thumbnail_feature_url); ?>" alt="<?php echo esc_attr($first_post->post_title); ?>" class="img-fluid">
                        </div>
                        <h6><?php echo esc_html($first_post->post_title); ?></h6>
                        <p><?php echo wp_trim_words($first_post->post_excerpt, 20, '...'); ?></p>
                        <a href="<?php echo get_permalink($first_post->ID); ?>" class="text-decoration-none">Xem chi tiết</a>
                    </div>
                </div>
                <!-- Danh sách tin phụ -->
                <div class="col-12 col-lg-7">
                    <div class="border-start border-light ps-lg-4 ps-3">
                        <?php foreach ($posts as $post) : ?>
                            <?php
                            $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'thumbnail');

                            // Nếu không có ảnh đại diện, lấy ảnh đầu tiên trong nội dung bài viết
                            if (!$thumbnail_url) {
                                preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $post->post_content, $image);
                                if (!empty($image['src'])) {
                                    $thumbnail_url = $image['src'];
                                }
                            }
                            ?>
                            <div class="news-item d-flex align-items-start mb-4">
                                <a href="<?php echo get_permalink($post->ID); ?>" class="news-thumb-sm">
                                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post->post_title); ?>" class="img-fluid">
                                </a>
                                <div>
                                    <h6 class="fw-bold text-white mb-1 small">
                                        <a href="<?php echo get_permalink($post->ID); ?>"><?php echo esc_html($post->post_title); ?></a>
                                    </h6>
                                    <p class="text-light small mb-1"><?php echo wp_trim_words($post->post_excerpt, 15, '...'); ?></p>
                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                        <span class="arrow-icon text-white">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow" class="img-fluid">
                                        </span>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <?php wp_reset_query(); ?>                       
    <section class="contact-section">
        <div class="container">
        <h2 class="title mb-4"><?php echo get_field('title_contact_section'); ?></h2>
        <div class="row g-4">
            <!-- Form -->
            <div class="col-lg-12">
                <div class="contact-form p-4 rounded">
                    <h5><?php echo get_field('sub_title_contact_form') ?></h5>
                    <?php echo do_shortcode('[contact-form-7 id="481c905" title="Contact form 1"]') ?>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
    
<?php
get_footer();