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
                $context = stream_context_create([
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false
                    ]
                ]);
                $icon_link= $filters_icons['icon_link'];
            ?>
                <div class="single_icon_box <?php echo strtolower($description); ?>">
                    <a class="filter_link" href="<?php echo $icon_link  ?>">
                        <?php
                        if ($svg_icon) {

                            // $opts = array('https'=>array('header' => "User-Agent:MyAgent/1.0\r\n")); 
                            // //Basically adding headers to the request
                            // $context = stream_context_create($opts);
                            // echo file_get_contents($svg_icon,false,$context);

                            // $opts = array(
                            //     'http' => array(
                            //         'method' => 'GET',
                            //         'header' => "User-Agent: MyAgent/1.0\r\n"
                            //     )
                            // );
                            
                            // $context = stream_context_create($opts);
                            echo file_get_contents($svg_icon,false, $context);
                            
                        }
                        ?>
                        <p class="icon_description"> <?php echo $description  ?> </p>
                    </a>
                </div>
            <?php  } ?>
        </div>
    <?php endif; ?>
</div>