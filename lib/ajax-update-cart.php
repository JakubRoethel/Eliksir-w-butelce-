<?php 

// update mini cart 
// 


function update_item_from_cart() {
    $cart_item_key = $_POST['cart_item_key'];   
    $quantity = $_POST['qty'];     

   // Get mini cart
   ob_start();

   foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item)
   {
       if( $cart_item_key == $_POST['cart_item_key'] )
       {
           WC()->cart->set_quantity( $cart_item_key, $quantity, $refresh_totals = true );
       }
   }
   WC()->cart->calculate_totals();
   WC()->cart->maybe_set_cart_cookies();
   
   
   $get_cart_URL_pl = wc_get_cart_url();
   
//    $fragments['a.header-cart-count-pl'] = "<a href='#' class='header-cart-count-pl'>" . 'CART (' . WC()->cart->get_cart_contents_count() . ')' . '</a>';
   return true;
}

add_action('wp_ajax_update_item_from_cart', 'update_item_from_cart');
add_action('wp_ajax_nopriv_update_item_from_cart', 'update_item_from_cart');