<?php
namespace Inc\Admin;
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Activator' ) ) :

    class Activator{
        public $countries = null;
        //public function __construct() {}
        public static function activator() {
            flush_rewrite_rules();
            if(get_option( 'alecaddd_plugin' )){
                return;
            }
            $default_settings = array(
                'cpt_manager'           => false,
                'taxonomy_manager'      => 1,
            );
            add_option( 'alecaddd_plugin', $default_settings );
        }
        //public function __destruct() {
    }
endif;