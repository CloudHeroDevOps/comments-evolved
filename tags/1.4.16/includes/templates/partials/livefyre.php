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

<div id="livefyre-tab" class="clearfix">
<div id="livefyre-comments"></div>
<script type="text/javascript" src="//zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>
<script type="text/javascript">
(function () {
    var articleId = fyre.conv.load.makeArticleId(null);
    fyre.conv.load({}, [{
        el: 'livefyre-comments',
        network: "livefyre.com",
        siteId: "<?php echo $options["livefyre_siteid"]; ?>",
        articleId: articleId,
        signed: false,
        collectionMeta: {
            articleId: articleId,
            url: fyre.conv.load.makeCollectionUrl(),
        }
    }], function() {});
}());
</script>
</div><!-- //livefyre-tab -->

