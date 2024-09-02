<?php get_header(); ?>

	<div class="publications">

		<div class="articles">

			<?php echo do_shortcode( '[pods name="publication" template="Publication Listing" orderby="date DESC" limit="-1"]' ); ?>

		</div>

	</div>

<?php get_footer(); ?>
