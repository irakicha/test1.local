<?php if (isset($_POST['title'])) : ?>

<h1>Category: <?php echo implode(", ", $_POST['title']); ?></h1>

<?php endif; ?>

    <div class="row archive-books-row ajax">

    <?php

    if ($query->have_posts()) :
        ?>
        <?php
        while ($query->have_posts()) :
            $query->the_post();
            ?>
                <?php echo do_shortcode( '[book-content]' ); ?>
            
            <?php
        endwhile;
        wp_reset_postdata();
        ?>
        <?php
    else :
        esc_html_e('Sorry, no matches found, please try again', 'text-domain');
    endif;
    ?>

</div>


