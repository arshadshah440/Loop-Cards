<?php
/*
 * Plugin Name:       Loop Cards
 * Description:       Display your posts in style with customizable post cards using our shortcode plugin. Easily showcase content with unique layouts and personalized designs.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Arshad Shah
 * Author URI:        https://arshadwpdev.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       loop-cards
 */


// if file is being called directly or not in the wordpress
if (!defined('WPINC')) {
  die;
}

/*
 * this code runs after plugin activation
 */
if (!class_exists('lpcd_main')) {
  class lpcd_main
  {
    public function __construct()
    {
      $this->define_constants();
      $this->include_files();
      register_activation_hook(__FILE__, array($this, 'lpcd_plugin_activate'));
      register_deactivation_hook(__FILE__, array($this, 'lpcd_plugin_deactivate'));
      add_action('plugins_loaded', array($this, 'lpcd_plugin_load'));
    }
    public function include_files()
    {
      require_once plugin_dir_path(__FILE__) . 'includes/lpcd-class-plugin.php';
    }
    public function define_constants()
    {
      // plugin version name
      define('LOOPCARD_PLUGIN_VERSION', '1.0.0');
      define('LOOPCARD_PLUGIN_PATH', plugin_dir_path(__FILE__));
      define('LOOPCARD_PLUGIN_URL', plugins_url('', __FILE__));
    }
    public function lpcd_plugin_load()
    {
      new lpcd_plugin();
    }
    public function lpcd_plugin_activate()
    {
      lpcd_plugin::lpcd_activate();
    }
    public function lpcd_plugin_deactivate()
    {
      lpcd_plugin::lpcd_deactivate();
    }
  }
  new lpcd_main();
}
