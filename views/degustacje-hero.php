<?php
$hero_image_id = get_field('hero_section')['hero_image'];
$hero_description = get_field('hero_section')['hero_text']; 
 ?>
<div class="degustacje_hero_section">
    <div class="container hero_section">
        <?php echo wp_get_attachment_image($hero_image_id, 'full'); ?>
        <div class="description_wrapper">
            <p class="hero_description"><?php echo $hero_description ?></p>
        </div>
    </div>
</div>