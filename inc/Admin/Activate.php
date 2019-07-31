<?php
namespace Inc\Admin;
// EXIT IF ACCESSED DIRECTLY
defined('ABSPATH') || exit;

if ( ! class_exists( 'Activate' ) ) :

    class Activate{
        public $countries = null;
        //public function __construct() {}
        public static function activate() {
            flush_rewrite_rules();
            if(get_option('alecaddd_plugin')){
                return;
            }
            $default_settings = array(
                'cpt_manager'           => false,
                'taxonomy_manager'      => 1,
                'media_widget'          => false,
                'gallery_manager'       => 1,
                'testimonial_manager'   => 1,
                'templates_manager'     => 1,
                'login_manager'         => 1,
                'membership_manager'    => 1,
                'chat_manager'          => 1,
            );
            add_option('alecaddd_plugin',$default_settings);
        }
        //public function __destruct() {
    }
endif;