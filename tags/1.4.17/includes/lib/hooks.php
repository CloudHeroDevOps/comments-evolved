<?php

// No direct access
defined('ABSPATH') or exit;

function gplus_comments_init()
{
  wp_register_style('gplus_comments_tabs_css', GPLUS_COMMENTS_URL . '/assets/styles/plugin.css', null, GPLUS_COMMENTS_VERSION, "all");
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-core');
  wp_enqueue_script('jquery-ui-tabs');
}
add_action('init', 'gplus_comments_init');

add_action('admin_init', function() {
  register_setting( 'gplus-comments-options', 'gplus-comments' );
});
//add_action( 'admin_init', 'gplus_comments_admin_init' );

function gplus_comments_activate()
{
  $options = array();
  $options = get_option('gplus-comments');
  $options["tab_order"] = GPLUS_COMMENTS_DEFAULT_TAB_ORDER;
  update_option('gplus-comments', $options);
}
register_activation_hook( __FILE__, 'gplus_comments_activate');

/**
 * Replace the theme's loaded comments.php with our own souped up version.
 */
function gplus_comments_template($file)
{
    global $post, $comments;

    /**
     * Do we even need to load ?
     */
    if (!(is_singular() && (have_comments() || 'open' == $post->comment_status))) { return; }

    /*
    if (file_exists(TEMPLATEPATH . '/container.php'))
    {
      return TEMPLATEPATH . '/container.php';
    }
    else
    {
    */
      return GPLUS_COMMENTS_TEMPLATES . '/container.php';
    /*
    }
    */
}
add_filter('comments_template', 'gplus_comments_template', 4269);

function gplus_comments_get_comments_number()
{
    global $post;
    $url = get_permalink($post->ID);

    $filecontent = file_get_contents('https://graph.facebook.com/?ids=' . $url);
    $json = json_decode($filecontent);
    $count = $json->$url->comments;
    $wpCount = get_comments_number();
    $realCount = $count + $wpCount;
    if ($realCount == 0 || !isset($realCount)) {
        $realCount = 0;
    }
    return $realCount;
}
//add_filter('get_comments_number', 'gplus_comments_get_comments_number');

/**
 * Load up our assets (last) for frontend to make us pretty and functional.
 */
function gplus_comments_enqueue_styles()
{
  wp_enqueue_style('gplus_comments_tabs_css');
}
add_action('wp_head', 'gplus_comments_enqueue_styles', 4269);

function gplus_comments_enqueue_scripts()
{
  print "\n<script>jQuery('#comment-tabs').tabs();</script>\n";
/*
<script type="text/javascript">
  (function() {
   var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
   po.src = 'https://apis.google.com/js/client:plusone.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
*/
}
add_action('wp_footer', 'gplus_comments_enqueue_scripts', 4269);

/**
 * Set the link for settings under the plugin name on the wp-admin plugins page
 */
function gplus_comments_plugin_action_links($links, $file) {
  $plugin_file = basename(__FILE__);
  if (basename($file) == $plugin_file) {
    $settings_link = '<a href="edit-comments.php?page=gplus-comments">Settings</a>';
    array_unshift($links, $settings_link);
  }
  return $links;
}
add_filter('plugin_action_links', 'gplus_comments_plugin_action_links', 10, 2);

/**
 * Add ourself to the admin menu under the Comments section
 */
function gplus_comments_admin_menu()
{
     add_submenu_page
     (
         'edit-comments.php',
         'Google+ Comments',
         'G+ Comments',
         'manage_options',
         'gplus-comments',
         'gplus_comments_admin'
     );
}
add_action('admin_menu', 'gplus_comments_admin_menu', 10);

/**
 * Load a bit of jQuery to adjust some of the minor admin menu items
 */
function gplus_comments_admin_head()
{
  print "<script type='text/javascript' charset='utf-8'>jQuery(document).ready(function(){jQuery('ul.wp-submenu a[href=\"edit-comments.php\"]').text('WP Comments');jQuery('#menu-comments').find('a.wp-has-submenu').attr('href','edit-comments.php?page=gplus-comments').end().find('.wp-submenu  li:has(a[href=\"edit-comments.php?page=gplus-comments\"])').prependTo( jQuery('#menu-comments').find('.wp-submenu ul'));jQuery('#wp-admin-bar-comments a.ab-item').attr('href','edit-comments.php?page=gplus-comments');});</script>";
}
add_action('admin_head', 'gplus_comments_admin_head');





