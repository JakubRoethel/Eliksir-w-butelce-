<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

require_once dirname(__DIR__, 1) . ('/lib/get-cross-sell-products.php');
require_once dirname(__DIR__, 1) . ('/lib/get-related-products.php');


global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}

$product_id = $product->get_id();
$is_product_set = get_field('products_in_set') ? true : false;

if($is_product_set) {
    get_template_part('views/product', 'single-set', array(
        'product_id' => $product_id
    ));
} else {
    get_template_part('views/product', 'single-default', array(
        'product_id' => $product_id
    ));
} ?>


<?php
get_template_part('views/popup-offer');

?>


<?php do_action('woocommerce_after_single_product'); ?>