<?php

function getProductsByTag($theTag)
{
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_tag',
                'field' => 'id',
                'terms' => $theTag
            )
        )
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) { 
        $product_count = 0; // Counter for the number of products displayed
        $total_count = $loop->found_posts;
        ?>
       <ul class="products tags columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
            <?php while ($loop->have_posts()) : $loop->the_post();
            $product_count++; // Increment the product counter
            if ($product_count == 6 && $total_count >= 6 && !is_shop()) { // If it's the 6th product, add the extra li tag
               
                get_template_part('views/cta', 'extra-loop-card');
            }

                wc_get_template_part('content', 'product');

            endwhile;

            if($total_count < 6 && !is_shop()) {
                get_template_part('views/cta', 'extra-loop-card');
            } ?>

        </ul>

<?php   } else {
        return false;
    }

    return true;
}
