<?php
/*
================================================================================================
Template part for displaying articles in loop
================================================================================================
@package        Bastille
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
?>
    

<article id="post-<?php the_ID(); ?>" class="post-item large-4 medium-6 small-12 columns">
    <!--post/-->
    <div class="post-item-caption">
        <div class="post-item-image"> 
            <div class="colorful-line"> </div>
            <?php
                if ( bastille_has_post_thumbnail_or_image ()) { 
                    the_post_thumbnail( 'post-thumb' ); 
                }
            ?>

        </div>
        <div class="panel">
            <?php if( get_post_type( get_the_ID() ) == 'post' ):?>
                <span class="post-item-date"><?php echo get_the_date('d/m/Y')?> / <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></span><br><!--date/-->
            <?php endif;?>
            <h3 class="post-item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <p><?php echo bastille_new_excerpt_length(100);?></p> 
        </div>
    </div>
</article>
