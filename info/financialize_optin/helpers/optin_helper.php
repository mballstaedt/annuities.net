<?php
function optinAPICallURL($url = '' , $optin_id = 1, $data = array())
{
    echo '<script>var optinAjaxURL = "' . $url . '";</script>';
    echo '<script>var optinId = "' . $optin_id . '";</script>';
    echo '<script>var cid = "' . (isset($data['cid']) ? $data['cid'] : 0) . '";</script>';
}

function optinJS()
{
    global $global;
    $optinHtml = '';
//    $optinHtml .= '<script type="text/javascript" src="'.$global['home_link'].'financialize_optin/js/jquery.min.js"></script>'; /* Don't include if already included*/
    $optinHtml .= '<script type="text/javascript" src="' . $global['home_link'] . 'financialize_optin/js/custom.js"></script>';
    return $optinHtml;
}

/* Optin API Client Call */
function optin_api_call()
{
    $post = array_merge($_REQUEST, $_SERVER);
    /* Optin File get Content Structure */
    $post['type'] = 'file_get_content';/* Set Optin Type if any defined */
    $post['code'] = 'optin_sample';/* Set Optin Code if any defined */
    /* Optin DB resources Structure */
    $post['type'] = 'db_resources';/* Set Optin Type if any defined */
    $post['optin_id'] = (isset($_REQUEST['optin_id']) && intval($_REQUEST['optin_id']) > 0) ? intval($_REQUEST['optin_id']) : 1;/* Set Optin id if any defined */
    $post['domain_id'] = '10';/* Set domain ID for logs */
    $post['is_lp'] = '1';/* Set 1 if Landing page Site */
    $post['format'] = 'json';
    $post['response_format'] = 'json';/* To get Response in the form of Json set this field */
    $url = 'https://admin.financialize.com/financialize_optin/optin_api.php';
    if ($post['is_form_submit'] == 1)
        $url = 'https://admin.financialize.com/api/cds_form.php';
    /* Make Curl Call */
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);            // No header in the result
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
    curl_setopt($ch, CURLOPT_POST, 1);              // This is a POST request
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $responseData = array('status' => 'error', 'message' => 'something wrong with the system.');
    // Fetch and return content
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode(($response));
    foreach ($response as $key => $val) {
        $responseData[$key] = $val;
    }
    return $responseData;
}

?>