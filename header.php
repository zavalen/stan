<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '579741162668139');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=579741162668139&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

</head>

<body <?php body_class(); ?>>
    <div class="wrap">
        <header class="header slideInDown">
            <div class="container position-relative header__container">
                <div class="adress">
                    <?php if ($text = pllGetOption('headbar_text')) { ?>
                        <?php echo $text; ?>
                    <?php } ?>
                </div>
                <?php languages('header__languages'); ?>


            </div>
        </header>

        <div class="navbar-place slideInDown">
            <div class="navbar-wrap">
                <div class="container navbar-wrap__container">
                    <div class="logo-menu-container">
                        <div class="header__logo">
                            <a class="header__logo-link" <?php if (is_front_page()) {
                                                                echo 'style="background:#fff;"';
                                                            } ?> href="<?php homeUrl(); ?>">
                                <img class="header__logo-image" src="<?php themeUrl(); ?>assets/images/logo.png" alt="<?php bloginfo('name'); ?>">


                            </a>
                        </div>
                        <div class="navbar-toggle pull-left">
                            <span class="navbar-toggle__line"></span>
                            <span class="navbar-toggle__line"></span>
                            <span class="navbar-toggle__line"></span>
                        </div>

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu',
                            'container' => 'nav',
                            'container_class' => 'navbar pull-left'
                        ));
                        ?>
                    </div>
                    <div class="header-right">

                        <div class="social">


                            <a href="https://www.instagram.com/stan.org.ua/" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 56.7 56.7" enable-background="new 0 0 56.7 56.7" xml:space="preserve">
                                    <g>
                                        <path d="M28.2,16.7c-7,0-12.8,5.7-12.8,12.8s5.7,12.8,12.8,12.8S41,36.5,41,29.5S35.2,16.7,28.2,16.7z M28.2,37.7   c-4.5,0-8.2-3.7-8.2-8.2s3.7-8.2,8.2-8.2s8.2,3.7,8.2,8.2S32.7,37.7,28.2,37.7z" />
                                        <circle cx="41.5" cy="16.4" r="2.9" />
                                        <path d="M49,8.9c-2.6-2.7-6.3-4.1-10.5-4.1H17.9c-8.7,0-14.5,5.8-14.5,14.5v20.5c0,4.3,1.4,8,4.2,10.7c2.7,2.6,6.3,3.9,10.4,3.9   h20.4c4.3,0,7.9-1.4,10.5-3.9c2.7-2.6,4.1-6.3,4.1-10.6V19.3C53,15.1,51.6,11.5,49,8.9z M48.6,39.9c0,3.1-1.1,5.6-2.9,7.3   s-4.3,2.6-7.3,2.6H18c-3,0-5.5-0.9-7.3-2.6C8.9,45.4,8,42.9,8,39.8V19.3c0-3,0.9-5.5,2.7-7.3c1.7-1.7,4.3-2.6,7.3-2.6h20.6   c3,0,5.5,0.9,7.3,2.7c1.7,1.8,2.7,4.3,2.7,7.2V39.9L48.6,39.9z" />
                                    </g>
                                </svg>
                            </a>
                            <a href="https://t.me/stanartgroup" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="512px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve">
                                    <g id="comp_x5F_335-telegram">
                                        <g>
                                            <path d="M484.689,98.231l-69.417,327.37c-5.237,23.105-18.895,28.854-38.304,17.972L271.2,365.631l-51.034,49.086    c-5.647,5.647-10.372,10.372-21.256,10.372l7.598-107.722L402.539,140.23c8.523-7.598-1.848-11.809-13.247-4.21L146.95,288.614    L42.619,255.96c-22.694-7.086-23.104-22.695,4.723-33.579L455.423,65.166C474.316,58.081,490.85,69.375,484.689,98.231z" />
                                        </g>
                                    </g>
                                    <g id="Layer_1" />
                                </svg>
                            </a>
                            <a href="https://www.facebook.com/stan.org.ua" target="_blank" rel="noopener noreferrer">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve">
                                    <path d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z" />
                                </svg>
                            </a>
                        </div>
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </div>
        </div>