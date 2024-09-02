<?php get_header(); ?>	
		<?php
	if ( function_exists( 'ot_get_option' ) ) {
		$error_page_id = ot_get_option('pego_error_page');
		$pego_page_titles_show = get_post_meta($error_page_id , 'pego_page_titles_show' , true);
		$pego_page_title_page_title_text = get_post_meta($error_page_id , 'pego_page_title_page_title_text' , true);
		$pego_page_breadcrumbs = get_post_meta($error_page_id , 'pego_page_breadcrumbs' , true);
		$pego_page_titles_bg_image = get_post_meta($error_page_id , 'pego_page_titles_bg_image' , true);
		$pego_page_sidebar = get_post_meta($error_page_id , 'pego_page_sidebar' , true);
		$pego_page_titles_show_bg = get_post_meta($error_page_id , 'pego_page_titles_show_bg' , true);
		

		if ($pego_page_titles_show != 'no') {
		?>
			<div class="page-title-wrapper"<?php echo $bg_css; ?>>
				<div class="center">
					<h1><?php if ($pego_page_title_page_title_text != '') { echo esc_html($pego_page_title_page_title_text); } else { echo esc_html(get_the_title($error_page_id)); } ?></h1>
				</div>
			</div>	
			<div class="clear"></div>
		<?php
		}
		$main_class= 'vc_col-sm-12';
		$sidebar_class = ' no-display';
		$sidebar_class1 = '';
		?>
		<div id="container"> <!-- start container -->	
			<div class="page-wrapper error-wrapper">
					<?php echo apply_filters('the_content', get_post_field('post_content', $error_page_id)); ?>
			</div>
		</div><!-- end container -->	
	<?php
	}
	?>	
<?php get_footer(); ?>




			