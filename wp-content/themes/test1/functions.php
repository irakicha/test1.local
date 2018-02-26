
<?php
/**TwentyEighteen functions and definitions+**/

require_once ('modules/ThemeSetup.php');

$theme = new ThemeSetup();

add_action('wp_enqueue_scripts', array($theme, 'theme_enqueue_style'));

add_action('wp_enqueue_scripts', array($theme, 'theme_js'));

add_action('init', array($theme, 'register_my_menus'));

add_action( 'widgets_init',  array($theme, 'true_register_wp_sidebars') );


/*==Create Custom Post Type Books==*/

require_once ('modules/Books.php');

Books::init();

/*==Create Custom Widget==*/

require_once('modules/WidgetFilter.php');

$filerWidget = new WidgetFilter();

//require_once('modules/AjaxShowCat.php');
//
//$ajaxShowCat = new AjaxShowCat();


add_action('wp_ajax_getCat','ajax_showCat');
add_action('wp_ajax_nopriv_getCat', 'ajax_showCat');


function ajax_showCat(){

$link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;
$slug = $link ? wp_basename($link) : false;

$args = array(
    'orderby' => 'date',
    'tax_query'   => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'book-author',
            'field'    => 'slug',
            'terms'    => $slug
        ),
        array(
            'taxonomy' => 'book-genre',
            'field'    => 'slug',
            'terms'    => $slug
        )
    )
);

$query = new WP_Query( $args );

require ('template-parts/books.php');

die();

}













