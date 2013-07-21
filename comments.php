<?php
/**
 * Comments template for Colbalt Blue WordPress Theme
 * 
 * @package Cobalt
 */

if (post_password_required()) {
	return;
}

?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ): ?>
		<h2 class="comments-title"><?php printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'twentytwelve' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>'); ?></h2>
		<ol class="commentlist">
			<?php wp_list_comments( array('callback' => 'cobalt_comment', 'style' => 'ol') ); ?>
		</ol>
	<?php endif; ?>
	<?php if (is_singular() && get_option('page_comments')) : ?>
	<?php $max_cpage = get_comment_pages_count(); ?>
	<?php if ($max_cpage > 1) : ?>
	<div class="comments-page-links">Comments: 
	<?php paginate_comments_links(array('link_before' => '<span class="comments-page-link">', 'link_after' => '</span>')); ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php if (comments_open()) : ?>
		<?php comment_form(); ?>
	<?php else: ?>
	<div class="respond">
		<h3 class="reply-title"><?php _e('Comments are closed.', 'cobalt'); ?></h2>
	</div>
	<?php endif; ?>
</div>
