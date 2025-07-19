//http://javascript-minifier.com/
var phoneNumberDelimiters = "-, ) , (";

// characters which are allowed in international phone numbers

// (a leading + is OK)

var validWorldPhoneChars = phoneNumberDelimiters + "";



var minDigitsInIPhoneNumber = 10;

var minDigitsInIPhoneNumber = 10;





function popUpvalidateForm(id)







{
    ga('send', 'event', 'Landing Page Form','Click','Lead Form');







	var msg = "";







	if(document.getElementById("investment")){







		if($.trim(document.getElementById("investment").value) == ""){







			msg += "Please select Retirement Savings.\n";







		}







	}







	if(document.getElementById("first_name")){







		if($.trim(document.getElementById("first_name").value) == ""){







			msg += "Please enter your first name.\n";







		}







	}







	if(document.getElementById("last_name")){







		if($.trim(document.getElementById("last_name").value) == ""){







			msg += "Please enter your last name.\n";







		}







	}







	if(document.getElementById("street")){







		if($.trim(document.getElementById("street").value) == ""){







			msg += "Please enter street address.\n";







		}







	}







	if(document.getElementById('zip_code')){







		if(document.getElementById('zip_code').value == ''){







			msg += "Please enter zip code.\n";







		} else if(isInteger(document.getElementById('zip_code').value)==false){







			msg += "Please enter proper zip code\n";







		} else {







			if(document.getElementById('city')){







				if(document.getElementById('city').value == '') {







					msg += "Please enter your city\n";







				}







			}







			if(document.getElementById('state')){







				if(document.getElementById('state').value == ''){







					//alert('Please select objective');







					msg += "Please select your state\n";







				}







			}







		}







	}







	if(document.getElementById('phone_day')){







		if(document.getElementById('phone_day').value == ''){







			msg += "Please enter Day phone number.\n";







		} else if(checkInternationalPhone(document.getElementById('phone_day').value)==false){







			msg += "Please enter valid Day phone number.\n";







		}







	}







	if(document.getElementById('email')){







		if(document.getElementById('email').value == ''){







			msg += "Please enter email address.\n";







		} else if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById('email').value) ) {







			msg += "Please enter correct email address.\n";







		}







	}







	if(document.getElementById('dob_y')) {







		if(document.getElementById('dob_y').value == '') {







			msg += "Please select Year of birth.\n";







		}







	}



	if(document.getElementById('check_box')) {







		if(document.getElementById('check_box').checked) {



		}else{



			msg += "Check Box is Required.\n";







		}







	}







	if(msg != ""){







		alert(msg);







		return false;







	} else {



        $('#form_submit').removeAttr('onclick');



		$("#"+id).submit();



	}







}







function checkInternationalPhone(strPhone){







	var bracket=3







	strPhone=trim(strPhone)







	if(strPhone.indexOf("+")>1) return false







	if(strPhone.indexOf("-")!=-1)bracket=bracket+1







	if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false







	var brchr=strPhone.indexOf("(")







	if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+4)!=")")return false







	if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false







	s=stripCharsInBag(strPhone,validWorldPhoneChars);







	return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);







}







function stripCharsInBag(s, bag)







{   var i;







    var returnString = "";







    // Search through string's characters one by one.







    // If character is not in bag, append to returnString.







    for (i = 0; i < s.length; i++)







    {







        // Check that current character isn't whitespace.







        var c = s.charAt(i);







        if (bag.indexOf(c) == -1) returnString += c;







    }







    return returnString;







}







function isInteger(s)







{   var i;







    for (i = 0; i < s.length; i++)







    {







        // Check that current character is number.







        var c = s.charAt(i);







        if (((c < "0") || (c > "9"))) return false;







    }







    //alert(' All characters are numbers.');







    return true;







}







function get_city_state(zip_code,popUp)



{



	if(jQuery.trim(zip_code) != '')



	{



		$.getJSON(ajaxURL+'?zip_code='+zip_code+"&tagmode=any&format=json&jsoncallback=?", function(response){ setState(response,popUp);});



	}



}







function setState(data,popUp)



{



	var city, state;







	if(popUp){







		if(document.getElementById('div_state'))



		{



			document.getElementById('div_state').style.display='block';



		}







		if(document.getElementById('div_city'))



		{



			document.getElementById('div_city').style.display='block';



		}











		if(data != '')



		{



			state = data[0].state;



			city = data[0].name;



			document.getElementById('state').value = state;



			document.getElementById('city').value = city;



		}



	}



}







function trim(s)







{   var i;







    var returnString = "";







    // Search through string's characters one by one.







    // If character is not a whitespace, append to returnString.







    for (i = 0; i < s.length; i++)







    {







        // Check that current character isn't whitespace.







        var c = s.charAt(i);







        if (c != " ") returnString += c;







    }







    return returnString;







}







function validateInvalidOffer()



{



	var errorMsg = "";



	if($.trim($("#best_number").val()) == "" || $.trim($("#best_number").val()) == "Phone"){



		errorMsg += "  Phone\n";



	} else if(!checkInternationalPhone($.trim($("#best_number").val()))){



		errorMsg += "  Phone Invalid\n";



	}







	/*if($.trim($("#follow_up_time").val()) == ""){



		errorMsg += "  Please select best time of day to call.\n";



	}*/







	if(errorMsg != ""){



		alert("Missing Required Fields\n"+errorMsg);



		return false;



	}else{



		$('#invalid_form').submit();



	}







}



function showTYP(typ_id,vl_type,lead_id){



	top.location.href = baseURL + "ThankYouPages/?lp=" + typ_id + "&vl_type=" + vl_type + "&lead_id=" + lead_id;



}



function cdsValidate()



{



	var errorMsg = "";



	if($.trim($("#best_number").val()) == "" || $.trim($("#best_number").val()) == "Phone"){



		errorMsg += "  Phone\n";



	} else if(!checkInternationalPhone($.trim($("#best_number").val()))){



		errorMsg += "  Phone Invalid\n";



	}







	if($.trim($("#follow_up_time").val()) == ""){



		errorMsg += "  Please select best time of day to call.\n";



	}







	if(errorMsg != ""){



		alert("Missing Required Fields\n"+errorMsg);



		return false;



	}else{



		$('#cds_form').submit();



	}







}



function setScreenResolution()

{

	$('#screen_width').val(screen.width);

	$('#screen_height').val(screen.height);

}