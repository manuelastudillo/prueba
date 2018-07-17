<?php
/**
 * Sets up custom filters and actions for the theme.  This does things like sets up sidebars, menus, scripts, 
 * and lots of other awesome stuff that WordPress themes do.
 */

/* Register custom image sizes. */
add_action( 'init', 'swt_register_image_sizes', 5 );

/* Register custom menus. */
add_action( 'init', 'swt_register_menus', 5 );

/* Register sidebars. */
add_action( 'widgets_init', 'swt_register_sidebars', 5 );

/* Add custom scripts. */
add_action( 'wp_enqueue_scripts', 'swt_enqueue_scripts' );

/* Register custom styles. */
add_action( 'wp_enqueue_scripts',    'swt_register_styles', 0 );

/* Filters the excerpt length. */
add_filter( 'excerpt_length', 'swt_excerpt_length' );

/* Remove read more in excerpt */
add_filter( 'excerpt_more', 'swt_read_more' );

/* Main theme layout */
add_filter( 'get_theme_layout', 'main_theme_layout' );

/* Adds custom attributes to the subsidiary sidebar. */
add_filter( 'hybrid_attr_sidebar', 'swt_sidebar_subsidiary_class', 10, 2 );

/* Additional css classes for widgets */
add_filter( 'dynamic_sidebar_params', 'swt_widget_classes' );

/* Disable sidebar if 1 column layout */
add_filter( 'sidebars_widgets', 'swt_disable_sidebars' );
add_action( 'template_redirect', 'swt_one_column' );	

/* Remove allowed tags from comment form */
add_filter( 'comment_form_defaults', 'remove_comment_form_allowed_tags' );

/* Remove gallery inline styles */
add_filter( 'use_default_gallery_style', '__return_false' );

/* Adds logo to site title. */
add_filter( 'hybrid_site_title', 'swt_site_title' );

/* Extra body classes. */
add_filter( 'body_class', 'extra_classes' );

/* Add header scripts, custom css and favicon to <head> */
add_action( 'wp_head', 'swt_head_hooks' );

/* Add footer scripts to </body> */
add_action( 'wp_footer', 'swt_footer_scripts' ); 

/* Exclude sticky posts from home page. */
add_action( 'pre_get_posts', 'swt_exclude_sticky' );

 
/**
 * Registers custom image sizes for the theme.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function swt_register_image_sizes() {

	/* Sets the 'post-thumbnail' size. */
	set_post_thumbnail_size( 150, 150, true );

	/* Popular widget image size. */
	add_image_size( 'swt-widget-image', 85, 85, true );        	

	/* Latest Posts shortcode image size. */
	add_image_size( 'swt-latest-shortcode', 180, 123, true );    

	/* SWT medium size */
	add_image_size( 'swt-medium', 220, 165, true );    

	/* Gallery image size. */    	
	add_image_size( 'swt-gallery', 285, 205, true );        	

	/* Featured widget image */
	add_image_size( 'swt-featured-image', 300, 185, true );   
	
	/* Post image size */
	add_image_size( 'swt-post-image', 750, 325, true );        
	
}

/**
 * Registers nav menu locations.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function swt_register_menus() {
	register_nav_menu( 'primary',    _x( 'Primary',    'nav menu location', 'swt' ) );
	register_nav_menu( 'secondary',  _x( 'Secondary',  'nav menu location', 'swt' ) );
}

/**
 * Registers sidebars.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function swt_register_sidebars() {
 
	hybrid_register_sidebar(
		array(
			'id'          => 'primary',
			'name'        => _x( 'Primary', 'sidebar', 'swt' ),
			'description' => __( 'The main sidebar. It is displayed on either the left or right side of the page based on the chosen layout.', 'swt' )
		)
	);

	hybrid_register_sidebar(
		array(
			'id'          => 'subsidiary',
			'name'        => _x( 'Subsidiary', 'sidebar', 'swt' ),
			'description' => __( 'A sidebar located in the footer of the site. Optimized for one, two, three or four widgets (and multiples thereof).', 'swt' )
		)
	);
}

/**
 * Enqueues scripts.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function swt_enqueue_scripts() {

	$theme_dir = trailingslashit( get_template_directory_uri() );

	wp_register_script( 'swt-fitvids', $theme_dir . 'js/fitvids.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'swt-fitvids' );

	wp_register_script( 'swt-responsive-js', $theme_dir . 'js/responsive-nav.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'swt-responsive-js' );

	wp_register_script( 'swt-custom-js', $theme_dir . 'js/custom.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'swt-custom-js' );

	wp_register_script( 'swt-slider', $theme_dir . 'js/slider.js', array( 'jquery' ), null, true );
	
 	/* Check if menus are active. */
	if ( has_nav_menu( 'primary' ) )  
		wp_localize_script( 'swt-custom-js', 'primary_on', '' ); 		
 
	if ( has_nav_menu( 'secondary' ) )  
		wp_localize_script( 'swt-custom-js', 'secondary_on', '' ); 		
 	
}

/**
 * Registers custom stylesheets for the front end.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function swt_register_styles() {
	
	/* Font Icon Font */
	wp_register_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css' );	
	wp_enqueue_style( 'font-awesome' );
	
	/* Theme Font */
	wp_register_style( 'font-roboto', 'http://fonts.googleapis.com/css?family=Roboto:300,500,700' );	
	wp_enqueue_style( 'font-roboto' );	
}
 

/**
 * Adds a custom excerpt length.
 *
 * @since  1.0.0
 * @access public
 * @param  int     $length
 * @return int
 */
function swt_excerpt_length( $length ) {
	return 60;
}

function swt_read_more( $more ) {
	global $post;
	return '';	
}

/*
* Default layout
*/
function main_theme_layout( $layout ) {


	return $layout;
}

/**
 * Adds a custom class to the 'subsidiary' sidebar.  This is used to determine the number of columns used to 
 * display the sidebar's widgets.  This optimizes for 1, 2, 3 and 4 columns or multiples of those values.
 *
 * Note that we're using the global $sidebars_widgets variable here. This is because core has marked 
 * wp_get_sidebars_widgets() as a private function. Therefore, this leaves us with $sidebars_widgets for 
 * figuring out the widget count.
 * @link http://codex.wordpress.org/Function_Reference/wp_get_sidebars_widgets
 *
 * @since  1.0.0
 * @access public
 * @param  array  $attr
 * @param  string $context
 * @return array
 */
function swt_sidebar_subsidiary_class( $attr, $context ) {

	if ( 'subsidiary' === $context ) {
		global $sidebars_widgets;

		if ( is_array( $sidebars_widgets ) && !empty( $sidebars_widgets[ $context ] ) ) {

			$count = count( $sidebars_widgets[ $context ] );
			
			if ( ( $count == 4 ) || $count > 4 )
				$attr['class'] .= ' sidebar-col-4';
				
			elseif ( !( $count % 3 ) )
				$attr['class'] .= ' sidebar-col-3';				

			elseif ( !( $count % 2 ) )
				$attr['class'] .= ' sidebar-col-2';

			else
				$attr['class'] .= ' sidebar-col-1';

		}
	}

	return $attr;
}
 
   
/**
 * Adding .widget-first and .widget-last classes to widgets.
 * Class .widget-last used to reset margin-right to zero in subsidiary sidebar for the last widget.
 *
 * @since 0.1.0
 */
function swt_widget_classes( $params ) {

	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets

	if ( !$my_widget_num ) { // If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if ( !isset( $arr_registered_widgets[$this_id] ) || !is_array( $arr_registered_widgets[$this_id] ) ) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if ( isset( $my_widget_num[$this_id] ) ) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else {  // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class="widget-' . $my_widget_num[$this_id] . ' ';  // Add a widget number class for additional styling options

	if ( $my_widget_num[$this_id] == 1 ) {  // If this is the first widget
		$class .= 'widget-first ';
	} elseif( $my_widget_num[$this_id] == count( $arr_registered_widgets[$this_id] ) ) { // If this is the last widget
		$class .= 'widget-last ';
	}

	$params[0]['before_widget'] = str_replace( 'class="', $class, $params[0]['before_widget'] ); // Insert our new classes into "before widget"

	return $params;

}

/**
 * Disables sidebars if viewing a one-column page.
 *
 * @since 0.1.0
 */
function swt_disable_sidebars( $sidebars_widgets ) {
	
	global $wp_query;

	if ( current_theme_supports( 'theme-layouts' ) ) {

		if ( 'layout-1c' == theme_layouts_get_layout() || is_page_template( 'templates/template-full.php' ) ) {
			$sidebars_widgets['primary'] = false;
		}
                
	}

	return $sidebars_widgets;
}

/**
 * Function for deciding which pages should have a one-column layout.
 *
 * @since 0.1.0
 */ 
function swt_one_column() {

	if ( !is_active_sidebar( 'primary' ) || is_attachment() && wp_attachment_is_image() )
		add_filter( 'get_theme_layout', 'swt_theme_layout_one_column' );

	elseif ( is_attachment() && 'layout-default' == theme_layouts_get_layout() )
		add_filter( 'get_theme_layout', 'swt_theme_layout_one_column' );
}

/**
 * Filters 'get_theme_layout' by returning 'layout-1c'.
 *
 * @since 0.2.0
 */
function swt_theme_layout_one_column( $layout ) {
	return 'layout-1c';
}

/* Disables comments allowed tags */
function remove_comment_form_allowed_tags( $defaults ) {
 
	$defaults['comment_notes_after'] = '';
	return $defaults;
	 
}

/* Checks if logo is set, then set's the image. */
function swt_site_title( $title ) {
	
	$logo = swt_get_option( 'logo' );

	if ( ! empty( $logo ) ) {
        $tag = ( is_front_page() ) ? 'h1' : 'div';
        $title = get_bloginfo( 'name' );
        $site_url = get_option( 'siteurl' );
        $img = '<a title="'. esc_attr( $title ) .'" href="'. esc_url( $site_url ) .'"><img src="'. esc_url( $logo ) .'" alt="'. esc_attr( $title ) .'" class="logo" /></a>';
        $title = sprintf( '<%1$s id="site-title">%2$s</%1$s>', tag_escape( $tag ), $img );    
	} 		
	return $title;
}

/* Adds extra classes to body. */
function extra_classes( $classes ) {
	
	if ( swt_get_option( 'swt_social_profiles', false ) )
		$classes[] = 'social-icons-on';

	if ( swt_get_option( 'swt_contact' ) == true )
		$classes[] = 'header-contact-on';

	if ( swt_get_option( 'top_search', false ) )
		$classes[] = 'search-on';	

	
	return $classes;
}


/* Functions from theme options - header scripts, custom css and favicon */
function swt_head_hooks() {
	
	$header_scripts = swt_get_option( 'header_scripts' ); 
	$custom_css = swt_get_option( 'custom_css' );
	$favicon = swt_get_option( 'favicon' ); 
	$output = '';
	
	if ( $favicon ) { 
		$output .= "<link rel=\"shortcut icon\" href=\"{$favicon}\" />\n";
	}		
	
	if ( $header_scripts ) 
		$output .= $header_scripts ."\n";
	
	if ( $custom_css ) 
		$output .= "<style type=\"text/css\">\n". $custom_css ."\n</style>\n";
	
	echo $output; 
}

/* Adds footer scripts */
function swt_footer_scripts() {
	
	$footer_scripts = swt_get_option( 'footer_scripts' ); 
	
	if ( $footer_scripts )
		echo $footer_scripts . "\n";

}

/**
 * Excluding sticky posts from home page if slider enabled. Sticky posts are in a slider.
 * 
 * @since 0.1
 */
function swt_exclude_sticky( $query ) {
	
	/* Exclude if is home and is main query. */
	if ( is_home() && $query->is_main_query() && swt_get_option( 'swt_slider' ) == 1 )
		$query->set( 'post__not_in', get_option( 'sticky_posts' ) );
	
}

/*this function allows for the auto-creation of post excerpts*/
function truncate_post( $amount,$quote_after=false ) {
	$truncate = get_the_content();
	$truncate = apply_filters('the_content', $truncate);
	$truncate = preg_replace('@<script[^>]*?>.*?</script>@si', '', $truncate);
	$truncate = preg_replace('@<style[^>]*?>.*?</style>@si', '', $truncate);
	$truncate = strip_tags($truncate);
	$truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' '));
	echo $truncate;
	echo "...";
	if ($quote_after) echo('');
} 

/* Fix empty paragraphs in shortcodes */
add_filter( 'the_content', 'shortcode_empty_paragraph_fix' );

/* 
* Removes empty <p></p> tags
*
* @since 1.0
*/
function shortcode_empty_paragraph_fix( $content ) {
	$array = array (
	'<p>[' => '[',
	']</p>' => ']',
	']<br />' => ']'
	);
	 
	$content = strtr($content, $array);
 
	return $content;
}