<?php
/**
 * Template Name: Library Page
 *
 * @package Nhatansteel
 */
?>
<?php
get_header();
?>
<div class="library-page">
    <section class="about-banner" style="
    background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0)), url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/library bg.jpg');
">
        <div class="container">
            <div class="banner-text">
                <h1>Thư viện</h1>
                <p class="breadcrumb-text mb-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> / <a href="#">Thư viện</a>
                </p>
            </div>
        </div>
    </section>
     <section class="library-section">
        <div class="container">
            <h2 class="title mb-4">Brochure</h2>
            <div class="row g-4">
                
            </div>
        </div>
     </section>
</div>

<?php
get_footer();
?>