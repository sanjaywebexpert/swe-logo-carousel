<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://sanjaywebexpert.com
 * @since      1.0.0
 *
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/public
 * @author     Sanjay Web Expert <sanjayraghusharma@gmail.com>
 */
class Swe_Logo_Carousel_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		
		wp_enqueue_style( 'SWE-owl-carousel-css', SWE_LOGO_CAROUSEL_PLUGIN_URL . '/public/css/owl.carousel.swe.min.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( 'SWE-owl-carousel-theme-css', SWE_LOGO_CAROUSEL_PLUGIN_URL . '/public/css/owl.theme.default.swe.min.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/swe-logo-carousel-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/swe-logo-carousel-public.js', array( 'jquery' ), $this->version, true );
		
		wp_enqueue_script( 'swe-owl-carousel-plugin', SWE_LOGO_CAROUSEL_PLUGIN_URL . '/public/js/owl.carousel.min.js', array( 'jquery' ), $this->version, true );

	}

	public function swe_logo_carousel_shortcode_callback_func( $atts, $content = null ){
		extract(shortcode_atts( array(  
			'category' => '-1',
		), $atts));
		global $post;
		$randslid = rand(1,1000);
		$result='';
		
		/*General Options Setup*/	
		$swe_general_options = get_option('general_setting_option_name');
		$navShow = $swe_general_options['show_navigation_arrows_1'];
		if($navShow==="Yes"){
			$navShow = "true";
		}else{
			$navShow = "false";
		}
		$logo_order = $swe_general_options['logo_display_order_4'];
		if($logo_order==="Descending"){
			$logo_order = "DESC";
			$orderby = "date";
		}elseif($logo_order==="Ascending"){
			$logo_order = "ASC";
			$orderby = "date";
		}elseif($logo_order==="Randomly"){
			$orderby = "rand";
			$logo_order = "DESC";
		}
		$class = array();
		$border = $swe_general_options['display_logo_with_border_5'];
		if($border==="Yes"){
			$class['border'] = "item_border";
		}else{
			$class['border'] = "";
		}
		$hover_effect = $swe_general_options['hover_effect_on_logo_6'];
		if($hover_effect==="Yes"){
			$hover_effect_type = $swe_general_options['hover_effect_type_logo_7'];
			$class['hover_effect'] = "on";
			$class['hover_effect_type'] = $hover_effect_type;
		}else{
			$class['hover_effect_type'] = "";
			$class['hover_effect'] = "";
		}
		$nav_position = $swe_general_options['navigation_arrows_position_3'];
		
		$swe_slider_options = get_option('slider_controls_option_name');
		$swe_style_options = get_option('style_controls_option_name');
		
		$theme_color = $swe_style_options['logo_carousel_theme_color_1'];
		if(isset($theme_color)){
			$th_color = $theme_color;
		}
		
		$loopJs = $swe_slider_options['logo_carousel_loop_0'];
		if($loopJs==="Yes"){
			$loopJs = "true";
		}else{
			$loopJs = "false";
		}
		$Autoplay = $swe_slider_options['logo_carousel_auto_play_2'];
		if($Autoplay==="Yes"){
			$Autoplay = "true";
		}else{
			$Autoplay = "false";
		}
		$dots = $swe_slider_options['logo_carousel_pagination_3'];
		if($dots==="Yes"){
			$dots = "true";
		}else{
			$dots = "false";
		}
		$transitionSpeed = $swe_slider_options['logo_carousel_transition_speed_1'];
		$desktop_item_no = $swe_slider_options['items_on_desktop_laptop_4'];
		$tablet_item_no = $swe_slider_options['items_on_tablet_5'];
		$mobile_item_no = $swe_slider_options['items_on_mobile_6'];
		$marginVal = $swe_slider_options['margin_between_logos_7'];
		$fontSize = $swe_style_options['logo_title_form_size_0'];
		
		
		/* Custom style based on setting */
		$result.='<style>
			.logo_item.item_border {
				border: 1px solid '.$th_color.';
			}
			.swe_logo_corousel_show.owl-theme .owl-nav .owl-prev, .swe_logo_corousel_show.owl-theme .owl-nav .owl-next{
				background:'.$th_color.';
			}

			.swe_logo_corousel_show.owl-theme .owl-dots .owl-dot.active span, .swe_logo_corousel_show.owl-theme .owl-dots .owl-dot:hover span{
				background:'.$th_color.';
			}';
			if($nav_position=="Top Right"){
				$result.='
				.swe_logo_corousel_show .owl-nav {
					position: absolute;
					right: 0;
                    top: -55px;
				}';
			}elseif($nav_position=="Top Middle"){
				$result.='
				.swe_logo_corousel_show .owl-nav {
					position: absolute;
					right: 0;
                    top: -55px;
					left:0
				}';
			}
			elseif($nav_position=="Top Left"){
				$result.='
				.swe_logo_corousel_show .owl-nav {
					position: absolute;
					left: 0;
                    top: -55px;
				}';
			}
			elseif($nav_position=="Bottom Right"){
				$result.='
				.swe_logo_corousel_show .owl-nav {
					position: absolute;
					right: 0;
                    bottom: -15px;
				}';
			}
			elseif($nav_position=="Bottom Middle"){
				$result.='
				.swe_logo_corousel_show .owl-nav {
					position: relative;
					right: 0;
					left: 0;
					bottom: auto;
				}';
			}
			elseif($nav_position=="Bottom Left"){
				$result.='
				.swe_logo_corousel_show .owl-nav {
					position: absolute;
					left:0;
                    bottom: -15px;
				}';
			}
			
			$result.='
				.swe_logo_title {
					font-size:'.$fontSize.'px;
				}';
		$result.='</style>';
		
		$swe_arg =	array( 
		'post_type' => 'swelogocarousel',
						'posts_per_page' => -1,
						'orderby' => $orderby,
						'order' => $logo_order 
					);			
		if($category > -1) {
				$swe_arg['tax_query'] = array(array('taxonomy' => 'swelogocarousel-category','field' => 'slug','terms' => $category ));
		}
		$swe_logo_corousel_loop = new WP_Query($swe_arg);
		

		$result .='<div class="swe_logo_carousel_wrapper">
		<div id="swe_logo_corousel_show-'.$randslid.'" class="owl-carousel owl-theme swe_logo_corousel_show">';
		
			if($swe_logo_corousel_loop->have_posts()){	
			while($swe_logo_corousel_loop->have_posts()){
				
			$swe_logo_corousel_loop->the_post(); 
				$post_id = get_the_ID();
				$cats = get_the_category($post_id);
				$swe_logo_url = get_post_meta( $post_id, 'swe_logo_url_field', true );
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			
			$result .='<div class="logo_item '.$class['border'].' '.$class['hover_effect_type']. ' '.$class['hover_effect']. '">';
				if(!empty($swe_logo_url)) { 
					$result .='<a href="'.$swe_logo_url.'" class="swe_logo_url" target="_blank">';
					if(has_post_thumbnail()){
						$result .='<img src="'.$large_image_url[0].'" alt="'.get_the_title().'"></a>';
					}
					if($swe_general_options['show_logo_title_0']==="Yes"){
						$result .='<p class="swe_logo_title">'.get_the_title().'</p>';
					}
				}else{ 
					if(has_post_thumbnail()){
						$result .='<img src="'.$large_image_url[0].'" alt="'.get_the_title().'">';
					}
					if($swe_general_options['show_logo_title_0']==="Yes"){
						$result .='<p class="swe_logo_title">'.get_the_title().'</p>';
					}
				} 	
				$result .='</div>';
				}
			}else { 
				$result .='<p>No logos found</p>';
			 }
			 
		
		$result .='</div></div>';
				$result .='<script>
		jQuery(document).ready(function() {
		  var swe_owl_selector = jQuery("#swe_logo_corousel_show-'.$randslid.'")
			swe_owl_selector.owlCarousel({
				nav:'.$navShow.',
				navText:["‹","›"],
				loop:'.$loopJs.',
				autoWidth:false,
				dots:'.$dots.',
				autoplay:'.$Autoplay.',
				autoplayTimeout:'.$transitionSpeed.',
				autoplayHoverPause:true,
				smartSpeed:1000,
				margin:'.$marginVal.',
				responsive:{
					0:{
						items:'.$mobile_item_no.'
					},
					768:{
						items:'.$tablet_item_no.'
					},            
					1000:{
						items:'.$desktop_item_no.'
					}
				}
			});
			
		});
	  </script>';
		return $result;
	}


}

add_shortcode( 'swe-logo-carousel', array( 'Swe_Logo_Carousel_Public', 'swe_logo_carousel_shortcode_callback_func' ) );
