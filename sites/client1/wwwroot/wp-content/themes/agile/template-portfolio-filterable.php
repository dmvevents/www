<?php
/**
 * Template Name: Filterable Portfolio
 *
 * A custom page template for displaying portfolio items filtered by portfolio category
 *
 * @package Agile
 * @subpackage Template
 */
get_header();
?>

    <div id="showcase-template">

        <?php

        $column_count = intval(mo_get_theme_option('mo_portfolio_column_count', 3));

        $args = array(
            'number_of_columns' => $column_count,
            'image_size' => 'medium',
            'posts_per_page' => 50,
            'filterable' => true,
            'post_type' => 'portfolio'
        );

        mo_display_portfolio_content($args);
        ?>

    </div> <!-- #showcase-template -->

<?php

get_footer(); // Loads the footer.php template. 