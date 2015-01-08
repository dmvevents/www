<?php

if (!function_exists('mo_display_gallery_content')) {


    function mo_display_gallery_content($args) {
        global $mo_theme;

        $mo_theme->set_context('loop', 'gallery_item'); // tells the thumbnail functions to prepare lightbox constructs for the image

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 0; // Do NOT paginate

        $query_args = array('post_type' => 'gallery_item', 'posts_per_page' => $args['posts_per_page'], 'filterable' => $args['filterable'], 'paged' => $paged);

        $term = get_term_by('slug', get_query_var('term'), 'gallery_category');

        if ($term)
            $query_args['gallery_category'] = $term->slug;

        $args['query_args'] = $query_args;

        mo_display_gallery_content_grid_style($args);

        $mo_theme->set_context('loop', null); //reset it
    }
}

if (!function_exists('mo_display_gallery_content_grid_style')) {
    function mo_display_gallery_content_grid_style($args) {

        /* Set the default arguments. */
        $defaults = array(
            'number_of_columns' => 4,
            'image_size' => 'medium',
            'query_args' => null,
            'excerpt_count' => 160
        );

        /* Merge the input arguments and the defaults. */
        $args = wp_parse_args($args, $defaults);

        /* Extract the array to allow easy use of variables. */
        extract($args);

        $style_class = mo_get_column_style($number_of_columns);

        mo_exec_action('before_content');
        ?>

        <div id="content" class="<?php echo mo_get_content_class(); ?>">

            <?php mo_exec_action('start_content'); ?>

            <div class="hfeed">

                <?php
                mo_show_page_content();

                if (isset($query_args) && !empty($query_args))
                    query_posts($query_args);

                if (have_posts()) :

                    if ($filterable)
                        echo mo_get_gallery_categories_filter();
                    else
                        echo mo_get_taxonomy_terms_links('gallery_item', 'gallery_category');

                    echo '<ul id="showcase-items" class="image-grid">';

                    while (have_posts()) : the_post();

                        $style = $style_class . ' showcase-item clearfix';
                        $terms = get_the_terms(get_the_ID(), 'gallery_category');
                        if (!empty($terms)) {
                            foreach ($terms as $term) {
                                $style .= ' term-' . $term->term_id;
                            }
                        }
                        ?>
                        <li data-id="id-<?php the_ID(); ?>" class="<?php echo $style; ?>">

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <?php $thumbnail_exists = mo_thumbnail(array('image_size' => $image_size, 'wrapper' => true, 'size' => 'full', 'taxonamy' => 'gallery_category'));

                                ?>

                            </article>
                            <!-- .hentry -->

                        </li> <!--Isotope element -->


                    <?php endwhile; ?>

                    </ul> <!-- Isotope items -->

                <?php else : ?>

                    <?php get_template_part('loop-error'); // Loads the loop-error.php template.                  ?>

                <?php endif; ?>

            </div>
            <!-- .hfeed -->

            <?php mo_exec_action('end_content'); ?>


            <?php
            /* No need to load the loop-nav.php template if filterable is true since all posts get displayed. */
            if (!$filterable)
                echo get_template_part('loop-nav');
            ?>

        </div><!-- #content -->

        <?php mo_exec_action('after_content'); ?>

        <?php wp_reset_query(); /* Right placement to help not lose context information */ ?>

    <?php
    }
}

if (!function_exists('mo_get_filterable_gallery_content')) {
    function mo_get_filterable_gallery_content($args) {
        global $mo_theme;

        $output = '';

        $mo_theme->set_context('loop', 'gallery_item'); // tells the thumbnail functions to prepare lightbox constructs for the image

        /* Extract the array to allow easy use of variables. */
        extract($args);

        $style_class = mo_get_column_style($number_of_columns, $no_margin);

        $output .= '<div class="hfeed">';

        $loop = new WP_Query(array('post_type' => 'gallery_item', 'posts_per_page' => $posts_per_page));

        if ($loop->have_posts()) :

            $filterable = mo_to_boolean($filterable);
            if ($filterable)
                $output .= mo_get_gallery_categories_filter();

            $output .= '<ul id="showcase-items" class="image-grid">';

            while ($loop->have_posts()) : $loop->the_post();

                $style = $style_class . ' showcase-item clearfix'; // no margin or spacing between gallery items
                $terms = get_the_terms(get_the_ID(), 'gallery_category');
                if (!empty($terms)) {
                    foreach ($terms as $term) {
                        $style .= ' term-' . $term->term_id;
                    }
                }

                $output .= '<li data-id="id-' . get_the_ID() . '" class="' . $style . '">';

                $output .= '<article id="post-' . get_the_ID() . '" class="' . join(' ', get_post_class()) . '">';

                $output .= mo_get_thumbnail(array('image_size' => $image_size, 'wrapper' => true, 'size' => 'full', 'taxonamy' => 'gallery_category'));

                $output .= '</article><!-- .hentry -->';

                $output .= '</li> <!--isotope element -->';

            endwhile;

            $output .= '</ul> <!-- Isotope items -->';

        else :
            get_template_part('loop-error'); // Loads the loop-error.php template.
        endif;

        $output .= '</div> <!-- .hfeed -->';

        wp_reset_postdata();

        $mo_theme->set_context('loop', null); //reset it

        return $output;
    }
}

if (!function_exists('mo_display_gallery_entry_text')) {
    function mo_display_gallery_entry_text($thumbnail_exists, $excerpt_count) {

        $display_title = mo_get_theme_option('mo_show_title_in_gallery') ? true : false;

        $display_summary = mo_get_theme_option('mo_show_details_in_gallery') ? true : false;

        if ($display_summary || $display_title) {

            echo '<div class="entry-text-wrap' . ($thumbnail_exists ? '' : ' nothumbnail') . '">';

            echo mo_get_entry_title();

            if ($display_summary) {

                echo '<div class="entry-summary">';

                if ($show_excerpt) {
                    echo mo_truncate_string(get_the_excerpt(), $excerpt_count);
                }

                echo '</div> <!-- .entry-summary -->';

            }

            echo '</div> <!-- .entry-text-wrap -->';
        }


    }
}

if (!function_exists('mo_get_gallery_categories_filter')) {
    /** Isotope filtering support for Gallery pages * */
    function mo_get_gallery_categories_filter() {

        $output = '';

        $gallery_categories = get_terms('gallery_category');

        if (!empty($gallery_categories)) {

            $output .= '<ul id="showcase-filter">';

            //$output .= '<li class="filter-text">' . __('Gallery Filter:', 'mo_theme') . '</li>';

            $output .= '<li class="segment-0"><a class="showcase-filter" data-value="*" href="#">' . __('All', 'mo_theme') . '</a></li>';

            $segment_count = 1;
            foreach ($gallery_categories as $term) {

                $output .= '<li class="segment-' . $segment_count . '"><a class="" href="#" data-value=".term-' . $term->term_id . '" title="View all items filed under ' . $term->name . '">' . $term->name . '</a></li>';

                $segment_count++;
            }

            $output .= '</ul>';

        }

        return $output;
    }
}


if (!function_exists('mo_is_gallery_page')) {
    /**
     * Check if this is a gallery page
     */
    function mo_is_gallery_page() {

        if (is_page_template('template-gallery.php')
            || is_page_template('template-gallery-filterable.php')
        )
            return true;

        return false;
    }

}

if (!function_exists('mo_is_gallery_context')) {
    /**
     * Check if this is a gallery context
     *
     */
    function mo_is_gallery_context() {

        global $mo_theme;

        $context = $mo_theme->get_context('loop');

        if ($context == 'gallery_item')
            return true;

        return false;
    }
}


?>