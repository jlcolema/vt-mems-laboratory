<?php
$pego_active_plugins = get_option('active_plugins');
if (in_array("js_composer/js_composer.php", $pego_active_plugins)) {
 	if (function_exists('vc_map')) {
		// get all testimonials 
		$allTest= pego_get_all_test();
		$number_of_test = count($allTest);
		$list_allTest = '';
		$current=0;
		if ($allTest) {
			foreach($allTest as $key => $value) {
				$current++;
				if ($current == $number_of_test) {
					$list_allTest .= " and ".$value;	
				}
				else
				{
					$list_allTest .= $value.", ";
				}	
			}	
		}

		// get all galleries 
		$allgallery= pego_get_all_gallery();
		$number_of_gallery = count($allgallery);
		$list_allgallery = '';
		$current=0;
		if ($allgallery) {
			foreach($allgallery as $key => $value) {
				$current++;
				if ($current == $number_of_gallery) {
					$list_allgallery .= " and ".$value;	
				}
				else
				{
					$list_allgallery .= $value.", ";
				}	
			}	
		}



		/* new elements for builder */

	

		 /* Titles
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Titles", "xavier"),
		  "base" => "vc_text_titles",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title", "xavier"),
			  "param_name" => "title",
			  "holder" => "div",
			  "value" => esc_html__("Title", "xavier"),
			  "description" => esc_html__("Title content.", "xavier")
			),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Title type", "xavier"),
			  "param_name" => "title_type",
			  "value" => array(esc_html__('h1', "xavier") => "h1", esc_html__('h2', "xavier") => "h2", esc_html__('h3', "xavier") => "h3", esc_html__('h4', "xavier") => "h4", esc_html__('h5', "xavier") => "h5") ,
			  "description" => esc_html__("Select title type.", "xavier")
			),
		   array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Title alignment", "xavier"),
			  "param_name" => "title_align",
			  "value" => array(esc_html__('Left', "xavier") => "left", esc_html__('Center', "xavier") => "center", esc_html__('Right', "xavier") => "right") ,
			  "description" => esc_html__("Select title alignment. ", "xavier")
			)
		  ),
		  "js_view" => 'VcTextSeparatorView'
		) );

		/* Blockquote
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Blockquote", "xavier"),
		  "base" => "vc_blockquote",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Blockquote type", "xavier"),
			  "param_name" => "type",
			  "value" => array(esc_html__('Type#1', "xavier") => "type1", esc_html__('Type#2', "xavier") => "type2", esc_html__('Type#3', "xavier") => "type3",  esc_html__('Type#4', "xavier") => "type4"),
			  "description" => esc_html__("Select blockquote type.", "xavier")
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Border color", "xavier"),
			  "param_name" => "border_color",
			  "description" => esc_html__("Border color for blockquote.", "xavier"),
			  "dependency" => Array('element' => "type", 'value' => array('type1'))
			),
			  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Border size", "xavier"),
			  "param_name" => "border_size",
			  "description" => esc_html__("Border size. Insert number only.", "xavier"),
			   "dependency" => Array('element' => "type", 'value' => array('type1'))
			  ),
			array(
			  "type" => "attach_image",
			  "heading" => esc_html__("Icon", "xavier"),
			  "param_name" => "icon_image",
			  "value" => "",
			  "description" => esc_html__("Select icon image from media library.", "xavier"),
			   "dependency" => Array('element' => "type", 'value' => array('type2', 'type3', 'type4'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Background color", "xavier"),
			  "param_name" => "background_color",
			  "description" => esc_html__("Background color for blockquote.", "xavier"),
			  "dependency" => Array('element' => "type", 'value' => array('type2', 'type4'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Icon background color", "xavier"),
			  "param_name" => "icon_background_color",
			  "description" => esc_html__("Background color for icon.", "xavier"),
			  "dependency" => Array('element' => "type", 'value' => array('type3'))
			),
			array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Text", "xavier"),
			  "param_name" => "content",
			  "value" => __("<p>Sample content</p>", "xavier")
			)
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );



		 /* Circle chart
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Circle chart", "xavier"),
		  "base" => "vc_circle_chart",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(  
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Bar color", "xavier"),
			  "param_name" => "color",
			  "value" => "#4ebdeb",
			  "description" => esc_html__("Choose color for chart bar.", "xavier")
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Track color", "xavier"),
			  "param_name" => "track_color",
			   "value" => "#f1f1f1",
			  "description" => esc_html__("Choose color for chart track.", "xavier")
			),
		  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Chart width", "xavier"),
			  "param_name" => "chart_width",
			  "value" => "200",
			  "description" => esc_html__("Enter value for data line width. Enter number only.", "xavier")
			),
		  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Data line width", "xavier"),
			  "param_name" => "line_width",
			  "value" => "7",
			  "description" => esc_html__("Enter value for data line width. Enter number only.", "xavier")
			),
		  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Value", "xavier"),
			  "param_name" => "value",
			  "description" => esc_html__("Enter value for bar chart. Enter number only [1-100].", "xavier")
			),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Type", "xavier"),
			  "param_name" => "type",
			  "value" => array(esc_html__('Percent', "xavier") => "percent", esc_html__('Description', "xavier") => "description"),
			  "description" => esc_html__("Select type that will appear inside the chart.", "xavier")
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Description", "xavier"),
			  "param_name" => "description",
			  "description" => esc_html__("Enter description text for inside the chart.", "xavier"),
			 "dependency" => Array('element' => "type", 'value' => array('description'))
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Description font size", "xavier"),
			  "param_name" => "description_size",
			  "description" => esc_html__("Enter size for chart description. Enter number only.", "xavier"),
			 "dependency" => Array('element' => "type", 'value' => array('description'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Description color", "xavier"),
			  "param_name" => "description_color",
			  "description" => esc_html__("Choose color for chart description.", "xavier"),
			  "dependency" => Array('element' => "type", 'value' => array('description'))
			),
		   array(
			  "type" => "textfield",
			  "heading" => esc_html__("Percent font size", "xavier"),
			  "param_name" => "percent_size",
			  "description" => esc_html__("Enter size for chart percent. Enter number only.", "xavier"),
			 "dependency" => Array('element' => "type", 'value' => array('percent'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("Percent color", "xavier"),
			  "param_name" => "percent_color",
			  "description" => esc_html__("Choose color for chart percent.", "xavier"),
			  "dependency" => Array('element' => "type", 'value' => array('percent'))
			),
		   array(
			  "type" => "textarea_html",    
			  "heading" => esc_html__("Content under chart", "xavier"),
			  "param_name" => "content",
			  "value" => __("<p></p>", "xavier")
			)
		  )
		) );



		/* Dropcaps
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Dropcap", "xavier"),
		  "base" => "vc_dropcap",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Dropcap type", "xavier"),
			  "param_name" => "type",
			  "value" => array(esc_html__('Type#1', "xavier") => "type1", esc_html__('Type#2', "xavier") => "type2"),
			  "description" => esc_html__("Select dropcap type.", "xavier")
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("First letter", "xavier"),
			  "param_name" => "first_letter",
			  "value" => esc_html__("A", "xavier"),
			  "description" => esc_html__("First letter.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("First letter size", "xavier"),
			  "param_name" => "first_letter_size",
			  "description" => esc_html__("First letter font size. Insert number only.", "xavier")
			  ),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("First letter color", "xavier"),
			  "param_name" => "first_letter_color",
			  "description" => esc_html__("Choose color for first letter.", "xavier"),
			  "dependency" => Array('element' => "bgcolor", 'value' => array('custom'))
			),
			array(
			  "type" => "colorpicker",
			  "heading" => esc_html__("First letter background", "xavier"),
			  "param_name" => "first_letter_bg",
			  "description" => esc_html__("Choose background color for first letter.", "xavier"),
			  "dependency" => Array('element' => "type", 'value' => array('type2'))
			),
		  array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Text", "xavier"),
			  "param_name" => "content",
			  "value" => __("<p>Sample content</p>", "xavier")
			)
		  )
		) );


		 /* Testimonials
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Testimonials", "xavier"),
		  "base" => "vc_testimonials",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		   "params" => array(
  			  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title", "xavier"),
			  "param_name" => "text_title",
			  "description" => esc_html__("Insert title.", "xavier")
			  ),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Title alignment", "xavier"),
			  "param_name" => "title_align",
			  "value" => array(esc_html__('Left', "xavier") => "left", esc_html__('Center', "xavier") => "center", esc_html__('Right', "xavier") => "right") ,
			  "description" => esc_html__("Select title alignment. ", "xavier")
			),
			  array(
			  "type" => "exploded_textarea",
			  "heading" => esc_html__("Testimonials", "xavier"),
			  "param_name" => "grid_categories",
			  "description" => __("If you want to narrow output, enter testimonials names here. Note: Only listed testimonials will be included. Divide testimonials with linebreaks (Enter). You may choose between: <strong>".$list_allTest."</strong>", "xavier")
			)
		   )
		) );


		 /* Galleries
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Galleries", "xavier"),
		  "base" => "vc_galleries",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		   "params" => array(
			  array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Gallery", "xavier"),
			  "param_name" => "type",
			  "value" => $allgallery,
			  "description" => esc_html__("Select gallery.", "xavier")
			  )
		   )
		) );



		/* Portfolio diamonds
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Portfolio diamonds", "xavier"),
		  "base" => "vc_portfolio_grid",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
		  	array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Type", "xavier"),
			  "param_name" => "type",
			  "value" => array(esc_html__('Diamond', "xavier") => "diamond", esc_html__('Square', "xavier") => "square", esc_html__('Square Grid', "xavier") => "squaregrid"),
			  "description" => esc_html__("Select type.", "xavier")
			),
			  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Welcome title", "xavier"),
			  "param_name" => "welcome_title",
			  "description" => esc_html__("Insert text.", "xavier")
			  ),
			array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Welcome content", "xavier"),
			  "param_name" => "content",
			  "value" => __("Sample content", "xavier")
			),
			array(
      			"type" => "exploded_textarea",
      			"heading" => __("Categories", "addis"),
      			"param_name" => "grid_categories",
     			 "description" => __("If you want to narrow output, enter category names here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter).", "addis")
  			  )
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		/* Portfolio grid
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Portfolio grid", "xavier"),
		  "base" => "vc_portfolio_grid1",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
		  	array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Type", "xavier"),
			  "param_name" => "type",
			  "value" => array(esc_html__('Diamond', "xavier") => "diamond", esc_html__('Square', "xavier") => "square"),
			  "description" => esc_html__("Select type.", "xavier")
			),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Columns", "xavier"),
			  "param_name" => "columns",
			  "value" => array(esc_html__('2', "xavier") => "2", esc_html__('3', "xavier") => "3", esc_html__('4', "xavier") => "4"),
			  "description" => esc_html__("Set columns.", "xavier")
			),
			array(
      			"type" => "exploded_textarea",
      			"heading" => __("Categories", "addis"),
      			"param_name" => "grid_categories",
     			 "description" => __("If you want to narrow output, enter category names here. Note: Only listed categories will be included. Divide categories with linebreaks (Enter).", "addis")
  			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Thumbnail size", "xavier"),
			  "param_name" => "thumb_size",
			  "description" => esc_html__("Insert thumb size. Example input can be 700x450. If left empty, full image size will be taken. Option is used for square types only.", "xavier")
			  )
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		
		/* Welcome
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Welcome", "xavier"),
		  "base" => "vc_welcome",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Welcome title", "xavier"),
			  "param_name" => "welcome_title",
			  "description" => esc_html__("Insert text.", "xavier")
			  ),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Welcome title alignment", "xavier"),
			  "param_name" => "title_align",
			  "value" => array(esc_html__('Left', "xavier") => "left", esc_html__('Center', "xavier") => "center", esc_html__('Right', "xavier") => "right") ,
			  "description" => esc_html__("Select title alignment. ", "xavier")
			),
			array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Welcome content", "xavier"),
			  "param_name" => "content",
			  "value" => __("Sample content", "xavier")
			)
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		
	/* Team
	---------------------------------------------------------- */
	vc_map( array(
 		 "name" => esc_html__("Team", "xavier"),
  		"base" => "vc_team",
  		"icon" => "icon-vc-pego",
  		"category" => esc_html__('Content', 'xavier'),
  		 "params" => array(
			  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title", "xavier"),
			  "param_name" => "text_title",
			  "description" => esc_html__("Insert text.", "xavier")
			  ),
			  	array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Title alignment", "xavier"),
			  "param_name" => "title_align",
			  "value" => array(esc_html__('Left', "xavier") => "left", esc_html__('Center', "xavier") => "center", esc_html__('Right', "xavier") => "right") ,
			  "description" => esc_html__("Select title alignment. ", "xavier")
			)
			)
	) );
	
	
	/* Services
	---------------------------------------------------------- */
	vc_map( array(
 		 "name" => esc_html__("Services", "xavier"),
  		"base" => "vc_services",
  		"icon" => "icon-vc-pego",
  		"category" => esc_html__('Content', 'xavier'),
  		 "params" => array(
  		  array(
			  "type" => "attach_image",
			  "heading" => esc_html__("Image", "xavier"),
			  "param_name" => "image",
			  "value" => "",
			  "description" => esc_html__("Set image for services.", "xavier")
			),
			  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title", "xavier"),
			  "param_name" => "text_title",
			  "description" => esc_html__("Insert text.", "xavier")
			  ),
			array(
			  "type" => "dropdown",
			  "heading" => esc_html__("Title alignment", "xavier"),
			  "param_name" => "title_align",
			  "value" => array(esc_html__('Left', "xavier") => "left", esc_html__('Center', "xavier") => "center", esc_html__('Right', "xavier") => "right") ,
			  "description" => esc_html__("Select title alignment. ", "xavier")
			),
			array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Content", "xavier"),
			  "param_name" => "content",
			  "value" => __("Sample content", "xavier")
			)
			)
	) );
	
	/* Typed
	---------------------------------------------------------- */
	vc_map( array(
 		 "name" => esc_html__("Typed", "xavier"),
  		"base" => "vc_typed",
  		"icon" => "icon-vc-pego",
  		"category" => esc_html__('Content', 'xavier'),
  		 "params" => array(
			  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #1", "xavier"),
			  "param_name" => "content1",
			  "description" => esc_html__("Insert content #1.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #2", "xavier"),
			  "param_name" => "content2",
			  "description" => esc_html__("Insert content #2.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #3", "xavier"),
			  "param_name" => "content3",
			  "description" => esc_html__("Insert content #3.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #4", "xavier"),
			  "param_name" => "content4",
			  "description" => esc_html__("Insert content #4.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #5", "xavier"),
			  "param_name" => "content5",
			  "description" => esc_html__("Insert content #5.", "xavier")
			  )
			)
	) );
	
	
	
		/* Portfolio welcome
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Portfolio welcome", "xavier"),
		  "base" => "vc_portfolio_welcome",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
			array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Welcome content", "xavier"),
			  "param_name" => "content",
			  "value" => __("<p>Sample content</p>", "xavier")
			)
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		
		/* Portfolio overview
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Portfolio overview", "xavier"),
		  "base" => "vc_portfolio_overview",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title", "xavier"),
			  "param_name" => "text_title",
			  "description" => esc_html__("Insert text.", "xavier")
			  ),
			array(
			  "type" => "textarea_html",
			  "heading" => esc_html__("Welcome content", "xavier"),
			  "param_name" => "content",
			  "value" => __("<p>Sample content</p>", "xavier")
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Button caption", "xavier"),
			  "param_name" => "button_caption",
			  "description" => esc_html__("Insert button caption.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Button url", "xavier"),
			  "param_name" => "button_url",
			  "description" => esc_html__("Insert button url.", "xavier")
			  )
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		
		/* Portfolio details
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Portfolio details", "xavier"),
		  "base" => "vc_portfolio_details",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title #1", "xavier"),
			  "param_name" => "title1",
			  "description" => esc_html__("Insert title #1.", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #1", "xavier"),
			  "param_name" => "content1",
			  "description" => esc_html__("Insert content #1.", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title #2", "xavier"),
			  "param_name" => "title2",
			  "description" => esc_html__("Insert title #2.", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #2", "xavier"),
			  "param_name" => "content2",
			  "description" => esc_html__("Insert content #2.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title #3", "xavier"),
			  "param_name" => "title3",
			  "description" => esc_html__("Insert title #3.", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #3", "xavier"),
			  "param_name" => "content3",
			  "description" => esc_html__("Insert content #3.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title #4", "xavier"),
			  "param_name" => "title4",
			  "description" => esc_html__("Insert title #4.", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #4", "xavier"),
			  "param_name" => "content4",
			  "description" => esc_html__("Insert content #4.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Title #5", "xavier"),
			  "param_name" => "title5",
			  "description" => esc_html__("Insert title #5.", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #5", "xavier"),
			  "param_name" => "content5",
			  "description" => esc_html__("Insert content #5.", "xavier")
			  ),
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		
		/* Contact details
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Contact info", "xavier"),
		  "base" => "vc_contact_info",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Icon #1", "xavier"),
			  "param_name" => "icon1",
			  "description" => esc_html__("Insert icon #1 code (Awesome icons).", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #1", "xavier"),
			  "param_name" => "content1",
			  "description" => esc_html__("Insert content #1.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Icon #2", "xavier"),
			  "param_name" => "icon2",
			  "description" => esc_html__("Insert icon #2 code (Awesome icons).", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #2", "xavier"),
			  "param_name" => "content2",
			  "description" => esc_html__("Insert content #2.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Icon #3", "xavier"),
			  "param_name" => "icon3",
			  "description" => esc_html__("Insert icon #3 code (Awesome icons).", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #3", "xavier"),
			  "param_name" => "content3",
			  "description" => esc_html__("Insert content #3.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Icon #4", "xavier"),
			  "param_name" => "icon4",
			  "description" => esc_html__("Insert icon #4 code (Awesome icons).", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #4", "xavier"),
			  "param_name" => "content4",
			  "description" => esc_html__("Insert content #4.", "xavier")
			  )
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		
		/* Contact details
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Google Maps Grayscale", "xavier"),
		  "base" => "vc_pego_maps",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
		  array(
			  "type" => "textfield",
			  "heading" => esc_html__("Google API key", "xavier"),
			  "param_name" => "gapikey",
			  "description" => esc_html__("Insert Google API key.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Latitude", "xavier"),
			  "param_name" => "latitude",
			  "description" => esc_html__("Insert latitude value (decimal).", "xavier")
			  ),
		  	array(
			  "type" => "textfield",
			  "heading" => esc_html__("Longitude", "xavier"),
			  "param_name" => "longitude",
			  "description" => esc_html__("Insert longitude value (decimal)", "xavier")
			  ),
			array(
			  "type" => "attach_image",
			  "heading" => esc_html__("Pin image", "xavier"),
			  "param_name" => "image",
			  "value" => "",
			  "description" => esc_html__("Set pin image.", "xavier")
			),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Height", "xavier"),
			  "param_name" => "height",
			  "description" => esc_html__("Insert height, value only. If nothing set, 250 will be given.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Zoom", "xavier"),
			  "param_name" => "zoom",
			  "description" => esc_html__("Insert zoom number. If nothing set, 11 will be given.", "xavier")
			  )
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		
		/* Error page construct
		---------------------------------------------------------- */
		vc_map( array(
		  "name" => esc_html__("Error page shortcode", "xavier"),
		  "base" => "vc_error_page_contruct",
		  "icon" => "icon-vc-pego",
		  "category" => esc_html__('Content', 'xavier'),
		  "params" => array(
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #1", "xavier"),
			  "param_name" => "content1",
			  "description" => esc_html__("Insert content #1.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #2", "xavier"),
			  "param_name" => "content2",
			  "description" => esc_html__("Insert content #2.", "xavier")
			  ),
			array(
			  "type" => "textfield",
			  "heading" => esc_html__("Content #3", "xavier"),
			  "param_name" => "content3",
			  "description" => esc_html__("Insert content #3.", "xavier")
			  )
		  )
		 // ,  "js_view" => 'VcColLeftIconView'
		) );
		
		
		
		function pego_maps_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'latitude' => '',
			'longitude' => '',
			'gapikey' => '',
			'image' => '',
			'height' => "250",
			'zoom' => "11"
		), $atts));
		
			$img_id = preg_replace('/[^\d]/', '', $image);
			$link_to = wp_get_attachment_image_src( $img_id, 'full');
			$output = '<style>  .mapStyleClass { height: '.$height.'px; }  </style>';
			$output .= '
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?key='.esc_attr($gapikey).'"></script>
		
			<script type="text/javascript">
				(function() {
					window.onload = function(){
				
					var pinkParksStyles = "";
				
					if (jQuery.browser.msie  && parseInt(jQuery.browser.version, 10) === 8) {
				
					} else {
						var pinkParksStyles = [ { stylers: [ { invert_lightness: false }, { hue: "#fff" }, { saturation: -92 }, { lightness: 5 } ] },{ featureType: "poi", elementType: "labels", stylers: [ { visibility: "off" } ] },{ featureType: "road", elementType: "labels", stylers: [ { visibility: "on" }, { lightness: 20 } ] },{ featureType: "landscape", stylers: [ { visibility: "off" } ] },{ featureType: "transit.station", elementType: "labels", stylers: [ { lightness: 100 } ] },{ featureType: "road.arterial", stylers: [ { visibility: "on" } ] },{ } ];
					}

					
					var pinkMapType = new google.maps.StyledMapType(pinkParksStyles,
						{name: "Our Location"});
					var mapOptions = {
						zoom: '.$zoom.',
						center: new google.maps.LatLng('.$latitude.' , '.$longitude.'),
						mapTypeControlOptions: {
						mapTypeIds: [google.maps.MapTypeId.ROADMAP, "pink_parks"]
						}
					};
					var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
					  map.mapTypes.set("pink_parks", pinkMapType);
					  map.setMapTypeId("pink_parks");
  
					var image = "'.esc_url($link_to[0]).'";

					var marker = new google.maps.Marker({
						position: new google.maps.LatLng('.$latitude.' , '.$longitude.'),
						map: map,
						icon: image
					}); 
					}
				})();
			</script>';
			$output .= '<div id="map_canvas" class="mapStyleClass"></div>';
			return $output;
		}
		add_shortcode( 'vc_pego_maps', 'pego_maps_sh' );
		
		
		function contact_info_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'icon1' => '',
			'content1' => '',
			'icon2' => '',
			'content2' => '',
			'icon3' => '',
			'content3' => '',
			'icon4' => '',
			'content4' => ''
		), $atts));
		$columns = 0;
		$columns_class='vc_col-sm-12';
		if (($icon1 != '')&&($content1 != '')) { $columns++; }
		if (($icon2 != '')&&($content2 != '')) { $columns++; }
		if (($icon3 != '')&&($content3 != '')) { $columns++; }
		if (($icon4 != '')&&($content4 != '')) { $columns++; }
		if ($columns == 2) { $columns_class='vc_col-sm-6'; }
		if ($columns == 3) { $columns_class='vc_col-sm-4'; }
		if ($columns == 4) { $columns_class='vc_col-sm-3'; }
		
		
		$output = '<div class="vc_contact_info">';
		if (($icon1 != '')&&($content1 != '')) {
			$output .= '<div class="vc_col-sm-4">';
			$output .= '<div class="contact-info-single">';
				$output .= '<i class="fa contact-info-icon '.esc_attr($icon1).'"></i>';
				$output .= '<div class="contact-info-content">';	
					$output .= $content1;
				$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}
		if (($icon2 != '')&&($content2 != '')) {
			$output .= '<div class="vc_col-sm-4">';
			$output .= '<div class="contact-info-single">';
				$output .= '<i class="fa contact-info-icon '.esc_attr($icon2).'"></i>';
				$output .= '<div class="contact-info-content">';	
					$output .= $content2;
				$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}	
		
		if (($icon3 != '')&&($content3 != '')) {
			$output .= '<div class="vc_col-sm-4">';
			$output .= '<div class="contact-info-single">';
				$output .= '<i class="fa contact-info-icon '.esc_attr($icon3).'"></i>';
				$output .= '<div class="contact-info-content">';	
					$output .= $content3;
				$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}
		if (($icon4 != '')&&($content4 != '')) {
			$output .= '<div class="vc_col-sm-4">';
			$output .= '<div class="contact-info-single">';
				$output .= '<i class="fa contact-info-icon '.esc_attr($icon4).'"></i>';
				$output .= '<div class="contact-info-content">';	
					$output .= $content4;
				$output .= '</div>';
			$output .= '</div>';
			$output .= '</div>';
		}
		
		
				
		$output .= '</div>';		
		

		return $output;
		}

		add_shortcode( 'vc_contact_info', 'contact_info_sh' );
		
		
	 function portfolio_details_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'title1' => '',
			'content1' => '',
			'title2' => '',
			'content2' => '',
			'title3' => '',
			'content3' => '',
			'title4' => '',
			'content4' => '',
			'title5' => '',
			'content5' => ''
		), $atts));
		
		$output = '<div class="vc_portfolio_details">';	
			if (($title1 != '') && ($content1 != '')) {
				$output .= '<div class="single-portfolio-detail">';
					$output .= '<h3>'.esc_html($title1).'</h3>';
					$output .= '<div class="single-portfolio-detail-value">'.$content1.'</div>';
				$output .= '</div>';
			}
			if (($title2 != '') && ($content2 != '')) {
				$output .= '<div class="single-portfolio-detail">';
					$output .= '<h3>'.esc_html($title2).'</h3>';
					$output .= '<div class="single-portfolio-detail-value">'.$content2.'</div>';
				$output .= '</div>';
			}	
			if (($title3 != '') && ($content3 != '')) {
				$output .= '<div class="single-portfolio-detail">';
					$output .= '<h3>'.esc_html($title3).'</h3>';
					$output .= '<div class="single-portfolio-detail-value">'.$content3.'</div>';
				$output .= '</div>';
			}
			if (($title4 != '') && ($content4 != '')) {
				$output .= '<div class="single-portfolio-detail">';
					$output .= '<h3>'.esc_html($title4).'</h3>';
					$output .= '<div class="single-portfolio-detail-value">'.$content4.'</div>';
				$output .= '</div>';
			}
			if (($title5 != '') && ($content5 != '')) {
				$output .= '<div class="single-portfolio-detail">';
					$output .= '<h3>'.esc_html($title5).'</h3>';
					$output .= '<div class="single-portfolio-detail-value">'.$content5.'</div>';
				$output .= '</div>';
			}
		$output .= '</div>';	
		
		return $output;
		}

		add_shortcode( 'vc_portfolio_details', 'portfolio_details_sh' );
			
	function portfolio_overview_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'text_title' => '',
			'button_caption' => '',
			'button_url' => ''
		), $atts));
		
		$output = '<div class="vc_portfolio_overview">';	
			$output .= '<h2>'.esc_html($text_title).'</h2>';
			$output .= '<div class="clear"></div>';
			$output .= '<p>'.wpb_js_remove_wpautop($content).'</p>';
			$output .= '<div class="clear"></div>';
			if (($button_caption != '') && ($button_url != '')) {
				$output .= '<a class="portfolio_overview_url" href="'.esc_url($button_url).'" target="_blank">'.esc_html($button_caption).'</a>';
			}
		$output .= '</div>';	
		
		return $output;
		}

		add_shortcode( 'vc_portfolio_overview', 'portfolio_overview_sh' );
		
		
		function error_page_contruct_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'content1' => '',
			'content2' => '',
			'content3' => ''
		), $atts));
		
		$output = '<div class="vc_error_page_contruct">';	
			$output .= '<div class="error-content1">'.$content1.'</div>';
			$output .= '<div class="error-content2">'.$content2.'</div>';
			$output .= '<div class="error-content3">'.$content3.'</div>';
		$output .= '</div>';	
		
		return $output;
	}

	add_shortcode( 'vc_error_page_contruct', 'error_page_contruct_sh' );
		
		
	function portfolio_welcome_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'grid_categories' => ''
		), $atts));
		
		$output = '<div class="vc_portfolio_welcome">';	
			$output .= $content;
		$output .= '</div>';	
		
		return $output;
		}

		add_shortcode( 'vc_portfolio_welcome', 'portfolio_welcome_sh' );
	
	
	
	function portfolio_grid1_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'grid_categories' => '',
			'welcome_title' => '',
			'type' => 'diamond',
			'columns' => '2',
			'thumb_size' => 'full'
		), $atts));
		
		$single_cats = explode(",", $grid_categories);
		$tax_array = array();
		$tax_array = array('relation' => 'OR');
 
 
 	
 		$terms = get_terms("portfolio_categories");
 		foreach ( $terms as $term ) {
 		if ($grid_categories != '') {
			foreach ( $single_cats as $single_cat ) {
				if ($single_cat == $term->name) {
					$terms_ids[] = $term->term_id; 
					$tax_array[] =   array(
						'taxonomy' => 'portfolio_categories',
						'terms' => $term->slug,
						'field' => 'slug'
					);
				}
			}
		}
		}
		$terms = array();


	$columns_class= "6";
	if ($columns == 3) { $columns_class= "4"; }
	if ($columns == 4) { $columns_class= "3"; }
	$portfolio_thumb_size = '640x640';
	$portfolio_thumb_size_small = '320x320';
	$counter= 0;
	$number_of_items = -1;
	$terms = array();
  
	if ($grid_categories != '') {
	
		$args = array('post_type'=> 'portfolio', 'posts_per_page' => $number_of_items, 'order'=> 'ASC', 'orderby' => 'menu_order ID', 'tax_query' => $tax_array );
	}
    else {
    
         $args = array('post_type'=> 'portfolio', 'posts_per_page' => $number_of_items, 'order'=> 'ASC', 'orderby' => 'menu_order ID');	
    }

    
    $posts = get_posts($args);
    
 
    wp_enqueue_script('pego_isotopeJS');
   	 if($posts) {
   	 		$output = '<div class="wpb_content_element vc_portfolio_grid">';							
			$output .= '<div class="vc_row wpb_row vc_inner vc_row-fluid pego-isotope-wrapper-fitrows portfolio-grid-wrapper">';
			$itemCount = 0;
			$idd = 0;
			$catArray = array();
			
			foreach($posts as $post)
			{
				$image_bg = get_post_meta($post->ID , 'pego_portfolio_background_slider_image' , true);
				$portfolio_type = get_post_meta($post->ID , 'pego_portfolio_type_selected' , true);
				$icon = 'fa-image';
				if ($portfolio_type == 'Slideshow') { $icon = 'fa-camera'; }
				if ($portfolio_type == 'Video') { $icon = 'fa-video-camera'; }
				
				if ($type == 'square') {
					
					$image_bg = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
					$post_thumbnail = pego_getImageBySize(array( 'post_id' => $post->ID, 'thumb_size' => $thumb_size ));
					$thumbnail = $post_thumbnail['thumbnail'];
					$output .= '<div class="vc_col-sm-'.esc_attr($columns_class).' wpb_column single-portfolio-grid square-type isotope-item">';
						$output .= '<div class="portfolio-grid-inside-wrap">';
							$output .= '<a href="'.esc_url(get_permalink($post->ID)).'" class="portfolio-grid-inside">';
								$output .= '<div class="portfolio-grid-overlay-hover"></div>';
								$output .= '<div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div>';
								$output .= $thumbnail;
								
								$output .= '<span class="arrow"></span>';
								$output .= '<div class="clear"></div>';
							$output .= '</a>';
							$output .= '<h1 class="portoflio-grid-title"><a href="'.esc_url(get_permalink($post->ID)).'">'.esc_html(get_the_title($post->ID)).'</a></h1>';
						
						$output .= '</div>';
					$output .= '</div>';
				} else {
					$output .= '<div class="vc_col-sm-'.esc_attr($columns_class).'  wpb_column single-portfolio-grid isotope-item">';
						$output .= '<div class="portfolio-grid-inside-wrap">';
							$output .= '<a href="'.esc_url(get_permalink($post->ID)).'" class="portfolio-grid-inside">';
								$output .= '<div class="portfolio-grid-overlay"></div>';
								$output .= '<div class="portfolio-grid-overlay-hover"></div>';
								$output .= '<div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div>';
								$output .= '<img class="portfolio-grid-image" src="'.esc_url($image_bg).'"  />';
								$output .= '<div class="clear"></div>';
							$output .= '</a>';
							$output .= '<h1 class="portoflio-grid-title"><a href="'.esc_url(get_permalink($post->ID)).'">'.esc_html(get_the_title($post->ID)).'</a></h1>';
						
						$output .= '</div>';
					$output .= '</div>';
				}
			}
			$output .= '</div>';
			$output .= '</div>';
		}
		
		return $output;
		}

		add_shortcode( 'vc_portfolio_grid1', 'portfolio_grid1_sh' );
	
	function pego_typed_sh( $atts,  $content = null ) {
	   extract( shortcode_atts( array(
		'content1' => '',
		'content2' => '',
		'content3' => '',
		'content4' => '',
		'content5' => ''
	   ), $atts ) );
	
		$id = rand(1, 10000);

		wp_enqueue_script('pego_typed');
		$content_typed = array();
		if ($content1 != '') { $content_typed[] = '"'.$content1.'"'; } 
		if ($content2 != '') { $content_typed[] = '"'.$content2.'"'; } 
		if ($content3 != '') { $content_typed[] = '"'.$content3.'"'; } 
		if ($content4 != '') { $content_typed[] = '"'.$content4.'"'; } 
		if ($content5 != '') { $content_typed[] = '"'.$content5.'"'; } 
		$content_typed_comma_separated = implode(" ,", $content_typed );
		$output = '
		
		   <script>
   	 	jQuery(function(){
        jQuery("#typed'.esc_attr($id).'").typed({
            strings: ['.$content_typed_comma_separated.'],
            typeSpeed: 80,
            backDelay: 500,
            loop: true,
            contentType: "html"
        });
        });
		</script>
		
		<div class="wpb_content_element vc_typed">';
			$output .= '<div class="type-wrap">';
         		 $output .= '<span class="type-content" id="typed'.esc_attr($id).'" style="white-space:pre;"></span>';
       		$output .= ' </div>';
		$output .= '</div>';
		
	
	return $output;
	}

	add_shortcode( 'vc_typed', 'pego_typed_sh' );
	
	
	function pego_services_sh( $atts,  $content = null ) {
	   extract( shortcode_atts( array(
		'image' => '',
		'text_title' => '',
		'title_align' => 'left'
	   ), $atts ) );
	
		$id = rand(1, 10000);

		$terms = array();
		wp_enqueue_script('pego_isotopeJS');
	
		$output = '<div class="wpb_content_element vc_services">';
			$output .= '<div class="services-top-content-wrapper">';
				if ($image != '') {
					$img_id = preg_replace('/[^\d]/', '', $image);
					$link_to = wp_get_attachment_image_src( $img_id, 'full');
					$output .= '<img class="services-main-image fl" src="'.esc_url($link_to[0]).'">';
				}	
				$output .= '<div class="services-top-content">';
					$output .= '<h2 class="titles title_align_'.esc_attr($title_align).'">'.esc_html($text_title).'</h2>';
					$output .= '<div class="services-desc">'.$content.'</div>';
				$output .= '</div>';
			$output .= '</div>';
			$output .= '<div class="clear"></div>';
			$allServices = pego_get_all_services();
			$counter = 0;
			if ($allServices) {
				$output .= '<div class="vc_row wpb_row vc_inner vc_row-fluid pego-isotope-wrapper services-wrapper">';
				foreach($allServices as $singleService) {
					$counter++;
					$currrentMember = get_post($singleService);
					$content = $currrentMember->post_content;
					$pego_services_url = get_post_meta($singleService, 'pego_services_url' , true);
					$pego_services_icon = get_post_meta($singleService, 'pego_services_icon' , true);
					$output .= '<div class="vc_col-sm-4 wpb_column single-service isotope-item ">';
						$output .= '<a href="'.$pego_services_url.'"  class="single-service-inside">';
							if ($pego_services_icon != '') {
								$output .= '<i class="fa service-icon '.esc_attr($pego_services_icon).'"></i>';
							}
							$output .= '<div class="above-icon">';
								$output .= '<h2>'.esc_html(get_the_title($singleService)).'</h2>';
								$output .= '<div class="service-dots">...</div>';	
								$output .= '<div class="service-content">'.$content.'</div>';
								$output .= '<div class="clear"></div>';
								$output .= '<div class="service-read-more">Read more</div>';
								$output .= '<div class="clear"></div>';
							$output .= '</div>';
						$output .= '</a>';
					$output .= '</div>';
				
				}
				$output .= '</div>';
			}
			$output .= '<div class="clear"></div>';
		$output .= '</div>';
		
	
	return $output;
	}

	add_shortcode( 'vc_services', 'pego_services_sh' );
	
	
	function pego_team_sh( $atts,  $content = null ) {
	   extract( shortcode_atts( array(
		'title' => '',
		'icon' => 'fa-search',
		'counter_value' => '',
		'icon_color' => '',
		'bg_color' => '',
		'title_color' => '',
		'text_title' => '',
		'title_align' => 'left'
	   ), $atts ) );
	
		$id = rand(1, 10000);

		$terms = array();
	
	$output = '<div class="wpb_content_element vc_team">';

		$output .= '<h2 class="titles title_align_'.esc_attr($title_align).'">'.esc_html($text_title).'</h2>';
		$allTeamMembers = pego_get_all_team_members();
		$counter = 0;
		foreach($allTeamMembers as $singleTeamMember) {
			$counter++;
			$currrentMember = get_post($singleTeamMember);
			$content = $currrentMember->post_content;
			$post_thumbnail = pego_getImageBySize(array( 'post_id' => $singleTeamMember, 'thumb_size' => 'full' ));
			$thumbnail = $post_thumbnail['thumbnail'];
			$image_position = get_post_meta($singleTeamMember, 'pego_team_image_position' , true);
			$extra_class = '';
			if ( $image_position == 'Right') {
				$extra_class = ' right-float';
			} 
			$output .= '<div class="team-member-single">';
				$output .= '<div class="team-half '.esc_attr($extra_class).'">';
					$output .= '<div class="team-member-thumb">'.$thumbnail.'</div>';
				$output .= '</div>';
				$output .= '<div class="team-half team-desc-wrap">';
						$output .= '<h1 class="team-member-title">'.esc_html(get_the_title($singleTeamMember)).'</h1>';
						$team_position = get_post_meta($singleTeamMember, 'pego_team_position' , true);
						if ($team_position != '') {
							$output .= '<h2 class="team-member-position">'.esc_html($team_position).'</h2>';
						}
						$output .= '<div class="team-member-desc">'.$content.'</div>';
						$output .= '<ul class="team-member-socials">';
							$social_icon1 = get_post_meta($singleTeamMember, 'pego_social_icon1' , true);
							$social_url1 = get_post_meta($singleTeamMember, 'pego_social_url1' , true);
							if (($social_icon1 != '')&&($social_url1 != '')) {
								$output .= '<li><a href="'.esc_url($social_url1).'" target="_blank"><i class="fa team-member-icon '.esc_attr($social_icon1).'"></i></a></li>';
							}
							$social_icon2 = get_post_meta($singleTeamMember, 'pego_social_icon2' , true);
							$social_url2 = get_post_meta($singleTeamMember, 'pego_social_url2' , true);
							if (($social_icon2 != '')&&($social_url2 != '')) {
								$output .= '<li><a href="'.esc_url($social_url2).'" target="_blank"><i class="fa team-member-icon '.esc_attr($social_icon2).'"></i></a></li>';
							}
							$social_icon3 = get_post_meta($singleTeamMember, 'pego_social_icon3' , true);
							$social_url3 = get_post_meta($singleTeamMember, 'pego_social_url3' , true);
							if (($social_icon3 != '')&&($social_url3 != '')) {
								$output .= '<li><a href="'.esc_url($social_url3).'" target="_blank"><i class="fa team-member-icon '.esc_attr($social_icon3).'"></i></a></li>';
							}
							$social_icon4 = get_post_meta($singleTeamMember, 'pego_social_icon4' , true);
							$social_url4 = get_post_meta($singleTeamMember, 'pego_social_url4' , true);
							if (($social_icon4 != '')&&($social_url4 != '')) {
								$output .= '<li><a href="'.esc_url($social_url4).'" target="_blank"><i class="fa team-member-icon '.esc_attr($social_icon4).'"></i></a></li>';
							}
							$social_icon5 = get_post_meta($singleTeamMember, 'pego_social_icon5' , true);
							$social_url5 = get_post_meta($singleTeamMember, 'pego_social_url5' , true);
							if (($social_icon5 != '')&&($social_url5 != '')) {
								$output .= '<li><a href="'.esc_url($social_url5).'" target="_blank"><i class="fa team-member-icon '.esc_attr($social_icon5).'"></i></a></li>';
							}
						$output .= '</ul>';
					$output .= '</div>';
					$output .= '<div class="clear"></div>';
			$output .= '</div>';	
			if (($counter %2) == 0) { $output .= '<div class="clear"></div>'; }
				
			}
			$output .= '<div class="clear"></div>';
		$output .= '</div>';
		
	
	return $output;
	}

	add_shortcode( 'vc_team', 'pego_team_sh' );
		
		
	function welcome_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'welcome_title' => '',
			'title_align' => 'left'
		), $atts));
		
		$output = '<div class="wpb_content_element vc_welcome">';
			$output .= '<h2 class="titles title_align_'.esc_attr($title_align).'">'.$welcome_title.'</h2>';	
			$output .= wpb_js_remove_wpautop($content);
		$output .= '</div>';		
		

		return $output;
		}

		add_shortcode( 'vc_welcome', 'welcome_sh' );

	function portfolio_grid_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
		    'type' => '',
			'grid_categories' => '',
			'welcome_title' => '',
			'css_animation' => 'left-to-right'
		), $atts));
		
		$single_cats = explode(",", $grid_categories);
		$tax_array = array();
		$tax_array = array('relation' => 'OR');
 
 	
 	
 		$terms = get_terms("portfolio_categories");
 		foreach ( $terms as $term ) {
 		if ($grid_categories != '') {
			foreach ( $single_cats as $single_cat ) {
				if ($single_cat == $term->name) {
					$terms_ids[] = $term->term_id; 
					$tax_array[] =   array(
						'taxonomy' => 'portfolio_categories',
						'terms' => $term->slug,
						'field' => 'slug'
					);
				}
			}
		}
		}
		$terms = array();


	$portfolio_thumb_size = '640x640';
	$portfolio_thumb_size_small = '320x320';
	$counter= 0;
	$number_of_items = 6;
	$extra_class = '';
	if ($type == 'squaregrid') {
		$number_of_items = 7;
		$extra_class = ' squaregrid-welcome';
	}
	$terms = array();
  
	if ($grid_categories != '') {
	
		$args = array('post_type'=> 'portfolio', 'posts_per_page' => $number_of_items, 'order'=> 'ASC', 'orderby' => 'menu_order ID', 'tax_query' => $tax_array );
	}
    else {
    
         $args = array('post_type'=> 'portfolio', 'posts_per_page' => $number_of_items, 'order'=> 'ASC', 'orderby' => 'menu_order ID');	
    }

    $posts = get_posts($args);
    $output ='<div class="portfolio-dimaond-welcome wpb_animate_when_almost_visible7 wpb_right-to-left-diamonds-small7'.$extra_class.'">';
    	  $output .='<h2>'.$welcome_title.'</h2>';
    	  $output .='<h3>'.wpb_js_remove_wpautop($content).'</h3>';
    $output .='</div>';
    
   	 if($posts) {	
   	 if ($type == 'squaregrid') {   
   	 	$output .= '<div class="portfolio-squaregrid-wrapper">';	
			$itemCount = 0;
			$idd = 0;
			$catArray = array();
			foreach($posts as $post)
			{
				$counter++;
    			$image_bg = get_post_meta($post->ID , 'pego_portfolio_background_slider_image' , true);
    			$portfolio_type = get_post_meta($post->ID , 'pego_portfolio_type_selected' , true);
    			$icon = 'fa-image';
				if ($portfolio_type == 'Slideshow') { $icon = 'fa-camera'; }
				if ($portfolio_type == 'Video') { $icon = 'fa-video-camera'; }
				
				if ($counter == 1) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_left-to-right-diamonds"><a class="diamond-big thumb-big portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} else 
				if ($counter == 2) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb intend portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} 
				else 
				if ($counter == 5) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb break portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} else {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				}
			
			}
			$output .= '<div class="clear"></div>';
			$output .= '</div>';
   	 }
   	 elseif ($type == 'square') {   	 
   	 	$output .= '<div class="portfolio-square-wrapper">';	
			$itemCount = 0;
			$idd = 0;
			$catArray = array();
			foreach($posts as $post)
			{
				$counter++;
    			$image_bg = get_post_meta($post->ID , 'pego_portfolio_background_slider_image' , true);
    			$portfolio_type = get_post_meta($post->ID , 'pego_portfolio_type_selected' , true);
    			$icon = 'fa-image';
				if ($portfolio_type == 'Slideshow') { $icon = 'fa-camera'; }
				if ($portfolio_type == 'Video') { $icon = 'fa-video-camera'; }
				
				if ($counter == 1) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_left-to-right-diamonds"><a class="diamond-big thumb-big portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} else 
				if ($counter == 2) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb intend portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} 
				else 
				if ($counter == 5) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb break portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} else {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				}
			
			}
			$output .= '<div class="clear"></div>';
			$output .= '</div>';
   	 
   	 } else 
   	 
   	 {
   	 
   	 
   	 						
			$output .= '<div class="portfolio-dimaond-wrapper">';	
			$itemCount = 0;
			$idd = 0;
			$catArray = array();
			foreach($posts as $post)
			{
				$counter++;
    			$image_bg = get_post_meta($post->ID , 'pego_portfolio_background_slider_image' , true);
    			$portfolio_type = get_post_meta($post->ID , 'pego_portfolio_type_selected' , true);
    			$icon = 'fa-image';
				if ($portfolio_type == 'Slideshow') { $icon = 'fa-camera'; }
				if ($portfolio_type == 'Video') { $icon = 'fa-video-camera'; }
				
				if ($counter == 1) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_left-to-right-diamonds"><a class="diamond-big thumb-big portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} else 
				if ($counter == 2) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb intend portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} 
				else 
				if ($counter == 4) {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb break portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				} else {
					$output .= '<div class="wpb_animate_when_almost_visible'.esc_attr($counter).' wpb_right-to-left-diamonds-small'.esc_attr($counter).'"><a class="diamond thumb portf-item'.esc_attr($counter).'"  style="background: url('.esc_url($image_bg).') no-repeat; background-size: cover;" href="'.esc_url(get_permalink($post->ID)).'"><div class="portfolio-grid-overlay-hover"></div><div class="fa portfolio-grid-overlay-icon '.esc_attr($icon).'"></div></a></div>';
				}
			
			}
			$output .= '<div class="clear"></div>';
			$output .= '</div>';
			
		}
		}
		return $output;
		}

		add_shortcode( 'vc_portfolio_grid', 'portfolio_grid_sh' );



		function text_titles_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'title' => __("Title", "xavier"),
			'title_type' => 'h1',
			'page_title_type' => '',
			'page_title_text_heading' => '',
			'title_align' => 'left',
			'css_animation' => '',
			'el_class' => ''
		), $atts));

		$output = '<div class="vc_titles title_align_'.esc_attr($title_align).'">';
			$output .= '<'.esc_attr($title_type).'>'.$title.'</'.esc_attr($title_type).'><div class="title-stripes-'.esc_attr($title_align).'"></div>';
		$output .= '</div>';


		return $output;
		}

		add_shortcode( 'vc_text_titles', 'text_titles_sh' );



		function blockquote_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'type' => 'type1',
			'border_color' => '',
			'border_size' => '',
			'icon_image' => '',
			'background_color' => '',
			'icon_background_color' => '',
			'css_animation' => '',
			'el_class' => ''
		), $atts));



		$output = '';
		$border_css = '';

		if ($type == 'type1') {
			if (($border_size != '')||($border_color != '')) {
				$border_css .= ' style=  " ';
				if ($border_size != '') {
					$border_css .= ' border-width: '.$border_size.'px;  ';
				}
				if ($border_color != '') {
					$border_css .= ' border-color: '.$border_color.';  ';
				}
				$border_css .= ' " ';	
			}
		}
		if ($type == 'type2') {
			if (($background_color != '')||($icon_image != '')) {
				$border_css .= ' style=  " ';		
				if ($icon_image != '') {
					$img_id = preg_replace('/[^\d]/', '', $icon_image);
					$link_to = wp_get_attachment_image_src( $img_id, 'thumbnail');
					$border_css .= ' background: url('.esc_url($link_to[0]).') no-repeat scroll 20px center; ';
				}
				if ($background_color != '') {
					$border_css .= ' background-color: '.$background_color.';  ';
				}
				$border_css .= ' " ';	
			}
		}
		$border_css = '';
		if ($type == 'type3') {
			if (($icon_background_color != '')||($icon_image != '')) {
				$border_css .= ' style=  " ';		
				if ($icon_image != '') {
					$img_id = preg_replace('/[^\d]/', '', $icon_image);
					$link_to = wp_get_attachment_image_src( $img_id, 'thumbnail');
					$border_css .= ' background: url('.esc_url($link_to[0]).') no-repeat scroll center center; ';
				}
				if ($icon_background_color != '') {
					$border_css .= ' background-color: '.$icon_background_color.';  ';
				}
				$border_css .= ' " ';	
			}
		}

		if ($type == 'type3') {
			$output .= '<div class="blockquote wpb_content_element '.esc_attr($type).'"><div class="icon_holder"'.$border_css.'></div><p>'.wpb_js_remove_wpautop($content).'</p></div>';
		} elseif ($type == 'type4') {
			$output .= '<div class="blockquote wpb_content_element '.esc_attr($type).'"'.$border_css.'><p><span>“</span>'.wpb_js_remove_wpautop($content).'<span>”</span></p></div>';
		} else {
			$output .= '<div class="blockquote wpb_content_element '.esc_attr($type).'"'.$border_css.'><p>'.wpb_js_remove_wpautop($content).'</p></div>';
		}

		if ($type == 'type4') {
			if (($background_color != '')||($icon_image != '')) {
				$border_css .= ' style=  " ';		
				if ($icon_image != '') {
					$img_id = preg_replace('/[^\d]/', '', $icon_image);
					$link_to = wp_get_attachment_image_src( $img_id, 'thumbnail');
					$border_css .= ' background: url('.esc_url($link_to[0]).') no-repeat scroll 20px center; ';
				}
				if ($background_color != '') {
					$border_css .= ' background-color: '.$background_color.';  ';
				}
				$border_css .= ' " ';	
			}
		}

		return $output;
		}

		add_shortcode( 'vc_blockquote', 'blockquote_sh' );


		function circle_chart_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			  'color' => '',
			'track_color' => '',
			'value' => '',
			'type' => '',
			'icon' => '',
			'icon_color' => '',
			'icon_size' => '',
			'chart_width' => '',
			'line_width' => '',
			'description_color' => '',
			'description_size' => '',
			'description' => '',
			'percent_color' => '',
			'percent_size' => '',
			'css_animation' => '',
			'el_class' => ''
		), $atts));

		$id = rand(1, 10000);

		wp_enqueue_script('pego_chart_js');
		if ($color == '') {
			$color = get_option($pego_prefix.'main_template_color');   
		 } 

		 $output = '<div class="wpb_content_element">';	
			$output .= '<style> .chart'.esc_attr($id).' { width:'.esc_attr($chart_width).'px; height:'.esc_attr($chart_width).'px; line-height:'.esc_attr($chart_width).'px; } .chart'.esc_attr($id).' .chart-percent, .chart'.esc_attr($id).' .chart-description { line-height:'.esc_attr($chart_width).'px; }   </style>';	
			$output .= '<div data-percent="'.esc_attr($value).'" data-barsize="'.esc_attr($chart_width).'" data-linewidth="'.esc_attr($line_width).'" data-trackcolor="'.esc_attr($track_color).'" data-barcolor="'.$color.'" class="easyPieChart chart'.esc_attr($id).'">';
			if($type == 'percent' ) {
				$percent_style = '';
				if (($percent_color != '')||($percent_size != '')) {
					$percent_style .= ' style= " ';
					if ($percent_color != '') {
						$percent_style .= ' color: '.$percent_color.'; ';
					}
					if ($percent_size != '') {
						$percent_style .= ' font-size: '.$percent_size.'px; ';
					}
					$percent_style .= ' " ';
				}
				$output .= '<div class="chart-percent"'.$percent_style.'><span'.$percent_style.'>'.esc_html($value).'</span>%</div>';
			}	
			if($type == 'icon' ) {
				$icon_style = '';
				if (($icon_color != '')||($icon_size != '')) {
					$icon_style .= ' style= " ';
					if ($icon_color != '') {
						$icon_style .= ' color: '.$icon_color.'; ';
					}
					if ($icon_size != '') {
						$icon_style .= ' font-size: '.$icon_size.'px; ';
					}
					$icon_style .= ' " ';
				}
				$output .= '<div class="chart-icon chart'.esc_attr($id).' icon-'.$icon.'"'.$icon_style.'></div>';
			}
			if($type == 'description' ) {
				$description_style = '';
				if (($description_color != '')||($description_size != '')) {
					$description_style .= ' style= " ';
					if ($description_color != '') {
						$description_style .= ' color: '.$description_color.'; ';
					}
					if ($description_size != '') {
						$description_style .= ' font-size: '.$description_size.'px; ';
					}
					$description_style .= ' " ';
				}
				$output .= '<div class="chart-description"'.$description_style.'>'.$description.'</div>';
			}
			$output .= '</div>';
			$output .= '<div class="circle-desc">'.wpb_js_remove_wpautop($content).'</div>';	
		$output .= '</div>';
		return $output;
		}

		add_shortcode( 'vc_circle_chart', 'circle_chart_sh' );


		function dropcap_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'first_letter' => '',
			'first_letter_bg' => '',
			'first_letter_color' => '',
			'first_letter_size' => '',
			'type' => 'type1',
			'css_animation' => '',
			'el_class' => ''
		), $atts));

		$first_letter_css = '';
		if ($type == 'type1') {
			if (($first_letter_color != '')||($first_letter_size != '')) {
				$first_letter_css .= ' style= " ';
				if ($first_letter_color != '') {
					$first_letter_css .= ' color: '.$first_letter_color.';  ';
				}
				if ($first_letter_size != '') {
					$first_letter_css .= ' font-size: '.$first_letter_size.'px !important;  ';
				}
				$first_letter_css .= ' " ';	
			}
		}

		if ($type == 'type2') {
			if (($first_letter_bg != '')||($first_letter_color != '')||($first_letter_size != '')) {
				$first_letter_css .= ' style= " ';
				if ($first_letter_bg != '') {
					$first_letter_css .= ' background-color: '.$first_letter_bg.';  ';
				}
				if ($first_letter_color != '') {
					$first_letter_css .= ' color: '.$first_letter_color.';  ';
				}
				if ($first_letter_size != '') {
					$first_letter_css .= ' font-size: '.$first_letter_size.'px !important;  ';
				}
				$first_letter_css .= ' " ';	
			}
		}

		$output = '<div class="wpb_content_element vc_dropcap"><div class="dropcap '.esc_attr($type).'"><span class="first_letter" '.$first_letter_css.'>'.esc_html($first_letter).'</span>'.wpb_js_remove_wpautop($content).'</div></div>';

		return $output;
		}

		add_shortcode( 'vc_dropcap', 'dropcap_sh' );

		function pego_testimonials_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
		   	'text_title' => '',
			'grid_categories' => '',
			'title_align' => 'left'
		   ), $atts ) );
	
			$id = rand(1, 10000);
			wp_enqueue_script('pego_owl_carousel');
			$terms = array();
			$output = '<div class="vc_testimonials wpb_content_element">';
			if ($text_title != '') {
				$output .= '<h2 class="titles title_align_'.esc_attr($title_align).'">'.esc_html($text_title).'</h2>';
			}
		$output .= '<div class="owl-carousel owl-theme testimonials-wrapper">';


			$allTestimonials1 = pego_get_all_test();
			if ($grid_categories != '') {
				$allTestimonials = array();
				$single_test = explode(",", $grid_categories);	
				foreach($single_test as $currentTest)  {
					$key = array_search($currentTest, $allTestimonials1); 
					$allTestimonials[$key] = $currentTest;
				}
		
			} else {
				$allTestimonials = pego_get_all_test();	
			}
			foreach($allTestimonials as $key => $singleTestimonial) {
				$currrentTestimonial = get_post($key);
				$content = $currrentTestimonial->post_content;
				$author = get_post_meta($key, 'test_name' , true);
				$test_image = get_post_meta($key, 'test_image' , true);
				$output .= '<div class="item testimonials-wrapper">';
					$extra_class = '';
					if ($test_image != '') {
						$output .= '<img class="testimonial-image" src="'.esc_url($test_image).'" />';
						$extra_class = 'ml90';
					}
					$output .= '<div>';
						$output .= '<div class="testimonial-quote">“</div><div class="testimonial-content">'.$content.'</div>';
		
					$output .= '</div>';
				$output .= '</div>';

		}
		$output .= '</div>';
		$output .= '</div>';
		return $output;
		}
		add_shortcode( 'vc_testimonials', 'pego_testimonials_sh' );


		function pego_galleries_sh( $atts,  $content = null ) {
		   extract( shortcode_atts( array(
			'type' => ''
		), $atts));


			$allgalleries = pego_get_all_gallery();
			$key = array_search($type, $allgalleries); 
			$currrentGallery = get_post($key);
			$content = $currrentGallery->post_content;
			$output = do_shortcode($content);

		return $output;
		}

	}
}

add_shortcode( 'vc_galleries', 'pego_galleries_sh' );


remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_fancybox');

function gallery_shortcode_fancybox($attr) {
	global $post, $wp_locale;

$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) ) {
			$attr['orderby'] = 'post__in';
		}
		$attr['include'] = $attr['ids'];
	}

	/**
	 * Filter the default gallery shortcode output.
	 *
	 * If the filtered output isn't empty, it will be used instead of generating
	 * the default gallery template.
	 *
	 * @since 2.5.0
	 *
	 * @see gallery_shortcode()
	 *
	 * @param string $output The gallery output. Default empty.
	 * @param array  $attr   Attributes of the gallery shortcode.
	 */
	$output = apply_filters( 'post_gallery', '', $attr );
	if ( $output != '' ) {
		return $output;
	}

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) {
			unset( $attr['orderby'] );
		}
	}

	$html5 = current_theme_supports( 'html5', 'gallery' );
	$atts = shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post ? $post->ID : 0,
		'itemtag'    => $html5 ? 'figure'     : 'dl',
		'icontag'    => $html5 ? 'div'        : 'dt',
		'captiontag' => $html5 ? 'figcaption' : 'dd',
		'columns'    => 3,
		'size'       => 'full',
		'include'    => '',
		'exclude'    => '',
		'link'       => ''
	), $attr, 'gallery' );

	$id = intval( $atts['id'] );
	if ( 'RAND' == $atts['order'] ) {
		$atts['orderby'] = 'none';
	}

	if ( ! empty( $atts['include'] ) ) {
		$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( ! empty( $atts['exclude'] ) ) {
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	} else {
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
	}

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
		}
		return $output;
	}



$output = '<div class="vc_gallery">';
	$random_id = rand(1, 10000);
	foreach ( $attachments as $id => $attachment ) {
		$output .= '<div class="column4">';
			$full_img_url = wp_get_attachment_image_src($id,'full', true);
			$output .= '<a class="no-ajaxy" href="'.esc_url($full_img_url[0]).'" rel="prettyPhoto[pp_gal'.esc_attr($random_id).']" title="'.esc_attr($attachment->post_title).'" >';
			$post_thumbnail = pego_getImageBySize(array( 'attach_id' => $id, 'thumb_size' => '350x250' ));
    		$thumbnail = $post_thumbnail['thumbnail'];
			$output .= $thumbnail;
			$output .= '</a>';
		$output .= '</div>';
	}
	$output .= '</div>';

	return $output;
}