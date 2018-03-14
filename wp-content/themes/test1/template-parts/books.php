<?php if (isset($_POST['title'])) : ?>

<h1>Category: <?php echo implode(", ", $_POST['title']); ?></h1>

<?php endif; ?>

    <div class="row archive-books-row ajax">

    <?php

    if (isset($query)){
        if ($query->have_posts()) {

            while ($query->have_posts()) {
                $query->the_post();

                echo do_shortcode( '[book-content]' );
            }
        }
    } else {
        esc_html_e('Sorry, no matches found, please try again', 'text-domain');
    }

    wp_reset_postdata();

    ?>

</div>


