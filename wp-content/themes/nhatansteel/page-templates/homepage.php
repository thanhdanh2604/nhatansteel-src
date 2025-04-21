<?php
/**
 * Template Name: Trang chủ
 *
 * @package Nhatansteel
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
		the_content()
        ?>
    </div>
</main>

<?php
get_footer();