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
    <div class="menu_container_mobile">
      <div class="header_navigation_mobile">
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
      <?php wp_nav_menu([
        'menu' => 'Menu footer left',
        'menu_id' => 'navigation-list',
        'menu_class' => 'navigation_list_footer',
        'container' => 'nav',
        'container_id' => 'navigation',
        'container_class' => 'navigation',
        'theme_location' => 'main-menu',
      ]); ?>

      <div class="mobile_menu_footer">
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
        <p class="translation_dropdown">English</p>
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
        <p class="translation_dropdown">English</p>
        <div class="icon_container">
          <div class="cart-icon-container">
            <a class="cart-icon" href="<?php echo wc_get_cart_url(); ?>">
              <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count() ?></span>
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <div class="mini-cart-container">
              <div class="mini-cart-header">
                <h2 class="mini-cart-title"><?php echo __('Twój koszyk') ?></h2>
                <div class="close-icon">
                </div>
              </div>
              <div class="widget_shopping_cart_content">
                <?php woocommerce_mini_cart(); ?>
              </div>
            </div>
          </div>
          <button type="button" class="header__toggle">
            <div class="header__toggle__item"></div>
            <div class="header__toggle__item"></div>
            <div class="header__toggle__item"></div>
          </button>
        </div>
      </div>
    </div>
  </div>

  </div>

</header>