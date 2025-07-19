<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Annuities.com - Free Annuity Rate Quotes</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/p-style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/facebox.css"/>
    <link rel="stylesheet" type="text/css"
          href="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/css/style.css"/>
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=PT+Sans:400,400italic,700' rel='stylesheet'
          type='text/css'>
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet'
          type='text/css'>
	<script type="text/javascript">
        var protocol = '<?php echo HTTP_PREFIX_STR;?>';
    </script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/jquery.maskedinput-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/arq_custom_js.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/facebox.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/garlic/garlic.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/google_analytics.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/google-analytics-scroll-tracking.js"></script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo $global['home_link']; ?>images/favicon.ico"
          rel="shortcut icon">

</head>
<body>
<div class="wrapper">
    <div class="container">
        <header>
            <?php
//            $imageLogo='annuity-logo.jpg';
//            if(isset($_REQUEST['cid'])&&$_REQUEST['cid']==235){
                ## Red Logo for Annuities.com site campaign ##
                $imageLogo='annuities-logo-red.jpg';
//            }
            ?>
            <div class="logo">
                <a class="cg-main-logo" href="https://www.annuities.net/" style="position:relative;" >
                    <img src="<?php echo $global['home_link'] ?>images/<?php echo $imageLogo;?>" width="250" alt="Annuities.com - Free Annuity Rate Quotes"/>
                    <span class="tooltip-custom"> Annuities.net - Free Annuity Rate Quotes</span>
                </a>
            </div>
            <div class="header-slogan">Annuities.net: The Most Trusted Source for Annuity Information</div>
            <div class="clr"></div>
        </header>