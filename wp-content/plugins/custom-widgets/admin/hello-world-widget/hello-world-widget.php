<?php
/*
Widget Name: Hello World Widget
Description: This widget add small icons before text
Author: MakeIT
*/

class Hello_World_Widget extends SiteOrigin_Widget {

    function get_style_name($instance) {
        return 'style';
    }

    function __construct() {
        //Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.

        //Call the parent constructor with the required arguments.
        parent::__construct(
            // The unique id for your widget.
            'hello-world-widget',

            // The name of the widget for display purposes.
            __('Hello World Widget', 'hello-world-widget-text-domain'),

            // The $widget_options array, which is passed through to WP_Widget.
            // It has a couple of extras like the optional help URL, which should link to your sites help or support page.
            array(
                'description' => __('A hello world widget.', 'hello-world-widget-text-domain'),
                'help'        => 'http://example.com/hello-world-widget-docs',
            ),

            //The $control_options array, which is passed through to WP_Widget
            array(
            ),

            //The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => __('Title', 'siteorigin-widgets'),
                ),
                'text' => array(
                    'type' => 'tinymce',
                    'rows' => 20
                ),
                'autop' => array(
                    'type' => 'checkbox',
                    'default' => true,
                    'label' => __('Automatically add paragraphs', 'siteorigin-widgets'),
                ),
                'some_icon' => array(
                    'type' => 'icon',
                    'label' => __('Select an icon', 'widget-form-fields-text-domain'),
                ),
            ),

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }

    function unwpautop($string) {
        $string = str_replace("<p>", "", $string);
        $string = str_replace(array("<br />", "<br>", "<br/>"), "\n", $string);
        $string = str_replace("</p>", "\n\n", $string);

        return $string;
    }

    public function get_template_variables( $instance, $args ) {
        $instance = wp_parse_args(
            $instance,
            array(  'text' => '' )
        );

        $instance['text'] = $this->unwpautop( $instance['text'] );
        $instance['text'] = apply_filters( 'widget_text', $instance['text'] );

        // Run some known stuff
        if( !empty($GLOBALS['wp_embed']) ) {
            $instance['text'] = $GLOBALS['wp_embed']->autoembed( $instance['text'] );
        }
        if (function_exists('wp_make_content_images_responsive')) {
            $instance['text'] = wp_make_content_images_responsive( $instance['text'] );
        }
        if( $instance['autop'] ) {
            $instance['text'] = wpautop( $instance['text'] );
        }
        $instance['text'] = do_shortcode( shortcode_unautop( $instance['text'] ) );
        return array(
            'text' => $instance['text'],
        );
    }

    function get_template_dir($instance) {
        return plugin_dir_path(__FILE__).'/tpl';
    }
 
    function get_template_name($instance) {
        return 'default-template';
    }



}

siteorigin_widget_register( 'hello-world', __FILE__, 'Hello_World_Widget' );
?>