<?php
$filter_title = get_field('filter_section')['title'];
?>

<div class="filter_section">
    <div class="text_container">
        <h2 class="title"><?php echo $filter_title ?></h2>
    </div>
    <?php
    $filters_icons = get_field('filter_section')['icon_box'];
    if ($filters_icons) : ?>
        <div class="filter_container">
            <?php foreach ($filters_icons as $filters_icons) {
                $description = $filters_icons['icon_text'];
                $svg_icon = $filters_icons['real_icon'];
            ?>
                <div class="single_icon_box">
                    <a class="filter_link" href="#">
                        <?php
                        if ($svg_icon) {
                            echo file_get_contents($svg_icon);
                        }
                        ?>
                        <p class="icon_description"> <?php echo $description  ?> </p>
                    </a>
                </div>
            <?php  } ?>
        </div>
    <?php endif; ?>
</div>