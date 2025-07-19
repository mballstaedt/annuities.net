<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $lpMetaTags; ?>
    <title><?php echo $lpBrowserTitle; ?></title>
    <link type="text/css" href="./css/cds-style.css" rel="stylesheet">
    <link href='://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="./js/custom_js.js"></script>
    <script type="text/javascript" src="./js/jquery.maskedinput-1.3.min.js"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $("#best_number").mask("(999) 999-9999");
        });
    </script>
</head>

<body>
<?php
## ticket #642 once we go live we will remove this replace function and change in database
$lpBodyContent = str_replace('../images','./images',$lpBodyContent);
echo $lpBodyContent; ?>
</body>
</html>