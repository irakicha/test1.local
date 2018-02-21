
<?php
/* Template Name:Single*/
get_header();
?>



<div id="page" class="template-single container">

    <h1 class="post-header"><?php the_title(); ?></h1>

    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content();
    endwhile;
    else :
        _e( 'Sorry, no posts matched your criteria.', 'test1' );
    endif;
    ?>

</div>

<?php
get_footer();