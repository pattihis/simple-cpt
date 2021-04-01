<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/pattihis/
 * @since             1.0.0
 * @package           Simple_Cpt
 *
 * @wordpress-plugin
 * Plugin Name:       Simple CPT
 * Plugin URI:        https://github.com/pattihis/simple-cpt
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            George Pattihis
 * Author URI:        https://profiles.wordpress.org/pattihis/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-cpt
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SIMPLE_CPT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-cpt-activator.php
 */
function activate_simple_cpt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-cpt-activator.php';
	Simple_Cpt_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-cpt-deactivator.php
 */
function deactivate_simple_cpt() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-cpt-deactivator.php';
	Simple_Cpt_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_cpt' );
register_deactivation_hook( __FILE__, 'deactivate_simple_cpt' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-cpt.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_simple_cpt() {

	$plugin = new Simple_Cpt();
	$plugin->run();

}
run_simple_cpt();
