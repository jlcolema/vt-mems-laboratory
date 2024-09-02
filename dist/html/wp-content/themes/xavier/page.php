<?php get_header(); ?>	
		<?php
		$pego_page_titles_show = get_post_meta($post->ID , 'pego_page_titles_show' , true);
		$pego_page_title_page_title_text = get_post_meta($post->ID , 'pego_page_title_page_title_text' , true);
		$pego_page_breadcrumbs = get_post_meta($post->ID , 'pego_page_breadcrumbs' , true);
		$pego_page_titles_bg_image = get_post_meta($post->ID , 'pego_page_titles_bg_image' , true);
		$pego_page_sidebar = get_post_meta($post->ID , 'pego_page_sidebar' , true);
		$pego_page_titles_show_bg = get_post_meta($post->ID , 'pego_page_titles_show_bg' , true);
		$pego_page_title_subtitle = get_post_meta($post->ID , 'pego_page_title_subtitle' , true);
		
		$bg_css = '';
		if (($pego_page_titles_bg_image != '')||($pego_page_titles_show_bg == 'yes')) {
			$bg_css = ' style = " background-color: #fff; ';
			if ($pego_page_titles_bg_image != '') {
				$bg_css .= ' background: #fff url(\''.esc_url($pego_page_titles_bg_image).'\') no-repeat;  background-size: cover; '; 
			}
			$bg_css .= '  "';
		}
		//echo "Bg image: ? ".$pego_page_titles_bg_image;
		if ($pego_page_titles_show != 'no') {
		?>
			<div class="page-title-wrapper"<?php echo $bg_css; ?>>
				<div class="center">
					<h1><?php if ($pego_page_title_page_title_text != '') { echo $pego_page_title_page_title_text; } else { the_title(); } ?></h1>
					<?php if ($pego_page_title_subtitle != '') { ?>
							<div class="page-subtitle"><?php echo esc_html($pego_page_title_subtitle); ?></div>
					<?php } ?>
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
			
						<div class="page-wrapper">
							<?php while ( have_posts() ) : the_post();  ?>					
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<?php the_content(); ?>
								</div>
							<?php endwhile; ?>
			</div>	
		</div><!-- end container -->		
<?php get_footer(); ?>