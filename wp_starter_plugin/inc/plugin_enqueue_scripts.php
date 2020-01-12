<?php
/**
*-----------------------------------------------------------
* = THE WAY TO ENQUEUE SCRIPTS IN PLUGIN FOR ADMIN PAGE
*-----------------------------------------------------------
*/
function my_enqueue_scripts(){
	wp_register_style( 'stylesheet', plugins_url('css/style.css',__FILE__), null, '1.0.0', 'all');
	wp_register_style( 'foo-styles',  plugin_dir_url( __FILE__ ) . 'assets/foo-styles.css' );
	wp_enqueue_style('stylesheet');
}
add_action('admin_enqueue_scripts','my_enqueue_scripts');

function my_enqueue_scripts(){
	wp_register_style( 'stylesheet', plugins_url('my_plugin/css/style.css'), null, '1.0.0', 'all');
	wp_enqueue_style('stylesheet');
}
add_action('admin_enqueue_scripts','my_enqueue_scripts');

function my_enqueue_scripts(){
	global $pagenow, $typenow;
	$screen = get_current_screen();
	if(($pagenow == 'post.php') || ($pagenow == 'post-new.php') && $typenow == 'job'){
		wp_enqueue_style('handle',plugins_url('css/admin-tiles.css',__FILE__).'array','version','media');
		wp_enqueue_script('handle',plugins_url('css/admin-tiles.js',__FILE__).'array','version','media');
	}
}
add_action('admin_enqueue_scripts','my_enqueue_scripts');
