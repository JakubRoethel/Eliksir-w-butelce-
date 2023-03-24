<?php
        $call_to_action_list = get_field('call_to_action')['content'];
          if( $call_to_action_list): ?>
          <div class="call_to_action_container">
          <?php  foreach( $call_to_action_list as $call_to_action_list) { 
                         $img = $call_to_action_list['img'];
                         $title = $call_to_action_list['title'];
                         $description = $call_to_action_list['text'];
                    ?>
                        <div class="single_call_to_action">
                            <div class="mask"></div>
                            <?php echo wp_get_attachment_image( $img, 'full' ); ?>
                            <h2 class="title"> <?php echo $title  ?> </h2>
                            <p class="description">  <?php echo $description  ?> </p>
                        </div>
                      <?php  } ?>
          </div>
      <?php endif; ?> 