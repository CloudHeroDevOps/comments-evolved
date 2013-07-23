<?php
/**
 * @author         Brandon Holtsclaw <me@brandonholtsclaw.com>
 * @copyright      2013 Brandon Holtsclaw
 * @license        GPL
 */
defined('ABSPATH') or exit;

function comments_evolved_template($file) {
  global $post, $comments;
  if (!(is_singular() && (have_comments() || 'open' == $post->comment_status))) {
    return;
  }
  return COMMENTS_EVOLVED_TEMPLATES . '/container.php';
}
add_filter('comments_template', 'comments_evolved_template', 4269);

function comments_evolved_get_total_count() {
  $total_count = 0;
  $wpc = comments_evolved_get_wordpress_count();
  $fbc = comments_evolved_get_facebook_count();
  $gpc = comments_evolved_get_gplus_count();

  $total_count = $total_count + $fbc + $gpc + $wpc;
  return $total_count;
}
add_filter('get_comments_number', 'comments_evolved_get_total_count');

function comments_evolved_get_wordpress_count() {
  global $post, $comments, $wp_query, $comments_by_type;
  return count($wp_query->comments_by_type['comment']);
}

function comments_evolved_get_trackback_count() {
  global $post, $comments, $wp_query, $comments_by_type;
  return count($wp_query->comments_by_type['pings']);
}

function comments_evolved_get_facebook_count($url = "") {
  if(empty($url)){ $url = get_permalink(); }
  $link = 'https://graph.facebook.com/?ids=' . urlencode($url);
  $link_body = wp_remote_retrieve_body(wp_remote_get($link));
  $json = json_decode($link_body);
  return $json->$url->comments;
}

function comments_evolved_get_gplus_count($url = "") {
  include_once COMMENTS_EVOLVED_LIB . '/simple_html_dom.php';
  if(empty($url)){ $url = get_permalink(); }
  $link = 'https://apis.google.com/_/widget/render/commentcount?bsv&href=' . urlencode($url);
  $link_body = str_get_html(wp_remote_retrieve_body(wp_remote_get($link)));
  $count_raw = $link_body->find('#widget_bounds > span', 0);
  $count_arr = split(" ",$count_raw->plaintext);
  return trim($count_arr[0]);
}

function comments_evolved_enqueue_styles() {
  wp_enqueue_style('comments_evolved_tabs_css');
}
add_action('wp_head', 'comments_evolved_enqueue_styles', 4269);

function comments_evolved_enqueue_scripts() {
  echo '<!-- Comments Evolved plugin -->' . PHP_EOL;
  echo '<script>jQuery("#comment-tabs").tabs();</script>' . PHP_EOL;
  echo '<!-- //Comments Evolved plugin -->' . PHP_EOL;
}
add_action('wp_footer', 'comments_evolved_enqueue_scripts', 4269);
