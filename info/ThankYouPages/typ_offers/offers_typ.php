<div class="p-main-box-data">
    <div class="p-form-box-main">
        <div class="box-main-bg">
            <div class="box-inner1"> &nbsp;</div>
            <div class="box-inner"><div class="box-main-header-col">
                <div class="thanku-heading">THANK YOU FOR YOUR REQUEST</div>
                <div class="value-time">We will follow-up shortly to confirm your information.</div>
                    <div class="calling-box">
                        <span>Watch for our call from: <a id="spoof_number"> <?php echo($csrSpoofNumber)?phoneFormate($csrSpoofNumber):'';?></a></span>
                    </div>
                    <div class="call-num">If you'd like to provide an alternative number for us to call: <a href="javascript:void(0);" id="clickHere">CLICK HERE</a></div>
                    <div class="call-num num_field" style="display: none;"><form id="valid_form" name="valid_form"
                                                                                 action="<?php echo $global['confirm_number_post_url'];?>" method="post">
                            <input type="hidden" id="lead_id" name="lead_id" value="<?php echo $id; ?>"/>
                            <input type="hidden" id="is_valid" name="is_valid" value=1/>

                            <div class="call-num">
                                What is the best number to reach you on?
                                <span class="input-box"><input type="text" name="best_number" id="best_number" value=""/></span>
                                <span class="btn-box"><input type="button" value="submit >>" onclick="best_num();"/></span>
                                <div class="ajax_loader" style="display: none"><img src="<?php echo $global['TYP_rootPath'] ?>images/ajax-loader.gif"/></div>
                            </div>
                        </form></div>
                </div>
                <div class="clr"></div>


                <div id="set_message" style="color: #f98e00;text-align: center"></div>

                <div class="detail-box-col1">
                    <div class="arrow-small"><img src="<?php echo $global['home_link'] ?>ThankYouPages/typ_styles/images/arrow-small.png" width="34" height="61" alt="arrow" /></div>
                    <div class="detail-col-headingbox">Why we need two minutes of your time...</div>
                    <div class="detail-col-detailbox">
                        In order to help customize your annuity quotes so that they are suitable for your financial needs, we will need to ask you a few questions. We ask no sensitive, private information, but need to understand your needs and desires for retirement income as this may affect the type of quotes our system will generate for you.
                    </div>
                    <div class="detail-col-detailbox">
                        <b>Remember, our services are free and there is never any obligation.</b>  Our trusted annuity experts are here to help you with your retirement income strategies. Let us licensed professionals provide you with the information you need to make an informed decision. The time you spend with us could change the way you retire… for the better!
                    </div>
                    
                    

                </div>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <?php if($flagTrunOffUpsellOffers ){?>
        <div class="truste-ptext">Your profile also entitles you to the following <a>FREE</a> offers from our trusted partners:</div>
    <?php } ?>
</div>
<script type="text/javascript">

    $(document).ready(function () {


        $('#clickHere').click(function () {
            $('.num_field').toggle();
        });
    });



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

</script>