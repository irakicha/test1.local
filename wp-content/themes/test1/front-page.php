<?php
/* Template Name:Front-page*/
get_header();

?>


    <div id="home" class="template-home">

        <section id="promo-block" class="promo">

            <div class="container">

                <div class="row">

                    <?php
                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                        wp_reset_postdata();
                    else :
                        _e( 'Sorry, no pages matched your criteria.', 'test1' );
                    endif;
                    ?>

                </div>


            </div>

        </section>

        <section class="books container">

            <?php
            $args = array(
                'post_type'   => 'books',
                'post_status' => 'publish'
            );

            $books = new WP_Query( $args );
            if( $books->have_posts() ) :
                ?>
                    <?php
                    while( $books->have_posts() ) :
                        $books->the_post();
                        ?>
                        <div class="book-item">
                            <h2><?php echo get_the_title()?></h2>
                            <p><?php echo get_the_content() ?></p>
                            <?php

                            ?>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                <?php
            else :
                esc_html_e( 'No testimonials in the diving taxonomy!', 'text-domain' );
            endif;
            ?>

        </section>


    </div>


<?php
get_footer();