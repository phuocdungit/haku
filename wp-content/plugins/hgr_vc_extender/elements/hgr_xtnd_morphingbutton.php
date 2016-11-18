<?php
/*
* Add-on Name: HGR Morphing Button
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.2
* Author: Eugen Petcu
*/
if(!class_exists('HGR_VC_MORPHINGBUTTON')) {
	class HGR_VC_MORPHINGBUTTON {

		function __construct() {
			add_action('admin_init', array($this, 'hgr_morphingbutton_init'));
			add_action('wp_enqueue_scripts',array($this,'set_hgr_morphbtn_js'));
		}
		
		/*
			Register and enqueue GMaps JS to header
		*/
		function set_hgr_morphbtn_js() {
			wp_register_script('hgr-vc-morphbtn-fixed-js', plugins_url('hgr_vc_extender/includes/js/uiMorphingButton_fixed.js'));
			wp_register_script('hgr-vc-morphbtn-inflow-js', plugins_url('hgr_vc_extender/includes/js/uiMorphingButton_inflow.js'));
			wp_enqueue_script('hgr-vc-classie');
			wp_enqueue_script('hgr-vc-morphbtn-fixed-js');
			wp_enqueue_script('hgr-vc-morphbtn-inflow-js');
		}
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function hgr_morphingbutton_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"				=>	__("HGR Morphing Button", "hgrextender"),
					   "holder"				=>	"div",
					   "base"				=>	"hgr_morphingbutton",
					   "class"				=>	"",
					   "icon"				=>	"hgr_morphingbutton",
					   "description"		=>	__("Morphing button", "hgrextender"),
					   "category"			=>	__("HighGrade Extender", "hgrextender"),
					   "content_element"	=>	true,
					   "params"	=>	array(
						   // Button type select
						   array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Select button type", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_type",
								"value"			=>	array(
									__("Info", "hgrextender")			=>	"hgr_morphbtn_info",
									__("Info overlay", "hgrextender")	=>	"hgr_morphbtn_infooverlay",
									__("Subscribe", "hgrextender")		=>	"hgr_morphbtn_subscribe",
									__("Share", "hgrextender")			=>	"hgr_morphbtn_share",
								),
								"save_always" 	=>	true,
							),
							// Button styleing
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Text on the button", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_text",
								"value"			=>	__("Test Text", "hgrextender"),	
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button text size (pixels)", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_text_size",
								"value"			=>	"14",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button text color", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_text_color",
								"value"			=>	"#ffffff",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button text color on hover", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_text_hover_color",
								"value"			=>	"#ffffff",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button color", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_color",
								"value"			=>	"#553445",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button color on hover", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_hover_color",
								"value"			=>	"#553445",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button width (pixels)", "hgrextender"),
								"description"	=>	__("Insert only numeric values",'hgrextender'),
								"param_name"	=>	"hgr_morphbtn_btn_width",
								"value"			=>	"100",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button height (pixels)", "hgrextender"),
								"description"	=>	__("Insert only numeric values",'hgrextender'),
								"param_name"	=>	"hgr_morphbtn_btn_height",
								"value"			=>	"60",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button border weight", "hgrextender"),
								"description"	=>	__("Insert only numeric values. Pixels will be used.",'hgrextender'),
								"param_name"	=>	"hgr_morphbtn_btn_border_weight",
								"value"			=>	"1",	
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button border color", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_border_color",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Button border color on hover", "hgrextender"),
								"param_name"	=>	"hgr_morphbtn_btn_border_hover_color",
								"value"			=>	"",
								"save_always" 	=>	true,
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Button roundness", "hgrextender"),
								"description"	=>	__("Insert only numeric values. Not available for some button types!",'hgrextender'),
								"param_name"	=>	"hgr_morphbtn_btn_roundness",
								"value"			=>	"4",	
								"save_always" 	=>	true,
							),
							
							
							
							// INFO TYPE SPECIFIC
								// ELEMENT BACKGROUND COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Element background color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_info_bg_color",
									"value"			=>	"#222222",
									"description"	=>	__("Background color of morphing element.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_info")
									),
									"save_always" 	=>	true,
								),
								// MORPH TITLE
								array(
									 "type"			=>	"textfield",
									 "class"		=>	"",
									 "heading"		=>	__("Element Title text:", "hgrextender"),
									 "param_name"	=>	"hgr_morphbtn_info_title",
									 "value"		=>	"Optimized for speed",
									 "description"	=>	__("Insert title text here.", "hgrextender"),
									 "dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_info")
									),
									"save_always" 	=>	true,
								),
								// MORPH TITLE COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Element Title color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_info_title_color",
									"value"			=>	"#222222",
									"description"	=>	__("Color of title text.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_info")
									),
									"save_always" 	=>	true,
								),
								// MORPH DESCRIPTION
								array(
									 "type"			=>	"textarea",
									 "class"		=>	"",
									 "heading"		=>	__("Element Description text:", "hgrextender"),
									 "param_name"	=>	"hgr_morphbtn_info_description",
									 "value"		=>	"Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.",
									 "description"	=>	__("Insert description text here.", "hgrextender"),
									 "dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_info")
									),
									"save_always" 	=>	true,
								),
								// MORPH DESCRIPTION COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Element Description color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_info_description_color",
									"value"			=>	"#222222",
									"description"	=>	__("Color of description text.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_info")
									),
									"save_always" 	=>	true,
								),
								// MORPH DESCRIPTION LINK: YES/NO
								array(
									 "type"			=>	"dropdown",
									 "class"		=>	"",
									 "heading"		=>	__("Link text settings:","hgrextender"),
									 "param_name"	=>	"hgr_morphbtn_info_custom_link",
									 "value"		=>	array(
										__("No Link", "hgrextender")				=>	"",
										__("Add custom link text", "hgrextender")	=> "custom-link-on",
									),
									 "description"	=>	__("You can add / remove custom link.", "hgrextender"),
									 "dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_info")
									),
									"save_always" 	=>	true,
								),
								// MORPH DESCRIPTION LINK URL
								array(
									 "type"			=>	"vc_link",
									 "class"		=>	"",
									 "heading"		=>	__("Link to:", "hgrextender"),
									 "param_name"	=>	"hgr_morphbtn_info_address_link",
									 "value"		=>	"",
									 "description"	=>	__("Set the address to link to.", "hgrextender"),
									 "dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_info_custom_link", 
										"not_empty"	=>	true, 
										"value"		=>	array( "custom-link-on" ),
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("Link Text:","hgrextender"),
									"param_name"	=>	"hgr_morphbtn_info_link_text",
									"value"			=>	"Read more",
									"description"	=>	__("Make sure the text clearly calls for a specific action.","hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_info_custom_link",
										"not_empty"	=>	true,
										"value"		=>	array( "custom-link-on" ),
									),
									"save_always" 	=>	true,
								),
								// MORPH DESCRIPTION LINK COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Link Text Color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_info_link_color",
									"value"			=>	"#222222",
									"description"	=>	__("Select the color for button text.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_info_custom_link",
										"not_empty"	=>	true,
										"value"		=>	array( "custom-link-on" ),
									),
									"save_always" 	=>	true,
								),
								
								
								
							// INFO OVERLAY TYPE SPECIFIC
								// ELEMENT BACKGROUND COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Overlay background color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_infooverlay_bgcolor",
									"value"			=>	"#E85657",
									"description"	=>	__("Background color of morphing element.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_infooverlay")
									),
									"save_always" 	=>	true,
								),
								// MORPH TITLE
								array(
									 "type"			=>	"textfield",
									 "class"		=>	"",
									 "heading"		=>	__("Element Title text:", "hgrextender"),
									 "param_name"	=>	"hgr_morphbtn_infooverlay_title",
									 "value"		=>	"Optimized for speed",
									 "description"	=>	__("Insert title text here.", "hgrextender"),
									 "dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_infooverlay")
									),
									"save_always" 	=>	true,
								),
								// MORPH TITLE COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Element Title color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_infooverlay_title_color",
									"value"			=>	"#222222",
									"description"	=>	__("Color of title text.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_infooverlay")
									),
									"save_always" 	=>	true,
								),
								// MORPH DESCRIPTION
								array(
									 "type"			=>	"textarea",
									 "class"		=>	"",
									 "heading"		=>	__("Element Description text:", "hgrextender"),
									 "param_name"	=>	"hgr_morphbtn_infooverlay_description",
									 "value"		=>	"Careful attention to detail and clean, well structured code ensures a smooth user experience for all your visitors.",
									 "description"	=>	__("Insert description text here.", "hgrextender"),
									 "dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_infooverlay")
									),
									"save_always" 	=>	true,
								),
								// MORPH DESCRIPTION COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Element Description color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_infooverlay_description_color",
									"value"			=>	"#222222",
									"description"	=>	__("Color of description text.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_infooverlay")
									),
									"save_always" 	=>	true,
								),
							
							
							
							// SUBSCRIBE TYPE SPECIFIC
								// ELEMENT BACKGROUND COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Subscribe background color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_bgcolor",
									"value"			=>	"#ffffff",
									"description"	=>	__("Background color of morphing element.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								// MORPH TITLE
								array(
									 "type"			=>	"textfield",
									 "class"		=>	"",
									 "heading"		=>	__("Subscribe label text:", "hgrextender"),
									 "param_name"	=>	"hgr_morphbtn_subscribe_label",
									 "value"		=>	"YOUR EMAIL ADDRESS",
									 "description"	=>	__("Insert label text here", "hgrextender"),
									 "dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								// MORPH TITLE COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Subscribe Label color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_label_color",
									"value"			=>	"#D5BBA4",
									"description"	=>	__("Color of label text.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								// MORPH TITLE
								array(
									 "type"			=>	"textfield",
									 "class"		=>	"",
									 "heading"		=>	__("Anti-SPAM text:", "hgrextender"),
									 "param_name"	=>	"hgr_morphbtn_subscribe_spam",
									 "value"		=>	"We promise, we won't send you any spam. Just love.",
									 "description"	=>	__("Insert anti-spam text here", "hgrextender"),
									 "dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								// MORPH TITLE COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Anti-SPAM text color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_spam_color",
									"value"			=>	"#D5BBA4",
									"description"	=>	__("Color of anti-SPAM text.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								// SUBSCRIBE BTN
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("Text on the Subscribe button", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_btn_text",
									"value"			=>	"SUBSCRIBE ME",		
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("Subscribe Button text size (pixels)", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_btn_text_size",
									"value"			=>	"14",
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Subscribe Button text color", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_btn_text_color",
									"value"			=>	"#ffffff",
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Subscribe Button text color on hover", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_btn_text_hover_color",
									"value"			=>	"#ffffff",
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Subscribe Button color", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_btn_color",
									"value"			=>	"#553445",
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Subscribe Button color on hover", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_btn_hover_color",
									"value"			=>	"#553445",
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("MailChimp API Key", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_subscribe_mc_apikey",
									"value"			=>	"",
									"description"	=>	__('Your MailChimp API Key. Grab an API Key from <a href="http://admin.mailchimp.com/account/api/" target="_blank">http://admin.mailchimp.com/account/api/</a>.', "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"				=>	"textfield",
									"class"				=>	"",
									"heading"			=>	__("MailChimp List ID", "hgrextender"),
									"param_name"		=>	"hgr_morphbtn_subscribe_mc_listid",
									"value"				=>	"",
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_subscribe")
									),
									"save_always" 	=>	true,
								),
							
							
							
							// SHARE TYPE SPECIFIC
								// ELEMENT BACKGROUND COLOR
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Share background color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_share_bgcolor",
									"value"			=>	"#ffffff",
									"description"	=>	__("Background color of morphing element.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_share")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Share links color:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_share_links_color",
									"value"			=>	"#ffffff",
									"description"	=>	__("Color of the sharing links.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_share")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"colorpicker",
									"class"			=>	"",
									"heading"		=>	__("Share links color on hover:", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_share_links_hover_color",
									"value"			=>	"#000000",
									"description"	=>	__("Color of the sharing links for hover state.", "hgrextender"),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_share")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	'checkbox',
									"heading"		=>	__("Share to Facebook?", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_share_fbk",
									"description"	=>	__("Check this to include Facebook sharing", "hgrextender"),
									"value"			=>	array( esc_html__("Yes, please", "hgrextender") => 'yes' ),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_share")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("Facebook App ID", "hgrextender"),
									"description"	=>	__("Insert your facebook App ID. Get it from <a href=\"https://developers.facebook.com/\" target=\"_blank\">Facebook Developers</a>",'hgrextender'),
									"param_name"	=>	"hgr_morphbtn_share_fbk_appid",
									"value"			=>	"",	
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_share_fbk",
										"value"		=>	array( "yes")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	'checkbox',
									"heading"		=>	__("Share to Twitter?", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_share_twtr",
									"description"	=>	__("Check this to include Twitter sharing", "hgrextender"),
									"value"			=>	array( esc_html__("Yes, please", "hgrextender") => 'yes' ),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_share")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	"textfield",
									"class"			=>	"",
									"heading"		=>	__("Share via @username", "hgrextender"),
									"description"	=>	__("Insert your Twitter username",'hgrextender'),
									"param_name"	=>	"hgr_morphbtn_share_twtr_via",
									"value"			=>	"",	
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_share_twtr",
										"value"		=>	array( "yes")
									),
									"save_always" 	=>	true,
								),
								array(
									"type"			=>	'checkbox',
									"heading"		=>	__("Share to Google Plus?", "hgrextender"),
									"param_name"	=>	"hgr_morphbtn_share_gglpls",
									"description"	=>	__("Check this to include Google Plus sharing", "hgrextender"),
									"value"			=>	array( esc_html__("Yes, please", "hgrextender") => 'yes' ),
									"dependency"	=>	array(
										"element"	=>	"hgr_morphbtn_btn_type",
										"value"		=>	array( "hgr_morphbtn_share")
									),
									"save_always" 	=>	true,
								),
							
							
							
							// VIDEO PLAYER TYPE SPECIFIC 
								// VIDEO TYPE SELECT
									array(
										"type"			=>	"dropdown",
										"class"			=>	"",
										"heading"		=>	__("What video do you want to display?", "hgrextender"),
										"param_name"	=>	"hgr_morphbtn_video_type",
										"value"			=>	array(
											"Youtube Video"	=>	"youtube_video",
											"Vimeo Video"	=>	"vimeo_video",
											"Self Hosted"	=>	"selfhosted_video",
										),
										"dependency"	=>	array(
											"element"	=>	"hgr_morphbtn_btn_type",
											"value"		=>	array( "hgr_morphbtn_videoplayer")
										),
										"save_always" 	=>	true,
									),
									array(
										"type"			=>	"textfield",
										"class"			=>	"",
										"heading"		=>	__("Video URL", "hgrextender"),
										"description"	=>	__("Insert video URL",'hgrextender'),
										"param_name"	=>	"hgr_morphbtn_video_url",
										"value"			=>	"",	
										"dependency"	=>	array(
											"element"	=>	"hgr_morphbtn_btn_type",
											"value"		=>	array( "hgr_morphbtn_videoplayer")
										),
										"save_always" 	=>	true,
									),
							
						   array(
								 "type"			=>	"textfield",
								 "class"		=>	"",
								 "heading"		=>	__("Extra class", "hgrextender"),
								 "param_name"	=>	"hgr_morphbtn_extra_class",
								 "value"		=>	"",
								 "description"	=>	__("Add extra class name. You can use this class for your customizations.", "hgrextender"),
								 "save_always" 	=>	true,
							),
						   
					   )
					) 
				);
			}
		}
	}
	new HGR_VC_MORPHINGBUTTON;
}