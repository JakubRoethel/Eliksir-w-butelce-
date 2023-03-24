<?php
$filter_title = get_field('filter_section')['title']; 
?>

<div class="filter_section">
    <div class="text_container"> 
        <h2 class="title"><?php echo $filter_title?></h2>
    </div>
    <?php
        $filters_icons = get_field('filter_section')['icon_box'];
          if( $filters_icons ): ?>
          <div class="filter_container">
          <?php  foreach( $filters_icons as $filters_icons) { 
                         $icon = $filters_icons['icon'];
                         $description = $filters_icons['icon_text'];
                    ?>
                        <div class="single_icon_box">
                            <a class="filter_link" href="#">
                                <?php echo wp_get_attachment_image( $icon, 'full' ); ?>
                                <p class="icon_description">  <?php echo $description  ?> </p>
                            </a>
                        </div>
                      <?php  } ?>
          </div>
      <?php endif; ?> 
</div>