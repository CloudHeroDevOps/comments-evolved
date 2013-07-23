<?php
// No direct access
defined('ABSPATH') or exit;

/**
 * Returns current plugin version.
 */
function gplus_comments_get_version() {
  $plugin_data = get_plugin_data( realpath(__DIR__ . '/../gplus-comments.php'), false, false );
  $plugin_version = $plugin_data['Version'];
  return $plugin_version;
}

define('GPLUS_COMMENTS_VERSION', '1.4.9');
defined('GPLUS_COMMENTS_DEFAULT_TAB_ORDER') or define('GPLUS_COMMENTS_DEFAULT_TAB_ORDER', 'gplus,facebook,wordpress');
defined('GPLUS_COMMENTS_DEBUG') or define('GPLUS_COMMENTS_DEBUG', false);
defined('GPLUS_COMMENTS_DIR') or define('GPLUS_COMMENTS_DIR', dirname(__FILE__));
defined('GPLUS_COMMENTS_URL') or define('GPLUS_COMMENTS_URL', rtrim(plugin_dir_url(__FILE__),"/"));
defined('GPLUS_COMMENTS_LIB') or define('GPLUS_COMMENTS_LIB', GPLUS_COMMENTS_DIR . "/lib");
defined('GPLUS_COMMENTS_TEMPLATES') or define('GPLUS_COMMENTS_TEMPLATES', GPLUS_COMMENTS_DIR . "/templates");

