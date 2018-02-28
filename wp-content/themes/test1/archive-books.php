<?php
/* Template Name:archive-books*/

get_header();

?>

    <div id="main" class="template-archive-books container">

        <div class="row">

            <?php if (have_posts()) : ?>

            <div id="left-side" class="col-10">

                <h1><?php post_type_archive_title(); ?></h1>

                <div class="row archive-books-row">

                    <?php

                    while (have_posts()) : the_post(); ?>

                        <?php echo do_shortcode('[book-content]'); ?>

                        <?php

                    endwhile; ?>

                    <?php wp_reset_postdata(); ?>
                </div>
                <?php

                else :

                    echo 'you have no posts';

                endif;
                ?>

            </div>

            <div id="right-side" class="col-2">

                <?php if (is_active_sidebar('true_side')) : ?>

                <div id="true-side" class="sidebar">

                    <?php dynamic_sidebar('true_side'); ?>

                </div>

            </div>

        <?php endif; ?>

        </div>

    </div>


<?php

get_footer();