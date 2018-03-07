<?php


class Weather_Notices
{

    public function __construct()
    {
        if (false == self::get_option('token')) {
            add_action('admin_notices', array($this, 'show_notice_api_key'));
        }
        if (self::check_api_key() == 'ERROR_TOKEN') {
            add_action('admin_notices', array($this, 'show_wrong_api_key'));
        }
        if (false == self::check_curl_extension()) {
            add_action('admin_notices', array($this, 'show_curl_error'));
        }
    }

    public static function get_option($option_name)
    {
        return get_option('weather_plugin')[$option_name];
    }

    public static function check_api_key()
    {
        return get_option('weather_plugin');
    }

    public static function check_curl_extension(){
        return extension_loaded('curl');
    }

    public function show_notice_api_key()
    {
        echo "<div class='notice error weather-notice'</div><p>" . WEATHER_PLUGIN_NAME . " : Please provide an API key to enable the plugin <a href='/wp-admin/options-general.php?page=weather-plugin-settings'>Settings</a></p></div>";

    }

    public function show_wrong_api_key()
    {
        echo "<div class='notice error weather-notice'</div><p>" . WEATHER_PLUGIN_NAME . " : Your API Key is not valid. Please try again <a href='/wp-admin/options-general.php?page=weather-plugin-settings'>Settings</a></p></div>";
    }

    public function show_curl_error()
    {
        echo "<div class='notice error weather-notice'</div><p>" . WEATHER_PLUGIN_NAME . " : Require curl extension to be installed.  <a href='http://php.net/manual/en/book.curl.php' target='_blank'>See manual</a></p></div>";

    }

}