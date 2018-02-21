
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
    wp_enqueue_script( 'jquery_js', 'https://code.jquery.com/jquery-3.2.1.slim.min.js');
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

/*Add custom post type*/

add_action( 'init', 'register_new_post_type' );

function register_new_post_type() {
    $labels = array(
        'name' => 'Books',
        'singular_name' => 'Book',
        'add_new' => 'Add book',
        'add_new_item' => 'Add new book',
        'edit_item' => 'Edit Book',
        'new_item' => 'New Book',
        'all_items' => 'All books',
        'view_item' => 'View book',
        'search_items' => 'Search book',
        'not_found' =>  'books not found.',
        'menu_name' => 'Books'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
        'menu_position' => 3,
        'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail')
    );
    register_post_type('books', $args);
}


/*Add taxonomy*/

function new_taxonomy(){
    $labels = array(
        'name' =>'Book Type',
        'singular_name'=>'Book Type',
        'add_new_item'=>'Add Book Type',
        'new_item_name'=>'New Book Type',
        'all_items'=>'All Book Types',
        'edit_item'=>'Edit Book Type',
        'update_item'=>'Update Book Type',
        'view_items'=>'View Book Type',
        'search_items'=>'Search Book Type',
        'parent_item'=>'Parent Book Type',
        'parent_item_colon'=>'Parent Book Type',
    );
    $args = array(
        'hierarchical'=>true,
        'labels'=>$labels,
        'show_ui'=>true,
        'show_admin_column'=>true,
        'query_var'=>true,
        'rewrite'=>array('slug'=>'book-type'),
    );
    register_taxonomy('book-type',array('books'),$args);
}
add_action('init','new_taxonomy');

/*add metabox*/

/* book_extra_fields */
add_action('add_meta_boxes', 'book_extra_fields', 1);
function book_extra_fields() {
    add_meta_box( 'book_extra_fields', 'Book extra fields', 'extra_fields_box_func', 'books', 'normal', 'high'  );
}
function extra_fields_box_func(  ){
    // Поля формы для введения данных
    echo '<label for="myplugin_new_field">' . __("Augthor", 'myplugin_textdomain' ) . '</label> ';
    echo '<input type="text" id= "myplugin_new_field" name="myplugin_new_field" value="Enter Augthor name" size="25" />';
}

function myplugin_save_postdata( $post_id ) {
    if ( ! isset( $_POST['myplugin_new_field'] ) )
        return;
    if ( ! wp_verify_nonce( $_POST['myplugin_noncename'], plugin_basename(__FILE__) ) )
        return;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return;
    if( ! current_user_can( 'edit_post', $post_id ) )
        return;
    $my_data = sanitize_text_field( $_POST['myplugin_new_field'] );
    update_post_meta( $post_id, '_my_meta_value_key', $my_data );
}
add_action( 'save_post', 'myplugin_save_postdata' );