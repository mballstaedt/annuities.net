function best_num() {
    $('.ajax_loader').show();
    var errorMsg = "";
    if ($.trim($("#best_number").val()) == "" || $.trim($("#best_number").val()) == "Phone") {
        errorMsg += "  Phone Number\n";
        } else if (!checkInternationalPhone($.trim($("#best_number").val()))) {
            errorMsg += "  Phone Invalid\n";
        }
        if (errorMsg != "") {
            $('.ajax_loader').hide();

            alert("Missing Required Fields\n" + errorMsg);

            return false;
        } else {
            $.ajax({
                type: "POST",
                url: invFormURL,
                data: $("#valid_form").serialize(),
                dataType: "json",
                success:function(data){
                    if(data.status =="success"){
                        $('.num_field').hide();
                        $('.ajax_loader').hide();
                        $('#spoof_number').html(data.csr_spoof_number);
                    } else {
                        alert("Error Occured");
                    }
                }
            });
        }
    }