!function (e) {
    function o(o) {
        if (e.facebox.settings.inited)return !0;
        e.facebox.settings.inited = !0, e(document).trigger("init.facebox"), c();
        var a = e.facebox.settings.imageTypes.join("|");
        e.facebox.settings.imageTypesRegexp = new RegExp(".(" + a + ")$", "i"), o && e.extend(e.facebox.settings, o), e("body").append(e.facebox.settings.faceboxHtml);
        var n = [new Image, new Image];
        n[0].src = e.facebox.settings.closeImage, n[1].src = e.facebox.settings.loadingImage, e("#facebox").find(".b:first, .bl").each(function () {
            n.push(new Image), n.slice(-1).src = e(this).css("background-image").replace(/url\((.+)\)/, "$1")
        }), e("#facebox .close").click(e.facebox.close), e("#facebox .close_image").attr("src", e.facebox.settings.closeImage)
    }

    function a() {
        var e, o;
        return self.pageYOffset ? (o = self.pageYOffset, e = self.pageXOffset) : document.documentElement && document.documentElement.scrollTop ? (o = document.documentElement.scrollTop, e = document.documentElement.scrollLeft) : document.body && (o = document.body.scrollTop, e = document.body.scrollLeft), new Array(e, o)
    }

    function n() {
        var e;
        return self.innerHeight ? e = self.innerHeight : document.documentElement && document.documentElement.clientHeight ? e = document.documentElement.clientHeight : document.body && (e = document.body.clientHeight), e
    }

    function c() {
        var o = e.facebox.settings;
        o.loadingImage = o.loading_image || o.loadingImage, o.closeImage = o.close_image || o.closeImage, o.imageTypes = o.image_types || o.imageTypes, o.faceboxHtml = o.facebox_html || o.faceboxHtml
    }

    function t(o, a) {
        if (o.match(/#/)) {
            var n = window.location.href.split("#")[0], c = o.replace(n, "");
            if ("#" == c)return;
            e.facebox.reveal(e(c).html(), a)
        } else o.match(e.facebox.settings.imageTypesRegexp) ? i(o, a) : s(o, a)
    }

    function i(o, a) {
        var n = new Image;
        n.onload = function () {
            e.facebox.reveal('<div class="image"><img src="' + n.src + '" /></div>', a)
        }, n.src = o
    }

    function s(o, a) {
        var n = "&";
        -1 === o.indexOf("?", 0) && (n = "?"), e.getJSON(o + n + "tagmode=any&format=json&jsoncallback=?", function (o) {
            e.facebox.reveal(o.html, a)
        })
    }

    function f() {
        return 0 == e.facebox.settings.overlay || null === e.facebox.settings.opacity
    }

    function l() {
        return f() ? void 0 : (0 == e("#facebox_overlay").length && e("body").append('<div id="facebox_overlay" class="facebox_hide"></div>'), e("#facebox_overlay").hide().addClass("facebox_overlayBG").css("opacity", e.facebox.settings.opacity).fadeIn(200), !1)
    }

    function d() {
        return f() ? void 0 : (e("#facebox_overlay").fadeOut(200, function () {
            e("#facebox_overlay").removeClass("facebox_overlayBG"), e("#facebox_overlay").addClass("facebox_hide"), e("#facebox_overlay").remove()
        }), !1)
    }

    e.facebox = function (o, a) {
        e.facebox.loading(), o.ajax ? s(o.ajax, a) : o.image ? i(o.image, a) : o.div ? t(o.div, a) : e.isFunction(o) ? o.call(e) : e.facebox.reveal(o, a)
    }, e.extend(e.facebox, {
        settings: {
            opacity: .2,
            overlay: !0,
            loadingImage: baseURL + "ThankYouPages/images/facebox/loading.gif",
            closeImage: baseURL + "ThankYouPages/images/facebox/closelabel.png",
            imageTypes: ["png", "jpg", "jpeg", "gif"],
            faceboxHtml: '\n    <div id="facebox" style="display:none;"> \n      <div class="popup"> \n        <div class="content"> \n        </div> \n        <a href="#" class="close"><img src="images/facebox/closelabel.png" title="close" class="close_image" /></a> \n      </div> \n    </div>'
        }, loading: function () {
            return o(), 1 == e("#facebox .loading").length ? !0 : (l(), e("#facebox .content").empty(), e("#facebox .body").children().hide().end().append('<div class="loading"><img src="' + e.facebox.settings.loadingImage + '"/></div>'), e("#facebox").css({
                top: a()[1] + n() / 10,
                left: e(window).width() / 2 - 205
            }).show(), e(document).bind("keydown.facebox", function (o) {
                return 27 == o.keyCode && e.facebox.close(), !0
            }), void e(document).trigger("loading.facebox"))
        }, reveal: function (o, a) {
            e(document).trigger("beforeReveal.facebox"), a && e("#facebox .content").addClass(a), e("#facebox .content").append(o), e("#facebox .loading").remove(), e("#facebox .body").children().fadeIn("normal"), e("#facebox").css("left", e(window).width() / 2 - e("#facebox .popup").width() / 2), e(document).trigger("reveal.facebox").trigger("afterReveal.facebox")
        }, close: function () {
            return e(document).trigger("close.facebox"), !1
        }
    }), e.fn.facebox = function (a) {
        function n() {
            e.facebox.loading(!0);
            var o = this.rel.match(/facebox\[?\.(\w+)\]?/);
            return o && (o = o[1]), t(this.href, o), !1
        }

        if (0 != e(this).length)return o(a), this.bind("click.facebox", n)
    }, e(document).bind("close.facebox", function () {
        e(document).unbind("keydown.facebox"), e("#facebox").fadeOut(function () {
            e("#facebox .content").removeClass().addClass("content"), e("#facebox .loading").remove(), e(document).trigger("afterClose.facebox")
        }), d()
    })
}(jQuery);