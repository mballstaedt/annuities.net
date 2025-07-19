<?php require_once('typ_header.php'); ?>
<body><?php
/*## According to tech Work 3.5.15Can we take off the two upsell offers (Search Feed for < 62 years old, and Reverse Mortgage for < 62)?  We keep the main body of the thank you page of course, and the footer...just take off the part starting with "Your profile also entitles you...".*/
$flagTrunOffUpsellOffers = false;
if (isset($_REQUEST['lead_id']) && $_REQUEST['lead_id'] != '') {
    $lead_id = ($_REQUEST['lead_id']) ? $_REQUEST['lead_id'] : 0;
} elseif (isset($_REQUEST['pfid']) && $_REQUEST['pfid'] != '') {
    $lead_id = ($_REQUEST['pfid']) ? $_REQUEST['pfid'] : 0;
}
$id = ($lead_id) ? base64_decode(urldecode($lead_id)) : 0; ?>
<div class="p-container">
    <div class="p-header-main">
        <div class="p-logo-box"><img src="<?php echo $global['home_link']; ?>images/annuity-logo.jpg" alt="annuity-logo"
                                     width="250px"/></div>
        <div class="p-trusted-source">The Most Trusted Source for Annuities</div>
        <div class="clr"></div>
    </div> <?php if (isset($postData['etype']) && $postData['etype'] == 1) { ?>
        <div class="section_sm2">
            <div class="thanks-text fs18"> Email Address already exists.<br><br>                </span> <a
                    href="javascript:void(0);" onclick="window.history.go(-1); return false;">Go Back</a></span>
            </div>
        </div>        <?php } elseif (isset($postData['etype']) && $postData['etype'] == 2) { ?>
        <div class="section_sm2">
            <div class="thanks-text fs18"><span style="color:#696969;"><span
                        style="font-size: 22px;">Error on post! </span></span><br><br>
                <p>We're sorry. The phone number you entered appears to be invalid. We require a valid phone number for
                    the security of service. Please enter an alternative number and re-submit. If the number you entered
                    is correct, simply re-submit information again. We apologize for any inconvenience this may
                    cause.</p> <br></span> <a href="javascript:void(0);"
                                              onclick="window.history.go(-1); return false;">Go
                    Back</a></span>            </div>
        </div>
    <?php } elseif (($postData['vl_type'] == 1 && $age >= 62 && !isset($_REQUEST['f']) && $flagTrunOffUpsellOffers) || $postData['vl_type'] == 'dev_mode') {        /*Reverse Motgage offer Section/page         to get this page without any valid lead or for any test lead set vl_type as dev_mode        this page appears when a valid leads comes to our system has age greater or equal to 62 years         f is to identify it was a invalid resubmitted lead*/
        require_once('typ_offers/offers_reverse_mortgage.php');
    } elseif ($postData['vl_type'] == 1) {
        /*if lead's age is greater or equal to 62 years then $typ_vl_type will be equal to 1*/
        require_once('typ_offers/offers_typ.php'); ?><?php if ($age < 62 && $flagTrunOffUpsellOffers) { ?>
            <iframe
                src="<?php echo HTTP_PREFIX_STR; ?>affiliate.sjmtracker.com/rd/r.php?sid=91&pub=570046<?php echo '&c1=' . $campaignId . '&c2=' . $id; ?>&c3="
                height="900" width="940"
                style=""></iframe>        <?php } ?><?php } elseif ($postData['vl_type'] == 2) {
        /* if lead's age is less to 62 years then $typ_vl_type will be equal to 2
           According to new updates this condition will not be render According to email(Thank You Page Follow Up) of Allison on 27 feb 2015*/ ?>
        <div class="section_sm2">
            <div class="thanks_msg mtn"><span>Thank You!</span><br>
                <p>A representative will be in touch with you shortly to verify your information and get you your quote.<br>Great
                    News! You also qualify to receive the following FREE information from our partners:</p>
            </div> <?php if ($age < 62 && $flagTrunOffUpsellOffers) { ?>
                <iframe
                    src="<?php echo HTTP_PREFIX_STR; ?>affiliate.sjmtracker.com/rd/r.php?sid=91&pub=570046<?php echo '&c1=' . $campaignId . '&c2=' . $id; ?>&c3="
                    height="900" width="940" style=""></iframe>                <?php } ?>
            <div class="clear"></div>
        </div>    <?php } elseif ($postData['vl_type'] == 3) {        /* if a lead is invalid for that case this page will be appears*/
        require_once('typ_offers/offers_oops_confirm_number.php');
    }
    ?>
</div>
<?php require_once '../common_popup.php';/*## PIXEL CODE ##*/
if (trim($code)) {
    $code = html_entity_decode($code, ENT_QUOTES);
    $code = htmlspecialchars_decode($code, ENT_QUOTES);
    echo $code;
}
renderLPScripts($scriptsData, $htmlTagName = 'body_tag'); ?>
</body>
</html>