<?php

/**
 * The Template for displaying products in a product tag. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-tag.php.
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

require_once dirname(__DIR__, 1) . ('/lib/get-product-by-tag.php');
require_once dirname(__DIR__, 1) . ('/lib/get-product-by-cat.php');

get_header('shop');

$tag = get_queried_object();


?>
<div class="archive-wrapper">
    <div class="archive-container">
        <?php do_action('woocommerce_before_main_content'); ?>
        <section class="product_cat">
            <p class="tag-pretitle"><?php echo __('Eliksiry do') ?> <?php woocommerce_page_title(); ?></p>
            <!-- <div class="filters_wrapper">
				<?php echo do_shortcode('[fe_widget id="316" horizontal="yes" columns="1"]');
                echo do_shortcode('[fe_sort id="3"]'); ?>
				</div> -->
            <?php
            getProductsByTag($tag->term_id);
            ?>
        </section>
        <section id='zestawy' class="product_cat zestawy tags" style="background: #FDC9B8">
            <h2 class="category-title"><?php echo __('Zestawy') ?></h2>
            <p class="category-description"><?php echo get_term_by('id', 39, 'product_cat')->description ?></p>
            <?php echo do_shortcode('[fe_widget id="314" horizontal="yes" columns="1"]');
            getProductsByCat(39, 6);
            ?>

        </section>
        <?php
        $offer_title = get_field('why_us_category_content', 'general_settings')['title'];
        $offer_description = get_field('why_us_category_content', 'general_settings')['description'];
        $button_text = get_field('why_us_category_content', 'general_settings')['button_text'];
        $image_id = get_field('why_us_category_content', 'general_settings')['img'];
        ?>
        <div class="container b2b_offer_section">
            
            <div class="text_and_button_wrapper">
                <p class="title" style="color: #B293B1"><?php echo $offer_title ?></p>
                <p class="description"><?php echo $offer_description ?></p>
                <button class="button get_offer"><?php echo $button_text ?></button>
            </div>
            <div class="image_wrapper">
                <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php 

get_template_part('views/popup-offer');

get_footer(); 

?>