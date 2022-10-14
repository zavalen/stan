<div class="main-block">
    <div class="container main-wrapper">
        <div class="main-content">
            <h2 class="main-title"><?php if ($text = pllGetOption('organization_name')) { ?>
                    <?php echo $text; ?>
                <?php } ?></h2>
            <img class="main-img" src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/Saly-1.png" alt="">
            <div class="main-tablet">
                <p class="tablet-content"><?php if ($text = pllGetOption('organization_short_description')) { ?>
                        <?php echo $text; ?>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="second-block">
    <div class="container second-wrapper">
        <div class="second-content">
            <h2><?php if ($text = pllGetOption('organization_name')) { ?>
                    <?php echo $text; ?>
                <?php } ?></h2>
            <p><?php if ($text = pllGetOption('organization_full_description')) { ?>
                    <?php echo $text; ?>
                <?php } ?></p>
            <a class="second-btn" href="<?php echo site_url() ?>/pro-nas/"><?php if ($text = pllGetOption('about_us')) { ?>
                    <?php echo $text; ?>
                <?php } ?></a>
        </div>

        <div class="image-side">
            <div class="dog-img">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/dog.png" alt="">
            </div>
            <div class="rocket-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/rocket.png" alt=""></div>
            <div class="man-img">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/man.png" alt="">
            </div>
        </div>
    </div>
</div>
<div class="project-block">
    <h2 class="project-title"><?php if ($text = pllGetOption('project_title')) { ?>
                    <?php echo $text; ?>
                <?php } ?></h2>
    <div class="container " id="project_wrapper">
        <?php
        $args = array('numberposts' => 3, 'order' => 'DESC', 'post_status' => 'publish');
        $postslist = get_posts($args);
        foreach ($postslist as $post) :  setup_postdata($post); ?>

            <div class="project">
                <a href="<?php the_permalink(); ?>" class="project-link"></a>
                <div  class="project-card">
                    <div class="left-project">
                        <?php if (has_post_thumbnail()) :
                        
                            the_post_thumbnail('medium');
                         
                            
                        else :
                            echo '<img src="https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc=" />';
                        endif;
                        ?>



                    </div>
                    <div class="right-project">
                        <div class="project-container">
                            
                            <?php the_category(); ?>
                            <p><?php the_date(); ?></p>
                            
                        </div>
                        <div class="project-content">
                            
                            <p class="project-text"><?php the_title(); ?> </p>
                            <a class="project-btn" href="<?php the_permalink(); ?>"><?php if ($text = pllGetOption('read_more')) { ?>
                                    <?php echo $text; ?>
                                <?php } ?></a>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php endforeach; ?>

    </div>
</div>
<div class="our__work ">
    <div class="container">
        <div class="work-top">
            <h2 class="work-title"><?php if ($text = pllGetOption('our_work_title')) { ?>
                    <?php echo $text; ?>
                <?php } ?></h2>
        </div>
        <div class="work-bottom">
            <div class="work-content">
                <div class="work-content-first work-content-block">
                    <div class="work-content-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/our__block/earth.png" alt=""></div>
                    <p>12</p>
                    <div class="work-content-text">
                        <p> <?php if ($text = pllGetOption('our_work_card_text_first')) { ?>
                                <?php echo $text; ?>
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <div class="work-content-second work-content-block">
                    <div class="work-content-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/our__block/note.png" alt=""></div>
                    <p>7</p>
                    <div class="work-content-text">
                        <p> <?php if ($text = pllGetOption('our_work_card_text_second')) { ?>
                                <?php echo $text; ?>
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <div class="work-content-third work-content-block">
                    <div class="work-content-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/our__block/glass.png" alt=""></div>
                    <p>27</p>
                    <div class="work-content-text">
                        <p><?php if ($text = pllGetOption('our_work_card_text_third')) { ?>
                                <?php echo $text; ?>
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <div class="work-content-fourth work-content-block">
                    <div class="work-content-img"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/our__block/travel.png" alt=""></div>
                    <p>86</p>
                    <div class="work-content-text">
                        <p><?php if ($text = pllGetOption('our_work_card_text_fourth')) { ?>
                                <?php echo $text; ?>
                            <?php } ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="can__learn">
    <div class="container">
        <div class="learn-title">
            <h2><?php if ($text = pllGetOption('can_learn_title')) { ?>
                    <?php echo $text; ?>
                <?php } ?></h2>
        </div>
        <div class="learn-wrapper">
            <div class="learn-content">
                <div class="content-discipline"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/can__learn/bike.png" alt="">
                    <p><?php if ($text = pllGetOption('can_learn_text_first')) { ?>
                            <?php echo $text; ?>
                        <?php } ?></p>
                </div>
            </div>
            <div class="learn-content">
                <div class="content-discipline"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/can__learn/finger.png" alt="">
                    <p><?php if ($text = pllGetOption('can_learn_text_second')) { ?>
                            <?php echo $text; ?>
                        <?php } ?></p>
                </div>
            </div>
            <div class="learn-content">
                <div class="content-discipline"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/can__learn/dad.png" alt="">
                    <p><?php if ($text = pllGetOption('can_learn_text_third')) { ?>
                            <?php echo $text; ?>
                        <?php } ?></p>
                </div>
            </div>


            <div class="learn-content">
                <div class="content-discipline"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/can__learn/girl.png" alt="">
                    <p><?php if ($text = pllGetOption('can_learn_text_fourth')) { ?>
                            <?php echo $text; ?>
                        <?php } ?></p>
                </div>
            </div>
            <div class="learn-content">
                <div class="content-discipline"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/can__learn/schoolboy.png" alt="">
                    <p><?php if ($text = pllGetOption('can_learn_text_fifth')) { ?>
                            <?php echo $text; ?>
                        <?php } ?></p>
                </div>
            </div>
            <div class="learn-content">
                <div class="content-discipline"><img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/can__learn/phone.png" alt="">
                    <p><?php if ($text = pllGetOption('can_learn_text_sixth')) { ?>
                            <?php echo $text; ?>
                        <?php } ?></p>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="our__partners">
    <div class="partners container">
        <div class="partners-title">
            <h2><?php if ($text = pllGetOption('supported')) { ?>
                    <?php echo $text; ?>
                <?php } ?></h2>
        </div>
        <div class="partners-img">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/partners/1.png" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/partners/2.png" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/partners/3.png" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/partners/4.png" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/partners/5.png" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/partners/6.png" alt="">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/mainpage/partners/7.png" alt="">

        </div>
    </div>
</div>
<!-- <div class="footer">
        <div class="footer-wrapper container">
            <div class="footer-contacts">Контакт
                <p class="contacts-address">вул. Ленкавського 4а, офіс 41 Івано-Франківськ<br /> тел 095 349 5325</p>
            </div>
            <div class="footer-map">Ми на карті
                <div class="map"><iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1310.766412747184!2d24.69369373028415!3d48.92429240922687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4730c119e7743247%3A0xbeebe99b79c26eb6!2z0YPQuy4g0JvQtdC90LrQsNCy0YHQutC-0LPQviwgNNCwLCDQmNCy0LDQvdC-LdCk0YDQsNC90LrQvtCy0YHQuiwg0JjQstCw0L3Qvi3QpNGA0LDQvdC60L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQo9C60YDQsNC40L3QsCwgNzYwMDA!5e0!3m2!1sru!2sby!4v1643974802868!5m2!1sru!2sby"
                        width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
            </div>
            <div class="footer-navigation">Карта сайту
                <ul class="navigation-list">
                    <li><a href="">Анонси</a></li>
                    <li><a href="">Проекти</a></li>
                    <li><a href="">Практики</a></li>
                    <li><a href="">Медіа</a></li>
                    <li><a href="">Про нас</a></li>
                </ul>
            </div>
        </div>
    </div> -->














<!-- <section class="section front-page-top-section color-change-4x">
    <div class="container">

        <div class="front-page-top-section__sitename"><?php if ($text = pllGetOption('organization_name')) { ?>
            <?php echo $text; ?>
            <?php } ?></div>
        <div class="front-page-top-section__type">
            <?php if ($text = pllGetOption('organization_descr')) { ?>
                <?php echo $text; ?>
            <?php } ?></div>
        <div class="front-page-top-section__description">
        </div>

    </div>

</section>

<section class="second-main-section">
    <div class="container second-main-section__container">

        <div class="descr_images">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/left.png" alt="">
        </div>

        <div class="container">
            <div class="second-main-section__text">
                яка методами неформальної освіти підсилює низові ініціативи та активних громадян, зокрема, з вразливих та маргіналізованих груп

                <a href="<?php echo site_url() ?>/pro-nas/">Докладніше</a>
            </div>

            <img src="<?php echo get_template_directory_uri() ?>/assets/images/cartoon.png" alt="">
        </div>
        <div class="descr_images">
            <img src="<?php echo get_template_directory_uri() ?>/assets/images/right.png" alt="">
        </div>
    </div>

</section> -->
<!-- <section class="third-main-section">
    <div class="container">

    </div>
     <div class="container front-page-top-section__container">
        <div class=" front-page-top-section__img">
            <img src="http://new.stan.org.ua/wp-content/uploads/2020/09/DSC_2048.jpg" alt="">
        </div>
        <div class=" front-page-top-section__img">
            <img src="http://new.stan.org.ua/wp-content/uploads/2017/09/7-1.jpg" alt="">
        </div>
        <div class=" front-page-top-section__img">
            <img src="http://new.stan.org.ua/wp-content/uploads/2020/09/DSC_2131.jpg" alt="">
        </div>
        <div class=" front-page-top-section__img">
            <img src="http://new.stan.org.ua/wp-content/uploads/2017/11/1-2.jpg" alt="">
        </div>
        <div class=" front-page-top-section__img">
            <img src="http://new.stan.org.ua/wp-content/uploads/2020/07/DSC_0359.jpg" alt="">
        </div>
        <div class=" front-page-top-section__img">
            <img src="http://new.stan.org.ua/wp-content/uploads/2020/10/20507333_1425038337575389_6094920454472626800_o.jpg" alt="">
        </div>

    </div> 
</section> -->