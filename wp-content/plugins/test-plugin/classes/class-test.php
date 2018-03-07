<?php

/**
 * User: phpstudent
 * Date: 28.02.18
 * Time: 16:49
 */
class Test
{
    public function __construct()
    {
        remove_shortcode('gallery');
        add_shortcode('gallery', array($this, 'test_gallery_shortcode'));
    }

    public function test_gallery_shortcode($atts){

        global $post;
        $pid = $post->ID;
        $gallery = "";

        if (empty($pid)) {$pid = $post['ID'];}

        if (!empty( $atts['ids'] ) ) {
            $atts['include'] = $atts['ids'];
        }

        extract(shortcode_atts(array(
            'include' => '',
            'id' => $pid,
            ),
            $atts));

        $args = array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'post_mime_type' => 'image',
        );

        $images = get_posts($args);

        ob_start();

        require_once(TEST_PLUGIN_DIR."/templates/image-template.php");

        $test_content=ob_get_contents();

        ob_end_clean();

        return $test_content;
        

    }

}