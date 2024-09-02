<?php

/*

	Plugin Name: Latest Post Widget
	Description: Plugin is used for latest posts.
	Version: 1.0
 
*/

class post_widget extends WP_Widget {


/*-----------------------------------------------------------------------------------*/
/*	Widget Setup
/*-----------------------------------------------------------------------------------*/
	
function post_Widget() {

	$widget_options = array(
		'classname' => 'post_widget',
		'description' => esc_html__('Custom latest post widget.','xavier')
	);

	$control_options = array(    
		'width' => 200,
		'height' => 400,
		'id_base' => 'post_widget'
	);

	parent::__construct( 'post_widget', esc_html__('Pego - Latest Post Widget','xavier'), $widget_options, $control_options );
	
}



function widget( $args, $instance ) {
	
	extract( $args );
	global $post;
	
	$order_select = 'date';
	$order_direction_select = 'DESC';
	
	$title = apply_filters('widget_title', $instance['title'] );
	$posts_number = $instance['posts_number'];
	$category_select = $instance['category_select'];
	$format_select = $instance['format_select'];
	
	if ($instance['order_select']) {
		$order_select = $instance['order_select'];
	}
	$order_direction_select = $instance['order_direction_select'];
	
	$allCategories = pego_get_all_categories();
	$key = array_search($category_select, $allCategories); 


	global $post;
	
	echo $before_widget;
	
	if ( $title )
	{
		echo $before_title;
		echo $title;
		echo $after_title;
	}
	
	if ($key != '') {
		if ($format_select != '') {
			$args = array('posts_per_page' => -1, 'order'=> $order_direction_select, 'orderby' => $order_select, 'cat' => $key, 'tax_query' => array(
       	 	array(
           	 	'taxonomy' => 'post_format',
           	 	'field' => 'slug',
           	 	'terms' => array( 'post-format-'.$format_select )
           	 	)
       	 	));
		} else {
			$args = array('posts_per_page' => -1, 'order'=> $order_direction_select, 'orderby' => $order_select, 'cat' => $key );
		}
	
	
		
	} else {
		if ($format_select != '') {
			$args = array('posts_per_page' => -1, 'order'=> $order_direction_select, 'orderby' => $order_select, 'tax_query' => array(
       	 	array(
           	 	'taxonomy' => 'post_format',
           	 	'field' => 'slug',
           	 	'terms' => array( 'post-format-'.$format_select )
           	 	)
       	 	));
		} else {
			$args = array('posts_per_page' => -1, 'order'=> $order_direction_select, 'orderby' => $order_select);
		}
	} 
	
	$port_query = new WP_Query( $args );
		
	echo '<div class="latest-posts">';

	$posts_num = 0;
   	if( $port_query->have_posts() ) : while( $port_query->have_posts() ) : $port_query->the_post();  
			
					$format = get_post_format( $post->ID );	
					$post_categories = wp_get_post_categories( $post->ID );
					$dateFormat = get_option( 'date_format' );
					$format = get_post_format( $post->ID );	
					$post_date = get_the_date($dateFormat);
					$time_format = get_option( 'time_format' );
					$post_time = get_the_time($time_format);
					$post_alternative_title = get_post_meta($post->ID,'post_alternative_title', true);
					$title = get_the_title(); 
					$link = get_the_permalink();
					$post_tags = wp_get_post_tags($post->ID);
					if ($post_alternative_title != '') { $title = $post_alternative_title; }
					$strip_title = strip_tags($title);
					$excerpt = get_the_excerpt();
					if ($excerpt != '') {
						if (strlen($excerpt) > 250)
						{
							$excerpt = substr($excerpt,0,250).'...';
						}
					}
					$extraclass1 = " fl";
					$extraclass2 = " fr";
					$icon_type = 'fa-plus-square-o';
					if ($format == 'link') {
						$link = get_post_meta($post->ID , 'post_link_url' , true);
					}
					if ($format == 'quote') { $icon_type = 'icon-quote';  }
					if ($format == 'image') { $icon_type = 'icon-picture'; }
					if ($format == 'video') { $icon_type = 'icon-video'; }
					if ($format == 'audio') { $icon_type = 'icon-music'; }
					if ($format == 'gallery') { $icon_type = 'icon-camera';  }
					if ($format == 'link')  { $icon_type = 'icon-link'; }
					if ($format == 'status') { $extra_class=" pego_twitter_wrapper"; }
					
					$icon = 'fa-image';
					if ($format == 'gallery') { $icon = 'fa-camera'; }
					if ($format == 'video') { $icon = 'fa-video-camera'; }
					if ($format == 'audio') { $icon = 'fa-music'; }
					$post_categories = wp_get_post_categories( $post->ID );
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					if (has_post_thumbnail( $post->ID )) {
					
					$posts_num++;
					if ($posts_num > $posts_number) {
						break;
					}
					?>
				
						<div class="latest-post-widget-single">
							<a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($strip_title); ?>">
								<img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($strip_title); ?>" />
								<div class="post-grid-type-overlay"></div>
								<div class="fa post-grid-type-overlay-icon fa-search-plus"></div>
							</a>
							<div class="clear"></div>
							<div class="latest-post-widget-icon-wrap">
								<i class="fa latest-post-widget-icon <?php echo esc_attr($icon); ?>"></i>
							</div>
							<div class="latest-post-widget-details">
								 	<a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($strip_title); ?>">
										<?php echo $title; ?>
									</a>
								<?php
								if($post_categories) { 
									?>
									<div class="latest-post-widget-categories">
										<?php
										$counter = 0;
										foreach ($post_categories as $single_cat) {
											$cat = get_category( $single_cat );
											$counter++;
											$cat_link =  get_category_link($cat->cat_ID);
											if ($counter == count($post_categories)) {
												?>
												<a class="cat-link category-bg-color-<?php echo esc_attr($cat->cat_ID); ?>" href="<?php echo esc_url($cat_link); ?>"  ><?php echo esc_html($cat->name); ?></a>
												<?php
												}
												else {
												?>
													<a class="cat-link category-bg-color-<?php echo esc_attr($cat->cat_ID); ?>" href="<?php echo esc_url($cat_link); ?>"  ><?php echo esc_html($cat->name); ?></a>,
												<?php
												}
										}
									?>
									</div>
									<?php
									}
									?>
							</div>
						<div class="clear"></div>
						</div>
						
				<?php	
					}
				
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
		'title' => 'Post Widget',
		'posts_number' => '3',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$valuesCategories = pego_get_all_categories();
		$valuesFormat = array('image', 'gallery', 'video', 'audio', 'standard');
		$valuesType = array('Type#1', 'Type#2');
		$valuesOrderBy = array('date', 'title', 'modified', 'comment_count');
		//$valuesOrderBy = array('date', 'title', 'modified');
		$valuesOrder = array('DESC', 'ASC');

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

	<?php if ($valuesCategories) { ?>
		<label for="<?php echo $this->get_field_id('category_select'); ?>">
        <?php _e('Category (if none is choosen, all will be taken):','xavier'); ?>
          <select name="<?php echo $this->get_field_name('category_select'); ?>" 
                  id="<?php echo $this->get_field_id('category_select'); ?>"
                class="widefat">
                <option value="">Select Category</option>
          <?php 
            foreach ($valuesCategories as $value)
              {     
              ?>
                <option <?php if ($instance['category_select'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		<?php if ($valuesFormat) { ?>
		<label for="<?php echo $this->get_field_id('format_select'); ?>">
        <?php esc_html_e('Format (if none is choosen, all will be taken):','xavier'); ?>
          <select name="<?php echo $this->get_field_name('format_select'); ?>" 
                  id="<?php echo $this->get_field_id('format_select'); ?>"
                class="widefat">
                <option value="">Select Format</option>
          <?php 
            foreach ($valuesFormat as $value)
              {     
              ?>
                <option <?php if ($instance['format_select'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		<?php if ($valuesOrderBy) { ?>
		<label for="<?php echo $this->get_field_id('order_select'); ?>">
        <?php esc_html_e('Order by:','xavier'); ?>
          <select name="<?php echo $this->get_field_name('order_select'); ?>" 
                  id="<?php echo $this->get_field_id('order_select'); ?>"
                class="widefat">
               
          <?php 
            foreach ($valuesOrderBy as $value)
              {     
              ?>
                <option <?php if ($instance['order_select'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		<?php if ($valuesOrder) { ?>
		<label for="<?php echo $this->get_field_id('order_direction_select'); ?>">
        <?php esc_html_e('Order direction:','xavier'); ?>
          <select name="<?php echo $this->get_field_name('order_direction_select'); ?>" 
                  id="<?php echo $this->get_field_id('order_direction_select'); ?>"
                class="widefat">
               
          <?php 
            foreach ($valuesOrder as $value)
              {     
              ?>
                <option <?php if ($instance['order_direction_select'] == $value) echo 'selected="selected"' ?>   value="<?php echo $value; ?>"><?php echo $value; ?></option>
              <?php
              }
              ?>
          </select> 
        </label>
		<?php 
		} 
		?>
		
			
	<?php
	}
}


/*     Adding widget to widgets_init   */
add_action( 'widgets_init', 'post_widgets' );

function post_widgets() {
	register_widget( 'post_Widget' );
}
?>