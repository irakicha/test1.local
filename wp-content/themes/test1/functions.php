
<?php
/**TwentyEighteen functions and definitions+**/

/*==Theme setup==*/

require_once ('modules/ThemeSetup.php');

$theme = new ThemeSetup();

/*==Create Custom Post Type Books==*/

require_once ('modules/Books.php');

Books::init();

/*==Create Custom Widget==*/

require_once('modules/WidgetFilter.php');

$filerWidget = new WidgetFilter();

/*==Create Shortcode==*/

require_once ('modules/BookContentShortcode.php');

$bookShortcode = new BookContentShortcode();













