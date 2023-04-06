<?php

// 1. Show plus minus buttons


  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
	
// 	if(is_cart()) {
		 echo '<button type="button" class="plus">+</button>';
// 	}
  
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
	
// 	if(is_cart()) {
		 echo '<p class="quantity_title">Ilość:</p> <button type="button" class="minus">-</button>';
// 	}
  
}

add_action( 'woocommerce_after_add_to_cart_quantity', 'misha_before_add_to_cart_btn' );
function misha_before_add_to_cart_btn(){
  global $product;
  echo '<div class="btn-price price">'.$product->get_price_html().'</div>';
}



  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   
   wc_enqueue_js( "   
           
		


      $('body').on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 			console.log('plus minus button cliked');
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 0 ) {
			 
				qty.val( val - step ).change();
  				if(val == 1) {
  				 console.log($( this ).parent().parent().parent().children('.product-remove').children('a'));
  				$( this ).parent().parent().parent().children('.product-remove').children('a').click();
  				}
				
            }
         }
 
      });
        
   " );
}


?>