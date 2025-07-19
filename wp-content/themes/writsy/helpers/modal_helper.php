<?php
/*
* For Modals those prepared by ajax
* This is use to place modal html
*/
function modal_placeholder($id = 'common_popup_modal')
{
    echo '<div id="' . $id . '_mp"></div>';
}

/*
* To create a Modal
* $param[id]: Modal id attribute
* $param[heading]: Modal Heading
* $param[inner_html]: Inner HTML of a Modal
*/
function create_modal($param = array())
{
    $heading = ($param['heading'] != '') ? '<h2 class="brn">' . $param['heading'] . '</h2>' : '';
    $cls = isset($param['class']) ? $param['class'] : '';
    $html = '<!-- Modal -->';
    $html .= '<div class="modal fade" id="' . $param['id'] . '" tabindex="-1" role="dialog" aria-labelledby="' . $param['id'] . 'Label">';
    $html .= '<div class="modal-dialog ' . $cls . '" role="document">';
    $html .= '<div class="modal-content">';
    /*$html .= '<button type="button" class="close cls-btn" id="' . $param['id'] . '_close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">x</span> </button>';*/
    $html .= '<div class="modal-body">';
    $html .= '<div class="leads-col">';
    $html .= '<button type="button" class="close cls-btn" id="common_popup_modal_close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">x</span> </button>';
    $html .= $heading;
    $html .= $param['inner_html'];
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= toolTip_script();
    $html .= modal_check_exist();
    return $html;
}

function progressBar($dob, $city, $state)
{
    $html = '
<div id="progress-bar-div">
    <div class="data-progess hidden" id="pb1">
    <div class="heading-popup"><span>SEARCHING FOR RATE INFORMATION</span></div>
        <h2>Gathering data for: <span>' . $city . ', ' . $state . '</span></h2>
        <div class="progress">
            <div class="progress progress-striped active">
                <div class="bar pb1" style="width: 0%;"></div>
            </div>
        </div>
    </div>
    <div class="data-progess hidden" id="pb2">
        <h2>Analyzing options for a person born in: <span>' . $dob . '</span>
        </h2>
        <div class="progress progress-striped strip2 active">
            <div class="bar pb2" style="width: 0%;"></div>
        </div>
    </div>
    <div class="data-progess hidden" id="pb3">
        <h2>Reviewing: <span>A+ Rated Companies</span></h2>
        <div class="progress progress-striped strip3 active">
            <div class="bar pb3" style="width: 0%;"></div>
        </div>
    </div>
    <div id="check-mark-section" class="hidden">
    <div class="heading-popup"><span>SUCCESS! We’ve found rates for you.</span></div>
        <div class="image-success center"><img
                src="images/checkmark.png">
        </div>
        <div class="fill-form large-text">
           <span id="blinker" class="blink_me">Please wait while we load your results</span>
        </div>
    </div>
</div>
';
    return $html;
}

function tableSection($state, $state_code, $dob, $lpId = 0, $lpLogId = 0)
{
    $annuity_rates = _apiCallForLandingPage(array('state_code' => $state_code, 'yob' => $dob, 'lp_log_id' => $lpLogId), 'annuity_rates');
    $first_year = isset($annuity_rates['1_year']) ? ($annuity_rates['1_year']) : 0;
    $five_year = isset($annuity_rates['5_year']) ? intval($annuity_rates['5_year']) : 0;
    $ten_year = isset($annuity_rates['10_year']) ? intval($annuity_rates['10_year']) : 0;
    $premium_annuity_rate = isset($annuity_rates['premium_annuity_rate']) ? intval($annuity_rates['premium_annuity_rate']) : 0;
    $html = '
<div id="table-section-div" class="hidden">
<div class="heading-popup"><span>GUARANTEED ANNUITY RETURNS</span></div>
<div class="state-base">
	Based on an individual from <span>' . $state . '</span>, born in <span>' . $dob . '</span>, with $' . number_format($premium_annuity_rate) . ' in Premium, <br>
    our system has found the following <strong>actual payouts.</strong>
  </div>
    <div class="table-section table-sections">
        <table class="rates-table">
            <tbody>
            <tr>
                <th>Payout Starting In</th>
                <th>Annual Payout $</th>
                <th>Gross Payout %</th>
            </tr>
            <tr>
                <td>1 Year</td>
                <td>$' . number_format($first_year) . '</td>
                <td>' . (($premium_annuity_rate > 0) ? number_format((($first_year / $premium_annuity_rate) * 100), 2) : 0) . '%</td>
            </tr>
            <tr>
                <td>5 Years</td>
                <td>$' . number_format($five_year) . '</td>
                <td>' . (($premium_annuity_rate > 0) ? number_format((($five_year / $premium_annuity_rate) * 100), 2) : 0) . '%</td>
            </tr>
            <tr>
                <td>10 Years</td>
                <td>$' . number_format($ten_year) . '</td>
                <td>' . (($premium_annuity_rate > 0) ? number_format((($ten_year / $premium_annuity_rate) * 100), 2) : 0) . '%</td>
            </tr>

            </tbody>
        </table>
        </div>
		<div class="form-block">
		<div class="fill-form">
Get quotes from top companies based on your profile, including: <br>
marital status, location, investment amount & retirement goals.
        </div>
        <form lpformnum="1" class="form-invest" id="form_id2" action="https://admin.financialize.com/api/lead_post.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-box">
                        <label>First Name</label>
                        <input type="text"  name="first_name" id="first_name" class="garlic-auto-save">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-box">
                        <label>Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="garlic-auto-save">
                       
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-box">
                        <label>Phone Number</label>
                        <input type="text" name="phone_day" id="phone_day" class="garlic-auto-save">
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-box">
                        <label>Email Address</label>
                        <input type="text" name="email" id="email" class="garlic-auto-save">
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-box">
                        <label>Amount to Invest</label>
                        
                            <select class="garlic-auto-save" name="investment" id="investment">
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
                <div class="col-md-12">
                    <div class="form-box">
                        <a href="javascript:void(0)" onclick="popUpvalidateFormStep2(\'form_id2\')">GET MY PERSONALIZED QUOTE</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
			<div class="privacy-pol">
	We guarantee 100% privacy.<br>
  Your information will not be shared.
</div>
        </form>
		</div>';
    if ($lpId != '1357') {
        $html .= '<div class="trust-symbolx">
  <span><img src="images/p_certified.png"></span>
  <span><img src="images/p_sitelock.png"></span>
  <span><img src="https://www.shopperapproved.com/seals/16082-m.gif"></span>
</div>';
    }
    $html .= '<div class="privacy-detail">
  Disclaimer: Payout percentage based on a ratio compared to policy premium.  Surrender charges apply to base contracts. Optional lifetime income benefit riders are used to calculate lifetime payments only and not available for cash surrender or in a death benefit unless specified in the annuity contract. Fees may apply. Guarantees are based on the financial strength and claims paying ability of the insurance company. It is important that you read all insurance contract disclosures carefully before making a purchase decision. Rates and returns may vary based on state availability and are subject to change without notice. This information does not represent tax, legal, or investment advice.
</div>
    </div>
</div>';
    return $html;
}

//fix Scroll and focus issue with multiple modals
function modal_check_exist()
{
    $script = "<script>jQuery('.modal').on('hidden.bs.modal', function (e) {
            if(jQuery('.modal').hasClass('in')) {
            jQuery('body').addClass('modal-open');
            }    
    });</script>";
    return $script;
}

function toolTip_script()
{
    $tooltip = 'tooltip';
    $tooltip = "'" . $tooltip . "'";
    $script = '<script>jQuery(function () {
              jQuery("[data-toggle=' . $tooltip . ']").tooltip();';
    $script .= 'jQuery("a").tooltip();';
    $script .= '        }
        );</script>';
    return $script;
}

function optinProgressBar($dob, $city, $state)
{
    $html = '
<div id="progress-bar-div">
    <div class="exit-popup progress-heading">
    <div class="p-popup-heading">
        <span>SEARCHING FOR RATE INFORMATION</span>
    <div class="popup-close-btn" data-dismiss="modal"><a href="javascript://">X</a></div>
    </div>
    <div class="optin_content-main-box">
    <div class="data-progess hidden" id="pb1">
        <h2>Gathering data for: <span>' . $city . ', ' . $state . '</span></h2>
        <div class="progress">
            <div class="progress progress-striped active">
                <div class="bar pb1" style="width: 0%;"></div>
            </div>
        </div>
    </div>
    <div class="data-progess hidden" id="pb2">
        <h2>Analyzing options for a person born in: <span>' . $dob . '</span>
        </h2>
        <div class="progress progress-striped strip2 active">
            <div class="bar pb2" style="width: 0%;"></div>
        </div>
    </div>
    <div class="data-progess hidden" id="pb3">
        <h2>Reviewing: <span>A+ Rated Companies</span></h2>
        <div class="progress progress-striped strip3 active">
            <div class="bar pb3" style="width: 0%;"></div>
        </div>
    </div>
    </div>
    </div>
    <div id="check-mark-section" class="hidden">
    <div class="exit-popup">
    <div class="p-popup-heading"><span>SUCCESS! We’ve found rates for you.</span>
    <div class="popup-close-btn" data-dismiss="modal"><a href="javascript://">X</a></div>
    </div>
    <div class="optin_content-main-box">
        <div class="image-success center"><img
                src="./info/images/checkmark.png">
        </div>
        <div class="fill-form large-text">
           <span id="blinker" class="blink_me">Please wait while we load your results</span>
        </div>
    </div>
    </div>
    </div>
</div>
';
    return $html;
}

function optinTableSection($state, $state_code, $dob, $zip = 0, $city = '')
{
    $annuity_rates = _apiCallForLandingPage(array('state_code' => $state_code, 'yob' => $dob, 'lp_log_id' => 0), 'annuity_rates');
    $first_year = isset($annuity_rates['1_year']) ? ($annuity_rates['1_year']) : 0;
    $five_year = isset($annuity_rates['5_year']) ? intval($annuity_rates['5_year']) : 0;
    $ten_year = isset($annuity_rates['10_year']) ? intval($annuity_rates['10_year']) : 0;
    $premium_annuity_rate = isset($annuity_rates['premium_annuity_rate']) ? intval($annuity_rates['premium_annuity_rate']) : 0;
    $html = '
<div id="table-section-div" class="hidden">
<div class="exit-popup">
<div class="p-popup-heading"><span>GUARANTEED ANNUITY RETURNS</span>
<div class="popup-close-btn" data-dismiss="modal"><a href="javascript://">X</a></div>
</div>
<div class="optin_content-main-box">
<div class="state-base">
	Based on an individual from <span>' . $state . '</span>, born in <span>' . $dob . '</span>, with $' . number_format($premium_annuity_rate) . ' in Premium, <br>
    our system has found the following <strong>actual payouts.</strong>
  </div>
    <div class="table-section table-sections">
        <table class="rates-table">
            <tbody>
            <tr>
                <th>Payout Starting In</th>
                <th>Annual Payout $</th>
                <th>Gross Payout %</th>
            </tr>
            <tr>
                <td>1 Year</td>
                <td>$' . number_format($first_year) . '</td>
                <td>' . (($premium_annuity_rate > 0) ? number_format((($first_year / $premium_annuity_rate) * 100), 2) : 0) . '%</td>
            </tr>
            <tr>
                <td>5 Years</td>
                <td>$' . number_format($five_year) . '</td>
                <td>' . (($premium_annuity_rate > 0) ? number_format((($five_year / $premium_annuity_rate) * 100), 2) : 0) . '%</td>
            </tr>
            <tr>
                <td>10 Years</td>
                <td>$' . number_format($ten_year) . '</td>
                <td>' . (($premium_annuity_rate > 0) ? number_format((($ten_year / $premium_annuity_rate) * 100), 2) : 0) . '%</td>
            </tr>

            </tbody>
        </table>
        </div>
		<div class="form-block">
		<div class="fill-form">
Get quotes from top companies based on your profile, including: <br>
marital status, location, investment amount & retirement goals.
        </div>
        <form lpformnum="1" class="form-invest" id="form_id2" action="https://admin.financialize.com/api/lead_post.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-box">
                        <label>First Name</label>
                        <input type="text"  name="first_name" id="exit_first_name" class="garlic-auto-save">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-box">
                        <label>Last Name</label>
                        <input type="text" name="last_name" id="last_name" class="garlic-auto-save">
                       
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-box">
                        <label>Phone Number</label>
                        <input type="text" name="phone_day" id="phone_day" class="garlic-auto-save phone_day">
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-box">
                        <label>Email Address</label>
                        <input type="text" name="email" id="email" class="garlic-auto-save">
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-box">
                        <label>Amount to Invest</label>
                        
                            <select class="garlic-auto-save" name="investment" id="investment">
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
                <input type="hidden" name="dob_y" value="' . $dob . '">
                <input type="hidden" name="zip_code" value="' . $zip . '">
                 <input type="hidden" name="form_type" value="exit">
                 <input type="hidden" name="city" value="' . $city . '">
                 <input type="hidden" name="state" value="' . $state_code . '">
                 <input type="hidden" name="cid" value="333">
                <div class="col-md-12">
                    <div class="form-box">
                        <a href="javascript:void(0)" onclick="validateOptinForms(jQuery(this))">GET MY PERSONALIZED QUOTE</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
			<div class="privacy-pol">
	We guarantee 100% privacy.<br>
  Your information will not be shared.
</div>
        </form>
		</div>';
    $html .= '<div class="trust-symbolx">
  <span><img src="./info/images/p_certified.png"></span>
  <span><img src="./info/images/p_sitelock.png"></span>
  <span><img src="https://www.shopperapproved.com/seals/16082-m.gif"></span>
</div>';
    $html .= '<div class="privacy-detail">
  Disclaimer: Payout percentage based on a ratio compared to policy premium.  Surrender charges apply to base contracts. Optional lifetime income benefit riders are used to calculate lifetime payments only and not available for cash surrender or in a death benefit unless specified in the annuity contract. Fees may apply. Guarantees are based on the financial strength and claims paying ability of the insurance company. It is important that you read all insurance contract disclosures carefully before making a purchase decision. Rates and returns may vary based on state availability and are subject to change without notice. This information does not represent tax, legal, or investment advice.
</div>
    </div>
    </div>
    </div>
</div>';
    return $html;
}