<?php
/**
 * Shows the sidebar for Cobalt Blue WordPress Theme
 * 
 * @package Cobalt
 */

?>
	<?php if (is_active_sidebar('sidebar-1')) : ?>
	<div id="secondary" class="widget-area" role="complementary">
		<?php do_action('before_sidebar'); ?>
		<?php dynamic_sidebar('sidebar-1'); ?>
	</div>
	<?php endif; ?>
