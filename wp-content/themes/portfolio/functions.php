<?php
if(file_exists(get_template_directory().'/inc/enqueue.php')){
require_once(get_template_directory().'/inc/enqueue.php');
}
if(file_exists(get_template_directory().'/theme-options/cs-framework.php')){
require_once(get_template_directory().'/theme-options/cs-framework.php');
}
if(file_exists(get_template_directory().'/inc/theme_support.php')){
require_once(get_template_directory().'/inc/theme_support.php');
}
if(file_exists(get_template_directory().'/inc/wp-bootstrap-navwalker.php')){
require_once(get_template_directory().'/inc/wp-bootstrap-navwalker.php');
}
if(file_exists(get_template_directory().'/inc/comments_style.php')){
require_once(get_template_directory().'/inc/comments_style.php');
}
if(file_exists(get_template_directory().'/inc/custom_breadcrumbs.php')){
require_once(get_template_directory().'/inc/custom_breadcrumbs.php');
}
if(file_exists(get_template_directory().'/inc/custom_widget.php')){
require_once(get_template_directory().'/inc/custom_widget.php');
}
if(file_exists(get_template_directory().'/inc/lib/plugin-activation.php')){
require_once(get_template_directory().'/inc/lib/plugin-activation.php');
}
 if(file_exists(get_template_directory().'/inc/theme-options.php')) {
	require_once(get_template_directory().'/inc/theme-options.php');
} 
if(file_exists(get_template_directory().'/inc/flaticon.php')){
	require_once(get_template_directory().'/inc/flaticon.php');
}
 if(file_exists(get_template_directory().'/inc/demo-importer.php')) {
	require_once(get_template_directory().'/inc/demo-importer.php');
}
 if(file_exists(get_template_directory().'/inc/custom_color.php')) {
	require_once(get_template_directory().'/inc/custom_color.php');
}
/*	- This Is For Admin Header Style
=======================================================*/
function portfolio_admin_style() {
		wp_enqueue_style(
			'portfolio-admin-css',
			get_template_directory_uri() . '/assets/css/custom_script.css'
		);
			$custom_css = "
							@media screen and (max-width: 782px){
							#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon,#wpadminbar .ab-icon, #wpadminbar .ab-item:before, #wpadminbar>#wp-toolbar>#wp-admin-bar-root-default .ab-icon {
								height: 19px !important;
								}
							html #wpadminbar {
									height: 46px;
									min-width: 100%;
								}
								}
							@media screen and  (max-width: 600px){
								#wpadminbar {
									position: fixed!important;
									}
								}
							@media screen and (max-width: 840px){
								#wpadminbar, #wpadminbar * {
									font-size: 12px;
									font-weight: 400;
									line-height: 32px;
								}
								}	
							
								";
    wp_add_inline_style( 'portfolio-admin-css', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'portfolio_admin_style' );
//for search
function portfolio_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','portfolio_search_filter');

// add_action( 'init', 'portfolio_post_type' );
/**
 * Register a Portfolio post type.
 *
  * @link http://codex.wordpress.org/Function_Reference/register_post_type
  */
// function portfolio_post_type() {
// 	$labels = array(
// 		'name'               => _x( 'Portfolios', 'post type general name', 'portfolio' ),
// 		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'portfolio' ),
// 		'menu_name'          => _x( 'Portfolios', 'admin menu', 'portfolio' ),
// 		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'portfolio' ),
// 		'add_new'            => _x( 'Add New', 'Portfolio', 'portfolio' ),
// 		'add_new_item'       => __( 'Add New Portfolio', 'portfolio' ),
// 		'new_item'           => __( 'New Portfolio', 'portfolio' ),
// 		'edit_item'          => __( 'Edit Portfolio', 'portfolio' ),
// 		'view_item'          => __( 'View Portfolio', 'portfolio' ),
// 		'all_items'          => __( 'All Portfolios', 'portfolio' ),
// 		'search_items'       => __( 'Search Portfolios', 'portfolio' ),
// 		'parent_item_colon'  => __( 'Parent Portfolios:', 'portfolio' ),
// 		'not_found'          => __( 'No Portfolios found.', 'portfolio' ),
// 		'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'portfolio' )
// 	);

// 	$args = array(
// 		'labels'             => $labels,
//         'description'        => __( 'Description.', 'portfolio' ),
// 		'public'             => true,
// 		'publicly_queryable' => true,
// 		'show_ui'            => true,
// 		'show_in_menu'       => true,
// 		'query_var'          => true,
// 		'rewrite'            => array( 'slug' => 'portfolio' ),
// 		'capability_type'    => 'post',
// 		'has_archive'        => true,
// 		'hierarchical'       => false,
// 		'menu_position'      => null,
// 		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
// 	);

// 	register_post_type( 'portfolio', $args );
// }

// hook into the init action and call create_book_taxonomies when it fires
// add_action( 'init', 'portfolio_port_taxonomies', 0 );

// // create two taxonomies, Categorys and writers for the post type "book"
// function portfolio_port_taxonomies() {
// 	// Add new taxonomy, make it hierarchical (like categories)
// 	$labels = array(
// 		'name'              => _x( 'Categorys', 'taxonomy general name', 'portfolio' ),
// 		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'portfolio' ),
// 		'search_items'      => __( 'Search Categorys', 'portfolio' ),
// 		'all_items'         => __( 'All Categorys', 'portfolio' ),
// 		'parent_item'       => __( 'Parent Category', 'portfolio' ),
// 		'parent_item_colon' => __( 'Parent Category:', 'portfolio' ),
// 		'edit_item'         => __( 'Edit Category', 'portfolio' ),
// 		'update_item'       => __( 'Update Category', 'portfolio' ),
// 		'add_new_item'      => __( 'Add New Category', 'portfolio' ),
// 		'new_item_name'     => __( 'New Category Name', 'portfolio' ),
// 		'menu_name'         => __( 'Category', 'portfolio' ),
// 	);

// 	$args = array(
// 		'hierarchical'      => true,
// 		'labels'            => $labels,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		'rewrite'           => array( 'slug' => 'port_category' ),
// 	);

// 	register_taxonomy( 'port_category', array( 'portfolio' ), $args );
	
// }

//Add admin ui
include_once dirname(__file__) . '/theme-options-ui/admin-ui.php';