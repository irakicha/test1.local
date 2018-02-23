<?php

/*Page header*/

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>

    <div id="page" class="page-container">

        <header id="header" class="main-header">

            <div class="container">

                <div class="row">

                    <div class="col-4 logo">
                        <?php

                        if( has_custom_logo() ){

                            the_custom_logo();

                        }

                        echo get_bloginfo( 'name');

                        ?>

                    </div>

                    <div class="col-8">

                        <nav id="menu" class="main-menu">

                            <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

                        </nav>
                    </div>
                </div>

            </div>

        </header>

        <main class="site-content">

            <div id="content" class="site-content">