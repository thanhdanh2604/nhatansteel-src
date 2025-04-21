<?php
/**
 * Template Name: About us
 *
 * @package Nhatansteel
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'page');
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();