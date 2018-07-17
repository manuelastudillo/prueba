<?php

/* Get the template directory and make sure it has a trailing slash. */
$theme_dir = trailingslashit( get_template_directory() );

/* Load the Hybrid Core framework and launch it. */
require_once( $theme_dir . 'library/hybrid.php' );
new Hybrid();

/* Set up the theme early. */
add_action( 'after_setup_theme', 'swt_theme_setup', 5 );

/**
 * The theme setup function.  This function sets up support for various WordPress and framework functionality.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function swt_theme_setup() {


	/* Handle content width for embeds and images. */
	hybrid_set_content_width( 650 );

	/* Load files. */
	require_once( trailingslashit( get_template_directory() ) . 'inc/swt-setup.php' );
	require_once( trailingslashit( get_template_directory() ) . 'inc/swt-options-setup.php' );
	require_once( trailingslashit( get_template_directory() ) . 'inc/swt-shortcodes.php' );
	require_once( trailingslashit( get_template_directory() ) . 'inc/widget-popular-posts.php' );	
	require_once( trailingslashit( get_template_directory() ) . 'inc/widget-work-hours.php' );	
	require_once( trailingslashit( get_template_directory() ) . 'inc/widget-office-location.php' );	
	require_once( trailingslashit( get_template_directory() ) . 'inc/swt-social.php' );	
	require_once( trailingslashit( get_template_directory() ) . 'inc/swt-header-contact-area.php' );	

	add_action( 'widgets_init', 'tb_register_widgets' ); 

	function tb_register_widgets() {
		register_widget( 'SWT_Popular_Posts_Widget' );		
		register_widget( 'SWT_Work_Hours' );		
		register_widget( 'SWT_Office_Contact' );		
	}
	
	 	
	/* Load widgets. */
	add_theme_support( 'hybrid-core-widgets' );

	/* Theme layouts. */
	add_theme_support( 
		'theme-layouts', 
		array(
			'1c'        => __( 'Full Width',                'swt' ),
			'2c-l'      => __( '2 Columns: Content / Sidebar', 'swt' ),
			'2c-r'      => __( '2 Columns: Sidebar / Content', 'swt' )
		)
	);

	/* Load stylesheets. */
	add_theme_support(
		'hybrid-core-styles',
		array( 'swt-fonts', 'parent', 'style' )
	);

	/* Enable custom template hierarchy. */
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* The best thumbnail/image script ever. */
	add_theme_support( 'get-the-image' );

	/* Pagination. */
	add_theme_support( 'loop-pagination' );

	/* Better captions for themes to style. */
	add_theme_support( 'cleaner-caption' );

	/* Automatically add feed links to <head>. */
	add_theme_support( 'automatic-feed-links' );
  
}