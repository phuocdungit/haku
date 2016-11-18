<?php
/*
* Add-on Name: Google Maps
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Add-on Author: Bogdan Costescu
*/

if(!class_exists('HGR_VC_GMAP')) {
	class HGR_VC_GMAP {
			
		function __construct() {
			add_action('admin_init', array($this, 'hgr_gmap_init'));
			add_action('wp_enqueue_scripts',array($this,'set_hgr_gmap_styles'));
			
			/*
				Param type "number"
			*/ 
			if ( function_exists('vc_add_shortcode_param')){
				vc_add_shortcode_param('number' , array('HGR_XTND', 'make_number_input' ) );
			}
		}
		
		/*
			Register and enqueue GMaps JS to header
		*/
		function set_hgr_gmap_styles() {
			wp_register_script('hgr_vc_script_gmapapi', 'https://maps.googleapis.com/maps/api/js?v=3.exp');
			wp_enqueue_script('hgr_vc_script_gmapapi');
		}

		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function hgr_gmap_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"				=>	__("HGR Google Map", "hgrextender"),
					   "base"				=>	"hgr_gmap",
					   "class"				=>	"",
					   "icon"				=>	"hgr_gmap",
					   "category"			=>	__("HighGrade Extender", "hgrextender"),
					   "description"		=>	__("Google Map","hgrextender"),
					   "params" => array(
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Map name:", "hgrextender"),
								"param_name"	=>	"gmap_name",
								"value"			=>	"Sydney",
								"description"	=>	__("*Insert map name here. Make sure this map name is unique.", "hgrextender"),
								"save_always"	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Latitude:", "hgrextender"),
								"param_name"	=>	"gmap_latitude",
								"value"			=>	"-33.8814454",
								"description"	=>	__("Insert latitude coordinate here.", "hgrextender"),
								"save_always"	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Longitude:", "hgrextender"),
								"param_name"	=>	"gmap_longitude",
								"value"			=>	"151.2226494",
								"description"	=>	__("Insert longitude coordinate here.", "hgrextender"),
								"save_always"	=>	true,
							),
							array(
								"type"			=>	"number",
								"class"			=>	"",
								"heading"		=>	__("Zoom Level:","hgrextender"),
								"param_name"	=>	"gmap_zoom",
								"value"			=>	18,
								"min"			=>	0,
								"max"			=>	20,
								"description"	=>	__("Zoom on location. Min value 0 (whole world), max value 20.", "hgrextender"),
								"save_always"	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Map Style:", "hgrextender"),
								"param_name"	=>	"gmap_style",
								"value"			=>	array(
										__( 'Google preset colors', 'hgrextender' )	=> 'gmap_style_normal',
										__( 'Greyscale', 'hgrextender' ) 			=> 'gmap_style_greyscale',
									),
								"description"	=>	__("Choose map style that suits your design.", "hgrextender"),
								"save_always"	=>	true,
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Marker Settings:", "hgrextender"),
								"param_name"	=>	"gmap_marker_settings",
								"value"			=>	array(
										__( 'Google default', 'hgrextender' )	=> 'gmap_marker_default',
										__( 'Plugin default', 'hgrextender' ) 	=> 'gmap_marker_plugin',
										__( 'Upload your own', 'hgrextender' ) 	=> 'gmap_marker_custom',
									),
								"description"	=>	__("Marker style settings.", "hgrextender"),
								"save_always"	=>	true,
							),
							array(
								"type"			=>	"attach_image",
								"class"			=>	"",
								"heading"		=>	__("Upload Marker Image:", "hgrextender"),
								"param_name"	=>	"marker_image",
								"value"			=>	"",
								"description"	=>	__("Upload marker custom image.", "hgrextender"),
								"dependency"	=>	array(
										"element"	=>	"gmap_marker_settings",
										"value"		=>	array( "gmap_marker_custom" ),
									),
								"save_always"	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Map Width:", "hgrextender"),
								"param_name"	=>	"gmap_width",
								"value"			=>	"640px",
								"description"	=>	__("Enter value in pixels. You can set also % values.", "hgrextender"),
								"save_always"	=>	true,
							),
							
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Map Height:", "hgrextender"),
								"param_name"	=>	"gmap_height",
								"value"			=>	"400px",
								"description"	=>	__("Enter value in pixels. You can set also % values.", "hgrextender"),
								"save_always"	=>	true,
							),
							array(
								"type"			=>	'checkbox',
								"heading"		=>	__("Disable zoom on mouse over scroll:", "hgrextender"),
								"param_name"	=>	"gmap_disablezoom",
								"description"	=>	__("If checked this will disable map zooming when scrolling over.", "hgrextender"),
								"value"			=>	array( esc_html__("Yes, please", "hgrextender") => 'yes' ),
								"save_always"	=>	true,
						    ),
							array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Extra class", "hgrextender"),
								 "param_name"	=>	"gmap_extra_class",
								 "value"		=>	"",
								 "description"	=>	__("Add extra class name. You can use this class for your customizations.", "hgrextender"),
								 "save_always"	=>	true,
							),
						),
					)
				);
			}
		}
	}
	new HGR_VC_GMAP;
}