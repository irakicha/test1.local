<?php
/* Template Name:index*/

get_header();

?>

    <div id="main" class="template-index container">

        <h1 class="page-header"><?php the_title(); ?></h1>

        <?php

        if ( have_posts() ){
            while ( have_posts() ){

                echo '<h3><a href="'. get_permalink() .'">'. get_the_title() .'</a></h3>';

                the_post();

            }
        }

        else{
            echo ' <p>You have no posts...</p>';
        }
        ?>

    </div>

<?php

get_footer();
