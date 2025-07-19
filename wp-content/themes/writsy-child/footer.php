 <?php
/**
 * The template for displaying the footer
 *
 * @package Writsy
 * @since   1.0.0
 */
defined('ABSPATH') or die('Cheatin\' Uh?');
?>
        </main>
        <footer id="site-footer" class="site-footer" role="contentinfo">
            <?php get_sidebar('footer'); ?>

            <?php if(writsy_get_option('instagram_gallery') && shortcode_exists('incredibbble_instagram_feeds')) : ?>
                <?php
                $username = writsy_get_option('instagram_gallery_username');
                $maximum  = writsy_get_option('instagram_gallery_max', 12);
                $photos   = do_shortcode('[incredibbble_instagram_feeds username="' . esc_attr($username) . '" count="' . esc_attr($maximum) . '" size="standard_resolution" lazyload="1"]');
                ?>

                <?php if($photos) : ?>
                <div class="instagram-gallery">
                    <?php echo $photos; ?>

                    <a href="<?php echo esc_url('https://www.instagram.com/' . esc_html($username)); ?>" class="instagram-follow-button text-secondary">
                        <span><i class="fa fa-instagram"></i> <?php esc_html_e('Instagram', 'writsy') ?></span>
                    </a>
                </div>
                <?php endif; ?>
            <?php endif; ?>

            <div class="site-info">
                <div class="container">
                  <div class="footer-logos"> <a href="javascript:void(0);"><img style="width:95px;margin-right:10px;" src="https://www.annuities.com/wp-content/uploads/2015/12/b2.png" alt="Annuities.com "></a> <a href="javascript:void(0);"><img alt="Annuities.com " src="https://www.annuities.com/wp-content/uploads/2015/12/b1.png"></a></div>
				  <div class="disclaimerbox"> Disclaimer: This is not investment advice. All information on this site is intended for educational purposes only. We are not liable<br> for any potential damages that may be incurred from this information. Always consult a licensed financial professional before investing.</div>
				   <div class="footer-copyright">© 2018 Annuities.net. All rights reserved.</div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
 <script type="text/javascript">
     jQuery(window).scroll(function() {
         var scroll = jQuery(window).scrollTop();

         if (scroll >= 275) {
             jQuery("#secondary").addClass("stickybar");
         }
         else if(scroll <= 275) {
             jQuery("#secondary").removeClass("stickybar");
         }
     });

     // jQuery(window).scroll(function() {
     //     if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - 100) {
     //         jQuery("#secondary").removeClass("stickybar");
     //     }
     // });
 </script>
 <style>
.category #main-content .column-medium-4
{
    /*width: 369px;*/
    position: relative;
}
.stickybar
{
    position: fixed;
    top: 0;
    width: 369px;
    margin-left: 0;
}
.content-area
{
         min-height: 700px;
}
 </style>
    </body>
</html>