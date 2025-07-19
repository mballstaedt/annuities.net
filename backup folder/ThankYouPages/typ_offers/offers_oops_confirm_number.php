<div class="section_sm2">
    <div class="thanks-text fs18">
        Oops! Our System was not able to validate your phone number...
    </div>

</div>
<form id="invalid_form" name="invalid_form"
      action="<?php echo $global['confirm_number_post_url'];?>" method="post">
    <input type="hidden" id="lead_id" name="lead_id" value="<?php echo $id; ?>"/>

    <div class="thanks-text fs18">
        What is the best number to reach you on?
        <span class="input-box"><input type="text" name="best_number" id="best_number" value=""/></span>
        <span class="btn-box"><input type="button" value="submit >>" onclick="validateInvalidOffer();"/></span>
    </div>
</form>
<?php
## lead's age is greater or equal to 62 years then setting  $typ_vl_type=1
## According to new uipdates pages always ll be redirect to new page where user can see CSR's spoof number
$typ_vl_type = 1;
//if ($age >= 62) {
//    $typ_vl_type = 1;//if lead's age is greater or equal to 62 years then setting  $typ_vl_type=1
//} elseif ($age <= 61) {
//    $typ_vl_type = 2;// if lead's age is less than 62 years then setting  $typ_vl_type=2
//}
/* Test Flag For testing new Server */
$testFlag='';
if(isset($_REQUEST['dev'])&&$_REQUEST['dev']>0){
    $testFlag="&dev=1";
}
$phone_day = ($phone_day) ? phoneFormate($phone_day) : '';

$lp = ($_REQUEST['lp']) ? $_REQUEST['lp'] : '';
$url = $global['home_link']."ThankYouPages/?lp=$lp&vl_type=$typ_vl_type&lead_id=$lead_id&f=1".$testFlag;// setting value of " f " to identify resubmission of a lead
?>
<div class="thanks-text m20 fs18">if "<?php echo $phone_day; ?>" is the best number,please<a
        href="<?php echo $url; ?>">CLICK HERE</a></div>
<div class="thanks-text m20 fs18">
    Don't worry -we don't share this number with ANYONE, however we must have an <br/>accurate phone number as
    we are required to confirm your information before delivery
</div>
