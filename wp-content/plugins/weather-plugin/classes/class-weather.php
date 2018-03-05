<?php

class Weather
{

    public function __construct()
    {
        add_shortcode( 'current_weather', array($this, 'weather_func' ) );

    }



    public function weather_func() {

        $key = get_option('weather_plugin')['token'];

        $city = get_option('weather_plugin')['city'] ? get_option('weather_plugin')['city'] : 'kharkiv';

        $show_wind = get_option('weather_plugin')['wind'];

        $url = "http://api.apixu.com/v1/current.json?key=$key&q=$city&=" ;

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $json_output=curl_exec($ch);

        if ( false === ( $weather = get_transient( 'weather_plugin' ) ) ) {
            // It wasn't there, so regenerate the data and save the transient
            set_transient( 'weather_plugin', json_decode($json_output), 1 * HOUR_IN_SECONDS );
        }

//        set_transient( 'weather_plugin', json_decode($json_output), 1 * HOUR_IN_SECONDS  ); ;
//
////        if ( false === ( $value = get_transient( 'weather_plugin' ) ) ) {
////            // this code runs when there is no valid transient set
////        }
//
//        $weather = get_transient( 'weather_plugin' );

        ob_start();

        require_once (WEATHER_PLUGIN_DIR.'templates/weather-template.php');

        $weather_content=ob_get_contents();
        ob_end_clean();

        return $weather_content;

    }

}