function popUpvalidateForm(e) {
    ga("send", "event", "Landing Page Form", "Click", "Lead Form");
    var t = "<span class='red'>ALERT: The following fields are required:</span>\n";
    return document.getElementById("investment") && "" == $.trim(document.getElementById("investment").value) && (t += "Please select Retirement Savings.\n"), document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "Please enter your first name.\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Please enter your last name.\n"), document.getElementById("street") && "" == $.trim(document.getElementById("street").value) && (t += "Please enter street address.\n"), document.getElementById("zip_code") && ("" == document.getElementById("zip_code").value ? t += "Please enter zip code.\n" : 0 == isInteger(document.getElementById("zip_code").value) ? t += "Please enter proper zip code\n" : (document.getElementById("city") && "" == document.getElementById("city").value && (t += "Please enter your city\n"), document.getElementById("state") && "" == document.getElementById("state").value && (t += "Please select your state\n"))), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Please enter Day phone number.\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Please enter valid Day phone number.\n")), document.getElementById("email") && ("" == document.getElementById("email").value ? t += "Please enter email address.\n" : /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById("email").value) || (t += "Please enter correct email address.\n")), document.getElementById("dob_y") && "" == document.getElementById("dob_y").value && (t += "Please select Year of birth.\n"), document.getElementById("check_box") && (document.getElementById("check_box").checked || (t += "Check Box is Required.\n")), "" != t ? (alert(t), !1) : ((document.getElementById('cid').value == '225') ? leadPostWithCurl(e) : ($("#form_submit").removeAttr("onclick"), void $("#" + e).submit()))
}

function leadPostWithCurl(formId)
{
    jQuery.ajax({
        type: "POST",
        url: baseURL + 'ajax/ajax_common.php?test=1',
        data: jQuery('#' + formId).serialize() + '&action=lead_post_api_call',
        dataType: "json",
        success: function (data) {
            alert(data);
            if (data.status == 'success') {
                if (typeof(data.typ_url) != 'undefined' && data.typ_url != '') {
                    //console.log(xhr.responseJSON.status);
                    alert(data.typ_url);
                    window.location.href = data.typ_url;
                }
            }
            else {
                alert(data.message);
            }

        }
    });
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
function get_city_state(e, t) {
    "" != jQuery.trim(e) && $.getJSON(ajaxURL + "?zip_code=" + e + "&tagmode=any&format=json&jsoncallback=?", function (e) {
        setState(e, t)
    })
}
function setState(e, t) {
    var n, a;
    t && (document.getElementById("div_state") && (document.getElementById("div_state").style.display = "block"), document.getElementById("div_city") && (document.getElementById("div_city").style.display = "block"), "" != e && (a = e[0].state, n = e[0].name, document.getElementById("state").value = a, document.getElementById("city").value = n))
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
    top.location.href = baseURL + "ThankYouPages/?lp=" + e + "&vl_type=" + t + "&lead_id=" + n
}
function cdsValidate() {
    var e = "";
    return "" == $.trim($("#best_number").val()) || "Phone" == $.trim($("#best_number").val()) ? e += "  Phone\n" : checkInternationalPhone($.trim($("#best_number").val())) || (e += "  Phone Invalid\n"), "" == $.trim($("#follow_up_time").val()) && (e += "  Please select best time of day to call.\n"), "" != e ? (alert("Missing Required Fields\n" + e), !1) : void $("#cds_form").submit()
}
function setScreenResolution() {
    $("#screen_width").val(screen.width), $("#screen_height").val(screen.height)
}
var phoneNumberDelimiters = "-, ) , (", validWorldPhoneChars = phoneNumberDelimiters + "", minDigitsInIPhoneNumber = 10,
    minDigitsInIPhoneNumber = 10;

function validateForms(element) {
    ga("send", "event", "Landing Page Form", "Click", "Lead Form");
    var t = "";
    var fields = $(element).parent('form').find(':input').serializeArray();
    var skipArray = [];
    var emailArray = ['email'];
    var skipforEmpty = [];
    var fname = 'no_name';
    var regexy = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    $.each(fields, function (i, field) {
        fname = field.name;
        if ($.inArray(fname, skipArray) == -1) {
            // console.log(fname);
            // console.log($.inArray(fname, emailArray));
            if ($.trim(field.value) == '') {
                //error.push( { fname :  'Please enter '+fname} );
                if ($.inArray(fname, skipforEmpty) == -1) {
                    t += 'Please Enter ' + capitalize(fname.replace(/_/g, ' '));
                }
            }
            else if ($.inArray(fname, emailArray) > -1) {
                if (!regexy.test(field.value)) {
                    t += 'Please Enter Correct Format of Email (example@example.com)';
                }
            }
        }
    });

    alert(t);
}
function capitalize(text) {
    return text.charAt(0).toUpperCase() + text.slice(1).toLowerCase();
}
function validateFormStep2(fomId) {
    var errorMsg = '';
    var zip = $.trim($("#zip_code").val());
    var dob = $.trim($("#dob_y").val());
    if (!isInteger(zip) && zip == 0) {
        errorMsg += 'Please enter valid zip code.\n';
    }
    if (dob == 0) {
        errorMsg += 'Year of Birth\n';
    }
    if (errorMsg != '') {
        errorMsg = 'ALERT: The following fields are required:\n' + errorMsg;
        alert(errorMsg);
    } else {

    }
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
    //$('#'+id+'_close').click();
    $('#' + id).modal('hide');
    setTimeout(function () {
        $('#' + id + '_mp').html('');
    }, 2000);
    uploadedFilesData = [];
}
function commonAjaxModel(containerId, id, action, ajaxFile) {
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