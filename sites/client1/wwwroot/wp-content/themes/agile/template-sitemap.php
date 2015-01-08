<?php
/**
 * Template Name: Sitemap
 *
 * A custom page template for displaying sitemap
 *
 * @package Agile
 * @subpackage Template
 */


get_header();
?>
<div id="sitemap-template" class="layout-1c">

    <?php mo_exec_action('before_content'); ?>

    <div id="content" class="<?php echo mo_get_content_class();?>">

        <?php mo_exec_action('start_content'); ?>

        <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content clearfix">

                <?php the_content(); ?>

                <?php mo_sitemap_template(); ?>

            </div>
            <!-- .entry-content -->

        </article><!-- .hentry -->

        <?php endwhile; ?>

        <?php mo_exec_action('end_content'); ?>

    </div>
    <!-- #content -->

    <?php mo_exec_action('after_content'); ?>

</div> <!-- #sitemap-template -->

<?php

get_footer(); // Loads the footer.php template. 
