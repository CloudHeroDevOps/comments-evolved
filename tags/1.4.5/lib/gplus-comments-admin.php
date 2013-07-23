<?php
// No direct access
defined('ABSPATH') or exit;
?>
<div class="wrap">
<h2>Google+ Comments for WordPress ( v<?php echo GPLUS_COMMENTS_VERSION; ?> )</h2>
<form method="POST"  action="options.php">
<?php settings_fields( 'gplus-comments-options' ); ?>
<?php $options = get_option( 'gplus-comments' ); ?>
<?php
if(empty($options['tab_order']))
{
  $options['tab_order'] = GPLUS_COMMENTS_DEFAULT_TAB_ORDER;
}
?>
<table>
    <tr>
        <td>Tab Order:</td>
        <td><input type="text" name="gplus-comments[tab_order]" value="<?php echo $options['tab_order'];?>"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
          <strong>Notes:</strong> Comma Separated List, First listed is the default, <br>
          &nbsp;&nbsp;&nbsp;&nbsp;If left empty it will use default value below, tabs not listed will be hidden.<br>
          <strong>Possible Values:</strong> gplus,facebook,disqus,wordpress,trackback<br>
          <strong>Default Value:</strong> <?php echo GPLUS_COMMENTS_DEFAULT_TAB_ORDER; ?><br>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
    <tr>
        <td>Disqus Shortname:</td>
        <td><input type="text" name="gplus-comments[disqus_shortname]" value="<?php echo $options['disqus_shortname'];?>"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <strong>Notes:</strong> Required if showing the Disqus Tab
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
    <tr>
        <td>Hide Icons:</td>
        <td><input type="checkbox" name="gplus-comments[hide_icons]" value="1" <?php checked( '1', $options['hide_icons']);?>></td>
    </tr>
    <tr>
        <td>Comment Area Label:</td>
        <td><input type="text" name="gplus-comments[comment_area_label]" value="<?php echo $options['comment_area_label'];?>"></td>
    </tr>
    <tr>
        <td>G+ Label:</td>
        <td><input type="text" name="gplus-comments[gplus_label]" value="<?php echo $options['gplus_label'];?>"></td>
    </tr>
    <tr>
        <td>Facebook Label:</td>
        <td><input type="text" name="gplus-comments[facebook_label]" value="<?php echo $options['facebook_label'];?>"></td>
    </tr>
    <tr>
        <td>Disqus Label:</td>
        <td><input type="text" name="gplus-comments[disqus_label]" value="<?php echo $options['disqus_label'];?>"></td>
    </tr>
    <tr>
        <td>WordPress Label:</td>
        <td><input type="text" name="gplus-comments[wordpress_label]" value="<?php echo $options['wordpress_label'];?>"></td>
    </tr>
    <tr>
        <td>Trackbacks Label:</td>
        <td><input type="text" name="gplus-comments[trackback_label]" value="<?php echo $options['trackback_label'];?>"></td>
    </tr>
</table>
    <?php submit_button(); ?>
</form>
</div>
