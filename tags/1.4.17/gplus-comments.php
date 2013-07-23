<?php
/*
Plugin Name: Google+ Comments for WordPress
Plugin URI: http://www.cloudhero.net/gplus-comments
Description: The Comments Evolved for WordPress plugin adds the ability to enable native WordPress, Google+, Facebook, Disqus, Livefyre, Twitter comment systems  easily through the Admin webinterface.
Author: Brandon Holtsclaw <me@brandonholtsclaw.com>
Author URI: http://www.brandonholtsclaw.com/
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Donate link: http://www.wepay.com/donations/brandonholtsclaw
Version: 1.4.17
*/

defined('ABSPATH') or exit;

if (version_compare(phpversion(), '5.3', '<'))
{
  function gplus_comments_php_too_low()
  {
    echo "<div class='error'><p>";
    echo "Google+ Comments for WordPress requires PHP 5.3+ and will not be activated, your current server configuration is running PHP version '" . phpversion() . "' . Any PHP version less than 5.3.0 has reached 'End of Life' from PHP.net and no longer receives bugfixes or security updates. The official information on how to update and why at <a href='http://php.net/eol.php' target='_blank'><strong>php.net/eol.php</strong></a>";
    echo "</p></div>";
  }
  add_action('admin_notices', 'gplus_comments_php_too_low');
  return;
}

function gplus_comments_get_version() {
  $version = 0;
  $plugin_file = file_get_contents(__FILE__);
  preg_match('#^\s*Version\:\s*(.*)$#im', $plugin_file, $matches);
  if (!empty($matches[1]))
  {
    $version = $matches[1];
  }
  return $version;
}

define('GPLUS_COMMENTS_VERSION', gplus_comments_get_version());
defined('GPLUS_COMMENTS_DEBUG') or define('GPLUS_COMMENTS_DEBUG', false);
defined('GPLUS_COMMENTS_DIR') or define('GPLUS_COMMENTS_DIR', __DIR__);
defined('GPLUS_COMMENTS_URL') or define('GPLUS_COMMENTS_URL', rtrim(plugin_dir_url(__FILE__),"/"));
defined('GPLUS_COMMENTS_LIB') or define('GPLUS_COMMENTS_LIB', GPLUS_COMMENTS_DIR . "/includes/lib");
defined('GPLUS_COMMENTS_TEMPLATES') or define('GPLUS_COMMENTS_TEMPLATES', GPLUS_COMMENTS_DIR . "/includes/templates");
defined('GPLUS_COMMENTS_DEFAULT_TAB_ORDER') or define('GPLUS_COMMENTS_DEFAULT_TAB_ORDER', 'gplus,facebook,wordpress');

require GPLUS_COMMENTS_LIB . '/hooks.php';

if ( is_admin() && ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) )
{
  function gplus_comments_admin() { require GPLUS_COMMENTS_LIB . '/admin.php'; }
}
else
{
  //require 'class-frontend.php';
}

