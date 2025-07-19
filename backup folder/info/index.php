<?php
include_once('includes/config.php');
$dataRequest = $_REQUEST;
$postData = array_merge($dataRequest, $_SERVER);
/******************************************************************
 **** Ticket #313 || Detect Request DeviceType *******************
 ****************************************************************/
if (!isset($postData['device_type'])) {
    include_once('classes/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $postData['device_type'] = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'computer');

}
/*######################## END #################################*/

if (_apiCallForCampaignSpendCost($postData)) {
    require_once('reader.php');
    if ($googleParameters) {
        foreach ($googleParameters as $key => $val) {
            $postData['google_parameters[' . $key . ']'] = $val;
        }
    }
}
$landingPageData = _apiCallForLandingPage($postData);
/* ## According to email Fwd: URL mapping at 4.10.15 */
if (isset($dataRequest['fname'])) {
    $dataRequest['first_name'] = $dataRequest['fname'];
}
if (isset($dataRequest['lname'])) {
    $dataRequest['last_name'] = $dataRequest['lname'];
}
$default_metaTags = '<meta name="viewport" content="width=device-width, initial-scale=1"/>';

if (isset($landingPageData['api_status']) && $landingPageData['api_status'] == 'success') {
    $pageId = (isset($landingPageData['id'])) ? $landingPageData['id'] : 0;
    $pageTitle = (isset($landingPageData['title'])) ? $landingPageData['title'] : '';
    $pageName = (isset($landingPageData['url'])) ? $landingPageData['url'] : '';
    $lpBodyContent = (isset($landingPageData['body'])) ? $landingPageData['body'] : '';
    $lpBrowserTitle = (isset($landingPageData['browser_title']) && $landingPageData['browser_title'] != '') ? $landingPageData['browser_title'] : 'Annuities.com - Free Annuity Rate Quotes';
    $lpMetaTags = (isset($landingPageData['meta_tags']) && $landingPageData['meta_tags'] != '') ? html_entity_decode($landingPageData['meta_tags']) : $default_metaTags;
    $lpFaviconLogo = (isset($landingPageData['domain_favicon']) && $landingPageData['domain_favicon'] != '') ? $landingPageData['domain_favicon'] :  $global['home_link'] .'images/favicon.ico';
    $campaignId = (isset($landingPageData['cid'])) ? $landingPageData['cid'] : $dataRequest['cid'];
    $affId = (isset($landingPageData['aff_id'])) ? $landingPageData['aff_id'] : $dataRequest['aff_id'];
    $next_lp_id = (isset($landingPageData['next_lp_id'])) ? $landingPageData['next_lp_id'] : $dataRequest['next_lp_id'];
    $scriptsData = (isset($landingPageData['scripts'])) ? $landingPageData['scripts'] : array();
    $lpExitPopup = (isset($landingPageData['exit_popup_id']) && $landingPageData['exit_popup_id'] > 0) ? $landingPageData['exit_popup_id'] : 0;
    $cssFileName = (isset($landingPageData['css_file_name']) && $landingPageData['css_file_name']!='') ? $landingPageData['css_file_name'] : 'lp-content';
    if(isset($_REQUEST['dev_test_1'])&&$_REQUEST['dev_test_1']==1) {
        echo "<pre>";
        print_r($dataRequest);
        echo "</pre>";
        echo "<pre>";
        print_r($landingPageData);
        echo "</pre>";
    }
    /* ## Inserted ID of Google Parameters ##*/
    $googleParametersId = (isset($landingPageData['google_parameters_id'])) ? $landingPageData['google_parameters_id'] : 0;
    if ($pageId && $pageName) {
        $file = $global['rootPath'] . "LandingPages/$pageName.php";
        if (file_exists($file)) {
            include_once $global['rootPath'] . "LandingPages/$pageName.php";
        }
    }
}
exit();