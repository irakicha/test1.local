<?php

/**
 * Created by PhpStorm.
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
            'include' => '', 'id' => $pid, 'itemtag' => 'dl',
            'icontag' => 'dt',
            'captiontag' => 'dd',
            'columns' => 3, 'size' => 'large',
            'link' => 'file'),
            $atts));

        $args = array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'post_mime_type' => 'image',
        );

        if (!empty($include)) {$args['include'] = $include;}
        else {
            $args['numberposts'] = -1;
        }

        if ($args['include'] == "") { $args['order'] = 'asc';}

        $images = get_posts($args);

        foreach ( $images as $image ) {
            //print_r($image); /*see availabl   e fields*/
            $thumbnail = wp_get_attachment_image_src($image->ID, 'large');
            $thumbnail = $thumbnail[0];
            $gallery .= "
            
			<figure>
				<img src='".$thumbnail."'>
				<figcaption>
					<div class='img-title'>".$image->post_title."</div>
					".$image->post_excerpt."
				</figcaption>
			</figure>";
        }

        $gallery= '<div class="slider">'.$gallery.'</div>';


        return $gallery;


    }

}