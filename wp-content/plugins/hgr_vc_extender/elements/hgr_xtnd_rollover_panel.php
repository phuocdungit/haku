<?php
/*
	* Add-on Name: Rollover Panel
	* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
	* Since: 1.0.3.8
	* Add-on Author: Bogdan Costescu
*/
if(!class_exists('HGR_VC_ROLLOVERPANEL')) {
	class HGR_VC_ROLLOVERPANEL {
		function __construct() {
			add_action('admin_init', array($this, 'hgr_rolloverpanel'));
			/*
				Param type "number"
			*/ 
			if ( function_exists('vc_add_shortcode_param')){
				vc_add_shortcode_param('number' , array('HGR_XTND', 'make_number_input' ) );
			}
			/*
				Param type "icon_browser"
			*/ 
			if(function_exists('vc_add_shortcode_param')){
				vc_add_shortcode_param('icon_browser', array('HGR_XTND','icon_browser'));
			}
		}
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function hgr_rolloverpanel() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"			=>	__("HGR Rollover Panel","hgrextender"),
					   "base"			=>	"hgr_rollover_panel",
					   "class"			=>	"",
					   "icon"			=>	"hgr_rolloverpanel",
					   "category"		=>	__("HighGrade Extender", "hgrextender"),
					   "description"	=>	__("Rollover Panel with advanced settings", "hgrextender"),
					   "params"			=>	array(
							/*
								=== Front panel settings ===
							*/
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon to display on front side:", "hgrextender"),
								"param_name"	=>	"icon_type",
								"value"			=>	array(
									__( 'Font Icon Browser', 'hgrextender' ) => 'selector',
									__( 'Custom Image Icon', 'hgrextender' ) => 'custom-icon',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Select icon source.", "hgrextender"),
							),
							array(
								"type"			=>	"icon_browser",
								"class"			=>	"",
								"heading"		=>	__("Select icon:", "hgrextender"),
								"param_name"	=>	"icon",
								"value"			=>	"",
								"description"	=>	__("Click on an icon to select it.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"icon_type",
									"value"		=>	array( "selector" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"hgr_range_class",
								"heading"		=>	__("Size of icon on front side:", "hgrextender"),
								"param_name"	=>	"icon_size",
								"value"			=>	32,
								"min"			=>	12,
								"max"			=>	120,
								"suffix"		=>	"px",
								"description"	=>	__("Set the icon size on front panel.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"icon_type",
									"value"		=>	array( "selector" )
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Color of icon on front side:", "hgrextender"),
								"param_name"	=>	"icon_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick your desired icon color.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"icon_type",
									"value"		=>	array( "selector" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"attach_image",
								"class"			=>	"",
								"heading"		=>	__("Upload image icon:", "hgrextender"),
								"param_name"	=>	"icon_img",
								"admin_label"	=>	true,
								"value"			=>	"",
								"description"	=>	__("Upload the custom image icon.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"icon_type",
									"value"		=>	array( "custom-icon" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Image width:", "hgrextender"),
								"param_name"	=>	"img_width",
								"value"			=>	48,
								"min"			=>	16,
								"max"			=>	512,
								"suffix"		=>	"px",
								"description"	=>	__("Provide image width.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"icon_type",
									"value"		=>	array( "custom-icon" ),
								),
								"save_always" 	=>	true,
							),
							/*
								Front side title settings
							*/
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Front side title text:","hgrextender"),
								"param_name"	=>	"title_front",
								"value"			=>	"Fast customization",
								"description"	=>	__("Title for the front panel.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Front side title size:", "hgrextender"),
								"param_name"	=>	"title_front_size",
								"value"			=>	14,
								"min"			=>	8,
								"max"			=>	30,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Front side title color:", "hgrextender"),
								"param_name"	=>	"title_front_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a color for the front side title.", "hgrextender"),
								"save_always" 	=>	true,
							),
							/*
								Front side background settings
							*/
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Front side background type:", "hgrextender"),
								"param_name"	=>	"front_background_type",
								"value"			=>	array(
									__( 'None', 'hgrextender' ) 		=> 'none',
									__( 'Select color', 'hgrextender' )	=> 'custom-front-color',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Choose between transparent or color background.", "hgrextender"),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading" 		=>	__("Front side background color:", "hgrextender"),
								"param_name"	=>	"front_background_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a background color for front panel.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"front_background_type",
									"value"		=>	array("custom-front-color"),
								),
								"save_always" 	=>	true,
							),
							/*
								Front side border settings
							*/
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Front side border type:", "hgrextender"),
								"param_name"	=>	"front_border_type",
								"value"			=>	array(
									__( 'None', 'hgrextender' ) 		=> 'none',
									__( 'Custom border settings', 'hgrextender' )	=> 'custom-front-border',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Add border to front side panel.", "hgrextender"),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Front border width:", "hgrextender"),
								"param_name"	=>	"front_border_width",
								"value"			=>	1,
								"min"			=>	1,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"front_border_type",
									"value"		=>	array( "custom-front-border" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Front border color:", "hgrextender"),
								"param_name"	=>	"front_border_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a color for front side border.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"front_border_type",
									"value"		=>	array( "custom-front-border" ),
								),
								"save_always" 	=>	true,
							),
							/*
								=== Back panel settings ===
							*/
							/*
								Back side title settings
							*/
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Back side title text:","hgrextender"),
								"param_name"	=>	"title_back",
								"value"			=>	"Fast customization",
								"description"	=>	__("Title for the back panel.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Back side title size:", "hgrextender"),
								"param_name"	=>	"title_back_size",
								"value"			=>	14,
								"min"			=>	8,
								"max"			=>	30,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Back side title color:", "hgrextender"),
								"param_name"	=>	"title_back_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a color for the back side title.", "hgrextender"),	
								"save_always" 	=>	true,
							),
							/*
								Back side description settings
							*/
							array(
								"type"			=>	"textfield",
								"class"		=>	"",
								"heading"		=>	__("Back side description text:","hgrextender"),
								"param_name"	=>	"description_back",
								"value"		=>	"",
								"description"	=>	__("Description for the back panel.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Back side description text size:", "hgrextender"),
								"param_name"	=>	"description_back_size",
								"value"			=>	14,
								"min"			=>	8,
								"max"			=>	30,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Back side description text color:", "hgrextender"),
								"param_name"	=>	"description_back_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a color for the back side description.", "hgrextender"),
								"save_always" 	=>	true,
							),
							/*
								Back side background settings
							*/
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Back side background type:", "hgrextender"),
								"param_name"	=>	"back_background_type",
								"value"			=>	array(
									__( 'None', 'hgrextender' ) 		=> 'none',
									__( 'Select color', 'hgrextender' )	=> 'custom-back-color',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Choose between transparent or color background.", "hgrextender"),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading" 		=>	__("Back side background color:", "hgrextender"),
								"param_name"	=>	"back_background_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a background color for back panel.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"back_background_type",
									"value"		=>	array("custom-back-color"),
								),
								"save_always" 	=>	true,
							),
							/*
								Back side border settings
							*/
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Back side border type:", "hgrextender"),
								"param_name"	=>	"back_border_type",
								"value"			=>	array(
									__( 'None', 'hgrextender' ) 					=> 'none',
									__( 'Custom border settings', 'hgrextender' )	=> 'custom-back-border',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Add border to back side panel.", "hgrextender"),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Back border width:", "hgrextender"),
								"param_name"	=>	"back_border_width",
								"value"			=>	1,
								"min"			=>	1,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"back_border_type",
									"value"		=>	array( "custom-back-border" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Back border color:", "hgrextender"),
								"param_name"	=>	"back_border_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a color for back side border.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"back_border_type",
									"value"		=>	array( "custom-back-border" ),
								),
								"save_always" 	=>	true,
							),
							/*
								Back side link settings
							*/
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Back side link settings:", "hgrextender"),
								"param_name"	=>	"custom_link_back",
								"value"			=>	array(
									__( 'No link', 'hgrextender' ) 			=> '',
									__( 'Add custom link', 'hgrextender' )	=> 'yes',
								),
								"save_always" 	=> true,
								"description"	=>	__("You can add/remove custom link.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Back side link text:","hgrextender"),
								"param_name"	=>	"link_text",
								"value"			=>	"Read more",
								"description"	=>	__("Choose a text for your link.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"custom_link_back",
									"not_empty"	=>	true,
									"value"		=>	array("yes"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"vc_link",
								"class"			=>	"",
								"heading"		=>	__("Link to URL:", "hgrextender"),
								"param_name"	=>	"link_url",
								"value"			=>	"",
								"description"	=>	__("Select URL to link.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"custom_link_back",
									"not_empty"	=>	true,
									"value"		=>	array("yes"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Link text size:", "hgrextender"),
								"param_name"	=>	"link_size",
								"value"			=>	14,
								"min"			=>	8,
								"max"			=>	30,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"custom_link_back",
									"not_empty"	=>	true,
									"value"		=>	array("yes"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Link text color:", "hgrextender"),
								"param_name"	=>	"link_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a color for the link text.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"custom_link_back",
									"not_empty"	=>	true,
									"value"		=>	array("yes"),
								),
								"save_always" 	=>	true,
							),
							/*
								General panel settings
							*/
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Box rounded corners:", "hgrextender"),
								"param_name"	=>	"box_roundness",
								"value"			=>	0,
								"min"			=>	0,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels, example: 0 for square, or 5 for rounded corners. Roundness will be applied to both sides.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	'checkbox',
								"heading"		=>	__("Enable panel reflection:", "hgrextender"),
								"param_name"	=>	"box_reflection",
								"description"	=>	__("Check box to apply reflection. Reflection works best on square boxes.", "hgrextender"),
								"value"			=>	array( esc_html__("Yes, please", "hgrextender") => 'yes' ),
								"save_always" 	=>	true,
						    ),
							/*
								Box height settings
							*/
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Set box height:", "hgrextender"),
								"param_name"	=>	"height_type",
								"value"			=>	array(
									__( 'Auto', 'hgrextender' ) 	=> 'auto',
									__( 'Custom', 'hgrextender' )	=> 'custom',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Select height option for this box.", "hgrextender"),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Box height:", "hgrextender"),
								"param_name"	=>	"box_height",
								"value"			=>	300,
								"min"			=>	200,
								"max"			=>	1200,
								"suffix"		=>	"px",
								"description"	=>	__("Provide box height.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"height_type",
									"value"		=>	array( "custom" ),
								),
								"save_always" 	=>	true,
							),
							/*
								Item extra class
							*/
							array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Extra class:", "hgrextender"),
								 "param_name"	=>	"box_extra_class",
								 "value"		=>	"",
								 "description"	=>	__("Add extra class name. You can use this class for your customizations.", "hgrextender"),
								 "save_always" 	=>	true,
							),
						),
					)
				);
			}
		}
	}
	new HGR_VC_ROLLOVERPANEL;
}