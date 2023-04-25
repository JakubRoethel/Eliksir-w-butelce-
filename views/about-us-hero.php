<?php
$hero_image_id = get_field('hero_section_about_us')['hero_image'];
$hero_description = get_field('hero_section_about_us')['hero_text'];  ?>
<div class="about_us_section">
    <div class="container hero_section">
        <?php echo wp_get_attachment_image($hero_image_id, 'full'); ?>
        <div class="description_wrapper">
            <h1 class="hero_description"><?php echo $hero_description ?></h1>
        </div>
    </div>
</div>
