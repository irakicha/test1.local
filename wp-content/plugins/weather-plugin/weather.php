<?php

/**
 * Plugin Name: Weather Plugin
 * Plugin URI: https://github.com/irakicha/test1.local/tree/master/wp-content/plugins/weather-plugin
 * Description: Add current weather to any page of your site
 * Version: 1.0
 * Author: Ira Kicha
 * Author URI: https://github.com/irakicha
 * Text Domain: weather-plugin
 * License: GPLv2 or later
 */

define( 'WEATHER_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'WEATHER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'WEATHER_PLUGIN_NAME', 'Weather Plugin');

register_activation_hook( __FILE__, array());
register_deactivation_hook( __FILE__, array());

require_once(WEATHER_PLUGIN_DIR.'classes/class-weather-admin-settings.php');
require_once(WEATHER_PLUGIN_DIR.'classes/class-weather.php' );
require_once(WEATHER_PLUGIN_DIR.'classes/class-weather-notices.php' );
require_once(WEATHER_PLUGIN_DIR.'classes/class-weather-assets.php');

$weather = new Weather();
$weather_notices = new Weather_Notices();
$weather_assets = new Weather_Assets();
$weather_settings = new Weather_Admin_Settings();



