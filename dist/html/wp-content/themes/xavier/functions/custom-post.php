<?php
//post editing
  add_action( 'admin_menu', 'hybrid_create_meta_box' );
  add_action( 'save_post', 'hybrid_save_meta_data' );



function hybrid_create_meta_box() {
	global $theme_name;
	add_meta_box( 'post-meta-boxes', esc_html__('General post options','xavier'), 'post_meta_boxes', 'post', 'normal', 'default' );
}


function hybrid_post_meta_boxes() {

	/* Array of the meta box options. */
	$meta_boxes = array(	
			'pego_post_alternative_title' => array( 
							'name' => 'pego_post_alternative_title',
							'title' => esc_html__('Post alternative title ', 'xavier'), 
							'description' => esc_html__('Insert alternative title for post. You may use span tags for different color.','xavier'),
							'type' => 'text' ),
			'pego_post_video_url' => array( 
							'name' => 'pego_post_video_url',
							'title' => esc_html__('Video url:', 'xavier'), 
							'description' => esc_html__('Used for video post format.','xavier'),
							'type' => 'text' ),
			'pego_post_link_url' => array( 
							'name' => 'pego_post_link_url',
							'title' => esc_html__('Url for posts with link format', 'xavier'), 
							'description' => esc_html__('Used for link post format.','xavier'),
							'type' => 'text' ),
			'pego_post_audio_upload' => array( 
							'name' => 'pego_post_audio_upload', 
							'title' => esc_html__('Post audio upload', 'xavier'), 
							'description' => esc_html__('Upload mp3 for audio post type.', 'xavier'), 
							'type' => "upload"),
			'pego_post_soundcloud_url' => array( 
							'name' => 'pego_post_soundcloud_url',
							'title' => esc_html__('Soundcloud shortcode:', 'xavier'), 
							'description' => esc_html__('Used for audio post format.','xavier'),
							'type' => 'text' ),
			'pego_post_gallery_type' => array( 
							'name' => 'pego_post_gallery_type', 
							'title' => esc_html__('Select type of gallery', 'xavier'), 
							'description' => esc_html__('Select gallery type. The setting will be used only for posts with gallery format.', 'xavier'), 
							'type' => "select", 
							'std' => esc_html__('Slideshow','xavier'),
							'options' => array(esc_html__('Slideshow','xavier'),esc_html__('Grid','xavier')))
);
	return apply_filters( 'hybrid_post_meta_boxes', $meta_boxes );
}

function post_meta_boxes() {
	global $post;
	$meta_boxes = hybrid_post_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'heading' )
			get_meta_heading_post( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_upload( $meta, $value );
		elseif ( $meta['type'] == 'upload_img' )
			get_meta_upload_img( $meta, $value );

	endforeach; ?>
	</table>
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
function get_meta_text_input( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo esc_html($title); ?></b><br/><span  style="color:#777777;"><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<input type="text" name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" value="<?php echo esc_html( $value );  ?>" size="30" tabindex="30" style="width: 97%;" />
			<input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}


function get_meta_upload( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo esc_html($title); ?></b><br/><span  style="color:#777777;"><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<label for="<?php echo $name; ?>">
    			 <input id="<?php echo esc_attr($name); ?>_input" type="text" size="36" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_html( $value );  ?>" /> 
   				 <input id="<?php echo esc_attr($name); ?>" class="upload_mp3_button_custom_field button" type="button" value="Upload mp3" />
   				 		
    			 <input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			</label>
		</td>
	</tr>
	<?php
}

function get_meta_upload_img( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo esc_attr($name); ?>"><b><?php echo esc_html($title); ?></b><br/><span  style="color:#777777;"><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<label for="<?php echo esc_attr($name); ?>">
    			 <input id="<?php echo esc_attr($name); ?>_input" type="text" size="36" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_html( $value );  ?>" /> 
   				 <input id="<?php echo esc_attr($name); ?>" class="upload_image_button_custom_field button" type="button" value="Upload image" />
   				 <div class="clear"></div><img  id="<?php echo esc_attr($name); ?>_preview_img" class="uploader_image_preview_custom_field" alt="" src="<?php echo esc_url($value); ?>" /> 		
    			 <input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			</label>
		</td>
	</tr>
	<?php
}


 
 
function get_meta_select( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo esc_attr($name); ?>"><b><?php echo esc_html($title); ?></b><br/><span  style="color:#777777;"><?php echo esc_html($description); ?></span></label>
	
		</th>
		<td>
			<select style="width:100px;" name="<?php echo esc_attr($name); ?>" id="<?php echo $name; ?>">
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
function get_meta_textarea( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo esc_attr($name); ?>"><b><?php echo esc_html($title); ?></b><br/><span  style="color:#777777;"><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<textarea name="<?php echo esc_attr($name); ?>" id="<?php echo esc_attr($name); ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo esc_html( $value );  ?></textarea>
			<input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_color( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo esc_html($title); ?></b><br/><span style="color:#777777;" ><?php echo esc_html($description); ?></span></label>
		</th>
		<td>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/functions/css/colorpicker.css" type="text/css" media="screen" />
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/jquery.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/colorpicker.js"></script>	
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/eye.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/layout.js?ver=1.0.2"></script>
		   #<input type="text" maxlength="6" size="6" name="<?php echo $name; ?>"  id="colorpickerField1" value="<?php echo esc_html( $value );  ?>"  />
			<input type="hidden" name="<?php echo esc_attr($name); ?>_noncename" id="<?php echo esc_attr($name); ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}


function get_meta_heading_post( $args = array(), $value = false ) {

	extract( $args ); ?>
	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><h1 style="font-size:14px;"><?php echo esc_html($title); ?></h1><span style="color:#777777;"><?php echo esc_html($description); ?></span></label>
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
function hybrid_save_meta_data( $post_id ) {
	global $post;


		$meta_boxes = array_merge( hybrid_post_meta_boxes() );

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