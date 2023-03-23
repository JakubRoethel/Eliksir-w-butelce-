<?php
$rows = get_field('hero_section')['slider_images'];
      if( $rows ): ?>
        <div class="container hero_section">
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
                </div>
            </div>
        </div>                
 <?php endif; ?>


