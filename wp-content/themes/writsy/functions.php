<?php
/**
 * Writsy functions and definitions.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * Include TGM plugin activation.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/includes/class-tgm-plugin-activation.php';


/**
 * Include Incredibbble integration.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/includes/incredibbble.php';


/**
 * Include PHP colors.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/includes/color.php';


/**
 * Register reuired plugins.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_required_plugins')) {
    function writsy_required_plugins()
    {
        $config = array(
            'id' => 'writsy',
            'default_path' => '',
            'menu' => 'tgmpa-install-plugins',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => false,
            'message' => ''
        );

        $plugins = array(
            array(
                'name' => esc_html__('Incredibbble', 'writsy'),
                'slug' => 'incredibbble',
                'source' => get_template_directory() . '/plugins/incredibbble.zip',
                'version' => '1.0.0',
                'required' => true,
                'is_callable' => 'incredibbble'
            ),
            array(
                'name' => esc_html__('Post Views Counter', 'writsy'),
                'slug' => 'post-views-counter',
                'required' => true,
            ),
            array(
                'name' => esc_html__('MailChimp for WordPress', 'writsy'),
                'slug' => 'mailchimp-for-wp',
                'required' => false,
            ),
            array(
                'name' => esc_html__('Contact Form 7', 'writsy'),
                'slug' => 'contact-form-7',
                'required' => false,
            ),
        );

        tgmpa($plugins, $config);
    }

    add_action('tgmpa_register', 'writsy_required_plugins');
}


/**
 * Load theme translations.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_load_textdomain')) {
    function writsy_load_textdomain()
    {
        load_theme_textdomain('writsy', get_template_directory() . '/languages');
    }

    add_action('after_setup_theme', 'writsy_load_textdomain');
}


/**
 * Adds RSS feed links for posts and comments.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_enable_automatic_feed_links')) {
    function writsy_enable_automatic_feed_links()
    {
        add_theme_support('automatic-feed-links');
    }

    add_action('after_setup_theme', 'writsy_enable_automatic_feed_links');
}


/**
 * Let WordPress manage the document title.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_enable_automatic_title_tag')) {
    function writsy_enable_automatic_title_tag()
    {
        add_theme_support('title-tag');
    }

    add_action('after_setup_theme', 'writsy_enable_automatic_title_tag');
}


/**
 * Switch default core markup to HTML5.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_enable_html5')) {
    function writsy_enable_html5()
    {
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }

    add_action('after_setup_theme', 'writsy_enable_html5');
}


/**
 * Enable post formats support.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_enable_post_formats')) {
    function writsy_enable_post_formats()
    {
        add_theme_support('post-formats', array(
            'video',
            'quote',
            'link',
            'gallery',
            'audio'
        ));
    }

    add_action('after_setup_theme', 'writsy_enable_post_formats');
}


/**
 * Enable post thumbnail.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_enable_post_thumbnail')) {
    function writsy_enable_post_thumbnail()
    {
        add_theme_support('post-thumbnails');

        // make sure the large image size set to 1200 or up.
        if (absint(get_option('large_size_w')) < 1200) {
            update_option('large_size_w', 1200);
            update_option('large_size_h', 1200);
        }

        // set default thumbnail size.
        set_post_thumbnail_size(800, 450, true);
    }

    add_action('after_setup_theme', 'writsy_enable_post_thumbnail');
}


/**
 * Add image sizes
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_add_image_sizes')) {
    function writsy_add_image_sizes()
    {
        add_image_size('writsy-frame', 800, 533, true);
        add_image_size('writsy-frame-2x', 1600, 1066, true);
        add_image_size('writsy-monitor', 800, 450, true);
        add_image_size('writsy-monitor-2x', 1600, 900, true);
        add_image_size('writsy-square', 800, 800, true);
        add_image_size('writsy-square-2x', 1600, 1600, true);
    }

    add_action('after_setup_theme', 'writsy_add_image_sizes');
}


/**
 * Register menu locations.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_register_menu_locations')) {
    function writsy_register_menu_locations()
    {
        $locations = array(
            'main' => esc_html__('Main Menu', 'writsy'),
        );

        register_nav_menus($locations);
    }

    add_action('after_setup_theme', 'writsy_register_menu_locations');
}


/**
 * Add editor style.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_add_editor_style')) {
    function writsy_add_editor_style()
    {
        $stylesheets = array(
            'assets/css/editor-style.css',
            writsy_google_fonts_urls(array('crimsontext', 'dosis'))
        );

        add_editor_style($stylesheets);
    }

    add_action('after_setup_theme', 'writsy_add_editor_style');
}


/**
 * Enable custom background.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_enable_custom_background')) {
    function writsy_enable_custom_background()
    {
        add_theme_support('custom-background', array(
            'default-color' => writsy_get_option('background_color', '#ffffff')
        ));
    }

    add_action('after_setup_theme', 'writsy_enable_custom_background');
}


/**
 * Enable custom header.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_enable_custom_header')) {
    function writsy_enable_custom_header()
    {
        add_theme_support('custom-header');
    }

    add_action('after_setup_theme', 'writsy_enable_custom_header');
}


/**
 * Set global content width.
 *
 * @since  1.0.0
 * @global integer $content_width
 * @return void
 */
if (!function_exists('writsy_content_width')) {
    function writsy_content_width()
    {
        $GLOBALS['content_width'] = apply_filters('writsy_content_width', 1200);
    }

    add_action('after_setup_theme', 'writsy_content_width', 0);
}


/**
 * Register widget area.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_register_widget_area')) {
    function writsy_register_widget_area()
    {
        register_sidebar(array(
            'id' => 'sidebar-1',
            'name' => esc_html__('Sidebar', 'writsy'),
            'description' => esc_html__('Add widgets here to appear in your sidebar.', 'writsy'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title h5"><span>',
            'after_title' => '</span></h2>',
        ));

        register_sidebar(array(
            'id' => 'sidebar-2',
            'name' => esc_html__('Bottom Left', 'writsy'),
            'description' => esc_html__('Appears at the bottom left of pages.', 'writsy'),
            'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title h5"><span>',
            'after_title' => '</span></h2>',
        ));

        register_sidebar(array(
            'id' => 'sidebar-3',
            'name' => esc_html__('Bottom Right', 'writsy'),
            'description' => esc_html__('Appears at the bottom right of pages.', 'writsy'),
            'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title h5"><span>',
            'after_title' => '</span></h2>',
        ));
    }

    add_action('widgets_init', 'writsy_register_widget_area');
}


/**
 * Load theme stylesheets.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_load_styles')) {
    function writsy_load_styles()
    {
        $fonts = array();

        if ($primary = writsy_get_option('font_primary', 'crimsontext')) {
            $fonts[] = $primary;
        }

        if ($secondary = writsy_get_option('font_secondary', 'dosis')) {
            $fonts[] = $secondary;
        }

        // register FontAwesome stylesheet.
        if (!wp_style_is('font-awesome', 'registered')) {
            wp_register_style(
                'font-awesome',
                get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.css',
                array(),
                '4.6.3'
            );
        }

        // Load theme stylesheet.
        wp_enqueue_style(
            'writsy',
            get_stylesheet_uri(),
            array('font-awesome'),
            wp_get_theme()->get('Version')
        );

        // Load google font stylesheets.
        wp_enqueue_style('writsy-google-fonts', writsy_google_fonts_urls($fonts));

        // add custom inline css.
        wp_add_inline_style('writsy', writsy_custom_style());
    }

    add_action('wp_enqueue_scripts', 'writsy_load_styles');
}


/**
 * Custom inline style.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_custom_style')) {
    function writsy_custom_style()
    {
        if (function_exists('incredibbble')) {
            $template = get_template_directory() . '/partials/custom-css.php';

            return incredibbble()->view($template);
        }
    }
}


/**
 * Load theme stylesheets.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_load_scripts')) {
    function writsy_load_scripts()
    {

        // register modernizr script.
        if (!wp_script_is('modernizr', 'registered')) {
            wp_register_script(
                'modernizr',
                get_template_directory_uri() . '/assets/js/modernizr.js',
                array(),
                '3.3.1',
                false
            );
        }

        // register lazysizes script.
        if (!wp_script_is('lazysizes', 'registered')) {
            wp_register_script(
                'lazysizes',
                get_template_directory_uri() . '/assets/vendor/lazysizes/lazysizes.min.js',
                array(),
                '2.0.2',
                true
            );
        }

        // register matchHeight script.
        if (!wp_script_is('match-height', 'registered')) {
            wp_register_script(
                'match-height',
                get_template_directory_uri() . '/assets/vendor/matchheight/jquery.matchHeight-min.js',
                array(),
                '0.7.0',
                true
            );
        }

        // register hammer script.
        if (!wp_script_is('hammer', 'registered')) {
            wp_register_script(
                'hammer',
                get_template_directory_uri() . '/assets/vendor/hammerjs/hammer.min.js',
                array(),
                '2.0.8',
                true
            );
        }

        // register slick carousel script.
        if (!wp_script_is('slick-carousel', 'registered')) {
            wp_register_script(
                'slick-carousel',
                get_template_directory_uri() . '/assets/vendor/slick-carousel/slick.min.js',
                array(),
                '1.6.0',
                true
            );
        }

        // register simplelightbox script.
        if (!wp_script_is('simplelightbox', 'registered')) {
            wp_register_script(
                'simplelightbox',
                get_template_directory_uri() . '/assets/vendor/simplelightbox/simple-lightbox.min.js',
                array(),
                '1.8.3',
                true
            );
        }

        // load theme scripts and its dependecies.
        wp_enqueue_script(
            'writsy',
            get_template_directory_uri() . '/assets/js/writsy.js',
            array(
                'jquery',
                'underscore',
                'modernizr',
                'lazysizes',
                'match-height',
                'hammer',
                'slick-carousel',
                'simplelightbox'
            ),
            wp_get_theme()->get('Version'),
            true
        );

        // JavaScript translation.
        wp_localize_script('writsy', 'writsy_params', array(
            'path' => get_template_directory_uri(),
            'next_post' => esc_html__('Next Post', 'writsy'),
            'prev_post' => esc_html__('Prev Post', 'writsy')
        ));

        // include comments script on single post
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'writsy_load_scripts');
}


/**
 * Costumizer register.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_customize_register')) {
    function writsy_customize_register($customizer)
    {
        $customizer->remove_section('title_tagline');
        $customizer->remove_section('colors');
        $customizer->remove_section('header_image');

        $customizer->get_setting('blogname')->transport = 'postMessage';
    }

    add_action('customize_register', 'writsy_customize_register', 11);
}


/**
 * Remove custom background and header submenus.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_adjust_admin_menu')) {
    function writsy_adjust_admin_menu()
    {
        global $submenu;

        unset($submenu['themes.php'][15]);
    }

    add_action('admin_menu', 'writsy_adjust_admin_menu', 999);
}


/**
 * Enqueue customizer preview script.
 *
 * @since  1.0.0
 * @return void
 */
if (!function_exists('writsy_customizer_script')) {
    function writsy_customizer_script()
    {
        wp_enqueue_script(
            'writsy-customizer',
            get_template_directory_uri() . '/assets/js/preview.js',
            array('customize-preview'),
            wp_get_theme()->get('Version'),
            true
        );
    }

    add_action('customize_preview_init', 'writsy_customizer_script');
}


/**
 * Adds custom classes to the array of body classes.
 *
 * @since  1.0.0
 * @param  array $classes
 * @return array
 */
if (!function_exists('writsy_body_classes')) {
    function writsy_body_classes($classes)
    {
        $featured_posts = writsy_get_featured_posts();

        if (is_home() && writsy_get_option('featured_posts_slider') && !empty($featured_posts)) {
            $classes[] = 'has-featured-area';
        }

        return $classes;
    }

    add_filter('body_class', 'writsy_body_classes');
}


/**
 * Adds custom classes to the array of post classes.
 *
 * @since  1.0.0
 * @param  array $classes
 * @return array
 */
if (!function_exists('writsy_post_classes')) {
    function writsy_post_classes($classes)
    {
        $classes[] = 'entry';

        if (is_single()) {
            $classes[] = 'single-entry';
        }

        $classes[] = 'clearfix';

        return $classes;
    }

    add_filter('post_class', 'writsy_post_classes');
}


/**
 * Makes all tags have the same font size.
 *
 * @since  1.0.0
 * @param  array $args
 * @return array
 */
if (!function_exists('writsy_tag_cloud_arg')) {
    function writsy_tag_cloud_arg($args)
    {
        $args['unit'] = 'em';
        $args['largest'] = 1;
        $args['smallest'] = 1;

        return $args;
    }

    add_filter('widget_tag_cloud_args', 'writsy_tag_cloud_arg');
}


/**
 * Moves comment field to bottom.
 *
 * @since  1.0.0
 * @param  array $fields
 * @return array
 */
if (!function_exists('writsy_move_comment_field')) {
    function writsy_move_comment_field($fields)
    {
        $comment = $fields['comment'];

        unset($fields['comment']);

        $fields['comment'] = $comment;

        return $fields;
    }

    add_filter('comment_form_fields', 'writsy_move_comment_field');
}


/**
 * Enables lazyload image attachments.
 *
 * @package Writsy
 * @since   1.0.0
 * @param   array $attr
 * @param   array $attachment
 * @param   array $size
 * @return  array
 */
if (!function_exists('writsy_lazyload_images')) {
    function writsy_lazyload_images($attr, $attachment, $size)
    {
        $class = isset($attr['class']) ? $attr['class'] . ' lazyload' : 'lazyload';
        $src = isset($attr['src']) ? $attr['src'] : '';
        $srcset = isset($attr['srcset']) ? $attr['srcset'] : '';
        $sizes = isset($attr['sizes']) ? $attr['sizes'] : '';

        $attr['class'] = $class;
        $attr['data-srcset'] = $srcset;
        $attr['data-src'] = $src;
        $attr['data-sizes'] = $sizes;
        $attr['data-sizes'] = 'auto';

        unset($attr['src'], $attr['srcset'], $attr['sizes']);

        return $attr;
    }

    if (!is_admin()) {
        add_filter('wp_get_attachment_image_attributes', 'writsy_lazyload_images', 10, 3);
    }
}


/**
 * Enables lazyload iframes.
 *
 * @package Writsy
 * @since   1.0.0
 * @param   string $data
 * @param   string $url
 * @param   array $args
 * @return  string
 */
if (!function_exists('writsy_lazyload_iframes')) {
    function writsy_lazyload_iframes($data, $url, $args)
    {
        if (strpos($data, 'iframe')) {
            $data = str_replace('src', 'class="lazyload" data-src', $data);
        }

        return $data;
    }

    if (!is_admin()) {
        add_filter('oembed_result', 'writsy_lazyload_iframes', 10, 3);
    }
}


/**
 * Enables lazyload avatars.
 *
 * @package Writsy
 * @since   1.0.0
 * @param   string $avatar
 * @return  string
 */
if (!function_exists('writsy_user_contact_info')) {
    function writsy_user_contact_info($contact)
    {
        foreach (writsy_social_brands() as $key => $brand) {
            $contact[$key] = $brand['name'];
        }

        return $contact;
    }

    add_filter('user_contactmethods', 'writsy_user_contact_info');
}


/**
 * Dynamic excerpt.
 *
 * @since  1.0.0
 * @uses   wp_trim_words()
 * @param  integer $words
 * @param  boolean $more
 * @return string
 */
if (!function_exists('writsy_excerpt')) {
    function writsy_excerpt($words = 20, $more = true)
    {
        global $post;
        $content = strip_shortcodes($post->post_content);
        $excerpt = wp_trim_words($content, str_replace('<!-more->', '', $words));

        if ($more) {
            $excerpt = rtrim($excerpt, '&hellip;');
            $excerpt .= writsy_more_link();
        }

        return $excerpt;
    }
}


/**
 * Post read more link.
 *
 * @since  1.0.0
 * @param  string $text
 * @param  boolean $hellip
 * @return string
 */
if (!function_exists('writsy_more_link')) {
    function writsy_more_link($text = null, $hellip = false)
    {
        if (!$text) {
            $text = sprintf(esc_html__('Continue reading %s', 'writsy'), '<i class="wi wi-arrow-right"></i>');
        }

        $link = sprintf('<span class="entry-more-link"><a href="%1$s">%2$s</a></span>',
            esc_url(get_permalink(get_the_ID())) . '#more-' . absint(get_the_ID()),
            $text
        );

        if ($hellip) {
            return '&hellip; ' . $link;
        }

        return $link;
    }
}


/**
 * Post content more link.
 *
 * @since  1.0.0
 * @param  string $link
 * @param  string $text
 * @return string
 */
if (!function_exists('writsy_content_more_link')) {
    function writsy_content_more_link($link, $text)
    {
        return writsy_more_link($text, true);
    }

    add_filter('the_content_more_link', 'writsy_content_more_link', 10, 2);
}


/**
 * Read more link for excerpt.
 *
 * @since  1.0.0
 * @return string
 */
if (!function_exists('writsy_excerpt_more_link')) {
    function writsy_excerpt_more_link()
    {
        return writsy_more_link();
    }

    if (!is_admin()) {
        add_filter('excerpt_more', 'writsy_excerpt_more_link');
    }
}


/**
 * Share link.
 *
 * @since  1.0.0
 * @return string
 */
if (!function_exists('writsy_share_links')) {
    function writsy_share_links($args = array())
    {
        ob_start();

        $args = wp_parse_args($args, array(
            'brands' => 'facebook, twitter, pinterest, google-plus, email',
            'url' => '',
            'text' => '',
            'icon' => true,
            'label' => true,
            'pattern' => '%s',
        ));

        $args['brands'] = explode(',', $args['brands']);
        $args['brands'] = array_map('trim', $args['brands']);

        $config = array(
            'facebook' => array(
                'name' => esc_html__('Facebook', 'writsy'),
                'icon' => '<i class="fa fa-facebook-official"></i>',
                'url' => 'https://www.facebook.com/sharer/sharer.php',
                'query' => array(
                    'u' => $args['url'],
                    't' => $args['text']
                )
            ),
            'twitter' => array(
                'name' => esc_html__('Twitter', 'writsy'),
                'icon' => '<i class="fa fa-twitter"></i>',
                'url' => 'https://twitter.com/intent/tweet',
                'query' => array(
                    'url' => $args['url'],
                    'text' => $args['text']
                )
            ),
            'pinterest' => array(
                'name' => esc_html__('Pinterest', 'writsy'),
                'icon' => '<i class="fa fa-pinterest"></i>',
                'url' => 'https://pinterest.com/pin/create/button/',
                'query' => array(
                    'url' => $args['url'],
                    'description' => $args['text']
                )
            ),
            'google-plus' => array(
                'name' => esc_html__('Google+', 'writsy'),
                'icon' => '<i class="fa fa-google-plus"></i>',
                'url' => 'https://plus.google.com/share',
                'query' => array(
                    'url' => $args['url']
                )
            ),
            'email' => array(
                'name' => esc_html__('Email', 'writsy'),
                'icon' => '<i class="fa fa-envelope-square"></i>',
                'url' => 'mailto:',
                'query' => array(
                    'subject' => $args['text'],
                    'body' => $args['url']
                )
            )
        );

        foreach ($args['brands'] as $key => $value) {
            if (!array_key_exists($value, $config)) {
                continue;
            }

            $brand = $config[$value];
            $query = array_filter($brand['query']);
            $query = http_build_query($query);

            if (!$query) {
                return;
            }

            if ($value == 'email') {
                $query = urldecode($query);
            }

            printf($args['pattern'] . "\n",
                sprintf('<a href="%1$s" target="_blank">%2$s%3$s</a>',
                    esc_url($brand['url'] . '?' . $query),
                    $args['icon'] ? wp_kses($brand['icon'], array('i' => array('class' => true))) : '',
                    $args['label'] ? '<span>' . esc_html($brand['name']) . '</span>' : ''
                )
            );
        }

        return ob_get_clean();
    }
}


/**
 * Adds custom menu items to the main menu.
 *
 * @since  1.0.0
 * @param  string $items
 * @param  object $args
 * @return string
 */
if (!function_exists('writsy_main_menu_items')) {
    function writsy_main_menu_items($items, $args)
    {
        if ($args->theme_location !== 'main' || $args->container_class !== 'container') {
            return $items;
        }

        $before = writsy_share_blog_menu_item();
        $after = writsy_search_menu_item();

        return $before . $items . $after;
    }

    add_filter('wp_nav_menu_items', 'writsy_main_menu_items', 10, 2);
}


/**
 * Fallback for main menu.
 *
 * @since  1.0.0
 * @return string
 */
if (!function_exists('writsy_main_menu_fallback')) {
    function writsy_main_menu_fallback()
    {
        $args = array(
            'menu_class' => 'container',
            'before' => '<ul class="nav">' . writsy_share_blog_menu_item(),
            'after' => writsy_search_menu_item() . '</ul>'
        );

        return wp_page_menu($args);
    }
}


/**
 * Modify default post protected password form.
 *
 * @since  1.0.0
 * @return string
 */
if (!function_exists('writsy_password_form')) {
    function writsy_password_form()
    {
        ob_start();

        global $post;

        $id = 'pwbox-' . (empty($post->ID) ? rand() : $post->ID);
        ?>
        <p><?php esc_html_e('To view this protected post, enter the password below:', 'writsy'); ?></p>

        <form action="<?php echo esc_url(site_url('wp-login.php?action=postpass', 'login_post')) ?>">
            <input type="password" id="<?php echo esc_attr($id); ?>" class="input" name="post_password"
                   placeholder="<?php echo esc_attr('Type password and enter &hellip;', 'writsy') ?>"></input>
        </form>
        <?php
        return ob_get_clean();
    }

    add_filter('the_password_form', 'writsy_password_form');
}


/**
 * Share blog menu item.
 *
 * @since  1.0.0
 * @return string
 */
if (!function_exists('writsy_share_blog_menu_item')) {
    function writsy_share_blog_menu_item()
    {
        ob_start();
        ?>
        <li>
            <span><i class="fa fa-share-alt"></i></span>
            <ul class="sub-menu share-blog">
                <li><span class="text-secondary"><?php esc_html_e('Share this Blog on:', 'writsy'); ?></span></li>
                <?php
                echo writsy_share_links(array(
                    'pattern' => '<li>%s</li>',
                    'url' => esc_url(home_url()),
                    'text' => esc_html(get_bloginfo('name', 'display') . ' - ' . get_bloginfo('description', 'display'))
                ));
                ?>
            </ul>
        </li>
        <?php
        return ob_get_clean();
    }
}


/**
 * Search menu item.
 *
 * @since  1.0.0
 * @return string
 */
if (!function_exists('writsy_search_menu_item')) {
    function writsy_search_menu_item()
    {
        ob_start();
        ?>
        <li>
            <span class="search-trigger"><i class="fa fa-search"></i></span>
            <div class="sub-menu search right">
                <?php get_search_form(); ?>
            </div>
        </li>
        <?php
        return ob_get_clean();
    }
}


/**
 * Share post links.
 *
 * @since  1.0.0
 * @param  string $class
 * @return string
 */
if (!function_exists('writsy_share_post')) {
    function writsy_share_post($class = '')
    {
        ob_start();
        ?>
        <div class="entry-share-links<?php echo esc_attr($class ? ' ' . $class : ''); ?>">
            <span class="entry-share-links-label"><i
                        class="fa fa-share-alt"></i><span><?php esc_html_e('Share:', 'writsy'); ?></span></span>
            <ul>
                <?php
                echo writsy_share_links(array(
                    'pattern' => '<li>%s</li>',
                    'url' => esc_url(get_permalink()),
                    'text' => esc_html(get_the_title())
                ));
                ?>
            </ul>
        </div>
        <?php
        return ob_get_clean();
    }
}


/**
 * Get attachment id from attachment url.
 *
 * @since  1.0.0
 * @param  string $url
 * @return integer
 */
if (!function_exists('writsy_is_plugin_active')) {
    function writsy_is_plugin_active($plugin)
    {
        return in_array($plugin, (array)get_option('active_plugins', array()));
    }
}


/**
 * Get attachment id from attachment url.
 *
 * @since  1.0.0
 * @param  string $url
 * @return integer
 */
if (!function_exists('writsy_get_attachment_id_from_url')) {
    function writsy_get_attachment_id_from_url($url)
    {
        global $wpdb;

        $url = esc_url($url);

        return $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url));
    }
}


/**
 * Google webfont list.
 *
 * @since  1.0.0
 * @return array
 */
if (!function_exists('writsy_google_fonts')) {
    function writsy_google_fonts()
    {
        if ($cached = get_transient('writsy_google_fonts')) {
            return $cached;
        }

        $api_key = 'AIzaSyBn5dqKcybGbT7Soj_VSv7KzCKtog2J1k0';
        $api_url = add_query_arg(array('key' => $api_key), 'https://www.googleapis.com/webfonts/v1/webfonts');
        $response = wp_remote_get($api_url);
        $fonts = array();

        if (!is_array($response)) {
            return $fonts;
        }

        if ($response && $result = json_decode(wp_remote_retrieve_body($response), true)) {
            if (is_array($result) && isset($result['items'])) {
                foreach ($result['items'] as $font) {
                    $fonts[sanitize_key($font['family'])] = $font;
                }

                set_transient('writsy_google_fonts', $fonts, 60 * 60 * 48);

                return $fonts;
            }
        }
    }
}


/**
 * OS safe font list.
 *
 * @since  1.0.0
 * @return array
 */
if (!function_exists('writsy_os_fonts')) {
    function writsy_os_fonts()
    {
        return array(
            'arial' => array(
                'family' => esc_html__('Arial', 'writsy'),
                'category' => 'sans-serif'
            ),
            'arialblack' => array(
                'family' => esc_html__('Arial Black', 'writsy'),
                'category' => 'sans-serif'
            ),
            'comicsansms' => array(
                'family' => esc_html__('Comic Sans MS', 'writsy'),
                'category' => 'sans-serif'
            ),
            'courier' => array(
                'family' => esc_html__('Courier', 'writsy'),
                'category' => 'monospace'
            ),
            'couriernew' => array(
                'family' => esc_html__('Courier New', 'writsy'),
                'category' => 'monospace'
            ),
            'georgia' => array(
                'family' => esc_html__('Georgia', 'writsy'),
                'category' => 'serif'
            ),
            'helvetica' => array(
                'family' => esc_html__('Helvetica', 'writsy'),
                'category' => 'sans-serif'
            ),
            'helveticaneue' => array(
                'family' => esc_html__('Helvetica Neue', 'writsy'),
                'category' => 'sans-serif'
            ),
            'impact' => array(
                'family' => esc_html__('Impact', 'writsy'),
                'category' => 'sans-serif'
            ),
            'palatino' => array(
                'family' => esc_html__('Palatino', 'writsy'),
                'category' => 'serif'
            ),
            'tahoma' => array(
                'family' => esc_html__('Tahoma', 'writsy'),
                'category' => 'serif'
            ),
            'times' => array(
                'family' => esc_html__('Times', 'writsy'),
                'category' => 'serif'
            ),
            'timesnewroman' => array(
                'family' => esc_html__('Times New Roman', 'writsy'),
                'category' => 'sans-serif'
            ),
            'verdana' => array(
                'family' => esc_html__('Verdana', 'writsy'),
                'category' => 'sans-serif'
            ),
        );
    }
}


/**
 * Font list
 *
 * @since  1.0.0
 * @return array
 */
if (!function_exists('writsy_fonts')) {
    function writsy_fonts()
    {
        $os = writsy_os_fonts();
        $google = writsy_google_fonts();
        $fonts = array_merge($os, $google);

        ksort($fonts);

        return $fonts;
    }
}


/**
 * Font options.
 *
 * @since  1.0.0
 * @return array
 */
if (!function_exists('writsy_font_options')) {
    function writsy_font_options()
    {
        $fonts = array();

        foreach (writsy_fonts() as $key => $value) {
            $fonts[$key] = $value['family'];
        }

        return $fonts;
    }
}


/**
 * Determine whether it is an OS font.
 *
 * @since  1.0.0
 * @param  string $id
 * @return boolean
 */
if (!function_exists('writsy_is_os_font')) {
    function writsy_is_os_font($id)
    {
        return array_key_exists($id, writsy_os_fonts());
    }
}


/**
 * Determine whether it is a Google webfont.
 *
 * @since  1.0.0
 * @param  string $id
 * @return boolean
 */
if (!function_exists('writsy_is_google_font')) {
    function writsy_is_google_font($id)
    {
        return !writsy_is_os_font($id);
    }
}


/**
 * Get font data.
 *
 * @since  1.0.0
 * @param  string $id
 * @return boolean
 */
if (!function_exists('writsy_font_data')) {
    function writsy_font_data($id)
    {
        $fonts = writsy_fonts();

        if (array_key_exists($id, $fonts)) {
            return $fonts[$id];
        }
    }
}


/**
 * Get Google fonts stylesheets urls.
 *
 * @since  1.0.0
 * @param  array $fonts
 * @return array
 */
if (!function_exists('writsy_google_fonts_urls')) {
    function writsy_google_fonts_urls(array $fonts)
    {
        $families = array();
        $subsets = array();

        foreach ($fonts as $font_id) {
            if (!writsy_is_google_font($font_id)) {
                continue;
            }

            $font_data = writsy_font_data($font_id);
            $family = $font_data['family'];

            if (isset($font_data['variants']) && !empty($font_data['variants'])) {
                $family .= ':' . implode(',', $font_data['variants']);
            }

            if (isset($font_data['subsets']) && !empty($font_data['subsets'])) {
                $subsets = array_merge($subsets, $font_data['subsets']);
            }

            $families[] = $family;
        }

        $subsets = array_unique($subsets);

        return add_query_arg(array(
            'family' => urlencode(implode('|', $families)),
            'subset' => urlencode(implode(',', $subsets)),
        ), 'https://fonts.googleapis.com/css');
    }
}

/* Custom Ajax Function Ticket # 168*/
add_action('wp_ajax_nopriv_lead_post_api_call', 'lead_post_api_call');
add_action('wp_ajax_lead_post_api_call', 'lead_post_api_call');
function lead_post_api_call()
{
    $post = $_REQUEST;
    $post['form_type'] = 'wp_blog_posting'; /* Ticket # 168*/
    $post['response_format'] = 'json';/* To get Response in the form of Json set this field */
    $post['format'] = 'json';
    $post['request_type'] = 'cds_blog';
    $post['ip_address'] = get_client_ip();

    $url = 'https://admin.financialize.com/api/cds_form.php';
    if (isset($post['optinmonster']) && $post['optinmonster'] == 'exit_popup') {
        $post['cid'] = (isset($post['cid']) && intval($post['cid']) > 0) ? intval($post['cid']) : '267'; /* Ticket # 188*/
    } elseif (!isset($post['cds_id']) || (isset($post['cds_id']) && $post['cds_id'] == 0)) {
        $post['cid'] = (isset($post['cid']) && intval($post['cid']) > 0) ? intval($post['cid']) : '307'; /* Ticket # 188*/
        $url = 'https://admin.financialize.com/api/lead_post.php';
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0); // No header in the result
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
    curl_setopt($ch, CURLOPT_POST, 1); // This is a POST request
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $responseData = array('status' => 'error', 'message' => 'WP Error Message.');
    // Fetch and return content
    $response = curl_exec($ch);
    curl_close($ch);
    $response = json_decode(($response));
    foreach ($response as $key => $val) {
        $responseData[$key] = $val;
    }
    echo json_encode($responseData);
    exit;
}

// Function to get the client IP address
function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

/* Optin API Client Call for WP function file */

add_action('wp_ajax_nopriv_optin_api_call', 'optin_api_call');

add_action('wp_ajax_optin_api_call', 'optin_api_call');

function optin_api_call()

{

    $post = array_merge($_REQUEST, $_SERVER);

    /* Optin File get Content Structure if want to use then remove DB resource code  */

    $post['type'] = 'file_get_content'; /* Set Optin Type if any defined */

    $post['code'] = 'optin_sample'; /* Set Optin Code if any defined */

    /* Optin DB resources Structure Starts */

    $post['type'] = 'db_resources'; /* Set Optin Type if any defined */

    $post['optin_id'] = (isset($_REQUEST['optin_id']) && intval($_REQUEST['optin_id']) > 0) ? intval($_REQUEST['optin_id']) : 1;/* Set Optin id if any defined */

    /* Optin DB resources Structure Ends */

    $post['domain_id'] = '10';/* Set domain ID for logs */

    $post['is_lp'] = '0';/* Set 1 if Landing page Site */

    $post['format'] = 'json';

    $post['response_format'] = 'json';/* To get Response in the form of Json set this field */

    $post['ip_address'] = get_client_ip();

    $url = 'https://admin.financialize.com/financialize_optin/optin_api.php';

    if ($post['is_form_submit'] == 1)

        $url = 'https://admin.financialize.com/api/cds_form.php';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_HEADER, 0); // No header in the result

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result

    curl_setopt($ch, CURLOPT_POST, 1); // This is a POST request

    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    $responseData = array('status' => 'error', 'message' => 'something wrong with the system.');

    // Fetch and return content

    $response = curl_exec($ch);

    curl_close($ch);

    $response = json_decode(($response));

    foreach ($response as $key => $val) {

        $responseData[$key] = $val;

    }

    echo json_encode($responseData);

    exit;

}

/* Optin API Client Call for WP function file */

add_action('wp_ajax_nopriv_optin_form_graphic', 'optin_form_graphic');

add_action('wp_ajax_optin_form_graphic', 'optin_form_graphic');

function optin_form_graphic()
{
    include_once(get_template_directory() . '/includes/config.php');
    $dob = isset($_REQUEST['dob']) ? trim($_REQUEST['dob']) : '';
    $city = isset($_REQUEST['city']) ? trim($_REQUEST['city']) : '';
    $state = isset($_REQUEST['state']) ? trim($_REQUEST['state']) : '';
    $state_code = isset($_REQUEST['state_code']) ? trim($_REQUEST['state_code']) : '';
    $zip = isset($_REQUEST['zip']) ? trim($_REQUEST['zip']) : '';
    $inner_html = optinProgressBar($dob, $city, $state);
    $inner_html .= optinTableSection($state, $state_code, $dob, $zip,$city);
    $inner_html .= loadingProgressBarScript();
    $response = array('status' => 'success', 'html' => $inner_html);
    echo json_encode($response);
    exit;
}