<?php
/**
 * Writsy Incredibbble plugin integration.
 *
 * @package Writsy
 * @since   1.0.0
 */

defined('ABSPATH') or die('Cheatin\' Uh?');


/**
 * Enable Incredibbble plugin features.
 *
 * @since  1.0.0
 * @return void
 */
if (! function_exists('writsy_incredibbble_support')) {
    function writsy_incredibbble_support() {
        add_theme_support('incredibbble', array(
            'options',
            'metabox',
            'featured_posts',
            'twitter_feeds',
            'instagram_feeds',
            'widget_twitter_feeds',
            'widget_instagram_feeds',
            'widget_posts',
            'widget_social',
        ));
    }

    add_action('after_setup_theme', 'writsy_incredibbble_support');
}


/**
 * Get featured posts
 *
 * @since  1.0.0
 * @param  integer $post_id
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
if (! function_exists('writsy_get_featured_posts')) {
    function writsy_get_featured_posts() {
        return apply_filters('incredibbble_get_featured_posts', array());
    }
}


/**
 * Replace social widget list class.
 *
 * @since  1.0.0
 * @param  string $class
 * @return string
 */
if (! function_exists('writsy_social_widget_list_class')) {
    function writsy_social_widget_list_class($class) {
        return 'social-buttons';
    }

    add_filter('incredibbble_social_widget_list_class', 'writsy_social_widget_list_class');
}


/**
 * Adds button classes to social widget links.
 *
 * @since  1.0.0
 * @param  string $class
 * @return string
 */
if (! function_exists('writsy_social_widget_link_class')) {
    function writsy_social_widget_link_class($class) {
        return 'button button-secondary';
    }

    add_filter('incredibbble_social_widget_link_class', 'writsy_social_widget_link_class');
}


/**
 * Order by options.
 *
 * @since  1.0.0
 * @param  string $class
 * @return string
 */
if (! function_exists('writsy_orderby_options')) {
    function writsy_orderby_options($orderby = array()) {
        $orderby = array(
            'none'  => esc_html__('None', 'writsy'),
            'id'    => esc_html__('Post ID', 'writsy'),
            'title' => esc_html__('Post Title', 'writsy'),
            'date'  => esc_html__('Publish Date', 'writsy'),
            'rand'  => esc_html__('Random', 'writsy'),
            'comment_count' => esc_html__('Comments Number', 'writsy')
        );

        if (writsy_is_plugin_active('post-views-counter/post-views-counter.php')) {
            $orderby['post_views'] = esc_html__('Post Views', 'writsy');
        }

        return $orderby;
    }

    add_filter('incredibbble_posts_widget_orderby', 'writsy_orderby_options');
}


/**
 * Ordering options.
 *
 * @since  1.0.0
 * @param  string $class
 * @return string
 */
if (! function_exists('writsy_order_options')) {
    function writsy_order_options() {
        return array(
            'ASC'  => esc_html__('Ascending', 'writsy'),
            'DESC' => esc_html__('Descending', 'writsy')
        );
    }
}


/**
 * Category options list for select.
 *
 * @since  1.0.0
 * @param  string $class
 * @return string
 */
if (! function_exists('writsy_category_options')) {
    function writsy_category_options() {
        $categories = array('' => esc_html__('All', 'writsy'));

        foreach (get_categories() as $category) {
            $categories[$category->term_id] = $category->name;
        }

        return $categories;
    }
}


/**
 * Social brands.
 *
 * @since  1.0.0
 * @param  string $class
 * @return array
 */
if (! function_exists('writsy_social_brands')) {
    function writsy_social_brands() {
        return array(
            'facebook' => array(
                'name' => esc_html__('Facebook', 'writsy'),
                'icon' => '<i class="fa fa-facebook-official"></i>'
            ),

            'twitter' => array(
                'name' => esc_html__('Twitter', 'writsy'),
                'icon' => '<i class="fa fa-twitter"></i>'
            ),

            'instagram' => array(
                'name' => esc_html__('Instagram', 'writsy'),
                'icon' => '<i class="fa fa-instagram"></i>'
            ),

            'google_plus' => array(
                'name' => esc_html__('Google+', 'writsy'),
                'icon' => '<i class="fa fa-google-plus"></i>'
            ),

            'pinterest' => array(
                'name' => esc_html__('Pinterest', 'writsy'),
                'icon' => '<i class="fa fa-pinterest"></i>'
            )
        );
    }

    add_filter('incredibbble_social_widget_brands', 'writsy_social_brands');
}


/**
 * Enable lazyload instagram images.
 *
 * @since  1.0.0
 * @return string
 */
if (function_exists('__return_true')) {
    add_filter('incredibbble_instagram_feeds_lazyload', '__return_true');
}


/**
 * Load custom options assets.
 *
 * @since  1.0.0
 * @return void
 */
if (! function_exists('writsy_options_assets')) {
    function writsy_options_assets() {
        if (! wp_script_is('writsy-options', 'enqueued')) {
            wp_enqueue_script(
                'writsy-options',
                get_template_directory_uri() . '/assets/js/options.js',
                array(),
                wp_get_theme()->get('Version'),
                true
            );
        }
    }

    add_action('incredibbble_options_load_assets', 'writsy_options_assets');
}


/**
 * Load custom metabox assets.
 *
 * @since  1.0.0
 * @return void
 */
if (! function_exists('writsy_metabox_assets')) {
    function writsy_metabox_assets() {
        if (! wp_script_is('writsy-metabox', 'enqueued')) {
            wp_enqueue_script(
                'writsy-metabox',
                get_template_directory_uri() . '/assets/js/metabox.js',
                array(),
                wp_get_theme()->get('Version'),
                true
            );
        }
    }

    add_action('incredibbble_metabox_load_assets', 'writsy_metabox_assets');
}


/**
 * Get post meta value.
 *
 * @since  1.0.0
 * @param  integer $post_id
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
if (! function_exists('writsy_get_meta')) {
    function writsy_get_meta($post_id, $key, $default = false) {
        if (function_exists('incredibbble_get_meta')) {
            return incredibbble_get_meta($post_id, $key, $default);
        }

        return $default;
    }
}


/**
 * Register general options.
 *
 * @since  1.0.0
 * @param  Incredibbble_Manager $manager
 * @return void
 */
if (! function_exists('writsy_theme_options')) {
    function writsy_theme_options($manager) {
        $manager->add_panel('general', array(
            'title'    => esc_html__('General Settings', 'writsy'),
            'subtitle' => esc_html__('Basic configuration settings.', 'writsy'),
            'priority' => 1
        ));

        $manager->add_section('identity', array(
            'panel'    => 'general',
            'title'    => esc_html__('Site Identity', 'writsy'),
            'priority' => 1
        ));

        $manager->add_field('logo', array(
            'section'     => 'identity',
            'title'       => esc_html__('Logo', 'writsy'),
            'subtitle'    => esc_html__('Site logo image.', 'writsy'),
            'description' => esc_html__('Paste your logo image URL or select an image from library.', 'writsy'),
            'type'        => 'image',
            'priority'    => 1
        ));

        $manager->add_field('tagline', array(
            'section'     => 'identity',
            'title'       => esc_html__('Tagline', 'writsy'),
            'subtitle'    => esc_html__('Show or hide site tagline.', 'writsy'),
            'description' => esc_html__('Uncheck this option to hide the site tagline.', 'writsy'),
            'type'        => 'checkbox',
            'default'     => true,
            'priority'    => 2
        ));

        $manager->add_field('footer_text', array(
            'section'     => 'identity',
            'title'       => esc_html__('Footer Text', 'writsy'),
            'subtitle'    => esc_html__('Optional footer text', 'writsy'),
            'description' => esc_html__('Enter additional text to be displayed next to copyright text on the footer.', 'writsy'),
            'type'        => 'textarea',
            'attributes'  => array('rows' => 5),
            'default'     => sprintf(__('All Right Reserved. Designed by %sMade with <i class="fa fa-heart-o"></i> in Bandung.', 'writsy'),
                '<a href="' . esc_url('https://incredibbble.com') . '">Incredibbble</a><br>'
            ),
            'customizer'  => array('transport' => 'postMessage'),
            'priority'    => 4
        ));

        // social profiles.
        $manager->add_section('social', array(
            'panel'    => 'general',
            'title'    => esc_html__('Social Profiles', 'writsy'),
            'priority' => 2
        ));

        $manager->add_field('social_header', array(
            'section'     => 'social',
            'title'       => esc_html__('Social Header', 'writsy'),
            'subtitle'    => esc_html__('Show/hide header social buttons', 'writsy'),
            'description' => esc_html__('Uncheck this option to hide social buttons from header area.', 'writsy'),
            'type'        => 'checkbox',
            'default'     => true,
            'priority'    => 1
        ));

        $manager->add_field('social_footer', array(
            'section'     => 'social',
            'title'       => esc_html__('Social Footer', 'writsy'),
            'subtitle'    => esc_html__('Show/hide footer social buttons', 'writsy'),
            'description' => esc_html__('Uncheck this option to hide social buttons from footer widgets area.', 'writsy'),
            'type'        => 'checkbox',
            'default'     => true,
            'priority'    => 2
        ));

        foreach (writsy_social_brands() as $key => $value) {
            $priority = 3;

            $manager->add_field($key, array(
                'section'     => 'social',
                'title'       => esc_html($value['name']),
                'subtitle'    => sprintf(_x('Your %s profile.', 'Please keep the "%s"', 'writsy'), esc_html($value['name'])),
                'description' => sprintf(_x('Paste the URL of your %s profile here.', 'Please keep the "%s"', 'writsy'), esc_html($value['name'])),
                'type'        => 'url',
                'priority'    => $priority
            ));

            $priority++;
        }

        // newsletter dialog.
        $manager->add_section('newsletter_dialog', array(
            'panel'    => 'general',
            'title'    => esc_html__('Newsletter', 'writsy'),
            'priority' => 3
        ));

        $manager->add_field('newsletter_dialog', array(
            'section'     => 'newsletter_dialog',
            'title'       => esc_html__('Newsletter Dialog', 'writsy'),
            'subtitle'    => esc_html__('Enable/disable newsletter dialog.', 'writsy'),
            'description' => esc_html__('Uncheck this option to remove newsletter dialog from header area.', 'writsy'),
            'type'        => 'checkbox',
            'default'     => true,
            'priority'    => 1
        ));

        $manager->add_field('newsletter_dialog_title', array(
            'section'     => 'newsletter_dialog',
            'title'       => esc_html__('Dialog Title', 'writsy'),
            'subtitle'    => esc_html__('Newsletter dialog title.', 'writsy'),
            'description' => esc_html__('Enter the dialog title.', 'writsy'),
            'type'        => 'text',
            'default'     => esc_html__('Newsletter', 'writsy'),
            'priority'    => 2
        ));

        $manager->add_field('newsletter_dialog_text', array(
            'section'     => 'newsletter_dialog',
            'title'       => esc_html__('Dialog Text', 'writsy'),
            'subtitle'    => esc_html__('Newsletter dialog text.', 'writsy'),
            'description' => esc_html__('Enter the dialog text, HTML tags are allowed.', 'writsy'),
            'type'        => 'textarea',
            'default'     => esc_html__('Subscribe to our Newsletter and get our latest updates directly on your inbox.', 'writsy'),
            'priority'    => 3
        ));

        // instagram gallery.
        $manager->add_section('instagram_gallery', array(
            'panel'    => 'general',
            'title'    => esc_html__('Instagram Gallery', 'writsy'),
            'priority' => 4
        ));

        $manager->add_field('instagram_gallery', array(
            'section'     => 'instagram_gallery',
            'title'       => esc_html__('Instagram Gallery', 'writsy'),
            'subtitle'    => esc_html__('Enable footer Instagram gallery.', 'writsy'),
            'description' => esc_html__('Check this option to enable footer Instagram photo gallery.', 'writsy'),
            'type'        => 'checkbox',
            'default'     => false,
            'priority'    => 1
        ));

        $manager->add_field('instagram_gallery_username', array(
            'section'     => 'instagram_gallery',
            'title'       => esc_html__('Username', 'writsy'),
            'subtitle'    => esc_html__('Your instagram username.', 'writsy'),
            'description' => esc_html__('Enter your Instagram username here.', 'writsy'),
            'type'        => 'text',
            'priority'    => 2
        ));

        $manager->add_field('instagram_gallery_max', array(
            'section'     => 'instagram_gallery',
            'title'       => esc_html__('Max. Photos', 'writsy'),
            'subtitle'    => esc_html__('Maximum photos to show.', 'writsy'),
            'description' => esc_html__('Must be a numeric value beetween 6-20.', 'writsy'),
            'type'        => 'number',
            'attributes'  => array('min' => 6, 'max' => 20),
            'default'     => 10,
            'priority'    => 3
        ));

        // appearance.
        $manager->add_panel('appearance', array(
            'title'    => esc_html__('Appearance', 'writsy'),
            'subtitle' => esc_html__('Customize colors, typography and other appearance settings.', 'writsy'),
            'priority' => 10,
            'priority' => 2
        ));

        $manager->add_section('appearance_colors', array(
            'panel'    => 'appearance',
            'title'    => esc_html__('Colors', 'writsy'),
            'priority' => 1
        ));

        $manager->add_field('background_color', array(
            'section'     => 'appearance_colors',
            'title'       => esc_html__('Background', 'writsy'),
            'subtitle'    => esc_html__('Body background color.', 'writsy'),
            'description' => esc_html__('Select a color for the site\'s body background.', 'writsy'),
            'type'        => 'color',
            'default'     => '#FFFFFF',
            'priority'    => 1
        ));

        $manager->add_field('text_color', array(
            'section'     => 'appearance_colors',
            'title'       => esc_html__('Text Color', 'writsy'),
            'subtitle'    => esc_html__('Global text color.', 'writsy'),
            'description' => esc_html__('It\'s recommended to choose a color that has contrast with the background color above.', 'writsy'),
            'type'        => 'color',
            'default'     => '#212121',
            'priority'    => 2
        ));

        $manager->add_field('accent_color', array(
            'section'     => 'appearance_colors',
            'title'       => esc_html__('Accent Color', 'writsy'),
            'subtitle'    => esc_html__('Your identity color.', 'writsy'),
            'description' => esc_html__('Choose a color that resemble your identity.', 'writsy'),
            'type'        => 'color',
            'default'     => '#EDC9A3',
            'priority'    => 3
        ));

        $manager->add_field('header_background_color', array(
            'section'     => 'appearance_colors',
            'title'       => esc_html__('Header Background', 'writsy'),
            'subtitle'    => esc_html__('Header area background color.', 'writsy'),
            'description' => esc_html__('Select a color for header area background.', 'writsy'),
            'type'        => 'color',
            'default'     => '#FFFFFF',
            'priority'    => 4
        ));

        $manager->add_field('header_text_color', array(
            'section'     => 'appearance_colors',
            'title'       => esc_html__('Header Text', 'writsy'),
            'subtitle'    => esc_html__('Header area text color.', 'writsy'),
            'description' => esc_html__('Select a color for header area text.', 'writsy'),
            'type'        => 'color',
            'default'     => '#212121',
            'priority'    => 5
        ));

        $manager->add_field('footer_background_color', array(
            'section'     => 'appearance_colors',
            'title'       => esc_html__('Footer Background', 'writsy'),
            'subtitle'    => esc_html__('Footer area background color.', 'writsy'),
            'description' => esc_html__('Select a color for footer area background.', 'writsy'),
            'type'        => 'color',
            'default'     => '#FFFFFF',
            'priority'    => 4
        ));

        $manager->add_field('footer_text_color', array(
            'section'     => 'appearance_colors',
            'title'       => esc_html__('Footer Text', 'writsy'),
            'subtitle'    => esc_html__('Footer area text color.', 'writsy'),
            'description' => esc_html__('Select a color for footer area text.', 'writsy'),
            'type'        => 'color',
            'default'     => '#212121',
            'priority'    => 5
        ));

        $manager->add_section('appearance_typography', array(
            'panel'    => 'appearance',
            'title'    => esc_html__('Typography', 'writsy'),
            'priority' => 2
        ));

        $manager->add_field('font_primary', array(
            'section'     => 'appearance_typography',
            'title'       => esc_html__('Primary Font', 'writsy'),
            'subtitle'    => esc_html__('The primary font face.', 'writsy'),
            'description' => esc_html__('Select a font to be used as the main font face.', 'writsy'),
            'type'        => 'select',
            'choices'     => writsy_font_options(),
            'default'     => 'crimsontext',
            'priority'    => 1
        ));

        $manager->add_field('font_secondary', array(
            'section'     => 'appearance_typography',
            'title'       => esc_html__('Secondary Font', 'writsy'),
            'subtitle'    => esc_html__('The secondary font face.', 'writsy'),
            'description' => esc_html__('Select the secondary font. Headings, buttons, and navs are using secondary font.', 'writsy'),
            'type'        => 'select',
            'choices'     => writsy_font_options(),
            'default'     => 'dosis',
            'priority'    => 2
        ));

        // layout.
        $manager->add_panel('layout', array(
            'title'    => esc_html__('Layout Settings', 'writsy'),
            'subtitle' => esc_html__('Recommended posts settings.', 'writsy'),
            'priority' => 3
        ));

        $manager->add_section('homepage_layout', array(
            'panel'    => 'layout',
            'title'    => esc_html__('Homepage', 'writsy'),
            'priority' => 1
        ));

        $manager->add_field('homepage_post_layout', array(
            'section'     => 'homepage_layout',
            'title'       => esc_html__('Post Layout', 'writsy'),
            'subtitle'    => esc_html__('Homepage post layout.', 'writsy'),
            'description' => esc_html__('Select a post layout to be used when displaying posts on the homepage.', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                ''     => esc_html__('Default', 'writsy'),
                'list' => esc_html__('List', 'writsy'),
                'grid' => esc_html__('Grid', 'writsy'),
            ),
            'priority'    => 1
        ));

        $manager->add_field('homepage_sidebar_position', array(
            'section'     => 'homepage_layout',
            'title'       => esc_html__('Sidebar', 'writsy'),
            'subtitle'    => esc_html__('Homepage sidebar position.', 'writsy'),
            'description' => esc_html__('Select sidebar position for the homepage, default is "right".', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                'left'  => esc_html__('Left', 'writsy'),
                'right' => esc_html__('Right', 'writsy'),
            ),
            'default'     => 'right',
            'priority'    => 2
        ));

        $manager->add_section('single_layout', array(
            'panel'    => 'layout',
            'title'    => esc_html__('Single Post', 'writsy'),
            'priority' => 2
        ));

        $manager->add_field('single_sidebar_position', array(
            'section'     => 'single_layout',
            'title'       => esc_html__('Sidebar', 'writsy'),
            'subtitle'    => esc_html__('Singular sidebar position.', 'writsy'),
            'description' => esc_html__('Select sidebar position for the singular post, default is "right".', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                'left'  => esc_html__('Left', 'writsy'),
                'right' => esc_html__('Right', 'writsy'),
            ),
            'default'     => 'right',
            'priority'    => 1
        ));

        $manager->add_section('archives_layout', array(
            'panel'    => 'layout',
            'title'    => esc_html__('Archive Pages', 'writsy'),
            'priority' => 2
        ));

        $manager->add_field('archives_post_layout', array(
            'section'     => 'archives_layout',
            'title'       => esc_html__('Post Layout', 'writsy'),
            'subtitle'    => esc_html__('Archive pages post layout.', 'writsy'),
            'description' => esc_html__('Select a post layout to be used when displaying posts on the archive pages.', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                ''     => esc_html__('Default', 'writsy'),
                'list' => esc_html__('List', 'writsy'),
                'grid' => esc_html__('Grid', 'writsy'),
            ),
            'priority'    => 1
        ));

        $manager->add_field('archives_sidebar_position', array(
            'section'     => 'archives_layout',
            'title'       => esc_html__('Sidebar', 'writsy'),
            'subtitle'    => esc_html__('Archive pages sidebar position.', 'writsy'),
            'description' => esc_html__('Select sidebar position for the archive pages, default is "right".', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                'left'  => esc_html__('Left', 'writsy'),
                'right' => esc_html__('Right', 'writsy'),
            ),
            'default'     => 'right',
            'priority'    => 2
        ));

        $manager->add_section('search_layout', array(
            'panel'    => 'layout',
            'title'    => esc_html__('Search Result', 'writsy'),
            'priority' => 3
        ));

        $manager->add_field('search_post_layout', array(
            'section'     => 'search_layout',
            'title'       => esc_html__('Post Layout', 'writsy'),
            'subtitle'    => esc_html__('Search result post layout.', 'writsy'),
            'description' => esc_html__('Select a post layout to be used when displaying posts on the search result page.', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                ''     => esc_html__('Default', 'writsy'),
                'list' => esc_html__('List', 'writsy'),
                'grid' => esc_html__('Grid', 'writsy'),
            ),
            'priority'    => 1
        ));

        $manager->add_field('search_sidebar_position', array(
            'section'     => 'search_layout',
            'title'       => esc_html__('Sidebar', 'writsy'),
            'subtitle'    => esc_html__('Search result sidebar position.', 'writsy'),
            'description' => esc_html__('Select sidebar position for the search result page, default is "right".', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                'left'  => esc_html__('Left', 'writsy'),
                'right' => esc_html__('Right', 'writsy'),
            ),
            'default'     => 'right',
            'priority'    => 2
        ));

        // featured posts
        $manager->add_field('featured_posts_slider', array(
            'section'     => 'featured_posts_display',
            'title'       => esc_html__('Featured Slider', 'writsy'),
            'subtitle'    => esc_html__('Enable featured posts slider.', 'writsy'),
            'description' => esc_html__('Check this option to enable the featured posts slider.', 'writsy'),
            'type'        => 'checkbox',
            'default'     => false
        ));

        $manager->add_field('featured_posts_slider_type', array(
            'section'     => 'featured_posts_display',
            'title'       => esc_html__('Slider Type', 'writsy'),
            'subtitle'    => esc_html__('Featured posts slider type.', 'writsy'),
            'description' => esc_html__('Select the featured slider type, default is "boxed".', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                'boxed'     => esc_html__('Boxed Slider', 'writsy'),
                'carousel'  => esc_html__('Carousel', 'writsy'),
                'carousel2' => esc_html__('Carousel 2', 'writsy'),
                'fullwidth' => esc_html__('Fullwidth Slider', 'writsy'),
            ),
            'default'     => 'boxed'
        ));

        // recommended posts.
        $manager->add_panel('recommended_posts', array(
            'title'    => esc_html__('Recommended Posts', 'writsy'),
            'subtitle' => esc_html__('Recommended posts settings.', 'writsy'),
            'priority' => 30
        ));

        $manager->add_section('recommended_posts_query', array(
            'panel' => 'recommended_posts',
            'title' => esc_html__('Query Settings', 'writsy')
        ));

        $manager->add_section('recommended_posts_display', array(
            'panel' => 'recommended_posts',
            'title' => esc_html__('Display Options', 'writsy')
        ));

        $manager->add_field('recommended_posts_category', array(
            'section'     => 'recommended_posts_query',
            'title'       => esc_html__('Category', 'writsy'),
            'subtitle'    => esc_html__('Category filter.', 'writsy'),
            'description' => esc_html__('Select a category.', 'writsy'),
            'type'        => 'select',
            'choices'     => writsy_category_options()
        ));

        $manager->add_field('recommended_posts_max', array(
            'section'     => 'recommended_posts_query',
            'title'       => esc_html__('Max. Posts', 'writsy'),
            'subtitle'    => esc_html__('Maximum posts to show.', 'writsy'),
            'description' => esc_html__('Numeric value only, default is 8.', 'writsy'),
            'type'        => 'number',
            'default'     => 8
        ));

        $manager->add_field('recommended_posts_image_only', array(
            'section'     => 'recommended_posts_query',
            'title'       => esc_html__('Image Only', 'writsy'),
            'subtitle'    => esc_html__('Only posts with image.', 'writsy'),
            'description' => esc_html__('Check this option to exclude posts without featured image.', 'writsy'),
            'type'        => 'checkbox',
            'default'     => true
        ));

        $manager->add_field('recommended_posts_orderby', array(
            'section'     => 'recommended_posts_query',
            'title'       => esc_html__('Order By', 'writsy'),
            'subtitle'    => esc_html__('Order posts by meta value.', 'writsy'),
            'description' => esc_html__('Select a meta key which will be used to order the result.', 'writsy'),
            'type'        => 'select',
            'choices'     => writsy_orderby_options(),
            'default'     => 'comment_count'
        ));

        $manager->add_field('recommended_posts_order', array(
            'section'     => 'recommended_posts_query',
            'title'       => esc_html__('Order', 'writsy'),
            'subtitle'    => esc_html__('Order the result asc/desc.', 'writsy'),
            'description' => esc_html__('Ascending: Lowest to highest values. Descending: Highest to lowest value.', 'writsy'),
            'type'        => 'select',
            'choices'     => writsy_order_options(),
            'default'     => 'DESC'
        ));

        $manager->add_field('recommended_posts', array(
            'section'     => 'recommended_posts_display',
            'title'       => esc_html__('Enable', 'writsy'),
            'subtitle'    => esc_html__('Enable recommended posts.', 'writsy'),
            'description' => esc_html__('Check this option to enable the recommended posts widget.', 'writsy'),
            'type'        => 'checkbox'
        ));

        $manager->add_field('recommended_posts_title', array(
            'section'     => 'recommended_posts_display',
            'title'       => esc_html__('Title', 'writsy'),
            'subtitle'    => esc_html__('Recommended posts title.', 'writsy'),
            'description' => esc_html__('Enter the title for recommended posts widget.', 'writsy'),
            'type'        => 'text',
            'default'     => esc_html__('Recommended', 'writsy')
        ));

        // related posts.
        $manager->add_panel('related_posts', array(
            'title'    => esc_html__('Related Posts', 'writsy'),
            'subtitle' => esc_html__('Related posts settings.', 'writsy'),
            'priority' => 31
        ));

        $manager->add_section('related_posts_query', array(
            'panel' => 'related_posts',
            'title' => esc_html__('Query Settings', 'writsy')
        ));

        $manager->add_section('related_posts_display', array(
            'panel' => 'related_posts',
            'title' => esc_html__('Display Options', 'writsy')
        ));

        $manager->add_field('related_posts_by', array(
            'section'     => 'related_posts_query',
            'title'       => esc_html__('Query By', 'writsy'),
            'subtitle'    => esc_html__('Related posts type.', 'writsy'),
            'description' => esc_html__('Select whether use post categories or tags.', 'writsy'),
            'type'        => 'select',
            'choices'     => array('categories' => esc_html__('Categories', 'writsy'), 'tags' => esc_html__('Tags', 'writsy')),
            'default'     => 'tags'
        ));

        $manager->add_field('related_posts_max', array(
            'section'     => 'related_posts_query',
            'title'       => esc_html__('Max. Posts', 'writsy'),
            'subtitle'    => esc_html__('Maximum posts to show.', 'writsy'),
            'description' => esc_html__('Numeric value only, default is 6.', 'writsy'),
            'type'        => 'number',
            'default'     => 6
        ));

        $manager->add_field('related_posts', array(
            'section'     => 'related_posts_display',
            'title'       => esc_html__('Enable', 'writsy'),
            'subtitle'    => esc_html__('Enable related posts.', 'writsy'),
            'description' => esc_html__('Check this option to enable the related posts widget.', 'writsy'),
            'type'        => 'checkbox',
            'default'     => true,
        ));

        $manager->add_field('related_posts_title', array(
            'section'     => 'related_posts_display',
            'title'       => esc_html__('Title', 'writsy'),
            'subtitle'    => esc_html__('Related posts title.', 'writsy'),
            'description' => esc_html__('Enter the title for related posts widget.', 'writsy'),
            'type'        => 'text',
            'default'     => esc_html__('Related Posts', 'writsy')
        ));
    }

    add_filter('incredibbble_register_options', 'writsy_theme_options');
}


/**
 * Get theme options.
 *
 * @since  1.0.0
 * @param  integer $post_id
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
if (! function_exists('writsy_get_option')) {
    function writsy_get_option($id, $default = false) {
        if (function_exists('incredibbble_get_option')) {
            return incredibbble_get_option($id, $default);
        }

        return $default;
    }
}


/**
 * Register metabox fields.
 *
 * @since  1.0.0
 * @param  Incredibbble_Manager $manager
 * @return void
 */
if (! function_exists('writsy_register_metaboxes')) {
    function writsy_register_metaboxes($manager) {
        
        // video post format settings panel.
        $manager->add_panel('format_video', array(
            'title'  => esc_html__('Video Post Format', 'writsy'),
            'screen' => 'post'
        ));
        
        $manager->add_section('format_video', array(
            'panel' => 'format_video',
            'title' => esc_html__('Format Video', 'writsy')
        ));

        $manager->add_field('video_file', array(
            'section'     => 'format_video',
            'title'       => esc_html__('Video File', 'writsy'),
            'subtitle'    => esc_html__('Self-hosted video file.', 'writsy'),
            'description' => esc_html__('Select a self hosted video file or enter the video url here.', 'writsy'),
            'type'        => 'video'
        ));

        $manager->add_field('video_url', array(
            'section'     => 'format_video',
            'title'       => esc_html__('oEmbed Video', 'writsy'),
            'subtitle'    => esc_html__('Supported oEmbed video url.', 'writsy'),
            'description' => esc_html__('Paste the video url of supported WP oEmbed providers such as YouTube, Vimeo, DailyMotion etc.', 'writsy'),
            'type'        => 'url'
        ));

        // quote post format settings panel.
        $manager->add_panel('format_quote', array(
            'title'  => esc_html__('Quote Post Format', 'writsy'),
            'screen' => 'post'
        ));
        
        $manager->add_section('format_quote', array(
            'panel' => 'format_quote',
            'title' => esc_html__('Format Quote', 'writsy')
        ));

        $manager->add_field('quote_author', array(
            'section'     => 'format_quote',
            'title'       => esc_html__('Author', 'writsy'),
            'subtitle'    => esc_html__('Quote author', 'writsy'),
            'description' => esc_html__('Enter the quote author here.', 'writsy'),
            'type'        => 'text'
        ));

        $manager->add_field('quote_author_subtitle', array(
            'section'     => 'format_quote',
            'title'       => esc_html__('Author Subtitle', 'writsy'),
            'subtitle'    => esc_html__('Optional author subtitle.', 'writsy'),
            'description' => esc_html__('Enter author meta information such as job title or company name.', 'writsy'),
            'type'        => 'text'
        ));

        $manager->add_field('quote_text', array(
            'section'     => 'format_quote',
            'title'       => esc_html__('Text', 'writsy'),
            'subtitle'    => esc_html__('Quote text.', 'writsy'),
            'description' => esc_html__('Enter the quote text here', 'writsy'),
            'type'        => 'textarea',
            'attributes'  => array(
                'rows'    => 3
            )
        ));

        // link post format settings panel.
        $manager->add_panel('format_link', array(
            'title'  => esc_html__('Link Post Format', 'writsy'),
            'screen' => 'post'
        ));
        
        $manager->add_section('format_link', array(
            'panel' => 'format_link',
            'title' => esc_html__('Format Link', 'writsy')
        ));

        $manager->add_field('link_url', array(
            'section'     => 'format_link',
            'title'       => esc_html__('URL', 'writsy'),
            'subtitle'    => esc_html__('Link target url.', 'writsy'),
            'description' => esc_html__('Must be begins with a protocol, either http or https.', 'writsy'),
            'type'        => 'url'
        ));

        $manager->add_field('link_label', array(
            'section'     => 'format_link',
            'title'       => esc_html__('Label', 'writsy'),
            'subtitle'    => esc_html__('Link label.', 'writsy'),
            'description' => esc_html__('Enter the link label, it could be a site name or product name.', 'writsy'),
            'type'        => 'text'
        ));

        // gallery post format settings panel.
        $manager->add_panel('format_gallery', array(
            'title'  => esc_html__('Gallery Post Format', 'writsy'),
            'screen' => 'post'
        ));
        
        $manager->add_section('format_gallery', array(
            'panel' => 'format_gallery',
            'title' => esc_html__('Format Gallery', 'writsy')
        ));

        $manager->add_field('gallery', array(
            'section'     => 'format_gallery',
            'title'       => esc_html__('Gallery', 'writsy'),
            'subtitle'    => esc_html__('Gallery shortcode', 'writsy'),
            'description' => esc_html__('Copy a gallery shortcode here. Use "Add Media" button above the post editor to generate a gallery shortcode.', 'writsy'),
            'type'        => 'text'
        ));

        $manager->add_field('gallery_view', array(
            'section'     => 'format_gallery',
            'title'       => esc_html__('Display As', 'writsy'),
            'subtitle'    => esc_html__('Gallery view options', 'writsy'),
            'description' => esc_html__('Please choose whether display the gallery as slider or tiled gallery.', 'writsy'),
            'type'        => 'select',
            'choices'     => array(
                'slider'  => esc_html__('Slider', 'writsy'),
                'tile'    => esc_html__('Tile', 'writsy')
            ),
            'default'     => 'slider'
        ));

        // audio post format settings panel.
        $manager->add_panel('format_audio', array(
            'title'  => esc_html__('Audio Post Format', 'writsy'),
            'screen' => 'post'
        ));
        
        $manager->add_section('format_audio', array(
            'panel' => 'format_audio',
            'title' => esc_html__('Format Audio', 'writsy')
        ));

        $manager->add_field('audio_file', array(
            'section'     => 'format_audio',
            'title'       => esc_html__('Featured Audio', 'writsy'),
            'subtitle'    => esc_html__('Featured audio file url', 'writsy'),
            'description' => esc_html__('Select a self hosted audio file or a audio url of supported WP oEmbed providers such as SoundCloud etc.', 'writsy'),
            'type'        => 'audio'
        ));

        $manager->add_field('audio_url', array(
            'section'     => 'format_audio',
            'title'       => esc_html__('oEmbed', 'writsy'),
            'subtitle'    => esc_html__('Supported oEmbed audio/music url', 'writsy'),
            'description' => esc_html__('Paste the audio/music url of supported WP oEmbed providers such as SoundCloud etc.', 'writsy'),
            'type'        => 'url'
        ));
    }

    add_action('incredibbble_register_metaboxes', 'writsy_register_metaboxes');
}