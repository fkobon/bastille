<?php
/*
================================================================================================
The template for displaying the footer. It contains the closing of the body all content 
after and containing the bottom widget area
================================================================================================
@package        Bastille
@link           https://developer.wordpress.org/themes/basics/template-files/#template-partials
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
?>
    <footer id="footer">
        <div class="footer-bar parallax clearfix">
                <?php dynamic_sidebar( 'footer-1' );?>
        </div><!-- .footer-bar -->
        <div class="row">
                <div class="medium-6 large-6 columns">
                    <p class="copyright"><?php _e('Developed by ','bastille')?>Samuel Guebo.<br><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bastille' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'bastille' ), 'WordPress' ); ?></a> <?php _e('and available on','bastille')?> <a href="https://github.com/samuelguebo/bastille"><i class="fa fa-github"></i> Github</a>
                    </p><!-- copyright-->
                </div>
        </div>
        <div class="row back-to-top-wrapper">
            <a href="#0" class="back-to-top" id="back-to-top"><i class="fa fa-angle-up"></i></a><!-- back to top-->
        </div>
    </footer>
    <?php wp_footer(); ?>
</section><!-- .boxed-wrapper-->
</body>

</html>