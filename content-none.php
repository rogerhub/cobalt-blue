<?php
/**
 * Content template for no posts available for Cobalt Blue WordPress Theme
 * 
 * @package Cobalt
 */

?>
<article id="post-0" class="post no-results">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e('Nothing Found', 'cobalt'); ?></h1>
	</header>
	<div class="entry-content">
		<p><?php _e('Apologies, but no results were found. Perhaps searching will find a related post.', 'cobalt'); ?></p>
		<p><?php get_search_form(); ?></p>
	</div>
</article>
