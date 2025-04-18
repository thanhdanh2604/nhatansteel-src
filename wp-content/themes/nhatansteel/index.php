<?php
/**
 * wp-blank WordPress Theme, ordasvit.com
 * wp-blank is distributed under the terms of the GNU GPL
 * Copyright: OrdaSvit, Andrey Kvasnevskiy, ordasvit.com
 */

get_header();
?>

<div id="main" class="site-main">


  <div class="<?php if (wp_blank_is_active_sidebar("sidebar_right") && wp_blank_is_active_sidebar("sidebar_left")) {
    echo ('col-lg-6 col-md-12 col-sm-12 col-xs-12');
  } else if (wp_blank_is_active_sidebar("sidebar_right") || wp_blank_is_active_sidebar("sidebar_left")) {
    echo ('col-lg-9 col-md-12 col-sm-12 col-xs-12');
  } else {
    echo ('col-lg-12 col-md-12 col-sm-12 col-xs-12');
  } ?>  main_page">
    <?php wp_blank_show_position_preview("main_content"); ?>

    <h2 class="entry-title">
      <?php the_title(); ?>
    </h2>
    <?php while (have_posts()):
      the_post(); ?>
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php if (has_post_thumbnail() ): ?>
          <div class="entry-thumbnail">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php endif; ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div><!-- .entry-content -->
      </div><!-- #post -->

    <?php endwhile; ?>
  </div>

  <?php get_template_part('templates/positions-after-content'); ?>

</div><!-- #main -->
<?php get_footer(); ?>