<?php

class Widget_Books_Filter extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'my-filters',
            'My Filters'
        );

        add_action('widgets_init', function () {
            register_widget(__CLASS__);
        });

        add_action('wp_ajax_getCat', array($this, 'ajax_showCat'));
        add_action('wp_ajax_nopriv_getCat', array($this, 'ajax_showCat'));

    }


    function ajax_showCat()
    {

//        print_r($_POST);

        $book_genres = [];
        $book_authors = [];


        if (!empty($_POST['allTax'])) {

        $terms = $_POST['allTax'] ? wp_kses_post($_POST['allTax']) : false;

        foreach ($terms as $term) {

            $term = explode('|', $term);
            $tax_name = $term[0];
            $term_name = $term[1];
            if ($tax_name == "book-genres") {
                array_push($book_genres, $term_name);
            } elseif ($tax_name == "book-authors") {
                array_push($book_authors, $term_name);
            }
        }


            if (count($book_authors) == 0 || count($book_genres) == 0) {
                $relation = 'OR';
            } else {
                $relation = 'AND';
            }

            $args = array(
                'post_type' => 'books',
                'tax_query' => array(
                    'relation' => $relation,
                    array(
                        'taxonomy' => 'book-genres',
                        'field' => 'slug',
                        'terms' => $book_genres,
                    ),
                    array(
                        'taxonomy' => 'book-authors',
                        'field' => 'slug',
                        'terms' => $book_authors,
                    ),

                )

            );

            if (!empty($_POST['minYear']) || !empty($_POST['maxYear'])) {

                $min_year = $_POST['minYear'] ? wp_kses_post($_POST['minYear']) : '0000';
                $max_year = $_POST['maxYear'] ? wp_kses_post($_POST['maxYear']) : date('Y');


                $args_2 = array(
                    'post_type' => 'books',
                    'meta_query' => array(
                        array(
                            'key' => 'book_year_meta_key',
                            'value' => array($min_year, $max_year),
                            'compare' => 'BETWEEN',
                        ),
                    )
                );

                $args = array_merge($args,$args_2);

            }


            $query = new WP_Query($args);

            if ($query) {
                require(get_template_directory() . '/template-parts/books.php');
                die();
            }


        }


    }

    public $args = array(
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget' => '</div></div>'
    );

    public function widget($args, $instance)
    {

        if (is_post_type_archive('books') || is_tax('book-genres') || is_tax('book-authors')) {

            echo $args['before_widget'];

            if (!empty($instance['title'])) {
                echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
            }

            echo '<div class="text-widget">';

            echo '<form id="filter-form">';

            echo '<p>Select Book Genre</p>';

            if ($terms = get_terms('book-genres')) :
                foreach ($terms as $term) { ?>
                    <p>
                        <input type="checkbox" class="book-filter" id="<?= $term->slug ?>"
                               value="<?php echo $term->term_id; ?>">
                        <label class="book-filter-label" for="<?php echo $term->slug ?>"
                               data-taxonomy="<?php echo $term->taxonomy ?>"><?= $term->name; ?></label>
                    </p>
                <?php }

            endif;

            echo '</br>';

            echo '<p>Select Book Authors</p>';

            if ($terms = get_terms('book-authors', 'orderby=name')) :
                foreach ($terms as $term) { ?>
                    <p>
                        <input type="checkbox" class="book-filter" id="<?php echo $term->slug ?>"
                               value="<?php echo $term->term_id; ?>">
                        <label class="book-filter-label" for="<?php echo $term->slug ?>"
                               data-taxonomy="<?php echo $term->taxonomy ?>"><?php echo $term->name; ?></label>
                    </p>
                <?php }

            endif;

            echo '<p>Select Publish Year</p>';

            if ($meta = get_post_meta(get_the_ID(), 'book_year_meta_key', true)) {
                ?>

                <input type="number" value='<?php if (isset($_POST['minYear'])) {
                    echo $_POST['minYear'];
                } ?>' name="min_year" placeholder="Min" class="book-filter min-year"/>
                <input type="number" value='<?php if (isset($_POST['maxYear'])) {
                    echo $_POST['maxYear'];
                } ?>' name="max_year" placeholder="Max" class="book-filter max-year"/>

                <?php
            }

            echo '</form>';

            echo '</div>';

            echo $args['after_widget'];

        }
    }

    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('', 'text_domain');
        ?>
        <p>
            <label
                    for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'text_domain'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <?php

    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}
