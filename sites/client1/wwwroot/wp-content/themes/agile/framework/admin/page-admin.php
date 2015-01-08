<?php

/**
 * Page Admin Manager - Handle the page admin for page section custom post types
 *
 *
 * @package Agile
 */
class MO_Page_Admin {

    private static $instance;

    /**
     * Constructor method for the MO_Portfolio_Admin class.
     *

     */
    private function __construct() {

    }

    /**
     * Constructor method for the MO_Portfolio_Admin class.
     *

     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
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
     * Init method for the MO_Portfolio_Admin class.
     * Called during theme setup.
     *

     */
    function initialize() {

        add_action('add_meta_boxes', array($this, 'add_page_meta_boxes'));
        add_action('save_post', array(&$this, 'save_page'));

        // Manage columns displayed in the edit screen for the Portfolio Type - Is this required?
        // TODO - Probably useless. Think about removing. Codex does not list it either
        add_filter("manage_page_posts_columns", array($this, "change_page_columns"));

        // Provide data for the columns of page_section custom post type.
        add_action("manage_pages_custom_column", array($this, "custom_pages_columns"), 10, 2);

        //Manage column headers for columns displayed in the posts overview sceen. Different from above in the
        // sense that this applies to list instead of single custom post edit window.
        add_filter('manage_edit-page_columns', array($this, 'edit_page_columns'));

    }

    function add_page_meta_boxes() {

        add_meta_box(
            'page_section_box', __('Page Section Information', 'mo_theme'), array($this, 'render_page_section_metabox'), 'page', 'normal', 'high'
        );
    }

    function edit_page_columns($columns) {

        $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Title', 'mo_theme'),
            'page_section_order' => __('Page Sections', 'mo_theme')
        );

        $columns = array_merge($new_columns, $columns);

        return $columns;
    }

// TODO- Probably useless. Remove if so.
// Change the columns for the edit CPT screen
    function change_page_columns($columns) {
        $new_columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __('Title', 'mo_theme'),
            'page_section_order' => __('Page Sections', 'mo_theme')
        );

        $columns = array_merge($new_columns, $columns);

        return $columns;
    }

// Change only the page_section link attributes, rest like date, title etc. will take the default values
    function custom_pages_columns($column, $post_id) {
        switch ($column) {
            case "page_section_order":
                $page_section_ids = mo_get_chosen_page_section_ids($post_id);
                $page_sections = "";
                $first = true;
                if (!empty($page_section_ids)) {
                    foreach ($page_section_ids as $section_id) {
                        if (!$first)
                            $page_sections .= ",&nbsp;&nbsp;";
                        $page_sections .= get_the_title($section_id);
                        $first = false;
                    }
                }
                echo $page_sections;
                break;
        }
    }

    function render_page_section_metabox($post) {

        ?>
        <input type="hidden" name="page_noncename" id="page_sections_noncename"
               value="<?php echo wp_create_nonce('page_section_' . $post->ID); ?>"/>

        <p>Choose the page sections to display <strong>if 'Single Page Site' template is chosen for this page</strong>,
            by dragging the desired page sections from the 'Available Page Sections' and dropping into the 'Chosen Page
            Sections' box below. A page
            built with 'Single Page Site' page template will be composed of the below chosen page sections.</p>

        <input type="hidden" id="single_page_id" name="single_page_id" value="<?php echo $post->ID; ?>"/>

        <div id="order-post-type">
            <div id="available-page-sections">
                <h3><?php echo __('Available Page Sections', 'mo_theme') ?></h3>

                <p class="box-description">To choose a page section for a single page, drag it and drop it into 'Chosen
                    Page Sections' box on the right.</p>
                <ul id="sortable1" class="blocks connected-sortable">
                    <?php
                    /* Make sure you remove already chosen elements */
                    $query = array('post_type' => 'page_section', 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_status' => 'publish');
                    $this->list_page_sections($query);
                    ?>
                </ul>
            </div>
            <div id="chosen-page-sections">
                <h3><?php echo __('Chosen Page Sections', 'mo_theme') ?> <span class="spinner"></span></h3>

                <p class="box-description">You may rearrange the order of the page sections for display via drag and
                    drop.</p>
                <ul id="sortable2" class="blocks connected-sortable">
                    <?php
                    $page_section_ids = mo_get_chosen_page_section_ids($post->ID);

                    if (!empty($page_section_ids)) {
                        $query = array('post_type' => 'page_section', 'posts_per_page' => -1, 'post__in' => $page_section_ids, 'orderby' => 'post__in', 'post_status' => 'publish');
                        $this->list_page_sections($query);
                    } ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>


    <?php
    }

    function save_page($post_id) {

        if (!isset($_POST['page_noncename'])) {
            return $post_id;
        }

        // verify this came from the our screen and with proper authorization.
        if (!wp_verify_nonce($_POST['page_noncename'], 'page_section_' . $post_id)) {
            return $post_id;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;


        if (!current_user_can('edit_post', $post_id))
            return $post_id;


        $post = get_post($post_id);
        if ($post->post_type == 'page') {
            //Save the value to a custom field for the post
        }
        return $post_id;
    }

    function list_page_sections($query) {

        $page_sections = get_posts($query);

        foreach ($page_sections as $post):

            $post_id = $post->ID;
            $description = htmlspecialchars_decode(get_post_meta($post->ID, 'mo_page_section_desc', true));
            if (empty($description))
                $description = __('No description provided yet in the page section edit window.', 'mo_theme');

            ?>

            <li class="block" rel="section_<?php echo $post_id; ?>">

                <dl class="block-bar">
                    <dt class="block-handle">
                    <div class="block-title">
                        <?php echo $post->post_title; ?>
                    </div>
                        <span class="block-controls">
                            <a class="block-edit" id="edit-1" title="Edit Block"
                               href="#block-settings-1"><?php echo __('Edit Block', 'mo_theme') ?></a>
                        </span>
                    </dt>
                </dl>

                <div class="block-settings clearfix">
                    <div class="description">
                        <?php echo wpautop($description); ?>
                    </div>


                    <div class="block-control-actions clearfix">

                        <?php
                        if (current_user_can('edit_post', $post_id) && $link = esc_url(get_edit_post_link($post_id)))
                            echo '<a class="edit" href="' . $link . '" target="_blank">' . __('Edit', 'mo_theme') . '</a> | ';
                        if (current_user_can('read', $post_id) && $link = esc_url(get_post_permalink($post_id)))
                            echo '<a class="view" href="' . $link . '" target="_blank">' . __('View', 'mo_theme') . '</a> | ';
                        echo '<span class="hideable"><a href="#" class="remove">' . __('Remove', 'mo_theme') . '</a> | </span>';
                        echo '<a href="#" class="close">' . __('Close', 'mo_theme') . '</a>';
                        ?>


                    </div>
                </div>

            </li>
        <?php

        endforeach;

    }

}