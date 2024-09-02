<?php get_header(); ?>

	<div class="people">

		<div class="sort-by">

			<ul>

				<li class="sort-by-all">

					<a href="/people/">All</a>

				</li>

				<?php

					$taxonomy = 'member_category';

					$tax_terms = get_terms($taxonomy, array( 'hide_empty' => false));

				?>

				<?php foreach ($tax_terms as $tax_term) { ?>

					<li class="sort-by-<?php echo $tax_term->slug; ?>">

						<a href="<?php echo esc_attr(get_term_link($tax_term, $taxonomy)); ?>">

							<?php echo $tax_term->name; ?>

						</a>


					</li>

				<?php } ?>

			</ul>

		</div>

		<div class="grid-listing">

			<ul>

				<?php echo do_shortcode( '[pods name="members" template="People Listing" limit="-1" orderby="title ASC" where="member_categories.slug LIKE \'collaborators\'"]' ); ?>

				<li class="gap"></li>

			</ul>

		</div>

	</div>

<?php get_footer(); ?>
