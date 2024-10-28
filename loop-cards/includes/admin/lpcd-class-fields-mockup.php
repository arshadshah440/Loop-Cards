<?php
// if file is being called directly or not in the wordpress
if (! defined('ABSPATH')) exit; // Exit if accessed directly
/*
 * Package: Loop Cards
 * @subpackage Loop Cards/admin
 * @since 1.0.0
 * @author Arshad Shah
 */

if (!class_exists('lpcd_fields_mockup')) {

    class lpcd_fields_mockup
    {
        public static function number_input($lpcd_input_data, $options)
        {
            $currentvalue = (is_array($options) && isset($options[$lpcd_input_data['id']])) ? $options[$lpcd_input_data['id']] : "";
            $output = '<input type="number" name="lpcd-settings_options[' . $lpcd_input_data['id'] . ']" id="' . $lpcd_input_data['id'] . '" value="' . esc_attr($currentvalue) . '" min="1" max="30">';
            echo $output;
        }

        public static function text_input($lpcd_input_data, $options)
        {
            $currentvalue = (is_array($options) && isset($options[$lpcd_input_data['id']])) ? $options[$lpcd_input_data['id']] : "";
            $output = '<input type="text" name="lpcd-settings_options[' . $lpcd_input_data['id'] . ']" id="' . $lpcd_input_data['id'] . '" value="' . esc_attr($currentvalue) . '">';
            echo $output;
        }
        public static function checkbox_input($lpcd_input_data, $options)
        {
            $currentvalue = (is_array($options) && isset($options[$lpcd_input_data['id']])) ? $options[$lpcd_input_data['id']] : "";
            $output = '<input type="checkbox" name="lpcd-settings_options[' . $lpcd_input_data['id'] . ']" id="' . $lpcd_input_data['id'] . '" value="1" ' . checked($currentvalue, '1', false) . '>';
            echo $output;
        }

        public static function select_input($lpcd_input_data, $options)
        {
            $currentvalue = (is_array($options) && isset($options[$lpcd_input_data['id']])) ? $options[$lpcd_input_data['id']] : "";
            $output = '<select name="lpcd-settings_options[' . $lpcd_input_data['id'] . ']" id="' . $lpcd_input_data['id'] . '">';
            foreach ($lpcd_input_data['value'] as $index => $value) {
                $output .= '<option value="' . esc_attr($value->name) . '"' . selected($currentvalue, $value->name, false) . '>' . esc_html($value->label) . '</option>';
            }
            $output .= '</select>';
            echo $output;
        }
    }
}
