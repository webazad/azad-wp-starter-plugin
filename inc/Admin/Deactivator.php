<?php
namespace Inc\Admin;
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Deactivator' ) ) :

    class Deactivator{
        //public $countries = null;
        //public function __construct() {}
        public static function deactivator() {
            delete_option('alecaddd_plugin');
        }
        //public function __destruct() {}
    }
	
endif;