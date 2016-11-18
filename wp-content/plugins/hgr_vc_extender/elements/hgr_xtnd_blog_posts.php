<?php
/*
* Add-on Name: Blog POsts
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Author: Eugen Petcu
*/
if(!class_exists('HGR_VC_BLOGPOSTS')) {
	class HGR_VC_BLOGPOSTS {

		function __construct() {
			add_action('admin_init', array($this, 'hgr_posts_init'));
		}
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function hgr_posts_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"				=>	__("HGR Blog Posts",'hgrextender'),
					   "holder"			=>	"div",
					   "base"				=>	"hgr_blog_posts",
					   "class"				=>	"",
					   "icon"				=>	"hgr_blog_posts",
					   "category"			=>	__("HighGrade Extender",'hgrextender'),
					   "description"		=>	__("Grid style blog posts.","hgrextender"),
					   "content_element"	=>	true,
					   "params"			=>	array(
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("How many posts to fetch?", "hgrextender"),
									"param_name"	=>	"posts_number",
									"value"			=>	"",
									"description"	=>	__("Enter the desired number of posts to fetch from blog. Recomended: 6", "hgrextender"),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("How many posts to display on a row?", "hgrextender"),
									"param_name"	=>	"posts_columns",
									"value"			=>	"",
									"description"	=>	__("Enter the desired number of posts to display on each row.", "hgrextender"),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"dropdown",
									"class"			=>	"",
									"heading"		=>	__("Display order", "hgrextender"),
									"param_name"	=>	"display_order",
									"value"			=>	array(
										__( 'Image > Title > Text', 'hgrextender' ) => 'img_title_txt',
										__( 'Title > Text', 'hgrextender' ) => 'title_txt',
									),
									"save_always"	=>	true,
									"description"	=>	__("How to display posts", "hgrextender")
								),
								array(
									"type"			=>	"dropdown",
									"class"			=>	"",
									"heading"		=>	__("Order posts by", "hgrextender"),
									"param_name"	=>	"display_by",
									"value"			=>	array(
										__( 'Publish date', 'hgrextender' ) => 'ordr_by_publish_date',
										__( 'Title', 'hgrextender' ) => 'ordr_by_date',
									),
									"save_always"	=>	true,
								),
								array(
									"type"			=>	"dropdown",
									"class"			=>	"",
									"heading"		=>	__("Order", "hgrextender"),
									"param_name"	=>	"order",
									"value"			=>	array(
										__( 'Ascending', 'hgrextender' ) => 'ascending',
										__( 'Descending', 'hgrextender' ) => 'descending',
									),
									"save_always"	=>	true,
								),
								array(
									"type"			=>	"dropdown",
									"class"			=>	"",
									"heading"		=>	__("Blog post title size", "hgrextender"),
									"param_name"	=>	"blog_post_title_size",
									"value"			=>	array(
										__( 'H1', 'hgrextender' ) => 'h1',
										__( 'H2', 'hgrextender' ) => 'h2',
										__( 'H3', 'hgrextender' ) => 'h3',
										__( 'H4', 'hgrextender' ) => 'h4',
										__( 'H5', 'hgrextender' ) => 'h5',
										__( 'H6', 'hgrextender' ) => 'h6',
									),
									"save_always"	=>	true,
								),
								array(
									"type"			=>	"dropdown",
									"class"			=>	"",
									"heading"		=>	__("Blog post footer type", "hgrextender"),
									"param_name"	=>	"blogpost_footer",
									"value"			=>	array(
										__( 'Icon based', 'hgrextender' ) => 'iconbased',
										__( 'Compact', 'hgrextender' ) => 'compact',
										__( 'Simple', 'hgrextender' ) => 'simple',
									),
									"save_always"	=>	true,
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"hgr_left_floated",
									"heading"		=>	__("Footer background color:", "hgrextender"),
									"param_name"	=>	"footer_bg_color",
									"value"			=>	"",	
									"dependency"	=>	array(
										"element"		=>	"blogpost_footer",
										"value"			=>	array("compact")
									),
									"save_always" 	=>	true,				
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Footer border & separators color:", "hgrextender"),
									"param_name"	=>	"footer_sep_border_color",
									"value"			=>	"",	
									"dependency"	=>	array(
										"element"		=>	"blogpost_footer",
										"value"			=>	array("compact")
									),
									"save_always" 	=>	true,					
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Links color:", "hgrextender"),
									"param_name"	=>	"links_color",
									"value"			=>	"",
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Background color:", "hgrextender"),
									"param_name"	=>	"bg_color",
									"value"			=>	"",
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("Extra class", "hgrextender"),
									"param_name"	=>	"extra_class",
									"value"			=>	"",
									"description"	=>	__("Extra CSS class for custom CSS", "hgrextender")	,
									"save_always" 	=>	true,
								),
					   )
					) 
				);
			}
		}
	}
	new HGR_VC_BLOGPOSTS;
}