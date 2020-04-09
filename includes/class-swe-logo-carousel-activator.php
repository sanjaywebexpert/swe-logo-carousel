<?php

/**
 * Fired during plugin activation
 *
 * @link       http://sanjaywebexpert.com
 * @since      1.0.0
 *
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/includes
 * @author     Sanjay Web Expert <sanjayraghusharma@gmail.com>
 */
class Swe_Logo_Carousel_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate() {
		
		$general_setting_options = array(
			'show_logo_title_0' => 'Yes',
			'show_navigation_arrows_1' => 'Yes',
			'navigation_arrows_position_3' => 'Bottom Right',
			'logo_display_order_4' => 'Descending',
		);
		$slider_controls_options = array(
			'logo_carousel_loop_0' => 'Yes',
			'logo_carousel_transition_speed_1' => '3000',
			'logo_carousel_auto_play_2' =>'Yes',
			'logo_carousel_pagination_3' =>'Yes',
			'items_on_desktop_laptop_4' =>'5',
			'items_on_tablet_5' =>'2',
			'items_on_mobile_6' =>'1',
			'margin_between_logos_7' =>'10',
		);
	  update_option('general_setting_option_name', $general_setting_options);
	  update_option('slider_controls_option_name', $slider_controls_options);
	}

}
