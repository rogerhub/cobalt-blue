<?php
/**
 * Content template for a normal post for Cobalt Blue WordPress Theme
 * 
 * @package Cobalt
 */

?>
<?php get_template_part('partial-header'); ?>
	<?php if (is_archive() || is_search()) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div>
	<?php else: ?>
	<div class="entry-content">
		<?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'cobalt')); ?>
	</div>
	<?php wp_link_pages(array('before' => '<div class="page-links">' . __('Pages:', 'cobalt'), 'after' => '</div>', 'link_before' => '<span class="page-link">', 'link_after' => '</span>')); ?>
	<?php endif; ?>
<?php get_template_part('partial-footer'); ?>
