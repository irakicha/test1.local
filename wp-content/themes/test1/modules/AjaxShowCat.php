<?php
//
//class AjaxShowCat
//{
//
//    public function __construct()
//    {
//        add_action('wp_ajax_getCat', array(get_called_class(),'ajax_showCat'));
//        add_action('wp_ajax_nopriv_getCat',  array(get_called_class(), 'ajax_showCat'));
//    }
//
//    public function ajax_showCat(){
//
//        $link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;
//        $slug = $link ? wp_basename($link) : false;
//
//        $args = array(
//            'orderby' => 'date',
//            'tax_query'   => array(
//                'relation' => 'OR',
//                array(
//                    'taxonomy' => 'book-author',
//                    'field'    => 'slug',
//                    'terms'    => $slug
//                ),
//                array(
//                    'taxonomy' => 'book-genre',
//                    'field'    => 'slug',
//                    'terms'    => $slug
//                )
//            )
//        );
//
//        $query = new WP_Query( $args );
//
//        require ('../template-parts/books.php');
//
//        die();
//
//    }
//
//}