<?php
/* Template Name:index*/

get_header();

?>

    <div id="main" class="template-index container">

        <div class="row">

            <div id="left-side" class="col-9">

                <?php if (have_posts()) : ?>

                    <?php

                    while (have_posts()) : the_post(); ?>

                        <h2>
                            <a href='<?php echo get_permalink(); ?>'><?php echo the_title(); ?></a>
                        </h2>

                    <?php endwhile;


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

                <?php endif; ?>


            </div>
        </div>

    </div>

<?php

get_footer();
