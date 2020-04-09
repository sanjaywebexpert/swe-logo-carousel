<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://sanjaywebexpert.com
 * @since      1.0.0
 *
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Swe_Logo_Carousel
 * @subpackage Swe_Logo_Carousel/includes
 * @author     Sanjay Web Expert <sanjayraghusharma@gmail.com>
 */
class Swe_Logo_Carousel_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'swe-logo-carousel',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
