<?php

/**
 * Template Name: Announcements
 */
?>

<?php get_header(); ?>

<section class="section">
    <div class="container">
        <h1 class="title">
            <?php the_title(); ?>
        </h1>

        <?php
        $paged = get_query_var('paged');

        $query = new WP_Query(array(
            'post_type' => 'project',
            'meta_query' => array(
                array(
                    'key' => 'date',
                    'value' => (int)date('Ymd'),
                    'compare' => '>'
                )
            ),
            'paged' => ($paged) ? $paged : 1
        ));
        ?>

        <?php if ($query->have_posts()) { ?>
            <div class="clearfix grid">
                <?php while ($query->have_posts()) {
                    $query->the_post(); ?>
                    <?php post(true); ?>
                <?php } ?>

                <?php pagination($query); ?>
            </div>
        <?php } else { ?>


            <div class="nothing-on-page">
                <?php if ($text = pllGetOption('no_announcements')) { ?>
                    <?php echo $text; ?>
                <?php } ?>
            </div>
        <?php } ?>

        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer();
