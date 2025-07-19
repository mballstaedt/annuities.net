<?php
$expire = time() + 60 * 60 * 24 * 30;
/* # FIX #1: url params to cookie */
parse_str($_SERVER['QUERY_STRING'], $queryString);
/* As per Ticket #252 check cookies in the base of campaign Id */
if (isset($queryString['utm_medium']) && isset($queryString['utm_campaignid']) && isset($queryString['utm_adgroupid'])) {
    $_COOKIE["cid"] = isset($queryString['cid']) ? $queryString['cid'] : 0;
}
$_COOKIE["SOURCE_MEDIUM"] = isset($queryString['utm_medium']) ? $queryString['utm_medium'] : (isset($_COOKIE["SOURCE_MEDIUM"]) ? $_COOKIE["SOURCE_MEDIUM"] : '');
$_COOKIE["SOURCE_ENGINE"] = isset($queryString['utm_engine']) ? $queryString['utm_engine'] : (isset($_COOKIE["SOURCE_ENGINE"]) ? $_COOKIE["SOURCE_ENGINE"] : '');
$_COOKIE["SOURCE_UTM"] = isset($queryString['utm_source']) ? $queryString['utm_source'] : (isset($_COOKIE["SOURCE_UTM"]) ? $_COOKIE["SOURCE_UTM"] : '');
$_COOKIE["SOURCE_CAMPAIGN_ID"] = isset($queryString['utm_campaignid']) ? $queryString['utm_campaignid'] : (isset($_COOKIE["SOURCE_CAMPAIGN_ID"]) ? $_COOKIE["SOURCE_CAMPAIGN_ID"] : '');
$_COOKIE["SOURCE_CAMPAIGN"] = isset($queryString['utm_campaign']) ? $queryString['utm_campaign'] : (isset($_COOKIE["SOURCE_CAMPAIGN"]) ? $_COOKIE["SOURCE_CAMPAIGN"] : '');
$_COOKIE["SOURCE_ADGROUP_ID"] = isset($queryString['utm_adgroupid']) ? $queryString['utm_adgroupid'] : (isset($_COOKIE["SOURCE_ADGROUP_ID"]) ? $_COOKIE["SOURCE_ADGROUP_ID"] : '');
$_COOKIE["SOURCE_ADGROUP"] = isset($queryString['utm_adgroup']) ? $queryString['utm_adgroup'] : (isset($_COOKIE["SOURCE_ADGROUP"]) ? $_COOKIE["SOURCE_ADGROUP"] : '');
$_COOKIE["SOURCE_CONTENT"] = isset($queryString['utm_content']) ? $queryString['utm_content'] : (isset($_COOKIE["SOURCE_CONTENT"]) ? $_COOKIE["SOURCE_CONTENT"] : '');
$_COOKIE["SOURCE_TERM_ID"] = isset($queryString['utm_termid']) ? $queryString['utm_termid'] : (isset($_COOKIE["SOURCE_TERM_ID"]) ? $_COOKIE["SOURCE_TERM_ID"] : '');
$_COOKIE["SOURCE_TERM"] = isset($queryString['utm_term']) ? $queryString['utm_term'] : (isset($_COOKIE["SOURCE_TERM"]) ? $_COOKIE["SOURCE_TERM"] : '');
$_COOKIE["SOURCE_NETWORK"] = isset($queryString['Network']) ? $queryString['Network'] : (isset($_COOKIE["SOURCE_NETWORK"]) ? $_COOKIE["SOURCE_NETWORK"] : '');
$_COOKIE["SOURCE_NOTE"] = isset($queryString['Note']) ? $queryString['Note'] : (isset($_COOKIE["SOURCE_NOTE"]) ? $_COOKIE["SOURCE_NOTE"] : '');
/* ## getting value of GCLID & GCLIC */
$_COOKIE["gclid"] = isset($queryString['gclid']) ? $queryString['gclid'] : (isset($_COOKIE["gclid"]) ? $_COOKIE["gclid"] : '');
$_COOKIE["gclic"] = isset($queryString['gclic']) ? $queryString['gclic'] : (isset($_COOKIE["gclic"]) ? $_COOKIE["gclic"] : '');
$_COOKIE["msclkid"] = isset($queryString['msclkid']) ? $queryString['msclkid'] : (isset($_COOKIE["msclkid"]) ? $_COOKIE["msclkid"] : '');
$_COOKIE["HTTP_REFERER"] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : (isset($_COOKIE["HTTP_REFERER"]) ? $_COOKIE["HTTP_REFERER"] : '');
/*## Ticket #314 task starts*/
$_COOKIE["referrer"] = isset($queryString['referrer']) ? $queryString['referrer'] : (isset($_COOKIE["referrer"]) ? $_COOKIE["referrer"] : '');
$_COOKIE["placement"] = isset($queryString['placement']) ? $queryString['placement'] : (isset($_COOKIE["placement"]) ? $_COOKIE["placement"] : '');
$_COOKIE["mobile"] = isset($queryString['mobile']) ? $queryString['mobile'] : (isset($_COOKIE["mobile"]) ? $_COOKIE["mobile"] : '');
$_COOKIE["device"] = isset($queryString['device']) ? $queryString['device'] : (isset($_COOKIE["device"]) ? $_COOKIE["device"] : '');
$_COOKIE["devicemodel"] = isset($queryString['devicemodel']) ? $queryString['devicemodel'] : (isset($_COOKIE["devicemodel"]) ? $_COOKIE["devicemodel"] : '');
$_COOKIE["match"] = isset($queryString['match']) ? $queryString['match'] : (isset($_COOKIE["match"]) ? $_COOKIE["match"] : '');
$_COOKIE["adposition"] = isset($queryString['adposition']) ? $queryString['adposition'] : (isset($_COOKIE["adposition"]) ? $_COOKIE["adposition"] : '');
/*## Ticket #314 task Ends Here*/
/*## Ticket #315 task starts*/
$_COOKIE["bidmatch"] = isset($queryString['bidmatch']) ? $queryString['bidmatch'] : (isset($_COOKIE["bidmatch"]) ? $_COOKIE["bidmatch"] : '');
$_COOKIE["keywordid"] = isset($queryString['keywordid']) ? $queryString['keywordid'] : (isset($_COOKIE["keywordid"]) ? $_COOKIE["keywordid"] : '');
/*## Ticket #315 task Ends Here*/

/* # FIX #2: referrer + seo keywords */
$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$referrer_query = parse_url($referrer);
if (isset($referrer_query['host']) && strpos($referrer_query['host'], str_replace("www.", "", $_SERVER['HTTP_HOST'])) === false) {
    $q = "[q|p|qkw|key|query|searchfor|Keywords|searchterm]";
    preg_match('/' . $q . '=(.*?)&/', $referrer, $keyword);
    $keyword = urldecode($keyword[1]);
    $potongnya = array('&q=', '&p=', 'key=', 'query=', 'searchfor=', 'Keywords=', 'searchterm=');
    $referrer_query['query'] = str_replace($potongnya, "&|pencarian=", $referrer_query['query']);
    $arr = explode("&", $referrer_query['query']);
    for ($k = 0, $l = count($arr); $k < $l; ++$k) {
        $ygdicari = "$arr[$k]";
        $findmeyach = "|pencarian=";
        $posnyaaa = strpos($ygdicari, $findmeyach);
        if ($posnyaaa !== false) {
            $keyword = str_replace('|pencarian=', "", $ygdicari);
            $potongkeynya = array('+', '%20');
            $keyword = str_replace($potongkeynya, " ", $keyword);
        }
    }
    if ($keyword == "") {
        $potongnya = array('q=', 'p=');
        $referrer_query['query'] = str_replace($potongnya, "&|pencarian=", $referrer_query['query']);
        $arr = explode("&", $referrer_query['query']);
        for ($k = 0, $l = count($arr); $k < $l; ++$k) {
            $ygdicari = $arr[$k];
            $findmeyach = "|pencarian=";
            $posnyaaa = strpos($ygdicari, $findmeyach);
            if ($posnyaaa !== false) {
                $keyword = str_replace('|pencarian=', "", $ygdicari);
                $potongkeynya = array('+', '%20');
                $keyword = str_replace($potongkeynya, " ", $keyword);
            }
        }
    }
    $keyword = strtolower($keyword);
    $urikeyword = array('free ', 'cheap ', 'job', ', ', 'jobs ', 'career ', 'http://www.', 'http://', 'http', 'gamble', '"', "'");
    $keyword = str_replace($urikeyword, "", "$keyword");
    $keyword = preg_replace("[^A-Za-z0-9 ]", "", urldecode(urldecode($keyword)));
    $keyword = empty($keyword) ? (isset($_COOKIE['SEO_Keyword']) ? $_COOKIE['SEO_Keyword'] : '') : $keyword;
    $_COOKIE["SEO_Keyword"] = $keyword;
    $_COOKIE["SEO_Engine"] = $referrer_query['host'];
} elseif (!isset($referrer_query['host'])) {
    $_COOKIE["SEO_Keyword"] = isset($_COOKIE['SEO_Keyword']) ? $_COOKIE['SEO_Keyword'] : '';
    $_COOKIE["SEO_Engine"] = isset($_COOKIE['SEO_Engine']) ? $_COOKIE['SEO_Engine'] : '';
}
/*# UPDATE COOKIE*/
$_temp_cookie = $_COOKIE;
setcookie(FALSE);
foreach ($_temp_cookie as $cookie_key => $cookie_val)
    setcookie($cookie_key, $cookie_val, $expire, '/');
?>