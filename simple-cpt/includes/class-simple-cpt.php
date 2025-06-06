<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://profiles.wordpress.org/pattihis/
 * @since      1.0.0
 *
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/includes
 * @author     George Pattichis <gpattihis@gmail.com>
 */
class Simple_Cpt {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Simple_Cpt_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'SIMPLE_CPT_VERSION' ) ) {
			$this->version = SIMPLE_CPT_VERSION;
		} else {
			$this->version = '1.1.0';
		}
		$this->plugin_name = 'simple-cpt';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Simple_Cpt_Loader. Orchestrates the hooks of the plugin.
	 * - Simple_Cpt_i18n. Defines internationalization functionality.
	 * - Simple_Cpt_Admin. Defines all hooks for the admin area.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( __DIR__ ) . 'includes/class-simple-cpt-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( __DIR__ ) . 'includes/class-simple-cpt-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( __DIR__ ) . 'admin/class-simple-cpt-admin.php';

		$this->loader = new Simple_Cpt_Loader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Simple_Cpt_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Simple_Cpt_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Simple_Cpt_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

		// initialise.
		$this->loader->add_action( 'init', $plugin_admin, 'plugin_init' );
		$this->loader->add_action( 'init', $plugin_admin, 'register_simple_cpts' );

		// admin setup.
		$this->loader->add_action( 'admin_init', $plugin_admin, 'simple_cpt_settings_flush_rewrite' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'simple_cpt_admin_menu' );
		$this->loader->add_filter( 'plugin_action_links', $plugin_admin, 'simple_cpt_plugin_links', 10, 2 );
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'simple_cpt_metabox' );
		$this->loader->add_action( 'save_post', $plugin_admin, 'simple_cpt_save_metabox' );
		$this->loader->add_filter( 'post_updated_messages', $plugin_admin, 'simple_cpt_update_messages' );
		$this->loader->add_action( 'admin_footer', $plugin_admin, 'simple_cpt_admin_footer' );

		// table columns.
		$this->loader->add_filter( 'manage_simple_cpt_posts_columns', $plugin_admin, 'simple_cpt_posts_columns' );
		$this->loader->add_action( 'manage_simple_cpt_posts_custom_column', $plugin_admin, 'simple_cpt_posts_custom_columns', 10, 2 );
		$this->loader->add_filter( 'manage_simple_tax_posts_columns', $plugin_admin, 'simple_tax_posts_columns' );
		$this->loader->add_action( 'manage_simple_tax_posts_custom_column', $plugin_admin, 'simple_tax_posts_custom_columns', 10, 2 );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Simple_Cpt_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}
