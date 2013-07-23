<?php
/**
 * Google+ Comments for WordPress Comments Container Template
 *
 * @file           templates/comments-container.php
 * @package        gplus-comments
 * @author         Brandon Holtsclaw <me@brandonholtsclaw.com>
 * @copyright      2013 Brandon Holtsclaw
 * @license        GPLv3+
 */
// No direct access
defined('ABSPATH') or exit;

echo "\n\n<!-- ************************************************************************************************************************************************************************-->\n";
echo "<!-- Google+ Comments for Wordpress v".GPLUS_COMMENTS_VERSION." (http://wordpress.org/extend/plugins/gplus-comments/) by Brandon Holtsclaw (http://www.brandonholtsclaw.com) -->\n";
echo "<!-- ************************************************************************************************************************************************************************-->\n\n";

if (post_password_required()) {
  echo "<p class='nocomments'>This post is password protected.</p>";
  return;
}

$options = get_option("gplus-comments");
if(empty($options['tab_order'])) {
  $options['tab_order'] = GPLUS_COMMENTS_DEFAULT_TAB_ORDER;
}
?>
<div id="comment-tabs">
  <?php
    if(!empty($options['comment_area_label'])) {
      echo "<h4>".$options['comment_area_label']."</h4>";
    }
  ?>
  <ul class="controls inline clearfix">
    <?php
      $tab_order = explode(',',$options['tab_order']);
      $active = ' class="active"';
      foreach ($tab_order as $tab) {
        echo "<li${active}><a href='#${tab}-tab'>";
        if(!$options['hide_icons'])
        {
          echo "<img src='".GPLUS_COMMENTS_URL."/images/icons/${tab}.png'>";
        }
        echo $options[${tab}.'_label']."</a></li>\n";
        $active = '';
      }
    ?>
  </ul>

  <script type="text/javascript">
    jQuery(document).ready(function($) {
      window.comment_tab_width = $('#comment-tabs').innerWidth();
    });
  </script>
  <?php if(in_array('gplus', $tab_order)) : ?>
  <div id="gplus-tab" class="block content-tab clearfix">
    <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('#gplus-tab').html('<div class="g-comments" data-href="<?php echo the_permalink(); ?>" style="height: 300px;" data-width="'+window.comment_tab_width+'" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>');
    });
    </script>
    <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    <noscript>Please enable JavaScript to view the <a href="https://plus.google.com/">comments powered by Google+.</a></noscript>
  </div> <!--//gplus-tab -->
  <?php endif; ?>

  <?php if(in_array('disqus', $tab_order) && !empty($options['disqus_shortname'])) : ?>
  <div id="disqus-tab" class="block content-tab clearfix">
    <div id="disqus_thread">Loading Disqus Comments ...</div>
    <script type="text/javascript">
        var disqus_shortname = '<?php echo $options["disqus_shortname"]; ?>';
        (function(d) {
            var dsq = d.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (d.getElementsByTagName('head')[0] || d.getElementsByTagName('body')[0]).appendChild(dsq);
        })(document);
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
  </div> <!--//disqus-tab -->
  <?php endif; ?>

  <?php if(in_array('facebook', $tab_order)) : ?>
  <div id="facebook-tab" class="block content-tab clearfix">

  <div id="fb-root"></div>
  <div id="facebookcomments">Loading Facebook Comments ...</div>
  <script type="text/javascript" src="//connect.facebook.net/en_US/all.js#xfbml=1"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('#facebookcomments').html('<div class="fb-comments" data-width="'+window.comment_tab_width+'" data-href="<?php echo the_permalink(); ?>" data-num-posts="20" data-colorscheme="light" data-mobile="auto"></div>');
    });
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://www.facebook.com/">comments powered by Facebook.</a></noscript>
  </div> <!--//fb-tab -->
  <?php endif; ?>

  <?php if(in_array('wordpress', $tab_order)) : ?>
  <div id="wordpress-tab" class="block clearfix content-tab">
  <?php
  if (file_exists(TEMPLATEPATH . '/comments.php'))
  {
    include_once TEMPLATEPATH . '/comments.php';
  }
  elseif (file_exists(TEMPLATEPATH . '/includes/comments.php'))
  {
    include_once TEMPLATEPATH . '/includes/comments.php';
  }
  else
  {
    include_once GPLUS_COMMENTS_TEMPLATES . '/native-comments-fallback.php';
  }
  ?>
  </div> <!--//wp-tab -->
  <?php endif; ?>

  <?php if(in_array('trackback', $tab_order)) : ?>
  <div id="trackback-tab" class="block content-tab clearfix">
    <?php
    if (!empty($comments_by_type['pings'])) : // let's seperate pings/trackbacks from comments
      $count = count($comments_by_type['pings']); $txt = __('Pings&#47;Trackbacks');
    ?>
      <h6 id="pings"><?php printf( __( '%1$d %2$s for "%3$s"'), $count, $txt, get_the_title() )?></h6>
      <ol class="commentlist">
        <?php wp_list_comments('type=pings&max_depth=<em>'); ?>
      </ol>
    <?php else : ?>
      <p class="nopingback">No Trackbacks.</p>
    <?php endif; ?>
  </div> <!--//tb-tab -->
  <?php endif; ?>

</div> <!--//comment tabs -->
