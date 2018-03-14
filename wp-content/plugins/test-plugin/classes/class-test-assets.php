<?php

/**
 * User: phpstudent
 * Date: 28.02.18
 * Time: 17:12
 */
class Test_Assets
{

    public function __construct()
    {

        add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_style'));
        add_action('wp_enqueue_scripts', array($this, 'plugin_enqueue_scripts'));

    }

    public function plugin_enqueue_style()
    {
        wp_enqueue_style('owl_carousel_css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css');
        wp_enqueue_style('owl_carousel_theme_css', TEST_PLUGIN_URL.'/assets/test_plugin_css.css', array('owl_carousel_css'));
    }


    public function plugin_enqueue_scripts()
    {
        global $wp_scripts;
        if (!is_admin()) {
            wp_deregister_script('jquery');
        }

        wp_enqueue_script('jquery', 'http://code.jquery.com/jquery-3.3.1.min.js');
        wp_enqueue_script('owl_carousel_js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js', array('jquery'), false, false);
//        wp_enqueue_script('test_plugin_js', TEST_PLUGIN_URL.'/assets/test_plugin_js.js', array('owl_carousel_js') );

    }

}