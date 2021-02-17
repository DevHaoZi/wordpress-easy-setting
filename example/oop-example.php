<?php

/**
 * WordPress settings API demo class
 *
 * @author Tareq Hasan
 */

if ( !class_exists('Easy_Setting_Test') ):

/**
 * 该宏用于标记在多站点模式下是否在全局中管理设置而不是针对单个站点管理
 */
define('WES_MULTIPLE_NETWORK', true /** 想在子站点管理设置就更改此处为false */ && is_multisite());

class Easy_Setting_Test {

    private $settings_api;

    function __construct() {
        $this->settings_api = new Easy_Setting();

        add_action( 'admin_init', array($this, 'admin_init') );
        add_action( WES_MULTIPLE_NETWORK ? 'network_admin_menu' : 'admin_menu', array($this, 'admin_menu') );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->get_settings_sections() );
        $this->settings_api->set_fields( $this->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    function admin_menu() {
        add_submenu_page(
            WES_MULTIPLE_NETWORK ? 'settings.php' : 'options-general.php',
            'Settings API',
            'Settings API',
            WES_MULTIPLE_NETWORK ? 'manage_network_options' : 'manage_options',
            'settings_api_test',
            [$this, 'plugin_page']
        );
    }

    function get_settings_sections() {
        $sections = array(
            array(
                'id'          => 'wes_basics',
                'title'       => __( 'Basic Settings', 'wes' )
            ),
            array(
                'id'          => 'wes_advanced',
                'title'       => __( 'Advanced Settings', 'wes' ),
                'show_submit' => false
            )
        );
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    function get_settings_fields() {
        $settings_fields = array(
            'wes_basics' => array(
                array(
                    'name'              => 'text_val',
                    'label'             => __( 'Text Input', 'wes' ),
                    'desc'              => __( 'Text input description', 'wes' ),
                    'placeholder'       => __( 'Text Input placeholder', 'wes' ),
                    'type'              => 'text',
                    'default'           => 'Title',
                    'sanitize_callback' => 'sanitize_text_field'
                ),
                array(
                    'name'              => 'number_input',
                    'label'             => __( 'Number Input', 'wes' ),
                    'desc'              => __( 'Number field with validation callback `floatval`', 'wes' ),
                    'placeholder'       => __( '1.99', 'wes' ),
                    'min'               => 0,
                    'max'               => 100,
                    'step'              => '0.01',
                    'type'              => 'number',
                    'default'           => 'Title',
                    'sanitize_callback' => 'floatval'
                ),
                array(
                    'name'        => 'textarea',
                    'label'       => __( 'Textarea Input', 'wes' ),
                    'desc'        => __( 'Textarea description', 'wes' ),
                    'placeholder' => __( 'Textarea placeholder', 'wes' ),
                    'type'        => 'textarea'
                ),
                array(
                    'name'        => 'html',
                    'desc'        => __( 'HTML area description. You can use any <strong>bold</strong> or other HTML elements.', 'wes' ),
                    'type'        => 'html'
                ),
                array(
                    'name'  => 'checkbox',
                    'label' => __( 'Checkbox', 'wes' ),
                    'value' => __( 'Checkbox Label', 'wes' ),
                    'desc'  => __( 'Checkbox Label', 'wes' ),
                    'type'  => 'checkbox'
                ),
                array(
                    'name'    => 'radio',
                    'label'   => __( 'Radio Button', 'wes' ),
                    'desc'    => __( 'A radio button', 'wes' ),
                    'type'    => 'radio',
                    'options' => array(
                        'yes' => 'Yes',
                        'no'  => 'No'
                    )
                ),
                array(
                    'name'    => 'selectbox',
                    'label'   => __( 'A Dropdown', 'wes' ),
                    'desc'    => __( 'Dropdown description', 'wes' ),
                    'type'    => 'select',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no'  => 'No'
                    )
                ),
                array(
                    'name'    => 'password',
                    'label'   => __( 'Password', 'wes' ),
                    'desc'    => __( 'Password description', 'wes' ),
                    'type'    => 'password',
                    'default' => ''
                ),
                array(
                    'name'    => 'file',
                    'label'   => __( 'File', 'wes' ),
                    'desc'    => __( 'File description', 'wes' ),
                    'type'    => 'file',
                    'default' => '',
                    'options' => array(
                        'button_label' => 'Choose Image'
                    )
                )
            ),
            'wes_advanced' => array(
                array(
                    'name'    => 'color',
                    'label'   => __( 'Color', 'wes' ),
                    'desc'    => __( 'Color description', 'wes' ),
                    'type'    => 'color',
                    'default' => ''
                ),
                array(
                    'name'    => 'password',
                    'label'   => __( 'Password', 'wes' ),
                    'desc'    => __( 'Password description', 'wes' ),
                    'type'    => 'password',
                    'default' => ''
                ),
                array(
                    'name'    => 'wysiwyg',
                    'label'   => __( 'Advanced Editor', 'wes' ),
                    'desc'    => __( 'WP_Editor description', 'wes' ),
                    'type'    => 'wysiwyg',
                    'default' => ''
                ),
                array(
                    'name'    => 'multicheck',
                    'label'   => __( 'Multile checkbox', 'wes' ),
                    'desc'    => __( 'Multi checkbox description', 'wes' ),
                    'type'    => 'multicheck',
                    'default' => array('one' => 'one', 'four' => 'four'),
                    'options' => array(
                        'one'   => 'One',
                        'two'   => 'Two',
                        'three' => 'Three',
                        'four'  => 'Four'
                    )
                ),
            )
        );

        return $settings_fields;
    }

    function plugin_page() {
        echo '<div class="wrap">';

        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();

        echo '</div>';
    }

    /**
     * Get all the pages
     *
     * @return array page names with key value pairs
     */
    function get_pages() {
        $pages = get_pages();
        $pages_options = array();
        if ( $pages ) {
            foreach ($pages as $page) {
                $pages_options[$page->ID] = $page->post_title;
            }
        }

        return $pages_options;
    }

}
endif;
