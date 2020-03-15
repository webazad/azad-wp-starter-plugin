<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function azad_scroll_top_default_settings(){
    $default_settings = array(
        'azad_scroll_top_enable'        => 1,
        'azad_scroll_top_type'          => 'icon',
        'azad_scroll_top_bg_color'      => '#00bfff',
        'azad_scroll_top_position'      => 'right',
        'azad_scroll_top_color'         => '#ffffff',
        'azad_scroll_top_radius'        => 'square',
        'azad_scroll_top_animation'     => 'fade',
        'azad_scroll_top_speed'         => 300,
        'azad_scroll_top_distance'      => 300,
        'azad_scroll_top_target'        => '',
        'azad_scroll_top_css'           => ''
    );
    return apply_filters('azad_scroll_top_default_settings',$default_settings);
}
function azad_scroll_top_get_plugin_settings($option = ''){
    $settings = get_option('azad_scroll_top_plugin_settings',azad_scroll_top_default_settings());
    return $settings[$option];
}
function azad_scroll_top_head(){ 
    $enable         = azad_scroll_top_get_plugin_settings('azad_scroll_top_enable');
    $radius         = azad_scroll_top_get_plugin_settings('azad_scroll_top_radius');
    $bg_color       = azad_scroll_top_get_plugin_settings('azad_scroll_top_bg_color');
    $icon_color     = azad_scroll_top_get_plugin_settings('azad_scroll_top_color');
    
    // Border Radius
    $scroll_radius = '0';
    if($radius === 'rounded'){
        $scroll_radius = '4px';
    }elseif($radius === 'circle'){
        $scroll_radius = '50%';
    }else{
        $scroll_radius = '0';
    }
    if($enable){
        echo "<style>
            #scrollUp {
                border-radius: $scroll_radius;
                background: $bg_color;
                color: $icon_color;
                font-size: 20px;
                border: 2px dotted white;
                box-sizing: content-box;
				transition: all .5s;
            }
			#scrollUp:hover {
                border-radius: $scroll_radius;
                background: $icon_color;
                color: $bg_color;
                font-size: 20px;
                border: 2px dotted $bg_color;
                box-sizing: content-box;
            }
        </style>";  
    }
}    
add_action('wp_head','azad_scroll_top_head');
function azad_scroll_top(){
    $enable         = azad_scroll_top_get_plugin_settings('azad_scroll_top_enable');
    $scroll_type    = '<span class="scroll-top"><i class="icon-up-open"></i></span>';
    $distance       = azad_scroll_top_get_plugin_settings('azad_scroll_top_distance');
    $speed          = absint(azad_scroll_top_get_plugin_settings('azad_scroll_top_speed'));
    $animation      = azad_scroll_top_get_plugin_settings('azad_scroll_top_animation');
    if($enable){
        echo "<script>
            // Parse URL Queries Method
            (function ($) {
                $(function () {
                        $.scrollUp({
                            //animation: $animation,
                            animationSpeed: 300,
                            scrollDistance: $distance,
                            scrollSpeed: $speed,
                            easingType: 'linear',
                            activeOverlay: false,
                            scrollText: '$scroll_type' 
                            //scrollTarget: true 
                        });
                    });
            })(jQuery);
        </script>";
    }    
}
add_action('wp_footer','azad_scroll_top');
function azad_scroll_top_scripts(){
    $enable = azad_scroll_top_get_plugin_settings('azad_scroll_top_enable');
    if($enable){
        wp_enqueue_style('azad-scroll-top-settings',plugins_url('assets/css/scroll-top.css',dirname(__FILE__)),array(),'0.0.0.1','all');
        wp_enqueue_script('azad-scroll-top-script',plugins_url('assets/js/jquery.scrollUp.min.js',dirname(__FILE__)),array("jquery"),'0.0.0.1',false);
    }
}
add_action('wp_enqueue_scripts','azad_scroll_top_scripts');



/**
*---------------------------------------------------
* = THE WAY TO CREATE PLUGIN SETTINGS LINKS...
*---------------------------------------------------
*/
function plugin_settings_links($links,$file){
	$this_plugin = dirname(plugin_basename(__FILE__));
	if(dirname($file) == $this_plugin){
		$settings_link = "<a href='options-general.php'>Settings</a>";
		$links[] = $settings_link;
	}
	return ($links);
}
add_filter('plugin_action_links','plugin_settings_links',10,2);
/**
*---------------------------------------------------
* = THE WAY TO CREATE PLUGIN LICENSE LINKS...
*---------------------------------------------------
*/
function plugin_license_links($links,$file){
	$this_plugin = dirname(plugin_basename(__FILE__));
	if(dirname($file) == $this_plugin){
		return array_merge(
			$links,
			array(
				'License' => '<a href="http://www.theinfotechs.com">License</a>'
				)
			);
	}
	return $links;
}
add_filter('plugin_row_meta','plugin_license_links', 10,2);
/**
*-------------------------------------------------------------------------
* = SOME DIFFERENT WAYS TO CALL EXTERNAL FILES IN WORDPRESS PLUGIN
*-------------------------------------------------------------------------
*/
/* 1:: the way to call external php file */
define( MY_CSS_PATH, plugin_dir_path(__FILE__).'/inc/decoration.php' );
if (file_exists(MY_CSS_PATH)){
		require_once(MY_CSS_PATH);
}
/* 2:: the way to call external php file */
if (file_exists(plugin_dir_path(__FILE__).'inc/decoration.php')){
		require_once(plugin_dir_path(__FILE__).'inc/decoration.php');
}
/* 3:: the way to call all php files to altogether */
foreach ( glob( plugin_dir_path( __FILE__ ) . "inc/*.php" ) as $file ) {
		include_once $file;
}
/**
*----------------------------------------------------------------------------------------
* = GOOGLE ANALYTICS...
*-----------------------------------------------------------------------------------------
*/
define( MY_PLUGIN_PATH, plugin_dir_path(__FILE__).'/inc/my-add-google-analytics.php' );
if (file_exists(MY_PLUGIN_PATH) && is_admin()){
		require_once(MY_PLUGIN_PATH);
}
/**
*--------------------------------------------------------------------------------------------
* = ACTION HOOKS...
*--------------------------------------------------------------------------------------------
*/
add_action('comment_post',function(){
	$email = get_bloginfo('admin_email');
	wp_mail(
		$email, 'New comment posted', 'A new comment has been left to your blog'
	);
});

function my_change_icon($args){
	$args['menu_icon'] = 'dashicons-vault';
	return $args;
}
add-filter('asdfasdfasdf','my_change_icon');
function my_change_label($plural){
	$plural = 'Bfasdfasdf';
	return $plural;
}
add-filter('asdfasdfasdf','my_change_label');

<?php
/**
*-----------------------------------------------------------
* = THE WAY TO ENQUEUE SCRIPTS IN PLUGIN FOR ADMIN PAGE
*-----------------------------------------------------------
*/
function my_enqueue_scripts(){
	wp_register_style( 'stylesheet', plugins_url('css/style.css',__FILE__), null, '1.0.0', 'all');
	wp_register_style( 'foo-styles',  plugin_dir_url( __FILE__ ) . 'assets/foo-styles.css' );
	wp_enqueue_style('stylesheet');
}
add_action('admin_enqueue_scripts','my_enqueue_scripts');

function my_enqueue_scripts(){
	wp_register_style( 'stylesheet', plugins_url('my_plugin/css/style.css'), null, '1.0.0', 'all');
	wp_enqueue_style('stylesheet');
}
add_action('admin_enqueue_scripts','my_enqueue_scripts');

function my_enqueue_scripts(){
	global $pagenow, $typenow;
	$screen = get_current_screen();
	if(($pagenow == 'post.php') || ($pagenow == 'post-new.php') && $typenow == 'job'){
		wp_enqueue_style('handle',plugins_url('css/admin-tiles.css',__FILE__).'array','version','media');
		wp_enqueue_script('handle',plugins_url('css/admin-tiles.js',__FILE__).'array','version','media');
	}
}
add_action('admin_enqueue_scripts','my_enqueue_scripts');


/**
*---------------------------------------------------
* = shortcode
*---------------------------------------------------
*/
add_shortcode('twitter', function($atts){
	return "<a href='twitter.com'>Twitter</a>";
});

/**
*---------------------------------------------------
* = TO CHANGE THE TITLE OF THE POST UPPERCASE.
*---------------------------------------------------
*/
add_filter('the_title',ucwords);

/**
*---------------------------------------------------
* = ADD GOOGLE ANALYTICS IN DASHBOARD..
*---------------------------------------------------
*/
function my_add_google_link(){
	global $wp_admin_bar;
	$args = array(
		'id' => 'google_analytics',
		'title' => 'Google Analytics',
		'href' => 'http://www.theinfotechs.com',
	);
	$wp_admin_bar->add_menu($args);
}
add_action('wp_before_admin_bar_render','my_add_google_link');

