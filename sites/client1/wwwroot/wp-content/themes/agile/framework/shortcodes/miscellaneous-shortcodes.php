<?php


function mo_service_box1_shortcode($atts, $content = null, $shortcode_name = "") {
    extract(shortcode_atts(array(
        'title' => '',
        'link_url' => '',
        'hover_image_url' => '',
        'image_url' => ''
    ), $atts));

    $output = '<div class="service-box1">';

    $output .= '<a href="' . $link_url . '" target="_self">';
    $output .= '<div class="service-img-wrap">';
    $output .= '<img  class="replacer" src="' . $hover_image_url . '" alt="' . $title . '">';
    $output .= '<img  class="hideOnHover" src="' . $image_url . '" alt="' . $title . '">';
    $output .= '</div>';
    $output .= '<h3 class="title">' . $title . '</h3>';
    $output .= $content;
    $output .= '<div class="folded-edge"></div>';
    $output .= '</a>';
    $output .= '</div>';

    return $output;
}

add_shortcode('service_box1', 'mo_service_box1_shortcode');

function mo_service_box2_shortcode($atts, $content = null, $shortcode_name = "") {
    extract(shortcode_atts(array(
        'wrapper_class' => '',
        'title' => '',
        'hover_image_url' => '',
        'separator' => null,
        'image_url' => ''
    ), $atts));

    $output = '<div class="service-box2 ' . $wrapper_class . '">';

    $output .= '<div class="service-img-wrap">';
    $output .= '<img class="replacer" src="' . $hover_image_url . '" alt="' . $title . '">';
    $output .= '<img class="hideOnHover" src="' . $image_url . '" alt="' . $title . '">';
    $output .= '</div>';
    $output .= '<h3 class="title">' . $title . '</h3>';
    if ($separator)
        $output .= '<div class="mini-separator"></div>';
    $output .= $content;
    $output .= '</div>';

    return $output;
}

add_shortcode('service_box2', 'mo_service_box2_shortcode');

/* Stats Shortcode -

Wraps an animated percentage stats list.

Usage:

[skills]

[skill_bar title="Web Design 87%" value="87"]

[skill_bar title="Logo Design 60%" value="60"]

[skill_bar title="Brand Marketing 70%" value="70"]

[/skill_bar][skill_bar title="SEO Services 67%" value="67"]

[skill_bar title="Print Collateral 40%" value="40"]

[/skills]


Parameters -

None


*/


function mo_skills($atts, $content) {
    extract(shortcode_atts(array(),
        $atts));
    return '<div class="skill-bars">' . do_shortcode($content) . '</div>';
}

add_shortcode('skills', 'mo_skills');

/* Stats Bar Shortcode -

Displays an animated percentage stats bar. The bar animates to indicate the percentage.

Usage:

[skills]

[skill_bar title="Web Design 87%" value="87"][/skill_bar]

[skill_bar title="Logo Design 60%" value="60"][/skill_bar]

[skill_bar title="Brand Marketing 70%" value="70"][/skill_bar]

[skill_bar title="SEO Services 67%" value="67"][/skill_bar]

[skill_bar title="Print Collateral 40%" value="40"][/skill_bar]

[/skills]

Parameters -

title - The title indicating the stats title.
value - The percentage value for the percentage stats to be displayed.

*/
function mo_skill_bar($atts, $content) {
    extract(shortcode_atts(array(
        'title' => 'Web Development 85%',
        'value' => '83'
    ), $atts));
    return '<div class="skill-bar"><div class="skill-title">' . $title . '</div><div class="skill-bar-content" data-perc="' . $value . '"></div></div>';
}

add_shortcode('skill_bar', 'mo_skill_bar');

function mo_animating_skills_bar($atts, $content) {
    extract(shortcode_atts(array(
        'title' => 'Web Development 85%',
        'value' => '83'
    ), $atts));
    return '<div class="skill-bar"><div class="skill-title">' . $title . '</div><div class="skill-bar-content" data-perc="' . $value . '"></div></div>';
}

add_shortcode('animating_skills_bar', 'mo_animating_skills_bar');

function mo_animate_numbers($atts, $content) {
    extract(shortcode_atts(array(),
        $atts));
    return '<div class="animate-numbers">' . do_shortcode($content) . '</div>';
}

add_shortcode('animate-numbers', 'mo_animate_numbers');

/* Animating numbers shortcode -

Displays a number to indicate a statistic. The element animates from a start value to display the end number when the user scrolls to the stats section.

Usage:

[animate-numbers]

[animate-number icon="icon-lab4" title="Pixels Pushed" start_value="87"]26492[/animate-number]

[animate-number icon="icon-java" title="Coffees Consumed" start_value="60"]613[/animate-number]

[animate-number icon="icon-heart11" title="Wide-Grip Pushups" start_value="70"]1277[/animate-number]

[animate-number icon="icon-clock10" title="Hours Worked" start_value="67"]458[/animate-number]

[/animate-numbers]


Parameters -

title - The title indicating the stats title.
start_value - The starting value for the animation which displays a counter that animates to the end value specified as the content of the [animate-number] shortcode.
icon - The font icon to be displayed for the statistic being displayed, chosen from the list of icons listed at http://portfoliotheme.org/support/faqs/how-to-use-1500-icons-bundled-with-the-agile-theme/

*/

function mo_animate_number($atts, $content) {
    extract(shortcode_atts(array(
        'title' => 'Hours Burnt',
        'start_value' => '0',
        'icon' => false
    ), $atts));

    $icon_font = (!empty ($icon)) ? '<i class="' . $icon . '"></i>' : '';
    return '<div class="stats"><div class="number" data-stop="' . $content . '">' . $start_value . '</div><div class="stats-title">' . $icon_font . $title . '</div></div>';
}

add_shortcode('animate-number', 'mo_animate_number');


function mo_animate_single_number($atts, $content) {
    extract(shortcode_atts(array(
        'title' => 'Hours Burnt',
        'start_value' => '0',
        'end_value' => '0',
        'icon' => false,
        'icon_image_id' => false
    ), $atts));

    $font_icon = '';
    $image_element = '';

    if (!empty ($icon_image_id)) {
        $image_element = '<img src="' . wp_get_attachment_url($icon_image_id) . '"/>';
    }
    else if (!empty ($icon)) {
        $font_icon = '<i class="' . $icon . '"></i>';
    }

    return '<div class="stats"><div class="number" data-stop="' . $end_value . '">' . $start_value . '</div><div class="stats-title">' . $font_icon . $image_element . $title . '</div></div>';
}

add_shortcode('animate_number', 'mo_animate_single_number');

/* Piechart Shortcode -

Displays a piechart for a percentage statistic with a title in the middle of the piechart displayed.
While the piechart animates to indicate the percentage specified, a textual representation of the statistic is also displayed in the center of the piechart.

Usage:

[piechart percent=70 title="Repeat Customers"]

[piechart percent=92 title="Referral Work"]

Parameters -

title - The title indicating the stats title.
value - The percentage value for the percentage stats.


*/


function mo_piechart($atts, $content) {
    extract(shortcode_atts(array(
        'percent' => 85,
        'title' => ''
    ), $atts));

    $output = '<div class="piechart">';
    $output .= '<div class="percentage" data-percent="' . $percent . '"><span>' . $percent . '<sup>%</sup></span></div>';
    $output .= '<div class="label">' . $title . '</div>';
    $output .= '</div>';

    return $output;
}

add_shortcode('piechart', 'mo_piechart');

