<html>
<!-- Google - Analytics -->
<script>

    (function(i, s, o, g, r, a, m){
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function(){
            (i[r].q = i[r].q || []).push(arguments)
        },
            i[r].l =1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-17667117-13', 'auto');
    ga('send', 'pageview');

</script>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Annuities.net - Free Annuity Rate Quotes</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/p-style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/facebox.css"/>
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'/>
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'/>
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
    <script type="text/javascript">
        $(function () {
            $("#phone_day").mask("(999) 999-9999");
            $("#first_name").focus();
            $('form').garlic();
        });
    </script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo $global['home_link']; ?>images/favicon.ico"
          rel="shortcut icon">
</head>
<body>
<div class="p-wrapper">
    <div class="p-container">
        <div class="p-header-main">
            <?php
            $annuityLogo=$global['home_link'].'images/annuity-logo.jpg';
            $callNumber='(888) 390-4132';
            if($pageId==1114){
                $annuityLogo=$global['home_link'].'images/annuities-logo-red.jpg';
                $callNumber='(888) 601-8647';
            }
            ?>
            <div class="p-logo-box">
                <a class="cg-main-logo" href="https://www.annuities.net/" rel="home" style="position:relative;">
                <img src="<?php echo $annuityLogo ?>" alt="Annuities.net - Free Annuity Rate Quotes"
                                         width="250"/>
                <span class="tooltip-custom"> Annuities.net - Free Annuity Rate Quotes</span>
                </a>
            </div>
            <?php
            ## LP's without having Contact Number ##
            if ($pageId == 1115) {
                ?>
<style>.p-trusted-source_1115 {
        color: #002e5c;
        float: right;
        /*font-family: serif;*/
        /*font-size: 18px;*/
        font-style: italic;
        padding-right: 40px;
        padding-top: 24px;
    }</style>
                <div class="p-trusted-source_1115">Annuities.net: The Most Trusted Source for Annuity Information</div>
            <?php
            } else {
                ?>
                <div class="p-trusted-source">The Most Trusted Source for Annuities</div>
                <div class="p-contact-add">
                    <div class="p-have-question">Have Questions? <span>Call Today!</span></div>
                    <div class="skype-call"><?php echo $callNumber;?></div>
                </div>
            <?php } ?>
            <div class="clr"></div>
        </div>