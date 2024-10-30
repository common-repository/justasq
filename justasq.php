<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              justasq.me
 * @since             1.0.0
 * @package           Justasq
 *
 * @wordpress-plugin
 * Plugin Name:       JustAsq - Chatbot Powered Live Chat
 * Description:       This plugin for WordPress helps users intergrate JustAsq into their WordPress powered site.
 * Version:           1.0.1
 * Author:            JustAsq
 * Author URI:        https://justasq.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       justasq
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-justasq-activator.php
 */
function activate_justasq() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-justasq-activator.php';
	Justasq_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-justasq-deactivator.php
 */
function deactivate_justasq() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-justasq-deactivator.php';
	Justasq_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_justasq' );
register_deactivation_hook( __FILE__, 'deactivate_justasq' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-justasq.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_justasq() {

	$plugin = new Justasq();
	$plugin->run();

}
run_justasq();
