<?php
/**
 * Template Name: Trang chủ
 *
 * @package Nhatansteel
 */

get_header(); ?>
<?php
$banners = get_field('banners');
?>
<div class="">
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
                        <p><?php echo esc_html($title) ?></p>
                        <h1><?php echo esc_html($title) ?></h1>
                    </div>
                    </div>
                </div>
            <?php }
             ?>
            <!-- <div class="carousel-cell">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner01.jpg" alt="banner" class="img-fluid">
                <div class="box-content">
                <div class="container">
                    <p>25 năm</p>
                    <h1>Nhà thép tiền chế</h1>
                </div>
                </div>
            </div>
            <div class="carousel-cell">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner01.jpg" alt="banner" class="img-fluid">
                <div class="box-content">
                <div class="container">
                    <p>25 năm</p>
                    <h1>Nhà thép tiền chế</h1>
                </div>
                </div>
            </div>
            <div class="carousel-cell">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner01.jpg" alt="banner" class="img-fluid">
                <div class="box-content">
                <div class="container">
                    <p>25 năm</p>
                    <h1>Nhà thép tiền chế</h1>
                </div>
                </div>
            </div>
            <div class="carousel-cell">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner01.jpg" alt="banner" class="img-fluid">
                <div class="box-content">
                <div class="container">
                    <p>25 năm</p>
                    <h1>Nhà thép tiền chế</h1>
                </div>
                </div>
            </div> -->
        </div>
    </section>
    <section class="about-section">
        <div class="container">
        <div class="row justify-content-center align-items-center top-head">
            <div class="col-lg-6 mb-4 mb-lg-0 position-relative">
            <div class="box-about-img">
                <div class="about-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about01.jpg" alt="ảnh 1" class="img-fluid rounded shadow">
                </div>
                <div class="about-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about02.jpg" alt="ảnh 2" class="img-fluid rounded shadow">
                </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="about-content">
                <h3>Chúng tôi là ai</h3>
                <p class="blockquote">Passion for Steel - We Build with Heart</p>
                <p class="mb-3">
                <strong>CÔNG TY TNHH KẾT CẤU THÉP NHẬT AN</strong> cung cấp các giải pháp tối ưu trong lĩnh vực sản xuất kết cấu thép và nhà thép tiền chế phục vụ đa dạng các hạng mục công trình như: Sân bay, rạp xiếc, trung tâm thương mại, nhà máy sản xuất, nhà kho, kho lạnh, kết cấu nhà thép và hệ kết cấu dỡ ống ...
                </p>
                <a href="#" class="btn-aboutus text-orange text-decoration-none">Về chúng tôi <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow-right" class="img-fluid" width="16"></a>
            </div>
            </div>
        </div>

        <div class="row text-center mt-5 stats-row">
            <div class="col-md-4 mb-4">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-construction-site.svg" alt="Dự án" class="mb-4" style="height: 120px;">
            <h4><span class="count-number" data-target="1000">0</span>+</h4>
            <p class="mb-0">Dự án</p>
            </div>
            <div class="col-md-4 mb-4">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-steel-beam.svg" alt="Sản lượng" class="mb-4" style="height: 120px;">
            <h4><span class="count-number" data-target="10000">0</span>+</h4>
            <p class="mb-0">Sản lượng thép<br>hàng năm</p>
            </div>
            <div class="col-md-4 mb-4">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-target.svg" alt="Khách hàng" class="mb-4" style="height: 120px;">
            <h4><span class="count-number" data-target="300">0</span>+</h4>
            <p class="mb-0">Khách hàng</p>
            </div>
        </div>
        </div>
    </section>

    <section class="product-section text-white">
        <div class="container">
        <h2 class="title">Sản phẩm</h2>
        <div class="row align-items-center">
            <div class="col-md-5 mb-4">
            <div class="product-main-img">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sanpham.jpg" alt="Sản phẩm" class="img-fluid shadow">
            </div>
            </div>
            <div class="col-md-7">
            <div class="row gy-3 gx-2">
                <div class="col-sm-6">
                <div class="product-item active">
                    <div class="product-item-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sanpham01.jpg" alt="" class="img-fluid">
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
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sanpham01.jpg" alt="" class="img-fluid">
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
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sanpham01.jpg" alt="" class="img-fluid">
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
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sanpham01.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="product-item-content">
                    <p class="mb-0">Phụ kiện</p>
                    <span class="arrow"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right.svg" alt="arrow" class="img-fluid" width="22"></span>
                    </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="product-item">
                    <div class="product-item-img">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sanpham01.jpg" alt="" class="img-fluid">
                    </div>
                    <div class="product-item-content">
                    <p class="mb-0 small fw-bold text-uppercase">Chi tiết kết cấu</p>
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
            <div class="service-box active">
                <div class="image-box">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dichvu.jpg" class="img-fluid w-100 h-100 object-cover" alt="THIẾT KẾ">
                </div>
                <div class="description">
                <h6 class="fw-bold text-uppercase mb-2">Thiết kế</h6>
                <p>
                    Lắng nghe kỳ vọng và đặt trải nghiệm và sự hài lòng của khách hàng lên hàng đầu,
                    chúng tôi đề xuất những phương án thiết kế linh hoạt, đảm bảo cân đối giữa tính
                    thẩm mỹ và công năng sử dụng, tiết kiệm chi phí từ đội ngũ kỹ sư, chuyên gia trình độ
                    chuyên môn và giàu kinh nghiệm.
                </p>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow blue" class="img-fluid" width="22"></a>
                </div>
                <a href="#" class="custom-btn">
                THIẾT KẾ <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow white" class="img-fluid" width="22">
                </a>
            </div>
            </div>

            <!-- Block 2 -->
            <div class="col-md-4">
            <div class="service-box">
                <div class="image-box">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dichvu.jpg" class="img-fluid w-100 h-100 object-cover" alt="Gia công">
                </div>
                <div class="description">
                <h6 class="fw-bold text-uppercase mb-2">Gia công</h6>
                <p>
                    Lắng nghe kỳ vọng và đặt trải nghiệm và sự hài lòng của khách hàng lên hàng đầu,
                    chúng tôi đề xuất những phương án thiết kế linh hoạt, đảm bảo cân đối giữa tính
                    thẩm mỹ và công năng sử dụng, tiết kiệm chi phí từ đội ngũ kỹ sư, chuyên gia trình độ
                    chuyên môn và giàu kinh nghiệm.
                </p>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow blue" class="img-fluid" width="22"></a>
                </div>
                <a href="#" class="custom-btn">
                GIA CÔNG <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow white" class="img-fluid" width="22">
                </a>
            </div>
            </div>

            <!-- Block 3 -->
            <div class="col-md-4">
            <div class="service-box">
                <div class="image-box">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/dichvu.jpg" class="img-fluid w-100 h-100 object-cover" alt="Lắp dựng">
                </div>
                <div class="description">
                <h6 class="fw-bold text-uppercase mb-2">Lắp dựng</h6>
                <p>
                    Lắng nghe kỳ vọng và đặt trải nghiệm và sự hài lòng của khách hàng lên hàng đầu,
                    chúng tôi đề xuất những phương án thiết kế linh hoạt, đảm bảo cân đối giữa tính
                    thẩm mỹ và công năng sử dụng, tiết kiệm chi phí từ đội ngũ kỹ sư, chuyên gia trình độ
                    chuyên môn và giàu kinh nghiệm.
                </p>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow blue" class="img-fluid" width="22"></a>
                </div>
                <a href="#" class="custom-btn">
                Lắp dựng <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow white" class="img-fluid" width="22">
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
            <!-- Dự án 1 -->
            <div class="col-xl-4 col-md-6">
            <div class="project-card">
                <div class="project-card-img">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/duan01.jpg" class="img-fluid" alt="Dự án"></a>
                </div>
                <a href="#" class="project-title">
                <strong>TÊN DỰ ÁN</strong>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow-right" class="img-fluid" width="22">
                </a>
                <ul class="project-info ps-0 mb-0">
                <li><strong>Chủ đầu tư:</strong> Lorem Ipsum</li>
                <li><strong>Diện tích:</strong> 200.000 sq square</li>
                <li><strong>Địa điểm:</strong> Lorem Ipsum</li>
                </ul>
            </div>
            </div>

            <!-- Dự án 2 -->
            <div class="col-xl-4 col-md-6">
            <div class="project-card">
                <div class="project-card-img">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/duan02.jpg" class="img-fluid" alt="Dự án"></a>
                </div>
                <a href="#" class="project-title">
                <strong>TÊN DỰ ÁN</strong>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow-right" class="img-fluid" width="22">
                </a>
                <ul class="project-info ps-0 mb-0">
                <li><strong>Chủ đầu tư:</strong> Lorem Ipsum</li>
                <li><strong>Diện tích:</strong> 200.000 sq square</li>
                <li><strong>Địa điểm:</strong> Lorem Ipsum</li>
                </ul>
            </div>
            </div>

            <!-- Dự án 3 -->
            <div class="col-xl-4 col-md-6">
            <div class="project-card">
                <div class="project-card-img">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/duan03.jpg" class="img-fluid" alt="Dự án"></a>
                </div>
                <a href="#" class="project-title">
                <strong>TÊN DỰ ÁN</strong>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow-right" class="img-fluid" width="22">
                </a>
                <ul class="project-info ps-0 mb-0">
                <li><strong>Chủ đầu tư:</strong> Lorem Ipsum</li>
                <li><strong>Diện tích:</strong> 200.000 sq square</li>
                <li><strong>Địa điểm:</strong> Lorem Ipsum</li>
                </ul>
            </div>
            </div>

            <!-- Dự án 4 -->
            <div class="col-xl-4 col-md-6">
            <div class="project-card">
                <div class="project-card-img">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/duan01.jpg" class="img-fluid" alt="Dự án"></a>
                </div>
                <a href="#" class="project-title">
                <strong>TÊN DỰ ÁN</strong>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow-right" class="img-fluid" width="22">
                </a>
                <ul class="project-info ps-0 mb-0">
                <li><strong>Chủ đầu tư:</strong> Lorem Ipsum</li>
                <li><strong>Diện tích:</strong> 200.000 sq square</li>
                <li><strong>Địa điểm:</strong> Lorem Ipsum</li>
                </ul>
            </div>
            </div>

            <!-- Dự án 5 -->
            <div class="col-xl-4 col-md-6">
            <div class="project-card">
                <div class="project-card-img">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/duan02.jpg" class="img-fluid" alt="Dự án"></a>
                </div>
                <a href="#" class="project-title">
                <strong>TÊN DỰ ÁN</strong>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow-right" class="img-fluid" width="22">
                </a>
                <ul class="project-info ps-0 mb-0">
                <li><strong>Chủ đầu tư:</strong> Lorem Ipsum</li>
                <li><strong>Diện tích:</strong> 200.000 sq square</li>
                <li><strong>Địa điểm:</strong> Lorem Ipsum</li>
                </ul>
            </div>
            </div>

            <!-- Dự án 6 -->
            <div class="col-xl-4 col-md-6">
            <div class="project-card">
                <div class="project-card-img">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/duan03.jpg" class="img-fluid" alt="Dự án"></a>
                </div>
                <a href="#" class="project-title">
                <strong>TÊN DỰ ÁN</strong>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-blue.svg" alt="arrow-right" class="img-fluid" width="22">
                </a>
                <ul class="project-info ps-0 mb-0">
                <li><strong>Chủ đầu tư:</strong> Lorem Ipsum</li>
                <li><strong>Diện tích:</strong> 200.000 sq square</li>
                <li><strong>Địa điểm:</strong> Lorem Ipsum</li>
                </ul>
            </div>
            </div>


        </div>
        </div>
    </section>

    <section class="customers-partners-section">
        <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="title">Khách hàng & Đối tác</h2>
            <div class="carousel" data-flickity='{ "groupCells": true, "pageDots": false }'>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac01.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac02.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac01.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac02.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac01.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac02.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac01.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac02.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac01.png" alt="đối tác"></a>
                </div>
                <div class="carousel-cell">
                <a href="#"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/doitac02.png" alt="đối tác"></a>
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
            <div class="highlight-news">
                <span class="badge-new">Tin mới</span>
                <div class="highlight-news-img">
                <!-- <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/duan01.jpg" alt="du an" class="img-fluid"> -->
                </div>
                <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h6>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore...</p>
            </div>
            </div>

            <!-- Danh sách tin phụ -->
            <div class="col-12 col-lg-7">
            <div class="border-start border-light ps-lg-4 ps-3">
                <!-- Tin phụ -->
                <div class="news-item d-flex align-items-start mb-4">
                <a href="#" class="news-thumb-sm"></a>
                <div>
                    <h6 class="fw-bold text-white mb-1 small"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing...</a></h6>
                    <p class="text-light small mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    <a href="#"><span class="arrow-icon text-white"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow" class="img-fluid"></span></a>
                </div>
                </div>

                <!-- Lặp thêm 2 tin nữa -->
                <div class="news-item d-flex align-items-start mb-4">
                <a href="#" class="news-thumb-sm"></a>
                <div>
                    <h6 class="fw-bold text-white mb-1 small"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing...</a></h6>
                    <p class="text-light small mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    <a href="#"><span class="arrow-icon text-white"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow" class="img-fluid"></span></a>
                </div>
                </div>

                <div class="news-item d-flex align-items-start mb-4">
                <a href="#" class="news-thumb-sm"></a>
                <div>
                    <h6 class="fw-bold text-white mb-1 small"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing...</a></h6>
                    <p class="text-light small mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                    <a href="#"><span class="arrow-icon text-white"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-arrow-right-white.svg" alt="arrow" class="img-fluid"></span></a>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
        <h2 class="title mb-4">Liên hệ</h2>
        <div class="row g-4">
            <!-- Form -->
            <div class="col-lg-6">
            <div class="contact-form p-4 rounded">
                <h5>Gửi tin nhắn cho chúng tôi</h5>
                <form>
                <input type="text" class="form-control mb-3" placeholder="Tên">
                <div class="d-flex gap-2 flex-column flex-md-row mb-3">
                    <input type="text" class="form-control" placeholder="Số điện thoại">
                    <input type="email" class="form-control" placeholder="E-mail">
                </div>
                <input type="text" class="form-control mb-3" placeholder="Tiêu đề">
                <textarea class="form-control mb-3" rows="3" placeholder="Nội dung"></textarea>
                <select class="form-select mb-3">
                    <option>Bạn biết đến chúng tôi thông qua kênh nào</option>
                    <option>LinkedIn</option>
                    <option>Facebook</option>
                    <option>Người giới thiệu</option>
                    <option>Khác...</option>
                </select>
                <button type="submit" class="btn btn-orange">Gửi</button>
                </form>
            </div>
            </div>

            <!-- Info -->
            <div class="col-lg-6">
            <div class="row g-4">
                <!-- Trụ sở chính -->
                <div class="col-md-6">
                <div class="head-office">
                    <h6>Trụ sở chính</h6>
                    <div class="map"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map.png" alt="map" class="img-fluid rounded w-100"></div>
                    <p class="d-flex align-items-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-location.svg" alt="location" class="img-fluid" width="24"> 285/18A Trịnh Đình Trọng, P. Hòa Thạnh, Q. Tân Phú, TP.HCM</p>
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call-2.svg" alt="call" class="img-fluid" width="24"> <a href="tel:0839733385">08.39733385</a></p>
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-email-2.svg" alt="email" class="img-fluid" width="24"> <a href="mailto:info@nhatansteel.com.vn">info@nhatansteel.com.vn</a></p>
                </div>
                </div>

                <!-- Nhà máy -->
                <div class="col-md-6">
                <div class="head-office">
                    <h6>Our Factory</h6>
                    <div class="map"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map.png" alt="map" class="img-fluid rounded w-100"></div>
                    <p class="d-flex align-items-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-location.svg" alt="location" class="img-fluid" width="24"> Lô 1, Đường số 7A, KCN Nhơn Trạch, Đồng Nai</p>
                    <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call-2.svg" alt="call" class="img-fluid" width="24"> <a href="tel:0613569138">0613.569138</a></p>
                </div>
                </div>
            </div>
            <div class="social-follow mt-4 gap-3">
                <span>Theo dõi chúng tôi trên mạng xã hội</span>
                <div class="d-flex gap-2">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-fb.svg" alt="facebook" class="img-fluid" width="32"></a>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-in.svg" alt="In" class="img-fluid" width="32"></a>
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-ytb.svg" alt="youtube" class="img-fluid" width="32"></a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>
    
<?php
get_footer();