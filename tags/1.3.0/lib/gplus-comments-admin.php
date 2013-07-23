<?php
// No direct access
defined('ABSPATH') or exit;
?>
<div class="wrap">
<h2>Google+ Comments for WordPress ( v<?php echo GPLUS_COMMENTS_VERSION; ?> )</h2>
<form method="POST"  action="options.php">
<?php settings_fields( 'gplus-comments-options' ); ?>
<?php $options = get_option( 'gplus-comments' ); ?>
<table>
    <tr>
        <td>Show Facebook Tab:</td>
        <td><input type="checkbox" name="gplus-comments[show_fb]" value="1" <?php checked( '1', $options['show_fb']);?>></td>
    </tr>
    <tr>
        <td>Show WordPress Tab:</td>
        <td><input type="checkbox" name="gplus-comments[show_wp]" value="1" <?php checked( '1', $options['show_wp']);?>></td>
    </tr>
    <tr>
        <td>Show Disqus Tab:</td>
        <td><input type="checkbox" name="gplus-comments[show_disqus]" value="1" <?php checked( '1', $options['show_disqus']);?>></td>
    </tr>
    <tr>
        <td>Disqus Shortname:</td>
        <td><input type="text" name="gplus-comments[disqus_shortname]" value="<?php echo $options['disqus_shortname'];?>"> ( Required if Showing Disqus Tab )</td>
    </tr>
    <tr>
        <td>Show Trackbacks Tab:</td>
        <td><input type="checkbox" name="gplus-comments[show_trackbacks]" value="1" <?php checked( '1', $options['show_trackbacks']);?>></td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
    <tr>
        <td>Comment Area Label:</td>
        <td><input type="text" name="gplus-comments[comment_area_label]" value="<?php echo $options['comment_area_label'];?>"></td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
    <tr>
        <td>G+ Label:</td>
        <td><input type="text" name="gplus-comments[gplus_label]" value="<?php echo $options['gplus_label'];?>"></td>
    </tr>
    <tr>
        <td>Facebook Label:</td>
        <td><input type="text" name="gplus-comments[fb_label]" value="<?php echo $options['fb_label'];?>"></td>
    </tr>
    <tr>
        <td>Disqus Label:</td>
        <td><input type="text" name="gplus-comments[disqus_label]" value="<?php echo $options['disqus_label'];?>"></td>
    </tr>
    <tr>
        <td>WordPress Label:</td>
        <td><input type="text" name="gplus-comments[wp_label]" value="<?php echo $options['wp_label'];?>"></td>
    </tr>
    <tr>
        <td>Trackbacks Label:</td>
        <td><input type="text" name="gplus-comments[tb_label]" value="<?php echo $options['tb_label'];?>"></td>
    </tr>
</table>
    <?php submit_button(); ?>
</form>
</div>
