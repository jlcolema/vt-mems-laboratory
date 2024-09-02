<?php get_header(); ?>
<?php pego_get_prev_next_link(); ?>
<?php
		$pego_page_titles_show = get_post_meta($post->ID , 'pego_page_titles_show' , true);
		$pego_page_title_page_title_text = get_post_meta($post->ID , 'pego_page_title_page_title_text' , true);
		$pego_page_titles_bg_image = get_post_meta($post->ID , 'pego_page_titles_bg_image' , true);
		$pego_page_sidebar = "Blog Sidebar";
		$sidebar_class = ' display-block'; 
		$main_class = 'vc_col-sm-9'; 
		$sidebar_class1 = ' sidebar-right';
		
		$columns_class = 'vc_col-sm-12';
		$post_categories = wp_get_post_categories( $post->ID );
		$dateFormat = get_option( 'date_format' );
		$post_date = get_the_date($dateFormat);
		$bg_css = '';
		if ($pego_page_titles_bg_image != '') { $bg_css = ' style = "background: url(\''.esc_url($pego_page_titles_bg_image).'\') no-repeat;  background-size: cover; "'; }
		?>
		<div id="container"> <!-- start container -->	
			<?php
			wp_enqueue_script('pego_isotopeJS');
			$categories = array();
			$cat_ids = array();
			$categories = get_categories(); 
			?>
		
		
					<div class="page-wrapper single-post-wrapper">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						<div class="row-wrapper">
						<div class="vc_row wpb_row vc_row-fluid">
							<div class="<?php echo $main_class; ?> wpb_column vc_column_container expand_container">
								<div class="wpb_wrapper">
						<div class="vc_row wpb_row vc_inner vc_row-fluid  wrapper-2-columns isotope">
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
								
								
								if ($post_categories) {
									$cats = array();
									foreach($post_categories as $c){
										$cat = get_category( $c );
										$cats[] = array( 'id' => $cat->cat_ID, 'name' => $cat->name );
										$related_cat[] = $cat->cat_ID;
									}
									$cat_id = $cats[0]['id'];		
									$cat_name = $cats[0]['name'];	
									$cat_link =  get_category_link($cats[0]['id']);
								}
								$related_string = implode(",", $related_cat);
								$current_id = $post->ID;
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
												<?php echo $title; ?>
											</div>
											
											<div class="clear"></div>
											<div class="post-type-single">
												<?php
												if ($format == 'image') {
													$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
													?>
													<img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
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
													<img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
													<?php
												}
												if ($format == 'gallery') {
													$post_gallery_type = get_post_meta($post->ID , 'pego_post_gallery_type' , true);
													if ($post_gallery_type == 'Grid') {
														?>
														<div class="gallery-grid-wrapper grid cs-style-3">
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
																	$counter++;
																	$post_thumbnail = pego_getImageBySize(array(  'attach_id' => $attachment->ID, 'thumb_size' => '770x350' ));
																	$thumbnail = $post_thumbnail['thumbnail'];
																	$image = wp_get_attachment_image_src( $attachment->ID, 'full', true ); 
																	if ($counter == 1 ) { ?> <figure class="gallery-grid-half"> <?php }
																	if ($counter == 2 ) { ?> <figure class="gallery-grid-half"> <?php }
																	if ($counter == 3 ) { ?> <figure class="gallery-grid-full"> <?php 
																		$post_thumbnail = pego_getImageBySize(array(  'attach_id' => $attachment->ID, 'thumb_size' => '940x300' ));
																		$thumbnail = $post_thumbnail['thumbnail'];
																	}
																	if ($counter == 4 ) { ?> <figure class="gallery-grid-half"> <?php }
																	if ($counter == 5 ) { ?> <figure class="gallery-grid-half"> <?php }
																	?>
																	<a href="<?php echo esc_url($image[0]); ?>" rel="prettyPhoto[gallery<?php echo $idGallery; ?>]" >
																		<?php echo $thumbnail; ?>
																		<div class="post-grid-type-overlay"></div>
																		<div class="fa post-grid-type-overlay-icon fa-search-plus"></div>
																	</a>
																	</figure>
																<?php
																}	
																?>
																<div class="clear"></div>
														</div>
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
							  							<img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
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
												<?php the_content(); ?>
												</div>
												<div class="clear"></div>
												<div class="standard-post-details-wrapper">
													<div class="post-author">
														<i class="post-details-icon icon-user"></i>
														<?php the_author_posts_link(); ?>
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
														 ?>
														 <span class="post-detail-single">
															<?php the_tags( '', ', ', '' ); ?> 
														 </span>
														 <?php pego_get_blog_socials($strip_title, $link); ?>
													</div>
												</div>
												<div class="clear"></div>
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
									<?php 
									
									$argsPosts = array('post_type'=> 'post',  'posts_per_page' => 6, 'order'=> 'DESC', 'orderby' => 'post_date', 'cat' => $related_string, 'post__not_in' => array($current_id)  );
									$postsPosts= get_posts($argsPosts);
									if($postsPosts) {
										$related_count = 0;
										$pego_related_items_title = '';
										if ( function_exists( 'ot_get_option' ) ) {
											if (ot_get_option('pego_related_items_title') != '') {
												$pego_related_items_title =  ot_get_option('pego_related_items_title');
												echo '<h2 class="related-title">'.$pego_related_items_title.'</h2>';
											}
										}
									
					
										echo '<div class="vc_row wpb_row vc_inner vc_row-fluid">';
											foreach ($postsPosts as $single_related) {
											$related_count++;
						
											$post_alternative_title = get_post_meta($single_related->ID,'post_alternative_title', true);
											$title = get_the_title($single_related); 
	
											if ($post_alternative_title != '') { $title = $post_alternative_title; }
						
											$title = get_the_title($single_related->ID); 
											$link = get_the_permalink($single_related->ID);
											$post_tags = wp_get_post_tags($single_related->ID);
											if ($post_alternative_title != '') { $title = $post_alternative_title; }
											$strip_title = strip_tags($title);
										?>
											<div class="vc_col-sm-4 wpb_column vc_column_container related-item">
												<div class="related-item-thumb">
												<?php
												if (has_post_thumbnail( $single_related->ID )) {
													echo get_the_post_thumbnail( $single_related->ID, 'thumbnail' );  
												} elseif (get_post_type( $single_related ) == 'post') {
													$format = get_post_format( $single_related->ID );	
													$icon = 'fa-pencil';
													if ($format == 'image') { $icon = 'fa-image'; }
													if ($format == 'gallery') { $icon = 'fa-camera'; }
													if ($format == 'video') { $icon = 'fa-video-camera'; }
													if ($format == 'audio') { $icon = 'fa-music'; }
													echo '<i class="fa related-icon '.$icon.'"></i>';
												}  else {
													echo '<i class="fa related-icon fa-file-o"></i>';
												}
												?>
												</div>
												<div class="related-item-details">
													<a href="<?php echo esc_url($link); ?>" title="<?php echo esc_attr($title); ?>"><?php echo $title; ?></a>
													<div class="related-details">
														<span class="related-detail"><?php echo $post_date; ?></span>
													</div>
												</div>
												<div class="clear"></div>
											</div>
						
											<?php
											if (($related_count % 3) == 0) {
												echo '<div class="clear"></div>';
											}
										}
										echo '</div><div class="clear"></div>';
									}
									?>
				
									<div class="post-showing-type1-wrapper comments-wrapper">
										<div class="post-showing-type1">
											<!-- start comments -->												
											<div id="comments">
												<?php comments_template(); ?>
											</div>				
											<!-- end comments -->	
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
								
								</div>
							<?php	
				 			endwhile; 
							 ?>	
						</div>
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