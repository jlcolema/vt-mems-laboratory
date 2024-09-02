<?php

	/*------------------------------------*\
	   Defaults
	\*------------------------------------*/

	// Sets up theme defaults and registers support for various WordPress features.

	// Note that this function is hooked into the after_setup_theme hook, which
	// runs before the init hook. The init hook is too late for some features, such
	// as indicating support for post thumbnails.

	function vtml_setup() {

		/* Let WordPress manage <title>
		--------------------------------------*/

		// By adding theme support, we declare that this theme does not use a
		// hard-coded <title> tag in the document head, and expect WordPress to
		// provide it for us.

		// add_theme_support( 'title-tag' );

		/* Image Sizes
		--------------------------------------*/

		// Note...

		// add_image_size( 'vtml-featured-image', 2000, 1200, true );

		// add_image_size( 'vtml-thumbnail-avatar', 100, 100, true );

		/* Menus
		--------------------------------------*/

		// This theme uses wp_nav_menu() in one location.

		register_nav_menus( array(

			'primary'	=> __( 'Primary Navigation', 'vtml' ),
			'utility'	=> __( 'Utility Navigation', 'vtml' ),
			'footer'	=> __( 'Footer Navigation', 'vtml' )

		) );

		/* HTML5
		--------------------------------------*/

		// Switch default core markup for search form, comment form, and comments
		// to output valid HTML5.

		add_theme_support( 'html5', array(

			'comment-form',
			'comment-list',
			'gallery',
			'caption',

		) );

		/* Editor Styles
		--------------------------------------*/

		// This theme styles the visual editor to resemble the theme style,
		// specifically font, colors, and column width.

		// add_editor_style( array( 'assets/css/editor-style.css', vtml_fonts_url() ) );

		add_editor_style( array( 'assets/css/editor.css' ) );

	}

	add_action( 'after_setup_theme', 'vtml_setup' );

	/*------------------------------------*\
	   Widgets
	\*------------------------------------*/

	// Register widget area.

	// Source: https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

	function vtml_widgets_init() {

		register_sidebar( array(

			'name'          => __( 'Sidebar', 'vtml' ),
			'id'            => 'sidebar-widgets',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'vtml' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',

		) );

		// register_sidebar( array(

		// 	'name'          => __( 'Footer', 'vtml' ),
		// 	'id'            => 'pre-footer-widgets',
		// 	'description'   => __( 'Add widgets here to appear in your footer.', 'vtml' ),
		// 	'before_widget' => '<div id="%1$s" class="widget %2$s">',
		// 	'after_widget'  => '</div>',
		// 	'before_title'  => '<h3 class="widget-title">',
		// 	'after_title'   => '</h3>',

		// ) );

	}

	/*------------------------------------*\
	   JavaScript Detection
	\*------------------------------------*/

	// Adds a `js` class to the root <html> element when JavaScript is detected.

	// function vtml_javascript_detection() {

		// echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

	// }

	// add_action( 'wp_head', 'vtml_javascript_detection', 0 );


	add_action( 'widgets_init', 'vtml_widgets_init' );

	/*------------------------------------*\
	   Enqueue Scripts and Styles
	\*------------------------------------*/

	// Note...

	function vtml_scripts() {

		/* Styles
		--------------------------------------*/

		// Theme stylesheet.

		// wp_enqueue_style( 'vtml-style', get_stylesheet_uri() );

		// Screen styles

		// wp_enqueue_style( 'vtml-screen', get_theme_file_uri( '/assets/css/screen.css' ), array(), '1.0', 'all' );

		// Prints styles

		// wp_enqueue_style( 'vtml-print', get_theme_file_uri( '/assets/css/print.css' ), array(), '1.0', 'print' );

		/* Scripts
		--------------------------------------*/

		// jQuery

		// wp_deregister_script( 'jquery' );

		// wp_register_script( 'jquery', get_theme_file_uri( '' ), array(), '1.0', true );

		// wp_enqueue_script( 'jquery' );

		// Global Scripts

		// wp_enqueue_script( 'vtml-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

		// wp_enqueue_script( 'vtml-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

		// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

			// 	wp_enqueue_script( 'comment-reply' );

		// }

	}

	add_action( 'wp_enqueue_scripts', 'vtml_scripts' );

	/*------------------------------------*\
	   Title
	\*------------------------------------*/

	// Notes...

	/*------------------------------------*\
	   Support for SVG
	\*------------------------------------*/

	// Notes...

	function cc_mime_types( $mimes ) {

		$mimes['svg'] = 'image/svg+xml';

		return $mimes;

	}

	add_filter( 'upload_mimes', 'cc_mime_types' );

	/*------------------------------------*\
	   Deregister Features
	\*------------------------------------*/

	// Notes...

	function deregister_features() {

		/* Title
		--------------------------------------*/

		// Notes...

		wp_deregister_script( 'wp-embed' );

		/* Title
		--------------------------------------*/

		// Notes...

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		/* Title
		--------------------------------------*/

		// Notes...

		global $wp_widget_factory;

		remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );

		/* Title
		--------------------------------------*/

		// Notes...

		remove_action( 'wp_head', 'wp_generator' );

		/* Title
		--------------------------------------*/

		// Notes...

		remove_action( 'wp_head', 'wlwmanifest_link' );

		/* Title
		--------------------------------------*/

		// Notes...

		remove_action( 'wp_head', 'rsd_link' );

		/* Title
		--------------------------------------*/

		// Notes...

		remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

		/* Title
		--------------------------------------*/

		// Notes...

		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );

		remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

		/* Title
		--------------------------------------*/

		// Notes...

		remove_action( 'wp_head', 'rel_canonical' );

		/* Title
		--------------------------------------*/

		// Notes...

		remove_action( 'wp_head', 'wp_resource_hints', 2 );

	}

	add_action( 'init', 'deregister_features' );

	/*------------------------------------*\
	   Contact Form 7
	\*------------------------------------*/

	// Disable initial loading of stylesheet and script.

	add_filter( 'wpcf7_load_css', '__return_false' );

	add_filter( 'wpcf7_load_js', '__return_false' );

	/*------------------------------------*\
	   Date Field Format
	\*------------------------------------*/

	// Out Month and Year for Date Field

	function entry_month_day_and_year($input_date) {

		return date("F d, Y", strtotime($input_date));

	}

	function entry_month_and_year($input_date) {

		return date("F Y", strtotime($input_date));

	}

	/*------------------------------------*\
	   Secondary Navigation
	\*------------------------------------*/

	// List items based on menu.

	// add hook

	// add_filter( 'wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2 );

	// filter_hook function to react on sub_menu flag

	// function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {

		// if ( isset( $args->sub_menu ) ) {

			// $root_id = 0;

			// find the current menu item

			// foreach ( $sorted_menu_items as $menu_item ) {

				// if ( $menu_item->current ) {

					// set the root id based on whether the current menu item has a parent or not

					// $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;

					// break;

				// }

			// }

			// find the top level parent

			// if ( ! isset( $args->direct_parent ) ) {

				// $prev_root_id = $root_id;

				// while ( $prev_root_id != 0 ) {

					// foreach ( $sorted_menu_items as $menu_item ) {

						// if ( $menu_item->ID == $prev_root_id ) {

							// $prev_root_id = $menu_item->menu_item_parent;

							// don't set the root_id to 0 if we've reached the top of the menu

							// if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;

							// break;

						// }

					// }

				// }

			// }

			// $menu_item_parents = array();

			// foreach ( $sorted_menu_items as $key => $item ) {

				// init menu_item_parents

				// if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

				// if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {

					// part of sub-tree: keep!

					// $menu_item_parents[] = $item->ID;

				// } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {

					// not part of sub-tree: away with it!

					// unset( $sorted_menu_items[$key] );

				// }

			// }

			// return $sorted_menu_items;

		// } else {

			// return $sorted_menu_items;

		// }

	// }

	/*------------------------------------*\
	   Advanced Custom Fields
	\*------------------------------------*/

	// Notes...

	/* Options Page
	--------------------------------------*/

	// if ( function_exists( 'acf_add_options_page' ) ) {

		// acf_add_options_page(array(

			// 'page_title'	=> 'Theme General Settings',
			// 'menu_title'	=> 'Globals',
			// 'menu_slug'		=> 'globals',
			// 'capability'	=> 'edit_posts',
			// 'redirect'		=> false

		// ));

		// acf_add_options_sub_page(array(

		// 	'page_title'	=> 'Banner',
		// 	'menu_title'	=> 'Banner',
		// 	'parent_slug'	=> 'globals'

		// ));

		// acf_add_options_sub_page(array(

		// 	'page_title'	=> 'Welcome',
		// 	'menu_title'	=> 'Welcome',
		// 	'parent_slug'	=> 'globals'

		// ));

		// acf_add_options_sub_page(array(

		// 	'page_title'	=> 'Contact Information',
		// 	'menu_title'	=> 'Contact Information',
		// 	'parent_slug'	=> 'globals'

		// ));

		// acf_add_options_sub_page(array(

		// 	'page_title'	=> 'Education',
		// 	'menu_title'	=> 'Education',
		// 	'parent_slug'	=> 'globals'

		// ));

		// acf_add_options_sub_page(array(

		// 	'page_title'	=> 'Affiliations',
		// 	'menu_title'	=> 'Affiliations',
		// 	'parent_slug'	=> 'globals'

		// ));

		// acf_add_options_sub_page(array(

		// 	'page_title'	=> 'Positions',
		// 	'menu_title'	=> 'Positions',
		// 	'parent_slug'	=> 'globals'

		// ));

		// acf_add_options_sub_page(array(

		// 	'page_title'	=> 'Curriculum Vitae',
		// 	'menu_title'	=> 'Curriculum Vitae',
		// 	'parent_slug'	=> 'globals'

		// ));

		// acf_add_options_sub_page(array(

			// 'page_title'	=> 'Social Media',
			// 'menu_title'	=> 'Social Media',
			// 'parent_slug'	=> 'globals'

		// ));

	// }

	/*------------------------------------*\
	   Pods Plugin for Agah
	\*------------------------------------*/

	// Notes...


	// my_date functions are called by PODS templates

	function my_date_news($input_date) {

		return date("F j, Y", strtotime($input_date));

	}

	function my_date_pubs($input_date) {

		return date("F Y", strtotime($input_date));

	}

	function show_related_pubs($member_slug) {

		$count = FALSE;

		$param = array(

			'limit' => -1,
			'orderby' => 'date DESC',

		);

		$pubs = pods('publication', $param);

		$html = "<div class='related-publications'><h3>Related Publications</h3><div class='articles'>";

		while ( $pubs->fetch() ) :

			$member_links = $pubs->field('member_link');

			if (empty($member_links) != 1) {

				foreach ($member_links as $member_link) {

					if ($member_link['slug'] == $member_slug) {

						$html .= "<article class='summary'>";

							$html .= "<div class='authors'>" . $pubs->field( 'pub_authors' ) . "</div>";

							$html .= "<h1>";

								$html .= $pubs->field( ' title ' );

							$html .= "</h1>";

							$html .= "<div class='meta'>";

								$html .= "<i>" . $pubs->field( ' pub_source ' ) . "</i>. ";

								$html .= my_date_pubs($pubs->field( 'post_date' ));

							$html .= "</div>";

						$html .= "</article>";

						$count = TRUE;

					}

				}

			}

		endwhile;

		if ($count) {

			return $html .= "</div></div>";

		} else {

			return "";

		}

	}

	function show_related_pubs_research($research_slug) {

		$count = FALSE;

		$param = array(

			'limit' => -1,
			'orderby' => 'date DESC',

		);

		$pubs = pods('publication', $param);

		$html = "<div class='related-publications'><h3>Related Publications</h3><div class='articles'>";

		while ( $pubs->fetch() ) :

			$research_links = $pubs->field('research_link');

			if (empty($research_links) != 1) {

				foreach ($research_links as $research_link) {

					//echo "slug is " . $research_slug;

					if ($research_link['slug'] == $research_slug) {

						$html .= "<article class='summary'>";

							$html .= "<div class='authors'>" . $pubs->field( 'pub_authors' ) . "</div>";

							$html .= "<h1>";

								$html .= $pubs->field( ' title ' );

							$html .= "</h1>";

							$html .= "<div class='meta'>";

								$html .= "<i>" . $pubs->field( ' pub_source ' ) . "</i>. ";

								$html .= my_date_pubs($pubs->field( 'post_date' ));

							$html .= "</div>";

						$html .= "</article>";

						$count = TRUE;

					}

				}

			}

		endwhile;

		if ($count) {

			return $html .= "</div></div>";

		} else {

			return "";

		}

	}

	function show_related_news($member_slug) {

		$count = FALSE;

		$param = array(

			'limit' => -1,
			'orderby' => 'date DESC',

		);

		$news = pods('news', $param);

		$html = "<div class='related-news'><h3>Related News</h3><div class='articles'> ";

		while ( $news->fetch() ) :

			$member_links = $news->field('member_link');

			if (empty($member_links) != 1) {

				foreach ($member_links as $member_link) {

					//echo $member_link['slug'] . "/" . $member_slug . "/" . $news->field( 'title' ) . "<BR>";

					if ($member_link['slug'] == $member_slug) {

						$html .= "<article class='summary'>";

							$html .= "<time>" . my_date_news($news->field( 'post_date' )) . "</time>";

							$html .= "<h1>";

								if ($news->field( 'news_link' ) != "" ) {

									$html .= "<a href='" . $news->field( 'news_link' ) . "' target='_blank'>" . $news->field( 'title' ) . "</a>";

								} else {

									$html .= $news->field( 'title' );

								}

							$html .= "</h1>";

						$html .= "</article>";

						$count = TRUE;

					}

				}

			}

		endwhile;

		if ($count) {

			return $html .= "</div></div>";

		} else {

			return "";

		}

	}

	/*------------------------------------*\
	   Search Results
	\*------------------------------------*/

	// Extend WordPress search to include custom fields

	// Source: https://adambalee.com/search-wordpress-by-custom-fields-without-a-plugin/




/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

	/*------------------------------------*\
	   Search Navigation
	\*------------------------------------*/

	// Notes...



function search_results_navigation() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="search-navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="previous-page">%s</li>' . "\n", get_previous_posts_link( '&laquo;' ) );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>&hellip;</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="next-page">%s</li>' . "\n", get_next_posts_link( '&raquo;' ) );

	echo '</ul></div>' . "\n";

}




