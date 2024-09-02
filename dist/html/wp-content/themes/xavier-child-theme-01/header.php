<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <!-- for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta name="format-detection" content="telephone=no" />
		
    <!-- Favicon Icon -->
	<?php
	$favicon = get_template_directory_uri()."/images/favicon.ico";
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_favicon') != '') {
			$favicon = ot_get_option('pego_favicon');
		}
	} 
	?>
	
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/vnd.microsoft.icon"/>
	<link rel="icon" href="<?php echo $favicon; ?>" type="image/x-ico"/>	
	<?php
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_ga_code') != '') {
			echo ot_get_option('pego_ga_code');
		}
	}
	$search_place = '';
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_search_placeholder_text') != '') {
			$search_place =  ot_get_option('pego_search_placeholder_text');
		}
	}
	$post_comments_count = 0;
	if (get_post_type( $post ) == 'post') {
		$post_comments_count = get_comments_number($post->ID); 
	}
	?>
	
	<script type="text/javascript">
        var search_placeholder = '<?php echo $search_place; ?>';
        var post_comments_count = '<?php echo $post_comments_count; ?>';
    </script>
 
	 <!--[if IE]>		
	  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/IELow.css"/>		
	<![endif]-->

	
	<?php  
		wp_enqueue_script('jquery-ui-accordion'); 
		wp_enqueue_script('jquery'); 
		wp_head();	
	?>		
</head>
<body <?php body_class(); ?>>
<div class="animsition global-wrapper">
	<div id="header" class="header-wrapper header1">
		<div class="header-inner-wrapper center">
					<?php pego_get_header_logo(); ?>
					<a class="mobile-menu-show"><i class="fa mobile-menu-icon fa-list"></i></a>
					<div class="main-menu menu-header1">
						<?php wp_nav_menu(
							array(
							'theme_location' => 'primary', 
							'menu_class' => 'sf-menu'
							)); 
						?>
					</div>
					<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
<div class="clear"></div>
<div class="mobile-menu-wrapper">
	<?php wp_nav_menu(
		array(
		'theme_location' => 'primary',
		'menu_class' => 'mobile-menu'
		)); 
	?>
</div>
<div class="container-wrapper">