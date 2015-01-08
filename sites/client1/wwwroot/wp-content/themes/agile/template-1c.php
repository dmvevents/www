<?php
/**
 * Template Name: One Column No Sidebars
 *
 * A custom page template for displaying content with no sidebars within the 1140px centered grid
 *
 * @package Agile
 * @subpackage Template
 */

get_header(); ?>

    <div id="one-column-template" class="layout-1c">

        <?php get_template_part( 'page-content' ); // Loads the reusable page-content.php template. ?>

    </div> <!-- #one-column-template -->

<?php get_footer();  ?>