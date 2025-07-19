/*global _, document, jQuery, window*/
(function (window, $) {
    'use strict';

    var o = {};

    o.params = window.incredibbble_params || {};

    o.hasClass = function (el, cl) {
        if (el.classList) {
            return el.classList.contains(cl);
        } else {
            var classes = el.className.split(' ');

            return classes.indexOf(cl);
        }
    };

    o.addClass = function (el, c) {
        if (el.classList) {
            el.classList.add(c);
        } else {
            var classes = el.className.split(' ');

            if (!el.hasClass(c)) {
                classes.push(c);
            }

            el.className = classes.join(' ');
        }
    };

    o.removeClass = function (el, c) {
        if (el.classList) {
            el.classList.remove(c);
        } else {
            var classes = el.className.split(' '),
                index = classes.indexOf(c);

            if (index > 0) {
                classes.splice(index, 1);
            }

            el.className = classes.join(' ');
        }
    };

    o.media = function (el, type) {
        $(el).each(function () {
            var _this = $(this),
                parent = _this.parent(),
                label = o.params.select_image;

            if (type === 'audio') {
                label = o.params.select_audio;
            }

            if (type === 'video') {
                label = o.params.select_video;
            }

            parent.on('click', '.button.select', function (e) {
                e.preventDefault();

                var frame = window.wp.media({
                    title: label,
                    library: {
                        type: type
                    }
                });

                frame.on('select', function () {
                    var selected = frame.state().get('selection').first().toJSON(),
                        thumbnail = selected.url;

                    if (selected.sizes.medium) {
                        thumbnail = selected.sizes.medium.url;
                    }

                    _this.val(selected.url);

                    if (type === 'image') {
                        parent.after('<div class="incredibbble-image-thumbnail"><a href="' + selected.url + '" target="_blank"><img src="' + thumbnail + '"></a></div>');
                    }

                    $(e.currentTarget).unbind('click').addClass('remove').removeClass('select').val(o.params.remove);
                });

                frame.open();
            });

            parent.on('click', '.button.remove', function (e) {
                e.preventDefault();

                _this.val('');

                if (type === 'image') {
                    parent.next('.incredibbble-image-thumbnail').slideUp('fast', function () {
                        parent.next('.incredibbble-image-thumbnail').remove();
                    });
                }

                $(e.currentTarget).unbind('click').addClass('select').removeClass('remove').val(label);
            });
        });
    };

    o.colorPicker = function () {
        if (typeof $.fn.wpColorPicker === 'function') {
            $('.incredibbble-control-color').wpColorPicker({
                change: function (e, ui) {
                    e.target.value = ui.color.toString();
                }
            });
        }
    };

    o.storage = {
        uid: window.userSettings.uid || 1,

        set: function (key, value) {
            if (this.isSupport()) {
                window.localStorage.setItem('incredibbble_' + key, value);
            }
        },

        get: function (key) {
            if (this.isSupport()) {
                return window.localStorage.getItem('incredibbble_' + key);
            }

            return false;
        },

        delete: function (key) {
            return window.localStorage.removeItem('incredibbble_' + key);
        },

        isSupport: function () {
            try {
                return window.hasOwnProperty('localStorage');
            } catch (ignore) {
                return false;
            }
        }
    };

    window.incredibbble = o;

}(window, jQuery));