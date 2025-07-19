<?php
function include_helper($name = '')
{
    global $global;
    require_once($global['rootPath'] . '/helpers/' . $name . '_helper.php');
}

function _apiCallForLandingPage($post = array(), $type = 'landingpage')
{    /* ## GETING LANDING PAGE INFO*/
    $responseData = array();
    $post['format'] = 'json';
    $post['domain_id'] = 10;
    $post['request_type'] = $type;
    global $global;
    $url = $global['LP_api_link'];
    if ((isset($_REQUEST['dev_api']) && isset($global['dev_api_link'])) && $_REQUEST['dev_api'] == 1) {
        echo '<div class="red">*****************************<br>Dev Mod Activated<br>*****************************<br></div>';
        $url = $global['dev_api_link'];
    }
    $ch = curl_init();
    if (isset($post['dev_test']) && $post['dev_test'] == 1) {
        echo $url;
        echo "<br>Before Post Data:<pre>";
        print_r($post);
        echo "</pre> <br>After Post Data:";
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);            /* No header in the result*/
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); /* Return, do not echo result*/
    curl_setopt($ch, CURLOPT_POST, 1);              /* This is a POST request*/
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);    /* Fetch and return content*/
    $response = curl_exec($ch);
    curl_close($ch);

//    if ($type =='thankyoupage_dev') {
//        echo $url;
//        echo "<br>Response Data:<pre>";
//        print_r($response);
//        echo "</pre>";
//    }

    $response = json_decode(($response));
    if ($response) {
        foreach ($response as $key => $val) {
            $responseData[$key] = $val;
        }
    }

    if (isset($post['dev_test']) && $post['dev_test'] == 1) {
        echo $url;
        echo "<br>Response Data:<pre>";
        print_r($responseData);
        echo "</pre>";
    }
    return ($responseData) ? $responseData : array();
}

function _apiCallForCDS($post = array(), $type = 'cds')
{    /*## GETING LANDING PAGE INFO*/
    $responseData = array();
    $post['format'] = 'json';
    $post['request_type'] = $type;
    global $global;
    $url = $global['cds_api'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);            /* No header in the result*/
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); /* Return, do not echo result*/
    curl_setopt($ch, CURLOPT_POST, 1);              /* This is a POST request*/
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);    /*Fetch and return content*/
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode(($response));
    foreach ($response as $key => $val) {
        $responseData[$key] = $val;
    }
    return ($responseData) ? $responseData : array();
}

function _apiCallForCDS_old($post = array(), $type = 'cds')
{    /*## GETING LANDING PAGE INFO*/
    $responseData = array();
    $post['format'] = 'json';
    $post['request_type'] = $type;
    global $global;
    $url = $global['cds_api'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);            /* No header in the result*/
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); /* Return, do not echo result*/
    curl_setopt($ch, CURLOPT_POST, 1);              /* This is a POST request*/
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);    /*Fetch and return content*/
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode(($response));
    foreach ($response as $key => $val) {
        $responseData[$key] = $val;
    }
    return ($responseData) ? $responseData : array();
}


function phoneFormate($str)
{
    $str = str_replace(array('-', ' ', '(', ')'), '', $str);
    $str = '(' . substr($str, 0, 3) . ') ' . substr($str, 3, 3) . '-' . substr($str, 6, 5);
    return $str;
}

function formatInvestment($investment)
{
    if (trim($investment) == 'Morethan$1,000,000' || trim($investment) == 'More than $1,000,000') {
        return 'More than $1,000,000';
    } else if (trim($investment) == '$500,000 - $1million' || trim($investment) == '$500,000 - $1 Million') {
        return '$500,000 to $1 Million';
    } else if (trim($investment) == '$1million - $3million' || trim($investment) == '$1 Million - $3 Million') {
        return '$1 Million to $3 Million';
    } else if (trim($investment) == 'Morethan$3million' || trim($investment) == 'More than $3 million') {
        return 'More than $3 million';
    } else if (trim($investment) == 'No Money to Invest') {
        return 'No Money to Invest';
    } else if (trim($investment) == 'Declined to State') {
        return 'Declined to State';
    } else if (trim($investment) == 'Prefers to disclose to advisor') {
        return 'Prefers to disclose to advisor';
    } else {
        return str_replace('-', 'to', $investment);
    }
}

function getThankyouPageForm($id, $qualified)
{
    $ltype = 'p';
    if (isset($_REQUEST['ltype']) && $_REQUEST['ltype'] == 'p') {
        $ltype = 'p';
    }
    $homeType = array('Single_family' => 'Single Family', 'Multi_family' => 'Multi-Family', 'Condominium' => 'Condominium', 'Town_home' => 'Town Home', 'Duplex' => 'Duplex', 'Mobile_or_manufactured_home' => 'Mobile/Manufactured Home', 'COOP_in_NY' => 'COOP (Only Allowed in NY)');
    $homeValue = array('15000' => '$1 - $29,999', '35000' => '$30,000 - $39,999', '45000' => '$40,000 - $49,999', '55000' => '$50,000 - $59,999', '70000' => '$60,000 - $79,999', '90000' => '$80,000 - $99,999', '110000' => '$100,000 - $119,999', '130000' => '$120,000 - $139,999', '150000' => '$140,000 - $159,999', '170000' => '$160,000 - $179,999', '190000' => '$180,000 - $199,999', '210000' => '$200,000 - $219,999', '230000' => '$220,000 - $239,999', '250000' => '$240,000 - $259,999', '270000' => '$260,000 - $279,999', '290000' => '$280,000 - $299,999', '310000' => '$300,000 - $319,999', '330000' => '$320,000 - $339,999', '350000' => '$340,000 - $359,999', '370000' => '$360,000 - $379,999', '390000' => '$380,000 - $399,999', '410000' => '$400,000 - $419,999', '430000' => '$420,000 - $439,999', '450000' => '$440,000 - $459,999', '470000' => '$460,000 - $479,999', '490000' => '$480,000 - $499,999', '510000' => '$500,000 - $519,999', '530000' => '$520,000 - $539,999', '550000' => '$540,000 - $559,999', '570000' => '$560,000 - $579,999', '590000' => '$580,000 - $599,999', '610000' => '$600,000 - $619,999', '630000' => '$620,000 - $639,999', '650000' => '$640,000 - $659,999', '670000' => '$660,000 - $679,999', '690000' => '$680,000 - $699,999', '710000' => '$700,000 - $719,999', '730000' => '$720,000 - $739,999', '750000' => '$740,000 - $759,999', '770000' => '$760,000 - $779,999', '790000' => '$780,000 - $799,999', '810000' => '$780,000 - $799,999', '830000' => '$820,000 - $839,999', '850000' => '$840,000 - $859,999', '870000' => '$860,000 - $879,999', '890000' => '$880,000 - $899,999', '910000' => '$900,000 - $919,999', '930000' => '$920,000 - $939,999', '950000' => '$940,000 - $959,999', '970000' => '$960,000 - $979,999', '990000' => '$980,000 - $999,999', '1125000' => '$1,000,000 - $1,249,999', '1375000' => '$1,250,000 - $1,499,999', '1625000' => '$1,500,000 - $1,749,999', '1875000' => '$1,750,000 - $1,999,999', '2125000' => '$2,000,000 - $2,249,999', '2375000' => '$2,250,000 - $2,499,999', '2625000' => '$2,500,000 - $2,749,999', '2875000' => '$2,750,000 - $2,999,999', '3250000' => '$3,000,000 - $3,499,999', '3750000' => '$3,500,000 - $3,999,999', '4250000' => '$4,000,000 - $4,499,999', '4750000' => '$4,500,000 - $4,999,999', '5250000' => '$$5,000,000 - $5,499,999', '5750000' => '$5,500,000 - $5,999,999',);
    $form = '<div class="landingForm form_f5"><form method="post" id="_landingthankform"><input type="hidden" name="submit1"  />		<input type="hidden" name="uid" value="' . $id . '"  />		<input type="hidden" name="ltype" value="' . $ltype . '"  />		';
    $form .= '<div class="landingRow_finance">			<div class="landingLabel">House Type</div>			<div class="landingInput">				<select name="house_type" id="house_type" class="selectLanding">					<option selected="selected" value="">Select One</option>';
    foreach ($homeType as $key => $val) {
        $form .= '<option value="' . $key . '" >' . $val . '</option>';
    }
    $form .= ' </select>			</div>			<div class="clear"></div>		</div>';
    $form .= '<div class="landingRow_finance">			<div class="landingLabel">Home Value</div>			<div class="landingInput">				<select name="estimated_home_val" id="estimated_home_val" class="selectLanding">';
    foreach ($homeValue as $key => $val) {
        $sel = '';
        if ($key == '210000') $sel = 'selected="selected"';
        $form .= '<option value="' . $key . '" ' . $sel . '>' . $val . '</option>';
    }
    $form .= ' </select>			</div>			<div class="clear"></div>		</div>';
    $form .= '<div class="landingRow_finance">			<div class="landingLabel">Mortgage. Balance</div>			<div class="landingInput">				<select name="estimated_mortgage_bal" id="estimated_mortgage_bal" class="selectLanding">					<option value="" selected="selected">No Mortgage</option>';
    foreach ($homeValue as $key => $val) {
        $form .= '<option value="' . $key . '" >' . $val . '</option>';
    }
    $form .= ' </select>			</div>			<div class="clear"></div>		</div>';
    $form .= '<div class="finance_vaild_txt" style="margin:7px 0 10px 0;">	<div id="form-loader-image" style="text-align:center; display:none;"><img src="images/ajax-loader.gif"></div>	<div class="finance_compare_btn_FIT" style="margin-top:20px"><a onclick="popUpvalidateReverseMortageThankyouForm();" href="javascript:void(0)"></a></div>	<div class="form_botm_txt">		<p>Clicking on this button authorizes NewRetirement or affiliated lenders to contact me. This authorization overrides any prior preference placed with NewRetirement or affiliated lenders and any other association or registration of any phone number on federal, state or internal "do not call" list(s) owned by the mortgage brokers or lenders. </p>	</div></div>';
    $form .= '</form></div>';
    return $form;
}/*##   Code for Scripts   ##*/
function renderLPScripts($scriptsData, $htmlTagName = '')
{
    if (isset($_REQUEST['dev_test_']) && $_REQUEST['dev_test_']) {
        echo $htmlTagName . "<pre>";
        print_r($scriptsData);
        echo "</pre>";
    }
    if ($scriptsData && $htmlTagName != '') {
        foreach ($scriptsData as $data) {
            if ($data) {
                $script_ = '';
                if (isset($data->script_name) && htmlspecialchars_decode(html_entity_decode(trim($data->script_name), ENT_QUOTES), ENT_QUOTES) == 'optimizely' && $htmlTagName == 'head_tag') {
                    $script_ = htmlspecialchars_decode(html_entity_decode(trim(base64_decode($data->script_code)), ENT_QUOTES), ENT_QUOTES);
                    echo $script_;
                } elseif (isset($data->script_name) && htmlspecialchars_decode(html_entity_decode(trim($data->script_name), ENT_QUOTES), ENT_QUOTES) != 'optimizely' && $htmlTagName == 'body_tag') {
                    $script_ = htmlspecialchars_decode(html_entity_decode(trim(base64_decode($data->script_code)), ENT_QUOTES), ENT_QUOTES);
                    echo $script_;
                }
            }
        }
    }
}

function _apiCallForCampaignSpendCost($post = array(), $type = 'daily_spend')
{    /*## GETING LANDING PAGE INFO*/
    global $global;
    $responseData = array();
    $post['format'] = 'json';
    $post['request_type'] = $type;
    $url = $global['LP_api_link'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);            /* No header in the result*/
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); /* Return, do not echo result*/
    curl_setopt($ch, CURLOPT_POST, 1);              /* This is a POST request*/
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);    /* Fetch and return content*/
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode(($response));
    if ($response) {
        foreach ($response as $key => $val) {
            $responseData[$key] = $val;
        }
    }
    return ($responseData) ? $responseData : array();
}

function _apiCallForDevTest($post = array(), $type = 'dev_test')
{    /*## GETING LANDING PAGE INFO*/
    $responseData = array();
    $post['format'] = 'json';
    $post['request_type'] = $type;
    global $global;
    $url = $global['LP_api_link'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);            /* No header in the result*/
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); /* Return, do not echo result*/
    curl_setopt($ch, CURLOPT_POST, 1);              /* This is a POST request*/
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);    /* Fetch and return content*/
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode(($response));
    foreach ($response as $key => $val) {
        $responseData[$key] = $val;
    }
    return ($responseData) ? $responseData : array();
} ?>