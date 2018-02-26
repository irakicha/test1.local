<?php

/**
 * Created by PhpStorm.
 * User: ira
 * Date: 22.02.18
 * Time: 13:17
 */
class Books
{

    public static function init()
    {
        /*Add custom post type*/

        add_action('init', array(get_called_class(), 'register_new_post_type'));

        /*Add Book Genre taxonomy*/

        add_action('init', array(get_called_class(), 'new_taxonomy'));

        /*Add Book Author taxonomy*/

        add_action('init', array(get_called_class(), 'new_author_taxonomy'));

        /*Replace post type to taxonomy in URI*/

//        add_filter('post_type_link', array(get_called_class(), 'books_permalink_structure'));

        /*Add metabox*/

        add_action('add_meta_boxes', array(get_called_class(), 'add_custom_box'));

        add_action('save_post', array(get_called_class(), 'metabox_save_postdata'));
    }

    public static function register_new_post_type()
    {
        $labels = array(
            'name' => 'Books',
            'singular_name' => 'Book',
            'add_new' => 'Add book',
            'add_new_item' => 'Add new book',
            'edit_item' => 'Edit Book',
            'new_item' => 'New Book',
            'all_items' => 'All Books',
            'view_item' => 'View Book',
            'search_items' => 'Search book',
            'not_found' => 'Books not found.',
            'not_found_in_trash' => 'Books not found in trash',
            'parent_item_colon' => '',
            'menu_name' => 'Books'
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'taxonomies' => array('books-categories'),
//            'rewrite' => array('slug' => 'books/%book-genre%', 'with_front' => false),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 2,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')

        );
        register_post_type('books', $args);
    }


    /*Add Book Author taxonomy*/

    public static function new_author_taxonomy()
    {
        $labels = array(
            'name' => 'Book Author',
            'singular_name' => 'Book Author',
            'add_new_item' => 'Add Book Author',
            'new_item_name' => 'New Book Author',
            'all_items' => 'All Book Author',
            'edit_item' => 'Edit Book Author',
            'update_item' => 'Update Book Author',
            'view_items' => 'View Book Author',
            'search_items' => 'Search Book Author',
            'parent_item' => 'Parent Book Author',
            'parent_item_colon' => 'Parent Book Author',
        );
        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
//            'rewrite' => array('slug' => 'books'),
        );
        register_taxonomy('book-author', array('books'), $args);
    }


    /*Add Book Genre taxonomy*/

    public static function new_taxonomy()
    {
        $labels = array(
            'name' => 'Book Genre',
            'singular_name' => 'Book Genre',
            'add_new_item' => 'Add Book Genre',
            'new_item_name' => 'New Book Genre',
            'all_items' => 'All Book Genres',
            'edit_item' => 'Edit Book Genre',
            'update_item' => 'Update Book Genre',
            'view_items' => 'View Book Genre',
            'search_items' => 'Search Book Genre',
            'parent_item' => 'Parent Book Genre',
            'parent_item_colon' => 'Parent Book Genre',
        );
        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
//            'rewrite' => array('slug' => 'books'),
        );
        register_taxonomy('book-genre', array('books'), $args);
    }


    /*add metabox*/


    function add_custom_box()
    {
        $screens = ['books'];
        foreach ($screens as $screen) {
            add_meta_box(
                'book_year_metabox_id',
                'Book Publish Year',
                array(get_called_class(), 'custom_box_html'),
                $screen
            );
        }
    }

    public static function custom_box_html($post)
    {
        $value = get_post_meta($post->ID, 'book_year_meta_key', true);
        ?>
        <label for="book_year_metabox_field">Add publish year</label>
        <input type="number" name="book_year_metabox_field" id="book_year_metabox" class="metabox"
               value="<?php echo $value; ?>" required>

        <?php
    }

    function metabox_save_postdata($post_id)
    {
        if (array_key_exists('book_year_metabox_field', $_POST)) {
            update_post_meta(
                $post_id,
                'book_year_meta_key',
                $_POST['book_year_metabox_field']
            );
        }
    }

    /*Replace post type to taxonomy in URI*/

    function books_permalink_structure($post_link, $post, $leavename, $sample)
    {
        if (false !== strpos($post_link, '%book-genre%')) {
            $projectscategory_type_term = get_the_terms($post->ID, 'book-genre');
            if (!empty($projectscategory_type_term))
                $post_link = str_replace('%book-genre%', array_pop($projectscategory_type_term)->
                slug, $post_link);
            else
                $post_link = str_replace('%book-genre%', 'uncategorized', $post_link);
        }
        return $post_link;
    }


}