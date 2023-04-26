<?php

$title = get_field('eventy-horeca')['title'];
$subtitle_list_one= get_field('eventy-horeca')['subtitle_list_one'];
$items_list_one = get_field('eventy-horeca')['list_one'];
$items_list_two = get_field('eventy-horeca')['list_two'];
$subtitle_list_three= get_field('eventy-horeca')['subtitle_list_three'];
$items_list_three = get_field('eventy-horeca')['list_three'];
$movie_url = get_field('eventy-horeca')['link_do_filmu'];
?>

<div class="eventy-horeca_section">
    <h2 class="title"> <?php echo $title ?> </h2>
    <div class="list-wrapper">    
        <?php if ($items_list_one) : ?>
                <ul class="items_list list_one">
                <p class="subtitle"> <?php echo $subtitle_list_one ?> </p>
                <?php foreach ($items_list_one as $list_item) {
                            $single_item = $list_item['list_item'];
                        ?>
                            <li class="single_item">
                                <?php echo $single_item ?>
                            </li>

                        <?php  } ?>
                </ul>
        <?php endif; ?>
        <?php if ($items_list_two) : ?>
                <ul class="items_list list_two">
                <?php foreach ($items_list_two as $list_item) {
                            $single_item = $list_item['list_item'];
                        ?>
                            <li class="single_item">
                                <?php echo $single_item ?>
                            </li>

                        <?php  } ?>
                </ul>
        <?php endif; ?>
        <?php if ($items_list_three) : ?>
                <ul class="items_list list_three">
                <p class="subtitle"> <?php echo $subtitle_list_three ?> </p>
                <?php foreach ($items_list_three as $list_item) {
                            $single_item = $list_item['list_item'];
                        ?>
                            <li class="single_item">
                                <?php echo $single_item ?>
                            </li>

                        <?php  } ?>
                </ul>
        <?php endif; ?>
        
    </div>
    <?php if ($movie_url) : ?>
        <div class="movie_container">
            <iframe width="100%" height="770px" src="<?php echo $movie_url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
            </iframe>
        </div>
    <?php endif; ?>
</div>    
