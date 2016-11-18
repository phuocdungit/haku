<?php
/*
* Add-on Name: Pie Chart
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Based on Rendro Easy Pie Chart: https://github.com/rendro/easy-pie-chart
* Since: 1.0
* Author: Eugen Petcu
*/
if(!class_exists('HGR_VC_PIE')) {
	class HGR_VC_PIE {

		function __construct() {
			add_action('admin_init', array($this, 'hgr_pie_init'));
		}
		
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/	
		function hgr_pie_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"				=>	__("HGR Pie Chart", "hgrextender"),
					   "holder"			=>	"div",
					   "base"				=>	"hgr_pie_chart",
					   "class"				=>	"",
					   "icon"				=>	"hgr_pie_chart",
					   "category"			=>	__("HighGrade Extender", "hgrextender"),
					   "description"		=>	__("Animated pie chart", "hgrextender"),
					   "front_enqueue_js"	=>	"",
					   "content_element"	=>	true,
					   "params"			=>	array(
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Pie title", "hgrextender"),
								"param_name"	=>	"pie_title",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textarea_html",
								"class"			=>	"",
								"heading"		=>	__("Pie text", "hgrextender"),
								"param_name"	=>	"pie_text",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								 "type"			=>	"vc_link",
								 "class"		=>	"",
								 "heading"		=>	__("Pie link to","hgrextender"),
								 "param_name"	=>	"gotourl",
								 "value"		=>	"",
								 "description"	=>	__("Link pie text to URL.", "hgrextender"),
								 "save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Pie size", "hgrextender"),
								"param_name"	=>	"pie_size",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Bar width", "hgrextender"),
								"param_name"	=>	"bar_width",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Pie percent", "hgrextender"),
								"param_name"	=>	"pie_percent",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Pie percent font size", "hgrextender"),
								"param_name"	=>	"hgr_pie_percent_size",
								"value"			=>	"30",
								"description"	=>	__("Enter value in pixels, example: 30", "hgrextender")	,
								"save_always" 	=>	true,		
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Back line color:", "hgrextender"),
								"param_name"	=>	"back_line_color",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Front line color:", "hgrextender"),
								"param_name"	=>	"front_line_color",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Scale color:", "hgrextender"),
								"param_name"	=>	"scale_color",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon to display:", "hgrextender"),
								"param_name"	=>	"icon_type",
								"value"			=>	array(
										__( 'Font Icon Browser', 'hgrextender' ) => 'selector',
										__( 'Custom Image Icon', 'hgrextender' ) => 'custom',
									),
								"save_always"	=> true,
							),
							array(
								"type"			=>	"icon_browser",
								"class"			=>	"",
								"heading"		=>	__("Select Icon", "hgrextender"),
								"param_name"	=>	"icon",
								"value"			=>	"",
								"dependency"	=>	array(
										"element"		=>	"icon_type",
										"value"			=>	array("selector"),
									),
								"save_always" 	=>	true,
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
										"value"			=>	array("custom"),
									),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Icon color:", "hgrextender"),
								"param_name"	=>	"icon_color",
								"value"			=>	"#808080",
								"dependency"	=>	array(
										"element"		=>	"icon_type",
										"value"			=>	array("selector"),
									),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Icon size", "hgrextender"),
								"param_name"	=>	"hgr_pie_icnsize",
								"value"			=>	"",
								"description"	=>	__("Enter value in pixels, example: 30", "hgrextender")	,
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Extra class", "hgrextender"),
								"param_name"	=>	"hgr_pie_extraclass",
								"value"			=>	"",
								"description"	=>	__("Enter a extra css class for this element, if you wish to override default css settings", "hgrextender"),
								"save_always" 	=>	true,
							),
					   )
					) 
				);
			}
		}
	}
	new HGR_VC_PIE;
}