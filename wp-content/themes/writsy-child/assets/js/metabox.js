(function () {
    'use strict';

    var wm = {};

    wm.postFormat = function () {
        var o = {
            el: document.querySelectorAll('input[name="post_format"]')
        };

        o.onChange = function () {
            o.show(this);
        };

        o.show = function (el) {
            var panel = document.getElementById('format_' + el.value);

            o.hideAll();

            if (panel) {
                panel.style.display = 'block';
            }
        };

        o.hideAll = function () {
            var i;

            for (i = this.el.length - 1; i >= 0; i--) {
                var _this = this.el[i],
                    panel = document.getElementById('format_' + _this.value);

                if (panel) {
                    panel.style.display = 'none';
                }
            }
        };

        o.init = function () {
            var i;

            this.hideAll();

            for (i = this.el.length - 1; i >= 0; i--) {
                var _this = this.el[i];

                if (_this.checked) {
                    o.show(_this);
                }

                if (_this.addEventListener) {
                    _this.addEventListener('click', this.onChange);
                } else if (_this.attachEvent) {
                    _this.attachEvent('onclick', this.onChange);
                }
            }
        };

        return o.init();
    };

    wm.init = function () {
        this.postFormat();
    };

    return wm.init();

}());