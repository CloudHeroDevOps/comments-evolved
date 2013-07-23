<?php
/**
 * Google+ Comments for WordPress Comments Container Template
 *
 * @file           comments-container.php
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

  <script>
    jQuery(document).ready(function($) {
      window.comment_tab_width = $('#comment-tabs').innerWidth();
    });
  </script>
  <?php if(in_array('gplus', $tab_order)) : ?>
  <div id="gplus-tab" class="block content-tab clearfix">
    <script>
      jQuery(document).ready(function($) {
        $('#gplus-tab').html('<div class="g-comments" data-href="<?php echo the_permalink(); ?>" data-width="'+window.comment_tab_width+'" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>');
      });
    </script>
    <script type="text/javascript">
      window.___gcfg = {lang: 'en'};
      (function(d) {
        var po = d.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = '//apis.google.com/js/plusone.js';
        (d.getElementsByTagName('head')[0] || d.getElementsByTagName('body')[0]).appendChild(po);
      })(document);
    </script>
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
  </div> <!--//disqus-tab -->
  <?php endif; ?>

  <?php if(in_array('facebook', $tab_order)) : ?>
  <div id="facebook-tab" class="block content-tab clearfix">

  <div id="facebookcomments">Loading Facebook Comments ...</div>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    var fbc = document.getElementById('facebookcomments');
    jQuery(document).ready(function() {
      fbc.innerHTML = '<div class="fb-comments" data-width="'+window.comment_tab_width+'" data-href="<?php echo the_permalink(); ?>" data-num-posts="20" data-colorscheme="light" data-mobile="auto"></div>';
      FB.XFBML.parse(fbc);
    });
  </script>
  </div> <!--//fb-tab -->
  <?php endif; ?>

  <?php if(in_array('wordpress', $tab_order)) : ?>
  <div id="wordpress-tab" class="block clearfix content-tab">
  <?php
  if (file_exists(TEMPLATEPATH . '/comments.php'))
  {
    include_once TEMPLATEPATH . '/comments.php';
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
