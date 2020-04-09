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
 * This is used to define metabox on logo carousel post
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/includes
 * @author     Sanjay Web Expert <sanjayraghusharma@gmail.com>
 */
class Swe_Logo_Carousel_MetaBox{
	
	
	public function __construct() {

		add_action( 'add_meta_boxes', array( $this, 'swe_logo_add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_swe_logo_meta_boxes' ) );

	}
	
	
	 /**
	 * Link meta box
	 */
	public function swe_logo_add_meta_boxes() {
		add_meta_box(
			'swe_logo_url_option',
			__( 'Logo URL ( Optional )', $this->plugin_name ),
			array( $this, 'swe_logo_post_meta_box_callback' ),
			$this->post_type(),
			'normal',
			'default'
		);
	}
	
	public function swe_logo_post_meta_box_callback( $post ) {
		global $post;
		// Add a nonce field so we can check for it later.
		wp_nonce_field( 'swe_logo_url_field_nonce', 'swe_logo_url_field_nonce' );
		$swe_logo_url_field_value = get_post_meta( $post->ID, 'swe_logo_url_field', true );
		echo '<div class="logo_url"><div class="logo_th"><label for="swe_logo_url_field">Logo Url</label></div>';
		echo '<div class="logo_td"><input type="text" name="swe_logo_url_field" id="swe_logo_url_field" value="'.$swe_logo_url_field_value.'"></div></div>'; 
	}
	
	public function save_swe_logo_meta_boxes($post){	
		global $post;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		// Check if nonce is set
		if ( ! isset( $_POST['swe_logo_url_field_nonce'], $_POST['swe_logo_url_field'] ) ) {
			return;
		}
		
		// Check if nonce is valid.
		if ( ! wp_verify_nonce( $_POST['swe_logo_url_field_nonce'], 'swe_logo_url_field_nonce' ) ) {
			return;
		}
		
		// Check if user has permissions to save data
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		
		if( isset( $_POST[ 'swe_logo_url_field' ] ) ) {
			
				update_post_meta( $post->ID, 'swe_logo_url_field', $_POST[ 'swe_logo_url_field' ] );
		} 

	}
	
	public function post_type(){
		$posttype = 'swelogocarousel';
		return $posttype;
	}

}