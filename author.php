<?php
/**
 * Template for showing author pages for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */

get_header(); ?>
	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php if (have_posts()) : the_post(); ?>
			<header class="page-header">
				<h1 class="page-title"><?php
					printf(__('Author Archives: <span class="vcard">%s</span>', 'cobalt'), get_the_author());
				?></h1>
			</header><?php rewind_posts(); ?>
				<?php while (have_posts()) : the_post() ; ?>
				<?php get_template_part('content', get_post_format()); ?>
				<?php endwhile; ?>
				<?php cobalt_content_nav('nav-below'); ?>
			<?php else: ?>
				<?php get_template_part('content', 'none'); ?>
			<?php endif; ?>
		</div>
	</div>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>
