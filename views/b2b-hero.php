<?php
$hero_image_id = get_field('hero_section')['hero_image'];
$hero_image_id_mobile = get_field('hero_section')['hero_image_mobile'];
$hero_description = get_field('hero_section')['hero_text']; 
$hero_file_url = get_field('hero_section')['oferta_b2b'];  ?>
<div class="b2b_section">
    <div class="container hero_section">
        <?php echo wp_get_attachment_image($hero_image_id, 'full'); ?>
        <?php echo wp_get_attachment_image($hero_image_id_mobile, 'full'); ?>
        <div class="description_wrapper">
            <p class="hero_description"><?php echo $hero_description ?></p>
            <a class="download_button" href="<?php echo $hero_file_url ?>" download>
                <button>Pobierz katalog dostępnych produktów (PDF)</button>
            </a>
        </div>
    </div>
</div>