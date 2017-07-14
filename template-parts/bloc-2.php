<?php
/*
================================================================================================
Template part for displaying the second bloc, a three-bloc layout
================================================================================================
@package        Bastille
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
$category_id = esc_attr( get_theme_mod( 'bloc_2_category' ));
if($category_id>0): //make sure a category has been selected
?>
<section class="row main-row clearfix">
            <section class="columns main-column">
                <div class="main-row no-margin-top no-padding-top no-margin-top" >
                    <div class="columns large-12 category-header no-padding">
                        <div class="small-8 medium-6 large-6 columns no-padding-left">
                            <h4 class="category-title">
                                <?php echo esc_attr( get_theme_mod( 'bloc_2_label' ));?>
                            </h4>
                        </div>
                        <div class="small-4 medium-6 large-6 columns right no-padding">
                            <a href="<?php echo get_category_link(esc_attr( get_theme_mod( 'bloc_2_category' )));?>" class="small post-item-button radius right"><?php _e('Show all','bastille')?></a>
                        </div>
                    </div><!--header/-->
                </div><!--header/-->
                <div class="category-row main-row category-mix">
                    <!-- post list-->
                    <div class="post-list clearfix">
                            <div class="small-8 medium-6 large-8 small-12 columns no-padding-left mix-big">
                                <?php //starting the first loop
                                $i = 1;	$args = array ('post_type'=>'post',
                                                       'showposts'=>1,
                                                        'cat'=> $category_id,
                                              );
                                
                                
                                $posts = new WP_Query($args);                    
                                if($posts->have_posts() ) :
                                    while ( $posts->have_posts())  : $posts->the_post();
                                        get_template_part( 'template-parts/content', 'article-mix-big' );
                                ?>
                                <?php endwhile;
                                endif; wp_reset_query();?>
                            </div>
                            <div class="small-12 medium-6 large-4 columns right no-padding mix-small">
                                <?php //starting the second loop but skip the first result using "offset""
                                $i = 1;	$args = array ('post_type'=>'post',
                                               'showposts'=>2,
                                               'cat'=> $category_id,
                                                'offset'=>1
                                              );  
                                
                                $posts = new WP_Query($args);                    
                                if($posts->have_posts() ) :
                                    while ( $posts->have_posts())  : $posts->the_post();
                                        get_template_part( 'template-parts/content', 'article-mix-small' );
                                ?>
                                <?php endwhile;
                                endif; wp_reset_query();?>                            
                            </div>
                            
                        </div><!--header/-->                     
                </div>
            </section>
</section>
<?php endif;$category_id = 0;