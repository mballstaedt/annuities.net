
$(document).ready(function () {

    !function () {
        var i = "analytics", analytics = window[i] = window[i] || []; if (!analytics.initialize) if (analytics.invoked) window.console && console.error && console.error("Segment snippet included twice."); else {
            analytics.invoked = !0; analytics.methods = ["trackSubmit", "trackClick", "trackLink", "trackForm", "pageview", "identify", "reset", "group", "track", "ready", "alias", "debug", "page", "screen", "once", "off", "on", "addSourceMiddleware", "addIntegrationMiddleware", "setAnonymousId", "addDestinationMiddleware", "register"]; analytics.factory = function (e) { return function () { if (window[i].initialized) return window[i][e].apply(window[i], arguments); var n = Array.prototype.slice.call(arguments); if (["track", "screen", "alias", "group", "page", "identify"].indexOf(e) > -1) { var c = document.querySelector(`link[rel="canonical"]`); n.push({ __t: "bpc", c: c && c.getAttribute("href") || void 0, p: location.pathname, u: location.href, s: location.search, t: document.title, r: document.referrer }) } n.unshift(e); analytics.push(n); return analytics } }; for (var n = 0; n < analytics.methods.length; n++) { var key = analytics.methods[n]; analytics[key] = analytics.factory(key) } analytics.load = function (key, n) { var t = document.createElement("script"); t.type = "text/javascript"; t.async = !0; t.setAttribute("data-global-segment-analytics-key", i); t.src = "https://cdn.segment.com/analytics.js/v1/" + key + "/analytics.min.js"; var r = document.getElementsByTagName("script")[0]; r.parentNode.insertBefore(t, r); analytics._loadOptions = n }; analytics._writeKey = "nFTd5KY8XhCRdfAWEFGNU5Lj8aDxLqwJ";; analytics.SNIPPET_VERSION = "5.2.0";
            analytics.load("nFTd5KY8XhCRdfAWEFGNU5Lj8aDxLqwJ");
            analytics.page(window.location.href);
        }
    }();

    let emailTracked = false;
    let phoneTracked = false;
    let formTracked = false;

    function observeValueChange(selector, callback) {
        const target = document.querySelector(selector);
        if (!target) return;

        const observer = new MutationObserver(() => {
            callback($(target).val());
        });

        observer.observe(target, {
            attributes: true,
            attributeFilter: ["value"]
        });
    }

    // Watch email_verified field
    observeValueChange("#email_verified", function (newVal) {
        if (newVal === "1" && !emailTracked) {
            emailTracked = true;
            const data = segmentData();
            segmentIdentify(data.email, data);
            segmentTrack("Email Verified", data);
        }
    });

    // Watch phone_verified field
    observeValueChange("#phone_verified", function (newVal) {
        if (newVal === "1" && !phoneTracked) {
            phoneTracked = true;
            segmentTrack("Phone Verified", segmentData());
        }
    });

    // Track form submission
    $("#form_id1").on("submit", function () {
        if (!formTracked) {
            formTracked = true;
            segmentTrack("Lead Form Submitted", segmentData());
        }
    });



    function segmentTrack(event, data = {}) {
        analytics.track(event, data);
    }

    function segmentData(data = {}) {
        var data = {};
        $(`input[type="text"], input[type="email"], input[type="hidden"], input[type="number"]`).each(function () {
            var name = $(this).attr("name");
            var value = $(this).val();
            if (name) {
                data[name] = value;
            }
        });
        return { ...data, ...data };
    }

    function segmentIdentify(email, data = {}) {
        analytics.identify(email, data);
    }
});

