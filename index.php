<?php
/*
================================================================================================
The main template file. This is the most generic template file in a WordPress theme
and one of the two required files for a theme (the other being style.css).
It is used to display a page when nothing more specific matches a query.
E.g., it puts together the home page when no home.php file exists.
================================================================================================
@package        Bastille
@link           @link https://codex.wordpress.org/Template_Hierarchy
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://samuelguebo.co/)
================================================================================================
*/
get_header(); 

// require slider
get_template_part ('slider');
      
// Make sure Kirki is activated
if ( class_exists( 'Kirki' ) ):

    // Theme_mod settings to check.
    $bloc_repeater_settings = Bastille_Kirki::get_option( 'bloc_repeater');
    if(is_array($bloc_repeater_settings)):
        foreach( $bloc_repeater_settings as $bloc_setting ) {
            $layout = $bloc_setting['bloc_layout'];
            switch($layout){
                case 'layout-1':
                    require('template-parts/bloc-1.php');
                    break;
                case 'layout-2':
                    require('template-parts/bloc-2.php');
                    break;
                case 'layout-3':
                    require('template-parts/bloc-3.php');
                    break;
            }
        } 
    endif;
else:
?>
<div class="category-row">
    <div class="post-list clearfix">
        <div class="row" >
            <div class="main-row no-padding-top" >
                <div class="columns large-12 category-header no-padding">
                        <h4 class="category-title">
                            <?php _e('Recent posts', 'bastille');?>
                        </h4>
                </div><!--header/-->
            </div><!--main-row/-->
        </div><!--row/-->
        <?php
            if ( have_posts() ) :
                /* Start the Loop */
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // for pagination purpose
                while ( have_posts() ) : the_post();

                    if(has_post_thumbnail()){
                        bastille_get_template_part('template-parts/content-article.php', 'large-4 medium-6 small-12', 'post-thumb');
                    }else {
                        bastille_get_template_part('template-parts/content-article-without-thumb.php', 'large-4 medium-6 small-12', 'post-thumb');
                    }

                endwhile;

            else :

                get_template_part( 'template-parts/content', '404' );

            endif; ?>
    </div>
    <div class="pagination-wrapper columns large-4 large-centered" >
        <?php the_posts_pagination( array(
            'mid_size' => 2,
            'prev_text' => __( '&laquo;', 'bastille' ),
            'next_text' => __( '&raquo;', 'bastille' ),
            'screen_reader_text' => ' '
        ) ); ?>
    </div>
</div>
<?php
endif;
get_footer();
