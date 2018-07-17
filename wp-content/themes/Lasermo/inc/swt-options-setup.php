<?php
$theme_dir = trailingslashit( get_template_directory() );

/**
 * Include Vafpress Framework
 */
require_once ( $theme_dir . 'admin/bootstrap.php' );

/**
 * Load options, metaboxes, and shortcode generator array templates.
 */

// options
$tmpl_opt  = $theme_dir . 'admin/options/option/option.php';

// shortocode generators
$tmpl_sg1  = $theme_dir . 'admin/options/shortcode_generator/shortcodes.php';

function swt_theme_name() {
	$theme_name = wp_get_theme(); 
	$theme_name = preg_replace( "/\W/", "_", strtolower( $theme_name ) );
	return $theme_name;
}
/**
 * Create instance of Options
 */
$theme_options = new VP_Option(array(
	'is_dev_mode'           => false,                                  // dev mode, default to false
	'option_key'            => swt_theme_name(),                           // options key in db, required
	'page_slug'             => swt_theme_name(),                           // options page slug, required
	'template'              => $tmpl_opt,                              // template file path or array, required
	'menu_page'             => 'themes.php',                           // parent menu slug or supply `array` (can contains 'icon_url' & 'position') for top level menu
	'use_auto_group_naming' => true,                                   // default to true
	'use_util_menu'         => true,                                   // default to true, shows utility menu
	'minimum_role'          => 'edit_theme_options',                   // default to 'edit_theme_options'
	'layout'                => 'fixed',                                // fluid or fixed, default to fixed
	'page_title'            => __( 'Theme Options', 'swt' ), 		   // page title
	'menu_label'            => __( 'Theme Options', 'swt' ), 		   // menu label
));
 
 
function swt_get_option( $name, $default = false ) {

	$option = vp_option( swt_theme_name()."." . $name );
	
	if ( isset( $option ) )
		return $option; 
	else 
		return $default;
	
}


/**
 * Create instances of Shortcode Generator
 */
$tmpl_sg1 = array(
	'name'           => 'sg_1',                                        // unique name, required
	'template'       => $tmpl_sg1,                                     // template file or array, required
	'modal_title'    => __( 'Lasermo Shortcodes', 'swt'), 		   // modal title, default to empty string
	'button_title'   => __( 'Lasermo Shortcodes', 'swt'),              		   // button title, default to empty string
	'types'          => array( 'post', 'page' ),                       // at what post types the generator should works, default to post and page
	'included_pages' => array( "appearance_page_".swt_theme_name() ),         // or to what other admin pages it should appears
);
 

$sg1 = new VP_ShortcodeGenerator($tmpl_sg1);

 
/*
 * EOF
 */