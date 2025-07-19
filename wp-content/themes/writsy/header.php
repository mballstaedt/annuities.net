<?php
/**
 * The template for displaying the header.
 *
 * @package Writsy
 * @since   Writsy 1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-KTVTB8J');</script>
        <!-- End Google Tag Manager -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet"> 
    </head>

    <body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTVTB8J"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        <header id="site-header" class="site-header" role="banner">
            <div class="container">
                <?php get_template_part('partials/toolbar'); ?>

                <div class="site-header-content">
                    <div class="site-brand">
                        <?php
                       // if (is_front_page()) {
                            /* Optin Code for WP header file starts from here */
                            echo '<script type="text/javascript" src="' . get_template_directory_uri() . '/financialize_optin/js/custom.js"></script>';
                            echo '<script>var optinAjaxURL="' . admin_url('admin-ajax.php') . '";</script>';
                            echo '<script>var optinId = "12";</script>';
                            echo '<script>var ajaxURL="' . admin_url('admin-ajax.php') . '";</script>';
                            /* OPtin WP header file Code Ends here */
                       // }
                        if ($logo = writsy_get_option('logo')) {
                            printf('<a href="%1$s" class="site-logo" rel="home"><img src="%2$s" alt="%3$s"></a>',
                                esc_url(home_url('/')),
                                esc_url($logo),
                                esc_attr(get_bloginfo('name', 'display'))
                            );
                        }
                        else {
                            $tag = (is_front_page() && is_home()) ? 'h1' : 'p';

                            printf('<%1$s class="site-title h1"><a href="%2$s" rel="home"><span>%3$s</span></a></%1$s>',
                                esc_html($tag),
                                esc_url(home_url('/')),
                                esc_attr(get_bloginfo('name', 'display'))
                            );
                        }

                        if (writsy_get_option('tagline', true)) {
                            printf('<p class="site-description">%s</p>',
                                esc_html(get_bloginfo('description', 'display'))
                            );
                        }
                        ?>
                    </div>

                    <?php
                    if (writsy_get_option('social_header', true)) {
                        get_template_part('partials/social', 'buttons');
                    }

                    if (writsy_get_option('newsletter_dialog', true)) {
                        get_template_part('partials/newsletter', 'dialog');
                    }
                    ?>
                </div>
            </div>
        </header>

        <nav id="site-navigation" class="site-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'main',
                'menu_class'      => 'nav',
                'container_class' => 'container',
                'fallback_cb'     => 'writsy_main_menu_fallback'
            ));
            ?>
        </nav>

        <main id="site-main" class="site-main" role="main">
<?php
            /*  ## CDS Section Starts From here  Ticket # 168 and 169 */
            if (isset($_REQUEST['t']) && $_REQUEST['t'] != '') {
            $cdsToken = isset($_REQUEST['t']) ? base64_decode(urldecode($_REQUEST['t'])) : 0; /* Lead And CDS log Token*/
            $tokenArr = explode('|', $cdsToken);
            /* Setting Session Values */
            $_SESSION['cds_id'] = (isset($tokenArr[0]) && $tokenArr[0] > 0) ? $tokenArr[0] : 0;
            $_SESSION['cds_log_id'] = (isset($tokenArr[1]) && $tokenArr[1] > 0) ? $tokenArr[1] : 0;
            }
            if ($_SESSION['cds_id']) {
            echo "<script>
                var formAjaxURL='https://admin.financialize.com/api/';
                var cdsId='" . $_SESSION['cds_id'] . "';
                var cdsLogId='" . $_SESSION['cds_log_id'] . "';
            </script>";
            } else {
            echo "<script>
                var formAjaxURL='https://admin.financialize.com/api/';
                var cdsId=0;
                var cdsLogId=0;
            </script>";
            }
            ?>
            <script src="<?php echo get_stylesheet_directory_uri() ?>/js/jquery.mask-1.13.4.js"
                    type="text/javascript"></script>
            <script type="text/javascript">
                jQuery(function () {
                    jQuery("#phone_day").mask("(999) 999-9999");
                });
                function formValidateFields(formId) {
                    var alrt = "ALERT: The following fields are required:\n\n";
                    var msg = "";
                    if (document.getElementById("first_name")) {
                        if (jQuery.trim(document.getElementById("first_name").value) == "") {
                            msg += "First Name\n";
                        }
                    }
                    if (document.getElementById("last_name")) {
                        if (jQuery.trim(document.getElementById("last_name").value) == "") {
                            msg += "Last Name\n";
                        }
                    }
                    if (document.getElementById('zip_code')) {
                        if (document.getElementById('zip_code').value == '') {
                            msg += "Zip Code\n";
                        } else if (isInteger(document.getElementById('zip_code').value) == false) {
                            msg += "Proper Zip Code\n";
                        } else if (document.getElementById('zip_code').value == '00000') {
                            msg += "Proper Zip Code\n";
                        }
                    }
                    /*
                     if (document.getElementById("street")) {
                     if (jQuery.trim(document.getElementById("street").value) == "") {
                     msg += "Please address.\n";
                     }
                     }*/
                    if (document.getElementById('phone_day')) {
                        if (document.getElementById('phone_day').value == '') {
                            msg += "Phone\n";
                        } else if (checkInternationalPhone(document.getElementById('phone_day').value) == false) {
                            msg += "Valid Phone\n";
                        }
                    }


                    if (document.getElementById('email_id')) {
                        if (document.getElementById('email_id').value == '') {
                            msg += "Email\n";
                        } else if (!/^[a-zA-Z0-9]{1}([\._a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+){1,3}$/.test(trim(document.getElementById('email_id').value))) {
                            msg += "Correct Email\n";
                        }
                    }
                    if (document.getElementById('dob_y')) {
                        if (document.getElementById('dob_y').value == '') {
                            msg += "Year of Birth\n";
                        }
                    }
                    if (document.getElementById("investment")) {
                        if (jQuery.trim(document.getElementById("investment").value) == "") {
                            msg += "Investment Amount\n";
                        }
                    }
                    //if(document.getElementById("Optin").checked!=true){
                    //    msg += "Please Check the Box.\n";
                    //}
                    if (msg != "") {
                        alert(alrt + msg);
                        return false;
                    } else {
                        jQuery('.get-qoutes-btn').removeAttr('onclick').html('<img alt="loading" src="https://admin.financialize.com/images/ajax-loader.gif">');
                        jQuery.ajax({
                            type: "POST",
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            data: jQuery('#' + formId).serialize() + '&action=lead_post_api_call&cds_id=' + cdsId + '&cds_log_id=' + cdsLogId,
                            dataType: "json",
                            success: function (data) {
                                if (data.status == 'success') {
                                    jQuery('.main-box-form').html('<div class="form-heading">Thank You!</div><p class="form-col">' + data.message + '</p>')
                                }
                                else {
                                    jQuery('.get-qoutes-btn').attr("onclick", "formValidateFields('cds_form')").html('COMPARE RATES');
                                    alert(data.message);
                                }

                            }
                        });
                    }
                }
                //email-unsubscribe form submit
                function unsubscribeFormSubmit(formId) {
                    var msg = "";
                    if (document.getElementById('unsubscribe_email_id')) {
                        if (document.getElementById('unsubscribe_email_id').value == '') {
                            msg += "Please enter email address.\n";
                        } else if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(document.getElementById('unsubscribe_email_id').value)) {
                            msg += "Please enter correct email address.\n";
                        }
                    }
                    if (msg != "") {
                        alert(msg);
                        return false;
                    } else {
                        jQuery('.unsubscribe-email-submit-btn').removeAttr('onclick').html('<img alt="loading" src="https://admin.financialize.com/images/ajax-loader.gif">');
                        jQuery.ajax({
                            type: "POST",
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            data: jQuery('#' + formId).serialize() + '&action=unsubscribe_email_api_call',
                            dataType: "json",
                            success: function (data) {
                                if (data.api_status == 'success') {
                                    location.href="https://www.annuities.net/index.php/unsubscribe-confirmation/"
                                    //redirect to succes page
                                    //jQuery('.main-box').html('<div class="p-heading-col">Thank You!</div><p class="form-col">' + data.message + '</p>')
                                }else {
                                    jQuery('.unsubscribe-email-submit-btn').attr("onclick", "unsubscribeFormSubmit('unsubscribe_email_form')").html('SUBMIT');
                                    alert(data.message);
                                }

                            }
                        });
                    }
                }

                <?php if(isset($_GET['cds_unsub_log_id']) && !empty($_GET['cds_unsub_log_id'])){ ?>
                var cds_unsub_log_id = <?php echo $_GET['cds_unsub_log_id'] ?>;
                jQuery.ajax({
                    type: "POST",
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: 'cds_unsub_log_id='+cds_unsub_log_id+'&action=get_cds_data_api_call',
                    dataType: "json",
                    success: function (data) {
                        if (data.api_status == 'success') {
                            jQuery("#unsubscribe_email_id").val(data.email);
                            jQuery("#unsubscribe_aff_id").val(data.aff_id);
                            jQuery("#unsubscribe_type").val(data.type);
                            jQuery("#cds_unsub_log_id").val(cds_unsub_log_id);
                        }else {
                            alert(data.message);
                        }

                    }
                });
                <?php  } ?>
                /* Other Calling Procedure not using any where*/
                function testAjax() {
                    ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
                    jQuery.post(ajaxurl,
                        {
                            'action': 'lead_post_api_call',
                            'data': 'foobarid'
                        },
                        function (response) {
                            alert('The server responded: ' + response);
                        }
                    );
                }
                var phoneNumberDelimiters = "-, ) , (";
                // characters which are allowed in international phone numbers
                // (a leading + is OK)
                var validWorldPhoneChars = phoneNumberDelimiters + "";
                var minDigitsInIPhoneNumber = 10;
                function isInteger(s) {
                    var i;
                    for (i = 0; i < s.length; i++) {
                        // Check that current character is number.
                        var c = s.charAt(i);
                        if (((c < "0") || (c > "9"))) return false;
                    }
                    //alert(' All characters are numbers.');
                    return true;
                }
                function checkInternationalPhone(strPhone) {
                    var bracket = 3
                    strPhone = trim(strPhone)
                    if (strPhone.indexOf("+") > 1) return false
                    if (strPhone.indexOf("-") != -1)bracket = bracket + 1
                    if (strPhone.indexOf("(") != -1 && strPhone.indexOf("(") > bracket)return false
                    var brchr = strPhone.indexOf("(")
                    if (strPhone.indexOf("(") != -1 && strPhone.charAt(brchr + 4) != ")")return false
                    if (strPhone.indexOf("(") == -1 && strPhone.indexOf(")") != -1)return false
                    s = stripCharsInBag(strPhone, validWorldPhoneChars);
                    return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
                }
                function stripCharsInBag(s, bag) {
                    var i;
                    var returnString = "";
                    // Search through string's characters one by one.
                    // If character is not in bag, append to returnString.
                    for (i = 0; i < s.length; i++) {
                        // Check that current character isn't whitespace.
                        var c = s.charAt(i);
                        if (bag.indexOf(c) == -1) returnString += c;
                    }
                    return returnString;
                }
                function trim(s) {
                    var i;
                    var returnString = "";
                    // Search through string's characters one by one.
                    // If character is not a whitespace, append to returnString.
                    for (i = 0; i < s.length; i++) {
                        // Check that current character isn't whitespace.
                        var c = s.charAt(i);
                        if (c != " ") returnString += c;
                    }
                    return returnString;
                }
                function get_city_state(zip_code, popUp) {
                    if (jQuery.trim(zip_code) != '') {
                        jQuery.getJSON(formAjaxURL + 'ajax.php?zip_code=' + zip_code + "&tagmode=any&format=json&jsoncallback=?", function (response) {
                            setState(response, popUp);
                        }).fail(function () {
                            if (popUp) {
                                alert('Type in a Valid 5 Digit Zip Code');
                            }
                        });
                    }
                }
                function setState(data, popUp) {
                    var city, state;
                    if (popUp) {
                        if (document.getElementById('div_state')) {
                            // document.getElementById('div_state').style.display = 'block';
                        }
                        if (document.getElementById('div_city')) {
                            //  document.getElementById('div_city').style.display = 'block';
                        }
                    }
                    if (data != '') {
                        state = data[0].state;
                        city = data[0].name;
                        document.getElementById('state').value = state;
                        document.getElementById('city').value = city;
                    }
                }
                /* Forms JS */
                jQuery(document).ready(function () {
                    jQuery(".btn-select").each(function (e) {
                        var value = jQuery(this).find("ul li.selected").html();
                        if (value != undefined) {
                            jQuery(this).find(".btn-select-input").val(value);
                            jQuery(this).find(".btn-select-value").html(value);
                        }
                    });
                });

                jQuery(document).on('click', '.btn-select', function (e) {
                    e.preventDefault();
                    var ul = jQuery(this).find("ul");
                    if (jQuery(this).hasClass("active")) {
                        if (ul.find("li").is(e.target)) {
                            var target = jQuery(e.target);
                            target.addClass("selected").siblings().removeClass("selected");
                            var value = target.html();
                            jQuery(this).find(".btn-select-input").val(value);
                            jQuery(this).find(".btn-select-value").html(value);
                        }
                        ul.hide();
                        jQuery(this).removeClass("active");
                    }
                    else {
                        jQuery('.btn-select').not(this).each(function () {
                            jQuery(this).removeClass("active").find("ul").hide();
                        });
                        ul.slideDown(300);
                        jQuery(this).addClass("active");
                    }
                });

                jQuery(document).on('click', function (e) {
                    var target = jQuery(e.target).closest(".btn-select");
                    if (!target.length) {
                        jQuery(".btn-select").removeClass("active").find("ul").hide();
                    }
                });

                jQuery(window).bind("load", function() {
                    <?php if(isset($_GET['aff_id']) && !empty($_GET['aff_id'])){ ?>
                    var aff_id = <?php echo $_GET['aff_id'] ?>;
                    jQuery("#unsubscribe_aff_id").val(aff_id);
                    <?php  } ?>
                });
            </script>