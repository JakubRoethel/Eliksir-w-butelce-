<?php
$title = get_field('logotype')['title'];
$logotype_list = get_field('logotype')['logotype_img'];
?>

<div class="logotype_section">
    <p class="title"> <?php echo $title ?> </p>
    <?php
        if( $logotype_list ): ?>
        <div class="container logotype_container">
            <div class="swiper_logo">
                <div class="swiper-wrapper">
                    <?php  foreach( $logotype_list as $logotype ) { 
                         $image = $logotype['img'];
                    ?>
                        <div class="swiper-slide swiper-slide-active">
                            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                        </div>
                      <?php  } ?>
                </div>
                </div>
            </div>
        </div>                
 <?php endif; ?>
 </div>

 <?php

$title = get_field('b2b_offer_about')['title'];
$description_list = get_field('b2b_offer_about')['description'];
$button_text = get_field('b2b_offer_about')['button_text'];
$image_id = get_field('b2b_offer_about')['img'];

?>

<div class="container b2b_offer_section about_us">
           
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
        <button class="button get_offer"><?php echo $button_text ?></button>
            </div>
            <div class="image_wrapper">
                <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
            </div>
        </div>
    </div>
</div>

<?php 

get_template_part('views/popup-offer');


?>