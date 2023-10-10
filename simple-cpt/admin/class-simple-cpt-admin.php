<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://profiles.wordpress.org/pattihis/
 * @since      1.0.0
 *
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Simple_Cpt
 * @subpackage Simple_Cpt/admin
 * @author     George Pattichis <gpattihis@gmail.com>
 */
class Simple_Cpt_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/simple-cpt-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/simple-cpt-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Initialize plugin
	 *
	 * @since    1.0.0
	 */
	public function plugin_init() {

		register_post_type(
			'simple_cpt',
				array(
					'labels'          => array(
						'name'               => __( 'Post Types', 'simple-cpt' ),
						'singular_name'      => __( 'Custom Post Type', 'simple-cpt' ),
						'add_new'            => __( 'Add New', 'simple-cpt' ),
						'add_new_item'       => __( 'Add New Custom Post Type', 'simple-cpt' ),
						'edit_item'          => __( 'Edit Custom Post Type', 'simple-cpt' ),
						'new_item'           => __( 'New Custom Post Type', 'simple-cpt' ),
						'view_item'          => __( 'View Custom Post Type', 'simple-cpt' ),
						'search_items'       => __( 'Search Custom Post Types', 'simple-cpt' ),
						'not_found'          => __( 'No Custom Post Types found', 'simple-cpt' ),
						'not_found_in_trash' => __( 'No Custom Post Types found in Trash', 'simple-cpt' ),
					),
					'public'          => false,
					'show_ui'         => true,
					'_builtin'        => false,
					'capability_type' => 'page',
					'hierarchical'    => false,
					'rewrite'         => false,
					'query_var'       => 'simple_cpt',
					'supports'        => array( 'title', 'author'),
					'show_in_menu'    => 'simple-cpt',
				)
		);

		register_post_type(
			'simple_tax',
				array(
					'labels'          => array(
						'name'               => __( 'Taxonomies', 'simple-cpt' ),
						'singular_name'      => __( 'Custom Taxonomy', 'simple-cpt' ),
						'add_new'            => __( 'Add New', 'simple-cpt' ),
						'add_new_item'       => __( 'Add New Custom Taxonomy', 'simple-cpt' ),
						'edit_item'          => __( 'Edit Custom Taxonomy', 'simple-cpt' ),
						'new_item'           => __( 'New Custom Taxonomy', 'simple-cpt' ),
						'view_item'          => __( 'View Custom Taxonomy', 'simple-cpt' ),
						'search_items'       => __( 'Search Custom Taxonomies', 'simple-cpt' ),
						'not_found'          => __( 'No Custom Taxonomies found', 'simple-cpt' ),
						'not_found_in_trash' => __( 'No Custom Taxonomies found in Trash', 'simple-cpt' ),
					),
					'public'          => false,
					'show_ui'         => true,
					'_builtin'        => false,
					'capability_type' => 'page',
					'hierarchical'    => false,
					'rewrite'         => false,
					'query_var'       => 'simple_tax',
					'supports'        => array( 'title', 'author'),
					'show_in_menu'    => 'simple-cpt',
				)
		);

	}

	/**
	 * Register the admin menu
	 *
	 * @since    1.0.0
	 */
	public function simple_cpt_admin_menu() {

		add_menu_page(
			__( 'Simple CPT', 'simple-cpt' ),
			__( 'Simple CPT', 'simple-cpt' ),
			'manage_options',
			$this->plugin_name,
			[$this,'simple_cpt_admin_display'],
			'dashicons-screenoptions',
			25
		);

		add_submenu_page( $this->plugin_name, __( 'Simple CPT Overview', 'simple-cpt' ), __( 'Overview', 'simple-cpt' ), 'manage_options', $this->plugin_name, [$this,'simple_cpt_admin_display'], 0);

	}

	/**
	 * Render the admin menu page content
	 *
	 * @since  1.0.0
	 */
	public function simple_cpt_admin_display() {
		include_once 'partials/simple-cpt-admin-display.php';
    }

	/**
	 * Show custom links in Plugins Page
	 *
	 * @since  1.0.3
	 * @access public
	 * @param  array $links Default Links.
	 * @param  array $file Plugin's root filepath.
	 * @return array Links list to display in plugins page.
	 */
	public function simple_cpt_plugin_links( $links, $file ) {

		if ($file == SIMPLE_CPT_BASENAME) {
			$scpt_links = '<a href="'.get_admin_url().'admin.php?page=simple-cpt" title="Plugin Options">'.__('Settings', 'simple-cpt').'</a>';
			$scpt_visit = '<a href="https://gp-web.dev/" title="Contact" target="_blank" >'.__('Contact', 'simple-cpt').'</a>';
			array_unshift($links, $scpt_visit);
			array_unshift($links, $scpt_links);
		}

		return $links;

	}

	/**
	 * Register the metabox for the custom fields.
	 *
	 * @since    1.0.0
	 */
	public function simple_cpt_metabox() {

		add_meta_box(
			'simple_cpt_meta_box',
			__( 'Post Type Options', 'simple-cpt'),
			[$this, 'simple_cpt_metabox_content'],
			['simple_cpt'],
			'advanced',
			'high'
		);

		add_meta_box(
			'simple_tax_meta_box',
			__( 'Taxonomy Options', 'simple-cpt' ),
			[$this, 'simple_tax_metabox_content'],
			['simple_tax'],
			'advanced',
			'high'
		);

		add_meta_box(
			'simple_cpt_meta_box_side',
			__( 'Documentation', 'simple-cpt'),
			[$this, 'simple_cpt_metabox_side'],
			['simple_cpt'],
			'side',
			'low'
		);

		add_meta_box(
			'simple_tax_meta_box_side',
			__( 'Documentation', 'simple-cpt'),
			[$this, 'simple_tax_metabox_side'],
			['simple_tax'],
			'side',
			'low'
		);

	}

	/**
	 * Render the side metabox for the Custom Post Types.
	 *
	 * @since    1.0.0
	 */
	public function simple_cpt_metabox_side( $post ) {
		?>
		<p><?php _e( 'For more info about each field please check', 'simple-cpt');?> <a href="https://developer.wordpress.org/reference/functions/register_post_type/" target="_blank"><?php _e( 'the official documentation.', 'simple-cpt');?></a></p>
		<?php
	}

	/**
	 * Render the side metabox for the Custom Taxonomies.
	 *
	 * @since    1.0.0
	 */
	public function simple_tax_metabox_side( $post ) {
		?>
		<p><?php _e( 'For more info about each field please check', 'simple-cpt');?> <a href="https://developer.wordpress.org/reference/functions/register_taxonomy/" target="_blank"><?php _e( 'the official documentation.', 'simple-cpt');?></a></p>
		<?php
	}

	/**
	 * Render the metabox for the Custom Post Types.
	 *
	 * @since    1.0.0
	 */
	public function simple_cpt_metabox_content( $post ) {
		global $pagenow;
		$meta = get_post_custom( $post->ID );

		$simple_cpt_name          			 = isset( $meta['simple_cpt_name'] ) ? sanitize_title( $meta['simple_cpt_name'][0] ) : '';
		$simple_cpt_label         			 = isset( $meta['simple_cpt_label'] ) ? sanitize_text_field( $meta['simple_cpt_label'][0] ) : '';
		$simple_cpt_singular_name 			 = isset( $meta['simple_cpt_singular_name'] ) ? sanitize_text_field( $meta['simple_cpt_singular_name'][0] ) : '';
		$simple_cpt_description   			 = isset( $meta['simple_cpt_description'] ) ? sanitize_textarea_field( $meta['simple_cpt_description'][0] ) : '';
		$simple_cpt_icon_slug 	  			 = isset( $meta['simple_cpt_icon_slug'] ) ? sanitize_title( $meta['simple_cpt_icon_slug'][0] ) : '';
		$simple_cpt_custom_rewrite_slug 	 = isset( $meta['simple_cpt_custom_rewrite_slug'] ) ? sanitize_title( $meta['simple_cpt_custom_rewrite_slug'][0] ) : '';
		$simple_cpt_menu_position       	 = isset( $meta['simple_cpt_menu_position'] ) ? sanitize_text_field( $meta['simple_cpt_menu_position'][0] ) : '';
		$simple_cpt_public              	 = isset( $meta['simple_cpt_public'] ) ? sanitize_text_field( $meta['simple_cpt_public'][0] ) : '';
		$simple_cpt_show_ui             	 = isset( $meta['simple_cpt_show_ui'] ) ? sanitize_text_field( $meta['simple_cpt_show_ui'][0] ) : '';
		$simple_cpt_has_archive         	 = isset( $meta['simple_cpt_has_archive'] ) ? sanitize_text_field( $meta['simple_cpt_has_archive'][0] ) : '';
		$simple_cpt_exclude_from_search 	 = isset( $meta['simple_cpt_exclude_from_search'] ) ? sanitize_text_field( $meta['simple_cpt_exclude_from_search'][0] ) : '';
		$simple_cpt_capability_type     	 = isset( $meta['simple_cpt_capability_type'] ) ? sanitize_text_field( $meta['simple_cpt_capability_type'][0] ) : '';
		$simple_cpt_hierarchical        	 = isset( $meta['simple_cpt_hierarchical'] ) ? sanitize_text_field( $meta['simple_cpt_hierarchical'][0] ) : '';
		$simple_cpt_rewrite             	 = isset( $meta['simple_cpt_rewrite'] ) ? sanitize_text_field( $meta['simple_cpt_rewrite'][0] ) : '';
		$simple_cpt_withfront           	 = isset( $meta['simple_cpt_withfront'] ) ? sanitize_text_field( $meta['simple_cpt_withfront'][0] ) : '';
		$simple_cpt_feeds               	 = isset( $meta['simple_cpt_feeds'] ) ? sanitize_text_field( $meta['simple_cpt_feeds'][0] ) : '';
		$simple_cpt_pages               	 = isset( $meta['simple_cpt_pages'] ) ? sanitize_text_field( $meta['simple_cpt_pages'][0] ) : '';
		$simple_cpt_query_var           	 = isset( $meta['simple_cpt_query_var'] ) ? sanitize_text_field( $meta['simple_cpt_query_var'][0] ) : '';
		$simple_cpt_show_in_rest        	 = isset( $meta['simple_cpt_show_in_rest'] ) ? sanitize_text_field( $meta['simple_cpt_show_in_rest'][0] ) : '';
		$simple_cpt_publicly_queryable  	 = isset( $meta['simple_cpt_publicly_queryable'] ) ? sanitize_text_field( $meta['simple_cpt_publicly_queryable'][0] ) : '';
		$simple_cpt_show_in_menu        	 = isset( $meta['simple_cpt_show_in_menu'] ) ? sanitize_text_field( $meta['simple_cpt_show_in_menu'][0] ) : '';
		$simple_cpt_supports                 = isset( $meta['simple_cpt_supports'] ) ? unserialize( $meta['simple_cpt_supports'][0] ) : array();
		$simple_cpt_supports_title           = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'title', $simple_cpt_supports ) ? 'title' : '' );
		$simple_cpt_supports_editor          = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'editor', $simple_cpt_supports ) ? 'editor' : '' );
		$simple_cpt_supports_excerpt         = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'excerpt', $simple_cpt_supports ) ? 'excerpt' : '' );
		$simple_cpt_supports_trackbacks      = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'trackbacks', $simple_cpt_supports ) ? 'trackbacks' : '' );
		$simple_cpt_supports_custom_fields   = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'custom-fields', $simple_cpt_supports ) ? 'custom-fields' : '' );
		$simple_cpt_supports_comments        = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'comments', $simple_cpt_supports ) ? 'comments' : '' );
		$simple_cpt_supports_revisions       = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'revisions', $simple_cpt_supports ) ? 'revisions' : '' );
		$simple_cpt_supports_featured_image  = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'thumbnail', $simple_cpt_supports ) ? 'thumbnail' : '' );
		$simple_cpt_supports_author          = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'author', $simple_cpt_supports ) ? 'author' : '' );
		$simple_cpt_supports_page_attributes = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'page-attributes', $simple_cpt_supports ) ? 'page-attributes' : '' );
		$simple_cpt_supports_post_formats    = ( isset( $meta['simple_cpt_supports'] ) && in_array( 'post-formats', $simple_cpt_supports ) ? 'post-formats' : '' );
		$simple_cpt_builtin_tax              = isset( $meta['simple_cpt_builtin_tax'] ) ? unserialize( $meta['simple_cpt_builtin_tax'][0] ) : array();
		$simple_cpt_builtin_tax_categories   = ( isset( $meta['simple_cpt_builtin_tax'] ) && in_array( 'category', $simple_cpt_builtin_tax ) ? 'category' : '' );
		$simple_cpt_builtin_tax_tags         = ( isset( $meta['simple_cpt_builtin_tax'] ) && in_array( 'post_tag', $simple_cpt_builtin_tax ) ? 'post_tag' : '' );

		// set default support options when creating new CPT
		$simple_cpt_supports_title   = $pagenow === 'post-new.php' ? 'title' : $simple_cpt_supports_title;
		$simple_cpt_supports_editor  = $pagenow === 'post-new.php' ? 'editor' : $simple_cpt_supports_editor;
		$simple_cpt_supports_excerpt = $pagenow === 'post-new.php' ? 'excerpt' : $simple_cpt_supports_excerpt;

	    include_once 'partials/simple-cpt-metabox-cpt.php';
	}

	/**
	 * Render the metabox for the Custom Taxonomies
	 *
	 * @since    1.0.0
	 */
	public function simple_tax_metabox_content( $post ) {
		$values = get_post_custom( $post->ID );

		$simple_cpt_tax_name                = isset( $values['simple_cpt_tax_name'] ) ? sanitize_title( $values['simple_cpt_tax_name'][0] ) : '';
		$simple_cpt_tax_label               = isset( $values['simple_cpt_tax_label'] ) ? sanitize_text_field( $values['simple_cpt_tax_label'][0] ) : '';
		$simple_cpt_tax_singular_name       = isset( $values['simple_cpt_tax_singular_name'] ) ? sanitize_text_field( $values['simple_cpt_tax_singular_name'][0] ) : '';
		$simple_cpt_tax_custom_rewrite_slug = isset( $values['simple_cpt_tax_custom_rewrite_slug'] ) ? sanitize_title( $values['simple_cpt_tax_custom_rewrite_slug'][0] ) : '';
		$simple_cpt_tax_show_ui           = isset( $values['simple_cpt_tax_show_ui'] ) ? sanitize_text_field( $values['simple_cpt_tax_show_ui'][0] ) : '';
		$simple_cpt_tax_hierarchical      = isset( $values['simple_cpt_tax_hierarchical'] ) ? sanitize_text_field( $values['simple_cpt_tax_hierarchical'][0] ) : '';
		$simple_cpt_tax_rewrite           = isset( $values['simple_cpt_tax_rewrite'] ) ? sanitize_text_field( $values['simple_cpt_tax_rewrite'][0] ) : '';
		$simple_cpt_tax_query_var         = isset( $values['simple_cpt_tax_query_var'] ) ? sanitize_text_field( $values['simple_cpt_tax_query_var'][0] ) : '';
		$simple_cpt_tax_show_in_rest      = isset( $values['simple_cpt_tax_show_in_rest'] ) ? sanitize_text_field( $values['simple_cpt_tax_show_in_rest'][0] ) : '';
		$simple_cpt_tax_show_admin_column = isset( $values['simple_cpt_tax_show_admin_column'] ) ? sanitize_text_field( $values['simple_cpt_tax_show_admin_column'][0] ) : '';
		$simple_cpt_tax_post_types      = isset( $values['simple_cpt_tax_post_types'] ) ? unserialize( $values['simple_cpt_tax_post_types'][0] ) : array();
		$simple_cpt_tax_post_types_post = ( isset( $values['simple_cpt_tax_post_types'] ) && in_array( 'post', $simple_cpt_tax_post_types ) ? 'post' : '' );
		$simple_cpt_tax_post_types_page = ( isset( $values['simple_cpt_tax_post_types'] ) && in_array( 'page', $simple_cpt_tax_post_types ) ? 'page' : '' );

		include_once 'partials/simple-cpt-metabox-tax.php';
	}

	/**
	 * Save the fields in the custom metaboxes
	 *
	 * @since    1.0.0
	 */
	public function simple_cpt_save_metabox( $post_id ) {

		if (!current_user_can('edit_post', $post_id)) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! isset( $_POST['simple_cpt_meta_box_nonce_field'] ) || ! wp_verify_nonce( $_POST['simple_cpt_meta_box_nonce_field'], 'simple_cpt_meta_box_nonce_action' ) ) {
			return;
		}

		// CPTs fields
		if ( isset( $_POST['simple_cpt_name'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_name', sanitize_title( strtolower( str_replace( ' ', '', $_POST['simple_cpt_name'] ) ) ) );
		}

		if ( isset( $_POST['simple_cpt_label'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_label', sanitize_text_field( $_POST['simple_cpt_label'] ) );
		}

		if ( isset( $_POST['simple_cpt_singular_name'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_singular_name', sanitize_text_field( $_POST['simple_cpt_singular_name'] ) );
		}

		if ( isset( $_POST['simple_cpt_description'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_description', sanitize_textarea_field( $_POST['simple_cpt_description'] ) );
		}

		if ( isset( $_POST['simple_cpt_icon_slug'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_icon_slug', sanitize_title( $_POST['simple_cpt_icon_slug'] ) );
		}

		if ( isset( $_POST['simple_cpt_public'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_public', sanitize_text_field( $_POST['simple_cpt_public'] ) );
		}

		if ( isset( $_POST['simple_cpt_show_ui'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_show_ui', sanitize_text_field( $_POST['simple_cpt_show_ui'] ) );
		}

		if ( isset( $_POST['simple_cpt_has_archive'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_has_archive', sanitize_text_field( $_POST['simple_cpt_has_archive'] ) );
		}

		if ( isset( $_POST['simple_cpt_exclude_from_search'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_exclude_from_search', sanitize_text_field( $_POST['simple_cpt_exclude_from_search'] ) );
		}

		if ( isset( $_POST['simple_cpt_capability_type'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_capability_type', sanitize_text_field( $_POST['simple_cpt_capability_type'] ) );
		}

		if ( isset( $_POST['simple_cpt_hierarchical'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_hierarchical', sanitize_text_field( $_POST['simple_cpt_hierarchical'] ) );
		}

		if ( isset( $_POST['simple_cpt_rewrite'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_rewrite', sanitize_text_field( $_POST['simple_cpt_rewrite'] ) );
		}

		if ( isset( $_POST['simple_cpt_withfront'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_withfront', sanitize_text_field( $_POST['simple_cpt_withfront'] ) );
		}

		if ( isset( $_POST['simple_cpt_feeds'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_feeds', sanitize_text_field( $_POST['simple_cpt_feeds'] ) );
		}

		if ( isset( $_POST['simple_cpt_pages'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_pages', sanitize_text_field( $_POST['simple_cpt_pages'] ) );
		}

		if ( isset( $_POST['simple_cpt_custom_rewrite_slug'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_custom_rewrite_slug', sanitize_title( $_POST['simple_cpt_custom_rewrite_slug'] ) );
		}

		if ( isset( $_POST['simple_cpt_query_var'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_query_var', sanitize_text_field( $_POST['simple_cpt_query_var'] ) );
		}

		if ( isset( $_POST['simple_cpt_show_in_rest'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_show_in_rest', sanitize_text_field( $_POST['simple_cpt_show_in_rest'] ) );
		}

		if ( isset( $_POST['simple_cpt_publicly_queryable'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_publicly_queryable', sanitize_text_field( $_POST['simple_cpt_publicly_queryable'] ) );
		}

		if ( isset( $_POST['simple_cpt_menu_position'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_menu_position', sanitize_text_field( $_POST['simple_cpt_menu_position'] ) );
		}

		if ( isset( $_POST['simple_cpt_show_in_menu'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_show_in_menu', sanitize_text_field( $_POST['simple_cpt_show_in_menu'] ) );
		}

		$simple_cpt_supports = isset( $_POST['simple_cpt_supports'] ) ? $this->safe_array( $_POST['simple_cpt_supports'] ) : array();
		update_post_meta( $post_id, 'simple_cpt_supports', $simple_cpt_supports );

		$simple_cpt_builtin_tax = isset( $_POST['simple_cpt_builtin_tax'] ) ? $this->safe_array( $_POST['simple_cpt_builtin_tax'] ) : array();
		update_post_meta( $post_id, 'simple_cpt_builtin_tax', $simple_cpt_builtin_tax );

		// Taxonomies fields
		if ( isset( $_POST['simple_cpt_tax_name'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_name', sanitize_title( str_replace( ' ', '', $_POST['simple_cpt_tax_name'] ) ) );
		}

		if ( isset( $_POST['simple_cpt_tax_label'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_label', sanitize_text_field( $_POST['simple_cpt_tax_label'] ) );
		}

		if ( isset( $_POST['simple_cpt_tax_singular_name'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_singular_name', sanitize_text_field( $_POST['simple_cpt_tax_singular_name'] ) );
		}

		if ( isset( $_POST['simple_cpt_tax_show_ui'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_show_ui', sanitize_text_field( $_POST['simple_cpt_tax_show_ui'] ) );
		}

		if ( isset( $_POST['simple_cpt_tax_hierarchical'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_hierarchical', sanitize_text_field( $_POST['simple_cpt_tax_hierarchical'] ) );
		}

		if ( isset( $_POST['simple_cpt_tax_rewrite'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_rewrite', sanitize_text_field( $_POST['simple_cpt_tax_rewrite'] ) );
		}

		if ( isset( $_POST['simple_cpt_tax_custom_rewrite_slug'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_custom_rewrite_slug', sanitize_title( $_POST['simple_cpt_tax_custom_rewrite_slug'] ) );
		}

		if ( isset( $_POST['simple_cpt_tax_query_var'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_query_var', sanitize_text_field( $_POST['simple_cpt_tax_query_var'] ) );
		}

		if ( isset( $_POST['simple_cpt_tax_show_in_rest'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_show_in_rest', sanitize_text_field( $_POST['simple_cpt_tax_show_in_rest'] ) );
		}

		if ( isset( $_POST['simple_cpt_tax_show_admin_column'] ) ) {
			update_post_meta( $post_id, 'simple_cpt_tax_show_admin_column', sanitize_text_field( $_POST['simple_cpt_tax_show_admin_column'] ) );
		}

		$simple_cpt_tax_post_types = isset( $_POST['simple_cpt_tax_post_types'] ) ? $this->safe_array( $_POST['simple_cpt_tax_post_types'] ) : array();
		update_post_meta( $post_id, 'simple_cpt_tax_post_types', $simple_cpt_tax_post_types );

		update_option( 'simple_cpt_flush_needed', true );

	}

	/**
	 * Flush rewrite rules if CPT was saved/updated
	 *
	 * @since    1.0.0
	 */
	public function simple_cpt_settings_flush_rewrite() {
		if ( get_option( 'simple_cpt_flush_needed' ) == true ) {
			flush_rewrite_rules();
			update_option( 'simple_cpt_flush_needed', false );
		}
	}

	/**
	 * Flush rewrite rules on plugin activation
	 *
	 * @since    1.0.0
	 */
	public function simple_cpt_plugin_activate_flush_rewrite() {
		$this->register_simple_cpts();
		flush_rewrite_rules();
	}

	/**
	 * Define custom columns for CPT admin table
	 *
	 * @since  1.0.0
	 */
	public function simple_cpt_posts_columns( $columns ) {

		$columns = array(
			'cb' => $columns['cb'],
			'title' => __('Title', 'simple-cpt'),
			'slug' => __('Slug', 'simple-cpt'),
			'description' => __('Description', 'simple-cpt'),
			'author' => __('Author', 'simple-cpt'),
			'date' => __('Date', 'simple-cpt'),
		);
		return $columns;
	}

	/**
	 * Render custom columns for CPT admin table
	 *
	 * @since  1.0.0
	 */
	public function simple_cpt_posts_custom_columns( $column_name, $id ) {

		if ( $column_name === 'slug' ) {
			echo get_post_meta( get_the_ID(), 'simple_cpt_name', true );
		}
		if ( $column_name === 'description' ) {
			echo get_post_meta( get_the_ID(), 'simple_cpt_description', true );
		}
	}

	/**
	 * Define custom columns for Taxonomies admin table
	 *
	 * @since  1.0.0
	 */
	public function simple_tax_posts_columns( $columns ) {

		$columns = array(
			'cb' => $columns['cb'],
			'title' => __('Title', 'simple-cpt'),
			'slug' => __('Slug', 'simple-cpt'),
			'post_types' => __('Post Types', 'simple-cpt'),
			'author' => __('Author', 'simple-cpt'),
			'date' => __('Date', 'simple-cpt'),
		);
		return $columns;
	}

	/**
	 * Render custom columns for Taxonomies admin table
	 *
	 * @since  1.0.0
	 */
	public function simple_tax_posts_custom_columns( $column_name, $id ) {

		if ( $column_name === 'slug' ) {
			echo get_post_meta( get_the_ID(), 'simple_cpt_tax_name', true );
		}
		if ( $column_name === 'post_types' ) {
			$array = get_post_meta( get_the_ID(), 'simple_cpt_tax_post_types', true );
			$list = implode(', ', $array);
			print_r($list);
		}
	}

	/**
	 * Post Update messages
	 *
	 * @param  array $messages Update messages
	 * @return array           Update messages
	 * @since    1.0.0
	 */
	function simple_cpt_update_messages( $msg ) {

		$msg['simple_cpt'] = array(
			0  => '',
			1  => __( 'Custom Post Type updated.', 'simple-cpt' ),
			2  => __( 'Custom Post Type updated.', 'simple-cpt' ),
			3  => __( 'Custom Post Type deleted.', 'simple-cpt' ),
			4  => __( 'Custom Post Type updated.', 'simple-cpt' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Custom Post Type restored to revision from %s', 'simple-cpt' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Custom Post Type published.', 'simple-cpt' ),
			7  => __( 'Custom Post Type saved.', 'simple-cpt' ),
			8  => __( 'Custom Post Type submitted.', 'simple-cpt' ),
			9  => __( 'Custom Post Type scheduled for.', 'simple-cpt' ),
			10 => __( 'Custom Post Type draft updated.', 'simple-cpt' ),
		);

		return $msg;
	}

	/**
	 * Create our Custom Post Types and Custom Taxonomies
	 *
	 * @since    1.0.0
	 */
	public function simple_cpt_admin_footer() {
		$screen = get_current_screen();
		if ( $screen->parent_base === 'simple-cpt' ) {
			include_once 'partials/simple-cpt-admin-footer.php';
		}
	}

	/**
	 * Create our Custom Post Types and Custom Taxonomies
	 *
	 * @since    1.0.0
	 */
	public function register_simple_cpts() {

		$simple_cpts = array();
		$simple_taxs = array();

		// query custom post types
		$get_simple_cpt        = array(
			'numberposts'      => -1,
			'post_type'        => 'simple_cpt',
			'post_status'      => 'publish',
			'suppress_filters' => false,
		);
		$simple_cpt_post_types = get_posts( $get_simple_cpt );

		// create array of post meta
		if ( $simple_cpt_post_types ) {
			foreach ( $simple_cpt_post_types as $simple_cpt ) {
				$simple_cpt_meta = get_post_meta( $simple_cpt->ID, '', true );

				// text
				$simple_cpt_name          = ( array_key_exists( 'simple_cpt_name', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_name'][0] ? sanitize_title( $simple_cpt_meta['simple_cpt_name'][0] ) : 'no_name' );
				$simple_cpt_label         = ( array_key_exists( 'simple_cpt_label', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_label'][0] ? sanitize_text_field( $simple_cpt_meta['simple_cpt_label'][0] ) : $simple_cpt_name );
				$simple_cpt_singular_name = ( array_key_exists( 'simple_cpt_singular_name', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_singular_name'][0] ? sanitize_text_field( $simple_cpt_meta['simple_cpt_singular_name'][0] ) : $simple_cpt_label );
				$simple_cpt_description   = ( array_key_exists( 'simple_cpt_description', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_description'][0] ? sanitize_textarea_field($simple_cpt_meta['simple_cpt_description'][0]) : '' );

				// post icon (dashicons)
				$simple_cpt_icon_name = ( array_key_exists( 'simple_cpt_icon_slug', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_icon_slug'][0] ? sanitize_title($simple_cpt_meta['simple_cpt_icon_slug'][0]) : false );

				$simple_cpt_custom_rewrite_slug = ( array_key_exists( 'simple_cpt_custom_rewrite_slug', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_custom_rewrite_slug'][0] ? sanitize_title( $simple_cpt_meta['simple_cpt_custom_rewrite_slug'][0] ) : $simple_cpt_name );
				$simple_cpt_menu_position       = ( array_key_exists( 'simple_cpt_menu_position', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_menu_position'][0] ? (int) $simple_cpt_meta['simple_cpt_menu_position'][0] : null );

				// dropdowns
				$simple_cpt_public              = ( array_key_exists( 'simple_cpt_public', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_public'][0] == '1' ? true : false );
				$simple_cpt_show_ui             = ( array_key_exists( 'simple_cpt_show_ui', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_show_ui'][0] == '1' ? true : false );
				$simple_cpt_has_archive         = ( array_key_exists( 'simple_cpt_has_archive', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_has_archive'][0] == '1' ? true : false );
				$simple_cpt_exclude_from_search = ( array_key_exists( 'simple_cpt_exclude_from_search', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_exclude_from_search'][0] == '1' ? true : false );
				$simple_cpt_capability_type     = ( array_key_exists( 'simple_cpt_capability_type', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_capability_type'][0] ? $simple_cpt_meta['simple_cpt_capability_type'][0] : 'post' );
				$simple_cpt_hierarchical        = ( array_key_exists( 'simple_cpt_hierarchical', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_hierarchical'][0] == '1' ? true : false );
				$simple_cpt_rewrite             = ( array_key_exists( 'simple_cpt_rewrite', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_rewrite'][0] == '1' ? true : false );
				$simple_cpt_withfront           = ( array_key_exists( 'simple_cpt_withfront', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_withfront'][0] == '1' ? true : false );
				$simple_cpt_feeds               = ( array_key_exists( 'simple_cpt_feeds', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_feeds'][0] == '1' ? true : false );
				$simple_cpt_pages               = ( array_key_exists( 'simple_cpt_pages', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_pages'][0] == '1' ? true : false );
				$simple_cpt_query_var           = ( array_key_exists( 'simple_cpt_query_var', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_query_var'][0] == '1' ? true : false );
				$simple_cpt_show_in_rest        = ( array_key_exists( 'simple_cpt_show_in_rest', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_show_in_rest'][0] == '1' ? true : false );

				// If it doesn't exist, it must be set to true ( fix for existing installs )
				if ( ! array_key_exists( 'simple_cpt_publicly_queryable', $simple_cpt_meta ) ) {
					$simple_cpt_publicly_queryable = true;
				} elseif ( $simple_cpt_meta['simple_cpt_publicly_queryable'][0] == '1' ) {
					$simple_cpt_publicly_queryable = true;
				} else {
					$simple_cpt_publicly_queryable = false;
				}

				$simple_cpt_show_in_menu = ( array_key_exists( 'simple_cpt_show_in_menu', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_show_in_menu'][0] == '1' ? true : false );

				// checkboxes
				$simple_cpt_supports    = ( array_key_exists( 'simple_cpt_supports', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_supports'][0] ? $simple_cpt_meta['simple_cpt_supports'][0] : 'a:2:{i:0;s:5:"title";i:1;s:6:"editor";}' );
				$simple_cpt_builtin_tax = ( array_key_exists( 'simple_cpt_builtin_tax', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_builtin_tax'][0] ? $simple_cpt_meta['simple_cpt_builtin_tax'][0] : 'a:0:{}' );

				$simple_cpt_rewrite_options = array();
				if ( $simple_cpt_rewrite ) {
					$simple_cpt_rewrite_options['slug'] = _x( $simple_cpt_custom_rewrite_slug, 'URL Slug', 'simple-cpt' );
				}

				$simple_cpt_rewrite_options['with_front'] = $simple_cpt_withfront;

				if ( $simple_cpt_feeds ) {
					$simple_cpt_rewrite_options['feeds'] = $simple_cpt_feeds;
				}
				if ( $simple_cpt_pages ) {
					$simple_cpt_rewrite_options['pages'] = $simple_cpt_pages;
				}

				$simple_cpts[] = array(
					'simple_cpt_id'                  => $simple_cpt->ID,
					'simple_cpt_name'                => $simple_cpt_name,
					'simple_cpt_label'               => $simple_cpt_label,
					'simple_cpt_singular_name'       => $simple_cpt_singular_name,
					'simple_cpt_description'         => $simple_cpt_description,
					'simple_cpt_icon_name'           => $simple_cpt_icon_name,
					'simple_cpt_custom_rewrite_slug' => $simple_cpt_custom_rewrite_slug,
					'simple_cpt_menu_position'       => $simple_cpt_menu_position,
					'simple_cpt_public'              => (bool) $simple_cpt_public,
					'simple_cpt_show_ui'             => (bool) $simple_cpt_show_ui,
					'simple_cpt_has_archive'         => (bool) $simple_cpt_has_archive,
					'simple_cpt_exclude_from_search' => (bool) $simple_cpt_exclude_from_search,
					'simple_cpt_capability_type'     => $simple_cpt_capability_type,
					'simple_cpt_hierarchical'        => (bool) $simple_cpt_hierarchical,
					'simple_cpt_rewrite'             => $simple_cpt_rewrite_options,
					'simple_cpt_query_var'           => (bool) $simple_cpt_query_var,
					'simple_cpt_show_in_rest'        => (bool) $simple_cpt_show_in_rest,
					'simple_cpt_publicly_queryable'  => (bool) $simple_cpt_publicly_queryable,
					'simple_cpt_show_in_menu'        => (bool) $simple_cpt_show_in_menu,
					'simple_cpt_supports'            => unserialize( $simple_cpt_supports ),
					'simple_cpt_builtin_taxonomies'  => unserialize( $simple_cpt_builtin_tax ),
				);

				// register custom post types
				if ( is_array( $simple_cpts ) ) {
					foreach ( $simple_cpts as $simple_cpt_post_type ) {

						$labels = array(
							'name'               => __( $simple_cpt_post_type['simple_cpt_label'], 'simple-cpt' ),
							'singular_name'      => __( $simple_cpt_post_type['simple_cpt_singular_name'], 'simple-cpt' ),
							'add_new'            => __( 'Add New', 'simple-cpt' ),
							'add_new_item'       => __( 'Add New ' . $simple_cpt_post_type['simple_cpt_singular_name'], 'simple-cpt' ),
							'edit_item'          => __( 'Edit ' . $simple_cpt_post_type['simple_cpt_singular_name'], 'simple-cpt' ),
							'new_item'           => __( 'New ' . $simple_cpt_post_type['simple_cpt_singular_name'], 'simple-cpt' ),
							'view_item'          => __( 'View ' . $simple_cpt_post_type['simple_cpt_singular_name'], 'simple-cpt' ),
							'search_items'       => __( 'Search ' . $simple_cpt_post_type['simple_cpt_label'], 'simple-cpt' ),
							'not_found'          => __( 'No ' . $simple_cpt_post_type['simple_cpt_label'] . ' found', 'simple-cpt' ),
							'not_found_in_trash' => __( 'No ' . $simple_cpt_post_type['simple_cpt_label'] . ' found in Trash', 'simple-cpt' ),
						);

						$args = array(
							'labels'              => $labels,
							'description'         => $simple_cpt_post_type['simple_cpt_description'],
							'menu_icon'           => $simple_cpt_post_type['simple_cpt_icon_name'],
							'rewrite'             => $simple_cpt_post_type['simple_cpt_rewrite'],
							'menu_position'       => $simple_cpt_post_type['simple_cpt_menu_position'],
							'public'              => $simple_cpt_post_type['simple_cpt_public'],
							'show_ui'             => $simple_cpt_post_type['simple_cpt_show_ui'],
							'has_archive'         => $simple_cpt_post_type['simple_cpt_has_archive'],
							'exclude_from_search' => $simple_cpt_post_type['simple_cpt_exclude_from_search'],
							'capability_type'     => $simple_cpt_post_type['simple_cpt_capability_type'],
							'hierarchical'        => $simple_cpt_post_type['simple_cpt_hierarchical'],
							'show_in_menu'        => $simple_cpt_post_type['simple_cpt_show_in_menu'],
							'query_var'           => $simple_cpt_post_type['simple_cpt_query_var'],
							'show_in_rest'        => $simple_cpt_post_type['simple_cpt_show_in_rest'],
							'publicly_queryable'  => $simple_cpt_post_type['simple_cpt_publicly_queryable'],
							'_builtin'            => false,
							'supports'            => $simple_cpt_post_type['simple_cpt_supports'],
							'taxonomies'          => $simple_cpt_post_type['simple_cpt_builtin_taxonomies'],
						);
						if ( $simple_cpt_post_type['simple_cpt_name'] != 'no_name' ) {
							register_post_type( $simple_cpt_post_type['simple_cpt_name'], $args );
						}
					}
				}
			}
		}

		// query custom taxonomies
		$get_simple_cpt_tax    = array(
			'numberposts'      => -1,
			'post_type'        => 'simple_tax',
			'post_status'      => 'publish',
			'suppress_filters' => false,
		);
		$simple_cpt_taxonomies = get_posts( $get_simple_cpt_tax );

		// create array of post meta
		if ( $simple_cpt_taxonomies ) {
			foreach ( $simple_cpt_taxonomies as $simple_cpt_tax ) {
				$simple_cpt_meta = get_post_meta( $simple_cpt_tax->ID, '', true );

				// text
				$simple_cpt_tax_name                = ( array_key_exists( 'simple_cpt_tax_name', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_name'][0] ? sanitize_title( $simple_cpt_meta['simple_cpt_tax_name'][0] ) : 'no_name' );
				$simple_cpt_tax_label               = ( array_key_exists( 'simple_cpt_tax_label', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_label'][0] ? sanitize_text_field( $simple_cpt_meta['simple_cpt_tax_label'][0] ) : $simple_cpt_tax_name );
				$simple_cpt_tax_singular_name       = ( array_key_exists( 'simple_cpt_tax_singular_name', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_singular_name'][0] ? sanitize_text_field( $simple_cpt_meta['simple_cpt_tax_singular_name'][0] ) : $simple_cpt_tax_label );
				$simple_cpt_tax_custom_rewrite_slug = ( array_key_exists( 'simple_cpt_tax_custom_rewrite_slug', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_custom_rewrite_slug'][0] ? sanitize_title( $simple_cpt_meta['simple_cpt_tax_custom_rewrite_slug'][0] ) : $simple_cpt_tax_name );

				// dropdown
				$simple_cpt_tax_show_ui           = ( array_key_exists( 'simple_cpt_tax_show_ui', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_show_ui'][0] == '1' ? true : false );
				$simple_cpt_tax_hierarchical      = ( array_key_exists( 'simple_cpt_tax_hierarchical', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_hierarchical'][0] == '1' ? true : false );
				$simple_cpt_tax_rewrite           = ( array_key_exists( 'simple_cpt_tax_rewrite', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_rewrite'][0] == '1' ? array( 'slug' => _x( $simple_cpt_tax_custom_rewrite_slug, 'URL Slug', 'simple-cpt' ) ) : false );
				$simple_cpt_tax_query_var         = ( array_key_exists( 'simple_cpt_tax_query_var', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_query_var'][0] == '1' ? true : false );
				$simple_cpt_tax_show_in_rest      = ( array_key_exists( 'simple_cpt_tax_show_in_rest', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_show_in_rest'][0] == '1' ? true : false );
				$simple_cpt_tax_show_admin_column = ( array_key_exists( 'simple_cpt_tax_show_admin_column', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_show_admin_column'][0] == '1' ? true : false );

				// checkbox
				$simple_cpt_tax_post_types = ( array_key_exists( 'simple_cpt_tax_post_types', $simple_cpt_meta ) && $simple_cpt_meta['simple_cpt_tax_post_types'][0] ? $simple_cpt_meta['simple_cpt_tax_post_types'][0] : 'a:0:{}' );

				$simple_taxs[] = array(
					'simple_cpt_tax_id'                  => $simple_cpt_tax->ID,
					'simple_cpt_tax_name'                => $simple_cpt_tax_name,
					'simple_cpt_tax_label'               => $simple_cpt_tax_label,
					'simple_cpt_tax_singular_name'       => $simple_cpt_tax_singular_name,
					'simple_cpt_tax_custom_rewrite_slug' => $simple_cpt_tax_custom_rewrite_slug,
					'simple_cpt_tax_show_ui'             => (bool) $simple_cpt_tax_show_ui,
					'simple_cpt_tax_hierarchical'        => (bool) $simple_cpt_tax_hierarchical,
					'simple_cpt_tax_rewrite'             => $simple_cpt_tax_rewrite,
					'simple_cpt_tax_query_var'           => (bool) $simple_cpt_tax_query_var,
					'simple_cpt_tax_show_in_rest'        => (bool) $simple_cpt_tax_show_in_rest,
					'simple_cpt_tax_show_admin_column'   => (bool) $simple_cpt_tax_show_admin_column,
					'simple_cpt_tax_builtin_taxonomies'  => unserialize( $simple_cpt_tax_post_types ),
				);

				// register custom taxonomies
				if ( is_array( $simple_taxs ) ) {
					foreach ( $simple_taxs as $simple_tax ) {

						$labels = array(
							'name'                       => _x( $simple_tax['simple_cpt_tax_label'], 'taxonomy general name', 'simple-cpt' ),
							'singular_name'              => _x( $simple_tax['simple_cpt_tax_singular_name'], 'taxonomy singular name' ),
							'search_items'               => __( 'Search ' . $simple_tax['simple_cpt_tax_label'], 'simple-cpt' ),
							'popular_items'              => __( 'Popular ' . $simple_tax['simple_cpt_tax_label'], 'simple-cpt' ),
							'all_items'                  => __( $simple_tax['simple_cpt_tax_label'], 'simple-cpt' ),
							'parent_item'                => __( 'Parent ' . $simple_tax['simple_cpt_tax_singular_name'], 'simple-cpt' ),
							'parent_item_colon'          => __( 'Parent ' . $simple_tax['simple_cpt_tax_singular_name'], 'simple-cpt' . ':' ),
							'edit_item'                  => __( 'Edit ' . $simple_tax['simple_cpt_tax_singular_name'], 'simple-cpt' ),
							'update_item'                => __( 'Update ' . $simple_tax['simple_cpt_tax_singular_name'], 'simple-cpt' ),
							'add_new_item'               => __( 'Add New ' . $simple_tax['simple_cpt_tax_singular_name'], 'simple-cpt' ),
							'new_item_name'              => __( 'New ' . $simple_tax['simple_cpt_tax_singular_name'], 'simple-cpt' . ' Name' ),
							'separate_items_with_commas' => __( 'Seperate ' . $simple_tax['simple_cpt_tax_label'], 'simple-cpt' . ' with commas' ),
							'add_or_remove_items'        => __( 'Add or remove ' . $simple_tax['simple_cpt_tax_label'], 'simple-cpt' ),
							'choose_from_most_used'      => __( 'Choose from the most used ' . $simple_tax['simple_cpt_tax_label'], 'simple-cpt' ),
							'menu_name'                  => __( $simple_tax['simple_cpt_tax_label'], 'simple-cpt' ),
						);

						$args = array(
							'label'             => $simple_tax['simple_cpt_tax_label'],
							'labels'            => $labels,
							'rewrite'           => $simple_tax['simple_cpt_tax_rewrite'],
							'show_ui'           => $simple_tax['simple_cpt_tax_show_ui'],
							'hierarchical'      => $simple_tax['simple_cpt_tax_hierarchical'],
							'query_var'         => $simple_tax['simple_cpt_tax_query_var'],
							'show_in_rest'      => $simple_tax['simple_cpt_tax_show_in_rest'],
							'show_admin_column' => $simple_tax['simple_cpt_tax_show_admin_column'],
						);

						if ( $simple_tax['simple_cpt_tax_name'] != 'no_name' ) {
							register_taxonomy( $simple_tax['simple_cpt_tax_name'], $simple_tax['simple_cpt_tax_builtin_taxonomies'], $args );
						}
					}
				}
			}
		}
	}


	/**
	 * A custom sanitization function for arrays.
	 *
	 * @since    1.0.0
	 * @param    array    $input        The posted array.
	 * @return   array    $output	    The array sanitized.
	 */
	public function safe_array( $input ) {

		$output = array();

		foreach ( $input as $key => $val ) {
			$output[ $key ] = ( isset( $input[ $key ] ) ) ? sanitize_text_field( $val ) : '';
		}

		return $output;

	}


}
