<?php
/**
 * Created by PhpStorm.
 * User: ira
 * Date: 27.02.18
 * Time: 23:12
 */

class Publish_Year_Metabox
{

    public $screens = array();

    public function __construct($screens)
    {
        $this->screens = $screens;

        add_action('add_meta_boxes', array($this, 'add_custom_box'));

        add_action('save_post', array($this, 'metabox_save_postdata'));
    }


    function add_custom_box()
    {
        $screens = $this->screens;

        foreach ($screens as $screen) {
            add_meta_box(
                'book-publish-year',
                'Book Publish Year',
                array($this, 'custom_box_html'),
                $screen
            );
        }
    }

    public function custom_box_html($post)
    {
        $value = get_post_meta($post->ID, 'book_year_meta_key', true);
        ?>
        <label for="book_year_metabox_field">Add publish year</label>
        <input type="number" name="book_year_metabox_field" id="book-publish-year" class="metabox"
               value="<?php echo $value; ?>" required>

        <?php
    }

    public function metabox_save_postdata($post_id)
    {
        if (array_key_exists('book_year_metabox_field', $_POST)) {
            update_post_meta(
                $post_id,
                'book_year_meta_key',
                $_POST['book_year_metabox_field']
            );
        }
    }
}