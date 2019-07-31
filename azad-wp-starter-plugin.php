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
// EXIT IF ACCESSED DIRECTLY
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
// FIFTH WAY
if(! defined('ABSPATH')){
    die('write the message here...');
}
// SIXTH WAY
if ( ! defined( 'WPINC' ) ) {
	die;
}
// SEVENTH WAY
defined('ABSPATH') || exit;
// EIGHTH WAY
if(! defined('ABSPATH')) exit;
// NINETH WAY
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }
// TENTH WAY
if(! function_exists('add_action')){
	die();
}

use Inc\Admin\Activate;
use Inc\Admin\Deactivate;
// use Inc\Admin\Uninstall;

function activate_azad(){
    Activate::activate();
}
register_activation_hook(__FILE__,'activate_azad');

function deactivate_aazad(){
    Deactivate::deactivate();
}
register_deactivation_hook(__FILE__,'deactivate_aazad');

// function uninstall_azad(){
//     Uninstall::uninstall();
// }
// register_uninstall_hook(__FILE__,'uninstall_azad');

if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if ( class_exists( 'Inc\\Init' ) ) :    
    Inc\Init::register_services();
endif;


define( 'BOILERPLATE_VERSION', '1.0.0' );

if(class_exists('Azad_WP_Starter_Plugin')){
    final class Azad_WP_Starter_Plugin{
		public static $instance = null;
        public function __construct(){
			add_action('plugins_loaded',array($this,'constants'),1);
            add_action('plugins_loaded',array($this,'i18n'),2);
            add_action('plugins_loaded',array($this,'includes'),3);
            add_action('plugins_loaded',array($this,'admin'),4);
            add_action('admin_enqueue_scripts',array($this,'azad_admin_acripts'));
            add_action('wp_enqueue_scripts',array($this,'azad_public_acripts'));
        }
        public function constants(){}
        public function i18n(){}
		public function includes(){
			require_once(plugin_dir_path(__FILE__).'/admin/Azad_Display.php');
		}
		public function azad_admin(){}
		public function azad_public(){
			$instance = call_user_func(array(get_class($GLOBALS['azad_public']),'_get_instance'));
            $instance->azad_footer();
		}
		public function azad_admin_acripts(){
			
			wp_register_style('id','url','dep','version','bool');
            wp_register_style('id',plugins_url(''),'dep','version','bool');
            wp_register_style('id','url','dep','version','bool');
            wp_enqueue_style('id');
            wp_register_script('id','url','dep','version','bool');
            wp_register_script('id',plugins_url(''),'dep','version','bool');
            wp_enqueue_script('id');
			
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
if(! function_exists('load_azad_wp_starter_plugin')){
    function load_azad_wp_starter_plugin(){
        return Azad_WP_Starter_Plugin::_get_instance();
    }
}
$GLOBALS['load_azad_wp_starter_plugin'] = load_azad_wp_starter_plugin();


register_activation_hook(__FILE__,array('AlicadddPlugin','activate_plugin'));
register_deactivation_hook(__FILE__,array('AlicadddPlugin','deactivate_plugin'));
register_uninstall_hook(__FILE__,array('AlicadddPlugin','uninstall_plugin'));
