<?php
/**
 * Displays the header menu for Cobalt Blue WordPress Theme
 *
 * @package Cobalt
 */

wp_nav_menu(array(
	'theme_location' => 'primary',
	'menu_class' => 'dropdown-menu',
	'fallback_cb' => false,
));
?>

