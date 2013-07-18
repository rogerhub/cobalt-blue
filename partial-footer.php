<?php
/**
 * Partial for displaying the post's footer for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */
global $post;
?>
	<?php if (!is_archive() && !is_search() && !is_page()) : ?>
	<footer class="entry-meta">
		<?php cobalt_entry_meta(); ?>
	</footer>
	<?php endif; ?>
</article>
