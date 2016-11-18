<?php
/*
* Add-on Name: HGR Accordion
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Author: Eugen Petcu
* Update & Bug fixes: Bogdan Costescu
*/
if(!class_exists('HGR_VC_ACCORDION')) {
	class HGR_VC_ACCORDION {
		
		function __construct() {
			add_action('admin_init', array($this, 'add_accordion'));
		}
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function add_accordion() {
			if(function_exists('vc_map')) {
				/*
					Accordion: Parent element
				*/
				vc_map(
					array(
					   "name"						=>	__("HGR Accordion","hgrextender"),
					   "base"						=>	"hgr_accordion",
					   "class"						=>	"",
					   "icon"						=>	"hgr_accordion",
					   "category"					=>	__("HighGrade Extender","hgrextender"),
					   "as_parent"					=>	array( 'only'	=>	'hgr_accordion_element' ),
					   "description"				=>	__("Accordion block","hgrextender"),
					   "content_element"			=>	true,
					   "show_settings_on_create"	=>	true,
					   "params" => array(
							array(
								"type" 			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Panels header background color:", "hgrextender"),
								"param_name"	=>	"acc_panel_color",
								"value"			=>	"#fff",
								"dependency"	=>	array( "not_empty" => true ),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Panels body background color:", "hgrextender"),
								"param_name"	=>	"acc_panelbody_color",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Panels header text color:", "hgrextender"),
								"param_name"	=>	"acc_panelheader_textcolor",
								"value"			=>	"#000",
								"dependency"	=>	array( "not_empty"	=>	true ),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Panels body text color:", "hgrextender"),
								"param_name"	=>	"acc_panelbody_textcolor",
								"value"			=>	"#000",
								"dependency"	=>	array( "not_empty" => true ),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Panel header height","hgrextender"),
								"param_name"	=>	"acc_panel_header_height",
								"value"			=>	"30",
								"description"	=>	__("Panel header height in pixels","hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Panel header roundness","hgrextender"),
								"param_name"	=>	"acc_panel_header_roundness",
								"value"			=>	"",
								"description"	=>	__("Panel header roundness in pixels. Example: 4","hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Extra class","hgrextender"),
								"param_name"	=>	"extra_class",
								"value"			=>	"",
								"description"	=>	__("Optional extra CSS class","hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Unique ID for this accordion","hgrextender"),
								"param_name"	=>	"acc_unique_id",
								"value"			=>	'accid'.mt_rand(999, 9999999),
								"description"	=>	__("Unique ID for this accordion, useful for extra CSS or JS customnization. This is auto-generated or you can enter your own.","hgrextender"),
								"dependency"	=>	array( "not_empty" => true ),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"heading",
								"sub_heading"	=>	__("This is a global setting page for the whole \"Accordion\" block. Add some \"Accordion elements (tabs)\" in the container row to make it complete.", "hgrextender"),
								"param_name"	=>	"notification",
							),
						),
						"js_view" => 'VcColumnView'
					)
				);
				
				
				/*
					Accordion: Child element
				*/
				vc_map(
					array(
					   "name"				=>	__("Accordion element","hgrextender"),
					   "holder"			=>	"div",
					   "base"				=>	"hgr_accordion_element",
					   "class"				=>	"",
					   "icon"				=>	"",
					   "content_element"	=>	true,
					   "as_child"			=>	array( "only"	=>	"hgr_accordion" ),
					   "params"			=>	array(
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon type", "hgrextender"),
								"param_name"	=>	"hgr_accordion_icontype",
								"value"			=>	array(
										__( 'Font Icon Browser', 'hgrextender' ) 	=> 'selector',
										__( 'Custom Image Icon', 'hgrextender' )	=> 'custom',
									),
								"save_always" 	=> true,
								"description"	=>	__("Use an existing font icon or upload a custom image.", "hgrextender")
							),
							array(
								"type"			=>	"icon_browser",
								"class"			=>	"",
								"heading"		=>	__("Select Icon ","hgrextender"),
								"param_name"	=>	"hgr_accordion_icon",
								"value"			=>	"icon",
								"description"	=>	__("Click on an icon to select it.", "hgrextender"),
								"dependency"	=>	array(
									"element"		=>	"hgr_accordion_icontype",
									"value"			=>	array("selector")
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Icon color:", "hgrextender"),
								"description"	=>	__("Icon color","hgrextender"),
								"param_name"	=>	"acc_icon_color",
								"value"			=>	"#80c8ac",
								"dependency"	=>	array(
									"not_empty"	=>	true,
									"element"		=>	"hgr_accordion_icontype",
									"value"			=>	array( "selector" )
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Icon size", "hgrextender"),
								"param_name"	=>	"hgr_accordion_icnsize",
								"value"			=>	"",
								"description"	=>	__("Enter value in pixels, example: 30", "hgrextender"),
								"dependency"	=>	array(
									"element"		=>	"hgr_accordion_icontype",
									"value"			=>	array( "selector" )
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"attach_image",
								"class"			=>	"",
								"heading"		=>	__("Upload Image Icon:", "hgrextender"),
								"param_name"	=>	"hgr_accordion_img",
								"admin_label"	=>	true,
								"value"			=>	"",
								"description"	=>	__("Upload the custom image icon.", "hgrextender"),
								"dependency"	=>	array(
									"element"		=>	"hgr_accordion_icontype",
									"value"			=>	array( "custom" )
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Panel Title","hgrextender"),
								"param_name"	=>	"panel_title",
								"value"			=>	"Panel Title",
								"description"	=>	__("Provide a unique title for this panel","hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textarea_html",
								"class"			=>	"",
								"heading"		=>	__("Panel content","hgrextender"),
								"param_name"	=>	"content",
								"value"			=>	"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
								"description"	=>	__("Content to be visible when proper tab is selected","hgrextender"),
								"save_always" 	=>	true,
							),
					   )
					) 
				);
			}
		}
	}
	new HGR_VC_ACCORDION;
}