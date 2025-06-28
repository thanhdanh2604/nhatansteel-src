<?php
/**
 * Template Name: Library Page
 *
 * @package Nhatansteel
 */
?>
<?php
get_header();
$language = substr(get_locale(), 0, 2);

?>
<div class="library-page">
    <section class="about-banner" style="
    background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0)), url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/library bg.jpg');
">
        <div class="container">
            <div class="banner-text">
                <h1> <?php echo ($language === 'vi') ? 'Thư viện' : 'Liblary'; ?></h1>
                <p class="breadcrumb-text mb-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>"> <?php echo ($language === 'vi') ? 'Trang chủ' : 'Homepage'; ?></a> / <a href="#"> <?php echo ($language === 'vi') ? 'Thư viện' : 'Liblary'; ?></a>
                </p>
            </div>
        </div>
    </section>
     <section class="library-section">
        <div class="container">
            <h2 class="title mb-4">Brochure</h2>
            <div class="row g-4">
                <!-- Brochure tiếng Việt -->
                <div class="col-md-6">
                    <div class="p-4 rounded-3 bg-light h-100 d-flex align-items-center gap-5">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Brochure/thumb brochure tieng viet.jpg" class="img-fluid rounded mb-3" alt="Brochure Tiếng Việt">
                        <div class="">
                            <h6 class="fw-bold mb-3">BROCHURE ( <?php echo ($language === 'vi') ? 'TIẾNG VIỆT' : 'VIETNAMESE'; ?>)</h6>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <a download href="<?php echo get_field('brochure_vi') ?>" class="btn btn-primary fw-bold px-4 lib-btn-download ">Download</a>
                                <a target="__blank" href="<?php echo get_field('brochure_vi') ?>" class="text-decoration-none fw-medium link-view">
                                 <?php echo ($language === 'vi') ? 'Xem Online' : 'Read Online'; ?> <span class="ms-1">&rarr;</span>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- Brochure tiếng Anh -->
                 <div class="col-md-6">
                    <div class="p-4 rounded-3 bg-light h-100 d-flex align-items-center gap-5">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Brochure/thumb brochure tieng anh.jpg" class="img-fluid rounded mb-3" alt="Brochure Tiếng Anh">
                        <div class="">
                            <h6 class="fw-bold mb-3">BROCHURE ( <?php echo ($language === 'vi') ? 'TIẾNG ANH' : 'ENGLISH'; ?>)</h6>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <a href="<?php echo get_field('brochure_en') ?>" class="btn btn-primary fw-bold px-4 lib-btn-download">Download</a>
                                <a target="__blank" href="<?php echo get_field('brochure_en') ?>" class="text-decoration-none fw-medium link-view">
                                <?php echo ($language === 'vi') ? 'Xem Online' : 'Read Online'; ?> <span class="ms-1">&rarr;</span>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <h2 class="title mb-4">Brand Guidelines</h2>
            <div class="row g-4">
                <!-- Brochure tiếng Việt -->
                <div class="col-md-6">
                    <div class="p-4 rounded-3 bg-light h-100 d-flex align-items-center gap-5">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Brochure/thumb branding guidelines.jpg" class="img-fluid rounded mb-3" alt="Brochure Tiếng Việt">
                        <div class="">
                            <h6 class="fw-bold mb-3">BRAND GUIDELINES ( <?php echo ($language === 'vi') ? 'TIẾNG ANH' : 'ENGLISH'; ?>)</h6>
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <a download href="<?php echo get_field('brand_guidelines') ?>" class="btn btn-primary fw-bold px-4 lib-btn-download ">Download</a>
                                <a target="__blank" href="<?php echo get_field('brand_guidelines') ?>" class="text-decoration-none fw-medium link-view">
                                <?php echo ($language === 'vi') ? 'Xem Online' : 'Read Online'; ?> <span class="ms-1">&rarr;</span>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
     </section>
</div>

<?php
get_footer((substr(get_locale(), 0, 2) === 'en') ? 'en':'');
?>