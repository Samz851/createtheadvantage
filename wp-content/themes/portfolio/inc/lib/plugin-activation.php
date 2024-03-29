<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
if(file_exists(get_template_directory().'/inc/lib/class-tgm-plugin-activation.php')){
require_once(get_template_directory().'/inc/lib/class-tgm-plugin-activation.php');

}

add_action( 'tgmpa_register', 'portfolio_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function portfolio_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		
		array(
				'name'         => 'Js-Composer', // The plugin name.
				'slug'         => 'js_composer', // The plugin slug (typically the folder name).
				'source'       => 'https://gitlab.com/mahib/vc-plugin/raw/master/js_composer.zip', // The plugin source.
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => ' ', // If set, overrides default API URL and points to an external URL.
		),
		array(
				'name'         => 'Rev-Slider', // The plugin name.
				'slug'         => 'rev_slider', // The plugin slug (typically the folder name).
				'source'       => 'https://gitlab.com/mahib/vc-plugin/raw/master/revslider.zip', // The plugin source.
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => ' ', // If set, overrides default API URL and points to an external URL.
		),
		array(
				'name'         => 'Theme-Elements', // The plugin name.
				'slug'         => 'theme-elements', // The plugin slug (typically the folder name).
				'source'       => 'https://gitlab.com/mahib/port-plugins/raw/master/theme-elements.zip', // The plugin source.
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => ' ', // If set, overrides default API URL and points to an external URL.
		),
		array(
				'name'         => 'Custom-Post', // The plugin name.
				'slug'         => 'custom-post', // The plugin slug (typically the folder name).
				'source'       => 'https://gitlab.com/mahib/pfolio-custom-post/raw/master/custom-post-type.zip', // The plugin source.
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => ' ', // If set, overrides default API URL and points to an external URL.
		),
		array(
				'name'         => 'About Author', // The plugin name.
				'slug'         => 'about-author', // The plugin slug (typically the folder name).
				'source'       => 'https://gitlab.com/mahib/port-author/raw/master/about-author.zip', // The plugin source.
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => ' ', // If set, overrides default API URL and points to an external URL.
		),
		array(
				'name'         => 'portfolio Demo Importer', // The plugin name.
				'slug'         => 'dt_demo_importer', // The plugin slug (typically the folder name).
				'source'       => 'https://gitlab.com/mahib/all-plugins/raw/master/portfolio_demo_importer.zip', // The plugin source.
				'required'     => true, // If false, the plugin is only 'recommended' instead of required.
				'external_url' => ' ', // If set, overrides default API URL and points to an external URL.
		),
		array(
			'name'      => 'Mailchimp for wp',
			'slug'      => 'mailchimp-for-wp',
			'required'  => true,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'      => 'Widget Settings Import Export',
			'slug'      => 'widget-settings-importexport',
			'required'  => true,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'portfolio',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
	);

	tgmpa( $plugins, $config );
}

add_action( 'vc_before_init', 'portfolio_vcSetAsTheme' );
			function portfolio_vcSetAsTheme() {
				vc_set_as_theme();
			}
