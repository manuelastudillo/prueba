<?php 

function swt_header_contact_area() {

	if ( swt_get_option( 'swt_contact' ) == true ) { ?>
		
		<div id="header-contact">
			<div class="contact-item left">
				<i class="fa fa-phone"></i>			
				<span>
					<strong><?php echo swt_get_option( 'contact_phone' ); ?></strong><br />
					<?php echo swt_get_option( 'contact_email' ); ?>
				</span>
			</div><!-- .left -->
			<div class="contact-item left">
				<i class="fa fa-home"></i>
				<span>
					<strong><?php echo swt_get_option( 'contact_street' ); ?></strong><br />
					<?php echo swt_get_option( 'contact_city' ); ?>
				</span>
			</div><!-- .left -->
			<div class="contact-item left no-margin">
				<i class="fa fa-clock-o"></i>
				<span>
					<strong><?php echo swt_get_option( 'contact_days' ); ?></strong><br />
					<?php echo swt_get_option( 'contact_hours' ); ?>
				</span>
			</div><!-- .left -->
 		</div><!-- #header-contact -->

	<?php }
}

?>
