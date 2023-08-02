<?php 
$title = get_field('featured_products')['title'];
$description = get_field('featured_products')['description'];

?>



<div class="featured_products_section">
    <div class="description_filters_wrapper">
        <h2 class="title"><?php echo $title  ?></h2>
        <p class="description"><?php echo $description  ?></p>
    </div>
    <div class="featured_products_wrapper">
        <div class="products_filters">
            <?php echo do_shortcode('[fe_widget id="265" horizontal="yes" columns="1"]'); ?>
        </div>
        <?php
        // The tax query
        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field'    => 'name',
            'terms'    => 'featured',
            'operator' => 'IN', // or 'NOT IN' to exclude feature products
        );

        // The query
        $query = new WP_Query(array(
            'post_type'           => 'product',
            'post_status'         => 'publish',
            'posts_per_page'      => 6,
            'tax_query'           => $tax_query // <===
        ));


        if ($query->have_posts()) { ?>
            <ul class="products swiper_featured">
                <div class="swiper-wrapper">
                    <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                    ?>
                        <div class="swiper-slide">
                            <?php wc_get_template_part('content', 'product'); ?>
                        </div>

                    <?php   } ?>
                </div>
                <div class="swiper-scrollbar"></div>
            </ul>
        <?php  }
        wp_reset_query();
        ?>
        <div class="button_container homepage">
        <?php  $shop_page_url = get_permalink( wc_get_page_id( 'shop' ) ); ?>
            <a class="button shop-more" href="<?php echo $shop_page_url ?>"><?php echo __("Zobacz wszystkie produkty") ?></a>
        </div>
    </div>
</div>
</div>
</div>