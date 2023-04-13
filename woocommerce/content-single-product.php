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

<div class="popup_container">
    <div class="popup_content">
        <!-- your prepared order form here -->
        <div class="main_wrapper">
            <div class="popup_wrapper">
                <section class="left_conainer">
                    <div class="wrapper">
                        <p>Chcesz złożyć zamówienie telefonicznie? Zadzwoń do nas!</p>
                        <img src="http://eliksir-w-butelce.local/wp-content/uploads/2023/04/Rectangle-312-1.png" />
                        <p>Ewa Betka</p>
                        <p>+48 123 123 123</p>
                        <p>ewa@eliksirwbutelce.pl</p>
                    </div>
                </section>
                <section class="form_container b2b_offer">
                    <form action="#" method="post">
                        <p>Możesz też zamówić produkty przez formularz</p>
                        <div class="container name">
                            <label for="name">Name & Surname:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="container email">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="container phone">
                            <label for="phone">Phone number:</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="wrapper">
                            <div class="container product_selector">
                                <label for="product">Product:</label>
                                <select id="product" name="product" required>
                                    <option value="">Select a product</option>
                                    <?php
                                    $args = array(
                                        'post_type' => 'product',
                                        'posts_per_page' => -1, // set to -1 to retrieve all posts
                                    );

                                    $products = get_posts($args);

                                    foreach ($products as $product) {
                                        $product_title = $product->post_title; ?>
                                        <option value="<?php echo $product_title ?>"><?php echo $product_title ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="container quantity">
                                <label for="quantity">Quantity:</label>
                                <input type="number" id="quantity" name="quantity" required>
                            </div>
                        </div>
                        <div id="button-hook"></div>
                        <div id="product-list"></div>
                        <button id="order-button" type="submit">Order</button>
                    </form>

                </section>
            </div>
        </div>
    </div>
</div>


<?php do_action('woocommerce_after_single_product'); ?>