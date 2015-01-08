<?php
/**
 * Livemesh Shortcodes Class
 *
 * @package Livemesh
 */

class LivemeshShortcodes {

    function __construct() 
    {
    	define('LIVEMESH_TINYMCE_URI', get_template_directory_uri() . '/framework/admin/shortcodes/tinymce');
		define('LIVEMESH_TINYMCE_DIR', get_template_directory() . '/framework/admin/shortcodes/tinymce');
		
        add_action( 'init', array( &$this, 'init' ) );
        add_action( 'admin_enqueue_scripts', array( &$this, 'admin_menu_styles' ) );
        add_filter( 'mce_external_languages', array( &$this, 'add_tinymce_lang' ), 10, 1 );
        add_action( 'wp_ajax_livemesh_popup', array( &$this, 'shortcode_popup_callback') );
	}

    public function admin_menu_styles( $hook ) {
        if( $hook == 'post.php' || $hook == 'post-new.php' ) {

            wp_enqueue_style( 'livemesh_admin_menu_styles', LIVEMESH_TINYMCE_URI . '/css/popup.css' );
            wp_enqueue_style( 'livemesh_admin_menu_font_styles', LIVEMESH_TINYMCE_URI . '/css/font-awesome.css', '', '4.0.3' );

            wp_enqueue_script( 'jquery-ui-sortable' );
            wp_enqueue_script( 'shortcode-plugins-lib', LIVEMESH_TINYMCE_URI . '/js/shortcodes.plugins.lib.js', false, '1.0', false );

            wp_localize_script( 'jquery', 'LivemeshShortcodes', array(
                'tinymce_folder'           => LIVEMESH_TINYMCE_URI,
                'media_frame_video_title' => __( 'Upload or Choose Your Custom Video File', 'livemesh' ),
                'media_frame_image_title' => __( 'Upload or Choose Your Custom Image File', 'livemesh' )
            ) );
        }
    }

    public function init() {
        if( ( current_user_can('edit_posts') || current_user_can('edit_pages') ) && get_user_option('rich_editing') ){
            add_filter( 'mce_external_plugins', array( &$this, 'add_rich_plugins' ) );
            add_filter( 'mce_buttons', array( &$this, 'register_rich_buttons' ) );
        }
    }


    public function add_tinymce_lang( $arr ) {
        $arr['livemeshShortcodes'] = LIVEMESH_TINYMCE_DIR . '/langs/wp-langs.php';
        return $arr;
    }

    public function add_rich_plugins( $plugin_array ) {
        global $tinymce_version;

        if( version_compare( $tinymce_version , '400', '<' ) ) {
            $plugin_array['livemeshShortcodes'] = LIVEMESH_TINYMCE_URI . '/editor_plugin.js';
        } else {
            $plugin_array['livemeshShortcodes'] = LIVEMESH_TINYMCE_URI . '/plugin.js';
        }

        return $plugin_array;
    }

    public function register_rich_buttons( $buttons ) {
        array_push( $buttons, 'livemeshShortcodes' );
        return $buttons;
    }

    public function shortcode_popup_callback(){
        require_once( LIVEMESH_TINYMCE_DIR. '/shortcodes-class.php' );
        $shortcode = new livemesh_shortcodes( $_REQUEST['popup'] );

        ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head></head>
        <body>

        <div id="livemesh-popup">

            <div id="livemesh-sc-wrap">

                <div id="livemesh-sc-form-wrap">
                    <h2 id="livemesh-sc-form-head"><?php echo $shortcode->popup_title; ?></h2>
                    <span id="close-popup"></span>
                </div><!-- /#livemesh-sc-form-wrap -->

                <form method="post" id="livemesh-sc-form">

                    <table id="livemesh-sc-form-table">

                        <?php echo $shortcode->output; ?>

                        <tbody>
                        <tr class="form-row">
                            <?php if( ! $shortcode->has_child ) : ?><td class="label">&nbsp;</td><?php endif; ?>
                            <!-- <td class="field insert-field"> -->

                            <!-- </td> -->
                        </tr>
                        </tbody>

                    </table><!-- /#livemesh-sc-form-table -->

                    <div class="insert-field">
                        <a href="#" class="button button-primary button-large livemesh-insert"><?php _e('Insert Shortcode', 'livemesh'); ?></a>
                    </div>

                </form><!-- /#livemesh-sc-form -->

            </div><!-- /#livemesh-sc-wrap -->

            <div class="clear"></div>

        </div><!-- /#popup -->

        </body>
        </html>
        <?php

        die();
    }
    
}

$livemesh_shortcodes = new LivemeshShortcodes();

?>