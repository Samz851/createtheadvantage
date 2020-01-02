<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => esc_html__('Theme Options','portfolio'),
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'portfolio',
  'ajax_save'       => true,
  'show_reset_all'  => false,
  'framework_title' => esc_html__('portfolio Theme options','portfolio'),
);
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();
// ----------------------------------------
// a option section for options header Logo  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'header',
  'title'       => esc_html__('Header','portfolio'),
  'icon'        => 'fa fa-star',
  'fields'      => array( 
		array(
			  'type'    => 'heading',
			  'content' => esc_html__('Favicon & Logo Add Here','portfolio'),
		),
		array(
		  'id'    => 'portfolio_fav_icon',
		  'type'  => 'upload',
		  'title' =>esc_html__( 'Fav Icon','portfolio'),
		),
		array(
		  'id'    => 'portfolio_logo',
		  'type'  => 'image',
		  'title' => esc_html__('Logo','portfolio'),
		),
	),
);


// ----------------------------------------
// a option section for Blog top & Newsletter Heading  -

// accordion sections           -
// ------------------------------
$options[]   = array(
  'name'     => 'accordion_section',
  'title'    => esc_html__('Blog Sections','portfolio'),
  'icon'     => 'fa fa-newspaper-o',
  'sections' => array(

    // banner section
    array(
      'name'     => 'sub_section_1',
      'title'    => esc_html__('Banner Area','portfolio'),
      'icon'     => 'fa fa-archive',
      'fields'   => array(

        array(
			  'type'    => 'heading',
			  'content' => esc_html__('Blog Top Area','portfolio'),
		),
		array(
		  'id'    => 'blog_top_img',
		  'type'  => 'upload',
		  'title' =>esc_html__('Banner Image','portfolio'),
		),
		array(
		  'id'      => 'top_title',
		  'type'    => 'text',
		  'title'   =>esc_html__('Blog Banner Title','portfolio'),
		  'default' =>esc_html__('Write Title Here','portfolio'),
		),
		array(
			  'type'    => 'heading',
			  'content' => esc_html__('Page Title','portfolio'),
		),
		array(
		  'id'      => 'page_banner_title',
		  'type'    => 'text',
		  'title'   =>esc_html__('Page Banner Title','portfolio'),
		  'default' =>esc_html__('Write Title Here','portfolio'),
		),
		array(
			  'type'    => 'heading',
			  'content' => esc_html__('404 Title','portfolio'),
		),
		array(
		  'id'      => 'eror_top_title',
		  'type'    => 'text',
		  'title'   =>esc_html__('Eror Banner Title','portfolio'),
		  'default' =>esc_html__('Write Title Here','portfolio'),
		),
      )
    ),

    // Newsletter section
    array(
      'name'     => 'sub_section_2',
      'title'    => esc_html__('NewsLatter Sections','portfolio'),
      'icon'     => 'fa fa-envelope',
      'fields'   => array(

        array(
		  'type'    => 'heading',
		  'content' => esc_html__('NewsLatter Area','portfolio'),				
		),
		array(
		  'id'    => 'newsletter_title',
		  'type'  => 'text',
		  'title' => esc_html__('Subscribe Title','portfolio'),
		),
		array(					
			'id'=>'newslatter_shortcode',
			'type'=>'textarea',
			'title'=>esc_html__('NewsLatter Shortcode','portfolio'),
		),

      )
    ),

  ),
);

// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => esc_html__('Backup','portfolio'),
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => esc_html__('You can save your current options. Download a Backup and Import.','portfolio'),
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

CSFramework::instance( $settings, $options );
