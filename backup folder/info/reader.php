<?php
$googleParameters = array();
require_once('tracking.php');
if (isset($_COOKIE["cid"]) && intval($_COOKIE["cid"]) == intval($_REQUEST['cid'])) {
    $googleParameters['seo_engine'] = isset($_COOKIE["SEO_Engine"]) ? urlencode($_COOKIE["SEO_Engine"]) : null;
    $googleParameters['seo_keyword'] = isset($_COOKIE["SEO_Keyword"]) ? urlencode($_COOKIE["SEO_Keyword"]) : null;
    $googleParameters['source_medium'] = isset($_COOKIE["SOURCE_MEDIUM"]) ? urlencode($_COOKIE["SOURCE_MEDIUM"]) : null;
    $googleParameters['source_engine'] = isset($_COOKIE["SOURCE_ENGINE"]) ? urlencode($_COOKIE["SOURCE_ENGINE"]) : null;
    $googleParameters['utm_source'] = isset($_COOKIE["SOURCE_UTM"]) ? urlencode($_COOKIE["SOURCE_UTM"]) : null;
    $googleParameters['utm_campaignid'] = isset($_COOKIE["SOURCE_CAMPAIGN_ID"]) ? urlencode($_COOKIE["SOURCE_CAMPAIGN_ID"]) : null;
    $googleParameters['source_campaign'] = isset($_COOKIE["SOURCE_CAMPAIGN"]) ? urlencode($_COOKIE["SOURCE_CAMPAIGN"]) : null;
    $googleParameters['utm_adgroupid'] = isset($_COOKIE["SOURCE_ADGROUP_ID"]) ? urlencode($_COOKIE["SOURCE_ADGROUP_ID"]) : null;
    $googleParameters['source_adgroup'] = isset($_COOKIE["SOURCE_ADGROUP"]) ? urlencode($_COOKIE["SOURCE_ADGROUP"]) : null;
    $googleParameters['source_content'] = isset($_COOKIE["SOURCE_CONTENT"]) ? urlencode($_COOKIE["SOURCE_CONTENT"]) : null;
    $googleParameters['utm_termid'] = isset($_COOKIE["SOURCE_TERM_ID"]) ? urlencode($_COOKIE["SOURCE_TERM_ID"]) : null;
    $googleParameters['source_term'] = isset($_COOKIE["SOURCE_TERM"]) ? urlencode($_COOKIE["SOURCE_TERM"]) : null;
    $googleParameters['source_network'] = isset($_COOKIE["SOURCE_NETWORK"]) ? urlencode($_COOKIE["SOURCE_NETWORK"]) : null;
    $googleParameters['source_note'] = isset($_COOKIE["SOURCE_NOTE"]) ? urlencode($_COOKIE["SOURCE_NOTE"]) : null;
    /*    ## getting value of GCLID & GCLIC*/
    $googleParameters['msclkid'] = isset($_COOKIE["msclkid"]) ? urlencode($_COOKIE["msclkid"]) : null;
    $googleParameters['gclid'] = isset($_COOKIE["gclid"]) ? urlencode($_COOKIE["gclid"]) : null;
    $googleParameters['gclic'] = isset($_COOKIE["gclic"]) ? urlencode($_COOKIE["gclic"]) : null;
    $googleParameters['referer'] = isset($_COOKIE["HTTP_REFERER"]) ? urlencode($_COOKIE["HTTP_REFERER"]) : null;
    /*## Ticket #314 task starts*/
    $googleParameters["new_referrer"] = isset($_COOKIE["referrer"]) ? $_COOKIE["referrer"] : null;
    $googleParameters["placement"] = isset($_COOKIE["placement"]) ? $_COOKIE["placement"] : null;
    $googleParameters["mobile"] = isset($_COOKIE["mobile"]) ? $_COOKIE["mobile"] : null;
    $googleParameters["device"] = isset($_COOKIE["device"]) ? $_COOKIE["device"] : null;
    $googleParameters["devicemodel"] = isset($_COOKIE["devicemodel"]) ? $_COOKIE["devicemodel"] : null;
    $googleParameters["match"] = isset($_COOKIE["match"]) ? $_COOKIE["match"] : null;
    $googleParameters["adposition"] = isset($_COOKIE["adposition"]) ? $_COOKIE["adposition"] : null;
    /*## Ticket #314 task Ends Here*/
    /*## Ticket #314 task starts*/
    $googleParameters["bidmatch"] = isset($_COOKIE["bidmatch"]) ? $_COOKIE["bidmatch"] : null;
    $googleParameters["keywordid"] = isset($_COOKIE["keywordid"]) ? $_COOKIE["keywordid"] : null;
    /*## Ticket #314 task Ends Here*/
}
?>



