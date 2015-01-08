<?php

/* Team Shortcode -

Displays a list of team members entered by creating Team custom post types in the Team Profiles tab of the WordPress Admin.
Usage:

[team department="marketing,sales"]

Parameters -

department - The comma separated slugs of the department(s) for which the team needs to be displayed. Helps to limit the team members displayed to one or more departments. (optional).

*/

function mo_team_shortcode($atts, $content = null, $shortcode_name = "") {

    extract(shortcode_atts(array(
        'department' => '',
        'post_count' => '-1',
        'team_member_ids' => '',
    ), $atts));


    global $post;

    $query = array(
        'post_type' => 'team',
        'posts_per_page' => (int)$post_count,
        // Unlimited posts
        'orderby' => 'menu_order',
        // Order by menu order
        'order' => 'ASC',
        // Start with 'A'
    );

    if (!empty($team_member_ids)) {
        $query = array_merge($query, array(
            'post__in' => explode(',', $team_member_ids)
        ));
    }
    elseif (!empty($department)) {
        $query = array_merge($query, array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'department',
                    'field' => 'slug',
                    'terms' => explode(',', $department)
                )
            )
        ));
    }


    // Get 'team' posts
    $team_posts = get_posts($query);

    $output = null;
    if ($team_posts):

        // Gather output
        ob_start();
        ?>
        <div class="row profiles">
            <?php
            foreach ($team_posts as $post):
                setup_postdata($post);
                $post_id = $post->ID;
                $member_name = get_the_title();
                $position = htmlspecialchars_decode(get_post_meta($post_id, 'mo_position', true));
                $email = get_post_meta($post_id, 'mo_email', true);
                $twitter = get_post_meta($post_id, 'mo_twitter', true);
                $linkedin = get_post_meta($post_id, 'mo_linkedin', true);
                $googleplus = get_post_meta($post_id, 'mo_googleplus', true);
                $facebook = get_post_meta($post_id, 'mo_facebook', true);
                $dribbble = get_post_meta($post_id, 'mo_dribbble', true);
                $instagram = get_post_meta($post_id, 'mo_instagram', true);


                ?>
                <div class="twelvecol profile">
                    <div class="fivecol zero-margin">
                        <div class="profile-header">
                            <?php
                            $image_alt = $member_name . $position;
                            mo_thumbnail(array(
                                'image_size' => 'square',
                                'image_class' => 'img-circle',
                                'wrapper' => true,
                                'before_html' => '<span>',
                                'after_html' => '</span>',
                                'image_alt' => $image_alt,
                                'size' => 'full'
                            ));
                            ?>

                            <div class="socials">

                                <?php

                                $shortcode_text = '[social_list';
                                $shortcode_text .= $email ? ' email="' . $email . '"' : '';
                                $shortcode_text .= $twitter ? ' twitter_url="' . $twitter . '"' : '';
                                $shortcode_text .= $googleplus ? ' googleplus_url="' . $googleplus . '"' : '';
                                $shortcode_text .= $linkedin ? ' linkedin_url="' . $linkedin . '"' : '';
                                $shortcode_text .= $facebook ? ' facebook_url="' . $facebook . '"' : '';
                                $shortcode_text .= $dribbble ? ' dribbble_url="' . $dribbble . '"' : '';
                                $shortcode_text .= $instagram ? ' instagram_url="' . $instagram . '"' : '';
                                $shortcode_text .= ' align="right"]';

                                echo do_shortcode($shortcode_text);

                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="profile-content sevencol zero-margin">

                        <h3><?php echo $member_name; ?></h3>

                        <p class="employee-title"><?php echo $position; ?></p>

                        <?php the_content(); ?>

                    </div>

                </div><!-- /.profile -->

                <?php wp_reset_postdata(); ?>

            <?php endforeach; ?>

        </div><!-- /.row -->

        <?php
        // Save output
        $output = ob_get_contents();
        ob_end_clean();

    endif; // end if $team_posts

    // Output the HTML if it exists
    return ($output) ? $output : '';
}

add_shortcode('team', 'mo_team_shortcode');


/* Team Slider Shortcode -

Displays a team slider for the team members entered by creating Team custom post types in the Team Profiles tab of the WordPress Admin.
Usage:

[team_slider id="team1" department="marketing,sales"]

Parameters -

id  - The element id of the wrapper element for the slider. Useful if you need to have multiple team sliders in a single page
department - The comma separated slugs of the department(s) for which the team slider needs to be created. Helps to limit the team members displayed to one or more departments. (optional).

*/
function mo_team_slider_shortcode($atts, $content = null, $shortcode_name = "") {

    extract(shortcode_atts(array(
        'id' => '',
        'department' => '',
        'post_count' => '-1',
        'team_member_ids' => '',
    ), $atts));


    global $post;

    $query = array(
        'post_type' => 'team',
        'posts_per_page' => (int)$post_count,
        // Unlimited posts
        'orderby' => 'menu_order',
        // Order by menu order
        'order' => 'ASC',
        // Start with 'A'
    );

    if (!empty($team_member_ids)) {
        $query = array_merge($query, array(
            'post__in' => explode(',', $team_member_ids)
        ));
    }
    elseif (!empty($department)) {
        $query = array_merge($query, array(
            'tax_query' => array(
                array(
                    'taxonomy' => 'department',
                    'field' => 'slug',
                    'terms' => explode(',', $department)
                )
            )
        ));
    }

    if (!empty($id)) {
        $id_attribute = 'id="' . $id . '"';
        $id_selector = '#' . $id;
        $member_id_prefix = $id . '-' . 'slider-member';
    }
    else {
        $id_attribute = '';
        $id_selector = '';
        $member_id_prefix = 'slider-member';
    }

    // Get 'team' posts
    $team_posts = get_posts($query);

    $output = null;
    if ($team_posts):

        // Gather output
        ob_start();
        ?>

        <div class="team-slider-profiles flexslider">

            <ul class="slides">

                <?php

                $member_names = array(); // store the names for populating the member name indices later
                $member_count = 0;

                foreach ($team_posts as $post):
                    setup_postdata($post);
                    $post_id = $post->ID;
                    $member_name = get_the_title();
                    $member_names[] = $member_name;
                    $position = htmlspecialchars_decode(get_post_meta($post_id, 'mo_position', true));
                    $email = get_post_meta($post_id, 'mo_email', true);
                    $twitter = get_post_meta($post_id, 'mo_twitter', true);
                    $linkedin = get_post_meta($post_id, 'mo_linkedin', true);
                    $googleplus = get_post_meta($post_id, 'mo_googleplus', true);
                    $facebook = get_post_meta($post_id, 'mo_facebook', true);
                    $dribbble = get_post_meta($post_id, 'mo_dribbble', true);
                    $instagram = get_post_meta($post_id, 'mo_instagram', true);


                    ?>

                    <li id="<?php echo $member_id_prefix . ++$member_count ?>">

                        <div class="sixcol">

                            <div class="center">

                                <div class="team-member">

                                    <div class="img-wrap">
                                        <?php mo_thumbnail(array(
                                            'before_html' => '<p>',
                                            'after_html' => '</p>',
                                            'image_size' => 'square',
                                            'image_class' => 'alignleft img-circle',
                                            'wrapper' => false,
                                            'image_alt' => 'Testimonial',
                                            'size' => 'full'
                                        )); ?>
                                    </div>

                                    <h3><?php echo $member_name; ?> </h3>

                                    <p class="employee-title"><?php echo $position; ?> </p>

                                </div>

                            </div>

                        </div>

                        <div class="sixcol last">

                            <h3 class="member-title"><?php echo __('About ', 'mo_theme') . $member_name; ?> </h3>

                            <div class="member-content">
                                <?php the_content(); ?>
                            </div>

                            <div class="footer">
                                <span
                                    class="follow-text"><?php echo __('Connect Now: ', 'mo_theme'); ?> </span>

                                <div class="social-wrap">
                                    <?php

                                    $shortcode_text = '[social_list';
                                    $shortcode_text .= $email ? ' email="' . $email . '"' : '';
                                    $shortcode_text .= $twitter ? ' twitter_url="' . $twitter . '"' : '';
                                    $shortcode_text .= $googleplus ? ' googleplus_url="' . $googleplus . '"' : '';
                                    $shortcode_text .= $linkedin ? ' linkedin_url="' . $linkedin . '"' : '';
                                    $shortcode_text .= $facebook ? ' facebook_url="' . $facebook . '"' : '';
                                    $shortcode_text .= $dribbble ? ' dribbble_url="' . $dribbble . '"' : '';
                                    $shortcode_text .= $instagram ? ' instagram_url="' . $instagram . '"' : '';
                                    $shortcode_text .= ' align="right"]';

                                    echo do_shortcode($shortcode_text);

                                    ?>
                                </div>
                            </div>
                        </div>
                    </li>

                    <?php wp_reset_postdata(); ?>

                <?php endforeach; ?>

            </ul>
            <!-- /.row -->
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                jQuery('<?php echo $id_selector; ?> .team-slider-profiles').flexslider({
                    animation: 'slide',
                    controlsContainer: "<?php echo $id_selector; ?> .member-list",
                    controlNav: true,
                    directionNav: false,
                    animationLoop: false,
                    slideshow: false,
                    manualControls: "<?php echo $id_selector; ?> .member-list li a"
                });
            });
        </script>

        <?php

        // Save output
        $buffer_output = ob_get_contents();
        ob_end_clean();


        $output = '<div ' . $id_attribute . ' class="team-slider">';

        $member_count = 0;

        $output .= '<ul class="member-list">';

        foreach ($member_names as $name) {
            $output .= '<li><a href="#' . $member_id_prefix . ++$member_count . '">' . $name . '</a></li>';
        }

        $output .= '</ul>';

        $output .= $buffer_output;

        $output .= ' </div><!-- .team-slider -->';

    endif; // end if $team_posts

    // Output the HTML if it exists
    return ($output) ? $output : '';
}

add_shortcode('team_slider', 'mo_team_slider_shortcode');
