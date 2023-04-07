<?php 

function getRelatedProducts($product_id, $posts_per_page)
{
$related_products = wc_get_related_products( $product_id);

$related_products_args = array(
    'post_type'           => 'product',
    'post_status'         => 'publish',
    'ignore_sticky_posts' => 1,
    'no_found_rows'       => true,
    'posts_per_page'      => $posts_per_page,
    'post__in'            => $related_products,
);

$related_products_loop = new WP_Query($related_products_args); 

    if ($related_products_loop->have_posts()) { ?>
        <ul class="products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
            <?php while ($related_products_loop->have_posts()) : $related_products_loop->the_post();

                wc_get_template_part('content', 'product');

            endwhile; ?>

        </ul>



    <?php   } else {
        return false;
    }
    wp_reset_query();
};