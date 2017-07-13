<?php
/*
================================================================================================
The slider containing the carousel animation
================================================================================================
@package        Bastille
@link           https://developer.wordpress.org/themes/basics/template-files/#template-partials
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
?>
    <?php //starting slider loop;
    $i = 1;	$args = array(
                        //'category'=>$analysis_cat_ID,
                        'post_type'=>'post',
                        'showposts'=>4,
                        'post__in'  => get_option( 'sticky_posts' ),
                        'suppress_filters'  => 0 
                         ); 
    $sliders = get_posts( $args );
    if($sliders):?>
        <section id="slider" class="row slider-wrapper">
            <?php
            foreach ( $sliders  as $post )  : setup_postdata( $post );
                get_template_part('template-parts/content','slide');
            endforeach; ?>
        </section>
    <?php endif; wp_reset_postdata(); $sliders = null;?>

    <!-- Javascript setting for the slider -->
    <script>
        jQuery(document).ready(function ($) {
            // Initialize Homepage slider
            $(document).ready(function(){
                $('#slider').slick({
                  dots: true,
                  infinite: true,
                  speed: 300,
                  slidesToShow: 1,
                  adaptiveHeight: true
                });
            });
        });
    </script>