<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see              https://woocommerce.com/document/template-structure/
 * @package          WooCommerce\Templates
 * @version          9.7.0
 * @flatsome-version 3.19.10
 */

use Automattic\WooCommerce\Enums\ProductType;

defined( 'ABSPATH' ) || exit;

// FL: Disable check, Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
//if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
//	return;
//}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);

$slider_classes = array('product-gallery-stacked', 'product-gallery-slider', 'slider', 'slider-nav-small', 'mb-half');

if ( get_theme_mod( 'product_gallery_grid_layout' ) ) {
	$slider_classes[] = 'product-gallery-grid-layout product-gallery-grid-layout--' . get_theme_mod( 'product_gallery_grid_layout' );
}

// Image Zoom
if(get_theme_mod('product_zoom', 0)){
  $slider_classes[] = 'has-image-zoom';
}

$rtl = 'false';
if(is_rtl()) $rtl = 'true';

if ( get_theme_mod( 'product_gallery_slider_type' ) === 'fade' ) {
	$slider_classes[] = 'slider-type-fade';
}

if(get_theme_mod('product_lightbox','default') == 'disabled'){
  $slider_classes[] = 'disable-lightbox';
}

?>
<?php do_action('flatsome_before_product_images'); ?>

<div class="product-images relative mb-half has-hover <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>">

  <?php do_action('flatsome_sale_flash'); ?>

  <div class="image-tools absolute top show-on-hover right z-3">
    <?php do_action('flatsome_product_image_tools_top'); ?>
  </div>

  <div class="woocommerce-product-gallery__wrapper <?php echo implode(' ', $slider_classes); ?>"
		  data-flickity-options='{
                "cellAlign": "center",
                "wrapAround": true,
                "autoPlay": false,
                "prevNextButtons": false,
                "adaptiveHeight": true,
                "imagesLoaded": true,
                "lazyLoad": 1,
                "dragThreshold" : 15,
                "pageDots": false,
                "rightToLeft": <?php echo $rtl; ?>
       }'>
    <?php

    if ( $post_thumbnail_id ) {
      $html  = flatsome_wc_get_gallery_image_html( $post_thumbnail_id, true );
    } else {
		$wrapper_classname = $product->is_type( fl_woocommerce_version_check( '9.7.0' ) ? ProductType::VARIABLE : 'variable' ) && ! empty( $product->get_available_variations( 'image' ) ) ?
			'woocommerce-product-gallery__image woocommerce-product-gallery__image--placeholder' :
			'woocommerce-product-gallery__image--placeholder';
		$html              = sprintf( '<div class="%s">', esc_attr( $wrapper_classname ) );
		$html             .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
		$html             .= '</div>';
    }

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

    do_action( 'woocommerce_product_thumbnails' );
    ?>
  </div>
</div>
<?php do_action('flatsome_after_product_images'); ?>

<div class="show-for-medium product-gallery-stacked-thumbnails">
  <?php wc_get_template( 'woocommerce/single-product/product-gallery-thumbnails.php' ); ?>
</div>
