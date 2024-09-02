<?php

/*

	Plugin Name: Top Commented Posts
	Description: Plugin is used for latest posts.
	Version: 1.0
 
*/

class top_commented_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function top_commented_Widget() {

	$widget_options = array(
		'classname' => 'top_commented_widget',
		'description' => esc_html__('Custom top commented posts.','xavier')
	);

	$control_options = array(   
		'width' => 200,
		'height' => 400,
		'id_base' => 'top_commented_widget'
	);

	parent::__construct( 'top_commented_widget', esc_html__('Pego - Top Commented Posts Widget','xavier'), $widget_options, $control_options );
	
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
	

	
	$args = array('posts_per_page' => $posts_number, 'order'=> 'DESC', 'orderby' => 'comment_count');
	
	$port_query = new WP_Query( $args );
		
	echo '<div class="top-commented-posts">';

	       
   	if( $port_query->have_posts() ) : while( $port_query->have_posts() ) : $port_query->the_post();  
			
					$format = get_post_format( $post->ID );	
					$title = get_the_title(); 
					$link = get_the_permalink();
					$post_alternative_title = get_post_meta($post->ID,'pego_post_alternative_title', true);
					if ($post_alternative_title != '') { $title = $post_alternative_title; }
					$strip_title = strip_tags($title);
					$dateFormat = get_option( 'date_format' );
					$post_date = get_the_date($dateFormat);
					$time_format = get_option( 'time_format' );
					$post_time = get_the_time($time_format);
					if ($format == 'link') {
							$link = get_post_meta($post->ID , 'pego_post_link_url' , true);
					}
					?>
					
						<div class="top-commented-post">
							<div class="top-commented-icon-wrap">
								<i class="top-commented-icon icon-comment"><span><?php echo esc_html(get_comments_number($post->ID)); ?></span></i>
							</div>
							<div class="top-commented-details">
								<a class="top-commented-url" href="<?php echo esc_url($link); ?>"><?php echo $title; ?></a> 
								<div class="top-commented-date"><?php echo $post_date; ?></div>
							</div>
						</div>
						<div class="clear"></div>
				<?php	
	endwhile; endif; wp_reset_postdata();  

		echo '</div>';
	
	?>
	<div class="clear"></div>		
	<?php
     
 	
	echo $after_widget;
	
}


function form( $instance ) {  

	/* Set the default values  */
		$defaults = array(
		'title' => 'Top Commented Posts Widget',
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
add_action( 'widgets_init', 'top_commented_widgets' );

function top_commented_widgets() {
	register_widget( 'top_commented_Widget' );
}
?>