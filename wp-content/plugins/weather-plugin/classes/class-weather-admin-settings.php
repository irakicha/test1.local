<?php

require_once(WEATHER_PLUGIN_DIR.'classes/class-weather-notices.php' );

class Weather_Admin_Settings
{
    public $notice;

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_weather_plugin_page'));
        add_action('admin_init', array($this, 'weather_plugin_settings'));
    }


    public function add_weather_plugin_page()
    {
        add_options_page('Weather Plugin Settings', 'Weather Plugin', 'manage_options', 'weather-plugin-settings', array($this, 'weather_options_page_output'));
    }

    public function weather_options_page_output()
    {
        ?>
        <div class="wrap">
            <h2><?php echo get_admin_page_title() ?></h2>

            <form action="options.php" method="POST">
                <?php
                settings_fields('weather_plugin_option_group');
                do_settings_sections('weather-plugin-page');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    public function weather_plugin_settings()
    {
        register_setting('weather_plugin_option_group', 'weather_plugin', array($this, 'sanitize_callback'));

        add_settings_section('settings_id', 'Settings. Use shortcode [current_weather] to add weather infirmation on any page', '', 'weather-plugin-page');

        add_settings_field('primer_field1', 'Token', array($this, 'fill_weather_field1'), 'weather-plugin-page', 'settings_id');

        add_settings_field('primer_field2', 'City name (Default: Kharkiv)', array($this, 'fill_weather_field2'), 'weather-plugin-page', 'settings_id');

        add_settings_field('primer_field3', 'Show wind', array($this, 'fill_weather_field3'), 'weather-plugin-page', 'settings_id');
    }

## Заполняем опцию 1
    public function fill_weather_field1()
    {
        $val = self::get_option('token') ? self::get_option('token') : null;
        ?>
        <input type="text" name="weather_plugin[token]" value="<?php if (get_option('weather_plugin') != 'ERROR_TOKEN') {echo esc_attr($val);} ?>"/>
        <?php
    }

    public function fill_weather_field2()
    {
        $val = self::get_option('city') ? self::get_option('city') : null;?>
        <input type="text" id="searchCity" name="weather_plugin[city]" placeholder="Enter city name" value="<?php if (get_option('weather_plugin') != 'ERROR_TOKEN') {echo esc_attr($val);} ?>"/>
        <?php
    }

    public function fill_weather_field3(){

        $val = self::get_option('wind') ? self::get_option('wind') : null;

        ?>
        <label><input type="checkbox" name="weather_plugin[wind]" value="1" <?php checked( 1, $val ) ?> /> Check to show wind indexes</label>
        <?php
    }


    function sanitize_callback($options)
    {
        delete_transient('weather_plugin');
//
//        foreach ($options as $name => & $val) {
//            if ($name == 'input')
//            $val = strip_tags($val);
//
//            if ($name == 'checkbox')
//            $val = intval($val);
//        }

        //die(print_r( $options )); // Array ( [input] => aaaa [checkbox] => 1 )

        return $options;
    }

    public static function get_option($option_name){
        return get_option('weather_plugin')[$option_name];
    }

}


