<div class="section_sm2 mtn">
    <div class="thanks_msg mtn">
        <span>Thank You!</span><br>

        <p>A representative will be in touch with you shortly to verify your
            information and get you your quote.<br>Great News! You also qualify to receive the following FREE
            information from our partner, New Retirement:</p>
    </div>
    <div class="clear"></div>
    <div class="finance_bg_thank">
        <?php
        $stateFullName = array("AK" => "Alaska", "AL" => "Alabama", "AR" => "Arkansas", "AZ" => "Arizona", "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut",
            "DC" => "Washington, DC", "DE" => "Delaware", "FL" => "Florida", "GA" => "Georgia", "HI" => "Hawaii", "IA" => "Iowa", "ID" => "Idaho", "IL" => "Illinois", "IN" => "Indiana",
            "KS" => "Kansas", "KY" => "Kentucky", "LA" => "Louisiana", "MA" => "Massachusetts", "MD" => "Maryland", "ME" => "Maine", "MI" => "Michigan", "MN" => "Minnesota",
            "MO" => "Missouri", "MS" => "Mississippi", "MT" => "Montana", "NC" => "North Carolina", "ND" => "North Dakota", "NE" => "Nebraska", "NH" => "New Hampshire",
            "NJ" => "New Jersey", "NM" => "New Mexico", "NV" => "Nevada", "NY" => "New York", "OH" => "Ohio", "OK" => "Oklahoma", "OR" => "Oregon", "PA" => "Pennsylvania",
            "RI" => "Rhode Island", "SC" => "South Carolina", "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah", "VA" => "Virginia", "VT" => "Vermont",
            "WA" => "Washington", "WI" => "Wisconsin", "WV" => "West Virginia", "WY" => "Wyoming");
        $state = ($stateFullName[$state]) ? $stateFullName[$state] : $state;
        ?>
        <h1>Are you <span>62 years or older,</span> and live in
            <span><?php echo $state ? $state : 'California'; ?>?</span><br/>
            Do you want a safe, secure source of cash for retirement?
        </h1>

        <div class="annuity_top_cntnt">

            <p class="txt1">If you answered YES, a <strong>Reverse Mortgage </strong>might be the answer.
                Use this free service from our partner, NewRetirement, to see
                how Reverse Mortgages work, if Reverse Mortgages make sense for you, and if you qualify.
            </p>
            <ul>
                <li>Learn how Reverse Mortgages really work</li>
                <li>Easy qualification: 62 or older & equity in your home</li>
                <li>Get quotes from prescreened, HUD-approved lenders</li>
                <li>Use the money for anything you want</li>
                <li>No monthly payments & no cash needed for closing</li>
            </ul>

            <div class="arrowImg"></div>
        </div>
        <!--<div class="learn_more_org lnk">
          <a href="javascript://" onclick="$.facebox($('#popup').html())">Learn More</a>
      </div>-->
        <div class="finanace_form mR10" id="annuity_form" style="margin-top:18px;">
            <h2>Take the Next Step!</h2>

            <p class="form_up_hd">Simply answer these 3 questions and we'll send you our Free Reverse Mortgage
                information.
            </p>

            <?php


            $qlf = isset($_REQUEST['aqlf']) ? $_REQUEST['aqlf'] : 'no';

            echo getThankyouPageForm($id, $qlf);
            ?>

        </div>
        <div id="new_landing_thanks" class="finanace_form" style="display:none;width:280px;">
            <h2>Take the Next Step!</h2>

            <div class="thank_u_txt" style="font-family:myriad pro">
                <h3>Thank You!</h3>

                <p>A representative will contact you shortly with your Reverse Mortgage information.</p>

                <p></p>

                <p>
                    <a target="_top" href="javascript:void(0)">
                        <img width="165" height="33" alt="Download"
                             src="<?php echo $global['home_link'] ?>ThankYouPages/images/close_window.png">
                    </a>
                </p>
                <span></span>

                <p style="margin-top:180px !important;"></p>

                <p></p>
            </div>
        </div>
    </div>
    <!--        <div class="thanks-text fs18">-->
    <!--            Thank You! We will contact you shortly to go over your Free Retirement Information-->
    <!--        </div>-->
    <!--        <div class="thanks-text fs18">-->
    <!--            while you are waiting ,we can save you money now on special offers from our Trusted Partners-->
    <!--        </div>-->
</div>