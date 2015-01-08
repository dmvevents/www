<?php
/*
* Various utility functions required by theme defined here
*
* @package Livemesh Framework
*/

/*
* Obtain the prefix for my theme
*/
if (!function_exists('mo_get_prefix')) {
    function mo_get_prefix() {
        return 'mo';
    }
}

if (!function_exists('mo_exec_action')) {
    function mo_exec_action($hook, $arg = '') {
        $prefix = mo_get_prefix();

        do_action("{$prefix}_{$hook}", $arg);
    }
}


if (!function_exists('mo_get_layout_manager')) {
    function mo_get_layout_manager() {

        $layout_manager = MO_LayoutManager::getInstance();
        return $layout_manager;
    }
}

if (!function_exists('mo_get_sidebar_manager')) {
    function mo_get_sidebar_manager() {

        $sidebar_manager = MO_SidebarManager::getInstance();
        return $sidebar_manager;
    }
}

if (!function_exists('mo_get_slider_manager')) {
    function mo_get_slider_manager() {

        $slider_manager = MO_Slider_Manager::getInstance();
        return $slider_manager;
    }
}

if (!function_exists('mo_get_framework_extender')) {
    function mo_get_framework_extender() {

        $framework_extender = MO_Framework_Extender::getInstance();
        return $framework_extender;
    }
}

if (!function_exists('mo_remove_wpautop')) {
    function mo_remove_wpautop($content) {

        $content = do_shortcode(shortcode_unautop($content));
        $content = preg_replace('#^<\/p>|^<br\s?\/?>|<p>$|<p>\s*(&nbsp;)?\s*<\/p>#', '', $content);
        return $content;
    }
}

if (!function_exists('mo_get_content_class')) {

    function mo_get_content_class() {
        $classes = array();
        $classes = apply_filters('mo_content_class', $classes);
        $style = '';
        foreach ($classes as $class) {
            $style .= $class . ' ';
        }
        return $style;
    }
}

if (!function_exists('mo_footer_content')) {

    function mo_footer_content() {

        // Default footer text
        $site_link = '<a class="site-link" href="' . home_url() . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home"><span>' . get_bloginfo('name') . '</span></a>';
        $wp_link = '<a class="wp-link" href="http://wordpress.org" title="' . esc_attr__('Powered by WordPress', 'mo_theme') . '"><span>' . __('WordPress', 'mo_theme') . '</span></a>';
        if (function_exists('wp_get_theme')) {
            $my_theme = wp_get_theme();
            $theme_link = '<a class="theme-link" href="' . esc_url($my_theme->ThemeURI) . '" title="' . esc_attr($my_theme->Name) . '"><span>' . esc_attr($my_theme->Name) . '</span></a>';
        }
        else {
            $theme_data = get_theme_data(trailingslashit(get_template_directory()) . 'style.css');
            $theme_link = '<a class="theme-link" href="' . esc_url($theme_data['URI']) . '" title="' . esc_attr($theme_data['Name']) . '"><span>' . esc_attr($theme_data['Name']) . '</span></a>';
        }

        $footer_text = __('Copyright &#169; ', 'mo_theme') . date(__('Y', 'mo_theme')) . ' ' . $site_link . __('. Powered by ', 'mo_theme') . $wp_link . __(' and ', 'mo_theme') . $theme_link;
        $footer_text = '<div id="footer-bottom-text">' . mo_get_theme_option('mo_footer_insert', $footer_text) . '</div>';
        echo do_shortcode($footer_text);
    }
}


if (!function_exists('mo_get_column_style')) {
    /* Return the css class name to help achieve the number of columns specified */

    function mo_get_column_style($column_count = 2, $no_margin = false) {

        $no_margin = mo_to_boolean($no_margin); // make sure it is not string

        $style_class = 'threecol';
        switch ($column_count) {
            case 1:
                $style_class = "twelvecol";
                break;
            case 2:
                $style_class = "sixcol";
                break;
            case 3:
                $style_class = "fourcol";
                break;
            case 4;
                $style_class = "threecol";
                break;
            case 5:
                $style_class = "threecol"; /* Theme does not support 5 columns due to 12 column  grid */
                break;
            case 6;
                $style_class = "twocol";
                break;
        }
        $style_class = $no_margin ? ($style_class . ' zero-margin') : $style_class;

        return $style_class;
    }
}


if (!function_exists('mo_truncate_string')) {
    /* Original PHP code by Chirp Internet: www.chirp.com.au
    http://www.the-art-of-web.com/php/truncate/ */

    function mo_truncate_string($string, $limit, $strip_tags = true, $strip_shortcodes = true, $break = " ", $pad = "...") {
        if ($strip_shortcodes)
            $string = strip_shortcodes($string);

        if ($strip_tags)
            $string = strip_tags($string, '<p>'); // retain the p tag for formatting


        // return with no change if string is shorter than $limit
        if (strlen($string) <= $limit)
            return $string;
        elseif ($limit === 0 || $limit == '0')
            return '';


        // is $break present between $limit and the end of the string?
        if (false !== ($breakpoint = strpos($string, $break, $limit))) {
            if ($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }
}


if (!function_exists('mo_to_boolean')) {

    /*
    * Converting string to boolean is a big one in PHP
    */

    function mo_to_boolean($value) {
        if (!isset($value))
            return false;
        if ($value == 'true' || $value == '1')
            $value = true;
        elseif ($value == 'false' || $value == '0')
            $value = false;
        return (bool)$value; // Make sure you do not touch the value if the value is not a string
    }
}


if (!function_exists('mo_display_contact_info')) {

    function mo_display_contact_info() {
        $phone_number = mo_get_theme_option('mo_phone_number', '');
        $email = mo_get_theme_option('mo_email_address', '');

        if (!empty ($phone_number) || !empty($email)) {
            $output = '<div id="contact-header">';
            $output .= '<ul>';
            if (!empty($phone_number)) {
                $output .= '<li><span class="icon-iphone"></span>' . $phone_number . '</li>';
            }
            if (!empty($email)) {
                $output .= '<li><span class="icon-email"></span>' . $email . '</li>';
            }
            $output .= '</ul>';
            $output .= '</div>';
            echo $output;
        }

    }
}

if (!function_exists('mo_get_chosen_page_section_ids')) {

    function mo_get_chosen_page_section_ids($postId) {

        $page_section_ids = get_post_meta($postId, '_page_section_order_field', true);
        /* TODO: Migration code - revisit later */
        if ($page_section_ids)
            $page_section_ids = explode(',', $page_section_ids);
        else
            $page_section_ids = get_post_meta($postId, 'mo_page_section_select_for_one_page', true);

        return $page_section_ids;
    }

}

