<?php $cta_button = get_field('contact_button');
?>
<div class="contact_button_container">
    <button class="contact_button get_offer"><?php echo $cta_button['title'] ?></button>
</div>

<div class="container how_to_order_section">
    <?php
    $title = get_field('how_to_order')['title'];
    ?>
    <h2 class="title"><?php echo $title; ?></h2>
    <?php $order_steps_list = get_field('how_to_order')['order_step'];

    if ($order_steps_list) : ?>
        <div class="order_steps_wrapper">

            <?php foreach ($order_steps_list as $key => $order_step) {

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
                        <p style="color: <?php echo $color_hex ?>" class="order_number"><?php echo $key + 1 ?>.</p>
                        <p class="description"> <?php echo $description  ?></p>
                    </div>
                    <div class="svg<?php echo $key ?>">
                        <svg width="472" height="33" viewBox="0 0 472 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.8">
                                <path d="M47.9463 0.0756836L47.9463 32.0756L0.000475093 32.0756L19.1788 16.0756L0.000476837 0.0756819L47.9463 0.0756836Z" fill="white" />
                                <path d="M453.502 0.0756829L472 16.0756L453.502 32.0756L39.7773 32.0756L39.7773 0.075682L453.502 0.0756829Z" fill="white" />
                            </g>
                        </svg>

                        <svg width="15" height="111" viewBox="0 0 15 111" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g opacity="0.8">
                                <path d="M0 22.4216L14.9645 22.4216L14.9645 0.000107249L7.48226 8.96872L-1.76628e-06 0.000108719L0 22.4216Z" fill="#E2C54E" />
                                <path d="M3.77157e-05 102.077L7.4823 110.728L14.9646 102.077L14.9645 21.5L-7.02899e-06 21.5L3.77157e-05 102.077Z" fill="#E2C54E" />
                            </g>
                        </svg>
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
    <?php $cta_button = get_field('why_eliksir')['cta_button']; ?>
    <div class="text_wrapper">
        <p class="title"><?php echo $title ?></p>
        <p class="description"><?php echo $description ?></p>
    </div>
    <div class="image_wrapper">
        <div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
    </div>
</div>