<?php
namespace Inc;

// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;
if ( ! class_exists( 'Installer' ) ):

     final class Installer{
         public $plugin_basename;
         public function __construct() {}
        public static function create_tables() {
            
        }
        private static function add_version() {
            update_option( 'azad_wp_starter_plugin_version', AZAD_WP_STARTER_PLUGIN_VERSION );
        }
        public function __destruct() {}
    }
    
endif;