<?php
/*
	Plugin Name: Flickr Widget
	Description: Plugin is used for Flickr pictures.
	Author:
	Version: 1.0
	Author URI:  
*/

class flickr_widget extends WP_Widget {
/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function flickr_Widget() {

	$widget_options = array(
		'classname' => 'flickr_widget',
		'description' => esc_html__('Custom Flickr widget.','xavier'));

	$control_options = array(    
		'width' => 200,
		'height' => 400,
		'id_base' => 'flickr_widget'
	);

	parent::__construct( 'flickr_widget', esc_html__('Pego - Flickr Widget','xavier'), $widget_options, $control_options );
	
}
function widget( $args, $instance ) {
	
	extract( $args );
	$title = apply_filters('widget_title', $instance['title'] );
	$username = $instance['username'];
	$pics_number = $instance['pics_number'];
	echo $before_widget;	
	if ( $title )
	{
		echo $before_title;
		echo $title;
		echo $after_title;
	}
	?>
		<div id="flickr_badge_wrapper">
 			<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?show_name=1&amp;count=<?php echo $pics_number; ?>&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=<?php echo $username; ?>"></script>
		</div>
		<div class="clear"></div><?php
	echo $after_widget;	
}
function form( $instance ) {  

		/* Set default values. */
		$defaults = array(
		'title' => esc_html__('Flickr Widget','xavier'),
		'username' => '52617155@N08',
		'pics_number' => '9'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 

	 ?>

		<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php esc_html_e('Title:','xavier'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" 
				 name="<?php echo $this->get_field_name( 'title' ); ?>" 
				 value="<?php echo $instance['title']; ?>" />
		</label>
																													
		<label for="<?php echo $this->get_field_id( 'username' ); ?>">		
		<?php esc_html_e('Flickr username:','xavier'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'username' ); ?>" 
				 name="<?php echo $this->get_field_name( 'username' ); ?>" 
				 value="<?php echo $instance['username']; ?>" />
		</label>
		
		<?php esc_html_e('Number of pictures:','xavier'); ?>		
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'pics_number' ); ?>" 
				 name="<?php echo $this->get_field_name( 'pics_number' ); ?>" 
				 value="<?php echo $instance['pics_number']; ?>" />
		</label>

			
	<?php
	}
}


/*     Adding widget to widgets_init and registering flickr widget    */
add_action( 'widgets_init', 'flickr_widgets' );

function flickr_widgets() {
	register_widget( 'flickr_Widget' );
}
?>