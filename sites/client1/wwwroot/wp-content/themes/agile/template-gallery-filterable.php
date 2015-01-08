<?php
/**
 * Template Name: Filterable Gallery
 *
 * A custom page template for displaying gallery items filterable by gallery categories
 *
 * @package Agile
 * @subpackage Template
 */
get_header();
?>

    <div id="showcase-template">

        <?php

        $column_count = intval(mo_get_theme_option('mo_gallery_column_count', 3));

        $args = array(
            'number_of_columns' => $column_count,
            'image_size' => 'medium',
            'posts_per_page' => 50,
            'filterable' => true,
            'post_type' => 'gallery_item'
        );

        mo_display_gallery_content($args);
        ?>

    </div> <!-- #showcase-template -->

<?php

get_footer(); // Loads the footer.php template.