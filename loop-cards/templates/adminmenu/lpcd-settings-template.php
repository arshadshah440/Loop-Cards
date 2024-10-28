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

// add error/update messages

// check if the user have submitted the settings
// WordPress will add the "settings-updated" $_GET parameter to the url
if (isset($_GET['settings-updated'])) {
    // add settings saved message with the class of "updated"
    add_settings_error('lpcd_messages', 'lpcd_message', __("Settings Saved", 'loop-cards'), 'updated');
}

// show error/update messages
settings_errors('lpcd_messages');

$lpcd_shortcode_data=include LOOPCARD_PLUGIN_PATH . '/includes/admin/lpcd-shortcodes-details.php';

?>

<div class="lpcd_settings_menu_wrapper">
    <div class="lpcd_container">
        <div class="lpcd_welcome_wrapper lpcd_card_designs">
            <h2><?php echo esc_html__('Welcome To Loop Cards Plugin', 'loop-cards'); ?></h2>
            <p><?php echo esc_html__('Display your posts in style with customizable post cards using our plugin. Easily showcase content with unique layouts and personalized designs.', 'loop-cards'); ?></p>
        </div>
        <div class="lpcd_available_cards_design lpcd_card_designs">
            <h3><?php echo esc_html__('Available Posts Cards Designs', 'loop-cards'); ?></h3>
            <div class="lpcd_cards_wrappers">
                <?php
                if (is_array($lpcd_shortcode_data) && count($lpcd_shortcode_data) > 0) {
                    foreach ($lpcd_shortcode_data as $shortcode_data) {


                ?>
                        <div class="lpcd_each_cards">
                            <div class="card_design_thumbail">
                                <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/' . $shortcode_data['lpcd_shortcode_preview'] . ''); ?>" alt="<?php echo esc_attr__('Basic Loop Card Thumbnail', 'loop-cards'); ?>">
                            </div>
                            <div class="card_design_shortcode">
                                <h5><?php echo esc_html__('Basic Loop Card', 'loop-cards'); ?></h5>
                                <div class="lpcd_copy_code_wrapper">
                                    <div class="lpcd_shortcode">
                                        <h6><?php echo esc_html__('['.$shortcode_data['lpcd_shortcode_name'].']', 'loop-cards'); ?></h6>
                                    </div>
                                    <div class="lpcd_copy_icons">
                                        <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/copy-icon.svg'); ?>" alt="<?php echo esc_attr__('Copy Icon', 'loop-cards'); ?>" class="lpcd_copyicon">
                                        <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/copied.png'); ?>" alt="<?php echo esc_attr__('Copied Icon', 'loop-cards'); ?>" class="lpcd_hide_it lpcd_copyiedicon">
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php  }
                } ?>
            </div>
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