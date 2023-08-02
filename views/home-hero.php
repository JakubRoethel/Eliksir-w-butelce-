<?php
$rows = get_field('hero_section')['slider_images'];
      if( $rows ): ?>
        <div class="container hero_section hero_section_desktop">
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

 <?php
$rows = get_field('hero_section')['slider_images'];
      if( $rows ): ?>
        <div class="container hero_section hero_section_mobile">
            <div class="swiper_mobile">
                <div class="swiper-wrapper">
                    <?php  foreach( $rows as $row ) { 
                         $image = $row['single_slide_image_mobile'];
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





