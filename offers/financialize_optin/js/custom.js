jQuery(function () {
    jQuery.ajax({
        type: "POST",
        url: optinAjaxURL,
        data: {"action": "optin_api_call","optin_id" : optinId},
        dataType: "json",
        success: function (t) {
            "success" == t.status ? (jQuery("body").append('<div id="optin_container"></div>'), jQuery("#optin_container").html(t.html)) : jQuery("#optin_container").html(t.message)
        },
        complete: function (t) {
        }
    })
});