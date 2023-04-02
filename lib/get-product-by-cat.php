<?php

function getProductsByCat($theCat, $posts_per_page)
{
    $product_category = get_term_by('id', $theCat, 'product_cat');
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => $posts_per_page,
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
        <ul class="products columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
            <?php while ($loop->have_posts()) : $loop->the_post();

                wc_get_template_part('content', 'product');

            endwhile; ?>

        </ul>



    <?php   } else {
        return false;
    }
    wp_reset_query();
    
    
    if ($product_category->count > $posts_per_page && $posts_per_page != -1) { ?>
        <div class="button_container">
            <a class="button shop-more" href="<?php echo get_category_link($product_category) ?>"><?php echo get_field('more_button', 'product_cat_' . $theCat) ?></a>
        </div>
<?php } else if($posts_per_page == -1){
    return true;
}
    return true;
}
