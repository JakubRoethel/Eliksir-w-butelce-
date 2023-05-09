<?php
/*
Template Name: Custom Page Template
*/

get_header('shop');
if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="breadcrumbs">
                <?php
                // $args = array(
                //     'delimiter' => '/',
                // );
                woocommerce_breadcrumb();

                ?>
            </div>
            <div class="custom-page-template section">
                <div class="entry-content" itemprop="mainContentOfPage">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('full', array('itemprop' => 'image'));
                    } ?>

                    <div class="sidebar">
                        <div class="menu_container">

                            <?php wp_nav_menu([
                                'menu' => 'Custom template menu',
                                'menu_id' => 'navigation-list',
                                'menu_class' => 'navigation__list',
                                'container' => 'nav',
                                'container_id' => 'navigation',
                                'container_class' => 'navigation',
                                'theme_location' => 'main-menu',
                            ]); ?>

                        </div>
                    </div>
                    <div class="content">
                        <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
                        <?php the_content(); ?>

                        <?php
                        $faqs_list = get_field('faqs_list');
                        if ($faqs_list) : ?>
                            <div class="faq_list">
                                <?php foreach ($faqs_list as $faq) {
                                    $title = $faq['title'];
                                    $description = $faq['description'];
                                    $icon_url = get_stylesheet_directory_uri() . '/assets/img/+.svg';
                                    $context = stream_context_create([
                                        'ssl' => [
                                            'verify_peer' => false,
                                            'verify_peer_name' => false
                                        ]
                                    ]);
                                    ?>
                                    <div class="wrapper">
                                        <div class="title-icon-container">
                                            <p class="title"><?php echo $title; ?></p>
                                           <?php  echo file_get_contents($icon_url, false, $context); ?>
                                            
                                        </div>
                                        
                                        <p class="description"><?php echo $description; ?></p>
                                    </div>


                                <?php   } ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="entry-links"><?php wp_link_pages(); ?></div>
            </div>
        </article>
        <?php if (comments_open() && !post_password_required()) {
            comments_template('', true);
        } ?>
<?php endwhile;
endif;


get_footer();
