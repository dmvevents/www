<?php
/**
 * Plugin Name: Livemesh Framework Social Media Widget
 * Plugin URI: http://portfoliotheme.org/
 * Description: A widget that displays the social networks information
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */

class MO_Social_Networks_Widget extends MO_Widget {

    /**
     * Widget setup.
     */
    function MO_Social_Networks_Widget() {

        parent::init();

        /* Widget settings. */
        $widget_ops = array('classname' => 'social-networks-widget', 'description' => __('A widget that displays the social network information for the website.', 'mo_theme'));

        /* Widget control settings. */
        $control_ops = array('width' => 300, 'height' => 350, 'id_base' => 'mo-social-networks-widget');

        /* Create the widget. */
        $this->WP_Widget('mo-social-networks-widget', __('Social Networks Widget', 'mo_theme'), $widget_ops, $control_ops);
    }

    /**
     * How to display the widget on the screen.
     */
    function widget($args, $instance) {
        extract($args);

        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $linkedin = $instance['linkedin'];
        $youtube = $instance['youtube'];
        $flickr = $instance['flickr'];
        $googleplus = $instance['googleplus'];
        $instagram = $instance['instagram'];
        $pinterest = $instance['pinterest'];
        $dribbble = $instance['dribbble'];
        $vimeo = $instance['vimeo'];
        $rss = $instance['rss'];

        $title = apply_filters('widget_title', $instance['title']);

        $title = $instance['title'];

        echo $before_widget;

        if (trim($title) != '')
            echo $before_title . $title . $after_title;

        $shortcode_text = '[social_list ';

        if (!empty($facebook))
            $shortcode_text .= 'facebook_url="' . $facebook . '" ';
        if (!empty($twitter))
            $shortcode_text .= 'twitter_url="' . $twitter . '" ';
        if (!empty($flickr))
            $shortcode_text .= 'flickr_url="' . $flickr . '" ';
        if (!empty($youtube))
            $shortcode_text .= 'youtube_url="' . $youtube . '" ';
        if (!empty($linkedin))
            $shortcode_text .= 'linkedin_url="' . $linkedin . '" ';
        if (!empty($googleplus))
            $shortcode_text .= 'googleplus_url="' . $googleplus . '" ';
        if (!empty($instagram))
            $shortcode_text .= 'instagram_url="' . $instagram . '" ';
        if (!empty($pinterest))
            $shortcode_text .= 'pinterest_url="' . $pinterest . '" ';
        if (!empty($dribbble))
            $shortcode_text .= 'dribbble_url="' . $dribbble . '" ';
        if (!empty($vimeo))
            $shortcode_text .= 'vimeo_url="' . $vimeo . '" ';

        if (!empty($rss))
            $shortcode_text .= 'include_rss=true';

        $shortcode_text .= ']';

        echo do_shortcode($shortcode_text);

        echo $after_widget;
    }

    /**
     * Update the widget settings.
     */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['facebook'] = $new_instance['facebook'];
        $instance['twitter'] = $new_instance['twitter'];
        $instance['linkedin'] = $new_instance['linkedin'];
        $instance['flickr'] = $new_instance['flickr'];
        $instance['youtube'] = $new_instance['youtube'];
        $instance['googleplus'] = $new_instance['googleplus'];
        $instance['instagram'] = $new_instance['instagram'];
        $instance['pinterest'] = $new_instance['pinterest'];
        $instance['dribbble'] = $new_instance['dribbble'];
        $instance['vimeo'] = $new_instance['vimeo'];

        $instance['rss'] = $new_instance['rss'];

        return $instance;
    }

    /**
     * Displays the widget settings controls on the widget panel.
     * Make use of the get_field_id() and get_field_name() function
     * when creating your form elements. This handles the confusing stuff.
     */
    function form($instance) {

        $defaults = array('title' => __('Find us online', 'mo_theme'), 'facebook' => '', 'twitter' => '', 'linkedin' => '', 'flickr' => '', 'youtube' => '', 'googleplus' => '', 'rss' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
        </p>


        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('LinkedIn URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $instance['linkedin']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('YouTube URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" value="<?php echo $instance['youtube']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" value="<?php echo $instance['flickr']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php _e('Google+ URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" value="<?php echo $instance['googleplus']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instance['instagram']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php _e('Pinterest URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" value="<?php echo $instance['pinterest']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php _e('Dribbble URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" value="<?php echo $instance['dribbble']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php _e('Vimeo URL:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" value="<?php echo $instance['vimeo']; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS Feed URL <small>(leave blank to use default RSS feed URL)</small>:', 'mo_theme'); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $instance['rss']; ?>" />
        </p>

    <?php
    }

}
?>