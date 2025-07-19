<?php
function include_helper($name = '')
{
    global $global;
    require_once($global['rootPath'] . '/helpers/' . $name . '_helper.php');
}

function _apiCallForCDS($post = array(), $type = 'cds')
{    /*## GETING LANDING PAGE INFO*/
    $responseData = array();
    $post['format'] = 'json';
    $post['request_type'] = $type;
    global $global;
    $url = $global['cds_api'];
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
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);    /*Fetch and return content*/
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode(($response));
    if($response) {
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
} ?>