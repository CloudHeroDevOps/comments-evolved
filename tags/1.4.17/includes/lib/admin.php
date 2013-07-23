<?php
// No direct access
defined('ABSPATH') or exit;

?>
<div class="wrap">
  <div style="width: 50%;float: left;">
<h2>Google+ Comments <small>( v<?php echo GPLUS_COMMENTS_VERSION; ?> )</small></h2>
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
          <strong>Possible Values:</strong> gplus,facebook,livefyre,disqus,wordpress,trackback<br>
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
        <td>Livefyre SiteID:</td>
        <td><input type="text" name="gplus-comments[livefyre_siteid]" value="<?php echo $options['livefyre_siteid'];?>"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>
            <strong>Notes:</strong> Required if showing the Livefyre Tab
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr></td>
    </tr>
    <tr>
      <td>Icon Theme:</td>
      <td>
        <select name="gplus-comments[icon_theme]">
            <option selected="selected" value="default">Default</option>
            <option value="monotone">Monotone</option>
        </select>
      </td>
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
        <td>Livefyre Label:</td>
        <td><input type="text" name="gplus-comments[livefyre_label]" value="<?php echo $options['livefyre_label'];?>"></td>
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
  <div style="width: 50%; float: right;valign: top;">
    <h2>Google+ Comments for WordPress is 100% free without Ad's.</h2>
    <p>If you enjoy using this plugin consider a donation via <a href="https://www.wepay.com/donations/brandonholtsclaw">WePay</a> using the button below for any amount you see fit... thank you!</p>
    <a class="wepay-widget-button wepay-green" id="wepay_widget_anchor_51beee51397d5" href="https://www.wepay.com/donations/338811">Donate</a><script type="text/javascript">var WePay = WePay || {};WePay.load_widgets = WePay.load_widgets || function() { };WePay.widgets = WePay.widgets || [];WePay.widgets.push( {object_id: 338811,widget_type: "donation_campaign",anchor_id: "wepay_widget_anchor_51beee51397d5",widget_options: {donor_chooses: true,allow_cover_fee: true,enable_recurring: true,button_text: "Donate"}});if (!WePay.script) {WePay.script = document.createElement('script');WePay.script.type = 'text/javascript';WePay.script.async = true;WePay.script.src = 'https://static.wepay.com/min/js/widgets.v2.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(WePay.script, s);} else if (WePay.load_widgets) {WePay.load_widgets();}</script>
  </div>
</div>
