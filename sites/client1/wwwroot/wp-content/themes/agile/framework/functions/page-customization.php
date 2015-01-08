<?php

if (!function_exists('mo_get_theme_skin')) {
    /**
     * @return string
     */
    function mo_get_theme_skin() {
        $theme_skin = null;
        if (isset($_GET['skin']))
            $theme_skin = $_GET['skin'];
        if (empty($theme_skin)) {
            $theme_skin = mo_get_theme_option('mo_skin_color', '#fe5000');
        }
        $skin_color = strtolower($theme_skin);
        return $skin_color;
    }
}



if (!function_exists('mo_browser_supports_css3_animations')) {
    function mo_browser_supports_css3_animations() {
        //check for ie7-9
        if (preg_match('/MSIE\s([\d.]+)/', $_SERVER['HTTP_USER_AGENT'], $matches)) {
            return false;
        }

        //Disable animations in Safari for now - some problems reported but not reproducible
        /* global $is_safari;
        if ($is_safari)
            return false;*/

        //Disable all animations for mobile devices
        if (mo_is_mobile()) {
            return false;
        }

        return true;
    }
}

if (!function_exists('mo_is_mobile')) {

    function mo_is_mobile() {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        if (strstr($user_agent, 'iPhone') || strstr($user_agent, 'iPod') || strstr($user_agent, 'iPad') || strstr($user_agent, 'Android') || strstr($user_agent, 'IEMobile') || strstr($user_agent, 'blackberry'))
            return true;
        return false;
    }
}

function mo_browser_plus_device_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    if ($is_lynx)
        $classes[] = 'lynx';
    elseif ($is_gecko)
        $classes[] = 'gecko';
    elseif ($is_opera)
        $classes[] = 'opera';
    elseif ($is_NS4)
        $classes[] = 'ns4';
    elseif ($is_safari)
        $classes[] = 'safari';
    elseif ($is_chrome)
        $classes[] = 'chrome';
    elseif ($is_IE) {
        $classes[] = 'ie';
        if (preg_match('/MSIE ( [0-9]+ )( [a-zA-Z0-9.]+ )/', $_SERVER['HTTP_USER_AGENT'], $browser_version))
            $classes[] = 'ie' . $browser_version[1];
    }
    else $classes[] = 'unknown';

    $isiPad = strpos($_SERVER['HTTP_USER_AGENT'], 'iPad');
    $isiPhone = strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone');
    $isAndroid = strpos($_SERVER['HTTP_USER_AGENT'], 'Android');
    $isMobile = strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile');
    $isKindle = strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle');
    $isSilk = strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/');
    $isBlackberry = strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry');
    $isOperaMini = strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini');
    $isOperaMobile = strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi');
    $isWindowsPhone = strpos($_SERVER['HTTP_USER_AGENT'], 'IEMobile');

    if ($isiPhone)
        $classes[] = 'iphone';
    elseif ($isiPad)
        $classes[] = 'ipad';
    elseif ($isAndroid)
        $classes[] = 'android';
    elseif ($isKindle || $isSilk)
        $classes[] = 'kindle';
    elseif ($isBlackberry)
        $classes[] = 'blackberry';
    elseif ($isWindowsPhone)
        $classes[] = 'windowsphone';
    elseif ($isiPad || $isiPhone)
        $classes[] = 'ios-device';

    if ($isiPad || $isiPhone || $isAndroid || $isMobile || $isKindle || $isSilk || $isBlackberry || $isOperaMini || $isOperaMobile || $isWindowsPhone)
        $classes[] = 'mobile-device';

    return $classes;
}

if (!function_exists('mo_get_cached_value')) {
    function mo_get_cached_value($key) {
        global $theme_cache;

        if (array_key_exists($key, $theme_cache))
            return $theme_cache[$key];

        return null;
    }
}

if (!function_exists('mo_set_cached_value')) {

    function mo_set_cached_value($key, $value) {
        global $theme_cache;

        $theme_cache[$key] = $value;
        return $value;
    }
}

if (!function_exists('mo_get_theme_option')) {

    function mo_get_theme_option($option_id, $default = null, $single = true) {
        global $mo_theme;
        global $options_cache;

        if (array_key_exists($option_id, $options_cache))
            return $options_cache[$option_id];

        $option_value = $mo_theme->get_theme_option($option_id, $default, $single);
        $options_cache[$option_id] = $option_value; //store in cache for further use
        return $option_value;
    }
}

if (!function_exists('mo_is_wide_page_layout')) {

    function mo_is_wide_page_layout() {
        return (mo_is_home_page_layout() || is_page_template('template-full-width.php') || is_singular('page_section'));
    }
}

if (!function_exists('mo_is_home_page_layout')) {

    function mo_is_home_page_layout() {
        return (is_page_template('template-home.php') || is_page_template('template-single-page-site.php'));
    }
}

if (!function_exists('mo_get_entry_layout_options')) {

    function mo_get_entry_layout_options() {
        $layout_manager = mo_get_layout_manager();
        $layout_options = $layout_manager->get_entry_layout_options();

        return $layout_options;
    }
}

if (!function_exists('mo_get_theme_layout_options')) {

    function mo_get_theme_layout_options() {
        $layout_manager = mo_get_layout_manager();
        $layout_options = $layout_manager->get_theme_layout_options();

        return $layout_options;
    }
}

if (!function_exists('mo_display_sidebar')) {
    function mo_display_sidebar($sidebar_id, $style_class = '') {
        $sidebar_manager = mo_get_sidebar_manager();
        $sidebar_manager->display_sidebar($sidebar_id, $style_class);
    }
}

if (!function_exists('mo_display_sidebars')) {
    function mo_display_sidebars() {
        $sidebar_manager = mo_get_sidebar_manager();
        $sidebar_manager->populate_sidebars();
    }
}