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
    require_once dirname(__FILE__) . '/class-palette_custom_control.php';
    require_once dirname(__FILE__) . '/class-category_dropdown_custom_control.php';
    
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
    
     
    
    /*
     * Bloc 1
     *
     */
    
    // Create section for Bloc 1 settings
    $wp_customize->add_section('bastille_bloc_1_section', array(
		'title' => __('Bloc 1', 'bastille'),
		'priority' => 30,
	));
    
    // Bloc 1 category selector
    $wp_customize->add_setting('bloc_1_category', array(
		'default' => 0,
		'transport' => 'refresh',
        'sanitize_callback'	=> 'absint'

	));
    $wp_customize->add_control(
        new Category_Dropdown_Custom_Control(
            $wp_customize, 'bloc_1_category', array(
                'label' => __( 'Bloc 1 category', 'bastille' ),
                'section' => 'bastille_bloc_1_section',
                'settings' => 'bloc_1_category',
            )
    ));
    
    
     // Section 1 label
    $wp_customize->add_setting('bloc_1_label', array(
		'default' => __('Section 1', 'bastille'),
		'transport' => 'refresh',
        'sanitize_callback'	=> 'sanitize_text_field'

	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'bloc_1_label',
		array(
			'label' => __('Display text for bloc 1', 'bastille'),
			'section' => 'bastille_bloc_1_section',
			'settings' => 'bloc_1_label',
			'type' => 'text',
		)
	));
    
    // Section 1 post number
    $wp_customize->add_setting('bloc_1_number', array(
		'default' => 2, 'bastille',
		'transport' => 'refresh',
        'sanitize_callback'	=> 'absint'

	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'bloc_1_number',
		array(
			'label' => __('Number of posts to display in bloc 1', 'bastille'),
			'section' => 'bastille_bloc_1_section',
			'settings' => 'bloc_1_number',
			'type'     => 'select',
            'choices'  => array('2'=>2,
                                '4'=>4,
                                '6'=>6)
		)
	));
    
    /*
     * Bloc 2
     *
     */

    // Create section for Bloc 2 settings
    $wp_customize->add_section('bastille_bloc_2_section', array(
        'title' => __('Bloc 2', 'bastille'),
        'priority' => 30,
    ));

    // Bloc 2 category selector
    $wp_customize->add_setting('bloc_2_category', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback'	=> 'absint'

    ));
    $wp_customize->add_control(
        new Category_Dropdown_Custom_Control(
            $wp_customize, 'bastille_theme_color', array(
                'label' => __( 'Bloc 2 category', 'bastille' ),
                'section' => 'bastille_bloc_2_section',
                'settings' => 'bloc_2_category',
            )
    ));
    
    // Bloc 2 category selector
    $wp_customize->add_setting('bloc_2_category', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback'	=> 'absint'

    ));
    $wp_customize->add_control(
        new Category_Dropdown_Custom_Control(
            $wp_customize, 'bloc_2_category', array(
                'label' => __( 'Bloc 2 category', 'bastille' ),
                'section' => 'bastille_bloc_2_section',
                'settings' => 'bloc_2_category',
            )
    ));


     // Bloc 2 label
    $wp_customize->add_setting('bloc_2_label', array(
        'default' => __('Bloc 2', 'bastille'),
        'transport' => 'refresh',
        'sanitize_callback'	=> 'sanitize_text_field'

    ));
    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'bloc_2_label',
        array(
            'label' => __('Display text for bloc 3', 'bastille'),
            'section' => 'bastille_bloc_2_section',
            'settings' => 'bloc_2_label',
            'type' => 'text',
        )
    ));

    /*
     * Bloc 3
     *
     */
    
    // Create section for Bloc 3 settings
    $wp_customize->add_section('bastille_bloc_3_section', array(
		'title' => __('Bloc 3', 'bastille'),
		'priority' => 30,
	));
    
    // Bloc 3 category selector
    $wp_customize->add_setting('bloc_3_category', array(
		'default' => 0,
		'transport' => 'refresh',
        'sanitize_callback'	=> 'absint'

	));
    $wp_customize->add_control(
        new Category_Dropdown_Custom_Control(
            $wp_customize, 'bastille_theme_color', array(
                'label' => __( 'Bloc 3 category', 'bastille' ),
                'section' => 'bastille_bloc_3_section',
                'settings' => 'bloc_3_category',
            )
    ));
    
    
     // Bloc 3 label
    $wp_customize->add_setting('bloc_3_label', array(
		'default' => __('Section 3', 'bastille'),
		'transport' => 'refresh',
        'sanitize_callback'	=> 'sanitize_text_field'

	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'bloc_3_label',
		array(
			'label' => __('Display text for bloc 3', 'bastille'),
			'section' => 'bastille_bloc_3_section',
			'settings' => 'bloc_3_label',
			'type' => 'text',
		)
	));
    
    // Bloc 3 post number
    $wp_customize->add_setting('bloc_3_number', array(
		'default' => 3,
		'transport' => 'refresh',
        'sanitize_callback'	=> 'absint'

	));
    $wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'bloc_3_number',
		array(
			'label' => __('Number of posts to display in bloc 3', 'bastille'),
			'section' => 'bastille_bloc_3_section',
			'settings' => 'bloc_3_number',
			'type'     => 'select',
            'choices'  => array('3'=>3,
                                '6'=>6,
                                '9'=>9)
		)
	));
}


add_action( 'customize_register', 'bastille_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bastille_customize_preview_js() {
	wp_enqueue_script( 'bastille_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20170425', true );
}

/* Validate user input */
get_template_part('inc/customizer-sanitize'); 
