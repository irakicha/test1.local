<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.02.18
 * Time: 23:25
 */

class Add_Taxonomy_To_Link
{
    public function __construct()
    {
        add_action( 'wp_loaded', array($this, 'add_books_permastructure' ));

        add_filter( 'post_type_link', array($this, 'books_permalinks'), 10, 2);
    }

    /* Add our custom permastructures for custom taxonomy and post */

    function add_books_permastructure() {
        add_permastruct( 'book-genres', 'books/%book-genres%', false );
        add_permastruct( 'books', 'books/%book-genres%/%books%', false );
    }


    /*Replace post type to taxonomy in URI*/

    function books_permalinks( $permalink, $post ) {
        if ( $post->post_type !== 'books' ) {
            return $permalink;
        }

        $terms = get_the_terms( $post->ID, 'book-genres' );

        if ( ! $terms ) {
            return str_replace( '%book-genres%/', '', $permalink );
        }
        $post_terms = array();
        foreach ( $terms as $term )
            $post_terms[] = $term->slug;
        return str_replace( '%book-genres%', implode( ',', $post_terms ) , $permalink );
    }
}