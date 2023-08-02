<?php

$title = get_field('why_us')['title'];
$description_list = get_field('why_us')['description'];
$cta_button = get_field('why_us')['cta_button'];
$second_cta_button = get_field('why_us')['second_cta_button'];
$image_id = get_field('why_us')['image'];

?>

<div class="container why_us about_us_why_us">
    <div class="text_and_button_wrapper">
        <p class="title"><?php echo $title ?></p>
        <?php

        if ($description_list) : ?>
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
        <div class="button-wrapper">
            <a href="<?php echo $cta_button['url'] ?>" class="cta_button button"><?php echo $cta_button['title'] ?></a>
            <a href="<?php echo $second_cta_button['url'] ?>" class="cta_button button"><?php echo $second_cta_button['title'] ?></a>
        </div>
    </div>
    <div class="image_wrapper">
        <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
    </div>
</div>