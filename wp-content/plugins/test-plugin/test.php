
<?php

/*
Plugin Name:  Test
Plugin URI: www.google.com
Description:  Test Plugin
Version:      1.0
Author:
Author URI:
License:
License URI:
Text Domain:
Domain Path:
*/

define( 'TEST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'TEST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

register_activation_hook( __FILE__, array( ) );
register_deactivation_hook( __FILE__, array( ) );

require_once(TEST_PLUGIN_DIR.'classes/class-test-assets.php' );
require_once(TEST_PLUGIN_DIR.'classes/class-test.php' );

$test_gallery_assets = new Test_Assets();
$test_gallery = new Test();

//var_dump($test_gallery);
//echo $test_gallery::$gallery_counter;
