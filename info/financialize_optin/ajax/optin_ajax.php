<?php
include('../helpers/optin_helper.php');
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'optin_api_call') {
    $responseData = optin_api_call();
    echo json_encode($responseData);
    exit;
}
?>