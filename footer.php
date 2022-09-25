           <div>
           <footer class="footer">
        <div class="footer-wrapper container">
            <div class="footer-contacts"><?php if ($text = pllGetOption('footer_contacts')) { ?>
                        <?php echo $text; ?>
                    <?php } ?>
                <p class="contacts-address"><?php if ($text = pllGetOption('footer_text')) { ?>
                        <?php echo $text; ?>
                    <?php } ?></p>
            </div>
            <div class="footer-map"><?php if ($text = pllGetOption('footer_map')) { ?>
                        <?php echo $text; ?>
                    <?php } ?>
                <div class="map"><iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1310.766412747184!2d24.69369373028415!3d48.92429240922687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4730c119e7743247%3A0xbeebe99b79c26eb6!2z0YPQuy4g0JvQtdC90LrQsNCy0YHQutC-0LPQviwgNNCwLCDQmNCy0LDQvdC-LdCk0YDQsNC90LrQvtCy0YHQuiwg0JjQstCw0L3Qvi3QpNGA0LDQvdC60L7QstGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQo9C60YDQsNC40L3QsCwgNzYwMDA!5e0!3m2!1sru!2sby!4v1643974802868!5m2!1sru!2sby"
                        width="350" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
            </div>
            <div class="footer-navigation"><?php if ($text = pllGetOption('footer_site_map')) { ?>
                        <?php echo $text; ?>
                    <?php } ?>
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu',
                            'container' => 'nav',
                            'menu_class' => 'navigation-list'
                            
                        ));
                        ?>
                
            </div>
        </div>
    </footer>
           </div>
           </div>
           <?php wp_footer(); ?>

           <?php echo get_option('scripts'); ?>
           </body>

           </html>