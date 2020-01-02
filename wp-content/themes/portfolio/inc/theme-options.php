<?php
function portfolio_integrateWithVC() {		
//***** =====================================		
// About Me Section
//******* ================================
	vc_map(array(
		'name'			=> esc_html__('About Me', 'portfolio'),
		'base'			=> 'about_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(			
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('ABT Title Image', 'portfolio'),
				'param_name' 	=> 'abt_icon_img'
			),
			array(
				'type' 			=> 'iconpicker',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('About Icon', 'portfolio'),
				'param_name' 	=> 'busi_book_icon',
				'settings' => array(
					'emptyIcon' => true,
					'iconsPerPage' => 100,					'type' => 'flaticon',
				),
			),
			array(
				'param_name'	=> 'abt_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('About Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'abt_title_color',
				'type'			=> 'colorpicker',
				'default'		=> '#f0116e',
				'heading'		=> esc_html__('About Title Color', 'portfolio'),
				'value'			=> esc_html__('#1f1f1f', 'portfolio')
			),
			array(
				'param_name'	=> 'abt_desc',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('About Info', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'abt_desc_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('About Info Color', 'portfolio'),
				'default'		=> '#a5a4a4',
				'value'			=> esc_html__('#a5a4a4', 'portfolio')
			),									
// -------------------------------------------
// About Info group
// ---------------------------------------------
			array(
				'type' 			=> 'param_group',
				'heading'		=> esc_html__('Group Items', 'portfolio'),
				'param_name' 	=> 'about',
				'group'			=> esc_html__('About Info Items', 'portfolio'),
			// Note params is mapped inside param-group:
				'params' 			=> array(
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Info Title', 'portfolio'),
							'param_name' 	=> 'abt_grp_title'
					),								
					array(
						'param_name'	=> 'abt_title_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Info Grp Title Color', 'portfolio'),
						'default'		=> '#3a3636',
						'value'			=> esc_html__('#3a3636', 'portfolio')
					),								
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Own Info', 'portfolio'),
							'param_name' 	=> 'abt_grp_desc'
					),
					array(
						'param_name'	=> 'abt_desc_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Own Info Color', 'portfolio'),
						'default'		=> '#474646',
						'value'			=> esc_html__('#474646', 'portfolio')
					),
				),
			),
			// Signeture Img
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Signeture Image', 'portfolio'),
				'param_name' 	=> 'abt_signe_img'
			),
// -------------------------------------------
// Social Info group
// ---------------------------------------------
			array(
				'type' 			=> 'param_group',
				'heading'		=> esc_html__('Group Items', 'portfolio'),
				'param_name' 	=> 'social',
				'group'			=> esc_html__('About Social Items', 'portfolio'),
			// Note params is mapped inside param-group:
				'params' 			=> array(
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Social Link', 'portfolio'),
							'param_name' 	=> 'abt_social_link'
					),								
					array(
						'param_name'	=> 'abt_soci_icon',
						'type'			=> 'iconpicker',
						'heading'		=> esc_html__('Social Icon', 'portfolio'),
						'value'			=> esc_html__('', 'portfolio')
					),								
				),
			),
			array(
				'type' 			=> 'textfield',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Button Link', 'portfolio'),
				'param_name' 	=> 'abt_button_link'
			),
			array(
				'type' 			=> 'textfield',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Button Title', 'portfolio'),
				'param_name' 	=> 'abt_button_title'
			),
			// Profile Img
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Profile Image', 'portfolio'),
				'param_name' 	=> 'abt_profile_img'
			),
		),
	));
//***** =====================================		
// Counter Section
//******* ================================
	vc_map(array(
		'name'			=> esc_html__('Counter Section', 'portfolio'),
		'base'			=> 'counter_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(
// -------------------------------------------
// params group
// ---------------------------------------------
			array(
				'type' 			=> 'param_group',
				'heading'		=> esc_html__('Group Items', 'portfolio'),
				'param_name' 	=> 'counter',
				'group'			=> esc_html__('Counter Items', 'portfolio'),
			// Note params is mapped inside param-group:
				'params' 			=> array(
					array(
							'type' 			=> 'attach_image',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Counter GRP Image', 'portfolio'),
							'param_name' 	=> 'count_grp_img'
					),
					array(
						'type' 			=> 'iconpicker',
						'value' 		=> esc_html__('', 'portfolio'),
						'heading' 		=> esc_html__('Counter GRP Icon', 'portfolio'),
						'param_name' 	=> 'counter_grp_icon',
						'settings' => array(
							'emptyIcon' => true,
							'iconsPerPage' => 100,
							'type' => 'flaticon',
						),
					),
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Counter GRP Amount', 'portfolio'),
							'param_name' 	=> 'count_grp_text'
					),								
					array(
						'param_name'	=> 'count_grp_text_clr',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Count Grp Amount Color', 'portfolio'),
						'value'			=> esc_html__('#dcdcdc', 'portfolio')
					),								
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Counter GRP Title', 'portfolio'),
							'param_name' 	=> 'count_grp_title'
					),
					array(
						'param_name'	=> 'count_grp_title_clr',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Count Grp Title Color', 'portfolio'),
						'value'			=> esc_html__('#010101', 'portfolio')
					),
				),
			),
		),
	));
//***** =====================================		
// Skill Section
//******* ================================
	vc_map(array(
		'name'			=> esc_html__('Skill Section', 'portfolio'),
		'base'			=> 'skill_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(	
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Skill Title Image', 'portfolio'),
				'param_name' 	=> 'skill_icon_img'
			),
			array(
				'type' 			=> 'iconpicker',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Skill Icon', 'portfolio'),
				'param_name' 	=> 'skill_title_icon',
				'settings' => array(
					'emptyIcon' => true,
					'iconsPerPage' => 100,
					'type' => 'flaticon',
				),
			),
			array(
				'param_name'	=> 'skill_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Skill Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'skill_title_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Skill Title Color', 'portfolio'),
				'value'			=> esc_html__('#010101', 'portfolio')
			),
			array(
				'param_name'	=> 'skill_info',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Skill Sub Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'skill_info_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Skill Sub Title Color', 'portfolio'),
				'default'		=> '#a5a4a4',
				'value'			=> esc_html__('#a5a4a4', 'portfolio')
			),									
// -------------------------------------------
// params group
// ---------------------------------------------
			array(
				'type' 			=> 'param_group',
				'heading'		=> esc_html__('Group Items', 'portfolio'),
				'param_name' 	=> 'skill',
				'group'			=> esc_html__('Skill Items', 'portfolio'),
			// Note params is mapped inside param-group:
				'params' 			=> array(
					array(
							'type' 			=> 'attach_image',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Skill GRP Image', 'portfolio'),
							'param_name' 	=> 'skill_grp_black_img'
					),
					array(
							'type' 			=> 'attach_image',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Skill GRP Hover Image', 'portfolio'),
							'param_name' 	=> 'skill_grp_yellow_img'
					),
					array(
							'type' 			=> 'iconpicker',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Skill GRP Icon', 'portfolio'),
							'param_name' 	=> 'skill_grp_icon',
							'settings' => array(
								'emptyIcon' => true,
								'iconsPerPage' => 100,
								'type' => 'flaticon',
							),
					),
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Skill GRP Title', 'portfolio'),
							'param_name' 	=> 'skill_grp_title'
					),								
					array(
						'param_name'	=> 'skill_title_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Skill GRP Title Color', 'portfolio'),
						'value'			=> esc_html__('#010101', 'portfolio')
					),								
					array(
							'type' 			=> 'textarea',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Skill GRP Description', 'portfolio'),
							'param_name' 	=> 'skill_grp_desc'
					),
					array(
						'param_name'	=> 'skill_desc_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Skill GRP Description Color', 'portfolio'),
						'value'			=> esc_html__('#737373', 'portfolio')
					),
				),
			),
		),
	));	
//***** =====================================		
// Education Section
//******* ================================
	vc_map(array(
		'name'			=> esc_html__('Education Section', 'portfolio'),
		'base'			=> 'education_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(	
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Education Human Image', 'portfolio'),
				'param_name' 	=> 'edu_human_img'
			),
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Education Title Image', 'portfolio'),
				'param_name' 	=> 'edu_icon_img'
			),
			array(
				'type' 			=> 'iconpicker',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Education Icon', 'portfolio'),
				'param_name' 	=> 'edu_title_icon',
				'settings' => array(
					'emptyIcon' => true,
					'iconsPerPage' => 100,
					'type' => 'flaticon',
				),
			),
			array(
				'param_name'	=> 'edu_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Education Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'edu_title_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Education Title Color', 'portfolio'),
				'value'			=> esc_html__('#1f1f1f', 'portfolio')
			),
			array(
				'param_name'	=> 'edu_info',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Education Sub Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'edu_info_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Education Sub Title Color', 'portfolio'),
				'default'		=> '#a5a4a4',
				'value'			=> esc_html__('#a5a4a4', 'portfolio')
			),									
// -------------------------------------------
// params group
// ---------------------------------------------
			array(
				'type' 			=> 'param_group',
				'heading'		=> esc_html__('Group Items', 'portfolio'),
				'param_name' 	=> 'education',
				'group'			=> esc_html__('Education Items', 'portfolio'),
			// Note params is mapped inside param-group:
				'params' 			=> array(
					
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Education GRP No', 'portfolio'),
							'param_name' 	=> 'edu_grp_no'
					),								
					array(
						'param_name'	=> 'edu_grp_no_clr',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Education GRP No Color', 'portfolio'),
						'value'			=> esc_html__('#000', 'portfolio')
					),
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Education GRP Title', 'portfolio'),
							'param_name' 	=> 'edu_grp_title'
					),								
					array(
						'param_name'	=> 'edu_title_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Education GRP Title Color', 'portfolio'),
						'value'			=> esc_html__('#4f4f4f', 'portfolio')
					),
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Education GRP Designation', 'portfolio'),
							'param_name' 	=> 'edu_grp_desig'
					),								
					array(
						'param_name'	=> 'edu_desig_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Education GRP Desig Color', 'portfolio'),
						'value'			=> esc_html__('#737373', 'portfolio')
					),
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Education GRP Year', 'portfolio'),
							'param_name' 	=> 'edu_grp_yer'
					),
					array(
						'param_name'	=> 'edu_grp_yer_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Education GRP Year Color', 'portfolio'),
						'value'			=> esc_html__('#737373', 'portfolio')
					),
				),
			),
		),
	));	
//***** =====================================		
//Portfolio Section
//******* ================================
	vc_map(array(
		'name'			=> esc_html__('Portfolio Section', 'portfolio'),
		'base'			=> 'Portfolio_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Portfolio Title Image', 'portfolio'),
				'param_name' 	=> 'port_icon_img'
			),
			array(
				'type' 			=> 'iconpicker',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Portfolio Title Icon', 'portfolio'),
				'param_name' 	=> 'port_title_icon',
				'settings' => array(
					'emptyIcon' => true,
					'iconsPerPage' => 100,
					'type' => 'flaticon',
				),
			),
			array(
				'param_name'	=> 'port_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Portfolio Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'port_title_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Portfolio Title Color', 'portfolio'),
				'value'			=> esc_html__('#1f1f1f', 'portfolio')
			),
			array(
				'param_name'	=> 'port_info',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Portfolio Sub Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'port_info_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Portfolio Sub Title Color', 'portfolio'),
				'value'			=> esc_html__('#a5a4a4', 'portfolio')
			),
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Portfolio Term Image', 'portfolio'),
				'param_name' 	=> 'port_term_img'
			),
			array(
				'type' 			=> 'iconpicker',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Portfolio Term Icon', 'portfolio'),
				'param_name' 	=> 'port_term_icon',
				'settings' => array(
					'emptyIcon' => true,
					'iconsPerPage' => 100,
					'type' => 'flaticon',
				),
			),
			array(
				'param_name'	=> 'current_page',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post Per Page', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			
		),
	)
);
//***** =====================================		
// Experience Section
//******* ================================
	vc_map(array(
		'name'			=> esc_html__('Experience Section', 'portfolio'),
		'base'			=> 'experience_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(	
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Experience Title Image', 'portfolio'),
				'param_name' 	=> 'exp_icon_img'
			),
			array(
				'type' 			=> 'iconpicker',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Experience Icon', 'portfolio'),
				'param_name' 	=> 'exp_title_icon',
				'settings' => array(
					'emptyIcon' => true,
					'iconsPerPage' => 100,
					'type' => 'flaticon',
				),
			),
			array(
				'param_name'	=> 'exp_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Experience Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'exp_title_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Experience Title Color', 'portfolio'),
				'value'			=> esc_html__('#1f1f1f', 'portfolio')
			),
			array(
				'param_name'	=> 'exp_info',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Experience Sub Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'exp_info_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Experience Sub Title Color', 'portfolio'),
				'value'			=> esc_html__('#a5a4a4', 'portfolio')
			),									
// -------------------------------------------
// params group
// ---------------------------------------------
			array(
				'type' 			=> 'param_group',
				'heading'		=> esc_html__('Group Items', 'portfolio'),
				'param_name' 	=> 'experience',
				'group'			=> esc_html__('Experience Items', 'portfolio'),
			// Note params is mapped inside param-group:
				'params' 			=> array(
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Experience GRP Year', 'portfolio'),
							'param_name' 	=> 'exp_grp_yer'
					),
					array(
						'param_name'	=> 'exp_grp_yer_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Experience GRP Year Color', 'portfolio'),
						'default'       =>'#f0116e',
						'value'			=> esc_html__('#f0116e', 'portfolio')
					),
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Experience GRP Title', 'portfolio'),
							'param_name' 	=> 'exp_grp_title'
					),								
					array(
						'param_name'	=> 'exp_title_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Experience GRP Title Color', 'portfolio'),
						'default'       =>'#f0116e',
						'value'			=> esc_html__('#f0116e', 'portfolio')
					),
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Experience GRP Designation', 'portfolio'),
							'param_name' 	=> 'exp_grp_desig'
					),								
					array(
						'param_name'	=> 'exp_desig_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Experience GRP Desig Color', 'portfolio'),
						'default'       =>'#f0116e',
						'value'			=> esc_html__('#f0116e', 'portfolio')
					),
					array(
							'type' 			=> 'textarea',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Experience GRP Description', 'portfolio'),
							'param_name' 	=> 'exp_grp_desc'
					),								
					array(
						'param_name'	=> 'exp_desc_grp_color',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Experience GRP Description Color', 'portfolio'),
						'default'       =>'#808080',
						'value'			=> esc_html__('#808080', 'portfolio')
					),
				),
			),
		),
	));	
//****** ====================================		
// Latest Blog Area
//******* =========================================
	vc_map(array(
		'name'			=> esc_html__('Latest Blog', 'portfolio'),
		'base'			=> 'blog_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Blog Title Image', 'portfolio'),
				'param_name' 	=> 'blog_icon_img'
			),
			array(
				'type' 			=> 'iconpicker',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Blog Title Icon', 'portfolio'),
				'param_name' 	=> 'blog_title_icon',
				'settings' => array(
					'emptyIcon' => true,
					'iconsPerPage' => 100,
					'type' => 'flaticon',
				),
			),
			array(
				'param_name'	=> 'blog_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Blog Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'blog_title_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Blog Title Color', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'blog_info',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Blog Sub Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'blog_info_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Blog Sub Title Color', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'page_numbers',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Select Page', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio'),
			),
		),
	)
);	
//***** =====================================		
// 		Testimonial Section
//******* ================================
	vc_map(array(
		'name'			=> esc_html__('Testimonial', 'portfolio'),
		'base'			=> 'testimonial_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(
			array(
				'type' 			=> 'textfield',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Testimonial Title', 'portfolio'),
				'param_name' 	=> 'test_title'
			),								
			array(
				'param_name'	=> 'test_title_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Testi Title Color', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'type' 			=> 'textfield',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Testi Sub Title', 'portfolio'),
				'param_name' 	=> 'test_sub_title'
			),								
			array(
				'param_name'	=> 'test_sub_title_color',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Testi Sub Title Color', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('BG Image', 'portfolio'),
				'param_name' 	=> 'testi_sec_img'
			),
// -------------------------------------------
// params group
// ---------------------------------------------				
			array(
				'type' 			=> 'param_group',
				'heading'		=> esc_html__('Testimonial Items', 'portfolio'),
				'param_name' 	=> 'testimonial',
				'group'			=> esc_html__('Testimonial', 'portfolio'),
			// Note params is mapped inside param-group:
				'params' 			=> array(
					
					array(
						'type' 			=> 'attach_image',
						'value' 		=> esc_html__('', 'portfolio'),
						'heading' 		=> esc_html__('Group Image', 'portfolio'),
						'param_name' 	=> 'test_grp_img'
					),
					array(
						'type' 			=> 'textfield',
						'value' 		=> esc_html__('', 'portfolio'),
						'heading' 		=> esc_html__('Name', 'portfolio'),
						'param_name' 	=> 'test_grp_name'
					),								
					array(
						'param_name'	=> 'test_grp_name_clr',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Testi Name Color', 'portfolio'),
						'default'       =>'#f9f9f9',
						'value'			=> esc_html__('#f9f9f9', 'portfolio')
					),																
					array(
						'type' 			=> 'textarea',
						'value' 		=> esc_html__('', 'portfolio'),
						'heading' 		=> esc_html__('Description', 'portfolio'),
						'param_name' 	=> 'test_grp_desc'
					),
					array(
						'param_name'	=> 'test_grp_desc_clr',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Testi Description Color', 'portfolio'),
						'default'       =>'#f9f9f9',
						'value'			=> esc_html__('#f9f9f9', 'portfolio')
					),								
				),
			),	
		),
	)
);		
//****** ====================================		
// Contact Us Section
//******* =========================================
	vc_map(array(
		'name'			=> esc_html__('Contact Section', 'portfolio'),
		'base'			=> 'contact_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(
			array(
				'type' 			=> 'attach_image',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Contact Title Image', 'portfolio'),
				'param_name' 	=> 'cnt_icon_img'
			),
			array(
				'type' 			=> 'iconpicker',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Contact Icon', 'portfolio'),
				'param_name' 	=> 'cnt_title_icon',
				'settings' => array(
					'emptyIcon' => true,
					'iconsPerPage' => 100,
					'type' => 'flaticon',
				),
			),				
			array(
				'param_name'	=> 'contact_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'contact_title_clr',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Contact Title Color', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'con_sub_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Sub Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'con_sub_title_clr',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Contact Sub Title Color', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'content',
				'type'			=> 'textarea_html',
				'heading'		=> esc_html__('Contact Shortcode', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
			array(
				'param_name'	=> 'cnt_say_title',
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Say Title', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),						
			array(
				'param_name'	=> 'cnt_say_title_clr',
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Say Title Color', 'portfolio'),
				'value'			=> esc_html__('', 'portfolio')
			),
// -------------------------------------------
// params group
// ---------------------------------------------				
			array(
				'type' 			=> 'param_group',
				'heading'		=> esc_html__('Contact Address', 'portfolio'),
				'param_name' 	=> 'contact',
				'group'			=> esc_html__('Contact', 'portfolio'),
			// Note params is mapped inside param-group:
				'params' 		=> array(
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Address', 'portfolio'),
							'param_name' 	=> 'con_grp_add'
					),								
					array(
						'param_name'	=> 'con_grp_add_clr',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Address Color', 'portfolio'),
						'value'			=> esc_html__('#525252', 'portfolio')
					),								
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Address OPT 1', 'portfolio'),
							'param_name' 	=> 'con_grp_opt1'
					),								
					array(
						'param_name'	=> 'con_grp_opt1_clr',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Address OPT 1 Color', 'portfolio'),
						'value'			=> esc_html__('#525252', 'portfolio')
					),
					array(
							'type' 			=> 'textfield',
							'value' 		=> esc_html__('', 'portfolio'),
							'heading' 		=> esc_html__('Address OPT 2', 'portfolio'),
							'param_name' 	=> 'con_grp_opt2'
					),								
					array(
						'param_name'	=> 'con_grp_opt2_clr',
						'type'			=> 'colorpicker',
						'heading'		=> esc_html__('Address OPT 2 Color', 'portfolio'),
						'value'			=> esc_html__('#525252', 'portfolio')
					),
				),
			),
		),
	)
);		
//***** =====================================		
// Map Section
//******* ================================
	vc_map(array(
		'name'			=> esc_html__('Map Section', 'portfolio'),
		'base'			=> 'map_section',
		'category'		=> esc_html__('Portfolio', 'portfolio'),
		'Description'	=> esc_html__('All service we Manage', 'portfolio'),
		'icon'			=> get_template_directory_uri(). '/assets/images/option.png',
		'params'		=> array(	
			array(
				'type' 			=> 'textfield',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Latitude', 'portfolio'),
				'param_name' 	=> 'latittude_loc'
			),
			array(
				'type' 			=> 'textfield',
				'value' 		=> esc_html__('', 'portfolio'),
				'heading' 		=> esc_html__('Longitude', 'portfolio'),
				'param_name' 	=> 'longitude_loc'
			),
			array(
				'param_name'	=> 'map_zoom',
				'type'			=> 'textfield',
				'heading'		=> esc_html__( 'Map Zoom Position', 'portfolio' ),
				'group'			=> esc_html__( 'Map Center', 'portfolio' ),
				'value'			=> 13,
			),
			// params group
			array(
				'type' 			=> 'param_group',
				'value' 		=> '',
				'heading'		=> esc_html__( 'Add New Branch', 'portfolio' ),
				'param_name' 	=> 'branch_group_group',
				'group'			=> esc_html__( 'Add Branches', 'portfolio' ),
				'params' 		=> 
					array(									
						array(
							'param_name'	=> 'google_branch_title',
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Place Name', 'portfolio' ),
							'value'			=> 'Paya Lebar Air Base (QPG)',
						),
						array(
							'param_name'	=> 'google_branch_lat',
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Latitude', 'portfolio' ),
							'value'			=> '23.769223',
						),
						array(
							'param_name'	=> 'google_branch_lan',
							'type'			=> 'textfield',
							'heading'		=> esc_html__( 'Longitude', 'portfolio' ),
							'value'			=> '90.371346',
						),
						array(
							'param_name'	=> 'google_branch_icon_image',
							'type'			=> 'attach_image',
							'heading'		=> esc_html__( 'Location Indicator', 'portfolio' ),
						)
				)
			),
			//end group
			array(
				'param_name'	=> 'administrative_color',
				'type'			=> 'colorpicker',
				'value'			=> '#f0f0f0',
				'heading'		=> esc_html__( 'Administrative Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),
			array(
				'param_name'	=> 'poi_color',
				'type'			=> 'colorpicker',
				'value'			=> '#f0f0f0',
				'heading'		=> esc_html__( 'pointer Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),
			array(
				'param_name'	=> 'map_text_color',
				'type'			=> 'colorpicker',
				'value'			=> '#262626',
				'heading'		=> esc_html__( 'Text Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),
			array(
				'param_name'	=> 'map_water_color',
				'type'			=> 'colorpicker',
				'value'			=> '#a0a09a',
				'heading'		=> esc_html__( 'Water Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),
			array(
				'param_name'	=> 'map_landscape_color',
				'type'			=> 'colorpicker',
				'value'			=> '#ebebeb',
				'heading'		=> esc_html__( 'Landscape Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),
			array(
				'param_name'	=> 'map_highway_color',
				'type'			=> 'colorpicker',
				'value'			=> '#ebebeb',
				'heading'		=> esc_html__( 'Highway Road Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),	
			array(
				'param_name'	=> 'arterial_road_color',
				'type'			=> 'colorpicker',
				'value'			=> '#ebebeb',
				'heading'		=> esc_html__( 'Arterial Road Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),
			array(
				'param_name'	=> 'map_localroad_color',
				'type'			=> 'colorpicker',
				'value'			=> '#f4f4f4',
				'heading'		=> esc_html__( 'Local Road Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),
			array(
				'param_name'	=> 'map_transit_color',
				'type'			=> 'colorpicker',
				'value'			=> '#ebebeb',
				'heading'		=> esc_html__( 'Transit Color', 'portfolio' ),
				'group'			=> esc_html__( 'Color Changing Options', 'portfolio' ),
			),
		),
	));		
}
add_action( 'vc_before_init', 'portfolio_integrateWithVC' );