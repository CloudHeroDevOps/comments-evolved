<?php
/**
 * Google+ Comments for WordPress -- Comments Container
 *
 * @file           templates/container.php
 * @package        gplus-comments
 * @author         Brandon Holtsclaw <me@brandonholtsclaw.com>
 * @copyright      2013 Brandon Holtsclaw
 * @license        GPL
 */
// No direct access
defined('ABSPATH') or exit;

echo "\n\n";
echo "<!-- *******************************************************************************************************************-->\n";
echo "<!-- Google+ Comments for Wordpress v".GPLUS_COMMENTS_VERSION." ( http://wordpress.org/extend/plugins/gplus-comments/ ) -->\n";
echo "<!-- *******************************************************************************************************************-->\n";
echo "\n";

if (post_password_required()) {
  echo "<p class='nocomments'>This post is password protected.</p>";
  return;
}

$options = get_option("gplus-comments");
if(empty($options['tab_order'])) {
  $options['tab_order'] = GPLUS_COMMENTS_DEFAULT_TAB_ORDER;
}
?>

<script type="text/javascript">
jQuery(document).ready(function($) {
  window.comment_tab_width = $('#comment-tabs').innerWidth();
});
</script>

<div id="comment-tabs">
  <?php
    if(!empty($options['comment_area_label'])) {
      echo "<h4>".$options['comment_area_label']."</h4>";
    }
  ?>
  <ul class="controls inline clearfix">
    <?php
      $tab_order = explode(',',$options['tab_order']);
      $iconset = 'monotone';
      $active = ' class="active"';
      foreach ($tab_order as $tab) {
        echo "<li${active}><a href='#${tab}-tab'>";
        if(!$options['hide_icons'])
        {
          echo "<img src='".GPLUS_COMMENTS_URL."/images/icons/monotone/${tab}.png'>";
        }
        echo $options[${tab}.'_label']."</a></li>\n";
        $active = '';
      }
    ?>
  </ul>


  <?php
  if(in_array('gplus', $tab_order))
  {
    require_once GPLUS_COMMENTS_TEMPLATES . '/partials/gplus.php';
  }

  if(in_array('disqus', $tab_order) && !empty($options['disqus_shortname']))
  {
    require_once GPLUS_COMMENTS_TEMPLATES . '/partials/disqus.php';
  }

  if(in_array('facebook', $tab_order))
  {
    require_once GPLUS_COMMENTS_TEMPLATES . '/partials/facebook.php';
  }

  if(in_array('wordpress', $tab_order))
  {
    require_once GPLUS_COMMENTS_TEMPLATES . '/partials/wordpress.php';
  }

  if(in_array('livefyre', $tab_order) && !empty($options['livefyre_siteid']))
  {
    require_once GPLUS_COMMENTS_TEMPLATES . '/partials/livefyre.php';
  }

  if(in_array('trackback', $tab_order))
  {
    require_once GPLUS_COMMENTS_TEMPLATES . '/partials/trackback.php';
  }
  ?>

</div> <!--//comment tabs -->
