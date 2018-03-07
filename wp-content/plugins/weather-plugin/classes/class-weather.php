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

        $city = str_replace(' ', '%', array_shift(explode(',', $city)));

        echo $city;


        $show_wind = get_option('weather_plugin')['wind'];

        $url = "http://api.apixu.com/v1/current.json?key=$key&q={$city}&=";

        if ( false === ( $weather = get_transient( 'weather_plugin' ) ) ) {

            if (extension_loaded('curl')){

                $ch = curl_init();

                curl_setopt($ch,CURLOPT_URL,$url);

                curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

                $weather=curl_exec($ch);
            }

            set_transient( 'weather_plugin', $weather, 1 * HOUR_IN_SECONDS );
        }

        $weather = json_decode($weather);

        if ($weather->error->code == 2006){

            update_option( 'weather_plugin', 'ERROR_TOKEN' );

        }

        ob_start();

        require_once (WEATHER_PLUGIN_DIR.'templates/weather-template.php');

        $weather_content=ob_get_contents();

        ob_end_clean();

        return $weather_content;

    }


}