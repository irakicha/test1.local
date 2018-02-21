<?php
/* Template Name:Page*/
get_header();
?>


    <div id="page" class="template-page container">
        <h1 class="page-header"><?php the_title(); ?></h1>

        <div class="row">
            <div id="left-side" class="col-8">

                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
                else :
                    _e( 'Sorry, no pages matched your criteria.', 'test1' );
                endif;
                ?>

            </div>

            <div id="right-side" class="col-4">

                <?php if ( is_active_sidebar( 'true_side' ) ) : ?>

                    <div id="true-side" class="sidebar">

                        <?php dynamic_sidebar( 'true_side' ); ?>

                    </div>

                <?php endif; ?>


            </div>
        </div>

    </div>

<?php
get_footer();