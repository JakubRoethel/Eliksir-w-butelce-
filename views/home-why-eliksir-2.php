<?php
$title = get_field('why_eliksir_section')['title'];

$image_id = get_field('why_eliksir_section')['image'];
$description = get_field('why_eliksir_section')['description'];
$background_color = get_field('why_eliksir_section')['background_color']; 
$title_color = get_field('why_eliksir_section')['title_color']; 
?>


<div class="container why_eliksir_section" style="background: <?php echo $background_color ;?>">

    <div class="text_and_button_wrapper">
        <p class="title" style="color: <?php echo $title_color ?>"><?php echo $title ?></p>
        <p class="description"><?php echo $description ?></p>
        
    </div>
    <div class="image_wrapper">
        <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
    </div>
</div>