<?php
/**
* Seaport Museum.
 *
 * This file adds the Customizer additions to the Genesis Sample Theme.
 *
 * @package Seaport Museum
 * @author  William Mallick
 */

add_action( 'customize_register', 'seaport_museum_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 2.2.3
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function seaport_museum_customizer_register( $wp_customize ) {

	$wp_customize->add_setting(
		'seaport_museum_link_color',
		array(
			'default'           => seaport_museum_customizer_get_default_link_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'seaport_museum_link_color',
			array(
				'description' => __( 'Change the color of post info links and button blocks, the hover color of linked titles and menu items, and more.', 'seaport-museum' ),
				'label'       => __( 'Link Color', 'seaport-museum' ),
				'section'     => 'colors',
				'settings'    => 'seaport_museum_link_color',
			)
		)
	);

	$wp_customize->add_setting(
		'seaport_museum_accent_color',
		array(
			'default'           => seaport_museum_customizer_get_default_accent_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'seaport_museum_accent_color',
			array(
				'description' => __( 'Change the default hover color for button links, menu buttons, and submit buttons. The button block uses the Link Color.', 'seaport-museum' ),
				'label'       => __( 'Primary Accent Color', 'seaport-museum' ),
				'section'     => 'colors',
				'settings'    => 'seaport_museum_accent_color',
			)
		)
	);
	
	
	/** Additional Accent Colors */
	//Accent Color: Yellow (per original spec)
	$wp_customize->add_setting(
		'seaport_museum_accent_color_2',
		array(
			'default'           => '#FFC845',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'seaport_museum_accent_color_2',
			array(
				'description' => __( 'Accent Color #2. Used for color blocks.', 'seaport-museum' ),
				'label'       => __( 'Accent Color 2', 'seaport-museum' ),
				'section'     => 'colors',
				'settings'    => 'seaport_museum_accent_color_2',
			)
		)
	);
	
	//Accent Color: Magenta (per original spec)
	$wp_customize->add_setting(
		'seaport_museum_accent_color_3',
		array(
			'default'           => '#F99FC9',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'seaport_museum_accent_color_3',
			array(
				'description' => __( 'Accent Color #3. Used for color blocks.', 'seaport-museum' ),
				'label'       => __( 'Accent Color 3', 'seaport-museum' ),
				'section'     => 'colors',
				'settings'    => 'seaport_museum_accent_color_3',
			)
		)
	);
	
	//Accent Color: Blue (per original spec)
	$wp_customize->add_setting(
		'seaport_museum_accent_color_4',
		array(
			'default'           => '#OO7FA3',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'seaport_museum_accent_color_4',
			array(
				'description' => __( 'Accent Color #4. Used for color blocks.', 'seaport-museum' ),
				'label'       => __( 'Accent Color 4', 'seaport-museum' ),
				'section'     => 'colors',
				'settings'    => 'seaport_museum_accent_color_4',
			)
		)
	);
	
	/** End of Additional Accent Colors */
	
	
	/* WP Primary logo is displayed when the page is scrolled, class nav-scrolled
	/* Scrolled logo customizations */
	$wp_customize->add_setting(
		'seaport_museum_logo_height',
		array(
			'default'           => 106,
			'sanitize_callback' => 'absint',
		)
	);

	// Add a control for the scrolled logo size.
	$wp_customize->add_control(
		'seaport_museum_logo_height',
		array(
			'label'       => __( 'Logo Height', 'seaport-museum' ),
			'description' => __( 'The height of the logo in pixels. The logo image will be sized to the height and width set here. Be sure to mind proportions.', 'seaport-museum' ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'seaport_museum_logo_height',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 50,
				'max' => 300,
			),

		)
	);
	
	/* WP Primary logo is displayed when the page is scrolled, class nav-scrolled
	/* Scrolled logo customizations */
	$wp_customize->add_setting(
		'seaport_museum_logo_width',
		array(
			'default'           => 168,
			'sanitize_callback' => 'absint',
		)
	);
	
	// Add a control for the scrolled logo size.
	$wp_customize->add_control(
		'seaport_museum_logo_width',
		array(
			'label'       => __( 'Logo Width', 'seaport-museum' ),
			'description' => __( 'The width of the logo in pixels.', 'seaport-museum' ),
			'priority'    => 9,
			'section'     => 'title_tagline',
			'settings'    => 'seaport_museum_logo_width',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 50,
				'max' => 300,
			),
		
		)
	);
	
	
	/* Home Position Logo:  (when the page is not scrolled) */
	// Home Position Logo: image source setting
	$wp_customize->add_setting(
		'seaport_museum_logo_home',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'esc_url_raw',
			'transport'      => 'postMessage',
		)
	);
	
	// Home Position Logo: image source control
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'seaport_museum_logo_home', array(
		'label'    => __( 'Logo (Home Position)', 'seaport-museum' ),
		'section'  => 'title_tagline',
		'settings' => 'seaport_museum_logo_home',
		'priority' => 2
	)));
	
	// Home Position Logo: image height setting.
	$wp_customize->add_setting(
		'seaport_museum_logo_home_height',
		array(
			'default'           => 164,
			'sanitize_callback' => 'absint',
		)
	);
	
	// Home Position Logo: image height control.
	$wp_customize->add_control(
		'seaport_museum_logo_home_height',
		array(
			'label'       => __( 'Logo (Home Position) Height', 'seaport-museum' ),
			'description' => __( 'The height of the logo (home position) in pixels. The logo image will be sized to the height and width set here. Be sure to mind proportions.', 'seaport-museum' ),
			'priority'    => 2,
			'section'     => 'title_tagline',
			'settings'    => 'seaport_museum_logo_home_height',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 75,
				'max' => 300,
			),
		
		)
	);
	
	// Home Position Logo: image width setting.
	$wp_customize->add_setting(
		'seaport_museum_logo_home_width',
		array(
			'default'           => 154,
			'sanitize_callback' => 'absint',
		)
	);
	
	// Home Position Logo: image height control.
	$wp_customize->add_control(
		'seaport_museum_logo_home_width',
		array(
			'label'       => __( 'Logo (Home Position) Width', 'seaport-museum' ),
			'description' => __( 'The width of the logo (home position) in pixels.', 'seaport-museum' ),
			'priority'    => 2,
			'section'     => 'title_tagline',
			'settings'    => 'seaport_museum_logo_home_width',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 75,
				'max' => 300,
			),
		
		)
	);
	
	// Home Position Logo: padding around the logo setting
	$wp_customize->add_setting(
		'seaport_museum_logo_home_padding',
		array(
			'default'           => 43,
			'sanitize_callback' => 'absint',
		)
	);
	
	// Home Position Logo: padding around the logo control
	$wp_customize->add_control(
		'seaport_museum_logo_home_padding',
		array(
			'label'       => __( 'Logo (Home Position) Padding', 'seaport-museum' ),
			'description' => __( 'The padding of the logo (home position) in pixels.', 'seaport-museum' ),
			'priority'    => 2,
			'section'     => 'title_tagline',
			'settings'    => 'seaport_museum_logo_home_padding',
			'type'        => 'number',
			'input_attrs' => array(
				'min' => 0,
				'max' => 120,
			),
		)
	);
	
	// Home Position Logo: Add a setting for the text below the logo
	$wp_customize->add_setting(
		'seaport_museum_logo_home_text',
		array(
		'default'    => 'SeaportMuseum.org',
	));
	
	// Home Position Logo: Add a control for the text below the logo
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'seaport_museum_logo_home_text',
			array(
				'label'       => __( 'Logo (Home Position) Title', 'seaport-museum' ),
				'description' => __( 'Subtitle under the home position logo. Leave blank if desired.', 'seaport-museum' ),
				'priority'    => 2,
				'section'     => 'title_tagline',
				'settings'    => 'seaport_museum_logo_home_text',
				'type'        => 'text',
			)
		)
	);
	
	
	
	/*************************** Top Action Buttons **********************************/
	//Action Button Section
	$wp_customize->add_section('seaport_museum_actions_section' ,
		array(
		'title'     => __('Action Buttons', 'dd_theme'),
		'priority'  => 1020
	));

	/****************** Action Button A **********************/
	//button a title
	$wp_customize->add_setting('action_button_a_title',
		array(
		'default'    => 'Button A',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_a_title',
			array(
				'label'     => __('Button A Title', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_a_title',
				'type'      => 'text',
			)
		)
	);
	
	//button a url
	$wp_customize->add_setting('action_button_a_url',
		array(
		'default'    => '',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_a_url',
			array(
				'label'     => __('Button A URL', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_a_url',
				'type'      => 'text',
			)
		)
	);

	//button a position
	$wp_customize->add_setting( 'action_button_a_position', array(
		'default' => 'right',
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_a_position',
			array(
				'type'      => 'select',
				'label'     => __('Button A Position', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_a_position',
				'choices' => array(
					'left' => __( 'Left' ),
					'middle' => __( 'Middle' ),
					'right' => __( 'Right' ),
				),
			)
		)
	);

	//show button a
	$wp_customize->add_setting('show_action_button_a',
		array(
		'default'    => '1'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_button_a',
			array(
				'label'     => __('Show Button A', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'show_action_button_a',
				'type'      => 'checkbox',
			)
		)
	);

	/****************** Action Button B **********************/
	//button b title
	$wp_customize->add_setting('action_button_b_title',
		array(
		'default'    => 'Button B',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_b_title',
			array(
				'label'     => __('Button B Title', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_b_title',
				'type'      => 'text',
			)
		)
	);
	
	//button b url
	$wp_customize->add_setting('action_button_b_url',
		array(
		'default'    => '',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_b_url',
			array(
				'label'     => __('Button B URL', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_b_url',
				'type'      => 'text',
			)
		)
	);

	//button b position
	$wp_customize->add_setting( 'action_button_b_position', array(
		'default' => 'middle',
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_b_position',
			array(
				'type'      => 'select',
				'label'     => __('Button B Position', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_b_position',
				'choices' => array(
					'left' => __( 'Left' ),
					'middle' => __( 'Middle' ),
					'right' => __( 'Right' ),
				),
			)
		)
	);
	
	//show button b
	$wp_customize->add_setting('show_action_button_b',
		array(
		'default'    => '1'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_button_b',
			array(
				'label'     => __('Show Button B', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'show_action_button_b',
				'type'      => 'checkbox',
			)
		)
	);

	/****************** Action Button C **********************/
	//button C title
	$wp_customize->add_setting('action_button_c_title',
		array(
		'default'    => 'Button C',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_c_title',
			array(
				'label'     => __('Button C Title', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_c_title',
				'type'      => 'text',
			)
		)
	);
	
	//Button C url
	$wp_customize->add_setting('action_button_c_url',
		array(
		'default'    => '',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_c_url',
			array(
				'label'     => __('Button C URL', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_c_url',
				'type'      => 'text',
			)
		)
	);

	//button c position
	$wp_customize->add_setting( 'action_button_c_position', array(
		'default' => 'left',
	) );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'button_c_position',
			array(
				'type'      => 'select',
				'label'     => __('Button C Position', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'action_button_c_position',
				'choices' => array(
					'left' => __( 'Left' ),
					'middle' => __( 'Middle' ),
					'right' => __( 'Right' ),
				),
			)
		)
	);
	
	//show Button C
	$wp_customize->add_setting('show_action_button_c',
		array(
		'default'    => '1'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'show_button_c',
			array(
				'label'     => __('Show Button C', 'dd_theme'),
				'section'   => 'seaport_museum_actions_section',
				'settings'  => 'show_action_button_c',
				'type'      => 'checkbox',
			)
		)
	);
	
	/************************** End of Action Buttons *********************/
	
	
}
