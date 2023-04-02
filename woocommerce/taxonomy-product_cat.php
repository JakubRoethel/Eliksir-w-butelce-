<?php

/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
require_once dirname(__DIR__, 1) . ('/lib/get-product-by-cat.php');
get_header('shop');

$category = get_queried_object();

?>
<div class="archive-wrapper">
    <div class="archive-container">
        <?php do_action('woocommerce_before_main_content'); ?>
        <section class="product_cat">
            <h2 class="woocommerce-products-header__title page-title category-title"><?php woocommerce_page_title(); ?></h2>
            <p class="category-description"><?php echo $category->description; ?></p>
            <?php
            getProductsByCat($category->term_id, -1);
            ?>
        </section>
    </div>
</div>

<?php get_footer(); ?>