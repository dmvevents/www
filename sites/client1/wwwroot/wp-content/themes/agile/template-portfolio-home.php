<?php
/**
 * Template Name: Portfolio Home
 *
 * A page template for home page layout featuring portfolio items.
 * @link http://www.portfoliotheme.org/
 *
 * @package Agile
 * @subpackage Template
 */

get_header(); // displays slider content if so chosen by user
?>

<div id="content" class="<?php echo mo_get_content_class(); ?>">

    <div id="showcase-full-width">

        <?php
        $args = array(
            'number_of_columns' => 3,
            'image_size' => 'medium',
            'posts_per_page' => 9,
            'filterable' => true
        );

        echo mo_get_filterable_portfolio_content($args);

        ?>

    </div>
    <!-- #showcase-full-width -->


    <?php while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content clearfix">
                <?php the_content(); ?>
            </div>
            <!-- .entry-content -->

        </article><!-- .hentry -->

    <?php endwhile; ?>

</div>
<!-- #content -->

<?php get_footer(); ?>
