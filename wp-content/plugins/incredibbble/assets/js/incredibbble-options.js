/*global _, document, jQuery, window*/
(function (window, $, inc) {
    'use strict';

    var o = {};

    o.nav = function () {
        var x = {
            el: document.querySelectorAll('.incredibbble-options-nav a')
        };

        x.onClick = function (e) {
            var li = this.parentNode,
                pn = this.getAttribute('href').replace('#', '');

            if (inc.hasClass(li, 'active')) {
                return;
            }

            x.clearActive();

            inc.addClass(li, 'active');

            inc.removeClass(document.getElementById(pn), 'hidden');

            var yay = document.getElementById(pn).querySelectorAll('.incredibbble-panel-tabs a')[0];

            yay.click();

            inc.storage.set('active_panel', pn);

            e.preventDefault();
        };

        x.clearActive = function () {
            _.each(document.querySelectorAll('.incredibbble-panel'), function (el) {
                inc.addClass(el, 'hidden');
            });

            _.each(this.el, function (el) {
                inc.removeClass(el.parentNode, 'active');
            });
        };

        x.init = function () {
            var active = document.querySelector('a[href="#' + inc.storage.get('active_panel') + '"]') || this.el[0];

            _.each(document.querySelectorAll('.incredibbble-panel'), function (el) {
                inc.addClass(el, 'hidden');
            });

            _.each(this.el, function (el) {
                if (window.addEventListener) {
                    el.addEventListener('click', x.onClick);
                } else if (window.attachEvent) {
                    el.attachEvent('onclick', x.onClick);
                }
            });

            active.click();
        };

        return x.init();
    };

    o.tab = function () {
        var x = {
            el: document.querySelectorAll('.incredibbble-panel-tabs a')
        };

        x.onClick = function (e) {
            var li = this.parentNode,
                sc = this.getAttribute('href').replace('#', '');

            if (inc.hasClass(li, 'active')) {
                return;
            }

            x.clearActive();

            inc.addClass(li, 'active');

            inc.removeClass(document.getElementById(sc), 'hidden');

            e.preventDefault();
        };

        x.clearActive = function () {
            _.each(document.querySelectorAll('.incredibbble-section'), function (el) {
                inc.addClass(el, 'hidden');
            });

            _.each(this.el, function (el) {
                inc.removeClass(el.parentNode, 'active');
            });
        };

        x.init = function () {
            _.each(document.querySelectorAll('.incredibbble-section'), function (el) {
                inc.addClass(el, 'hidden');
            });

            _.each(this.el, function (el) {
                if (window.addEventListener) {
                    el.addEventListener('click', x.onClick);
                } else if (window.attachEvent) {
                    el.attachEvent('onclick', x.onClick);
                }
            });
        };

        return x.init();
    };

    o.init = function () {
        this.tab();
        this.nav();

        $(function () {
            inc.colorPicker();
            inc.media('.incredibbble-control-video', 'video');
            inc.media('.incredibbble-control-audio', 'audio');
            inc.media('.incredibbble-control-image', 'image');
        });
    };

    inc.options = o;

    return o.init();

}(window, jQuery, window.incredibbble));