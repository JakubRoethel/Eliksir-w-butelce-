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
            <p class="product_description">
                <?php echo $product_description ?>
            </p>
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
                    echo '<button class="button get_offer">' . __('Zamów w ofercie dla firm') . '</button>';
                }
                ?>
            </div>
            <span class="free_shipping">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 6.75L9 5.75L11 6.75V2H7V6.75ZM4 14V12H9V14H4ZM2 18C1.45 18 0.979167 17.8042 0.5875 17.4125C0.195833 17.0208 0 16.55 0 16V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H16C16.55 0 17.0208 0.195833 17.4125 0.5875C17.8042 0.979167 18 1.45 18 2V16C18 16.55 17.8042 17.0208 17.4125 17.4125C17.0208 17.8042 16.55 18 16 18H2ZM2 16H16V2H13V10L9 8L5 10V2H2V16Z" fill="#40434C"/>
                </svg>
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