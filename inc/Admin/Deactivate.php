<?php
namespace Inc\Admin;
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Deactivate' ) ) :

    class Deactivate{
        //public $countries = null;
        //public function __construct() {}
        public static function deactivate() {
            delete_option('alecaddd_plugin');
        }
        //public function __destruct() {}
    }
	
endif;