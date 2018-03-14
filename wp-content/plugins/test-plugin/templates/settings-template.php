// define your backbone template;
// the "tmpl-" prefix is required,
// and your input field should have a data-setting attribute
// matching the shortcode name

<script type="text/html" id="tmpl-my-custom-gallery-setting">
    <label class="setting">
        <span><?php _e('Loop (dafault: false)'); ?></span>
        <select data-setting="loop">
            <option value="true"> Yes </option>
            <option value="false"> No </option>
        </select>
    </label>
    <label class="setting">
        <span><?php _e('Navigation arrows (dafault: false)'); ?></span>
        <select data-setting="nav">
            <option value="true"> Yes </option>
            <option value="false"> No </option>
        </select>
    </label>
    <label class="setting">
        <span><?php _e('Dots (dafault: true)'); ?></span>
        <select data-setting="dots">
            <option value="true"> Yes </option>
            <option value="false"> No </option>
        </select>
    </label>
    <label class="setting">
        <span><?php _e('Margin (px) (dafault: 20px)'); ?></span>
        <select data-setting="margin">
            <option value="5"> 5 </option>
            <option value="10"> 10 </option>
            <option value="15"> 15 </option>
            <option value="20"> 20 </option>
        </select>
    </label>
    <label class="setting">
        <span><?php _e('Autoplay (dafault: false)'); ?></span>
        <select data-setting="autoplay">
            <option value="false"> No </option>
            <option value="true"> Yes </option>
        </select>
    </label>
</script>

<script>

    jQuery(document).ready(function(){

        // add your shortcode attribute and its default value to the
        // gallery settings list; $.extend should work as well...
        _.extend(wp.media.gallery.defaults, {
            type: 'default_val'
        });

        // merge default gallery settings template with yours
        wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend({
            template: function(view){
                return wp.media.template('gallery-settings')(view)
                    + wp.media.template('my-custom-gallery-setting')(view);
            }
        });

    });

</script>