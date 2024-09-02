<?php

// creating team_member 

add_action('init', 'team_member_register');
 
function team_member_register() {
 
	$labels = array(
		'name' => esc_html__('Team member', "xavier"),
		'singular_name' => esc_html__('Team member Item',  "xavier"),
		'add_new' => esc_html__('Add New',  "xavier"),
		'add_new_item' => esc_html__('Add New Team member Item', "xavier"),
		'edit_item' => esc_html__('Edit Team member Item', "xavier"),
		'new_item' => esc_html__('New Team member Item', "xavier"),
		'view_item' => esc_html__('View Team member Item', "xavier"),
		'search_items' => esc_html__('Search Team member', "xavier"),
		'not_found' =>  esc_html__('Nothing found', "xavier"),
		'not_found_in_trash' => esc_html__('Nothing found in Trash', "xavier"),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail', 'custom-fields')
	  ); 
 
	register_post_type( 'team_member' , $args );
}

//team_member editing

	add_action( 'admin_menu', 'hybrid_create_meta_box_team_member' );
	add_action( 'save_post', 'hybrid_save_meta_data_team_member' );

function hybrid_create_meta_box_team_member() {
	global $theme_name;
	add_meta_box( 'post-meta-boxes_team_member', esc_html__('Team_member options', "xavier"), 'post_meta_boxes_team_member', 'team_member', 'normal', 'default' );
}


function hybrid_post_meta_boxes_team_member() {
	
	/* Array of the meta box options. */
	$meta_boxes = array(	
			'pego_team_position' => array( 
							'name' => 'pego_team_position', 
							'title' => esc_html__(' Team member position', 'xavier'), 
							'description' => esc_html__('Enter team member position.', 'xavier'), 
							'type' => 'text' ),
			'pego_team_image_position' => array( 
							'name' => 'pego_team_image_position', 
							'title' => esc_html__(' Image position', 'xavier'), 
							'description' => esc_html__('Set image position.', 'xavier'), 
							'type' => "select", 
							'std' => esc_html__('Left','xavier'),
							'options' => array(esc_html__('Left','xavier'), esc_html__('Right','xavier'))),
			'pego_social_icon1' => array( 
							'name' => 'pego_social_icon1', 
							'title' => esc_html__(' Social icon #1', 'xavier'), 
							'description' => esc_html__('Enter icon name for socials #1.', 'xavier'), 
							'type' => 'text' ),
			'pego_social_url1' => array( 
							'name' => 'pego_social_url1', 
							'title' => esc_html__(' Social url #1', 'xavier'), 
							'description' => esc_html__('Enter url for socials #1.', 'xavier'), 
							'type' => "text"),	
			'pego_social_icon2' => array( 
							'name' => 'pego_social_icon2', 
							'title' => esc_html__(' Social icon #2', 'xavier'), 
							'description' => esc_html__('Enter icon name for socials #2.', 'xavier'), 
							'type' => 'text' ),
			'pego_social_url2' => array( 
							'name' => 'pego_social_url2', 
							'title' => esc_html__(' Social url #2', 'xavier'), 
							'description' => esc_html__('Enter url for socials #2.', 'xavier'), 
							'type' => "text"),
			'pego_social_icon3' => array( 
							'name' => 'pego_social_icon3', 
							'title' => esc_html__(' Social icon #3', 'xavier'), 
							'description' => esc_html__('Enter icon name for socials #3.', 'xavier'), 
							'type' => 'text' ),
			'pego_social_url3' => array( 
							'name' => 'pego_social_url3', 
							'title' => esc_html__(' Social url #3', 'xavier'), 
							'description' => esc_html__('Enter url for socials #3.', 'xavier'), 
							'type' => "text"),
			'pego_social_icon4' => array( 
							'name' => 'pego_social_icon4', 
							'title' => esc_html__(' Social icon #4', 'xavier'), 
							'description' => esc_html__('Enter icon name for socials #4.', 'xavier'), 
							'type' => 'text' ),
			'pego_social_url4' => array( 
							'name' => 'pego_social_url4', 
							'title' => esc_html__(' Social url #4', 'xavier'), 
							'description' => esc_html__('Enter url for socials #4.', 'xavier'), 
							'type' => "text"),
			'pego_social_icon5' => array( 
							'name' => 'pego_social_icon5', 
							'title' => esc_html__(' Social icon #5', 'xavier'), 
							'description' => esc_html__('Enter icon name for socials #5.', 'xavier'), 
							'type' => 'text' ),
			'pego_social_url5' => array( 
							'name' => 'pego_social_url5', 
							'title' => esc_html__(' Social url #5', 'xavier'), 
							'description' => esc_html__('Enter url for socials #5.', 'xavier'), 
							'type' => "text")
	);

	return apply_filters( 'hybrid_post_meta_boxes_team_member', $meta_boxes );
}




function post_meta_boxes_team_member() {
	global $post;
	$meta_boxes = hybrid_post_meta_boxes_team_member(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input_team_member( $meta, $value );
		elseif ( $meta['type'] == 'heading' )
			get_meta_heading_team_member( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea_team_member( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select_team_member( $meta, $value );		
		elseif ( $meta['type'] == 'color' )
			get_meta_color_team_member( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_upload_team_member( $meta, $value );

	endforeach; ?>
	</table>
<?php
}


function get_meta_upload_team_member( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo esc_html($title); ?></b><br/><span  style="color:#777777;"><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<label for="<?php echo $name; ?>">
    			 <input id="<?php echo esc_attr($name); ?>_input" type="text" size="36" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_html( $value );  ?>" /> 
   				 <input id="<?php echo esc_attr($name); ?>" class="upload_image_button_custom_field button" type="button" value="Upload Image" />
   				 		<div class="clear"></div><img  id="<?php echo $name; ?>_preview_img" class="uploader_image_preview_custom_field" alt="" src="<?php echo esc_url($value); ?>" /> 
    			 <input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			</label>
		</td>
	</tr>
	<?php
}



/**
 * Outputs a text input box with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_text_input_team_member( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo esc_html($title); ?></b><br/><span  style="color:#777777;"><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="<?php echo esc_html( $value );  ?>" size="30" tabindex="30" style="width: 97%;" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

/**
 * Outputs a select box with arguments from the
 * parameters.  Used for__(' Type:', 'xavier'),  both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_select_team_member( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo esc_attr($name); ?>"><b><?php echo esc_html($title); ?></b><br/><span style="color:#777777;" ><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<select style="width:100px;" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>">
			<?php foreach ( $options as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

/**
 * Outputs a textarea with arguments from the
 * parameters.  Used for both the post/page meta boxes.
 *
 * @since 0.3
 * @param array $args
 * @param array string|bool $value
 */
function get_meta_textarea_team_member( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo esc_html($title); ?></b><br/><span style="color:#777777;"><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<textarea name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo esc_html( $value );  ?></textarea>
			<input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_color_team_member( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo esc_attr($name); ?>"><b><?php echo esc_html($title); ?></b><br/><span style="color:#777777;" ><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/admin/css/colorpicker.css" type="text/css" media="screen" />
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/admin/js/colorpicker.js"></script>	
		   #<input type="text" maxlength="6" size="6" name="<?php echo $name; ?>"  id="colorpickerField1" value="<?php echo esc_html( $value );  ?>"  />
			<input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}


function get_meta_heading_team_member( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo esc_attr($name); ?>"><h1 style="font-size:14px;"><?php echo esc_html($title); ?></h1><span style="color:#777777;"><?php echo esc_html($description); ?></span></label>
		</th>		
	</tr>
	<?php
}


/**
 * Loops through each meta box's set of variables.
 * Saves them to the database as custom fields.
 *
 * @since 0.3
 * @param int $post_id
 */
function hybrid_save_meta_data_team_member( $post_id ) {
	global $post;

		$meta_boxes = array_merge( hybrid_post_meta_boxes_team_member() );

	foreach ( $meta_boxes as $meta_box ) :
		if ( $meta_box['type'] != 'heading' ) {
				
		if ((!isset($_POST[$meta_box['name'] . '_noncename']))  || ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) ))
			return $post_id;

			if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
				return $post_id;

			elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
				return $post_id;

			$data = stripslashes( $_POST[$meta_box['name']] );

			if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
				add_post_meta( $post_id, $meta_box['name'], $data, true );

			elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
				update_post_meta( $post_id, $meta_box['name'], $data );

			elseif ( $data == '' )
				delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );
		}
	endforeach;	
}
?>