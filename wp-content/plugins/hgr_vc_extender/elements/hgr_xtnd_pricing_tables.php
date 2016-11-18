<?php
/*
* Add-on Name: Pricing Tables
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Author: Eugen Petcu
*/
if(!class_exists('HGR_VC_PRICINGTABLES')) {
	class HGR_VC_PRICINGTABLES {
		var $team_nav_color;
		var $team_nav_min_height;

		function __construct() {
			add_action('admin_init', array($this, 'add_pricingtable'));
			
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
		function add_pricingtable() {
			if(function_exists('vc_map')) {
				/*
					Parent element
				*/
				vc_map(
					array(
					   "name"						=>	__("Pricing Tables", "hgrextender"),
					   "base"						=>	"hgr_pricing_tables",
					   "class"						=>	"",
					   "icon"						=>	"hgr_pricing_tables",
					   "category"					=>	__("HighGrade Extender", "hgrextender"),
					   "as_parent"					=>	array( "only" => "hgr_pricing_table" ),
					   "description"				=>	__("Pricing Tables block", "hgrextender"),
					   "content_element"			=>	true,
					   "show_settings_on_create"	=>	true,
					   "params"						=>	array(
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Pricing table header text color:", "hgrextender"),
								"param_name"		=>	"pt_header_text_color",
								"value"				=>	"#7e7e7e",
								"dependency"		=>	array(
									"not_empty"		=>	true
								),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Pricing table body text color:", "hgrextender"),
								"param_name"		=>	"pt_body_text_color",
								"value"				=>	"#7e7e7e",
								"dependency"		=>	array(
									"not_empty"		=>	true
								),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"textfield",
								"class"				=>	"",
								"heading"			=>	__("Extra class", "hgrextender"),
								"param_name"		=>	"extra_class",
								"value"				=>	"",
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"heading",
								"sub_heading"		=>	"This is a global setting page for the whole \"Pricing Tables\" block. Add some \"Tables\" in the container row to make it complete.",
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
					   "name"					=>	__("Pricing Table", "hgrextender"),
					   "holder"				=>	"div",
					   "base"					=>	"hgr_pricing_table",
					   "class"					=>	"",
					   "icon"					=>	"",
					   "content_element"		=>	true,
					   "as_child"				=>	array( "only" => "hgr_pricing_tables" ),
					   "params"					=>	array(
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Package name", "hgrextender"),
								"param_name"	=>	"package_name",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Recommended package", "hgrextender"),
								"param_name"	=>	"recommended_package",
								"value"			=>	array(
									__( 'No', 'hgrextender' )	=> 'false',
									__( 'Yes', 'hgrextender' )	=> 'true',
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Package short text", "hgrextender"),
								"param_name"	=>	"package_short_text",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Package price", "hgrextender"),
								"param_name"	=>	"package_price",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Cost is per:", "hgrextender"),
								"param_name"	=>	"cost_is_per",
								"value"			=>	array(
									__( 'Day', 'hgrextender' )		=> 'day',
									__( 'Week', 'hgrextender' )		=> 'week',
									__( 'Month', 'hgrextender' )	=> 'mo',
									__( 'Year', 'hgrextender' )		=> 'year',
									__( 'Custom', 'hgrextender' )	=> 'custom',
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Custom cost per:", "hgrextender"),
								"param_name"	=>	"custom_per_cost",
								"value"			=>	"item",
								"description"	=>	__("Set cost per item, package etc.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"cost_is_per",
									"value"		=>	array( "custom" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Currency:", "hgrextender"),
								"param_name"	=>	"pt_currency",
								"value"			=>	array(
									__( 'Dollar', 'hgrextender' )	=> '$',
									__( 'Euro', 'hgrextender' )		=> '&euro;',
									__( 'Custom', 'hgrextender' )	=> 'custom',
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Custom currency", "hgrextender"),
								"param_name"	=>	"custom_currency",
								"value"			=>	"",
								"dependency"	=>	array(
									"element"	=>	"pt_currency",
									"value"		=>	array( "custom" ),
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Price color", "hgrextender"),
								"param_name"	=>	"price_color",
								"value"			=>	"#fff",
								"description"	=>	__("If empty, white will be used", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Header background color", "hgrextender"),
								"param_name"	=>	"header_color",
								"value"			=>	"#dff0d8",
								"description"	=>	__("If empty, a default color will be used", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Header background second color", "hgrextender"),
								"param_name"	=>	"header_sec_color",
								"value"			=>	"#eef4ea",
								"description"	=>	__("If empty, a default color will be used", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Second background color", "hgrextender"),
								"param_name"	=>	"body_bg_color",
								"value"			=>	"",
								"description"	=>	__("This is background color for price area. If empty, white will be used", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Package content background color", "hgrextender"),
								"param_name"	=>	"package_bg_color",
								"value"			=>	"",
								"description"	=>	__("This is background color for package content area. If empty, white will be used", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textarea_html",
								"class"			=>	"",
								"heading"		=>	__("Table body content", "hgrextender"),
								"param_name"	=>	"content",
								"value"			=>	"",
								"description"	=>	__("Add a unordered list (ul) with package elements", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Buy button text", "hgrextender"),
								"param_name"	=>	"buy_btn_text",
								"value"			=>	"",
								"description"	=>	__("Buy Now! or Start Now! or whatever you want... ", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button action URL", "hgrextender"),
								"param_name"	=>	"btn_url",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Buy button position", "hgrextender"),
								"param_name"	=>	"buy_btn_position",
								"value"			=>	array(
									__( 'In header', 'hgrextender' )	=> 'header',
									__( 'In footer', 'hgrextender' )	=> 'footer',
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Buy button color", "hgrextender"),
								"param_name"	=>	"buy_btn_color",
								"value"			=>	"",
								"description"	=>	__("If empty, a transparent backgroung button will be rendered.", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Buy button border color", "hgrextender"),
								"param_name"	=>	"buy_btn_border_color",
								"value"			=>	"",
								"description"	=>	__("If empty, no border will be rendered", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Button border thickness", "hgrextender"),
								"param_name"	=>	"buy_btn_border_width",
								"value"			=>	"",
								"min"			=>	1,
								"max"			=>	10,
								"suffix"		=>	"px",
								"description"	=>	__("Thickness of the border (1-10).", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Button roundness", "hgrextender"),
								"param_name"	=>	"buy_btn_border_roundness",
								"value"			=>	'',
								"min"			=>	1,
								"max"			=>	6,
								"suffix"		=>	"px",
								"description"	=>	__("Button corners roundness (1-6).", "hgrextender"),
								"dependency"	=>	array(
									"element"		=>	"buy_btn_border_width",
									"not_empty"	=>	true
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Button size", "hgrextender"),
								"param_name"	=>	"buy_btn_size",
								"value"			=>	array(
									__( 'Default', 'hgrextender' )		=> 'default-size',
									__( 'Large', 'hgrextender' )		=> 'btn-lg',
									__( 'Small', 'hgrextender' )		=> 'btn-sm',
									__( 'Extra small', 'hgrextender' )	=> 'btn-xs',
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Table side margins (left & right)", "hgrextender"),
								"param_name"	=>	"table_margins",
								"description"	=>	__("Add a margin to left and right of the table, in pixles", "hgrextender"),
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Table border thickness", "hgrextender"),
								"param_name"	=>	"table_border_thickness",
								"description"	=>	__("Add a border the table, in pixles", "hgrextender"),
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Table border color", "hgrextender"),
								"param_name"	=>	"table_border_color",
								"value"			=>	"",
								"dependency"	=>	array(
									"element"	=>	"table_border_thickness",
									"not_empty"	=>	true
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Table extra class", "hgrextender"),
								"param_name"	=>	"table_extra_class",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
					   )
					) 
				);
			}
		}
	}
	new HGR_VC_PRICINGTABLES;
}