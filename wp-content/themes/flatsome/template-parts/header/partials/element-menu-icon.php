<?php
/**
 * Menu icon element.
 *
 * @package          Flatsome\Templates
 * @flatsome-version 3.19.9
 */

$icon_style = get_theme_mod( 'menu_icon_style', '' );
?>
<li class="nav-icon has-icon">
  <?php if($icon_style) { ?><div class="header-button"><?php } ?>
		<a href="#" data-open="#main-menu" data-pos="<?php echo get_theme_mod( 'mobile_overlay', 'left' );?>" data-bg="main-menu-overlay" data-color="<?php echo get_theme_mod( 'mobile_overlay_color', '' );?>" class="<?php echo get_flatsome_icon_class($icon_style, 'small'); ?>" aria-label="<?php echo __('Menu','flatsome'); ?>" aria-controls="main-menu" aria-expanded="false">

		  <?php echo get_flatsome_icon('icon-menu'); ?>

		  <?php if ( get_theme_mod( 'menu_icon_title', 0 ) ) echo '<span class="menu-title uppercase hide-for-small">'.__('Menu','flatsome').'</span>'; ?>
		</a>
	<?php if($icon_style) { ?> </div> <?php } ?>
</li>
