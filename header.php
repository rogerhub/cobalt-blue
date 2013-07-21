<?php
/**
 * Header for Cobalt Blue WordPress theme
 *
 * @package Cobalt
 */

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php wp_title('&raquo; ', true, 'right'); ?></title>
		<?php wp_head(); ?>
	</head>
		<body <?php body_class(); ?>>
		<div id="page" class="hfeed site">
			<header class="site-header <?php if ((!is_home() && !is_front_page()) || $paged > 1) { ?>site-header-small<?php } ?>" role="banner">
			<?php if ($header_image = get_header_image()) { ?><div class="site-logo"><img class="site-logo-icon" src="<?php echo $header_image; ?>" title="<?php bloginfo('name'); ?>" alt="<?php bloginfo('name'); ?>" /></div><?php } ?>
				<div class="site-name"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></div>
				<div class="site-description"><?php bloginfo('description'); ?></div>
				<?php if ((is_home() || is_front_page()) && $paged <= 1) { get_template_part('partial-menu'); } ?>
			</header>
			<div id="main" class="wrapper">
