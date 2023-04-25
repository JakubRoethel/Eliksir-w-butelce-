<?php 

$title = get_field('customer_benefits')['title'];
$description = get_field('customer_benefits')['description'];
$image_id = get_field('customer_benefits')['img'];
$benefits_list = get_field('customer_benefits')['benefits_list']; ?>


<div class=" container customer_benefits_section">
    <div class="text_container">
        <p class="title"> <?php echo $title ?> </p>
        <p class="description"> <?php echo $description ?> </p>
    </div>
    <div class="img_benefits_list_container">
        <div class="img_container">
            <?php echo wp_get_attachment_image( $image_id , 'full' ); ?> 
        </div>
        <?php
        if ($benefits_list) : ?>
            <div class="benefits_list_container">
                
                <?php foreach ($benefits_list as $key=>$benefit_item) {

                    $description = $benefit_item['single_item'];
                    $color_hex = $benefit_item['step_color'];
                ?>
                <div class="single_benefit">
                    <div class="number_and_description_wrapper">
                        <p style="color: <?php echo $color_hex ?>" class="item_number"><?php echo $key+1 ?>.</p>
                        <p class="benefit_description"> <?php echo $description  ?></p>
                    </div>
                </div>
        <?php  } ?>
            </div>
            <?php endif; ?>
    </div>

</div>

