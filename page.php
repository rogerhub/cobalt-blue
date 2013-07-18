<?php
/**
 * Template for showing pages for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */

get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while (have_posts()) : the_post() ; ?>
			<?php get_template_part('content'); ?>
			<?php comments_template('', true); ?>
			<?php endwhile; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
