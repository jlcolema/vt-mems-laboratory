<?php get_header(); ?>	
		<?php
		$pego_page_titles_show = get_post_meta($post->ID , 'pego_page_titles_show' , true);
		$pego_page_title_page_title_text = get_post_meta($post->ID , 'pego_page_title_page_title_text' , true);
		$pego_page_breadcrumbs = get_post_meta($post->ID , 'pego_page_breadcrumbs' , true);
		$pego_page_titles_bg_image = get_post_meta($post->ID , 'pego_page_titles_bg_image' , true);
		$pego_page_sidebar = get_post_meta($post->ID , 'pego_page_sidebar' , true);
		$pego_page_titles_show_bg = get_post_meta($post->ID , 'pego_page_titles_show_bg' , true);
		
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
					<?php
						$termsSingle =  get_the_terms( $post->ID, 'portfolio_categories' );
						if( is_array($termsSingle) ) {	
							$terms_list = '<div class="folio-categories">';
							$numberOfCat = count($termsSingle);
							$currentItem = 0;
							foreach( $termsSingle as $termSingle ) {
								$currentItem++;
								$link = home_url() . '/portfolio_categories/' . $termSingle->slug . '/';										
								if ($currentItem == $numberOfCat) {
									$terms_list .= '<a href="'.esc_url($link).'" >'.esc_html($termSingle->name).'</a>';											
								}
								else
								{
									$terms_list .= '<a href="'.esc_url($link).'" >'.esc_html($termSingle->name).'</a>, ';												
								}
							}
							$terms_list .= '</div>';
						echo '<h2>'.$terms_list.'</h2>';
						}
						?>
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
					<div class="row-wrapper">
						<div class="vc_row wpb_row vc_row-fluid">
							<div class="vc_col-sm-12 wpb_column vc_column_container">
								<div class="wpb_wrapper">
								<?php
									$portfolioType = get_post_meta($post->ID, 'pego_portfolio_type_selected' , true);
									if ($portfolioType != 'Standard') { ?>
									<div class="single-portfolio-type-content">
										<?php	
											
											$image_bg = get_post_meta($post->ID , 'pego_portfolio_background_slider_image' , true);
											$portfolio_icon = 'fa-image';
											$strip_title = strip_tags(get_the_title($post->ID));
											$link = get_permalink($post->ID);
											$pego_portfolio_title_subtitle = get_post_meta($post->ID , 'pego_portfolio_title_subtitle' , true);
											if ($portfolioType == 'Video') { 
												global $wp_embed;
												$linkVideo = get_post_meta($post->ID, 'pego_portfolio_video_url_gal' , true);
												$embed = $wp_embed->run_shortcode('[embed width="1280"]'.$linkVideo.'[/embed]');
												echo '<div class="video-wrapper"><div class="video-container">'.$embed.'</div></div>';	
											}
											elseif ($portfolioType == 'Grid') { ?>
													<div class="portfolio-grid-type-wrapper">
													 <?php
														 $attachments = get_children(array( 'post_parent' => $post->ID,
																				'post_status' => 'inherit',
																				'post_type' => 'attachment',
																				'post_mime_type' => 'image',
																				'order' => 'DESC',
																				'orderby' => 'menu_order ID'));
															$counter = 0;	
															$idGallery = rand(1, 10000);						  		
															foreach($attachments as $att_id => $attachment) {
																$full_img_url = wp_get_attachment_image_src($attachment->ID,'PostSection1', true);
																if ($full_img_url[0] != $image_bg) {
																	$counter++;
																	$image = wp_get_attachment_image_src( $attachment->ID, 'full', true ); 
																	?>
																	<figure class="portfolio-grid-type-half">
																		<a class="portfolio-grid-type-half-url" href="<?php echo esc_url($full_img_url[0]); ?>" rel="prettyPhoto[gallery<?php echo $idGallery; ?>]" >
																			<?php echo '<img src="'.esc_url($full_img_url[0]).'" alt="'.esc_attr($attachment->post_title).'" />'; ?>
																			<div class="portfolio-grid-type-overlay"></div>
																			<div class="fa portfolio-grid-type-overlay-icon fa-search-plus"></div>
																		</a>
																	</figure>
															<?php
																}
															}	
															?>
															<div class="clear"></div>
													</div>
											<?php
											}
											elseif ($portfolioType == 'Slideshow') { 
												wp_enqueue_script('pego_owl_carousel');
											?>
												<div  class="owl-fade-slide owl-carousel owl-theme">
												 <?php
														 $attachments = get_children(array( 'post_parent' => $post->ID,
																							'post_status' => 'inherit',
																							'post_type' => 'attachment',
																							'post_mime_type' => 'image',
																							'order' => 'DESC',
																							'orderby' => 'menu_order ID'));
															$idGallery = rand(1, 10000);	
															foreach($attachments as $att_id => $attachment) {
																$full_img_url = wp_get_attachment_image_src($attachment->ID,'PostSection1', true);
																if ($full_img_url[0] != $image_bg) {
																?>
																	<div class="item"><img src="<?php echo esc_url($full_img_url[0]); ?>" alt="<?php echo esc_attr($attachment->post_title); ?>" /></div>
																<?php
																}
															}
															?>
													</div>
											<?php
											}
											else {
												$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
												echo '<img src="'.esc_url($image[0]).'" alt="'.esc_attr(get_the_title($post->ID)).'" />';
											}
											?>
										</div>
										<div class="clear"></div>
										<?php 
										}
										$args = array('post_type'=> 'portfolio', 'posts_per_page' => -1, 'order'=> 'ASC', 'orderby' => 'menu_order ID');	
										$neigbour_posts = get_posts($args);
									
										
										$key = array_search($post, $neigbour_posts);
										
										?>
										<div class="portfolio-content">
											<?php the_content();  ?>
										</div>
										<div class="portfolio-bottom">
										<?php
										$termsSingle1 =  get_the_terms( $post->ID, 'portfolio_categories' );
										if( is_array($termsSingle1) ) {	
											$currentItem = 0;
											$terms_list = '<div class="portfolio-bottom-categories">';
											$terms_list .= '<i class="fa portfolio-bottom-categories-icon fa-tags"></i>';
											$numberOfCat = count($termsSingle1);
											foreach( $termsSingle as $termSingle1 ) {
												$currentItem++;
												$link = home_url() . '/portfolio_categories/' . $termSingle1->slug . '/';										
												if ($currentItem == $numberOfCat) {
													$terms_list .= '<a href="'.esc_url($link).'" >'.esc_html($termSingle1->name).'</a>';											
												}
												else
												{
													$terms_list .= '<a href="'.esc_url($link).'" >'.esc_html($termSingle1->name).'</a>, ';											
												}
											}
											$terms_list .= '</div>';
											echo $terms_list;
										}  
										pego_get_portfolio_socials($strip_title, $link); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>	
		</div><!-- end container -->
		<div class="portfolio-next-previous">
			<?php
			if ($key>0) {
				?>
					<a href="<?php echo get_permalink($neigbour_posts[$key-1]->ID); ?>" class="next-portfolio-wrapper">
						<span><i class="fa nextprev-icon fa-chevron-left"></i></span>
						<span class="next-portfolio-details">
							<span class="next-portfolio-details-inside">
								<span class="nextprev-portfolio-title"><?php echo get_the_title($neigbour_posts[$key-1]->ID); ?></span>	
							</span>		
						</span>
					</a>
				<?php
			}
			if ($key<(count($neigbour_posts)-1)) {
				?>
				<a href="<?php echo get_permalink($neigbour_posts[$key+1]->ID); ?>" class="prev-portfolio-wrapper">
					<span class="next-portfolio-details left-details">
						<span class="next-portfolio-details-inside">
						<span class="nextprev-portfolio-title"><?php echo get_the_title($neigbour_posts[$key+1]->ID); ?></span>
						<span><i class="fa nextprev-icon previcon fa-chevron-right"></i></span>
					</a>
				<?php
			}
			?>
	</div>	
<?php get_footer(); ?>