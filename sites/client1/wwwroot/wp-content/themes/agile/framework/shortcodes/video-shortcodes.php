<?php

function mo_ytp_video_header_shortcode($atts, $content = null, $shortcode_name = "") {

    extract(shortcode_atts(
        array(
            'id' => 'video-intro',
            'class' => '',
            'video_url' => '',
            'mute' => 'true',
            'show_controls' => 'false',
            'containment' => 'self',
            'quality' => 'highres',
            'optimize_display' => 'true',
            'loop' => 'true',
            'autoplay' => 'true',
            'vol' => '50',
            'ratio' => '16/9',
            'start_at' => '0',
            'opacity' => '1',
            'placeholder_url' => '',
            'placeholder_image_id' => '',
            'title' => '',
            'text' => '',
            'button_text' => '',
            'button_url' => '',
            'overlay_color' => '',
            'overlay_opacity' => '0.7',
            'overlay_pattern' => '',
            'overlay_pattern_id' => ''),
        $atts));

    $output = '';
    if (!empty($video_url)) {

        ob_start(); // Gather output
        ?>


        <div id="<?php echo $id; ?>"
             class="<?php echo str_replace("_", "-", $shortcode_name) . ($class ? ' ' . $class : ''); ?>">

            <div class="video-header">

                <div class="header-content">

                    <?php echo empty($title) ? '' : '<h3>' . $title . '</h3>'; ?>

                    <?php echo empty($text) ? '' : '<div class="text">' . $text . '</div>'; ?>

                    <?php echo empty($button_text) ? '' : '<a href="' . $button_url . '" class="button transparent"><span>' . $button_text . '</span></a>'; ?>


                    <?php if (!mo_to_boolean($autoplay)): ?>

                        <a class="play-btn" onclick="jQuery('#video').playYTP()"><i class="icon-play"></i></a>

                    <?php endif; ?>

                </div>

                <div class="media">
                    <div class="video-bg">

                        <?php echo '<div id="ytp-video" class="ytp-player" data-property="{' . 'videoURL:\'' . $video_url . '\',' . 'mute:' . $mute . ',' . 'loop:' . $loop . ',' . 'vol:' . $vol . ',' . 'ratio:' . $ratio . ',' . 'optimizeDisplay:' . $optimize_display . ',' . 'opacity:' . $opacity . ',' . 'autoplay:' . $autoplay . ',' . 'quality:\'' . $quality . '\',' . 'showControls:' . $show_controls . ',' . 'containment:\'' . $containment . '\'}"></div>'; ?>

                    </div>

                    <?php
                    if (!empty($placeholder_image_id))
                        $placeholder_url = wp_get_attachment_url($placeholder_image_id);
                    if (!empty($overlay_pattern_id))
                        $overlay_pattern = wp_get_attachment_url($overlay_pattern_id);
                    ?>

                    <div class="img-bg">
                        <img alt="Video Poster" class="video-placeholder"
                             src="<?php echo esc_url($placeholder_url); ?>"/>
                    </div>

                    <?php

                    if (!empty($overlay_color) || !empty($overlay_pattern)) :

                        $hex = $overlay_color;
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

                        $bg_color = empty($overlay_color) ? "" : "background-color: rgba(" . "$r, $g, $b, $overlay_opacity);";
                        $bg_pattern = empty($overlay_pattern) ? "" : "background-image:url(" . $overlay_pattern . ");";

                        ?>

                        <div class="overlay" style="<?php echo ($bg_color) . ($bg_pattern); ?>"></div>

                    <?php

                    endif;

                    ?>
                </div>

                <div class="video-controls">
                    <button class="small-play-btn" onclick="jQuery('#ytp-video').playYTP()"><i class="icon-play"></i>
                    </button>
                    <button class="small-pause-btn" onclick="jQuery('#ytp-video').pauseYTP()"><i class="icon-pause"></i>
                    </button>
                    <button class="small-mute-btn" onclick="jQuery('#ytp-video').toggleVolume()"><i
                            class="icon-volumemute2"></i></button>
                </div>

            </div>

        </div>
        <?php
        // Save output
        $output = ob_get_contents();
        ob_end_clean();
    }
    return $output;
}

/* YouTube Video Showcase Shortcode -

Displays an YouTube video with controls for play/pause/mute and a title, text and button displayed on top of the video. Useful for showcasing a video on top of the page.

Usage:

[ytp_video_showcase
id="video-intro"
video_url="http://www.youtube.com/watch?v=PzjwAAskt4o"
containment="self"
placeholder_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/03/video-placeholder.jpg"
title="Awesomeness"
button_text="Contact Us »"
button_url="http://example.com/contact-us"
text="All the tools you need to build a top notch website. Comes with outstanding support."
overlay_color="#0F0A09"
overlay_opacity="0.4"
loop="true"]

Parameters -

id (string) - The id of the DIV element created to wrap the YouTube video (optional). Default is video-intro.
class (string) - The CSS class of the DIV element created to wrap the YouTube video (optional).
video_url (link) - The YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).
mute - false (boolean). A boolean value indicating if the video needs to be started muted. Default is false. The user can mute the video if required with the help of mute/unmute button.
show_controls - false (boolean). Show or hide the controls bar at the bottom of the page.
containment - self (string). The CSS selector of the DOM element where you want the video background; if not specified it takes the “body”; if set to “self” the player will be instanced on that element.
quality- highres (string). Values are ‘default’ or “small”, “medium”, “large”, “hd720”, “hd1080”, “highres”.
optimize_display: true (boolean). Will fit the video size into the window size optimizing the view.
loop: true. true (boolean) or false loops the movie once ended.
startAt: 0 (number). Set the seconds the video should start at.
opacity: 1 (number). 0 to 1 - define the opacity of the video.
vol: 50 (number). 1 to 100 - set the volume level of the video. Default is 50.
ratio: 16/9 (string). ‘4/3’ or “16/9”  to set the aspect ratio of the movie.
autoplay: true (boolean). Specify true or false play the video once ready.
placeholder_url (link)- URL of the placeholder image to be displayed instead of YouTube video in mobile devices.
overlay_color - The color of the overlay to be applied on the video.
overlay_opacity - 0.7 (number). 0 to 1 - The opacity of the overlay color.
overlay_pattern (link)- The URL of the image which can act as a pattern displayed on top of the video.
title (string) -  The title text displayed on top of the video.
text (string) - The text displayed below the title on top of the video.
button_text (string)- The title for the button displayed on top of the video.
button_url (link) - The URL pointed to by the button displayed on top of the video.
*/

add_shortcode('ytp_video_showcase', 'mo_ytp_video_header_shortcode');

/* YouTube Video Section Shortcode -

Displays a section with YouTube video background. Controls for play/pause/mute are provided to the bottom right.

The video is auto-played by default and the title text and button is displayed all the time when required parameters for the titles/buttons are provided.

Usage:

[ytp_video_section
id="video-intro"
video_url="http://www.youtube.com/watch?v=RdIh8GiVR9I"
containment="self"
placeholder_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/03/ytp-video-placeholder.jpg"
text="All the tools you need to build a top notch website. "
button_text="Contact Us »"
button_url="http://example.com/contact-us"
overlay_pattern="http://portfoliotheme.org/austin/wp-content/themes/austin/dev/images/styleswitcher/patterns/pattern-3.gif"
overlay_color="#31110F"
overlay_opacity="0.3"]

Parameters -

id (string) - The id of the DIV element created to wrap the YouTube video (optional). Default is video-intro.
class (string) - The CSS class of the DIV element created to wrap the YouTube video (optional).
video_url (link) - The YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).
mute - true (boolean). A boolean value indicating if the video needs to be started muted. Default is true. The user can unmute the video if required with the help of mute/unmute button.
show_controls - false (boolean). Show or hide the controls bar at the bottom of the page.
containment - self (string). The CSS selector of the DOM element where you want the video background; if not specified it takes the “body”; if set to “self” the player will be instanced on that element.
quality- highres (string). Values are ‘default’ or “small”, “medium”, “large”, “hd720”, “hd1080”, “highres”.
optimize_display: true (boolean). Will fit the video size into the window size optimizing the view.
loop: true. true (boolean) or false loops the movie once ended.
startAt: 0 (number). Set the seconds the video should start at.
opacity: 1 (number). 0 to 1 - define the opacity of the video.
vol: 50 (number). 1 to 100 - set the volume level of the video. Default is 50.
ratio: 16/9 (string). ‘4/3’ or “16/9”  to set the aspect ratio of the movie.
autoplay: true (boolean). Specify true or false play the video once ready.
placeholder_url (link)- URL of the placeholder image to be displayed instead of YouTube video in mobile devices.
overlay_color - The color of the overlay to be applied on the video.
overlay_opacity - 0.7 (number). 0 to 1 - The opacity of the overlay color.
overlay_pattern (link)- The URL of the image which can act as a pattern displayed on top of the video.
text (string) - The text displayed on top of the video.
button_text (string) - Text of the button shown to the user on top of the video.
button_url (link) - The URL to which the button needs to point to.
*/
add_shortcode('ytp_video_section', 'mo_ytp_video_header_shortcode');

function mo_video_header_shortcode($atts, $content = null, $shortcode_name = "") {

    extract(shortcode_atts(
        array(
            'id' => '',
            'class' => '',
            'video_id' => 'video-bg1',
            'mp4_url' => '',
            'ogg_url' => '',
            'webm_url' => '',
            'autoplay' => 'true',
            'loop' => 'true',
            'muted' => 'true',
            'preload' => 'auto',
            'placeholder_url' => '',
            'placeholder_image_id' => '',
            'title' => '',
            'text' => '',
            'button_text' => '',
            'button_url' => '',
            'overlay_color' => '',
            'overlay_opacity' => '0.7',
            'overlay_pattern' => '',
            'overlay_pattern_id' => ''),
        $atts));

    $output = '';
    if (!empty($mp4_url) || !empty($ogg_url) || !empty($webm_url)) {

        $muted = mo_to_boolean($muted);
        $loop = mo_to_boolean($loop);
        $autoplay = mo_to_boolean($autoplay);

        ob_start(); // Gather output
        ?>
        <div id="<?php echo $id; ?>"
             class="<?php echo str_replace("_", "-", $shortcode_name) . ($class ? ' ' . $class : ''); ?>">

            <div class="video-header">

                <div class="header-content">

                    <?php echo empty($title) ? '' : '<h3>' . $title . '</h3>'; ?>

                    <?php echo empty($text) ? '' : '<div class="text">' . $text . '</div>'; ?>

                    <?php echo empty($button_text) ? '' : '<a href="' . $button_url . '" class="button transparent"><span>' . $button_text . '</span></a>'; ?>

                </div>

                <div class="media">
                    <div class="video-bg">
                        <video id=<?php echo $video_id; ?>
                               poster="<?php echo esc_url($placeholder_url); ?>"
                               preload="<?php echo $preload; ?>"
                            <?php echo $autoplay ? 'autoplay' : ''; ?> <?php echo $loop ? 'loop' : ''; ?> <?php echo $muted ? 'muted' : ''; ?>>
                            <source src="<?php echo esc_url($mp4_url); ?>" type="video/mp4">
                            <source src="<?php echo esc_url($ogg_url); ?>" type="video/ogg">
                            <source src="<?php echo esc_url($webm_url); ?>" type="video/webm">
                        </video>
                    </div>

                    <?php
                    if (!empty($placeholder_image_id))
                        $placeholder_url = wp_get_attachment_url($placeholder_image_id);
                    if (!empty($overlay_pattern_id))
                        $overlay_pattern = wp_get_attachment_url($overlay_pattern_id);
                    ?>

                    <div class="img-bg">
                        <img alt="Video Poster" class="video-placeholder"
                             src="<?php echo esc_url($placeholder_url); ?>"/>
                    </div>
                    <?php

                    if (!empty($overlay_color) || !empty($overlay_pattern)) :

                        $hex = $overlay_color;
                        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

                        $bg_color = empty($overlay_color) ? "" : "background-color: rgba(" . "$r, $g, $b, $overlay_opacity);";
                        $bg_pattern = empty($overlay_pattern) ? "" : "background-image:url(" . $overlay_pattern . ");";

                        ?>

                        <div class="overlay" style="<?php echo ($bg_color) . ($bg_pattern); ?>"></div>

                    <?php

                    endif;

                    ?>
                </div>

            </div>

        </div>
        <?php
        // Save output
        $output = ob_get_contents();
        ob_end_clean();
    }
    return $output;
}
/* HTML5 Video Showcase Shortcode -

Displays an HTML5 video with controls for play/pause/mute. The video is not auto-played by default and waits for the user input via the play button.

Displays title headers when the video is paused/stopped or when the video is yet to start.

Usage:

[video_showcase
id="video-intro"
class="video-heading"
mp4_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/04/office.mp4"
ogg_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/04/office.ogv"
webm_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/04/office.webm"
placeholder_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/04/about-video-placeholder.jpg"
title="Developers and Designers"
text="All the tools you need to build a top notch website. "
button_text="Contact Us »"
button_url="http://example.com/contact-us"
overlay_pattern="http://portfoliotheme.org/austin/wp-content/themes/austin/dev/images/styleswitcher/patterns/pattern-3.gif"
overlay_color="#31110F"
overlay_opacity="0.3"
loop=true]

Parameters -

id (string) - The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.
class (string) - The CSS class of the DIV element created to wrap the HTML5 video (optional). Default is video-heading.
video_id - video1 (string) - The id of the VIDEO element.
mp4_url (link) - The URL of the video uploaded in MP4 format.
ogg_url (link) - The URL of the video uploaded in OGG format.
webm_url (link) - The URL of the video uploaded in WEBM format.
muted - false (boolean). A boolean value indicating if the video needs to be started muted. Default is false. The user can unmute the video if required with the help of mute/unmute button.
loop: true (boolean). Specify true or false to whether loop the movie once ended.
placeholder_url (link)- URL of the placeholder image to be displayed instead of HTML5 video in mobile devices.
overlay_color - The color of the overlay to be applied on the video.
overlay_opacity - 0.7 (number). 0 to 1 - The opacity of the overlay color.
overlay_pattern (link)- The URL of the image which can act as a pattern displayed on top of the video.
title (string) -  The title text displayed on top of the video .
text (string) - The text displayed on top of the video, below the title .
*/
add_shortcode('video_showcase', 'mo_video_header_shortcode');
/* HTML5 Video Section Shortcode -

Displays a section with HTML5 video background. Controls for play/pause/mute are provided to the bottom right.

The video is auto-played by default and the title text, subtitle and button is displayed all the time when required parameters for the titles/buttons are provided.

Usage:

[video_section
id="html5-video-bg1"
mp4_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/02/snow.mp4"
ogg_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/02/snow.ogv"
webm_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/02/snow.webm"
placeholder_url="http://portfoliotheme.org/austin/wp-content/uploads/2014/02/snow.jpg"
text="All the tools you need to build a top notch website. "
button_text="Contact Us »"
button_url="http://example.com/contact-us"
overlay_pattern="http://portfoliotheme.org/austin/wp-content/themes/austin/dev/images/styleswitcher/patterns/pattern-3.gif"
overlay_color="#31110F"
overlay_opacity="0.3"]

Parameters -

id (string) - The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.
class (string) - The CSS class of the DIV element created to wrap the HTML5 video (optional).
video_id - video-bg1 (string) - The id of the VIDEO element.
mp4_url (link) - The URL of the video uploaded in MP4 format.
ogg_url (link) - The URL of the video uploaded in OGG format.
webm_url (link) - The URL of the video uploaded in WEBM format.
muted - true (boolean). A boolean value indicating if the video needs to be started muted. Default is true. The user can unmute the video if required with the help of mute/unmute button.
loop: true (boolean). Specify true or false to whether loop the movie once ended.
placeholder_url (link)- URL of the placeholder image to be displayed instead of HTML5 video in mobile devices.
overlay_color - The color of the overlay to be applied on the video.
overlay_opacity - 0.7 (number). 0 to 1 - The opacity of the overlay color.
overlay_pattern (link)- The URL of the image which can act as a pattern displayed on top of the video.
text (string) - The text displayed on top of the video .
button_text (string) - Text of the button shown to the user on top of the video.
button_url (link) - The URL to which the button needs to point to.
*/
add_shortcode('video_section', 'mo_video_header_shortcode');
/* HTML5 Audio Shortcode -

Displays a HTML5 audio clip with controls.

Usage:

[html5_audio ogg_url="http://mydomain.com/song.ogg" mp3_url="http://mydomain.com/song.mp3" ]

Parameters -

ogg_url - The URL of the audio clip uploaded in OGG format.
mp3_url - The URL of the audio clip uploaded in MP3 format.

*/
function mo_html5_audio_shortcode($atts, $content = null, $code = "") {

    extract(shortcode_atts(array('mp3_url' => '', 'ogg_url' => ''), $atts));


    if (!empty($mp3_url) || !empty($ogg_url)) {
        return <<<HTML
<div class="video-box">
<audio controls="controls">
  <source src="{$ogg_url}" type="audio/ogg" />
  <source src="{$mp3_url}" type="audio/mp3" />
  Your browser does not support the HTML5 audio. Do upgrade. 
</audio>
</div>
HTML;
    }
}

add_shortcode('html5_audio', 'mo_html5_audio_shortcode');

function mo_youtube_video_shortcode($atts, $content = null, $code = "") {

    extract(shortcode_atts(array('clip_id' => '', 'height' => false, 'width' => false, 'hd' => false, 'align' => 'center', 'style' => '', 'parent_selector' => '#content'), $atts));

    $output = '';

    if ($height && !$width)
        $width = intval($height * 16 / 9);
    if (!$height && $width)
        $height = intval($width * 9 / 16);

    if (!$height && !$width) {

        $height = mo_get_theme_option('mo_youtube_height', 480);
        $width = mo_get_theme_option('mo_youtube_width', 640);
    }

    if (!empty($style))
        $style = ' style="' . $style . '"';

    if (!empty($clip_id))
        $output = '<div class="video-box' . ' align' . $align . '"' . $style . '><iframe title="YouTube video player" parent-selector=' . $parent_selector . ' width="' . $width . '" height="' . $height . '" src="http://www.youtube.com/embed/' . $clip_id . '?rel=0&amp;' . ($hd ? '?hd=1' : '') . '" frameborder="0" allowfullscreen></iframe></div>';

    return $output;
}

add_shortcode('youtube_video', 'mo_youtube_video_shortcode');

function mo_vimeo_video_shortcode($atts, $content = null, $code = "") {

    extract(shortcode_atts(array('clip_id' => '', 'height' => false, 'width' => false, 'hd' => false, 'align' => 'center', 'style' => '', 'parent_selector' => '#content'), $atts));

    if ($height && !$width)
        $width = intval($height * 16 / 9);
    if (!$height && $width)
        $height = intval($width * 9 / 16);

    if (!$height && !$width) {

        $height = mo_get_theme_option('mo_vimeo_height', 225);
        $width = mo_get_theme_option('mo_vimeo_width', 400);
    }

    if (!empty($style))
        $style = ' style="' . $style . '"';

    if (!empty($clip_id))
        $out = '<div class="video-box' . ' align' . $align . '"' . $style . '><iframe parent-selector=' . $parent_selector . ' width="' . $width . '" height="' . $height . '" src="http://player.vimeo.com/video/' . $clip_id . '?byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen allowFullScreen></iframe></div>';

    return $out;
}

add_shortcode('vimeo_video', 'mo_vimeo_video_shortcode');


function mo_dailymotion_video_shortcode($atts, $content = null, $code = "") {
    global $mo_theme;

    extract(shortcode_atts(array('clip_id' => '', 'height' => false, 'width' => false, 'theme' => 'none'), $atts));

    if ($height && !$width)
        $width = intval($height * 16 / 9);
    if (!$height && $width)
        $height = intval($width * 9 / 16);

    if (!$height && !$width) {

        $height = mo_get_theme_option('mo_dailymotion_height', 360);
        $width = mo_get_theme_option('mo_dailymotion_width', 480);
    }

    if (!empty($clip_id))
        $out = '<div class="video-box"><iframe width="' . $width . '" height="' . $height . '" src="http://www.dailymotion.com/video/' . $clip_id . '" frameborder="0"></iframe></div>';

    return $out;

}

add_shortcode('dailymotion_video', 'mo_dailymotion_video_shortcode');

function mo_flash_video_shortcode($atts, $content = null, $code = "") {
    extract(shortcode_atts(array('video_url' => '', 'width' => false, 'height' => false, 'play' => false), $atts));

    if ($height && !$width)
        $width = intval($height * 16 / 9);
    if (!$height && $width)
        $height = intval($width * 9 / 16);

    if (!$height && !$width) {
        $height = mo_get_theme_option('mo_flash_height', 360);
        $width = mo_get_theme_option('mo_flash_width', 480);
    }

    $play_video = $play ? 'true' : 'false';

    if (!empty($video_url)) {
        return <<<HTML
<div class="video-box">
<object width="{$width}" height="{$height}">
    <param name="movie" value="{$video_url}" />
    <param name="quality" value="high">
    <param name="allowFullScreen" value="true" />
    <param name="allowscriptaccess" value="always" />
    <param name="play" value="{$play_video}"/>
    <param name="wmode" value="transparent" />
    <embed type="application/x-shockwave-flash" src="{$video_url}" pluginspage="http://get.adobe.com/flashplayer/" width="{$width}" height="{$height}" wmode="direct" allowfullscreen="true" allowscriptaccess="always"></embed>
</object>
</div>
HTML;
    }
}

add_shortcode('flash_video', 'mo_flash_video_shortcode');



?>