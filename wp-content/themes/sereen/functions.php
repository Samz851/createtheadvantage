<?php

add_action('wp_enqueue_scripts', 'enqueue_parent_styles');

function enqueue_parent_styles() 
{
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts', 'sereen_scripts');
function sereen_scripts() {
    
    // enqueue style
    wp_enqueue_style('sereen-style', get_stylesheet_uri());
    wp_enqueue_script('sereen-script', get_stylesheet_directory_uri() . '/js/custom.js');
    
    // enqueue script
    // wp_enqueue_script('sereen-script', get_template_directory_uri() .'/js/functions.js', array('jquery'), '20150825', true);
    
}

function sereen_remove_scripts() {
    wp_dequeue_style( 'portfolio_style' );
    wp_deregister_style( 'portfolio_style' );

    // Now register your styles and scripts here
}
add_action( 'wp_enqueue_scripts', 'sereen_remove_scripts', 20 );

// // Add login/out to menu
// add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );

// function add_loginout_link( $items, $args ) {

//    if (is_user_logged_in() && $args->theme_location == 'header_menu') {

//        $items .= '<li><a href="'. wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ) .'">Log Out</a></li>';

//    }

//    elseif (!is_user_logged_in() && $args->theme_location == 'header_menu') {

//        $items .= '<li><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">Log In</a></li>';

//    }

//    return $items;

// }

add_action( 'init', 'portfolio_post_type' );
/**
 * Register a Portfolio post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function portfolio_post_type() {
	$labels = array(
		'name'               => _x( 'Portfolios', 'post type general name', 'portfolio' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'portfolio' ),
		'menu_name'          => _x( 'Portfolios', 'admin menu', 'portfolio' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'portfolio' ),
		'add_new'            => _x( 'Add New', 'Portfolio', 'portfolio' ),
		'add_new_item'       => __( 'Add New Portfolio', 'portfolio' ),
		'new_item'           => __( 'New Portfolio', 'portfolio' ),
		'edit_item'          => __( 'Edit Portfolio', 'portfolio' ),
		'view_item'          => __( 'View Portfolio', 'portfolio' ),
		'all_items'          => __( 'All Portfolios', 'portfolio' ),
		'search_items'       => __( 'Search Portfolios', 'portfolio' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'portfolio' ),
		'not_found'          => __( 'No Portfolios found.', 'portfolio' ),
		'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'portfolio' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'portfolio' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'portfolio', $args );
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'portfolio_port_taxonomies', 0 );

// create two taxonomies, Categorys and writers for the post type "book"
function portfolio_port_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categorys', 'taxonomy general name', 'portfolio' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'portfolio' ),
		'search_items'      => __( 'Search Categorys', 'portfolio' ),
		'all_items'         => __( 'All Categorys', 'portfolio' ),
		'parent_item'       => __( 'Parent Category', 'portfolio' ),
		'parent_item_colon' => __( 'Parent Category:', 'portfolio' ),
		'edit_item'         => __( 'Edit Category', 'portfolio' ),
		'update_item'       => __( 'Update Category', 'portfolio' ),
		'add_new_item'      => __( 'Add New Category', 'portfolio' ),
		'new_item_name'     => __( 'New Category Name', 'portfolio' ),
		'menu_name'         => __( 'Category', 'portfolio' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'port_category' ),
	);

	register_taxonomy( 'port_category', array( 'portfolio' ), $args );
	
}

// Remove programs from blogs
function exclude_category( $query ) {
	if ( $query->is_home() ) {
	$query->set( 'cat', '-204', '-261' );
	}
	}
	add_action( 'pre_get_posts', 'exclude_category' );
	
if ( function_exists('register_sidebar') )
	register_sidebar(array(
	  'name' => 'footer one',
	  'before_widget' => '<div class = "widgetizedArea">',
	  'after_widget' => '</div>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	)
  );
  if ( function_exists('register_sidebar') )
	register_sidebar(array(
	  'name' => 'footer two',
	  'before_widget' => '<div class = "widgetizedArea">',
	  'after_widget' => '</div>',
	  'before_title' => '<h3>',
	  'after_title' => '</h3>',
	)
  );
//   //* TN - Remove Query String from Static Resources
// function remove_css_js_ver( $src ) {
// 	if( strpos( $src, '?ver=' ) )
// 	$src = remove_query_arg( 'ver', $src );
// 	return $src;
// 	}
// 	add_filter( 'style_loader_src', 'remove_css_js_ver', 10, 2 );
// 	add_filter( 'script_loader_src', 'remove_css_js_ver', 10, 2 ); 
  