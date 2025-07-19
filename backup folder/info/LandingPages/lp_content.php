<html>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KTVTB8J');</script>
    <!-- End Google Tag Manager -->
    <?php include_common_js(); ?>
    <?php echo $lpMetaTags; ?>
    <title><?php echo $lpBrowserTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] . "css/$cssFileName.css" ?>"/>
    <?php if ($cssFileName != 'lp-content' && $cssFileName != 'lp-content-beach') { ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] . "css/lp-content.css" ?>"/>
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/facebox.css"/>
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet'
          type='text/css'/>
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet'
          type='text/css'/>
    <link href="<?php echo HTTP_PREFIX_STR;?>/fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="<?php echo HTTP_PREFIX_STR;?>/fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <script type="text/javascript">
        var protocol = '<?php echo HTTP_PREFIX_STR;?>';
    </script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/jquery.maskedinput-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/arq_custom_js.js?v=1.3"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/facebox.js"></script>
    <!--Ticket #764 task started -->
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/widget.css"/>
    <script type="text/javascript" src="<?php echo $global['home_link']; ?>js/bootstrap.min.js"></script>
    <!--Ticket #764 task End -->
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/garlic/garlic.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/google_analytics.js"></script>
    <script type="text/javascript"
            src="<?php echo $global['home_link'] ?>js/google-analytics-scroll-tracking.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#phone_day").mask("(999) 999-9999");
            $(".phone_day").mask("(999) 999-9999");
            $("#first_name").focus();
            $('form:first *:input[type!=hidden]:first').focus();
            $('form').garlic();
        });
    </script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo $lpFaviconLogo; ?>"
          rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/popup.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTVTB8J"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php echo $lpBodyContent; ?>
<?php renderLPScripts($scriptsData, $htmlTagName = 'body_tag'); ?>
<?php modal_placeholder(); ?>
</body>
<script>
    function pop_ups(id, is_form_privacy) {
        is_form_privacy = is_form_privacy || false;
        if (id == 'leads_from') {
            ga('send', 'event', 'Landing Page', 'Click', 'About us');
        } else if (id == 'leads_from3') {
            if (is_form_privacy) {
                ga('send', 'event', 'Landing Page', 'Click', 'Form Privacy');
            } else {
                ga('send', 'event', 'Landing Page', 'Click', 'Privacy Policy');
            }
        } else if (id == 'leads_from2') {
            ga('send', 'event', 'Landing Page', 'Click', 'Terms of Use');
        }
        $.facebox($('#' + id).html());
        $('.close-bttn').click($.facebox.close);
    }
    setScreenResolution();
    $('#mobile_anchor').click(function () {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });
</script>
<?php
if (isset($postData['device_type']) && in_array($postData['device_type'], array('computer'))) {
    if ($lpExitPopup > 0)
        include_once('./financialize_optin/index.php');/*Optin Feature JS file and helper files*/
}
?>
</html>