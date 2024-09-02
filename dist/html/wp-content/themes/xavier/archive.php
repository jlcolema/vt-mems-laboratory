 <?php get_header(); ?>
<?php		
		$wrap_class = 'pego-isotope-wrapper';
		$main_class= 'vc_col-sm-12';
		$sidebar_class = ' no-display';
		$sidebar_class1 = '';
		if (get_post_type( $post ) == 'post') {
			$sidebar_class = ' display-block'; 
			$main_class = 'vc_col-sm-9'; 
			$sidebar_class1 = ' sidebar-right';
		}
		$columns_class = 'vc_col-sm-6';
		$pego_page_sidebar = "Blog Sidebar";
		?>
			<div class="page-title-wrapper">
				<div class="page-title">
					<?php
					if(( is_category())||(is_tax('portfolio_categories')))  { 
					?>
						<h1><?php single_cat_title(); ?></h1>
					<?php
					}
					elseif( is_tag() ) { ?>
						<h1><?php single_tag_title(); ?></h1>
					<?php
					/* If this is a daily archive */ } elseif (is_day()) { ?>				
						<h1><?php the_time('F jS, Y'); ?></h1>
					<?php
					 /* If this is a monthly archive */ } elseif (is_month()) { ?>	
					 	<h1><?php the_time('F Y'); ?></h1>
					<?php
					/* If this is a yearly archive */ } elseif (is_year()) { ?>			
						<h1><?php the_time('Y'); ?></h1>
					<?php
					 /* If this is an author archive */ } elseif (is_author()) { ?>	
					 	<h1><?php the_author(); ?></h1>
					<?php
					/* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
						<h1><?php esc_html_e('Blog archive:','xavier'); ?></h1>
					<?php
					}
					?>
				</div>
			</div>	
			<div class="clear"></div>
		<div id="container"> <!-- start container -->	
			<?php
			wp_enqueue_script('pego_isotopeJS');
			$categories = get_categories(); 
			?>
		<div class="page-wrapper">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
				<div class="row-wrapper">
				<div class="vc_row wpb_row vc_row-fluid">
					<div class="<?php echo $main_class; ?> wpb_column vc_column_container expand_container">	
						<div class="wpb_wrapper">
				<?php
					if (get_post_type( $post ) == 'post') {
				?>		
						
							<div class="vc_row wpb_row vc_inner vc_row-fluid <?php echo $wrap_class; ?>  wrapper-2-columns isotope">
						<?php
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
								$post_tags = wp_get_post_tags($post->ID);
								if ($post_alternative_title != '') { $title = $post_alternative_title; }
								$strip_title = strip_tags($title);
					
								$extra_class = '';
								$icon_type = '';
								if ($format == 'quote') { $icon_type = 'icon-quote'; $extra_class = " quote_wrapper"; }
								if ($format == 'image') { $icon_type = 'icon-picture'; }
								if ($format == 'video') { $icon_type = 'icon-video'; }
								if ($format == 'audio') { $icon_type = 'icon-music'; }
								if ($format == 'gallery') { $icon_type = 'icon-camera'; $extra_class = " gallery_wrapper"; }
								if ($format == 'link')  { $icon_type = 'icon-link'; }
								if ($format == 'status') { $extra_class = " pego_twitter_wrapper"; }
					
								if ($post_categories) {
									$cats = array();
									$catslug = array();
				
									foreach($post_categories as $c){
										$cat = get_category( $c );
										$cats[] = array( 'id' => $cat->cat_ID, 'name' => $cat->name );
										$catslug[] =  $cat->slug;
										$catArray[] = $cat->cat_ID;
									}
									$cat_id = $cats[0]['id'];		
									$cat_name = $cats[0]['name'];	
									$cat_link =  get_category_link($cats[0]['id']);
								}
								$catslug = implode(" ",$catslug);
								?>
								<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php
								$pego_page_post_type  = '';
								if ($pego_page_post_type == 'standard') {
								?>
								<div class="<?php echo esc_attr($columns_class); ?> wpb_column vc_column_container standard-post-view isotope-item <?php echo esc_attr($catslug); ?>">
									<div class="post-showing-type1-wrapper post-format-<?php echo esc_attr($format); ?>">
										<div class="post-showing-type1<?php echo esc_attr($extra_class); ?>">
											<?php
											if (($format != 'quote')&&(($format != 'status'))) {
											?>
											<div class="post-details-wrapper">
											<?php
												if($post_categories) { 
												?>
												<div class="post-categories">
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
													}
													?>
												</div>
												<div class="post-detail-date"><?php echo $post_date; ?></div>
											</div>
											<div class="clear"></div>
											<div class="post-title">
												<a href="<?php echo esc_url($link); ?>" target="_self" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo $title; ?></a>
											</div>
											<div class="clear"></div>
											
											<div class="post-type">
												<?php
												if ($format == 'image') {
													$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
													?>
													<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
													<div class="post-grid-type-overlay"></div>
													<div class="fa post-grid-type-overlay-icon fa-search-plus"></div>
													</a>
													<?php
												}
							 					if ($format == 'video') { 				
													global $wp_embed;
													$linkVideo = get_post_meta($post->ID , 'pego_post_video_url' , true);
													$embed = $wp_embed->run_shortcode('[embed width="1280"]'.$linkVideo.'[/embed]');
													echo '<div class="video-wrapper"><div class="video-container">'.$embed.'</div></div>';	
												} 
												if ($format == 'link') {
													$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
													$link = get_post_meta($post->ID , 'pego_post_link_url' , true);
													?>
													<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_attr($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
													<?php
												}
												if ($format == 'gallery') {
													$post_gallery_type = get_post_meta($post->ID , 'pego_post_gallery_type' , true);
													if ($post_gallery_type == 'Grid') {
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
								 						?> 
														<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
														<div class="post-grid-type-overlay"></div>
														<div class="fa post-grid-type-overlay-icon fa-search-plus"></div>
								 						<?php
													} else
													{
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
																?>
																<div class="item"><a href="<?php echo esc_url($full_img_url[0]); ?>"  rel="prettyPhoto[gallery<?php echo esc_attr($idGallery); ?>]"><img src="<?php echo esc_url($full_img_url[0]); ?>" alt="<?php echo esc_attr($attachment->post_title); ?>" /></a></div>
																<?php
									  						}
									  						?>
														</div>
														<?php
													}
												}
							 					if ($format == 'audio') { 
							 	 					$audioFile = get_post_meta($post->ID , 'pego_post_audio_upload' , true);
							 						if ( $audioFile != '') {
							 			 				wp_enqueue_script('pego_mediaplayer');
							 	 						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
							  							?>
							  							<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_attr($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
							  							<audio preload="auto" controls>
															<source src="<?php echo $audioFile; ?>">
														</audio>
											 			<?php 
							    					} else {	
							    						$audioFile = get_post_meta($post->ID , 'pego_post_soundcloud_url' , true); 
							    						echo do_shortcode($audioFile);
							    					}
							  					}
												?>
											</div>
											<div class="clear"></div>
											<div class="post-standard-bottom-wrapper">
												<div class="post_content">
												<?php the_excerpt(); ?>
												</div>
												<div class="clear"></div>
												<?php
												$readmore = "Read more";
												if ( function_exists( 'get_option_tree' ) ) {
													if ( get_option_tree( 'pego_read_more_text' ) ) {
														$readmore = get_option_tree( 'pego_read_more_text' );
													}
												}
												?>
												<a class="standard-read-more" href="<?php echo esc_url($link); ?>" ><?php echo esc_html($readmore); ?></a>
												<div class="post-details">
													<span class="post-detail-single">
														<a href="<?php comments_link(); ?>" ><?php 
															if (get_comments_number($post->ID) == 0) { echo "No Comment"; }
															if (get_comments_number($post->ID) == 1) { echo get_comments_number($post->ID); echo " Comment"; }
															if (get_comments_number($post->ID) > 1) { echo get_comments_number($post->ID); echo " Comments"; }
															 ?>
													 	</a>
													 </span>
													 <?php  
														if ( shortcode_exists( 'zilla_likes' ) ) {
															echo '<span class="post-detail-single">'.do_shortcode('[zilla_likes]').'</span>'; 
														} 
													 ?>
												</div>
												<div class="clear"></div>
												<div class="post-standard-share">
													<?php pego_get_blog_socials($strip_title, $link); ?>
												</div>
											</div>
										<?php
										}
										else {
											if ($format == 'quote') {
												?>
												<div class="quote">
													<i class="quote-icon <?php echo esc_attr($icon_type); ?>"></i>
													<div class="quote-content"><?php the_content(); ?></div>
													<div class="quote-author"><?php echo esc_html(get_the_title()); ?></div>
												</div>
												<?php
											}
											if ($format == 'status') {
												?>
												<div class="twitter-post-type">
													<i class="twitter-icon fa-twitter"></i>
													<div class="twitter-content"><?php the_content(); ?></div>
													<div class="twitter-title"><?php echo esc_html(get_the_title()); ?></div>
												</div>
												<?php
											}
										}
										?>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<?php
								
								} else {
								?>
								<div class="<?php echo esc_attr($columns_class); ?> wpb_column vc_column_container isotope-item <?php echo esc_attr($catslug); ?>">
									<div class="post-showing-type1-wrapper post-format-<?php echo $format; ?>">
										<div class="post-showing-type1<?php echo esc_attr($extra_class); ?>">
											<?php
											if (($format != 'quote')&&(($format != 'status'))) {
											?>
											<div class="post-type">
												<?php
												if ($format == 'image') {
													$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
													?>
													<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
													<div class="post-grid-type-overlay"></div>
													<div class="fa post-grid-type-overlay-icon fa-search-plus"></div>
													</a>
													<?php
												}
							 					if ($format == 'video') { 				
													global $wp_embed;
													$linkVideo = get_post_meta($post->ID , 'pego_post_video_url' , true);
													$embed = $wp_embed->run_shortcode('[embed width="1280"]'.$linkVideo.'[/embed]');
													echo '<div class="video-wrapper"><div class="video-container">'.$embed.'</div></div>';	
												} 
												if ($format == 'link') {
													$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
													$link = get_post_meta($post->ID , 'pego_post_link_url' , true);
													?>
													<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_attr($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
													<?php
												}
												if ($format == 'gallery') {
													$post_gallery_type = get_post_meta($post->ID , 'pego_post_gallery_type' , true);
													if ($post_gallery_type == 'Grid') {
														$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
								 						?> 
														<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_url($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
														<div class="post-grid-type-overlay"></div>
														<div class="fa post-grid-type-overlay-icon fa-search-plus"></div>
								 						<?php
													} else
													{
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
																?>
																<div class="item"><a href="<?php echo esc_url($full_img_url[0]); ?>"  rel="prettyPhoto[gallery<?php echo esc_attr($idGallery); ?>]"><img src="<?php echo esc_url($full_img_url[0]); ?>" alt="<?php echo esc_attr($attachment->post_title); ?>" /></a></div>
																<?php
									  						}
									  						?>
														</div>
														<?php
													}
												}
							 					if ($format == 'audio') { 
							 	 					$audioFile = get_post_meta($post->ID , 'pego_post_audio_upload' , true);
							 						if ( $audioFile != '') {
							 			 				wp_enqueue_script('pego_mediaplayer');
							 	 						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
							  							?>
							  							<a title="<?php echo esc_attr(get_the_title()); ?>" href="<?php echo esc_attr($link); ?>" class="post-type-link"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" /></a>
							  							<audio preload="auto" controls>
															<source src="<?php echo $audioFile; ?>">
														</audio>
											 			<?php 
							    					} else {	
							    						$audioFile = get_post_meta($post->ID , 'pego_post_soundcloud_url' , true); 
							    						echo do_shortcode($audioFile);
							    					}
							  					}
												?>
												<span class="post-arrow"></span>
											</div>
											
											<div class="post-details-wrapper">
											<?php
												if($post_categories) { 
												?>
												<div class="post-categories">
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
													}
													?>
												</div>
												<div class="post-detail-date"><?php echo $post_date; ?></div>
												<div class="clear"></div>
												<div class="post-title">
													<a href="<?php echo esc_url($link); ?>" target="_self" title="<?php echo esc_attr(get_the_title()); ?>"><?php echo $title; ?></a>
												</div>
												<div class="clear"></div>
												<div class="post_content">
													<?php 
													$pego_page_post_sumamry_length = get_post_meta(get_the_ID() , 'pego_page_post_sumamry_length' , true);
													$excerpt = pego_get_the_excerpt(get_the_ID());
													if (($pego_page_post_sumamry_length != '')&&($excerpt != '')) {
														if (strlen($excerpt) > $pego_page_post_sumamry_length)
														{
															$postSummary = substr($excerpt,0,$pego_page_post_sumamry_length).'[...]';
														}
														echo $postSummary;
													} else {
														the_excerpt();
													}
													 ?>
												</div>
												<div class="post-details">
													<span class="post-detail-single">
														<a href="<?php comments_link(); ?>" ><?php 
															if (get_comments_number($post->ID) == 0) { echo "No Comment"; }
															if (get_comments_number($post->ID) == 1) { echo get_comments_number($post->ID); echo " Comment"; }
															if (get_comments_number($post->ID) > 1) { echo get_comments_number($post->ID); echo " Comments"; }
															 ?>
													 	</a>
													 </span>
													 <?php  
														if ( shortcode_exists( 'zilla_likes' ) ) {
															echo '<span class="post-detail-single">'.do_shortcode('[zilla_likes]').'</span>'; 
														} 
														pego_get_blog_socials($strip_title, $link);
													 ?>
												</div>
											</div>
										<?php
										}
										else {
											if ($format == 'quote') {
												?>
												<div class="quote">
													<i class="quote-icon <?php echo esc_attr($icon_type); ?>"></i>
													<div class="quote-content"><?php the_content(); ?></div>
													<div class="quote-author"><?php echo esc_html(get_the_title()); ?></div>
												</div>
												<?php
											}
											if ($format == 'status') {
												?>
												<div class="twitter-post-type">
													<i class="twitter-icon fa-twitter"></i>
													<div class="twitter-content"><?php the_content(); ?></div>
													<div class="twitter-title"><?php echo esc_html(get_the_title()); ?></div>
												</div>
												<?php
											}
										}
										?>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<?php
								}
								?>
								<div class="clear"></div>
								</div>
							<?php	
				 			endwhile; 
							 ?>	
						</div>
						<div class="pagination-wrapper">
  				  			<?php pego_kriesi_pagination(); ?>
						</div>
						<?php
						}
						if (get_post_type( $post ) == 'portfolio') {
						?>
							<div class="wpb_content_element vc_portfolio_grid">							
								<div class="vc_row wpb_row vc_inner vc_row-fluid pego-isotope-wrapper portfolio-grid-wrapper">
								<?php
									$itemCount = 0;
									$idd = 0;
									$columns_class= "4";
									$catArray = array();
									while ( have_posts() ) : the_post();
										$image_bg = get_post_meta($post->ID , 'pego_portfolio_background_slider_image' , true);
										$portfolio_type = get_post_meta($post->ID , 'pego_portfolio_type_selected' , true);
										$icon = 'fa-image';
										if ($portfolio_type == 'Slideshow') { $icon = 'fa-camera'; }
										if ($portfolio_type == 'Video') { $icon = 'fa-video-camera'; }
									?>
										<div class="vc_col-sm-<?php echo $columns_class; ?>  wpb_column vc_column_container single-portfolio-grid isotope-item">
											<div class="portfolio-grid-inside-wrap">
												<a href="<?php echo get_permalink($post->ID); ?>" class="portfolio-grid-inside">
													<div class="portfolio-grid-overlay"></div>
													<div class="portfolio-grid-overlay-hover"></div>
													<div class="fa portfolio-grid-overlay-icon <?php echo $icon; ?>"></div>
													<img class="portfolio-grid-image" src="<?php echo $image_bg; ?>"  />
													<div class="clear"></div>
												</a>
												<h1 class="portoflio-grid-title"><a href="<?php echo get_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></h1>
											</div>
										</div>
									<?php endwhile; ?>
									</div>
								</div>
								<div class="pagination-wrapper">
  				  			<?php pego_kriesi_pagination(); ?>
						</div>
						<?php
						}
						?>
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
			</div>
		</div><!-- end container -->	
<?php get_footer(); ?>