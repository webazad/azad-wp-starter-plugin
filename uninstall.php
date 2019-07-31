<?php
if(! defined('WP_UNINSTALL_PLUGIN')){
	die('asdf');
}
/*
// Clear the data stored...
$books = get_posts(
	array(
		'post_type'		=>'book',
		'numberposts'	=>-1
	);
);
foreach($books as $book){
	wp_delete_post($book->ID,true);
}

*/
/*
// Clear the data stored...
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type = `book`");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN SELECT(SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN SELECT(SELECT id FROM wp_posts)");
*/