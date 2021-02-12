<?php
/**
 * This page shows the procedural or functional example
 *
 * OOP way example is given on the main plugin file.
 *
 * @author Tareq Hasan <tareq@weDevs.com>
 */


/**
 * Registers settings section and fields
 */
if ( !function_exists( 'wes_admin_init' ) ):
    function wes_admin_init() {

        $sections = array(
            array(
                'id' => 'wes_basics',
                'title' => __( 'Basic Settings', 'wes' )
            ),
            array(
                'id' => 'wes_advanced',
                'title' => __( 'Advanced Settings', 'wes' )
            ),
            array(
                'id' => 'wes_others',
                'title' => __( 'Other Settings', 'wpuf' )
            )
        );

        $fields = array(
            'wes_basics' => array(
                array(
                    'name' => 'text',
                    'label' => __( 'Text Input', 'wes' ),
                    'desc' => __( 'Text input description', 'wes' ),
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'name' => 'textarea',
                    'label' => __( 'Textarea Input', 'wes' ),
                    'desc' => __( 'Textarea description', 'wes' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'checkbox',
                    'label' => __( 'Checkbox', 'wes' ),
                    'desc' => __( 'Checkbox Label', 'wes' ),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'radio',
                    'label' => __( 'Radio Button', 'wes' ),
                    'desc' => __( 'A radio button', 'wes' ),
                    'type' => 'radio',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __( 'Multile checkbox', 'wes' ),
                    'desc' => __( 'Multi checkbox description', 'wes' ),
                    'type' => 'multicheck',
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'A Dropdown', 'wes' ),
                    'desc' => __( 'Dropdown description', 'wes' ),
                    'type' => 'select',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __( 'Password', 'wes' ),
                    'desc' => __( 'Password description', 'wes' ),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __( 'File', 'wes' ),
                    'desc' => __( 'File description', 'wes' ),
                    'type' => 'file',
                    'default' => ''
                ),
                array(
                    'name' => 'color',
                    'label' => __( 'Color', 'wes' ),
                    'desc' => __( 'Color description', 'wes' ),
                    'type' => 'color',
                    'default' => ''
                )
            ),
            'wes_advanced' => array(
                array(
                    'name' => 'text',
                    'label' => __( 'Text Input', 'wes' ),
                    'desc' => __( 'Text input description', 'wes' ),
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'name' => 'textarea',
                    'label' => __( 'Textarea Input', 'wes' ),
                    'desc' => __( 'Textarea description', 'wes' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'checkbox',
                    'label' => __( 'Checkbox', 'wes' ),
                    'desc' => __( 'Checkbox Label', 'wes' ),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'radio',
                    'label' => __( 'Radio Button', 'wes' ),
                    'desc' => __( 'A radio button', 'wes' ),
                    'type' => 'radio',
                    'default' => 'no',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __( 'Multile checkbox', 'wes' ),
                    'desc' => __( 'Multi checkbox description', 'wes' ),
                    'type' => 'multicheck',
                    'default' => array( 'one' => 'one', 'four' => 'four' ),
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'A Dropdown', 'wes' ),
                    'desc' => __( 'Dropdown description', 'wes' ),
                    'type' => 'select',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __( 'Password', 'wes' ),
                    'desc' => __( 'Password description', 'wes' ),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __( 'File', 'wes' ),
                    'desc' => __( 'File description', 'wes' ),
                    'type' => 'file',
                    'default' => ''
                ),
                array(
                    'name' => 'color',
                    'label' => __( 'Color', 'wes' ),
                    'desc' => __( 'Color description', 'wes' ),
                    'type' => 'color',
                    'default' => ''
                )
            ),
            'wes_others' => array(
                array(
                    'name' => 'text',
                    'label' => __( 'Text Input', 'wes' ),
                    'desc' => __( 'Text input description', 'wes' ),
                    'type' => 'text',
                    'default' => 'Title'
                ),
                array(
                    'name' => 'textarea',
                    'label' => __( 'Textarea Input', 'wes' ),
                    'desc' => __( 'Textarea description', 'wes' ),
                    'type' => 'textarea'
                ),
                array(
                    'name' => 'checkbox',
                    'label' => __( 'Checkbox', 'wes' ),
                    'desc' => __( 'Checkbox Label', 'wes' ),
                    'type' => 'checkbox'
                ),
                array(
                    'name' => 'radio',
                    'label' => __( 'Radio Button', 'wes' ),
                    'desc' => __( 'A radio button', 'wes' ),
                    'type' => 'radio',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'multicheck',
                    'label' => __( 'Multile checkbox', 'wes' ),
                    'desc' => __( 'Multi checkbox description', 'wes' ),
                    'type' => 'multicheck',
                    'options' => array(
                        'one' => 'One',
                        'two' => 'Two',
                        'three' => 'Three',
                        'four' => 'Four'
                    )
                ),
                array(
                    'name' => 'selectbox',
                    'label' => __( 'A Dropdown', 'wes' ),
                    'desc' => __( 'Dropdown description', 'wes' ),
                    'type' => 'select',
                    'options' => array(
                        'yes' => 'Yes',
                        'no' => 'No'
                    )
                ),
                array(
                    'name' => 'password',
                    'label' => __( 'Password', 'wes' ),
                    'desc' => __( 'Password description', 'wes' ),
                    'type' => 'password',
                    'default' => ''
                ),
                array(
                    'name' => 'file',
                    'label' => __( 'File', 'wes' ),
                    'desc' => __( 'File description', 'wes' ),
                    'type' => 'file',
                    'default' => ''
                ),
                array(
                    'name' => 'color',
                    'label' => __( 'Color', 'wes' ),
                    'desc' => __( 'Color description', 'wes' ),
                    'type' => 'color',
                    'default' => ''
                )
            )
        );

        $settings_api = new WeDevs_Settings_API;

        //set sections and fields
        $settings_api->set_sections( $sections );
        $settings_api->set_fields( $fields );

        //initialize them
        $settings_api->admin_init();
    }
endif;
add_action( 'admin_init', 'wes_admin_init' );

if ( !function_exists( 'wes_admin_menu' ) ):
    /**
     * Register the plugin page
     */
    function wes_admin_menu() {
        add_options_page( 'Settings API', 'Settings API', 'delete_posts', 'settings_api_test', 'wes_plugin_page' );
    }
endif;
add_action( 'admin_menu', 'wes_admin_menu' );

/**
 * Display the plugin settings options page
 */
if ( !function_exists( 'wes_plugin_page' ) ):
    function wes_plugin_page() {
        $settings_api = new WeDevs_Settings_API;

        echo '<div class="wrap">';
        settings_errors();

        $settings_api->show_navigation();
        $settings_api->show_forms();

        echo '</div>';
    }
endif;
