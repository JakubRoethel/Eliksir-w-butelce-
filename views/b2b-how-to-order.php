    <div class="container how_to_order_section">
    <?php $title = get_field('how_to_order')['title']; ?>
    <h2 class="title"><?php echo $title ; ?></h2>
        <?php $order_steps_list = get_field('how_to_order')['order_step'];

        if ($order_steps_list) : ?>
            <div class="order_steps_wrapper">
                
                <?php foreach ($order_steps_list as $key=>$order_step) {

                    $description = $order_step['description'];
                    $color_hex = $order_step['step_color'];
                    
                ?>
                    <div class="single_order_step <?php echo $key ?>">
                        <style>
                            .svg<?php echo $key ?> path {
                                fill: <?php echo $color_hex ?>;
                            }
                        </style>
                        <div class="number_and_description_wrapper">
                        <p style="color: <?php echo $color_hex ?>" class="order_number"><?php echo $key+1 ?>.</p>
                        <p class="description"> <?php echo $description  ?></p>
                        </div>
                        <div class="svg<?php echo $key ?>">
                        <?php echo file_get_contents(get_stylesheet_directory_uri() . '/assets/img/arrow-step.svg'); ?>
                        </div>
                      
                    </div>
                <?php  } ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="container why_eliksir">
        <?php $title = get_field('why_eliksir')['title']; ?>
        <?php $image_id = get_field('why_eliksir')['image']; ?>
        <?php $description = get_field('why_eliksir')['description']; ?>
        <div class="text_wrapper">
            <p class="title"><?php echo $title ?></p>
            <p class="description"><?php echo $description ?></p>
        </div>
        <div class="image_wrapper">
        <div class="img_container"> <?php echo wp_get_attachment_image( $image_id , 'full' ); ?> </div>
        </div>
    </div>