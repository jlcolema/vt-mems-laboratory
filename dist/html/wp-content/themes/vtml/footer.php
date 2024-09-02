				</div>

				<?php if ( is_page( array( 'publications', 'resources', 'news', 'contact' ) ) || ( is_search() ) || ( is_singular( array( 'members', 'research_project' ) ) ) ) : ?>

					<div class="secondary" role="complementary">

						<!-- Default Widget(s) -->

						<div class="widget widget-global-search">

							<h2 class="widget-title">Search</h2>

							<div class="widget-content">

								<form role="search" method="get" class="search-form search global-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

									<label for="search-form">Search</label>

									<div class="">

										<input type="search" name="s" id="search-form" class="" placeholder="Search" value="" />

										<button type="submit"></button>

									</div>

								</form>

							</div>

						</div>

						<!-- Widgets for Individual Research Entries -->

						<?php if ( is_singular( 'research_project' ) ) : ?>

							<div class="widget widget-research-navigation">

								<h2 class="widget-title">Research Projects</h2>

								<div class="widget-content">

									<ul>

										<li>

											<a href="/research/biomemsnems/">BioMEMS/NEMS</a>

											<ul>

												<li>

													<a href="/research/biomemsnems/bioelectronics/">BioElectronics</a>

												</li>

												<li>

													<a href="/research/biomemsnems/biomechanics/">BioMechanics</a>

												</li>

											</ul>

										</li>

										<li>

											<a href="/research/micro-analytical-chemistry/">Micro Analytical Chemistry</a>

											<ul>

												<li>

													<a href="/research/micro-analytical-chemistry/detection-and-integration/">Detection and Integration</a>

												</li>

												<li>

													<a href="/research/micro-analytical-chemistry/sample-preparation/">Sample Preparation</a>

												</li>

												<li>

													<a href="/research/micro-analytical-chemistry/separation-columns/">Separation Columns</a>

												</li>

											</ul>

										</li>

									</ul>

								</div>

							</div>

						<?php endif; ?>

						<!-- Widgets for the Contact Page -->

						<?php if ( is_page( 'contact' ) ) : ?>

							<div class="widget widget-contact-information">

								<h2 class="widget-title">Lab Information</h2>

								<div class="widget-content">

									<?php echo do_shortcode( '[pods name="globals" template="H-Card Widget"]' ); ?>

								</div>

							</div>

						<?php endif; ?>



				<?php endif; ?>

				<?php if ( is_page( array( 'publications', 'resources', 'news' ) ) || ( is_singular( array( 'members', 'research_project' ) ) ) ) : ?>

					</div>

				<?php endif; ?>

			</div>

		</div>

	</main>

	<div id="pre-footer" class="pre-footer">

		<div class="wrap">

			<div class="pre-footer-widgets">

				<div class="widget widget-publications">

					<h3 class="widget-title">

						<a href="/publications/">Publications</a>

					</h3>

					<div class="widget-content">

						<?php echo do_shortcode( '[pods name="publication" template="Publications Widget" limit="2"]' ); ?>

					</div>

				</div>

				<div class="widget widget-news">

					<h3 class="widget-title">

						<a href="/news/">News</a>

					</h3>

					<div class="widget-content">

						<?php echo do_shortcode( '[pods name="news" template="News Widget" limit="3"]' ); ?>

					</div>

				</div>

				<div class="widget widget-navigation">

					<h3 class="widget-title">Navigation</h3>

					<div class="widget-content">

						<nav class="nav" role="navigation">

							<?php

								wp_nav_menu( array(

									// 'menu'				=> '',
									'menu_class'		=> '',
									// 'menu_id'			=> '',
									'container'			=> '',
									// 'container_class'	=> '',
									// 'container_id'		=> '',
									// 'fallback_cb'		=> '',
									// 'before'			=> '',
									// 'after'			=> '',
									// 'link_before'		=> '',
									// 'link_after'			=> '',
									// 'echo'				=> true,
									'depth'				=> 1,
									// 'walker'			=> '',
									'theme_location'	=> 'footer',
									'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
									// 'item_spacing'	=> 'preserve',

								));

							?>

						</nav>

					</div>

				</div>

				<div class="widget widget-connect">

					<h3 class="widget-title">Connect</h3>

					<div class="widget-content">

						<?php echo do_shortcode( '[pods name="globals" template="Connect Widget"]' ); ?>

					</div>

				</div>

			</div>

		</div>

	</div>

	<footer id="footer" class="footer" role="contentinfo">

		<div class="wrap">

			<p id="copyright" class="copyright">Copyright <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>

			<div class="created-by">

				Created by <a href="http://academicwebpages.com" rel="external">Academic Web Pages</a>

			</div>

		</div>

	</footer>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

	<script>

		window.jQuery || document.write( '<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/assets/js/jquery.js"><\/script>' )

	</script>

	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/assets/js/global.js"></script>

	<?php wp_footer(); ?>

</body>

</html>
