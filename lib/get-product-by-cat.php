<?php

function getProductsByCat($theCat)
{
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 8,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $theCat
            )
        )
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) { ?>
       <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
            <?php while ($loop->have_posts()) : $loop->the_post();

                wc_get_template_part('content', 'product');

            endwhile; ?>

        </ul>

<?php   } else {
        return false;
    }
    wp_reset_query();
    return true;
}
