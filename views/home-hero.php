<?php
$rows = get_field('hero_section')['slider_images'];
      if( $rows ): ?>
        <div class="container">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php  foreach( $rows as $row ) { 
                         $image = $row['single_slide_image'];
                    ?>
                        <div class="swiper-slide swiper-slide-active">
                            <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                        </div>
                      <?php  } ?>
                </div>
                <div class="swiper-pagination"></div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>                
 <?php endif; ?>


