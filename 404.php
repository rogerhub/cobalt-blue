<?php
/**
 * The template for displaying 404 pages for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */

get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php get_template_part('content', 'none'); ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
