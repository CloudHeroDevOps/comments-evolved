<?php
/**
 * Google+ Comments Template
 *
 * @file           templates/partials/gplus.php
 * @package        WordPress
 * @subpackage     gplus-comments
 * @author         Brandon Holtsclaw <me@brandonholtsclaw.com>
 * @copyright      &copy; 2013 Brandon Holtsclaw
 * @license        GPL
 */

// No direct access
defined('ABSPATH') or exit;
?>

<div id="tweetback-tab" class="content-tab clearfix">
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 8,
  interval: 6000,
  width: 700,
  height: 300,
  theme: {
    shell: {
      background: '#ffffff',
      color: '#b364b3'
    },
    tweets: {
      background: '#ffffff',
      color: '#ffffff',
      links: '#338012'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: true,
    hashtags: true,
    timestamp: true,
    avatars: true,
    behavior: 'default'
  }
}).render().setUser('imbrandon').start();
</script>
</div> <!--//tb-tab -->

