<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';
extract(shortcode_atts(array(
    'mo_class' => '',
    'mo_id' => '',
    'mo_bg_image' => '',
    'mo_parallax_bg' => '',
    'mo_parallax_speed' => '',
    'mo_bg_color' => '',
    'mo_color_opacity' => '',
    'mo_text_scheme' => '',
    'mo_padding' => '',
    'mo_padding_top' => '',
    'mo_padding_bottom' => '',
    'mo_row_type' => '',
    'mo_style' => ''
), $atts));

// wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script('wpb_composer_front_js');
// wp_enqueue_style('js_composer_custom_css');


$id = '';
$text_scheme = '';
$inline_style = '';
$parallax_classes = '';
$parallax_markup = '';

if (!empty($mo_id))
    $id = 'id="' . $mo_id . '"';

if (!empty ($mo_bg_image) || !empty($mo_bg_color) || !empty($mo_padding_top) || !empty($mo_padding_bottom)) {
    $inline_style = ' style="';
    $parallax_markup = '';
    $parallax_classes = '';
    if ((int)$mo_bg_image > 0 && ($image_url = wp_get_attachment_url($mo_bg_image)) !== false) {
        $inline_style .= 'background-image:url(' . $image_url . '); background-color:' . $mo_bg_color . ';';
        if ($mo_parallax_bg == 'yes') {
            $inline_style .= 'background-attachment:fixed; background-size: cover;';
            $parallax_markup = ' data-parallax-speed="' . $mo_parallax_speed . '"';
            $parallax_classes = ' parallax-background parallax-banner';
        }
    }
    elseif (!empty($mo_bg_color)) {
        $inline_style .= 'background-color:' . $mo_bg_color . ';';
    }

    if ($mo_padding == "custom") {
        if ($mo_padding_top !== '')
            $inline_style .= 'padding-top: ' . $mo_padding_top . 'px;';
        if ($mo_padding_bottom !== '')
            $inline_style .= 'padding-bottom: ' . $mo_padding_bottom . 'px;';
    }
    $inline_style .= $mo_style . '"'; // let the style override what we specify above using background shorthand
}

if ($mo_text_scheme == 'darker-overlay')
    $text_scheme = ' dark-bg';

$mo_class = $this->getExtraClass($mo_class);

$vc_inner = $this->settings('base') === 'vc_row_inner';

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row ' . ($mo_padding == "none" ? 'no-padding ' : '') . ($vc_inner ? 'vc_inner ' : '') . get_row_css_class() . $mo_class . $text_scheme . $parallax_classes, $this->settings['base'], $atts);

$output .= '<div ' . $id . $parallax_markup . ' class="' . $css_class . '"' . $inline_style . '>';

if (!$vc_inner && (empty($mo_row_type) || $mo_row_type == 'in_container')) {
    $output .= '<div class="inner">';
    $output .= wpb_js_remove_wpautop($content);
    $output .= '</div>';
}
else {
    $output .= wpb_js_remove_wpautop($content);
}
$output .= '</div>' . $this->endBlockComment('row');

echo $output;