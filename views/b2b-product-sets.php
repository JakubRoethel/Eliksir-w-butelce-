<?php require_once dirname(__DIR__, 1) . ('/lib/get-product-by-cat.php'); ?>
<div class="archive b2b">
    <div class="archive-wrapper">
        <div class="archive-container">
            <section id='zestawy' class="product_cat zestawy">
                <h2 class="category-title"><?php echo __('Zestawy dla Twojej firmy') ?></h2>
                <p class="category-description"><?php echo get_term_by('id', 39, 'product_cat')->description ?></p>
                <?php echo do_shortcode('[fe_widget id="358" horizontal="yes" columns="1"]');
                getProductsByCat(39, 6);
                ?>
            </section>
        </div>
    </div>
</div>