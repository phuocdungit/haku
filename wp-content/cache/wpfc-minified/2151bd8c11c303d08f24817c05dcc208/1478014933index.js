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