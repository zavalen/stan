<?php get_header(); ?>

<section class="section">
    <div class="container">
        <!-- <div class="row grid"> -->
        <?php
        if (!defined('POST_TYPE')) {
            $current_category = get_queried_object();

            $description = get_page_by_title($current_category->name);
        }
        ?>

        <?php if (!defined('POST_TYPE') && $description && has_post_thumbnail($description->ID)) { ?>
            <div class="col-xs-12 grid__item category-image-wrap">
                <div class="rounded-block-with-shadow animation" data-animation="fadeIn">
                    <?php echo get_the_post_thumbnail($description->ID, 'large', array('class' => 'img-full-width')); ?>
                </div>
            </div>
        <?php } ?>

        <!-- <div class="col-xs-12 col-sm-4 col-md-3 grid__item"> -->
        <?php get_sidebar(); ?>
        <!-- </div> -->

        <div class="card-container">
            <div class="grid-sizer"></div>
            <?php if (!defined('POST_TYPE') && $description) { ?>
                <div class="grid__item">
                    <div class=" category-description animation">
                        <h2 class="title">
                            <?php echo $description->post_title; ?>
                        </h2>

                        <!-- <div class="text-block">

                        </div> -->

                        <!-- <a class="more-link pull-right" href="<?php echo esc_url(get_permalink($description->ID)); ?>">
                            <?php _e('More', 'stan'); ?>
                        </a> -->
                    </div>
                </div>
            <?php } ?>

            <?php
            if (!defined('POST_TYPE')) {
                global $wp_query;

                $query = $wp_query;
            } else {
                $paged = get_query_var('paged');

                $query = new WP_Query(array(
                    'post_type' => POST_TYPE,
                    // 'paged' => ($paged) ? $paged : 1
                ));
            }
            ?>


            <?php
            // var_dump($args);
            ?>


            <?php wp_reset_postdata(); ?>
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) {
                    $query->the_post();  ?>
                    <?php post(); ?>
                <?php } ?>


            <?php else : ?>
                <div>:(</div>
            <?php endif; ?>
        </div>
        <?php pagination($query); ?>




        <!-- </div> -->
    </div>
</section>

<?php get_footer();
