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

echo "\n\n<!-- ****************************************************************************************************************************************-->\n";
echo "<!-- Google+ Comments for Wordpress (http://wordpress.org/extend/plugins/gplus-comments/) by Brandon Holtsclaw (http://www.brandonholtsclaw.com) -->\n";
echo "<!-- ****************************************************************************************************************************************-->\n\n";

if (post_password_required()) {
  echo "<p class='nocomments'>This post is password protected.</p>";
  return;
}

$options = get_option("gplus-comments");

if(GPLUS_COMMENTS_DEBUG){
  echo "\n<!--\n";
  echo "DEBUG: " . print_r(GPLUS_COMMENTS_DEBUG,true) . "\n";
  echo "VERSION: " . print_r(GPLUS_COMMENTS_VERSION,true) . "\n";
  echo "DIR: " . print_r(GPLUS_COMMENTS_DIR,true) . "\n";
  echo "URL: " . print_r(GPLUS_COMMENTS_URL,true) . "\n";
  echo "-->\n\n";
}
?>
<div id="comment-tabs">

  <ul class="controls inline clearfix">
    <li class="active"><a href="#gplus-tab"><i class="icon-googleplus"></i><?php echo $options['gplus_title'];?></a></li>
    <?php
    if($options['show_fb']) { echo "<li><a href='#fb-tab'><i class='icon-facebook'></i>".$options['fb_title']."</a></li>\n"; }
    if($options['show_disqus']) { echo "<li><a href='#disqus-tab'><i class='icon-comment-alt'></i>".$options['disqus_title']."</a></li>\n"; }
    if($options['show_wp']) { echo "<li><a href='#wp-tab'><i class='icon-wordpress'></i>".$options['wp_title']."</a></li>\n"; }
    if($options['show_trackbacks']) { echo "<li><a href='#tb-tab'><i class='icon-share-alt'></i>".$options['tb_title']."</a></li>\n"; }
    ?>
  </ul>

  <div id="gplus-tab" class="block active content-tab">
    <script> var gpluswidth = jQuery('#gplus-tab').innerWidth(); document.write('<g:comments href="<?php echo the_permalink(); ?>" width="'+ ( gpluswidth - 2 )+'" first_party_property="BLOGGER" view_type="FILTERED_POSTMOD"></g:comments>');</script>
  </div> <!--//gplus-tab -->

  <?php if($options['show_disqus'] && !empty($options['disqus_shortname'])) : ?>
  <div id="disqus-tab" class="block content-tab">
    <div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = '<?php echo $options["disqus_shortname"]; ?>';
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
  </div> <!--//disqus-tab -->
  <?php endif; ?>

  <?php if($options['show_fb']) : ?>
  <div id="fb-tab" class="block content-tab">

  <div id="facebookcomments"></div>
  <script>
    //facebook comments
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    var fbc = document.getElementById('facebookcomments');
    jQuery(document).ready(function() {
      var fbwidth = jQuery('#gplus-tab').innerWidth();
      fbc.innerHTML = '<div class="fb-comments" data-href="<?php echo the_permalink(); ?>" data-num-posts="20" data-colorscheme="light" data-width="'+(fbwidth - 5)+'" data-mobile="auto"></div>';
      FB.XFBML.parse(fbc);
    });
  </script>
  </div> <!--//fb-tab -->
  <?php endif; ?>

  <?php if($options['show_wp']) : ?>
  <div id="wp-tab" class="block clearfix content-tab">

<?php if (have_comments()) : ?>
    <h6 id="comments">
			<?php
				printf( _n('One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number()),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>');
			?>
    </h6>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <div class="navigation">
        <div class="previous"><?php previous_comments_link(__( '&#8249; Older comments','responsive' )); ?></div><!-- end of .previous -->
        <div class="next"><?php next_comments_link(__( 'Newer comments &#8250;','responsive', 0 )); ?></div><!-- end of .next -->
    </div><!-- end of.navigation -->
    <?php endif; ?>

    <ol class="commentlist">
        <?php wp_list_comments('avatar_size=60&type=comment'); ?>
    </ol>

    <?php else :
      echo "<p class='nocomments'>No Comments.</p>";
    endif;
    if (comments_open()) :
    $fields = array(
        'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name','responsive') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></p>',
        'email' => '<p class="comment-form-email"><label for="email">' . __('E-mail','responsive') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
        '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></p>',
        'url' => '<p class="comment-form-url"><label for="url">' . __('Website','responsive') . '</label>' .
        '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>',
    );
    $defaults = array('fields' => apply_filters('comment_form_default_fields', $fields));
    comment_form($defaults);
    ?>
    <?php endif; ?>
  </div> <!--//wp-tab -->
  <?php endif; ?>

  <?php if($options['show_trackbacks']) : ?>
  <div id="tb-tab" class="block content-tab clearfix">
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

