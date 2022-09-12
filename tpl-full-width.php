<?php

/**
 * Template Name: full-width
 * Template Post Type: post, page, media
 */

define('POST_TYPE', 'full-width');
?>


<?php get_header(); ?>

<section class="section">


    <?php the_content(); ?>
</section>

<?php get_footer();
