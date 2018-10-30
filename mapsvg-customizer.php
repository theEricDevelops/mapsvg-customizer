<?php
/*
 * Plugin Name: MapSVG Customizer
 * Version: 1.0
 * Plugin URI: http://www.trafficlight.me/custom-wordpress-plugins
 * Description: This plugin allows for the inclusion of a custom taxonomy within the MapSVG popover.
 * Author: Eric Baker
 * Author URI: http://www.ericbaker.me/
 * Requires at least: 4.0
 * Tested up to: 4.9.8
 *
 * Text Domain: mapsvg-customizer
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Eric Baker
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-mapsvg-customizer.php' );
require_once( 'includes/class-mapsvg-customizer-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-mapsvg-customizer-admin-api.php' );
require_once( 'includes/lib/class-mapsvg-customizer-post-type.php' );
require_once( 'includes/lib/class-mapsvg-customizer-taxonomy.php' );

/**
 * Returns the main instance of MapSVG_Customizer to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object MapSVG_Customizer
 */
function MapSVG_Customizer () {
	$instance = MapSVG_Customizer::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = MapSVG_Customizer_Settings::instance( $instance );
	}

	return $instance;
}

MapSVG_Customizer();