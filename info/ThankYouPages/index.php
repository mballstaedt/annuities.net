<?php
include_once('../includes/config.php');
$dataRequest = $_REQUEST;
//if($_SERVER['REMOTE_ADDR'] == '202.166.163.4'){
//    // for pl dev team 
//    $landingPageData = _apiCallForLandingPage($dataRequest, 'thankyoupage_dev');
//}else {
//    $landingPageData = _apiCallForLandingPage($dataRequest, 'thankyoupage');
//}

$landingPageData = _apiCallForLandingPage($dataRequest, 'thankyoupage');
$postData = $dataRequest;

/*## According to tech Work 3.5.15Can we take off the two upsell offers (Search Feed for < 62 years old, and Reverse Mortgage for < 62)?  We keep the main body of the thank you page of course, and the footer...just take off the part starting with "Your profile also entitles you...".*/
$flagTrunOffUpsellOffers = false;
if (isset($dataRequest['lead_id']) && $dataRequest['lead_id'] != '') {
    $lead_id = ($dataRequest['lead_id']) ? $dataRequest['lead_id'] : 0;
} elseif (isset($dataRequest['pfid']) && $dataRequest['pfid'] != '') {
    $lead_id = ($dataRequest['pfid']) ? $dataRequest['pfid'] : 0;
}
$id = ($lead_id) ? base64_decode(urldecode($lead_id)) : 0;

if (isset($landingPageData['api_status']) && $landingPageData['api_status'] == 'success') {
    $pageId = (isset($landingPageData['id'])) ? $landingPageData['id'] : 0;
    $pageTitle = (isset($landingPageData['title'])) ? $landingPageData['title'] : '';
    $pageName = (isset($landingPageData['url'])) ? $landingPageData['url'] : '';
    $lpBodyContent = (isset($landingPageData['body'])) ? $landingPageData['body'] : '';
    $campaignId = (isset($landingPageData['cid'])) ? $landingPageData['cid'] : $dataRequest['cid'];
    $code = (isset($landingPageData['pixel_code'])) ? $landingPageData['pixel_code'] : '';
    $phone_day = (isset($landingPageData['phone_day'])) ? $landingPageData['phone_day'] : '';
    $csrSpoofNumber = (isset($landingPageData['csr_spoof_number'])) ? $landingPageData['csr_spoof_number'] : '';
    $email = (isset($landingPageData['email'])) ? $landingPageData['email'] : '';
    $age = (isset($landingPageData['age'])) ? $landingPageData['age'] : '';
    $logId = (isset($landingPageData['log_id'])) ? $landingPageData['log_id'] : 0;
    $scriptsData = (isset($landingPageData['scripts'])) ? $landingPageData['scripts'] : array();
    
    if ($pageId && $pageName) {
        $file = $global['rootPath'] . "ThankYouPages/$pageName.php";
        if (file_exists($file)) {
            include_common_js();
            include_once $global['rootPath'] . "ThankYouPages/$pageName.php";
        }
    }
}
exit();