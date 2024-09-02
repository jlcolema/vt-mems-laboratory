 <?php get_header(); ?>
<?php		
		$wrap_class = 'pego-isotope-wrapper';
		$sidebar_class = ' display-block'; 
		$main_class = 'vc_col-sm-9'; 
		$sidebar_class1 = ' sidebar-right';
		$columns_class = 'vc_col-sm-6';
		$pego_page_sidebar = "Blog Sidebar";
		?>
			<div class="page-title-wrapper">
				<div class="page-title">
					<h1><?php echo get_search_query(); ?></h1>
						<div class="page-subtitle"><?php esc_html_e('search results','xavier'); ?></div>
				</div>
			</div>	
			<div class="clear"></div>
		<div id="container"> <!-- start container -->	
			<?php
			wp_enqueue_script('pego_isotopeJS');
			$categories = array();
			$cat_ids = array();
			$categories = get_categories(); 
			?>
		<div class="page-wrapper">
				<div class="row-wrapper">
				<div class="vc_row wpb_row vc_row-fluid">
					<div class="<?php echo $main_class; ?> wpb_column vc_column_container expand_container">	
						<div class="wpb_wrapper">
						<div>
							<h2><?php esc_html_e('New search','xavier'); ?></h2>
							<p><?php esc_html_e('If you are not satisfied with search results, enter new search words.','xavier'); ?></p>
						</div>
						<div class="widget_search search_page_search_form">
							<?php echo do_shortcode('[wpbsearch]'); ?>
						</div>
						<?php
						$search_count = 0;
						$search = new WP_Query("s=$s & showposts=-1");
						if($search->have_posts()) : while($search->have_posts()) : $search->the_post();	
						$search_count++;
						endwhile; endif;
						?>
						<div class="search-results-found"><?php echo $search_count; ?> <?php esc_html_e('results found for:','xavier'); ?> <?php echo get_search_query(); ?></div>
						<?php if ( have_posts() ) : 
							while ( have_posts() ) : the_post();
								$format = get_post_format( $post->ID );	
								$post_categories = wp_get_post_categories( $post->ID );
								$dateFormat = get_option( 'date_format' );
								$post_date = get_the_date($dateFormat);
								$time_format = get_option( 'time_format' );
								$post_time = get_the_time($time_format);
								$post_alternative_title = get_post_meta($post->ID,'pego_post_alternative_title', true);
								$title = get_the_title($post->ID); 
								$link = get_the_permalink();
								if ($format == 'link') {
									$link = get_post_meta($post->ID , 'pego_post_link_url' , true);
								}
								
								
								?>
								<div class="single-search-item">
									<div class="single-search-item-thumb">
									<?php
									if (has_post_thumbnail( $post->ID )) {
										echo get_the_post_thumbnail( $post->ID, 'thumbnail' );  
									} elseif (get_post_type( $post ) == 'post') {
										$format = get_post_format( $post->ID );	
										$icon = 'fa-pencil';
										if ($format == 'gallery') { $icon = 'fa-image'; }
										if ($format == 'gallery') { $icon = 'fa-camera'; }
										if ($format == 'video') { $icon = 'fa-video-camera'; }
										if ($format == 'audio') { $icon = 'fa-music'; }
										echo '<i class="fa search-results-icon '.$icon.'"></i>';
									} elseif (get_post_type( $post ) == 'portfolio') {
										$portfolio_type = get_post_meta($post->ID , 'pego_portfolio_type_selected' , true);
										$icon = 'fa-image';
										if ($portfolio_type == 'Slideshow') { $icon = 'fa-camera'; }
										if ($portfolio_type == 'Video') { $icon = 'fa-video-camera'; }
										echo '<i class="fa search-results-icon '.$icon.'"></i>';
									} else {
										echo '<i class="fa search-results-icon fa-file-o"></i>';
									}
									?>
									</div>
									<div class="single-search-item-details">
										<a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($title); ?>"><?php echo $title; ?></a>
										<div class="single-search-details">
											<span class="single-search-detail"><?php echo $post_date; ?></span>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<?php
				 			endwhile; 
							 ?>	
							<div class="pagination-wrapper">
  				  				<?php pego_kriesi_pagination(); ?>
							</div>
							<?php else : ?>
							
					<?php endif; ?>
					</div>
				</div>
				<div class="vc_col-sm-3 wpb_column vc_column_container<?php echo esc_attr($sidebar_class); ?> expand_sidebar">
					<div class="wpb_wrapper sidebar<?php echo esc_attr($sidebar_class1); ?>">
						<?php
							if (function_exists('dynamic_sidebar') && dynamic_sidebar($pego_page_sidebar)) : else : ?>
			
								<?php endif; 
							?>	
					</div>	
				</div>	
			</div>
			</div>
			</div>
		</div><!-- end container -->	
<?php get_footer(); ?>