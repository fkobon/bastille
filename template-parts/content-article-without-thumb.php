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

<article id="post-<?php the_ID(); ?>" class="post-item no-thumb <?php echo $container_class;?> columns">
    <!--post/-->
    <div class="post-item-caption">        
        <div class="panel">
            <span class="post-item-date wrap"><?php echo get_the_date('d/m/Y')?></span>
            <h3 class="post-item-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <p><?php the_excerpt();?></p> 
            <a href="<?php the_permalink();?>" class="small button post-item-buttom"><?php _e('Read more','bastille')?></a> 
            <?php if ( get_edit_post_link() ) : ?>
                <a href="<?php echo get_edit_post_link();?>" class="small button alert"><i class="fa fa-edit"></i> <?php _e('Edit','bastille')?></a> 
                    
            <?php endif; ?>
        </div>
    </div>
</article>


