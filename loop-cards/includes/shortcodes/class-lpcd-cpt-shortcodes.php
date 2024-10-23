<?php
/*
 * Package: Shortcodes
 * @subpackage Loop Cards/includes/shortcode 
 * @since 1.0.0
 * @author Arshad Shah
 */

if (!class_exists('lpcd_cpt_shortcodes')) {
    class lpcd_cpt_shortcodes
    {
        public static function init_shortcodes()
        {
            add_shortcode('basic_loopcard_shortcode', array(__CLASS__, 'lpcd_basic_loop_shortcode'));
            add_shortcode('list_loopcard_shortcode', array(__CLASS__, 'lpcd_list_loopcard_shortcode'));
        }

        public static function lpcd_basic_loop_shortcode()
        {
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1
            );

            $lpcd_query = new WP_Query($args);

            if ($lpcd_query->have_posts()) {
                ob_start(); // Start output buffering
                echo '<div class="lpcd-loop-cards-wrapper">'; // Wrapper div start
                while ($lpcd_query->have_posts()) {
                    $lpcd_query->the_post();
                    // Make sure to escape post data here as needed inside the template
                    include LOOPCARD_PLUGIN_PATH . '/templates/loop-cards/basic-loop-card.php';
                }
                echo '</div>'; // Close wrapper div
                wp_reset_postdata();
                return ob_get_clean(); // Return the buffered content
            } else {
                return esc_html__('No posts available', 'Loop Cards');
            }
        }

        public static function lpcd_list_loopcard_shortcode()
        {
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1
            );

            $lpcd_query = new WP_Query($args);

            if ($lpcd_query->have_posts()) {
                ob_start(); // Start output buffering
                echo '<div class="lpcd-list-cards-wrapper">'; // Wrapper div start
                while ($lpcd_query->have_posts()) {
                    $lpcd_query->the_post();
                    // Make sure to escape post data here as needed inside the template
                    include LOOPCARD_PLUGIN_PATH . '/templates/loop-cards/secondary-loop-card.php';
                }
                echo '</div>'; // Close wrapper div
                wp_reset_postdata();
                return ob_get_clean(); // Return the buffered content
            } else {
                return esc_html__('No posts available', 'Loop Cards');
            }
        }
    }
}
