<header class="header">
  <!-- <p><?php the_field('sale_banner', 'header_settings'); ?></p> -->
  <div class="container">
    <div class="header_left">
      <div class="header_logo">
        <a href="<?php bloginfo('url'); ?>">
          <img src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0]); ?>" class="u-img-responsive">
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
        ]); ?>
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
        <div class="icon_container">
          <a href="http://eliksir-w-butelce.local/my-account/">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
          </a>
          <div class="cart-icon-container">
            <a class="cart-icon" href="<?php echo wc_get_cart_url(); ?>">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <div class="mini-cart-container">
              <div class="mini-cart-header">
                <h2 class="mini-cart-title"><?php echo __('Twój koszyk') ?></h2>
                <div class="close-icon">
                <?php echo @file_get_contents(get_stylesheet_directory_uri() . '/assets/img/close.svg)') ?>
                
                </div>
              </div>
              <?php woocommerce_mini_cart(); ?>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

  </div>
</header>