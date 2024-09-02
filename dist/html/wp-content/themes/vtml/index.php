<?php get_header(); ?>

	<div class="video">

		<iframe width="560" height="315" src="https://www.youtube.com/embed/CcyhTDrABvk" frameborder="0" allowfullscreen></iframe>

	</div>

	<div class="news-posts">

		<?php

			$args = array(

				'numberposts' 	=> 5,
				'post_type'		=> 'post',
				'orderby'		=> 'date',
				'post_status'	=> 'publish',
				// 'order'			=> 'DESC'

			);

			$posts = get_posts( $args );

		?>

		<?php foreach ( $posts as $post ) : ?>

			<?php

				/* Thumbnail
				--------------------------------------*/

				// Attachment

				$post_thumbnail_attachment_id = get_field( 'post_thumbnail', $project->ID );

				// Size

				$post_thumbnail_size_full = "full";

				// Options

				$post_thumbnail_full = wp_get_attachment_image_src( $post_thumbnail_attachment_id, $post_thumbnail_size_full );

				/* Excerpt
				--------------------------------------*/

				$post_excerpt = get_field( 'post_excerpt', $post->ID );

			?>

			<?php setup_postdata($post); ?>

			<article class="summary">

				<div class="thumbnail">

					<a href="<?php the_permalink(); ?>">

						<img src="<?php echo $post_thumbnail_full[0]; ?>" alt="A very nice description." />

					</a>

				</div>

				<h1 class="title">

					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

				</h1>

				<div class="excerpt">

					<p><?php echo $post_excerpt; ?></p>

				</div>

				<footer>

					<time datetime="" class="pubdate"><?php echo get_the_date( 'F Y' ); ?></time>

				</footer>

			</article>

		<?php endforeach; ?>

		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

	</div>

<?php get_footer(); ?>
