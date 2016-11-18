<?php
/*
* Add-on Name: HGR Twitter Feed
* Add-on URI: http://highgradelab.com/plugins/highgrade-extender/
* Since: 1.0
* Author: Eugen Petcu
* Based on: https://github.com/J7mbo/twitter-api-php/wiki/Twitter-API-PHP-Wiki
*/
if(!class_exists('HGR_VC_TWITTERFEED')) {
	class HGR_VC_TWITTERFEED {
		
		function __construct() {
			add_action('admin_init', array($this, 'hgr_twitfeed_init'));
		}
		
		/*
			Visual Composer mapping function
			Public API
			Refference:	http://kb.wpbakery.com/index.php?title=Vc_map
			Example:		http://kb.wpbakery.com/index.php?title=Visual_Composer_tutorial
		*/
		function hgr_twitfeed_init() {
			if(function_exists('vc_map')) {
				vc_map(
					array(
					   "name"				=>	__("HGR Twitter Feed", "hgrextender"),
					   "holder"			=>	"div",
					   "base"				=>	"hgr_twitterfeed",
					   "class"				=>	"",
					   "icon"				=>	"hgr_twitterfeed",
					   "category"			=>	__("HighGrade Extender", "hgrextender"),
					   "description"		=>	__("Your latest tweets", "hgrextender"),
					   "content_element"	=>	true,
					   "params"			=>	array(
							array(
								"type"			=>	"heading",
								"sub_heading"	=>	'Go to the <a href="https://dev.twitter.com/apps" target="_blank">My applications page</a> on the Twitter website to set up your website as a new Twitter "application". You may need to log-in using your Twitter user name and password.',
								"param_name"	=>	"notification",
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Your Twitter UserName", "hgrextender"),
								"param_name"	=>	"hgr_twitter_username",
								"value"			=>	"",
								"description"	=>	__('Your twitter username', "hgrextender"),			
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Username color", "hgrextender"),
								"param_name"	=>	"hgr_tweetfeed_username_color",
								"value"			=>	"#ffee00",							
							),
							array(
								"type"			=>	"colorpicker",
								"class"			=>	"",
								"heading"		=>	__("Text color", "hgrextender"),
								"param_name"	=>	"hgr_tweetfeed_text_color",
								"value"			=>	"#aaaaaa",							
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Twitter API Key", "hgrextender"),
								"param_name"	=>	"twitter_api_key",
								"value"			=>	"",
								"description"	=>	__('Get your API key and Tokens here: <a href="https://dev.twitter.com/apps" target="_blank">Twitter Applications Page</a>', "hgrextender"),			
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Twitter API Secret", "hgrextender"),
								"param_name"	=>	"twitter_api_secret",
								"value"			=>	"",
								"description"	=>	__('Keep the "API secret" a secret.', "hgrextender"),			
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Access token", "hgrextender"),
								"param_name"	=>	"twitter_acces_token",
								"value"			=>	"",
								"description"	=>	__('This access token can be used to make API requests on your own account\'s behalf. Do not share your access token secret with anyone. ', "hgrextender"),			
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Access token secret", "hgrextender"),
								"param_name"	=>	"twitter_acces_token_secret",
								"value"			=>	"",		
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Feed refresh time", "hgrextender"),
								"param_name"	=>	"hgr_twitfeed_refresh_time",
								"value"			=>	array(
										"2 minutes (default)"		=>	"120",
										"5 minutes"				=>	"300",
										"1 hour"					=>	"3600",
										"24 hours"					=>	"86400",
									),
								"description"	=>	__("How often should try to get the latest tweets from Twitter?", "hgrextender"),
							),
							array(
								"type"			=>	"dropdown",
								"class"			=>	"",
								"heading"		=>	__("Connection time out", "hgrextender"),
								"param_name"	=>	"hgr_twitfeed_cnct_timeout",
								"value"			=>	array(
										"3 seconds (default)"	=>	"3",
										"5 seconds"			=>	"5",
										"7 seconds"			=>	"7",
										"20 seconds"			=>	"20",
									),
								"description"	=>	__("When connecting to Twitter, how long should wait before timing out?", "hgrextender"),
							),
							array(
								"type"			=>	"textfield",
								"class"			=>	"",
								"heading"		=>	__("Extra class", "hgrextender"),
								"param_name"	=>	"extra_class",
								"value"			=>	"",
								"description"	=>	__("Extra CSS class for custom CSS", "hgrextender")	,
							),
					   )
					) 
				);
			}
		}
	}
	new HGR_VC_TWITTERFEED;
}
