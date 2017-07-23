<?php
/*
================================================================================================
Bastille Theme Customizer
================================================================================================
@package        Bastille
@link           https://codex.wordpress.org/Theme_Customization_API
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://samuelguebo.co/)
================================================================================================
*/

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bastille_customize_register( $wp_customize ) {
	
    
    /*
     * Theme colors using Customizer Custom Controls, 
     * @link https://github.com/bueltge/Wordpress-Theme-Customizer-Custom-Controls
     *
     */
    require_once dirname(__FILE__) . '/class-category_dropdown_custom_control.php';
    require_once dirname(__FILE__) . '/class-palette_custom_control.php';
    
    
    // kirki configs
    Bastille_Kirki::add_config( 'bastille', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );
    
    // Create section for news settings
    Bastille_Kirki::add_section('home_section', array(
		'title' => __('Home section', 'bastille'),
		'priority' => 30,
	));

    Kirki::add_field( 'bastille', array(
            'type'        => 'repeater',
            'settings'    => 'news_repeater',
            'label'       => __( 'Create a new section', 'bastille' ),
            'description' => __( 'Set up the section, define category, number of posts, etc', 'kirki' ),
            'section'     => 'home_section',
            'default'     => '',
            'priority'    => 10,
            'row_label' => array(
                'type' => 'text',
                'value' => esc_attr__('bloc', 'bastille' ),
            ),
            'settings'    => 'home_section',
            'fields' => array(
                'news_title' => array(
                    'type'        => 'text',
                    //'label'       => esc_attr__( 'Display text for section', 'bastille' ),
                    'description' => esc_attr__( 'Display text for section', 'bastille' ),
                    'default'     => 'Section title',
                ),
                'news_category' => array(
                        'type'        => 'select',
                        //'label'       => esc_attr__( 'Display text for section', 'bastille' ),
                        'description' => esc_attr__( 'Category of the section', 'bastille' ),
                        'default'     => 0,
                        'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'category') ),
                        'sanitize_callback'	=> 'absint'
                    ),
                'news_number' => array(
                        'type'        => 'number',
                        //'label'       => esc_attr__( 'Display text for section', 'bastille' ),
                        'description' => esc_attr__( 'Number of posts to display', 'bastille' ),
                        'default'     => 1,
                        'choices'     => array(
                                'min'  => 1,
                                'max'  => 10,
                                'step' => 1,
                            ),
                        'sanitize_callback'	=> 'absint'
                    ),
            )
        )
    );
        
    
   
    
    $wp_customize->remove_control('header_textcolor'); // remove existing Headline color setting
    $wp_customize->add_setting(
		'bastille_theme_color', array(
			'default' => '',
            'sanitize_callback'	=> 'bastille_sanitize_colors'

		)
	);
    
    $wp_customize->add_control(
            new Palette_Custom_Control(
                $wp_customize, 'bastille_theme_color', array(
                    'label' => __( 'Theme color', 'bastille' ),
                    'section' => 'colors',
                    'settings' => 'bastille_theme_color',
                )
            )
        );    
   
}

add_action( 'customize_register', 'bastille_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bastille_customize_preview_js() {
	wp_enqueue_script( 'bastille_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20170714', true );
}

/* Validate user input */
get_template_part('inc/customizer-sanitize'); 
