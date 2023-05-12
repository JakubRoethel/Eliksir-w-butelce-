<?php
function getProductsByCat($theCat, $posts_per_page)
{
    $product_category = get_term_by('id', $theCat, 'product_cat');
	$order_by = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : 'date';
    $order = isset( $_GET['order'] ) ? wc_clean( $_GET['order'] ) : 'desc'; 
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $posts_per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $theCat
            )
            
            ),
			
    );


    
    $loop = new WP_Query($args);
    
    if ($loop->have_posts()) {
        $product_count = 0; // Counter for the number of products displayed
        $total_count = $loop->found_posts;
?>
        <ul class="products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
            <?php while ($loop->have_posts()) : $loop->the_post();
                $product_count++; // Increment the product counter
                if ($product_count == 6 && $total_count >= 5 && !is_shop()) { // If it's the 6th product, add the extra li tag

                    get_template_part('views/cta', 'extra-loop-card', array(
                        'cat_id' => $theCat
                    ));
                }
                wc_get_template_part('content', 'product');
            endwhile; 

            if($total_count < 5 && !is_shop()) {
                get_template_part('views/cta', 'extra-loop-card', array(
                    'cat_id' => $theCat
                ));
            } ?>
        </ul>
    <?php   } else {
        return false;
    }
    wp_reset_query();
				
    if ($product_category->count > $posts_per_page && $posts_per_page != -1) { ?>
        <div class="button_container">
            <a class="button shop-more" href="<?php echo get_category_link($product_category) ?>"><?php echo get_field('more_button', 'product_cat_' . $theCat) ?></a>
        </div>
<?php } else if ($posts_per_page == -1) {
        return true;
    }
    return true;
}
