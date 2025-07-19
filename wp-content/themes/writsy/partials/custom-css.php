<?php 
/**
 * The template part for displaying custom css.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');

$background_color = new Mexitek\PHPColors\Color(writsy_get_option('background_color', '#ffffff'));
$text_color = new Mexitek\PHPColors\Color(writsy_get_option('text_color', '#212121'));
$accent_color = new Mexitek\PHPColors\Color(writsy_get_option('accent_color', '#edc9a3'));
$footer_background_color = new Mexitek\PHPColors\Color(writsy_get_option('footer_background_color', '#ffffff'));
$footer_text_color = new Mexitek\PHPColors\Color(writsy_get_option('footer_text_color', '#212121'));
$header_background_color = new Mexitek\PHPColors\Color(writsy_get_option('header_background_color', '#ffffff'));
$header_text_color = new Mexitek\PHPColors\Color(writsy_get_option('header_text_color', '#212121'));
$font_primary = writsy_font_data(writsy_get_option('font_primary', 'crimsontext'));
$font_secondary = writsy_font_data(writsy_get_option('font_secondary', 'dosis'));
?>
<?php if($background_color && ($background_color->getHex() !== 'ffffff')) : ?>
body {
    background-color: #<?php echo $background_color->getHex(); ?>;
}
<?php endif; ?>
<?php if($text_color && ($text_color->getHex() !== '212121')) : ?>
body,
.button-secondary,
.tagcloud a,
.instagram-gallery .instagram-follow-button {
    color: #<?php echo $text_color->getHex(); ?>;
}

.button:active,
.button:hover,
.button:focus,
.tagcloud a:active,
.tagcloud a:hover,
.tagcloud a:focus,
.slick-dots:not(.slick-pagination) > li.slick-active > * {
    background-color: #<?php echo $text_color->getHex(); ?>;
}

.button:active,
.button:hover,
.button:focus,
.tagcloud a:active,
.tagcloud a:hover,
.tagcloud a:focus,
.slick-pagination > li > *,
.featured-fullwidth .featured-slider-nav .featured-slider-nav-item.slick-current {
    border-color: #<?php echo $text_color->getHex(); ?>;
}
<?php endif; ?>
<?php if($accent_color && ($accent_color->getHex() !== 'edc9a3')) : ?>
a,
.button:hover,
.button:active,
.button:focus,
.tagcloud a:active,
.tagcloud a:hover,
.tagcloud a:focus,
.share-blog a:hover,
.share-blog a:focus,
.site-navigation .nav > li.active > a,
.site-navigation .nav > li.current-menu-item > a,
.site-navigation .nav > li.current-menu-ancestor > a,
.site-navigation .nav > li:hover > a,
.site-navigation .sub-menu > li.active > a,
.site-navigation .sub-menu > li.current-menu-item > a,
.site-navigation .sub-menu > li.current-menu-ancestor > a,
.site-navigation .sub-menu > li:hover > a,
.site-navigation .children > li.active > a,
.site-navigation .children > li.current-menu-item > a,
.site-navigation .children > li.current-menu-ancestor > a,
.site-navigation .children > li:hover > a,
.pagination .nav-links a:hover,
.pagination .nav-links a:focus,
.post-navigation .nav-links a:hover,
.post-navigation .nav-links a:focus,
.comment-navigation .nav-links a:hover,
.comment-navigation .nav-links a:focus,
.entry-link blockquote cite em,
.entry-title a:hover,
.entry-title a:focus,
.entry-meta a:hover,
.entry-meta a:focus,
.entry-more-link a:hover,
.entry-more-link a:focus,
.entry-footer a:hover,
.entry-footer a:focus,
.page .entry.type-page .entry-title,
.featured-fullwidth .featured-slider-nav .featured-slider-nav-item .featured-slider-nav-item-category,
.widget ul:not([class]) li a:hover, .widget ul:not([class]) li a:focus,
.widget ol:not([class]) li a:hover, .widget ol:not([class]) li a:focus,
.posts-list .posts-list-item-title a:hover,
.posts-list .posts-list-item-title a:focus,
.comments-area .comment-list > .comment .comment-meta .comment-author .fn a:hover,
.comments-area .comment-list > .comment .comment-meta .comment-author .fn a:focus,
.comments-area .comment-list > .pingback .comment-meta .comment-author .fn a:hover,
.comments-area .comment-list > .pingback .comment-meta .comment-author .fn a:focus,
.comments-area .comment-list > .comment .comment-meta .comment-metadata a:hover,
.comments-area .comment-list > .comment .comment-meta .comment-metadata a:focus,
.comments-area .comment-list > .pingback .comment-meta .comment-metadata a:hover,
.comments-area .comment-list > .pingback .comment-meta .comment-metadata a:focus,
.author-info .author-title a:hover,
.author-info .author-title a:focus,
.author-info .author-links li a:hover,
.author-info .author-links li a:focus {
    color: #<?php echo $accent_color->getHex(); ?>;
}

a:hover,
a:focus {
    color: #<?php echo $accent_color->darken(); ?>;
}

mark,
.button-primary,
.slick-pagination > li.slick-active > *,
.site-title a span:before,
.site-title a span:after,
.sidenav .nav .sub-menu > li > a:hover,
.sidenav .nav .sub-menu > li > a:focus,
.sidenav .nav .children > li > a:hover,
.sidenav .nav .children > li > a:focus,
.entry-header .entry-meta > [class^="entry-"] + [class^="entry-"]:before,
.featured-fullwidth .featured-slider-nav .featured-slider-nav-item:before,
.widget-title span:before, .striketrough-heading span:before {
    background-color: #<?php echo $accent_color->getHex(); ?>;
}

::selection {
    background-color: #<?php echo $accent_color->getHex(); ?>;
}

::-moz-selection {
    background-color: #<?php echo $accent_color->getHex(); ?>;
}

blockquote,
.button-primary,
.slick-pagination > li.slick-active > * {
    border-color: #<?php echo $accent_color->getHex(); ?>;
}
<?php endif; ?>
<?php if($header_background_color && ($header_background_color->getHex() !== 'ffffff')) : ?>
.site-header {
    background-color: #<?php echo $header_background_color->getHex(); ?>;
}
<?php endif; ?>
<?php if($header_text_color && ($header_text_color->getHex() !== '212121')) : ?>
.site-header {
    color: #<?php echo $header_text_color->getHex(); ?>;
}
<?php endif; ?>
<?php if($footer_background_color && ($footer_background_color->getHex() !== 'ffffff')) : ?>
.site-footer {
    background-color: #<?php echo $footer_background_color->getHex(); ?>;
}
<?php endif; ?>
<?php if($footer_text_color && ($footer_text_color->getHex() !== '212121')) : ?>
.site-footer {
    color: #<?php echo $footer_text_color->getHex(); ?>;
}
<?php endif; ?>
<?php if($font_primary && ($font_primary['family'] !== 'Crimson Text')) : ?>
body,
.text-primary,
.audio-player .mejs-container.mejs-audio .mejs-controls .mejs-time * {
    font-family: <?php echo '"' . $font_primary['family'] . '", ' . $font_primary['category']; ?>;
}
<?php endif; ?>
<?php if($font_secondary && ($font_secondary['family'] !== 'Dosis')) : ?>
h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6,
blockquote cite strong,
.button,
.text-secondary,
.slick-pagination > li > *,
.slick-arrow,
.site-navigation .nav > li > a,
.site-navigation .nav > li > span,
.sidenav .nav > li > a,
.pagination,
.post-navigation,
.comment-navigation,
.entry-more-link,
.comments-area .comment-list > .comment .comment-meta .comment-author .fn {
    font-family: <?php echo '"' . $font_secondary['family'] . '", ' . $font_secondary['category']; ?>;
}
<?php endif; ?>