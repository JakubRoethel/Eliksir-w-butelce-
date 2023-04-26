<?php
$title = get_field('logotype_eventy')['title'];
$logotype_list = get_field('logotype_eventy')['logotype_img'];
?>

<div class="logotype_eventy_section">
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

<div class="container b2b_offer_section eventy">
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