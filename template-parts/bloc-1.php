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
$bloc_number    = $bloc_setting ['bloc_number'];
$bloc_title     = $bloc_setting ['bloc_title'];
if($bloc_category>0): //make sure a category has been selected
?>
<section class="row main-row clearfix">
            <section class="large-8 columns main-column">
                <div class="main-row no-margin-top no-padding-top no-margin-top" >
                    <div class="columns large-12 category-header no-padding">
                        <div class="small-8 medium-6 large-6 columns no-padding-left">
                            <h4 class="category-title">
                                <?php echo esc_attr($bloc_title);?>
                            </h4>
                        </div>
                        <div class="small-4 medium-6 large-6 columns right no-padding">
                            <a href="<?php echo get_category_link(esc_attr( $bloc_category));?>" class="small post-item-button radius right"><?php _e('Show all','bastille')?></a>
                        </div>
                    </div><!--header/-->
                </div><!--header/-->
                <div class="category-row">
                    <!-- post list-->
                    <div class="post-list clearfix">
                        <?php //starting Bloc 1 loop;
                        $i = 1;	$args = array ('post_type'=>'post',
                                               'showposts'=>esc_attr( $bloc_number),
                                               'cat'=> $bloc_category
                                              ); 
                        $posts = new WP_Query($args);                    
                        if($posts->have_posts() ) :
                            while ( $posts->have_posts())  : $posts->the_post();
                                get_template_part( 'template-parts/content', 'article' );
                            endwhile;
                        endif; wp_reset_query();?>
                    </div>
                </div>
            </section>
            
            <aside id="sidebar" class="large-4 columns">
                <?php dynamic_sidebar( 'sidebar-home' ); ?>
            </aside>
</section>
<?php endif;$bloc_category = 0;