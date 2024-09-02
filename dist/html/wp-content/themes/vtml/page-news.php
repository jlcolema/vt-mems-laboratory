<?php get_header(); ?>

	<div class="news">

		<div class="articles">

			<?php echo do_shortcode( '[pods name="news" template="News Listing" orderby="date DESC" limit="-1"]' ); ?>

		</div>

	</div>

<?php get_footer(); ?>
