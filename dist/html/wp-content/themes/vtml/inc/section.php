<div class="section">

	<?php if ( is_tax( 'member_category' ) ) : ?>

		<h1>People</h1>

	<?php elseif ( is_search( '' ) ) : ?>

		<h1>Search Results</h1>

	<?php else : ?>

		<h1><?php the_title(); ?></h1>

	<?php endif; ?>

</div>
