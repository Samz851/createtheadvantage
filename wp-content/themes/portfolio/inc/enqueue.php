<?php
/*-----------------------------------------------------------------------------------*/
/*	Register & enqueue styles/scripts Start
/*-----------------------------------------------------------------------------------*/ 

//Enqueue Css Files
function portfolio_css_js() {	
	wp_enqueue_style( 'portfolio-fonts', portfolio_fonts_url(), array(), '1.0.0' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.6', 'all' );	
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '1.0.0', 'all' );	
	wp_enqueue_style( 'boots_nav', get_template_directory_uri() . '/assets/css/bootsnav.css', array(), '3.3.6', 'all');
	wp_enqueue_style( 'flaticon-new', get_template_directory_uri() . '/assets/css/flaticon.css', array(), '2.2.0', 'all' );
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/assets/css/lightbox.css', array(), '2.7.1', 'all' );
	wp_enqueue_style( 'pop_up', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.1.0', 'all' );
	wp_enqueue_style( 'owl_carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.2.0', 'all' );
	wp_enqueue_style( 'owl_theme_default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '2.2.0', 'all' );
	wp_enqueue_style( 'portfolio_style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );	
	wp_enqueue_style( 'portfolio_responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0.0', 'all' );
	
//Enqueue Js Files	 
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.7', true ); 	
	wp_enqueue_script( 'bootsnav_js', get_template_directory_uri() . '/assets/js/bootsnav.js', array('jquery'), '3.0.1', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.min.js', array('jquery'), '0.5.3', true );
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), '1.0.0', true );	
	wp_enqueue_script( 'waypoints', '//cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js');	
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), '3.0.1', true );
	wp_enqueue_script( 'lightbox_js', get_template_directory_uri() . '/assets/js/lightbox.min.js', array('jquery'), '2.7.1', true );	
	wp_enqueue_script( 'magnific_popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'carousel_js', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.2.0', true );
	wp_enqueue_script( 'bootstrap-datepicker', get_template_directory_uri() . '/assets/js/bootstrap-datepicker.min.js', array('jquery'), '1.7.1', true );	
	wp_enqueue_script( 'bootstrap-datetimepicker', get_template_directory_uri() . '/assets/js/bootstrap-datetimepicker.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'googleapis', '//maps.googleapis.com/maps/api/js?key=AIzaSyB4RM7zOgOKq6n2fv407hX28xiL-M6vLdY');	
	wp_enqueue_script( 'portfolio_wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.1.3', true );	
	wp_enqueue_script( 'gmaps', get_template_directory_uri() . '/assets/js/gmaps.js', array('jquery'), '1.1.3', false );	
	wp_enqueue_script( 'appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), '1.0.0', true );	
	wp_enqueue_script( 'portfolio_custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true );	
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'portfolio_css_js' );

//Adding Google fonts
 function portfolio_fonts_url() {
$fonts_url = '';
$philosopher = _x( 'on', 'Philosopher: on or off', 'portfolio' );
$poppins = _x( 'on', 'Poppins: on or off', 'portfolio' );
$quicksand = _x( 'on', 'Quicksand: on or off', 'portfolio' );
$raleway = _x( 'on', 'Raleway: on or off', 'portfolio' );
$ubuntu = _x( 'on', 'Ubuntu: on or off', 'portfolio' );
 
if ( 'off' !== $philosopher || 'off' !== $poppins || 'off' !== $quicksand || 'off' !== $raleway || 'off' !== $ubuntu ) {
$font_families = array();



if ( 'off' !== $philosopher ) {
$font_families[] = 'Philosopher:400,700';
}

if ( 'off' !== $poppins ) {
$font_families[] = 'Poppins:300,400,500,600,700';
}

if ( 'off' !== $quicksand ) {
$font_families[] = 'Quicksand:300,400,500,700';
}

if ( 'off' !== $raleway ) {
$font_families[] = 'Raleway:100,200,300,400,500,600,700,800,900';
}

if ( 'off' !== $ubuntu ) {
$font_families[] = 'Ubuntu:300,400,500,700';
}

$query_args = array(
'family' => urlencode( implode( '|', $font_families ) ),
'subset' => urlencode( 'latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese,devanagari' ),
);
$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
}
return esc_url_raw( $fonts_url );
}

//Adding Google fonts to the editor
 function portfolio_editor_styles() {
    $source_url = ( array( 'editor-style.css', 'portfolio_fonts_url' ) );
    add_editor_style( $source_url);
}
add_action( 'after_setup_theme', 'portfolio_editor_styles' );

//Adding fonts to the Custom Header screen
function portfolio_custom_header_fonts(){
wp_enqueue_style( 'portfolio_studio-fonts', 'portfolio_fonts_url', array(), '1.0.0' );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'portfolio_custom_header_fonts' );

// Enqueue For Post-Formate
function portfolio_post_formate_js() {
        
        wp_enqueue_script('post-formate', get_template_directory_uri() . '/assets/js/post-formate.js', array( 'jquery' ), '1.0.1', true );
}
add_action( 'admin_enqueue_scripts', 'portfolio_post_formate_js');