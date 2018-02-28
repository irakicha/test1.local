<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.02.18
 * Time: 20:55
 */

require_once (get_template_directory().'/modules/core/class-register-content-type.php');
require_once (get_template_directory().'/modules/core/class-register-taxonomy.php');
require_once (get_template_directory().'/modules/theme/class-publish-year-metabox.php');
require_once (get_template_directory().'/modules/theme/class-add-taxonomy-to-link.php');

class Content_Type_Book
{

    public function book_content_type_setup()
    {
        $args = array(
            'labels' => array(
                'parent_item_colon' => '',
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'taxonomies' => array('book-genres, book-authors'),
//            'rewrite' => array('slug' => 'books/%book-genre%/%books%', 'with_front' => false),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 2,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
        );

        return new Register_Content_Type('Books', 'Book', $args);
    }

    public function book_genre_taxonomy_setup(){

        $taxonomy_genre_args = array(
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
//            'rewrite' => array('slug' => 'books/%book-genre%', 'with_front' => false),
        );

        return new Register_Taxonomy( "Book Genres", "Book Genre", array('books') , $taxonomy_genre_args );
    }

    public function book_author_taxonomy_setup(){

        $taxonomy_authors_args = array(
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
//            'rewrite' => array('slug' => 'books/%book-genre%', 'with_front' => false),
        );

        return new Register_Taxonomy( "Book Authors", "Book Author", array('books') , $taxonomy_authors_args );
    }

    public function publish_year_metabox_setup(){
        return new Publish_Year_Metabox(array('books'));
    }

    public function add_taxonomy_to_link(){
        return new Add_Taxonomy_To_Link();
    }


}