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
$category_name = $category->name;
$category_set_id = 39;
$display_categor_id = get_field('category_set', 'general_settings');



?>
<div class="archive-wrapper">
    <div class="archive-container">
        <?php do_action('woocommerce_before_main_content'); ?>
        <section class="product_cat">
            <h2 class="woocommerce-products-header__title page-title category-title"><?php echo $category_name; ?></h2>
            <p class="category-description"><?php echo $category->description; ?></p>
            <?php
            echo do_shortcode('[fe_widget horizontal="yes" columns="1"]');
            getProductsByCat($category->term_id, -1);
            ?>
        </section>
        <?php
        if( $category->term_id != $category_set_id ) {
            ?>
            <section id='zestawy' class="product_cat zestawy tags" style="background: #FDC9B8">
            <h2 class="category-title"><?php echo __('Zestawy') ?></h2>
            <p class="category-description"><?php echo get_term_by('id', 39, 'product_cat')->description ?></p>
            <?php echo do_shortcode('[fe_widget id="314" horizontal="yes" columns="1"]');
            getProductsByCat(39, 6);
            ?>

        </section>
        <?php
        }
        else { ?>

        
            <section id='<?php echo get_term_by('id', $display_categor_id, 'product_cat')->name ?>' class="product_cat <?php echo get_term_by('id', $display_categor_id, 'product_cat')->name ?> tags" style="background: #FDC9B8">
            <h2 class="category-title"><?php echo get_term_by('id', $display_categor_id, 'product_cat')->name ?></h2>
            <p class="category-description"><?php echo get_term_by('id', $display_categor_id, 'product_cat')->description ?></p>
            <?php echo do_shortcode('[fe_widget id="314" horizontal="yes" columns="1"]');
            getProductsByCat($display_categor_id, 6);
            ?>
            </section>

            <?php
                $additional_section_title = get_field('category_archive_zestawy', 'general_settings')['naglowek'];
                $additional_section_description = get_field('category_archive_zestawy', 'general_settings')['tekst'];
                $additional_subtitle_list = get_field('category_archive_zestawy', 'general_settings')['kolorowe_tytuly'];
                $additional_imgs_list = get_field('category_archive_zestawy', 'general_settings')['zdjecia'];
            ?>
            <section class="additional_section">
                <h2 class="additional_section_title"> <?php echo $additional_section_title ?> </h2>
                <p class="additional_section_description"> <?php echo $additional_section_description ?> </p>

                <?php if( $additional_subtitle_list): ?>
                <div class="subtitle_wrapper">
                <?php  foreach( $additional_subtitle_list as $additional_subtitle) { 
                                $subtitle = $additional_subtitle['naglowek'];
                            ?>
                              <p class="subtitle"> <?php echo $subtitle ?> </p>
                            <?php  } ?>
                </div>
                <?php endif; ?> 
                <?php if( $additional_imgs_list): ?>
                <div class="img_wrapper">
                <?php  foreach( $additional_imgs_list as $additional_img) { 
                                $img = $additional_img['img'];
                            ?>
                               <?php echo wp_get_attachment_image( $img, 'full' ); ?>
                            <?php  } ?>
                </div>
                <?php endif; ?>
            </section>


        
        <?php
        } ?>

<div class="container b2b_offer_section">
            <?php $image_id = 415; ?>
            <div class="text_and_button_wrapper">
                <p class="title" style="color: #B293B1"><?php echo __('Poznaj ofertę B2B') ?></p>
                <p class="description"><?php echo __('Pellentesque commodo enim ac mi venenatis laoreet. Maecenas molestie tincidunt massa, at viverra leo consectetur sed. Sed commodo urna mi.') ?></p>
                <a href="#" class="cta_button button"><?php echo __('Zamów rozmowę z konsultantem') ?></a>
            </div>
            <div class="image_wrapper">
                <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>