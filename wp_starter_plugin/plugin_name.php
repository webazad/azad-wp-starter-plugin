<?php
/*
*---------------------------------------------------
Plugin Name: wp_starter_plugin
Plugin URI: http://www.theinfotechs.com
Description: Just for demo perposes.
Version: 1:0:0
Author: Md. Abu Kalam Azad
Author URI: http://www.theinfotechs.com
License: GPLv2 or later
License URI: http://www.theinfotechs.com/wordpress
Copyright 2016 Md. Abul Kalam Azad akazad7600@yahoo.com
This program is free software; 
you can redistribute it and/or modify it under the terms of the GNU General Public License, 
version 2, as published by the free software foundation.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
without even the implied warranty
*---------------------------------------------------
*/
/**
*---------------------------------------------------
* = THE WAY TO CREATE PLUGIN SETTINGS LINKS...
*---------------------------------------------------
*/
function plugin_settings_links($links,$file){
	$this_plugin = dirname(plugin_basename(__FILE__));
	if(dirname($file) == $this_plugin){
		$settings_link = "<a href='options-general.php'>Settings</a>";
		$links[] = $settings_link;
	}
	return ($links);
}
add_filter('plugin_action_links','plugin_settings_links',10,2);
/**
*---------------------------------------------------
* = THE WAY TO CREATE PLUGIN LICENSE LINKS...
*---------------------------------------------------
*/
function plugin_license_links($links,$file){
	$this_plugin = dirname(plugin_basename(__FILE__));
	if(dirname($file) == $this_plugin){
		return array_merge(
			$links,
			array(
				'License' => '<a href="http://www.theinfotechs.com">License</a>'
				)
			);
	}
	return $links;
}
add_filter('plugin_row_meta','plugin_license_links', 10,2);
/**
*-------------------------------------------------------------------------
* = SOME DIFFERENT WAYS TO CALL EXTERNAL FILES IN WORDPRESS PLUGIN
*-------------------------------------------------------------------------
*/
/* 1:: the way to call external php file */
define( MY_CSS_PATH, plugin_dir_path(__FILE__).'/inc/decoration.php' );
if (file_exists(MY_CSS_PATH)){
		require_once(MY_CSS_PATH);
}
/* 2:: the way to call external php file */
if (file_exists(plugin_dir_path(__FILE__).'inc/decoration.php')){
		require_once(plugin_dir_path(__FILE__).'inc/decoration.php');
}
/* 3:: the way to call all php files to altogether */
foreach ( glob( plugin_dir_path( __FILE__ ) . "inc/*.php" ) as $file ) {
		include_once $file;
}
/**
*----------------------------------------------------------------------------------------
* = GOOGLE ANALYTICS...
*-----------------------------------------------------------------------------------------
*/
define( MY_PLUGIN_PATH, plugin_dir_path(__FILE__).'/inc/my-add-google-analytics.php' );
if (file_exists(MY_PLUGIN_PATH) && is_admin()){
		require_once(MY_PLUGIN_PATH);
}
/**
*--------------------------------------------------------------------------------------------
* = ACTION HOOKS...
*--------------------------------------------------------------------------------------------
*/
add_action('comment_post',function(){
	$email = get_bloginfo('admin_email');
	wp_mail(
		$email, 'New comment posted', 'A new comment has been left to your blog'
	);
});
?>
