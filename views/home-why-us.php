<?php
    $why_us_title = get_field('why_us')['title'];
    $why_us_text = get_field('why_us')['text']; 
    $why_us_img = get_field('why_us')['img']; 
?>

<div class="why_us_section">
    <div class="text_container"> 
        <h2 class="title"> <?php echo $why_us_title ?> </h2>
        <p class="description"> <?php echo $why_us_text ?> </p>
    </div>
    <div class="img_container"> <?php echo wp_get_attachment_image( $why_us_img , 'full' ); ?> </div>
</div>