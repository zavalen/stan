<?php

/**
 * Includes
 */

require get_template_directory() . '/inc/theme-options.php';



/**
 * Theme setup
 */

function stan_setup()
{
    load_theme_textdomain('stan', get_template_directory_uri() . '/languages');

    register_nav_menus(array(
        'menu' => __('Menu', 'stan'),
        'about_us' => __('About us', 'stan')
    ));

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'gallery',
        'caption'
    ));
}
add_action('after_setup_theme', 'stan_setup');



/**
 * Register scripts
 */

function stan_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('style-min', get_template_directory_uri() . '/assets/css/style.min.css', array(), '1.0.0', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('main-script-min', get_template_directory_uri() . '/assets/js/script.min.js', array('jquery'), 1, true);
    wp_enqueue_script('masonry-script-min', get_template_directory_uri() . '/assets/js/masonry.min.js', array('jquery'), 1, true);

    // wp_enqueue_script('colorbox', get_template_directory_uri() . '/assets/js/jquery.colorbox-min.js', array('jquery'), 1, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), 1, true);
    // wp_enqueue_script('masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array('jquery'), 1, true);
    wp_enqueue_script('common-js', get_template_directory_uri() . '/assets/js/common.js', array('jquery'), 1, true);
    // wp_enqueue_script('massonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array(), 1, true);
    wp_localize_script('common-js', 'data', array(
        'ajaxUrl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'stan_scripts');



/**
 * Search filter
 */

add_filter('pre_get_posts', function ($query) {
    if ($query->is_search) {
        $query->set('post_type', array(
            'post',
            'project',
            'practice',
            'media'
        ));
    }

    return $query;
});



/**
 * Functions
 */

function homeUrl()
{
    echo esc_url(home_url('/'));
}

function themeUrl()
{
    echo esc_url(get_template_directory_uri() . '/');
}

function description($length, $content = false)
{
    echo mb_substr(strip_tags(strip_shortcodes(($content) ? $content : get_the_content())), 0, $length) . '...';
}

function getPageIdByPath($path)
{
    if ($post = get_page_by_path($path)) {
        return $post->ID;
    }

    return false;
}

function pllGetPageIdByPath($path, $language = false)
{
    if ($post_id = getPageIdByPath($path)) {
        return pll_get_post($post_id, ($language) ? $language : pll_current_language());
    }

    return false;
}

function pllGetOption($option)
{
    return get_option($option . '_' . pll_current_language());
}


// function wpa_front_page_projects($query)
// {
//     if ($query->is_front_page() && $query->is_main_query()) {
//         $query->set('post_type', array('project'));
//         $query->set('posts_per_page', 5);
//     }
// }
// add_action('pre_get_posts', 'wpa_front_page_projects');

function pllPostTypePageLink($post_type)
{
    $post_types_pages_slugs = array(
        'project' => 'proekty',
        'media' => 'media-posts',
        'practice' => 'praktyky'
    );

    if ($post_id = pllGetPageIdByPath($post_types_pages_slugs[$post_type])) {
        echo get_permalink($post_id);
    } else {
        echo '#';
    }
}

function pagination($query)
{
    $html = paginate_links(array(
        'total' => $query->max_num_pages,
        'current' => max(1, get_query_var('paged')),
        'prev_next' => false,
        'type' => 'list'
    ));

    if ($html) {
        echo '<div class="pagination">' . $html . '</div>';
    }
}

function languages($class = '')
{
    if ($languages = pll_the_languages(array('raw' => 1))) { ?>
        <ul class="languages <?php echo $class; ?>">
            <?php foreach ($languages as $language) { ?>
                <li class="languages__item <?php if ($language['current_lang']) { ?>languages__item_active<?php } ?>">
                    <a href="<?php echo $language['url']; ?>">
                        <img class="languages__item-image" src="<?php echo $language['flag']; ?>" alt="<?php echo $language['name']; ?>">
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php }
}

function post($full_width = false)
{
    $link = esc_url(get_permalink());
    ?>

    <div class="card">
        <a class="card__link" href="<?php echo $link; ?>">
        </a>
        <div class="card__image">
            <?php if (has_post_thumbnail()) { ?>
                <a href="<?php echo $link; ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'img-full-width')); ?>
                </a>
            <?php } ?>
        </div>

        <div class="card__header">
            <?php eventDate(); ?>
            <div class="card__date">
                <?php echo get_the_date(); ?>
            </div>

            <h2 class="card__heading">
                <?php the_title(); ?>

            </h2>




            <!-- <a class="more-link pull-right" href="<?php echo $link; ?>">
                    <?php _e('Read more', 'stan'); ?>

                    <i class="icon-newspaper"></i>
                </a> -->
        </div>
    </div>

<?php }



function eventDate()
{
    global $post;

    $date = get_post_meta($post->ID, 'date', true);

    if (!$date || (int)$date <= (int)date('Ymd')) {
        return;
    }
?>


    <div class="post-mark">
        <?php echo __('Soon', 'stan') . ' ' . date(get_option('date_format'), strtotime($date)); ?>
    </div>
    <?php }

function postSlider($post_type)
{
    $query = new WP_Query(array(
        'post_type' => $post_type,
        'meta_query' => array(
            array(
                'key' => 'add_to_slider',
                'value' => 1
            )
        ),
        'posts_per_page' => 5
    ));

    if ($query->have_posts()) { ?>
        <?php
        $post_type_object = get_post_type_object($post_type);
        $post_type_label = $post_type_object->label;
        ?>

        <div class="slider post-slider">
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <?php $link = esc_url(get_permalink()); ?>

                <div class="post-slider__item">
                    <div class="clearfix grid">
                        <div class="col-xs-12 col-sm-6 grid__item post-slider__item-left">
                            <a class="rounded-block-with-shadow" href="<?php echo $link; ?>">
                                <?php the_post_thumbnail('large', array('class' => 'img-full-width')); ?>
                            </a>
                        </div>

                        <div class="col-xs-12 col-sm-6 grid__item post-slider__item-right">
                            <a class="post-type-link post-type-link_post-type_<?php echo $post_type; ?>" href="<?php pllPostTypePageLink($post_type); ?>">
                                <?php echo $post_type_label; ?>
                            </a>

                            <div class="post-date pull-right">
                                <?php echo get_the_date(); ?>
                            </div>

                            <?php eventDate(); ?>

                            <h3 class="title">
                                <a class="title__link" href="<?php echo $link; ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <!-- <div class="text-block post-slider__item-text-block">
                                <?php description(820); ?>
                            </div> -->

                            <a class="more-link pull-right" href="<?php echo $link; ?>">
                                <?php _e('Read more', 'stan'); ?>

                                <i class="icon-newspaper"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php }

    wp_reset_postdata();
}

function my_pagination_rewrite()
{
    $categories = '(' . implode('|', array_map(function ($category) {
        return $category->slug;
    }, get_categories())) . ')';
    add_rewrite_rule($categories . '/page/?([0-9]{1,})/?$', 'index.php?category_name=$matches[1]&paged=$matches[2]', 'top');
}
add_action('init', 'my_pagination_rewrite');

function latestPosts($post_type, $list_class = '')
{
    $query = new WP_Query(array(
        'post_type' => $post_type,
        'posts_per_page' => 8
    ));

    if ($query->have_posts()) { ?>
        <?php
        $post_type_object = get_post_type_object($post_type);
        $post_type_label = $post_type_object->label;
        ?>

        <div class="text-center">
            <a class="post-type-link post-type-link_post-type_<?php echo $post_type; ?>" href="<?php pllPostTypePageLink($post_type); ?>">
                <?php echo $post_type_label; ?>
            </a>
        </div>

        <br>

        <ul class="items-list <?php echo $list_class; ?>">
            <?php while ($query->have_posts()) {
                $query->the_post(); ?>
                <li class="items-list__item items-list__item_has-date">
                    <div class="post-date items-list__item-date">
                        <?php echo get_the_date(); ?>
                    </div>

                    <h3 class="items-list__item-title">
                        <a class="items-list__item-title-link" href="<?php echo esc_url(get_permalink()); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                </li>
            <?php } ?>
        </ul>

        <br>

        <div class="text-center">
            <a class="post-type-link post-type-link_post-type_<?php echo $post_type; ?> text-bold text-transform-none" href="<?php pllPostTypePageLink($post_type); ?>">
                <?php _e('read all', 'stan'); ?>
            </a>
        </div>
<?php }

    wp_reset_postdata();
}
