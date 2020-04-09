<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://sanjaywebexpert.com
 * @since      1.0.0
 *
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/includes
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
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/includes
 * @author     Sanjay Web Expert <sanjayraghusharma@gmail.com>
 */
class Swe_Logo_Carousel {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Swe_Logo_Carousel_Loader    $loader    Maintains and registers all hooks for the plugin.
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
		if ( defined( 'SWE_LOGO_CAROUSEL_VERSION' ) ) {
			$this->version = SWE_LOGO_CAROUSEL_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'swe-logo-carousel';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
		$this->logo_meta_boxes();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Swe_Logo_Carousel_Loader. Orchestrates the hooks of the plugin.
	 * - Swe_Logo_Carousel_i18n. Defines internationalization functionality.
	 * - Swe_Logo_Carousel_Admin. Defines all hooks for the admin area.
	 * - Swe_Logo_Carousel_Public. Defines all hooks for the public side of the site.
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
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-swe-logo-carousel-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-swe-logo-carousel-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-swe-logo-carousel-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-swe-logo-carousel-public.php';
		
		
		$this->loader = new Swe_Logo_Carousel_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Swe_Logo_Carousel_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Swe_Logo_Carousel_i18n();

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

		$plugin_admin = new Swe_Logo_Carousel_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		
		/* Register SWE Logo post type */
		$this->loader->add_action( 'init', $plugin_admin, 'swe_logo_carousel_register_post_type' );
		
		/* Help Menu */
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'swe_logo_carousel_help_menu' );
		
		/* Register SWE Logo post type taxonomy */
		$this->loader->add_action( 'init', $plugin_admin, 'swe_logo_carousel_hierarchical_taxonomy' );
		
		/* Admin Hooks for Logo thumbnail */
		$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'swe_logo_carousel_thumbnail_meta' );
		/*  Add Column in post listing */
		$this->loader->add_action( 'manage_swelogocarousel_posts_columns', $plugin_admin, 'swe_logo_carousel_add_columns' );
		/*  manage Column in post listing */
		$this->loader->add_action( 'manage_swelogocarousel_posts_custom_column', $plugin_admin, 'swe_logo_carousel_logo_thumb' );	
		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Swe_Logo_Carousel_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
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
	 * @return    Swe_Logo_Carousel_Loader    Orchestrates the hooks of the plugin.
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
  
	/**
	 * Instantiate all the required classes
	 *
	 * @since 1.0.0
	 */
	 
	public function logo_meta_boxes(){
		require_once  SWE_LOGO_CAROUSEL_PLUGIN_DIR . 'includes/class-swe-logo-carousel-metabox.php';
		$this->metabox = new Swe_Logo_Carousel_MetaBox();
	}
}
