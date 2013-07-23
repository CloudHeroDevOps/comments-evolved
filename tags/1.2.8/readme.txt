=== Google+ Comments for WordPress ===
Contributors: bholtsclaw
Donate link: http://www.wepay.com/donations/brandonholtsclaw
Tags: comments, threaded, email, notification, spam, avatars, community, profile, widget, google, google plus, facebook, disqus, google+, +1, plus one, widget, tabs, comment tabs
License: GPLv3+
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 3.3
Tested up to: 3.6
Stable Tag: 1.2.8

Google+ Comments for WordPress makes the comment section tabbed seamlessly adding tabs for G+ Comments, Facebook, Disqus, WordPress, & More

== Description ==
Google+ Comments for WordPress makes the comment section tabbed seamlessly adding tabs for G+ Comments, Facebook, Disqus, WordPress Comments, and Trackbacks
This plug-in lets you use the Google+ comment system thats implemented on blogger.com (unofficially) on your WordPress.org blog along side WordPress comments if desired.

**NOTE: Using this plugin or JavaScript to load comments does _NOT_ have a negative effect on your SEO, Google now indexes content ( and specifically comments ) loaded via JavaScript. See [this link](http://blog.optimum7.com/safon/google/google-now-indexing-fb-comments.html) and also [this one](http://webmasters.stackexchange.com/questions/27042/effect-on-seo-of-lazy-scrolling-on-html-comments) for more details.**

**Live Demo @ [www.cloudhero.net/gplus-comments](http://www.cloudhero.net/gplus-comments).**

* You should have [Google Authorship](http://plus.google.com/authorship) already setup and in use for your site.
* I've setup a page so if you want to [donate to this plugin](http://www.wepay.com/donations/brandonholtsclaw) you can. Thanks!

**NOTE:** This plug-in is not endorsed or associated with the Google, Twitter, Disqus, Facebook, WordPress.org, Automattic, or WordPress HelpCenter.

== Screenshots ==
1. G+ Comments with all tabs turned on.
2. Admin Options ( as of 1.2.0 )

== Installation ==
**NOTE: You should always [backup your database](http://codex.wordpress.org/Backing_Up_Your_Database) before installing the plug-ins.**

1. Unpack archive to this archive to the 'wp-content/plugins/' directory inside
   of WordPress

  * Maintain the directory structure of the archive (all extracted files
    should exist in 'wp-content/plugins/gplus-comments/'

2. From your blog administration, activate the plugin.

== Frequently Asked Questions ==
= Does the normal commenting stay active ? =
Yes, both systems can be active at the same time.
= Can I choose what Tab to make Default? =
Not at this time but it is a planned feature.
= Can I enable or disable commenting systems I'm not using ? =
Yes, only choose to show the tabs you wish to use via the wp-admin Options Page.
= Can I disable WordPress Native comments so all new comments are made via Google+ but still show the historic WordPress Comments ? =
Yes, just disable WP comments like you normally would and then leave the Show WordPress Comments option checked in the Google+ Comments Options.
= What if I ... =
I can be reached many different ways all listed on http://en.gravatar.com/imbrandon , including Email, Phone, or Other Social Networks.

== Change Log ==
= 1.2.8 =
* dont set everyones page background to #fff ( white )
= 1.2.7 =
* move missing styles from theme to plugin
= 1.2.6 =
* make all tab css !important and scoped so it does not inherit from the page easily
= 1.2.5 =
* version bump to fix svn botch
* minor css adjustments for tabs
= 1.2.1 =
* updates to the tab css so it dont mix with some themes
* updates to the font css so it dont mix with some themes
* added a check for php 5.3+ with a sensible error message
* ensured jquery-ui-tabs is loaded now explicitly
= 1.2.0 =
* added Plugin options page to show or hide various comment tabs from the wp-admin area
* comment tabs are now responsive and should adjust to nearly any layout
* now using async javascript to load G+ comments for faster page loading
* added option to show facebook comments
* added option to show disqus comments
* updated screenshot
= 1.1.0 =
* many typo fixes
* initial ( non-functional ) options page placeholder and associated hooks added
* fixed bugs that removed native WordPress comment functionality by accident, any native options should work now
* better loading of the css/js via wp_register/wp_encueue system to let other plug-ins possibly modify our
  scripts and styles as needed as well as using CDN resources wisely
* everything loaded with https:// or [protocol relative urls](http://paulirish.com/2010/the-protocol-relative-url/) so that https:// works without warnings generated due to
  "unsafe" resource loading from http://
= 1.0.4 =
* hot-fix to fix accidental loading of css and js in the admin area
= 1.0.3 =
* fixed automatically a bug where it would disable wp comments by default, that should not have been the case.
= 1.0.2 =
* fixed bumping the version
= 1.0.1 =
* Removed the need for jquery-ui-tab fixing the tab display for some versions of WordPress
* changed the tab colors to closer match the G+ Comments and blend into more websites seamlessly
* fixed a typo when no comments had been made yet
= 1.0.0 =
* Release via WordPress.org
= 0.8.0 =
* Initial public release

== Support ==
* Visit http:///www.cloudhero.net/gplus-comments limited help & documentation.
* I also recommend the [WordPress HelpCenter](http://wphelpcenter.com/) for extended help.

