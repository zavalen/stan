<?php get_header(); ?>


<?php
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <?php if (has_post_thumbnail()) { ?>
            <div class="single-post-image-wrap animation" data-animation="fadeIn">
                <?php the_post_thumbnail('large', array('class' => 'img-full-width')); ?>
            </div>
        <?php } ?>
        <div class="container">

            <div class="position-relative title__single" <?php
                                                            if (empty(get_the_post_thumbnail())) echo 'style="margin-top:30px;"'

                                                            ?>>
                <div class="post-date">
                    <?php echo get_the_date(); ?>
                </div>
                <h1 class="title  title__mb0">
                    <?php the_title(); ?>
                </h1>


            </div>

            <div class="content-block">
                <div class="text-block">


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
