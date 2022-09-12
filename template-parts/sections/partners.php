<?php if (($post_id = getPageIdByPath('partners')) && ($gallery = get_post_gallery($post_id, false))) { ?>
    <section class="section">
        <div class="container">
            <h2 class="title title_size_small">
                <?php _e('Partners and friends:', 'stan'); ?>
            </h2>

            <div class="slider partners animation" data-animation="fadeIn">
                <?php $gallery_ids = explode(',', $gallery['ids']); ?>

                <?php foreach ($gallery_ids as $id) { ?>
                    <div class="partners__item">
                        <?php $image = get_post($id); ?>

                        <?php if ($image->post_excerpt) { ?>
                            <a href="<?php echo $image->post_excerpt; ?>" target="_blank">
                        <?php } ?>

                        <?php echo wp_get_attachment_image($id, 'medium', false, array('class' => 'partners__item-image')); ?>

                        <?php if ($image->post_excerpt) { ?>
                            </a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }