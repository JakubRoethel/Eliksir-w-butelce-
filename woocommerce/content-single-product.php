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
$product_title = $product->get_name();
$product_price = $product->get_price_html();
$product_description = $product->get_description();
$product_attributs = $product->get_attributes();
$tags = get_the_terms($post->ID, 'product_tag');
$product_short_description = $product->get_short_description();
?>
<div id="product-<?php echo $product_id ?>" <?php wc_product_class('', $product); ?>>
    <div class="product_wrapper">
        <div class="summary entry-summary">
            <h2 class="product_name"> <?php echo $product_title ?></h2>
            <?php
            if (!empty($tags)) :
            ?>

                <p class="tags_title"><?php echo __('Najlepiej smakuje z:&nbsp;') ?> </p>
                <div class="tags_container">
                    <?php foreach ($tags as $tag) :
                        $name = $tag->name;
                        $term_id = $tag->term_id;
                        $url = get_tag_link($tag->term_id);
                        $icon_id = get_field('tag_img', 'product_tag_' . $term_id); ?>

                        <div class="single_tag">
                            <?php echo wp_get_attachment_image($icon_id, 'full'); ?>
                            <a href="<?php echo $url ?>" class="tag_name">
                                <?php echo $name ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php
            endif; ?>

            <p class="product_description">
                <?php echo $product_description ?>
            </p>
            <div class="buttons_container">
                <?php
                $zestawy_ID_cat = 39;
                if ($product->is_type('variable')) {
                    woocommerce_variable_add_to_cart();
                } else {
                    woocommerce_template_single_add_to_cart();
                }
                if (has_term(array($zestawy_ID_cat), 'product_cat', $product_id)) { 
                     // do something if product with given ID is in category "zestawy"
                     ?>
                    <button class="button get_offer"><?php echo __('Zamów w ofercie dla firm') ?></button>

                <?php   }


                ?>

            </div>
            <span class="free_shipping">
                <p> <?php echo __('Darmowa dostawa od 100zł') ?> </p>
            </span>
        </div>
        <div class="product_gallery">
            <div class="swiper_single_product">
                <div class="swiper-wrapper">
                    <?php
                    $attachment_ids = $product->get_gallery_image_ids();


                    foreach ($attachment_ids as $attachment_id) {
                        // Display Image instead of URL


                    ?>
                        <div class="swiper-slide swiper-slide-active">
                            <?php echo wp_get_attachment_image($attachment_id, 'full'); ?>
                        </div>
                    <?php

                    } ?>
                </div>
                <div class="swiper-button-next">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_458_17701" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect x="24" y="24" width="24" height="24" transform="rotate(180 24 24)" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_458_17701)">
                            <path d="M12 4L20 12L12 20L10.575 18.6L16.175 13L4 13L4 11L16.175 11L10.575 5.4L12 4Z" fill="#40434C" />
                        </g>
                    </svg>
                </div>
                <div class="swiper-button-prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0_458_17698" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                            <rect width="24" height="24" fill="#D9D9D9" />
                        </mask>
                        <g mask="url(#mask0_458_17698)">
                            <path d="M12 20L4 12L12 4L13.425 5.4L7.825 11H20V13H7.825L13.425 18.6L12 20Z" fill="#40434C" />
                        </g>
                    </svg>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="set_includes_section">
    <?php

    $product_ids = get_field('products_in_set'); // array of product IDs
    $args = array(
        'post_type' => 'product',
        'post__in' => $product_ids,
        'orderby' => 'post__in'
    );
    //show number of categoires like 4 eliksirs and 5 addons
    $products = get_posts($args);
    $category_count = array(); // Initialize an empty array to store the category counts
    if ($product_ids != 0) {
        foreach ($products as $product) {
            $categories = get_the_terms($product->ID, 'product_cat'); // Get the categories for each product
            if ($categories) {
                foreach ($categories as $category) {
                    if ($category->parent == 0) { // Only count parent categories
                        if (isset($category_count[$category->term_id])) {
                            $category_count[$category->term_id]++;
                        } else {
                            $category_count[$category->term_id] = 1;
                        }
                    }
                }
            }
        } ?>

        <div>
            <p class="title">
                <?php echo __('W zestawie ');
                foreach ($category_count as $category_id => $count) {
                    $category = get_term($category_id, 'product_cat');
                    echo   $count . 'X ' . $category->name . ' ';
                }
                ?>
            </p>
        </div>

        <?php
        $query = new WP_Query($args);
        if ($query->have_posts()) { ?>
            <ul class="products swiper_product_set">
                <div class="swiper-wrapper">
                    <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                    ?>
                        <div class="swiper-slide">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>

                    <?php   } ?>
                </div>
                <div class="swiper-scrollbar"></div>
            </ul>
    <?php  }
        wp_reset_query();
    }


    ?>
</div>
<div class="product_details">
    <div class="mix_details">

        <?php
        $ingredients_list = get_field('skladniki');

        if ($ingredients_list) : ?>
            <div class="ingredients_container">
                <h6 class="title"><?php echo __('Skład') ?> </h6>
                <ul class="ingredients_list">
                    <?php foreach ($ingredients_list as $ingredient) {
                        $single_ingredient = $ingredient['single_item'];
                    ?>
                        <li class="single_ingredient">
                            <?php echo $single_ingredient ?>
                        </li>
                    <?php  } ?>
                </ul>
            </div>
        <?php endif; ?>

        


        <?php
            $how_to_make_list = get_field('how_to_make_list');
            $how_to_make_title = get_field('how_to_make_main_title') 
            
            ?>

            
            <?php
            
            if ($how_to_make_list) : ?>
            
            <div class="how_make_coctail">
                <h6 class="title"><?php echo $how_to_make_title  ?></h6>
            
                <ul class="step_list">
                    <?php foreach ($how_to_make_list as $single_item_list) {
                         $single_item = $single_item_list['single_item'];
                         ?>
                         <li class="single_item">
                            <?php echo $single_item ?>
                        </li>

                     <?php  } ?>
                </ul>
            </div>
            <?php endif; ?>
            

    </div>
    <?php $movie_url = get_field('link_do_filmu');
    if ($movie_url) :
    ?>
        <div class="product_short_description">
            <p class="short_description_text"> <?php echo $product_short_description ?></p>
            <h6>
                <?php echo __('Jak przygotować koktajl? Nic prostszego! Obejrzyj nasze wideo') ?>
            </h6>
            <?php
            $movie_url = get_field('link_do_filmu'); ?>
            <iframe width="100%" height="350px" src="<?php echo $movie_url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
            </iframe>
        </div>
    <?php endif; ?>

</div>

<div class="cross_selling_section">
    <h6 class="title">
        <?php echo __('Zobacz również') ?>
    </h6>
    <?php

    $cross_sell_ids = get_post_meta($product_id, '_crosssell_ids', true);
    $products_per_page = 3;

    if ($cross_sell_ids) {
        getCrossSellProducts($product_id, $products_per_page);
    } else {
        getRelatedProducts($product_id, $products_per_page);
    }

    ?>
</div>

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



<div class="popup_container">
  <div class="popup_content">
    <!-- your prepared order form here -->
    <div class="main_wrapper">
<div class="popup_wrapper">
  <section class="left_conainer">
    <div class="wrapper">
      <p>Chcesz złożyć zamówienie telefonicznie? Zadzwoń do nas!</p>
      <img src="http://eliksir-w-butelce.local/wp-content/uploads/2023/04/Rectangle-312-1.png"/>
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