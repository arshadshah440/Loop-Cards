<?php

/*
 * Package: Loop Cards
 * @subpackage Loop Cards/admin 
 * @since 1.0.0
 * @author Arshad Shah
 */

if (!class_exists('lpcd_admin_menu')) {

    class lpcd_admin_menu
    {
        public static function lpcd_admin_init()
        {
            // Hook into admin_enqueue_scripts correctly
            add_action('admin_enqueue_scripts', array(__CLASS__, 'lpcd_admin_enqueue_files'));
            add_action('admin_menu', array(__CLASS__, 'lpcd_admin_menu_options'));
        }

        // Make this method static to match the hook call
        public static function lpcd_admin_enqueue_files()
        {
            // Ensure that the constant LOOPCARD_PLUGIN_URL is defined or use plugin_dir_url(__FILE__)
            wp_enqueue_style('lpcdadminstyles', plugin_dir_url(__FILE__) . '/css/style.css', array(), "1.0.0", 'all');
            wp_enqueue_script('lpcdadminscripts', plugin_dir_url(__FILE__) . '/js/main.js', array('jquery'),filemtime(LOOPCARD_PLUGIN_PATH . '/includes/admin/js/main.js'), true);
        }

        public static function lpcd_admin_menu_options()
        {
            add_menu_page('LPCD Settings', 'Lpcd Settings', 'manage_options', 'lpcd-settings', array(__CLASS__, 'lpcd_admin_settings_menu'), 'dashicons-admin-generic', 20);
        }

        public static function lpcd_admin_settings_menu()
        {
            include LOOPCARD_PLUGIN_PATH . 'templates/adminmenu/settings-template.php';
        }
    }
}
