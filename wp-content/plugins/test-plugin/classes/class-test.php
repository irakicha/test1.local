<?php

class Test
{
    static $gallery_counter = 1;

    public function __construct()
    {
        remove_shortcode('gallery');
        add_shortcode('gallery', array($this, 'test_gallery_shortcode'));
        add_action('print_media_templates',array($this,'gallery_settings'));

    }

    public function test_gallery_shortcode($atts){

        $atts = shortcode_atts(array(
                'size' =>'thumbnail',
                'ids' => '',
                'columns' => 3,
                'loop' => 'true',
                'nav' => 'false',
                'dots' => 'true',
                'margin' => 20,
                'autoplay' => 'false'

        ), $atts, 'gallery');

        $images = explode(',', $atts['ids']);

        $size = $atts['size'];

        ob_start();

        require(TEST_PLUGIN_DIR."/templates/image-template.php");

        $test_content=ob_get_contents();

        ob_end_clean();

        self::$gallery_counter++;

        return $test_content;

    }

    public function gallery_settings(){

        require(TEST_PLUGIN_DIR."/templates/settings-template.php");
    }

}