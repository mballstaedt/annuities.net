<script type="text/javascript">
    window.onload = function () {
//        window.setTimeout(document.calculating_form.submit(), 2000);
        window.setTimeout(function() { document.calculating_form.submit(); }, 2000);
    };
</script>
<?php
require_once'header.php';
?>
<div class="banner-portion">
    <div class="upper-colum step5">
	<!--
        <div class="upper-heading2">Is an ANNUITY right for you?</div>
        <div class="upper-slogan2">With returns up to 7%, you need to find out now! Get a Free Annuity Quote &
            Report.
        </div>-->
		  <div class="upper-heading"><img src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/red-h.png"/></div>
            <div class="upper-slogan"><img src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/red-sub.png"/></div>
    </div>
    <div class="loader">
        <div class="loader-img"><img
                src="<?php echo $global['home_link'] ?>LandingPages/wizard/redRightAnnuity/images/loading.gif" alt="loader"/><br/>Calculating...
        </div>
        <div></div>
    </div>
</div>
<form action="" name="calculating_form" method="post" id="calculating_form">
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
    ## Common Tracking Parameters ##
    include_once($global['rootPath'] . 'LandingPages/tracking_params/tracking_params.php');
    ?>
</form>
<br>
<?php
//require_once $global['rootPath'].'LandingPages/footer.php';
?>
