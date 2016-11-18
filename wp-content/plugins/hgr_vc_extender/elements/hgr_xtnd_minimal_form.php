<?php
/*
* Add-on Name: Minimal Form
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.1
* Add-on Author: Bogdan COSTESCU
*/
if(!class_exists('HGR_VC_MINIMALFORM')) {
	class HGR_VC_MINIMALFORM {
		
		function __construct() {
		add_action('admin_init', array($this, 'hgr_minimalform_init'));
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
		function hgr_minimalform_init() {
			if(function_exists('vc_map')) {
				/*
					parent element
				*/
				vc_map(
					array(
					   "name"						=>	__("HGR MinimalForm", "hgrextender"),
					   "base"						=>	"hgr_minimal_form",
					   "class"						=>	"",
					   "icon"						=>	"hgr_minimal_form",
					   "category"					=>	__("HighGrade Extender", "hgrextender"),
					   "as_parent"					=>	array("only" =>	"hgr_minimal_input"),
					   "description"				=>	__("Minimal Form with advanced settings", "hgrextender"),
					   "content_element"			=>	true,
					   "show_settings_on_create"	=>	true,
					   "params"					=>	array(
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Form size settings:", "hgrextender"),
								"param_name"	=>	"form_size",
								"value"			=>	array(
										"Large"				=>	"large",
										"Medium"			=>	"medium",
										"Small"			 	=>	"small",
									),
								"description"	=>	__("Choose from our 3 preset values.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Form style settings:", "hgrextender"),
								"param_name"	=>	"form_style",
								"value"			=>	array(
										"Standard"				=>	"standard",
										"Advanced"				=>	"advanced",
									),
								"description"	=>	__("Choose customization settings.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Label text size:", "hgrextender"),
								"param_name"	=>	"label_text_size",
								"value"			=>	'',
								"min"			=>	8,
								"max"			=>	80,
								"suffix"		=>	"px",
								"description"	=>	__("Set label text size in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Label text color:", "hgrextender"),
								"param_name"	=>	"label_text_color",
								"value"			=>	"",
								"description"	=>	__("Set label text color.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Input text color:", "hgrextender"),
								"param_name"	=>	"input_text_color",
								"value"			=>	"",
								"description"	=>	__("Set input text color.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" )
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Next icon color:", "hgrextender"),
								"param_name"	=>	"next_icon_color",
								"value"			=>	"",
								"description"	=>	__("Set next icon color.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" ),
								),
								"save_always" 	=>	true,
							),
							array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Confirmation text:","hgrextender"),
								 "param_name"	=>	"confirmation_text",
								 "value"		=>	"Form has been submitted. Thank you for your time!",
								 "description"	=>	__("Thank you message after the form is submitted.","hgrextender"),
								 "save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Confirmation text size:", "hgrextender"),
								"param_name"	=>	"confirmation_text_size",
								"value"			=>	'',
								"min"			=>	8,
								"max"			=>	80,
								"suffix"		=>	"px",
								"description"	=>	__("Set confirmation text size in pixels.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Confirmation text color:", "hgrextender"),
								"param_name"	=>	"confirmation_text_color",
								"value"			=>	"",
								"description"	=>	__("Set confirmation text color.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Steps text color:", "hgrextender"),
								"param_name"	=>	"steps_text_color",
								"value"			=>	"",
								"description"	=>	__("Set steps text color.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Form input background color:", "hgrextender"),
								"param_name"	=>	"form_input_color",
								"value"			=>	"",
								"description"	=>	__("Set color for input background.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Progress bar background color:", "hgrextender"),
								"param_name"	=>	"progress_bar_bgcolor",
								"value"			=>	"",
								"description"	=>	__("Set the background color for progress bar.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"form_style",
									"value"		=>	array( "advanced" ),
								),
								"save_always" 	=>	true,
							),
						),
					"js_view"	=>	"VcColumnView"
				));
				
				
				/*
					Child element
				*/
				vc_map(
					array(
					   "name"				=>	__("Input field", "hgrextender"),
					   "holder"			=>	"div",
					   "base"				=>	"hgr_minimal_input",
					   "class"				=>	"",
					   "icon"				=>	"",
					   "content_element"	=>	true,
					   "as_child"			=>	array("only" =>	"hgr_minimal_form"),
					   "params"			=>	array(
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Label text:", "hgrextender"),
								"param_name"	=>	"label_text",
								"admin_label" 	=> 	true,
								"value"			=>	"",
								"description"	=>	__("Set a label text (eg. First name, Address, Telephone).", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Input type","hgrextender"),
								"param_name"	=>	"input_type",
								"value"			=>	array(
										"Text"		=>	"text",
										"E-mail"	=>	"e-mail",
										"Telephone"	=>	"telephone",
									),
								"description"	=>	__("Select input type. This will verify submitted data.", "hgrextender"),
								"save_always" 	=>	true,
							),
					   )
					) 
				);
			}
		}
	}
	new HGR_VC_MINIMALFORM;
}