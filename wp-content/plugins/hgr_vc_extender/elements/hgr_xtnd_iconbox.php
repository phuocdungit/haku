<?php
/*
* Add-on Name: Icon Box
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Add-on Author: Bogdan Costescu
*/
if(!class_exists('HGR_VC_ICONBOX')) {
	class HGR_VC_ICONBOX {

		function __construct() {
			add_action('admin_init', array($this, 'hgr_iconbox_init'));
			
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
		function hgr_iconbox_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"			=>	__("HGR IconBox", "hgrextender"),
					   "base"			=>	"hgr_icon_box",
					   "class"			=>	"",
					   "icon"			=>	"hgr_icon_box",
					   "category"		=>	__("HighGrade Extender", "hgrextender"),
					   "description"	=>	__("IconBox - invert colors on hover", "hgrextender"),
					   "params"			=>	array(
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Display icon:","hgrextender"),
								"param_name"	=>	"icon_type",
								"value"			=>	array(
									__( 'Font Icon Browser', 'hgrextender' ) => 'selector',
									__( 'Custom Image Icon', 'hgrextender' ) => 'custom',
									__( 'No icon', 'hgrextender' ) => 'no-icon',
								),
								"save_always"	=>	true,
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
									"value"		=>	array("selector"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Icon size:", "hgrextender"),
								"param_name"	=>	"icon_size",
								"value"			=>	32,
								"min"			=>	12,
								"max"			=>	72,
								"suffix"		=>	"px",
								"description"	=>	__("Set the icon size", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"icon_type",
									"value"		=>	array("selector"),
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
									"element"		=>	"icon_type",
									"value"			=>	array("custom"),
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
								"description"	=>	__("Provide image width", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"icon_type",
									"value"		=>	array("custom"),
								),
								"save_always" 	=>	true,
							),
							array(
								 "type"				=>	"textfield",
								 "class"			=>	"",
								 "heading"			=>	__("Title text:","hgrextender"),
								 "param_name"		=>	"title_text",
								 "value"			=>	"Featured items",
								 "description"		=>	__("Insert title text here.", "hgrextender"),
								 "save_always" 		=>	true,
							),
							array(
								 "type"				=>	"textfield",
								 "class"			=>	"",
								 "heading"			=>	__("Subheading text:","hgrextender"),
								 "param_name"		=>	"subheading_text",
								 "value"			=>	"View all",
								 "description"		=>	__("This will be visible on hover.", "hgrextender"),
								 "save_always" 		=>	true,
							),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Icon, title and subheading color on normal state:", "hgrextender"),
								"param_name"		=>	"its_normal_color",
								"value"				=>	"#47a3da",
								"description"		=>	__("Color of icon, title text and subheading text in normal state.", "hgrextender"),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"dropdown",
								"class"				=>	"",
								"heading"			=>	__("Background type on normal state:", "hgrextender"),
								"param_name"		=>	"normal_background_type",
								"value"				=>	array(
									__( 'None', 'hgrextender' ) 		=> 'none',
									__( 'Select color', 'hgrextender' )	=> 'custom-normal-color',
								),
								"save_always"		=>	true,
								"description"		=>	__("Select background type in normal state.", "hgrextender"),
							),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Background color on normal state:", "hgrextender"),
								"param_name"		=>	"normal_background_color",
								"value"				=>	"#ffffff",
								"description"		=>	__("Pick a background color for normal state.", "hgrextender"),
								"dependency"		=>	array(
									"element"		=> "normal_background_type",
									"value"			=>	array( "custom-normal-color" ),
								),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"dropdown",
								"class"				=>	"",
								"heading"			=>	__("Border type on normal state:", "hgrextender"),
								"param_name"		=>	"normal_border_type",
								"value"				=>	array(
									__( 'None', 'hgrextender' ) 		=> 'none',
									__( 'Select color', 'hgrextender' )	=> 'custom-normal-border',
								),
								"save_always"		=>	true,
								"description"		=>	__("Select border type in normal state.", "hgrextender"),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Border thickness on normal state:", "hgrextender"),
								"param_name"	=>	"normal_border_width",
								"value"			=>	2,
								"min"			=>	1,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"normal_border_type",
									"value"		=>	array( "custom-normal-border" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Border color on normal state:", "hgrextender"),
								"param_name"	=>	"normal_border_color",
								"value"			=>	"#222222",
								"description"	=>	__("Pick a border color for normal state box.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"normal_border_type",
									"value"		=>	array( "custom-normal-border" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Icon, title and subheading color on hover state:", "hgrextender"),
								"param_name"		=>	"its_hover_color",
								"value"				=>	"#ffffff",
								"description"		=>	__("Color of icon, title text and subheading text in hover state.", "hgrextender"),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"dropdown",
								"class"				=>	"",
								"heading"			=>	__("Background type on hover state", "hgrextender"),
								"param_name"		=>	"hover_background_type",
								"value"				=>	array(
									__( 'None', 'hgrextender' ) 		=> 'none',
									__( 'Select color', 'hgrextender' )	=> 'custom-hover-border',
								),
								"save_always" 		=> true,
								"description"		=>	__("Select background type in hover state.", "hgrextender"),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Background color on hover state:", "hgrextender"),
								"param_name"	=>	"hover_background_color",
								"value"			=>	"#47a3da",
								"description"	=>	__("Pick a background color for hover state.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"hover_background_type",
									"value"		=>	array( "custom-hover-color" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"				=>	"dropdown",
								"class"				=>	"",
								"heading"			=>	__("Border type on hover state:", "hgrextender"),
								"param_name"		=>	"hover_border_type",
								"value"				=>	array(
									__( 'None', 'hgrextender' ) 		=> 'none',
									__( 'Select color', 'hgrextender' )	=> 'custom-hover-border',
								),
								"save_always" 		=>	true,
								"description"		=>	__("Select border type in hover state.", "hgrextender"),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Border width on hover state:", "hgrextender"),
								"param_name"	=>	"hover_border_width",
								"value"			=>	2,
								"min"			=>	1,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"hover_border_type",
									"value"		=>	array( "custom-hover-border" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Border color on hover state:", "hgrextender"),
								"param_name"	=>	"hover_border_color",
								"value"			=>	"#222222",
								"description"	=>	__("Pick a border color for hover state box.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"hover_border_type",
									"value"		=>	array( "custom-hover-border" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Box border roundness:", "hgrextender"),
								"param_name"	=>	"ib_border_roundness",
								"value"			=>	0,
								"min"			=>	0,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels, example: 0 for square, or 5 for rounded corners.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								 "type"			=>	"dropdown",
								 "class"		=>	"",
								 "heading"		=>	__("Link type:", "hgrextender"),
								 "param_name"	=>	"custom_link",
								 "value"		=>	array(
									__( 'No link', 'hgrextender' ) 					=> '#',
									__( 'Add custom link to box', 'hgrextender' )	=> '1',
								),
								"save_always" 	=>	true,
								"description"	=>	__("You can add / remove custom link", "hgrextender"),
							),
							array(
								 "type"			=>	"vc_link",
								 "class"		=>	"",
								 "heading"		=>	__("Link settings:", "hgrextender"),
								 "param_name"	=>	"iconbox_link",
								 "value"			=>	"",
								 "description"	=>	__("You can add or remove the existing link from here.", "hgrextender"),
								 "dependency"	=>	array(
									"element"	=>	"custom_link",
									"value"		=>	array( "1" ),
								),
								"save_always" 	=>	true,
							),
							array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Extra class:", "hgrextender"),
								 "param_name"	=>	"ib_extra_class",
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
	new HGR_VC_ICONBOX;
}