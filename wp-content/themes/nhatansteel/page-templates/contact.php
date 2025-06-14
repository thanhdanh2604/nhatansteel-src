<?php
/**
 * Template Name: Contact Page
 *
 * @package Nhatansteel
 */
?>
<?php
get_header();
?>
<div class="contact-page">
    <section class="about-banner" style="
    background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0)), url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/contact bg.jpg');
">
        <div class="container">
            <div class="banner-text">
                <h1>Liên hệ</h1>
                <p class="breadcrumb-text mb-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>">Trang chủ</a> / <a href="#">Liên hệ</a>
                </p>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <h2 class="title mb-4">Liên hệ để được tư vấn</h2>
            <div class="row g-4">
                <!-- Form -->
                <div class="col-lg-6">
                    <div class="contact-form p-4 rounded">
                        <h5>Gửi tin nhắn cho chúng tôi</h5>
                        <?php echo do_shortcode( '[contact-form-7 id="e607b4c" title="Contact form page Liên hệ"]') ?>
                    </div>
                </div>

                <!-- Info -->
                <div class="col-lg-6">
                    <div class="row g-4">
                        <!-- Trụ sở chính -->
                        <div class="col-md-6">
                            <div class="head-office">
                                <h6>TRỤ SỞ CHÍNH</h6>
                                <div class="map"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map.png" alt="map" class="img-fluid rounded w-100"></div>
                                <p class="d-flex align-items-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-location.svg" alt="location" class="img-fluid" width="24"> 285/18A Trịnh Đình Trọng, Phường Hòa Thạnh, Quận Tân Phú, Thành phố Hồ Chí Minh</p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call-2.svg" alt="call" class="img-fluid" width="24"> <a href="tel:<?php the_field('company_phone','option')?>">(028) 39733385</a></p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-email-2.svg" alt="email" class="img-fluid" width="24"> <a href="mailto:<?php the_field('company_email','option')?>"><?php the_field('company_email','option')?></a></p>
                            </div>
                        </div>

                        <!-- Nhà máy -->
                        <div class="col-md-6">
                            <div class="head-office">
                                <h6>NHÀ MÁY</h6>
                                <div class="map"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map.png" alt="map" class="img-fluid rounded w-100"></div>
                                <p class="d-flex align-items-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-location.svg" alt="location" class="img-fluid" width="24"> Lô 1, Đường số 7A, KCN Nhơn Trạch, Huyện Nhơn Trạch, Tỉnh Đồng Nai</p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call-2.svg" alt="call" class="img-fluid" width="24"> <a href="tel:+842513569138">(02513) 569138</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="social-follow mt-4 gap-3">
                        <span class="fw-bold">Liên hệ nhanh với chúng tôi qua:</span>
                        <div class="d-flex gap-2">
                            <a href="https://zalo.me/0937102070"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/zalo 1.svg" alt="Zalo" class="img-fluid" width="32"></a>
                            <a href="https://wa.me/0937102070"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/whatsapp-black-logo-on-transparent-background-free-vector 1.svg" alt="Whatsapp" class="img-fluid" width="32"></a>
                            <a href="viber://contact?number=%2B84937102070"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/viber.svg" alt="viber" class="img-fluid" width="32"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php
get_footer();
?>