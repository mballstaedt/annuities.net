function popUpvalidateForm(e) {

    ga("send", "event", "Landing Page Form", "Click", "Lead Form");

    var alrt = "ALERT: The following fields are required:\n\n";

    var t = "";

    return document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "First Name\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Last Name\n"), document.getElementById("street") && "" == $.trim(document.getElementById("street").value) && (t += "Street Address\n"), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Phone\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Valid Phone\n")), document.getElementById("email") && ("" == document.getElementById("email").value ? t += "Email\n" : /^[a-zA-Z0-9]{1}([\._a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+){1,3}$/.test(trim(document.getElementById("email").value)) || (t += "Correct Email\n")), document.getElementById("zip_code") && ("" == document.getElementById("zip_code").value ? t += "Zip Code\n" : 0 == isInteger(document.getElementById("zip_code").value) ? t += "Proper Zip Code\n" : "00000" == document.getElementById("zip_code").value && (t += "Proper Zip Code\n")), document.getElementById("dob_y") && "" == document.getElementById("dob_y").value && (t += "Year of Birth\n"), document.getElementById("investment") && "" == $.trim(document.getElementById("investment").value) && (t += "Investment Amount\n"), "" != t ? (alert(alrt + t), !1) : ($("#form_submit").removeAttr("onclick"), (mobileAndTabletcheck()) ? leadPostWithCurl(e) : (void $("#" + e).submit()))

}


function leadPostWithCurl(formId) {

    jQuery.ajax({

        type: "POST",

        url: baseURL + 'ajax/ajax_common.php?test=1',

        data: jQuery('#' + formId).serialize() + '&action=lead_post_api_call&is_mobile=1',

        dataType: "json",

        success: function (data) {

            if (data.status == 'success') {

                if (typeof(data.typ_url) != 'undefined' && data.typ_url != '') {

                    window.location.href = data.typ_url;

                }

            }

            else {

                alert(data.message);

            }


        }

    });

}


function inArray(e, t) {

    for (var n = t.length, a = 0; n > a; a++) if (t[a] == e) return !0;

    return !1

}

function checkInternationalPhone(e) {

    var t = 3;

    if (e = trim(e), e.indexOf("+") > 1) return !1;

    if (-1 != e.indexOf("-") && (t += 1), -1 != e.indexOf("(") && e.indexOf("(") > t) return !1;

    var n = e.indexOf("(");

    return -1 != e.indexOf("(") && ")" != e.charAt(n + 4) ? !1 : -1 == e.indexOf("(") && -1 != e.indexOf(")") ? !1 : (s = stripCharsInBag(e, validWorldPhoneChars), isInteger(s) && s.length >= minDigitsInIPhoneNumber)

}

function stripCharsInBag(e, t) {

    var n, a = "";

    for (n = 0; n < e.length; n++) {

        var r = e.charAt(n);

        -1 == t.indexOf(r) && (a += r)

    }

    return a

}

function isInteger(e) {

    var t;

    for (t = 0; t < e.length; t++) {

        var n = e.charAt(t);

        if ("0" > n || n > "9") return !1

    }

    return !0

}

function setState(e, t) {

    var n, a;

    t && (document.getElementById("div_state"), document.getElementById("div_city")), "" != e && (a = e[0].state, n = e[0].name, document.getElementById("state").value = a, document.getElementById("city").value = n)

}

function trim(e) {

    var t, n = "";

    for (t = 0; t < e.length; t++) {

        var a = e.charAt(t);

        " " != a && (n += a)

    }

    return n

}

function validateInvalidOffer() {

    var e = "";

    return "" == $.trim($("#best_number").val()) || "Phone" == $.trim($("#best_number").val()) ? e += "  Phone\n" : checkInternationalPhone($.trim($("#best_number").val())) || (e += "  Phone Invalid\n"), "" != e ? (alert("Missing Required Fields\n" + e), !1) : void $("#invalid_form").submit()

}

function showTYP(e, t, n) {

    top.location.href = ARQBackendURL + "ThankYouPages/?lp=" + e + "&vl_type=" + t + "&lead_id=" + n

}

function cdsValidate() {

    var e = "";

    return "" == $.trim($("#best_number").val()) || "Phone" == $.trim($("#best_number").val()) ? e += "  Phone\n" : checkInternationalPhone($.trim($("#best_number").val())) || (e += "  Phone Invalid\n"), "" == $.trim($("#follow_up_time").val()) && (e += "  Please select best time of day to call.\n"), "" != e ? (alert("Missing Required Fields\n" + e), !1) : void $("#cds_form").submit()

}

function get_city_state(e, t) {

    "" != jQuery.trim(e) && $.getJSON(ajaxURL + "?zip_code=" + e + "&tagmode=any&format=json&jsoncallback=?", function (e) {

        setState(e, t)

    }).fail(function () {

        t && alert("Type in a Valid 5 Digit Zip Code")

    })

}

function popUpvalidateReverseMortageThankyouForm() {

    var e = "", t = !1;

    return document.getElementById("house_type") && "" == document.getElementById("house_type").value && (e += "Please select House Type.\n"), document.getElementById("estimated_home_val") && "" == document.getElementById("estimated_home_val").value && (e += "Please enter Estimated Home Value.\n"), document.getElementById("estimated_mortgage_bal") && "" == document.getElementById("estimated_mortgage_bal").value && (e += "Please enter Estimated Mortgage Balance.\n"), "" != e ? (alert(e), !1) : (document.getElementById("form-loader-image") && $("#form-loader-image").show(), void(t || (t = !0, $.getJSON(apiURL + "php_handler/save_thank_form_new.php?ttkk=1&" + $("#_landingthankform").serialize() + "&tagmode=any&form_type=1&format=json&jsoncallback=?", function (e) {

        if (t = !1, e) {

            if (e.result && "error" == e.result) return document.getElementById("form-loader-image") && $("#form-loader-image").hide(), document.getElementById("new_landing_thanks") && ($("#annuity_form").hide(), $("#new_landing_thanks").show()), !1;

            e.result && "success" == e.result && (document.getElementById("form-loader-image") && $("#form-loader-image").hide(), $("#annuity_form").hide(), $("#new_landing_thanks").show(), "undefined" != typeof e.qualifiedPixcelCode && $("#new_landing_thanks").append(e.qualifiedPixcelCode), "undefined" != typeof e.offerPixcelCode && $("#new_landing_thanks").append(e.offerPixcelCode))

        }

    }, "json"))))

}

function setScreenResolution() {

    $("#screen_width").val(screen.width), $("#screen_height").val(screen.height)

}

function validateZip(e) {

    5 == $("#zip_code").val().length && "00000" != $("#zip_code").val() ? ($("#submit_form").removeAttr("onclick"), $("#" + e).submit()) : alert("Please provide valid zip code")

}

function validate_dob_y(e) {

    var t = "";

    return document.getElementById("dob_y") && ("" == document.getElementById("dob_y").value ? t += "Please enter Year of Birth.\n" : 0 == isInteger(document.getElementById("dob_y").value) ? t += "Please enter proper Year of Birth\n" : document.getElementById("dob_y").value.length < 4 && (t += "Please enter proper Year of birth\n")), "" != t ? (alert(t), !1) : ($("#submit_form").removeAttr("onclick"), void $("#" + e).submit())

}

function setInvestmentAmount(e, t) {

    e ? document.getElementById("investment").value = "$25,000 - $50,000" : document.getElementById("investment").value = "$10,000 - $25,000", "" != document.getElementById("investment").value && ($("#submit_form").removeAttr("onclick"), $("#" + t).submit())

}

function validate_retirement_concerns(e) {

    var t = "";

    return "" != t ? (alert(t), !1) : ($("#submit_form").removeAttr("onclick"), void $("#" + e).submit())

}

function skipRetirementConcerns(e) {

    $("#" + e).submit()

}

function validate_multi_wizard_form(e) {

    var t = "";

    return document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "Please enter your first name.\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Please enter your last name.\n"), document.getElementById("email") && ("" == trim(document.getElementById("email").value) ? t += "Please enter email address.\n" : /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(trim(document.getElementById("email").value)) || (t += "Please enter correct email address.\n")), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Please enter phone number.\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Please enter valid phone number.\n")), "" != t ? (alert(t), !1) : ($("#submit_form").removeAttr("onclick"), void $("#" + e).submit())

}

function formValidateFields(e) {

    var t = "";

    return document.getElementById("investment") && "" == $.trim(document.getElementById("investment").value) && (t += "Please select Retirement Savings.\n"), document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "Please enter your first name.\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Please enter your last name.\n"), document.getElementById("zip_code") && ("" == document.getElementById("zip_code").value ? t += "Please enter zip code.\n" : 0 == isInteger(document.getElementById("zip_code").value) ? t += "Please enter proper zip code\n" : "00000" == document.getElementById("zip_code").value && (t += "Please enter proper zip code\n")), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Please enter Day phone number.\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Please enter valid Day phone number.\n")), document.getElementById("email") && ("" == document.getElementById("email").value ? t += "Please enter email address.\n" : /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById("email").value) || (t += "Please enter correct email address.\n")), document.getElementById("dob_y") && "" == document.getElementById("dob_y").value && (t += "Please select Year of birth.\n"), "" != t ? (alert(t), !1) : ($("#form_submit").removeAttr("onclick"), void $("#" + e).submit())

}

var phoneNumberDelimiters = "-, ) , (", validWorldPhoneChars = phoneNumberDelimiters + "", minDigitsInIPhoneNumber = 10,

    ARQBackendURL = protocol + "offers.annuityratequotes.net/";


function validateForms(element) {

    ga("send", "event", "Landing Page Form", "Click", "Lead Form");

    var t = "";

    var fields = $(element).parent('form').find(':input').serializeArray();

    var skipArray = [];

    var emailArray = ['email'];

    /*
     This is done because google Analytics append the hidden fields in the form
     var skipforEmpty = ['http_reffer', 'screen_width', 'screen_height', 'city', 'state'];
    */

    var checkElements = ['first_name', 'last_name', 'zip_code', 'dob_y', 'email', 'phone_day', 'investment'];

    var fname = 'no_name';

    var regexy = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    $.each(fields, function (i, field) {

        fname = field.name;

        if ($.inArray(fname, skipArray) == -1) {
            if ($.trim(field.value) == '') {
                if ($.inArray(fname, checkElements) > -1) {
                    t += 'Please Enter ' + capitalize(fname.replace(/_/g, ' '));
                    t += '\n';
                }
            }
            else if ($.inArray(fname, emailArray) > -1) {

                if (!regexy.test(field.value)) {
                    t += 'Please Enter Correct Format of Email (example@example.com)';
                    t += '\n';
                }
            } else if (fname == 'zip_code' && (!isInteger(field.value) || isInteger(field.value) == 0 || field.value == "00000")) {

                t += 'Enter valid zip code.\n';
                t += '\n';

            }

        }

    });

    if ("" != t)

        (alert(t), !1)

    else {

        $(element).removeAttr("onclick");

        (mobileAndTabletcheck()) ? leadPostWithCurl($(element).parent('form').attr('id')) : $(element).parent('form').submit();
    }

}

function capitalize(text) {

    return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();

}


function iframeformValidateFields(formId) {

    var alrt = "ALERT: The following fields are required:\n\n";

    var msg = "";

    if (document.getElementById("first_name")) {

        if (jQuery.trim(document.getElementById("first_name").value) == "") {

            msg += "First Name\n";

        }

    }

    if (document.getElementById("last_name")) {

        if (jQuery.trim(document.getElementById("last_name").value) == "") {

            msg += "Last Name\n";

        }

    }

    if (document.getElementById('zip_code')) {

        if (document.getElementById('zip_code').value == '') {

            msg += "Zip Code\n";

        } else if (isInteger(document.getElementById('zip_code').value) == false) {

            msg += "Proper Zip Code\n";

        } else if (document.getElementById('zip_code').value == '00000') {

            msg += "Proper Zip Code\n";

        }

    }

    /*

     if (document.getElementById("street")) {

     if (jQuery.trim(document.getElementById("street").value) == "") {

     msg += "Please address.\n";

     }

     }*/

    if (document.getElementById('phone_day')) {

        if (document.getElementById('phone_day').value == '') {

            msg += "Phone\n";

        } else if (checkInternationalPhone(document.getElementById('phone_day').value) == false) {

            msg += "Valid Phone\n";

        }

    }


    if (document.getElementById('email_id')) {

        if (document.getElementById('email_id').value == '') {

            msg += "Email\n";

        } else if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(trim(document.getElementById('email_id').value))) {

            msg += "Correct Email\n";

        }

    }

    if (document.getElementById('dob_y')) {

        if (document.getElementById('dob_y').value == '') {

            msg += "Year of Birth\n";

        }

    }

    if (document.getElementById("investment")) {

        if (jQuery.trim(document.getElementById("investment").value) == "") {

            msg += "Investment Amount\n";

        }

    }


    if (msg != "") {

        alert(alrt + msg);

        return false;

    } else {

        jQuery('.get-qoutes-btn').removeAttr('onclick').html('<img alt="loading" src="https://admin.financialize.com/images/ajax-loader.gif">');

        jQuery.ajax({

            type: "POST",

            url: 'https://www.annuities.com/wp-admin/admin-ajax.php',

            data: jQuery('#' + formId).serialize() + '&action=lead_post_api_call',

            dataType: "json",

            success: function (data) {

                if (data.status == 'success') {

                    jQuery('.p-widget-body').html('<div class="p-heading-col">Thank You!</div><p class="form-col">' + data.message + '</p>')

                }

                else {

                    jQuery('.get-qoutes-btn').attr("onclick", "iframeformValidateFields('cds_form')").html('COMPARE RATES');

                    alert(data.message);

                }


            }

        });

    }

}

function validateFormStep2(fomId) {

    removeClsByCLs('leads-col', 'grdnt');

    var errorMsg = '';

    var zip = $.trim($("#zip_code").val());

    var dob = $.trim($("#dob_y").val());

    var lpId = $.trim($("input[name=landing_page_id]").val());

    var lpLogId = $.trim($("input[name=lp_log_id]").val());

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

        "" != jQuery.trim(zip) && $.getJSON(ajaxURL + "?zip_code=" + zip + "&tagmode=any&format=json&jsoncallback=?", function (zip) {

            setState(zip, t);

            var state_code = $.trim($("#state").val());

            var city = $.trim($("#city").val());

            var state = $.trim($("#state").val());

            if (zip[0].state_name != '')

                state = zip[0].state_name;

            else

                state = $.trim($("#state").val());

            var id = dob + '|' + city + '|' + state + '|' + state_code + '|' + lpId + '|' + lpLogId;

            commonAjaxModel('common_popup_modal', id, 'step_2_graphic', 'common');

        }).fail(function () {

            t && alert("Type in a Valid 5 Digit Zip Code");

        })

    }

}


function popUpvalidateFormStep2(e) {

    ga("send", "event", "Landing Page Form", "Click", "Lead Form");

    var alrt = " Please Note: All Fields are Required.\n\n";

    var t = "";

    var index = 0;

    return document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "First Name\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Last Name\n"), document.getElementById("street") && "" == $.trim(document.getElementById("street").value) && (t += "Street Address\n"), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Phone\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Valid Phone\n")), document.getElementById("email") && ("" == document.getElementById("email").value ? t += "Email\n" : /^[a-zA-Z0-9]{1}([\._a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+){1,3}$/.test(trim(document.getElementById("email").value)) || (alrt = "Please enter Correct Email\n", t += "Please enter Correct Email\n")), document.getElementById("zip_code") && ("" == document.getElementById("zip_code").value ? t += "Zip Code\n" : 0 == isInteger(document.getElementById("zip_code").value) ? (alrt = "Please Enter Proper Zip Code required\n", t += "Proper Zip Code required\n") : "00000" == document.getElementById("zip_code").value && (t += "Proper Zip Code\n")), document.getElementById("dob_y") && "" == document.getElementById("dob_y").value && (t += "Year of Birth\n"), document.getElementById("investment") && "" == $.trim(document.getElementById("investment").value) && (t += "Investment Amount\n"), "" != t ? (alert(alrt), !1) : ($("#" + e).removeAttr("onclick"), $('#form_id1 :input').not(':submit').clone().hide().appendTo('#' + e), index = $("#form_id1").find('select option:selected').index(), $("#" + e).find('#dob_y').prop('selectedIndex', index), void $("#" + e).submit())

}


/*

 * TO CLOSE or CANCEL MODAL

 */

function closeModal() {

    $('.close').click();

}


/*

 * TO CLOSE SPECIFIC MODAL

 */

function closeModalById(id) {

    $('#' + id).modal('hide');

    setTimeout(function () {

        $('#' + id + '_mp').html('');

    }, 2000);

    uploadedFilesData = [];

}

function commonAjaxModel(containerId, id, action, ajaxFile) {

    if (containerId == '' || typeof(containerId) == "undefined") {

        containerId = 'confirm_modal';

    }

    console.log(containerId);

    if (ajaxFile == '' || typeof(ajaxFile) == "undefined") {

        ajaxFile = 'common';

    }

    if (id == '' || typeof(id) == "undefined") {

        id = 'confirm_modal';

    }

    var dataToPost = {"containerId": containerId, "id": id, 'action': action};

    var url = baseURL + 'ajax/ajax_' + ajaxFile + '.php?test=1';

    $.ajax({

        type: "POST",

        url: url,

        data: dataToPost,

        dataType: "json",

        success: function (data) {

            if ($('#' + containerId + '_mp').length > 0) {

                /*Put Modal HTML in Modal Placeholder*/

                $('#' + containerId + '_mp').html(data.html);

                /*Show Modal*/

                $('#' + containerId).modal('show');

            }

            else

                alert('Modal placeholder not found on this page.');

        }

    });

}

function removeHiddenClsById(cls) {

    if ($('#' + cls).hasClass('hidden')) {

        $('#' + cls).removeClass('hidden');

    }

}

function addHiddenClsById(cls) {

    if ($('#' + cls).hasClass('hidden')) {

    } else

        $('#' + cls).addClass('hidden');

}

function addHiddenClsByCls(clas, cls) {

    if ($('.' + clas).hasClass(cls)) {

    } else {

        $('.' + clas).addClass(cls);

    }

}

function removeClsByCls(clas, cls) {

    if ($('.' + clas).hasClass(cls)) {

        $('.' + clas).removeClass(cls);

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

        $('.' + cls).css('width', width + '%');

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

        $('.' + cls).css('width', width + '%');

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

        $('.' + cls).css('width', width + '%');

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

        $('#exit_first_name').focus();

    }, 4000);

}

function addClsByCLs(clas, cls) {

    if ($('.' + clas).hasClass(cls)) {

    } else {

        $('.' + clas).addClass(cls);

    }

}

function removeClsByCLs(clas, cls) {

    if ($('.' + clas).hasClass(cls)) {

        $('.' + clas).removeClass(cls);

    }

}

function addClsById(clas, cls) {

    if ($('#' + clas).hasClass(cls)) {

    } else {

        $('.' + clas).addClass(cls);

    }

}

function removeClsById(clas, cls) {

    if ($('#' + clas).hasClass(cls)) {

        $('#' + clas).removeClass(cls);

    }

}


/*Ticket #1629*/

$(function () {

    window.mobileAndTabletcheck = function () {

        var check = false;

        (function (a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
        })(navigator.userAgent || navigator.vendor || window.opera);

        return check;

    };

});

/*
## Ticket #2010*/
function onPageValidateForm(id) {
    ga('send', 'event', 'Landing Page Form', 'Click', 'Lead Form');
    var msg = "";
    var submitFlag = true;
    if (document.getElementById("investment")) {
        if ($.trim(document.getElementById("investment").value) == "") {
            showErrorMsgInSpan('#investment', 'Please Select investment.')
            submitFlag = false;
        }
    }
    if (document.getElementById("first_name")) {
        if ($.trim(document.getElementById("first_name").value) == "") {
            showErrorMsgInSpan('#first_name', 'Please enter your first name.')
            submitFlag = false;
        }
    }
    if (document.getElementById("last_name")) {
        if ($.trim(document.getElementById("last_name").value) == "") {
            showErrorMsgInSpan('#last_name', 'Please enter your last name.')
            submitFlag = false;
        }
    }
    if (document.getElementById("street")) {
        if ($.trim(document.getElementById("street").value) == "") {
            showErrorMsgInSpan('#street', 'Please enter your address.')
            submitFlag = false;
        }
    }
    if (document.getElementById('zip_code')) {
        if (document.getElementById('zip_code').value == '') {
            showErrorMsgInSpan('#zip_code', 'Please enter zip code.')
            submitFlag = false;
        } else if (isInteger(document.getElementById('zip_code').value) == false) {
            showErrorMsgInSpan('#zip_code', 'Please enter proper zip code')
            submitFlag = false;
        } else {
            if (document.getElementById('city')) {
                if (document.getElementById('city').value == '') {
                    /*showErrorMsgInSpan('#zip_code', 'Please enter your city')
                    submitFlag = false;*/
                }
            }
            if (document.getElementById('state')) {
                if (document.getElementById('state').value == '') {
                    /*        showErrorMsgInSpan('#zip_code', 'Please enter your state')
                            submitFlag = false;*/
                }
            }
        }
    }
    if (document.getElementById('phone_day')) {
        if (document.getElementById('phone_day').value == '') {
            showErrorMsgInSpan('#phone_day', 'Please enter phone number.')
            submitFlag = false;
        } else if (checkInternationalPhone(document.getElementById('phone_day').value) == false) {
            showErrorMsgInSpan('#phone_day', 'Please enter valid phone number.')
            submitFlag = false;
        }
    }
    if (document.getElementById('email')) {
        if (document.getElementById('email').value == '') {
            showErrorMsgInSpan('#email', 'Please enter email address.')
            submitFlag = false;
        } else if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById('email').value)) {
            showErrorMsgInSpan('#email', 'Please enter correct email address.')
            submitFlag = false;
        }
    }
    if (document.getElementById('dob_y')) {
        if (document.getElementById('dob_y').value == '') {
            showErrorMsgInSpan('#dob_y', 'Please select Year of birth.')
            submitFlag = false;
        }
    }
    if (document.getElementById('check_box')) {
        if (document.getElementById('check_box').checked) {
        } else {
            showErrorMsgInSpan('#check_box', 'Check Box is Required.')
            submitFlag = false;
            leadPostWithCurl(id);
        }
    }
    if (submitFlag) {
        if (mobileAndTabletcheck()) {
            leadPostWithCurl(id);
        } else {
            $('#form_submit').removeAttr('onclick');
            $("#" + id).submit();
        }
    } else {
        return false;
    }
}

function showErrorMsgInSpan(e, msg) {
    $(e).next('.error-mxg').html(msg);
    console.log('safsadfasd');
    if ($(e).hasClass('red-cls-error')) {
    } else {
        $(e).addClass('red-cls-error');
    }
}

function validateOptinLeadForm() {
    var errorMsg = '';
    var zip = $.trim($("#optin_zip").val());
    var dob = $.trim($("#optin_dob_y").val());
    var lpId = $.trim($("input[name=landing_page_id]").val());
    var lpLogId = $.trim($("input[name=lp_log_id]").val());
    var cid = $.trim($("input[name=cid]").val());
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
        var btn_html = $('#optin-submit-btn').html();
        $('#optin-submit-btn').html('<img alt="loading..." src="https://admin.financialize.com/images/ajax-loader.gif">');
        "" != jQuery.trim(zip) && $.getJSON(ajaxURL + "?zip_code=" + zip + "&tagmode=any&format=json&jsoncallback=?", function (zip) {
            setState(zip, t);
            var state_code = $.trim($("#state").val());
            var city = $.trim($("#city").val());
            var state = $.trim($("#state").val());
            if (zip[0].state_name != '')
                state = zip[0].state_name;
            else
                state = $.trim($("#state").val());
            var id = dob + '|' + city + '|' + state + '|' + state_code + '|' + lpId + '|' + lpLogId + '|' + $("#optin_zip").val();
            var dataToPost = {"id": id, 'action': 'optin_form_graphic', 'cid': cid};
            var url = baseURL + 'ajax/ajax_common.php?test=1';
            $.ajax({
                type: "POST",
                url: url,
                data: dataToPost,
                dataType: "json",
                success: function (data) {
                    if (data.status == 'success') {
                        $('#optin-form-popup').html(data.html);
                    }
                    else {
                        $('#optin-submit-btn').html(btn_html);
                        alert('Something Went Wrong');
                    }
                }
            });
        }).fail(function () {
            $('#optin-submit-btn').html(btn_html);
            t && alert("Type in a Valid 5 Digit Zip Code");
        })
    }
}

function validateOptinForms(element) {

    ga("send", "event", "Landing Page Form", "Click", "Lead Form");

    var t = "";

    var form = $(element).parents('form:first');

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

    $.each(fields, function (i, field) {

        fname = field.name;

        if ($.inArray(fname, skipArray) == -1) {
            if ($.trim(field.value) == '') {
                if ($.inArray(fname, checkElements) > -1) {
                    t += 'Please Enter ' + capitalize(fname.replace(/_/g, ' '));
                    t += '\n';
                }
            }
            else if ($.inArray(fname, emailArray) > -1) {

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
        $('#form_id1 :input[type=hidden]').not(':submit').clone().hide().appendTo(form)
        $(element).removeAttr("onclick");
        form.submit();
    }
}

$(function () {
    $("input").focus(function () {
        /*console.log($(this).attr('id'));*/
        $(this).next('.error-mxg').html('');
        $(this).removeClass('red-cls-error');
    });
    $("select").focus(function () {
        /*console.log($(this).attr('id'));*/
        $(this).next('.error-mxg').html('');
        $(this).removeClass('red-cls-error');
    });
});

// Copy Forms data to other form
function copyForms($form1, $form2) {
    $(":input[name]", $form2).val(function () {
        return $(":input[name='" + this.name + "']", $form1).val();
    });
}