=== KB Robots.txt ===
Contributors: adamrbrown
Donate link: http://adambrown.info/b/widgets/donate/
Tags: robots.txt, google, seo, search, robots, spiders, wpmu, wp-mu
Requires at least: 2.0
Tested up to: 2.5
Stable tag: trunk

Edit your robots.txt from within Wordpress to control search engine activities.

== Description ==

When robots (like the Googlebot) crawl your site, they begin by requesting `http://example.com/robots.txt` and checking it for special instructions. Use this plugin to create and edit your robots.txt file from within Wordpress (using `Options -> Robots.txt`).

Whenever a user (or a robot, more likely) appends "robots.txt" to your blog URL (e.g. http://blog.example.com/robots.txt), this plugin will serve up the robots.txt file that you created in the Wordpress admin menu.

This plugin should work with most versions of Wordpress, but it is particularly intended for WP-MU installations, since it allows each WPMU blog to have a unique robots.txt file.

= Limitations =

Note that robots make only top-level requests for robots.txt files. If you have Wordpress installed in a subdomain (e.g. `http://blog.example.com/`) or in your root (e.g. `http://example.com/`), this plugin will work as intended. But if you have Wordpress installed in a subdirectory (e.g. `http://example.com/blog/`), then this plugin won't do much for you, since the search engines won't look for `http://example.com/blog/robots.txt`, only for `http://example.com/robots.txt`.

Also, requires that you be using some form of permalink structure. If links to blog posts look like `http://example.com/index.php?p=36`, this won't work.

= Support =

If you post your support questions as comments below, I probably won't see them. If the FAQs don't answer your questions, you can post support questions at the [KB Robots.txt plugin page](http://adambrown.info/b/widgets/kb-robots-txt/) on my site.

== Installation ==

1. Upload `kb_robots-txt.php` to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Go to the new 'Options => KB Robots.txt' admin page. In the box, write whatever you want your robots.txt file to say. There are examples below the box.
1. Test that it worked by going to `http://yourblog.example.com/robots.txt` to see your new robots.txt file.

== License ==

This plugin is provided "as is" and without any warranty or expectation of function. I'll probably try to help you if you ask nicely, but I can't promise anything. You are welcome to use this plugin and modify it however you want, as long as you give credit where it is due.

I give this away for free. If you run a blog farm (WP-MU), you can't charge people to use this plugin. Unless, of course, you want to share the wealth with the person who coded this...

== Screenshots ==

This is a demo robots.txt file that was created using this plugin: [KB Robots.txt demo](http://adambrown.info/b/widgets/robots.txt). (This is just a demo; if it were a real robots.txt file, I would have placed it at my root.)

== Frequently Asked Questions ==

= Do I need a robots.txt file? =

All well-behaved robots (which includes all search engine spiders) will request http://example.com/robots.txt before doing anything else. If you wish to allow all robots access to your entire site, then you do not need this plugin.

You need robots.txt (and therefore this plugin) to achieve any of the following goals:

* Ban a specific robot (e.g. don't allow MSN Search to crawl your site)
* Ban all but one robot (allow only Google to index your site)
* Ban robots from indexing a particular part of your site (e.g. preventing indexing of feeds and trackback URLs)
* Ban robots from indexing any of your site

You can find much more information in the [robotstxt.org FAQ](http://www.robotstxt.org/wc/faq.html). You might also want to peruse some [tips for optimizing your blog's rank in Google](http://forums.digitalpoint.com/showthread.php?t=435651) (though I do not necessarily endorse these tips).

= I have a question that isn't addressed here. =

You may ask questions by posting a comment to the [KB Robots.txt plugin page](http://adambrown.info/b/widgets/kb-robots-txt/). (If you post your support questions as comments below, I probably won't see them.)