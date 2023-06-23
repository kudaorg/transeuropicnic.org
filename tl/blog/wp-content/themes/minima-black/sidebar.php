
<!-- begin sidebar -->
<div id="menu">

<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>

	<?php wp_list_pages(); ?>
	<?php get_links_list(); ?>
 <li>
 <h2>Search</h2>			
	<form method="get" id="searchform" action="/index.php">
	<div>
		<input type="text" value="" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Search" />
	</div>
	</form>
	</li>
 
 <li id="archives"><?php _e('Archives:'); ?>
 	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
 	</ul>
 </li>
 
<li id="meta"><?php _e('Meta:'); ?>
 	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="feed:<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="http://wordpress.org/" title="<?php _e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>"><abbr title="WordPress">WordPress</abbr></a></li>
		<li>
		<div class="w3cbutton1">
			<a class="w3c1" href="http://www.w3.org/">W3C</a> <a class="spec1" href="http://validator.w3.org/check/referer">XHTML 1.0</a>
		</div>
		</li>
		<?php wp_meta(); ?>
	</ul>
	
</li>
<?php endif; ?>
</ul>

</div>
<!-- end sidebar -->
