<?php

class Weather_Admin_Settings
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_weather_plugin_page'));
        add_action('admin_init', array($this, 'weather_plugin_settings'));
    }


    function add_weather_plugin_page()
    {
        add_options_page('Weather Plugin Settings', 'Weather Plugin', 'manage_options', 'weather-plugin-settings', array($this, 'weather_options_page_output'));
    }

    function weather_options_page_output()
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

    function weather_plugin_settings()
    {
        register_setting('weather_plugin_option_group', 'weather_plugin', array($this, 'sanitize_callback'));

        add_settings_section('settings_id', 'Settings. Use shortcode [current_weather] to add weather infirmation on any page', '', 'weather-plugin-page');

        add_settings_field('primer_field1', 'Token', array($this, 'fill_weather_field1'), 'weather-plugin-page', 'settings_id');

        add_settings_field('primer_field2', 'City name (Default: Kharkiv)', array($this, 'fill_weather_field2'), 'weather-plugin-page', 'settings_id');

        add_settings_field('primer_field3', 'Show wind', array($this, 'fill_weather_field3'), 'weather-plugin-page', 'settings_id');
    }

## Заполняем опцию 1
    function fill_weather_field1()
    {
        $val = get_option('weather_plugin');

        $val = $val ? $val['token'] : null;
        ?>
        <input type="text" name="weather_plugin[token]" value="<?php echo esc_attr($val) ?>"/>
        <?php
    }

    function fill_weather_field2()
    {
        $val = get_option('weather_plugin');

        $val = $val ? $val['city'] : null;
        ?>
        <input type="text" name="weather_plugin[city]" value="<?php echo esc_attr($val) ?>"/>
        <?php
    }

    function fill_weather_field3(){

        $val = get_option('weather_plugin');

        $val = $val ? $val['wind'] : false;

        ?>
        <label><input type="checkbox" name="weather_plugin[wind]" value="1" <?php checked( 1, $val ) ?> /> Check</label>
        <?php
    }


    function sanitize_callback($options)
    {
        // очищаем
        foreach ($options as $name => & $val) {
            if ($name == 'input')
                $val = strip_tags($val);

            if ($name == 'checkbox')
                $val = intval($val);
        }

        //die(print_r( $options )); // Array ( [input] => aaaa [checkbox] => 1 )

        return $options;
    }
}


