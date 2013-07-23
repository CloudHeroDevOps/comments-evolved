<?php
/**
 * Disqus Comments Template
 *
 * @file           templates/partials/disqus.php
 * @package        WordPress
 * @subpackage     gplus-comments
 * @author         Brandon Holtsclaw <me@brandonholtsclaw.com>
 * @copyright      &copy; 2013 Brandon Holtsclaw
 * @license        GPL
 */

// No direct access
defined('ABSPATH') or exit;
?>

<div id="disqus-tab" class="content-tab clearfix">
  <div id="disqus_thread">Loading Disqus Comments ...</div>
  <script type="text/javascript">
    var disqus_shortname = '<?php echo $options["disqus_shortname"]; ?>';
    (function(d) {
      var dsq = d.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
      dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
      (d.getElementsByTagName('head')[0] || d.getElementsByTagName('body')[0]).appendChild(dsq);
    })(document);
  </script>
  <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
</div> <!--//disqus-tab -->
