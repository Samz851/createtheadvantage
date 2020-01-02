<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options              = array();

// -----------------------------------------
// Customize Custom Color                   -
// -----------------------------------------
$options[]      = array(
  'name'        => 'portfolio_colors',
  'title'       => esc_html__('Portfolio Colors','portfolio'),
  'settings'    => array(
  
	array(
      'name'          => 'portfolio_bg_color',
      'default'       => '#01c5ff',
      'control'       => array(
        'label'       => esc_html__('Background Color','portfolio'),
        'type'        => 'color',
      ),
    ),
	
	array(
      'name'          => 'portfolio_base_color',
      'default'       => '#01c5ff',
      'control'       => array(
        'label'       => esc_html__('Base Color','portfolio'),
        'type'        => 'color',
      ),
    ),
	
	array(
      'name'          => 'portfolio_hover_color',
      'default'       => '#01c5ff',
      'control'       => array(
        'label'       => esc_html__('Hover Color','portfolio'),
        'type'        => 'color',
      ),
    ),
),
);


CSFramework_Customize::instance( $options );
