<?php
/*
* Add-on Name: Icon Text
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Add-on Author: Eugen Petcu
* Update & Bug fixes: Bogdan Costescu
*/
if(!class_exists('HGR_VC_ICONTEXT')) {
	class HGR_VC_ICONTEXT {

		function __construct() {
			add_action('admin_init', array($this, 'hgr_icontext_init'));
			
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
		function hgr_icontext_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"			=>	__("HGR Icon Text", "hgrextender"),
					   "base"			=>	"hgr_icontext",
					   "class"			=>	"",
					   "icon"			=>	"hgr_icon_text",
					   "category"		=>	__("HighGrade Extender", "hgrextender"),
					   "description"	=>	__("Title and paragraph with icon.", "hgrextender"),
					   "params" => array(
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Display icon:", "hgrextender"),
								"param_name"	=>	"icon_type",
								"value"			=>	array(
										__( 'Font Icon Browser', 'hgrextender' )	=> 'selector',
										__( 'Custom Image Icon', 'hgrextender' )	=> 'custom',
										//__( 'No icon', 'hgrextender' ) 				=> 'no-icon',
									),
								"save_always" => true,
								"description"	=>	__("Select icon source.", "hgrextender")
							),
							array(
								"type"			=>	"icon_browser",
								"class"			=>	"",
								"heading"		=>	__("Select Icon:", "hgrextender"),
								"param_name"	=>	"icon",
								"value"			=>	"",
								"description"	=>	__("Click on an icon to select it.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_type",
										"value"			=>	array( "selector" ),
									),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Icon Size:", "hgrextender"),
								"param_name"	=>	"icon_size",
								"value"			=>	32,
								"min"			=>	12,
								"max"			=>	72,
								"suffix"		=>	"px",
								"description"	=>	__("Set the icon size.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_type",
										"value"			=>	array("selector"),
									),
							),
							array(
								"type"			=>	"attach_image",
								"class"			=>	"",
								"heading"		=>	__("Upload Image Icon:", "hgrextender"),
								"param_name"	=>	"icon_img",
								"admin_label"	=>	true,
								"value"			=>	"",
								"description"	=>	__("Upload the custom image icon.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_type",
										"value"			=>	array( "custom" ),
									),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Image Width", "hgrextender"),
								"param_name"	=>	"img_width",
								"value"			=>	48,
								"min"			=>	16,
								"max"			=>	512,
								"suffix"		=>	"px",
								"description"	=>	__("Provide image width", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_type",
										"value"			=>	array("custom"),
									),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Icon Color:", "hgrextender"),
								"param_name"	=>	"icon_color",
								"value"			=>	"#222222",
								"description"	=>	__("Select prefered icon color.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_type",
										"value"			=>	array( "selector" ),
									),						
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon Background Settings:", "hgrextender"),
								"param_name"	=>	"icon_background_type",
								"value"			=>	array(
										__( 'None', 'hgrextender' ) 					=> 'none',
										__( 'Select background color', 'hgrextender' )	=> 'icon-background-select',
									),
								"save_always" 		=> true,
								"description"	=>	__("Select background settings for your icon.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_type",
										"value"			=>	array( "selector" ),
									),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Icon Background Color:", "hgrextender"),
								"param_name"	=>	"icon_background_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a background color for your icon.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_background_type",
										"value"			=>	array("icon-background-select"),
									),						
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Icon Background Size:", "hgrextender"),
								"param_name"	=>	"icon_background_size",
								"value"			=>	60,
								"min"			=>	20,
								"max"			=>	100,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_background_type",
										"value"			=>	array( "icon-background-select" ),
									),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Icon Background Roundness:", "hgrextender"),
								"param_name"	=>	"icon_background_roundness",
								"value"			=>	0,
								"min"			=>	0,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels, example: 0 for square, or 5 for rounded corners.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_background_type",
										"value"			=>	array( "icon-background-select" ),
									),
							),
							/* Since 1.0.3.4 */
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Icon Background border width:", "hgrextender"),
								"param_name"	=>	"icon_background_border_width",
								"value"			=>	0,
								"min"			=>	1,
								"max"			=>	6,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_background_type",
										"value"			=>	array( "icon-background-select" ),
									),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Icon Border Color:", "hgrextender"),
								"param_name"	=>	"icon_border_color",
								"value"			=>	"#333333",
								"description"	=>	__("Pick a border color for your icon background.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"icon_background_border_width",
										"value"			=>	array("1", "2", "3", "4", "5", "6"),
									),						
							),
							/* END Since 1.0.3.4 */
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon position:", "hgrextender"),
								"param_name"	=>	"contb_icon_position",
								"value"			=>	array(
										__( 'Top', 'hgrextender' ) 		=> 'contb-icon-top',
										__( 'Bottom', 'hgrextender' )	=> 'contb-icon-bottom',
										__( 'Left', 'hgrextender' )		=> 'contb-icon-left',
										__( 'Right', 'hgrextender' )	=> 'contb-icon-right',
									),
								"save_always" 	=> true,
								"description"	=>	__("Select icon position.", "hgrextender"),
								"dependency"	=> 	array(
										"element"		=>	"icon_type",
										"value"			=>	array( "selector","custom" ),
									),
							),
							array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Element Title text:", "hgrextender"),
								 "param_name"	=>	"content_title",
								 "value"		=>	"Optimized for speed",
								 "description"	=>	__("Insert title text here.", "hgrextender")
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Title color:", "hgrextender"),
								"param_name"	=>	"content_title_color",
								"value"			=>	"#222222",
								"description"	=>	__("Color of title text.", "hgrextender"),
							),
							array(
								 "type"			=>	"textarea",
								 "class"		=>	"",
								 "heading"		=>	__("Element Description text:", "hgrextender"),
								 "param_name"	=>	"content_description",
								 "value"		=>	"Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.",
								 "description"	=>	__("Insert description text here.", "hgrextender")
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Description color:", "hgrextender"),
								"param_name"	=>	"content_desc_color",
								"value"			=>	"#222222",
								"description"	=>	__("Color of description text.", "hgrextender"),
							),
							array(
								 "type"			=>	"dropdown",
								 "class"		=>	"",
								 "heading"		=>	__("Link text settings:","hgrextender"),
								 "param_name"	=>	"custom_link",
								 "value"		=>	array(
										__( 'No Link', 'hgrextender' ) 				=> '',
										__( 'Add custom link text', 'hgrextender' )	=> 'custom-link-on',
									),
								 "save_always" 	=> true,
								 "description"	=>	__("You can add / remove custom link.", "hgrextender"),
								 "dependency"	=>	array(
								 		"element"		=>	"contb_icon_position",
										"value"			=>	array( "contb-icon-top","contb-icon-left","contb-icon-right" ),
									),
							),
							array(
								 "type"			=>	"vc_link",
								 "class"		=>	"",
								 "heading"		=>	__("Link to:", "hgrextender"),
								 "param_name"	=>	"address_link",
								 "value"		=>	"",
								 "description"	=>	__("Set the address to link to.", "hgrextender"),
								 "dependency"	=>	array(
								 		"element"		=>	"custom_link", 
										"not_empty"	=>	true, 
										"value"			=>	array( "custom-link-on" ),
									),
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Link Text:","hgrextender"),
								"param_name"	=>	"link_text",
								"value"			=>	"Read more",
								"description"	=>	__("Make sure the text clearly calls for a specific action.","hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"custom_link",
										"not_empty"	=>	true,
										"value"			=>	array( "custom-link-on" ),
									),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Link Text Color:", "hgrextender"),
								"param_name"	=>	"link_color",
								"value"			=>	"#222222",
								"description"	=>	__("Select the color for button text.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"custom_link",
										"not_empty"	=>	true,
										"value"			=>	array( "custom-link-on" ),
									),
							),
							array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Extra class:", "hgrextender"),
								 "param_name"	=>	"contb_extra_class",
								 "value"		=>	"",
								 "description"	=>	__("Add extra class name. You can use this class for your customizations.", "hgrextender")
							),
						),
					)
				);
			}
		}
	}
	new HGR_VC_ICONTEXT;
}