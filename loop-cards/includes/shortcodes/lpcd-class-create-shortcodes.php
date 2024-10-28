<?php
// if file is being called directly or not in the wordpress
if (! defined('ABSPATH')) exit; // Exit if accessed directly

/*
 * Package: Shortcodes
 * @subpackage Loop Cards/includes/shortcode 
 * @since 1.0.0
 * @author Arshad Shah
 */

if (!class_exists('')) {
    class lpcd_create_shortcode
    {
        public static function create_shortcode()
        {
            self::check_details();
        }
        public static function check_details()
        {
            $selectedoptions = get_option('lpcd-settings_options');
            if (!empty($selectedoptions)) {
                $lpcd_shorcodename = (isset($selectedoptions['lpcd_text_field']) ? 'lpcd_custom_' . $selectedoptions['lpcd_text_field'] . '' : 'post');
                $lpcd_author_name = (isset($selectedoptions['lpcd_author_name']) ? $selectedoptions['lpcd_author_name'] : false);
                $lpcd_numberofposts = (isset($selectedoptions['lpcd_number_of_posts']) ? $selectedoptions['lpcd_number_of_posts'] : '12');
                $lpcd_post_type = (isset($selectedoptions['lpcd_postypes']) ? $selectedoptions['lpcd_postypes'] : 'post');
                $lpcd_shortcode_preview = '';
                $showauthordetails = false;

                if ($lpcd_author_name && $lpcd_author_name == 1) {
                    $lpcd_shortcode_preview = 'basicloopcard.png';
                    $showauthordetails = true;
                } else {
                    $lpcd_shortcode_preview = 'secondaryloopcard.png';
                    $showauthordetails = false;
                }
                self::add_details_to_file($lpcd_shorcodename, $lpcd_shortcode_preview, $lpcd_numberofposts, $lpcd_post_type, $showauthordetails);
            }
        }
        public static function add_details_to_file($name, $preview, $lpcd_numberofposts, $lpcd_post_type, $showauthordetails)
        {
            $detailsfilepath =  LOOPCARD_PLUGIN_PATH . '/includes/admin/lpcd-shortcodes-details.php';
            $lpcd_shortcode_data = include $detailsfilepath;

            $newdata = [
                'lpcd_shortcode_name' => $name,
                'lpcd_shortcode_preview' => $preview,
                'post_type' => $lpcd_post_type,
                'numberofposts' => $lpcd_numberofposts,
                'show_author_details' => $showauthordetails,
            ];
            if (!self::data_Exists($lpcd_shortcode_data, $newdata)) {

                array_push($lpcd_shortcode_data, $newdata);
                $fileContent = "<?php\n\nreturn " . var_export($lpcd_shortcode_data, true) . ";\n";

                file_put_contents($detailsfilepath, $fileContent);
            }
        }
        public static function data_Exists($lpcd_shortcode_data, $newData)
        {
            $data = $lpcd_shortcode_data;

            foreach ($data as $item) {
                if (
                    $item['lpcd_shortcode_name'] == $newData['lpcd_shortcode_name']
                ) {
                    return true; // Data already exists
                }
            }

            return false; // Data does not exist
        }
    }
}
