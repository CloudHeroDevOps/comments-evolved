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

<div id="gplus-tab" class="clearfix">
  <script type="text/javascript" src="//apis.google.com/js/plusone.js?callback=?"></script>
  <script type="text/javascript">
  jQuery(document).ready(function($)
  {
    $('#gplus-tab').html('<div class="g-comments" data-href="<?php echo the_permalink(); ?>" style="height: 300px;" data-width="'+window.comment_tab_width+'" data-first_party_property="BLOGGER" data-view_type="FILTERED_POSTMOD">Loading Google+ Comments ...</div>');
    $("#g-comments").css
    ({
      'height': ''
      //'width' : '98%'
    });
    $("#g-comments iframe").css
    ({
      'height': '',
      'min-height': '300px'
      //'width': '98%'
    });
  });
  </script>
  <noscript>Please enable JavaScript to view the <a href="https://plus.google.com/">comments powered by Google+.</a></noscript>
</div> <!--//gplus-tab -->
