           <div>
               <footer class="section footer">
                   <div class="container">
                       <div class="row">
                           <div class="col-xs-3">

                           </div>

                           <div class="col-xs-9">
                               <?php if ($text = pllGetOption('footer_text')) { ?>
                                   <div class="footer__right"><?php echo $text; ?></div>
                               <?php } ?>
                           </div>
                       </div>
                   </div>
               </footer>
           </div>
           </div>
           <?php wp_footer(); ?>

           <?php echo get_option('scripts'); ?>
           </body>

           </html>