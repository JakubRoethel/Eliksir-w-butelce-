<?php
/*
Template Name: Legal Pages Template
*/

get_header('shop');
if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="legal" id="post-<?php the_ID(); ?>">
            <div class="breadcrumbs">
                <?php
                // $args = array(
                //     'delimiter' => '/',
                // );
                woocommerce_breadcrumb();

                ?>
            </div>
            <div class="legal-template section">
                <div class="entry-content" itemprop="mainContentOfPage">
                    <div class="content">
                        <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </article>

<?php endwhile;
endif;
get_footer();