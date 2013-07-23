<?php
/**
 * Comments Evolved for WordPress -- Comments Container
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
echo "<!-- Comments Evolved for Wordpress v".COMMENTS_EVOLVED_VERSION." ( http://wordpress.org/plugins/gplus-comments/ ) -->\n";
echo "<!-- *******************************************************************************************************************-->\n";
echo "\n";

if (post_password_required()) {
  echo "<p class='nocomments'>This post is password protected.</p>";
  return;
}

$options = get_option("comments-evolved");
if(empty($options['tab_order'])) {
  $options['tab_order'] = COMMENTS_EVOLVED_DEFAULT_TAB_ORDER;
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
      if(empty($options['icon_theme']))
      {
        $options['icon_theme'] = 'default';
      }
      $active = ' class="active"';
      foreach ($tab_order as &$tab)
      {
        $tab = trim($tab);
        echo "<li ".$active."><a href='#".$tab."-tab'>";
        if(!$options['hide_icons'])
        {
          echo "<img src='".COMMENTS_EVOLVED_URL."/assets/images/icons/".$options['icon_theme']."/".$tab.".png'>";
        }
        echo $options[${tab}.'_label']."</a></li>\n";
        $active = '';
      }
    ?>
  </ul>


  <?php
  if(in_array('gplus', $tab_order))
  {
    require_once COMMENTS_EVOLVED_TEMPLATES . '/partials/gplus.php';
  }

  if(in_array('disqus', $tab_order) && !empty($options['disqus_shortname']))
  {
    require_once COMMENTS_EVOLVED_TEMPLATES . '/partials/disqus.php';
  }

  if(in_array('facebook', $tab_order))
  {
    require_once COMMENTS_EVOLVED_TEMPLATES . '/partials/facebook.php';
  }

  if(in_array('wordpress', $tab_order))
  {
    require_once COMMENTS_EVOLVED_TEMPLATES . '/partials/wordpress.php';
  }

  if(in_array('livefyre', $tab_order) && !empty($options['livefyre_siteid']))
  {
    require_once COMMENTS_EVOLVED_TEMPLATES . '/partials/livefyre.php';
  }

  if(in_array('trackback', $tab_order))
  {
    require_once COMMENTS_EVOLVED_TEMPLATES . '/partials/trackback.php';
  }

  if(in_array('tweetback', $tab_order))
  {
    require_once COMMENTS_EVOLVED_TEMPLATES . '/partials/tweetback.php';
  }
?>
</div> <!--//comment tabs -->
