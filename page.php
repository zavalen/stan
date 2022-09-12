<?php get_header(); ?>


<?php
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <?php if (has_post_thumbnail()) { ?>
            <div class="rounded-block-with-shadow single-post-image-wrap animation" data-animation="fadeIn">
                <?php the_post_thumbnail('large', array('class' => 'img-full-width')); ?>
            </div>
        <?php } ?>
        <div class="container">



            <div class="content-block">
                <div class="text-block">

                    <h1 class="title">
                        <?php the_title(); ?>
                    </h1>
                    <?php the_content(); ?>
                </div>
                <div class="sidebar-block">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php } ?>
        </div>
    <?php } else { ?>
        <div>Пока тут ничего нет :(</div>

    <?php } ?>

    <?php get_footer();
