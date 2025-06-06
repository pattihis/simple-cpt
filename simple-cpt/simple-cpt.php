<?php
/**
 * Simple CPT
 *
 * @package           Simple_Cpt
 * @author            George Pattichis
 * @copyright         2021 George Pattichis
 * @license           GPL-2.0-or-later
 * @link              https://profiles.wordpress.org/pattihis/
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Simple CPT
 * Plugin URI:        https://wordpress.org/plugins/simple-cpt/
 * Description:       Simple CPT provides an easy to use interface for registering and managing Custom Post Types and Custom Taxonomies.
 * Version:           1.1.0
 * Requires at least: 5.3.0
 * Tested up to:      6.8.1
 * Requires PHP:      7.0
 * Author:            George Pattichis
 * Author URI:        https://profiles.wordpress.org/pattihis/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-cpt
 * Domain Path:       /languages
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'SIMPLE_CPT_VERSION', '1.1.0' );

/**
 * Plugin's basename
 */
define( 'SIMPLE_CPT_BASENAME', plugin_basename(__FILE__) );

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
 * The core plugin class that is used to define internationalization and admin-specific hooks.
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
