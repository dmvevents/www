<?php


$livemesh_shortcodes['columns'] = array(
    'params' => array(),
    'shortcode' => '{{child_shortcode}}',
    // as there is no wrapper shortcode
    'popup_title' => __('Insert Columns Shortcode', 'livemesh'),
    'no_preview' => true,

    // child shortcode is clonable & sortable
    'child_shortcode' => array(
        'params' => array(
            'column' => array(
                'type' => 'select',
                'label' => __('Column Type', 'livemesh'),
                'desc' => __('Select the type, i.e., width of the column.', 'livemesh'),
                'options' => array(
                    'one_third' => __('One Third', 'livemesh'),
                    'one_third_last' => __('One Third Last', 'livemesh'),
                    'two_third' => __('Two Thirds', 'livemesh'),
                    'two_third_last' => __('Two Thirds Last', 'livemesh'),
                    'one_half' => __('One Half', 'livemesh'),
                    'one_half_last' => __('One Half Last', 'livemesh'),
                    'one_fourth' => __('One Fourth', 'livemesh'),
                    'one_fourth_last' => __('One Fourth Last', 'livemesh'),
                    'three_fourth' => __('Three Fourth', 'livemesh'),
                    'three_fourth_last' => __('Three Fourth Last', 'livemesh'),
                    'one_sixth' => __('One Sixth', 'livemesh'),
                    'one_sixth_last' => __('One Sixth Last', 'livemesh'),
                    'one_col' => __('One Column', 'livemesh'),
                    'one_column_last' => __('One Column Last', 'livemesh'),
                    'two_col' => __('Two Columns', 'livemesh'),
                    'two_column_last' => __('Two Columns Last', 'livemesh'),
                    'three_col' => __('Three Columns', 'livemesh'),
                    'three_column_last' => __('Three Columns Last', 'livemesh'),
                    'four_col' => __('Four Columns', 'livemesh'),
                    'four_column_last' => __('Four Columns Last', 'livemesh'),
                    'five_col' => __('Five Columns', 'livemesh'),
                    'five_column_last' => __('five Columns Last', 'livemesh'),
                    'six_col' => __('Six Columns', 'livemesh'),
                    'six_column_last' => __('Six Columns Last', 'livemesh'),
                    'seven_col' => __('Seven Columns', 'livemesh'),
                    'seven_column_last' => __('Seven Columns Last', 'livemesh'),
                    'eight_col' => __('Eight Columns', 'livemesh'),
                    'eight_column_last' => __('Eight Columns Last', 'livemesh'),
                    'nine_col' => __('Nine Columns', 'livemesh'),
                    'nine_column_last' => __('Nine Columns Last', 'livemesh'),
                    'ten_col' => __('Ten Columns', 'livemesh'),
                    'ten_column_last' => __('Ten Columns Last', 'livemesh'),
                    'eleven_col' => __('Eleven Columns', 'livemesh'),
                    'eleven_column_last' => __('Eleven Columns Last', 'livemesh')
                )
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('Column Content', 'livemesh'),
                'desc' => __('Add the column content.', 'livemesh'),
            )
        ),
        'shortcode' => '[{{column}}]{{content}}[/{{column}}] ',
        'clone_button' => __('Add Column', 'livemesh')
    )
);


/*veena edited*/


$livemesh_shortcodes['contact_form'] = array(
    'no_preview' => true,
    'params' => array(
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'livemesh'),
            'desc' => __('Custom CSS class name to be set for the DIV element created (optional)', 'livemesh')
        ),
        'mail_to' => array(
            'std' => 'recipient@mydomain.com',
            'type' => 'text',
            'label' => __('Recipient Email', 'livemesh'),
            'desc' => __(' A string field specifying the recipient email where all form submissions will be received.', 'livemesh')
        ),
        'web_url' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Web URL', 'livemesh'),
            'desc' => __('Specify if the user should be requested for Web URL via an input field.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
        'phone' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Phone Field', 'livemesh'),
            'desc' => __('Specify if the users should be requested for their phone number. A phone field is displayed if the value is set to true.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
        'subject' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Subject Field', 'livemesh'),
            'desc' => __('A form subject field is displayed if the value is set to true.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
        'button_color' => array(
            'std' => 'default',
            'type' => 'select',
            'label' => __('Button Color', 'livemesh'),
            'desc' => __('Color of the submit button.', 'livemesh'),
            'options' => array(
                'black' => __('Black', 'livemesh'),
                'blue' => __('Blue', 'livemesh'),
                'cyan' => __('Cyan', 'livemesh'),
                'green' => __('Green', 'livemesh'),
                'orange' => __('Orange', 'livemesh'),
                'pink' => __('Pink', 'livemesh'),
                'red' => __('Red', 'livemesh'),
                'teal' => __('Teal', 'livemesh'),
                'theme' => __('Theme', 'livemesh'),
                'trans' => __('Trans', 'livemesh')
            )
        ),
    ),

    'shortcode' => '[contact_form mail_to="{{mail_to}}" phone="{{phone}}" web_url="{{web_url}}" subject="{{subject}}" button_color="{{button_color}}"]',
    'popup_title' => __('Insert contact_form  Shortcode', 'livemesh')
);

$livemesh_shortcodes['pullquote'] = array(
    'no_preview' => true,
    'params' => array(
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'livemesh'),
            'desc' => __('Choose Pullquote Alignment (optional)', 'livemesh'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'livemesh'),
                'left' => __('Left', 'livemesh'),
                'center' => __('Center', 'livemesh'),
                'right' => __('Right', 'livemesh')
            )
        ),
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Pullquote Content', 'livemesh'),
            'desc' => __('The actual quotation text for the pullquote element.', 'livemesh'),

        )

    ),
    'shortcode' => '[pullquote align="{{align}}"]{{content}}[/pullquote]',
    'popup_title' => __('Insert Pullquote Shortcode', 'livemesh')
);


$livemesh_shortcodes['blockquote'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'livemesh'),
            'desc' => __('The element id to be set for the blockquote element created', 'livemesh')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Blockquote Class', 'livemesh'),
            'desc' => __('Custom CSS class name to be set for the blockquote element created ', 'livemesh')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Blockquote Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the blockquote element created ', 'livemesh')
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'livemesh'),
            'desc' => __('Choose blockquote Alignment', 'livemesh'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'livemesh'),
                'left' => __('Left', 'livemesh'),
                'center' => __('Center', 'livemesh'),
                'right' => __('Right', 'livemesh')
            )
        ),
        'author' => array(
            'type' => 'text',
            'label' => __('Author', 'livemesh'),
            'desc' => __('Author Information.', 'livemesh'),
            'std' => ''
        ),
        'affiliation' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Affiliation', 'livemesh'),
            'desc' => __('The entity/organization to which the author of the quote belongs to.', 'livemesh'),

        ),
        'affiliation_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Affiliation URL', 'livemesh'),
            'desc' => __('The URL of the entity/organization to which this quote is attributed to', 'livemesh'),

        ),
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Blockquote Content', 'livemesh'),
            'desc' => __('The actual quotation text for the blockquote element.', 'livemesh'),

        )
    ),
    'shortcode' => '[blockquote id="{{id}}" class="{{class}}" style="{{style}}" align="{{align}}" author="{{author}}" affiliation="{{affiliation}}" affiliation_url="{{affiliation_url}}"]{{content}}[/blockquote]',
    'popup_title' => __('Insert Blockquote Shortcode', 'livemesh')
);


$livemesh_shortcodes['segment'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Segment Id', 'livemesh'),
            'desc' => __('The id of the wrapper HTML element created by the segment shortcode (optional).', 'livemesh')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Segment Class', 'livemesh'),
            'desc' => __('The CSS class of the HTML element wrapping the content(optional).', 'livemesh')
        ),

        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Segment Style', 'livemesh'),
            'desc' => __('Any optional inline styling you would like to apply to the segment.eg.padding:50px 0; ', 'livemesh')
        ),
        'background_image' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('URL', 'livemesh'),
            'desc' => __('Provide the URL of the background image.eg.http://example.com/background3.jpg (optional)', 'livemesh')
        ),
        'parallax_background' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Parallax Background ', 'livemesh'),
            'desc' => __('Specify if this needs to be a parallax background image.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
        'background_speed' => array(
            'type' => 'text',
            'label' => __('Background Speed', 'livemesh'),
            'desc' => __('Speed of parallax animation - the speed at which the parallax background moves with user scrolling the page. Specify a value between 0 and 1. ', 'livemesh'),
            'std' => '0.6'
        ),
        'background_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Background Pattern', 'livemesh'),
            'desc' => __('As an alternative to Background Image option above, you can provide the URL of the background image which acts like a pattern background.', 'livemesh')

        ),
        'background_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Background Color', 'livemesh'),
            'desc' => __('The background color to be applied to the segment that spans the entire browser width.', 'livemesh')
        )
    ),
    'shortcode' => '[segment id="{{id}}" class="{{class}}" background_color="{{background_color}}" style="{{style}}" background_image="{{background_image}}" parallax_background="{{parallax_background}}" background_speed="{{background_speed}}" background_pattern="{{background_pattern}}"]REPLACE ME[/segment]',
    'popup_title' => __('Insert Segment Shortcode', 'livemesh')
);


$livemesh_shortcodes['code'] = array(
    'no_preview' => true,
    'params' => array(
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Code Content', 'livemesh'),
            'desc' => __('Add the code content.', 'livemesh'),
        )
    ),
    'shortcode' => '[code]{{content}}[/code]',
    'popup_title' => __('Insert Code Shortcode', 'livemesh')
);


$livemesh_shortcodes['wrap'] = array(
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Parent Wrap Id', 'livemesh'),
            'desc' => __('The element id to be set for the parent DIV element created (optional).', 'livemesh')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Parent Wrap Class', 'livemesh'),
            'desc' => __(' Custom CSS class name to be set for the parent DIV element created (optional)', 'livemesh')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Parent Wrap Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the parent DIV element created (optional) ', 'livemesh')
        ),
    ),
    'shortcode' => '[parent_wrap id="{{id}}" class="{{class}}" style="{{style}}"]{{child_shortcode}}[/parent_wrap]',
    'popup_title' => __('Insert wrap Shortcode', 'livemesh'),
    'no_preview' => true,

    // child shortcode is clonable & sortable
    'child_shortcode' => array(
        'params' => array(
            'id' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Wrap Id', 'livemesh'),
                'desc' => __('The element id to be set for the child DIV element created (optional).', 'livemesh')
            ),
            'class' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Wrap Class', 'livemesh'),
                'desc' => __(' Custom CSS class name to be set for the child DIV element created (optional)', 'livemesh')
            ),
            'style' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Wrap Style', 'livemesh'),
                'desc' => __('Inline CSS styling applied for the child DIV element created (optional) ', 'livemesh')
            ),
            'content' => array(
                'std' => '',
                'type' => 'textarea',
                'label' => __('Wrap Content', 'livemesh'),
                'desc' => __('Add the code content for the child DIV element.', 'livemesh'),
            )
        ),
        'shortcode' => '[wrap id="{{id}}" class="{{class}}" style="{{style}}"]{{content}}[/wrap] ',
        'clone_button' => __('Add new Wrap', 'livemesh')
    )
);

$livemesh_shortcodes['highlight1'] = array(
    'no_preview' => true,
    'params' => array(
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Highlighted Content', 'livemesh'),
            'desc' => __('Specify the content to be highlighted', 'livemesh'),
        )
    ),
    'shortcode' => '[highlight1]{{content}}[/highlight1]',
    'popup_title' => __('Insert Highlight1 Shortcode', 'livemesh')
);

$livemesh_shortcodes['highlight2'] = array(
    'no_preview' => true,
    'params' => array(
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Highlighted Content', 'livemesh'),
            'desc' => __('Specify the content to be highlighted.', 'livemesh'),
        )
    ),
    'shortcode' => '[highlight2]{{content}}[/highlight2]',
    'popup_title' => __('Insert Highlight2 Shortcode', 'livemesh')
);

$livemesh_shortcodes['list'] = array(
    'no_preview' => true,
    'params' => array(
        'style' => array(
            'type' => 'text',
            'label' => __('List Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the UL element created (optional).', 'livemesh'),
            'std' => ''
        ),
        'type' => array(
            'type' => 'select',
            'label' => __('Type', 'livemesh'),
            'desc' => __('Custom CSS class name to be set for the UL element created (optional).', 'livemesh'),
            'std' => 'list1',
            'options' => array(
                'list1' => __('list1', 'livemesh'),
                'list2' => __('list2', 'livemesh'),
                'list3' => __('list3', 'livemesh'),
                'list4' => __('list4', 'livemesh'),
                'list5' => __('list5', 'livemesh'),
                'list6' => __('list6', 'livemesh'),
                'list7' => __('list7', 'livemesh'),
                'list8' => __('list8', 'livemesh'),
                'list9' => __('list9', 'livemesh'),
                'list10' => __('list10', 'livemesh')
            )
        )

    ),
    'shortcode' => '[list type="{{type}}" style="{{style}}"]REPLACE ME WITH A LIST[/list]',
    'popup_title' => __('Insert List Shortcode', 'livemesh')
);

$livemesh_shortcodes['heading'] = array(
    'no_preview' => true,
    'params' => array(
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Heading Class', 'livemesh'),
            'desc' => __(' Custom CSS class name to be set for the heading div element created (optional)', 'livemesh')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Heading Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the div element created (optional)', 'livemesh')
        ),
        'title' => array(
            'type' => 'text',
            'label' => __('Title', 'livemesh'),
            'desc' => __('A string value indicating the title of the heading.', 'livemesh'),
            'std' => ''
        ),
        'pitch_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Pitch Text', 'livemesh'),
            'desc' => __('The text displayed below the heading title.', 'livemesh'),
        )
    ),
    'shortcode' => '[heading2 class="{{class}}" style="{{style}}" title="{{title}}" pitch_text="{{pitch_text}}"]',
    'popup_title' => __('Insert Heading Shortcode', 'livemesh')
);


$livemesh_shortcodes['icon'] = array(
    'no_preview' => true,
    'params' => array(

        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Icon Class', 'livemesh'),
            'desc' => __('Custom CSS class name to be set for the icon element created. The class names are listed at http://portfoliotheme.org/support/faqs/how-to-use-1500-icons-bundled-with-the-agile-theme/', 'livemesh')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Icon Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the icon element created (optional). Useful if you want to specify font-size, color etc. for the icon inline.', 'livemesh')
        )
    ),
    'shortcode' => '[icon class="{{class}}" style="{{style}}"]',
    'popup_title' => __('Insert Icon Shortcode', 'livemesh')
);


$livemesh_shortcodes['action_call'] = array(
    'no_preview' => true,
    'params' => array(
        'text' => array(
            'std' => 'Call us now for a project quote.',
            'type' => 'text',
            'label' => __('Text', 'livemesh'),
            'desc' => __('Text to be displayed urging for an action call.', 'livemesh')
        ),
        'button_text' => array(
            'std' => 'Contact Us',
            'type' => 'text',
            'label' => __('Button Text', 'livemesh'),
            'desc' => __('The title to be displayed for the button.', 'livemesh')
        ),
        'button_color' => array(
            'std' => 'theme',
            'type' => 'select',
            'label' => __('Button Color Options', 'livemesh'),
            'desc' => __('The color of the button.', 'livemesh'),
            'options' => array(
                'black' => __('Black', 'livemesh'),
                'blue' => __('Blue', 'livemesh'),
                'cyan' => __('Cyan', 'livemesh'),
                'green' => __('Green', 'livemesh'),
                'orange' => __('Orange', 'livemesh'),
                'pink' => __('Pink', 'livemesh'),
                'red' => __('Red', 'livemesh'),
                'teal' => __('Teal', 'livemesh'),
                'theme' => __('Theme', 'livemesh'),
                'trans' => __('Trans', 'livemesh')
            )
        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'livemesh'),
            'desc' => __('The URL to which the button links to.', 'livemesh'),
        )
    ),
    'shortcode' => '[action_call text="{{text}}" button_url="{{button_url}}" button_text="{{button_text}}" button_color="{{button_color}}"]',
    'popup_title' => __('Insert Action Call Shortcode', 'livemesh')
);


$livemesh_shortcodes['button'] = array(
    'no_preview' => true,
    'params' => array(

        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'livemesh'),
            'desc' => __('The element id to be set for the button element created (optional)', 'livemesh')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the button element created eg.padding: 10px 20px; (optional)', 'livemesh')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Class', 'livemesh'),
            'desc' => __('Custom CSS class name to be set for the button element created (optional)', 'livemesh')
        ),
        'color' => array(
            'std' => 'theme',
            'type' => 'select',
            'label' => __('Color', 'livemesh'),
            'desc' => __('The color of the button.', 'livemesh'),
            'options' => array(
                'theme' => __('Theme', 'livemesh'),
                'black' => __('Black', 'livemesh'),
                'blue' => __('Blue', 'livemesh'),
                'cyan' => __('Cyan', 'livemesh'),
                'green' => __('Green', 'livemesh'),
                'orange' => __('Orange', 'livemesh'),
                'pink' => __('Pink', 'livemesh'),
                'red' => __('Red', 'livemesh'),
                'teal' => __('Teal', 'livemesh'),
                'trans' => __('Trans', 'livemesh')
            )

        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'livemesh'),
            'desc' => __(' Alignment of the button and text alignment of the button title displayed.', 'livemesh'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'livemesh'),
                'left' => __('Left', 'livemesh'),
                'center' => __('Center', 'livemesh'),
                'right' => __('Right', 'livemesh')
            )
        ),
        'type' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Type', 'livemesh'),
            'desc' => __('Can be large, small or rounded.', 'livemesh'),
            'options' => array(
                'large' => __('Large', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'rounded' => __('Rounded', 'livemesh'),
            )

        ),
        'href' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('URL', 'livemesh'),
            'desc' => __('The URL to which button should point to. The user is taken to this destination when the button is clicked.eg.http://targeturl.com', 'livemesh'),

        ),
        'target' => array(
            'type' => 'select',
            'label' => __('Button Target', 'livemesh'),
            'desc' => __('_self = open in same window. _blank = open in new window', 'livemesh'),
            'std' => '_self',
            'options' => array(
                '_self' => __('_self', 'livemesh'),
                '_blank' => __('_blank', 'livemesh')
            )
        ),
        'content' => array(
            'std' => 'Contact Us',
            'type' => 'text',
            'label' => __('Button Title', 'livemesh'),
            'desc' => __('Specify the title of the button.', 'livemesh'),
        )

    ),
    'shortcode' => '[button id="{{id}}" style="{{style}}" color="{{color}}" type="{{type}}" size="large" href="http://targeturl.com" align="{{align}}" target="{{target}}"]{{content}}[/button]',
    'popup_title' => __('Insert Button Shortcode', 'livemesh')
);


$livemesh_shortcodes['image'] = array(
    'no_preview' => true,
    'params' => array(
        'link' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Link URL', 'livemesh'),
            'desc' => __('Specify a URL to which the link should point to if image should be a link (optional).', 'livemesh'),
        ),
        'title' => array(
            'type' => 'text',
            'label' => __('Image Title', 'livemesh'),
            'desc' => __('The title of the link to which image points to.', 'livemesh'),
            'std' => ''
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Image Class', 'livemesh'),
            'desc' => __('Custom CSS class name to be set for the IMG element created (optional).', 'livemesh')
        ),
        'src' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Image URL', 'livemesh'),
            'desc' => __('Choose your image. An IMG element will be created for this image and the image will be cropped and styled as per the parameters provided', 'livemesh')
        ),
        'alt' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Alt Text', 'livemesh'),
            'desc' => __('The alt attribute value for the IMG element.', 'livemesh')
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'livemesh'),
            'desc' => __('Choose Image Alignment', 'livemesh'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'livemesh'),
                'left' => __('Left', 'livemesh'),
                'center' => __('Center', 'livemesh'),
                'right' => __('Right', 'livemesh')
            )
        ),
        'image_frame' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Image Frame', 'livemesh'),
            'desc' => __('A boolean value specifying if the image should be wrapped in a border frame and another type of frame as styled by the theme', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'wrapper' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Wrapper', 'livemesh'),
            'desc' => __('A boolean value indicating if the a wrapper DIV element needs to be created for the image.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'wrapper_class' => array(
            'type' => 'text',
            'label' => __('Wrapper Class', 'livemesh'),
            'desc' => __('The CSS class for any wrapper DIV element created for the image. (optional)', 'livemesh'),
            'std' => ''
        ),
        'wrapper_style' => array(
            'type' => 'text',
            'label' => __('Wrapper Style', 'livemesh'),
            'desc' => __('The inline CSS styling for any wrapper DIV element created for the image. (optional)', 'livemesh'),
            'std' => ''
        ),
        'width' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Width', 'livemesh'),
            'desc' => __('Any custom width (in pixel units) specified for the element (optional). The original image (pointed to by the src parameter) will be cropped to this width.', 'livemesh')
        ),
        'height' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Height', 'livemesh'),
            'desc' => __('Any custom height (in pixel units) specified for the element (optional). The original image (pointed to by the Image URL parameter) will be cropped to this height.', 'livemesh')
        ),
        'size' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Size', 'livemesh'),
            'desc' => __('Takes effect if no custom width or height is specified. The original image (pointed to by the Image URL parameter) is cropped to the size specified.', 'livemesh'),
            'options' => array(
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'medium' => __('Medium', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        ),

    ),
    'shortcode' => '[image link="{{link}}" class="{{class}}" title="{{title}}" src="{{src}}" alt="{{alt}}" align="{{align}}" image_frame="{{image_frame}}" wrapper="{{wrapper}}" wrapper_class="{{wrapper_class}}" wrapper_style="{{wrapper_style}}" width="{{width}}" height="{{height}}" size="{{size}}"]',
    'popup_title' => __('Insert Image Shortcode', 'livemesh')
);

$livemesh_shortcodes['ytp_video_showcase'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'livemesh'),
            'desc' => __('The id of the DIV element created to wrap the YouTube video (optional). Default is video-intro.', 'livemesh')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Class', 'livemesh'),
            'desc' => __('The CSS class of the DIV element created to wrap the YouTube video (optional).', 'livemesh')
        ),
        'video_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video URL', 'livemesh'),
            'desc' => __('Enter the YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).', 'livemesh'),
        ),
        'mute' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Mute', 'livemesh'),
            'desc' => __('Indicate if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'showControls' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Show Controls', 'livemesh'),
            'desc' => __('Show or hide the controls bar at the bottom of the page.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'containment' => array(
            'std' => 'self',
            'type' => 'text',
            'label' => __('Containment', 'livemesh'),
            'desc' => __('The CSS selector of the DOM element where you want the video background; if not specified it takes the “body”; if set to “self” the player will be instanced on that element.', 'livemesh'),
        ),
        'quality' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Quality', 'livemesh'),
            'desc' => __('Quality of video', 'livemesh'),
            'options' => array(
                'small' => __('Mini', 'livemesh'),
                'medium' => __('Medium', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'hd720' => __('hd720', 'livemesh'),
                'hd1080' => __('hd1080', 'livemesh'),
                'highres' => __('highres', 'livemesh'),
            )
        ),
        'optimizeDisplay' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Optimize Display', 'livemesh'),
            'desc' => __('Will fit the video size into the window size optimizing the view.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'livemesh'),
            'desc' => __('Whether to loop the movie once ended.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'startAt' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video Starts At', 'livemesh'),
            'desc' => __('Specify a number which sets the seconds the video should start at(optional). Starts at 0 by default.', 'livemesh'),
        ),
        'opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Opacity', 'livemesh'),
            'desc' => __('Define the opacity of the video. Specify a decimal value between 0 and 1.', 'livemesh'),
        ),
        'vol' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Volume', 'livemesh'),
            'desc' => __('A numerical value between 1 to 100 - set the volume level of the video.', 'livemesh'),
        ),
        'ratio' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Aspect Ratio', 'livemesh'),
            'desc' => __('Set the aspect ratio of the movie', 'livemesh'),
            'options' => array(
                '4/3' => __('4/3', 'livemesh'),
                '16/9' => __('16/9', 'livemesh'),
            )
        ),
        'autoplay' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Autoplay', 'livemesh'),
            'desc' => __('Specify whether to automatically play the video once ready.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'placeholder_url' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Placeholder URL', 'livemesh'),
            'desc' => __('URL of the placeholder image to be displayed instead of YouTube video in mobile devices.', 'livemesh'),
        ),
        'overlay_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Color', 'livemesh'),
            'desc' => __('The color of the overlay to be applied on the video.', 'livemesh'),
        ),
        'overlay_opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Opacity', 'livemesh'),
            'desc' => __('The opacity of the overlay color. Specify a value between 0 and 1.', 'livemesh'),
        ),
        'overlay_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Overlay Pattern', 'livemesh'),
            'desc' => __('The URL of the image which can act as a pattern displayed on top of the video.', 'livemesh'),
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'livemesh'),
            'desc' => __('The title text displayed on top of the video.', 'livemesh'),
        ),
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'livemesh'),
            'desc' => __('The text displayed on top of the video; below the title.', 'livemesh'),
        ),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'livemesh'),
            'desc' => __(' The title for the button displayed on top of the video. (optional)', 'livemesh'),

        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'livemesh'),
            'desc' => __('The URL pointed to by the button displayed on top of the video. (optional)', 'livemesh'),

        ),
    ),

    'shortcode' => '[ytp_video_showcase id="{{id}}" class="{{class}}" video_url="{{video_url}}" containment="{{containment}}" placeholder_url="{{placeholder_url}}" title="{{title}}" text="{{text}}" button_text="{{button_text}}" button_url="{{button_url}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}" mute="{{mute}}" showControls="{{showControls}}" quality="{{quality}}" optimizeDisplay="{{optimizeDisplay}}" loop="{{loop}}" opacity="{{opacity}}" vol="{{vol}}" ratio="{{ratio}}" autoplay="{{autoplay}}"]',
    'popup_title' => __('Insert YouTube Video Showcase Shortcode', 'livemesh')
);

$livemesh_shortcodes['ytp_video_section'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'livemesh'),
            'desc' => __('The id of the DIV element created to wrap the YouTube video (optional). ', 'livemesh')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Class', 'livemesh'),
            'desc' => __('The CSS class of the DIV element created to wrap the YouTube video (optional).', 'livemesh')
        ),
        'video_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video URL', 'livemesh'),
            'desc' => __('Enter the YouTube URL of the video (ex: http://www.youtube.com/watch?v=PzjwAAskt4o).', 'livemesh'),
        ),
        'mute' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Mute', 'livemesh'),
            'desc' => __('Indicate if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'showControls' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Show Controls', 'livemesh'),
            'desc' => __('Show or hide the controls bar at the bottom of the page.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'containment' => array(
            'std' => 'self',
            'type' => 'text',
            'label' => __('Containment', 'livemesh'),
            'desc' => __('The CSS selector of the DOM element where you want the video background; if not specified it takes the “body”; if set to “self” the player will be instanced on that element.', 'livemesh'),
        ),
        'quality' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Quality', 'livemesh'),
            'desc' => __('Quality of video (optional)', 'livemesh'),
            'options' => array(
                'small' => __('Mini', 'livemesh'),
                'medium' => __('Medium', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'hd720' => __('hd720', 'livemesh'),
                'hd1080' => __('hd1080', 'livemesh'),
                'highres' => __('highres', 'livemesh'),
            )
        ),
        'optimizeDisplay' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Optimize Display', 'livemesh'),
            'desc' => __('Will fit the video size into the window size optimizing the view.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'livemesh'),
            'desc' => __('Whether to loop the movie once ended.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'startAt' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video Starts At', 'livemesh'),
            'desc' => __('Set the seconds the video should start at (optional). Starts at 0 by default.', 'livemesh'),
        ),
        'opacity' => array(
            'std' => '1',
            'type' => 'text',
            'label' => __('Opacity', 'livemesh'),
            'desc' => __('Define the opacity of the video. Specify a decimal value between 0 and 1.', 'livemesh'),
        ),
        'vol' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Volume', 'livemesh'),
            'desc' => __('A value between 1 to 100 - set the volume level of the video.', 'livemesh'),
        ),
        'ratio' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Aspect Ratio', 'livemesh'),
            'desc' => __('Set the aspect ratio of the movie', 'livemesh'),
            'options' => array(
                '4/3' => __('4/3', 'livemesh'),
                '16/9' => __('16/9', 'livemesh'),
            )
        ),
        'autoplay' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Autoplay', 'livemesh'),
            'desc' => __('Specify whether to automatically play the video once ready.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'placeholder_url' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Placeholder URL', 'livemesh'),
            'desc' => __('URL of the placeholder image to be displayed instead of YouTube video in mobile devices.', 'livemesh'),
        ),
        'overlay_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Color', 'livemesh'),
            'desc' => __('The color of the overlay to be applied on the video.', 'livemesh'),
        ),
        'overlay_opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Opacity', 'livemesh'),
            'desc' => __('The opacity of the overlay color. Specify a value between 0 and 1.', 'livemesh'),
        ),
        'overlay_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Overlay Pattern', 'livemesh'),
            'desc' => __('The URL of the image which can act as a pattern displayed on top of the video.', 'livemesh'),
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'livemesh'),
            'desc' => __('The title displayed on top of the video (optional).', 'livemesh'),
        ),
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'livemesh'),
            'desc' => __('The text displayed on top of the video, below the title.', 'livemesh'),
        ),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'livemesh'),
            'desc' => __(' The title for the button displayed on top of the video.', 'livemesh'),

        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'livemesh'),
            'desc' => __('The URL pointed to by the button displayed on top of the video.', 'livemesh'),

        ),
    ),

    'shortcode' => '[ytp_video_section id="{{id}}" class="{{class}}" video_url="{{video_url}}" containment="{{containment}}" placeholder_url="{{placeholder_url}}" title="{{title}}" text="{{text}}" button_text="{{button_text}}" button_url="{{button_url}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}" mute="{{mute}}" showControls="{{showControls}}" quality="{{quality}}" optimizeDisplay="{{optimizeDisplay}}" loop="{{loop}}" opacity="{{opacity}}" vol="{{vol}}" ratio="{{ratio}}" autoplay="{{autoplay}}"]',
    'popup_title' => __('Insert YouTube Video Section Shortcode', 'livemesh')
);

$livemesh_shortcodes['video_showcase'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'livemesh'),
            'desc' => __('The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.', 'livemesh')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Class', 'livemesh'),
            'desc' => __('The CSS class of the DIV element created to wrap the HTML5 video (optional). Default is video-heading.', 'livemesh')
        ),
        'video_id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video Id', 'livemesh'),
            'desc' => __('The id of the VIDEO tag element (optional).', 'livemesh'),
        ),
        'mp4_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('MP4 URL', 'livemesh'),
            'desc' => __('The URL of the video uploaded in MP4 format.', 'livemesh'),
        ),
        'ogg_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('OGG URL', 'livemesh'),
            'desc' => __('The URL of the video uploaded in OGG format.', 'livemesh'),
        ),
        'webm_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('WEBM URL', 'livemesh'),
            'desc' => __('The URL of the video uploaded in WEBM format.', 'livemesh'),
        ),
        'muted' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Mute/Unmute', 'livemesh'),
            'desc' => __('Specify if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute after the video starts.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'livemesh'),
            'desc' => __('Whether to loop the movie once ended.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'placeholder_url' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Placeholder URL', 'livemesh'),
            'desc' => __('URL of the placeholder image to be displayed instead of YouTube video in mobile devices.', 'livemesh'),
        ),
        'overlay_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Color', 'livemesh'),
            'desc' => __('The color of the overlay to be applied on the video.', 'livemesh'),
        ),
        'overlay_opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Opacity', 'livemesh'),
            'desc' => __('The opacity of the overlay color. Specify a value between 0 and 1.', 'livemesh'),
        ),
        'overlay_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Overlay Pattern', 'livemesh'),
            'desc' => __('The URL of the image which can act as a pattern displayed on top of the video.', 'livemesh'),
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'livemesh'),
            'desc' => __('The title text displayed on top of the video.', 'livemesh'),
        ),
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'livemesh'),
            'desc' => __('The text displayed on top of the video, below the title.', 'livemesh'),
        ),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'livemesh'),
            'desc' => __(' The title for the button displayed on top of the video.', 'livemesh'),

        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'livemesh'),
            'desc' => __('The URL pointed to by the button displayed on top of the video.', 'livemesh'),

        ),
    ),

    'shortcode' => '[video_showcase id="{{id}}" class="{{class}}" mp4_url="{{mp4_url}}" ogg_url="{{ogg_url}}" webm_url="{{webm_url}}" placeholder_url="{{placeholder_url}}" text="{{text}}" button_text="{{button_text}}" button_url="{{button_url}}" muted="{{muted}}" loop="{{loop}}" overlay_pattern="{{overlay_pattern}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}"]',
    'popup_title' => __('Insert HTML5 Video Showcase Shortcode', 'livemesh')
);

$livemesh_shortcodes['video_section'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'livemesh'),
            'desc' => __('The id of the DIV element created to wrap the HTML5 video (optional). Default is video-intro.', 'livemesh')
        ),
        'class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Class', 'livemesh'),
            'desc' => __('The CSS class of the DIV element created to wrap the HTML5 video (optional).', 'livemesh')
        ),
        'video_id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Video Id', 'livemesh'),
            'desc' => __('The id of the VIDEO tag element. (optional)', 'livemesh'),
        ),
        'mp4_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('MP4 URL', 'livemesh'),
            'desc' => __('The URL of the video uploaded in MP4 format.', 'livemesh'),
        ),
        'ogg_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('OGG URL', 'livemesh'),
            'desc' => __('The URL of the video uploaded in OGG format.', 'livemesh'),
        ),
        'webm_url' => array(
            'std' => '',
            'type' => 'video',
            'label' => __('WEBM URL', 'livemesh'),
            'desc' => __('The URL of the video uploaded in WEBM format.', 'livemesh'),
        ),

        'muted' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Mute/Unmute', 'livemesh'),
            'desc' => __('Specify if the video needs to be started muted. The user can mute the video if required with the help of mute/unmute switch after video starts.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'livemesh'),
            'desc' => __('Specify whether loop the movie once ended.', 'livemesh'),
            'options' => array(
                'false' => __('False', 'livemesh'),
                'true' => __('True', 'livemesh'),
            )
        ),
        'placeholder_url' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Placeholder URL', 'livemesh'),
            'desc' => __('URL of the placeholder image to be displayed instead of YouTube video in mobile devices.', 'livemesh'),
        ),
        'overlay_color' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Color', 'livemesh'),
            'desc' => __('The color of the overlay to be applied on the video.', 'livemesh'),
        ),
        'overlay_opacity' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Overlay Opacity', 'livemesh'),
            'desc' => __('The opacity of the overlay color.', 'livemesh'),
        ),
        'overlay_pattern' => array(
            'std' => '',
            'type' => 'image',
            'label' => __('Overlay Pattern', 'livemesh'),
            'desc' => __('The URL of the image which can act as a pattern displayed on top of the video.', 'livemesh'),
        ),
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'livemesh'),
            'desc' => __('The text displayed on top of the video.', 'livemesh'),
        ),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'livemesh'),
            'desc' => __(' The title for the button displayed on top of the video, below the text.', 'livemesh'),

        ),
        'button_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button URL', 'livemesh'),
            'desc' => __('The URL pointed to by the button displayed on top of the video.', 'livemesh'),
        ),
    ),
    'shortcode' => '[video_section id="{{id}}" class="{{class}}" mp4_url="{{mp4_url}}" ogg_url="{{ogg_url}}" webm_url="{{webm_url}}" placeholder_url="{{placeholder_url}}" text="{{text}}" button_text="{{button_text}}" button_url="{{button_url}}" muted="{{muted}}" loop="{{loop}}" overlay_pattern="{{overlay_pattern}}" overlay_color="{{overlay_color}}" overlay_opacity="{{overlay_opacity}}"]',
    'popup_title' => __('Insert HTML5 Video Section Shortcode', 'livemesh')
);

$livemesh_shortcodes['audio'] = array(
    'no_preview' => true,
    'params' => array(
        'ogg_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('OGG URL', 'livemesh'),
            'desc' => __('The URL of the audio clip uploaded in OGG format.eg.http://mydomain.com/song.ogg', 'livemesh'),
        ),
        'mp3_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('MP4 URL', 'livemesh'),
            'desc' => __('The URL of the audio uploaded in MP3 format.eg.http://mydomain.com/song.mp3', 'livemesh'),
        )
    ),
    'shortcode' => '[html5_audio ogg_url="{{ogg_url}}" mp3_url="{{mp3_url}}" ]',
    'popup_title' => __('Insert HTML5 Audio Shortcode', 'livemesh')
);

/*porfolio shortcodes*/

$livemesh_shortcodes['show_post_snippets'] = array(
    'no_preview' => true,
    'params' => array(
        'post_type' => array(
            'std' => 'portfolio',
            'type' => 'select',
            'label' => __('Post Type', 'livemesh'),
            'desc' => __('The custom post type whose posts need to be displayed. Examples include post, portfolio, team etc.', 'livemesh'),
            'options' => array(
                'post' => __('Post', 'livemesh'),
                'portfolio' => __('Portfolio', 'livemesh'),
                'gallery_item' => __('Gallery', 'livemesh'),
                'team' => __('Team', 'livemesh')
            )
        ),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'livemesh'),
            'desc' => __('Display a header title for the post snippets.', 'livemesh')
        ),
        'layout_class' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Layout Class', 'livemesh'),
            'desc' => __('The CSS class to be set for the list element (UL) displaying the post snippets (optional). Useful if you need to do some custom styling of our own (rounded, hexagon images etc.) for the displayed items.', 'livemesh')
        ),

        'number_of_columns' => array(
            'std' => '3',
            'type' => 'text',
            'label' => __('Number of Columns', 'livemesh'),
            'desc' => __('The number of columns to display per row of the post snippets', 'livemesh')
        ),
        'post_count' => array(
            'std' => '6',
            'type' => 'text',
            'label' => __('Number of Posts', 'livemesh'),
            'desc' => __('Number of posts to display', 'livemesh')
        ),
        'image_size' => array(
            'std' => 'medium',
            'type' => 'select',
            'label' => __('Image Size', 'livemesh'),
            'desc' => __(' Can be mini, small, medium, large, full, square', 'livemesh'),
            'options' => array(
                'medium' => __('Medium', 'livemesh'),
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        ),
        'display_title' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Title', 'livemesh'),
            'desc' => __('Specify if the title of the post or custom post type needs to be displayed below the featured image', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'display_summary' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Summary', 'livemesh'),
            'desc' => __('Specify if the excerpt or summary content of the post/custom post type needs to be displayed below the featured image thumbnail.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'show_excerpt' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Show Excerpt', 'livemesh'),
            'desc' => __(' Display excerpt for the post/custom post type. Has no effect if Display Summary is set to false.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'livemesh'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'livemesh')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'livemesh'),
            'desc' => __('Specify if the thumbnail needs to be hidden', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta', 'livemesh'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'taxonomy' => array(
            'std' => 'portfolio_category',
            'type' => 'select',
            'label' => __('Taxonomy', 'livemesh'),
            'desc' => __('Custom taxonomy to be used for filtering the posts/custom post types displayed like category, department etc.', 'livemesh'),
            'options' => array(
                'category' => __('Category', 'livemesh'),
                'post_tag' => __('Tag', 'livemesh'),
                'portfolio_category' => __('Portfolio Category', 'livemesh'),
                'gallery_category' => __('Gallery Category', 'livemesh'),
                'department' => __('Team Department', 'livemesh')
            )
        ),
        'terms' => array(
            'std' => 'inspiration,technology',
            'type' => 'text',
            'label' => __('Taxonomy Terms', 'livemesh'),
            'desc' => __(' A comma separated list of terms of taxonomy specified for which the items needs to be displayed. Helps filter the results by category/taxonomy, if the these terms are defined for the taxonomy chosen.', 'livemesh')
        ),
        'no_margin' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('No Margin - Packed Layout', 'livemesh'),
            'desc' => __(' If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
    ),
    'shortcode' => '[show_post_snippets layout_class="{{layout_class}}" post_type="{{post_type}}" taxonamy="{{taxonomy}}" terms="{{terms}}" number_of_columns="{{number_of_columns}}" post_count="{{post_count}}" display_title="{{display_title}}" display_summary="{{display_summary}}" show_excerpt="{{show_excerpt}}" excerpt_count="{{excerpt_count}}" show_meta="{{show_meta}}" image_size="{{image_size}}" hide_thumbnail="{{hide_thumbnail}}" title="{{title}}" no_margin="{{no_margin}}"]',
    'popup_title' => __('Insert Portfolio  Shortcode', 'livemesh')
);

$livemesh_shortcodes['show_portfolio'] = array(
    'no_preview' => true,
    'params' => array(
        'number_of_columns' => array(
            'std' => '3',
            'type' => 'text',
            'label' => __('Number of Columns', 'livemesh'),
            'desc' => __('The number of columns to display per row of the post snippets', 'livemesh')
        ),
        'post_count' => array(
            'std' => '9',
            'type' => 'text',
            'label' => __('Number of Posts', 'livemesh'),
            'desc' => __(' Total number of portfolio items to display.', 'livemesh')
        ),
        'image_size' => array(
            'std' => 'medium',
            'type' => 'select',
            'label' => __('Image Size', 'livemesh'),
            'desc' => __(' Can be mini, small, medium, large, full, square.', 'livemesh'),
            'options' => array(
                'medium' => __('Medium', 'livemesh'),
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        ),
        'filterable' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Filterable', 'livemesh'),
            'desc' => __('The portfolio items will be filterable based on portfolio categories if set to true.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
        'no_margin' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Margin', 'livemesh'),
            'desc' => __(' If set to true, no margins are maintained between the columns. Helps to achieve the popular packed layout.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
    ),
    'shortcode' => '[show_portfolio number_of_columns="{{number_of_columns}}" post_count="{{post_count}}" image_size="{{image_size}}" filterable="{{filterable}}" no_margin="{{no_margin}}"]',
    'popup_title' => __('Insert Portfolio  Shortcode', 'livemesh')
);

$livemesh_shortcodes['show_gallery'] = array(
    'no_preview' => true,
    'params' => array(
        'number_of_columns' => array(
            'std' => '3',
            'type' => 'text',
            'label' => __('Number of Columns', 'livemesh'),
            'desc' => __('The number of columns to display per row of the post snippets', 'livemesh')
        ),
        'post_count' => array(
            'std' => '9',
            'type' => 'text',
            'label' => __('Number of Posts', 'livemesh'),
            'desc' => __(' Total number of Gallery items to display', 'livemesh')
        ),
        'image_size' => array(
            'std' => 'medium',
            'type' => 'select',
            'label' => __('Image Size', 'livemesh'),
            'desc' => __(' Can be mini, small, medium, large, full, square', 'livemesh'),
            'options' => array(
                'medium' => __('Medium', 'livemesh'),
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        ),
        'filterable' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Filterable', 'livemesh'),
            'desc' => __('The Gallery items will be filterable based on portfolio categories if set to true.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
        'no_margin' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Margin', 'livemesh'),
            'desc' => __(' If set to true, no margins are maintained between the columns.', 'livemesh'),
            'options' => array(
                'true' => __('True', 'livemesh'),
                'false' => __('False', 'livemesh')
            )
        ),
    ),
    'shortcode' => '[show_gallery number_of_columns="{{number_of_columns}}" post_count="{{post_count}}" image_size="{{image_size}}" filterable="{{filterable}}" no_margin="{{no_margin}}"]',
    'popup_title' => __('Insert Gallery  Shortcode', 'livemesh')
);

/*blog posts shortcode*/
$livemesh_shortcodes['recent_posts'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number of Posts', 'livemesh'),
            'desc' => __('Number of posts to display', 'livemesh')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'livemesh'),
            'desc' => __('Display thumbnail image or hide the same', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'livemesh'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'livemesh'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'livemesh')
        ),
        'image_size' => array(
            'std' => 'small',
            'type' => 'select',
            'label' => __('Image Size', 'livemesh'),
            'desc' => __(' Can be mini, small, medium, large, full, square', 'livemesh'),
            'options' => array(
                'medium' => __('Medium', 'livemesh'),
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        )

    ),
    'shortcode' => '[recent_posts post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Blog Post Shortcode', 'livemesh')
);

$livemesh_shortcodes['popular_posts'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number Of Posts', 'livemesh'),
            'desc' => __('Number of posts to display', 'livemesh')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'livemesh'),
            'desc' => __('Display thumbnail image or hide the same', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'livemesh'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'livemesh'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'livemesh')
        ),
        'image_size' => array(
            'std' => 'small',
            'type' => 'select',
            'label' => __('Image Size', 'livemesh'),
            'desc' => __(' Can be mini, small, medium, large, full, square', 'livemesh'),
            'options' => array(
                'medium' => __('Medium', 'livemesh'),
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        )

    ),
    'shortcode' => '[popular_posts post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Popular Posts Shortcode', 'livemesh')
);

$livemesh_shortcodes['category_posts'] = array(
    'no_preview' => true,
    'params' => array(
        'category_slugs' => array(
            'std' => 'inspiration,technology',
            'type' => 'text',
            'label' => __('Category Slugs', 'livemesh'),
            'desc' => __('The comma separated list of posts category slugs.', 'livemesh')
        ),
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number of Posts', 'livemesh'),
            'desc' => __('Number of posts to display', 'livemesh')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'livemesh'),
            'desc' => __('Display thumbnail image or hide the same', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'livemesh'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'livemesh'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'livemesh')
        ),
        'image_size' => array(
            'std' => 'small',
            'type' => 'select',
            'label' => __('Image Size', 'livemesh'),
            'desc' => __(' Can be mini, small, medium, large, full, square', 'livemesh'),
            'options' => array(
                'medium' => __('Medium', 'livemesh'),
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        )

    ),
    'shortcode' => '[category_posts category_slugs="{{category_slugs}}" post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Posts for one or more Categories', 'livemesh')
);

$livemesh_shortcodes['tag_posts'] = array(
    'no_preview' => true,
    'params' => array(
        'tag_slugs' => array(
            'std' => 'inspiration,technology',
            'type' => 'text',
            'label' => __('Tag Slugs', 'livemesh'),
            'desc' => __('The comma separated list of posts tag slugs.', 'livemesh')
        ),
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number of Posts', 'livemesh'),
            'desc' => __('Number of posts to display', 'livemesh')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'livemesh'),
            'desc' => __('Display thumbnail image or hide the same', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'livemesh'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'livemesh'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'livemesh')
        ),
        'image_size' => array(
            'std' => 'small',
            'type' => 'select',
            'label' => __('Image Size', 'livemesh'),
            'desc' => __(' Can be mini, small, medium, large, full, square', 'livemesh'),
            'options' => array(
                'medium' => __('Medium', 'livemesh'),
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        )
    ),
    'shortcode' => '[tag_posts tag_slugs="{{tag_slugs}}" post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Posts of one or more Tags', 'livemesh')
);

$livemesh_shortcodes['show_custom_post_types'] = array(
    'no_preview' => true,
    'params' => array(
        'post_types' => array(
            'std' => 'post',
            'type' => 'select',
            'label' => __('Post Types', 'livemesh'),
            'desc' => __('The comma separated list of post types whose posts need to be displayed.', 'livemesh'),
            'options' => array(
                'post' => __('Post', 'livemesh'),
                'portfolio' => __('Portfolio', 'livemesh'),
                'gallery_item' => __('Gallery', 'livemesh'),
                'team' => __('Team', 'livemesh')
            )
        ),
        'post_count' => array(
            'std' => '5',
            'type' => 'text',
            'label' => __('Number of Posts', 'livemesh'),
            'desc' => __('Number of posts to display', 'livemesh')
        ),
        'hide_thumbnail' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Hide Thumbnail', 'livemesh'),
            'desc' => __('Display thumbnail image or hide the same', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'show_meta' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Display Meta Information', 'livemesh'),
            'desc' => __(' Display meta information like the author, date of publishing and number of comments', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'excerpt_count' => array(
            'std' => '50',
            'type' => 'text',
            'label' => __('Excerpt Count', 'livemesh'),
            'desc' => __(' The excerpt displayed is truncated to the number of characters specified with this parameter.', 'livemesh')
        ),
        'image_size' => array(
            'std' => 'small',
            'type' => 'select',
            'label' => __('Image Size', 'livemesh'),
            'desc' => __(' Can be mini, small, medium, large, full, square', 'livemesh'),
            'options' => array(
                'medium' => __('Medium', 'livemesh'),
                'mini' => __('Mini', 'livemesh'),
                'small' => __('Small', 'livemesh'),
                'large' => __('Large', 'livemesh'),
                'full' => __('Full', 'livemesh'),
                'square' => __('Square', 'livemesh')
            )
        )
    ),
    'shortcode' => '[show_custom_post_types post_types="{{post_types}}" post_count="{{post_count}}" hide_thumbnail="{{hide_thumbnail}}" show_meta="{{show_meta}}" excerpt_count="{{excerpt_count}}" image_size="{{image_size}}"]',
    'popup_title' => __('Insert Custom Post Types', 'livemesh')
);
/*custom Post Types*/

$livemesh_shortcodes['pricing_plans'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Number of Pricing Columns', 'livemesh'),
            'desc' => __('The number of pricing columns to be displayed. By default displays all of the custom posts entered as pricing in the Pricing Plan tab of WordPress admin (optional).', 'livemesh')
        ),
        'pricing_ids' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Pricing IDs', 'livemesh'),
            'desc' => __('A comma separated post ids of the pricing custom post types created in the Pricing Plan tab of WordPress admin (optional). Useful for filtering the items displayed. ', 'livemesh')
        )
    ),
    'shortcode' => '[pricing_plans post_count="{{post_count}}" pricing_ids="{{pricing_ids}}"]',
    'popup_title' => __('Insert Pricing Plans Shortcode', 'livemesh')
);

$livemesh_shortcodes['testimonials'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Number of Testimonials', 'livemesh'),
            'desc' => __('The number of testimonials to be displayed.', 'livemesh')
        ),
        'testimonial_ids' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Testimonials IDs', 'livemesh'),
            'desc' => __('A comma separated post ids of the Testimonial custom post types created in the Testimonials tab of the WordPress Admin. Helps to filter the testimonials for display (optional).', 'livemesh')
        )
    ),
    'shortcode' => '[testimonials post_count="{{post_count}}" testimonial_ids="{{testimonial_ids}}"]',
    'popup_title' => __('Insert Testimonials Shortcode', 'livemesh')
);

$livemesh_shortcodes['testimonials2'] = array(
    'no_preview' => true,
    'params' => array(
        'post_count' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Number of Testimonials2', 'livemesh'),
            'desc' => __('The number of testimonials to be displayed.', 'livemesh')
        ),
        'testimonial_ids' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Testimonials IDs', 'livemesh'),
            'desc' => __('A comma separated post ids of the Testimonial custom post types created in the Testimonials tab of the WordPress Admin. Helps to filter the testimonials for display (optional).', 'livemesh')
        )
    ),
    'shortcode' => '[testimonials2 post_count="{{post_count}}" testimonial_ids="{{testimonial_ids}}"]',
    'popup_title' => __('Insert Testimonials 2 Shortcode', 'livemesh')
);

$livemesh_shortcodes['team'] = array(
    'no_preview' => true,
    'params' => array(
        'department' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Department', 'livemesh'),
            'desc' => __('The comma separated slugs of the department(s) for which the team slider needs to be created. Helps to limit the team members displayed to one or more departments. (optional).', 'livemesh')
        )
    ),
    'shortcode' => '[team department="{{department}}"]',
    'popup_title' => __('Insert Team Shortcode', 'livemesh')
);

$livemesh_shortcodes['team_slider'] = array(
    'no_preview' => true,
    'params' => array(
        'id' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Element Id', 'livemesh'),
            'desc' => __('The element id of the wrapper element for the slider. Useful if you need to have multiple team sliders in a single page (optional).', 'livemesh')
        ),
        'department' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Department', 'livemesh'),
            'desc' => __('The comma separated slugs of the department(s) for which the team slider needs to be created. Helps to limit the team members displayed to one or more departments. (optional).', 'livemesh')
        )
    ),
    'shortcode' => '[team_slider id="{{id}}" department="{{department}}"]',
    'popup_title' => __('Insert Team Slider Shortcode', 'livemesh')
);

/*slider shortcodes*/

$livemesh_shortcodes['responsive_slider'] = array(
    'no_preview' => true,
    'params' => array(
        'type' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Type', 'livemesh'),
            'desc' => __('Constructs and sets a unique CSS class for the slider. (optional).', 'livemesh')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'livemesh'),
            'desc' => __('The inline CSS applied to the slider container DIV element.(optional)', 'livemesh'),
        ),
        'slideshow_speed' => array(
            'std' => '5000',
            'type' => 'text',
            'label' => __('Slideshow Speed', 'livemesh'),
            'desc' => __('Set the speed of the slideshow cycling, in milliseconds', 'livemesh')
        ),
        'animation_speed' => array(
            'std' => '600',
            'type' => 'text',
            'label' => __('Animation Speed', 'livemesh'),
            'desc' => __('Set the speed of animations, in milliseconds.', 'livemesh')
        ),

        'animation' => array(
            'std' => 'fade',
            'type' => 'select',
            'label' => __('Animation', 'livemesh'),
            'desc' => __('Select your animation type, "fade" or "slide".', 'livemesh'),
            'options' => array(
                'fade' => __('fade', 'livemesh'),
                'slide' => __('slide', 'livemesh')
            )
        ),
        'pause_on_action' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Pause on Action', 'livemesh'),
            'desc' => __('Pause the slideshow when interacting with control elements, highly recommended.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'pause_on_hover' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Pause on Hover', 'livemesh'),
            'desc' => __('Pause the slideshow when hovering over slider, then resume when no longer hovering. '),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'direction_nav' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Direction Navigation', 'livemesh'),
            'desc' => __(' Create navigation for previous/next navigation.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'control_nav' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Control Navigation', 'livemesh'),
            'desc' => __('Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'easing' => array(
            'std' => 'swing',
            'type' => 'text',
            'label' => __('Easing', 'livemesh'),
            'desc' => __(' Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!', 'livemesh')
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'livemesh'),
            'desc' => __('Should the animation loop?', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'slideshow' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Slideshow', 'livemesh'),
            'desc' => __('Animate slider automatically without user intervention.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'controls_container' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Controls Container', 'livemesh'),
            'desc' => __('Advanced Use only - Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be ".flexslider-container". Property is ignored if given element is not found.', 'livemesh')
        ),
        'manual_controls' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Manual Controls', 'livemesh'),
            'desc' => __('Advanced Use only - Selector: Declare custom control navigation. Examples would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.', 'livemesh')
        )
    ),
    'shortcode' => '[responsive_slider type="{{type}}" slideshow_speed="{{slideshow_speed}}" animation_speed="{{animation_speed}}" animation="{{animation}}" control_nav="{{control_nav}}" direction_nav="{{direction_nav}}" pause_on_hover="{{pause_on_hover}}" pause_on_action="{{pause_on_action}}" easing="{{easing}}" loop="{{loop}}" slideshow="{{slideshow}}" controls_container="{{controls_container}}" manualControls="{{manual_controls}}" style="{{style}}"]REPLACE WITH A LIST (ul > li tag) OF IMAGES OR HTML CONTENT[/responsive_slider]',
    'popup_title' => __('Insert Slider  Shortcode', 'livemesh')

);
/*device slider not completed*/

$livemesh_shortcodes['device_slider'] = array(
    'no_preview' => true,
    'params' => array(
        'device' => array(
            'std' => 'iphone',
            'type' => 'select',
            'label' => __('Select Slider Type', 'livemesh'),
            'desc' => __('The device type to decide on the type of slider desired.', 'livemesh'),
            'options' => array(
                'iphone' => __('iphone', 'livemesh'),
                'galaxys4' => __('galaxys4', 'livemesh'),
                'htcone' => __('htcone', 'livemesh'),
                'ipad' => __('ipad', 'livemesh'),
                'imac' => __('imac', 'livemesh'),
                'macbook' => __('macbook', 'livemesh'),
                'browser' => __('browser', 'livemesh')
            )
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'livemesh'),
            'desc' => __('The inline CSS applied to the slider container DIV element.', 'livemesh'),
        ),
        'slideshow_speed' => array(
            'std' => '5000',
            'type' => 'text',
            'label' => __('Slideshow Speed', 'livemesh'),
            'desc' => __('Set the speed of the slideshow cycling, in milliseconds', 'livemesh')
        ),
        'animation_speed' => array(
            'std' => '600',
            'type' => 'text',
            'label' => __('Animation Speed', 'livemesh'),
            'desc' => __('Set the speed of animations, in milliseconds.', 'livemesh')
        ),
        'animation' => array(
            'std' => 'fade',
            'type' => 'select',
            'label' => __('Animation', 'livemesh'),
            'desc' => __('Select your animation type, "fade" or "slide".', 'livemesh'),
            'options' => array(
                'fade' => __('fade', 'livemesh'),
                'slide' => __('slide', 'livemesh')
            )
        ),
        'pause_on_action' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Pause On Action', 'livemesh'),
            'desc' => __('Pause the slideshow when interacting with control elements, highly recommended.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'pause_on_hover' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Pause On Hover', 'livemesh'),
            'desc' => __('Pause the slideshow when hovering over slider, then resume when no longer hovering. '),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'direction_nav' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Direction Navigation', 'livemesh'),
            'desc' => __(' Create navigation for previous/next navigation?', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'control_nav' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Control Navigation', 'livemesh'),
            'desc' => __('Create navigation for paging control of each slide? Note: Leave true for manual_controls usage.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'easing' => array(
            'std' => 'swing',
            'type' => 'text',
            'label' => __('Easing', 'livemesh'),
            'desc' => __(' Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!', 'livemesh')
        ),
        'loop' => array(
            'std' => 'true',
            'type' => 'select',
            'label' => __('Loop', 'livemesh'),
            'desc' => __('Should the animation loop?', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'image_urls' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Image URLs', 'livemesh'),
            'desc' => __('Comma separated list of URLs pointing to the images.', 'livemesh')
        ),
        'browser_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Browser URL', 'livemesh'),
            'desc' => __('If the device specified is browser or if [browser_slider], provide the URL to be displayed in the address bar of the browser.', 'livemesh')
        )
    ),
    'shortcode' => '[{{device}}_slider style="{{style}}" slideshow_speed="{{slideshow_speed}}" animation_speed="{{animation_speed}}" animation="{{animation}}" control_nav="{{control_nav}}" direction_nav="{{direction_nav}}" pause_on_hover="{{pause_on_hover}}" pause_on_action="{{pause_on_action}}" easing="{{easing}}" loop="{{loop}}" image_urls="{{image_urls}}" browser_url="{{browser_url}}"]',
    'popup_title' => __('Insert Slider Shortcode', 'livemesh')

);

/*tabs shortcode*/

$livemesh_shortcodes['tabgroup'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode' => '[tabgroup]{{child_shortcode}}[/tabgroup]',
    'popup_title' => __('Insert Tab Shortcode', 'livemesh'),
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'livemesh'),
                'desc' => __('Title of the tab', 'livemesh'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'livemesh'),
                'desc' => __('Add the tabs content', 'livemesh')
            )
        ),
        'shortcode' => '[tab title="{{title}}"]{{content}}[/tab]',
        'clone_button' => __('Add Tab', 'livemesh')
    )

);

$livemesh_shortcodes['toggle'] = array(
    'no_preview' => true,
    'params' => array(
        'type' => array(
            'type' => 'text',
            'label' => __('Type', 'livemesh'),
            'desc' => __('CSS class name to be assigned to the toggle DIV element created.', 'livemesh'),
            'std' => ''
        ),
        'title' => array(
            'type' => 'text',
            'label' => __('Toggle Content Title', 'livemesh'),
            'desc' => __('The title of the toggle.', 'livemesh'),
            'std' => 'Title'
        ),
        'content' => array(
            'std' => 'Content',
            'type' => 'textarea',
            'label' => __('Toggle Content', 'livemesh'),
            'desc' => __('Add the toggle content. Will accept HTML', 'livemesh'),
        )
    ),
    'shortcode' => '[toggle type="{{type}}" title="{{title}}"]{{content}}[/toggle]',
    'popup_title' => __('Insert Toggle Shortcode', 'livemesh')
);
/* stats shortcode */
$livemesh_shortcodes['skills'] = array(
    'params' => array(),
    'shortcode' => '[skills]{{child_shortcode}}[/skills]',
    'popup_title' => __('Insert skills Shortcode', 'livemesh'),
    'no_preview' => true,

    // child shortcode is clonable & sortable
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Web Design',
                'type' => 'text',
                'label' => __('Stats Title', 'livemesh'),
                'desc' => __('The title indicating the stats bar title', 'livemesh'),
            ),
            'value' => array(
                'std' => '87',
                'type' => 'text',
                'label' => __('Percentage Value', 'livemesh'),
                'desc' => __('The percentage value for the percentage stats to be displayed', 'livemesh'),
            )
        ),
        'shortcode' => '[skill_bar title="{{title}}" value="{{value}}"][/skill_bar] ',
        'clone_button' => __('Add Skill', 'livemesh')
    )
);

$livemesh_shortcodes['animate_numbers'] = array(
    'params' => array(),
    'shortcode' => '[animate-numbers]{{child_shortcode}}[/animate-numbers]',
    'popup_title' => __('Insert Animate Numbers Shortcode', 'livemesh'),
    'no_preview' => true,

    // child shortcode is clonable & sortable
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Hours Worked',
                'type' => 'text',
                'label' => __('Stats Title', 'livemesh'),
                'desc' => __('The title indicating the stats title.', 'livemesh'),
            ),
            'start_value' => array(
                'std' => '670',
                'type' => 'text',
                'label' => __('Start Value', 'livemesh'),
                'desc' => __('The starting value for the animation which displays a counter that animates to the end value specified as the content of the [animate-number] shortcode.', 'livemesh'),
            ),
            'end_value' => array(
                'std' => '23670',
                'type' => 'text',
                'label' => __('End Value', 'livemesh'),
                'desc' => __('The ending value for the animation which displays a counter that animates from the start value above to the end value specified here as the content of the [animate-number] shortcode.', 'livemesh'),
            ),
            'icon' => array(
                'std' => 'icon-lab4',
                'type' => 'text',
                'label' => __('Icon', 'livemesh'),
                'desc' => __('The font icon to be displayed for the statistic being displayed. The class names are listed at http://portfoliotheme.org/support/faqs/how-to-use-1500-icons-bundled-with-the-agile-theme/', 'livemesh'),
            )
        ),
        'shortcode' => '[animate-number icon="{{icon}}" title="{{title}}" start_value="{{start_value}}"]{{end_value}}[/animate-number] ',
        'clone_button' => __('Add Animated Number', 'livemesh')
    )
);
$livemesh_shortcodes['piechart'] = array(
    'no_preview' => true,
    'params' => array(
        'title' => array(
            'type' => 'text',
            'label' => __('Piechart Title', 'livemesh'),
            'desc' => __('The title of the Piechart.', 'livemesh'),
            'std' => 'Repeat Customers'
        ),
        'value' => array(
            'std' => '83',
            'type' => 'text',
            'label' => __('Percentage Value', 'livemesh'),
            'desc' => __('The percentage value for the percentage stats.', 'livemesh'),
        )
    ),
    'shortcode' => '[piechart title="{{title}}" percent="{{value}}"][/piechart]',
    'popup_title' => __('Insert Piechart Shortcode', 'livemesh')
);

/*miscellenous shortcodes*/
$livemesh_shortcodes['message'] = array(
    'no_preview' => true,
    'params' => array(
        'message_type' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Message Type', 'livemesh'),
            'desc' => __('', 'livemesh'),
            'options' => array(
                'success' => __('Success', 'livemesh'),
                'info' => __('Info', 'livemesh'),
                'warning' => __('Warning', 'livemesh'),
                'tip' => __('Tip', 'livemesh'),
                'note' => __('Note', 'livemesh'),
                'errors' => __('Error', 'livemesh'),
                'attention' => __('Attention', 'livemesh')
            )
        ),
        'title' => array(
            'type' => 'text',
            'label' => __('Title', 'livemesh'),
            'desc' => __('Title displayed above the text in bold.', 'livemesh'),
            'std' => ''
        ),
        'message_text' => array(
            'type' => 'text',
            'label' => __('Message Text', 'livemesh'),
            'desc' => __('The message text to be displayed.', 'livemesh'),
            'std' => ''
        )
    ),
    'shortcode' => '[{{message_type}} title="{{title}}"]{{message_text}}[/{{message_type}}]',
    'popup_title' => __('Insert Message Shortcode', 'livemesh')
);

$livemesh_shortcodes['divider'] = array(
    'no_preview' => true,
    'params' => array(
        'divider_type' => array(
            'std' => 'divider',
            'type' => 'select',
            'label' => __('Divider Type', 'livemesh'),
            'desc' => __('Type of Divider', 'livemesh'),
            'options' => array(
                'divider' => __('Divider', 'livemesh'),
                'divider_line' => __('Divider Line', 'livemesh'),
                'divider_space' => __('Divider Space', 'livemesh'),
                'divider_fancy' => __('Divider Fancy', 'livemesh'),
                'divider_top' => __('Divider with Top Link', 'livemesh'),
                'clear' => __('Clear', 'livemesh'),
            )
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the DIV element created (optional)', 'livemesh')
        )
    ),
    'shortcode' => '[{{divider_type}} style="{{style}}"]',
    'popup_title' => __('Insert Divider Shortcode', 'livemesh')
);


$livemesh_shortcodes['box_frame'] = array(
    'no_preview' => true,
    'params' => array(
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'livemesh'),
            'desc' => __('Title for the box.', 'livemesh')
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'livemesh'),
            'desc' => __('Choose Alignment', 'livemesh'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'livemesh'),
                'left' => __('Left', 'livemesh'),
                'center' => __('Center', 'livemesh'),
                'right' => __('Right', 'livemesh')
            )
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the div element created (optional)', 'livemesh')
        ),
        'class' => array(
            'type' => 'text',
            'label' => __('Class', 'livemesh'),
            'desc' => __(' Custom CSS class name to be set for the div element created (optional)', 'livemesh'),
            'std' => ''
        ),
        'width' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Width', 'livemesh'),
            'desc' => __('Custom width of the box. Do include px suffix or another appropriate suffix for width.', 'livemesh')
        ),
        'inner_style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Inner Style', 'livemesh'),
            'desc' => __('Inline CSS styling for the inner box (optional)', 'livemesh')
        )
    ),
    'shortcode' => '[box_frame style="{{style}}" width="{{width}}" class="{{class}}" align="{{align}}" title="{{title}}" inner_style="{{inner_style}}"]REPLACE WITH CONTENT[/box_frame]',
    'popup_title' => __('Insert Box Frame Shortcode', 'livemesh')
);


$livemesh_shortcodes['clear'] = array(
    'no_preview' => true,
    'params' => array(),
    'shortcode' => '[clear]',
    'popup_title' => __('Insert Clear Shortcode', 'livemesh')
);

$livemesh_shortcodes['header_fancy'] = array(
    'no_preview' => true,
    'params' => array(
        'text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Text', 'livemesh'),
            'desc' => __('The text to be displayed in the center of the header.', 'livemesh')
        ),
        'style' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Style', 'livemesh'),
            'desc' => __('Inline CSS styling applied for the DIV element created (optional);', 'livemesh')
        ),
        'class' => array(
            'type' => 'text',
            'label' => __('Class', 'livemesh'),
            'desc' => __(' Custom CSS class name to be set for the div element created (optional)', 'livemesh'),
            'std' => ''
        )
    ),
    'shortcode' => '[header_fancy class="{{class}}" style="{{style}}" text="{{text}}"]',
    'popup_title' => __('Insert Header Fancy Shortcode', 'livemesh')
);

/*Social Shortcodes*/

$livemesh_shortcodes['social_list'] = array(
    'no_preview' => true,
    'params' => array(
        'email' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Email', 'livemesh'),
            'desc' => __('The email address to be used.', 'livemesh')
        ),
        'align' => array(
            'type' => 'select',
            'label' => __('Alignment', 'livemesh'),
            'desc' => __('Choose Alignment', 'livemesh'),
            'std' => 'none',
            'options' => array(
                'none' => __('None', 'livemesh'),
                'left' => __('Left', 'livemesh'),
                'center' => __('Center', 'livemesh'),
                'right' => __('Right', 'livemesh')
            )
        ),
        'facebook_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Facebook URL', 'livemesh'),
            'desc' => __('The URL of the Facebook page.', 'livemesh')
        ),
        'twitter_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Twitter URL', 'livemesh'),
            'desc' => __('The URL of the Twitter page.', 'livemesh')
        ),
        'flickr_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Flickr URL', 'livemesh'),
            'desc' => __('The URL of the Flickr page.', 'livemesh')
        ),
        'youtube_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('YouTube URL', 'livemesh'),
            'desc' => __('The URL of the Youtube page.', 'livemesh')
        ),
        'youtube_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('YouTube URL', 'livemesh'),
            'desc' => __('The URL of the Youtube page.', 'livemesh')
        ),
        'linkedin_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Linkedin URL', 'livemesh'),
            'desc' => __('The URL of the Linkedin page.', 'livemesh')
        ),
        'googleplus_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Googleplus URL', 'livemesh'),
            'desc' => __('The URL of the Googleplus page.', 'livemesh')
        ),
        'vimeo_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Vimeo URL', 'livemesh'),
            'desc' => __('The URL of the Vimeo page.', 'livemesh')
        ),
        'instagram_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Instagram URL', 'livemesh'),
            'desc' => __('The URL of the Instagram page.', 'livemesh')
        ),
        'behance_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Behance URL', 'livemesh'),
            'desc' => __('The URL of the Behance page.', 'livemesh')
        ),
        'pinterest_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Pinterest URL', 'livemesh'),
            'desc' => __('The URL of the Pinterest page.', 'livemesh')
        ),
        'skype_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Skype URL', 'livemesh'),
            'desc' => __('The URL of the Skype page.', 'livemesh')
        ),
        'dribbble_url' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Dribbble URL', 'livemesh'),
            'desc' => __('The URL of the Dribbble page.', 'livemesh')
        ),
        'include_rss' => array(
            'std' => 'false',
            'type' => 'select',
            'label' => __('Include RSS', 'livemesh'),
            'desc' => __('A boolean value(true/false string) indicating that the link to the RSS feed be included. Default is false.', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        )
    ),
    'shortcode' => '[social_list googleplus_url="{{googleplus_url}}" facebook_url="{{facebook_url}}" twitter_url="{{twitter_url}}" youtube_url="{{youtube_url}}" linkedin_url="{{linkedin_url}}" vimeo_url="{{vimeo_url}}" instagram_url="{{instagram_url}}" behance_url="{{behance_url}}" pinterest_url="{{pinterest_url}}" skype_url="{{skype_url}}" dribbble_url="{{dribbble_url}}" include_rss="{{include_rss}}"]',
    'popup_title' => __('Insert Social List Shortcode', 'livemesh')
);


$livemesh_shortcodes['donate'] = array(
    'no_preview' => true,
    'params' => array(
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'livemesh'),
            'desc' => __('The title of the link that displays the Paypal donate button.', 'livemesh')
        ),
        'account' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Account', 'livemesh'),
            'desc' => __('The Paypal account for which the donate button is being created.', 'livemesh')
        ),
        'display_card_logos' => array(
            'std' => '',
            'type' => 'select',
            'label' => __('Display Card Logos', 'livemesh'),
            'desc' => __(' Specify if you need to display the logo images of the credit cards accepted for Paypal donations', 'livemesh'),
            'options' => array(
                'false' => __('false', 'livemesh'),
                'true' => __('true', 'livemesh')
            )
        ),
        'cause' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Cause', 'livemesh'),
            'desc' => __('The text indicating the purpose for which the donation is being collected.', 'livemesh')
        )
    ),
    'shortcode' => '[donate title="{{title}}" account="{{account}}" display_card_logos="{{display_card_logos}}" cause="{{cause}}"]',
    'popup_title' => __('Insert Donate Shortcode', 'livemesh')
);

$livemesh_shortcodes['subscribe_rss'] = array(
    'no_preview' => true,
    'params' => array(),
    'shortcode' => '[subscribe_rss]',
    'popup_title' => __('Insert Subscribe RSS Shortcode', 'livemesh')
);












