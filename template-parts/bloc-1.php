<?php
/*
================================================================================================
Template part for displaying the first bloc, two articles at a time
================================================================================================
@package        Bastille
@link           https://codex.wordpress.org/The_Loop
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (http://samuelguebo.co/)
================================================================================================
*/
$bloc_category  = $bloc_setting ['bloc_category'];
$bloc_title     = $bloc_setting ['bloc_title'];
if($bloc_category>0): //make sure a category has been selected
?>
<section class="row main-row clearfix">
            <section class="columns main-column">
                <div class="main-row no-margin-top no-padding-top no-margin-top" >
                    <div class="columns large-12 category-header no-padding">
                        <div class="small-8 medium-6 large-6 columns no-padding-left">
                            <h4 class="category-title">
                                <?php echo esc_attr( $bloc_title );?>
                            </h4>
                        </div>
                        <div class="small-4 medium-6 large-6 columns right no-padding">
                            <a href="<?php echo get_category_link(esc_attr( $bloc_category));?>" class="small post-item-button radius right"><?php _e('Show all','bastille')?></a>
                        </div>
                    </div><!--header/-->
                </div><!--header/-->
                <div class="category-row main-row category-mix">
                    <!-- post list-->
                    <div class="post-list clearfix">
                            <div class="large-12 medium-12 small-12 columns no-padding-left mix-big">
                                <?php //starting the first loop
                                $i = 1;	$args = array ('post_type'=>'post',
                                                       'showposts'=>1,
                                                        'cat'=> $bloc_category,
                                              );
                                
                                $bloc_posts = new WP_Query($args);                    
                                if($bloc_posts->have_posts() ) :
                                    while ( $bloc_posts->have_posts())  : $bloc_posts->the_post();
                                        if(has_post_thumbnail()){
                                            bastille_get_template_part('template-parts/content-article-mix-big.php', 'large-12 medium-6 small-12', 'slider-cover');
                                        }else {
                                            bastille_get_template_part('template-parts/content-article-without-thumb.php', 'large-12 medium-6 small-12', 'slider-cover');
                                        }
                                ?>
                                <?php endwhile;
                                endif; wp_reset_query();?>
                            </div>                            
                        </div><!--header/-->                     
                </div>
            </section>
</section>
<?php endif; 