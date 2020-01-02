<?php 

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 if( is_plugin_active( 'dt_demo_importer/init.php' )){

	$settings      = array(
	  'menu_title'  => esc_html__('Demo Importer', 'portfolio'),
	  'menu_type'   => 'menu',
	  'menu_slug'   => 'dt_demo_importer',
	);
	$options        = array(
		'demo-1' => array(
		  'title'         => esc_html__('Demo 1', 'portfolio'),
		  'preview_url'   => 'http://google.com/',
		  'front_page'    => 'Home',
		  'blog_page'     => 'Blog',
		  'menus'         => array(
				'header_menu' => esc_html__('Header Menu','portfolio'),
			)
		),				
	);
	DT_Demo_Importer::instance($settings, $options);
}