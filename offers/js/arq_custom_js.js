function popUpvalidateForm(e) {
    ga("send", "event", "Landing Page Form", "Click", "Lead Form");
    var alrt = "ALERT: The following fields are required:\n\n";
    var t = "";
    return document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "First Name\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Last Name\n"), document.getElementById("street") && "" == $.trim(document.getElementById("street").value) && (t += "Street Address\n"), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Phone\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Valid Phone\n")), document.getElementById("email") && ("" == document.getElementById("email").value ? t += "Email\n" : /^[a-zA-Z0-9]{1}([\._a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+){1,3}$/.test(trim(document.getElementById("email").value)) || (t += "Correct Email\n")),document.getElementById("zip_code") && ("" == document.getElementById("zip_code").value ? t += "Zip Code\n" : 0 == isInteger(document.getElementById("zip_code").value) ? t += "Proper Zip Code\n" : "00000" == document.getElementById("zip_code").value && (t += "Proper Zip Code\n")), document.getElementById("dob_y") && "" == document.getElementById("dob_y").value && (t += "Year of Birth\n"),document.getElementById("investment") && "" == $.trim(document.getElementById("investment").value) && (t += "Investment Amount\n"),  "" != t ? (alert(alrt + t), !1) : ($("#form_submit").removeAttr("onclick"), void $("#" + e).submit())
}
function inArray(e, t) {
    for (var n = t.length, a = 0; n > a; a++)if (t[a] == e)return !0;
    return !1
}
function checkInternationalPhone(e) {
    var t = 3;
    if (e = trim(e), e.indexOf("+") > 1)return !1;
    if (-1 != e.indexOf("-") && (t += 1), -1 != e.indexOf("(") && e.indexOf("(") > t)return !1;
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
        if ("0" > n || n > "9")return !1
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
            if (e.result && "error" == e.result)return document.getElementById("form-loader-image") && $("#form-loader-image").hide(), document.getElementById("new_landing_thanks") && ($("#annuity_form").hide(), $("#new_landing_thanks").show()), !1;
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
    return document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "Please enter your first name.\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Please enter your last name.\n"), document.getElementById("email") && ("" ==trim(document.getElementById("email").value) ? t += "Please enter email address.\n" : /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(trim(document.getElementById("email").value)) || (t += "Please enter correct email address.\n")), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Please enter phone number.\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Please enter valid phone number.\n")), "" != t ? (alert(t), !1) : ($("#submit_form").removeAttr("onclick"), void $("#" + e).submit())
}
function formValidateFields(e) {
    var t = "";
    return document.getElementById("investment") && "" == $.trim(document.getElementById("investment").value) && (t += "Please select Retirement Savings.\n"), document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "Please enter your first name.\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Please enter your last name.\n"), document.getElementById("zip_code") && ("" == document.getElementById("zip_code").value ? t += "Please enter zip code.\n" : 0 == isInteger(document.getElementById("zip_code").value) ? t += "Please enter proper zip code\n" : "00000" == document.getElementById("zip_code").value && (t += "Please enter proper zip code\n")), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Please enter Day phone number.\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Please enter valid Day phone number.\n")), document.getElementById("email") && ("" == document.getElementById("email").value ? t += "Please enter email address.\n" : /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById("email").value) || (t += "Please enter correct email address.\n")), document.getElementById("dob_y") && "" == document.getElementById("dob_y").value && (t += "Please select Year of birth.\n"), "" != t ? (alert(t), !1) : ($("#form_submit").removeAttr("onclick"), void $("#" + e).submit())
}
var phoneNumberDelimiters = "-, ) , (", validWorldPhoneChars = phoneNumberDelimiters + "", minDigitsInIPhoneNumber = 10, ARQBackendURL = protocol + "offers.annuityratequotes.net/";

function validateForms(element) {
    ga("send", "event", "Landing Page Form", "Click", "Lead Form");
    var t = "";
    var fields = $(element).parent('form').find(':input').serializeArray();
    var skipArray = [];
    var emailArray = ['email'];
    // This is done because google Analytics append the hidden fields in the form
    // var skipforEmpty = ['http_reffer', 'screen_width', 'screen_height', 'city', 'state'];
    var checkElements = ['first_name', 'last_name', 'zip_code', 'dob_y', 'email','phone_day','investment'];
    var fname = 'no_name';
    var regexy = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    $.each(fields, function (i, field) {
        fname = field.name;
        if ($.inArray(fname, skipArray) == -1) {
            // console.log(fname);
            // console.log($.inArray(fname, emailArray));
            if ($.trim(field.value) == '') {
                //error.push( { fname :  'Please enter '+fname} );
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
    if("" != t)
        (alert(t), !1)
    else {
        $(element).removeAttr("onclick");
        $(element).parent('form').submit();
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
    //if(document.getElementById("Optin").checked!=true){
    //    msg += "Please Check the Box.\n";
    //}
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