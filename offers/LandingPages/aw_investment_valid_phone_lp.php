<style>
    .p-form-left-heading-box1 {
        background: #002E5C none repeat scroll 0 0;
        border-top-left-radius: 5px;
        padding: 25px 0;
    }
    .p-form-left1 {
        background: #3a85c2 none repeat scroll 0 0;
        float: left;
        position: relative;
        width: 694px;
    }
    .color-ph-vl {
        color: #0d0d0d;
        font-size: 14px;
        margin-top: 20px;
        text-align: center;
    }
</style>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Annuities.com - Free Annuity Rate Quotes</title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/aw-investments.css"/>
</head>
<body>
<div class="p-wrapper">
<div class="p-container">
    <div class="p-header-main">
        <div class="p-logo-box">
            <a class="cg-main-logo" href="https://www.annuities.com/" rel="home" style="position:relative;">
            <img src="<?php echo $global['home_link']; ?>images/annuity-logo.jpg" alt="Annuities.com - Free Annuity Rate Quotes"
                                     width="325px"/>
            <span class="tooltip-custom"> Annuities.com - Free Annuity Rate Quotes</span>
            </a>
        </div>
            <style>.p-trusted-source_1115 {
                    color: #002e5c;
                    float: right;
                    font-size: 24px;
                    color: #4069a4;
                    font-style: normal;
                    padding-right: 0px;
                    padding-top: 24px;
                }</style>
            <div class="p-trusted-source_1115">Independent Investment Advice</div>
        <div class="clr"></div>
    </div>
    <div class="lp-banner-col">
    <div class="guratee-heading">Looking for the Highest Guaranteed Return?</div>
    <div class="interst-listing">
        <ul>
            <li><a>Up to 7% Returns with NO Market Risk</a></li>
            <li><a>A+ Rated Companies</a></li>
            <li><a>Safe Retirement Income </a></li>
            <li><a>Highest Payouts</a></li>
        </ul>
    </div>
    <div class="review-form">
        <div class="receive-form-col">
            <div class="complete-receive">Complete the Form to Receive Your</div>
            <div class="free-annuity">Free Annuity Comparison Report. </div>
            <div class="report-include">
                Your report will include rates, risks and reviews on the
                highest paying annuities currently available in the market.
                Each report is customized for your State, Age, Amount and
                Risk Tolerance
            </div>
            <div class="get-now">
                To get yours now:
            </div>
            <div class="get-now-list">
                <ul>
                    <li>Simply complete the form with valid information</li>
                    <li>Must have an accurate phone number and e-mail address</li>
                    <li>Each report takes approximately 3 to 4 hours to complete so please double check your information carefully.</li>
                </ul>
            </div>
        </div>

        <div class="form-colum-box">
            <div class="rate-heading">
                Complete the Form for your <br />
                Rates and Quotes
            </div>
            <div class="form-box-main">
                <form  class="quotes-form" action="<?php echo $global['form_post_url'] ?>"
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

                    <label>First Name <span>*</span></label>
                    <input type="text" name="first_name" id="first_name" value="<?php echo $postData['first_name']; ?>"/>
                    <br />
                    <label>Last Name <span>*</span></label>
                    <input type="text" name="last_name" id="last_name" value="<?php echo $postData['last_name']; ?>"/>
                    <br />
                    <label>Phone Number<span>*</span></label>
                    <input type="text" name="phone_day" id="phone_day"/>
                    <br />
                    <label>Email<span>*</span></label>
                    <input type="text" name="email" id="email" value="<?php echo $postData['email']; ?>"/>
                    <br />
                    <label>Zip Code<span>*</span></label>
                    <input type="text" name="zip_code" id="zip_code" maxlength="5"
                           onblur="get_city_state(this.value,'popUp');"/>
                    <br />
                    <label>Year of Birth<span>*</span></label>
                    <select name="dob_y" id="dob_y">
                        <option value="">Please Select</option>
                        <?php for ($i = 1990; $i > 1924; $i--) {
                            $sel = ($_REQUEST['dob_y'] == $i) ? 'selected="selected"' : '';
                            echo '<option value="' . $i . '" ' . $sel . ' >' . $i . '</option>';
                        } ?>
                    </select>
                    <br />
                    <label>Investment Amount<span>*</span></label>
                    <select name="investment" id="investment">
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
                    <div class="color-ph-vl">
                        A valid <b>phone number</b> is required as we are <br>
                        required to <b>confirm</b> all requests for Annuity Quotes.
                    </div>
                    <a id="form_submit" href="javascript:void(0)"
                       onclick="popUpvalidateForm('<?php echo $pageName; ?>')">GET RATES NOW</a>


                </form>
            </div>
        </div>

        <div class="clr"></div>
        <div class="value-privacy"><a  onclick="pop_ups('leads_from3',true);" href="javascript:void(0);" >We Value Your Privacy</a></div>
    </div>

</div>
    <div class="image-bar">
        <img src="<?php echo $global['home_link'] ?>images/banner-annuity.jpg" title="annuities" alt="annuities bar" />
    </div>
    <div class="clr"></div>
    <div class="income-rider">* With Additional Income Rider</div>
<?php
require_once 'footer_investments.php';
?>