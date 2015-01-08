<?php
/* Responsive Slider Shortcode -

Use this shortcode to create a slider out of any HTML content. All it requires a UL element with children to show.

Usage:

[responsive_slider type="testimonials2" animation="slide" control_nav="true" direction_nav=false pause_on_hover="true" slideshow_speed=4500]

<ul>
	<li>Slide 1 content goes here.</li>
	<li>Slide 2 content goes here.</li>
	<li>Slide 3 content goes here.</li>
</ul>

[/responsive_slider]


Parameters -

type (string) - Constructs and sets a unique CSS class for the slider. (optional).
slideshow_speed - 5000 (number). Set the speed of the slideshow cycling, in milliseconds
animation_speed - 600 (number). Set the speed of animations, in milliseconds.
animation - fade (string). Select your animation type, "fade" or "slide".
pause_on_action - true (boolean). Pause the slideshow when interacting with control elements, highly recommended.
pause_on_hover - true (boolean). Pause the slideshow when hovering over slider, then resume when no longer hovering.
direction_nav - true (boolean). Create navigation for previous/next navigation? (true/false)
control_nav - true (boolean). Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.
easing - swing (string). Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
loop - true (boolean). Should the animation loop?
slideshow - true (boolean). Animate slider automatically without user intervention.
controls_container - (string). Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be ".flexslider-container". Property is ignored if given element is not found.
manualControls - (string). Selector: Declare custom control navigation. Examples would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
style - (string) - The inline CSS applied to the slider container DIV element.
*/

function mo_responsive_slider_shortcode($atts, $content = null) {
    extract(shortcode_atts(
        array('type' => 'flex',
            'slideshow_speed' => 5000,
            'animation_speed' => 600,
            'animation' => 'fade',
            'pause_on_action' => 'false',
            'pause_on_hover' => 'true',
            'direction_nav' => 'true',
            'control_nav' => 'true',
            'easing' => 'swing',
            'loop' => 'true',
            'slideshow' => 'true',
            'controls_container' => false,
            'manual_controls' => false,
            'style' => ''),
        $atts));

    $output = '';

    $slider_container = $type . '-slider-container';

    if (empty($controls_container))
        $controls_container = $slider_container;
    $namespace = 'flex';

    $output .= '<script type="text/javascript">' . "\n";
    $output .= 'jQuery(document).ready(function($) {';
    $output .= 'jQuery(\'.' . $slider_container . ' .flexslider\'). flexslider({';
    $output .= 'animation: "' . $animation . '",';
    $output .= 'slideshowSpeed: ' . $slideshow_speed . ',';
    $output .= 'animationSpeed: ' . $animation_speed . ',';
    $output .= 'namespace: "' . $namespace . '-",';
    $output .= 'pauseOnAction:' . $pause_on_action . ',';
    $output .= 'pauseOnHover: ' . $pause_on_hover . ',';
    $output .= 'controlNav: ' . $control_nav . ',';
    $output .= 'directionNav: ' . $direction_nav . ',';
    $output .= 'prevText: ' . '"Previous' . '<span></span>",';
    $output .= 'nextText: ' . '"Next' . '<span></span>",';
    $output .= 'smoothHeight: false,';
    $output .= 'animationLoop: ' . $loop . ',';
    $output .= 'slideshow: ' . $slideshow . ',';
    $output .= 'easing: "' . $easing . '",';
    if (!empty($manual_controls))
        $output .= 'manualControls: "' . $manual_controls . '",';
    $output .= 'controlsContainer: "' . $controls_container . '"';
    $output .= '})';
    $output .= '});' . "\n";
    $output .= '</script>' . "\n";

    if (!empty($style))
        $style = ' style="' . $style . '"';

    $output .= '<div class="' . $slider_container . ($type == "flex" ? ' loading' : '') . '"' . $style . '>';

    $output .= '<div class="flexslider">';

    $styled_list = '<ul class="slides">';

    $slider_content = do_shortcode($content);

    $output .= str_replace('<ul>', $styled_list, $slider_content);

    $output .= '</div><!-- flexslider -->';
    $output .= '</div><!-- ' . $slider_container . ' -->';

    return $output;
}

add_shortcode('responsive_slider', 'mo_responsive_slider_shortcode');

/*

Responsive Carousel Shortcode -

Use this shortcode to create a carousel out of any HTML content. All it requires is a set of DIV elements to show. Each of the DIV element is an item in the carousel.

Usage:

[post_snippets_carousel id="blog-carousel" post_type="post" navigation="true" items=3 post_count=6 image_size='medium' excerpt_count=85 display_title=true show_meta=true display_summary=true show_excerpt="true" hide_thumbnail="false" navigation="true" pagination="false"]

[post_snippets_carousel id="trainer-carousel" post_type="trainer" navigation="true" items=4 post_count=6 image_size='square' excerpt_count=100 display_title=true show_meta=true display_summary=true show_excerpt="true" hide_thumbnail="false" navigation="true" pagination="false"]

Parameters -

id (string) - The element id to be set for the wrapper element created (optional)..
pagination_speed - 800 (number). Pagination speed in milliseconds
slide_speed - 200 (number). Slide speed in milliseconds.
rewind_speed - 1000 (number). Rewind speed in milliseconds.
stop_on_hover - true (boolean). Stop autoplay on mouse hover.
auto_play - false (boolean/number) - Change to any integrer for example autoPlay : 5000 to play every 5 seconds. If you set autoPlay: true default speed will be 5 seconds.
scroll_per_page - false (boolean) - Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.
navigation - false (boolean) - Display "next" and "prev" buttons.
pagination - true (boolean) - Show pagination.
items - 5 (number) - This variable allows you to set the maximum amount of items displayed at a time with the widest browser width
items_desktop - (number) This variable allows you to set the maximum amount of items displayed at a time with the desktop browser width (<1200px)
items_desktop_small - (number) - This variable allows you to set the maximum amount of items displayed at a time with the smaller desktop browser width(<980px).
items_tablet - (number) - This variable allows you to set the maximum amount of items displayed at a time with the tablet browser width(<769px).
items_tablet_small  - (number) - This variable allows you to set the maximum amount of items displayed at a time with the smaller tablet browser width
items_mobile  - (number) - This variable allows you to set the maximum amount of items displayed at a time with the smartphone mobile browser width(<480px).
post_type - (string) The custom post type whose posts need to be displayed. Examples include post, gallery_item, trainer, feature, class etc.
post_count - 4 (number) - Number of posts to display
image_size - medium (string) - Can be mini, small, medium, large, full, square.
layout_class - (string) The CSS class to be set for the wrapper div for the carousel. Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.
display_title - false (boolean) - Specify if the title of the post or custom post type needs to be displayed below the featured image
display_summary - false (boolean) - Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.
show_excerpt - true (boolean) - Display excerpt for the post/custom post type. Has no effect if display_summary is set to false. If show_excerpt is set to false and display_summary is set to true, the content of the post is displayed truncated by the WordPress tag. If more tag is not specified, the entire post content is displayed.
excerpt_count - 100 (number) - Applicable only to excerpts. The excerpt displayed is truncated to the number of characters specified with this parameter.
hide_thumbnail false (boolean) - Display thumbnail image or hide the same.
show_meta - false (boolean) Display meta information like the author, date of publishing and number of comments.
excerpt_count - 100 (number) The total number of characters of excerpt to display.
taxonomy - (string) Custom taxonomy to be used for filtering the posts/custom post types displayed.
terms - (string) The terms of taxonomy specified.
no_margin - false (boolean) - If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.

*/

function mo_post_snippets_carousel($atts, $content = null) {
    $args = shortcode_atts(
        array(
            'id' => '',
            'pagination_speed' => 800,
            'slide_speed' => 200,
            'rewind_speed' => 1000,
            'stop_on_hover' => 'true',
            'auto_play' => 'false',
            'scroll_per_page' => 'true',
            'navigation' => 'false',
            'pagination' => 'true',
            'items' => 3,
            'items_desktop' => 3,
            'items_desktop_small' => 2,
            'items_tablet' => 2,
            'items_tablet_small' => 1,
            'items_mobile' => 1,
            'post_type' => null,
            'post_count' => 6,
            'layout_class' => 'post-snippets',
            'display_title' => false,
            'display_summary' => false,
            'show_excerpt' => true,
            'excerpt_count' => 100,
            'show_meta' => false,
            'hide_thumbnail' => false,
            'image_size' => 'medium',
            'terms' => '',
            'taxonomy' => ''
        ),
        $atts);

    extract($args);

    $output = '';

    $controls_container = 'carousel-container';

    if (!empty($id)) {
        $selector = '#' . $id;
        $id = 'id ="' . $id . '"';
    }
    else {
        $selector = '.' . $controls_container;
    }

    $output .= '<script type="text/javascript">' . "\n";
    $output .= 'jQuery(document).ready(function($) {';
    $output .= 'jQuery(\'' . $selector . ' .slides\').owlCarousel({';
    $output .= 'navigation: ' . $navigation . ',';
    $output .= 'navigationText: ["<i class=\"icon-uniF489\"></i>","<i class=\"icon-uniF488\"></i>"],';
    $output .= 'scrollPerPage: ' . $scroll_per_page . ',';

    $output .= 'items: ' . $items . ',';
    if (!empty($items_desktop))
        $output .= 'itemsDesktop: [1199,' . $items_desktop . '],';
    if (!empty($items_desktop_small))
        $output .= 'itemsDesktopSmall: [979,' . $items_desktop_small . '],';
    if (!empty($items_tablet))
        $output .= 'itemsTablet: [768,' . $items_tablet . '],';
    if (!empty($items_tablet_small))
        $output .= 'itemsTabletSmall: [640,' . $items_tablet_small . '],';
    if (!empty($items_mobile))
        $output .= 'itemsMobile: [479,' . $items_mobile . '],';

    $output .= 'autoPlay: ' . $auto_play . ',';
    $output .= 'stopOnHover: ' . $stop_on_hover . ',';
    $output .= 'pagination: ' . $pagination . ',';
    $output .= 'rewindSpeed: ' . $rewind_speed . ',';
    $output .= 'slideSpeed: ' . $slide_speed . ',';
    $output .= 'paginationSpeed: "' . $pagination_speed . '"';
    $output .= '})';
    $output .= '});' . "\n";
    $output .= '</script>' . "\n";

    $output .= '<div class="carousel-wrap">';

    $output .= '<div ' . $id . ' class="' . $controls_container . '">';

    $output .= '<div class="slides image-grid ' . $layout_class . ' owl-carousel">';

    $output .= mo_get_post_snippets_list($args);

    $output .= '</div>';

    $output .= '</div><!-- ' . $controls_container . ' -->';

    $output .= '</div><!-- carousel-wrap -->';

    return $output;
}

add_shortcode('post_snippets_carousel', 'mo_post_snippets_carousel');

/*

Responsive Carousel Shortcode -

Use this shortcode to create a carousel out of any HTML content. All it requires is a set of DIV elements to show. Each of the DIV element is an item in the carousel.

Usage:

[responsive_carousel id="stats-carousel" navigation="false" pagination="true" items=3 items_tablet=2 items_tablet_small=1 items_desktop_small=3 items_desktop=3]

[wrap]Slide 1 content goes here.[/wrap]

[wrap]Slide 2 content goes here.[/wrap]

[wrap]Slide 3 content goes here.[/wrap]

[/responsive_carousel]


Parameters -

id (string) - The element id to be set for the wrapper element created (optional)..
pagination_speed - 800 (number). Pagination speed in milliseconds
slide_speed - 200 (number). Slide speed in milliseconds.
rewind_speed - 1000 (number). Rewind speed in milliseconds.
stop_on_hover - true (boolean). Stop autoplay on mouse hover.
auto_play - false (boolean/number) - Change to any integrer for example autoPlay : 5000 to play every 5 seconds. If you set autoPlay: true default speed will be 5 seconds.
scroll_per_page - false (boolean) - Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.
navigation - false (boolean) - Display "next" and "prev" buttons.
pagination - true (boolean) - Show pagination.
items - 5 (number) - This variable allows you to set the maximum amount of items displayed at a time with the widest browser width
items_desktop - (number) This variable allows you to set the maximum amount of items displayed at a time with the desktop browser width (<1200px)
items_desktop_small - (number) - This variable allows you to set the maximum amount of items displayed at a time with the smaller desktop browser width(<980px).
items_tablet - (number) - This variable allows you to set the maximum amount of items displayed at a time with the tablet browser width(<769px).
items_tablet_small  - (number) - This variable allows you to set the maximum amount of items displayed at a time with the smaller tablet browser width
items_mobile  - (number) - This variable allows you to set the maximum amount of items displayed at a time with the smartphone mobile browser width(<480px).
layout_class - (string) The CSS class to be set for the wrapper div for the carousel. Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.

*/

function mo_responsive_carousel($atts, $content = null) {
    $args = shortcode_atts(
        array(
            'id' => '',
            'pagination_speed' => 800,
            'slide_speed' => 200,
            'rewind_speed' => 1000,
            'stop_on_hover' => 'true',
            'auto_play' => 'false',
            'scroll_per_page' => 'false',
            'navigation' => 'false',
            'pagination' => 'true',
            'items' => 5,
            'items_desktop' => false,
            'items_desktop_small' => false,
            'items_tablet' => false,
            'items_tablet_small' => false,
            'items_mobile' => false,
            'layout_class' => 'image-grid',
        ),
        $atts);

    extract($args);

    $output = '';

    $controls_container = 'carousel-container';

    if (!empty($id)) {
        $selector = '#' . $id;
        $id = 'id ="' . $id . '"';
    }
    else {
        $selector = '.' . $controls_container;
    }

    $output .= '<script type="text/javascript">' . "\n";
    $output .= 'jQuery(document).ready(function($) {';
    $output .= 'jQuery(\'' . $selector . ' .slides\').owlCarousel({';
    $output .= 'navigation: ' . $navigation . ',';
    $output .= 'navigationText: ["<i class=\"icon-uniF489\"></i>","<i class=\"icon-uniF488\"></i>"],';
    $output .= 'scrollPerPage: ' . $scroll_per_page . ',';

    $output .= 'items: ' . $items . ',';
    if (!empty($items_desktop))
        $output .= 'itemsDesktop: [1199,' . $items_desktop . '],';
    if (!empty($items_desktop_small))
        $output .= 'itemsDesktopSmall: [979,' . $items_desktop_small . '],';
    if (!empty($items_tablet))
        $output .= 'itemsTablet: [768,' . $items_tablet . '],';
    if (!empty($items_tablet_small))
        $output .= 'itemsTabletSmall: [640,' . $items_tablet_small . '],';
    if (!empty($items_mobile))
        $output .= 'itemsMobile: [479,' . $items_mobile . '],';

    $output .= 'autoPlay: ' . $auto_play . ',';
    $output .= 'stopOnHover: ' . $stop_on_hover . ',';
    $output .= 'pagination: ' . $pagination . ',';
    $output .= 'rewindSpeed: ' . $rewind_speed . ',';
    $output .= 'slideSpeed: ' . $slide_speed . ',';
    $output .= 'paginationSpeed: "' . $pagination_speed . '"';
    $output .= '})';
    $output .= '});' . "\n";
    $output .= '</script>' . "\n";

    $output .= '<div class="carousel-wrap">';

    $output .= '<div ' . $id . ' class="' . $controls_container . '">';

    $output .= '<div class="slides ' . $layout_class . ' owl-carousel">';

    $output .= mo_remove_wpautop($content);

    $output .= '</div><!-- .slides -->';

    $output .= '</div><!-- ' . $controls_container . ' -->';

    $output .= '</div><!-- carousel-wrap -->';

    return $output;
}

add_shortcode('responsive_carousel', 'mo_responsive_carousel');

/* Device Slider Shortcode -

Use this shortcode to create a image slider part of a container that looks like a browser, smartphone, tablet or a desktop. Possible sliders are

[device_slider], [browser_slider], [imac_slider], [macbook_slider], [ipad_slider], [iphone_slider], [galaxys4_slider], [htcone_slider].

The image URLs are provided via a comma separated list of URLs pointing to the images.

Usage:

[browser_slider
animation="slide"
browser_url="http://portfoliotheme.org/extinct"
direction_nav=true
control_nav=false
slideshow_speed=4000
animation_speed=600
pause_on_action=true
pause_on_hover=true
easing="swing"
style="margin-bottom:20px;"
image_urls="http://portfoliotheme.org/austin/wp-content/uploads/2014/03/web-slide3.jpg,http://portfoliotheme.org/austin/wp-content/uploads/2014/03/web-slide1.jpg,http://portfoliotheme.org/austin/wp-content/uploads/2014/03/web-slide2.jpg,http://portfoliotheme.org/austin/wp-content/uploads/2014/03/web-slide4.jpg"]


Parameters -


style - (string) - The inline CSS applied to the slider container DIV element.
device - iphone (string) - The device type - valid values are iphone, galaxys4, htcone, ipad, imac, macbook, browser.
slideshow_speed - 5000 (number). Set the speed of the slideshow cycling, in milliseconds
animation_speed - 600 (number). Set the speed of animations, in milliseconds.
animation - fade (string). Select your animation type, "fade" or "slide".
pause_on_action - true (boolean). Pause the slideshow when interacting with control elements, highly recommended.
pause_on_hover - true (boolean). Pause the slideshow when hovering over slider, then resume when no longer hovering.
direction_nav - true (boolean). Create navigation for previous/next navigation? (true/false)
control_nav - true (boolean). Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.
easing - swing (string). Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
loop - true (boolean). Should the animation loop?
image_urls (string) - Comma separated list of URLs pointing to the images.
browser_url (string) - If the device specified is browser or if [browser_slider], this provides the URL to be displayed in the address bar of the browser.
*/


function mo_device_slider_shortcode($atts) {
    extract(shortcode_atts(
        array('slideshow_speed' => 5000,
            'device' => 'iphone', /* valid values - iphone, galaxys4, htcone, ipad */
            'animation_speed' => 600,
            'animation' => 'fade',
            'pause_on_action' => 'false',
            'pause_on_hover' => 'true',
            'direction_nav' => 'true',
            'control_nav' => 'true',
            'easing' => 'swing',
            'loop' => 'true',
            'style' => '',
            'image_urls' => '',
            'image_ids' => '',
            'browser_url' => ''),
        $atts));

    $output = '';

    // Check if one or more image URLs are specified, if none specified - no point continuing
    if (!empty($image_ids)) {
        $image_urls = array();
        $image_ids = explode(',', $image_ids);
        foreach ($image_ids as $image_id) {
            $image_urls[] = wp_get_attachment_url($image_id);
        }
    }
    elseif (!empty($image_urls)) {
        $image_urls = explode(',', $image_urls);
    }
    else {
        return $output;
    }


    if (!empty($style))
        $style = ' style="' . $style . '"';

    $output .= '<div class="'. $device .'-slider-container smartphone-slider"' . $style . '>';

    if ($device === 'browser' && !empty($browser_url))
        $output .= '<div class="address-bar">' . $browser_url . '</div>';

    $output .= '<img src="' . get_template_directory_uri(). '/images/sliders/'. $device .'-slider-stage.png" alt="'. $device .' Slider"/>';

    /* Start: Construct the slider */
    $slider = '[responsive_slider ';
    $slider .= 'direction_nav=' . $direction_nav . ' ';
    $slider .= 'control_nav=' . $control_nav . ' ';
    $slider .= 'animation=' . $animation . ' ';
    $slider .= 'type=flex ';
    $slider .= 'slideshow_speed=' . $slideshow_speed . ' ';
    $slider .= 'animation_speed=' . $animation_speed . ' ';
    $slider .= 'pause_on_action=' . $pause_on_action . ' ';
    $slider .= 'pause_on_hover=' . $pause_on_hover . ' ';
    $slider .= 'loop=' . $loop . ' ';
    $slider .= 'easing=' . $easing . ' ';
    $slider .= ']';
    $slider .= '<ul>';

    foreach ($image_urls as $image_url) {
        $slider .= '<li><div class="img-wrap"><img alt="App Slide" src="';
        $slider .= $image_url;
        $slider .= '"></div></li>';
    }
    $slider .= '</ul>';
    $slider .= '[/responsive_slider]';
    /* END: Construct the slider */

    $output .= do_shortcode($slider);
    $output .= '</div>';

    return $output;
}

function mo_galaxys4_slider_shortcode($atts) {
    $atts = array_merge(array('device' => 'galaxys4'), $atts);
    return mo_device_slider_shortcode($atts);
}

function mo_htcone_slider_shortcode($atts) {
    $atts = array_merge(array('device' => 'htcone'), $atts);
    return mo_device_slider_shortcode($atts);
}


function mo_ipad_slider_shortcode($atts) {
    $atts = array_merge(array('device' => 'ipad'), $atts);
    return mo_device_slider_shortcode($atts);
}

function mo_macbook_slider_shortcode($atts) {
    $atts = array_merge(array('device' => 'macbook'), $atts);
    return mo_device_slider_shortcode($atts);
}

function mo_imac_slider_shortcode($atts) {
    $atts = array_merge(array('device' => 'imac'), $atts);
    return mo_device_slider_shortcode($atts);
}

function mo_browser_slider_shortcode($atts) {
    $atts = array_merge(array('device' => 'browser'), $atts);
    return mo_device_slider_shortcode($atts);
}

add_shortcode('iphone_slider', 'mo_device_slider_shortcode');

add_shortcode('galaxys4_slider', 'mo_galaxys4_slider_shortcode');

add_shortcode('htcone_slider', 'mo_htcone_slider_shortcode');

add_shortcode('ipad_slider', 'mo_ipad_slider_shortcode');

add_shortcode('macbook_slider', 'mo_macbook_slider_shortcode');

add_shortcode('imac_slider', 'mo_imac_slider_shortcode');

add_shortcode('browser_slider', 'mo_browser_slider_shortcode');

add_shortcode('smartphone_slider', 'mo_device_slider_shortcode');

add_shortcode('device_slider', 'mo_device_slider_shortcode');
