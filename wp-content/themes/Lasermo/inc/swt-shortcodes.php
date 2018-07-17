<?php 
/* Add shortcodes */
add_action( 'init', 'swt_register_shortcodes', 5 );

/**
* Registers shortcodes
* @since 1.0
*/
function swt_register_shortcodes() {
	
	add_shortcode( 'section', 'swt_section_shortcode' );	
	add_shortcode( 'separator', 'swt_separator' );		
	add_shortcode( 'row', 'swt_column_row' );		
	add_shortcode( 'tabber', 'swt_tabber' );	
	add_shortcode( 'tab', 'swt_tab' );	
	add_shortcode( 'carousel', 'swt_carousel' );	
	add_shortcode( 'slider', 'swt_slider' );	
	add_shortcode( 'slide', 'swt_slide' );	
	add_shortcode( 'testemonials', 'swt_testemonials' );	
	add_shortcode( 'testemonial', 'swt_testemonial' );	
	add_shortcode( 'latest_posts', 'swt_latest_posts' );	

	$columns = array(
		'one_full',
		'one_half',
		'one_third',
		'one_fourth',
		'one_fifth',
		'two_thirds',
		'three_fourths',
		'two_fifths',
		'three_fifths',
		'four_fifths',
	);
	
	foreach( $columns as $column ) {
		add_shortcode( $column, 'swt_column_shortcode' );
	}	

}

/* Creates section */
function swt_section_shortcode( $atts, $content = null ) {

    extract( shortcode_atts( 
		array(
			'center' => 'false',
		),
		$atts ) );
 
	if ( $center == 'true' )	
		return '<div class="wrap">' . do_shortcode( $content ) . '</div>';		
	else 
		return do_shortcode( $content );		
}

function swt_separator( $atts ) {
	$height = ! empty( $atts['size'] ) ? intval( $atts['size'] ) : 0;
	return '<div style="height: '. $height .'px"></div>';
}

function swt_tabber( $atts, $content = null ) {
	
	extract( 
		shortcode_atts( array(
			'auto'    => 'true',
			'pause'   => 4000,
			'attach'  => 'false'
		), $atts )
	);
	
	$auto  = ( $auto == 'true' ) ? true : false;
	$attach  = ( $attach == 'true' ) ? true : false;
	$pause  = ! empty( $pause ) ? absint( $pause ) : 4000;

	$tabber_params = array(
		'auto'  => esc_js( $auto ),
		'pause' => esc_js( $pause )	
	);

	wp_enqueue_script( 'swt-slider' );
	wp_localize_script( 'swt-custom-js', 'ParamsTabber', $tabber_params ); 

	$content = do_shortcode( $content );
 
	$tabber = preg_split( '/<!--Pager-->(.+?)<!--EndPager-->/', $content, -1, PREG_SPLIT_DELIM_CAPTURE );
	
	$tab_content = '';
	$tab_pager   = '';
	$count       = 1;
	
	foreach( $tabber as $tab ) {
		
		if ( $count % 2 != 0 ) 
			$tab_content .= $tab;
		else 
			$tab_pager .= $tab;
		
		$count++;
	}
 	
	$class = ( $attach === true ) ? ' attach-to-slider' : '';

	$html  = '<div class="tab-wrapper row'. $class .'">';
	$html .= '<div class="tab-shortcode-wrap col-7-12 right">';
	$html .= '<ul class="tab-shortcode no-margin">' . $tab_content .'</ul>';
	$html .= '</div>';
	$html .= '<div class="tab-pager col-5-12 left">'.$tab_pager.'</div>';
	$html .= '</div><!--.tab-wrapper-->';

	return $html;

}

global $tab_count;
$tab_count = 0;

function swt_tab( $atts ) {
 
 	extract( 
		shortcode_atts( array(
			'icon'          => 'fa-home',
			'title'         => '',
			'content_title' => '',
			'text'          => ''
		), $atts )
	);
 

 	$html  = '<li>';
 	$html .= ! empty( $title ) ? '<span>' . esc_attr( $title ) . '</span>' : '';
 	$html .= ! empty( $content_title ) ? '<h2 class="tab-title">' . esc_attr( $content_title ) . '</h2>' : '';
 	$html .= ! empty( $text ) ? '<p class="tab-text">' . esc_attr( $text ) . '</p>' : '';
  	$html .= '</li>';

  	global $tab_count;

 	$pager  = '<!--Pager-->';
 	$pager .= '<a data-slide-index="' . $tab_count . '" href="">';
 	$pager .= '<i class="fa ' . esc_attr( $icon ) . '"></i>';
 	$pager .= '<div class="nav-text">';
 	$pager .= '<span>' . esc_attr( $title ) . '</span>';
 	$pager .= '<p class="no-margin">'. substr( $text, 0, 70 ) .'</p>';
 	$pager .= '</div>';
 	$pager .= '</a>';
 	$pager .= '<!--EndPager-->';

  	$tab_count += 1;

	return $html . $pager;
}

function swt_carousel( $atts, $content = null ) {
	
 	if ( has_shortcode( $content, 'gallery' ) ) {

		extract( 
			shortcode_atts( array(
				'auto'  => 'true',
				'pause' => 4000,
				'title' => '',
			), $atts )
		);

		$gallery_title = ! empty( $title ) ? esc_attr( $title ) : '';
		$auto  = ( $auto == 'true' ) ? true : false;
		$pause  = ! empty( $pause ) ? absint( $pause ) : 4000;

		$carousel_params = array(
			'auto'  => esc_js( $auto ),
			'pause' => esc_js( $pause )	
		);

		wp_enqueue_script( 'swt-slider' );
		wp_localize_script( 'swt-custom-js', 'ParamsCarousel', $carousel_params ); 

		$search = array( '[gallery ids="', '"]' );
		$content = str_replace( $search, '', $content );
		$images_ids = explode( ",", $content );

		$html  = '<div class="gallery-wrap">';
		$html .= '<div class="custom-nav">';
			if ( ! empty( $gallery_title ) ) 
				$html .= '<h3 class="module-title">' . $gallery_title . '</h3>';
				$html .= '<p>';
					$html .= '<span class="arrow-nav" id="gallery-prev"></span>';
					$html .= '<span class="arrow-nav" id="gallery-next"></span>';
				$html .= '</p>';
		$html .= '</div><!-- .custom-nav -->';
		
			$html .='<ul class="gallery-slider">';
			foreach( $images_ids as $id ) {
				$image = wp_get_attachment_image( $id, 'swt-gallery' );				
				$html .= "<li>{$image}</li>";					
			} 
			$html .='</ul><!-- .gallery-slider -->';			
		$html .='</div><!-- .gallery-wrap-->';

		return $html;
 	}
}

function swt_slider( $atts, $content = null ) {

	extract( 
		shortcode_atts( array(
			'auto' 	=> 'true',
			'pause' => 4000 
		), $atts )
	);
	
	$auto = ( $auto == 'true' ) ? true : false;
	$pause  = ! empty( $pause ) ? absint( $pause ) : 4000;
 
	$slider_params = array(
		'auto' 		=> $auto, 
		'pause' 	=> $pause 	
	);
	
	wp_localize_script( 'swt-custom-js', 'ParamsSlider', $slider_params );		
	wp_enqueue_script( 'swt-slider' );
	
	$html = '<section id="slider"><ul class="shortcode-slider no-margin">'. do_shortcode( $content ) .'</ul></section>';	

	return $html;
}

function swt_slide( $atts ) {

	extract( 
		shortcode_atts( array(
			'src' 			=> '',
			'link' 			=> '',
			'title' 		=> '',
			'field' 		=> '',
			'field_link' 	=> '',
		), $atts )
	);
	
	$html = '<li>';
	
	if ( ! empty( $field ) ) {
		$field = '<span class="slider-cat">'. strip_tags( $field ) .'</span>';
		$field = ! empty( $field_link ) ? '<a class="slider-cat-link" href="'. esc_url( $field_link ) .'">'. $field .'</a>' : $field;
	}	
	
	$caption = '';
	$caption_html = '';
 		
	$title = ! empty( $title ) ? $caption .= '<h2 class="slider-title">'. strip_tags( $title ) .'</h2>' : false;
		
	if ( !empty( $caption ) ) {
		$caption_html  = '<div class="bx-caption">';
		$caption_html .= '<div class="wrap">';		
		$caption_html .= $field;
		$caption_html .= $title;
		$caption_html .= '</div></div>';
	}
			
	$img = '<img src="'. esc_url( $src ) .'" />';	
	if ( !empty( $link ) ) 
		$html .= '<a href="'.esc_url( $link ) .'">'. $img .'</a>';
	else
		$html .= $img;	
	$html .= $caption_html;	
	$html .= '</li>';
	
	return $html;
	
}

/* Creates columns */
function swt_column_shortcode( $atts, $content = null, $tag ) {
	
    $output = '<div class="col- ' . esc_attr( $tag ) .'">' . do_shortcode( $content ) . '</div>';
    return $output;
}

function swt_column_row( $atts, $content = null ) {
	return '<div class="row">' . do_shortcode( $content ) .'</div>';
}


function swt_testemonials( $atts, $content = null ) {

	extract( 
		shortcode_atts( array(
			'title' => '',
			'auto' 	=> 'true',
			'pause' => 4000 
		), $atts )
	);
	
	$auto = ( $auto == 'true' ) ? true : false;
	$pause  = ! empty( $pause ) ? absint( $pause ) : 4000;
	$testemonial_title = ! empty( $title ) ? esc_attr( $title ) : '';	
 
	$testemonials_params = array(
		'auto' 		=> $auto, 
		'pause' 	=> $pause 	
	);
	
	wp_localize_script( 'swt-custom-js', 'ParamsTestemonials', $testemonials_params );		
	wp_enqueue_script( 'swt-slider' );
	
	$html  = '<div class="testemonial-wrap">';
	$html .= '<div class="custom-nav">';
		if ( ! empty( $testemonial_title ) ) 
			$html .= '<h3 class="module-title">' . $testemonial_title . '</h3>';
			$html .= '<p>';
				$html .= '<span class="arrow-nav" id="testemonial-prev"></span>';
				$html .= '<span class="arrow-nav" id="testemonial-next"></span>';
			$html .= '</p>';
	$html .= '</div><!-- .custom-nav -->';	
	$html .= '<ul class="testemonial-slider no-margin">'. do_shortcode( $content ) .'</ul>';	
	$html .= '</div>';

	return $html;
}


function swt_testemonial( $atts ) {

	extract( 
		shortcode_atts( array(
			'src'    => '',
			'author' => '',
			'text'   => '',
		), $atts )
	);
	
	$html  = '<li>';
	$html .= '<div class="testemonial-content clear">';
	$html .= '<i class="fa fa-quote-left"></i>';
	
	if ( ! empty( $src ) )
		$html .= '<img src="' . esc_url( $src ) . '" alt="' . esc_attr( $author ) .'" />';
	
	$html .= '<p>' . strip_tags( $text ) . '</p>';
	
	if ( ! empty( $author ) )
	$html .= '<cite class="testemonial-author"><span itemprop="name">' . esc_attr( $author ) . '</span></cite>';
	$html .= '</div>';
	$html .= '</li>';

	return $html;
	
}

function swt_latest_posts( $atts ) {

	extract(
		shortcode_atts( array(
			'title'  => '',
			'auto'   => '',
			'pause'  => '',
			'number' => ''
		), $atts )
	);

	$title  = ! empty( $title ) ? esc_attr( $title ) : '';
	$auto   = ( $auto == 'true' ) ? true : false;
	$pause  = ! empty( $pause ) ? absint( $pause ) : 4000;
	$number = ! empty( $number ) ? absint( $number ) : 1;

	$args = array(
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $number,
		'ignore_sticky_posts' => true,   
		'order'               => 'DESC',
	);

	$lp_params = array(
		'auto' 		=> $auto, 
		'pause' 	=> $pause 	
	);
	
	wp_localize_script( 'swt-custom-js', 'ParamsLatestPosts', $lp_params );		
	wp_enqueue_script( 'swt-slider' );	

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		
		$html  = '<div class="post-slider-wrap">';
		$html .= '<div class="custom-nav">';
			if ( ! empty( $title ) ) 
				$html .= '<h3 class="module-title">' . $title . '</h3>';
				$html .= '<p>';
					$html .= '<span class="arrow-nav" id="lp-prev"></span>';
					$html .= '<span class="arrow-nav" id="lp-next"></span>';
				$html .= '</p>';
		$html .= '</div><!-- .custom-nav -->';	
		$html .= '<ul class="post-slider no-margin">';

		while ( $query->have_posts() ) {
			$query->the_post();
			$html .= '<li>';
			$html .= get_the_image( array( 'size' => 'swt-latest-shortcode', 'echo' => false, 'order' => array( 'featured', 'attachment' ) ) );
			$html .= '<div class="sh-post-content">';
			$html .= '<h4 class="latest-title"><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></h4>';
			$html .= '<p class="no-margin">';
			$html .= get_the_excerpt(); 
			$html .= '</p>';
			$html .= '<time '. hybrid_get_attr( 'entry-published' ) .'>'. get_the_date() .'</time>';
			$html .= '<span '. hybrid_get_attr( 'entry-author' ) .'>'. __( 'By ', 'swt' ) . get_the_author() .'</span>';
			$html .= '</li>';
		}

		$html .= '</ul>';
		$html .= '</div>';

	} else {
		$html .= __( 'No posts found!', 'swt' );
	}

	wp_reset_postdata();	

	return $html;
}

?>