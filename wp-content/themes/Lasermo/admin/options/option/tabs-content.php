<?php 

$tab_general = array( 
 
	array( 
		'type' => 'section',
		'title' => __('Favicon', 'swt'),
		'description' => __( 'A favicon (short for Favorite icon), is also known as a shortcut icon, Web site icon, URL icon or bookmark icon, most commonly 16x16 pixels, associated with a particular Web site or Web page. Accepted formats: .ico, .png and .gif.', 'swt' ),
		'fields' => array( 
 
			array(
				'type' => 'upload',
				'name' => 'favicon',
				'label' => __('Upload Favicon', 'swt'),				
				'default' => '',
			),
			
		),
	),
	
	array( 
		'type' => 'section',
		'title' => __('Logo', 'swt'),
		'description' => __( '', 'swt' ),
		'fields' => array( 
 
			array(
				'type' => 'upload',
				'name' => 'logo',
				'label' => __('Upload logo', 'swt'),				
				'default' => '',
			),
			
		),
	),	
	
	array( 
		'type' => 'section',
		'title' => __('Social Profiles', 'swt'),
		'fields' => array( 
 
			array(
				'type' => 'toggle',
				'name' => 'swt_social_profiles',
				'label' => __( "Enable Social Profiles?", "swt" ),
				'default' => 0,
			),	 
 
			array(
				'type' => 'textbox',
				'name' => 'social_facebook',
				'label' => __('Facebook URL', 'swt'),				
				'validation' => 'url'
			),
			
			array(
				'type' => 'textbox',
				'name' => 'social_twitter',
				'label' => __('Twitter URL', 'swt'),				
				'validation' => 'url'
			),			
			
			array(
				'type' => 'textbox',
				'name' => 'social_google',
				'label' => __('Google URL', 'swt'),				
				'validation' => 'url'
			),			
			
			array(
				'type' => 'textbox',
				'name' => 'social_youtube',
				'label' => __('Youtube URL', 'swt'),				
				'validation' => 'url'
			),			
			
			array(
				'type' => 'textbox',
				'name' => 'social_rss',
				'label' => __('RSS URL', 'swt'),				
				'validation' => 'url'
			),			
			
		),
	),

	array( 
		'type' => 'section',
		'title' => __('Header Contact', 'swt'),
		'fields' => array( 

			array(
				'type' => 'toggle',
				'name' => 'swt_contact',
				'label' => __( "Enable Header Contact Area?", "swt" ),
				'default' => 0,
			),	 

			array(
				'type' => 'textbox',
				'name' => 'contact_phone',
				'default' => '',
				'label' => __('Phone Number', 'swt'),
			),
			array(
				'type' => 'textbox',
				'name' => 'contact_email',
				'default' => '',
				'label' => __('Email', 'swt'),
			),		
			array(
				'type' => 'textbox',
				'name' => 'contact_street',
				'default' => '',
				'label' => __('Street', 'swt'),
			),	
			array(
				'type' => 'textbox',
				'name' => 'contact_city',
				'default' => '',
				'label' => __('City', 'swt'),
			),		

			array(
				'type' => 'textbox',
				'name' => 'contact_days',
				'default' => '',
				'label' => __('Work Days', 'swt'),
			),	

			array(
				'type' => 'textbox',
				'name' => 'contact_hours',
				'default' => '',
				'label' => __('Work Hours', 'swt'),
			),										
 					
		),
	),	


	array( 
		'type' => 'section',
		'title' => __('Top Search', 'swt'),
		'fields' => array( 

			array(
				'type'        => 'toggle',
				'name'        => 'top_search',
				'label'       => __( "Enable Top Search?", "swt" ),
				'default'     => 0,
			),
		),
	)		
);


$tab_layout = array( 
	
	array( 
		'type' => 'section',
		'title' => __('Site Layout', 'swt'),
		'fields' => array( 
		
			array(
				'type' => 'radioimage',
				'name' => 'site_layout',
				'label' => __('Default Site Layout For Singular Pages (post/page).', 'swt'),
				'items' => 
					array(
						array(
							'value' => 'layout-1c',
							'label' => __('Full Width', 'swt'),
							'img' => VP_URL.'/options/img/1cl.png',
						),
						array(
							'value' => 'layout-2c-l',
							'label' => __('Content / Sidebar', 'swt'),
							'img' => VP_URL.'/options/img/2cl.png',
						),
						array(
							'value' => 'layout-2c-r',
							'label' => __('Sidebar / Content', 'swt'),
							'img' => VP_URL.'/options/img/2cr.png',
						), 
					), 'default' => array( 'layout-2c-l' )
			),	
		),
	),
);

$tab_scripts = array( 
	
	array(
		'type' => 'codeeditor',
		'name' => 'header_scripts',
		'label' => __('Header Scripts', 'swt'),
		'description' => __('Add scripts before &lt;/head&gt; tag (ie tracking code or custom Javascript).', 'swt'),
		'theme' => 'github',
	),		

	array(
		'type' => 'codeeditor',
		'name' => 'footer_scripts',
		'label' => __('Footer Scripts', 'swt'),
		'description' => __('Add scripts before &lt;/body&gt; tag (ie tracking code or custom Javascript).', 'swt'),
		'theme' => 'github',
	),
	
	array(
		'type' => 'codeeditor',
		'name' => 'custom_css',
		'label' => __('Custom CSS', 'swt'),
		'description' => __('Write your custom CSS here.', 'swt'),
		'theme' => 'github',
		'mode' => 'css',
	),		

);
 

?>