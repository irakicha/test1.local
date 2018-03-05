<?php

/**
 * User: phpstudent
 * Date: 28.02.18
 * Time: 17:12
 */
class Weather_Assets
{

    public function __construct()
    {

        add_action('wp_enqueue_scripts', array($this, 'weather_plugin_enqueue_style'));
        add_action('wp_enqueue_scripts', array($this, 'weather_plugin_enqueue_scripts'));

    }

    public function weather_plugin_enqueue_style()
    {
        wp_enqueue_style('weather_plugin_css', WEATHER_PLUGIN_URL.'/assets/weather_plugin_css.css');
    }


    public function weather_plugin_enqueue_scripts()
    {
        wp_enqueue_script('weather_plugin_js', WEATHER_PLUGIN_URL.'/assets/weather_plugin_js.js');

    }

}