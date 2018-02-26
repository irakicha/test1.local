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
        esc_html_e('No taxonomy!', 'text-domain');
    endif;
    ?>

</div>


