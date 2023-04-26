<?php

$title = get_field('why_us_eventy')['title'];
$subtitle = get_field('why_us_eventy')['subtitle'];
$description_list = get_field('why_us_eventy')['description'];
$cta_button = get_field('why_us_eventy')['cta_button'];
$image_id = get_field('why_us_eventy')['image'];

?>

<div class="container why_us_eventy">
    <div class="text_and_button_wrapper">
        <p class="title"><?php echo $title ?></p>
        <?php

        if ($description_list) : ?>
            <ul class="description">
            <p class="subtitle"> <?php echo $subtitle ?> </p> 
            <?php foreach ($description_list as $single_item_list) {
                        $single_item = $single_item_list['single_row'];
                    ?>
                        <li class="single_item">
                            <?php echo $single_item ?>
                        </li>

                    <?php  } ?>
            </ul>
        <?php endif; ?>
        <a href="<?php echo $cta_button['url'] ?>" class="cta_button button shop-more"><?php echo $cta_button['title'] ?></a>
    </div>
    <div class="image_wrapper">
        <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
    </div>
</div>