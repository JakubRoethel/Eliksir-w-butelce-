<header class="home__splash" style="background-image: url(<?php echo get_template_directory_uri(); ?>/src/img/home-spash-bg.png)">
  <div class="home__splash__image">
    <?php
      $home_hero_section = get_field('hero_section');
      $home_hero_description = $home_hero_section['hero_description'];
      $home_hero_image = $home_hero_section['hero_image'];
    ?>
    <h2 class="hero__description"><?php echo $home_hero_description ?></h2>
    <?php echo wp_get_attachment_image( $home_hero_image, 'full' ); ?>
  <div class="wrapper">
    <h1 class="header__title" data-aos="fade-right" data-aos-delay="300" data-aos-easing="ease-in-out"><?php the_field('splash_title'); ?></h1>
    <p class="header__copy" data-aos="fade-left" data-aos-delay="300"  data-aos-easing="ease-in-out"><?php the_field('splash_copy'); ?></p>
    <a href="#" class="header__arrow js-scroll-to">
      <img data-aos="fade-in" data-aos-easing="ease-in-out" src="<?php echo get_template_directory_uri(); ?>/dist/img/home-scroll-down.png" alt="" class="u-img-responsive">
    </a>
  </div>
</header> 