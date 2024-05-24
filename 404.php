<?php get_header("shop"); ?>
<section class="not-found">
    <article id="post-0" class="post not-found ">
        <header class="header-404">
            <h1 class="entry-title" itemprop="name"><?php esc_html_e('Nie znaleziono strony', 'blankslate-child'); ?></h1>
        </header>
        <div class="entry-content" itemprop="mainContentOfPage">
            <div class="text-wrapper">
                <p><?php esc_html_e('Niestety nie znaleźliśmy Twojej strony. Zamiast tego spróbuj użyć wyszukiwarki.', 'blankslate-child'); ?></p>
                <?php get_search_form(); ?>
            </div>


        </div>
    </article>
</section>

<?php get_footer(); ?>