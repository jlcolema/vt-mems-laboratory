<?php get_header(); ?>

	<div class="results-for">

		<?php if ( have_posts() ) : ?>

			<h2 class="search-entry">Search Results for: <?php printf( __( '%s', 'vtml' ), get_search_query() ); ?></h2>

		<?php else : ?>

			<h2 class="search-entry no-results-found">Nothing Found</h2>

		<?php endif; ?>

	</div>

	<?php if ( have_posts() ) : ?>

		<div class="search-listing">

			<ul>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/* People */

					?>

					<?php if ( get_post_type() == 'members' ) : ?>

						<?php

							// Bio

							$people_bio = get_post_meta( $post->ID, 'bio', true );

						?>

						<li class="search-result-entry people-search-result">

							<h3 class="search-result-title">

								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

							</h3>

							<?php if ( $people_bio != '' ) : ?>

								<?php echo $people_bio; ?>

							<?php endif; ?>

							<div class="result-type">

								Found in <a href="/people/">People</a>

							</div>

						</li>

					<?php

						/* Research */

					?>

					<?php elseif ( get_post_type() == 'research_project' ) : ?>

						<?php

							// Description

							$research_description = get_post_meta( $post->ID, 'project_description', true );

						?>

						<li class="search-result-entry research-search-result">

							<h3 class="search-result-title">

								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

							</h3>

							<?php if ( $research_description != '' ) : ?>

								<div class="research-description">

									<?php echo $research_description; ?>

								</div>

							<?php endif; ?>

							<div class="result-type">

								Found in <a href="/research/">Research</a>

							</div>

						</li>

					<?php

						/* Publications */

					?>

					<?php elseif ( get_post_type() == 'publication' ) : ?>

						<?php

							// Authors

							$publication_authors = get_post_meta( $post->ID, 'pub_authors', true );

							// DOI

							$publication_doi = get_post_meta( $post->ID, 'idf_value', true );

							// Source

							$publication_source = get_post_meta( $post->ID, 'pub_source', true );

							// Date

							$publication_date = get_post_meta( $post->ID, 'pub_date', true );

						?>

						<li class="search-result-entry publication-search-result">

							<?php if ( $publication_authors != '' ) : ?>

								<div class="publication-authors">

									<?php echo $publication_authors; ?>

								</div>

							<?php endif; ?>

							<h3 class="search-result-title">

								<?php if ( $publication_doi != '' ) : ?>

									<a href="http://dx.doi.org/<?php echo $publication_doi; ?>" rel="external">

										<?php the_title(); ?>

									</a>

								<?php else : ?>

									&ldquo;<?php the_title(); ?>&rdquo;

								<?php endif; ?>

							</h3>

							<?php if ( $publication_source != '' ) : ?>

								<div class="publication-meta">

									<i><?php echo $publication_source; ?></i>.

									<?php if ( $publication_date != '' ) : ?>

										<?php echo $publication_date; ?>

									<?php endif; ?>

								</div>

							<?php endif; ?>

							<div class="result-type">

								Found in <a href="/publications/">Publications</a>

							</div>

						</li>

					<?php

						/* Resources */

					?>

					<?php elseif ( get_post_type() == 'resource' ) : ?>

						<?php

							// Resource Type

							$resource_type = get_post_meta( $post->ID, 'resource_type', true );

							// Link

							$resource_link = get_post_meta( $post->ID, 'resource_link', true );

							// Description

							$resource_description = get_post_meta( $post->ID, 'description' ,true );

						?>

						<li class="search-result-entry resource-search-result">

							<?php if ( $resource_type != '' ) : ?>

								<div class="resource-type">

									<?php echo $resource_type; ?> Resources

								</div>

							<?php endif; ?>

							<h3 class="search-result-title">

								<?php if ( $resource_link != '' ) : ?>

									<a href="<?php echo $resource_link; ?>" rel="external">

								<?php endif; ?>

									<?php the_title(); ?>

								<?php if ( $resource_link != '' ) : ?>

									</a>

								<?php endif; ?>

							</h3>

							<?php if ( $resource_description != '' ) : ?>

								<div class="resource-description">

									<?php echo $resource_description; ?>

								</div>

							<?php endif; ?>

							<div class="result-type">

								Found in <a href="/resources/">Resources</a>

							</div>

						</li>

					<?php

						/* News */

					?>

					<?php elseif ( get_post_type() == 'news' ) : ?>

						<?php

							// Link

							$news_link = get_post_meta( $post->ID, 'news_link', true );

						?>

						<li class="search-result-entry news-search-result">

							<time><?php the_date( 'F j, Y' ); ?></time>

							<h3 class="search-result-title">

								<?php if ( $news_link != '' ) : ?>

									<a href="<?php echo $news_link; ?>" rel="external">

								<?php endif; ?>

									<?php the_title(); ?>

								<?php if ( $news_link != '' ) : ?>

									</a>

								<?php endif; ?>

							</h3>

							<div class="result-type">

								Found in <a href="/news/">News</a>

							</div>

						</li>

					<?php

						/* Gallery */

					?>

					<?php elseif ( get_post_type() == 'gallery' ) : ?>

						<li class="search-result-entry gallery-search-result">

							<h3 class="search-result-title">

								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

							</h3>

							<div class="result-type">

								Found in <a href="/gallery/">Gallery</a>

							</div>

						</li>

					<?php

						/* Default */

					?>

					<?php else : ?>

						<li class="search-result-entry default-search-result">

							<h3 class="search-result-title">

								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

							</h3>

						</li>

					<?php endif; ?>

				<?php endwhile; ?>

			</ul>

		</div>

		<?php search_results_navigation(); ?>

	<?php else : ?>

		<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

	<?php endif; ?>

<?php get_footer(); ?>
