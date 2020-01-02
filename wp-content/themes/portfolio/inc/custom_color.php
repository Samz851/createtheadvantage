<?php
/* portfolio Theme Custom Color
 */ 
function portfolio_custom_color_css(){

wp_enqueue_style(
        'portfolio-customize-color',
        get_template_directory_uri() . '/assets/css/custom_script.css'
    );
	
	    $portfolio_bg_color = cs_get_customize_option( 'portfolio_bg_color' );
	    $portfolio_theme_color = cs_get_customize_option( 'portfolio_base_color' );
	    $portfolio_hover_color = cs_get_customize_option( 'portfolio_hover_color' );
		
		if(!empty(($portfolio_hover_color) && ($portfolio_theme_color))){
		$custom_css = "
		.main-menu-are .main-menu ul.drop-menu,.main-menu-are .main-menu ul.drop-menu li.active a,.main-nav .dropdown-menu,.sticky:before,.pfolio-subscribe,.post .pfolio-btn{background-color: {$portfolio_bg_color};}
		#portfolioScrollUp,.pfolio-btn,.pfolio-pagination.pagination a.page-numbers{background-color: {$portfolio_bg_color};color: {$portfolio_theme_color};}
		.portfolio-contact-form .pfolio-btn{color: {$portfolio_theme_color}; }
		.portfolio-edu-text{background-color: {$portfolio_bg_color};}
		.gallery_filter.portfolio ul li a:after{background-color: {$portfolio_bg_color};}
		.gallery_items.portfolio .single_item .overlay{background-color: {$portfolio_bg_color};}
		.portfolio-about-info .s-icon a i,.page-numbers.current{background-color: {$portfolio_bg_color};border-color: {$portfolio_theme_color};}
		.portfolio-blog-single .post-content .pfolio-btn,.pfolio-blog-posts .post .pfolio-btn{background-color: {$portfolio_bg_color};border-color: {$portfolio_theme_color};color: {$portfolio_theme_color};}
		.view_btn a{background-color: {$portfolio_bg_color};border-color: {$portfolio_theme_color};color: {$portfolio_theme_color};}
		.portfolio-testimonial-single .txt-content,.portfolio-contact-content .top hr,.portfolio-contact-info{border-color: {$portfolio_theme_color};}

		.portfolio-about-info .pfolio-btn:hover {background: {$portfolio_hover_color};border-color: {$portfolio_hover_color};color: {$portfolio_hover_color};}
		.pfolio-pagination.pagination a.page-numbers:hover{background: {$portfolio_hover_color};border-color: {$portfolio_hover_color};}
		.portfolio-edu-text .edu-text-single:hover,.portfolio-about-info .s-icon a i:hover{background: {$portfolio_hover_color};}
		.portfolio-conuter-single:hover h2{color: {$portfolio_hover_color};}
		.portfolio-testimonial-single .txt-content:before{color: {$portfolio_hover_color};}
		#portfolioScrollUp:hover,.portfolio-blog-single .post-content .pfolio-btn:hover{color: {$portfolio_hover_color};background: {$portfolio_hover_color};}
		.view_btn a:hover{color: {$portfolio_hover_color};background: {$portfolio_hover_color};border-color: {$portfolio_hover_color};}
		#portfolio-owl.owl-theme .owl-dots .owl-dot:hover span,#portfolio-owl.owl-theme .owl-dots .owl-dot.active span, #portfolio-owl.owl-theme .owl-dots .owl-dot:hover span{background: {$portfolio_hover_color};border-color: {$portfolio_hover_color};}
	
		";}else{$custom_css = '';}
		
	wp_add_inline_style( 'portfolio-customize-color', $custom_css );
}
add_action('wp_enqueue_scripts','portfolio_custom_color_css');