<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sanjaywebexpert.com
 * @since      1.0.0
 *
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/admin
 * @author     Sanjay Web Expert <sanjayraghusharma@gmail.com>
 */
class Swe_Logo_Carousel_Admin {

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
	 * The Generate Setting Page
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	
	private $general_setting_options;
	
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
		require_once SWE_LOGO_CAROUSEL_PLUGIN_DIR. '/admin/partials/class-swe-logo-carousel-controls.php';
		$general_setting = new SWE_Controls_Class();
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Swe_Logo_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Swe_Logo_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/swe-logo-carousel-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'jQuery_UI_css', plugin_dir_url( __FILE__ ) . 'css/jquery-ui.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'wp-color-picker' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Swe_Logo_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Swe_Logo_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/swe-logo-carousel-admin.js', array( 'jquery' ), $this->version, true );
	}
	
	public function swe_logo_carousel_register_post_type(){
            $labels = array(
                'name'               => _x( 'SWE Logos', 'plural form of logo post type', SWELC_TEXTDOMAIN ),
                'singular_name'      => _x( 'SWE Logo', 'singular form of logo post type', SWELC_TEXTDOMAIN ),
                'menu_name'          => __( 'Swe Logo Carousel', SWELC_TEXTDOMAIN ),
                'name_admin_bar'     => __( 'Swe Logo Carousel', SWELC_TEXTDOMAIN ),
                'all_items'          => __( 'All Logos', SWELC_TEXTDOMAIN ),
                'add_new'            => __( 'Add New Logo', SWELC_TEXTDOMAIN ),
                'add_new_item'       => __( 'Add New Logo', SWELC_TEXTDOMAIN ),
                'new_item'           => __( 'New Logo', SWELC_TEXTDOMAIN ),
                'edit_item'          => __( 'Edit Logo', SWELC_TEXTDOMAIN ),
                'view_item'          => __( 'View Logo', SWELC_TEXTDOMAIN ),
                'search_items'       => __( 'Search Logo', SWELC_TEXTDOMAIN ),
                'parent_item_colon'  => __( 'Parent Logos:', SWELC_TEXTDOMAIN ),
                'not_found'          => __( 'No Logo found.', SWELC_TEXTDOMAIN ),
                'not_found_in_trash' => __( 'No Logo found in Trash.', SWELC_TEXTDOMAIN ),
				'featured_image'        => __( 'Logo Image', SWELC_TEXTDOMAIN ),
				'set_featured_image'    => __( 'Set Logo', SWELC_TEXTDOMAIN ),
				'remove_featured_image' => __( 'Remove logo image', SWELC_TEXTDOMAIN ),
				'use_featured_image'    => __( 'Use as logo image', SWELC_TEXTDOMAIN ),
            );

            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'logo' ),
                'capability_type'    => 'post',
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'thumbnail' ),
                'menu_icon' => 'dashicons-images-alt'
            );

            register_post_type( 'swelogocarousel', $args );

	}
	
	
	/*
	* Register Taxonomy in swe logo carousel
	*/
	function swe_logo_carousel_hierarchical_taxonomy() {
	  $labels = array(
		'name' => _x( 'SWE Logo Category', 'taxonomy general Products' ),
		'singular_name' => _x( 'SWE Logo Category', 'taxonomy singular SWE Logos' ),
		'search_items' =>  __( 'Search SWE Logos Category' ),
		'all_items' => __( 'All SWE Logo Category' ),
		'parent_item' => __( 'Parent SWE Logo Category' ),
		'parent_item_colon' => __( 'Parent SWE Logo Category:' ),
		'edit_item' => __( 'Edit SWE Logo Category' ), 
		'update_item' => __( 'Update SWE Logo Category' ),
		'add_new_item' => __( 'Add SWE Logo Category' ),
		'new_item_name' => __( 'New SWE Logo Category Name' ),
		'menu_name' => __( 'Logo Category' ),
	  ); 	
	/* Now register the taxonomy*/
	  register_taxonomy('swelogocarousel-category',array('swelogocarousel'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'swelogocarousel-category' ),
	  ));
	}

	
	/**
	 * Logo Meta Box
	 *
	 * @return void
	 */
	public function swe_logo_carousel_thumbnail_meta() {
		remove_meta_box( 'postimagediv', 'swelogocarousel', 'side' );
		add_meta_box( 'postimagediv', __( 'Logo Image', SWELC_TEXTDOMAIN ), 'post_thumbnail_meta_box', 'swelogocarousel', 'normal', 'high' );
	}
	
	/**
	 * Swe Logo Help Menu
	 *
	 */
	 
	public function swe_logo_carousel_help_menu(){
		add_submenu_page("edit.php?post_type=swelogocarousel", __('Help', SWELC_TEXTDOMAIN), __('Carousel Help',SWELC_TEXTDOMAIN),  "manage_options", "swe-logo-corousel-help", array($this, "swe_logo_carousel_help_menu_page_func"));
	}
	
	/**
	 * Logo Meta Coloumn
	 *
	 */
	 
    public function swe_logo_carousel_add_columns( $columns ) {
		$columns = array(
			'cb'    => 'cb',
			'title' => __( 'Title', SWELC_TEXTDOMAIN ),
			'thumb' => __( 'Logo', SWELC_TEXTDOMAIN ),
			'taxonomy'  => __( 'Category', SWELC_TEXTDOMAIN ),
			'shortcode'  => __( 'Shortcode', SWELC_TEXTDOMAIN ),
			'date'  => __( 'Date', SWELC_TEXTDOMAIN ),
		);
		return $columns;
	}

	function swe_logo_carousel_logo_thumb( $column ) {
		if ( $column == 'thumb' ) {
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'thumbnail', ['class' => 'swe-logo-thumb-listing'] );
			} else {
				echo '<span aria-hidden="true">—</span>';
			}
		}
		if ( $column == 'taxonomy' ) {
			global $post;
			$terms = get_the_terms( $post_id, 'swelogocarousel-category' );
			        /* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '%s',
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'article_category', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
		}
		if ( $column == 'shortcode' ) {
			global $post;
			$terms = get_the_terms( $post_id, 'swelogocarousel-category' );
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = '<label class="swe_shortcod_col"><mark>[swe-logo-carousel category="'.$term->slug.'"]</mark></label>';
				}
				/* Join the terms, separating them with a comma. */
				echo join( '<br> ', $out );
			}else{
				echo '<label class="swe_shortcod_col"><mark>[swe-logo-carousel]</mark></label>';
			}
		}
	}
	
	public function swe_logo_carousel_help_menu_page_func(){
		ob_start();
		include_once(SWE_LOGO_CAROUSEL_PLUGIN_DIR .'/admin/partials/swe-logo-carousel-admin-help.php'); 
		$template_content = ob_get_contents();
		ob_end_clean();
		echo  $template_content;
	}
	
	
}
