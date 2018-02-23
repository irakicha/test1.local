<?php
/* Template Name:Page*/
get_header();
?>


    <div id="page" class="template-page container">
        <h1 class="page-header"><?php the_title(); ?></h1>

        <div class="row">
            <div id="left-side" class="col">

                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                else :
                    _e( 'Sorry, no pages matched your criteria.', 'test1' );
                endif;
                ?>

            </div>


        </div>

    </div>

<?php
get_footer();