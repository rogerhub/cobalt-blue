<?php
/**
 * Partial for displaying the post's header for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */
global $post;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if (is_single()) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else: ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'cobalt'), the_title_attribute('echo=0'))); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>
		<?php the_post_thumbnail(); ?>
		<?php if (comments_open()) : ?>
		<div class="comments-link">
			<?php comments_popup_link(__('Leave a reply', 'cobalt'), __('1 Reply', 'cobalt'), __('% Replies', 'cobalt')); ?> 
		</div>
		<?php endif; ?>
	</header>
