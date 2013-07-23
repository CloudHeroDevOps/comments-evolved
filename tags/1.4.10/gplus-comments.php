<?php
/*
Plugin Name: Google+ Comments
Plugin URI: http://www.cloudhero.net/gplus-comments
Description: Google+ Comments for WordPress plugin adds Google Plus comments along side your native WordPress comment system in a responsive tab interface.
Author: Brandon Holtsclaw <me@brandonholtsclaw.com>
Author URI: http://www.brandonholtsclaw.com/
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Donate link: http://www.wepay.com/donations/brandonholtsclaw
Version: 1.4.10
*/

/**
 *       DEVELOPERS AND THEMERS : DONT EDIT THIS FILE DIRECTLY
 *       THERE ARE INSTRUCTIONS ON THE PLUGINS WEBPAGE TO CUSTOMIZE IT
 *       SO THAT IT WONT BE LOST ON PLUGIN UPATES.
 */

// No direct access
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

/**
 * Returns current plugin version.
 */
function gplus_comments_get_version() {
  $plugin_data = get_plugin_data( realpath(__DIR__ . '/../gplus-comments.php'), false, false );
  $plugin_version = $plugin_data['Version'];
  return $plugin_version;
}

define('GPLUS_COMMENTS_VERSION', '1.4.10');
defined('GPLUS_COMMENTS_DEFAULT_TAB_ORDER') or define('GPLUS_COMMENTS_DEFAULT_TAB_ORDER', 'gplus,facebook,wordpress');
defined('GPLUS_COMMENTS_DEBUG') or define('GPLUS_COMMENTS_DEBUG', false);
defined('GPLUS_COMMENTS_DIR') or define('GPLUS_COMMENTS_DIR', dirname(__FILE__));
defined('GPLUS_COMMENTS_URL') or define('GPLUS_COMMENTS_URL', rtrim(plugin_dir_url(__FILE__),"/"));
defined('GPLUS_COMMENTS_LIB') or define('GPLUS_COMMENTS_LIB', GPLUS_COMMENTS_DIR . "/lib");
defined('GPLUS_COMMENTS_TEMPLATES') or define('GPLUS_COMMENTS_TEMPLATES', GPLUS_COMMENTS_DIR . "/templates");

//require __DIR__ . '/lib/init.php';

require GPLUS_COMMENTS_LIB . '/hooks.php';

function gplus_comments_render_admin_page()
{
  require GPLUS_COMMENTS_LIB . '/admin.php';
}

/*
<a class="twitter-timeline"  href="https://twitter.com/imbrandon"  data-widget-id="330505805105336320">Tweets by @imbrandon</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':
'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
*/


