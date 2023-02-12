<?php

if (!isset($_GET['body'])) {
	
	/**
	 * Genesis Framework.
	 *
	 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
	 * Please do all modifications in the form of a child theme.
	 *
	 * @package Genesis\Templates
     * @author  StudioPress
	 * @license GPL-2.0-or-later
	 * @link    https://my.studiopress.com/themes/genesis/
	 */
	
	genesis_structural_wrap( 'site-inner', 'close' );
	genesis_markup(
		[
			'close'   => '</div>',
			'context' => 'site-inner',
		]
	);
	
	/**
	 * Fires immediately after the site inner closing markup, before `genesis_footer` action hook.
	 *
	 * @since 1.0.0
	 */
	do_action( 'genesis_before_footer' );
	
	/**
	 * Fires to display the main footer content.
	 *
	 * @since 1.0.1
	 */
	do_action( 'genesis_footer' );
	
	/**
	 * Fires immediately after the `genesis_footer` action hook, before the site container closing markup.
	 *
	 * @since 1.0.0
	 */
	do_action( 'genesis_after_footer' );
	
	genesis_markup(
		[
			'close'   => '</div>',
			'context' => 'site-container',
		]
	);
	
	/**
	 * Fires immediately before wp_footer(), after the site container closing markup.
	 *
	 * @since 1.0.0
	 */
	do_action( 'genesis_after' );
	wp_footer(); // We need this for plugins.
	
	genesis_markup(
		[
			'close'   => '</body>',
			'context' => 'body',
		]
	);
	
	?>
	</html>
	
	<?php
}

