<?php

add_action('wp_loaded', 'child_create_objects', 11);

function child_create_objects() {

}

$shortcodes_path = get_stylesheet_directory() . '/framework/shortcodes/';

include_once($shortcodes_path . 'contact-shortcodes.php');

?>