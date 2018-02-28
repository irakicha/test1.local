<?php
/* Template Name:Single-book*/
get_header();
?>


    <div id="page" class="template-single-book container">


        <div class="row single-book-header">

            <div class="col-3">
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail();
                }
                ?>
            </div>
            <div class="col-9">

                <h1 class="post-header"><?php the_title(); ?></h1>

                <?php if(has_term('', 'book-genres', $post->ID)) : ?>

                    <p class="book-genre">Book Genre: <?php
                        $cur_terms = get_the_terms( $post->ID, "book-genres" );

                        foreach( $cur_terms as $cur_term ){
                            echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>';
                        }
                        ?>
                    </p>

                <?php endif; ?>

                <?php if(has_term('', 'book-authors', $post->ID)) : ?>

                <p class="book-author">Book Author: <?php
                    $cur_terms = get_the_terms( $post->ID, "book-authors" );

                    foreach( $cur_terms as $cur_term ){
                        echo '<a href="'. get_term_link( (int)$cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a>';
                    }
                    ?>
                </p>

                <?php endif; ?>


                <p class="publish-year">Publish Year: <?php echo get_post_meta(get_the_ID(), 'book_year_meta_key', true); ?></p>

            </div>
        </div>

        <div class="row single-book-description">

            <?php
            if (have_posts()) : while (have_posts()) : the_post();
                the_content();


            endwhile;
            else :
                _e('Sorry, no posts matched your criteria.', 'test1');
            endif;
            ?>

        </div>

    </div>






<?php
get_footer();