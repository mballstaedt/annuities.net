<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Annuities Offer</title>
    <link type="text/css" href="./css/cds-style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container_sm">
    <div class="header_sm"><a class="site-logo" href="javascript:void(0)"><img src="./images/annuities-logo-red.jpg"
                                                                               alt="annuities.net" width="213"
                                                                               height="74"/></a></div>
    <div class="section_sm">
        <div class="inner_container_sm">
            <div class="intro-text">
                <p>Thank you!</p>
                <?php if (isset($_REQUEST['st']) && $_REQUEST['st'] == 1) { ?>
                    <p> Your information has been received and we be contacting you shortly to follow-up. This will NOT be a sales call!.</p>
                <?php } else { ?>
                    <p> A representative will be in touch with your shortly to confirm your request. </p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<footer>
    <p>Copyright 2017 Annuities.net </p>
</footer>
</body>
</html>