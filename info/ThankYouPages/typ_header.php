<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Annuity Rates</title>
    <?php echo include_common_js();?>
	<script type="text/javascript">
        var protocol = '<?php echo HTTP_PREFIX_STR;?>';
        //alert(protocol);
    </script>
    <link rel="stylesheet" type="text/css" href="typ_styles/css/p-style.css" />
    <link href='<?php echo HTTP_PREFIX_STR;?>fonts.googleapis.com/css?family=PT+Sans:500' rel='stylesheet' type='text/css'>
    <link href='<?php echo HTTP_PREFIX_STR;?>fonts.googleapis.com/css?family=PT+Sans:400' rel='stylesheet' type='text/css'>
    <link href='<?php echo HTTP_PREFIX_STR;?>fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    <link href='<?php echo HTTP_PREFIX_STR;?>/fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
    <link type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/style.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/RMortgage_reset.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/RMortgage_style.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/fonts.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link']?>css/facebox.css"/>
    <script type="text/javascript" src="<?php echo $global['home_link']?>js/custom_js.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link']?>js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link']?>js/facebox.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link']?>js/jquery.maskedinput-1.3.min.js"></script>
    <script>

        $(function () {

            $("#best_number").mask("(999) 999-9999");

        });
    </script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo $global['home_link']; ?>images/favicon.ico"
          rel="shortcut icon">
</head>
