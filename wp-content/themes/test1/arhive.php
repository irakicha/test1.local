<?php
/* Template Name:arhive*/

get_header();

?>

    <div id="main" class="arhivee-index container">

        <h1 class="page-header"><?php the_title(); ?></h1>

        <?php

        if ( have_posts() ){
            while ( have_posts() ){

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