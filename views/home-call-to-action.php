<?php
        $call_to_action_list = get_field('call_to_action')['content'];
       
          if( $call_to_action_list): ?>
          <div class="call_to_action_container">
          <?php  foreach( $call_to_action_list as $call_to_action_list) { 
                         $img_url = $call_to_action_list['img'];
                         $title = $call_to_action_list['title'];
                         $description = $call_to_action_list['text'];
                         $text_on_hover = $call_to_action_list['text_on_hover'];
                         $link = $call_to_action_list['link'];
                    ?>
                        <a href="<?php echo $link ?>" class="single_call_to_action" style="background-image: url(<?php echo $img_url ?>)">
                            <div class="mask"></div>
                            <h2 class="title"> <?php echo $title  ?> </h2>
                            <p class="description">  <?php echo $description  ?> </p>
                            <p class="hover_text"> <?php echo $text_on_hover  ?> </p>
                        </a>
                      <?php  } ?>
          </div>
      <?php endif; ?> 

     