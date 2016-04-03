<?php
/**
 * Can, The Whole Functions
 *
 * @package can
 */

// Title Tag
add_theme_support( 'title-tag' );

// Gallery Styles Suck
add_filter( 'use_default_gallery_style', '__return_false' );

// Nav Menu
register_nav_menus( array(
	'primary'  => __( 'Header', 'can' )
) );

// Scripts
function can_scripts() {
	wp_enqueue_style( 'can-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'can_scripts', 9 );
