<?php
$rows = get_field('hero_slider');
      if( have_rows($rows) ): ?>
 <div class="container">
    <div class="swiper">
        <div class="swiper-wrapper">
        <?php while(  have_rows($rows) ): the_row();
                  $image = get_sub_field('single_slider_img');
                  ?>
            <div class="swiper-slide swiper-slide-active">
            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
    </div>
 </div>
 <?php endif; ?>


    