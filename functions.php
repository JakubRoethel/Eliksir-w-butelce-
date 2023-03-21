<?php 

function studio_scripts() {
    wp_register_style('main', get_stylesheet_directory_uri() .'/dist/main.css', [], 1, 'all');
    wp_enqueue_style('main');
    wp_register_style('custom', get_stylesheet_directory_uri() .'/src/css/custom.css', [], 1, 'all');
    wp_enqueue_style('custom');

    wp_register_script('main', get_stylesheet_directory_uri() . '/dist/main.js', ['jquery'], 1, true);
    wp_enqueue_script('main');

    wp_register_script( 'Swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', null, null, true );
    wp_enqueue_script('Swiper');
    
}

add_action('wp_enqueue_scripts', 'studio_scripts'); 

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
add_filter( 'wpc_filters_checkbox_term_html', 'wpc_term_brand_logoo', 10, 4 );
function wpc_term_brand_logoo($html, $link_attributes, $term, $filter){
    if( $term->slug === 'yes' ){
        $html = '<a '.$link_attributes.'>' . __('Sale', 'domain').'</a>';
    }
    return $html;
}


function products_nowosci($atts) {
$args = array(
    'product_cat' => 'Accessories'
);
$loop = new WP_Query($args);
while ($loop->have_posts()) : $loop->the_post();
    // echo get_the_ID();
    // echo get_field('nowosci');
    // update_field('nowosci', 'tak');
    echo has_term( array( 'accessories' ), 'product_cat', get_the_ID());
    
endwhile;
}

add_shortcode('nowosci', 'products_nowosci');


//check if the saved product has "Accessories" category
add_action( 'updated_post_meta', 'on_product_save', 10, 4 );
function on_product_save( $meta_id, $post_id, $meta_key, $meta_value ) {
    if ( $meta_key == '_edit_lock' ) { // we've been editing the post
        if ( get_post_type( $post_id ) == 'product' ) { // we've been editing a product
            $product = wc_get_product( $post_id );
            
            if( has_term( array( 'Accessories' ), 'product_cat', $post_id ) ) {
                update_field('nowosci', 'tak', $post_id );
            } else {
                update_field('nowosci', 'nie', $post_id );
            }

        }
    }
   
}

require_once('lib/acf-config.php');


function hide_custom_field() {
    remove_meta_box( 'nowosci', 'product', 'normal' );
}

add_action( 'admin_menu', 'hide_custom_field' );


/**
 * Show additional title before Filters widget
 */
add_action('wpc_before_filters_widget', 'my_filters_widget' );
function my_filters_widget($args)
{
    echo 'My special title'."\r\n";
}



function products_slider($atts) {

    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10
    );
    $loop = new WP_Query($args);
    ?> 
     <div class="container">
        <div class="swiper">
            <div class="swiper-wrapper"> 
                

            <?php 
            while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="swiper-slide swiper-slide-active">
              <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/dream-world/487.svg" alt="">
              <div class="info">
                <h4 class="name">
                  Giratina <?php  echo get_the_ID(); ?>
                </h4>
                <span class="type">
                  Ghost, Dragon
                </span>
              </div>
            </div>
            <?php endwhile; 
            wp_reset_query();
            ?>





            </div>
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div> 
     </div>
     
        <?php
    }
    
    add_shortcode('products_slider_shortcode', 'products_slider');




