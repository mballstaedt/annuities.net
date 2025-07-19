<?php require_once 'header.php'; ?>
<script type="text/javascript">    $(function () {
    $("#dob_y").focus();
    $('form').garlic();
});</script>
<style>    .where-text {
    font-size: 20px !important;
}</style>
<div class="banner-portion">    <!--leftcolbox-->
    <div class="left-col-box">
        <div class="upper-colum">
            <div class="upper-heading"><img
                    src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/red-h.png"/></div>
            <div class="upper-slogan"><img
                    src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/red-sub.png"/>
            </div>
        </div>
        <div class="lower-colum">
            <div class="lower-inner loweinner">
                <div class="where-text"><b>What year were you born?</b><br/>Annuity returns & suitability are based on
                    age
                </div>
                <div class="clr"></div>
                <div class="enter-zipcode-main step2col">
                    <form action="" name="step2" method="post" id="step2"><input type="hidden" name="zip_code"
                                                                                 value="<?php echo $postData['zip_code']; ?>">
                        <input type="hidden" name="city" id="city" value="<?php echo $postData['city']; ?>"/> <input
                                type="hidden" name="state" id="state" value="<?php echo $postData['state']; ?>"/> <input
                                type="hidden" name="next_page_id"
                                value="<?php echo $next_lp_id; ?>">
                        <?php
                        ## Common Tracking Parameters ##
                        include_once($global['rootPath'] . 'LandingPages/tracking_params/tracking_params.php');                        ?>
                        <input type="text" placeholder="Enter Year" name="dob_y" id="dob_y" maxlength="4"/> <a
                                id="submit_submit" href="javascript:void(0)" onClick="validate_dob_y('step2')">GO</a>
                    </form>
                    <div class="example">Example: 1958</div>
                </div>
                <div class="seals-box"><a href="javascript:void(0)"><img
                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/godaddy.png"
                        width="132" height="33" alt="godaddy"/></a> <a href="javascript:void(0)"><img
                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/security.png"
                        width="132" height="33" alt="security"/></a> <a href="javascript:void(0)"><img
                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/secure.png"
                        width="132" height="33" alt="sitelock"/></a></div>
            </div>
            <div class="arrow-col"><img
                    src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/arrow.png"
                    alt="arrow"/></div>
        </div>
    </div>
    <!--rightcolbox-->
    <div class="right-col-box">
        <div class="heading-box">Annuity Suitability</div>
        <div class="annuity-suitability">
            <ul>
                <li><span class="lef-text-box">Under 40:</span> <span class="right-text-box">Probably Not</span></li>
                <li><span class="lef-text-box">40 to 49:</span> <span class="right-text-box">Maybe</span></li>
                <li><span class="lef-text-box"><b>50 to 74:</b></span> <span
                        class="right-text-box"><b>Definitely</b></span></li>
                <li><span class="lef-text-box">75 to 82:</span> <span class="right-text-box">Maybe</span></li>
                <li><span class="lef-text-box">Over 82:</span> <span class="right-text-box">Probably Not</span></li>
            </ul>
        </div>
        <div class="bb"><a href="javascript:void(0)"><img
                src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/bb.png" alt="bb"/></a>
        </div>
        <div class="heading-box2">What Our Customers are Saying</div>
        <div class="testimonialbox"> ` <img width="90px"
                                            src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/Jim Marken.jpg"
                                            alt="user"/>

            <div class="testimonial-text">"A really good experience<br/>from beginning to end!" <br><a
                    href="javascript:void(0)">Jim Markin, Pueblo, CO</a></div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="clr"></div>
</div><br><?php require_once $global['rootPath'] . 'LandingPages/footer.php'; ?>