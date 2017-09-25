<?php
/*
================================================================================================
Template part for displaying articles with a big layout
================================================================================================
@package        Bastille
@link https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" class="columns medium-6 small-12 large-12 no-padding">
    <!--post/-->
    <div class="post-item-caption">
        <div class="post-item-image"> 
            <div class="colorful-line"> </div>
            <?php
                if ( has_post_thumbnail_or_image ()) { 
                    the_post_thumbnail( 'post-thumb' ); 
                }
            ?>

        </div>
        <div class="panel">
            <h5 class="post-item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
        </div>
    </div>
</article>