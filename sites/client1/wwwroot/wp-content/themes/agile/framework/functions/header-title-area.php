<?php

add_filter('mo_header_class', 'mo_header_class');

if (!function_exists('mo_site_logo')) {
    function mo_site_logo() {
        $heading_tag = (is_home() || is_front_page()) ? 'h1' : 'div';

        $blog_name = esc_attr(get_bloginfo('name'));

        $output = '<' . $heading_tag . ' id="site-logo"><a href="' . home_url('/') . '" title="' . $blog_name . '" rel="home">';

        $use_text_logo = mo_get_theme_option('mo_use_text_logo') ? true : false;
        $logo_url = mo_get_theme_option('mo_site_logo');

        // If no logo image is specified, use text logo
        if ($use_text_logo || empty ($logo_url)) {
            $output .= '<span>' . $blog_name . '</span>';
        }
        else {
            $output .= '<img class="standard-logo" src="' . $logo_url . '" alt="' . $blog_name . '"/>';
        }

        $output .= '</a></' . $heading_tag . '>';

        echo $output;

    }
}

if (!function_exists('mo_site_description')) {

    /* TODO: Support for site description */
    function mo_site_description() {
        $display_desc = mo_get_theme_option('mo_display_site_desc') ? true : false;
        $display_desc = false; // no support for description now
        if ($display_desc) {
            echo '<div id="site-description"><span>' . bloginfo('description') . '</span></div>';
        }
    }
}

if (!function_exists('mo_populate_top_area')) {

    function mo_populate_top_area($post_id = NULL) {

        $slider_type = get_post_meta(get_the_ID(), 'mo_slider_choice', true);
        if (!empty($slider_type) && $slider_type != 'None') {
            $slider_manager = mo_get_slider_manager();
            $slider_manager->display_slider_area();
            return;
        }

        $remove_title_header = get_post_meta(get_the_ID(), 'mo_remove_title_header', true);
        if (!empty($remove_title_header))
            return;

        if (is_home() && mo_get_theme_option('mo_remove_homepage_tagline'))
            return;

        if (is_singular(array('post', 'page', 'portfolio'))) {
            $custom_heading = mo_get_custom_heading();
            if (!empty($custom_heading)) {
                echo '<header id="custom-title-area">';
                $wide_heading_layout = get_post_meta(get_queried_object_id(), 'mo_wide_heading_layout', true);
                if (empty($wide_heading_layout))
                    echo '<div class="inner">';
                else
                    echo '<div class="wide">';
                echo do_shortcode($custom_heading);
                echo '</div>';
                echo '</header> <!-- custom-title-area -->';
                return;
            }
        }

        echo '<header id="title-area" class="clearfix">';
        echo '<div class="inner">';
        mo_populate_tagline();
        echo '</div>';
        echo '</header> <!-- title-area -->';
    }


}
if (!function_exists('mo_populate_tagline')) {
    function mo_populate_tagline() {

        // Allow others to display - only if not shown, proceed to next step
        $done = apply_filters('mo_show_page_title', null);
        if ($done)
            return;

        /* Default tagline for blog */
        $tagline = mo_get_theme_option('mo_blog_tagline', __('Blog', 'mo_theme'));

        if (is_attachment()) {
            echo '<h1>' . __('Media', 'mo_theme') . '</h1>';
        }
        elseif (is_home()) {
            /* If a separate front page has been set along with this posts page, use Blog as default title, else use Site Title as default */
            if (get_option('page_on_front'))
                $default_homepage_title = __('Blog', 'mo_theme');
            else
                $default_homepage_title = get_bloginfo('name');

            $blog_page_tagline = mo_get_theme_option('mo_posts_page_tagline', $default_homepage_title);

            echo '<h2 class="tagline">' . $blog_page_tagline . '</h2>';
        }
        elseif (is_singular('post')) {
            echo '<h2 class="tagline">' . $tagline . '</h2>';
        }
        elseif (is_archive() || is_search()) {
            get_template_part('loop-meta'); // Loads the loop-meta.php template.
        }
        elseif (is_404()) {
            echo '<h1>' . __('404 Not Found', 'mo_theme') . '<h1>';
        }
        else {
            echo mo_get_entry_title(); // populate entry title for page and custom post types like portfolio type
        }
        $description = get_post_meta(get_queried_object_id(), 'mo_description', true);
        if (!empty ($description)) {
            echo '<div class="post-description">';
            echo '<p>' . $description . '</p>';
            echo '</div>';
        }
    }
}

if (!function_exists('mo_get_custom_heading')) {
    function mo_get_custom_heading() {
        $output = '';
        $custom_heading = __(get_post_meta(get_queried_object_id(), 'mo_custom_heading_content', true), 'mo_theme'); // For qtranslate
        if (!empty ($custom_heading)) {
            $output .= $custom_heading;
        }
        return $output;
    }
}

if (!function_exists('mo_header_class')) {
    function mo_header_class($header_classes) {

        return $header_classes;
    }
}

?>