<?php
include_once('../includes/config.php');
if (isset($_REQUEST['action']) && $_REQUEST['action'] != '') {
    $response = array('status' => 'error', 'html' => 'something wrong with system', 'message' => 'something wrong with system');
    $html = '';
    $message = '';
    global $global;
    switch ($_REQUEST['action']) {
        case 'step_2_graphic':
            $containerId = isset($_REQUEST['containerId']) ? trim($_REQUEST['containerId']) : 'common_popup_modal';
            $id = isset($_REQUEST['id']) ? trim($_REQUEST['id']) : '';
            $id = ($id != '') ? explode('|', $id) : array();
            $dob = isset($id[0]) ? $id[0] : 0;
            $city = isset($id[1]) ? $id[1] : '';
            $state = isset($id[2]) ? $id[2] : '';
            $state_code = isset($id[3]) ? $id[3] : '';
            $lpId = isset($id[4]) ? $id[4] : 0;
            $lpLogId = isset($id[5]) ? $id[5] : 0;
            $inner_html .= progressBar($dob, $city, $state);
            $inner_html .= tableSection($state, $state_code, $dob, $lpId, $lpLogId);
            $inner_html .= loadingProgressBarScript();
            $response = array('status' => 'success', 'html' => create_modal(array('id' => $containerId, 'class' => 'modal-lg', 'inner_html' => $inner_html)));
            break;
        case 'optin_form_graphic':
            $id = isset($_REQUEST['id']) ? trim($_REQUEST['id']) : '';
            $id = ($id != '') ? explode('|', $id) : array();
            $dob = isset($id[0]) ? $id[0] : 0;
            $city = isset($id[1]) ? $id[1] : '';
            $state = isset($id[2]) ? $id[2] : '';
            $state_code = isset($id[3]) ? $id[3] : '';
            $lpId = isset($id[4]) ? $id[4] : 0;
            $lpLogId = isset($id[5]) ? $id[5] : 0;
            $zip = isset($id[6]) ? $id[6] : 0;
            $cid = isset($_REQUEST['cid']) ? $_REQUEST['cid'] : 0;
            $inner_html .= optinProgressBar($dob, $city, $state);
            $inner_html .= optinTableSection($state, $state_code, $dob, $lpId, $lpLogId, $zip, $cid);
            $inner_html .= loadingProgressBarScript();
            $response = array('status' => 'success', 'html' => $inner_html);
            break;
        case 'lead_post_api_call':
            $post = $_REQUEST;
            $post['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $post['for_mobile'] = 1;
            $post['format'] = 'json';
            $post = http_build_query($post);
            $url = $global['api_url'] . 'lead_post.php';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0); // No header in the result
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
            curl_setopt($ch, CURLOPT_POST, 1); // This is a POST request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            $responseData = array('status' => 'error', 'message' => 'Error.');
            // Fetch and return content
            $response = curl_exec($ch);
            $response = json_decode($response);
            curl_close($ch);
            break;
        case 'invalid_offer_post_api_call':
            $post = $_REQUEST;
            $post['ip_address'] = $_SERVER['REMOTE_ADDR'];
            $post['for_mobile'] = 1;
            $post['format'] = 'json';
            $url = $global['api_url'] . 'invalid_form.php';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, 0); // No header in the result
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
            curl_setopt($ch, CURLOPT_POST, 1); // This is a POST request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            $responseData = array('status' => 'error', 'message' => 'Error.');
            // Fetch and return content
            $response = curl_exec($ch);
            $response = json_decode($response);
            curl_close($ch);
            break;
    }
    if ($html != '' || $message != '') {
        $response['status'] = 'success';
        $response['message'] = $message;
        $response['html'] = $html;
    }
    echo json_encode($response);
    exit;
}
?>