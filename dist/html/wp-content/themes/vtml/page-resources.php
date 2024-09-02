<?php get_header(); ?>

	<div class="resources">

		<div class="resource-type">

			<div class="title">

				<h2>University Resources</h2>

			</div>

			<div class="listing">

				<ul>

					<?php echo do_shortcode( '[pods name="resource" template="Resource Listing" orderby="date" limit="-1" where="resource_type.meta_value LIKE \'university\'"]' ); ?>

				</ul>

			</div>

		</div>

		<div class="resource-type">

			<div class="title">

				<h2>MEMS Resources</h2>

			</div>

			<div class="listing">

				<ul>

					<?php echo do_shortcode( '[pods name="resource" template="Resource Listing" orderby="date" limit="-1" where="resource_type.meta_value LIKE \'mems\'"]' ); ?>

				</ul>

			</div>

		</div>

	</div>

<?php get_footer(); ?>
