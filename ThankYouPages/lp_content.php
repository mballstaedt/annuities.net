<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lpBrowserTitle; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var protocol = '<?php echo HTTP_PREFIX_STR; ?>';
    </script>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/typ_styles/css/p-style.css?v=0.3" />
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=PT+Sans:500' rel='stylesheet' type='text/css' />
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=PT+Sans:400' rel='stylesheet' type='text/css' />
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css' />
    <link href='<?php echo HTTP_PREFIX_STR; ?>/fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css' />
    <link type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/RMortgage_reset.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/RMortgage_style.css" rel="stylesheet" />
    <link type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/fonts.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/facebox.css" />
    <?php if (!in_array($templateID, [105,106])) { ?>
        <link type="text/css" href="<?php echo $global['home_link'] ?>ThankYouPages/css/style.css" rel="stylesheet" />
    <?php } ?>

    <script type="text/javascript" src="<?php echo $global['home_link'] ?>ThankYouPages/js/custom_js.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>ThankYouPages/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>ThankYouPages/js/facebox.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>ThankYouPages/js/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>ThankYouPages/js/typ.js"></script>
    <!---font-awesome-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script>
        $(function() {
            $("#best_number").mask("(999) 999-9999");
            $(".phone_day").mask("(999) 999-9999");
            $('#clickHere').click(function() {
                $('.num_field').toggle();
            });
        });
    </script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo $lpFaviconLogo; ?>" rel="shortcut icon" />
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTVTB8J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
    $search = ['Annuities.com', 'annuities.com', 'anuities-red.jpg', 'images/new_lp_survey/logo.png', 'https://www.shopperapproved.com/reviews/Annuities.net'];
    $replace = ['Annuities.net', 'annuities.net', 'annuities.net.png', 'https://www.financialize.com/images/library_image/annuities.net.png', 'https://www.shopperapproved.com/reviews/Annuities.com'];
    $lpBodyContent = str_replace($search, $replace, $lpBodyContent);
    // $lpBodyContent = str_replace('Annuities.com', 'Annuities.net', $lpBodyContent);
    // $lpBodyContent = str_replace('annuities.com', 'annuities.net', $lpBodyContent);
    echo $lpBodyContent;
    ?>
    <?php //require_once './common_popup.php';/*## PIXEL CODE ##*/
    if (trim($code)) {
        $code = html_entity_decode($code, ENT_QUOTES);
        $code = htmlspecialchars_decode($code, ENT_QUOTES);
        echo $code;
    }
    renderLPScripts($scriptsData, $htmlTagName = 'body_tag'); ?>
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
    }
</script>

</html>