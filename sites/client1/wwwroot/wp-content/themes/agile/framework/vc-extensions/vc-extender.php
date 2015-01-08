<?php

if (class_exists('WPBakeryVisualComposer')) {

    $add_css_animation = array(
        "type" => "dropdown",
        "heading" => __("CSS Animation", "js_composer"),
        "param_name" => "css_animation",
        "admin_label" => true,
        "value" => array(
            __("No", "js_composer") => '',
            __("Top to bottom", "js_composer") => "top-to-bottom",
            __("Bottom to top", "js_composer") => "bottom-to-top",
            __("Left to right", "js_composer") => "left-to-right",
            __("Right to left", "js_composer") => "right-to-left",
            __("Appear from center", "js_composer") => "appear"
        ),
        "description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", "js_composer")
    );


    if (function_exists('vc_add_param')) {
        vc_add_param('vc_column_inner', $add_css_animation);
    }

    if (function_exists('vc_map')) {

// Custom Map
        vc_map(array(
            "name" => __("Row", "js_composer"),
            "base" => "vc_row",
            "is_container" => true,
            "icon" => "icon-wpb-row",
            "show_settings_on_create" => true,
            "category" => __('Content', 'js_composer'),
            "description" => __('Place content elements inside the row', 'js_composer'),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("ID", "js_composer"),
                    "admin_label" => true,
                    "param_name" => "mo_id",
                    "description" => __("If this row pertains to the content of one of your sections, set an ID. You can then use it for smooth navigation from menu. Ex: services, portfolio, work", "js_composer")
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Class", "js_composer"),
                    "admin_label" => true,
                    "param_name" => "mo_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra inline CSS markup", "js_composer"),
                    "param_name" => "mo_style",
                    "description" => __("Enter any custom inline CSS for the wrapper element.", "js_composer")
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Type', 'js_composer'),
                    "param_name" => "mo_row_type",
                    "description" => __("You can specify whether the row is displayed fullwidth or in container.", "js_composer"),
                    "value" => array(
                        __("In Container", 'js_composer') => 'in_container',
                        __("Fullwidth", 'js_composer') => 'fullwidth'
                    )
                ),
                array(
                    "type" => "attach_image",
                    "heading" => __("Background Image", "js_composer"),
                    "param_name" => "mo_bg_image",
                    "description" => __("Select backgound image for the row to be used as a parallax background.", "js_composer")
                ),
                array(
                    "type" => "checkbox",
                    "heading" => __("Parallax Background?", "js_composer"),
                    "param_name" => "mo_parallax_bg",
                    "value" => array( __( 'Yes, please', 'js_composer' ) => 'yes' ),
                    "description" => __("Specify if this is a parallax background.", "js_composer")
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Parallax Speed', 'js_composer' ),
                    'param_name' => 'mo_parallax_speed',
                    'value' => array(
                        __( 'Normal', 'js_composer' ) => '0.5',
                        __( 'Fast', 'js_composer' ) => '0.2',
                        __( 'Slow', 'js_composer' ) => '0.8'
                    ),
                    'description' => __( 'Specify the speed of the parallax motion of the background', 'js_composer' )
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Background Color', 'js_composer'),
                    "param_name" => "mo_bg_color",
                    "description" => __("You can set a background color", "js_composer")
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Text Color Scheme', 'js_composer'),
                    "param_name" => "mo_text_scheme",
                    "description" => __("Pick a color scheme for the content text. 'Light Text' looks good on dark bg images while 'Dark Text' looks good on light images.", "js_composer"),
                    "value" => array(
                        __("Dark Text", 'js_composer') => 'lighter-overlay',
                        __("Light Text", 'js_composer') => 'darker-overlay'
                    )
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __('Padding', 'js_composer'),
                    "param_name" => "mo_padding",
                    "description" => __("Specify top and bottom padding to be used for row or remove the padding by choosing None value.", "js_composer"),
                    "value" => array(
                        __("Default", 'js_composer') => 'default',
                        __("None", 'js_composer') => 'none',
                        __("Custom", 'js_composer') => 'custom'
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Padding Top", "js_composer"),
                    "param_name" => "mo_padding_top",
                    "description" => __("Enter a value and it will be used for padding-top(px). As an alternative, use the 'Space' element.", "js_composer"),
                    'dependency' => array(
                        'element' => 'mo_padding',
                        'value' => array( 'custom' )
                    ),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Padding Bottom", "js_composer"),
                    "param_name" => "mo_padding_bottom",
                    "description" => __("Enter a value and it will be used for padding-bottom(px). As an alternative, use the 'Space' element.", "js_composer"),
                    'dependency' => array(
                        'element' => 'mo_padding',
                        'value' => array( 'custom' )
                    ),
                )
            ),
            "js_view" => 'VcRowView'
        ));

        vc_map(array(
            "name" => __("Contact Form", "js_composer"),
            "base" => "contact_form",
            "icon" => "icon-contact-form",
            "class" => "contact_form_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Contact Form", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Style", "js_composer"),
                    "description" => __("Custom CSS class name to be set for the DIV element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "mail_to",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Recipient Email", "js_composer"),
                    "description" => __(" A string field specifying the recipient email where all form submissions will be received.", "js_composer")
                ),
                array(
                    "param_name" => "web_url",
                    "type" => "dropdown",
                    "heading" => __("Web URL Field", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Specify if the user should be requested for Web URL via an input field.", "js_composer")
                ),
                array(
                    "param_name" => "phone",
                    "type" => "dropdown",
                    "heading" => __("Phone Field", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Specify if the users should be requested for their phone number. A phone field is displayed if the value is set to true.", "js_composer")
                ),
                array(
                    "param_name" => "subject",
                    "type" => "dropdown",
                    "heading" => __("Subject Field", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("A form subject field is displayed if the value is set to true.", "js_composer")
                ),
                array(
                    "param_name" => "button_color",
                    "type" => "dropdown",
                    "heading" => __("Button Color", "js_composer"),
                    "value" => array(
                        __("Default", "js_composer") => "default",
                        __("Black", "js_composer") => "black",
                        __("Blue", "js_composer") => "blue",
                        __("Cyan", "js_composer") => "cyan",
                        __("Green", "js_composer") => "green",
                        __("Orange", "js_composer") => "orange",
                        __("Pink", "js_composer") => "pink",
                        __("Red", "js_composer") => "red",
                        __("Teal", "js_composer") => "teal",
                        __("Theme", "js_composer") => "theme",
                        __("Trans", "js_composer") => "trans"
                    ),
                    "description" => __("Color of the submit button.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Pullquote", "js_composer"),
            "base" => "pullquote",
            "icon" => "icon-pullquote",
            "class" => "pullquote_extended",
            "category" => __("Typography", "js_composer"),
            "description" => __("Insert Pullquote Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "align",
                    "type" => "dropdown",
                    "heading" => __("Alignment", "js_composer"),
                    "value" => array(
                        __("None", "js_composer") => "none",
                        __("Left", "js_composer") => "left",
                        __("Center", "js_composer") => "center",
                        __("Right", "js_composer") => "right"
                    ),
                    "description" => __("Choose Pullquote Alignment (optional)", "js_composer")
                ),
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "admin_label" => true,
                    "heading" => __("Content", "js_composer"),
                    "description" => __("The actual quotation text for the pullquote element.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Blockquote", "js_composer"),
            "base" => "blockquote",
            "icon" => "icon-blockquote",
            "class" => "blockquote_extended",
            "category" => __("Typography", "js_composer"),
            "description" => __("Insert Blockquote Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "heading" => __("Element Id", "js_composer"),
                    "description" => __("The element id to be set for the blockquote element created", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Blockquote Class", "js_composer"),
                    "description" => __("Custom CSS class name to be set for the blockquote element created ", "js_composer")
                ),
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Blockquote Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the blockquote element created ", "js_composer")
                ),
                array(
                    "param_name" => "align",
                    "type" => "dropdown",
                    "heading" => __("Alignment", "js_composer"),
                    "value" => array(
                        __("None", "js_composer") => "none",
                        __("Left", "js_composer") => "left",
                        __("Center", "js_composer") => "center",
                        __("Right", "js_composer") => "right"
                    ),
                    "description" => __("Choose blockquote Alignment", "js_composer")
                ),
                array(
                    "param_name" => "subtitle",
                    "type" => "textfield",
                    "heading" => __("Subtitle", "js_composer"),
                    "description" => __("A companion div element which goes with the blockquote element created. Can be utilized to enhance the quote in parallax or video backgrounds. (optional)", "js_composer")
                ),
                array(
                    "param_name" => "author",
                    "type" => "textfield",
                    "heading" => __("Author", "js_composer"),
                    "description" => __("Author Information.", "js_composer")
                ),
                array(
                    "param_name" => "affiliation",
                    "type" => "textfield",
                    "heading" => __("Affiliation", "js_composer"),
                    "description" => __("The entity/organization to which the author of the quote belongs to.", "js_composer")
                ),
                array(
                    "param_name" => "affiliation_url",
                    "type" => "textfield",
                    "heading" => __("Affiliation URL", "js_composer"),
                    "description" => __("The URL of the entity/organization to which this quote is attributed to", "js_composer")
                ),
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "admin_label" => true,
                    "heading" => __("Content", "js_composer"),
                    "description" => __("The actual quotation text for the blockquote element.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        vc_map(array(
            "name" => __("Code", "js_composer"),
            "base" => "code",
            "icon" => "icon-code",
            "class" => "code_extended",
            "category" => __("Typography", "js_composer"),
            "description" => __("Insert Code Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "heading" => __("Code Content", "js_composer"),
                    "description" => __("Add the code content.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        vc_map(array(
            "name" => __("Highlight1", "js_composer"),
            "base" => "highlight1",
            "icon" => "icon-highlight1",
            "class" => "highlight1_extended",
            "category" => __("Typography", "js_composer"),
            "description" => __("Insert Highlight1 Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "heading" => __("Highlighted Content", "js_composer"),
                    "description" => __("Specify the content to be highlighted", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Highlight2", "js_composer"),
            "base" => "highlight2",
            "icon" => "icon-highlight2",
            "class" => "highlight2_extended",
            "category" => __("Typography", "js_composer"),
            "description" => __("Insert Highlight2 Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "heading" => __("Highlighted Content", "js_composer"),
                    "description" => __("Specify the content to be highlighted.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("List", "js_composer"),
            "base" => "list",
            "icon" => "icon-list",
            "class" => "list_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert List Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("List Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the UL element created (optional).", "js_composer")
                ),
                array(
                    "param_name" => "type",
                    "type" => "dropdown",
                    "heading" => __("Type", "js_composer"),
                    "value" => array(
                        __("List 1", "js_composer") => "list1",
                        __("List 2", "js_composer") => "list2",
                        __("List 3", "js_composer") => "list3",
                        __("List 4", "js_composer") => "list4",
                        __("List 5", "js_composer") => "list5",
                        __("List 6", "js_composer") => "list6",
                        __("List 7", "js_composer") => "list7",
                        __("List 8", "js_composer") => "list8",
                        __("List 9", "js_composer") => "list9",
                        __("List 10", "js_composer") => "list10"
                    ),
                    "description" => __("Custom CSS class name to be set for the UL element created (optional).", "js_composer")
                ),
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "admin_label" => true,
                    "heading" => __("Content", "js_composer"),
                    "description" => __("The actual list content with LI elements.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Heading", "js_composer"),
            "base" => "heading2",
            "icon" => "icon-heading",
            "class" => "heading2_extended",
            "category" => __("Typography", "js_composer"),
            "description" => __("Insert Heading Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Heading Class", "js_composer"),
                    "description" => __(" Custom CSS class name to be set for the heading div element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Heading Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the div element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Title", "js_composer"),
                    "description" => __("A string value indicating the title of the heading.", "js_composer")
                ),
                array(
                    "param_name" => "pitch_text",
                    "type" => "textfield",
                    "heading" => __("Pitch Text", "js_composer"),
                    "description" => __("The text displayed below the heading title.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Icon", "js_composer"),
            "base" => "icon",
            "icon" => "icon-icon",
            "class" => "icon_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Icon Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Icon Class", "js_composer"),
                    "description" => __("Custom CSS class name to be set for the icon element created. The class names are listed at http://portfoliotheme.org/support/faqs/how-to-use-1500-icons-bundled-with-the-agile-theme/", "js_composer")
                ),
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Icon Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the icon element created (optional). Useful if you want to specify font-size, color etc. for the icon inline.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Action Call", "js_composer"),
            "base" => "action_call",
            "icon" => "icon-action-call",
            "class" => "action_call_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Action Call Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "text",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Text", "js_composer"),
                    "description" => __("Text to be displayed urging for an action call.", "js_composer")
                ),
                array(
                    "param_name" => "button_text",
                    "type" => "textfield",
                    "heading" => __("Button Text", "js_composer"),
                    "description" => __("The title to be displayed for the button.", "js_composer")
                ),
                array(
                    "param_name" => "button_color",
                    "type" => "dropdown",
                    "heading" => __("Button Color Options", "js_composer"),
                    "value" => array(
                        __("Default", "js_composer") => "default",
                        __("Black", "js_composer") => "black",
                        __("Blue", "js_composer") => "blue",
                        __("Cyan", "js_composer") => "cyan",
                        __("Green", "js_composer") => "green",
                        __("Orange", "js_composer") => "orange",
                        __("Pink", "js_composer") => "pink",
                        __("Red", "js_composer") => "red",
                        __("Teal", "js_composer") => "teal",
                        __("Theme", "js_composer") => "theme",
                        __("Trans", "js_composer") => "trans"
                    ),
                    "description" => __("The color of the button.", "js_composer")
                ),
                array(
                    "param_name" => "button_url",
                    "type" => "textfield",
                    "heading" => __("Button URL", "js_composer"),
                    "description" => __("The URL to which the button links to.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Button", "js_composer"),
            "base" => "button",
            "icon" => "icon-button",
            "class" => "button_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Button Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "heading" => __("Element Id", "js_composer"),
                    "description" => __("The element id to be set for the button element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Button Class", "js_composer"),
                    "description" => __("Custom CSS class name to be set for the button element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Button Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the button element created eg.padding: 10px 20px; (optional)", "js_composer")
                ),
                array(
                    "param_name" => "color",
                    "type" => "dropdown",
                    "heading" => __("Color", "js_composer"),
                    "value" => array(
                        __("Default", "js_composer") => "default",
                        __("Theme", "js_composer") => "theme",
                        __("Black", "js_composer") => "black",
                        __("Blue", "js_composer") => "blue",
                        __("Cyan", "js_composer") => "cyan",
                        __("Green", "js_composer") => "green",
                        __("Orange", "js_composer") => "orange",
                        __("Pink", "js_composer") => "pink",
                        __("Red", "js_composer") => "red",
                        __("Teal", "js_composer") => "teal",
                        __("Trans", "js_composer") => "trans"
                    ),
                    "description" => __("The color of the button.", "js_composer")
                ),
                array(
                    "param_name" => "align",
                    "type" => "dropdown",
                    "heading" => __("Alignment", "js_composer"),
                    "value" => array(
                        __("None", "js_composer") => "none",
                        __("Left", "js_composer") => "left",
                        __("Center", "js_composer") => "center",
                        __("Right", "js_composer") => "right"
                    ),
                    "description" => __(" Alignment of the button and text alignment of the button title displayed.", "js_composer")
                ),
                array(
                    "param_name" => "type",
                    "type" => "dropdown",
                    "heading" => __("Type", "js_composer"),
                    "value" => array(
                        __("Large", "js_composer") => "large",
                        __("Small", "js_composer") => "small",
                        __("Rounded", "js_composer") => "rounded"
                    ),
                    "description" => __("Can be large, small or rounded.", "js_composer")
                ),
                array(
                    "param_name" => "href",
                    "type" => "textfield",
                    "heading" => __("URL", "js_composer"),
                    "description" => __("The URL to which button should point to. The user is taken to this destination when the button is clicked.eg.http://targeturl.com", "js_composer")
                ),
                array(
                    "param_name" => "target",
                    "type" => "dropdown",
                    "heading" => __("Button Target", "js_composer"),
                    "value" => array(
                        __("Open link in the same window", "js_composer") => "_self",
                        __("Open link in new window", "js_composer") => "_blank"
                    ),
                    "description" => __("_self = open in same window. _blank = open in new window", "js_composer")
                ),
                array(
                    "param_name" => "content",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Title", "js_composer"),
                    "description" => __("Specify the title of the button.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Image", "js_composer"),
            "base" => "image",
            "icon" => "icon-image",
            "class" => "image_extended",
            "category" => __("Media", "js_composer"),
            "description" => __("Insert Image Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Image Class", "js_composer"),
                    "description" => __("Custom CSS class name to be set for the IMG element created (optional).", "js_composer")
                ),
                array(
                    "param_name" => "image_id",
                    "type" => "attach_image",
                    "heading" => __("Choose Image", "js_composer"),
                    "description" => __("Choose your image. An IMG element will be created for this image and the image will be cropped and styled as per the parameters provided", "js_composer")
                ),
                array(
                    "param_name" => "align",
                    "type" => "dropdown",
                    "heading" => __("Alignment", "js_composer"),
                    "value" => array(
                        __("None", "js_composer") => "none",
                        __("Left", "js_composer") => "left",
                        __("Center", "js_composer") => "center",
                        __("Right", "js_composer") => "right"
                    ),
                    "description" => __("Choose Image Alignment", "js_composer")
                ),
                array(
                    "param_name" => "width",
                    "type" => "textfield",
                    "heading" => __("Width", "js_composer"),
                    "description" => __("Any custom width (in pixel units) specified for the element (optional). The original image (pointed to by the src parameter) will be cropped to this width.", "js_composer")
                ),
                array(
                    "param_name" => "height",
                    "type" => "textfield",
                    "heading" => __("Height", "js_composer"),
                    "description" => __("Any custom height (in pixel units) specified for the element (optional). The original image (pointed to by the Image URL parameter) will be cropped to this height.", "js_composer")
                ),
                array(
                    "param_name" => "size",
                    "type" => "dropdown",
                    "heading" => __("Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small"
                    ),
                    "description" => __("Takes effect if no custom width or height is specified. The original image (pointed to by the Image URL parameter) is cropped to the size specified.", "js_composer")
                ),
                array(
                    "param_name" => "link",
                    "type" => "textfield",
                    "heading" => __("Link URL", "js_composer"),
                    "description" => __("Specify a URL to which the link should point to if image should be a link (optional).", "js_composer")
                ),
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "heading" => __("Image Title", "js_composer"),
                    "description" => __("The title of the link to which image points to.", "js_composer")
                ),
                array(
                    "param_name" => "alt",
                    "type" => "textfield",
                    "heading" => __("Alt Text", "js_composer"),
                    "description" => __("The alt attribute value for the IMG element.", "js_composer")
                ),
                array(
                    "param_name" => "image_frame",
                    "type" => "dropdown",
                    "heading" => __("Image Frame", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("A boolean value specifying if the image should be wrapped in a border frame and another type of frame as styled by the theme", "js_composer")
                ),
                array(
                    "param_name" => "wrapper",
                    "type" => "dropdown",
                    "heading" => __("Wrapper", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("A boolean value indicating if the a wrapper DIV element needs to be created for the image.", "js_composer")
                ),
                array(
                    "param_name" => "wrapper_class",
                    "type" => "textfield",
                    "heading" => __("Wrapper Class", "js_composer"),
                    "description" => __("The CSS class for any wrapper DIV element created for the image. (optional)", "js_composer")
                ),
                array(
                    "param_name" => "wrapper_style",
                    "type" => "textfield",
                    "heading" => __("Wrapper Style", "js_composer"),
                    "description" => __("The inline CSS styling for any wrapper DIV element created for the image. (optional)", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Ytp Video Showcase", "js_composer"),
            "base" => "ytp_video_showcase",
            "icon" => "icon-ytp-video-showcase",
            "class" => "ytp_video_showcase_extended",
            "category" => __("Media", "js_composer"),
            "description" => __("Insert YouTube Video Showcase Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "heading" => __("Element Id", "js_composer"),
                    "description" => __("The id of the DIV element created to wrap the YouTube video (optional). Default is video-intro.", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Class", "js_composer"),
                    "description" => __("The CSS class of the DIV element created to wrap the YouTube video (optional).", "js_composer")
                ),
                array(
                    "param_name" => "video_url",
                    "type" => "textfield",
                    "heading" => __("Video URL", "js_composer"),
                    "admin_label" => true,
                    "description" => __("Enter the YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).", "js_composer")
                ),
                array(
                    "param_name" => "mute",
                    "type" => "dropdown",
                    "heading" => __("Mute", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Indicate if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute", "js_composer")
                ),
                array(
                    "param_name" => "show_controls",
                    "type" => "dropdown",
                    "heading" => __("Show Controls", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Show or hide the controls bar at the bottom of the page.", "js_composer")
                ),
                array(
                    "param_name" => "containment",
                    "type" => "dropdown",
                    "heading" => __("Containment", "js_composer"),
                    "value" => array(
                        __("Self", "js_composer") => "self",
                        __("Body", "js_composer") => "body"
                    ),
                    "description" => __("The CSS selector of the DOM element where you want the video background; if set to “self” the player will be instanced on that element.", "js_composer")
                ),
                array(
                    "param_name" => "quality",
                    "type" => "dropdown",
                    "heading" => __("Quality", "js_composer"),
                    "value" => array(
                        __("highres", "js_composer") => "highres",
                        __("hd720", "js_composer") => "hd720",
                        __("hd1080", "js_composer") => "hd1080",
                        __("Large", "js_composer") => "large",
                        __("Medium", "js_composer") => "medium",
                        __("Small", "js_composer") => "small"
                    ),
                    "description" => __("Quality of video", "js_composer")
                ),
                array(
                    "param_name" => "optimize_display",
                    "type" => "dropdown",
                    "heading" => __("Optimize Display", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Will fit the video size into the window size optimizing the view.", "js_composer")
                ),
                array(
                    "param_name" => "loop",
                    "type" => "dropdown",
                    "heading" => __("Loop", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Whether to loop the movie once ended.", "js_composer")
                ),
                array(
                    "param_name" => "start_at",
                    "type" => "textfield",
                    "heading" => __("Video Starts At", "js_composer"),
                    "value" => 0,
                    "description" => __("Specify a number which sets the seconds the video should start at(optional). Starts at 0 by default.", "js_composer")
                ),
                array(
                    "param_name" => "opacity",
                    "type" => "textfield",
                    "heading" => __("Opacity", "js_composer"),
                    "value" => 1,
                    "description" => __("Define the opacity of the video. Specify a decimal value between 0 and 1.", "js_composer")
                ),
                array(
                    "param_name" => "vol",
                    "type" => "textfield",
                    "heading" => __("Volume", "js_composer"),
                    "value" => 50,
                    "description" => __("A numerical value between 1 to 100 - set the volume level of the video.", "js_composer")
                ),
                array(
                    "param_name" => "ratio",
                    "type" => "dropdown",
                    "heading" => __("Aspect Ratio", "js_composer"),
                    "value" => array(
                        __("16/9", "js_composer") => "16/9",
                        __("4/3", "js_composer") => "4/3"
                    ),
                    "description" => __("Set the aspect ratio of the movie", "js_composer")
                ),
                array(
                    "param_name" => "autoplay",
                    "type" => "dropdown",
                    "heading" => __("Autoplay", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Specify whether to automatically play the video once ready.", "js_composer")
                ),
                array(
                    "param_name" => "placeholder_image_id",
                    "type" => "attach_image",
                    "heading" => __("Placeholder Image", "js_composer"),
                    "description" => __("Choose the placeholder image to be displayed instead of YouTube video in mobile devices.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_color",
                    "type" => "colorpicker",
                    "heading" => __("Overlay Color", "js_composer"),
                    "description" => __("The color of the overlay to be applied on the video.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_opacity",
                    "type" => "textfield",
                    "heading" => __("Overlay Opacity", "js_composer"),
                    "value" => 0.7,
                    "description" => __("The opacity of the overlay color. Specify a value between 0 and 1.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_pattern_id",
                    "type" => "attach_image",
                    "heading" => __("Overlay Pattern", "js_composer"),
                    "description" => __("The image which can act as a pattern displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "heading" => __("Title", "js_composer"),
                    "description" => __("The title text displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "text",
                    "type" => "textfield",
                    "heading" => __("Text", "js_composer"),
                    "description" => __("The text displayed on top of the video; below the title.", "js_composer")
                ),
                array(
                    "param_name" => "button_text",
                    "type" => "textfield",
                    "heading" => __("Button Text", "js_composer"),
                    "description" => __(" The title for the button displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "button_url",
                    "type" => "textfield",
                    "heading" => __("Button URL", "js_composer"),
                    "description" => __("The URL pointed to by the button displayed on top of the video.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Ytp Video Section", "js_composer"),
            "base" => "ytp_video_section",
            "icon" => "icon-ytp-video-section",
            "class" => "ytp_video_section_extended",
            "category" => __("Media", "js_composer"),
            "description" => __("Insert YouTube Video Section Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "heading" => __("Element Id", "js_composer"),
                    "description" => __("The id of the DIV element created to wrap the YouTube video (optional). ", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Class", "js_composer"),
                    "description" => __("The CSS class of the DIV element created to wrap the YouTube video (optional).", "js_composer")
                ),
                array(
                    "param_name" => "video_url",
                    "type" => "textfield",
                    "heading" => __("Video URL", "js_composer"),
                    "admin_label" => true,
                    "description" => __("Enter the YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).", "js_composer")
                ),
                array(
                    "param_name" => "mute",
                    "type" => "dropdown",
                    "heading" => __("Mute", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Indicate if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute", "js_composer")
                ),
                array(
                    "param_name" => "show_controls",
                    "type" => "dropdown",
                    "heading" => __("Show Controls", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Show or hide the controls bar at the bottom of the page.", "js_composer")
                ),
                array(
                    "param_name" => "containment",
                    "type" => "dropdown",
                    "heading" => __("Containment", "js_composer"),
                    "value" => array(
                        __("Self", "js_composer") => "self",
                        __("Body", "js_composer") => "body"
                    ),
                    "description" => __("The CSS selector of the DOM element where you want the video background; if set to “self” the player will be instanced on that element.", "js_composer")
                ),
                array(
                    "param_name" => "quality",
                    "type" => "dropdown",
                    "heading" => __("Quality", "js_composer"),
                    "value" => array(
                        __("highres", "js_composer") => "highres",
                        __("hd720", "js_composer") => "hd720",
                        __("hd1080", "js_composer") => "hd1080",
                        __("Large", "js_composer") => "large",
                        __("Medium", "js_composer") => "medium",
                        __("Small", "js_composer") => "small"
                    ),
                    "description" => __("Quality of video (optional)", "js_composer")
                ),
                array(
                    "param_name" => "optimize_display",
                    "type" => "dropdown",
                    "heading" => __("Optimize Display", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Will fit the video size into the window size optimizing the view.", "js_composer")
                ),
                array(
                    "param_name" => "loop",
                    "type" => "dropdown",
                    "heading" => __("Loop", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Whether to loop the movie once ended.", "js_composer")
                ),
                array(
                    "param_name" => "start_at",
                    "type" => "textfield",
                    "heading" => __("Video Starts At", "js_composer"),
                    "value" => 0,
                    "description" => __("Set the seconds the video should start at (optional). Starts at 0 by default.", "js_composer")
                ),
                array(
                    "param_name" => "opacity",
                    "type" => "textfield",
                    "heading" => __("Opacity", "js_composer"),
                    "value" => 1,
                    "description" => __("Define the opacity of the video. Specify a decimal value between 0 and 1.", "js_composer")
                ),
                array(
                    "param_name" => "vol",
                    "type" => "textfield",
                    "heading" => __("Volume", "js_composer"),
                    "value" => 50,
                    "description" => __("A value between 1 to 100 - set the volume level of the video.", "js_composer")
                ),
                array(
                    "param_name" => "ratio",
                    "type" => "dropdown",
                    "heading" => __("Aspect Ratio", "js_composer"),
                    "value" => array(
                        __("16/9", "js_composer") => "16/9",
                        __("4/3", "js_composer") => "4/3"
                    ),
                    "description" => __("Set the aspect ratio of the movie", "js_composer")
                ),
                array(
                    "param_name" => "autoplay",
                    "type" => "dropdown",
                    "heading" => __("Autoplay", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Specify whether to automatically play the video once ready.", "js_composer")
                ),
                array(
                    "param_name" => "placeholder_image_id",
                    "type" => "attach_image",
                    "heading" => __("Placeholder Image", "js_composer"),
                    "description" => __("The placeholder image to be displayed instead of YouTube video in mobile devices.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_color",
                    "type" => "colorpicker",
                    "heading" => __("Overlay Color", "js_composer"),
                    "description" => __("The color of the overlay to be applied on the video.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_opacity",
                    "type" => "textfield",
                    "value" => 0.7,
                    "heading" => __("Overlay Opacity", "js_composer"),
                    "description" => __("The opacity of the overlay color. Specify a value between 0 and 1.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_pattern_id",
                    "type" => "attach_image",
                    "heading" => __("Overlay Pattern", "js_composer"),
                    "description" => __("The image which can act as a pattern displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "text",
                    "type" => "textfield",
                    "heading" => __("Text", "js_composer"),
                    "description" => __("The title text displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "button_text",
                    "type" => "textfield",
                    "heading" => __("Button Text", "js_composer"),
                    "description" => __(" The title for the button displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "button_url",
                    "type" => "textfield",
                    "heading" => __("Button URL", "js_composer"),
                    "description" => __("The URL pointed to by the button displayed on top of the video.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Video Showcase", "js_composer"),
            "base" => "video_showcase",
            "icon" => "icon-video-showcase",
            "class" => "video_showcase_extended",
            "category" => __("Media", "js_composer"),
            "description" => __("Insert HTML5 Video Showcase Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "value" => "video-intro",
                    "heading" => __("Element Id", "js_composer"),
                    "description" => __("The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Class", "js_composer"),
                    "description" => __("The CSS class of the DIV element created to wrap the HTML5 video (optional). Default is video-heading.", "js_composer")
                ),
                array(
                    "param_name" => "video_id",
                    "type" => "textfield",
                    "heading" => __("Video Element Id", "js_composer"),
                    "description" => __("The id of the VIDEO tag element (optional).", "js_composer")
                ),
                array(
                    "param_name" => "mp4_url",
                    "type" => "textfield",
                    "heading" => __("MP4 URL", "js_composer"),
                    "admin_label" => true,
                    "description" => __("The URL of the video uploaded in MP4 format.", "js_composer")
                ),
                array(
                    "param_name" => "ogg_url",
                    "type" => "textfield",
                    "heading" => __("OGG URL", "js_composer"),
                    "admin_label" => true,
                    "description" => __("The URL of the video uploaded in OGG format.", "js_composer")
                ),
                array(
                    "param_name" => "webm_url",
                    "type" => "textfield",
                    "heading" => __("WEBM URL", "js_composer"),
                    "admin_label" => true,
                    "description" => __("The URL of the video uploaded in WEBM format.", "js_composer")
                ),
                array(
                    "param_name" => "muted",
                    "type" => "dropdown",
                    "heading" => __("Mute/Unmute", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Specify if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute after the video starts.", "js_composer")
                ),
                array(
                    "param_name" => "loop",
                    "type" => "dropdown",
                    "heading" => __("Loop", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Whether to loop the movie once ended.", "js_composer")
                ),
                array(
                    "param_name" => "autoplay",
                    "type" => "dropdown",
                    "heading" => __("Autoplay", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Whether to automatically play the video once ready.", "js_composer")
                ),
                array(
                    "param_name" => "preload",
                    "type" => "dropdown",
                    "heading" => __("Preload Video", "js_composer"),
                    "value" => array(
                        __("Metadata", "js_composer") => "metadata",
                        __("Auto", "js_composer") => "auto",
                        __("None", "js_composer") => "none"
                    ),
                    "description" => __("Specify if the HTML5 video needs to be preloaded irrespective of whether the user chooses to play or not. Possible values are auto (preloads entire video when the page loads), metadata (load only metadata when page loads) and none (preload nothing on page load).", "js_composer")
                ),
                array(
                    "param_name" => "placeholder_image_id",
                    "type" => "attach_image",
                    "heading" => __("Placeholder Image", "js_composer"),
                    "description" => __("The placeholder image to be displayed instead of YouTube video in mobile devices.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_color",
                    "type" => "colorpicker",
                    "heading" => __("Overlay Color", "js_composer"),
                    "description" => __("The color of the overlay to be applied on the video.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_opacity",
                    "type" => "textfield",
                    "value" => 0.7,
                    "heading" => __("Overlay Opacity", "js_composer"),
                    "description" => __("The opacity of the overlay color. Specify a value between 0 and 1.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_pattern_id",
                    "type" => "attach_image",
                    "heading" => __("Overlay Pattern", "js_composer"),
                    "description" => __("The image which can act as a pattern displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "heading" => __("Title", "js_composer"),
                    "description" => __("The title text displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "text",
                    "type" => "textfield",
                    "heading" => __("Text", "js_composer"),
                    "description" => __("The subtitle displayed on top of the video, below the title.", "js_composer")
                ),
                array(
                    "param_name" => "button_text",
                    "type" => "textfield",
                    "heading" => __("Button Text", "js_composer"),
                    "description" => __(" The title for the button displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "button_url",
                    "type" => "textfield",
                    "heading" => __("Button URL", "js_composer"),
                    "description" => __("The URL pointed to by the button displayed on top of the video.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Video Section", "js_composer"),
            "base" => "video_section",
            "icon" => "icon-video-section",
            "class" => "video_section_extended",
            "category" => __("Media", "js_composer"),
            "description" => __("Insert HTML5 Video Section Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "value" => "video-intro",
                    "heading" => __("Element Id", "js_composer"),
                    "description" => __("The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Class", "js_composer"),
                    "description" => __("The CSS class of the DIV element created to wrap the HTML5 video (optional).", "js_composer")
                ),
                array(
                    "param_name" => "video_id",
                    "type" => "textfield",
                    "heading" => __("Video Id", "js_composer"),
                    "description" => __("The id of the VIDEO tag element. (optional)", "js_composer")
                ),
                array(
                    "param_name" => "mp4_url",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("MP4 URL", "js_composer"),
                    "description" => __("The URL of the video uploaded in MP4 format.", "js_composer")
                ),
                array(
                    "param_name" => "ogg_url",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("OGG URL", "js_composer"),
                    "description" => __("The URL of the video uploaded in OGG format.", "js_composer")
                ),
                array(
                    "param_name" => "webm_url",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("WEBM URL", "js_composer"),
                    "description" => __("The URL of the video uploaded in WEBM format.", "js_composer")
                ),
                array(
                    "param_name" => "muted",
                    "type" => "dropdown",
                    "heading" => __("Mute/Unmute", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Specify if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute after the video starts.", "js_composer")
                ),
                array(
                    "param_name" => "loop",
                    "type" => "dropdown",
                    "heading" => __("Loop", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Whether to loop the movie once ended.", "js_composer")
                ),
                array(
                    "param_name" => "autoplay",
                    "type" => "dropdown",
                    "heading" => __("Autoplay", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Whether to automatically play the video once ready.", "js_composer")
                ),
                array(
                    "param_name" => "preload",
                    "type" => "dropdown",
                    "heading" => __("Preload Video", "js_composer"),
                    "value" => array(
                        __("Auto", "js_composer") => "auto",
                        __("Metadata", "js_composer") => "metadata",
                        __("None", "js_composer") => "none"
                    ),
                    "description" => __("Specify if the HTML5 video needs to be preloaded irrespective of whether the user chooses to play or not. Possible values are auto (preloads entire video when the page loads), metadata (load only metadata when page loads) and none (preload nothing on page load).", "js_composer")
                ),
                array(
                    "param_name" => "placeholder_image_id",
                    "type" => "attach_image",
                    "heading" => __("Placeholder Image", "js_composer"),
                    "description" => __("The placeholder image to be displayed instead of YouTube video in mobile devices.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_color",
                    "type" => "colorpicker",
                    "heading" => __("Overlay Color", "js_composer"),
                    "description" => __("The color of the overlay to be applied on the video.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_opacity",
                    "type" => "textfield",
                    "value" => 0.7,
                    "heading" => __("Overlay Opacity", "js_composer"),
                    "description" => __("The opacity of the overlay color.", "js_composer")
                ),
                array(
                    "param_name" => "overlay_pattern_id",
                    "type" => "attach_image",
                    "heading" => __("Overlay Pattern", "js_composer"),
                    "description" => __("The image which can act as a pattern displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "text",
                    "type" => "textfield",
                    "heading" => __("Text", "js_composer"),
                    "description" => __("The title text displayed on top of the video.", "js_composer")
                ),
                array(
                    "param_name" => "button_text",
                    "type" => "textfield",
                    "heading" => __("Button Text", "js_composer"),
                    "description" => __(" The title for the button displayed on top of the video, below the text.", "js_composer")
                ),
                array(
                    "param_name" => "button_url",
                    "type" => "textfield",
                    "heading" => __("Button URL", "js_composer"),
                    "description" => __("The URL pointed to by the button displayed on top of the video.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Audio", "js_composer"),
            "base" => "audio",
            "icon" => "icon-audio",
            "class" => "audio_extended",
            "category" => __("Media", "js_composer"),
            "description" => __("Insert HTML5 Audio Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "ogg_url",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("OGG URL", "js_composer"),
                    "description" => __("The URL of the audio clip uploaded in OGG format.eg.http://mydomain.com/song.ogg", "js_composer")
                ),
                array(
                    "param_name" => "mp3_url",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("MP4 URL", "js_composer"),
                    "description" => __("The URL of the audio uploaded in MP3 format.eg.http://mydomain.com/song.mp3", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Show Post Snippets", "js_composer"),
            "base" => "show_post_snippets",
            "icon" => "icon-show-post-snippets",
            "class" => "show_post_snippets_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Post Snippets", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_type",
                    "type" => "dropdown",
                    "heading" => __("Post Type", "js_composer"),
                    "admin_label" => true,
                    "value" => array(
                        __("Post", "js_composer") => "post",
                        __("Gallery", "js_composer") => "gallery_item",
                        __("Team", "js_composer") => "team"
                    ),
                    "description" => __("The custom post type whose posts need to be displayed. Examples include post, gallery, team etc.", "js_composer")
                ),
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "heading" => __("Title", "js_composer"),
                    "description" => __("Display a header title for the post snippets.", "js_composer")
                ),
                array(
                    "param_name" => "layout_class",
                    "type" => "textfield",
                    "heading" => __("Layout Class", "js_composer"),
                    "description" => __("The CSS class to be set for the list element (UL) displaying the post snippets (optional). Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.", "js_composer")
                ),
                array(
                    "param_name" => "number_of_columns",
                    "type" => "textfield",
                    "heading" => __("Number of Columns", "js_composer"),
                    "description" => __("The number of columns to display per row of the post snippets", "js_composer")
                ),
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "heading" => __("Number of Posts", "js_composer"),
                    "description" => __("Number of posts to display", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square", "js_composer")
                ),
                array(
                    "param_name" => "no_margin",
                    "type" => "dropdown",
                    "heading" => __("No Margin - Packed Layout", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "js_composer")
                ),
                array(
                    "param_name" => "display_title",
                    "type" => "dropdown",
                    "heading" => __("Display Title", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Specify if the title of the post or custom post type needs to be displayed below the featured image", "js_composer")
                ),
                array(
                    "param_name" => "display_summary",
                    "type" => "dropdown",
                    "heading" => __("Display Summary", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.", "js_composer")
                ),
                array(
                    "param_name" => "show_excerpt",
                    "type" => "dropdown",
                    "heading" => __("Show Excerpt", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Display excerpt for the post/custom post type. Has no effect if Display Summary is set to false.", "js_composer")
                ),
                array(
                    "param_name" => "excerpt_count",
                    "type" => "textfield",
                    "heading" => __("Excerpt Count", "js_composer"),
                    "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "js_composer")
                ),
                array(
                    "param_name" => "hide_thumbnail",
                    "type" => "dropdown",
                    "heading" => __("Hide Thumbnail", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Specify if the thumbnail needs to be hidden", "js_composer")
                ),
                array(
                    "param_name" => "show_meta",
                    "type" => "dropdown",
                    "heading" => __("Display Meta", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Display meta information like the author, date of publishing and number of comments", "js_composer")
                ),
                array(
                    "param_name" => "taxonomy",
                    "type" => "dropdown",
                    "heading" => __("Taxonomy", "js_composer"),
                    "value" => array(
                        __("None", "js_composer") => "",
                        __("Category", "js_composer") => "category",
                        __("Tag", "js_composer") => "post_tag",
                        __("Gallery Category", "js_composer") => "gallery_category",
                        __("Fitness Category", "js_composer") => "fitness_category",
                        __("Team Department", "js_composer") => "department"
                    ),
                    "description" => __("Custom taxonomy to be used for filtering the posts/custom post types displayed like category, department etc.", "js_composer")
                ),
                array(
                    "param_name" => "terms",
                    "type" => "exploded_textarea",
                    "heading" => __("Taxonomy Terms", "js_composer"),
                    "description" => __(" A list of terms of taxonomy specified for which the items needs to be displayed. Divide terms with linebreaks (Enter). <br>Helps filter the results by category/taxonomy, if the these terms are defined for the taxonomy chosen.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Show Portfolio", "js_composer"),
            "base" => "show_portfolio",
            "icon" => "icon-show-portfolio",
            "class" => "show_portfolio_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Portfolio", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "number_of_columns",
                    "type" => "textfield",
                    "heading" => __("Number of Columns", "js_composer"),
                    "description" => __("The number of columns to display per row of the post snippets", "js_composer")
                ),
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "heading" => __("Number of Posts", "js_composer"),
                    "description" => __(" Total number of portfolio items to display.", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square.", "js_composer")
                ),
                array(
                    "param_name" => "filterable",
                    "type" => "dropdown",
                    "heading" => __("Filterable", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("The portfolio items will be filterable based on portfolio categories if set to true.", "js_composer")
                ),
                array(
                    "param_name" => "no_margin",
                    "type" => "dropdown",
                    "heading" => __("No Margin - Packed Layout", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Show Gallery", "js_composer"),
            "base" => "show_gallery",
            "icon" => "icon-show-gallery",
            "class" => "show_gallery_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Gallery", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "number_of_columns",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Number of Columns", "js_composer"),
                    "description" => __("The number of columns to display per row of the post snippets", "js_composer")
                ),
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Number of Posts", "js_composer"),
                    "description" => __(" Total number of Gallery items to display", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square", "js_composer")
                ),
                array(
                    "param_name" => "filterable",
                    "type" => "dropdown",
                    "heading" => __("Filterable", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("The Gallery items will be filterable based on gallery categories if set to true.", "js_composer")
                ),
                array(
                    "param_name" => "no_margin",
                    "type" => "dropdown",
                    "heading" => __("No Margin - Packed Layout", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" If set to true, no margins are maintained between the columns.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Recent Posts", "js_composer"),
            "base" => "recent_posts",
            "icon" => "icon-recent-posts",
            "class" => "recent_posts_extended",
            "category" => __("Blog Posts", "js_composer"),
            "description" => __("Insert Blog Post Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Number of Posts", "js_composer"),
                    "description" => __("Number of posts to display", "js_composer")
                ),
                array(
                    "param_name" => "hide_thumbnail",
                    "type" => "dropdown",
                    "heading" => __("Hide Thumbnail", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Display thumbnail image or hide the same", "js_composer")
                ),
                array(
                    "param_name" => "show_meta",
                    "type" => "dropdown",
                    "heading" => __("Display Meta Information", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Display meta information like the author, date of publishing and number of comments", "js_composer")
                ),
                array(
                    "param_name" => "excerpt_count",
                    "type" => "textfield",
                    "heading" => __("Excerpt Count", "js_composer"),
                    "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Popular Posts", "js_composer"),
            "base" => "popular_posts",
            "icon" => "icon-popular-posts",
            "class" => "popular_posts_extended",
            "category" => __("Blog Posts", "js_composer"),
            "description" => __("Insert Popular Posts Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Number Of Posts", "js_composer"),
                    "description" => __("Number of posts to display", "js_composer")
                ),
                array(
                    "param_name" => "hide_thumbnail",
                    "type" => "dropdown",
                    "heading" => __("Hide Thumbnail", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Display thumbnail image or hide the same", "js_composer")
                ),
                array(
                    "param_name" => "show_meta",
                    "type" => "dropdown",
                    "heading" => __("Display Meta Information", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Display meta information like the author, date of publishing and number of comments", "js_composer")
                ),
                array(
                    "param_name" => "excerpt_count",
                    "type" => "textfield",
                    "heading" => __("Excerpt Count", "js_composer"),
                    "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Category Posts", "js_composer"),
            "base" => "category_posts",
            "icon" => "icon-category-posts",
            "class" => "category_posts_extended",
            "category" => __("Blog Posts", "js_composer"),
            "description" => __("Insert Posts for one or more Categories", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "category_slugs",
                    "type" => "exploded_textarea",
                    "admin_label" => true,
                    "heading" => __("Category Slugs", "js_composer"),
                    "description" => __("The list of posts category slugs. Divide slugs with linebreaks (Enter).", "js_composer")
                ),
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Number of Posts", "js_composer"),
                    "description" => __("Number of posts to display", "js_composer")
                ),
                array(
                    "param_name" => "hide_thumbnail",
                    "type" => "dropdown",
                    "heading" => __("Hide Thumbnail", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Display thumbnail image or hide the same", "js_composer")
                ),
                array(
                    "param_name" => "show_meta",
                    "type" => "dropdown",
                    "heading" => __("Display Meta Information", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Display meta information like the author, date of publishing and number of comments", "js_composer")
                ),
                array(
                    "param_name" => "excerpt_count",
                    "type" => "textfield",
                    "heading" => __("Excerpt Count", "js_composer"),
                    "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Tag Posts", "js_composer"),
            "base" => "tag_posts",
            "icon" => "icon-tag-posts",
            "class" => "tag_posts_extended",
            "category" => __("Blog Posts", "js_composer"),
            "description" => __("Insert Posts of one or more Tags", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "tag_slugs",
                    "type" => "exploded_textarea",
                    "admin_label" => true,
                    "heading" => __("Tag Slugs", "js_composer"),
                    "description" => __("The list of posts tag slugs. Divide slugs with linebreaks (Enter).", "js_composer")
                ),
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Number of Posts", "js_composer"),
                    "description" => __("Number of posts to display", "js_composer")
                ),
                array(
                    "param_name" => "hide_thumbnail",
                    "type" => "dropdown",
                    "heading" => __("Hide Thumbnail", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Display thumbnail image or hide the same", "js_composer")
                ),
                array(
                    "param_name" => "show_meta",
                    "type" => "dropdown",
                    "heading" => __("Display Meta Information", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Display meta information like the author, date of publishing and number of comments", "js_composer")
                ),
                array(
                    "param_name" => "excerpt_count",
                    "type" => "textfield",
                    "heading" => __("Excerpt Count", "js_composer"),
                    "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Show Custom Post Types", "js_composer"),
            "base" => "show_custom_post_types",
            "icon" => "icon-show-custom-post-types",
            "class" => "show_custom_post_types_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Custom Post Types", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_types",
                    "type" => "dropdown",
                    "admin_label" => true,
                    "heading" => __("Post Types", "js_composer"),
                    "value" => array(
                        __("Post", "js_composer") => "post",
                        __("Gallery", "js_composer") => "gallery_item",
                        __("Team", "js_composer") => "team"
                    ),
                    "description" => __("The post type whose posts need to be displayed.", "js_composer")
                ),
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Number of Posts", "js_composer"),
                    "description" => __("Number of posts to display", "js_composer")
                ),
                array(
                    "param_name" => "hide_thumbnail",
                    "type" => "dropdown",
                    "heading" => __("Hide Thumbnail", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Display thumbnail image or hide the same", "js_composer")
                ),
                array(
                    "param_name" => "show_meta",
                    "type" => "dropdown",
                    "heading" => __("Display Meta Information", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Display meta information like the author, date of publishing and number of comments", "js_composer")
                ),
                array(
                    "param_name" => "excerpt_count",
                    "type" => "textfield",
                    "heading" => __("Excerpt Count", "js_composer"),
                    "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        $pricing_list = get_posts(array(
            'post_type' => 'pricing',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));

        $pricing_array = array();
        foreach ($pricing_list as $pricing_item) {
            $pricing_array[$pricing_item->post_title] = $pricing_item->ID;
        }

        vc_map(array(
            "name" => __("Pricing Plans", "js_composer"),
            "base" => "pricing_plans",
            "icon" => "icon-pricing-plans",
            "class" => "pricing_plans_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Pricing Plans", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "heading" => __("Number of Pricing Columns", "js_composer"),
                    "description" => __("The number of pricing columns to be displayed. By default displays all of the custom posts entered as pricing in the Pricing Plan tab of WordPress admin (optional).", "js_composer")
                ),
                array(
                    "param_name" => "pricing_ids",
                    "type" => "checkbox",
                    "heading" => __("Choose Pricing Posts", "js_composer"),
                    "value" => $pricing_array,
                    "description" => __("Choose the custom posts created in the Pricing tab of the WordPress Admin that you want displayed. Helps to filter the pricing plans for display (optional). ", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        $testimonials_list = get_posts(array(
            'post_type' => 'testimonials',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));

        $testimonials_array = array();
        foreach ($testimonials_list as $testimonial_item) {
            $testimonials_array[$testimonial_item->post_title] = $testimonial_item->ID;
        }

        vc_map(array(
            "name" => __("Testimonials Slider", "js_composer"),
            "base" => "testimonials_slider",
            "icon" => "icon-testimonials_slider",
            "class" => "testimonials_slider_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Testimonials Slider", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "heading" => __("Number of Testimonials", "js_composer"),
                    "description" => __("The number of testimonials to be displayed.", "js_composer")
                ),
                array(
                    "param_name" => "testimonial_ids",
                    "type" => "checkbox",
                    "heading" => __("Testimonials", "js_composer"),
                    "value" => $testimonials_array,
                    "description" => __("Choose the custom posts created in the Testimonials tab of the WordPress Admin that you want displayed. Helps to filter the testimonials for display (optional).", "js_composer")
                ),
                array(
                    "param_name" => "type",
                    "type" => "textfield",
                    "heading" => __("Type", "js_composer"),
                    "description" => __("Constructs and sets a unique CSS class for the slider. (optional).", "js_composer")
                ),
                array(
                    "param_name" => "slideshow_speed",
                    "type" => "textfield",
                    "value" => 5000,
                    "heading" => __("Slideshow Speed", "js_composer"),
                    "description" => __("Set the speed of the slideshow cycling, in milliseconds", "js_composer")
                ),
                array(
                    "param_name" => "animation_speed",
                    "type" => "textfield",
                    "value" => 600,
                    "heading" => __("Animation Speed", "js_composer"),
                    "description" => __("Set the speed of animations, in milliseconds.", "js_composer")
                ),
                array(
                    "param_name" => "animation",
                    "type" => "dropdown",
                    "heading" => __("Animation", "js_composer"),
                    "value" => array(
                        __("Slide", "js_composer") => "slide",
                        __("Fade", "js_composer") => "fade"
                    ),
                    "description" => __("Select your animation type, fade or slide.", "js_composer")
                ),
                array(
                    "param_name" => "pause_on_action",
                    "type" => "dropdown",
                    "heading" => __("Pause on Action", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Pause the slideshow when interacting with control elements, highly recommended.", "js_composer")
                ),
                array(
                    "param_name" => "pause_on_hover",
                    "type" => "dropdown",
                    "heading" => __("Pause on Hover", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering. ", "js_composer")
                ),
                array(
                    "param_name" => "direction_nav",
                    "type" => "dropdown",
                    "heading" => __("Direction Navigation", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Create navigation for previous/next navigation.", "js_composer")
                ),
                array(
                    "param_name" => "control_nav",
                    "type" => "dropdown",
                    "heading" => __("Control Navigation", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.", "js_composer")
                ),
                array(
                    "param_name" => "easing",
                    "type" => "textfield",
                    "heading" => __("Easing", "js_composer"),
                    "description" => __(" Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        vc_map(array(
            "name" => __("Testimonials Slider 2", "js_composer"),
            "base" => "testimonials_slider2",
            "icon" => "icon-testimonials_slider2",
            "class" => "testimonials_slider2_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Testimonials Slider 2", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "heading" => __("Number of Testimonials2", "js_composer"),
                    "description" => __("The number of testimonials to be displayed.", "js_composer")
                ),
                array(
                    "param_name" => "testimonial_ids",
                    "type" => "checkbox",
                    "heading" => __("Testimonials", "js_composer"),
                    "value" => $testimonials_array,
                    "description" => __("Choose the custom posts created in the Testimonials tab of the WordPress Admin that you want displayed. Helps to filter the testimonials for display (optional).", "js_composer")
                ),
                array(
                    "param_name" => "type",
                    "type" => "textfield",
                    "heading" => __("Type", "js_composer"),
                    "description" => __("Constructs and sets a unique CSS class for the slider. (optional).", "js_composer")
                ),
                array(
                    "param_name" => "slideshow_speed",
                    "type" => "textfield",
                    "value" => 5000,
                    "heading" => __("Slideshow Speed", "js_composer"),
                    "description" => __("Set the speed of the slideshow cycling, in milliseconds", "js_composer")
                ),
                array(
                    "param_name" => "animation_speed",
                    "type" => "textfield",
                    "value" => 600,
                    "heading" => __("Animation Speed", "js_composer"),
                    "description" => __("Set the speed of animations, in milliseconds.", "js_composer")
                ),
                array(
                    "param_name" => "animation",
                    "type" => "dropdown",
                    "heading" => __("Animation", "js_composer"),
                    "value" => array(
                        __("Slide", "js_composer") => "slide",
                        __("Fade", "js_composer") => "fade"
                    ),
                    "description" => __("Select your animation type, fade or slide.", "js_composer")
                ),
                array(
                    "param_name" => "pause_on_action",
                    "type" => "dropdown",
                    "heading" => __("Pause on Action", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Pause the slideshow when interacting with control elements, highly recommended.", "js_composer")
                ),
                array(
                    "param_name" => "pause_on_hover",
                    "type" => "dropdown",
                    "heading" => __("Pause on Hover", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering. ", "js_composer")
                ),
                array(
                    "param_name" => "direction_nav",
                    "type" => "dropdown",
                    "heading" => __("Direction Navigation", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Create navigation for previous/next navigation.", "js_composer")
                ),
                array(
                    "param_name" => "control_nav",
                    "type" => "dropdown",
                    "heading" => __("Control Navigation", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.", "js_composer")
                ),
                array(
                    "param_name" => "easing",
                    "type" => "textfield",
                    "heading" => __("Easing", "js_composer"),
                    "description" => __(" Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        $team_members = get_posts(array(
            'post_type' => 'team',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));

        $team_array = array();
        foreach ($team_members as $team_member) {
            $team_array[$team_member->post_title] = $team_member->ID;
        }

        vc_map(array(
            "name" => __("Team", "js_composer"),
            "base" => "team",
            "icon" => "icon-team",
            "class" => "team_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Team", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "heading" => __("Number of Team Members", "js_composer"),
                    "description" => __("The number of team members to be displayed. By default displays all of the custom posts entered as team member in the Team Profiles tab of the WordPress Admin (optional).", "js_composer")
                ),
                array(
                    "param_name" => "team_member_ids",
                    "type" => "checkbox",
                    "heading" => __("Team Members", "js_composer"),
                    "value" => $team_array,
                    "description" => __("Choose the custom posts created in the Team Profiles tab of the WordPress Admin that you want displayed. Helps to filter the team members for display (optional).", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));
        vc_map(array(
            "name" => __("Team Slider", "js_composer"),
            "base" => "team_slider",
            "icon" => "icon-team-slider",
            "class" => "team_slider_extended",
            "category" => __("Custom Posts", "js_composer"),
            "description" => __("Insert Team Slider", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "heading" => __("Number of Team Members", "js_composer"),
                    "description" => __("The number of team members to be displayed. By default displays all of the custom posts entered as team member in the Team Profiles tab of the WordPress Admin (optional).", "js_composer")
                ),
                array(
                    "param_name" => "team_member_ids",
                    "type" => "checkbox",
                    "heading" => __("Team Members", "js_composer"),
                    "value" => $team_array,
                    "description" => __("Choose the custom posts created in the Team Profiles tab of the WordPress Admin that you want displayed. Helps to filter the team members for display (optional).", "js_composer")
                ),
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Responsive Slider", "js_composer"),
            "base" => "responsive_slider",
            "icon" => "icon-responsive-slider",
            "class" => "responsive_slider_extended",
            "category" => __("Sliders", "js_composer"),
            "description" => __("Insert Slider", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "type",
                    "type" => "textfield",
                    "heading" => __("Type", "js_composer"),
                    "description" => __("Constructs and sets a unique CSS class for the slider. (optional).", "js_composer")
                ),
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Style", "js_composer"),
                    "description" => __("The inline CSS applied to the slider container DIV element.(optional)", "js_composer")
                ),
                array(
                    "param_name" => "slideshow_speed",
                    "type" => "textfield",
                    "value" => 5000,
                    "heading" => __("Slideshow Speed", "js_composer"),
                    "description" => __("Set the speed of the slideshow cycling, in milliseconds", "js_composer")
                ),
                array(
                    "param_name" => "animation_speed",
                    "type" => "textfield",
                    "value" => 600,
                    "heading" => __("Animation Speed", "js_composer"),
                    "description" => __("Set the speed of animations, in milliseconds.", "js_composer")
                ),
                array(
                    "param_name" => "animation",
                    "type" => "dropdown",
                    "heading" => __("Animation", "js_composer"),
                    "value" => array(
                        __("Fade", "js_composer") => "fade",
                        __("Slide", "js_composer") => "slide"
                    ),
                    "description" => __("Select your animation type, fade or slide.", "js_composer")
                ),
                array(
                    "param_name" => "pause_on_action",
                    "type" => "dropdown",
                    "heading" => __("Pause on Action", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Pause the slideshow when interacting with control elements, highly recommended.", "js_composer")
                ),
                array(
                    "param_name" => "pause_on_hover",
                    "type" => "dropdown",
                    "heading" => __("Pause on Hover", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering. ", "js_composer")
                ),
                array(
                    "param_name" => "direction_nav",
                    "type" => "dropdown",
                    "heading" => __("Direction Navigation", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __(" Create navigation for previous/next navigation.", "js_composer")
                ),
                array(
                    "param_name" => "control_nav",
                    "type" => "dropdown",
                    "heading" => __("Control Navigation", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.", "js_composer")
                ),
                array(
                    "param_name" => "easing",
                    "type" => "textfield",
                    "value" => "swing",
                    "heading" => __("Easing", "js_composer"),
                    "description" => __(" Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!", "js_composer")
                ),
                array(
                    "param_name" => "loop",
                    "type" => "dropdown",
                    "heading" => __("Loop", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Should the animation loop?", "js_composer")
                ),
                array(
                    "param_name" => "slideshow",
                    "type" => "dropdown",
                    "heading" => __("Slideshow", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Animate slider automatically without user intervention.", "js_composer")
                ),
                array(
                    "param_name" => "controls_container",
                    "type" => "textfield",
                    "heading" => __("Controls Container", "js_composer"),
                    "description" => __("Advanced Use only - Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be .flexslider-container. Property is ignored if given element is not found.", "js_composer")
                ),
                array(
                    "param_name" => "manual_controls",
                    "type" => "textfield",
                    "heading" => __("Manual Controls", "js_composer"),
                    "description" => __("Advanced Use only - Selector: Declare custom control navigation. Examples would be .flex-control-nav li or #tabs-nav li img, etc. The number of elements in your controlNav should match the number of slides/tabs.", "js_composer")
                ),
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "heading" => __("Slider Content", "js_composer"),
                    "description" => __("Add the list content that will act as slides for the slider.
                    <br>Use this shortcode to create a slider out of any HTML content. All it requires a UL element with children to show as seen below.<br>
&lt;ul&gt;<br>
	&lt;li&gt;Slide 1 content goes here.&lt;/li&gt;<br>
	&lt;li&gt;Slide 2 content goes here.&lt;/li&gt;<br>
	&lt;li&gt;Slide 3 content goes here.&lt;/li&gt;<br>
&lt;/ul&gt;", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        vc_map(array(
            "name" => __("Device Slider", "js_composer"),
            "base" => "device_slider",
            "icon" => "icon-device-slider",
            "class" => "device_slider_extended",
            "category" => __("Sliders", "js_composer"),
            "description" => __("Insert Slider Shortcode", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "device",
                    "type" => "dropdown",
                    "admin_label" => true,
                    "heading" => __("Select Slider Type", "js_composer"),
                    "value" => array(
                        __("iPhone", "js_composer") => "iphone",
                        __("Galaxy S4", "js_composer") => "galaxys4",
                        __("HTC One", "js_composer") => "htcone",
                        __("iPad", "js_composer") => "ipad",
                        __("iMac", "js_composer") => "imac",
                        __("MacBook", "js_composer") => "macbook",
                        __("Browser", "js_composer") => "browser"
                    ),
                    "description" => __("The device type to decide on the type of slider desired.", "js_composer")
                ),
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Style", "js_composer"),
                    "description" => __("The inline CSS applied to the slider container DIV element.", "js_composer")
                ),
                array(
                    "param_name" => "slideshow_speed",
                    "type" => "textfield",
                    "value" => 5000,
                    "heading" => __("Slideshow Speed", "js_composer"),
                    "description" => __("Set the speed of the slideshow cycling, in milliseconds", "js_composer")
                ),
                array(
                    "param_name" => "animation_speed",
                    "type" => "textfield",
                    "value" => 600,
                    "heading" => __("Animation Speed", "js_composer"),
                    "description" => __("Set the speed of animations, in milliseconds.", "js_composer")
                ),
                array(
                    "param_name" => "animation",
                    "type" => "dropdown",
                    "heading" => __("Animation", "js_composer"),
                    "value" => array(
                        __("slide", "js_composer") => "slide",
                        __("fade", "js_composer") => "fade"
                    ),
                    "description" => __("Select your animation type, 'fade' or 'slide'.", "js_composer")
                ),
                array(
                    "param_name" => "pause_on_action",
                    "type" => "dropdown",
                    "heading" => __("Pause On Action", "js_composer"),
                    "value" => array(
                        __("true", "js_composer") => "true",
                        __("false", "js_composer") => "false"
                    ),
                    "description" => __("Pause the slideshow when interacting with control elements, highly recommended.", "js_composer")
                ),
                array(
                    "param_name" => "pause_on_hover",
                    "type" => "dropdown",
                    "heading" => __("Pause On Hover", "js_composer"),
                    "value" => array(
                        __("true", "js_composer") => "true",
                        __("false", "js_composer") => "false"
                    ),
                    "description" => __("Pause the slideshow when hovering over slider, then resume when no longer hovering. ", "js_composer")
                ),
                array(
                    "param_name" => "direction_nav",
                    "type" => "dropdown",
                    "heading" => __("Direction Navigation", "js_composer"),
                    "value" => array(
                        __("true", "js_composer") => "true",
                        __("false", "js_composer") => "false"
                    ),
                    "description" => __(" Create navigation for previous/next navigation?", "js_composer")
                ),
                array(
                    "param_name" => "control_nav",
                    "type" => "dropdown",
                    "heading" => __("Control Navigation", "js_composer"),
                    "value" => array(
                        __("false", "js_composer") => "false",
                        __("true", "js_composer") => "true"
                    ),
                    "description" => __("Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.", "js_composer")
                ),
                array(
                    "param_name" => "easing",
                    "type" => "textfield",
                    "heading" => __("Easing", "js_composer"),
                    "description" => __(" Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!", "js_composer")
                ),
                array(
                    "param_name" => "loop",
                    "type" => "dropdown",
                    "heading" => __("Loop", "js_composer"),
                    "value" => array(
                        __("true", "js_composer") => "true",
                        __("false", "js_composer") => "false"
                    ),
                    "description" => __("Should the animation loop?", "js_composer")
                ),
                array(
                    "param_name" => "image_urls",
                    "type" => "textfield",
                    "heading" => __("Image URLs", "js_composer"),
                    "description" => __("Comma separated list of URLs pointing to the images.", "js_composer")
                ),
                array(
                    "param_name" => "image_ids",
                    "type" => "attach_images",
                    "heading" => __("Device Images", "js_composer"),
                    "description" => __("Choose images for displaying in the device slider.", "js_composer")
                ),
                array(
                    "param_name" => "browser_url",
                    "type" => "textfield",
                    "heading" => __("Browser URL", "js_composer"),
                    "description" => __("If the device specified is browser or if [browser_slider], provide the URL to be displayed in the address bar of the browser.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        vc_map(array(
            "name" => __("Responsive Carousel", "js_composer"),
            "base" => "responsive_carousel",
            "icon" => "icon-responsive-carousel",
            "class" => "responsive_carousel_extended",
            "category" => __("Sliders", "js_composer"),
            "description" => __("Insert Carousel", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "heading" => __("Id", "js_composer"),
                    "description" => __("The element id to be set for the wrapper element created. (optional).", "js_composer")
                ),
                array(
                    "param_name" => "layout_class",
                    "type" => "textfield",
                    "heading" => __("Layout Class", "js_composer"),
                    "description" => __("The CSS class to be set for the wrapper div for the carousel. Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.", "js_composer")
                ),
                array(
                    "param_name" => "pagination_speed",
                    "type" => "textfield",
                    "value" => 800,
                    "heading" => __("Pagination Speed", "js_composer"),
                    "description" => __("Pagination speed in milliseconds. 800 is the default.", "js_composer")
                ),
                array(
                    "param_name" => "slide_speed",
                    "type" => "textfield",
                    "value" => 200,
                    "heading" => __("Slide Speed", "js_composer"),
                    "description" => __("Slide speed in milliseconds. 200 is the default.", "js_composer")
                ),
                array(
                    "param_name" => "rewind_speed",
                    "type" => "textfield",
                    "value" => 1000,
                    "heading" => __("Rewind Speed", "js_composer"),
                    "description" => __("Rewind speed in milliseconds. 1000 is the default.", "js_composer")
                ),
                array(
                    "param_name" => "stop_on_hover",
                    "type" => "dropdown",
                    "heading" => __("Stop on Hover", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Stop autoplay on mouse hover.", "js_composer")
                ),
                array(
                    "param_name" => "auto_play",
                    "type" => "dropdown",
                    "heading" => __("Auto Play", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Change to any integer for example autoPlay : 5000 to play every 5 seconds. If you set autoPlay: true default speed will be 5 seconds. ", "js_composer")
                ),
                array(
                    "param_name" => "scroll_per_page",
                    "type" => "dropdown",
                    "heading" => __("Scroll Per Page", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.", "js_composer")
                ),
                array(
                    "param_name" => "navigation",
                    "type" => "dropdown",
                    "heading" => __("Display Navigation", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Display 'next' and 'prev' buttons..", "js_composer")
                ),
                array(
                    "param_name" => "pagination",
                    "type" => "dropdown",
                    "heading" => __("Display Pagination", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Show pagination.", "js_composer")
                ),
                array(
                    "param_name" => "items",
                    "type" => "textfield",
                    "value" => 5,
                    "heading" => __("Number of Items to display", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the widest browser width. 5 is the default.", "js_composer")
                ),
                array(
                    "param_name" => "items_desktop",
                    "type" => "textfield",
                    "heading" => __("Items in Desktop", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the desktop browser width (<1200px).", "js_composer")
                ),
                array(
                    "param_name" => "items_desktop_small",
                    "type" => "textfield",
                    "heading" => __("Number of Items to display in Small Desktop", "js_composer"),
                    "description" => __(" This variable allows you to set the maximum amount of items displayed at a time with the smaller desktop browser width(<980px).", "js_composer")
                ),
                array(
                    "param_name" => "items_tablet",
                    "type" => "textfield",
                    "heading" => __("Number of Items to display in Tablet", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the tablet browser width(<769px).", "js_composer")
                ),
                array(
                    "param_name" => "items_tablet_small",
                    "type" => "textfield",
                    "heading" => __("Number of Items to display in Small Tablet", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the smaller tablet browser width.", "js_composer")
                ),
                array(
                    "param_name" => "items_mobile",
                    "type" => "textfield",
                    "heading" => __("Number of Items to display in Mobile", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the smartphone mobile browser width(<480px).", "js_composer")
                ),
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "heading" => __("Carousel Content", "js_composer"),
                    "description" => __("Add the content that will act as slides for the carousel.
                    <br>Use this shortcode to create a carousel out of any HTML content. All it requires a DIV ([wrap] shortcode) element with children to show as seen below.<br>
<br>[wrap]Slide 1 content goes here.[/wrap]<br>

[wrap]Slide 2 content goes here.[/wrap]<br>

[wrap]Slide 3 content goes here.[/wrap]", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Post Snippets Carousel", "js_composer"),
            "base" => "post_snippets_carousel",
            "icon" => "icon-post-snippets-carousel",
            "class" => "post_snippets_carousel_extended",
            "category" => __("Sliders", "js_composer"),
            "description" => __("Insert Post Snippets Carousel", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "heading" => __("Id", "js_composer"),
                    "description" => __("The element id to be set for the wrapper element created. (optional).", "js_composer")
                ),
                array(
                    "param_name" => "layout_class",
                    "type" => "textfield",
                    "heading" => __("Layout Class", "js_composer"),
                    "description" => __("The CSS class to be set for the wrapper div for the carousel. Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.", "js_composer")
                ),
                array(
                    "param_name" => "post_type",
                    "type" => "dropdown",
                    "heading" => __("Post Type", "js_composer"),
                    "admin_label" => true,
                    "value" => array(
                        __("Post", "js_composer") => "post",
                        __("Gallery", "js_composer") => "gallery_item",
                        __("Team", "js_composer") => "team"
                    ),
                    "description" => __("The custom post type whose posts need to be displayed. Examples include post, gallery, team etc.", "js_composer")
                ),
                array(
                    "param_name" => "post_count",
                    "type" => "textfield",
                    "value" => 6,
                    "heading" => __("Number of Posts", "js_composer"),
                    "description" => __("Number of posts to display", "js_composer")
                ),
                array(
                    "param_name" => "pagination_speed",
                    "type" => "textfield",
                    "value" => 800,
                    "heading" => __("Pagination Speed", "js_composer"),
                    "description" => __("Pagination speed in milliseconds. 800 is the default.", "js_composer")
                ),
                array(
                    "param_name" => "slide_speed",
                    "type" => "textfield",
                    "value" => 200,
                    "heading" => __("Slide Speed", "js_composer"),
                    "description" => __("Slide speed in milliseconds. 200 is the default.", "js_composer")
                ),
                array(
                    "param_name" => "rewind_speed",
                    "type" => "textfield",
                    "value" => 1000,
                    "heading" => __("Rewind Speed", "js_composer"),
                    "description" => __("Rewind speed in milliseconds. 1000 is the default.", "js_composer")
                ),
                array(
                    "param_name" => "stop_on_hover",
                    "type" => "dropdown",
                    "heading" => __("Stop on Hover", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Stop autoplay on mouse hover.", "js_composer")
                ),
                array(
                    "param_name" => "auto_play",
                    "type" => "dropdown",
                    "heading" => __("Auto Play", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Change to any integer for example autoPlay : 5000 to play every 5 seconds. If you set autoPlay: true default speed will be 5 seconds. ", "js_composer")
                ),
                array(
                    "param_name" => "scroll_per_page",
                    "type" => "dropdown",
                    "heading" => __("Scroll Per Page", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.", "js_composer")
                ),
                array(
                    "param_name" => "navigation",
                    "type" => "dropdown",
                    "heading" => __("Display Navigation", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Display 'next' and 'prev' buttons..", "js_composer")
                ),
                array(
                    "param_name" => "pagination",
                    "type" => "dropdown",
                    "heading" => __("Display Pagination", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __("Show pagination.", "js_composer")
                ),
                array(
                    "param_name" => "items",
                    "type" => "textfield",
                    "value" => 3,
                    "heading" => __("Number of Items to display", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the widest browser width. 5 is the default.", "js_composer")
                ),
                array(
                    "param_name" => "items_desktop",
                    "type" => "textfield",
                    "value" => 3,
                    "heading" => __("Items in Desktop", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the desktop browser width (<1200px).", "js_composer")
                ),
                array(
                    "param_name" => "items_desktop_small",
                    "type" => "textfield",
                    "value" => 2,
                    "heading" => __("Number of Items to display in Small Desktop", "js_composer"),
                    "description" => __(" This variable allows you to set the maximum amount of items displayed at a time with the smaller desktop browser width(<980px).", "js_composer")
                ),
                array(
                    "param_name" => "items_tablet",
                    "type" => "textfield",
                    "value" => 2,
                    "heading" => __("Number of Items to display in Tablet", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the tablet browser width(<769px).", "js_composer")
                ),
                array(
                    "param_name" => "items_tablet_small",
                    "type" => "textfield",
                    "value" => 1,
                    "heading" => __("Number of Items to display in Small Tablet", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the smaller tablet browser width.", "js_composer")
                ),
                array(
                    "param_name" => "items_mobile",
                    "type" => "textfield",
                    "value" => 1,
                    "heading" => __("Number of Items to display in Mobile", "js_composer"),
                    "description" => __("This variable allows you to set the maximum amount of items displayed at a time with the smartphone mobile browser width(<480px).", "js_composer")
                ),
                array(
                    "param_name" => "image_size",
                    "type" => "dropdown",
                    "heading" => __("Image Size", "js_composer"),
                    "value" => array(
                        __("Medium", "js_composer") => "medium",
                        __("Large", "js_composer") => "large",
                        __("Full", "js_composer") => "full",
                        __("Square", "js_composer") => "square",
                        __("Mini", "js_composer") => "mini",
                        __("Small", "js_composer") => "small"
                    ),
                    "description" => __(" Can be mini, small, medium, large, full, square", "js_composer")
                ),
                array(
                    "param_name" => "display_title",
                    "type" => "dropdown",
                    "heading" => __("Display Title", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Specify if the title of the post or custom post type needs to be displayed below the featured image", "js_composer")
                ),
                array(
                    "param_name" => "display_summary",
                    "type" => "dropdown",
                    "heading" => __("Display Summary", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.", "js_composer")
                ),
                array(
                    "param_name" => "show_excerpt",
                    "type" => "dropdown",
                    "heading" => __("Show Excerpt", "js_composer"),
                    "value" => array(
                        __("True", "js_composer") => "true",
                        __("False", "js_composer") => "false"
                    ),
                    "description" => __(" Display excerpt for the post/custom post type. Has no effect if Display Summary is set to false.", "js_composer")
                ),
                array(
                    "param_name" => "excerpt_count",
                    "type" => "textfield",
                    "value" => 100,
                    "heading" => __("Excerpt Count", "js_composer"),
                    "description" => __(" The excerpt displayed is truncated to the number of characters specified with this parameter.", "js_composer")
                ),
                array(
                    "param_name" => "hide_thumbnail",
                    "type" => "dropdown",
                    "heading" => __("Hide Thumbnail", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("Specify if the thumbnail needs to be hidden", "js_composer")
                ),
                array(
                    "param_name" => "show_meta",
                    "type" => "dropdown",
                    "heading" => __("Display Meta", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Display meta information like the author, date of publishing and number of comments", "js_composer")
                ),
                array(
                    "param_name" => "taxonomy",
                    "type" => "dropdown",
                    "heading" => __("Taxonomy", "js_composer"),
                    "value" => array(
                        __("None", "js_composer") => "",
                        __("Category", "js_composer") => "category",
                        __("Tag", "js_composer") => "post_tag",
                        __("Gallery Category", "js_composer") => "gallery_category",
                        __("Fitness Category", "js_composer") => "fitness_category",
                        __("Team Department", "js_composer") => "department"
                    ),
                    "description" => __("Custom taxonomy to be used for filtering the posts/custom post types displayed like category, department etc.", "js_composer")
                ),
                array(
                    "param_name" => "terms",
                    "type" => "exploded_textarea",
                    "heading" => __("Taxonomy Terms", "js_composer"),
                    "description" => __(" A list of terms of taxonomy specified for which the items needs to be displayed. Divide terms with linebreaks (Enter). <br>Helps filter the results by category/taxonomy, if the these terms are defined for the taxonomy chosen.", "js_composer")
                ),
                array(
                    "param_name" => "no_margin",
                    "type" => "dropdown",
                    "heading" => __("No Margin - Packed Layout", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Skills Bar", "js_composer"),
            "base" => "animating_skills_bar",
            "icon" => "icon-skills-bar",
            "class" => "skills_bar_extended",
            "category" => __( "Stats", "js_composer" ),
            "description" => __("Add Stats Bar", "js_composer"),
            "params" => array(
                array (
                    "param_name" => "title",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Title", "js_composer"),
                    "description" => __("The title indicating the skills bar title", "js_composer")
                ),
                array (
                    "param_name" => "value",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Percentage Value", "js_composer"),
                    "description" => __("The percentage value for the percentage skills to be displayed", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        vc_map(array(
            "name" => __("Animate Number", "js_composer"),
            "base" => "animate_number",
            "icon" => "icon-animate-number",
            "class" => "animate_number_extended",
            "category" => __( "Stats", "js_composer" ),
            "description" => __("Add Animated Number", "js_composer"),
            "params" => array(
                array (
                    "param_name" => "title",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Title", "js_composer"),
                    "description" => __("The title indicating the stats title.", "js_composer")
                ),
                array (
                    "param_name" => "start_value",
                    "type" => "textfield",
                    "heading" => __("Start Value", "js_composer"),
                    "description" => __("The starting value for the animation which displays a counter that animates to the end value specified here.", "js_composer")
                ),
                array (
                    "param_name" => "end_value",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Value", "js_composer"),
                    "description" => __("The ending value for the animation which displays a counter that animates from the start value above to the end value specified here.", "js_composer")
                ),
                array (
                    "param_name" => "icon",
                    "type" => "textfield",
                    "heading" => __("Icon", "js_composer"),
                    "description" => __("The font icon to be displayed for the statistic being displayed. The class names are listed at http://portfoliotheme.org/support/faqs/how-to-use-1500-icons-bundled-with-the-agile-theme/", "js_composer")
                ),
                array (
                    "param_name" => "icon_image_id",
                    "type" => "attach_image",
                    "heading" => __("Icon Image", "js_composer"),
                    "description" => __("Choose a custom icon image for the animating statistic.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        vc_map(array(
            "name" => __("Piechart", "js_composer"),
            "base" => "piechart",
            "icon" => "icon-piechart",
            "class" => "piechart_extended",
            "category" => __("Stats", "js_composer"),
            "description" => __("Insert Piechart", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Title", "js_composer"),
                    "description" => __("The title of the Piechart.", "js_composer")
                ),
                array(
                    "param_name" => "percent",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Percentage Value", "js_composer"),
                    "description" => __("The percentage value for the percentage stats.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Message", "js_composer"),
            "base" => "message",
            "icon" => "icon-message",
            "class" => "message_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Message", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "message_type",
                    "type" => "dropdown",
                    "heading" => __("Message Type", "js_composer"),
                    "value" => array(
                        __("Success", "js_composer") => "success",
                        __("Info", "js_composer") => "info",
                        __("Warning", "js_composer") => "warning",
                        __("Tip", "js_composer") => "tip",
                        __("Note", "js_composer") => "note",
                        __("Error", "js_composer") => "errors",
                        __("Attention", "js_composer") => "attention"
                    ),
                    "description" => __("", "js_composer")
                ),
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "heading" => __("Title", "js_composer"),
                    "description" => __("Title displayed above the text in bold.", "js_composer")
                ),
                array(
                    "param_name" => "message_text",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Message Text", "js_composer"),
                    "description" => __("The message text to be displayed.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Divider", "js_composer"),
            "base" => "divider",
            "icon" => "icon-divider",
            "class" => "divider_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Divider", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the DIV element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "divider_type",
                    "type" => "dropdown",
                    "admin_label" => true,
                    "heading" => __("Divider Type", "js_composer"),
                    "value" => array(
                        __("Divider", "js_composer") => "divider",
                        __("Divider Line", "js_composer") => "divider_line",
                        __("Divider Space", "js_composer") => "divider_space",
                        __("Divider Fancy", "js_composer") => "divider_fancy",
                        __("Divider with Top Link", "js_composer") => "divider_top",
                        __("Clear", "js_composer") => "clear"
                    ),
                    "description" => __("Type of Divider", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Wrap", "js_composer"),
            "base" => "wrap",
            "icon" => "icon-wrap",
            "class" => "wrap_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Wrap Element", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "id",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Id", "js_composer"),
                    "description" => __("The element id to be set for the DIV element created (optional).", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Class", "js_composer"),
                    "description" => __(" Custom CSS class name to be set for the DIV element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Wrap Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the DIV element created (optional) ", "js_composer")
                ),
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "admin_label" => true,
                    "heading" => __("Content", "js_composer"),
                    "description" => __("Specify the content for the DIV element created.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));

        vc_map(array(
            "name" => __("Box Frame", "js_composer"),
            "base" => "box_frame",
            "icon" => "icon-box-frame",
            "class" => "box_frame_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Box Frame", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the div element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Class", "js_composer"),
                    "description" => __(" Custom CSS class name to be set for the div element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Title", "js_composer"),
                    "description" => __("Title for the box.", "js_composer")
                ),
                array(
                    "param_name" => "align",
                    "type" => "dropdown",
                    "heading" => __("Alignment", "js_composer"),
                    "value" => array(
                        __("None", "js_composer") => "none",
                        __("Left", "js_composer") => "left",
                        __("Center", "js_composer") => "center",
                        __("Right", "js_composer") => "right"
                    ),
                    "description" => __("Choose Alignment", "js_composer")
                ),
                array(
                    "param_name" => "width",
                    "type" => "textfield",
                    "heading" => __("Width", "js_composer"),
                    "description" => __("Custom width of the box. Do include px suffix or another appropriate suffix for width.", "js_composer")
                ),
                array(
                    "param_name" => "inner_style",
                    "type" => "textfield",
                    "heading" => __("Inner Style", "js_composer"),
                    "description" => __("Inline CSS styling for the inner box (optional)", "js_composer")
                ),
                array(
                    "param_name" => "content",
                    "type" => "textarea_html",
                    "heading" => __("Box Content", "js_composer"),
                    "description" => __("Specify the content for the Box Frame.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Clear", "js_composer"),
            "base" => "clear",
            "icon" => "icon-clear",
            "class" => "clear_extended",
            "category" => __("Elements", "js_composer"),
            "description" => __("Insert Clear", "js_composer"),
            "params" => array(),
            "show_settings_on_create" => false
        ));

        vc_map(array(
            "name" => __("Space", "js_composer"),
            "icon" => "icon-space",
            "base" => "clearing_space",
            "description" => "Add space between elements",
            "class" => "space_extended",
            "category" => __("Typography", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "height",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Height of the space(px)", "js_composer"),
                    "value" => 60,
                    "description" => __("Set height of the space. You can add white space between elements to separate them nicely.", "js_composer")
                )
            )
        ));

        vc_map(array(
            "name" => __("Header Fancy", "js_composer"),
            "base" => "header_fancy",
            "icon" => "icon-header-fancy",
            "class" => "header_fancy_extended",
            "category" => __("Typography", "js_composer"),
            "description" => __("Insert Header Fancy", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "style",
                    "type" => "textfield",
                    "heading" => __("Style", "js_composer"),
                    "description" => __("Inline CSS styling applied for the DIV element created (optional);", "js_composer")
                ),
                array(
                    "param_name" => "class",
                    "type" => "textfield",
                    "heading" => __("Class", "js_composer"),
                    "description" => __(" Custom CSS class name to be set for the div element created (optional)", "js_composer")
                ),
                array(
                    "param_name" => "text",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Text", "js_composer"),
                    "description" => __("The text to be displayed in the center of the header.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Social List", "js_composer"),
            "base" => "social_list",
            "icon" => "icon-social-list",
            "class" => "social_list_extended",
            "category" => __("Social", "js_composer"),
            "description" => __("Insert Social List", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "email",
                    "type" => "textfield",
                    "heading" => __("Email", "js_composer"),
                    "description" => __("The email address to be used.", "js_composer")
                ),
                array(
                    "param_name" => "align",
                    "type" => "dropdown",
                    "heading" => __("Alignment", "js_composer"),
                    "value" => array(
                        __("None", "js_composer") => "none",
                        __("Left", "js_composer") => "left",
                        __("Center", "js_composer") => "center",
                        __("Right", "js_composer") => "right"
                    ),
                    "description" => __("Choose Alignment", "js_composer")
                ),
                array(
                    "param_name" => "facebook_url",
                    "type" => "textfield",
                    "heading" => __("Facebook URL", "js_composer"),
                    "description" => __("The URL of the Facebook page.", "js_composer")
                ),
                array(
                    "param_name" => "twitter_url",
                    "type" => "textfield",
                    "heading" => __("Twitter URL", "js_composer"),
                    "description" => __("The URL of the Twitter page.", "js_composer")
                ),
                array(
                    "param_name" => "flickr_url",
                    "type" => "textfield",
                    "heading" => __("Flickr URL", "js_composer"),
                    "description" => __("The URL of the Flickr page.", "js_composer")
                ),
                array(
                    "param_name" => "youtube_url",
                    "type" => "textfield",
                    "heading" => __("YouTube URL", "js_composer"),
                    "description" => __("The URL of the Youtube page.", "js_composer")
                ),
                array(
                    "param_name" => "linkedin_url",
                    "type" => "textfield",
                    "heading" => __("Linkedin URL", "js_composer"),
                    "description" => __("The URL of the Linkedin page.", "js_composer")
                ),
                array(
                    "param_name" => "googleplus_url",
                    "type" => "textfield",
                    "heading" => __("Googleplus URL", "js_composer"),
                    "description" => __("The URL of the Googleplus page.", "js_composer")
                ),
                array(
                    "param_name" => "vimeo_url",
                    "type" => "textfield",
                    "heading" => __("Vimeo URL", "js_composer"),
                    "description" => __("The URL of the Vimeo page.", "js_composer")
                ),
                array(
                    "param_name" => "instagram_url",
                    "type" => "textfield",
                    "heading" => __("Instagram URL", "js_composer"),
                    "description" => __("The URL of the Instagram page.", "js_composer")
                ),
                array(
                    "param_name" => "behance_url",
                    "type" => "textfield",
                    "heading" => __("Behance URL", "js_composer"),
                    "description" => __("The URL of the Behance page.", "js_composer")
                ),
                array(
                    "param_name" => "pinterest_url",
                    "type" => "textfield",
                    "heading" => __("Pinterest URL", "js_composer"),
                    "description" => __("The URL of the Pinterest page.", "js_composer")
                ),
                array(
                    "param_name" => "skype_url",
                    "type" => "textfield",
                    "heading" => __("Skype URL", "js_composer"),
                    "description" => __("The URL of the Skype page.", "js_composer")
                ),
                array(
                    "param_name" => "dribbble_url",
                    "type" => "textfield",
                    "heading" => __("Dribbble URL", "js_composer"),
                    "description" => __("The URL of the Dribbble page.", "js_composer")
                ),
                array(
                    "param_name" => "include_rss",
                    "type" => "dropdown",
                    "heading" => __("Include RSS", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __("A boolean value(true/false string) indicating that the link to the RSS feed be included. Default is false.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Donate", "js_composer"),
            "base" => "donate",
            "icon" => "icon-donate",
            "class" => "donate_extended",
            "category" => __("Social", "js_composer"),
            "description" => __("Insert Donate Button", "js_composer"),
            "params" => array(
                array(
                    "param_name" => "title",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Title", "js_composer"),
                    "description" => __("The title of the link that displays the Paypal donate button.", "js_composer")
                ),
                array(
                    "param_name" => "account",
                    "type" => "textfield",
                    "heading" => __("Account", "js_composer"),
                    "description" => __("The Paypal account for which the donate button is being created.", "js_composer")
                ),
                array(
                    "param_name" => "display_card_logos",
                    "type" => "dropdown",
                    "heading" => __("Display Card Logos", "js_composer"),
                    "value" => array(
                        __("False", "js_composer") => "false",
                        __("True", "js_composer") => "true"
                    ),
                    "description" => __(" Specify if you need to display the logo images of the credit cards accepted for Paypal donations", "js_composer")
                ),
                array(
                    "param_name" => "cause",
                    "type" => "textfield",
                    "admin_label" => true,
                    "heading" => __("Cause", "js_composer"),
                    "description" => __("The text indicating the purpose for which the donation is being collected.", "js_composer")
                )
            ),
            "show_settings_on_create" => true
        ));


        vc_map(array(
            "name" => __("Subscribe Rss", "js_composer"),
            "base" => "subscribe_rss",
            "icon" => "icon-subscribe-rss",
            "class" => "subscribe_rss_extended",
            "category" => __("Social", "js_composer"),
            "description" => __("Insert Subscribe RSS Link", "js_composer"),
            "params" => array(),
            "show_settings_on_create" => true
        ));


    }


    if (function_exists('vc_map_update')) {

        $row_update = array(
            'weight' => 100
        );

        $rev_update = array(
            'weight' => 17
        );
        $c_update = array(
            'weight' => 13
        );

        $no_animation = array(
            'admin_label' => false
        );

        vc_map_update('vc_row', $row_update);
        vc_map_update('vc_column_text', $row_update);
        vc_map_update('vc_row', $row_update);
        vc_map_update('vc_column_text', $no_animation);


        // vc_map_update('rev_slider_vc', $rev_update);
        // vc_map_update('contact-form-7', $c_update);


        $param = WPBMap::getParam('vc_column_text', 'css_animation');
        $param['admin_label'] = false;
        WPBMap::mutateParam('vc_column_text', $param);


        $param2 = WPBMap::getParam('vc_message', 'css_animation');
        $param['admin_label'] = false;
        WPBMap::mutateParam('vc_message', $param);


    }

    /* if (function_exists('vc_remove_element')) {
        vc_remove_element("vc_teaser_grid");
        vc_remove_element("vc_posts_slider");
        vc_remove_element("vc_images_carousel");
        vc_remove_element("vc_progress_bar");
        vc_remove_element("vc_carousel");
        // vc_remove_element("vc_button");
    }

    if (function_exists('vc_remove_param')) {
        vc_remove_param('vc_column_text', 'css_animation');
        vc_remove_param('vc_message', 'css_animation');
        vc_remove_param('vc_toggle', 'css_animation');
        vc_remove_param('vc_single_image', 'css_animation');

    } */

//customize visual composer with icons in admin panel
    if (!function_exists('livemesh_custom_icons')) {
        function livemesh_custom_icons() {
            ?>
            <style type="text/css" media="screen">

                /*Section Title*/
                .vc-element-icon.icon-section-title {
                    background-image: url(<?php echo get_template_directory_uri(); ?>/images/composer/text.png) !important;
                    background-position: 0 0 !important;
                    }
                .wpb_content_element.title_extended > .wpb_element_wrapper {
                    background-image: url(<?php echo get_template_directory_uri(); ?>/images/composer/text.png);
                    background-position: 15px 12px;
                    }

            </style>
        <?php
        }

        add_action('admin_head', 'livemesh_custom_icons');

    }

}


?>