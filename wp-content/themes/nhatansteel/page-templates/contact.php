<?php
/**
 * Template Name: Contact Page
 *
 * @package Nhatansteel
 */

get_header();

// --- Mảng nội dung đa ngôn ngữ ---
$translations = [
    'vi' => [
        'home'              => 'Trang chủ',
        'consult_title'     => 'Liên hệ để được tư vấn',
        'form_title'        => 'Gửi tin nhắn cho chúng tôi',
        'form_shortcode'    => '[contact-form-7 id="e607b4c" title="Contact form page Liên hệ"]',
        'head_office_title' => 'TRỤ SỞ CHÍNH',
        'head_office_address' => '285/18A Trịnh Đình Trọng, Phường Hòa Thạnh, Quận Tân Phú, Thành phố Hồ Chí Minh',
        'head_office_phone' => '(028) 39733385',
        'head_office_email' => get_field('company_email', 'option'),
        'factory_title'     => 'NHÀ MÁY',
        'factory_address'   => 'Lô 1, Đường số 7A, KCN Nhơn Trạch, Huyện Nhơn Trạch, Tỉnh Đồng Nai',
        'factory_phone'     => '(02513) 569138',
        'quick_contact'     => 'Liên hệ nhanh với chúng tôi qua:',
    ],
    'en' => [
        'home'              => 'Home page',
        'consult_title'     => 'Contact for consultation',
        'form_title'        => 'Send us a message',
        'form_shortcode'    => '[contact-form-7 id="eeff7c2" title="Contact form page Liên hệ_English"]', 
        'head_office_title' => 'OFFICE',
        'head_office_address' => '285/18A Trinh Dinh Trong, Hoa Thanh Ward, Tan Phu District, Ho Chi Minh City',
        'head_office_phone' => '(028) 39733385',
        'head_office_email' => get_field('company_email', 'option'),
        'factory_title'     => 'FACTORY',
        'factory_address'   => 'Lot 1, Road 7A, Nhon Trach Industrial Park, Nhon Trach District, Dong Nai Province',
        'factory_phone'     => '(02513) 569138',
        'quick_contact'     => 'Reach us quickly through:',
    ]
];

// Lấy ngôn ngữ hiện tại (vi hoặc en)
$current_language = substr(get_locale(), 0, 2) === 'en' ? 'en' : 'vi';
$content = $translations[$current_language];
?>
<div class="contact-page">
    <section class="about-banner" style="
    background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0)), url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/contact bg.jpg');
">
        <div class="container">
            <div class="banner-text">
                <h1><?php the_title(); ?></h1>
                <p class="breadcrumb-text mb-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo $content['home']; ?></a> / <a href="#"><?php the_title(); ?></a>
                </p>
            </div>
        </div>
    </section>

    <section class="contact-section">
        <div class="container">
            <h2 class="title mb-4"><?php echo $content['consult_title']; ?></h2>
            <div class="row g-4">
                <!-- Form -->
                <div class="col-lg-6">
                    <div class="contact-form p-4 rounded">
                        <h5><?php echo $content['form_title']; ?></h5>
                        <?php echo do_shortcode($content['form_shortcode']); ?>
                    </div>
                </div>

                <!-- Info -->
                <div class="col-lg-6">
                    <div class="row g-4">
                        <!-- Trụ sở chính -->
                        <div class="col-md-6">
                            <div class="head-office">
                                <h6><?php echo $content['head_office_title']; ?></h6>
                                <div class="map"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map.png" alt="map" class="img-fluid rounded w-100"></div>
                                <p class="d-flex align-items-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-location.svg" alt="location" class="img-fluid" width="24"> <?php echo $content['head_office_address']; ?></p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call-2.svg" alt="call" class="img-fluid" width="24"> <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $content['head_office_phone']); ?>"><?php echo $content['head_office_phone']; ?></a></p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-email-2.svg" alt="email" class="img-fluid" width="24"> <a href="mailto:<?php echo $content['head_office_email']; ?>"><?php echo $content['head_office_email']; ?></a></p>
                            </div>
                        </div>

                        <!-- Nhà máy -->
                        <div class="col-md-6">
                            <div class="head-office">
                                <h6><?php echo $content['factory_title']; ?></h6>
                                <div class="map"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/map.png" alt="map" class="img-fluid rounded w-100"></div>
                                <p class="d-flex align-items-start"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-location.svg" alt="location" class="img-fluid" width="24"> <?php echo $content['factory_address']; ?></p>
                                <p><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/i-call-2.svg" alt="call" class="img-fluid" width="24"> <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $content['factory_phone']); ?>"><?php echo $content['factory_phone']; ?></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="social-follow mt-4 gap-3">
                        <span class="fw-bold"><?php echo $content['quick_contact']; ?></span>
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
get_footer((substr(get_locale(), 0, 2) === 'en') ? 'en':'');
?>