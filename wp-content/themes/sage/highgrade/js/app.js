(function($){"use strict";if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){var animated=jQuery('.wpb_appear');jQuery('html').find(animated).each(function(){jQuery(this).removeClass('wpb_animate_when_almost_visible').removeClass('wpb_appear').removeClass('wpb_start_animation').removeClass('wpb_left-to-right').removeClass('wpb_right-to-left');});}$('a').removeAttr('title');if(window.devicePixelRatio>1&&retina_logo_url!==""){jQuery(".logo").attr("src",retina_logo_url);}if(custom_js!==""){var script="<script type=\"text/javascript\"> jQuery(document).ready(function($) {\"use strict\"; "+custom_js+" });</script>";jQuery('body').append(script);}jQuery('body').append(menu_js);jQuery('ul.nav li.dropdown, ul.nav li.dropdown-submenu').on("mouseenter",function(){jQuery(this).addClass('open');jQuery(this).find(' > .dropdown-menu').stop(true,true).delay(200).fadeIn();});jQuery('ul.nav li.dropdown, ul.nav li.dropdown-submenu').on("mouseleave",function(){jQuery(this).removeClass('open');jQuery(this).find(' > .dropdown-menu').stop(true,true).delay(200).fadeOut();});if(is_front_page==='true'){jQuery("ul.nav a[href*='#']").on("click",function(){if(/IEMobile/i.test(navigator.userAgent)){}else{jQuery("#hgr-navbar-collapse-1").removeClass("in");}if(location.pathname.replace(/^\//,'')==this.pathname.replace(/^\//,'')&&location.hostname==this.hostname){var $target=jQuery(this.hash);var $selector=$target.selector;$target=$target.length&&$target||jQuery('[name='+this.hash.slice(1)+']');if($target.length&&$selector.length>1){var targetOffset=$target.offset().top-jQuery(".bkaTopmenu").outerHeight(true);jQuery('html,body').animate({scrollTop:targetOffset},1500);return false;}}});jQuery("ul.nav a:not(ul.nav a[href*='#'])").on("click",function(){var currentItem=jQuery(this).attr('href');window.location=currentItem;return false;});}else{jQuery("#mainNavUl li a, .blog_widget ul li.menu-item a").on("click",function(){var currentItem=jQuery(this).attr('href');if(currentItem.charAt(0)=='#'&&currentItem.length>1){var target=home_url+currentItem;window.location=target;return false;}else{window.location=currentItem;return false;}});}var windowWidth=jQuery(window).width();var windowHeight=jQuery(window).height();jQuery('.hgrHeaderImage img').width(windowWidth).height(windowHeight);jQuery('.blogPosts').css("min-height",windowHeight);jQuery("#pagesContent").css("margin-top",windowHeight);jQuery(window).on("resize",function(){windowWidth=jQuery(window).width();windowHeight=jQuery(window).height();jQuery('.hgrHeaderImage img').width(windowWidth).height(windowHeight);jQuery('.blogPosts').css("min-height",windowHeight);});jQuery('.iconeffect').on("mouseenter",function(){jQuery(this).find(".icon").addClass("hoveredIcon");});jQuery('.iconeffect').on("mouseleave",function(){jQuery(this).find(".icon").removeClass("hoveredIcon");});jQuery(".readTheBlogBtn").click(function(){jQuery('html, body').animate({scrollTop:jQuery("#blogPosts").offset().top},1000);});jQuery(window).on("scroll",function(){if(jQuery(window).scrollTop()>jQuery(window).height()){jQuery('.back-to-top').fadeIn(500);}if(jQuery(window).scrollTop()<jQuery(window).height()){jQuery('.back-to-top').fadeOut(500);}});$('.back-to-top').on("click",function(event){event.preventDefault();$('html, body').velocity("scroll",{duration:1200,easing:[1,0,.03,1.01],mobileHA:true,queue:false});return false;});function splitColumns(){var winWidth=jQuery(window).width(),columnNumb=1;if(winWidth>1024){columnNumb=4;}else if(winWidth>900){columnNumb=3;}else if(winWidth>479){columnNumb=2;}else if(winWidth<479){columnNumb=1;}return columnNumb;}function setColumns(){var container=jQuery('#portfolio-items');var winWidth=jQuery(window).width(),columnNumb=splitColumns(),postWidth=Math.floor(winWidth/columnNumb);container.find('.portfolio-item').each(function(){jQuery(this).css({width:postWidth+'px'});});}function setProjects(){setColumns();container.isotope('layout');}if(jQuery('#portfolio-items').length!=0){var container=jQuery('#portfolio-items');container.isotope({animationEngine:'jquery',filter:"*",animationOptions:{duration:500,queue:false},layoutMode:'fitRows'});jQuery('#filters a').on("click",function(){jQuery('#filters li').removeClass('active');jQuery(this).parent().addClass('active');var selector=jQuery(this).attr('data-filter');container.isotope({filter:selector});setProjects();return false;});container.imagesLoaded(function(){setProjects();});jQuery(window).on('resize',function(){setProjects();});setProjects();}jQuery("#itemcontainer-controller").on("click",function(){parent.history.back();return false;});jQuery(window).on("resize",function(){jQuery('.parallax').each(function(){jQuery(this).css('background-position','center');});});if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){hgr_forMobile();}function hgr_forMobile(){jQuery('.parallax').each(function(){jQuery(this).css({"background-attachment":"scroll"});});}jQuery('.venoboxvid').venobox();jQuery('.woocommerce .products li.product').on("mouseenter",function(){jQuery(this).find(".add_to_cart_button").css("visibility","visible");});jQuery('.woocommerce .products li.product').on("mouseleave",function(){jQuery(this).find(".add_to_cart_button").css("visibility","hidden");});})(jQuery);