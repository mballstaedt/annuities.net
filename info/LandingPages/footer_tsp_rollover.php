<style>
    .more-info {
        max-width: 733px !important;
    }
</style>
<div class="about-annuity investment-annuity">
    <div class="p-main-text-box">
        <div class="p-main-text-main-heading more-info">More Information about Thrift Savings Plan Rollovers</div>
    </div>
    <div class="p-main-text-box">
        <div class="left-div">
            <img height="75px" width="75px" alt="certified"
                 src="<?php echo $global['home_link']; ?>images/CoinTree1.jpg">
        </div>
        <div class="right-div">
            <div class="p-main-text-heading">What are your TSP Rollover Options?</div>
            <div class="p-main-text-decription">
                Rolling over your TSP is similar to rolling over a 401(k). While you have many options, you need to
                factor in a variety of variables that are specific to your financial needs & situation. Ask your
                financial professional about tax or withdrawal implications, hidden fees, actual rates of returns, etc.
                Discuss your retirement goals, such as not outliving your savings, guaranteed monthly income or
                eliminating market risk. Doing your homework and staying informed will
                allow you to make the best decisions for your retirement nest egg.
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="p-main-text-box">
        <div class="left-div">
            <img height="75px" width="75px" alt="certified"
                 src="<?php echo $global['home_link']; ?>images/NestEgg-dollars.jpg">
        </div>
        <div class="right-div">
            <div class="p-main-text-heading">Can I rollover my TSP into an Annuity?</div>
            <div class="p-main-text-decription">
                The short answer is yes. TSPs are qualified retirement plans so there are transfer rules that you must
                adhere to, but annuities are common destinations for TSP funds given they offer tax deferred growth,
                protection against market risk and can guarantee monthly income at the time of retirement. They can be
                complex, however being properly informed can allow you to secure your financial future.
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="p-main-text-box">
        <div class="left-div">
            <img height="75px" width="75px" alt="certified"
                 src="<?php echo $global['home_link']; ?>images/About-Us green.jpg">
        </div>
        <div class="right-div">
            <div class="p-main-text-heading">Who is Annuities.net?</div>
            <div class="p-main-text-decription">
                For years, Annuities.net has provided objective, unbiased annuity information to consumers interested in
                making the right choices with their retirement savings. We do NOT sell annuities or any other financial
                products or services, and we are NOT affiliated with any other company. Our job is to answer questions
                on as wide a range of annuity topics as possible, and provide free annuity quotes to consumers who feel
                an annuity might be the right fit for them.
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="p-main-text-box">
        <div class="left-div">
            <img height="75px" width="75px" alt="certified"
                 src="<?php echo $global['home_link']; ?>images/blocks1-2-3.jpg">
        </div>
        <div class="right-div">
            <div class="p-main-text-heading">What are your Next Steps?</div>
            <div class="p-main-text-decription">
                The first thing is to understand your TSP rollover options with our TSP Rollover Guide, and then get TSP
                / Annuity Rates to see what returns you may be able to receive. Fill out the form above to get started.
                The service is free and you'll be on your way to seeing what retirement options are best for you.
            </div>
        </div>
    </div>
    <div class="clr"></div>
</div>
<?php require_once "common_popup.php"; ?>
</div>
</div>
<?php renderLPScripts($scriptsData, $htmlTagName = 'body_tag'); ?>
<style type="text/css">body {
        background: #fff !important;
    }

    .p-wrapper {
        background: #fff !important;
    }
</style>
</body>
</html>
<script>
    function pop_ups(id,is_form_privacy) {
        is_form_privacy = is_form_privacy || false;
        if(id == 'leads_from'){
            ga('send', 'event', 'Landing Page', 'Click', 'About us');
        }else if (id =='leads_from3'){
            if(is_form_privacy){
                ga('send', 'event', 'Landing Page', 'Click', 'Form Privacy');
            }else {
                ga('send', 'event', 'Landing Page', 'Click', 'Privacy Policy');
            }
        }else if (id == 'leads_from2'){
            ga('send', 'event', 'Landing Page', 'Click', 'Terms of Use');
        }
        
        $.facebox($('#' + id).html());
    }
    setScreenResolution();
</script>