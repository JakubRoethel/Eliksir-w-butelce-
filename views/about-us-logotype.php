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