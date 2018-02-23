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

            <h1 class="home-books-title">Latest books</h1>

            <?php
            $args = array(
                'post_type'   => 'books',
                'post_status' => 'publish',
                'posts_per_page'=>2,
//                'tax_query'   => array(
//                    array(
//                        'taxonomy' => 'book-genre',
//                        'field'    => 'slug',
//                        'terms'    => 'satire'
//                    )
//                )
            );

            $books = new WP_Query( $args );
            if( $books->have_posts() ) :
                ?>
                    <?php
                    while( $books->have_posts() ) :
                        $books->the_post();
                        ?>
                        <div class="row book-item">
                            <div class="col-3">
                                <a href="<?php echo get_permalink();?>">

                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail();
                                    }
                                ?>
                                </a>
                            </div>

                            <div class="col-9">
                                <h2>
                                    <a href="<?php echo get_permalink();?>"><?php echo get_the_title()?></a>
                                </h2>
                                <p><?php echo get_the_content() ?></p>
                                <?php

                                ?>
                            </div>

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