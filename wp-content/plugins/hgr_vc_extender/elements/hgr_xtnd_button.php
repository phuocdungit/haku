<?php
/*
* Add-on Name: HGR Button
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Author: Eugen Petcu
*/
if(!class_exists('HGR_VC_BUTTON')) {
	class HGR_VC_BUTTON {

		function __construct() {
			add_action('admin_init', array($this, 'hgr_button_init'));
		}
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function hgr_button_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"				=>	__("HGR Button", "hgrextender"),
					   "holder"			=>	"div",
					   "base"				=>	"hgr_button",
					   "class"				=>	"",
					   "icon"				=>	"hgr_button",
					   "description"		=>	__("Very configurable button", "hgrextender"),
					   "category"			=>	__("HighGrade Extender", "hgrextender"),
					   "content_element"	=>	true,
					   "params"	=>	array(
						   array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Text on the button", "hgrextender"),
								"param_name"	=>	"hgr_buttontext",
								"value"			=>	__("Buy now!", "hgrextender"),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Text size (pixels)", "hgrextender"),
								"param_name"	=>	"hgr_buttontextsize",
								"value"			=>	"14",
								"save_always" 	=>	true,
							),
							array(
								 "type"			=>	"vc_link",
								 "class"		=>	"",
								 "heading"		=>	__("Button action URL","hgrextender"),
								 "param_name"	=>	"hgr_buttonurl",
								 "value"		=>	"",
								 "description"	=>	__("Set button link here.", "hgrextender"),
								 "save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button text color", "hgrextender"),
								"param_name"	=>	"hgr_buttontextcolor",
								"value"			=>	"#808080",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button text color on hover", "hgrextender"),
								"param_name"	=>	"hgr_buttontexthovercolor",
								"value"			=>	"#808080",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button color", "hgrextender"),
								"param_name"	=>	"hgr_buttoncolor",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button color on hover", "hgrextender"),
								"param_name"	=>	"hgr_buttoncolorhover",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button width", "hgrextender"),
								"description"	=>	__("Insert only numeric values",'hgrextender'),
								"param_name"	=>	"hgr_buttonwidth",
								"value"			=>	"100",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Button width units", "hgrextender"),
								"param_name"	=>	"hgr_buttonwidthunits",
								"value"			=>	array(	
									__( 'Pixels', 'hgrextender' )	=> 'px',
									__( 'Percent', 'hgrextender' )	=> '%',
									__( 'Ems', 'hgrextender' )		=> 'em',
								),
								"save_always" 	=> true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button height", "hgrextender"),
								"description"	=>	__("Insert only numeric values",'hgrextender'),
								"param_name"	=>	"hgr_buttonheight",
								"value"			=>	"60",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Button height units", "hgrextender"),
								"param_name"	=>	"hgr_buttonheightunits",
								"value"			=>	array(
									__( 'Pixels', 'hgrextender' ) 	=> 'px',
									__( 'Percent', 'hgrextender' )	=> '%',
									__( 'Ems', 'hgrextender' )		=> 'em',
								),
								"save_always" 	=> true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button border weight", "hgrextender"),
								"description"	=>	__("Insert only numeric values. Pixels will be used.",'hgrextender'),
								"param_name"	=>	"hgr_buttonborderweight",
								"value"			=>	"1",	
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button border color", "hgrextender"),
								"param_name"	=>	"hgr_buttonbodercolor",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button border color on hover", "hgrextender"),
								"param_name"	=>	"hgr_buttonbordercolorhover",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button roundness", "hgrextender"),
								"description"	=>	__("Insert only numeric values",'hgrextender'),
								"param_name"	=>	"hgr_buttonroundness",
								"value"			=>	"4",	
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon", "hgrextender"),
								"param_name"	=>	"hgr_hasicon",
								"value"			=>	array(
									__( 'No icon', 'hgrextender' ) 	=> 'noicon',
									__( 'Use icon', 'hgrextender' )	=> 'withicon',
								),
								"save_always" 	=> true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon position", "hgrextender"),
								"param_name"	=>	"hgr_iconposition",
								"value"			=>	array(
									__( 'Left', 'hgrextender' ) 	=> 'left',
									__( 'Right', 'hgrextender' )	=> 'right',
								),
								"save_always" 	=>	true,
								"dependency"	=>	array(
									"element"	=>	"hgr_hasicon",
									"value"		=>	array( "withicon")
								),
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon type", "hgrextender"),
								"param_name"	=>	"hgr_button_icontype",
								"value"			=>	array(
									__( 'Font Icon Browser', 'hgrextender' ) 	=> 'selector',
									__( 'Custom Image Icon', 'hgrextender' )	=> 'custom',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Use an existing font icon or upload a custom image.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"hgr_hasicon",
									"value"		=>	array( "withicon" )
								),
							),
							array(
								"type"			=>	"icon_browser",
								"class"			=>	"",
								"heading"		=>	__("Select Icon ","hgrextender"),
								"param_name"	=>	"hgr_button_icon",
								"value"			=>	"icon",
								"description"	=>	__("Click on an icon to select it.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"hgr_button_icontype",
									"value"		=>	array( "selector" )
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"attach_image",
								"class"			=>	"",
								"heading"		=>	__("Upload Image Icon:", "hgrextender"),
								"param_name"	=>	"hgr_button_img",
								"admin_label"	=>	true,
								"value"			=>	"",
								"description"	=>	__("Upload the custom image icon.", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"hgr_button_icontype",
									"value"		=>	array( "custom" )
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Icon animation", "hgrextender"),
								"param_name"	=>	"hgr_button_iconanimation",
								"value"			=>	array(
									__( 'No animation', 'hgrextender' ) 	=> 'noanimation',
									__( 'Spin', 'hgrextender' )				=> 'hgr_fa-spin',
									__( 'Rotate 90', 'hgrextender' )		=> 'hgr_fa-rotate-90',
									__( 'Rotate 180', 'hgrextender' )		=> 'hgr_fa-rotate-180',
									__( 'Rotate 270', 'hgrextender' )		=> 'hgr_fa-rotate-270',
									__( 'Flip horizontal', 'hgrextender' )	=> 'hgr_fa-flip-horizontal',
									__( 'Flip vertical', 'hgrextender' )	=> 'hgr_fa-flip-vertical',
								),
								"save_always" 	=>	true,
								"description"	=>	__("Does not apply to all icons!", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"hgr_hasicon",
									"value"		=>	array( "withicon" )
								),
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Animate icon on", "hgrextender"),
								"param_name"	=>	"hgr_button_iconanimationon",
								"value"			=>	array(
									__( 'Always', 'hgrextender' ) 	=> 'always',
									__( 'On hover', 'hgrextender' )	=> 'onhover',
								),
								"save_always" 	=> true,
								"description"	=>	__("Does not apply to all icons/animations!", "hgrextender"),
								"dependency"	=>	array(
										"element"		=>	"hgr_button_iconanimation",
										"value"		=>	array(
											"hgr_fa-spin",
											"hgr_fa-rotate-90",
											"hgr_fa-rotate-180",
											"hgr_fa-rotate-270",
											"hgr_fa-flip-horizontal",
											"hgr_fa-flip-vertical",
										)
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Icon size", "hgrextender"),
								"param_name"	=>	"hgr_button_iconsize",
								"value"			=>	"",
								"description"	=>	__("Enter value in pixels, example: 24", "hgrextender"),
								"dependency"	=>	array(
									"element"	=>	"hgr_hasicon",
									"value"		=>	array( "withicon" )
								),
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Extra class", "hgrextender"),
								"param_name"	=>	"hgr_button_extraclass",
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
	new HGR_VC_BUTTON;
}