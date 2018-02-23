
<?php
/**TwentyEighteen functions and definitions+**/

function theme_enqueue_style() {
    if ( is_child_theme() ) {
        // load parent stylesheet first if this is a child theme
        wp_enqueue_style( 'parent-stylesheet', trailingslashit( get_template_directory_uri() ) . 'style.css', false );
    }
    // load active theme stylesheet in both cases
    wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' );
    wp_enqueue_style( 'theme-stylesheet', get_stylesheet_uri(), false );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_style' );

function theme_js() {
    global $wp_scripts;
    if ( !is_admin() ) {
        wp_deregister_script('jquery');
    }
    wp_enqueue_script( 'jquery_js', 'http://code.jquery.com/jquery-3.3.1.min.js');
    wp_enqueue_script( 'popper_js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
    wp_enqueue_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
    wp_enqueue_script( 'my_custom_js', get_template_directory_uri() . '/js/scripts.js');
}

add_action( 'wp_enqueue_scripts', 'theme_js');

function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'register_my_menus' );

/*add custom logo*/

add_theme_support('custom-logo');

/*add thumbnails support*/

add_theme_support( 'post-thumbnails' );

/*register sidebar*/

function true_register_wp_sidebars() {
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

add_action( 'widgets_init', 'true_register_wp_sidebars' );


/*==Create Custom Post Type Books==*/

require_once ('modules/Books.php');

Books::init();


require_once('modules/WidgetFilter.php');

$filerWidget = new WidgetFilter();








