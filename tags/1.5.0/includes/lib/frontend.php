<?php

function comments_evolved_template($file) {
    global $post, $comments;
    if (!(is_singular() && (have_comments() || 'open' == $post->comment_status))) {
     return;
    }
    return COMMENTS_EVOLVED_TEMPLATES . '/container.php';
}
add_filter('comments_template', 'comments_evolved_template', 4269);

function comments_evolved_get_comments_number() {
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
//add_filter('get_comments_number', 'comments_evolved_get_comments_number');

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
