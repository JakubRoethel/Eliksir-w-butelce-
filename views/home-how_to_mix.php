<?php
$mix_title = get_field('how_to_mix')['title'];
$mix_subtitle = get_field('how_to_mix')['subtitle']; 
   

?>

<div class="how_to_mix">

    <div class="text_container"> 
        <h2 class="title"><?php echo $mix_title ?></h2>
        <p class="subtitle"><?php echo $mix_subtitle ?></p>
    </div>
    <div class="mix_ingredients">
        <div class="left_side_mix">
        <?php
        $mix_ingredients_icons = get_field('how_to_mix')['icon_box'];
          if( $mix_ingredients_icons ): ?>
          <div class="icone_list">
          <?php  foreach( $mix_ingredients_icons as $mix_ingredients_icons) { 
                         $icon = $mix_ingredients_icons['icon'];
                         $description = $mix_ingredients_icons['icon_text'];
                    ?>
                        <div data-aos=“fade-right” class="single_icon_box">
                            <?php echo wp_get_attachment_image( $icon, 'full' ); ?>
                            <p class="icon_description">  <?php echo $description  ?> </p>
                        </div>
                      <?php  } ?>
          </div>
      <?php endif; ?> 
        </div>
        <?php
            $mix_main_img_url = get_field('how_to_mix')['main_img'];
            $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false
                ]
            ]);
?>
<div class="right_side_mix">
    <?php echo file_get_contents($mix_main_img_url, false, $context); ?>
</div>

    </div>
    <?php $mix_text = get_field('how_to_mix')['text']; ?>
    <p class="text"> <?php echo $mix_text  ?></p>
    

    
</div>