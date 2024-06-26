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
    wp_localize_script('main', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_register_script('Swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', null, null, true);
    wp_enqueue_script('Swiper');

    wp_enqueue_script('blurry-load', get_stylesheet_directory_uri() . '/src/js/modules/blurry-load.js', array('jquery'), '', true);
    
    $nav_labels_list = get_field('hero_section', 28)['slider_button'];
    wp_localize_script('main', 'labels_list', array('nav_labels_list' => $nav_labels_list));
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
    if ($filter['ID'] == 317 || $filter['ID'] == 777 ) {

        if ($term->term_id === 45) {
            //id = 45 is bubbles
            $img  = '<img src="' . get_stylesheet_directory_uri() . '/assets/img/bubbles.svg" alt="' . $term->name . '" width="15" height="15" />';
            $html = '<a ' . $link_attributes . '>' . $img . ' ' . $term->name . '</a>';
        } else if ($term->term_id === 46) {
            //water
            $img  = '<img src="' . get_stylesheet_directory_uri() . '/assets/img/water.svg" alt="' . $term->name . '" width="15" height="15" />';
            $html = '<a ' . $link_attributes . '>' . $img . ' ' . $term->name . '</a>';
        } else {
            $img  = '<img src="' . get_stylesheet_directory_uri() . '/assets/img/' . $term->slug . '.svg" alt="' . $term->name . '" width="15" height="15" />';
            $html = '<a ' . $link_attributes . '>' . $img . ' ' . $term->name . '</a>';
        }
    }
    return $html;
}

require_once('lib/acf-config.php');
require_once('lib/change-currency-symbol.php');
require_once('lib/custom-add-to-cart-buttons.php');
require_once('lib/ajax-update-cart.php');





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




function my_acf_init()
{
    acf_form_head();
}
add_action('wp_head', 'my_acf_init');


//remove cart button in minicart 
remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

remove_theme_support('html5', 'comment-form');

// remove cupon form

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form');


// add cupon form in difrent location
add_action( 'woocommerce_review_order_after_order_total', 'woocommerce_checkout_coupon_form' );









// Register custom post type for email activity data
function register_email_activity_post_type() 
{
    $labels = array(
        'name' => __('Email Activity', 'textdomain'),
        'singular_name' => __('Email Activity', 'textdomain'),
        'menu_name' => __('Email Activity', 'textdomain'),
        'add_new_item' => __('Add New Email Activity', 'textdomain'),
        'edit_item' => __('Edit Email Activity', 'textdomain'),
        'view_item' => __('View Email Activity', 'textdomain'),
        'search_items' => __('Search Email Activity', 'textdomain'),
        'not_found' => __('No email activity found', 'textdomain'),
        'not_found_in_trash' => __('No email activity found in Trash', 'textdomain'),
        'all_items' => __('All Email Activity', 'textdomain'),
    );
    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'supports' => array('title', 'custom-fields'),
        'menu_icon' => 'dashicons-email-alt',
    );
    register_post_type('email_activity', $args);
}
add_action('init', 'register_email_activity_post_type');

// Add custom columns to the All Email Activity view
function add_email_activity_columns($columns)
{
    $columns['email'] = __('Email', 'textdomain');
    $columns['products'] = __('Product List', 'textdomain');
    return $columns;
}
add_filter('manage_email_activity_posts_columns', 'add_email_activity_columns');

// Display custom field data in custom columns
function display_email_activity_columns($column_name, $post_id)
{
    if ($column_name === 'email') {
        echo get_post_meta($post_id, 'email', true);
    }
    if ($column_name === 'products') {
        echo get_post_meta($post_id, 'products', true);
    }
}
add_filter('manage_email_activity_posts_custom_column', 'display_email_activity_columns', 10, 2);


// Add submenu page for email activity data - NOT NEEDED ANYMORE
function add_email_activity_submenu_page()
{
    add_submenu_page(
        'woocommerce',
        __('Email Activity', 'textdomain'),
        __('Email Activity', 'textdomain'),
        'manage_options',
        'email-activity',
        'email_activity_submenu_page_callback'
    );
}
add_action('admin_menu', 'add_email_activity_submenu_page');




// Callback function for email activity submenu page
function email_activity_submenu_page_callback()
{
    ?>
        <div class="wrap">
            <h1><?php esc_html_e('Email Activity list', 'textdomain'); ?></h1>
            <table class="wp-list-table widefat striped">
                <thead>
                    <tr>
                        <th><?php esc_html_e('Name', 'textdomain'); ?></th>
                        <th><?php esc_html_e('Email', 'textdomain'); ?></th>
                        <th><?php esc_html_e('Product List', 'textdomain'); ?></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $args = array(
                        'post_type' => 'email_activity',
                        'posts_per_page' => -1,
                    );
                    $email_activity_query = new WP_Query($args);
                    if ($email_activity_query->have_posts()) {
                        while ($email_activity_query->have_posts()) {
                            $email_activity_query->the_post();
                            $name = get_the_title();
                            $email = get_post_meta(get_the_ID(), 'email', true);
                            $products = get_post_meta(get_the_ID(), 'products', true);
                    ?>
                            <tr>
                                <td><?php echo $name; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $products; ?></td>
                            </tr>
                        <?php
                        }
                        wp_reset_postdata();
                    } else {
                        ?>
                        <tr>
                            <td colspan="3"><?php esc_html_e('No email activity found', 'textdomain'); ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    <?php
}
// Register email activity submenu page
function register_email_activity_submenu_page()
{
    add_submenu_page(
        'edit.php?post_type=email_activity',
        'Email Activity list',
        'Email Activity',
        'manage_options',
        'email-activity',
        'email_activity_submenu_page_callback'
    );
}
add_action('admin_menu', 'register_email_activity_submenu_page');



//show product image on thanks you page 
add_filter('woocommerce_order_item_name', 'add_image_before_product_title', 10, 2);
function add_image_before_product_title($item_name, $item)
{
    $product = $item->get_product();
    $image = $product->get_image('thumbnail'); // adjust the size as needed
    $item_name = '<div class="product-image">' . $image . '</div>' . $item_name;
    return $item_name;
}


// Remove the "Order Received" breadcrumb
add_filter('woocommerce_get_breadcrumb', 'add_back_to_shop_breadcrumb', 10, 2);
function add_back_to_shop_breadcrumb($crumbs, $object)
{
    if (is_wc_endpoint_url('order-received')) {
        array_pop($crumbs);
    }
    return $crumbs;
}


add_action('template_redirect', 'disable_cart_page');
function disable_cart_page()
{
    if (is_cart()) {
        wp_redirect(get_permalink(get_option('woocommerce_shop_page_id')));
        exit;
    }
}


//cart counter 
add_filter('woocommerce_add_to_cart_fragments', 'mini_cart_count_fragments', 10, 1);

function mini_cart_count_fragments($fragments)
{
    $get_cart_URL = wc_get_cart_url();
    $get_cart_contents_count = WC()->cart->get_cart_contents_count();
    $fragments['span.cart-count'] = sprintf(" <span class='cart-count'>%s</span>", $get_cart_contents_count);

    return $fragments;
}

// fix add to cart fragments //


function enqueue_wc_cart_fragments() { wp_enqueue_script( 'wc-cart-fragments' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_wc_cart_fragments' );


