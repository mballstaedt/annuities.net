<?php
## HELPERS ##
$arr_Helpers = array('theme', 'common');
if ($arr_Helpers) {
    foreach ($arr_Helpers as $hName) {
        require_once($global['rootPath'] . 'helpers/' . $hName . '_helper.php');
    }
}
?>