<?php
$splash_title = get_field('splash')['title'];
$splash_subtitle = get_field('splash')['subtitle'];    

?>
<div class="home_splash">
  <div class="text_container"> 
    <h2 class="title"><?php echo $splash_title ?></h2>
    <p class="subtitle"><?php echo $splash_subtitle ?></p>
  </div>
  <div class="info_container">
    <div class="left_box">
      <?php
        $splash_ingredients = get_field('splash')['left_ingredients'];
          if( $splash_ingredients ): ?>
          <div class="ingredients_list">
          <?php  foreach( $splash_ingredients as $splash_ingredients) { 
                         $icon = $splash_ingredients['ingredients_icon'];
                         $description = $splash_ingredients['ingredients_text'];
                    ?>
                        <div data-aos="slide-left" class="single_ingredient">
                            <?php echo wp_get_attachment_image( $icon, 'full' ); ?>
                            <p class="img_description">  <?php echo $description  ?> </p>
                        </div>
                      <?php  } ?>
          </div>
      <?php endif; ?> 
    </div>
    <div class="middle_box">
      <?php
        $splash_imgs = get_field('splash')['midel_img_section'];
          if( $splash_imgs): ?>
          <div class="imgs">
          <?php  foreach( $splash_imgs as $splash_imgs) { 
                         $splash_blob = $splash_imgs['blob'];  
                         $splash_img = $splash_imgs['img'];  
                    ?>
                        <div class="mask">
                            <?php echo wp_get_attachment_image( $splash_blob, 'full' ); ?>
                        </div>
                        <div class="img">
                            <?php echo wp_get_attachment_image( $splash_img, 'full' ); ?>
                        </div>
                      <?php  } ?>
          </div>
      <?php endif; ?> 
    </div>
    <div class="right_box">
    <?php
        $splash_ingredients = get_field('splash')['right_ingredients'];
          if( $splash_ingredients ): ?>
          <div class="ingredients_list">
          <?php  foreach( $splash_ingredients as $splash_ingredients) { 
                         $icon = $splash_ingredients['ingredients_icon'];
                         $description = $splash_ingredients['ingredients_text'];
                    ?>
                        <div class="single_ingredient" data-aos="slide-right">
                            <?php echo wp_get_attachment_image( $icon, 'full' ); ?>
                            <p class="img_description">  <?php echo $description  ?> </p> 
                        </div>
                      <?php  } ?>
          </div>
      <?php endif; ?> 
    </div>
  </div>
</div>                
