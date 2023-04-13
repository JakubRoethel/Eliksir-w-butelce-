<?php 

$product_id = $args['product_id'];
// Get the product object
$product = wc_get_product( $product_id );
echo $product->get_title();

?>