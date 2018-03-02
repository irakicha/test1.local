<?php
foreach ($images as $image) {
    $thumbnail = wp_get_attachment_image_src($image->ID, 'medium');
    $gallery .= "
			<div>
				<img src='" . $thumbnail[0] . "' width='" . $thumbnail[1] . "' height='" . $thumbnail[2] . "'>
				<span class='img-title'>" . $image->post_title . "</span>
			</div>";
}

$gallery = '<div class="owl-carousel owl-theme">' . $gallery . '</div>';

