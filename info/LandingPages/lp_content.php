<html>

<head>
    <?php include_common_js(); ?>
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-119560345-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KTVTB8J');
    </script>
    <!-- End Google Tag Manager -->
    <?php echo $lpMetaTags; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="description" content="Annuities is a resource for consumers doing research for their retirement planning.">
    <title><?php echo $lpBrowserTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] . "css/$cssFileName.css" ?>" />
    <?php if ($cssFileName != 'lp-content' && $cssFileName != 'lp-content-beach') { ?>
        <?php if (!in_array($templateID, [105,106])) { ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] . "css/lp-content.css?v=0.5" ?>" />
        <?php } ?>
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/facebox.css" />
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css' />
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css' />
    <link href="<?php echo HTTP_PREFIX_STR; ?>/fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="<?php echo HTTP_PREFIX_STR; ?>/fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <script type="text/javascript">
        var protocol = '<?php echo HTTP_PREFIX_STR; ?>';
    </script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/jquery.maskedinput-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/arq_custom_js.js?v=1.3"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/facebox.js"></script>
    <!--Ticket #764 task started -->
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/widget.css" />
    <script type="text/javascript" src="<?php echo $global['home_link']; ?>js/bootstrap.min.js"></script>
    <!--Ticket #764 task End -->
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/garlic/garlic.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/google_analytics.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/google-analytics-scroll-tracking.js"></script>
    <script type="text/javascript">
        // $(function() {

        // });
    </script>
    <!-- Segment Analytics -->
    <script type="text/javascript" src="../js/segment.js"></script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo $lpFaviconLogo; ?>" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/popup.css" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTVTB8J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
    $search = [
        'Annuities.com',
        'annuities.com',
        'anuities-red.jpg',
        'images/new_lp_survey/logo.png',
        'https://www.shopperapproved.com/reviews/Annuities.net',
        'images/new_lp/logo.png',
        'https://www.financialize.com/images/library_image/annuities.net.png',
        'https://www.annuities.com/wp-content/uploads/2019/04/new-shopper.png'
    ];
    $replace = [
        'Annuities.net',
        'annuities.net',
        'annuities.net.png',
        // 'https://www.financialize.com/images/library_image/annuities.net.png',
        'https://www.financialize.com/images/library_image/Annuities_Logo.png',
        'https://www.shopperapproved.com/reviews/Annuities.com',
        // 'https://www.financialize.com/images/library_image/annuities.net.png'
        'https://www.financialize.com/images/library_image/Annuities_Logo.png',
        'https://www.financialize.com/images/library_image/Annuities_Logo.png',
        'https://www.annuities.net/wp-content/uploads/2019/04/new-shopper.png'
    ];
    $lpBodyContent = str_replace($search, $replace, $lpBodyContent);
    echo  $lpBodyContent;
    ?>
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
    // setScreenResolution();
    $('.desk-logo').css({
        'width': '250px',
        'display': 'inline-block'
    });
    $('#mobile_anchor').click(function() {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });

    function setScreenResolution() {
        $('#screen_width').val(screen.width);
        $('#screen_height').val(screen.height);
    }
    $(document).ready(function() {
        $("#phone_day").mask("(999) 999-9999");
        $(".phone_day").mask("(999) 999-9999");
        $("#first_name").focus();
        $('form:first *:input[type!=hidden]:first').focus();
        $('form').garlic();

        let unsubURL = $('#unsubscribe_link').val();
        $('#unsubscribed').attr('href', unsubURL);


        console.log('annuities.net');
        // var oldImageUrl = "https://www.annuities.com/wp-content/uploads/2019/04/new-shopper.png";
        // var newImageUrl = "https://www.annuities.net/wp-content/uploads/2019/04/new-shopper.png";
        $(".shp-app img").attr("src", "https://www.annuities.net/wp-content/uploads/2019/04/new-shopper.png");

        $('body').find('*:not(script)').contents().filter(function() {
            return this.nodeType === 3;
        }).each(function() {
            $(this).replaceWith(this.textContent.replace(/annuity\.com/g, "annuities.net"));
            $(this).replaceWith(this.textContent.replace(/annuities\.com/g, "annuities.net"));
            $(this).replaceWith(this.textContent.replace(/annuities\.com/g, "annuities.net"));
        });





    });
</script>
<?php
if (isset($postData['device_type']) && in_array($postData['device_type'], array('computer'))) {
    if ($lpExitPopup > 0)
        include_once('./financialize_optin/index.php');/*Optin Feature JS file and helper files*/
}
?>

</html>