<?php
require_once 'header.php';
?>
<style>
    .arrow-col {
        bottom: 198px !important;
    }
    .seals-box {
        margin-top: 39px !important;
        padding-left: 25px;
    }
    .enter-zipcode-main {
        margin-top: 39px;
        padding-left: 114px;
    }
    .skip a{background:none;border:0px;box-shadow:none;color: #f51b1b;margin-left: -45px; font-weight: 300;text-decoration: underline !important; font-family: sans-serif;
        font-size: 20px;}
    .skip a:hover{background:none !important;border:0px;box-shadow:none;text-decoration: underline;}
</style>
<div class="banner-portion">
    <!--leftcolbox-->
    <div class="left-col-box">
        <div class="lower-colum step4">
            <div class="bonus-question">Retirement Question!</div>
            <div class="retirement-concerns">
                <b>What are Your Retirement Concerns?</b><br/>(check all that apply)
            </div>
            <form action="" name="step4" method="post" id="step4">
                <input type="hidden" name="zip_code" value="<?php echo $postData['zip_code']; ?>">
                <input type="hidden" name="dob_y" value="<?php echo $postData['dob_y']; ?>">
                <input type="hidden" name="city" id="city" value="<?php echo $postData['city']; ?>"/>
                <input type="hidden" name="state" id="state" value="<?php echo $postData['state']; ?>"/>
                <input type="hidden" name="investment" id="investment" value="<?php echo $postData['investment']; ?>"/>
                <input type="hidden" name="next_page_id" value="<?php echo $next_lp_id; ?>">
                <?php
                ## Common Tracking Parameters ##
                include_once($global['rootPath'] . 'LandingPages/tracking_params/tracking_params.php');
                ?>
                <div class="inner-content-box">
                    <div class="setting_icon_box">
                        <div class="checkbox_wrapper">
                            <input type="checkbox" name="retirement_concerns[]"
                                   value="outliving_savings">
                            <label>Outliving my retirement savings</label>
                        </div>
                    </div>
                    <div class="setting_icon_box">
                        <div class="checkbox_wrapper">
                            <input type="checkbox" name="retirement_concerns[]"
                                   value="steady_income">
                            <label>Having a steady income in retirement</label>
                        </div>
                    </div>
                    <div class="setting_icon_box">
                        <div class="checkbox_wrapper">
                            <input type="checkbox" name="retirement_concerns[]"
                                   value="maximizing_returns">
                            <label>Maximizing the returns on my investments</label>
                        </div>
                    </div>
                    <div class="setting_icon_box">
                        <div class="checkbox_wrapper">
                            <input type="checkbox" name="retirement_concerns[]"
                                   value="market_safety">
                            <label>Protecting my savings from market fluctuations</label>
                        </div>
                    </div>
                    <div class="enter-zipcode-main step3col">

                        <a id="submit_submit" href="javascript:void(0)" onClick="validate_retirement_concerns('step4')">GO</a>
                       <span class="skip"> <a href="javascript:void(0)" onClick="skipRetirementConcerns('step4')">SKIP</a></span>
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
    <div class="arrow-col"><img
            src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/arrow.png"
            alt="arrow"/></div>
</div>
</div>
<!--rightcolbox-->
<div class="right-col-box">
    <div class="heading-box">Did You Know?</div>
    <div class="whatanuuity">
        <ul>
            <li>
                67% of Americans are worried about funding their retirement, tying an all-time high.
                <span class="date">-Gallup, April 2012</span>
            </li>

        </ul>
    </div>
    <div class="bb"><a href="javascript:void(0)"><img
                src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/bb.png" alt="bb"/></a>
    </div>
    <div class="heading-box2">What Our Customers are Saying</div>
    <div class="testimonialbox">
      <img width="72px" src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/Mike Zunich.jpg" alt="user"/>
        <div class="testimonial-text">"A truly professional<br>resource for annuities." <br><a
                href="javascript:void(0)">Mike Zunich, Dayton, OH</a></div>
        <div class="clr"></div>
    </div>
</div>
<div class="clr"></div>
</div>
<br>
<?php
require_once $global['rootPath'].'LandingPages/footer.php';
?>

