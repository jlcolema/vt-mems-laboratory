<?php
// creating portfolio 
add_action('init', 'portfolio_register');
 
function portfolio_register() {
 
	$labels = array(
		'name' => __('Portfolio', "xavier"),
		'singular_name' => __('Portfolio Item', "xavier"),
		'add_new' => __('Add New', "xavier"),
		'add_new_item' => __('Add New Portfolio Item', "xavier"),
		'edit_item' => __('Edit Portfolio Item', "xavier"),
		'new_item' => __('New Portfolio Item', "xavier"),
		'view_item' => __('View Portfolio Item', "xavier"),
		'search_items' => __('Search Portfolio', "xavier"),
		'not_found' =>  __('Nothing found', "xavier"),
		'not_found_in_trash' => __('Nothing found in Trash', "xavier"),
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
 
	register_post_type( 'portfolio' , $args );
}

//portfolio editing

	add_action( 'admin_menu', 'hybrid_create_meta_box_portfolio' );
	add_action( 'save_post', 'hybrid_save_meta_data_portfolio' );

function hybrid_create_meta_box_portfolio() {
	global $theme_name;
	add_meta_box( 'post-meta-boxes_portfolio', __('Portfolio options', "xavier"), 'post_meta_boxes_portfolio', 'portfolio', 'normal', 'default' );
	add_meta_box( 'post-meta-boxes_portfolio_video', __('Portfolio video options', "xavier"), 'post_meta_boxes_portfolio_video', 'portfolio', 'normal', 'default' );
}

register_taxonomy("portfolio_categories", array("portfolio"), array("hierarchical" => true, "label" => __("Portfolio categories","xavier"), "singular_label" => __("Portfolio categorie","xavier"), "rewrite" => true));

function hybrid_post_meta_boxes_portfolio() {

	
	/* Array of the meta box options. */
	$meta_boxes = array(
			'pego_portfolio_type_selected' => array( 
							'name' => 'pego_portfolio_type_selected', 
							'title' => __(' Type', 'xavier'), 
							'description' => __('Select portfolio type.', 'xavier'), 
							'type' => "select", 
							'std' => __('Image','xavier'),
							'options' => array(__('Image','xavier'), __('Slideshow','xavier'), __('Video','xavier'), __('Grid','xavier'), __('Standard','xavier') )),
			'pego_portfolio_background_slider_image' => array( 
							'name' => 'pego_portfolio_background_slider_image', 
							'title' => __('Portfolio image for diamond layout', 'xavier'), 
							'description' => __('Upload an image that will be used for the diamond layout.', 'xavier'), 
							'type' => "upload"),
					/*
			'pego_portfolio_title_subtitle' => array( 
							'name' => 'pego_portfolio_title_subtitle',
							'title' => __('Subtitle', 'xavier'), 
							'description' => __('Enter subtitle for portfolio titles [optional].','xavier'),
							'type' => 'text' )
							*/
							
	);

	return apply_filters( 'hybrid_post_meta_boxes_portfolio', $meta_boxes );
}

function hybrid_post_meta_boxes_portfolio_video() {

	/* Array of the meta box options. */
	$meta_boxes = array(
			'pego_portfolio_video_url_gal' => array( 
							'name' => 'pego_portfolio_video_url_gal',
							'title' => __('Video URL:', 'xavier'), 
							'description' => __('Enter url of the video.', 'xavier'),
							'type' => 'text' )		
	);

	return apply_filters( 'hybrid_post_meta_boxes_portfolio_video', $meta_boxes);
}


function post_meta_boxes_portfolio() {
	global $post;
	$meta_boxes = hybrid_post_meta_boxes_portfolio(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'heading' )
			get_meta_heading_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_upload_portfolio( $meta, $value );

	endforeach; ?>
	</table>
<?php
}

function post_meta_boxes_portfolio_video() {
	global $post;
	$meta_boxes = hybrid_post_meta_boxes_portfolio_video(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea_portfolio( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select_portfolio( $meta, $value );

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
function get_meta_text_input_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span  style="color:#777777;"><?php echo $description; ?></span></label>
		</th>
		<td>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_html( $value );  ?>" size="30" tabindex="30" style="width: 97%;" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
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
function get_meta_select_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span style="color:#777777;" ><?php echo $description; ?></span></label>
		</th>
		<td>
			<select style="width:100px;" name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $options as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
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
function get_meta_textarea_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span style="color:#777777;"><?php echo $description; ?></span></label>
		</th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo esc_html( $value );  ?></textarea>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_color_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span style="color:#777777;" ><?php echo $description; ?></span></label>
		</th>
		<td>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/functions/css/colorpicker.css" type="text/css" media="screen" />
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/jquery.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/colorpicker.js"></script>	
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/eye.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/functions/js/layout.js?ver=1.0.2"></script>
		   #<input type="text" maxlength="6" size="6" name="<?php echo $name; ?>"  id="colorpickerField1" value="<?php echo esc_html( $value );  ?>"  />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_upload_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label for="<?php echo $name; ?>"><b><?php echo $title; ?></b><br/><span  style="color:#777777;"><?php echo $description; ?></span></label>
		</th>
		<td>
			<label for="<?php echo $name; ?>">
    			 <input id="<?php echo $name; ?>_input" type="text" size="36" name="<?php echo $name; ?>" value="<?php echo esc_html( $value );  ?>" /> 
   				 <input id="<?php echo $name; ?>" class="upload_image_button_custom_field button" type="button" value="Upload Image" />
   				 		<div class="clear"></div><img  id="<?php echo $name; ?>_preview_img" class="uploader_image_preview_custom_field" alt="" src="<?php echo $value; ?>" /> 
    			 <input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			</label>
		</td>
	</tr>
	<?php
}


function get_meta_heading_portfolio( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:30%;">
			<label class="settings_heading" for="<?php echo $name; ?>"><h1><?php echo $title; ?></h1><span style="color:#777777;"><?php echo $description; ?></span></label>
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
function hybrid_save_meta_data_portfolio( $post_id ) {
	global $post;

		$meta_boxes = array_merge( hybrid_post_meta_boxes_portfolio() );

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
	
	$meta_boxes = array_merge( hybrid_post_meta_boxes_portfolio_video() );

	foreach ( $meta_boxes as $meta_box ) :

		
		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
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

	endforeach;
	
	
}

/* ordering portfolios START */
function ordering_portfolios() {
    $portfolios = new WP_Query('post_type=portfolio&posts_per_page=-1&orderby=menu_order&order=ASC');
?>
    <div class="wrap">        
        <h1>Portfolio Ordering</h1>
        <p>Sort portfolios by draging them.</p>
        <ul id="portfolio_list">
            <?php while( $portfolios->have_posts() ) : $portfolios->the_post(); ?>
                <?php if( get_post_status() == 'publish' ) { 
				$portfImage = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'thumbnail' );	
				?>
                    <li id="<?php the_id(); ?>" class="menu-item">
                        <dl class="menu-item-bar">
                            <dt class="menu-item-handle" style="width:300px;">	
								<img src="<?php echo $portfImage[0] ?>" style="width:80px; height:auto; margin-top:10px; margin-bottom:10px; float:left;" alt="" />						
                                <span class="menu-item-title" style="width:140px; float:left; margin-left: 20px;"><?php the_title(); ?></span>
                            </dt>
                        </dl>
                        <ul class="menu-item-transport"></ul>
                    </li>
                <?php } ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </ul>
    </div>
	
<?php }

function saving_ordering() {
    global $wpdb;
    
    $order = explode(',', $_POST['order']);
    $counter = 0;
    
    foreach($order as $portfolio_id) {
        $wpdb->update($wpdb->posts, array('menu_order' => $counter), array('ID' => $portfolio_id));
        $counter++;
    }
    die(1);
}

function scripts_for_ordering() {
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script('ordering_portfolios', get_template_directory_uri() . '/js/ordering_portfolio_items.js');
}

function style_for_ordering() {
    wp_enqueue_style('nav-menu');
}

add_action('admin_menu', 'portfolio_ordering');
add_action('wp_ajax_portfolio_sort', 'saving_ordering');

function portfolio_ordering() {
    $ordering_page = add_submenu_page('edit.php?post_type=portfolio', 'Portfolio Custom Ordering', __('Portfolio Custom Ordering', 'xavier'), 'edit_posts', basename(__FILE__), 'ordering_portfolios');
    
    add_action('admin_print_styles-' . $ordering_page, 'style_for_ordering');
    add_action('admin_print_scripts-' . $ordering_page, 'scripts_for_ordering');
}



?>