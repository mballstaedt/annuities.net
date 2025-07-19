/*global _, document, jQuery, window*/
(function (window, $, inc) {
    'use strict';

    inc.metabox = {
        element: '.incredibbble-panel',
        tabs: '.incredibbble-panel-tabs',
        sections: '.incredibbble-section',

        init: function () {
            var self = this;

            $(self.tabs).find('a').on('click', function (event) {
                event.preventDefault();
                self.clickTab(this);
            });

            $(self.tabs).find('a').first().trigger('click');

            $(function () {
                inc.colorPicker();
                inc.media('.incredibbble-control-video', 'video');
                inc.media('.incredibbble-control-audio', 'audio');
                inc.media('.incredibbble-control-image', 'image');
            });
        },

        clickTab: function (link) {
            if ($(link).closest('li').hasClass('active')) {
                return;
            }

            var self = this,
                panel = $(link).closest(self.element),
                section = $(link).attr('href');

            $(self.sections, panel).addClass('hidden');

            $(self.tabs).children().removeClass('active');

            $(section).removeClass('hidden');

            $(link).closest('li').addClass('active');
        }
    };

    inc.metabox.init();

}(window, jQuery, window.incredibbble));