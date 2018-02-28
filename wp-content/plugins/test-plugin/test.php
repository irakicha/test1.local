
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

define( 'TEST_PLUGIN_DIR', plugin_dir_url( __FILE__ ) );

echo TEST_PLUGIN_DIR;

register_activation_hook( __FILE__, array( 'Test1', 'plugin_activation' ) );
register_deactivation_hook( __FILE__, array( 'Test1', 'plugin_deactivation' ) );

require_once( TEST_PLUGIN_DIR . 'classes/class-test.php' );
require_once( TEST_PLUGIN_DIR . 'classes/class-test-styles.php' );

$test_gallery = new Test();
$test_gallery = new Test_Styles();