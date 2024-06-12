<?php
require_once get_theme_file_path('/inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'hookah_register_required_plugins' );
function hookah_register_required_plugins() {
	$plugins = array(        
		// Add CMB2 plugin. Userd for Create Extra New Field in .
        array(
            'name'      => 'Codexse',
            'slug'      => 'codexse',
            'source'    => get_theme_file_path('/lib/plugins/codexse.zip'),
            'required'  => false
        ),
        array(
            'name'      => 'Classic Editor',
            'slug'      => 'classic-editor',
            'required'  => false
        ),
        array(
            'name'      => 'Elementor Page Builder',
            'slug'      => 'elementor',
            'required'  => false
        ),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false
        )
	);

	$config = array(
		'id'           => 'hookah',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}