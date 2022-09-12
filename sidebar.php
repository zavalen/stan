<?php if (!$wp_query->is_posts_page && !is_category()) { ?>
    <?php
    $categories = get_categories(array(
        'taxonomy' => (!defined('POST_TYPE')) ? get_query_var('taxonomy') : POST_TYPE . '_category',
        'hide_empty' => false
    ));
    ?>

    <?php if ($categories) { ?>
        <?php
        if (!defined('POST_TYPE')) {
            global $current_category;
        }
        ?>

        <ul class="items-list categories-list">
            <?php foreach ($categories as $category) { ?>
                <li class="items-list__item <?php if (!defined('POST_TYPE') && $category->term_id == $current_category->term_id) { ?>items-list__item_active<?php } ?>">
                    <h3 class="items-list__item-title">
                        <a class="items-list__item-title-link" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                            <?php echo $category->name; ?>
                        </a>
                    </h3>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>
<?php } else { ?>
    <?php
    $menu = wp_nav_menu(array(
        'theme_location' => 'about_us',
        'container' => false,
        'menu_class' => 'items-list categories-list',
        'before' => '<h3 class="items-list__item-title">',
        'after' => '</h3>',
        'echo' => false
    ));

    /*$menu = str_replace('menu-item ', 'items-list__item menu-item ', $menu);
    $menu = str_replace('current-menu-item ', 'items-list__item_active current-menu-item ', $menu);
    $menu = str_replace('<a', '<a class="items-list__item-title-link"', $menu);*/

    echo $menu;
    ?>
<?php }