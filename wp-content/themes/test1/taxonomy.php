<?php
/* Template Name:archive-books*/

get_header();

?>

    <div id="main" class="template-archive taxonomy container">

        <?php if (have_posts()) : ?>


        <div class="row">

            <div id="left-side" class="col-10">

                <div class="row archive-books-row">

                    <?php
                    while (have_posts()) : the_post(); ?>

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

                    <?php endwhile; ?>

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

        </div>


    <?php endif; ?>

    </div>

<?php

get_footer();