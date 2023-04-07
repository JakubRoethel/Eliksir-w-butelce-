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

defined( 'ABSPATH' ) || exit;

require_once dirname(__DIR__, 1) . ('/lib/get-cross-sell-products.php');

require_once dirname(__DIR__, 1) . ('/lib/get-related-products.php');




global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

$product_id = $product->get_id();
$product_title = $product->get_name();
$product_price = $product->get_price_html();
$product_description = $product->get_description();
$product_attributs = $product->get_attributes();
$tags = get_the_terms( $post->ID, 'product_tag' );
$product_short_description = $product->get_short_description();
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="product_wrapper">
        <div class="summary entry-summary">
            <h2 class="product_name"> <?php echo $product_title ?></h2>
            <?php  
				if (!empty($tags)) :
				?>

					<p class="tags_title"><?php echo __('Najlepiej smakuje z:&nbsp;') ?>  </p>
					<div class="tags_container">
                    <?php foreach ($tags as $tag):
						$name = $tag->name;
                        $term_id = $tag->term_id;
                        $url = get_tag_link( $tag->term_id );
						$icon_id = get_field('tag_img', 'product_tag_' . $term_id ); ?>
                        
                        <div class="single_tag">
                            <?php echo wp_get_attachment_image( $icon_id, 'full' ); ?>
                            <a href="<?php echo $url ?>" class="tag_name">
                            <?php echo $name ?>
                            </a>
                        </div>  
                    <?php endforeach; ?>
                    </div>

			<?php
				endif;?>

            <p class="product_description"> 
                <?php echo $product_description ?> 
            </p>
                <?php
                    if ( $product->is_type( 'variable' ) ) { 
                         woocommerce_variable_add_to_cart();
                    } ?>   

                    <span class="free_shipping">
                        <p> <?php echo __('Darmowa dostawa od 100zł') ?> </p>
                    </span>
                    
        </div>
        <div class="product_gallery">
            <div class="swiper_single_product">
                <div class="swiper-wrapper">
                    <?php
                    $attachment_ids = $product->get_gallery_image_ids();
                    

                    foreach( $attachment_ids as $attachment_id ) 
                        {
                        // Display Image instead of URL
                        

                        ?>
                            <div class="swiper-slide swiper-slide-active">
                                <?php echo wp_get_attachment_image($attachment_id, 'full'); ?>
                            </div>
                        <?php
                    
                        }?>
                </div>
                <div class="swiper-button-next">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_458_17701" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                        <rect x="24" y="24" width="24" height="24" transform="rotate(180 24 24)" fill="#D9D9D9"/>
                    </mask>
                    <g mask="url(#mask0_458_17701)">
                        <path d="M12 4L20 12L12 20L10.575 18.6L16.175 13L4 13L4 11L16.175 11L10.575 5.4L12 4Z" fill="#40434C"/>
                    </g>
                </svg>
                </div>
                <div class="swiper-button-prev">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="mask0_458_17698" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                        <rect width="24" height="24" fill="#D9D9D9"/>
                    </mask>
                    <g mask="url(#mask0_458_17698)">
                        <path d="M12 20L4 12L12 4L13.425 5.4L7.825 11H20V13H7.825L13.425 18.6L12 20Z" fill="#40434C"/>
                    </g>
                </svg>
                </div>

                <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>  
    </div>
</div>

<div class="product_details">
    <div class="mix_details">
        <div class="ingredients_container">
            <h6 class="title"><?php echo __('Skład') ?> </h6>       
            <?php
                    $ingredients_list = get_field('skladniki');

                    if( $ingredients_list ):?>
                    <ul class="ingredients_list">
                        <?php  foreach( $ingredients_list as $ingredient ) { 
                                $single_ingredient = $ingredient['pojedynczy_skladnik'];
                            ?>
                                <li class="single_ingredient">
                                    <?php echo $single_ingredient ?>
                                </li>
                            <?php  } ?>
                    </ul>
                    <?php endif; ?>
        </div>
        <div class="how_make_coctail">
            <h6 class="title"><?php echo __('Jak przygotować koktajl') ?></h6>
            <ul class="step_list">
                <li class="single_item">
                    <?php echo __('Po prostu wymieszaj z lodem:') ?>

                </li>
                <li class="single_item">
                    <?php echo __('- 1 porcję alkoholu') ?> 
                </li>
                <li class="single_item">
                    <?php echo __('- 1/2 porcji eliksiru') ?>
                </li>
                <li class="single_item">
                    <?php echo __('Gotowe! Naprawdę. To takie proste!') ?>
                </li>
            </ul> 
        </div>  
    </div>
    <div class="product_short_description">
        <p class="short_description_text"> <?php echo $product_short_description ?></p>
        <h6>
            <?php echo __('Jak przygotować koktajl? Nic prostszego! Obejrzyj nasze wideo') ?>
        </h6>
        <?php
                    $movie_url = get_field('link_do_filmu'); ?>
        <iframe width="100%" height="315" src="<?php echo $movie_url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
        </iframe>
    </div>
    
</div>

<div class="cross_selling_section">
    <h6 class="title">   
        <?php echo __('Zobacz również') ?>
    </h6>
        <?php 

        $cross_sell_ids = get_post_meta( $product_id, '_crosssell_ids', true );
        $products_per_page = 3; 

        if($cross_sell_ids){
            getCrossSellProducts($product_id,$products_per_page);
        } else {
            getRelatedProducts($product_id,$products_per_page );
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



<?php do_action( 'woocommerce_after_single_product' ); ?>



    