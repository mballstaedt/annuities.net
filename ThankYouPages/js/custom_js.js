$(function () {
    window.mobileAndTabletcheck = function () {
        var check = false;
        (function (a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true;
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    };
});

function popUpvalidateForm(e) {
    ga("send", "event", "Landing Page Form", "Click", "Lead Form");
    var t = "";
    return document.getElementById("investment") && "" == $.trim(document.getElementById("investment").value) && (t += "Please select Retirement Savings.\n"), document.getElementById("first_name") && "" == $.trim(document.getElementById("first_name").value) && (t += "Please enter your first name.\n"), document.getElementById("last_name") && "" == $.trim(document.getElementById("last_name").value) && (t += "Please enter your last name.\n"), document.getElementById("street") && "" == $.trim(document.getElementById("street").value) && (t += "Please enter street address.\n"), document.getElementById("zip_code") && ("" == document.getElementById("zip_code").value ? t += "Please enter zip code.\n" : 0 == isInteger(document.getElementById("zip_code").value) ? t += "Please enter proper zip code\n" : (document.getElementById("city") && "" == document.getElementById("city").value && (t += "Please enter your city\n"), document.getElementById("state") && "" == document.getElementById("state").value && (t += "Please select your state\n"))), document.getElementById("phone_day") && ("" == document.getElementById("phone_day").value ? t += "Please enter Day phone number.\n" : 0 == checkInternationalPhone(document.getElementById("phone_day").value) && (t += "Please enter valid Day phone number.\n")), document.getElementById("email") && ("" == document.getElementById("email").value ? t += "Please enter email address.\n" : /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById("email").value) || (t += "Please enter correct email address.\n")), document.getElementById("dob_y") && "" == document.getElementById("dob_y").value && (t += "Please select Year of birth.\n"), document.getElementById("check_box") && (document.getElementById("check_box").checked || (t += "Check Box is Required.\n")), "" != t ? (alert(t), !1) : ($("#form_submit").removeAttr("onclick"), void $("#" + e).submit())
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
    return "" == $.trim($("#best_number").val()) || "Phone" == $.trim($("#best_number").val()) ? e += "  Phone\n" : checkInternationalPhone($.trim($("#best_number").val())) || (e += "  Phone Invalid\n"), "" != e ? (alert("Missing Required Fields\n" + e), !1) : (mobileAndTabletcheck() ? InvalidOfferPostWithCurl($("#invalid_form")) : (void $("#invalid_form").submit()))
}

function validateInvalidOfferForm(element) {
    var best_number = $(element).closest('form').find(':input[name=best_number]').val();
    var e = "";
    return "" == $.trim(best_number) || "Phone" == $.trim(best_number) ? e += "  Phone\n" : checkInternationalPhone($.trim(best_number)) || (e += "  Phone Invalid\n"), "" != e ? (alert("Missing Required Fields\n" + e), !1) : (mobileAndTabletcheck() ? InvalidOfferPostWithCurl($(element).closest('form')) : (void $(element).closest('form').submit()))
}

function InvalidOfferPostWithCurl(form) {
    jQuery.ajax({
        type: "POST",
        url: baseURL + 'info/ajax/ajax_common.php?test=1',
        data: jQuery(form).serialize() + '&action=invalid_offer_post_api_call&is_mobile=1',
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