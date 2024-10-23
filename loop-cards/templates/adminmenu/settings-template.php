<?php
/* 
 * Settings Template
 * @subpackage Loop Cards/templates/adminmenu
 * @since 1.0.0
 * @author Arshad Shah
 * 
 */
?>

<div class="lpcd_settings_menu_wrapper">
    <div class="lpcd_container">
        <div class="lpcd_welcome_wrapper lpcd_card_designs">
            <h2><?php echo esc_html__('Welcome To Loop Cards Plugin', 'Loop Cards'); ?></h2>
            <p><?php echo esc_html__('Display your posts in style with customizable post cards using our plugin. Easily showcase content with unique layouts and personalized designs.', 'Loop Cards'); ?></p>
        </div>
        <div class="lpcd_available_cards_design lpcd_card_designs">
            <h3><?php echo esc_html__('Available Posts Cards Designs', 'Loop Cards'); ?></h3>
            <div class="lpcd_cards_wrappers">
                <div class="lpcd_each_cards">
                    <div class="card_design_thumbail">
                        <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/basicloopcard.png'); ?>" alt="<?php echo esc_attr__('Basic Loop Card Thumbnail', 'Loop Cards'); ?>">
                    </div>
                    <div class="card_design_shortcode">
                        <h5><?php echo esc_html__('Basic Loop Card', 'Loop Cards'); ?></h5>
                        <div class="lpcd_copy_code_wrapper">
                            <div class="lpcd_shortcode">
                                <h6><?php echo esc_html__('[basic_loop_shortcode]', 'Loop Cards'); ?></h6>
                            </div>
                            <div class="lpcd_copy_icons">
                                <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/copy-icon.svg'); ?>" alt="<?php echo esc_attr__('Copy Icon', 'Loop Cards'); ?>" class="lpcd_copyicon">
                                <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/copied.png'); ?>" alt="<?php echo esc_attr__('Copied Icon', 'Loop Cards'); ?>" class="lpcd_hide_it lpcd_copyiedicon">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lpcd_cards_wrappers">
                    <div class="lpcd_each_cards">
                        <div class="card_design_thumbail">
                            <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/secondaryloopcard.png'); ?>" alt="<?php echo esc_attr__('Secondary Loop Card Thumbnail', 'Loop Cards'); ?>">
                        </div>
                        <div class="card_design_shortcode">
                            <h5><?php echo esc_html__('List View Cards', 'Loop Cards'); ?></h5>
                            <div class="lpcd_copy_code_wrapper">
                                <div class="lpcd_shortcode">
                                    <h6><?php echo esc_html__('[list_loopcard_shortcode]', 'Loop Cards'); ?></h6>
                                </div>
                                <div class="lpcd_copy_icons">
                                    <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/copy-icon.svg'); ?>" alt="<?php echo esc_attr__('Copy Icon', 'Loop Cards'); ?>" class="lpcd_copyicon">
                                    <img src="<?php echo esc_url(LOOPCARD_PLUGIN_URL . '/includes/admin/img/copied.png'); ?>" alt="<?php echo esc_attr__('Copied Icon', 'Loop Cards'); ?>" class="lpcd_hide_it lpcd_copyiedicon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>