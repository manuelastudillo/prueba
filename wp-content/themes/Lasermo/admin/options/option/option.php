<?php 

require_once( 'tabs-content.php' );

$theme = wp_get_theme();
$themeName = preg_replace('/([a-z0-9])?([A-Z])/','$1 $2', $theme->get( "Name" ));

$options = array( 
	'title' => sprintf( __( '%s Settings', 'swt' ), $themeName ),
	'logo'  => 'logo.png',
	'menus' => 
	
	array(
			
		array(
			'title'    => __( 'General', 'swt' ),
			'name'     => 'general',
			'icon'     => 'font-awesome:fa-cogs	',
			'controls' => $tab_general,
		),
		
		array(
			'title'    => __( 'Layout', 'swt' ),
			'name'     => 'layout',
			'icon'     => 'font-awesome:fa-columns',
			'controls' => $tab_layout,
		),	
				
		array(
			'title' => __( 'Scripts', 'swt' ),
			'name'  => 'scripts',
			'icon'  => 'font-awesome:fa-code',
			'controls' => array(
				array(
					'type'   => 'section',
					'fields' => $tab_scripts
				),
			),
		),	
		
	) // end menus array
);

return $options; 

?>