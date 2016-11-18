<?php
/*
* Add-on Name: Zoom Box
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Add-on Author: Bogdan Costescu
*/
if(!class_exists('HGR_VC_ZOOMBOX')) {
	class HGR_VC_ZOOMBOX {

		function __construct() {
			add_action('admin_init', array($this, 'hgr_zoombox_init'));
			
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
		function hgr_zoombox_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
						"name"			=>	__("HGR ZoomBox", "hgrextender"),
						"base"			=>	"hgr_zoom_box",
						"class"			=>	"",
						"icon"			=>	"hgr_zoom_box",
						"category"		=>	__("HighGrade Extender", "hgrextender"),
						"description"	=>	__("ZoomBox - two sided box", "hgrextender"),
						"params"		=>	array(
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Display icon:","hgrextender"),
								"param_name"	=>	"icon_type",
								"value"			=>	array(
									__( 'Font Icon Browser', 'hgrextender' )	=> 'selector',
									__( 'Custom Image Icon', 'hgrextender' )	=> 'custom-icon',
									__( 'None', 'hgrextender' ) 				=> 'none',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Select icon source.", "hgrextender")
							),
							array(
								"type"			=>	"icon_browser",
								"class"			=>	"",
								"heading"		=>	__("Select Icon:","hgrextender"),
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
								"heading"		=>	__("Icon Size:", "hgrextender"),
								"param_name"	=>	"icon_size",
								"value"			=>	32,
								"min"			=>	12,
								"max"			=>	72,
								"suffix"		=>	"px",
								"description"	=>	__("Set the icon size.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"icon_type",
									"value"		=>	array("selector"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Icon Color:", "hgrextender"),
								"param_name"	=>	"icon_color",
								"value"			=>	"#222222",
								"description"	=>	__("Pick a color for your icon.", "hgrextender"),
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
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Front Title text:", "hgrextender"),
								"param_name"	=>	"front_title",
								"value"			=>	"Fast customization",
								"description"	=>	__("Title for the front view.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Front Title color:", "hgrextender"),
								"param_name"	=>	"front_title_color",
								"value"			=>	"#222222",
								"description"	=>	__("Color of front title text.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Front Description text:","hgrextender"),
								 "param_name"	=>	"front_desc",
								 "value"		=>	"Using the visual editor has never been easier.",
								 "description"	=>	__("Insert front description here.", "hgrextender"),
								 "save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Front Description color:", "hgrextender"),
								"param_name"	=>	"front_desc_color",
								"value"			=>	"#8d8d8d",
								"description"	=>	__("Color of front description text.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Front Background type:", "hgrextender"),
								"param_name"	=>	"front_background_type",
								"value"			=>	array(
									__( 'Custom settings', 'hgrextender' )	=> 'custom-front-background',
									__( 'None', 'hgrextender' )				=> 'none',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Select background type for front panel.","hgrextender"),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Front Background color:", "hgrextender"),
								"param_name"	=>	"front_background_color",
								"value"			=>	"#ffffff",
								"description"	=>	__("Pick a background color for front panel.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"front_background_type",
									"value"		=>	array("custom-front-background"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Front Background opacity:", "hgrextender"),
								"param_name"	=>	"front_background_opacity",
								"value"			=>	1,
								"min"			=>	0.1,
								"max"			=>	1,
								"description"	=>	__("Front panel background opacity. Min value 0.1, max value 1.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"front_background_type",
									"value"		=>	array("custom-front-background"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Front Border type:", "hgrextender"),
								"param_name"	=>	"front_border_type",
								"value"			=>	array(
									__( 'None', 'hgrextender' )				=> 'none',
									__( 'Custom settings', 'hgrextender' )	=> 'custom-front-border',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Select border type for front panel.", "hgrextender"),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Front Border width:", "hgrextender"),
								"param_name"	=>	"front_border_width",
								"value"			=>	2,
								"min"			=>	1,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"		=>	"front_border_type",
									"value"			=>	array("custom-front-border"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Front Border color:", "hgrextender"),
								"param_name"	=>	"front_border_color",
								"value"			=>	"#222222",
								"description"	=>	__("Pick a border color for front panel.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"front_border_type",
									"value"		=>	array("custom-front-border"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Zoom Panel Title text:", "hgrextender"),
								"param_name"	=>	"zoom_title",
								"value"			=>	"Unlimited options",
								"description"	=>	__("Insert zoom panel title text here.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Zoom Panel Title color:", "hgrextender"),
								"param_name"	=>	"zoom_title_color",
								"value"			=>	"#222222",
								"description"	=>	__("Color of zoom panel title text.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Zoom Panel Description text:", "hgrextender"),
								 "param_name"	=>	"zoom_desc",
								 "value"		=>	"Extensive editing options, no coding required.",
								 "description"	=>	__("Insert zoom panel description here.", "hgrextender"),
								 "save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Zoom Panel Description color:", "hgrextender"),
								"param_name"	=>	"zoom_desc_color",
								"value"			=>	"#8d8d8d",
								"description"	=>	__("Color of zoom panel description text.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Zoom Panel Background type:", "hgrextender"),
								"param_name"	=>	"zoom_background_type",
								"value"			=>	array(
									__( 'Select color', 'hgrextender' )	=> 'custom-zoom-color',
									__( 'None', 'hgrextender' )			=> 'none',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Select background type for zoom panel.", "hgrextender"),
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Zoom Panel Background color:", "hgrextender"),
								"param_name"	=>	"zoom_background_color",
								"value"			=>	"#ffffff",
								"description"	=>	__("Pick a background color for zoom panel.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"zoom_background_type",
									"value"		=>	array("custom-zoom-color"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Zoom Panel Border type:", "hgrextender"),
								"param_name"	=>	"zoom_border_type",
								"value"			=>	array(
									__( 'None', 'hgrextender' )				=> 'none',
									__( 'Custom settings', 'hgrextender' )	=> 'custom-zoom-border',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Select border type for zoom panel.", "hgrextender"),
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Zoom Panel Border width:", "hgrextender"),
								"param_name"	=>	"zoom_border_width",
								"value"			=>	2,
								"min"			=>	1,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Enter value in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"zoom_border_type",
									"value"		=>	array("custom-zoom-border"),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Zoom Panel Border color:", "hgrextender"),
								"param_name"	=>	"zoom_border_color",
								"value"			=>	"#222222",
								"description"	=>	__("Pick a border color for zoom panel.", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"zoom_border_type",
										"value"			=>	array("custom-zoom-border"),
									),						
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Box Border Roundness:", "hgrextender"),
								"param_name"	=>	"zb_border_roundness",
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
								"heading"		=>	__("Link","hgrextender"),
								"param_name"	=>	"custom_link",
								"value"			=>	array(
									__( 'No Link', 'hgrextender' )					=> 'no-link',
									__( 'Add custom link to box', 'hgrextender' )	=> 'set-link',
								),
								"save_always" 	=>	true,
								"description"	=>	__("You can add/remove custom link.", "hgrextender"),
							),
							array(
								 "type"			=>	"vc_link",
								 "class"		=>	"",
								 "heading"		=>	__("Box Link:","hgrextender"),
								 "param_name"	=>	"zoombox_link",
								 "value"		=>	"",
								 "description"	=>	__("You can add or remove the existing link from here.", "hgrextender"),
								 "dependency"	=>	array(
								 	"element"	=>	"custom_link",
									"value"		=>	array( "set-link" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Extra class","hgrextender"),
								"param_name"	=>	"zb_extra_class",
								"value"			=>	"",
								"description"	=>	__("Add extra class name. You can use this class for your customizations.", "hgrextender"),
								"save_always" 	=>	true,
							),
							
						),
					)
				);
			}
		}
	}
	new HGR_VC_ZOOMBOX;
}