<?php

/**
 * Trustify Widgets for Elementor
 *
 * @package ElementorGrid
 *
 * Plugin Name: Trustify Widgets for Elementor
 * Description: Add Trustify Widgets with Elementor
 * Plugin URI:  https://trustify.ch/
 * Version:     1.2.1
 * Author:      NAVEST GmbH
 * Author URI:  https://navest.ch/
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: trustify-widgets-for-elementor
 */


if (!defined('ABSPATH')) {
    exit;
}

define('TRFY_PLUGIN_PATH',		plugin_dir_path(__FILE__));

function trfy_load_trustify_textdomain() {
    load_plugin_textdomain('trustify-widgets-for-elementor', false, dirname(plugin_basename(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'trfy_load_trustify_textdomain');

function trfy_register_trustify_widget($widgets_manager)
{
    require_once(__DIR__ . '/widget/index.php');
    $widgets_manager->register(new \TRFY_Elementor_Trustify_Rating_Widget());
}
add_action('elementor/widgets/register', 'trfy_register_trustify_widget');