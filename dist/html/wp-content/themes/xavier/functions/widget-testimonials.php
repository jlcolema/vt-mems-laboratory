<?php

/*

	Plugin Name: Testimonials Widget
	Description: Plugin is used for latest posts.
	Version: 1.0
 
*/

class testimonials_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function testimonials_Widget() {

	$widget_options = array(
		'classname' => 'testimonials_widget',
		'description' => esc_html__('Custom testimonials widget.','xavier')
	);

	$control_options = array(   
		'width' => 200,
		'height' => 400,
		'id_base' => 'testimonials_widget'
	);

	parent::__construct( 'testimonials_widget', esc_html__('Pego - Testimonials Widget','xavier'), $widget_options, $control_options );
	
}



function widget( $args, $instance ) {
	
	extract( $args );
	global $post;
	

	
	$title = apply_filters('widget_title', $instance['title'] );
	$description = $instance['description'];

	global $post;
	
	echo $before_widget;
	
	if ( $title )
	{
		echo $before_title;
		echo $title;
		echo $after_title;
	}
	
	wp_enqueue_script('pego_owl_carousel');
	$output = '<div class="owl-carousel owl-theme testimonials-wrapper testimonial-widget">';
		$allTestimonials1 = pego_get_all_test();
		if ($description != '') {
			$allTestimonials = array();
			$single_test = explode(", ", $description);	
			foreach($single_test as $currentTest)  {
				$key = array_search($currentTest, $allTestimonials1); 
				$allTestimonials[$key] = $currentTest;
			}
		
		} else {
			$allTestimonials = pego_get_all_test();	
		}
		foreach($allTestimonials as $key => $singleTestimonial) {
			$currrentTestimonial = get_post($key);
			$content = $currrentTestimonial->post_content;
			$author = get_post_meta($key, 'test_name' , true);
			$test_image = get_post_meta($key, 'test_image' , true);
			$output .= '<div class="item testimonials-wrapper">';
				if ($test_image != '') {
					$output .= '<img class="testimonial-image" alt="'.esc_attr($author).'" src="'.esc_url($test_image).'" />';
					$output .= '<div class="clear"></div>';
				}
				$output .= '<div>';
					$output .= '<div class="testimonial-content">'.$content.'</div>';
					$output .= '<div class="testimonial-author">'.esc_html($author).'</div>';
				$output .= '</div>';
			$output .= '</div>';

		}
	$output .= '</div>';

	echo $output; 
	?>
	<div class="clear"></div>		
	<?php
	echo $after_widget;
}


function form( $instance ) {  

	/* Set the default values  */
		$defaults = array(
		'title' => 'Testimonials Posts Widget'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		
		$allTest= pego_get_all_test();
		$number_of_test = count($allTest);
		$list_allTest = '';
		$current=0;
		if ($allTest) {
			foreach($allTest as $key => $value) {
				$current++;
				if ($current == $number_of_test) {
					$list_allTest .= $value;	
					
				}
				else
				{
					$list_allTest .= $value.", ";
				}	
			}	
		}

	 ?>

		<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php _e('Title:','xavier'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" 
				 name="<?php echo $this->get_field_name( 'title' ); ?>" 
				 value="<?php echo $instance['title']; ?>" />
		</label>
																													
		<label for="<?php echo $this->get_field_id( 'description' ); ?>">
		<?php _e('Testimonials:','xavier'); ?>
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'description' ); ?>" 
				 name="<?php echo $this->get_field_name( 'description' ); ?>"  ><?php echo $instance['description']; ?></textarea>
				 <?php _e('Notice: You may choose from ','xavier'); ?><?php echo $list_allTest; ?><?php _e('. Divide them with ", "','xavier'); ?>
		</label>
		
	<?php
	}
}


/*     Adding widget to widgets_init   */
add_action( 'widgets_init', 'testimonials_widgets' );

function testimonials_widgets() {
	register_widget( 'testimonials_Widget' );
}
?>