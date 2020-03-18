<?php
namespace Inc\Admin;
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Activator' ) ) :

    class Activator{
        public $countries = null;
        //public function __construct() {}
        public static function activate() {
            flush_rewrite_rules();
            if(get_option( 'alecaddd_plugin' )){
                return;
            }
            $default_settings = array(
                'cpt_manager'           => false,
                'taxonomy_manager'      => 1,
            );
            add_option( 'alecaddd_plugin', $default_settings );
			
			set_transient( '_welcome_redirect_ass', true, 60 );
        }
        //public function __destruct() {
    }
endif;