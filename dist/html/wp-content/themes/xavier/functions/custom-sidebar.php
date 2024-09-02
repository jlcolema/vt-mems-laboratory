<?php
// creating Sidebars 
add_action('init', 'Sidebars_register');
 
function Sidebars_register() { 
	$labels = array(
		'name' => esc_html__('Sidebars', "xavier"),
		'singular_name' => esc_html__('Sidebars Item', "xavier"),
		'add_new' => esc_html__('Add New', "xavier"),
		'add_new_item' => esc_html__('Add New Sidebars Item', "xavier"),
		'edit_item' => esc_html__('Edit Sidebars Item', "xavier"),
		'new_item' => esc_html__('New Sidebars Item', "xavier"),
		'view_item' => esc_html__('View Sidebars Item', "xavier"),
		'search_items' => esc_html__('Search Sidebars', "xavier"),
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
 
	register_post_type( 'sidebars' , $args );
}
?>