<?php require_once 'header.php'; ?>

<style>

    .upper-heading {

        display: inline-block;

        font-size: 50px;

        font-weight: 700;

        text-shadow: 2px 3px #000000;

        vertical-align: bottom;

    }

</style>

<script type="text/javascript">

    $(function () {

        $("#phone_day").mask("(999) 999-9999");
        $("#first_name").focus();
        $('form').garlic();

<?php if(isset($postData['zip_code']) && $postData['zip_code'] !=''){ ?>
        get_city_state(<?php echo $postData['zip_code']; ?>, false);
<?php } ?>

    });

</script>

<div class="banner-portion">

    <div class="main-box">

        <div class="upper-box">

            <div class="left-imgbox"><img

                    src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/meter.png" width="286"

                    height="114" alt="meter"/></div>

            <div class="rightbox-text">

                <b><div class="upper-heading"><img src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/yes-red.png"/></div></b> Based on your profile, an Annuity would be a good fit for you!

            </div>

            <div class="clr"></div>

        </div>

        <div class="next-step">Next Steps .... Get a <b>FREE</b> Annuity Report & Rate Quote and Compare your Options!</div>


        <div class="form-container">





            <form action="<?php echo $global['form_post_url'] ?>" name="step6"

                  method="post" id="step6">

                <input type="hidden" name="zip_code" value="<?php echo $postData['zip_code']; ?>">

                <input type="hidden" name="dob_y" value="<?php echo $postData['dob_y']; ?>">

                <input type="hidden" name="city" id="city" value="<?php echo $postData['city']; ?>"/>

                <input type="hidden" name="state" id="state" value="<?php echo $postData['state']; ?>"/>

                <input type="hidden" name="investment" id="investment" value="<?php echo $postData['investment']; ?>"/>

                <?php

                $postData['retirement_concerns'] = is_array($postData['retirement_concerns']) ? $postData['retirement_concerns'] : array();

                foreach ($postData['retirement_concerns'] as $ads) {

                    ?>

                    <input type="hidden" name="retirement_concerns[]" value="<?php echo $ads; ?>"/>

                <?php } ?>

                <input type="hidden" name="next_page_id" value="<?php echo $next_lp_id; ?>">

                <?php

                /* Common Tracking Parameters */

                include_once($global['rootPath'] . 'LandingPages/tracking_params/tracking_params.php');

                ?>

                <input type="text" placeholder="First Name" class="firstname" name="first_name" id="first_name"/>

                <input type="text" placeholder="Last Name" class="lastname" name="last_name" id="last_name"/>

                <input type="text" placeholder="Email" class="email-f" name="email" id="email"/>

                <input type="text" placeholder="Phone" class="phone-f" name="phone_day" id="phone_day"/>

                <div class="comparerates">

                    <p>A valid <b>phone number</b> is required as we <strong>confirm</strong> all requests.</p>

                    <a id="submit_submit" href="javascript:void(0)" onClick="validate_multi_wizard_form('step6')">Compare

                        Rates Now!</a>

                </div>

            </form>

        </div>

        <div class="tc">

            <div class="seals-box">

                <a href="javascript:void(0)"><img

                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/godaddy.png"

                        width="132" height="33" alt="godaddy"/></a>

                <a href="javascript:void(0)"><img

                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/security.png"

                        width="132" height="33" alt="security"/></a>

                <a href="javascript:void(0)"><img

                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/secure.png"

                        width="132" height="33" alt="sitelock"/></a>

            </div>

        </div>

    </div>



</div>

<br>

<?php require_once $global['rootPath'] . 'LandingPages/footer.php'; ?>

