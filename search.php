<?php get_header(); ?>

<section class="section">
    <div class="container">
        <h1 class="title">
            <?php
            if (have_posts()) {
                printf(__('Search results for: %s', 'stan'), get_search_query());
            } else {
                _e('Nothing found', 'stan');
            }
            ?>
        </h1>

        <?php if (have_posts()) { ?>
            <div class="clearfix grid">
                <?php while (have_posts()) { the_post(); ?>
                    <?php post(true); ?>
                <?php } ?>

                <?php
                global $wp_query;

                pagination($wp_query);
                ?>
            </div>
        <?php } ?>
    </div>
</section>

<?php get_footer();