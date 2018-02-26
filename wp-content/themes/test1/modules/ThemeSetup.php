<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 26.02.18
 * Time: 13:17
 */

class ThemeSetup
{

    public function __construct()
    {
        /*add custom logo*/

        add_theme_support('custom-logo');

        /*add thumbnails support*/

        add_theme_support( 'post-thumbnails' );


        add_action('wp_enqueue_scripts', array(get_called_class(), 'theme_enqueue_style'));

        add_action('wp_enqueue_scripts', array(get_called_class(), 'theme_enqueue_js'));

        add_action('init', array(get_called_class(), 'register_my_menus'));

        add_action( 'widgets_init',  array(get_called_class(), 'true_register_wp_sidebars') );

    }

    public function theme_enqueue_style()
    {
        if (is_child_theme()) {
            // load parent stylesheet first if this is a child theme
            wp_enqueue_style('parent-stylesheet', trailingslashit(get_template_directory_uri()) . 'style.css', false);
        }
        // load active theme stylesheet in both cases
        wp_enqueue_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
        wp_enqueue_style('theme-stylesheet', get_stylesheet_uri(), false);
    }


    public function theme_enqueue_js()
    {
        global $wp_scripts;
        if (!is_admin()) {
            wp_deregister_script('jquery');
        }
        wp_enqueue_script('jquery', 'http://code.jquery.com/jquery-3.3.1.min.js');
        wp_enqueue_script('popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
        wp_enqueue_script('bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
        wp_enqueue_script('my_custom_js', get_template_directory_uri() . '/js/scripts.js', array('jquery'));
        wp_localize_script('my_custom_js', 'customAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php')
        ));
    }


    public function register_my_menus()
    {
        register_nav_menus(
            array(
                'header-menu' => __('Header Menu'),
                'footer-menu' => __('Footer Menu')
            )
        );
    }


    public function true_register_wp_sidebars() {
        register_sidebar(
            array(
                'id' => 'true_side',
                'name' => 'Main sidebar',
                'description' => 'Move widgets here.',
                'before_widget' => '<div id="%1$s" class="side widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>'
            )
        );
    }

}