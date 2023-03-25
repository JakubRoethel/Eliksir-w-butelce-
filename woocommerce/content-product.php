<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}
$product_id = $product->get_id();
$product_title = $product->get_name();
$product_price = $product->get_price_html();
$featured_image = get_post_thumbnail_id($product_id);
$url = get_permalink($product_id);
?>
<li <?php wc_product_class('', $product); ?>>
	<a class="woocommerce-LoopProduct-link woocommerce-loop-product__link" href="<?php echo $url; ?>">
		<?php echo wp_get_attachment_image($featured_image, 'large', false, []); ?>

		<div class="product-details-wrapper">
			<p class="woocommerce-loop-product__title"><?php echo $product_title; ?></p>
			<?php echo $product_price; ?>
		</div>
		<hr>
	</a>
</li>