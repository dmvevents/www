<?php

/**
 * Layout Manager - Displays posts in various layout based on arguments specified.
 *
 *
 * @package Livemesh_Framework
 */

if (!class_exists('MO_LayoutManager')) {

    class MO_LayoutManager {

        protected static $instance;
        protected $theme_layout;

        /**
         * Constructor method for the MO_LayoutManager class.
         *

         */
        protected function __construct() {

        }

        /**
         * Constructor method for the MO_LayoutManager class.
         *
         */
        public static function getInstance() {
            if (!isset(self::$instance)) {
                // Check if this is at least PHP 5.3 version
                if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
                    $class = get_called_class();
                    self::$instance = new $class;
                }
                else {
                    $c = __CLASS__;
                    self::$instance = new $c;
                }
            }
            return self::$instance;
        }

        /**
         * Prevent cloning of this singleton
         *
         */
        public function __clone() {
            trigger_error('Clone is not allowed.', E_USER_ERROR);
        }

        /**
         * Init method for the MO_Slider_Manager class.
         * Called during theme setup.
         *

         */
        function initialize() {

            /** I want to take care of any custom layouts specified by the user */
            add_filter('body_class', array(&$this, 'manage_theme_styling'));

            /* I want to take care of any styles applied to content div based on 1c, 2c and 3c layouts */
            add_filter('mo_content_class', array(&$this, 'manage_content_styling'));

            /* Filter the sidebar widgets. */
            //add_filter( 'sidebars_widgets', array( &$this, 'disable_sidebars') );

        }

        /**
         * Adds the post layout class to the WordPress body class in the form of "layout-$layout".
         * Also specifies if this is boxed or stretched layout.
         */
        function manage_theme_styling($classes) {

            /* Adds the layout to array of body classes. */
            $classes[] = sanitize_html_class($this->get_theme_layout());

            $classes[] = sanitize_html_class($this->get_column_styling());

            if (mo_is_wide_page_layout())
                $classes[] = 'fluid-width-page';

            if (is_page_template('template-single-page-site.php')) {
                $classes[] = 'single-page-template';
            }

            if ($this->is_portfolio_template() || $this->is_gallery_template() || is_tax('portfolio_category') || is_tax('gallery_category')
                || is_post_type_archive(array('portfolio', 'gallery_item'))
            ) {
                $classes[] = 'showcase-template';
                $ajax_portfolio = mo_get_theme_option('mo_ajax_portfolio');
                if ($ajax_portfolio)
                    $classes[] = 'ajax-portfolio';
                $ajax_gallery = mo_get_theme_option('mo_ajax_gallery');
                if ($ajax_gallery)
                    $classes[] = 'ajax-gallery';
            }

            if ((mo_get_theme_option('mo_theme_layout') == 'Boxed'))
                $classes[] = 'boxed';

            if (is_page_template('template-blog.php'))
                $classes[] = 'archive';

            return $classes;
        }

        /**
         * Adds the required styling to the WordPress content div in the form of number
         * of grid columns that the content should take based on number of sidebars present
         */
        function manage_content_styling($classes) {

            if ($this->is_full_width_layout())
                $classes[] = 'twelvecol';

            if ($this->is_two_column_layout())
                $classes[] = 'ninecol';

            if ($this->is_left_navigation())
                $classes[] = 'last'; //since content does not need margin on right

            return $classes;
        }

        /**
         * Indicate whether it is 3 or 2 column layout for easy styling in css
         */
        function get_column_styling() {

            if ($this->is_two_column_layout())
                return 'layout-2c';

            return null;
        }

        /* Get me the theme layout and store it for future use */

        function get_theme_layout() {
            if (!isset($this->theme_layout))
                $this->theme_layout = $this->get_current_layout();
            return $this->theme_layout;
        }

        /**
         * Return the theme layout for a page or a post based on options specified by the user
         * in theme's option panel.
         */
        function get_current_layout() {

            if (isset($this->theme_layout))
                return $this->theme_layout;

            $layout = $this->theme_layout_default();

            $default_layout = '2c-l';

            if (is_home() || is_page_template('template-blog.php')) {
                $layout = $this->get_layout_option_value('mo_blog_layout', $default_layout);
            }
            elseif (is_page_template('template-portfolio.php') || is_page_template('template-portfolio-filterable.php') || is_post_type_archive('portfolio') || is_tax('portfolio_category')) {

                $default_layout = '1c';

                $layout = $this->get_layout_option_value('mo_portfolio_layout', $default_layout);

            }
            elseif (is_page_template('template-gallery.php') || is_page_template('template-gallery-filterable.php') || is_post_type_archive('gallery_item') || is_tax('gallery_category')) {

                $default_layout = '1c';

                $layout = $this->get_layout_option_value('mo_gallery_layout', $default_layout);
            }
            elseif (is_page()) {

                $layout = $this->get_page_layout($layout);
                // Check for custom page templates with specific layout requirements before moving to options
                if ($layout == $this->theme_layout_default()) {
                    // TODO - Move to searching based on keys instead of values when you move to new options framework
                    $layout = $this->get_layout_option_value('mo_page_layout', $default_layout);
                }
            }
            elseif (is_attachment() || is_singular(array('portfolio', 'page_section'))) {

                $layout = $this->theme_layout_one_column();
            }
            elseif (is_single()) {

                $layout = $this->check_for_full_width_layout($layout);

                // If no specific layout has been specified for a page/post, look for global theme option chosen by user for posts
                // layout-default is passed by calling function
                if ($layout == $this->theme_layout_default()) {

                    $layout_option = $this->get_post_layout(get_queried_object_id());
                    $layout = $this->get_layout_string($layout_option);
                    if ($layout == $this->theme_layout_default()) {
                        // TODO - Move to searching based on keys instead of values when you move to new options framework
                        $layout = $this->get_layout_option_value('mo_post_layout', $default_layout);
                    }
                }
            }
            elseif (is_archive()) {
                $layout = $this->get_layout_option_value('mo_archive_layout', $default_layout);
            }
            $this->theme_layout = $layout; // Store for future use

            return apply_filters('mo_theme_layout', $layout);
        }

        function get_layout_option_value($option_name, $default_value) {
            $global_layout_option = mo_get_theme_option($option_name, $default_value);
            return $this->get_layout_string($global_layout_option);
        }

        function get_layout_string($layout_option) {
            // Can be null if wrong value is specified for layout
            if ($layout_option)
                $layout = 'layout-' . $layout_option;
            else
                $layout = $this->theme_layout_default();
            return $layout;
        }

        function is_full_width_layout() {
            $layout = $this->get_theme_layout();
            return ($layout == $this->theme_layout_one_column());
        }

        function is_two_column_layout() {
            $layout = $this->get_theme_layout();
            return (($layout == 'layout-2c-r') || ($layout == 'layout-2c-l') || ($layout == 'layout-default'));
        }

        function is_left_navigation() {
            $layout = $this->get_theme_layout();
            return ($layout == 'layout-2c-r');
        }

        function is_right_navigation() {
            $layout = $this->get_theme_layout();
            return ($layout == 'layout-2c-l' || ($layout == 'layout-default'));
        }

        /**
         * Check if this is a full width. Useful for setting the right layout
         *

         */
        function is_full_width_page() {

            if (is_page_template('template-full-width.php')
                || $this->is_showcase_full_width_page()
                || is_page_template('template-home.php')
                || is_page_template('template-single-page-site.php')
                || is_page_template('template-archives.php')
                || is_page_template('template-sitemap.php')
                || is_page_template('template-1c.php')
            )
                return true;

            return false;
        }

        /**
         * Check if this is a portfolio/gallery full width. Useful for setting the right layout
         *
         */
        function is_showcase_full_width_page() {

            if (is_page_template('template-portfolio-home.php')
                || is_page_template('template-gallery-home.php')
            )
                return true;

            return false;
        }

        function is_portfolio_template() {
            global $wp_query;

            if (is_page()) {

                $template_name = get_post_meta($wp_query->post->ID, '_wp_page_template', true);

                if (preg_match('/^template-portfolio/', $template_name))
                    return true;
            }

            return false;
        }

        function is_gallery_template() {
            global $wp_query;

            if (is_page()) {

                $template_name = get_post_meta($wp_query->post->ID, '_wp_page_template', true);

                if (preg_match('/^template-gallery/', $template_name))
                    return true;
            }

            return false;
        }


        /**
         * Check for page templates that require special navigation
         *
         */
        function get_page_layout($layout) {
            $page_layout = null;

            /* if (!is_active_sidebar('primary-page'))
                $page_layout = '1c';*/
            if ($this->is_full_width_page())
                $page_layout = '1c';
            elseif (is_page_template('template-2c-r.php'))
                $page_layout = '2c-r';

            if (isset($page_layout))
                $layout = 'layout-' . $page_layout;

            return $layout;
        }

        /**
         * Function for deciding which pages should have a one-column layout.
         * If sidebars are not present, set one column layout. And if one column template is
         * chosen, disable sidebars.
         *
         */
        function check_for_full_width_layout($layout) {
            $one_column_layout = $this->theme_layout_one_column();
            if (!is_active_sidebar('primary-post'))
                $layout = $one_column_layout;

            return $layout;
        }

        /**
         * Get the layout code for one column layouts
         */
        function theme_layout_one_column() {
            return 'layout-1c';
        }

        /**
         * Get the layout code for one column layouts
         */
        function theme_layout_default() {
            return 'layout-default';
        }

        /**
         * Disables sidebars if viewing a one-column page. Not used currently and
         * managed through css itself.
         */
        function disable_sidebars($sidebars_widgets) {

            if ($this->is_full_width_layout()) {
                $sidebars_widgets['primary'] = false;
            }
        }

        /**
         * Get the post layout based on the given post ID.
         */
        function get_post_layout($post_id) {

            $layout = get_post_meta($post_id, 'mo_current_post_layout', true);

            return (!empty($layout) ? $layout : 'default');
        }

        function get_entry_layout_options() {
            $layout_array = array(
                array(
                    'value' => 'default',
                    'label' => 'Theme Default',
                    'src' => ''
                ),
                array(
                    'value' => '2c-l',
                    'label' => 'Two Columns - Right Sidebar',
                    'src' => ''
                ),
                array(
                    'value' => '2c-r',
                    'label' => 'Two Columns - Left Sidebar',
                    'src' => ''
                ),
                array(
                    'value' => '1c',
                    'label' => 'Full Width',
                    'src' => ''
                )
            );

            return $layout_array;
        }

        function get_theme_layout_options() {
            $layout_array = array(
                array(
                    'value' => '2c-l',
                    'label' => 'Two Columns - Right Sidebar',
                    'src' => OT_URL . '/assets/images/layout/right-sidebar.png'
                ),
                array(
                    'value' => '2c-r',
                    'label' => 'Two Columns - Left Sidebar',
                    'src' => OT_URL . '/assets/images/layout/left-sidebar.png'
                ),
                array(
                    'value' => '1c',
                    'label' => 'Full Width',
                    'src' => OT_URL . '/assets/images/layout/full-width.png'
                )
            );

            return $layout_array;
        }
    }
}

/* Avoid defining global functions here - for child theme sake */