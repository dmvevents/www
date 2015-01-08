<?php

if (!function_exists('mo_display_portfolio_content')) {


    function mo_display_portfolio_content($args) {
        global $mo_theme;

        $mo_theme->set_context('loop', 'portfolio'); // tells the thumbnail functions to prepare lightbox constructs for the image

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 0; // Do NOT paginate

        $query_args = array('post_type' => 'portfolio', 'posts_per_page' => $args['posts_per_page'], 'filterable' => $args['filterable'], 'paged' => $paged);

        $term = get_term_by('slug', get_query_var('term'), 'portfolio_category');

        if ($term)
            $query_args['portfolio_category'] = $term->slug;

        $args['query_args'] = $query_args;

        mo_display_portfolio_content_grid_style($args);

        $mo_theme->set_context('loop', null); //reset it
    }
}

if (!function_exists('mo_display_portfolio_content_grid_style')) {
    function mo_display_portfolio_content_grid_style($args) {

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
                        echo mo_get_portfolio_categories_filter();
                    else
                        echo mo_get_taxonomy_terms_links('portfolio', 'portfolio_category');

                    echo '<ul id="showcase-items" class="image-grid">';

                    while (have_posts()) : the_post();

                        $style = $style_class . ' showcase-item clearfix';
                        $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                        if (!empty($terms)) {
                            foreach ($terms as $term) {
                                $style .= ' term-' . $term->term_id;
                            }
                        }
                        ?>
                        <li data-id="id-<?php the_ID(); ?>" class="<?php echo $style; ?>">

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <?php $thumbnail_exists = mo_thumbnail(array('image_size' => $image_size, 'wrapper' => true, 'size' => 'full', 'taxonamy' => 'portfolio_category'));

                                mo_display_portfolio_entry_text($thumbnail_exists, $excerpt_count);
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

if (!function_exists('mo_get_filterable_portfolio_content')) {
    function mo_get_filterable_portfolio_content($args) {
        global $mo_theme;

        $output = '';

        $mo_theme->set_context('loop', 'portfolio'); // tells the thumbnail functions to prepare lightbox constructs for the image

        /* Extract the array to allow easy use of variables. */
        extract($args);

        $style_class = mo_get_column_style($number_of_columns, $no_margin);

        $output .= '<div class="hfeed">';

        $loop = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => $posts_per_page));

        if ($loop->have_posts()) :

            $filterable = mo_to_boolean($filterable);
            if ($filterable)
                $output .= mo_get_portfolio_categories_filter();

            $output .= '<ul id="showcase-items" class="image-grid">';

            while ($loop->have_posts()) : $loop->the_post();

                $style = $style_class . ' showcase-item clearfix'; // no margin or spacing between portfolio items
                $terms = get_the_terms(get_the_ID(), 'portfolio_category');
                if (!empty($terms)) {
                    foreach ($terms as $term) {
                        $style .= ' term-' . $term->term_id;
                    }
                }

                $output .= '<li data-id="id-' . get_the_ID() . '" class="' . $style . '">';

                $output .= '<article id="post-' . get_the_ID() . '" class="' . join(' ', get_post_class()) . '">';

                $output .= mo_get_thumbnail(array('image_size' => $image_size, 'wrapper' => true, 'size' => 'full', 'taxonamy' => 'portfolio_category'));

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

if (!function_exists('mo_display_portfolio_entry_text')) {
    function mo_display_portfolio_entry_text($thumbnail_exists, $excerpt_count) {

        $display_title = mo_get_theme_option('mo_show_title_in_portfolio') ? true : false;

        $display_summary = mo_get_theme_option('mo_show_details_in_portfolio') ? true : false;

        if ($display_summary || $display_title) {

            echo '<div class="entry-text-wrap' . ($thumbnail_exists ? '' : ' nothumbnail') . '">';

            echo mo_get_entry_title();

            if ($display_summary) {

                echo '<div class="entry-summary">';

                $show_excerpt = mo_get_theme_option('mo_show_content_summary_in_portfolio') ? false : true;

                if ($show_excerpt) {
                    echo mo_truncate_string(get_the_excerpt(), $excerpt_count);
                }
                else {
                    global $more;
                    $more = 0;
                    the_content(__('Read More <span class="meta-nav">&rarr;</span>', 'mo_theme'));
                }
                echo '</div> <!-- .entry-summary -->';

            }

            echo '</div> <!-- .entry-text-wrap -->';
        }


    }
}

if (!function_exists('mo_get_portfolio_categories_filter')) {
    /** Isotope filtering support for Portfolio pages * */
    function mo_get_portfolio_categories_filter() {

        $output = '';

        $portfolio_categories = get_terms('portfolio_category');

        if (!empty($portfolio_categories)) {

            $output .= '<ul id="showcase-filter">';

            //$output .= '<li class="filter-text">' . __('Portfolio Filter:', 'mo_theme') . '</li>';

            $output .= '<li class="segment-0"><a class="showcase-filter" data-value="*" href="#">' . __('All', 'mo_theme') . '</a></li>';

            $segment_count = 1;
            foreach ($portfolio_categories as $term) {

                $output .= '<li class="segment-' . $segment_count . '"><a class="" href="#" data-value=".term-' . $term->term_id . '" title="View all items filed under ' . $term->name . '">' . $term->name . '</a></li>';

                $segment_count++;
            }

            $output .= '</ul>';

        }

        return $output;
    }
}

if (!function_exists('mo_get_taxonomy_terms_links')) {

    function mo_get_taxonomy_terms_links($post_type, $taxonomy) {

        $output = '';

        $portfolio_categories = get_terms($taxonomy);

        if (!empty($portfolio_categories)) {

            $output .= '<ul id="showcase-links">';

            $archive_url = get_post_type_archive_link($post_type);

            $archive_page = is_post_type_archive($post_type);

            $output .= '<li class="portfolio-archive"><a class="showcase-filter" href="' . $archive_url . '">' . __('All', 'mo_theme') . '</a></li>';

            foreach ($portfolio_categories as $term) {

                $category_url = get_term_link($term);

                if (is_wp_error($category_url))
                    continue;

                $current = is_tax($taxonomy, $term->term_id);

                $output .= '<li class="category-archive"><a class="category-link' . ($current ? ' active' : '') . '" href="' . $category_url . '" title="View all items filed under ' . $term->name . '">' . $term->name . '</a></li>';

            }

            $output .= '</ul>';

        }

        return $output;
    }
}

if (!function_exists('mo_is_portfolio_context')) {
    /**
     * Check if this is a portfolio page
     *
     */
    function mo_is_portfolio_context() {

        global $mo_theme;

        $context = $mo_theme->get_context('loop');

        if ($context == 'portfolio')
            return true;

        return false;
    }
}

if (!function_exists('mo_is_portfolio_page')) {
    /**
     * Check if this is a portfolio page
     */
    function mo_is_portfolio_page() {

        if (is_page_template('template-portfolio.php')
            || is_page_template('template-portfolio-filterable.php')
        )
            return true;

        return false;
    }

}


?>