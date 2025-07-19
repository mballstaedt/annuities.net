<?php
require_once 'header.php';
?>
    <div class="p-form-box-main p-form-box-main2">
        <div class="p-get-headings">Get Fast, Free Annuity Rate Quotes Now</div>
        <div class="p-form-get">
            <div class="p-form-get-left">
                <div class="p-form-arrow-d"><img src="<?php echo $global['home_link']; ?>images/arrow-lp2.png" width="151"
                                                 height="45"
                                                 alt="arrow-down"/></div>
                <div class="p-formbox-get">
                    <div class="p-get-heading">Get The Best Annuity For You!</div>
                    <div class="p-form-field-box">
                        <form action="<?php echo $global['form_post_url']; ?>"
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
                            <ul>
                                <li>
                                    <label>First Name </label>
                                    <input type="text" name="first_name" id="first_name"
                                           value="<?php echo $postData['first_name']; ?>"/>
                                </li>
                                <li>
                                    <label> Last Name </label>
                                    <input type="text" name="last_name" id="last_name"
                                           value="<?php echo $postData['last_name']; ?>"/>
                                </li>
                                <li>
                                    <label>Street Address </label>
                                    <input type="text" name="street" id="street"/>
                                </li>
                                <li>
                                    <label>Email Address </label>
                                    <input type="text" name="email" id="email"
                                           value="<?php echo $postData['email']; ?>"/>
                                </li>
                                <li>
                                    <label> Zip Code </label>
                                    <input type="text" name="zip_code" id="zip_code" maxlength="5"
                                           onBlur="get_city_state(this.value,'popUp');"/>
                                </li>
                                <li>
                                    <label> Phone Number </label>
                                    <input type="text" name="phone_day" id="phone_day"/>
                                </li>
                                <li>
                                    <label>Year of Birth</label>
                                    <select name="dob_y" id="dob_y">
                                        <option value="">Please Select</option>
                                        <?php for ($i = 1990; $i > 1933; $i--) {
                                            $sel = ($_REQUEST['dob_y'] == $i) ? 'selected="selected"' : '';
                                            echo '<option value="' . $i . '" ' . $sel . ' >' . $i . '</option>';
                                        } ?>
                                    </select>
                                </li>
                                <li>
                                    <label>Investment Amount</label>
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
                                </li>
                            </ul>
                            <input type="hidden" name="city" id="city"/>
                            <input type="hidden" name="state" id="state"/>
                        </form>
                    </div>

                    <div class="p-form-btnbox">
                        <a id="form_submit" href="javascript:void(0)"
                           onClick="popUpvalidateForm('<?php echo $pageName; ?>')">Compare Rates</a>
                        <span><img src="<?php echo $global['home_link']; ?>images/secure-lock.png" alt="securelock"/></span>
                    </div>
                </div>
            </div>
            <div class="p-form-get-rigt">
                <div class=" p-formbox-get">
                    <div class="p-heading-about-get">
                        ABOUT US
                    </div>
                </div>
                <div class="p-quote-bx">
                    <ul>
                        <li>Find Highest Rates.</li>
                        <li>Guaranteed Lifetime Income.</li>
                        <li>Protection from Market Risk.</li>
                        <li>A+ Top Rated Companies.</li>
                    </ul>
                </div>
                <div class="p-bbb-img"><img src="<?php echo $global['home_link']; ?>images/bbb-img.png" width="147" height="67"
                                            alt="bbb"/></div>
            </div>
            <div class="clr"></div>

        </div>

        <div class="p-dollar p-dollar2"><img src="<?php echo $global['home_link']; ?>images/dollar.jpg" width="800" height="141"/>
        </div>

    </div>
<?php
require_once 'footer.php';
?>