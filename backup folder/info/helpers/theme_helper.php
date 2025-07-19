<?php
function base_url($extra_url = '')
{
    global $global;
    return $global['home_link'] . $extra_url;
}

function api_url($extra_url = '')
{
    global $global;
    return $global['api_url'] . $extra_url;
}

function invalid_form_url($extra_url = '')
{
    global $global;
    return $global['confirm_number_post_url'] . $extra_url;
}

function ajax_url($extra_url = '')
{
    global $global;
    return $global['ajax_url'] . $extra_url;
}

function include_common_css()
{
    $type = 'text/css';
    $rel = 'stylesheet';
    $css = '<link rel="' . $rel . '" type="' . $type . '" href="css/style.css" />';
    echo $css;
}

function include_css($href)
{
    $type = 'text/css';
    $rel = 'stylesheet';
    $css = '<link rel="' . $rel . '" type="' . $type . '" href="' . $href . '" />';
    echo $css;
}


function include_fonts()
{
    $type = 'text/css';
    $rel = 'stylesheet';
    $fonts = "<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='$rel' type='$type'>";
    echo $fonts;
}

function include_common_js()
{
    $js = '<script>';
    $js .= 'var baseURL = "' . base_url() . '";';
    $js .= 'var apiURL = "' . api_url() . '";';
    $js .= 'var invFormURL = "' . invalid_form_url() . '";';
    $js .= 'var ajaxURL = "' . ajax_url() . '";';
    $js .= '</script>';
    echo $js;
}

function include_js($js_name)
{
    $js = '<script src="' . $js_name . '"></script>';
    echo $js;
}

/*
* For JS Alert messages a placeholder
*/
function alert_placeholder($flag = false, $id = 'alert_placeholder')
{
    if ($flag)
        return '<div id="' . $id . '"></div>';
    else
        echo '<div id="' . $id . '"></div>';
}

function loadingProgressBarScript()
{
    $script = '<script>$(function(){loadingProgressBar("pb1",0,1);$("#phone_day").mask("(999) 999-9999");console.log(43243243242343)});</script>';
    return $script;
}

?>