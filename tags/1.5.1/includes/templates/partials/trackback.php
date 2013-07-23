<?php
/**
 * @author         Brandon Holtsclaw <me@brandonholtsclaw.com>
 * @copyright      2013 Brandon Holtsclaw
 * @license        GPL
 */
defined('ABSPATH') or exit;

?>
<!-- tb-tab -->
<div id="trackback-tab" class="content-tab clearfix">
  <?php if (!empty($comments_by_type['pings'])) : ?>
    <!-- <h6 id='pings'><?php printf( __( '%1$d %2$s for "%3$s"'), count($comments_by_type['pings']), __('Trackbacks'), get_the_title() )?></h6> -->
    <ol class="commentlist">
      <?php wp_list_comments('type=pings&max_depth=1'); ?>
    </ol>
  <?php else : ?>
    <p class="notrackbacks">No Trackbacks.</p>
  <?php endif; ?>
</div>
<!-- //tb-tab -->
