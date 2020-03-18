<?php
namespace Inc\Admin;
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Deactivator' ) ) :

    class Deactivator{
        //public $countries = null;
        //public function __construct() {}
        public static function deactivate() {
            delete_option('alecaddd_plugin');
			delete_transient( '_welcome_redirect_ass' );
        }
        //public function __destruct() {}
    }
	
endif;