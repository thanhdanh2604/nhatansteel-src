<?php
/**
 * Product with right full sidebar.
 *
 * @package          Flatsome/WooCommerce/Templates
 * @flatsome-version 3.19.9
 */

?>
<div class="row content-row row-divided row-large row-reverse">
	<div id="product-sidebar" class="col large-3 hide-for-medium shop-sidebar <?php flatsome_sidebar_classes(); ?>">
		<?php
			do_action('flatsome_before_product_sidebar');
			/**
			 * woocommerce_sidebar hook
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			if (is_active_sidebar( 'product-sidebar' ) ) {
				dynamic_sidebar('product-sidebar');
			} else if(is_active_sidebar( 'shop-sidebar' )) {
				dynamic_sidebar('shop-sidebar');
			}
		?>
	</div>

	<div class="col large-9">
		<div class="product-main">
		<div class="row">
			<div class="product-gallery col large-<?php echo get_theme_mod( 'product_image_width', '6' ); ?>">
				<?php flatsome_sticky_column_open( 'product_sticky_gallery' ); ?>
				<?php
				/**
				 * woocommerce_before_single_product_summary hook
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action( 'woocommerce_before_single_product_summary' );
				?>
				<?php flatsome_sticky_column_close( 'product_sticky_gallery' ); ?>
			</div>

			<div class="product-info summary entry-summary col col-fit <?php flatsome_product_summary_classes();?>">
				<?php
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>

			</div>
		</div>
		</div>
		<div class="product-footer">
			<?php
					/**
					 * woocommerce_after_single_product_summary hook
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					do_action( 'woocommerce_after_single_product_summary' );
				?>
		</div>
  </div>
</div>
