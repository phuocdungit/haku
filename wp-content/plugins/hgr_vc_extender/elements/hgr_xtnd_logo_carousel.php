<?php
/*
* Add-on Name: Logo Carousel
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Based on: www.owlgraphic.com/owlcarousel/
* Since: 1.0
* Author: Bogdan Costescu
*/
if(!class_exists('HGR_VC_LOGOCAROUSEL')) {
	class HGR_VC_LOGOCAROUSEL {

		function __construct() {
			add_action('admin_init', array($this, 'add_logocarousel'));
			
			/*
				Param type "number"
			*/ 
			if ( function_exists('vc_add_shortcode_param')){
				vc_add_shortcode_param('number' , array('HGR_XTND', 'make_number_input' ) );
			}
		}
		
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function add_logocarousel() {
			if(function_exists('vc_map')) {
				
				/*
					Parent element
				*/
				vc_map(
					array(
					   "name"						=>	__("HGR LogoCarousel", "hgrextender"),
					   "base"						=>	"hgr_logocarousel",
					   "class"						=>	"",
					   "icon"						=>	"hgr_logocarousel",
					   "category"					=>	__("HighGrade Extender", "hgrextender"),
					   "as_parent"					=>	array( 'only' => 'hgr_logocarousel_item' ),
					   "description"				=>	__("Carousel block", "hgrextender"),
					   "content_element"			=>	true,
					   "show_settings_on_create"	=>	true,
					   "params"					=>	array(
							array(
								"type"				=>	"number",
								"class"				=>	"",
								"heading"			=>	__("Numer of logos displayed at a time with the widest browser width:", "hgrextender"),
								"param_name"		=>	"carousel_items_number_max",
								"value"				=>	5,
								"min"				=>	1,
								"max"				=>	50,
								"description"		=>	__("Logos displayed at a time with the widest browser width.", "hgrextender"),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"number",
								"class"				=>	"",
								"heading"			=>	__("Number of logos displayed for desktop window size (< 1200px):", "hgrextender"),
								"param_name"		=>	"carousel_items_number_desktop",
								"value"				=>	4,
								"min"				=>	1,
								"max"				=>	40,
								"description"		=>	__("Logos displayed at a time for desktop window size.", "hgrextender"),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"number",
								"class"				=>	"",
								"heading"			=>	__("Number of logos displayed for desktop small window size (< 980px):", "hgrextender"),
								"param_name"		=>	"carousel_items_number_desktop_small",
								"value"				=>	3,
								"min"				=>	1,
								"max"				=>	30,
								"description"		=>	__("Logos displayed at a time for desktop small window size.", "hgrextender"),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"number",
								"class"				=>	"",
								"heading"			=>	__("Number of logos displayed for tablet window size (< 769px):", "hgrextender"),
								"param_name"		=>	"carousel_items_number_tablet",
								"value"				=>	2,
								"min"				=>	1,
								"max"				=>	20,
								"description"		=>	__("Logos displayed at a time for desktop small window size.", "hgrextender"),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"checkbox",
								"heading"			=>	__("Auto play scrooling:", "hgrextender"),
								"param_name"		=>	"carousel_autoplay",
								"description"		=>	__("If checked this will set the carousel to scroll every 5 seconds.", "hgrextender"),
								"value"				=>	array( esc_html__("Yes, please", "hgrextender") => 'yes' ),
								"save_always" 		=>	true,
							),
							array(
								 "type"				=>	"textfield",
								 "class"			=>	"",
								 "heading"			=>	__("Extra class:", "hgrextender"),
								 "param_name"		=>	"carousel_extra_class",
								 "value"			=>	"",
								 "description"		=>	__("Add extra class name. You can use this class for your customizations.", "hgrextender"),
								 "save_always" 		=>	true,
							),
							array(
								"type"				=>	"heading",
								"sub_heading"		=>	"This is a global setting page for the whole \"Carousel\" block. Add some \"Carousel Items\" in the container row to make it complete.",
								"param_name"		=>	"notification",
							),
						),
						"js_view" => 'VcColumnView'
				));
					
				/*
					Child element
				*/
				vc_map(
					array(
					   "name"						=>	__("Carousel item", "hgrextender"),
					   "holder"						=>	"div",
					   "base"						=>	"hgr_logocarousel_item",
					   "class"						=>	"",
					   "icon"						=>	"",
					   "content_element"			=>	true,
					   "as_child"					=>	array(
					   			"only"				=>	"hgr_logocarousel"
							),
					   "params"						=>	array(
							array(
								"type"				=>	"attach_image",
								"class"				=>	"",
								"heading"			=>	__("Logo image:", "hgrextender"),
								"param_name"		=>	"item_image",
								"admin_label"		=>	true,
								"value"				=>	"",
								"description"		=>	__("Upload carousel item logo image.", "hgrextender"),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"dropdown",
								"class"				=>	"",
								"heading"			=>	__("Link text settings:", "hgrextender"),
								"param_name"		=>	"item_link_settings",
								"value"				=>	array(
										__( 'No Link', 'hgrextender' )	=> 'link-off',
										__( 'Add link', 'hgrextender' )	=> 'link-on',
									),
								"save_always" 		=> true,
								"description"		=>	__("You can add / remove custom link for logo image.", "hgrextender"),
							),
							array(
								"type"				=>	"vc_link",
								"class"				=>	"",
								"heading"			=>	__("Link to:","hgrextender"),
								"param_name"		=>	"item_link",
								"value"				=>	"",
								"description"		=>	__("Set a link to this logo image.","hgrextender"),
								"dependency"		=>	array(
										"element"	=>	"item_link_settings",
										"value"		=>	array( "link-on" ),
									),
								"save_always" 		=>	true,
							),
					    )
					) 
				);
			}
		}
	}
	new HGR_VC_LOGOCAROUSEL;
}