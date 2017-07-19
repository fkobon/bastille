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
	if(0<count($sliders)):?>
		<section id="slider">
			<!-- Slides: Images and Controllers -->
			<section class="row slider-wrapper">
				<?php
				foreach ( $sliders  as $post )  : setup_postdata( $post );
					get_template_part('template-parts/content','slide');
				endforeach; ?>
			</section>
			<!-- Controllers: Titles only -->
			<section class= "slider-controllers">
				<?php foreach ( $sliders  as $post):?>
					<div class="controller-title">  
						<h6 class="post-item-title">
							<a href="javascript:void(0);"><?php the_title();?></a>
						</h6> 
					</div>
				<?php endforeach; ?>
			</section>
		</section>
	

	<!-- Javascript setting for the slider -->
	<script>
		jQuery(document).ready(function ($) {
			// Initialize Homepage slider            
			 $('.slider-wrapper').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 4000,
				swipe:true,
				pauseOnHover:true,
				swipeToSlide:true,
				arrows: true,
				fade: true,
				asNavFor: '.slider-controllers'
			});
			
			// Do the synchronization with controllers
			$('.slider-controllers').slick({
				slidesToShow: 4,
				slidesToScroll: 1,
				asNavFor: '.slider-wrapper',
				dots: false,
				centerMode: false,
				focusOnSelect: true,
				arrows: false,
				responsive: [
				{
				  breakpoint: 1024,
				  settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
					dots: false
				  }
				},
				{
				  breakpoint: 600,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false
				  }
				},
				{
				  breakpoint: 480,
				  settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					dots: false
				  }
				}
				// You can unslick at a given breakpoint now by adding:
				// settings: "unslick"
				// instead of a settings object
				]
			});
		});
	</script>
	<?php endif; wp_reset_postdata(); $sliders = null;?>