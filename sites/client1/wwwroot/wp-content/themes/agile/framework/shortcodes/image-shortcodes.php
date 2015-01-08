<?php

/* Image Shortcode -

Displays an image with the optional attributes.

Usage: See examples at http://portfoliotheme.org/austin/image-shortcodes/

[image link="true" title="Visit Mountain Lion Page" src="http://example.com/lion.jpg" alt="Mountain Lion" align="left" image_frame="true" wrapper="true" wrapper_class="image-bordered" wrapper_style="margin-top: 20px;" width="320" height="240"]

[image link="true" title="Visit Mountain Lion Page" src="http://example.com/lion.jpg" alt="Mountain Lion" align="left" image_frame="true" wrapper="true" wrapper_class="image-bordered" size="large"]

Parameters -

link - Specify if the image should be a link.
title - The title of the link to which image points to.
class - The CSS class of the IMG element created.
src - The URL of the image. An IMG element will be created for this image and the image will be cropped and styled as per the parameters provided.
alt - The alt text for the image.
align - The alignment - left, right, center or none for the image element.
image_frame - A boolean value specifying if the image should be wrapped in a frame and this frame can be styled by the theme.
wrapper - A boolean value indicating if the a wrapper DIV element needs to be created for the image.
wrapper_class - The CSS class for any wrapper DIV element created for the image.
wrapper_style - The inline CSS styling for any wrapper DIV element created for the image.
width - Any custom width specified for the element. The original image (pointed to by the src parameter) will be cropped to this width.
height - Any custom height specified for the element. The original image (pointed to by the src parameter) will be cropped to this height.
size - Takes effect if no custom width or height is specified. Can be mini, small, medium, large, full, square. The original image (pointed to by the src parameter) is cropped to the size specified.

*/

function mo_image_shortcode($atts, $content = null, $code) {
    extract(shortcode_atts(array(
        'link' => false,
        'title' => '',
        'class' => '',
        'src' => '',
        'image_id' => '',
        'alt' => '',
        'align' => false,
        'image_frame' => false,
        'wrapper' => false,
        'wrapper_style' => '',
        'wrapper_class' => '',
        'width' => null,
        'height' => null,
        'size' => 'medium'
    ), $atts));

    $output = '';
    if ($link)
        $output .= '<a href="' . $link . '" title="' . $title . '">';

    $output .= '<img';
    $output .= ' class="thumbnail ' . $class . '"';

    if (!$align)
        $align = '';
    else
        $align = ' align' . $align;

    $wrapper_class = $wrapper_class . ' image-box';

    // If the custom width and height is not specified
    if (!isset($height) && !isset($width)) {
        $image_size = mo_get_image_size_array($size, 'medium'); // default to medium if size is invalid

        $height = $image_size['height'];
        $width = $image_size['width'];

    }
    else {
        $size = '';
    }

    $wrapper_style = $wrapper_style ? ' style="' . $wrapper_style . '"' : '';

    if (!empty($image_id))
        $src = wp_get_attachment_url($image_id);

    $image_url = aq_resize($src, $width, $height, true); //resize & crop the image if required

    $output .= ' src="' . $image_url . '"';

    if (!$alt)
        $output .= ' alt="' . $title . '"';
    else
        $output .= ' alt="' . $alt . '"';

    if (!$link)
        $output .= '>';
    else
        $output .= '></a>';

    // Image height and width for actual wp image while size attribute is for styling - to obtain appropriate css frame fitting this image
    if (mo_to_boolean($image_frame)) {
        $wrap = '<div class="' . $wrapper_class . $align . ' clearfix"' . $wrapper_style . '>';
        $wrap .= '<div class="image-area'. $size .'">';
        $wrap .= $output;
        $wrap .= '</div></div>';

        $output = $wrap;
    }
    else {
        $wrap = '<div class="' . $wrapper_class . $align . ' clearfix"' . $wrapper_style . '>';
        $wrap .= $output;
        $wrap .= '</div>';

        $output = $wrap;
    }

    return $output;
}

add_shortcode('image', 'mo_image_shortcode');