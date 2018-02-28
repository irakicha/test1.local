<?php

/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 28.02.18
 * Time: 17:12
 */
class Test_Styles
{

    public function __construct()
    {

        $this->init();

    }

    public function init(){

        add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_style'));
        add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_scripts'));
        
    }

    public function plugin_enqueue_style()
    {
        wp_enqueue_style('slick_css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css');
//        wp_enqueue_style('theme-stylesheet', get_stylesheet_uri(), false);
    }


    public function plugin_enqueue_scripts()
    {
        wp_enqueue_script('slick_js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js', array('jquery'));
//        wp_enqueue_script('test_plugin_js', TEST_PLUGIN_DIR. 'assets/test_plugin_js.js' );

    }
    

}