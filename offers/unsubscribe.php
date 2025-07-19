<?php 
require_once "includes/config.php";
require_once "helpers/common_helper.php";
$data = _apiCallForLandingPage($_REQUEST,'unsubscribe');
if(isset($data['api_status']) && $data['api_status']=='success'){
?><body bgcolor="#ffffff">
<br><br>
<center><font size="2" face="helvetica arial, sans-serif">Thank you!<br>
<br>
You have successfully unsubscribed from this mailing list.
</font></center></body>
<?php
} else {
?>
<body bgcolor="#ffffff">
<br><br>
<center><font size="2" face="helvetica arial, sans-serif">Sorry!<br>
<br>
Don't found Unsubscription log for this mailing list.
</font></center></body>
<?
}
?>
