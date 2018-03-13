<div id="gallery-<?php echo Test::$gallery_counter; ?>" class="owl-carousel owl-theme">
    <?php foreach ($images as $image) : ?>
        <?php echo wp_get_attachment_caption($image); ?>
        <div>
            <img title="<?php echo get_the_title($image); ?>"
                 src='<?php echo wp_get_attachment_image_url($image, $size); ?>'>
        </div>
    <?php endforeach; ?>

</div>
<script>
    $(function(){
        $("#gallery-<?php echo Test::$gallery_counter; ?>").owlCarousel({
            loop:<?php echo $atts['loop']; ?>,
            nav:<?php echo $atts['nav']; ?>,
            dots:<?php echo $atts['dots']; ?>,
            margin:<?php echo $atts['margin']; ?>,
            autoplay:<?php echo $atts['autoplay']; ?>,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:<?php echo $atts['columns']; ?>
                }
            }
        });
    });
</script>
