<?php
/*
================================================================================================
Template part for displaying articles in the Slider loop
================================================================================================
@package        Bastille
@link https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
?>



<section class="post-item">
    <?php the_post_thumbnail( 'slider-cover' , array('class'=>'responsive delay')); ?>
        <div class="large-7 medium-7 small-10  columns slider-caption post-item-caption">
            <div class="panel">
                <span class="label category">
                    <?php $categories = get_the_category(); 
                        if ( ! empty( $categories ) ){
                            echo esc_html( $categories[0]->name );   
                        }
                    ?>
                </span>
                <h1 class="post-item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                <span class="post-item-date"><?php echo get_the_date('d/m/Y')?></span>
            </div>
        </div>
    <div class="clearfix"></div>
</section> 