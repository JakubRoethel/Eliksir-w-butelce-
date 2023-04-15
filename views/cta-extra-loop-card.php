<?php

    //get banner for Elixirs and Dodatkis
    $eliksir_product_list_banner = get_field('banner_for_elixir', 'general_settings');
    $dodatki_product_list_banner = get_field('banner_for_dodatki', 'general_settings');

//get category to check the slug
if (!empty($args['cat_id'])) {
    $category_id = $args['cat_id'];
    $category = get_term_by('id', $category_id, 'product_cat');
    $category_slug = $category->slug;



if ($eliksir_product_list_banner['image'] && $category_slug == 'eliksiry') {
?>
    <li class="extra-product-card">
        <a href="<?php echo $eliksir_product_list_banner['link']['url'] ?>">
            <p class="title"><?php echo $eliksir_product_list_banner['title'] ?></p>
            <?php
            echo wp_get_attachment_image($eliksir_product_list_banner['image'], 'full');
            // print_r($eliksir_product_list_banner);
            ?>
        </a>
    </li>

<?php
} else if ($dodatki_product_list_banner['image'] && $category_slug == 'dodatki') {
?>
    <li class="extra-product-card">
        <a href="<?php echo $dodatki_product_list_banner['link']['url'] ?>">
            <p class="title"><?php echo $dodatki_product_list_banner['title'] ?> </p>
            <?php
            echo wp_get_attachment_image($dodatki_product_list_banner['image'], 'full');
            // print_r($eliksir_product_list_banner);
            ?>
        </a>
    </li>
<?php } 
}


if ($dodatki_product_list_banner['image'] && is_tag() ) { 
    ?>
    <li class="extra-product-card">
    <a href="<?php echo $eliksir_product_list_banner['link']['url'] ?>">
        <p class="title"><?php echo $eliksir_product_list_banner['title'] ?></p>
        <?php
        echo wp_get_attachment_image($eliksir_product_list_banner['image'], 'full');
        // print_r($eliksir_product_list_banner);
        ?>
    </a>
</li>
<?php
} 
?>