<?php
/* Template Name:arhive*/

get_header();

?>

    <div id="main" class="template-archive container">

        <h1><?php post_type_archive_title(); ?></h1>

        <?php if ( have_posts() ) : ?>

            <?php

            while ( have_posts() ) : the_post(); ?>

                <h2>
                    <a href='<?php echo get_permalink(); ?>'><?php echo the_title(); ?></a>
                </h2>
                <p><?php echo the_excerpt(); ?></p>

            <?php endwhile;


        else :

            echo 'you have no posts';

        endif;
        ?>

    </div>

<?php

get_footer();