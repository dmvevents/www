<?php

/**
 * The custom code that can be used to enhance the theme. Also, you can override existing functionality to provide your own functionality using WP filters.
 * Very handy for customization without touching the theme code.
 * You may want to backup and retain this file when updating the theme to retain customizations.
 *
 *
 * @package Agile
 * @subpackage Functions
 */


$prefix = mo_get_prefix();
// add_action("{$prefix}_start_header", 'mo_display_button', 9);


function mo_display_button() {

	$itunes_url = 'http://itunes.apple.com/';
        $google_play_url = 'http://play.google.com/';

        echo '<div class="app-download-buttons">';
        echo '<a class="play-button" href="'. $google_play_url . '"><img src="http://portfoliotheme.org/appdev/wp-content/uploads/2013/07/btn-googleplay.png" alt="btn-googleplay" width="192" height="63" class="alignleft size-full" /></a>';
        echo '<a class="itunes-button" href="'. $itunes_url . '"><img src="http://portfoliotheme.org/appdev/wp-content/uploads/2013/07/btn-appstore.png" alt="btn-appstore" width="192" height="63" class="alignnleft size-full" /></a>';
        echo '</div>';

}


?>