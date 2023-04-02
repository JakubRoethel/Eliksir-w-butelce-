<header class="header header_shop">
  <!-- <p><?php the_field('sale_banner', 'header_settings'); ?></p> -->
  <div class="container" style="background:  linear-gradient(rgba(0, 0, 0, 0.70), rgba(0, 0, 0, 0.70)), url('<?php the_field('shop_header_background', 'header_settings');?>') ">
    <div class="header_left">
      <div class="header_logo">
        <a href="<?php bloginfo('url'); ?>">
          <img src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>" class="u-img-responsive">
        </a>
      </div>
    </div>

    <div class="menu_container">
      <div class="header_navigation">
        <?php wp_nav_menu([
          'menu' => 'Main menu',
          'menu_id' => 'navigation-list',
          'menu_class' => 'navigation__list',
          'container' => 'nav',
          'container_id' => 'navigation',
          'container_class' => 'navigation',
          'theme_location' => 'main-menu',
        ]);?>
      </div>
    </div>

    <div class="header_right">
      <ul class="navigation_social">
        <li class="social_item">
          <a href="<?php the_field('facebook_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
            Facebook
          </a>
        </li>
        <li class="social_item">
          <a href="<?php the_field('instagram_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
            Instagram
          </a>
        </li>
        <li class="social_item">
          <a href="<?php the_field('youtube_link', 'header_settings'); ?>" target="_blank" rel="noopener norefferer">
            Youtube
          </a>
        </li>
      </ul>
      <div class="icon_box">
        <p>English</p>
        <div class= "icon_container">
        <a href="http://eliksir-w-butelce.local/my-account/">
          <i class="fa fa-user-circle-o" aria-hidden="true"></i>
        </a>
        <a href="http://eliksir-w-butelce.local/shop/">
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        </a>
          
        </div>
      </div>
      </div>
    </div>

    <div class="submenu_container">
      <div class="shop_navigation">
        <?php wp_nav_menu([
          'menu' => 'Submenu shop',
          'menu_id' => 'submenu-shop',
          'menu_class' => 'submenu-shop',
          'container' => 'nav',
          'container_id' => 'navigation',
          'container_class' => 'navigation',
          'theme_location' => 'main-menu',
        ]);?>
      </div>
    </div>
</div>

</header>