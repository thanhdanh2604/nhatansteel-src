<?php

/**
 * Template Name: About Us Page
 */
get_header(); ?>
<?php
// Banner image
$image_url_banner = get_field('banner_image');

// Layout: Who
$who = get_field('l_who');
$who_title = $who['title'] ?? '';
$who_sub_title = $who['sub_title'] ?? '';
$who_content = $who['content'] ?? '';

// Layout: Manager team
$manager = get_field('l_manager');
$manager_title = $manager['title'] ?? '';
$list_member = $manager['list_member'] ?? [];
// Layout Chairman Message
$chairman_message = get_field('l_chairman_message');
$chairman_message_title = $chairman_message['title'] ?? '';
$chairman_message_content = $chairman_message['content'] ?? '';
$chairman_message_avatar = $chairman_message['avatar'] ?? '';
$chairman_message_name = $chairman_message['name'] ?? '';
$chairman_message_position = $chairman_message['position'] ?? '';
// Layout Chairman Message
$journey = get_field('l_journey');
$journey_title = $journey['title'] ?? '';
$journey_content = $journey['content'] ?? '';
$journey_timeline_list = $journey['timeline_list'] ?? [];
// Layout Our Vision
$vision = get_field('l_vision');
$vision_title = $vision['title'] ?? '';
$vision_list_tap_vision = $vision['list_tap_vision'] ?? [];
$vision_list_content_tap = $vision['list_content_tap'] ?? [];
// Layout Our mission
$mission = get_field('l_mission');
$mission_title = $mission['title'] ?? '';
$mission_list_tap_mission = $mission['list_tap_mission'] ?? [];
$mission_list_content_tap = $mission['list_content_tap'] ?? [];
// Layout Our core_value
$core_value = get_field('l_core_value');
$core_value_title = $core_value['title'] ?? '';
$core_value_list_tap_core_value = $core_value['list_tap_core_value'] ?? [];
$core_value_list_content_tap = $core_value['list_content_tap'] ?? [];
?>

<section class="about-banner" style="
    background-image: linear-gradient(to top, rgba(0, 32, 96, 0.9), rgba(0, 0, 0, 0)), url('<?php echo esc_url($image_url_banner['url']); ?>');
">
    <div class="container">
        <div class="banner-text">
            <h1><?php echo esc_html(get_the_title()); ?></h1>
            <p class="breadcrumb-text mb-0">
                <a href="<?php echo home_url(); ?>">Trang chủ</a> / <?php echo esc_html(get_the_title()); ?>
            </p>

        </div>
    </div>
</section>

<section class="about-wrapper py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-4">
                <ul class="about-sidebar list-unstyled">
                    <li><a class="active" href="#gioi-thieu"><?php echo esc_html(get_the_title()); ?></a></li>
                    <li><a href="#ban-quan-tri"><?php echo $manager_title  ?></a></li>
                    <li><a href="#sang-lap"><?php echo $chairman_message_title ?></a></li>
                    <li><a href="#lich-su"><?php echo  $journey_title  ?></a></li>
                    <?php if (!empty($vision_title) && !empty($mission_title) && !empty($core_value_title)): ?>
                        <li>
                            <a href="#gia-tri-cot-loi">
                                <?php echo esc_html( $core_value_title. ' - ' .$vision_title . ' - ' . $mission_title ) ; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-9">
                <div id="gioi-thieu" class="section-block mb-5">
                    <h2 class="title mb-0"> <?php echo $who_title ?>
                    </h2>
                    <p class="sub-title"><?php echo $who_sub_title ?></p>
                    <div><?php echo $who_content ?></div>
                </div>

                <div id="ban-quan-tri" class="section-block mb-5">
                    <h2 class="title"><?php echo $manager_title ?></h2>
                    <?php if (!empty($list_member) && is_array($list_member)): ?>
                        <div class="row g-5 justify-content-center">
                            <?php foreach ($list_member as $member): ?>
                                <?php
                                $name = esc_html($member['name'] ?? '');
                                $position = esc_html($member['position'] ?? '');
                                $avatar = $member['avatar']['url'] ?? '';
                                $alt = esc_attr($member['avatar']['alt'] ?? $name);
                                ?>
                                <div class="col-sm-6 col-md-4 text-center">
                                    <div class="manager-card p-3">
                                        <?php if ($avatar): ?>
                                            <div class="avatar-img mb-2">
                                                <img src="<?= esc_url($avatar) ?>" alt="<?= $alt ?>" class="img-fluid" style="object-fit: cover;">
                                            </div>
                                        <?php endif; ?>
                                        <p class="mb-0 fw-bold"><?= $name ?></p>
                                        <small><?= $position ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div id="sang-lap" class="section-block mb-5">
                    <h2 class="title"> <?php echo $chairman_message_title ?></h2>
                    <div class="box-nhasanglap">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <?php echo $chairman_message_content ?>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="nhasanglap-info">
                                    <?php
                                    $avatar = $chairman_message_avatar['url'] ?? '';
                                    ?>
                                    <?php if (!empty($avatar)): ?>
                                        <div class="nhasanglap-img">
                                            <img src="<?= esc_url($avatar) ?>" alt="<?php echo esc_attr($chairman_message_name) ?>" class="img-fluid mb-2">
                                        </div>
                                    <?php endif; ?>

                                    <p class="mb-0 fw-bold text-center"> <?php echo $chairman_message_name ?>
                                    </p>
                                    <p class="mb-0 text-center"><small><?php echo $chairman_message_position ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="lich-su" class="section-block mb-5">
                    <h2 class="title"><?php echo $journey_title ?></h2>
                    <div>
                        <?php echo $journey_content ?>
                    </div>
                    <?php if (!empty($journey_timeline_list)): ?>

                        <section class="timeline-section">
                            <div class="timeline">
                                <ul class="timeline-list">
                                    <?php foreach ($journey_timeline_list as $item): ?>
                                        <li class="timeline-item"
                                            data-year="<?= esc_attr($item['year']) ?>"
                                            data-desc="<?= esc_attr($item['description']) ?>">
                                            <span class="dot"></span>
                                            <span class="year"><?= esc_html($item['year']) ?></span>
                                            <div class="hover-content"><?= esc_html($item['description']) ?></div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="timeline-progress"></div>
                            </div>
                        </section>
                    <?php endif; ?>

                </div>

                <div id="gia-tri-cot-loi" class="section-block mb-5">
                    <section class="core-values-section py-3">
                        <div class="container">
                            <h2 class="title"><?php echo $core_value_title ?></h2>
                            <!-- missions -->
                            <?php if (!empty($core_value_list_tap_core_value) && is_array($core_value_list_tap_core_value)): ?>
                                <div class="row g-3 mb-4 justify-content-start">
                                    <ul class="core-values-tab-list">
                                        <?php foreach ($core_value_list_tap_core_value as $index => $item): ?>
                                            <?php
                                            $is_active = $index === 0 ? 'active' : '';
                                            $core_id = 'core' . ($index + 1);
                                            ?>
                                            <li>
                                                <div class="core-tab <?php echo $is_active; ?>" data-tab="<?php echo esc_attr($core_id); ?>">
                                                    <?php echo $item['svg_icon']; ?>
                                                    <div class="mb-0 fw-bold"><?php echo nl2br($item['title']); ?></div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                    <!-- <div class="col-md-2">

                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-2">

                                    </div>
                                    <div class="col-md-2">

                                    </div> -->
                                </div>
                            <?php endif; ?>
                            <!-- Nội dung -->
                            <?php if (!empty($core_value_list_content_tap) && is_array($core_value_list_content_tap)): ?>
                                <div class="core-content-wrap position-relative p-4 rounded">
                                    <div class="highlight-bar" id="highlightBarCore"></div>
                                    <?php foreach ($core_value_list_content_tap as $index => $item): ?>
                                        <?php
                                        $core_id = 'core' . ($index + 1);
                                        $is_active = $index === 0 ? 'active' : 'd-none';
                                        ?>
                                        <div class="core-content <?php echo $is_active; ?>" id="<?php echo esc_attr($core_id); ?>">
                                            <?php echo $item['content_detail']; ?>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </section>

                </div>

                <div id="tam-nhin" class="section-block mb-5">
                    <section class="vision-section py-3">
                        <div class="container">
                            <h2 class="title"><?php echo $vision_title ?></h2>
                            <!-- Tabs -->
                            <?php if (!empty($vision_list_tap_vision) && is_array($vision_list_tap_vision)): ?>
                                <div class="row g-3 mb-4 justify-content-start">
                                    <?php foreach ($vision_list_tap_vision  as $index => $item): ?>
                                        <?php
                                        $is_active = $index === 0 ? 'active' : '';
                                        $tab_id = 'tab' . ($index + 1);
                                        ?>
                                        <div class="col-md-4">
                                            <div class="vision-tab <?php echo $is_active; ?>" data-tab="<?php echo esc_attr($tab_id); ?>">
                                                <?php echo $item['svg_icon']; ?>
                                                <div class="mb-0 fw-bold"><?php echo nl2br($item['title']); ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            <?php endif; ?>

                            <!-- Tab contents -->
                            <?php if (!empty($vision_list_content_tap) && is_array($vision_list_content_tap)): ?>
                                <div class="vision-content-wrap position-relative p-4 rounded">
                                    <div class="highlight-bar" id="highlightBar"></div>
                                    <?php foreach ($vision_list_content_tap as $index => $item): ?>
                                        <?php
                                        $tab_id = 'tab' . ($index + 1);
                                        $is_active = $index === 0 ? 'active' : 'd-none';
                                        ?>
                                        <div class="vision-content <?php echo $is_active; ?>" id="<?php echo esc_attr($tab_id); ?>">
                                            <?php echo $item['content_detail']; ?>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>

                <div id="su-menh" class="section-block mb-5">
                    <section class="mission-section py-3">
                        <div class="container">
                            <h2 class="title"><?php echo $mission_title ?></h2>
                            <!-- Tabs -->
                            <?php if (!empty($mission_list_tap_mission) && is_array($mission_list_tap_mission)): ?>
                                <div class="row g-3 mb-4 justify-content-start">
                                    <?php foreach ($mission_list_tap_mission  as $index => $item): ?>
                                        <?php
                                        $is_active = $index === 0 ? 'active' : '';
                                        $mission_id = 'mission' . ($index + 1);
                                        ?>
                                        <div class="col-md-4">
                                            <div class="mission-tab <?php echo $is_active; ?>" data-tab="<?php echo esc_attr($mission_id); ?>">
                                                <?php echo $item['svg_icon']; ?>
                                                <div class="mb-0 fw-bold"><?php echo nl2br($item['title']); ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            <?php endif; ?>
                            <!-- Content box -->
                            <?php if (!empty($mission_list_content_tap) && is_array($mission_list_content_tap)): ?>
                                <div class="mission-content-wrap position-relative p-4 rounded">
                                    <div class="highlight-bar" id="highlightBarMission"></div>
                                    <?php foreach ($mission_list_content_tap as $index => $item): ?>
                                        <?php
                                        $mission_id = 'mission' . ($index + 1);
                                        $is_active = $index === 0 ? 'active' : 'd-none';
                                        ?>
                                        <div class="mission-content <?php echo $is_active; ?>" id="<?php echo esc_attr($mission_id); ?>">
                                            <?php echo $item['content_detail']; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom-about-us.js?v=20250604"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style-about-us.css">
<?php get_footer(); ?>