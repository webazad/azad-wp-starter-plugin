<?php
/*AZAD*/
function azad_theme_option() {
	add_menu_page( 'Theme Option', 'Theme Option', 'manage_options', 'theme_option', 'azad_theme_option_page', null, 50 );
}
add_action( 'admin_menu', 'azad_theme_option' );
function azad_theme_option_page() { ?>
    <div class='wrap'>
        <form action="options.php" method="POST">
            <?php settings_fields( 'general-settings-group' ); ?>
            <?php do_settings_sections( 'theme_option' ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
<?php    
}
function azad_admin_init() {
    register_setting( 'general-settings-group', 'full_name', array() );
    add_settings_section( 'general-settings-section', 'General Option', 'general_section', 'theme_option' );
    add_settings_field( 'full-name', 'full name', 'for_name', 'theme_option', 'general-settings-section', array() );
}
add_action( 'admin_init', 'azad_admin_init' );
function general_section() {
    echo "General Section";
}
function for_name() {
    echo get_option( 'full_name' );
}
