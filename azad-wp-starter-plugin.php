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

if(class_exists('Azad_Nice_Scroll')){
    final class Azad_Nice_Scroll{
		public static $instance = null;
        public function __construct(){
            add_action('admin_enqueue_scripts',array($this,'azad_admin_acripts'));
            add_action('wp_enqueue_scripts',array($this,'azad_public_acripts'));
        }
        public function includes(){
			
        }
		public function init(){
			
        }
		public function azad_admin_acripts(){
			wp_register_script( 'azad-nice-scroll', plugins_url( 'js/nicescroll.js', __FILE__ ), 'jquery', 1.0, true );
            wp_enqueue_script('jquery');
            wp_enqueue_script('azad-nice-scroll');
        }
        public function azad_public_acripts(){
			wp_register_script( 'azad-nice-scroll', plugins_url( 'js/nicescroll.js', __FILE__ ), 'jquery', 1.0, true );
            wp_enqueue_script('jquery');
            wp_enqueue_script('azad-nice-scroll');
        }
        public static function _get_instance(){
            if(is_null(self::$instance) && ! isset(self::$instance) && ! (self::$instance instanceof self)){
                self::$instance = new self();            
            }
            return self::$instance;
        }
        public function __destruct(){}
    }
}
if(! function_exists('load_azad_nice_scroll')){
    function load_azad_nice_scroll(){
        return Azad_Nice_Scroll::_get_instance();
    }
}
$GLOBALS['load_azad_nice_scroll'] = load_azad_nice_scroll();
