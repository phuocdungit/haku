<?php
/*
* Add-on Name: HGR MailChimp Collector
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Based on MailChimp API, version 1.3
* Since: 1.0
* Author: Eugen Petcu
*/
if(!class_exists('HGR_VC_MCHIMP_COLLECTOR')) {
	class HGR_VC_MCHIMP_COLLECTOR {
		
		function __construct() {
			add_action('admin_init', array($this, 'hgr_mchimp_collector_init'));
		}
		
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function hgr_mchimp_collector_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"				=>	__("HGR MailChimp Collector", "hgrextender"),
					   "holder"			=>	"div",
					   "base"				=>	"hgr_mailchimpcollector",
					   "class"				=>	"",
					   "icon"				=>	"hgr_mailchimpcollector",
					   "category"			=>	__("HighGrade Extender", "hgrextender"),
					   "description"		=>	__("Collect email addresses to your MailChimp list.", "hgrextender"),
					   "content_element"	=>	true,
					   "params"			=>	array(
							array(
								"type"				=>	"textfield",
								"class"				=>	"",
								"heading"			=>	__("MailChimp API Key", "hgrextender"),
								"param_name"		=>	"hgr_mc_apikey",
								"value"				=>	"",
								"description"		=>	__('Your MailChimp API Key. Grab an API Key from <a href="http://admin.mailchimp.com/account/api/" target="_blank">http://admin.mailchimp.com/account/api/</a>.', "hgrextender"),
								"save_always" 		=>	true,		
							),
							array(
								"type"				=>	"textfield",
								"class"				=>	"",
								"heading"			=>	__("MailChimp List ID", "hgrextender"),
								"param_name"		=>	"hgr_mc_listid",
								"value"				=>	"",
								"save_always" 		=>	true,	
							),
							array(
								"type"				=>	"checkbox",
								"heading"			=>	__("Enable anti-spam disclaimer", "hgrextender"),
								"param_name"		=>	"hgr_mc_enable_disclaimer",
								"description"		=>	__("If checked, 'We'll never spam or give this address away' will be displayed.", "hgrextender"),
								"value"				=>	array( esc_html__("Yes, please", "hgrextender") => "yes" ),
								"save_always" 		=>	true,
						    ),
							array(
								"type"				=>	"checkbox",
								"heading"			=>	__("Collect name too", "hgrextender"),
								"param_name"		=>	"hgr_mc_collect_name",
								"description"		=>	__("If checked, 'Name' will be required too.", "hgrextender"),
								"value"				=>	array( esc_html__("Yes, please", "hgrextender") => "yes" ),
								"save_always" 		=>	true,
						    ),
							array(
								"type"				=>	"checkbox",
								"heading"			=>	__("Collect last name too", "hgrextender"),
								"param_name"		=>	"hgr_mc_collect_lastname",
								"description"		=>	__("If checked, 'Lastname' will be required too.", "hgrextender"),
								"value"				=>	array(	__( "Yes, please", "hgrextender") => "yes" ),
								"save_always" 		=>	true,
						    ),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Background color of inputs", "hgrextender"),
								"param_name"		=>	"hgr_mc_collect_inputbgcolor",
								"value"				=>	"#333333",
								"description"		=>	__("Use the color picker.", "hgrextender"),	
								"save_always" 		=>	true,				
							),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Text color of inputs", "hgrextender"),
								"param_name"		=>	"hgr_mc_collect_inputstextcolor",
								"value"				=>	"#333333",
								"description"		=>	__("Color of the text inside the inputs", "hgrextender"),
								"save_always" 		=>	true,				
							),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Background color of button", "hgrextender"),
								"param_name"		=>	"hgr_mc_collect_btnbgcolor",
								"value"				=>	"#333333",
								"description"		=>	__("Use the color picker.", "hgrextender"),	
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("Text color of button", "hgrextender"),
								"param_name"		=>	"hgr_mc_collect_btntextcolor",
								"value"				=>	"#333333",
								"description"		=>	__("Color of the text inside the button", "hgrextender"),
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"colorpicker",
								"class"				=>	"",
								"heading"			=>	__("NO-SPAM & response text color", "hgrextender"),
								"param_name"		=>	"hgr_mc_collect_nstextcolor",
								"value"				=>	"#333333",
								"description"		=>	__("Color of the NO-SPAM text", "hgrextender"),	
								"save_always" 		=>	true,
							),
							array(
								"type"				=>	"textfield",
								"class"				=>	"",
								"heading"			=>	__("Extra class", "hgrextender"),
								"param_name"		=>	"extra_class",
								"value"				=>	"",
								"description"		=>	__("Extra CSS class for custom CSS", "hgrextender")	,
								"save_always" 		=>	true,
							),
					   )
					) 
				);
			}
		}
	}
	new HGR_VC_MCHIMP_COLLECTOR;
}