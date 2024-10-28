<?php
// if file is being called directly or not in the wordpress
if (! defined('ABSPATH')) exit; // Exit if accessed directly

/*
 * Package: Loop Cards
 * @subpackage Loop Cards/includes 
 * @since 1.0.0
 * @author Arshad Shah
 */
require_once LOOPCARD_PLUGIN_PATH . 'includes/admin/lpcd-class-admin-menu.php';
require_once LOOPCARD_PLUGIN_PATH . 'includes/shortcodes/lpcd-class-cpt-shortcodes.php';

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
            lpcd_cpt_shortcodes::init_shortcodes();
            lpcd_admin_menu::lpcd_admin_init();
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
            wp_enqueue_style('basicLoopCards', LOOPCARD_PLUGIN_URL . '/includes/public/css/basicloopcards.css', array(), filemtime(LOOPCARD_PLUGIN_PATH . '/includes/public/css/basicloopcards.css'), 'all');
        }
    }
}
