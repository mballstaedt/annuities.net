//http://javascript-minifier.com/
var phoneNumberDelimiters = "-, ) , (";





// characters which are allowed in international phone numbers





// (a leading + is OK)





var validWorldPhoneChars = phoneNumberDelimiters + "";





var minDigitsInIPhoneNumber = 10;









var ARQBackendURL = protocol + "offers.annuityratequotes.net/";





function popUpvalidateForm(id) {

ga('send', 'event', 'Landing Page Form','Click','Lead Form');



    var msg = "";





    var ZipCodes = [99996, 99997, 9998, 99999];



    if (document.getElementById("investment")) {





        if ($.trim(document.getElementById("investment").value) == "") {





            msg += "Please select Retirement Savings.\n";





        }





    }





    if (document.getElementById("first_name")) {





        if ($.trim(document.getElementById("first_name").value) == "") {





            msg += "Please enter your first name.\n";





        }





    }





    if (document.getElementById("last_name")) {





        if ($.trim(document.getElementById("last_name").value) == "") {





            msg += "Please enter your last name.\n";





        }





    }





    if (document.getElementById("street")) {





        if ($.trim(document.getElementById("street").value) == "") {





            msg += "Please enter street address.\n";





        }





    }





    if (document.getElementById('zip_code')) {





        if (document.getElementById('zip_code').value == '') {





            msg += "Please enter zip code.\n";





        } else if (isInteger(document.getElementById('zip_code').value) == false) {





            msg += "Please enter proper zip code\n";





        } else if (document.getElementById('zip_code').value == '00000') {



            msg += "Please enter proper zip code\n";



        }





    }





    if (document.getElementById('phone_day')) {





        if (document.getElementById('phone_day').value == '') {





            msg += "Please enter Day phone number.\n";





        } else if (checkInternationalPhone(document.getElementById('phone_day').value) == false) {





            msg += "Please enter valid Day phone number.\n";





        }





    }





    if (document.getElementById('email')) {





        if (document.getElementById('email').value == '') {





            msg += "Please enter email address.\n";





        } else if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById('email').value)) {





            msg += "Please enter correct email address.\n";





        }





    }





    if (document.getElementById('dob_y')) {





        if (document.getElementById('dob_y').value == '') {





            msg += "Please select Year of birth.\n";





        }





    }





    if (msg != "") {





        alert(msg);





        return false;





    } else {



        $('#form_submit').removeAttr('onclick');

        $("#" + id).submit();





    }





}



function inArray(needle, haystack) {



    var length = haystack.length;



    for (var i = 0; i < length; i++) {



        if (haystack[i] == needle) return true;



    }



    return false;



}





function checkInternationalPhone(strPhone) {





    var bracket = 3





    strPhone = trim(strPhone)





    if (strPhone.indexOf("+") > 1) return false





    if (strPhone.indexOf("-") != -1)bracket = bracket + 1





    if (strPhone.indexOf("(") != -1 && strPhone.indexOf("(") > bracket)return false





    var brchr = strPhone.indexOf("(")





    if (strPhone.indexOf("(") != -1 && strPhone.charAt(brchr + 4) != ")")return false





    if (strPhone.indexOf("(") == -1 && strPhone.indexOf(")") != -1)return false





    s = stripCharsInBag(strPhone, validWorldPhoneChars);





    return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);





}





function stripCharsInBag(s, bag) {



    var i;





    var returnString = "";





    // Search through string's characters one by one.





    // If character is not in bag, append to returnString.





    for (i = 0; i < s.length; i++) {















        // Check that current character isn't whitespace.





        var c = s.charAt(i);





        if (bag.indexOf(c) == -1) returnString += c;





    }





    return returnString;





}





function isInteger(s) {



    var i;





    for (i = 0; i < s.length; i++) {















        // Check that current character is number.





        var c = s.charAt(i);





        if (((c < "0") || (c > "9"))) return false;





    }





    //alert(' All characters are numbers.');





    return true;





}





function setState(data, popUp) {

    var city, state;

    if (popUp) {

        if (document.getElementById('div_state')) {

            // document.getElementById('div_state').style.display = 'block';

        }

        if (document.getElementById('div_city')) {

            //  document.getElementById('div_city').style.display = 'block';

        }

    }

    if (data != '') {

        state = data[0].state;

        city = data[0].name;

        document.getElementById('state').value = state;

        document.getElementById('city').value = city;

    }

}





function trim(s) {



    var i;





    var returnString = "";





    // Search through string's characters one by one.





    // If character is not a whitespace, append to returnString.





    for (i = 0; i < s.length; i++) {















        // Check that current character isn't whitespace.





        var c = s.charAt(i);





        if (c != " ") returnString += c;





    }





    return returnString;





}





function validateInvalidOffer() {





    var errorMsg = "";





    if ($.trim($("#best_number").val()) == "" || $.trim($("#best_number").val()) == "Phone") {





        errorMsg += "  Phone\n";





    } else if (!checkInternationalPhone($.trim($("#best_number").val()))) {





        errorMsg += "  Phone Invalid\n";





    }





    /*if($.trim($("#follow_up_time").val()) == ""){







     errorMsg += "  Please select best time of day to call.\n";







     }*/





    if (errorMsg != "") {





        alert("Missing Required Fields\n" + errorMsg);





        return false;





    } else {





        $('#invalid_form').submit();





    }





}





function showTYP(typ_id, vl_type, lead_id) {





    top.location.href = ARQBackendURL + "ThankYouPages/?lp=" + typ_id + "&vl_type=" + vl_type + "&lead_id=" + lead_id;





}





function cdsValidate() {





    var errorMsg = "";





    if ($.trim($("#best_number").val()) == "" || $.trim($("#best_number").val()) == "Phone") {





        errorMsg += "  Phone\n";





    } else if (!checkInternationalPhone($.trim($("#best_number").val()))) {





        errorMsg += "  Phone Invalid\n";





    }





    if ($.trim($("#follow_up_time").val()) == "") {





        errorMsg += "  Please select best time of day to call.\n";





    }





    if (errorMsg != "") {





        alert("Missing Required Fields\n" + errorMsg);





        return false;





    } else {





        $('#cds_form').submit();





    }





}



function get_city_state(zip_code, popUp) {





    if (jQuery.trim(zip_code) != '') {





        $.getJSON(ajaxURL + '?zip_code=' + zip_code + "&tagmode=any&format=json&jsoncallback=?",function (response) {



            setState(response, popUp);



        }).fail(function () {

            if (popUp) {

                alert('Type in a Valid 5 Digit Zip Code');

            }



        });





    }





}





function popUpvalidateReverseMortageThankyouForm() {





    var msg = "";





    var isAjaxRunning = false;









    if (document.getElementById('house_type')) {





        if (document.getElementById('house_type').value == '') {





            msg += "Please select House Type.\n";





        }





    }





    if (document.getElementById("estimated_home_val")) {





        if (document.getElementById('estimated_home_val').value == '') {





            msg += "Please enter Estimated Home Value.\n";





        }





    }





    if (document.getElementById("estimated_mortgage_bal")) {





        if (document.getElementById('estimated_mortgage_bal').value == '') {





            msg += "Please enter Estimated Mortgage Balance.\n";





        }





    }





    if (msg != "") {





        alert(msg);





        return false;





    } else {





        if (document.getElementById("form-loader-image")) {





            $("#form-loader-image").show();





        }





        if (!isAjaxRunning) {





            isAjaxRunning = true;





            $.getJSON(apiURL + "php_handler/save_thank_form_new.php?ttkk=1&" + $("#_landingthankform").serialize() + "&tagmode=any&form_type=1&format=json&jsoncallback=?",





                function (response) {





                    isAjaxRunning = false;





                    if (response) {





                        if (response.result && response.result == 'error') {





                            if (document.getElementById("form-loader-image")) {





                                $("#form-loader-image").hide();





                            }





                            if (document.getElementById("new_landing_thanks")) {





                                $("#annuity_form").hide();





                                $("#new_landing_thanks").show();





                            }





                            return false;





                        }





                        else if (response.result && response.result == 'success') {





                            if (document.getElementById("form-loader-image")) {





                                $("#form-loader-image").hide();





                            }





                            $("#annuity_form").hide();





                            $("#new_landing_thanks").show();





                            if (typeof(response.qualifiedPixcelCode) != "undefined") {





                                $('#new_landing_thanks').append(response.qualifiedPixcelCode);





                            }





                            if (typeof(response.offerPixcelCode) != "undefined") {





                                $('#new_landing_thanks').append(response.offerPixcelCode);





                            }





                        }





                    }





                }, "json");





        }





    }





}



function setScreenResolution() {

    $('#screen_width').val(screen.width);

    $('#screen_height').val(screen.height);

}



/* JS for Multi-Step Wizard LP on 13/12/15 */

function validateZip(form_id) {

    if($('#zip_code').val().length==5 && $('#zip_code').val()!='00000'){

        $('#submit_form').removeAttr('onclick');

        $("#" + form_id).submit();

    }else{

        alert("Please provide valid zip code");

    }

}

function validate_dob_y(form_id) {

    var msg = "";

    if (document.getElementById('dob_y')) {

        if (document.getElementById('dob_y').value == '') {

            msg += "Please enter Year of Birth.\n";

        } else if (isInteger(document.getElementById('dob_y').value) == false) {

            msg += "Please enter proper Year of Birth\n";

        } else if (document.getElementById('dob_y').value.length < 4) {

            msg += "Please enter proper Year of birth\n";

        }

    }

    if (msg != "") {

        alert(msg);

        return false;

    } else {

        $('#submit_form').removeAttr('onclick');

        $("#" + form_id).submit();





    }

}

function setInvestmentAmount(flag,form_id){

    if(flag){

        document.getElementById('investment').value = '$25,000 - $50,000';

    }else{

        document.getElementById('investment').value = '$10,000 - $25,000';

    }

if(document.getElementById('investment').value!=''){

    $('#submit_form').removeAttr('onclick');

    $("#" + form_id).submit();

}

}

function validate_retirement_concerns(form_id) {

    var msg = "";

    //var checkedNum = $('input[name="retirement_concerns[]"]:checked').length;

    //if (!checkedNum) {

    //    msg += 'please select Retirement Concers';

    //}

    if (msg != "") {

        alert(msg);

        return false;

    } else {

        $('#submit_form').removeAttr('onclick');

        $("#" + form_id).submit();

    }

}

function skipRetirementConcerns(form_id){

    $("#" + form_id).submit();

}

function validate_multi_wizard_form(form_id) {

    var msg = "";

    if (document.getElementById("first_name")) {

        if ($.trim(document.getElementById("first_name").value) == "") {

            msg += "Please enter your first name.\n";

        }

    }

    if (document.getElementById("last_name")) {

        if ($.trim(document.getElementById("last_name").value) == "") {

            msg += "Please enter your last name.\n";

        }

    }

    if (document.getElementById('email')) {

        if (document.getElementById('email').value == '') {

            msg += "Please enter email address.\n";

        } else if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById('email').value)) {

            msg += "Please enter correct email address.\n";

        }

    }

    if (document.getElementById('phone_day')) {

        if (document.getElementById('phone_day').value == '') {

            msg += "Please enter phone number.\n";

        } else if (checkInternationalPhone(document.getElementById('phone_day').value) == false) {

            msg += "Please enter valid phone number.\n";

        }

    }

    if (msg != "") {

        alert(msg);

        return false;

    } else {

        $('#submit_form').removeAttr('onclick');

        $("#" + form_id).submit();

    }

}

//$(document).ready(function() {

//    $("#zip_code").keydown(function(event) {

//        // Allow: backspace, delete, tab, escape, and enter

//        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||

//            // Allow: Ctrl+A

//            (event.keyCode == 65 && event.ctrlKey === true) ||

//            // Allow: home, end, left, right

//            (event.keyCode >= 35 && event.keyCode <= 39)) {

//            // let it happen, don't do anything

//            return;

//        }

//        else {

//            // Ensure that it is a number and stop the keypress

//            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {

//                event.preventDefault();

//            }

//        }

//    });

//});

function formValidateFields(id) {

    var msg = "";

    var ZipCodes = [99996, 99997, 9998, 99999];

    if (document.getElementById("investment")) {

        if ($.trim(document.getElementById("investment").value) == "") {

            msg += "Please select Retirement Savings.\n";

        }

    }

    if (document.getElementById("first_name")) {

        if ($.trim(document.getElementById("first_name").value) == "") {

            msg += "Please enter your first name.\n";

        }

    }

    if (document.getElementById("last_name")) {

        if ($.trim(document.getElementById("last_name").value) == "") {

            msg += "Please enter your last name.\n";

        }

    }

    if (document.getElementById('zip_code')) {

        if (document.getElementById('zip_code').value == '') {

            msg += "Please enter zip code.\n";

        } else if (isInteger(document.getElementById('zip_code').value) == false) {

            msg += "Please enter proper zip code\n";

        } else if (document.getElementById('zip_code').value == '00000') {

            msg += "Please enter proper zip code\n";

        }

    }

    if (document.getElementById('phone_day')) {

        if (document.getElementById('phone_day').value == '') {

            msg += "Please enter Day phone number.\n";

        } else if (checkInternationalPhone(document.getElementById('phone_day').value) == false) {

            msg += "Please enter valid Day phone number.\n";

        }

    }





    if (document.getElementById('email')) {

        if (document.getElementById('email').value == '') {

            msg += "Please enter email address.\n";

        } else if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById('email').value)) {

            msg += "Please enter correct email address.\n";

        }

    }

    if (document.getElementById('dob_y')) {

        if (document.getElementById('dob_y').value == '') {

            msg += "Please select Year of birth.\n";

        }

    }

    //if(document.getElementById("Optin").checked!=true){

    //    msg += "Please Check the Box.\n";

    //}

    if (msg != "") {

        alert(msg);

        return false;

    } else {

        $('#form_submit').removeAttr('onclick');

        $("#" + id).submit();





    }





}