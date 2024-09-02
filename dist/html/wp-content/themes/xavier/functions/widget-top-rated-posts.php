<?php

/*

	Plugin Name: Top Rated Posts
	Description: Plugin is used for top rated posts.
	Version: 1.0
 
*/

class top_rated_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function top_rated_Widget() {

	$widget_options = array(
		'classname' => 'top_rated_widget',
		'description' => esc_html__('Custom top rated posts.','xavier')
	);

	$control_options = array(   
		'width' => 200,
		'height' => 400,
		'id_base' => 'top_rated_widget'
	);

	parent::__construct( 'top_rated_widget', esc_html__('Pego - Top Rated Posts Widget','xavier'), $widget_options, $control_options );
	
}



function widget( $args, $instance ) {
	
	extract( $args );
	global $post;
	
	$order_select = 'date';
	$order_direction_select = 'DESC';
	
	$title = apply_filters('widget_title', $instance['title'] );
	$posts_number = $instance['posts_number'];



	global $post;
	
	echo $before_widget;
	
	if ( $title )
	{
		echo $before_title;
		echo $title;
		echo $after_title;
	}
	


		
	$args = array('posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'date');
	
	$top_rated_posts_array = array();
	$port_query = new WP_Query( $args );
	if( $port_query->have_posts() ) : while( $port_query->have_posts() ) : $port_query->the_post();  
		$likes = get_post_meta($post->ID, '_zilla_likes', true);
		$top_rated_posts_array[$post->ID] = $likes;
	endwhile; endif; wp_reset_postdata();  
	arsort($top_rated_posts_array);
	echo '<div class="top-rated-posts">';
	
	$counter= 0;
	foreach($top_rated_posts_array as $key=>$value) {
	$counter++;
	
	
					$format = get_post_format( $key );	
					$title = get_the_title( $key); 
					$link = get_the_permalink( $key );
					$strip_title = strip_tags($title);
					$dateFormat = get_option( 'date_format' );
					$post_date = get_the_date($dateFormat, $key);
					$time_format = get_option( 'time_format' );
					$post_time = get_the_time($time_format, $key);
					if ($format == 'link') {
							$link = get_post_meta($key , 'pego_post_link_url' , true);
					}
					?>
					
						<div class="top-rated-post">
							<div class="top-rated-details">
								<a class="top-rated-url" href="<?php echo esc_url($link); ?>"><?php echo $title; ?></a> 
							</div>
							<div class="top-rated-icon-wrap">
								<i class="top-rated-icon icon-heart"></i>
								<span><?php echo esc_html($value); ?></span>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
				<?php	
		if ($counter == $posts_number) { break; }
		}

		echo '</div>';
	
	?>
	<div class="clear"></div>		
	<?php
     
 	
	echo $after_widget;
	
}


function form( $instance ) {  

	/* Set the default values  */
		$defaults = array(
		'title' => 'Top Rated Posts Widget',
		'posts_number' => '3',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 

	 ?>

		<label for="<?php echo $this->get_field_id( 'title' ); ?>">
		<?php esc_html_e('Title:','xavier'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" 
				 name="<?php echo $this->get_field_name( 'title' ); ?>" 
				 value="<?php echo $instance['title']; ?>" />
		</label>
																													
		<label for="<?php echo $this->get_field_id( 'posts_number' ); ?>">
		<?php esc_html_e('Number of posts:','xavier'); ?>
		<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'posts_number' ); ?>" 
				 name="<?php echo $this->get_field_name( 'posts_number' ); ?>" 
				 value="<?php echo $instance['posts_number']; ?>" />
		</label>
		
	<?php
	}
}


/*     Adding widget to widgets_init   */
add_action( 'widgets_init', 'top_rated_widgets' );

function top_rated_widgets() {
	register_widget( 'top_rated_Widget' );
}
?>