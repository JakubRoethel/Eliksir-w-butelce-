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
            <a class="button shop-more get_offer" >
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

<?php

$title = get_field('b2b_offer_degustacje')['title'];
$description_list = get_field('b2b_offer_degustacje')['description'];
$button_text = get_field('b2b_offer_degustacje')['button_text'];
$image_id = get_field('b2b_offer_degustacje')['img'];

?>

<div class="container b2b_offer_section eventy">
    <div class="text_and_button_wrapper">
        <p class="title"><?php echo $title ?></p>
        <?php if ($description_list) : ?>
            <ul class="description">
                <?php foreach ($description_list as $single_item_list) {
                    $single_item = $single_item_list['single_row'];
                ?>
                    <li class="single_item">
                        <?php echo $single_item ?>
                    </li>

                <?php  } ?>
            </ul>
        <?php endif; ?>
        <button class="button"><?php echo $button_text ?></button>
    </div>
    <div class="image_wrapper">
        <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
    </div>
</div>

<?php 

get_template_part('views/popup-offer');


?>