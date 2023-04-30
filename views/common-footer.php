<footer class="footer">
  <div class="container">
    <div class="left_footer_blocks">
      <div class="footer_navigation">
        <?php wp_nav_menu([
          'menu' => 'Menu footer left',
          'menu_id' => 'navigation-list',
          'menu_class' => 'navigation_list_footer',
          'container' => 'nav',
          'container_id' => 'navigation',
          'container_class' => 'navigation',
          'theme_location' => 'main-menu',
        ]); ?>
      </div>
      <ul class="navigation_social">
        <li class="social_item">
          <a href="<?php the_field('facebook_link', 'footer_settings'); ?>" target="_blank" rel="noopener norefferer">
            <i class="fa-brands fa-facebook"></i>
          </a>
        </li>
        <li class="social_item">
          <a href="<?php the_field('instagram_link', 'footer_settings'); ?>" target="_blank" rel="noopener norefferer">
            <i class="fa-brands fa-instagram"></i>
          </a>
        </li>
        <li class="social_item">
          <a href="<?php the_field('youtube_link', 'footer_settings'); ?>" target="_blank" rel="noopener norefferer">
            <i class="fa-brands fa-youtube"></i>
          </a>
        </li>
      </ul>
      <p class="logo">© 2023 ELIXIR W BUTELCE</p>
    </div>

    <div class="right_footer_blocks">
      <div class="subscribe_form_container">
        <h2><?php echo __('Zapisz się do newslettera.'); ?></h2>
        <p><?php echo __('Sed sapien metus, commodo non lectus eget, auctor vestibulum sapien. Nam vel efficitur nisi. Duis tempus tempus odio.'); ?></p>
        <?php echo do_shortcode('[mc4wp_form id=312]'); ?>
      </div>

      <div class="footer_navigation_2">
        <?php wp_nav_menu([
          'menu' => 'Menu footer right',
          'menu_id' => 'navigation-list',
          'menu_class' => 'navigation_list_footer',
          'container' => 'nav',
          'container_id' => 'navigation',
          'container_class' => 'navigation',
          'theme_location' => 'main-menu',
        ]); ?>
      </div>
    </div>
</footer>