<?php
// Prevent direct file access
if (! defined('ABSPATH')) exit;

/*
 * Package: Shortcodes
 * @subpackage Loop Cards/includes/shortcode 
 * @since 1.0.0
 * Author: Arshad Shah
 */

// Ensure the required file path is correct and accessible
require_once LOOPCARD_PLUGIN_PATH . '/includes/shortcodes/lpcd-class-create-shortcodes.php';

if (!class_exists('lpcd_cpt_shortcodes')) {
    class lpcd_cpt_shortcodes
    {
        private static $lpcd_shortcode_dataset;

        // Initialize shortcodes
        public static function init_shortcodes()
        {
            // Correctly reference static property
            self::$lpcd_shortcode_dataset = include LOOPCARD_PLUGIN_PATH . '/includes/admin/lpcd-shortcodes-details.php';

            // Check if dataset is an array
            if (is_array(self::$lpcd_shortcode_dataset)) {
                foreach (self::$lpcd_shortcode_dataset as $shortcode_data) {
                    // Handle dataset as needed (e.g., register additional shortcodes based on data)
                    if (!empty($shortcode_data['lpcd_shortcode_name'])) {
                        add_shortcode($shortcode_data['lpcd_shortcode_name'], function () use ($shortcode_data) {
                            return self::render_shortcode_content($shortcode_data);
                        });
                    }
                }
            }

            // Call any additional functions needed, like creating shortcodes
            lpcd_create_shortcode::create_shortcode();
        }

        // Render content based on the shortcode data
        private static function render_shortcode_content($shortcode_data)
        {
            $args = array(
                'post_type' => $shortcode_data['post_type'] ?? 'post',
                'post_status' => 'publish',
                'posts_per_page' => $shortcode_data['numberofposts'] ?? -1,
            );

            $lpcd_query = new WP_Query($args);

            if ($lpcd_query->have_posts()) {
                ob_start();
                echo '<div class="lpcd-loop-cards-wrapper">';

                while ($lpcd_query->have_posts()) {
                    $lpcd_query->the_post();

                    // Include the template file based on the shortcode preview data or other logic
                    $template_file = $shortcode_data['show_author_details'] === false
                        ? 'lpcd-secondary-loop-card.php'
                        : 'lpcd-basic-loop-card.php';

                    include LOOPCARD_PLUGIN_PATH . "/templates/loop-cards/{$template_file}";
                }

                echo '</div>';
                wp_reset_postdata();
                return ob_get_clean();
            } else {
                return esc_html__('No posts available', 'loop-cards');
            }
        }
    }

    // Initialize the shortcodes when WordPress initializes
    add_action('init', array('lpcd_cpt_shortcodes', 'init_shortcodes'));
}
