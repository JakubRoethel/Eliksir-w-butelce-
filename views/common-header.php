<header class="header">
  <p><?php the_field('sale_banner', 'header_settings'); ?></p>
  <div class="container">
    <div class="header__left" data-aos="fade-in" data-aos-delay="200" data-aos-easing="ease-in-out">
      <div class="header__logo">
        <a href="<?php bloginfo('url'); ?>">
          <img src="<?php echo esc_url( wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0] ); ?>" class="u-img-responsive">
        </a>
      </div>
    </div>
    <div class="header__right" data-aos="fade-in" data-aos-delay="200" data-aos-easing="ease-in-out">
      <button type="button" class="header__toggle">
        <div class="header__toggle__item"></div>
        <div class="header__toggle__item"></div>
        <div class="header__toggle__item"></div>
      </button>
    </div>

    <nav class="header__navigation">
      <div class="navigation__overlay"></div>
      <?php wp_nav_menu([
        'menu' => 'Main menu',
        'menu_id' => 'navigation-list',
        'menu_class' => 'navigation__list',
        'container' => 'nav',
        'container_id' => 'navigation',
        'container_class' => 'navigation',
        'theme_location' => 'main-menu',
      ]);?>
    </nav>
  </div>
</header>
