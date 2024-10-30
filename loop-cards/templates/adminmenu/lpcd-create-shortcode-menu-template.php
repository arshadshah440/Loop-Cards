<?php
// if file is being called directly or not in the wordpress
if (! defined('ABSPATH')) exit; // Exit if accessed directly

/* 
 * Settings Template
 * @subpackage Loop Cards/templates/adminmenu
 * @since 1.0.0
 * @author Arshad Shah
 * 
 */
// check user capabilities
if (! current_user_can('manage_options')) {
    return;
}
$lpcd_responses = false;
// add error/update messages
$lpcd_shortcode_data = include LOOPCARD_PLUGIN_PATH . '/includes/admin/lpcd-shortcodes-details.php';

// check if the user have submitted the settings
// WordPress will add the "settings-updated" $_GET parameter to the url
if (isset($_GET['settings-updated'])) {
    // add settings saved message with the class of "updated"
    $lpcd_responses = true;
}

// show error/update messages
settings_errors('lpcd_messages');


?>

<div class="lpcd_settings_menu_wrapper">
    <div class="lpcd_container">
        <div class="lpcd_welcome_wrapper lpcd_card_designs">
            <h2><?php echo esc_html__('Create Shortcode of your Choice', 'loop-cards'); ?></h2>
            <p><?php echo esc_html__('Display your posts in style with customizable post cards using our plugin. Easily showcase content with unique layouts and personalized designs.', 'loop-cards'); ?></p>
        </div>
        <div class="lpcd_messages_alert">
            <?php
            // WordPress will add the "settings-updated" $_GET parameter to the url
            if ($lpcd_responses) {
                // add settings saved message with the class of "updated"
            ?>
                <div id="setting-error-lpcd_message" class="notice notice-success settings-error is-dismissible">
                    <p><strong>Shortcode Create !! <a href="<?php echo admin_url('admin.php?page=lpcd-settings');?>">Click Here </a> To See The Shortcodes Available</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="lpcd_available_cards_design lpcd_card_designs">
            <div class="lpcd_custom_settings_wrapper">
                <form action="options.php" method="post">
                    <?php
                    settings_fields('lpcd-settings');

                    do_settings_sections('lpcd-settings');

                    submit_button('Save Settings');
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>