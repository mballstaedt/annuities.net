<script>var baseURL = "https://annuities.com/info/";
    var apiURL = "https://admin.financialize.com/api/";
    var invFormURL = "https://admin.financialize.com/api/invalid_form.php";
    var ajaxURL = "https://admin.financialize.com/api/ajax.php";</script>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Test Annuities</title>
    <link rel="stylesheet" type="text/css" href="https://annuities.com/info/css/lp-content.css"/>
    <link rel="stylesheet" type="text/css" href="https://annuities.com/info/css/facebox.css"/>
    <link href='https://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet'
          type='text/css'/>
    <link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet'
          type='text/css'/>
    <script type="text/javascript">
        var protocol = 'https://';
    </script>
    <script type="text/javascript" src="https://annuities.com/info/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://annuities.com/info/js/jquery.maskedinput-1.4.1.min.js"></script>
    <script type="text/javascript" src="https://annuities.com/info/js/arq_custom_js.js"></script>
    <script type="text/javascript" src="https://annuities.com/info/js/facebox.js"></script>
    <!--Ticket #764 task started -->
    <link rel="stylesheet" type="text/css" href="https://annuities.com/info/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://annuities.com/info/css/widget.css"/>
    <script type="text/javascript" src="https://annuities.com/info/js/bootstrap.min.js"></script>
    <!--Ticket #764 task End -->
    <script type="text/javascript" src="https://annuities.com/info/js/garlic/garlic.js"></script>
    <script type="text/javascript" src="https://annuities.com/info/js/google_analytics.js"></script>
    <script type="text/javascript"
            src="https://annuities.com/info/js/google-analytics-scroll-tracking.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#phone_day").mask("(999) 999-9999");
            $(".phone_day").mask("(999) 999-9999");
            $("#first_name").focus();
            $('form').garlic();
        });
    </script>
    <!-- Optimizely -->
    <script src="//cdn.optimizely.com/js/2230624428.js"></script>
    <?php if (isset($_REQUEST['ssl_test']) && $_REQUEST['ssl_test'] == 1) { ?>
        <link type="image/jpeg" href="//www.financialize.com/images/library_image/favicon.ico"
              rel="shortcut icon">
    <?php } else {
        ?>
        <link rel="stylesheet" type="text/css" href="https://annuities.com/info/css/popup.css"/>
    <?php }
    ?>
</head>

<body>
<div class="p-wrapper">
    <div class="p-container">
        <!------------------------header_section------------------------------------------------------->
        <section class="header">
            <div class="logo">
                <a class="cg-main-logo" href="https://www.annuities.com/" rel="home" style="position:relative;">
                    <?php if (isset($_REQUEST['ssl_test']) && $_REQUEST['ssl_test'] == 1) { ?>
                        <img class="desk-logo" src="//www.financialize.com/images/library_image/annuities-logo-red.jpg"
                             alt="Annuities.com - Free Annuity Rate Quotes"/>
                        <img class="mobo-logo" width="325px"
                             src="//www.financialize.com/images/library_image/annuities-logo-red.jpg"
                    <?php } else { ?>
                        <img class="desk-logo" src="images/annuities-logo-red.jpg"
                             alt="Annuities.com - Free Annuity Rate Quotes"/>
                        <img class="mobo-logo" width="325px"
                             src="images/annuities-logo-red.jpg"
                             alt="Annuities.com - Free Annuity Rate Quotes"/>
                    <?php } ?>
                    <span class="tooltip-custom"> Annuities . com - Free Annuity Rate Quotes </span>
                </a>
            </div>
            <div class="slug"> Independent Investment Advice</div>
            <div class="clr"></div>
        </section>
        <!------------------------Maincontent_section------------------------------------------------------->
        <section class="content-section">
            <!----Banner_section--->
            <section class="banner-col">
                <div class="banner-section"><img
                        src="https://admin.financialize.com/uploads/library_image/banner-investment.png"
                        title="annuities" alt="annuities banner"/></div>
                <h1>
                    <span> Looking for the Highest Guaranteed Return?</span>
                </h1>
                <div class="bullet-points">
                    <ul>
                        <li><a> Up to 7 % Returns * with NO Market Risk </a></li>
                        <li><a> A + Rated Companies </a></li>
                        <li><a> Safe Retirement Income </a></li>
                        <li><a> Get 2017 &#39;s Highest Rates Now </a></li>
                    </ul>
                </div>
            </section>
            <div class="mobo-btn"><a href="#form-id" id="mobile_anchor"> Free Report & Rate Quotes </a></div>
            <!---innercontet_section--->
            <section class="content">
                <section class="receive-form-col">
                    <div class="complete-receive">
                        Complete the Form to Receive Your
                    </div>
                    <div class="free-annuity"> Free Annuity Comparison Report .</div>
                    <div class="report-include">
                        Your FREE report includes rates & reviews on the highest paying annuities available from A +
                        rated companies . Reports are customized for State, Age and Risk Tolerance .
                    </div>
                    <div class="get-now">
                        About your Personalized Report:
                    </div>
                    <div class="get-now-list">
                        <ul>
                            <li> Learn how annuities offer guaranteed monthly income, no market risk and are designed
                                for
                                safe retirement planning .
                            </li>

                            <li> Reports take us 3 to 4 hours to complete . We require valid information so please
                                double
                                check your information carefully .
                            </li>
                        </ul>
                    </div>
                </section>
                <section id="form-id" class="formbox">
                    <h3>
                        Get Free Annuity Rates
                    </h3>
                    <div class="form-box-main">
                        <form class="quotes-form" action="https://admin.financialize.com/api/lead_post.php"
                              name="form_id1" method="post" id="form_id1">
                            <label> First Name < span>*</span ></label>
                            <input type="text" name="first_name" id="first_name"
                                   value=""/>
                            <br/>
                            <label> Last Name < span>*</span ></label>
                            <input type="text" name="last_name" id="last_name"
                                   value=""/>
                            <br/>
                            <label> Phone<span>*</span></label>
                            <input type="text" name="phone_day" id="phone_day"/>
                            <br/>
                            <label> Email<span>*</span></label>
                            <input type="text" name="email" id="email" value=""/>
                            <br/>
                            <label> Zip Code < span>*</span ></label>
                            <input type="text" name="zip_code" id="zip_code" maxlength="5"
                                   onblur="get_city_state(this.value,&#39;popUp&#39;);"/>
                            <br/>
                            <label> Year of Birth < span>*</span ></label>
                            <select name="dob_y" id="dob_y">
                                <option value=""> Please Select</option>
                                <option value="1990"> 1990</option>
                                <option value="1989"> 1989</option>
                                <option value="1988"> 1988</option>
                                <option value="1987"> 1987</option>
                                <option value="1986"> 1986</option>
                                <option value="1985"> 1985</option>
                                <option value="1984"> 1984</option>
                                <option value="1983"> 1983</option>
                                <option value="1982"> 1982</option>
                                <option value="1981"> 1981</option>
                                <option value="1980"> 1980</option>
                                <option value="1979"> 1979</option>
                                <option value="1978"> 1978</option>
                                <option value="1977"> 1977</option>
                                <option value="1976"> 1976</option>
                                <option value="1975"> 1975</option>
                                <option value="1974"> 1974</option>
                                <option value="1973"> 1973</option>
                                <option value="1972"> 1972</option>
                                <option value="1971"> 1971</option>
                                <option value="1970"> 1970</option>
                                <option value="1969"> 1969</option>
                                <option value="1968"> 1968</option>
                                <option value="1967"> 1967</option>
                                <option value="1966"> 1966</option>
                                <option value="1965"> 1965</option>
                                <option value="1964"> 1964</option>
                                <option value="1963"> 1963</option>
                                <option value="1962"> 1962</option>
                                <option value="1961"> 1961</option>
                                <option value="1960"> 1960</option>
                                <option value="1959"> 1959</option>
                                <option value="1958"> 1958</option>
                                <option value="1957"> 1957</option>
                                <option value="1956"> 1956</option>
                                <option value="1955"> 1955</option>
                                <option value="1954"> 1954</option>
                                <option value="1953"> 1953</option>
                                <option value="1952"> 1952</option>
                                <option value="1951"> 1951</option>
                                <option value="1950"> 1950</option>
                                <option value="1949"> 1949</option>
                                <option value="1948"> 1948</option>
                                <option value="1947"> 1947</option>
                                <option value="1946"> 1946</option>
                                <option value="1945"> 1945</option>
                                <option value="1944"> 1944</option>
                                <option value="1943"> 1943</option>
                                <option value="1942"> 1942</option>
                                <option value="1941"> 1941</option>
                                <option value="1940"> 1940</option>
                                <option value="1939"> 1939</option>
                                <option value="1938"> 1938</option>
                                <option value="1937"> 1937</option>
                                <option value="1936"> 1936</option>
                                <option value="1935"> 1935</option>
                                <option value="1934"> 1934</option>
                                <option value="1933"> 1933</option>
                                <option value="1932"> 1932</option>
                                <option value="1931"> 1931</option>
                                <option value="1930"> 1930</option>
                                <option value="1929"> 1929</option>
                                <option value="1928"> 1928</option>
                                <option value="1927"> 1927</option>
                                <option value="1926"> 1926</option>
                                <option value="1925"> 1925</option>
                            </select>
                            <br/>
                            <label> Investment<span>*</span></label>
                            <select name="investment" id="investment">
                                <option value=""> Please Select</option>
                                <option value="$0 - $10,000"> $0 - $10,000</option>
                                <option value="$10,000 - $25,000"> $10,000 - $25,000</option>
                                <option value="$25,000 - $50,000"> $25,000 - $50,000</option>
                                <option value="$50,000 - $100,000"> $50,000 - $100,000</option>
                                <option value="$100,000 - $250,000"> $100,000 - $250,000</option>
                                <option value="$250,000 - $500,000"> $250,000 - $500,000</option>
                                <option value="$500,000 - $1 Million"> $500,000 - $1 Million</option>
                                <option value="$1 Million - $3 Million"> $1 Million - $3 Million</option>
                                <option value="More than $3 Million"> More than $3 Million</option>
                            </select>
                            <a id="form_submit" href="javascript:void(0)"
                               onclick="popUpvalidateForm(&#39;form_id1&#39;)"> GET RATES NOW </a>
                            <input type="hidden" name="http_reffer"
                                   value=""/><input type="hidden" name="landing_page_id" value="1293"/><input
                                type="hidden" name="cid" value="225"/><input type="hidden" name="aff_id"
                                                                             value="147"/><input type="hidden"
                                                                                                 name="subid"
                                                                                                 value="0"/><input
                                type="hidden" name="subid2" value="0"/><input type="hidden" name="subid3"
                                                                              value="0"/><input type="hidden"
                                                                                                name="subid4"
                                                                                                value="0"/><input
                                type="hidden" name="subid5" value="0"/><input type="hidden" name="xsubid"
                                                                              value="0"/><input type="hidden"
                                                                                                name="xaffid"
                                                                                                value="0"/><input
                                type="hidden" name="transid" value="0"/><input type="hidden" name="google_parameters_id"
                                                                               value="0"/><input type="hidden"
                                                                                                 name="newspaper_image_log_id"
                                                                                                 value="19596461"/><input
                                type="hidden" name="background_image_log_id" value="19596462"/><input type="hidden"
                                                                                                      name="top_heading_log_id"
                                                                                                      value="0"/><input
                                type="hidden" name="banner_heading_log_id" value="0"/><input type="hidden"
                                                                                             name="free_report_heading_log_id"
                                                                                             value="0"/><input
                                type="hidden" name="more_heading_log_id" value="0"/><input type="hidden"
                                                                                           name="screen_width"
                                                                                           id="screen_width"
                                                                                           value=""/><input
                                type="hidden" name="screen_height" id="screen_height" value=""/><input type="hidden"
                                                                                                       type="text"
                                                                                                       name="city"
                                                                                                       id="city"
                                                                                                       value=""/><input
                                type="hidden" type="text" name="state" id="state" value=""/><input type="hidden"
                                                                                                   type="text"
                                                                                                   name="google_parameters_smart[seo_engine]"
                                                                                                   id="state" value=""/><input
                                type="hidden" type="text" name="google_parameters_smart[seo_keyword]" id="state"
                                value=""/><input type="hidden" type="text" name="google_parameters_smart[source_medium]"
                                                 id="state" value="PPC"/><input type="hidden" type="text"
                                                                                name="google_parameters_smart[source_engine]"
                                                                                id="state" value=""/><input
                                type="hidden" type="text" name="google_parameters_smart[utm_source]" id="state"
                                value="Google"/><input type="hidden" type="text"
                                                       name="google_parameters_smart[utm_campaignid]" id="state"
                                                       value="596716975"/><input type="hidden" type="text"
                                                                                 name="google_parameters_smart[source_campaign]"
                                                                                 id="state"
                                                                                 value="F-G-FL-Hillsborough"/><input
                                type="hidden" type="text" name="google_parameters_smart[utm_adgroupid]" id="state"
                                value="24968560245"/><input type="hidden" type="text"
                                                            name="google_parameters_smart[source_adgroup]" id="state"
                                                            value="Annuity-Rates-%28Exact%29"/><input type="hidden"
                                                                                                      type="text"
                                                                                                      name="google_parameters_smart[source_content]"
                                                                                                      id="state"
                                                                                                      value="100424904405"/><input
                                type="hidden" type="text" name="google_parameters_smart[utm_termid]" id="state"
                                value="kwd-31022530"/><input type="hidden" type="text"
                                                             name="google_parameters_smart[source_term]" id="state"
                                                             value="Annuity+rates"/><input type="hidden" type="text"
                                                                                           name="google_parameters_smart[source_network]"
                                                                                           id="state"
                                                                                           value="Search"/><input
                                type="hidden" type="text" name="google_parameters_smart[source_note]" id="state"
                                value=""/><input type="hidden" type="text" name="google_parameters_smart[msclkid]"
                                                 id="state" value=""/><input type="hidden" type="text"
                                                                             name="google_parameters_smart[gclid]"
                                                                             id="state"
                                                                             value="CNXi_Njr2dACFQQpaQodBF4OUg"/><input
                                type="hidden" type="text" name="google_parameters_smart[gclic]" id="state"
                                value=""/><input type="hidden" type="text" name="google_parameters_smart[referer]"
                                                 id="state" value=""/><input type="hidden" type="text"
                                                                             name="google_parameters_smart[new_referrer]"
                                                                             id="state" value="g"/><input type="hidden"
                                                                                                          type="text"
                                                                                                          name="google_parameters_smart[placement]"
                                                                                                          id="state"
                                                                                                          value=""/><input
                                type="hidden" type="text" name="google_parameters_smart[mobile]" id="state"
                                value="[computer]"/><input type="hidden" type="text"
                                                           name="google_parameters_smart[device]" id="state" value="c"/><input
                                type="hidden" type="text" name="google_parameters_smart[devicemodel]" id="state"
                                value=""/><input type="hidden" type="text" name="google_parameters_smart[match]"
                                                 id="state" value="e"/><input type="hidden" type="text"
                                                                              name="google_parameters_smart[adposition]"
                                                                              id="state" value="1t2"/><input
                                type="hidden" type="text" name="google_parameters_smart[bidmatch]" id="state" value=""/><input
                                type="hidden" type="text" name="google_parameters_smart[keywordid]" id="state"
                                value=""/></form>
                        <div class="center"><a onclick="pop_ups(&#39;privacy_policy&#39;,true)"
                                               href="javascript:void(0)"> We guarantee 100 % privacy .<br>
                                Your information will not be shared .
                            </a></div>
                    </div>
                </section>
                <div class="clr"></div>

            </section>
        </section>
        <div class="clearfix"></div>
        <section class="widgets-section">
            <!--------------------------------Start Widgets Section---------------------------------------------------------->
            <div class="about-widget">
                <div class="about-widget-main">
                    <div class="col-md-6">
                        <h2 class="abt-heading"> About Us </h2>
                        <p class="p-abt-desc">
                            Annuities . com is a resource for consumers doing research for their retirement planning .
                            We
                            are not affiliated with any company, nor do we sell any financial products or services . We
                            &#39;ll
                            help you figure out if an annuity is a good fit for your retirement portfolio, and we
                            provide free annuity rate quotes to help you compare options before making any decision .
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="abt-heading"> Frequently Asked Questions </h2>
                        <div class="about-accordion">
                            <div class="panel-group" id="accordion34" role="tablist" aria - multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data - toggle="collapse"
                                               data - parent="#accordion34" href="#collapseOne_accordion34"
                                               aria - expanded="false" aria - controls="collapseOne">
                                                What kind of Quote Report will I get ?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne_accordion34" class="panel-collapse collapse" role="tabpanel"
                                         aria - labelledby="headingOne">
                                        <div class="panel-body">
                                            All our quote reports are personalized based on your age, assets, retirement
                                            time - frame, risk tolerance and goals . You will have the opportunity to
                                            compare quotes and ask questions as they pertain to your needs .
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data - toggle="collapse"
                                               data - parent="#accordion34" href="#collapseTwo_accordion34"
                                               aria - expanded="false" aria - controls="collapseTwo">
                                                Is this information really free ?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo_accordion34" class="panel-collapse collapse" role="tabpanel"
                                         aria - labelledby="headingTwo">
                                        <div class="panel-body">
                                            Yes, this is a free service designed to give you the tools you need to make
                                            an informed decision . The personalized quote report will allow you to
                                            compare your options and ask questions .
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data - toggle="collapse"
                                               data - parent="#accordion34" href="#collapseThree_accordion34"
                                               aria - expanded="false" aria - controls="collapseThree">
                                                Are you affiliated with any insurance companies ?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree_accordion34" class="panel-collapse collapse" role="tabpanel"
                                         aria - labelledby="headingThree">
                                        <div class="panel-body">
                                            No, Annuities . com is not an insurance company nor are we affiliated with
                                            one . Annuities . com is an independent source for financial and retirement
                                            information .
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!---------------------------------End Widgets Section----------------------------------------------------------->
        </section>
        <!--------------------------------footer---------------------------------------------------------->
        <footer>
            <!--ssl-->
            <div class="security-certificate">
                <span id="siteseal"></span>
                <img height="33px" width="80px" src="images/certified.png"/>
                <img src="images/sitelock.png"/>
            </div>
            <!--footer-description-->
            <div class="footer-decription">
                <p>
                    Disclaimer: This is not investment advice . All information on this site is intended for educational
                    purposes only . We are not liable for any potential damages that may be incurred from this
                    information .
                    Always consult a licensed financial professional before investing .
                </p>
            </div>
            <hr>
            <!---lower - footer-->
            <div class="p-footer-navigation">
                <ul>
                    <li><a onclick="pop_ups(&#39;about_us&#39;)" href="javascript:void(0)"> About us </a></li>
                    <li><a onclick="pop_ups(&#39;privacy_policy&#39;)" href="javascript:void(0)"> Privacy Policy </a>
                    </li>
                    <li><a onclick="pop_ups(&#39;terms_of_use&#39;)" href="javascript:void(0)"> Terms of Use</a></li>
                </ul>
            </div>
            <div class="p-copy-right"> © 2017 Annuities . com . All Rights Reserved .</div>

        </footer>
        <div class="for-popup">
            <div id="sitelock_content_popup" style="display:none;">
                <div class="popup-inner-cont">
                    <div class="pop-up-logo"><img src="images/p_sitelock.png"></div>
                    <div class="pop-up-link"> Annuities . com</div>
                    <div class="p-text-pop">
                        <p> Annuities . com is protected by SSL Encryption . This is a security protocol that protects
                            the
                            transfer of any sensitive information from 3rd parties . You can verify whether our site(or
                            any site) uses SSL by looking at the URL, or web address, of the page you are viewing . It
                            should start with https, instead of http, and you should see a small lock icon in your
                            browser’s view bar . Many secure sites such as ours will also allow you to click on the
                            small
                            lock icon to verify that the page is indeed protected with SSL Encryption and the page is
                            secure .</p>
                        <p>If you are ever on any website that asks you sensitive information and you notice that the
                            page is not https, you should reconsider entering and submitting your data, as the data
                            itself is more susceptible to hacking or being stolen .</p>
                        <div class="cls-btn-row close-bttn">
                            <a href="javascript:void(0)" class="cls-btn"> Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="bbb_content_popup" style="display:none;">
                <div class="popup-inner-cont">
                    <div class="pop-up-logo"><img src="images/p_certified.png"></div>
                    <div class="pop-up-link"> Annuities . com</div>
                    <div class="p-text-pop">
                        <p> Annuities . com is a resource for consumers doing research for their retirement planning .
                            Our
                            website has two primary goals: first, to help you figure out if an annuity might be a good
                            fit for your investment / retirement portfolio; and second, to provide free annuity rate
                            quotes so you can compare your options before you make any decision .</p>
                        <p> Receiving objective, unbiased information is critical when talking about your retirement
                            money, so it is important to know that we are NOT affiliated with any financial services or
                            insurance company, nor do we sell any financial products or services . We have helped
                            thousands of people like you find answers to questions on a wide range of annuity topics,
                            and have delivered free annuity quotes to retirees and pre - retirees for years .</p>
                        <p> The information on this site should not be used as a substitute for the professional advice
                            of an accountant, insurance agent, financial planner, or other qualified professional .</p>
                        <div class="cls-btn-row close-bttn">
                            <a href="javascript:void(0)" class="cls-btn"> Close</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="about_us" style="display:none;">
                <div class="popup-inner-cont">
                    <div class="p-heading-pop"> About Us</div>
                    <div class="p-text-pop">
                        <p> For years, Annuities . com has provided objective, unbiased annuity information to consumers
                            interested in making the right choices with their retirement savings . We do NOT sell
                            annuities or any other financial products or services, and we are NOT affiliated with any
                            other company . Our
                            job is to answer questions on as wide a range of annuity topics as possible, and provide
                            free annuity
                            quotes to consumers who feel an annuity might be the right fit for them .
                        </p>
                    </div>
                </div>
            </div>
            <div id="terms_of_use" style="display:none;">
                <div class="popup-inner-cont">
                    <div class="p-heading-pop"> Terms of Use</div>
                    <div class="p-text-pop">
                        <p>
                            Fill out our fast and easy quote form now and receive multiple quotes from our top rated
                            annuity companies . We take your privacy very seriously so your information is encrypted and
                            stored
                            safely in our secure location .
                        </p>
                        <p>
                            All content, products, and software used on this website is provided "as-is" . Annuities .
                            com
                            provides no warranties or representations of any kind, regardless if they are expressed or
                            implied .
                            We cannot be held liable for errors, misspellings, typos, defects, viruses, harmful software
                            or
                            components, emails, or information exchanged with this site .
                        </p>
                        <p>
                            Annuities . com cannot and will not be held liable for any direct or indirect cost,
                            liability,
                            injury, damage, loss of privacy, or security flaw in any way related directly or indirectly
                            to
                            Annuities . com . Use of this website is strictly prohibited if you do not agree with the
                            Terms
                            of Use and Privacy Policy of Annuities . com . If you choose to use Annuities.com you
                            forfeit
                            any and
                            all right to arbitration against Annuities . com .
                        </p>
                    </div>
                </div>
            </div>
            <div id="privacy_policy" style="display:none;">
                <div class="popup-inner-cont">
                    <div class="p-heading-pop"> Privacy Policy</div>
                    <div class="p-text-pop">
                        <p> We consider respecting a user &#39;s privacy as one of our most significant
                            responsibilities.
                            We
                            created the following privacy policy guidelines with a fundamental respect of your right to
                            privacy .
                            Our guidelines for collecting, protecting and sharing your information you provide us during
                            a
                            visit to our website appear below .</p>
                        <p><b> Personally Identifiable Information:</b><br/>
                            Our site uses forms for individuals to provide limited personal data for the processing of
                            quotes . We collect your contact information and demographic information . All information
                            you
                            give us
                            on this Web site is stored on our secure computer servers . Access to stored information is
                            restricted to authorized personnel .</p>
                        <p><b> Links To Other Sites:</b><br/>
                            Our site may contain links to other sites . Please note that when you click on one of these
                            links you are clicking to another Web site . Annuities . com is not responsible for the
                            privacy
                            practices
                            or content of such websites . We encourage you to read the privacy statements of these
                            linked
                            sites as their privacy policy may differ from ours .</p>
                        <p>
                            If you choose to visit Annuities . com , your visit and any dispute over privacy is subject
                            to
                            this Policy and our Terms of Use, including limitations on damages, arbitration of disputes,
                            and
                            application of the law of the state of California . If you have any concern about privacy at
                            Annuities . com , please send us a thorough description to info@Annuities . com , and we
                            will
                            try to resolve it .
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--Google - Re - Marketing-->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 1018618075;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt=""
             src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1018618075/?value=0&guid=ON&script=0"/>
    </div>
</noscript><!--Google - Analytics-->
<script>

    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {

                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),

            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)

    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-17667117-13', 'auto');

    ga('send', 'pageview');

</script><!--Improvely - A / B Testing-->
<script type="text/javascript">
    var im_domain = 'finauction';
    var im_project_id = 3;
    (function (e, t) {
        window._improvely = [];
        var
            n = e.getElementsByTagName("script")[0];
        var
            r = e.createElement("script");
        r.type = "text/javascript";
        r.src = "https://" + im_domain + ".iljmp.com/improvely.js";
        r.async = true;
        n.parentNode.insertBefore(r, n);
        if (typeof t.init == "undefined") {
            t.init = function (e, t) {
                window._improvely.push(["init", e, t])
            };
            t.goal = function (e) {
                window._improvely.push(["goal", e])
            };
            t.conversion = function (e) {
                window._improvely.push(["conversion", e])
            };
            t.label = function (e) {
                window._improvely.push(["label", e])
            }
        }
        window.improvely = t;
        t.init(im_domain, im_project_id)
    })(document, window.improvely || [])
</script><!--Adroll Tracking Pixel-->
<script type="text/javascript">
    adroll_adv_id = "R5WD5G4RENH6HFAEX3OYCI";
    adroll_pix_id = "INVPSRPDIVEPPAKZ5OM2M2";
    // adroll_email = "username@example.com"; // OPTIONAL: provide email to improve user identification
    (function () {
        var
            _onload = function () {
                if (document.readyState && !/loaded | complete /.test(document.readyState)) {
                    setTimeout(_onload, 10);
                    return
                }
                if (!window.__adroll_loaded) {
                    __adroll_loaded = true;
                    setTimeout(_onload, 50);
                    return
                }
                var scr = document.createElement("script");
                var  host ="https://s.adroll.com" ;
                scr.setAttribute('async', 'true');
                scr.type = "text/javascript";
                scr.src = host + "/j/roundtrip.js";
                ((document.getElementsByTagName('head') || [null])[0] ||
                document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
            };
        if (window.addEventListener) {
            window.addEventListener('load', _onload, false);
        } else {
            window.attachEvent('onload', _onload)
        }
    }());
</script><!--Bing Pixel Code-->
<script> (function (w, d, t, r, u) {
        var
            f, n, i;
        w[u] = w[u] || [], f = function () {
            var
                o = {
                    ti: "4026037"
                };
            o.q = w[u], w[u] = new UET(o), w[u].push("pageLoad")
        }, n = d.createElement(t), n.src = r, n.async = 1, n.onload = n.onreadystatechange = function () {
            var
                s = this.readyState;
            s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null)
        }, i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i)
    })(window, document, "script", "//bat.bing.com/bat.js", "uetq");</script>
<noscript><img src="//bat.bing.com/action/0?ti=4026037&Ver=2" height="0" width="0"
               style="display:none; visibility: hidden;"/></noscript>
<!--End Bing Pixel Code--><!--Facebook Pixel Code-->
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

    fbq('init', '507977782704074');
    fbq('track', "PageView");</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=507977782704074&ev=PageView&noscript=1"
    /></noscript>
<!--End Facebook Pixel Code--></body>
<script>
    function pop_ups(id, is_form_privacy) {
        is_form_privacy = is_form_privacy || false;
        if (id == 'leads_from') {
            ga('send', 'event', 'Landing Page', 'Click', 'About us');
        } else if (id == 'leads_from3') {
            if (is_form_privacy) {
                ga('send', 'event', 'Landing Page', 'Click', 'Form Privacy');
            } else {
                ga('send', 'event', 'Landing Page', 'Click', 'Privacy Policy');
            }
        } else if (id == 'leads_from2') {
            ga('send', 'event', 'Landing Page', 'Click', 'Terms of Use');
        }
        $.facebox($('#' + id).html());
        $('.close-bttn').click($.facebox.close);
    }
    setScreenResolution();
    $('#mobile_anchor').click(function () {
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 500);
        return false;
    });
</script>
</html>
<script>var optinAjaxURL = "https://annuities.com/info/financialize_optin/ajax/optin_ajax.php";</script>
<script>var optinId = "1";</script>
<script type="text/javascript" src="https://annuities.com/info/financialize_optin/js/custom.js"></script>
