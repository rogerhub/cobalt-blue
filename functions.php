<?php
/**
 * Functions for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */

/**
 * Section
 * WordPress Core Hooks
 */

/**
 * Sets the content width for this theme. This value is mostly irrelevant because CSS takes care of the rest.
 */
if (!isset($content_width)) $content_width = 900;

/**
 * Registers theme support abilities
 */
function cobalt_after_theme_setup() {
	add_theme_support('automatic-feed-links');
	add_theme_support('custom-header', array('default-image' => get_template_directory_uri() . '/default-header.png'));
	add_theme_support('post-formats', array('audio',));
	add_theme_support('post-thumbnails');
	register_nav_menu('primary', 'The primary header navigation menu');
	add_editor_style();
}
add_action('after_setup_theme', 'cobalt_after_theme_setup');

/**
 * Enqueues required stylesheets and javascript
 */
function cobalt_wp_enqueue_script() {
	wp_register_style('cobalt-google-font', '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic|Droid+Sans+Mono|Bitter:400,700&subset=latin,latin-ext');
	wp_register_style('cobalt-theme', get_stylesheet_uri(), array('cobalt-google-font'), filemtime(get_template_directory() . '/style.css'));
	wp_enqueue_script('comment-reply');

	if (!is_admin()) {
		wp_enqueue_style('cobalt-theme');
	}
}
add_action('wp_enqueue_scripts', 'cobalt_wp_enqueue_script');

/**
 * Registers widget sidebars
 */
function cobalt_widgets_init() {
	register_sidebar(array(
		'name' => __('Main Sidebar', 'cobalt'),
		'id' => 'sidebar-1',
		'description' => __('Appears on the right side of all posts and pages.', 'cobalt'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
}
add_action('widgets_init', 'cobalt_widgets_init');

/**
 * Creates a nicely formatted title element text
 */
function cobalt_wp_title($title, $sep) {
	global $paged, $page;

	if (is_feed()) {
		return $title;
	}

	$title .= get_bloginfo('name');
	if (($site_description = get_bloginfo('description', 'display')) && (is_home() || is_front_page())) {
			$title .= " $sep $site_description";
	}

	if ($paged >= 2 || $page >= 2) {
		$title .= " $sep " . sprintf(__('Page %s', 'cobalt'), max($paged, $page));
	}

	return $title;
}
add_filter('wp_title', 'cobalt_wp_title', 10, 2);

/**
 * Section
 * View helpers
 */
/**
 * Prints out post meta data
 */
function cobalt_entry_meta() {
	global $post;
	if (is_page()) { return; }
	$categories = get_the_category_list(__(', ', 'cobalt'));
	$tags = get_the_tag_list('', __(', ', 'cobalt'));

	printf('<span class="date-link"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>', esc_attr(get_permalink()), esc_attr(get_the_time()), esc_attr(get_the_time('c')), esc_html(get_the_date()));
	if ($categories) {
		printf('<span class="category-links">%s</span>', $categories);
	}
	if ($tags) {
		printf('<span class="tags-links">%s</span>', $tags);
	}
	printf('<span class="author-link vcard"><a href="%1$s" title="%2$s" rel="author">%3$s</a></span>', esc_attr(get_author_posts_url(get_the_author_meta('ID'))), esc_attr(sprintf(__('View all posts by %s', 'cobalt'), get_the_author())), esc_html(get_the_author()));
}
/**
 * Prints out older/newer navigation in The Loop
 */
function cobalt_content_nav($html_id) {
	global $wp_query;

	if ($wp_query->max_num_pages > 1) {
		printf('<nav id="%s" class="navigation nav-below" role="navigation">', esc_attr($html_id));
		printf('<h3 class="assistive-text">%s</h3>', __('Post navigation', 'cobalt'));
		echo '<div class="nav-next alignleft">';
		previous_posts_link(__('<span class="meta-nav">&larr;</span> Back', 'cobalt'));
		echo '</div>';
		echo '<div class="nav-previous alignright">';
		next_posts_link(__('More <span class="meta-nav">&rarr;</span>', 'cobalt'));
		echo '</div>';
		echo '<div class="clear-fix"></div>';
		echo '</nav>';
	}
}
/**
 * Prints out pagination in The Loop
 */
function cobalt_content_page() {
	echo paginate_links();
}
/**
 * Prints out the colophon
 */
function cobalt_colophon() {
	echo '<footer id="colophon" role="contentinfo"><div class="site-info">';
	printf('%1$s<a href="%2$s" title="%3$s">%4$s</a> %5$s <a href="%6$s">%7$s</a>%8$s',
		esc_html(__("Proudly powered by ", 'cobalt')),
		esc_attr(__('http://wordpress.org/', 'cobalt')),
		esc_attr(__('Semantic Personal Publishing Platform', 'cobalt')),
		esc_html(__("WordPress", 'cobalt')),
		esc_html(__("with the", 'cobalt')),
		esc_attr(__('http://code.rogerhub.com', 'cobalt')),
		esc_html(__('Cobalt Blue Theme', 'cobalt')),
		esc_html(_x('.', 'Period after footer', 'cobalt'))
	);
	echo '</div></footer>';
}
/**
 * Prints out the title of the archive
 */
function cobalt_archive_title() {
	// Note: Author case is handled by author.php
	if (is_day()) {
		printf(__('Daily Archives: <span>%s</span>', 'cobalt'), get_the_date());
	} else if (is_month()) {
		printf(__('Monthly Archives: <span>%s</span>', 'cobalt'), get_the_date('F Y'));
	} else if (is_year()) {
		printf(__('Yearly Archives: <span>%s</span>', 'cobalt'), get_the_date('Y'));
	} else if (is_tag()) {
		printf(__('Posts Tagged: <span>%s</span>', 'cobalt'), single_tag_title('', false));
	} else {
		printf(__('Blog Archives', 'cobalt'));
	}
}
/**
 * Prints out comments
 */
function cobalt_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback':
	case 'trackback': ?>
		<li <?php comment_class(); ?>>
			<p><?php _e( 'Pingback:', 'cobalt' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __('(Edit)', 'cobalt'), '<span class="comment-edit-link">', '</span>' ); ?></p>
		</li>
		<?php break;
	default: global $post; ?>		
		<li <?php comment_class(); ?> id="comment-<?php comment_id(); ?>">
			<p class="comment-reply">
				<?php edit_comment_link( __( 'Edit', 'cobalt' ), '', ' ' ); ?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'cobalt' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</p>
			<header class="comment-meta comment-author vcard">
				<?php echo get_avatar( $comment, 40); ?>
				<?php printf('<cite class="fn comment-author">%1$s%2$s</cite>', get_comment_author_link(), 
				( $comment->user_id === $post->post_author ) ? '<span class="bypostauthor"> ' . __( 'Post author', 'cobalt' ) . '</span>' : '' ); ?>
				<?php printf('<a href="%1$s"><time datetime="%2$s" class="comment-time">%3$s</time></a>',
					esc_url( get_comment_link( $comment->comment_ID ) ),
					get_comment_time( 'c' ),
					sprintf( __( '%1$s at %2$s', 'cobalt' ), get_comment_date(), get_comment_time() )
				); ?>
			</header>
			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation">Your comment is awaiting moderation</p>
			<?php endif; ?>
			<section class="comment-content comment">
				<?php comment_text(); ?>
			</section>
		</li>
		<?php break;
	endswitch;

}
