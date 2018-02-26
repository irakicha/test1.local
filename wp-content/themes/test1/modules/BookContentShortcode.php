<?php

class BookContentShortcode
{
    public function __construct()
    {
        add_shortcode('book-content', array(get_called_class(), 'createShortCode'));
    }

    public function createShortCode()
    {
        ob_start(); ?>

        <div class="col-4 archive-books-item">

            <div class="archive-books-container">

                <div class="archive-books-thumbnail">
                    <a href='<?php echo get_permalink(); ?>'><?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail();
                        }
                        ?>
                    </a>
                </div>
                <div class="">
                    <h2>
                        <a href='<?php echo get_permalink(); ?>'><?php echo the_title(); ?></a>
                        <p><?php echo the_excerpt(); ?></p>
                    </h2>
                </div>

            </div>
        </div>
        <?php
        $data = ob_get_contents();
        ob_end_clean();
        return $data;

    }
}