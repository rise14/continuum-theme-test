<?php //load template actions

//get the feed panel
function con_get_feed() {
do_action( 'con_get_feed' );
if ( file_exists( TEMPLATEPATH . '/inc/feed.php') )
	load_template( TEMPLATEPATH . '/inc/feed.php');
}

//get category listing
function con_get_category() {
do_action( 'con_get_category' );
if ( file_exists( TEMPLATEPATH . '/inc/category.php') )
	load_template( TEMPLATEPATH . '/inc/category.php');
}

//get archive listing
function con_get_archive() {
do_action( 'con_get_archive' );
if ( file_exists( TEMPLATEPATH . '/inc/archive.php') )
	load_template( TEMPLATEPATH . '/inc/archive.php');
}

//get search results
function con_get_search() {
do_action( 'con_get_search' );
if ( file_exists( TEMPLATEPATH . '/inc/search.php') )
	load_template( TEMPLATEPATH . '/inc/search.php');
}

//get sharebox
function con_get_sharebox() {
do_action( 'con_get_sharebox' );
if ( file_exists( TEMPLATEPATH . '/inc/sharebox.php') )
	load_template( TEMPLATEPATH . '/inc/sharebox.php');
}

//get social links
function con_get_social() {
do_action( 'con_get_social' );
if ( file_exists( TEMPLATEPATH . '/inc/social.php') )
	load_template( TEMPLATEPATH . '/inc/social.php');
}

//get comments
function con_get_comments() {
do_action( 'con_get_comments' );
if ( file_exists( TEMPLATEPATH . '/inc/con-comments.php') )
	load_template( TEMPLATEPATH . '/inc/con-comments.php');
}

?>