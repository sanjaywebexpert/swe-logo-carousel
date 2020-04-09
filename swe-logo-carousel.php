<?php

/**
 * @link              http://sanjaywebexpert.com
 * @since             1.0.0
 * @package           Swe_Logo_Carousel
 *
 * @wordpress-plugin
 * Plugin Name:       SWE Logo Carousel
 * Plugin URI:        http://sanjaywebexpert.com
 * Description:       Logo carousel is used for displaying your client, company, partners, supporters and others logo carousel display with shortcode. No need to do any coding.
 * Version:           1.0.0
 * Author:            Sanjay Web Expert
 * Author URI:        http://sanjaywebexpert.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       swe-logo-carousel
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SWE_LOGO_CAROUSEL_VERSION', '1.0.0' );
if(!defined("SWE_LOGO_CAROUSEL_PLUGIN_DIR"))
    define("SWE_LOGO_CAROUSEL_PLUGIN_DIR",plugin_dir_path(__FILE__));
if(!defined("SWE_LOGO_CAROUSEL_PLUGIN_URL"))
    define("SWE_LOGO_CAROUSEL_PLUGIN_URL",plugins_url()."/swe-logo-carousel");
if( ! defined( 'SWELC_TEXTDOMAIN' ) ) define( 'SWELC_TEXTDOMAIN', 'swe-logo-carousel' );
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-swe-logo-carousel-activator.php
 */
function activate_swe_logo_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-swe-logo-carousel-activator.php';
	$activator = new Swe_Logo_Carousel_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-swe-logo-carousel-deactivator.php
 */
function deactivate_swe_logo_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-swe-logo-carousel-deactivator.php';
	Swe_Logo_Carousel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_swe_logo_carousel' );
register_deactivation_hook( __FILE__, 'deactivate_swe_logo_carousel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-swe-logo-carousel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_swe_logo_carousel() {

	$plugin = new Swe_Logo_Carousel();
	$plugin->run();

}
run_swe_logo_carousel();
