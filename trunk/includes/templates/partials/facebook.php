<?php
/**
 * @author         Brandon Curtis <brandon.curtis@gmail.com>
 * @copyright      2014 Brandon Curtis
 * @license        GPL
 */
defined('ABSPATH') or exit;
?>

<div id="fb-root"></div>
<div id="fb-comments">Loading Facebook Comments ...</div>

<script type="text/javascript">
  jQuery(document).ready(function($)
  {
    $('#fb-comments').html('<div class="fb-comments" data-width="'+window.comment_tab_width+'" data-href="<?php echo the_permalink(); ?>" data-num-posts="20" data-colorscheme="light" data-mobile="auto"></div>');
  });
</script>

<script>
      window.fbAsyncInit = function() {
        FB.init({
		    appId   : '<?php echo $options["facebook_appid"]; ?>', // Facebook application ID
			status  : true, // check login status
			cookie  : true, // enable cookies to allow the server to access the session
			xfbml   : true, // parse XFBML
		    version : 'v2.0'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>

<noscript>
	Please enable JavaScript to view the <a href="https://www.facebook.com/">comments powered by Facebook.</a>
	</noscript>


