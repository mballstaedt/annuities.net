<?php
if (isset($_REQUEST['dev_tests']) && $_REQUEST['dev_tests'] == 1) {
    /* Direct testing via file path URL include these files */
    include('../includes/config.php');
    echo '<script type="text/javascript" src="' . $global['home_link'] . 'financialize_optin/js/jquery.min.js"></script>';
}
//include('helpers/optin_helper.php');
include($global['rootPath'] . 'financialize_optin/helpers/optin_helper.php');
optinAPICallURL($global['home_link'] . 'financialize_optin/ajax/optin_ajax.php',$lpExitPopup);
echo optinJS();/*JS files */
?>

