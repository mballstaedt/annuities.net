(function ($) {
    'use strict';
    
    var api = wp.customize;

    api('blogname', function(value) {
        value.bind(function(to) {
            $('.site-title span').html(to);
        });
    });

    api('incredibbble_writsy[custom_tagline]', function(value) {
        value.bind(function(to) {
            $('.site-description').html(to);
        });
    });

    api('incredibbble_writsy[footer_text]', function(value) {
        value.bind(function(to) {
            $('.site-info p span').html(to);
        });
    });

    api('incredibbble_writsy[footer_text]', function(value) {
        value.bind(function(to) {
            $('.site-info p span').html(to);
        });
    });
}(jQuery));