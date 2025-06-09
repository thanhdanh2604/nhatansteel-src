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
                                <h6>Trụ sở chính</h6>
                                <div class="map"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map.png" alt="map" class="img-fluid rounded w-100"></div>
                                <p class="d-flex align-items-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-location.svg" alt="location" class="img-fluid" width="24"> <?php the_field('company_address','option')?></p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call-2.svg" alt="call" class="img-fluid" width="24"> <a href="tel:<?php the_field('company_phone','option')?>"><?php the_field('company_phone','option')?></a></p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-email-2.svg" alt="email" class="img-fluid" width="24"> <a href="mailto:<?php the_field('company_email','option')?>"><?php the_field('company_email','option')?></a></p>
                            </div>
                        </div>

                        <!-- Nhà máy -->
                        <div class="col-md-6">
                            <div class="head-office">
                                <h6>Our Factory</h6>
                                <div class="map"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map.png" alt="map" class="img-fluid rounded w-100"></div>
                                <p class="d-flex align-items-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-location.svg" alt="location" class="img-fluid" width="24"> <?php the_field('factory_address','option')?></p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call-2.svg" alt="call" class="img-fluid" width="24"> <a href="tel:<?php the_field('factory_phone','option')?>"><?php the_field('factory_phone','option')?></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="social-follow mt-4 gap-3">
                        <span>Theo dõi chúng tôi trên mạng xã hội</span>
                        <div class="d-flex gap-2">
                            <a href="<?php the_field('facebook','option')?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-fb.svg" alt="facebook" class="img-fluid" width="32"></a>
                            <a href="<?php the_field('linkedin','option')?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-in.svg" alt="In" class="img-fluid" width="32"></a>
                            <a href="<?php the_field('youtube','option')?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-ytb.svg" alt="youtube" class="img-fluid" width="32"></a>
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