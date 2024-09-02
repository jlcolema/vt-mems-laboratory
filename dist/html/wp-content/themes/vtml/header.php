<!doctype html>

<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta http-equiv="x-ua-compatible" content="ie=edge" />

	<title><?php if ( is_page( 'home' ) ) : ?>A very nice description<?php else : ?><?php the_title(); ?><?php endif; ?> &mdash; <?php bloginfo( 'name' ); ?></title>

	<meta name="description" content="" />

	<meta name="keywords" content="" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/assets/img/favicon.png" />

	<link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/assets/img/touch-icon.png" />

	<link type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/screen.css" rel="stylesheet" media="screen, projection" />

	<link type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/assets/css/print.css" rel="stylesheet" media="print" />

	<?php wp_head(); ?>

</head>

<body <?php body_class( 'loading' ); ?>>

	<div id="pre-header" class="pre-header">

		<div class="wrap">

			<nav class="nav utility-navigation" role="navigation">

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
						'theme_location'	=> 'utility',
						'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
						// 'item_spacing'	=> 'preserve',

					));

				?>

			</nav>

		</div>

	</div>

	<header id="header" class="header" role="banner">

		<div class="wrap">

			<div class="logo">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

					<?php get_template_part( 'inc/logo', '' ); ?>

				</a>

			</div>

			<nav class="nav primary-navigation" role="navigation">

				<div class="toggle">

					<span>Menu</span>

				</div>

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
						'theme_location'	=> 'primary',
						'items_wrap'		=> '<ul class="%2$s">%3$s</ul>',
						// 'item_spacing'	=> 'preserve',

					));

				?>

				<?php /*

				<form role="search" method="get" class="search global-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

					<label for="search">Search</label>

					<div class="">

						<input type="search" name="search" id="search" class="" placeholder="Search" />

						<button type="submit">Search</button>

					</div>

				</form>

				*/ ?>

			</nav>

		</div>

	</header>

	<main id="content" class="content" role="main">

		<div class="wrap">

			<?php get_template_part( 'inc/section', '' ); ?>

			<div class="inner-content">

				<div class="primary">
