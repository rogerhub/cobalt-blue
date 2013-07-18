<?php
/**
 * Template for showing single posts for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */

get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php while (have_posts()) : the_post() ; ?>
			<?php get_template_part('content', get_post_format()); ?>
			<nav class="nav-single">
				<h3 class="assistive-text"><?php _e('Post Navigation', 'cobalt'); ?></h3>
				<div class="nav-previous alignleft">
					<?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'cobalt') . '</span> %title'); ?>
				</div>
				<div class="nav-next alignright">
					<?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'cobalt') . '</span>'); ?>
				</div>
				<div class="clear-fix"></div>
			</nav>
			
			<?php comments_template('', true); ?>
			<?php endwhile; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
