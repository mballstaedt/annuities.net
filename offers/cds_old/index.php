<?php
include_once('../includes/config.php');
require_once "../helpers/common_helper.php";
$dataRequest = $_REQUEST;
$data = _apiCallForCDS($dataRequest);
/* CDS Token Is for new After Ticket # 168, whereas cds_mask is old for lead id can be remove after some time may be after month (Current date: 25th feb,2016)*/
$lead_id = ($_REQUEST['cds_mask']) ? base64_decode(urldecode($_REQUEST['cds_mask'])) : 0;
$cds_id = ($_REQUEST['cds_token']) ? base64_decode(urldecode($_REQUEST['cds_token'])) : 0;
$cds_log_id = ($dataRequest['log_mask']) ? base64_decode(urldecode($dataRequest['log_mask'])) : 0;
$first_name = isset($data['first_name']) ? $data['first_name'] : '';
$last_name = isset($data['last_name']) ? $data['last_name'] : '';
$city = isset($data['city']) ? $data['city'] : '';
$state = isset($data['state']) ? $data['state'] : '';
$phone_day = isset($data['phone_day']) ? $data['phone_day'] : '';
$dob = isset($data['dob']) ? date('Y', strtotime($data['dob'])) : '';
$investment = isset($data['investment']) ? $data['investment'] : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Annuity Offer</title>
    <link type="text/css" href="../css/cds-style.css" rel="stylesheet">
    <link href='://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../js/custom_js.js"></script>
    <script type="text/javascript" src="../js/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $("#best_number").mask("(999) 999-9999");
        });
    </script>
</head>

<body>
<div class="container_sm">
    <div class="header_sm"><a class="site-logo" href="javascript:void(0)"><img src="../images/annuities-logo-red.jpg"
                                                                               alt="annuities.com" width="270"/></a>
    </div>
    <div class="section_sm">
        <div class="inner_container_sm">
            <div class="intro-text">
                <p><?php echo ucfirst($first_name) ?>,</p>
                <p> Welcome Back! We've started putting together your <span
                        class="red-text-b">FREE Annuity Rate Quote</span>, but have not been able to reach you to
                    confirm your request. We are required to do so for your protection! </p>
            </div>
            <div class="form-box">
                <div class="form-box-header">
                    <h3>Here is the info you submitted:</h3>
                </div>
                <div class="form-box-body">
                    <div class="form-box-content">
                        <span><?php echo ucfirst($first_name) . ' ' . ucfirst($last_name) ?></span>
                        <span><?php echo ucwords(strtolower($city)) . ', ' . $state; ?></span>
                        <!--<span><?php //echo phoneFormate($phone_day)?></span>-->
                        <span>Born in <?php echo $dob ?></span> <span
                            style="width:300px;">Retirement Savings <?php echo formatInvestment($investment) ?></span>
                    </div>
                    <div class="inner-form-box">
                        <div class="inner-form-box-header">
                            <h3>One Last Thing...</h3>
                        </div>
                        <div class="inner-form-arrow"></div>
                        <div class="inner-form-box-body"><span>Please Re-enter Your Phone Number</span>
                            <form class="inline-form-box-form" id="cds_form" name="cds_form"
                                  action="<?php echo $global['cds_form_url']; ?>" method="post">
                                <input type="hidden" id="cds_id" name="cds_id"
                                       value="<?php echo ($cds_id) ? $cds_id : 0 ?>"/>
                                <input type="hidden" id="lead_id" name="lead_id"
                                       value="<?php echo ($lead_id) ? $lead_id : 0 ?>"/>
                                <input type="hidden" id="cds_log_id" name="cds_log_id"
                                       value="<?php echo ($cds_log_id) ? $cds_log_id : 0 ?>"/>
                                <label>Phone Number</label>
                                <input type="text" name="best_number" id="best_number"/>
                                <label>Best Time of Day to Call</label>
                                <select name="follow_up_time" id="follow_up_time">
                                    <option value="">Select One</option>
                                    <option value="morning">Morning</option>
                                    <option value="afternoon">Afternoon</option>
                                    <option value="evening">Evening</option>
                                    <option value="anytime">Anytime</option>
                                </select>
                            </form>
                            <span class="privacy-sticker">Your Privacy is Important to us</span>
                            <p>Your number will not be shared or distributed. It is for confirmation purposes only.
                                <br/>
                                This is for your protection.</p>
                        </div>
                        <div class="inner-form-action"><a class="submit_btn" href="javascript:void(0)"
                                                          onclick="cdsValidate();"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <p>Copyright 2015 Annuities.com </p>
</footer>
</body>
</html>