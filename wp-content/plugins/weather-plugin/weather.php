<?php

/*
Plugin Name:  Weather
Plugin URI: www.weather.com
Description:  Weather Plugin
Version:      1.0
Author: Ira
Author URI:
License:
License URI:
Text Domain:
Domain Path:
*/

define( 'WEATHER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WEATHER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

register_activation_hook( __FILE__, array( 'Weather', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Weather', 'plugin_deactivation' ) );
//
require_once(WEATHER_PLUGIN_DIR.'classes/class-weather.php' );
require_once(WEATHER_PLUGIN_DIR.'classes/class-weather-assets.php');
require_once(WEATHER_PLUGIN_DIR.'classes/class-weather-admin-settings.php');

$weather = new Weather();
$weather_assets = new Weather_Assets();
$weather_settings = new Weather_Admin_Settings();


