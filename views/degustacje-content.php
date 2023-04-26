<?php
$title = get_field('degustacje_content')['title'];
$desctiption = get_field('degustacje_content')['description'];
$contact_description = get_field('degustacje_content')['contact'];
$contact_button = get_field('degustacje_content')['contact_us_button'];
$gallery = get_field('gallery');
?>
<section class="degustacje_content">
    <h2 class="title"><?php echo $title ?></h2>
    <div class="description_wrapper">
        <div class="description_container"><?php echo $desctiption ?></div>
        <div class="contact_container">
            <?php echo $contact_description ?>
            <a class="button shop-more" href="<?php echo $contact_button['url'] ?>">
                <?php echo $contact_button['title'] ?>
            </a>
        </div>
    </div>

</section>
<section class="degustacje_gallery">
    <div class="gallery_wrapper">
        <?php
        foreach ($gallery as $img) {
            echo wp_get_attachment_image($img, 'full');
        }
        ?>
    </div>
</section>

<div class="container b2b_offer_section degustacje">
            <?php $image_id = 415; ?>
            <div class="text_and_button_wrapper">
                <p class="title" style="color: #B293B1"><?php echo __('Poznaj ofertę B2B') ?></p>
                <p class="description"><?php echo __('Pellentesque commodo enim ac mi venenatis laoreet. Maecenas molestie tincidunt massa, at viverra leo consectetur sed. Sed commodo urna mi.') ?></p>
                <a href="#" class="cta_button button"><?php echo __('Zamów rozmowę z konsultantem') ?></a>
            </div>
            <div class="image_wrapper">
                <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
            </div>
        </div>
    </div>
</div>