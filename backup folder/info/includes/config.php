<?php

if($_SERVER['SERVER_PORT'] == 443 || (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'))
{
	if( !defined("HTTP_PREFIX_STR") )
		define( "HTTP_PREFIX_STR", "https://");
} else {
	if( !defined("HTTP_PREFIX_STR") )
		define( "HTTP_PREFIX_STR", "http://");
}

global $global;
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $global['home_link'] = HTTP_PREFIX_STR . $_SERVER['SERVER_NAME'].'/';
    $global['annuity_home_link'] = HTTP_PREFIX_STR . 'www.annuities.net/info';
    $global['form_post_url'] = HTTP_PREFIX_STR . 'www.annuities.net/info';
    $global['confirm_number_post_url'] = HTTP_PREFIX_STR . 'www.annuities.net/info';
    $global['rootPath'] = '/public_html/test/';
} else {    
	## LIVE NEW SERVER
	$global['home_link'] = HTTP_PREFIX_STR . $_SERVER['SERVER_NAME'].'/info/';
	$global['api_url'] = 'https://admin.financialize.com/api/';
	$global['cds_form_url'] = $global['api_url'] . 'cds_form.php';
	$global['LP_api_link'] = $global['api_url'] . 'landingpages.php';
	$global['dev_api_link'] = $global['api_url'] . 'dev_api.php';
	$global['cds_api'] = $global['api_url'] . 'cds_api.php';
	$global['form_post_url'] = $global['api_url'] . 'lead_post.php';
	$global['confirm_number_post_url'] = $global['api_url'] . 'invalid_form.php';
	$global['ajax_url'] = $global['api_url'] . 'ajax.php';
	$global['rootPath'] = '/var/www/anuitiesnt/info/';
	
	date_default_timezone_set('America/Los_Angeles');
}
require_once($global['rootPath'] . 'includes/common_includes.php');
?>