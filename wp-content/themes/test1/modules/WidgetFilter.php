<?php

class WidgetFilter extends WP_Widget {

    function __construct() {

        parent::__construct(
            'my-filters',  // Base ID
            'My Filters'   // Name
        );

        add_action( 'widgets_init', function() {
            register_widget( 'WidgetFilter' );
        });

    }

    public $args = array(
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );

    public function widget( $args, $instance ) {

        if (is_post_type_archive('books') || is_tax('book-genre') || is_tax('book-author')){

        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        echo '<div class="text-widget">';

        echo '<p>Select Book Genre</p>';

        if( $terms = get_terms( 'book-genre', 'orderby=name' ) ) :
            foreach ($terms as $term) :
                echo '<a href="' . get_term_link( $term ) . '" class="book-filter">' . $term->name . '</a></br>';
            endforeach;

        endif;

        echo '</br>';

        echo '<p>Select Book Authors</p>';

        if( $terms = get_terms( 'book-author', 'orderby=name' ) ) :
            foreach ($terms as $term) :
                echo '<a href="' . get_term_link( $term ) . '" class="book-filter">' . $term->name . '</a></br>';
            endforeach;

        endif;


        echo '</div>';

        echo $args['after_widget'];

        }
    }

    public function form( $instance ) {

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php

    }

    public function update( $new_instance, $old_instance ) {

        $instance = array();

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

}
