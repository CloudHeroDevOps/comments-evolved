<?php
/*
Plugin Name: Google+ Comments
Plugin URI: http://www.cloudhero.net/gplus-comments
Description: The Google+ comments plugin replaces or runs along side your WordPress comment system with your comments hosted and powered by Google+.
Author: Brandon Holtsclaw <me@brandonholtsclaw.com>
Version: 1.0.5
Author URI: http://www.brandonholtsclaw.com/
*/

defined('GPLUS_COMMENTS_DEBUG') or define('GPLUS_COMMENTS_DEBUG', false);
defined('GPLUS_COMMENTS_DIR') or define('GPLUS_COMMENTS_DIR', dirname(__FILE__));
defined('GPLUS_COMMENTS_URL') or define('GPLUS_COMMENTS_URL', WP_PLUGIN_URL . '/' . basename(__FILE__));

function gplus_comments_action_links($links, $file) {
    $plugin_file = basename(__FILE__);
    if (basename($file) == $plugin_file) {
           $settings_link = '<a href="edit-comments.php?page=gpluscomments">Configure</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
//add_filter('plugin_action_links', 'gplus_comments_action_links', 10, 2);


function gplus_add_pages() {
    //add_comments_page( $page_title, $menu_title, $capability, $menu_slug, $function);
     add_submenu_page(
         'Google+ Comments',
         'Google+ Comments',
         'manage_options',
         'gpluscomments',
         'gpluscomments_admin'
     );
}
//add_action('admin_menu', 'gplus_add_pages', 10);

function gpluscomments_admin() {
    //include_once(dirname(__FILE__) . '/lib/gplus-comments-admin.php');
}

$EMBED = false; //ugly global hack
function gplus_comments_template($value)
{
    global $EMBED, $post, $comments;

    if (!(is_singular() && (have_comments() || 'open' == $post->comment_status)))
    {
      return;
    }

    $EMBED = true;
    //allow theme authors to overide the gplus-comments.php
    if (file_exists(TEMPLATEPATH . '/gplus-comments.php'))
    {
      return TEMPLATEPATH . '/gplus-comments.php';
    }
    else
    {
      return dirname(__FILE__) . '/gplus-comments.php';
    }
}
add_filter('comments_template', 'gplus_comments_template');

/**
 * Hide the default comment form from spammers mark all comments as closed.
 */
function gplus_comments_open($open, $post_id=null)
{
    global $EMBED;
    if ($EMBED) return false;
    return $open;
}
//add_filter('comments_open', 'gplus_comments_open');


/**
 * Load up our code to make us pretty and functional.
 */
function gplus_assets_load()
{
  if(!is_admin())
  {
    wp_register_script('gplus_plus_js',('https://apis.google.com/js/plusone.js'),null,null,false);
    wp_enqueue_script('gplus_plus_js');
    wp_register_style('gcom_css', plugins_url('gplus-comments/tabs.css'),null,"1.0.1","all");
    wp_enqueue_style('gcom_css');
    wp_register_style('font_css', plugins_url('gplus-comments/font/font.css'),null,"1.0.1","all");
    wp_enqueue_style('font_css');
    wp_register_script('gplus_tabs_js',plugins_url('gplus-comments/tabs.js'),null,"1.0.1",false);
    wp_enqueue_script('gplus_tabs_js');
  }
}
add_action('wp_head', 'gplus_assets_load', 10,1);
//add_filter('get_comments_number', 'gplus_comments_number');

/**
* Disable internal Wordpress commenting - prevents spam bots
* commenting using POST requests to /wp-comments-post.php.
*/
function gplus_pre_comment_on_post($comment_post_ID)
{
    wp_die(_e('Sorry, the built-in commenting system is disabled because G+ Comments are active.'));
    return $comment_post_ID;
}
//add_action('pre_comment_on_post', 'gplus_pre_comment_on_post');
