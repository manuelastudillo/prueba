<?php

$nl = "</p><p>";
$ol = "<p>";
$cl = "</p>";

$img_dir = trailingslashit( get_template_directory_uri() ) . 'admin/options/img/';

return array(

	'Layout Elements' => array(
		'elements' => array(
			'section'  => array(
				'title' => 'Section',
				'code'  => $ol.'[section]'.$nl.__('Your content here', 'swt').$nl.'[/section]',
				'attributes' => array( 				
					array(
						'name'  => 'center',
						'type'  => 'toggle',
						'label' => __('Center section content in the middle of the site', 'swt'),
						'default' => 0,
					),				
				),
			),
 
			'column_full' => array(
				'title'   => '1/1 Column',
				'code'  =>  $ol.'[row]'.$nl.'[one_full]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_full]'.$nl.'[/row]'.$cl,	
			),				
 
			'columns_2_halfs' => array(
				'title'   => '1/2 + 1/2 Columns',
				'code'  =>  $ol.'[row]'.$nl.'[one_half]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_half]'.$cl .
							$ol.'[one_half]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_half]'.$nl.'[/row]'.$cl,
			),			

			'columns_3_thirds' => array(
				'title'   => '1/3 + 1/3 + 1/3 Columns',
				'code'  =>  $ol.'[row]'.$nl.'[one_third]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_third]'.$cl .
							$ol.'[one_third]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_third]'.$cl.
							$ol.'[one_third]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_third]'.$nl.'[/row]'.$cl,
			),	
			
			'columns_2_thirds' => array(
				'title'   => '2/3 + 1/3 Columns',
				'code'  =>  $ol.'[row]'.$nl.'[two_thirds]'.$nl.__('Add Content Here', 'swt').$nl.'[/two_thirds]'.$cl .
							$ol.'[one_third]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_third]'.$nl.'[/row]'.$cl,
			),				
			
			'columns_4_quarters' => array(
				'title'   => '1/4 + 1/4 + 1/4 + 1/4 Columns',
				'code'  =>  $ol.'[row]'.$nl.'[one_fourth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fourth]'.$cl .
							$ol.'[one_fourth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fourth]'.$cl.
							$ol.'[one_fourth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fourth]'.$cl.
							$ol.'[one_fourth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fourth]'.$nl.'[/row]'.$cl,
			),

			'columns_3_quarters' => array(
				'title'   => '3/4 + 1/4 Columns',
				'code'  =>  $ol.'[row]'.$nl.'[three_fourths]'.$nl.__('Add Content Here', 'swt').$nl.'[/three_fourths]'.$cl .
							$ol.'[one_fourth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fourth]'.$nl.'[/row]'.$cl,
			),					
			
			'columns_5_fifths' => array(
				'title'   => '1/5 + 1/5 + 1/5 + 1/5 + 1/5 Columns',
				'code'  =>  $ol.'[row]'.$nl.'[one_fifth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fifth]'.$cl .
							$ol.'[one_fifth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fifth]'.$cl.
							$ol.'[one_fifth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fifth]'.$cl.
							$ol.'[one_fifth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fifth]'.$cl.
							$ol.'[one_fifth]'.$nl.__('Add Content Here', 'swt').$nl.'[/one_fifth]'.$nl.'[/row]'.$cl,
			),

			'columns_2_fifths' => array(
				'title'   => '2/5 Column',
				'code'  =>  $ol.'[two_fifths]'.$nl.__('Add Content Here', 'swt').$nl.'[/two_fifths]'.$cl,					
			),				
			
			'columns_3_fifths' => array(
				'title'   => '3/5 Column',
				'code'  =>  $ol.'[three_fifths]'.$nl.__('Add Content Here', 'swt').$nl.'[/three_fifths]'.$cl,					
			),							
			
			'columns_4_fifths' => array(
				'title'   => '4/5 Column',
				'code'  =>  $ol.'[four_fifths]'.$nl.__('Add Content Here', 'swt').$nl.'[/four_fifths]'.$cl,					
			),										
			'separator' => array(
				'title'      => __('Separator / Whitespace', 'swt'),
				'code'  =>  $ol.'[separator]'.$cl,					
				'attributes' => array(
					'spacer' => array(
						'name'    => 'size',
						'type'    => 'textbox',
						'label'   => __('Separator Size', 'swt'),
						'default' => '0px'
					),								
				),								
			),			
		)
	),

	'Content Elements' => array(
		'elements' => array(

			'slider' => array(
				'title'      => __('Slider', 'swt'),
				'code'       => $ol.'[slider]'.$nl.'Add slides here'.$nl.'[/slider]'. $cl,
				'attributes' => array(
						 
					'slider_auto' => array(
						'name'    => 'auto',
						'type'    => 'toggle',
						'label'   => __('Auto slide', 'swt'),
						'default' => 1
					),	
					'slider_pause' => array(
						'name'    => 'pause',
						'type'    => 'textbox',
						'label'   => __('Time between slides in milliseconds', 'swt'),
						'default' => 4000,
					),		
				),				
			),			
			
			'slides' => array(
				'title'      => __('Slide', 'swt'),
				'code'       => $ol.'[slide]'.$cl,
				'attributes' => array(
				
					'slider_note' => array(
						'name'    => 'auto',
						'type'    => 'notebox',
						'status'  => 'info',
						'label'   => __('You need to add slides inside [slider][/slider] shortcode.', 'swt'),
						'default' => 1
					),					
				
					'slide_img' => array(
						'name'    => 'src',
						'type'    => 'upload',
						'label'   => __('Upload Image', 'swt'),
					),	
					'slide_url' => array(
						'name'    => 'link',
						'type'    => 'textbox',
						'label'   => __('Image Link', 'swt'),
					),	
					'slider_note2' => array(
						'name'    => 'auto',
						'type'    => 'notebox',
						'status'  => 'info',
						'label'   => __('Extra field will appear above slide title (can be use to emphasize something like promotion etc).', 'swt'),
						'default' => 1
					),							
					'slide_ft_text' => array(
						'name'    => 'field',
						'type'    => 'textbox',
						'label'   => __('Extra Field', 'swt'),
					),											
					'slide_ft_link' => array(
						'name'    => 'field_link',
						'type'    => 'textbox',
						'label'   => __('Field Link', 'swt'),
					),										
					'slide_title' => array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Slide Title', 'swt'),
					),						
				),
			), 

			'tabber' => array(
				'title'      => __('Tabber', 'swt'),
				'code'       => $ol.'[tabber]'.$nl.'Add tabs here'.$nl.'[/tabber]'. $cl,
				'attributes' => array(
						 
					'tabber_auto' => array(
						'name'    => 'auto',
						'type'    => 'toggle',
						'label'   => __('Automatically change tabs?', 'swt'),
						'default' => 1
					),	
					'tabber_pause' => array(
						'name'    => 'pause',
						'type'    => 'textbox',
						'label'   => __('Time between tab change in milliseconds', 'swt'),
						'default' => 4000,
					),	
					'tabber_attach' => array(
						'name'    => 'attach',
						'type'    => 'toggle',
						'label'   => __('Attach to slider?', 'swt'),
						'default' => 1
					),						
				),				
			),	
								
			'tabs' => array(
				'title'      => __('Tab', 'swt'),
				'code'       => $ol.'[tab]'.$cl,
				'attributes' => array(
				
					'tabber_note' => array(
						'name'    => 'auto',
						'type'    => 'notebox',
						'status'  => 'info',
						'label'   => __('You need to add tabs inside [tabber][/tabber] shortcode.', 'swt'),
						'default' => 1
					),					
					'tab_icon' => array(
						'name'    => 'icon',
						'type'    => 'fontawesome',
						'label'   => __('Icon', 'swt'),
					),				
					'tab_title' => array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Tab Title', 'swt'),
					),		
					'content_title' => array(
						'name'    => 'content_title',
						'type'    => 'textbox',
						'label'   => __('Content Title', 'swt'),
					),								
					'slide_text' => array(
						'name'    => 'text',
						'type'    => 'textarea',
						'label'   => __('Content Text', 'swt'),
					),	
				),
			), 		

			'carousel' => array(
				'title'      => __('Image Carousel', 'swt'),
				'code'       => $ol.'[carousel]'.$nl.'Insert gallery here.'.$nl.'[/carousel]'. $cl,
				'attributes' => array(

					'carousel_note' => array(
						'name'    => 'auto',
						'type'    => 'notebox',
						'status'  => 'info',
						'label'   => __('To add images to carousel, you need to create a gallery. Click on Add Media / Create Gallery, select / upload images you want, then click "Create a new gallery", and after that "Insert gallery".', 'swt'),
						'default' => 1
					),	

					'carousel_title' => array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Gallery Title', 'swt'),
						'default' => '',
					),						
					'carousel_auto' => array(
						'name'    => 'auto',
						'type'    => 'toggle',
						'label'   => __('Automatically slide?', 'swt'),
						'default' => 1
					),	
					'carousel_pause' => array(
						'name'    => 'pause',
						'type'    => 'textbox',
						'label'   => __('Time between slides in milliseconds', 'swt'),
						'default' => 4000,
					),	
				),				
			),	

			'testemonials' => array(
				'title'      => __('Testemonials Slider', 'swt'),
				'code'       => $ol.'[testemonials]'.$nl.'Add testemonials here'.$nl.'[/testemonials]'. $cl,
				'attributes' => array(
					'testemonials_title' => array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Testemonial Slider Title', 'swt'),
					),							 
					'testemonials_auto' => array(
						'name'    => 'auto',
						'type'    => 'toggle',
						'label'   => __('Auto slide', 'swt'),
						'default' => 1
					),	
					'testemonials_pause' => array(
						'name'    => 'pause',
						'type'    => 'textbox',
						'label'   => __('Time between slides in milliseconds', 'swt'),
						'default' => 4000,
					),		
				),				
			),			
			
			'testemonial' => array(
				'title'      => __('Testemonial', 'swt'),
				'code'       => $ol.'[testemonial]'.$cl,
				'attributes' => array(
				
					'testemonial_note' => array(
						'name'    => 'auto',
						'type'    => 'notebox',
						'status'  => 'info',
						'label'   => __('You need to add testemonial inside [testemonials][/testemonials] shortcode.', 'swt'),
						'default' => 1
					),					
					'testemonial_img' => array(
						'name'    => 'src',
						'type'    => 'upload',
						'label'   => __('Upload Image', 'swt'),
					),						
					'testemonial_author' => array(
						'name'    => 'author',
						'type'    => 'textbox',
						'label'   => __('Testemonial By:', 'swt'),
					),																				
					'testemonial_text' => array(
						'name'    => 'text',
						'type'    => 'textarea',
						'label'   => __('Testemonial Text', 'swt'),
					),						
				),
			), 
			'latest_posts' => array(
				'title'      => __('Latest Posts Slider', 'swt'),
				'code'       => $ol.'[latest_posts]'. $cl,
				'attributes' => array(
					'latest_posts_title' => array(
						'name'    => 'title',
						'type'    => 'textbox',
						'label'   => __('Title', 'swt'),
					),							 
					'latest_posts_auto' => array(
						'name'    => 'auto',
						'type'    => 'toggle',
						'label'   => __('Auto slide', 'swt'),
						'default' => 1
					),	
					'latest_posts_pause' => array(
						'name'    => 'pause',
						'type'    => 'textbox',
						'label'   => __('Time between slides in milliseconds', 'swt'),
						'default' => 4000,
					),
					'latest_posts_number' => array(
						'name'    => 'number',
						'type'    => 'textbox',
						'label'   => __('Number of posts to show', 'swt'),
						'default' => 3,
					),								
				),				
			),						
		),
	),
);

/**
 * EOF
 */