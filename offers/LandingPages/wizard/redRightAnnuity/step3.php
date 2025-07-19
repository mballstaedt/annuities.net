<?php
require_once 'header.php';?>
<style>    .where-text {
    max-width: 100% !important;
}

.where-text p {
    font-size: 20px !important;
}

.arrow-col2 {
    bottom: 100px !important;
}

.loweinner {
    margin-top: 15px !important;
    margin-left: 50px !important;
}

.enter-zipcode-main {
    padding-top: 1px !important;
    padding-left: 120px !important;
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
                <div class="where-text"><b class="retirement">Do you have at least $25,000 in savings?</b>

                    <p>Some Annuities have minimum investment requirements</p></div>
                <div class="clr"></div>
                <div class="enter-zipcode-main step3col">
                    <form action="" name="step3" method="post" id="step3"><input type="hidden" name="zip_code"
                                                                                 value="<?php echo $postData['zip_code']; ?>">
                        <input type="hidden" name="dob_y" value="<?php echo $postData['dob_y']; ?>"> <input
                                type="hidden" name="city" id="city" value="<?php echo $postData['city']; ?>"/> <input
                                type="hidden" name="state" id="state" value="<?php echo $postData['state']; ?>"/> <input
                                type="hidden" name="investment" id="investment"
                                value="<?php echo $postData['investment']; ?>"/> <input type="hidden"
                                                                                        name="next_page_id"
                                                                                        value="<?php echo $next_lp_id; ?>">
                        <?php
                        include_once($global['rootPath'] . 'LandingPages/tracking_params/tracking_params.php');
                        ?>
                        <a href="javascript:void(0)" onClick="setInvestmentAmount(true,'step3')">YES!</a> <a
                                href="javascript:void(0)" class="no-btn"
                                onClick="setInvestmentAmount(false,'step3')">NO</a></form>
                </div>
                <div class="seals-box"><a href="javascript:void(0)"><img
                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/godaddy.png"
                        width="132" height="33" alt="godaddy"/></a> <a href="javascript:void(0)"><img
                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/security.png"
                        width="132" height="33" alt="security"/></a> <a href="javascript:void(0)"><img
                        src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/secure.png"
                        width="132" height="33" alt="sitelock"/></a></div>
            </div>
            <div class="arrow-col2"><img
                    src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/arrow.png"
                    alt="arrow"/></div>
        </div>
    </div>
    <!--rightcolbox-->
    <div class="right-col-box">
        <div class="heading-box">What is an Annuity?</div>
        <div class="whatanuuity">
            <ul>
                <li> An annuity is an investment product that allows you to accumulate funds for retirement on a
                    tax-deferred basis. Annuities are considered low-risk, and provide guaranteed, monthly income when
                    you retire.
                </li>
            </ul>
        </div>
        <div class="bb"><a href="javascript:void(0)"><img
                src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/bb.png" alt="bb"/></a>
        </div>
        <div class="heading-box2">What Our Customers are Saying</div>
        <div class="testimonialbox"> ` <img width="72px"
                                            src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/Jill Hartley.jpg"
                                            alt="user"/>

            <div class="testimonial-text">"I found the best annuity<br/>rates on annuities.com!"<br> <a
                    href="javascript:void(0)">Jill Hartley, Vista, CA</a></div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="clr"></div>
</div><br>
<?php require_once $global['rootPath'] . 'LandingPages/footer.php'; ?>