<?php 

function getCrossSellProducts($product_id, $posts_per_page)
{

$cross_sell_ids = get_post_meta( $product_id, '_crosssell_ids', true );

    $cross_sell_args = array(
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'no_found_rows'       => true,
        'posts_per_page'      => $posts_per_page,
        'post__in'            => $cross_sell_ids,
    );


    $cross_sell__loop = new WP_Query($cross_sell_args);

    if ($cross_sell__loop->have_posts()) { ?>
        <ul class="products columns-3">
            <?php while ($cross_sell__loop->have_posts()) : $cross_sell__loop->the_post();

                wc_get_template_part('content', 'product');

            endwhile; ?>

        </ul>



    <?php   } else {
        return false;
    }
    wp_reset_query();

};