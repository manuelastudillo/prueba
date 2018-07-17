<?php

class SWT_Work_Hours extends WP_Widget {

	function __construct() {
		
		$widget_options = array( 'classname' => 'swt_office_hours', 'description' => __( 'Displays your work hours (Monday to Friday).', 'swt' ) );		
		parent::WP_Widget( 'SWT_Work_Hours', __( 'SWT - Office Hours', 'swt' ), $widget_options );			
	}
		
	function form( $instance ) {
				
		$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';				
		$days  	= isset( $instance['days'] ) ? esc_attr( $instance['days'] ) : '';				
		$sat  	= isset( $instance['sat'] ) ? esc_attr( $instance['sat'] ) : '';					
		$sun  	= isset( $instance['sun'] ) ? esc_attr( $instance['sun'] ) : '';				
			
		?>
 
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'swt' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_id( 'days' ); ?>"><?php _e( 'Work hours:', 'swt' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'days' ); ?>" name="<?php echo $this->get_field_name( 'days' ); ?>" value="<?php echo $days; ?>" />
		</p>				

		<p>
			<label for="<?php echo $this->get_field_id( 'sat' ); ?>"><?php _e( 'Saturday:', 'swt' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'sat' ); ?>" name="<?php echo $this->get_field_name( 'sat' ); ?>" value="<?php echo $sat; ?>" />
		</p>				
		
		<p>
			<label for="<?php echo $this->get_field_id( 'sun' ); ?>"><?php _e( 'Sunday:', 'swt' ); ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'sun' ); ?>" name="<?php echo $this->get_field_name( 'sun' ); ?>" value="<?php echo $sun; ?>" />
		</p>				
 
		<?php
		
	}
	
	function update( $new_instance, $old_instance ) {
 
		$instance = $old_instance; 
		
		$instance['title'] = strip_tags( $new_instance['title'] ); 
		$instance['days']  = strip_tags( $new_instance['days'] );				
		$instance['sat']   = strip_tags( $new_instance['sat'] );				
		$instance['sun']   = strip_tags( $new_instance['sun'] );				
				
	    return $instance;
	}
	
	function widget( $args, $instance ) {
	
		extract( $args );
		
		$title = strip_tags( $instance['title'] );
		$days  = strip_tags( $instance['days'] );
		$sat   = strip_tags( $instance['sat'] );
		$sun   = strip_tags( $instance['sun'] );
 
		echo $before_widget;
						
		if ( ! empty( $title ) )
			echo $before_title . apply_filters( 'widget_title', $title ) . $after_title;	
		?>
		
  		<ul class="company-info no-margin no-columns">
  			<?php if ( ! empty( $days ) ) : ?>  				
	  			<li><i class="fa fa-check-circle-o"></i>
	  			<?php echo $days; ?></li>
  			<?php endif ?>
  			<?php if ( ! empty( $sat ) ) : ?>  				
	  			<li><i class="fa fa-check-circle-o"></i>
	  			<?php echo $sat; ?></li>
  			<?php endif ?>
  			<?php if ( ! empty( $sun ) ) : ?>  				
	  			<li><i class="fa fa-times-circle-o"></i>
	  			<?php echo $sun; ?></li>
  			<?php endif ?>  	
  		</ul>

		<?php echo $after_widget;		
	}
		 
}

?>