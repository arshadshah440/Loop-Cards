<?php

/*
 * Package: Loop Cards
 * @subpackage Loop Cards/includes 
 * @since 1.0.0
 * @author Arshad Shah
 */
require_once LOOPCARD_PLUGIN_PATH . 'includes/admin/class-lpcd-admin-menu.php';
require_once LOOPCARD_PLUGIN_PATH . 'includes/shortcodes/class-lpcd-cpt-shortcodes.php';

if (!class_exists('lpcd_plugin')) {

    class lpcd_plugin
    {
        public function __construct()
        {
            $this->load_lpcd_dependencies();
            $this->init_lpcd_hooks();
        }

        private function load_lpcd_dependencies()
        {
            if (!defined('LPCD_PLUGIN_NAME')) {
                define('LPCD_PLUGIN_NAME', 'Loop Cards');
            }

            lpcd_admin_menu::lpcd_admin_init();
            lpcd_cpt_shortcodes::init_shortcodes();
        }

        public static function lpcd_activate()
        {
            flush_rewrite_rules();
        }
        public static function lpcd_deactivate()
        {
            flush_rewrite_rules();
        }
        private function init_lpcd_hooks()
        {
            add_action('wp_enqueue_scripts', array($this, 'lpcd_load_scripts'));
        }
        public function lpcd_load_scripts()
        {
            wp_enqueue_script('lpcdmainjs', LOOPCARD_PLUGIN_URL . '/includes/public/js/main.js', array('jquery'), '1.0.0', true);
            wp_enqueue_style('basicLoopCards', LOOPCARD_PLUGIN_URL . '/includes/public/css/basicloopcards.css', array(), filemtime(LOOPCARD_PLUGIN_PATH . '/includes/public/css/basicloopcards.css'), 'all');
        }
    }
}
