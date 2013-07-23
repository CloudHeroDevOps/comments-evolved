<?php
/**
 * WordPress Native Comments Template
 *
 * @file           templates/partials/wordpress.php
 * @package        WordPress
 * @subpackage     gplus-comments
 * @author         Brandon Holtsclaw <me@brandonholtsclaw.com>
 * @copyright      &copy; 2013 Brandon Holtsclaw
 * @license        GPL
 */

// No direct access
defined('ABSPATH') or exit;
?>

<div id="wordpress-tab" class="clearfix">
<?php
if (file_exists(TEMPLATEPATH . '/comments.php'))
{
  include_once TEMPLATEPATH . '/comments.php';
}
elseif (file_exists(TEMPLATEPATH . '/includes/comments.php'))
{
  include_once TEMPLATEPATH . '/includes/comments.php';
}
?>
</div><!--//wp-tab -->
