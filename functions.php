<?php

// CONSTANTS

define( 'WP_SITE_URL', get_bloginfo('url') );
define( 'WP_THEME_URL', get_bloginfo( 'stylesheet_directory' ) );
define( 'WP_TODAY', date('Y_m_d',strtotime('00:00:00')));

// POST THUMBNAILS

add_theme_support('post-thumbnails');
add_theme_support('post-thumbnails', array('post', 'page'));
set_post_thumbnail_size( 512, 512, false );
add_image_size( '2x', 1024, 1024, false );
add_image_size( '4x', 2048, 2048, false );
add_image_size( 'square-large', 512, 512, true );
add_image_size( 'square-medium', 256, 256, true );
add_image_size( 'square-small', 128, 128, true );

// INCLUDES

include 'inc/markdown.php';
include 'inc/wrapping.php';
//include 'inc/post-types.php';
//include 'inc/taxonomies.php';

// REGISTER MENU

function register_main_menu() {
  register_nav_menu('main-menu',__( 'Menu Principal' ));
}
add_action( 'init', 'register_main_menu' );

// REMOVE ADMIN BAR

// add_filter('show_admin_bar', '__return_false');

// TITLE FILTER

function wp_title_filter( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	
	global $page, $paged;

	// Add the blog name
	$title = get_bloginfo( 'name', 'display' ) . " " . $title;

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Pag. %s', '_s' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'wp_title_filter', 10, 2 );


// MARKDOWN

function parse_markdown($my_text){
	$my_text = Markdown($my_text);
	return parse_special($my_text);
}

?>