<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Shoprocket
 *
 * @wordpress-plugin
 * Plugin Name:       Shoprocket
 * Plugin URI:        http://example.com/shoprocket-uri/
 * Description:       This plugin integrates Shoprocket ecommerce into Wordpress.
 * Version:           1.0.0
 * Author:            Hallneg Ltd
 * Author URI:        http://hallneg.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       shoprocket
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-shoprocket-activator.php
 */
function activate_shoprocket() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-shoprocket-activator.php';
	Shoprocket_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-shoprocket-deactivator.php
 */
function deactivate_shoprocket() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-shoprocket-deactivator.php';
	Shoprocket_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_shoprocket' );
register_deactivation_hook( __FILE__, 'deactivate_shoprocket' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-shoprocket.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_shoprocket() {

	$plugin = new Shoprocket();
	$plugin->run();

}
run_shoprocket();
