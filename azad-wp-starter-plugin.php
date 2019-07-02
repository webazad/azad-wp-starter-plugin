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
defined('ABSPATH') || exit;