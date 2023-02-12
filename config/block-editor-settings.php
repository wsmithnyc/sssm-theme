<?php
/**
 * Block Editor settings specific to Genesis Sample.
 *
 * @package Seaport Museum
 * @author  William Mallick
 */

$seaport_museum_link_color            = get_theme_mod( 'seaport_museum_link_color', seaport_museum_customizer_get_default_link_color() );
$seaport_museum_link_color_contrast   = seaport_museum_color_contrast( $seaport_museum_link_color );
$seaport_museum_link_color_brightness = seaport_museum_color_brightness( $seaport_museum_link_color, 35 );

return array(
	'admin-fonts-url'              => 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
	'content-width'                => 1062,
	'default-button-bg'            => "#FFF",
	'default-button-color'         => $seaport_museum_link_color,
	'default-button-outline-hover' => $seaport_museum_link_color,
	'default-link-color'           => $seaport_museum_link_color,
	'editor-color-palette'         => array(
		array(
			'name'  => __( 'Link Color', 'seaport-museum' ), // Called “Link Color” in the Customizer options. Renamed because “Link Color” implies it can only be used for links.
			'slug'  => 'theme-primary',
			'color' => get_theme_mod( 'seaport_museum_link_color', seaport_museum_customizer_get_default_link_color() ),
		),
		array(
			'name'  => __( 'Accent color (primary)', 'seaport-museum' ),
			'slug'  => 'theme-accent',
			'color' => get_theme_mod( 'seaport_museum_accent_color', seaport_museum_customizer_get_default_accent_color() ),
		),
		array(
			'name'  => __( 'Accent color 2', 'seaport-museum' ),
			'slug'  => 'theme-accent-2',
			'color' => get_theme_mod( 'seaport_museum_accent_color_2'),
		),
		array(
			'name'  => __( 'Accent color 3', 'seaport-museum' ),
			'slug'  => 'theme-accent-3',
			'color' => get_theme_mod( 'seaport_museum_accent_color_3'),
		),
		array(
			'name'  => __( 'Accent color 4', 'seaport-museum' ),
			'slug'  => 'theme-accent-4',
			'color' => get_theme_mod( 'seaport_museum_accent_color_4'),
		),
		array(
			'name'  => __( 'White', 'seaport-museum' ),
			'slug'  => 'theme-white',
			'color' => '#FFFFFF',
		),
		array(
			'name'  => __( 'Black', 'seaport-museum' ),
			'slug'  => 'theme-black',
			'color' => '#000000',
		),

	),
	'editor-font-sizes'            => array(
		array(
			'name' => __( 'Small', 'seaport-museum' ),
			'size' => 12,
			'slug' => 'small',
		),
		array(
			'name' => __( 'Normal', 'seaport-museum' ),
			'size' => 20,
			'slug' => 'normal',
		),
		array(
			'name' => __( 'Large', 'seaport-museum' ),
			'size' => 24,
			'slug' => 'large',
		),
		array(
			'name' => __( 'Larger', 'seaport-museum' ),
			'size' => 32,
			'slug' => 'larger',
		),
	),
);
