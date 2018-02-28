<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.02.18
 * Time: 13:17
 */

require_once (get_template_directory().'/modules/theme/class-content-type-book.php');
require_once (get_template_directory().'/modules/theme/class-test1-theme-settings.php');
require_once (get_template_directory().'/modules/theme/class-widget-book-filter.php');
require_once (get_template_directory().'/modules/theme/class-book-content-shortcode.php');

class Test1_Theme_Setup
{
    public function __construct(){

        /*==Setup Theme1 Settings==*/

        $test1_theme = new Test1_Theme_Settings();


        /*==Create Custom Post Type Books==*/

        $book = new Content_Type_Book();

        /*Add Book Post Type*/

        $book->book_content_type_setup();

        /*Add Book Genre Taxonomy*/

        $book->book_genre_taxonomy_setup();

        /*Add Book Author Taxonomy*/

        $book->book_author_taxonomy_setup();

        /*Add Publish Year Metabox*/

        $book->publish_year_metabox_setup();

        /*Add Taxonomy To Books URI*/

        $book->add_taxonomy_to_link();


        /*==Create Books Widget Filters==*/

        $book_filter = new Widget_Books_Filter();


        /*==Create Books Widget Filters==*/

        $book_shortcode = new Books_Content_Shortcode();

    }

}