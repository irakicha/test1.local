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

        add_action('wp_ajax_getCat', array(get_called_class(), 'ajax_showCat'));
        add_action('wp_ajax_nopriv_getCat', array(get_called_class(), 'ajax_showCat'));

    }


    function ajax_showCat()
    {

        print_r($_POST);


        $terms = $_POST['allTax'];

        if (count($terms) < 2) {

            $link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;

            $slug = $link ? wp_basename($link) : false;

            $args = array(
                'orderby' => 'date',
                'tax_query' => array(
                    'relation' => 'OR',
                    array(
                        'taxonomy' => 'book-genres',
                        'field' => 'slug',
                        'terms' => $terms
                    ),
                    array(
                        'taxonomy' => 'book-authors',
                        'field' => 'slug',
                        'terms' => $terms
                    )
                )
            );

            $query = new WP_Query($args);


        } else {

            $args = array(
                'orderby' => 'date',
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'book-genres',
                        'field' => 'slug',
                        'terms' => $terms,
                    ),
//                    array(
//                        'taxonomy' => 'book-authors',
//                        'field'    => 'slug',
//                        'terms'    => array( $terms),
//                        'operator' => 'NOT IN',
//                    )
                )
            );

            $query = new WP_Query($args);

        }
        require(get_template_directory() . '/template-parts/books.php');


        die();


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

            echo '<p>Select Book Genre</p>';

            if ($terms = get_terms('book-genres', 'orderby=name')) :
                foreach ($terms as $term) { ?>
                    <p>
                        <input type="checkbox" class="book-filter" id="<?= $term->slug ?>"
                               value="<?= $term->term_id; ?>">
                        <label class="book-filter-label" for="<?= $term->slug ?>"><?= $term->name; ?></label>
                    </p>
                <?php }

            endif;

            echo '</br>';

            echo '<p>Select Book Authors</p>';

            if ($terms = get_terms('book-authors', 'orderby=name')) :
                foreach ($terms as $term) { ?>
                    <p>
                        <input type="checkbox" class="book-filter" id="<?= $term->slug ?>"
                               value="<?= $term->term_id; ?>">
                        <label class="book-filter-label" for="<?= $term->slug ?>"><?= $term->name; ?></label>
                    </p>
                <?php }

            endif;

            if ($meta = get_post_meta(get_the_ID(), 'book_year_meta_key', true)) {
                ?>

                <input type="text" name="max_year" placeholder="Max Year"/>
                <input type="text" name="min_year" placeholder="Min Year"/>

                <?php
            }

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
