<?php
/*
Widget Name: Partner Icon
Description: This is partner icon widget with title and subtitle
Author: MakeIT
*/

class Partner_Icon_Widget extends SiteOrigin_Widget {

    function get_style_name($instance) {
        $this->register_frontend_styles(array(
            array(
                'partner-icon-widget',
                plugin_dir_url(__FILE__) . 'css/style.css'
            )
        ));
        $this->register_frontend_scripts(array(
            array(
                'partner-icon-widget-js',
                plugin_dir_url(__FILE__) . 'js/jquery.matchHeight.js'
            )
        ));
        return false;
    }


    function __construct() {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
            // The unique id for your widget.
            'partner-icon-widget',

            // The name of the widget for display purposes.
            __('Patner Icon', 'partner-icon-widget-text-domain'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('Partner icon widget.', 'partner-icon-widget-text-domain')
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(
            ),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'a_repeater' => array(
                    'type' => 'repeater',
                    'label' => __( 'Partner repeater' , 'widget-form-fields-text-domain' ),
                    'item_name'  => __( 'Partner item', 'text-widgets' ),
                    'item_label' => array(
                        'selector'     => "[id*='repeat_text']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'title' => array(
                            'type' => 'text',
                            'label' => __('Title', 'siteorigin-widgets'),
                        ),
                        'subtitle' => array(
                            'type' => 'text',
                            'label' => __('Subtitle', 'siteorigin-widgets'),
                        ),
                        'some_media' => array(
                            'type' => 'media',
                            'label' => __( 'Icon', 'widget-form-fields-text-domain' ),
                            'choose' => __( 'Choose image', 'widget-form-fields-text-domain' ),
                            'update' => __( 'Set image', 'widget-form-fields-text-domain' ),
                            'library' => 'image',
                            'fallback' => true
                        ),
                    )
                ),
                'a_section' => array(
                    'type' => 'section',
                    'label' => __( 'Customize how to display.' , 'widget-form-fields-text-domain' ),
                    'hide' => true,
                    'fields' => array(
                        'column_count' => array(
                            'type' => 'select',
                            'label' => __( 'Column count', 'widget-form-fields-text-domain' ),
                            'default' => '3',
                            'options' => array(
                                '3' => __( '4', 'widget-form-fields-text-domain' ),
                                '4' => __( '3', 'widget-form-fields-text-domain' ),
                                '6' => __( '2', 'widget-form-fields-text-domain' ),
                                '12' => __( '1', 'widget-form-fields-text-domain' ),
                            )
                        )
                    )
                )
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function get_template_dir($instance) {
        return plugin_dir_path(__FILE__).'tpl';
    }
 
    function get_template_name($instance) {
        return 'default-template';
    }
}

siteorigin_widget_register( 'partner-icon', __FILE__, 'Partner_Icon_Widget' );
?>