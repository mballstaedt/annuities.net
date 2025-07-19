<html>
<head>
    <?php echo $lpMetaTags; ?>
    <title><?php echo $lpBrowserTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] . "css/$cssFileName.css" ?>"/>
    <?php if ($cssFileName != 'lp-content') { ?>
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
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/arq_custom_js.js"></script>
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
            $('form').garlic();
        });
    </script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo $lpFaviconLogo; ?>"
          rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/popup.css"/>
</head>

<body>
<?php echo $lpBodyContent; ?>
<?php renderLPScripts($scriptsData, $htmlTagName = 'body_tag'); ?>
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
</html>