<section class="section ">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 grid__item animation" data-animation="fadeInLeft">
                <?php latestPosts('project'); ?>
            </div>

            <div class="col-xs-12 col-sm-4 grid__item animation" data-animation="fadeInUp">
                <?php latestPosts('media', 'items-list_has-border'); ?>
            </div>

            <div class="col-xs-12 col-sm-4 grid__item animation" data-animation="fadeInRight">
                <?php latestPosts('practice'); ?>
            </div>
        </div>
    </div>
</section>