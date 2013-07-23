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

<div id="trackback-tab" class="content-tab clearfix">
  <?php // let's seperate trackbacks from comments
  if (!empty($comments_by_type['pings'])) :
    $count = count($comments_by_type['pings']); $txt = __('Trackbacks'); ?>
    <h6 id='pings'><?php printf( __( '%1$d %2$s for "%3$s"'), $count, $txt, get_the_title() )?></h6>
    <ol class="commentlist">
      <?php wp_list_comments('type=pings&max_depth=1'); ?>
    </ol>
  <?php else : ?>
    <p class="notrackbacks">No Trackbacks.</p>
  <?php endif; ?>
</div> <!--//tb-tab -->
