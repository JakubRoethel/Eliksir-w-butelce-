<?php

if (!WC()->cart->is_empty()) : ?>
    <div class="shop_table woocommerce-checkout-review-order-table">
        <ul class="woocommerce-mini-cart cart_list product_list_widget">
            <?php
            do_action('woocommerce_before_mini_cart_contents');

            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
                    $product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                    $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                    $product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                    $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                    $product_quantity = $cart_item['quantity'];
            ?>
                    <li class="woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">

                        <?php if (empty($product_permalink)) : ?>
                            <?php echo $thumbnail  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                            ?>
                        <?php else : ?>
                            <a href="<?php echo esc_url($product_permalink); ?>">
                                <?php echo $thumbnail // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                ?>
                            </a>
                        <?php endif; ?>
                        <h3 class="cart-item-title">
                            <a href="<?php echo esc_url($product_permalink); ?>">
                                <?php echo $product_name . ' x ' . apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.;

                                ?>
                            </a>
                        </h3>
                        <div class="price">
                            <span><?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                    ?></span>
                        </div>
                        <?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                        ?>

                    </li>
            <?php
                }
            }

            do_action('woocommerce_mini_cart_contents');
            ?>
        </ul>

        <p class="woocommerce-mini-cart__total total">
            <?php
            esc_html_e('Subtotal', 'woocommerce');
            wc_cart_totals_subtotal_html();
            ?>
        </p>

        <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
            <tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
                <th><?php wc_cart_totals_coupon_label($coupon); ?></th>
                <td><?php wc_cart_totals_coupon_html($coupon); ?></td>
            </tr>
        <?php endforeach; ?>

        <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

            <?php do_action('woocommerce_review_order_before_shipping'); ?>
            <div class="shipping">
                <?php wc_cart_totals_shipping_html(); ?>
            </div>
            <?php do_action('woocommerce_review_order_after_shipping'); ?>

        <?php endif; ?>

        <?php foreach (WC()->cart->get_fees() as $fee) : ?>
            <tr class="fee">
                <th><?php echo esc_html($fee->name); ?></th>
                <td><?php wc_cart_totals_fee_html($fee); ?></td>
            </tr>
        <?php endforeach; ?>
        <p class="order__total total">
            <?php esc_html_e('Total', 'woocommerce'); ?>
            <?php wc_cart_totals_order_total_html(); ?>
        </p>


    <?php else : ?>

        <p class="woocommerce-mini-cart__empty-message"><?php esc_html_e('No products in the cart.', 'woocommerce'); ?></p>

    <?php endif; ?>
    <div class="coupon-form">
        <?php do_action('woocommerce_review_order_after_order_total'); ?>
    </div>
</div>