<?php
/* 
Plugin Name: Azad WP Starter Plugin
Description: Description will go here...
Plugin URi: gittechs.com/plugin/azad-wp-starter-plugin 
Author: Md. Abul Kalam Azad
Author URI: gittechs.com/author
Author Email: webdevazad@gmail.com
Version: 0.0.0.1
Text Domain: azad-wp-starter-plugin
*/ 
// SOME WAYS TO WRITE DENY CODE
// FIRST WAY
if(! defined('ABSPATH')){
    exit;
}
// SECOND WAY
if(! defined('ABSPATH')){
    exit();
}
// THIRD WAY
if(! defined('ABSPATH')){
    exit('write the message here...');
}
// FOURTH WAY
if(! defined('ABSPATH')){
    die();
}
// FOURTH WAY
if(! defined('ABSPATH')){
    die('write the message here...');
}
// FIFTH WAY
if ( ! defined( 'WPINC' ) ) {
	die;
}
// SIXTH WAY
defined('ABSPATH') || exit;
/**
 * Currently plugin version.
 * Start at version 1.0.0
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BOILERPLATE_VERSION', '1.0.0' );