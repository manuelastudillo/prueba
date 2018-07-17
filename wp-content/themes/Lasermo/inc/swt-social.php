<?php 

function swt_social_profiles() { 

	if ( swt_get_option( 'swt_social_profiles', false ) == '' ) 
		return;
		
	else {
		$social_facebook 	= swt_get_option( 'social_facebook' ); 
		$social_twitter 	= swt_get_option( 'social_twitter' );
		$social_gplus  		= swt_get_option( 'social_google' ); 
		$social_youtube  	= swt_get_option( 'social_youtube' ); 
		$social_rss 		= swt_get_option( 'social_rss' ); 
		?>
		
		<ul id="social-profiles">
			<?php 
			if ( $social_facebook )
				echo '<li><a title="'. __( 'Follow us on Facebook!', 'swt' ) .'" class="fa fa-facebook" href="'. esc_url( $social_facebook ) .'" target="_blank"></a></li>';
				
			if ( $social_twitter )
				echo '<li><a title="'. __( 'Follow us on Twitter!', 'swt' ) .'" class="fa fa-twitter" href="'. esc_url( $social_twitter ) .'" target="_blank"></a></li>';			
				
			if ( $social_gplus )
				echo '<li><a title="'. __( 'Follow us on Google Plus!', 'swt' ) .'" class="fa fa-google-plus" href="'. esc_url( $social_gplus ) .'" target="_blank"></a></li>';
 							
			if ( $social_youtube )
				echo '<li><a title="'. __( 'Follow us on Youtube!', 'swt' ) .'" class="fa fa-youtube" href="'. esc_url( $social_youtube ) .'" target="_blank"></a></li>';
				
			if ( $social_rss )
				echo '<li><a title="'. __( 'Subscribe on RSS Feed!', 'swt' ) .'" class="fa fa-rss" href="'. esc_url( $social_rss ) .'" target="_blank"></a></li>';
			?>																				
		</ul>
<?php } 
} ?>