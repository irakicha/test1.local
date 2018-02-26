

    <div class="row archive-books-row ajax">



<?php
if( $query->have_posts() ) :
    ?>
    <?php
    while( $query->have_posts() ) :
        $query->the_post();
        ?>
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
    endwhile;
    wp_reset_postdata();
    ?>
    <?php
else :
    esc_html_e( 'No taxonomy!', 'text-domain' );
endif;
?>

    </div>


