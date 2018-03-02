<?php

class Weather
{

    public function __construct()
    {
        add_shortcode( 'current_weather', array($this, 'weather_func' ) );

    }



    public function weather_func( $atts) {

        $key = "9f81bdf4000a4e1b9e9150700180203";

        $params = shortcode_atts( array( // в массиве укажите значения параметров по умолчанию
            'city' => 'kharkiv', // параметр 1
        ), $atts );

        $url = "http://api.apixu.com/v1/current.json?key=$key&q={$params['city']}&=" ;

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $json_output=curl_exec($ch);
        $weather = json_decode($json_output);
        return "Temperature: " . $params['city'].":".$weather->current->temp_c;
    }

}