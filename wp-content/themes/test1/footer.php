<?php
/*Page footer*/
?>
            </div> <!--#content-->

        </main> <!--.site-content-contain-->

        <footer id="footer" class="site-footer">

            <div class="container">
                <div class="row">
                    <div class="col-3 footer-column">

                        <h2 class="menu-header">Navigation</h2>

                        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>

                    </div>

                </div>

            </div>

        </footer>

    </div> <!--#page-->

    <?php wp_footer(); ?>

</body>

</html>