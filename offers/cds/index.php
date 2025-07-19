<?php
include_once('../includes/config.php');
$dataRequest = $_REQUEST;
$postData = array_merge($dataRequest, $_SERVER);
/******************************************************************
 **** Ticket #504 || Detect Request DeviceType *******************
 ****************************************************************/
if (!isset($postData['device_type'])) {
    include_once('../classes/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $postData['device_type'] = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'computer');

}

$cdsLandingPageData = _apiCallForCDS($postData);

if (isset($cdsLandingPageData['api_status']) && $cdsLandingPageData['api_status'] == 'success') {
    
    $pageId = (isset($cdsLandingPageData['id'])) ? $cdsLandingPageData['id'] : 0;
    $pageTitle = (isset($cdsLandingPageData['title'])) ? $cdsLandingPageData['title'] : '';
    $pageName = (isset($cdsLandingPageData['url'])) ? $cdsLandingPageData['url'] : '';
    $lpBodyContent = (isset($cdsLandingPageData['body'])) ? $cdsLandingPageData['body'] : '';
    $campaignId = (isset($cdsLandingPageData['cid'])) ? $cdsLandingPageData['cid'] : $dataRequest['cid'];
    $affId = (isset($cdsLandingPageData['aff_id'])) ? $cdsLandingPageData['aff_id'] : $dataRequest['aff_id'];
    $lead_id = (isset($cdsLandingPageData['lead_id'])) ? $cdsLandingPageData['aff_id'] : $dataRequest['lead_id'];
    $cds_email_log_id = (isset($cdsLandingPageData['cds_email_log_id'])) ? $cdsLandingPageData['cds_email_log_id'] : $dataRequest['cds_email_log_id'];
    
    if(isset($_REQUEST['dev_test_1'])&&$_REQUEST['dev_test_1']==1) {
        echo "<pre>";
        print_r($dataRequest);
        echo "</pre>";
        echo "<pre>";
        print_r($cdsLandingPageData);
        echo "</pre>";
        exit();
    }
    if ($pageId && $pageName) {
        $file = $global['rootPath'] . "cds/$pageName.php";
        if (file_exists($file)) {
            include_common_js();
            include_once $global['rootPath'] . "cds/$pageName.php";
        }
    }
} else {
    // Ticket #641
    include_once('error.php');
}
exit();