<?php
/*
Plugin Name: KB Robots.txt
Description: Manage your robots.txt file from within Wordpress. Especially useful for WP-MU installations.
Author: Adam R. Brown
Version: 1.0.1
Plugin URI: http://adambrown.info/b/widgets/kb-robots-txt/
Author URI: http://adambrown.info/
*/

/* change log 
	1.0	first
	1.0.1	allow for trailing slash when checking url
*/

$kb_defaultrobotstxt = "# This is your robots.txt file. Visit Options->Robots.txt to change this text.";

add_option("kb_robotstxt", $kb_defaultrobotstxt, "Contents of robots.txt", 'no');		// default value



function kb_robotstxt(){
	# this is to make it work for demos and testing. Without this, plugin would only act when robots.txt is in a valid place. With this, it will act whenever robots.txt is appended to blog URL
	# (even if blog is in a subdirectory)
	$request = str_replace( get_bloginfo('url'), '', 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] );

	if ( (get_bloginfo('url').'/robots.txt' != 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) && ('/robots.txt' != $_SERVER['REQUEST_URI']) && ('robots.txt' != $_SERVER['REQUEST_URI']) )
		return;		// checking whether they're requesting robots.txt
	
	$robotstxt = get_option('kb_robotstxt');
	
	if ( !$robotstxt)
		return;

	header('Content-type: text/plain');
	print $robotstxt;
	die;
}

function kb_robotstxt_options_page(){
	if ( $_POST['kb_robotstxt'] ){
		update_option( 'kb_robotstxt', $_POST['kb_robotstxt'] );
		$urlwarning = str_replace('http://', '', get_bloginfo('url') );
		$urlwarning = substr( $urlwarning, 0, -1 );	// in case there is a trailing slash--don't want it so set off our warning
		if ( strpos( $urlwarning, '/' ) )			// this is our warning checker
			$urlwarning = '<p>It appears that your blog is installed in a subdirectory, not in a subdomain or at your domain\'s root. Be aware that search engines do not look for robots.txt files in subdirectories. <a href="http://www.robotstxt.org/wc/exclusion-admin.html">Read more</a>.</p>';
		else
			unset($urlwarning);
		print '<div id="message" class="updated fade"><p><strong>Robots.txt updated.</strong> <a href="'.get_bloginfo('url').'/robots.txt">View robots.txt</a>.</p>'.$urlwarning.'</div>';
	}
	
	$robotstxt = get_option('kb_robotstxt');
	
	print '
	<div class="wrap">
	<h2>Robots.txt Editor</h2>
	<p>Edit your robots.txt file in the space below. Lines beginning with <code>#</code> are treated as comments.</p>
	<p>Using robots.txt, you can ban specific robots, ban all robots, or block robot access to specific pages or areas of your site. If you are not sure what to type, look at the bottom of this page for examples.</p>
	<form method="post" action="http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'].'">
	<textarea id="kb_robotstxt" name="kb_robotstxt" rows="10" cols="45" class="widefat">'.$robotstxt.'</textarea>
	<p class="submit" style="width:420px;"><input type="submit" value="Submit &raquo;" /></p>
	</form>
	</div>

	<div class="wrap">
	<h2>Robots.txt Samples</h2>
	<p>Following are a few simple examples of what you might type in your robots.txt file. For more examples, read the <a href="http://www.robotstxt.org/wc/exclusion-admin.html">robots.txt specification</a>. (In the specification, look for the "What to put into the robots.txt file" heading.) Please note the following points:</p>
	<p><strong>Important</strong>: Search engines look only in top-level domains for robots.txt files. So this plugin will only help you if typing in <code>http://blog.example.com/</code> or <code>http://example.com</code> brings up Wordpress. If you have to type <code>http://example.com/blog/</code> to bring up Wordpress (i.e. it is in a subdirectory, not in a subdomain or at the domain root), this plugin will not do you any good. Search engines look do not look for robots.txt files in subdirectories, only in root domains and subdomains.</p>
	<p>Following are a few examples of what you can type in a robots.txt file.</p>
	<h3>Ban all robots</h3>	
	<blockquote><code><pre>User-agent: *
Disallow: /</pre></code></blockquote>
	
	<h3>Allow all robots</h3>
	<p>To allow any robot to access your entire site, you can simply leave the robots.txt file blank, or you could use this:</p>
	<blockquote><code><pre>User-agent: *
Disallow:</pre></code></blockquote>

	<h3>Ban specific robots</h3>
	<p>To ban specific robots, use the robot\'s name. Look at the <a href="http://www.robotstxt.org/wc/active/html/index.html">list of robot names</a> to find the correct name. For example, Google is <code>Googlebot</code> and Microsoft search is <code>MSNBot</code>. To ban only Google:</p>
	<blockquote><code><pre>User-agent: Googlebot
Disallow: /</pre></code></blockquote>

	<h3>Allow specific robots</h3>
	<p>As in the previous example, use the robot\'s correct name. To allow only Google, use all four lines:</p>
	<blockquote><code><pre>User-agent: Googlebot
Disallow:

User-agent: *
Disallow: /</pre></code></blockquote>

	<h3>Ban robots from part of your site</h3>
	<p>To ban all robots from the page "Archives" and its subpages, located at http://yourblog.example.com/archives/,</p>
	<blockquote><code><pre>User-agent: *
Disallow: /archives/</pre></code></blockquote>
	</div>
	';
}

function kb_robotstxt_admin_page(){
	add_submenu_page('options-general.php', 'KB Robots.txt', 'KB Robots.txt', 9, 'kb-robots-txt.php', 'kb_robotstxt_options_page');
}

add_action('init', 'kb_robotstxt');
add_action('admin_menu', 'kb_robotstxt_admin_page');

?>