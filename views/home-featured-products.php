<div class="featured_products_section">
    <div class="description_filters_wrapper">
        <h2 class="title">Polecane produkty</h2>
        <p class="description">Nullam finibus massa non porttitor scelerisque. Nulla mattis vulputate diam in pellentesque. Proin sodales ultrices dui, id lobortis enim dictum eu. Curabitur consequat ipsum magna, sit amet aliquet felis posuere in. Pellentesque commodo enim ac mi venenatis laoreet. Maecenas molestie tincidunt massa, at viverra leo consectetur sed. Sed commodo urna mi.</p>
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