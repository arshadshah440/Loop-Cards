<?php
// if file is being called directly or not in the wordpress
if (! defined('ABSPATH')) exit; // Exit if accessed directly
/*
 * Package: Loop Cards
 * @subpackage Loop Cards/admin 
 * @since 1.0.0
 * @author Arshad Shah
 */
require_once LOOPCARD_PLUGIN_PATH . '/includes/admin/lpcd-class-fields-mockup.php';
if (!class_exists('lpcd_admin_menu')) {

    class lpcd_admin_menu
    {


        public static function lpcd_admin_init()
        {
            // Hook into admin_enqueue_scripts correctly
            add_action('admin_enqueue_scripts', array(__CLASS__, 'lpcd_admin_enqueue_files'));
            add_action('admin_menu', array(__CLASS__, 'lpcd_admin_menu_options'));
            add_action('admin_init', array(__CLASS__, 'lpcd_admin_menu_settings'));
        }

        // Make this method static to match the hook call
        public static function lpcd_admin_enqueue_files()
        {
            // Ensure that the constant LOOPCARD_PLUGIN_URL is defined or use plugin_dir_url(__FILE__)
            wp_enqueue_style('lpcdadminstyles', plugin_dir_url(__FILE__) . '/css/style.css', array(), "1.0.0", 'all');
            wp_enqueue_script('lpcdadminscripts', plugin_dir_url(__FILE__) . '/js/main.js', array('jquery'), filemtime(LOOPCARD_PLUGIN_PATH . '/includes/admin/js/main.js'), true);
        }

        public static function lpcd_admin_menu_options()
        {
            add_menu_page('LPCD Settings', 'Lpcd Settings', 'manage_options', 'lpcd-settings', array(__CLASS__, 'lpcd_admin_settings_menu'), 'dashicons-admin-generic', 20);
            add_submenu_page('lpcd-settings', 'LPCD Create Shortcode', 'Create Shortcode', 'manage_options', 'lpcd-create-shortcode',  array(__CLASS__, 'lpcd_create_shortcode_menu'), 21);
        }

        public static function lpcd_admin_settings_menu()
        {
            include LOOPCARD_PLUGIN_PATH . 'templates/adminmenu/lpcd-settings-template.php';
        }
        public static function lpcd_create_shortcode_menu()
        {
            include LOOPCARD_PLUGIN_PATH . 'templates/adminmenu/lpcd-create-shortcode-menu-template.php';
        }
        public static function lpcd_admin_menu_settings()
        {
            // register settings for LPCD Settings Page
            register_setting('lpcd-settings', 'lpcd-settings_options');

            //register new section settings
            add_settings_section('lpcd_custom_shortcode_settings', 'LPCD Custom Shortcode', array(__CLASS__, 'lpcd_shortcode_settings'), 'lpcd-settings');
            $lpcd_args       = array(
                'public' => true,
            );
            $lpcd_post_types = get_post_types($lpcd_args, 'objects');
            unset($lpcd_post_types['attachment']);
            $lpcd_fields = array(
                array('type' => 'number', 'name' => 'Number Of Posts', 'value' => '', 'id' => 'lpcd_number_of_posts', 'class' => 'lpcd_input_number'),
                array('type' => 'text', 'name' => 'Text Field', 'value' => '', 'id' => 'lpcd_text_field', 'class' => 'lpcd_input_text'),
                array('type' => 'checkbox', 'name' => 'Show Author Details', 'value' => 'lpcd_author_name', 'id' => 'lpcd_author_name', 'class' => 'lpcd_input_checkbox'),
                array('type' => 'select', 'name' => 'Show Author Name', 'value' => $lpcd_post_types, 'id' => 'lpcd_postypes', 'class' => 'lpcd_input_select'),
            );
            $fielddata = array(
                'label_for' => 'lpcd_post_type',
                'class' => 'lpcd_post_type',
                'post_types' => $lpcd_post_types,
                'wporg_custom_data' => 'custom_post_type',
            );

            foreach ($lpcd_fields as $field) {
                // register new field settings
                add_settings_field($field['id'], $field['name'], array(__CLASS__, 'lpcd_setting_field'), 'lpcd-settings', 'lpcd_custom_shortcode_settings', $field);
            }
        }
        public static function lpcd_shortcode_settings($args)
        {
            echo '<div class="lpcd-settings"> </div>';
        }
        public static function lpcd_setting_field($args)
        {
            // Get the value of the setting we've registered with register_setting()
            $options = get_option('lpcd-settings_options');
            if ($args['type'] == 'number') {
                lpcd_fields_mockup::number_input($args, $options);
            } else if ($args['type'] == 'text') {
                lpcd_fields_mockup::text_input($args, $options);
            } else if ($args['type'] == 'checkbox') {
                lpcd_fields_mockup::checkbox_input($args, $options);
            } else if ($args['type'] == 'select') {
                lpcd_fields_mockup::select_input($args, $options);
            }
        }
    }
}
