<?php
require_once 'header.php';
?>
        <div class="p-form-box-main">
            <div class="p-form-left">
                <div class="p-form-left-heading-box">
                    <div class="p-form-heading">Get Free, Instant Annuity Quotes Now</div>
                    <div class="p-form-heading-sub">Find the Highest Returns and Compare Your Options!</div>
                </div>
                <div class="p-form-box">
                    <div class="p-form-inner">
                        <form action="<?php echo $global['form_post_url']; ?>"
                              name="<?php echo $pageName; ?>" method="post" id="<?php echo $pageName; ?>">
                            <input type="hidden" name="http_reffer"
                                   value="<?php if (isset($postData['HTTP_REFERER'])) echo $postData['HTTP_REFERER']; ?>" />
                            <input type="hidden" name="landing_page_id" value="<?php echo $pageId; ?>" />
                            <input type="hidden" name="cid" value="<?php echo $campaignId; ?>" />
                            <input type="hidden" name="aff_id" value="<?php echo $affId; ?>" />
                            <input type="hidden" name="subid" value="<?php echo $postData['subid']; ?>" />
                            <input type="hidden" name="subid2" value="<?php echo $postData['subid2']; ?>" />
                            <input type="hidden" name="subid3" value="<?php echo $postData['subid3']; ?>" />
                            <input type="hidden" name="subid4" value="<?php echo $postData['subid4']; ?>" />
                            <input type="hidden" name="subid5" value="<?php echo $postData['subid5']; ?>" />
                            <input type="hidden" name="xsubid" value="<?php echo $postData['xsubid']; ?>" />
                            <input type="hidden" name="xaffid" value="<?php echo $postData['xaffid']; ?>" />
                            <input type="hidden" name="transid" value="<?php echo $postData['transid']; ?>" />
                            <input type="hidden" name="google_parameters_id" value="<?php echo $googleParametersId; ?>"/>
                            <input type="hidden" name="screen_width" id="screen_width" value="" />
                            <input type="hidden" name="screen_height" id="screen_height" value="" />
                            <div class="p-form-label-box">
                                <div class="p-form-label">First Name</div>
                                <div class="p-form-inputbox"><input type="text" name="first_name" id="first_name" value="<?php echo $postData['first_name']; ?>"/>
                                </div>
                            </div>
                            <div class="p-form-label-box">
                                <div class="p-form-label">Last Name</div>
                                <div class="p-form-inputbox"><input type="text" name="last_name" id="last_name" value="<?php echo $postData['last_name']; ?>"/></div>
                            </div>
                            <div class="p-form-label-box">
                                <div class="p-form-label">Street Address</div>
                                <div class="p-form-inputbox"><input type="text" name="street" id="street"/></div>
                            </div>
                            <div class="p-form-label-box">
                                <div class="p-form-label">Email Address</div>
                                <div class="p-form-inputbox"><input type="text" name="email" id="email" value="<?php echo $postData['email']; ?>"/></div>
                            </div>
                            <div class="p-form-label-box">
                                <div class="p-form-label">Zip Code</div>
                                <div class="p-form-inputbox"><input type="text" name="zip_code" id="zip_code" maxlength="5"
                                                                    onblur="get_city_state(this.value,'popUp');"/></div>
                            </div>
                            <div class="p-form-label-box" id="div_city" style="display:none">
                                <div class="p-form-label">City</div>
                                <div class="p-form-inputbox"><input type="text" name="city" id="city"/></div>
                            </div>
                            <div class="p-form-label-box" id="div_state" style="display:none">
                                <div class="p-form-label">State</div>
                                <div class="p-form-inputbox"><input type="text" name="state" id="state"/></div>
                            </div>
                            <div class="p-form-label-box">
                                <div class="p-form-label">Phone Number</div>
                                <div class="p-form-inputbox"><input type="text" name="phone_day" id="phone_day"/></div>
                            </div>
                            <div class="p-form-label-box">
                                <div class="p-form-label">Year of Birth</div>
                                <div class="p-form-inputbox">
                                    <select name="dob_y" id="dob_y">
                                        <option value="">Please Select</option>
                                        <?php for ($i = 1990; $i > 1933; $i--) {
                                            $sel = ($_REQUEST['dob_y'] == $i) ? 'selected="selected"' : '';
                                            echo '<option value="' . $i . '" ' . $sel . ' >' . $i . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="p-form-label-box">
                                <div class="p-form-label">Investment Amount</div>
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
                            </div>
                            <div class="clr"></div>
							<div class="p-valid-num">
								A valid <b>phone number</b> is required as we are <br>
								required to <b>confirm</b> all requests for Annuity Quotes.
							</div>
                            <div class=" p-quote-main">
                                <div class=" p-quote-btn"><a id="form_submit"  href="javascript:void(0)"
                                                             onclick="popUpvalidateForm('<?php echo $pageName; ?>')">Get
                                        My
                                        Free Quote</a></div>
                            </div>
                        </form>
                        <div class="p-certified-main">
                            <div class="p-certified-logos">
                                <div class="p-logo-box2"><span id="siteseal"><script type="text/javascript" src="<?php echo HTTP_PREFIX_STR;?>seal.godaddy.com/getSeal?sealID=YlXxglW9fKlWAxpg2moWVxOr5hdsrKyvDXHSQWPYJ9zopBip0TrJX3Z134"></script></span>
                                </div>
                                <div class="p-logo-box2"><img src="<?php echo $global['home_link']?>images/lock1.png" alt="secure"/>
                                </div>
                                <div class="p-logo-box2"><img src="<?php echo $global['home_link']?>images/sitelock.png" alt="sitelock"/></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-arrow-img"><img src="<?php echo $global['home_link']?>images/arroow.png" alt="arrow"/></div>
            </div>
            <div class="p-form-right">
                <div class="p-why-choose">Why Choose Us?</div>
                <div class="p-tick-box">
                    <div class="p-detail-desc"><i class="p-tick-img"></i>In Business for 20 Years</div>
                </div>
                <div class="p-tick-box">
                    <div class="p-detail-desc"><i class="p-tick-img"></i>Compare 100's of Annuities in Minutes</div>
                </div>
                <div class="p-tick-box">
                    <div class="p-detail-desc"><i class="p-tick-img"></i>Find Highest Yielding *8% Annuities</div>
                </div>
                <div class="p-tick-box">
                    <div class="p-detail-desc"><i class="p-tick-img"></i>Pre-Screened Annuity Providers</div>
                </div>
				<div class="p-tick-box">
					<div class="p-detail-desc"><i class="p-tick-img"></i>A+ Rated Companies Only</div>
				</div>
                <div class="p-certified-img"><img src="<?php echo $global['home_link']?>images/certified.png" width="115" height="50" alt="certified"/>
                </div>
                <div class="p-why-choose2">What Our Customers are Saying</div>
                <div class="p-customer-img-box">
<!--                    <div class="p-customer-img"><img src="--><?php //echo $global['home_link']?><!--images/user.png" alt="user"/></div>-->
                    <div class="p-customer-text" style="margin-left:50px;">
                        "Thank you for helping me<br/> find the perfect annuity!" <br/>
					  <span>  Sarah Jorgen, Miami, FL
						</span>
                    </div>
                    <div class="clr"></div>
                </div>
            </div>
            <div class="clr"></div>
            <div class="p-dollar"><img src="<?php echo $global['home_link']?>images/dollar.jpg" title="dollar" alt="dollar"/></div>
        </div>
    <div style="font-size:13px">* With Additional Income Rider</div><br>
<?php
require_once'footer.php';
?>