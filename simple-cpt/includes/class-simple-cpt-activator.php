<?php

/**
 * Fired during plugin activation
 *
 * @link       https://profiles.wordpress.org/pattihis/
 * @since      1.0.0
 *
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/includes
 * @author     George Pattihis <gpattihis@gmail.com>
 */
class Simple_Cpt_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-simple-cpt-admin.php';
        $plugin_admin = new Simple_Cpt_Admin('simple-cpt', '1.0.3');

		$plugin_admin->simple_cpt_plugin_activate_flush_rewrite();

	}

}
