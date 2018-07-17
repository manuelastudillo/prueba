<?php

class SWT_Office_Contact extends WP_Widget {

	function __construct() {
		
		$widget_options = array( 'classname' => 'swt_office_hours', 'description' => __( 'Displays your office contact.', 'swt' ) );		
		parent::WP_Widget( 'SWT_Office_Contact', __( 'SWT - Office Location', 'swt' ), $widget_options );			
	}
		
	function form( $instance ) {
				
		$title   = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';				
		$address = isset( $instance['address'] ) ? esc_attr( $instance['address'] ) : '';				
		$phone   = isset( $instance['phone'] ) ? esc_attr( $instance['phone'] ) : '';					
		$email   = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';				
			
		?>
 
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'swt' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:', 'swt' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" value="<?php echo $address; ?>" />
		</p>				

		<p>
			<label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone:', 'swt' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" value="<?php echo $phone; ?>" />
		</p>				
		
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email:', 'swt' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo $email; ?>" />
		</p>				
 
		<?php
		
	}
	
	function update( $new_instance, $old_instance ) {
 
		$instance = $old_instance; 
		
		$instance['title']   = strip_tags( $new_instance['title'] );                                   
		$instance['address'] = strip_tags( $new_instance['address'] );				
		$instance['phone']   = strip_tags( $new_instance['phone'] );				
		$instance['email']   = strip_tags( $new_instance['email'] );				
				
	    return $instance;
	}
	
	function widget( $args, $instance ) {
	
		extract( $args );
		
		$title   = strip_tags( $instance['title'] );
		$address = strip_tags( $instance['address'] );
		$phone   = strip_tags( $instance['phone'] );
		$email   = strip_tags( $instance['email'] );
 
		echo $before_widget;
						
		if ( ! empty( $title ) )
			echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;	
		?>
		
  		<ul class="company-info no-margin no-columns">
			<?php if ( ! empty( $address ) ) : ?>  				
				<li><i class="fa fa-map-marker"></i>
				<?php echo $address; ?></li>
			<?php endif ?>
			<?php if ( ! empty( $phone ) ) : ?>  				
				<li><i class="fa fa-phone"></i>
				<?php echo $phone; ?></li>
			<?php endif ?>
			<?php if ( ! empty( $email ) ) : ?>  				
				<li><i class="fa fa-envelope-o"></i>
				<?php echo $email; ?></li>
			<?php endif ?>  	
  		</ul>

		<?php echo $after_widget;		
	}
		 
}

?>