<?php

/* Testimonial Slider Shortcode -

Displays a slider of testimonials. These testimonials are entered by creating Testimonial custom post types in the Testimonials tab of the WordPress Admin.
Usage:

[responsive_slider type="testimonials2" animation="slide" control_nav="true" direction_nav=false pause_on_hover="true" slideshow_speed=4500]

[testimonials post_count=4 testimonial_ids="234,235,236"]

[/responsive_slider]

and

[responsive_slider type="testimonials2" animation="slide" control_nav="true" direction_nav=false pause_on_hover="true" slideshow_speed=4500]

[testimonials2 post_count=4 testimonial_ids="234,235,236"]

[/responsive_slider]

The testimonial shortcode need to be wrapped inside [responsive_slider] shortcode to enable slider function. By default, the [testimonials] and [testimonials2] shortcode
displays a unordered list (UL element) of testimonial elements which can be styled differently if a slider is not desired. Separating out the slider part also helps control
the slider properties like animation speed, slider controls, pause on hover etc. as explained in the documentation for [responsive_slider] shortcode.

Parameters -

post_count - The number of testimonials to be displayed. By default displays all of the custom posts entered as testimonial in the Testimonials tab of the WordPress Admin (optional).
testimonial_ids - A comma separated post ids of the Testimonial custom post types created in the Testimonials tab of the WordPress Admin. Helps to filter the testimonials for display (optional).

*/

if (!function_exists('mo_testimonials_shortcode')) {
    function mo_testimonials_shortcode($atts, $content = null, $code) {
        extract(shortcode_atts(array(
            'post_count' => '-1',
            'testimonial_ids' => '',
        ), $atts));

        $query_args = array(
            'posts_per_page' => (int)$post_count,
            'post_type' => 'testimonials',
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'no_found_rows' => true,
        );
        if (!empty($testimonial_ids))
            $query_args['post__in'] = explode(',', $testimonial_ids);

        $query = new WP_Query($query_args);

        $testimonials = '';
        if ($query->have_posts()) {

            // Gather output
            ob_start(); ?>

            <ul>

                <?php

                while ($query->have_posts()) : $query->the_post();
                    $post_id = get_the_ID();
                    $title = get_the_title();
                    $client_name = htmlspecialchars_decode(get_post_meta($post_id, 'mo_client_name', true));
                    $client_details = htmlspecialchars_decode(get_post_meta($post_id, 'mo_client_details', true));

                    $client_name = (empty($client_name)) ? '' : $client_name;
                    $client_details = (empty($client_details)) ? '' : $client_details;

                    $thumbnail_element = mo_get_thumbnail(array('before_html' => '<span>', 'after_html' => '</span>', 'image_size' => 'square', 'image_class' => 'alignleft img-circle', 'wrapper' => false, 'image_alt' => 'Testimonial', 'size' => 'full'));

                    ?>

                    <?php if ($code === 'testimonials') : ?>

                        <li>
                            <?php if (!empty($thumbnail_element)) : ?>
                                <div class="fourcol">
                                    <div class="center">
                                        <?php echo $thumbnail_element; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="quote<?php echo (empty($thumbnail_element)) ? '' : ' eightcol last'; ?>">
                                <blockquote>
                                    <cite><i
                                            class="icon-testimonial"></i><?php echo $client_name . ', ' . $client_details ?>
                                    </cite>

                                    <div class="text">
                                        <p><?php echo get_the_content() ?></p>
                                    </div>
                                </blockquote>
                            </div>
                        </li>

                    <?php elseif ($code === 'testimonials2') : ?>

                        <li>
                            <div class="header">
                                <?php if (!empty($thumbnail_element)) : ?>
                                    <?php echo $thumbnail_element; ?>
                                <?php endif; ?>
                                <div class="text">
                                    <h3 class="title"><?php echo $title; ?></h3>
                                    <cite><?php echo $client_name . ', ' . $client_details ?></cite>
                                </div>
                            </div>
                            <div class="quote">
                                <blockquote>
                                    <p><?php echo get_the_content() ?></p>
                                </blockquote>
                            </div>
                        </li>
                    <?php endif; ?>

                <?php

                endwhile;

                wp_reset_postdata();

                ?>

            </ul>

            <?php
            // Save output
            $testimonials = ob_get_contents();
            ob_end_clean();
        }

        return $testimonials;
    }
}

add_shortcode('testimonials', 'mo_testimonials_shortcode');

add_shortcode('testimonials2', 'mo_testimonials_shortcode');

if (!function_exists('mo_testimonials_slider_shortcode')) {
    function mo_testimonials_slider_shortcode($atts, $content = null, $code) {
        extract(shortcode_atts(array(
            'post_count' => '-1',
            'testimonial_ids' => '',
            'type' => 'testimonials2',
            'slideshow_speed' => 5000,
            'animation_speed' => 600,
            'animation' => 'slide',
            'pause_on_action' => 'false',
            'pause_on_hover' => 'true',
            'direction_nav' => 'false',
            'control_nav' => 'true',
            'easing' => 'swing'
        ), $atts));

        $slider_content = '[responsive_slider type="' . $type . '" animation="' . $animation . '" control_nav="' . $control_nav . '" direction_nav="' . $direction_nav . '" slideshow_speed=' . $slideshow_speed . ' animation_speed=' . $animation_speed . ' pause_on_hover="' . $pause_on_hover . '" pause_on_action="' . $pause_on_action . '" easing="' . $easing . '" loop="true" slideshow="true"]';
        if ($code === 'testimonials_slider')
            $slider_content .= '[testimonials post_count=' . $post_count . ' testimonial_ids="' . $testimonial_ids . '"]';
        elseif ($code === 'testimonials_slider2')
            $slider_content .= '[testimonials2 post_count=' . $post_count . ' testimonial_ids="' . $testimonial_ids . '"]';
        $slider_content .= '[/responsive_slider]';

        $output = do_shortcode($slider_content);

        return $output;
    }
}

add_shortcode('testimonials_slider', 'mo_testimonials_slider_shortcode');

add_shortcode('testimonials_slider2', 'mo_testimonials_slider_shortcode');

