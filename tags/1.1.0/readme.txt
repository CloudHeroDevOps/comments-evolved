=== Google+ Comments for WordPress ===
Contributors: bholtsclaw
Donate link: http://www.wepay.com/donations/brandonholtsclaw
Tags: comments, threaded, email, notification, spam, avatars, community, profile, widget, google, google plus
License: GPLv3+
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Requires at least: 3.3
Tested up to: 3.6
Stable Tag: 1.1.0

Google+ Comments for WordPress makes the comment section tabbed seamlessly adding tabs for G+ Comments, WordPress Comments, and Trackbacks

== Description ==
Google+ Comments for WordPress makes the comment section tabbed seamlessly adding tabs for G+ Comments, WordPress Comments, and Trackbacks
This plug-in lets you use the Google+ comment system thats implemented on blogger.com (unofficially) on your WordPress.org blog along side WordPress comments if desired.

G+ Comments for WordPress seamlessly changes the WordPress commenting system to use tabs adding in G+ and optionally others.

=== Live Demo @ [www.cloudhero.net/gplus-comments](http://www.cloudhero.net/gplus-comments). ===

* You should have [Google Authorship](http://plus.google.com/authorship) already setup and in use for your site.
* G+ comments are all stored on Google and are _not_ synced between WordPress native comments or any others that may be active.

**Note:** This plug-in is not endorsed or associated with the Google, Twitter, Disqus, Facebook, WordPress.org, Automattic, or WordPress HelpCenter.

== Screenshots ==
1. G+ Comments Live on CloudHero.net

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

== Change Log ==
= 1.1.0 =
* many typo fixes
* refactoring plug-in file layout to accommodate easier user template reuse in custom themes
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

