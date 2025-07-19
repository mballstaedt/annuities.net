<?php
include_once('includes/config.php');
include_once('classes/Mobile_Detect.php');
/******************************************************************
 **** Ticket #313 || Detect Request DeviceType *******************
 ****************************************************************/
$detect = new Mobile_Detect;
echo $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'computer');
/*######################## END #################################*/