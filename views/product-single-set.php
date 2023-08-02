<?php

$product_id = $args['product_id'];
// Get the product object
$product = wc_get_product($product_id);


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
            $set_subtitle = get_field('set_subtitle'); // array of product IDs
            if ( $set_subtitle ) {
                echo "<p class='set_subtitle'>" . $set_subtitle . "</p>";
            } ?>
            <div class="set_includes_titles_section">
                <p class="title"><?php echo __('W skład zestawu wchodzi') ?></p>
                <?php
                //show product titles included in set
                $product_ids = get_field('products_in_set'); // array of product IDs
                $args = array(
                    'post_type' => 'product',
                    'post__in' => $product_ids,
                    'orderby' => 'post__in'
                ); ?>
                <div class="product_title_list">
                    <?php foreach ($product_ids as $product_id) {
                        $_product = wc_get_product($product_id); // Get product object
                        if ( $_product ) {
                            echo '<a href="' . $_product->get_permalink() . '"><li>' . $_product->get_title() . '</li></a>';
                        }
                    } ?>
                </div>
            </div>
            <div class="product_description">
                <?php echo $product_description ?>
                </div>
            <div class="buttons_container">
            <?php
                $zestawy_ID_cat = 37;
                if (has_term(39, 'product_cat')) {
                    if ($product->is_type('variable')) {
                        woocommerce_variable_add_to_cart();
                    } else {
                        woocommerce_template_single_add_to_cart();
                    }
                } else if (has_term(57, 'product_cat')) {
                    echo '<button class="button get_offer">' . __('Zamów') . '</button>';
                }
                ?>
            </div>
      
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
            <?php
            $section_title= get_field('tytul_sekcji_z_filmem'); ?>
            <h6>
            <?php echo $section_title ?>
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

    $cross_sell_ids = $product->get_cross_sell_ids();
    $products_per_page = 3;
    
    error_log(print_r($cross_sell_ids, true));
    error_log("test");

    if ($cross_sell_ids) {
        getCrossSellProducts($product_id, $products_per_page);
    } else {
        getRelatedProducts($product_id, $products_per_page);
    }

    ?>
</div>

<?php 
$offer_title = get_field('why_us_category_content', 'general_settings')['title'];
$offer_description = get_field('why_us_category_content', 'general_settings')['description'];
$button_text = get_field('why_us_category_content', 'general_settings')['button_text'];
?>

<div class="container b2b_offer_section">
    <?php $image_id = 415; ?>
    <div class="text_and_button_wrapper">
        <p class="title" style="color: #B293B1"><?php echo $offer_title ?></p>
        <p class="description"><?php echo $offer_description ?></p>
        <button class="button get_offer"><?php echo $button_text ?></button>
    </div>
    <div class="image_wrapper">
        <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
    </div>
</div>