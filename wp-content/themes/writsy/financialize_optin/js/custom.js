jQuery(function () {
    jQuery.ajax({
        type: "POST",
        url: optinAjaxURL,
        data: {"action": "optin_api_call", "optin_id": optinId},
        dataType: "json",
        success: function (data) {
            if (data.status == 'success') {
                jQuery('body').append('<div id="optin_container"></div>');
                /*div id can be update */
                jQuery("#optin_container").html(data.html);
            }
            else {
                jQuery("#optin_container").html(data.message);
            }

        },
        complete: function (data) {
            // jQuery("#myModal").modal("show");
        }

    });
});

function validateOptinLeadForm() {
    var errorMsg = '';
    var zip = jQuery.trim(jQuery("#optin_zip").val());
    var dob = jQuery.trim(jQuery("#optin_dob_y").val());
    var t = 'popUp';
    if (zip == '' && dob == 0) {
        errorMsg = 'Zip Code & Year of Birth are required fields.\n';
    }

    else if (zip == '') {
        errorMsg = 'Zip Code is a required field.\n';
    }

    else if (dob == 0) {
        errorMsg = 'Year of Birth is a required field.\n';
    }

    else if (!isInteger(zip) || isInteger(zip) == 0 || zip == "00000") {
        errorMsg = 'Enter valid zip code.\n';
    }

    if (errorMsg != '') {
        errorMsg = 'Please Note:\n' + errorMsg;
        alert(errorMsg);
    } else {
        var btn_html = jQuery('#optin-submit-btn').html();
        jQuery('#optin-submit-btn').html('<img alt="loading..." src="https://admin.financialize.com/images/ajax-loader.gif">');
        "" != jQuery.trim(zip) && jQuery.getJSON("https://admin.financialize.com/api/ajax.php?zip_code=" + zip + "&tagmode=any&format=json&jsoncallback=?", function (zip) {
            var state_code = zip[0].state;
            var city = zip[0].name;
            var state = zip[0].state;
            if (zip[0].state_name != '')
                state = zip[0].state_name;
            else
                state = jQuery.trim(jQuery("#state").val());
            var dataToPost = {
                "dob": dob,
                "city": city,
                "state": state,
                "state_code": state_code,
                "zip": jQuery("#optin_zip").val(),
                'action': 'optin_form_graphic'
            };
            var url = ajaxURL;
            jQuery.ajax({
                type: "POST",
                url: url,
                data: dataToPost,
                dataType: "json",
                success: function (data) {
                    if (data.status == 'success') {
                        jQuery('#optin-form-popup').html(data.html);
                    }
                    else {
                        jQuery('#optin-submit-btn').html(btn_html);
                        alert('Something Went Wrong');
                    }
                }
            });
        }).fail(function () {
            jQuery('#optin-submit-btn').html(btn_html);
            t && alert("Type in a Valid 5 Digit Zip Code");
        })
    }
}

function removeHiddenClsById(cls) {

    if (jQuery('#' + cls).hasClass('hidden')) {

        jQuery('#' + cls).removeClass('hidden');

    }

}

function addHiddenClsById(cls) {

    if (jQuery('#' + cls).hasClass('hidden')) {

    } else

        jQuery('#' + cls).addClass('hidden');

}

function addHiddenClsByCls(clas, cls) {

    if (jQuery('.' + clas).hasClass(cls)) {

    } else {

        jQuery('.' + clas).addClass(cls);

    }

}

function removeClsByCls(clas, cls) {

    if (jQuery('.' + clas).hasClass(cls)) {

        jQuery('.' + clas).removeClass(cls);

    }

}

function loadingProgressBar(cls, width, sec) {
    addHiddenClsById('table-section-div');
    removeHiddenClsById('data-progess');

    removeHiddenClsById(cls);
    /* interval in milliseconds*/
    var interval = 10;
    var delay = 1;

    setTimeout(function () {

        width = width + delay;

        jQuery('.' + cls).css('width', width + '%');

        if (width < 100) {
            /*call self with new value*/
            loadingProgressBar(cls, width, sec);
        }
        else {
            /*call self with new value*/
            loadingProgressBar2('pb2', 0, 1);
        }

    }, 40);

}

function loadingProgressBar2(cls, width, sec) {

    removeHiddenClsById(cls);
    var interval = 10;
    var delay = 1;

    setTimeout(function () {

        width = width + delay;

        jQuery('.' + cls).css('width', width + '%');

        if (width < 100)

            loadingProgressBar2(cls, width, sec);

        else

            loadingProgressBar3('pb3', 0, 1);

    }, 40);

}

function loadingProgressBar3(cls, width, sec) {

    removeHiddenClsById(cls);

    var interval = 10;

    var delay = 1;

    setTimeout(function () {

        width = width + delay;

        jQuery('.' + cls).css('width', width + '%');

        if (width < 100)

            loadingProgressBar3(cls, width, sec);

        else {

            setTimeout(function () {

                addHiddenClsByCls('data-progess', 'hidden');
                addHiddenClsByCls('progress-heading', 'hidden');

                checkMarkSection();

            }, 600);

        }

    }, 30);

}

function checkMarkSection() {

    removeHiddenClsById('check-mark-section');

    setTimeout(function () {

        var ele = document.getElementById('blinker');

        ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');

        addHiddenClsById('progress-bar-div', 'hidden');

        addHiddenClsByCls('data-progess', 'hidden');

        addHiddenClsByCls('check-mark-section', 'hidden');

        removeHiddenClsById('table-section-div');
        /*removeClsById('table-section-div','focus-hidden');*/
        addClsByCLs('leads-col', 'grdnt');

        jQuery('#exit_first_name').focus();

    }, 4000);

}

function addClsByCLs(clas, cls) {

    if (jQuery('.' + clas).hasClass(cls)) {

    } else {

        jQuery('.' + clas).addClass(cls);

    }

}

function removeClsByCLs(clas, cls) {

    if (jQuery('.' + clas).hasClass(cls)) {

        jQuery('.' + clas).removeClass(cls);

    }

}

function addClsById(clas, cls) {

    if (jQuery('#' + clas).hasClass(cls)) {

    } else {

        jQuery('.' + clas).addClass(cls);

    }

}

function removeClsById(clas, cls) {

    if (jQuery('#' + clas).hasClass(cls)) {

        jQuery('#' + clas).removeClass(cls);

    }

}

function validateOptinForms(element) {

    var t = "";

    var form = jQuery(element).parents('form:first');

    var fields = form.find(':input').serializeArray();

    var skipArray = [];

    var emailArray = ['email'];

    /*
     This is done because google Analytics append the hidden fields in the form
     var skipforEmpty = ['http_reffer', 'screen_width', 'screen_height', 'city', 'state'];
    */

    var checkElements = ['first_name', 'last_name', 'zip_code', 'dob_y', 'email', 'phone_day', 'investment'];

    var fname = 'no_name';

    var regexy = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    jQuery.each(fields, function (i, field) {

        fname = field.name;

        if (jQuery.inArray(fname, skipArray) == -1) {
            if (jQuery.trim(field.value) == '') {
                if (jQuery.inArray(fname, checkElements) > -1) {
                    t += 'Please Enter ' + fname.replace(/_/g, ' ');
                    t += '\n';
                }
            }
            else if (jQuery.inArray(fname, emailArray) > -1) {

                if (!regexy.test(field.value)) {
                    t += 'Please Enter Correct Format of Email (example@example.com)';
                    t += '\n';
                }
            }

        }

    });

    if ("" != t)
        (alert(t), !1)
    else {
        jQuery(element).removeAttr("onclick");
        form.submit();
    }
}