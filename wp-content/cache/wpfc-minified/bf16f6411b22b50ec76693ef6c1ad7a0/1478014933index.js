// source --> //fujiya.com.vn/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=2.5.5 
/*!
 * WooCommerce Add to Cart JS
 */
jQuery(function(a){return"undefined"==typeof wc_add_to_cart_params?!1:void a(document).on("click",".add_to_cart_button",function(){var b=a(this);if(b.is(".ajax_add_to_cart")){if(!b.attr("data-product_id"))return!0;b.removeClass("added"),b.addClass("loading");var c={};return a.each(b.data(),function(a,b){c[a]=b}),a(document.body).trigger("adding_to_cart",[b,c]),a.post(wc_add_to_cart_params.wc_ajax_url.toString().replace("%%endpoint%%","add_to_cart"),c,function(c){if(c){var d=window.location.toString();if(d=d.replace("add-to-cart","added-to-cart"),c.error&&c.product_url)return void(window.location=c.product_url);if("yes"===wc_add_to_cart_params.cart_redirect_after_add)return void(window.location=wc_add_to_cart_params.cart_url);b.removeClass("loading");var e=c.fragments,f=c.cart_hash;e&&a.each(e,function(b){a(b).addClass("updating")}),a(".shop_table.cart, .updating, .cart_totals").fadeTo("400","0.6").block({message:null,overlayCSS:{opacity:.6}}),b.addClass("added"),wc_add_to_cart_params.is_cart||0!==b.parent().find(".added_to_cart").size()||b.after(' <a href="'+wc_add_to_cart_params.cart_url+'" class="added_to_cart wc-forward" title="'+wc_add_to_cart_params.i18n_view_cart+'">'+wc_add_to_cart_params.i18n_view_cart+"</a>"),e&&a.each(e,function(b,c){a(b).replaceWith(c)}),a(".widget_shopping_cart, .updating").stop(!0).css("opacity","1").unblock(),a(".shop_table.cart").load(d+" .shop_table.cart:eq(0) > *",function(){a(".shop_table.cart").stop(!0).css("opacity","1").unblock(),a(document.body).trigger("cart_page_refreshed")}),a(".cart_totals").load(d+" .cart_totals:eq(0) > *",function(){a(".cart_totals").stop(!0).css("opacity","1").unblock()}),a(document.body).trigger("added_to_cart",[e,f,b])}}),!1}return!0})});
// source --> http://fujiya.com.vn/wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cart.js?ver=4.11.2.1 
window.jQuery( document ).ready( function ( $ ) {
	$( 'body' ).on( 'adding_to_cart', function ( event, $button, data ) {
		$button && $button.hasClass( 'vc_gitem-link' ) && $button
			.addClass( 'vc-gitem-add-to-cart-loading-btn' )
			.parents( '.vc_grid-item-mini' )
			.addClass( 'vc-woocommerce-add-to-cart-loading' )
			.append( $( '<div class="vc_wc-load-add-to-loader-wrapper"><div class="vc_wc-load-add-to-loader"></div></div>' ) );
	} ).on( 'added_to_cart', function ( event, fragments, cart_hash, $button ) {
		if ( 'undefined' === typeof($button) ) {
			$button = $( '.vc-gitem-add-to-cart-loading-btn' );
		}
		$button && $button.hasClass( 'vc_gitem-link' ) && $button
			.removeClass( 'vc-gitem-add-to-cart-loading-btn' )
			.parents( '.vc_grid-item-mini' )
			.removeClass( 'vc-woocommerce-add-to-cart-loading' )
			.find( '.vc_wc-load-add-to-loader-wrapper' ).remove();
	} );
} );
// source --> http://fujiya.com.vn/wp-content/themes/sage-child/custom.js?ver=4.4.5 
/*********************************************************************************
 * @name: common functions
 * @description:  Call functions of website
 * @author: (c) App MEDIA VIET NAM (http://xgoon.com - contact@xgoon.com)
 * @version: 1.0
 *********************************************************************************/

/****************************
 ***** Global Namespace *****
 ****************************/
var App = App = App || {
    isLog: true,
    initTest: function () {

    }
};
/*************************************
 ***** Main functions start here *****
 *************************************/
jQuery(document).ready(function () {
    with (App) {
        buttonBook();
        formBook();
    }
    jQuery('input').click(function () {
        jQuery('input').removeClass('required');
    });
});
/******************************
 ***** Show error if have *****
 ******************************/
function log(msg) {
    if (!App.isLog)
        return false;
    if (typeof (console) != 'undefined') {
        console.log(msg);
    }
}

window.onerror = function (msg, url, linenumber) {
    if (typeof (console) != 'undefined') {
        console.log('Error message: ' + msg + '\nURL: ' + url + '\nLine Number: ' + linenumber);
    }
    return false;
};
/******************************
 ***** Functions built in *****
 ******************************/
App.browserName = function () {
    var Browser = navigator.userAgent;
    if (Browser.indexOf('MSIE') >= 0) {
        Browser = 'MSIE';
    } else if (Browser.indexOf('Firefox') >= 0) {
        Browser = 'Firefox';
    } else if (Browser.indexOf('Chrome') >= 0) {
        Browser = 'Chrome';
    } else if (Browser.indexOf('Safari') >= 0) {
        Browser = 'Safari';
    } else if (Browser.indexOf('Opera') >= 0) {
        Browser = 'Opera';
    } else {
        Browser = 'UNKNOWN';
    }
    return Browser;
};
App.buttonBook = function () {
    jQuery('.ws-title div').on('click', function () {
        var el = jQuery(this).find('a').attr('href');
        if (typeof el !== "undefined")
        {
            window.location.href = el;
        }
    });
    jQuery('.button_request').click(function ()
    {
        jQuery('.order_slide1').animate({
            opacity: 0,
            left: "50px",
        }, 500, function () {
            jQuery('.order_slide2').animate({
                opacity: 1,
                left: "0px",
            }, 500, function () {
                jQuery('.order_slide1').css({'z-index': -9999});
                jQuery('.order_slide2').css({'z-index': 9999});
            });

        });
    })
};
App.formBook = function () {
    var formBook = jQuery('#formBook');
    if (formBook.length > 0) {
        formBook.on('submit', (function (event) {
            event.preventDefault();
            var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,10})+)$/i);
            var isvalid = emailRegex.test(this['email'].value);
            if (this['name'].value == "") {
                jQuery(this['name']).addClass("required").focus();
                return false;
            } else if (this['phone'].value == "") {
                jQuery(this['phone']).addClass("required").focus();
                return false;
            } else if (!jQuery.isNumeric(this['phone'].value)) {
                jQuery(this['phone']).addClass("required").focus();
                return false;
            } else if (this['email'].value == "") {
                jQuery(this['email']).addClass("required").focus();
                return false;
            } else if (!isvalid) {
                jQuery(this['email']).addClass("required").focus();
                return false;
            }
            var datas = new FormData(this);

            jQuery.ajax({
                type: 'POST',
                url: '/wp-admin/admin-ajax.php',
                contentType: false,
                processData: false,
                cache: false,
                data: datas,
                beforeSend: function () {
                    jQuery('.check.button.button_request').text('Đang xử lý');
                },
                success: function (response) {
//                    window.alert(12);
//                     console.log(response);
//                    return false;
                    if (response) {
                        var data = jQuery.parseJSON(response);
                        if (data.err == 0) {
                            alert(data.msg);
                            jQuery('.name,.phone,.email').val('');
                            jQuery('.check.button.button_request').text('Đặt bàn');
                            jQuery('.order_slide2').animate({
                                opacity: 0,
                                left: "50px",
                            }, 500, function () {
                                jQuery('.order_slide1').animate({
                                    opacity: 1,
                                    left: "0px",
                                }, 500, function () {
                                    jQuery('.order_slide1').css({'z-index': 9999});
                                    jQuery('.order_slide2').css({'z-index': -9999});
                                });

                            });
                            return false;
                        } else {
                            alert("an error occurred, please try again");
                            location.reload();
                            return false;
                        }
                    }
                },
                error: function () {
//                    alert("an error occurred, please try again");
                    location.reload();
                }
            });
        }
        ))
                ;
    }
    return false;
}
;
App.readCookie = function (name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0)
            return c.substring(nameEQ.length, c.length);
    }
    return null;
};
// source --> http://fujiya.com.vn/wp-content/themes/sage/highgrade/js/modernizr.custom.js?ver=4.4.5 
/* Modernizr 2.7.1 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-csstransforms3d-csstransitions-shiv-cssclasses-prefixed-teststyles-testprop-testallprops-prefixes-domprefixes-css_pointerevents-load
 */
;window.Modernizr=function(a,b,c){function z(a){j.cssText=a}function A(a,b){return z(m.join(a+";")+(b||""))}function B(a,b){return typeof a===b}function C(a,b){return!!~(""+a).indexOf(b)}function D(a,b){for(var d in a){var e=a[d];if(!C(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function E(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:B(f,"function")?f.bind(d||b):f}return!1}function F(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+o.join(d+" ")+d).split(" ");return B(b,"string")||B(b,"undefined")?D(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),E(e,b,c))}var d="2.7.1",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},x={}.hasOwnProperty,y;!B(x,"undefined")&&!B(x.call,"undefined")?y=function(a,b){return x.call(a,b)}:y=function(a,b){return b in a&&B(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e}),q.csstransforms3d=function(){var a=!!F("perspective");return a&&"webkitPerspective"in g.style&&w("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},q.csstransitions=function(){return F("transition")};for(var G in q)y(q,G)&&(v=G.toLowerCase(),e[v]=q[G](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)y(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},z(""),i=k=null,function(a,b){function l(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function m(){var a=s.elements;return typeof a=="string"?a.split(" "):a}function n(a){var b=j[a[h]];return b||(b={},i++,a[h]=i,j[i]=b),b}function o(a,c,d){c||(c=b);if(k)return c.createElement(a);d||(d=n(c));var g;return d.cache[a]?g=d.cache[a].cloneNode():f.test(a)?g=(d.cache[a]=d.createElem(a)).cloneNode():g=d.createElem(a),g.canHaveChildren&&!e.test(a)&&!g.tagUrn?d.frag.appendChild(g):g}function p(a,c){a||(a=b);if(k)return a.createDocumentFragment();c=c||n(a);var d=c.frag.cloneNode(),e=0,f=m(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function q(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return s.shivMethods?o(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+m().join().replace(/[\w\-]+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(s,b.frag)}function r(a){a||(a=b);var c=n(a);return s.shivCSS&&!g&&!c.hasCSS&&(c.hasCSS=!!l(a,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),k||q(a,c),a}var c="3.7.0",d=a.html5||{},e=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,f=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g,h="_html5shiv",i=0,j={},k;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",g="hidden"in a,k=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){g=!0,k=!0}})();var s={elements:d.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:c,shivCSS:d.shivCSS!==!1,supportsUnknownElements:k,shivMethods:d.shivMethods!==!1,type:"default",shivDocument:r,createElement:o,createDocumentFragment:p};a.html5=s,r(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.testProp=function(a){return D([a])},e.testAllProps=F,e.testStyles=w,e.prefixed=function(a,b,c){return b?F(a,b,c):F(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))},Modernizr.addTest("pointerevents",function(){var a=document.createElement("x"),b=document.documentElement,c=window.getComputedStyle,d;return"pointerEvents"in a.style?(a.style.pointerEvents="auto",a.style.pointerEvents="x",b.appendChild(a),d=c&&c(a,"").pointerEvents==="auto",b.removeChild(a),!!d):!1});