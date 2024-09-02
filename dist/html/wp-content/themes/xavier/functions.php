<?php
	
/***************************************************************  
Javascript files include
***************************************************************/
	function pego_javascripts() {
		wp_register_script('pego_chart_js', get_template_directory_uri() . '/js/jquery.easy-pie-chart.js','','',true);
		wp_register_script('pego_mediaplayer', get_template_directory_uri() . '/js/audioplayer.min.js','','',true);
		wp_register_script('pego_owl_carousel', get_template_directory_uri() . '/js/owl.carousel.js','','',true);
		wp_register_script('pego_isotopeJS', get_template_directory_uri() . '/js/jquery.isotope.min.js','','',true);
		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr.custom.js','','',true);
		wp_register_script('snap-svg', get_template_directory_uri() . '/js/snap.svg-min.js','','',true);
		wp_register_script('pego_typed', get_template_directory_uri() . '/js/typed.js','','',true);
		wp_enqueue_script('prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js','','',true);
		wp_enqueue_script('jquery-animsition-min', get_template_directory_uri() . '/js/jquery.animsition.min.js','','',true);
		wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/waypoints.min.js','','',true);
		wp_enqueue_script('superfish', get_template_directory_uri() . '/js/superfish.js','','',true);
		wp_enqueue_script('custom-javascript', get_template_directory_uri() . '/js/custom.js','','',true);
	}
	add_action('wp_enqueue_scripts', 'pego_javascripts');	
	
/***************************************************************  
Style files include
***************************************************************/
	function pego_theme_styles() { 
		global $pego_prefix;	
		wp_enqueue_style( 'font-awesome-style', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'animsition', get_template_directory_uri() . '/css/animsition.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'fontello-style', get_template_directory_uri() . '/css/fontello.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'owl-carousel-transitions', get_template_directory_uri() . '/css/owl.transitions.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'mediaplayer-style', get_template_directory_uri() . '/css/audioplayer.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'prettyPhoto-style', get_template_directory_uri() . '/css/prettyPhoto.css', array(), '1.0', 'all' );	
		wp_enqueue_style( 'jscomposer-style', get_template_directory_uri() . '/css/js_composer.css', array(), '1.0', 'all' );
		wp_enqueue_style( 'default-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );	
		wp_enqueue_style( 'media-style', get_template_directory_uri() . '/css/media.css', array(), '1.0', 'all' );
	}	
	add_action('wp_enqueue_scripts', 'pego_theme_styles');
	

/***************************************************************  
Style files include for backend
***************************************************************/
	function pego_admin_styles() { 
        wp_enqueue_style('admin-style', get_template_directory_uri() .'/css/admin-style.css',  false, '1.0', 'all');
	}	
	add_action( 'admin_enqueue_scripts', 'pego_admin_styles' );

/***************************************************************  
 Enqueue the Google fonts
***************************************************************/
	function pego_theme_fonts() {
  	  	$protocol = is_ssl() ? 'https' : 'http';
  	  	wp_enqueue_style( 'mytheme-opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700,800,800italic" );
  	  	wp_enqueue_style( 'mytheme-playfair', "$protocol://fonts.googleapis.com/css?family=Playfair+Display:400,700" );  	
	}
	add_action( 'wp_enqueue_scripts', 'pego_theme_fonts' );

/***************************************************************  
Javascript files include for backend
***************************************************************/	
	
 	function pego_admin_scripts() {
      	wp_enqueue_media(); 
      	wp_register_script('my-admin-js', get_template_directory_uri() .'/js/admin-javascript.js', array('jquery'));
       	wp_enqueue_script('my-admin-js');
	}
	add_action('admin_enqueue_scripts', 'pego_admin_scripts');	
/***************************************************************  
Menu declaration
***************************************************************/
	register_nav_menu( 'primary', esc_html__( 'Navigation Menu', 'xavier' ) );
	
/***************************************************************  
Widget areas
***************************************************************/
	function pego_new_widgets_init() {	
	
		register_sidebar(array(
			'name' => 'Blog sidebar',
			'id' => 'blog-sidebar',
			'description'   => 'These are widgets for the sidebar.',
			'before_widget' => '<div id="%1$s" class="widget animationClass %2$s">',
			'after_widget'  => '<div class="clear"></div></div><div class="clear"></div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3><div class="title-stripes-left"></div><div class="clear"></div>'
		));	
		
		//custom sidebars from admin
		$argsSidebars = array('post_type'=> 'sidebars', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
		$allSidebars = get_posts($argsSidebars);	
	
		if($allSidebars) {
			foreach($allSidebars as $singleSidebar)
			{ 	
				$sidebarTitle = $singleSidebar->post_title;	
				$sidebarName= $singleSidebar->post_name;				
				register_sidebar(array(
					'name' => $sidebarTitle,
					'id' => $sidebarName,
					'description'   => 'These are widgets for the sidebar.',
					'before_widget' => '<div id="%1$s" class="widget animationClass %2$s" style="margin-bottom:30px;">',
					'after_widget'  => '</div><div class="clear"></div>',
					'before_title'  => '<h3 class="sidebar-title">',
					'after_title'   => '</h3><div class="title-stripes-left"></div><div class="clear"></div>'
				));				
			}
		}	
	}
	add_action( 'widgets_init', 'pego_new_widgets_init' );	
	
	
/***************************************************************  
Added support for post formats
***************************************************************/	
add_theme_support( 'post-formats', array( 'image', 'video', 'gallery', 'audio', 'link', 'quote' ) );	
	
add_theme_support( 'automatic-feed-links' );	

/***************************************************************  
Added support for post thumbnails
***************************************************************/
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );

/***************************************************************  
Pagination
***************************************************************/
function pego_kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link(1))."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($paged - 1))."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".esc_url(get_pagenum_link($i))."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($paged + 1))."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".esc_url(get_pagenum_link($pages))."'>&raquo;</a>";
         echo "</div>\n";
     }
}

/***************************************************************  
Get all testimonials
***************************************************************/	
function pego_get_all_test() {	
	//custom sidebars from admin
	$argsTest= array('post_type'=> 'testimonials', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
	$allTest = get_posts($argsTest);	
	$allTestimonials = array();
	if($allTest) {
		foreach($allTest as $singleTest)
		{ 	
			$allTestimonials[$singleTest->ID] = $singleTest->post_title;						
		}
	return $allTestimonials;
	}
}

/***************************************************************  
Search shortcode
***************************************************************/
add_shortcode('wpbsearch', 'get_search_form');

/***************************************************************  
Custom admin logo
***************************************************************/
	function pego_custom_login_logo() {
		$pego_logo_admin = get_template_directory_uri()."/images/logo.png";
		if ( function_exists( 'ot_get_option' ) ) {
			if (ot_get_option('pego_admin_logo') != '') {
				$pego_logo_admin = ot_get_option('pego_admin_logo');
			}
		}		
		echo '<style type="text/css">
			h1 a { background-size: auto !important; width: auto !important; background-image:url('.esc_url($pego_logo_admin).') !important;  }
		</style>';
		
    }
    add_action('login_head', 'pego_custom_login_logo');	

/***************************************************************  
Get image by size
***************************************************************/	
function pego_getImageBySize ( $params = array( 'post_id' => NULL, 'attach_id' => NULL, 'thumb_size' => 'thumbnail' ) ) {
    //array( 'post_id' => $post_id, 'thumb_size' => $grid_thumb_size )
    if ( (!isset($params['attach_id']) || $params['attach_id'] == NULL) && (!isset($params['post_id']) || $params['post_id'] == NULL) ) return;
    $post_id = isset($params['post_id']) ? $params['post_id'] : 0;

    if ( $post_id ) $attach_id = get_post_thumbnail_id($post_id);
    else $attach_id = $params['attach_id'];

    $thumb_size = $params['thumb_size'];

    global $_wp_additional_image_sizes;
    $thumbnail = '';
	$p_img['url'] = '';

    if ( is_string($thumb_size) && ((!empty($_wp_additional_image_sizes[$thumb_size]) && is_array($_wp_additional_image_sizes[$thumb_size])) || in_array($thumb_size, array('thumbnail', 'thumb', 'medium', 'large', 'full') ) ) ) {
        //$thumbnail = get_the_post_thumbnail( $post_id, $thumb_size );
        $thumbnail = wp_get_attachment_image( $attach_id, $thumb_size );
        //TODO APPLY FILTER
    }

    if ( $thumbnail == '' &&  $attach_id ) {
        if ( is_string($thumb_size) ) {
            $thumb_size = str_replace(array( 'px', ' ', '*', '×' ), array( '', '', 'x', 'x' ), $thumb_size);
            $thumb_size = explode("x", $thumb_size);
        }
        
        // Resize image to custom size
        $p_img = wpb_resize($attach_id, null, $thumb_size[0], $thumb_size[1], true);
        $alt = trim(strip_tags( get_post_meta($attach_id, '_wp_attachment_image_alt', true) ));

        if ( empty($alt) ) {
            $attachment = get_post($attach_id);
            $alt = trim(strip_tags( $attachment->post_excerpt )); // If not, Use the Caption
        }
        if ( empty($alt) )
            $alt = trim(strip_tags( $attachment->post_title )); // Finally, use the title
        /*if ( wpb_debug() ) {
              var_dump($p_img);
          }*/
        if ( $p_img ) {
            $img_class = '';
            //if ( $grid_layout == 'thumbnail' ) $img_class = ' no_bottom_margin'; class="'.$img_class.'"
            $thumbnail = '<img src="'.$p_img['url'].'" width="'.$p_img['width'].'" height="'.$p_img['height'].'" alt="'.$alt.'" />';
            //TODO: APPLY FILTER
        }
    }
    $p_img_large = wp_get_attachment_image_src($attach_id, 'large' );
    return array( 'thumbnail' => $thumbnail, 'p_img_large' => $p_img_large, 'thumb_src' => $p_img['url'] );
}

if (!function_exists('wpb_resize')) {
function wpb_resize( $attach_id = null, $img_url = null, $width, $height, $crop = false ) {
        // this is an attachment, so we have the ID
        if ( $attach_id ) {
            $image_src = wp_get_attachment_image_src( $attach_id, 'full' );
            $actual_file_path = get_attached_file( $attach_id );
            // this is not an attachment, let's use the image url
        } else if ( $img_url ) {
            $file_path = parse_url( $img_url );
            $actual_file_path = $_SERVER['DOCUMENT_ROOT'] . $file_path['path'];
            $actual_file_path = ltrim( $file_path['path'], '/' );
            $actual_file_path = rtrim( ABSPATH, '/' ).$file_path['path'];
            $orig_size = getimagesize( $actual_file_path );
            $image_src[0] = $img_url;
            $image_src[1] = $orig_size[0];
            $image_src[2] = $orig_size[1];
        }
        $file_info = pathinfo( $actual_file_path );
        $extension = '.'. $file_info['extension'];

        // the image path without the extension
        $no_ext_path = $file_info['dirname'].'/'.$file_info['filename'];

        $cropped_img_path = $no_ext_path.'-'.$width.'x'.$height.$extension;

        // checking if the file size is larger than the target size
        // if it is smaller or the same size, stop right here and return
        if ( $image_src[1] > $width || $image_src[2] > $height ) {

            // the file is larger, check if the resized version already exists (for $crop = true but will also work for $crop = false if the sizes match)
            if ( file_exists( $cropped_img_path ) ) {
                $cropped_img_url = str_replace( basename( $image_src[0] ), basename( $cropped_img_path ), $image_src[0] );
                $vt_image = array (
                    'url' => $cropped_img_url,
                    'width' => $width,
                    'height' => $height
                );
                return $vt_image;
            }

            // $crop = false
            if ( $crop == false ) {
                // calculate the size proportionaly
                $proportional_size = wp_constrain_dimensions( $image_src[1], $image_src[2], $width, $height );
                $resized_img_path = $no_ext_path.'-'.$proportional_size[0].'x'.$proportional_size[1].$extension;

                // checking if the file already exists
                if ( file_exists( $resized_img_path ) ) {
                    $resized_img_url = str_replace( basename( $image_src[0] ), basename( $resized_img_path ), $image_src[0] );

                    $vt_image = array (
                        'url' => $resized_img_url,
                        'width' => $proportional_size[0],
                        'height' => $proportional_size[1]
                    );
                    return $vt_image;
                }
            }

            // no cache files - let's finally resize it
            $img_editor =  wp_get_image_editor($actual_file_path);

            if ( is_wp_error($img_editor) || is_wp_error( $img_editor->resize($width, $height, $crop)) ) {
                return array (
                    'url' => '',
                    'width' => '',
                    'height' => ''
                );
            }

            $new_img_path = $img_editor->generate_filename();

            if ( is_wp_error( $img_editor->save( $new_img_path ) ) ) {
                return array (
                    'url' => '',
                    'width' => '',
                    'height' => ''
                );
            }

            if ( wpb_debug() ) {
                var_dump(file_exists($actual_file_path));
                var_dump($actual_file_path);
            }

            if(!is_string($new_img_path)) {
                return array (
                    'url' => '',
                    'width' => '',
                    'height' => ''
                );
            }

            $new_img_size = getimagesize( $new_img_path );
            $new_img = str_replace( basename( $image_src[0] ), basename( $new_img_path ), $image_src[0] );

            // resized output
            $vt_image = array (
                'url' => $new_img,
                'width' => $new_img_size[0],
                'height' => $new_img_size[1]
            );
            return $vt_image;
        }

        // default output - without resizing
        $vt_image = array (
            'url' => $image_src[0],
            'width' => $image_src[1],
            'height' => $image_src[2]
        );
        return $vt_image;
    }
    
 }
 if (!function_exists('wpb_debug')) {   
     function wpb_debug() {
        if ( isset($_GET['wpb_debug']) && $_GET['wpb_debug'] == 'wpb_debug' ) return true;
        else return false;
    }
    
}


/***************************************************************  
Comment reply
***************************************************************/
function pego_js_comment_reply(){
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
		wp_enqueue_script( 'comment-reply' );
}
	add_action('wp_print_scripts', 'pego_js_comment_reply');


/***************************************************************  
Content width defined
***************************************************************/	
if ( ! isset( $content_width ) ) $content_width = 900;

	
/***************************************************************  
Get all categories
***************************************************************/	
function pego_get_all_categories() {	
	$allcategories = get_categories();
	$allCategoriesArray = array();
	$allCategoriesArray[] = 'All';
	if($allcategories) {
		foreach($allcategories as $singleCategory)
		{ 	
			$allCategoriesArray[$singleCategory->cat_ID] = $singleCategory->name;						
		}
	return $allCategoriesArray;
	}
}

/***************************************************************  
Get all gallery
***************************************************************/	
function pego_get_all_gallery() {	
	//custom sidebars from admin
	$argsgallery= array('post_type'=> 'gallery', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
	$allgallery = get_posts($argsgallery);	
	$allgallerys = array();
	if($allgallery) {
		foreach($allgallery as $singlegallery)
		{ 	
			$allgallerys[$singlegallery->ID] = $singlegallery->post_title;						
		}
	return $allgallerys;
	}
}

/***************************************************************  
Blog socials
***************************************************************/
function pego_get_blog_socials($title, $permalink) {
	$title = str_replace(" ","%20",$title);	
	$shareArray = array();
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_single_post_share') != '') {
			$shareArray = ot_get_option('pego_single_post_share');
		}
	}
	if ($shareArray) {
?>
<span class="post-detail-single share-post-wrapper">
<ul class="socials-wrap-post">
	<?php if (in_array("facebook", $shareArray)) {  ?>
		<li class="social-item">
			<a  onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $permalink;?>','Facebook','width=500,height=250,left='+(screen.availWidth/2-250)+',top='+(screen.availHeight/2-125)+''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo $permalink;?>"><i class="fa fa-facebook"></i>Facebook</a>
		</li>
        <?php } ?>
		<?php if (in_array("twitter", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://twitter.com/home?status=<?php echo esc_attr($title); ?>%20-%20<?php echo esc_url($permalink); ?>"><i class="fa fa-twitter"></i>Twitter</a>
		</li>
        <?php } ?>
		<?php if (in_array("linkedin", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($title);?>"><i class="fa fa-linkedin"></i>LinkedIn</a>
		</li>
        <?php } ?>	
		<?php if (in_array("googleplus", $shareArray)) {  ?>
		<li class="social-item">
			<a href="https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>"><i class="fa fa-google-plus"></i>Google Plus</a>
		</li>
        <?php } ?>
		<?php if (in_array("pinterest", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($permalink); ?>"><i class="fa fa-pinterest-square"></i>Pinterest</a>
		</li>
        <?php } ?>
		<?php if (in_array("tumblr", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://www.tumblr.com/share/link?url=<?php echo esc_url($permalink); ?>&amp;name=<?php echo esc_attr($title); ?>"><i class="fa fa-tumblr"></i>Tumblr</a>
		</li>
        <?php } ?>
		<?php if (in_array("mail", $shareArray)) { 
			$mailShare = ''; 
			 if ( function_exists( 'ot_get_option' ) ) {
				if (ot_get_option('pego_single_post_share_mail') != '') {
					$mailShare = ot_get_option('pego_single_post_share_mail');
				}
			 }
			if ($mailShare != '') {
			?>
		<li class="social-item">
			<a href="mailto:<?php echo $mailShare;?>?subject=<?php echo esc_attr($title); ?>&amp;body=<?php  echo $permalink; ?>"><i class="fa fa-envelope-o"></i>Mail</a>
		</li>
		<?php 
			} 
		}
		?>

</ul>
<?php
	$sharecaption = "Share";
	if ( function_exists( 'get_option_tree' ) ) {
		if ( get_option_tree( 'pego_share_caption' ) ) {
			$sharecaption = get_option_tree( 'pego_share_caption' );
		}
	}
	?>
	<a href="#" class="share-post"><?php echo esc_html($sharecaption); ?></a>

</span>

	<?php
}
}


/***************************************************************  
Portfolio socials
***************************************************************/
function pego_get_portfolio_socials($title, $permalink) {
	$title = str_replace(" ","%20",$title);	
	$shareArray = array();
	if ( function_exists( 'ot_get_option' ) ) {
		if (ot_get_option('pego_single_portfolio_share') != '') {
			$shareArray = ot_get_option('pego_single_portfolio_share');
		}
	}
?>
<div class="share-portfolio-wrapper">
<ul class="socials-wrap">
	<?php if (in_array("facebook", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://www.facebook.com/share.php?u=<?php echo esc_url($permalink);?>"><i class="fa fa-facebook"></i></a>
		</li>
        <?php } ?>
		<?php if (in_array("twitter", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://twitter.com/home?status=<?php echo esc_attr($title); ?>%20-%20<?php echo esc_url($permalink); ?>"><i class="fa fa-twitter"></i></a>
		</li>
        <?php } ?>
		<?php if (in_array("linkedin", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>&amp;title=<?php echo esc_attr($title);?>"><i class="fa fa-linkedin"></i></a>
		</li>
        <?php } ?>	
		<?php if (in_array("googleplus", $shareArray)) {  ?>
		<li class="social-item">
			<a href="https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>"><i class="fa fa-google-plus"></i></a>
		</li>
        <?php } ?>
		<?php if (in_array("pinterest", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo esc_url($permalink); ?>"><i class="fa fa-pinterest-square"></i></a>
		</li>
        <?php } ?>
		<?php if (in_array("tumblr", $shareArray)) {  ?>
		<li class="social-item">
			<a href="http://www.tumblr.com/share/link?url=<?php echo esc_url($permalink); ?>&amp;name=<?php echo esc_attr($title); ?>"><i class="fa fa-tumblr"></i></a>
		</li>
        <?php } ?>
		<?php if (in_array("mail", $shareArray)) { 
			$mailShare = ''; 
			 if ( function_exists( 'ot_get_option' ) ) {
				if (ot_get_option('pego_single_portfolio_share_mail') != '') {
					$mailShare = ot_get_option('pego_single_portfolio_share_mail');
				}
			 }
			if ($mailShare != '') {
			?>
		<li class="social-item">
			<a href="mailto:<?php echo $mailShare;?>?subject=<?php echo esc_attr($title); ?>&amp;body=<?php  echo $permalink; ?>"><i class="fa fa-envelope-o"></i></a>
		</li>
		<?php 
			} 
		}
		?>

</ul>
</div>
<?php
}



/***************************************************************  
Getnext prev post
***************************************************************/	
function pego_get_prev_next_link() {	
	$next_post = get_next_post();
	if (!empty( $next_post )) {
		$next_link =  get_permalink( $next_post->ID );
		$image_next = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID), 'thumbnail' );
		if (get_post_format($next_post->ID ) == 'link') { $next_link =  get_post_meta($next_post->ID  , 'pego_post_link_url' , true); }
	?>
		<a href="<?php echo esc_url($next_link); ?>" class="next-post-wrapper">
			<span><i class="fa nextprev-icon fa-chevron-left"></i></span>
			<span class="next-post-details">
				<span class="next-post-details-inside">
				<?php
					if ($image_next[0] != '') {
						echo '<span class="nextprev-post-image"><img src="'.esc_url($image_next[0]).'" alt="'.esc_attr($next_post->post_title).'" /></span>';
					} else {
						$format = get_post_format( $next_post->ID );	
						$icon = 'fa-pencil';
						if ($format == 'gallery') { $icon = 'fa-image'; }
						if ($format == 'gallery') { $icon = 'fa-camera'; }
						if ($format == 'video') { $icon = 'fa-video-camera'; }
						if ($format == 'quote') { $icon = 'fa-quote-right'; }
						if ($format == 'audio') { $icon = 'fa-music'; }
						echo '<span class="nextprev-post-image"><div class="nextprev-post-type-icon"><i class="fa next-prev-icon '.$icon.'"></i></div></span>';
					}
					echo '<span class="nextprev-post-title">'.esc_html($next_post->post_title).'</span>'; 
					?>
				</span>
			</span>
		</a>
	<?php
	}
	$previous_post = get_previous_post();
	if (!empty( $previous_post )) {
		$prevoius_link =  get_permalink( $previous_post->ID );
		$image_prev = wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post->ID), 'thumbnail' );
		if (get_post_format($previous_post->ID ) == 'link') { $prevoius_link =  get_post_meta($previous_post->ID  , 'pego_post_link_url' , true); }
	?>
		<a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>" class="prev-post-wrapper">
			<span class="next-post-details left-details">
				<span class="next-post-details-inside">
				<?php
					echo '<span class="nextprev-post-title">'.esc_html($previous_post->post_title).'</span>';
					if ($image_prev[0] != '') {
						echo '<span class="nextprev-post-image"><img src="'.esc_url($image_prev[0]).'" alt="'.esc_attr($previous_post->post_title).'" /></span>';
					} else {
						$format = get_post_format( $previous_post->ID );	
						$icon = 'fa-pencil';
						if ($format == 'gallery') { $icon = 'fa-image'; }
						if ($format == 'gallery') { $icon = 'fa-camera'; }
						if ($format == 'video') { $icon = 'fa-video-camera'; }
						if ($format == 'quote') { $icon = 'fa-quote-right'; }
						if ($format == 'audio') { $icon = 'fa-music'; }
						echo '<span class="nextprev-post-image"><div class="nextprev-post-type-icon"><i class="fa next-prev-icon '.$icon.'"></i></div></span>';
					}
				?>
				</span>
			</span>
			<span><i class="fa nextprev-icon previcon fa-chevron-right"></i></span>
		</a>
	<?php
	}
	
	
	
}
						


/***************************************************************  
Get header logo
***************************************************************/	
function pego_get_header_logo() {	
				$pego_logo = get_template_directory_uri()."/images/logo.png";
				$pego_logo_retina = '';
				$logoCSS = '';
						if ( function_exists( 'ot_get_option' ) ) {
							if (ot_get_option('pego_logo') != '') {
								$pego_logo = ot_get_option('pego_logo');
							}
							if (ot_get_option('pego_logo_retina') != ''){
								$pego_logo_retina = ot_get_option('pego_logo_retina');
							}
						}
				
			$output  = '<div class="logo">';
				$output .= '<a href="'.home_url().'" title="">';
				    $output .= '<img  id="logoImage"  src="'.esc_url($pego_logo).'" alt="" title="" />';
				    if ($pego_logo_retina != '') { 
						$output .= '<img  id="logoImageRetina"  src="'.esc_url($pego_logo_retina).'" alt="" title="" />';
					}
				$output .= '</a>';
				if ( function_exists( 'ot_get_option' ) ) {
					if (ot_get_option('pego_next_to_logo_text') != '') {
						$output .= '<div class="logo-text">'.esc_html(ot_get_option('pego_next_to_logo_text')).'</div>';
					}
				}
			$output .= '</div>';
			
		echo $output;
	
}

/***************************************************************  
Add shortcode for serach form
***************************************************************/
add_shortcode('wpbsearch', 'get_search_form');	


/***************************************************************  
Get all sidebars
***************************************************************/	
function pego_get_all_sidebars() {	
	$argsSidebars= array('post_type'=> 'sidebars', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
	$allSidebars = get_posts($argsSidebars);
	$allSidebarsArray = array();
	$allSidebarsArray[0] = '';
	$allSidebarsArray[1] = 'Blog sidebar';
	if($allSidebars) {
		foreach($allSidebars as $singleSidebar)
		{ 	
			$allSidebarsArray[$singleSidebar->ID] = $singleSidebar->post_title;						
		}
	}
	return $allSidebarsArray;
	
}

/***************************************************************  
Get all sidebars
***************************************************************/	
function pego_get_all_sidebars1() {	
	$argsSidebars= array('post_type'=> 'sidebars', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
	$allSidebars = get_posts($argsSidebars);
	$allSidebarsArray = array();
	$allSidebarsArray[0] = 'Blog sidebar';
	if($allSidebars) {
		foreach($allSidebars as $singleSidebar)
		{ 	
			$allSidebarsArray[$singleSidebar->ID] = $singleSidebar->post_title;						
		}
	return $allSidebarsArray;
	}
}

/***************************************************************  
Get post excerpt from post id
***************************************************************/
function pego_get_the_excerpt($post_id) {
  global $post;  
  $save_post = $post;
  $post = get_post($post_id);
  $output = get_the_excerpt();
  $post = $save_post;
  return $output;
}

/***************************************************************  
Get all team members
***************************************************************/	
function pego_get_all_team_members() {	
	$argsTeamMember= array('post_type'=> 'team_member', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
	$allTeamMembers = get_posts($argsTeamMember);
	$allallTeamMemberArray = array();
	if($allTeamMembers) {
		foreach($allTeamMembers as $singleTeamMember)
		{ 	
			$allallTeamMemberArray[] = $singleTeamMember->ID;						
		}
	return $allallTeamMemberArray;
	}
}

/***************************************************************  
Get all services
***************************************************************/	
function pego_get_all_services() {	
	$argsTeamMember= array('post_type'=> 'services', 'posts_per_page' => -1, 'order'=> 'DESC', 'orderby' => 'post_date'  );
	$allTeamMembers = get_posts($argsTeamMember);
	$allallTeamMemberArray = array();
	if($allTeamMembers) {
		foreach($allTeamMembers as $singleTeamMember)
		{ 	
			$allallTeamMemberArray[] = $singleTeamMember->ID;						
		}
	return $allallTeamMemberArray;
	}
}

/***************************************************************  
Include php files
***************************************************************/	

	include("functions/custom-post.php");
	include("functions/custom-portfolio.php");
	include("functions/custom-page.php");
	include("functions/custom-services.php");
	include("functions/custom-sidebar.php");
	include("functions/custom-testimonials.php");
	include("functions/custom-team-member.php");
	include("functions/custom-gallery.php");
	include("functions/pego-vc-edit.php");
	include("functions/soundcloud.php");
	include("functions/widget-latest-posts.php");
	include("functions/widget-flickr.php");
	include("functions/widget-top-commented-posts.php");
	include("functions/widget-top-rated-posts.php");
	include("functions/widget-testimonials.php");

/***************************************************************  
Automatic plugin include
***************************************************************/
	
	
	
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once (get_template_directory() . '/functions/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

        array(
            'name'               => 'Option Tree', // The plugin name.
            'slug'               => 'option-tree', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => 'https://plugins.trac.wordpress.org/browser/option-tree/', // If set, overrides default API URL and points to an external URL.
        ),

        array(
            'name'               => 'WPBakery Visual Composer', // The plugin name.
            'slug'               => 'js_composer', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/lib/plugins/js_composer.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        
        array(
            'name'               => 'ZillaLikes', // The plugin name.
            'slug'               => 'zilla-likes', // The plugin slug (typically the folder name).
            'source'             => get_stylesheet_directory() . '/lib/plugins/zilla-likes.zip', // The plugin source.
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url'       => '', // If set, overrides default API URL and points to an external URL.
        ),
        
        array(
            'name'               => 'ContactForm7', // The plugin name.
            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
            'external_url'       => 'https://plugins.trac.wordpress.org/browser/contact-form-7/', 
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        )

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'theme-slug' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'theme-slug' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'theme-slug' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'theme-slug' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'theme-slug' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'theme-slug' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'theme-slug' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'theme-slug' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'theme-slug' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'theme-slug' ),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'theme-slug' ), // %s = dashboard link.
			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);

	tgmpa( $plugins, $config );

}

	
	
/* back to top shortcode */
function back_to_top_sh( $atts ) {
    extract( shortcode_atts( array(
        'title' => 'Back to top'
    ), $atts) );
  
  	return '<a href="#" class="scrollup">'.esc_html($title).'<i class="fa fa-angle-up"></i></a>';
  
  
}
add_shortcode( 'back-to-top', 'back_to_top_sh' );

	
	
	
/* wp_title fitler */
function pego_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'xavier' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'pego_wp_title', 10, 2 );
	
/* zadnja vrstica */
