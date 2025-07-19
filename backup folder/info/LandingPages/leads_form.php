<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Annuity Offer</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $global['home_link'] ?>css/style.css"/>
    <link href='<?php echo HTTP_PREFIX_STR; ?>fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
        var protocol = '<?php echo HTTP_PREFIX_STR;?>';
        // alert(protocol);
    </script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/jquery.maskedinput-1.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $global['home_link'] ?>js/custom_js.js"></script>
    <script>
        $(function () {

            $("#phone_day").mask("(999) 999-9999");

        });
    </script>
    <?php renderLPScripts($scriptsData, $htmlTagName = 'head_tag'); ?>
    <link type="image/jpeg" href="<?php echo HTTP_PREFIX_STR; ?>offers.annuityratequotes.net/images/favicon.ico"
          rel="shortcut icon">
</head>
<body>
<div class="p-form-box">
    <div class="p-heading-text">Get <span>FREE</span> Annuity Rate Quotes!</div>
    <div class="p-detail-text">Complete the form below & start comparing, today!</div>
    <div class="p-form-main">
        <form action="<?php echo $global['form_post_url'] ?>"
              name="<?php echo $pageName; ?>" method="post" id="<?php echo $pageName; ?>">
            <input type="hidden" name="http_reffer"
                   value="<?php if (isset($postData['HTTP_REFERER'])) echo $postData['HTTP_REFERER']; ?>">
            <input type="hidden" name="landing_page_id" value="<?php echo $pageId; ?>">
            <input type="hidden" name="cid" value="<?php echo $campaignId; ?>">
            <input type="hidden" name="aff_id" value="<?php echo $affId; ?>">
            <input type="hidden" name="subid" value="<?php echo $postData['subid']; ?>">
            <input type="hidden" name="subid2" value="<?php echo $postData['subid2']; ?>">
            <input type="hidden" name="subid3" value="<?php echo $postData['subid3']; ?>">
            <input type="hidden" name="subid4" value="<?php echo $postData['subid4']; ?>">
            <input type="hidden" name="subid5" value="<?php echo $postData['subid5']; ?>">
            <input type="hidden" name="xsubid" value="<?php echo $postData['xsubid']; ?>">
            <input type="hidden" name="xaffid" value="<?php echo $postData['xaffid']; ?>">
            <input type="hidden" name="transid" value="<?php echo $postData['transid']; ?>">
            <input type="hidden" name="google_parameters_id" value="<?php echo $googleParametersId; ?>"/>
            <input type="hidden" name="screen_width" id="screen_width" value=""/>
            <input type="hidden" name="screen_height" id="screen_height" value=""/>

            <div class="p-form-inner-main">
                <div class="p-form-label"> First Name *</div>
                <div class="p-form-inputbox"><input type="text" name="first_name" id="first_name"
                                                    value="<?php echo $postData['first_name']; ?>"/></div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label">Last Name *</div>
                <div class="p-form-inputbox"><input type="text" name="last_name" id="last_name"
                                                    value="<?php echo $postData['last_name']; ?>"/></div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label"> Address *</div>
                <div class="p-form-inputbox"><input type="text" name="street" id="street"/></div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label"> Zip Code *</div>
                <div class="p-form-inputbox"><input type="text" name="zip_code" id="zip_code"
                                                    onblur="get_city_state(this.value,'popUp');"/></div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label"> City *</div>
                <div class="p-form-inputbox"><input type="text" <input type="text" name="city" id="city"/></div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label"> State *</div>
                <div class="p-form-inputbox">
                    <select name="state" id="state">
                        <option value="">Select</option>
                        <option value="AK">AK</option>
                        <option value="AL">AL</option>
                        <option value="AR">AR</option>
                        <option value="AZ">AZ</option>
                        <option value="CA">CA</option>
                        <option value="CO">CO</option>
                        <option value="CT">CT</option>
                        <option value="DC">DC</option>
                        <option value="DE">DE</option>
                        <option value="FL">FL</option>
                        <option value="GA">GA</option>
                        <option value="HI">HI</option>
                        <option value="IA">IA</option>
                        <option value="ID">ID</option>
                        <option value="IL">IL</option>
                        <option value="IN">IN</option>
                        <option value="KS">KS</option>
                        <option value="KY">KY</option>
                        <option value="LA">LA</option>
                        <option value="MA">MA</option>
                        <option value="MD">MD</option>
                        <option value="ME">ME</option>
                        <option value="MI">MI</option>
                        <option value="MN">MN</option>
                        <option value="MO">MO</option>
                        <option value="MS">MS</option>
                        <option value="MT">MT</option>
                        <option value="NC">NC</option>
                        <option value="ND">ND</option>
                        <option value="NE">NE</option>
                        <option value="NH">NH</option>
                        <option value="NJ">NJ</option>
                        <option value="NM">NM</option>
                        <option value="NV">NV</option>
                        <option value="NY">NY</option>
                        <option value="OH">OH</option>
                        <option value="OK">OK</option>
                        <option value="OR">OR</option>
                        <option value="PA">PA</option>
                        <option value="RI">RI</option>
                        <option value="SC">SC</option>
                        <option value="SD">SD</option>
                        <option value="TN">TN</option>
                        <option value="TX">TX</option>
                        <option value="UT">UT</option>
                        <option value="VA">VA</option>
                        <option value="VL">VL</option>
                        <option value="VT">VT</option>
                        <option value="WA">WA</option>
                        <option value="WI">WI</option>
                        <option value="WI">WI</option>
                        <option value="WY">WY</option>
                    </select>
                </div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label"> Email</div>
                <div class="p-form-inputbox"><input type="text" name="email" id="email"
                                                    value="<?php echo $postData['email']; ?>"/></div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label"> Day Phone *</div>
                <div class="p-form-inputbox"><input type="text" name="phone_day" id="phone_day"/></div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label"> Year of Birth *</div>
                <div class="p-form-inputbox">
                    <select name="dob_y" id="dob_y">
                        <option value="">Please Select</option>
                        <?php for ($i = 1990; $i > 1933; $i--) {
                            $sel = ($_REQUEST['dob_y'] == $i) ? 'selected="selected"' : '';
                            echo '<option value="' . $i . '" ' . $sel . ' >' . $i . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="clr"></div>
            </div>
            <div class="p-form-inner-main">
                <div class="p-form-label"> Retirement Savings *</div>
                <div class="p-form-inputbox">
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
                </div>
                <div class="clr"></div>
            </div>
            <div class="p-check-message">
                <div class="p-checkbox-col"><input type="checkbox" name="check_box" id="check_box" value="1"/></div>
                <div class="p-check-text">
                    To protect my privacy, I understand that Annuities.com is required to call me to confirm my
                    information.
                </div>
                <div class="clr"></div>
            </div>
            <div class="p-sub-btn">
                <a id="form_submit" href="javascript:void(0)"
                   onclick="popUpvalidateForm('<?php echo $pageName; ?>')">Get Your Quotes</a>
            </div>
            <div class="p-privay-text"><a href="#"><img src="<?php echo $global['home_link'] ?>images/lock.png" width="17"
                                                        height="17" alt="lock"/>We respect your privacy</a></div>
            <div class="p-require">*Required Fields</div>
        </form>
    </div>
</div>
<?php renderLPScripts($scriptsData, $htmlTagName = 'body_tag'); ?>
</body>
</html>
<script>
    setScreenResolution();
</script>
