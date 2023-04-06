<?php

function studio_scripts()
{
    wp_enqueue_script('acf-input', get_template_directory_uri() . '/js/acf-input.min.js', array('jquery'), '', true);
    wp_register_style('main', get_stylesheet_directory_uri() . '/dist/main.css', [], 1, 'all');
    wp_enqueue_style('main');
    wp_register_style('custom', get_stylesheet_directory_uri() . '/src/css/custom.css', [], 1, 'all');
    wp_enqueue_style('custom');

    wp_register_script('main', get_stylesheet_directory_uri() . '/dist/main.js', ['jquery', 'acf-input'], 1, true);
    wp_enqueue_script('main');

    wp_register_script('Swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', null, null, true);
    wp_enqueue_script('Swiper');

    wp_enqueue_script('blurry-load', get_stylesheet_directory_uri() . '/src/js/modules/blurry-load.js', array('jquery'), '', true);
    
}

add_action('wp_enqueue_scripts', 'studio_scripts');

add_theme_support('custom-logo');

/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
// add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
// function jk_dequeue_styles( $enqueue_styles ) {
// 	// unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
// 	// unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
// 	// unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
// 	return $enqueue_styles;
// }


/* Let's add Apple logo for 'apple' brand term */
add_filter('wpc_filters_label_term_html', 'wpc_term_brand_logoo', 10, 4);
function wpc_term_brand_logoo($html, $link_attributes, $term, $filter)
{
  if($filter['ID'] == 317){

    if($term->term_id === 45) {
        //id = 45 is bubbles
      $img  = '<img src="' . get_stylesheet_directory_uri() . '/assets/img/bubbles.svg" alt="' . $term->name . '" width="15" height="15" />';
      $html = '<a ' . $link_attributes . '>' . $img . ' ' . $term->name . '</a>';
  } else if($term->term_id === 46) {
      //water
      $img  = '<img src="' . get_stylesheet_directory_uri() . '/assets/img/water.svg" alt="' . $term->name . '" width="15" height="15" />';
      $html = '<a ' . $link_attributes . '>' . $img . ' ' . $term->name . '</a>';
  } else {
      $img  = '<img src="' . get_stylesheet_directory_uri() . '/assets/img/' . $term->name .'.svg" alt="' . $term->name . '" width="15" height="15" />';
      $html = '<a ' . $link_attributes . '>' . $img . ' ' . $term->name . '</a>';
  }

  }
  return $html;
}

require_once('lib/acf-config.php');
require_once('lib/change-currency-symbol.php');
require_once('lib/custom-add-to-cart-buttons.php');



function products_slider($atts)
{

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10
    );
    $loop = new WP_Query($args);
?>

    <?php
    if (have_rows('slider_images')) : ?>
        <div class="container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php while (have_rows('slider_images')) : the_row();
                        $image = get_sub_field('single_slide_image');
                    ?>
                        <div class="swiper-slide swiper-slide-active">
                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                        </div>

                    <?php endwhile; ?>

                <?php endif; ?>
                </div>
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>




        <!-- wp_reset_query();
            ?> -->







    <?php
}

add_shortcode('products_slider_shortcode', 'products_slider');

//add shop breadcrumb
// add_filter( 'woocommerce_breadcrumb_defaults', 'custom_woocommerce_breadcrumbs' );
// function custom_woocommerce_breadcrumbs( $defaults ) {
//     // Ensure that the 'before' key is an array
//     if ( ! is_array( $defaults['before'] ) ) {
//         $defaults['before'] = array();
//     }

//     // Add "Shop" link before breadcrumbs
//     array_unshift( $defaults['before'], '<a href="' . esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ) . '">' . __( 'Shop', 'woocommerce' ) . '</a>' );

//     return $defaults;
// }

add_filter( 'woocommerce_get_breadcrumb', function($crumbs, $Breadcrumb){
    $shop_page_id = wc_get_page_id('shop'); //Get the shop page ID
    if($shop_page_id > 0 && !is_shop()) { //Check we got an ID (shop page is set). Added check for is_shop to prevent Home / Shop / Shop as suggested in comments
        $new_breadcrumb = [
            _x( 'Sklep', 'breadcrumb', 'woocommerce' ), //Title
            get_permalink(wc_get_page_id('shop')) // URL
        ];
        array_splice($crumbs, 1, 0, [$new_breadcrumb]); //Insert a new breadcrumb after the 'Home' crumb
    }
    return $crumbs;
}, 10, 2 );


function my_acf_init() {
    acf_form_head();
}
add_action('wp_head', 'my_acf_init');




