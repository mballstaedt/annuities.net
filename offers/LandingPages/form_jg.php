<!DOCTYPE html>
<html lang="en">
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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Annuities.com: The Most Trusted Source for Annuity Information</title>
    <!-- Include bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/p-style.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/facebox.css"/>
    <link href="<?php echo $global['home_link'] ?>css/form-bootstrap.css" rel="stylesheet">
    <link href="<?php echo $global['home_link'] ?>css/form-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo $global['home_link'] ?>css/form.css" rel="stylesheet">
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
            $("#retirement_concern").focus();
            $('form').garlic();
        });
    </script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo $global['home_link']; ?>images/favicon.ico"
          rel="shortcut icon">
</head>
<body>

<div id="Main">
    <div class="container">
        <div class="row span12">
            <div class="logo-box">
                <img width="250" alt="logo" src="<?php echo $global['home_link']; ?>images/annuities-logo-red.jpg">
            </div>
            <div style="padding: 25px 0 25px 0px; text-align: center; background-color: #006633; font-size: 30px; color: #fff;line-height:35px;">
                <span class="hidden-phone">GET 2016's BEST ANNUITY RATES - FREE!</span>
                <span class="hidden-desktop hidden-tablet">GET 2016's BEST ANNUITY RATES - FREE!</span>
            </div>
        </div>
        <div class="row span12 banner-cont">
            <div class="span8">
                <div class="annuity-main">
<div class="is-annuity">Is an Annuity Right for You?</div>
<div class="f-out">FIND OUT NOW &amp; GET A FREE QUOTE!</div>
</div>
                <img src="<?php echo $global['home_link']; ?>images/bannner.png" style="display: block; margin: 0 auto;">
            </div>
            <div class="span4">
                <div id="FormContainer">
                    <img src="<?php echo $global['home_link']; ?>images/JG-LP-C1-Form-FormHeader.png">

                    <form action="<?php echo $global['form_post_url'] ?>"
                          name="<?php echo $pageName; ?>" method="post" id="<?php echo $pageName; ?>">
                        <input type="hidden" name="http_reffer"
                               value="<?php if (isset($postData['HTTP_REFERER'])) echo $postData['HTTP_REFERER']; ?>"/>
                        <input type="hidden" name="landing_page_id" value="<?php echo $pageId; ?>"/>
                        <input type="hidden" name="cid" value="<?php echo $campaignId; ?>"/>
                        <input type="hidden" name="aff_id" value="<?php echo $affId; ?>"/>
                        <input type="hidden" name="subid" value="<?php echo $postData['subid']; ?>"/>
                        <input type="hidden" name="subid2" value="<?php echo $postData['subid2']; ?>"/>
                        <input type="hidden" name="subid3" value="<?php echo $postData['subid3']; ?>"/>
                        <input type="hidden" name="subid4" value="<?php echo $postData['subid4']; ?>"/>
                        <input type="hidden" name="subid5" value="<?php echo $postData['subid5']; ?>"/>
                        <input type="hidden" name="xsubid" value="<?php echo $postData['xsubid']; ?>"/>
                        <input type="hidden" name="xaffid" value="<?php echo $postData['xaffid']; ?>"/>
                        <input type="hidden" name="transid" value="<?php echo $postData['transid']; ?>"/>
                        <input type="hidden" name="google_parameters_id" value="<?php echo $googleParametersId; ?>"/>
                        <input type="hidden" name="screen_width" id="screen_width" value=""/>
                        <input type="hidden" name="screen_height" id="screen_height" value=""/>
                        <input type="hidden" type="text" name="city" id="city" value=""/>
                        <input type="hidden" type="text" name="state" id="state" value=""/>


                        <div>
                            <label>How concerned are you about outliving your retirement savings?</label>
                            <select name="retirement_concern" id="retirement_concern">
                                <option selected="selected" value="">Please Select</option>
                                <option value="1">Very Concerned</option>
                                <option value="2">Somewhat Concerned</option>
                                <option value="3">Not Concerned</option>
                            </select>
                        </div>
<!--                        <div>-->
<!--                            <label style="text-align: right;">*Required</label>-->
<!--                        </div>-->
                        <div>
                            <label for="investment">*How much money have you saved for your retirement?</label>
                            <select id="investment" name="investment">
                                <option value="">Please Select</option>
                                <option value="$0 - $10,000">$0 - $10,000</option>
                                <option value="$10,000 - $25,000">$10,000 - $25,000</option>
                                <option value="$25,000 - $50,000">$25,000 - $50,000</option>
                                <option value="$50,000 - $100,000">$50,000 - $100,000</option>
                                <option value="$100,000 - $250,000">$100,000 - $250,000</option>
                                <option value="$250,000 - $500,000">$250,000 - $500,000</option>
                                <option value="$500,000 - $1 Million">$500,000 - $1 Million</option>
                                <option value="$1 Million - $3 Million">$1 Million - $3 Million</option>
                                <option value="More than $3 Million">More than $3 Million</option>
                            </select>
                        </div>
                        <div>
                            <label class="InvalidField">*Year of Birth</label>
                            <select name="dob_y" id="dob_y">
                                <option value="">Please Select</option>
                                <?php for ($i = 1990; $i > 1933; $i--) {
                                    $sel = ($_REQUEST['dob_y'] == $i) ? 'selected="selected"' : '';
                                    echo '<option value="' . $i . '" ' . $sel . ' >' . $i . '</option>';
                                } ?>
                            </select>
                        </div>
                        <div>
                            <label class="InvalidField" for="firstname">*First name</label>
                            <input type="text" name="first_name" id="first_name"
                                   value="<?php echo $postData['first_name']; ?>"/>
                        </div>

                        <div>
                            <label class="InvalidField" for="lastname">*Last name</label>
                            <input type="text" name="last_name" id="last_name"
                                   value="<?php echo $postData['last_name']; ?>"/>
                        </div>

                        <div>
                            <label class="InvalidField" for="email">*Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" maxlength="5"
                                   onBlur="get_city_state(this.value,'popUp');"/>
                        </div>
                        <div>
                            <label class="InvalidField" for="email">*Email</label>
                            <input type="text" name="email" id="email"
                                   value="<?php echo $postData['email']; ?>"/>
                        </div>

                        <div>
                            <label class="InvalidField">*Phone</label>
                            <input type="text" name="phone_day" id="phone_day"/>
                        </div>
                        <div>
                            <label class="InvalidField" for="Optin" style="margin-left: 20px; padding-top: 2px;">We are required to confirm requests by phone prior to preparing your Annuity Quotes.</label>
                        </div>
                        <div class="form-btn">
                        <a  id="form_submit" href="javascript:void(0)"
                           onclick="formValidateFields('<?php echo $pageName; ?>')">COMPARE RATES</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row span12 logo-c">
            <img src="https://offers.annuities.com/images/logos_clone.png">
            <div class="span4">
                <div id="LimitedTimeOffer" class="content">
                    <h3>What exactly is an Annuity?</h3>

                    <p>An annuity is an investment product that provides safe, tax-deferred growth of your retirement nest egg.</p>
                    <p>Annuities are considered low-risk, and can provide guaranteed, monthly income when you retire.</p>
                    <p>
                        There are many types of annuities with varying features & benefits. These include: fixed, variable, immediate, deferred & hybrid. We strongly suggest you consult with a financial professional to help you understand the various types of annuities before you purchase.
                    </p>
                </div>
            </div>

            <div class="row span4">
                <div id="GetTheCash" class="content">
                    <h3>Is an Annuity Right for You?</h3>

                    <p>Annuities are NOT a good fit for everyone. Annuities are designed for people looking for guaranteed, monthly income when they retire - they are NOT a high-risk / high-return investment.</p>
                    <p>The first thing to do is to see if an annuity fits your specific profile and financial situation. This "fit" is based on the amount of retirement savings you currently have, how old you are, and the State you live in.</p>
                    <p>Annuities are considered to be in the mainstream of conservative retirement planning - over $225 billion in annuities have been purchased in the past 12 months alone!</p>
                </div>
            </div>
            <div class="span4">
                <!--<div class="greenbar"></div>-->

                <div id="OtherPaymentStreams" class="content">
                    <h3>Who is Annuities.com?</h3>

                    <p>For years, Annuities.com has provided objective, unbiased annuity information to consumers interested in making the right choices with their retirement savings.</p>
                    <p>We do NOT sell annuities or any other financial products or services, and we are NOT affiliated with any other company.</p>
                    <ul style="list-style: initial;">
                        <li>In Business for 20 Years</li>
                        <li>A+ Rated Companies Only</li>
                        <li>Find the Highest Yielding Annuities</li>
                        <li>Pre-Screened Annuity Providers</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="greenbar an-next span12">
            <p>NEXT STEPS? Fill out the form and COMPARE ANNUITY RATES NOW!</p>
        </div>
    </div>
</div>
<?php require_once "common_popup.php"; ?>
<?php renderLPScripts($scriptsData, $htmlTagName = 'body_tag'); ?>
</body></html>