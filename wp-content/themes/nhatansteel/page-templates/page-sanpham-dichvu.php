<?php

/**
 * Template Name: San Pham Dich Vu Page
 */
get_header(); ?>
<?php
$image_url_banner = get_field('banner_image');
$title_tap_sp = get_field('text_tap_product');
$title_tap_dv = get_field('text_tap_services');
//tap san pham
$detail = get_field('content_detail_tap_sp');
// Section Giới thiệu
$section_gioi_thieu = $detail['section_gioi_thieu'] ?? [];
$image_intro = $section_gioi_thieu['main_image']['url'] ?? '';
$title_intro = $section_gioi_thieu['title'] ?? '';
$content_intro = $section_gioi_thieu['content'] ?? '';

// Section Mô hình
$section_mo_hinh = $detail['section_mo_hinh'] ?? [];
$image_mo_hinh = $section_mo_hinh['main_image']['url']  ?? '';
$title_mo_hinh = $section_mo_hinh['title'] ?? '';
$desc_mo_hinh = $section_mo_hinh['list_colum_desc'] ??  [];

// Section Hệ thống khung
$section_khung = $detail['section_hethong_khung'] ?? [];
$title_khung = $section_khung['title'] ?? '';
$list_products_khung = $section_khung['list_products'] ?? [];

// Section Chi tiết kết cấu
$section_ketcau = $detail['section_chitiet_ketcau'] ?? [];
$title_ketcau = $section_ketcau['title'] ?? '';
$list_tap = $section_ketcau['list_tap'] ?? [];
$list_content_tap = $section_ketcau['list_content_tap'] ?? [];

// Section kết cấu phụ khác
$section_ketcau_phukhac = $detail['section_ketcau_phukhac'] ?? [];
$title_ketcau_phukhac = $section_ketcau_phukhac['title']  ?? '';
$list_products_ketcau_phukhac = $section_ketcau_phukhac['list_products'] ?? [];

// Section Hệ thống bao che
$section_baoche = $detail['section_hethong_baoche'] ?? [];
$title_baoche = $section_baoche['title'] ?? '';
$list_products_baoche = $section_baoche['list_products'] ?? [];

// Section Phụ kiện
$section_phukien = $detail['section_phu_kien'] ?? [];
$title_phukien = $section_phukien['title']  ?? '';
$list_products_phukien = $section_phukien['list_products'] ?? [];

//tap dich vu
$detail = get_field('content_detail_tap_dv');
// Section Thiết kế
$section_thiet_ke = $detail['section_thiet_ke'] ?? [];
$image_thiet_ke = $section_thiet_ke['main_image']['url'] ?? '';
$title_thiet_ke = $section_thiet_ke['title'] ?? '';

// Section Tiêu chuẩn và phần mềm
$section_tieuchuan_phanmem = $detail['section_tieuchuan_phanmem'] ?? [];
$image_tieuchuan = $section_tieuchuan_phanmem['main_image']['url'] ?? '';
$title_tieuchuan = $section_tieuchuan_phanmem['title'] ?? '';
$design_list = $section_tieuchuan_phanmem['design_list'] ?? [];
$software_category = $section_tieuchuan_phanmem['software_category'] ?? [];


// Section Gia công
$section_gia_cong = $detail['section_gia_cong'] ?? [];
$image_gia_cong = $section_gia_cong['main_image']['url'] ?? '';
$title_gia_cong = $section_gia_cong['title'] ?? '';

// Section Lắp dựng
$section_lap_dung = $detail['section_lap_dung'] ?? [];
$image_lap_dung = $section_lap_dung['main_image']['url'] ?? '';
$title_lap_dung = $section_lap_dung['title'] ?? '';

// Section An toàn
$section_an_toan = $detail['section_an_toan'] ?? [];
$image_an_toan = $section_an_toan['main_image']['url'] ?? '';
$title_an_toan = $section_an_toan['title'] ?? '';
$content_an_toan = $section_an_toan['desc'] ?? '';
?>

<section class="about-banner product-services-banner" style="
    background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0)), url('<?php echo esc_url($image_url_banner['url']); ?>');
">
    <div class="container">
        <div class="banner-text">
            <h1><?php echo esc_html(get_the_title()); ?></h1>
            <p class="breadcrumb-text mb-0">
                <?php
                $front_page_id = get_option('page_on_front');
                $front_page_url = get_permalink($front_page_id);
                $front_page_title = get_the_title($front_page_id);
                ?>
                <a href="<?php echo esc_url($front_page_url); ?>"><?php echo esc_html($front_page_title); ?></a> /
                <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a> /
                <span class="breadcrumb-dynamic"><?php echo $title_tap_sp; ?></span>
            </p>

        </div>
    </div>
</section>

<section class="steel-tabs-section">
    <!-- Tabs -->
    <div class="steel-tabs d-flex mb-5">
        <div class="container">
            <button class="tab-btn active" data-tab="product"><?php echo $title_tap_sp ?></button>
            <button class="tab-btn" data-tab="service"><?php echo $title_tap_dv ?></button>
        </div>
    </div>

    <div class="container">
        <!-- Content -->
        <div class="tab-contents position-relative">
            <div class="tab-pane active" id="product">
                <h2 class="title"><?php echo $title_intro ?></h2>
                <div class="box-product-info">
                    <div class="row align-items-center mt-4">
                        <div class="col-12 col-md-8">
                            <div class="content-box">
                                <?php echo $content_intro  ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center mt-4 mt-md-0">
                            <div class="tab-product-img">
                                <?php if (!empty($image_intro)): ?>
                                    <img src="<?= esc_url($image_intro) ?>" alt="Ứng dụng" class="img-fluid rounded">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="about-wrapper products-wrapper py-5">
                    <div class="container">
                        <div class="row">
                            <!-- Sidebar -->
                            <div class="col-md-3 mb-4">
                                <div class="steel-tabs-sidebar-wrapper">
                                    <ul class="steel-tabs-sidebar list-unstyled">
                                        <li><a class="active" href="#mo-hinh"><?php echo $title_mo_hinh ?></a></li>
                                        <li><a href="#hethong-khung"><?php echo $title_khung ?></a></li>
                                        <li><a href="#chitiet-ketcau"><?php echo $title_ketcau ?></a></li>
                                        <li><a href="#ketcau-phukhac"><?php echo $title_ketcau_phukhac ?></a></li>
                                        <li><a href="#hethong-baoche"><?php echo $title_baoche ?></a></li>
                                        <li><a href="#phu-kien"><?php echo $title_phukien ?></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="col-md-9">
                                <div id="mo-hinh" class="section-block mb-5">
                                    <h2 class="title mb-0"><?php echo $title_mo_hinh ?></h2>
                                    <?php if (!empty($image_mo_hinh)): ?>
                                        <div class="box-big-img">
                                            <img src="<?= esc_url($image_mo_hinh) ?>" alt="products" class="img-fluid">
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($desc_mo_hinh)): ?>
                                        <div class="mo-hinh-desc">
                                            <?php foreach ($desc_mo_hinh as $item): ?>
                                                <div class="mo-hinh-desc-col">
                                                    <?php echo ($item['content_detail']); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>

                                <div id="hethong-khung" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_khung ?></h2>
                                    <?php if (!empty($list_products_khung)): ?>
                                        <ul class="list-products">
                                            <?php foreach ($list_products_khung as $item): ?>
                                                <?php
                                                $image_url = $item['main_image']['url'] ?? '';
                                                $title = $item['title'] ?? '';
                                                ?>
                                                <li>
                                                    <div class="box-img">
                                                        <?php if ($image_url): ?>
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <h4><?php echo esc_html($title); ?></h4>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <div id="chitiet-ketcau" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_ketcau ?></h2>
                                    <section class="structure-detail-section py-5 pt-0">
                                        <div class="container">
                                            <!-- Tabs Navigation -->
                                            <?php if (!empty($list_tap) && is_array($list_tap)): ?>
                                                <div class="nav-tabs-scroll">
                                                    <div class="nav nav-tabs">
                                                        <?php foreach ($list_tap as $index => $tab): ?>
                                                            <button class="nav-link <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="tab<?php echo $index + 1; ?>">
                                                                <?php echo esc_html($tab['title'] ?? ''); ?>
                                                            </button>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Tabs Content -->
                                            <?php if (!empty($list_content_tap) && is_array($list_content_tap)): ?>
                                                <div class="tab-content-area">
                                                    <?php foreach ($list_content_tap as $index => $content): ?>
                                                        <div class="tab-content-detail <?php echo $index === 0 ? 'active' : 'd-none'; ?>" id="tab<?php echo $index + 1; ?>">
                                                            <ul class="list-products">
                                                                <?php foreach ($content['list_products'] ?? [] as $item): ?>
                                                                    <li>
                                                                        <div class="box-img">
                                                                            <?php if (!empty($item['main_image']['url'])): ?>
                                                                                <img src="<?php echo esc_url($item['main_image']['url']); ?>" alt="<?php echo esc_attr($item['title'] ?? ''); ?>" class="img-fluid">
                                                                            <?php endif; ?>
                                                                        </div>
                                                                        <?php if (!empty($item['title'])): ?>
                                                                            <h4><?php echo esc_html($item['title']); ?></h4>
                                                                        <?php endif; ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </section>

                                </div>
                                <div id="ketcau-phukhac" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_ketcau_phukhac ?></h2>
                                    <?php if (!empty($list_products_ketcau_phukhac)): ?>
                                        <ul class="list-products accessory-list">
                                            <?php foreach ($list_products_ketcau_phukhac as $item): ?>
                                                <?php
                                                $image_url = $item['main_image']['url'] ?? '';
                                                $title = $item['title'] ?? '';
                                                ?>
                                                <li>
                                                    <div class="box-img">
                                                        <?php if ($image_url): ?>
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <h4><?php echo esc_html($title); ?></h4>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <div id="hethong-baoche" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_baoche ?></h2>
                                    <?php if (!empty($list_products_baoche)): ?>
                                        <ul class="list-products accessory-list">
                                            <?php foreach ($list_products_baoche as $item): ?>
                                                <?php
                                                $image_url = $item['main_image']['url'] ?? '';
                                                $title = $item['title'] ?? '';
                                                ?>
                                                <li>
                                                    <div class="box-img">
                                                        <?php if ($image_url): ?>
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <h4><?php echo esc_html($title); ?></h4>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <div id="phu-kien" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_phukien ?></h2>
                                    <?php if (!empty($list_products_phukien)): ?>

                                        <ul class="list-products accessory-list">

                                            <?php foreach ($list_products_phukien as $item): ?>
                                                <?php
                                                $image_url = $item['main_image']['url'] ?? '';
                                                $title = $item['title'] ?? '';
                                                ?>
                                                <li>
                                                    <div class="box-img">
                                                        <?php if ($image_url): ?>
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <h4><?php echo esc_html($title); ?></h4>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <div class="tab-pane d-none" id="service">
                <section class="about-wrapper p-0">
                    <div class="container">
                        <div class="row">
                            <!-- Sidebar -->
                            <div class="col-md-3 mb-4">
                                <div class="steel-tabs-sidebar-wrapper">
                                    <ul class="steel-tabs-sidebar list-unstyled">
                                        <li><a class="active" href="#thiet-ke"><?php echo $title_thiet_ke ?></a></li>
                                        <li><a href="#tieuchuan-phanmem"><?php echo $title_tieuchuan ?></a></li>
                                        <li><a href="#gia-cong"><?php echo $title_gia_cong ?></a></li>
                                        <li><a href="#lap-dung"><?php echo $title_lap_dung ?></a></li>
                                        <li><a href="#an-toan"><?php echo $title_an_toan ?></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="col-md-9">
                                <div id="thiet-ke" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_thiet_ke ?></h2>
                                    <?php if (!empty($image_thiet_ke)): ?>
                                        <img src="<?= esc_url($image_thiet_ke) ?>" alt="Thiết kế" class="img-fluid">
                                    <?php endif; ?>
                                </div>

                                <div id="tieuchuan-phanmem" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_tieuchuan ?></h2>
                                    <?php if (!empty($design_list)): ?>
                                        <ul class="design-list">
                                            <?php foreach ($design_list as $item): ?>
                                                <?php
                                                $image_url = $item['main_image']['url'] ?? '';
                                                $title = $item['title'] ?? '';
                                                ?>
                                                <li>
                                                    <div class="box-img">
                                                        <?php if ($image_url): ?>
                                                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <p><?php echo esc_html($title); ?></p>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if (!empty($software_category)): ?>
                                        <div class="software-section">
                                            <?php foreach ($software_category as $item): ?>
                                                <div class="software-category">
                                                    <p class="software-category__title">
                                                        <?php echo esc_html($item['title'] ?? ''); ?>
                                                    </p>
                                                    <?php if (!empty($item['list_images'])): ?>
                                                        <div class="software-category__images">
                                                            <?php foreach ($item['list_images'] as $item_img): ?>
                                                                <?php
                                                                $img_url = $item_img['image_item']['url'] ?? '';
                                                                $img_alt = $item_img['image_item']['alt'] ?? '';
                                                                ?>
                                                                <?php if (!empty($img_url)): ?>
                                                                    <div class="software-category__image-item">
                                                                        <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" class="img-fluid" />
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div id="gia-cong" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_gia_cong ?></h2>
                                    <?php if (!empty($image_gia_cong)): ?>
                                        <img src="<?= esc_url($image_gia_cong) ?>" alt="Gia công" class="img-fluid">
                                    <?php endif; ?>
                                </div>

                                <div id="lap-dung" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_lap_dung ?></h2>
                                    <?php if (!empty($image_lap_dung)): ?>
                                        <img src="<?= esc_url($image_lap_dung) ?>" alt="Lắp dựng" class="img-fluid">
                                    <?php endif; ?>
                                </div>

                                <div id="an-toan" class="section-block mb-5">
                                    <h2 class="title"><?php echo $title_an_toan ?></h2>
                                    <div class="mb-5"><?php echo $content_an_toan ?></div>
                                    <?php if (!empty($image_an_toan)): ?>
                                        <img src="<?= esc_url($image_an_toan) ?>" alt="An toàn" class="img-fluid">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</section>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom-sanpham-dichvu.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style-sanpham-dichvu.css">
<?php get_footer((substr(get_locale(), 0, 2) === 'en') ? 'en':'');
; ?>