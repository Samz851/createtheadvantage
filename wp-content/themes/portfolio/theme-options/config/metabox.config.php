<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

// -----------------------------------------
// Post Metabox Options For Aside          -
// -----------------------------------------
$options[]    = array(
  'id'        => '_aside_posts',
  'title'     => __('Post Format: Aside','portfolio'),
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

	  array(
		  'name'   => 'section_aside',
		  'fields' => array(

		array(
		  'id'            => 'aside_textarea',
		  'type'          => 'text',
		  'title'         => __('Aside Info','portfolio'),

		  'attributes'    => array(
			'data-format' => 'aside',
		  ),
		),
		
		array(
				'id'      => 'aside_font_clr',
				'type'    => 'color_picker',
				'title'   => 'Font Color',
				'default' => '#373737',
				'rgba'    => true,
				),
				
		array(
			'id'      => 'aside_background',
			'type'    => 'color_picker',
			'title'   => 'Background Color',
			'default' => '#dddddd',
			'rgba'    => true,
			),
		
     ),

    ),

  ),
);


// -----------------------------------------
// Post Metabox Options For Image          -
// -----------------------------------------
$options[]    = array(
  'id'        => '_image_posts',
  'title'     => 'Post Format: Image',esc_html__('Aside Embeded Code','portfolio'),
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_image',
      'fields' => array(
	
		array(
		  'id'            => 'image',
		  'type'          => 'upload',
		  'title'         => esc_html__('Select or Upload Image','portfolio'),
		  'settings'      => array(
		   'upload_type'  => 'image',
		   'button_title' => esc_html__('Upload Image','portfolio'),
		   'frame_title'  => esc_html__('Select an image','portfolio'),
		   'insert_title' => esc_html__('Use this image','portfolio'),
		  ),
		  'attributes'    => array(
			'data-format' => 'image',
		  ),
		),
		
      ),
    ),

  ),
);

// -----------------------------------------
// Post Metabox Options For Video          -
// -----------------------------------------
$options[]    = array(
  'id'        => '_video_posts',
  'title'     => esc_html__('Post Format: Video','portfolio'),
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_video',
      'fields' => array(

		array(
		  'id'            => 'video_title',
		  'type'          => 'text',
		  'title'          => esc_html__('Title if any','portfolio'),
		  'attributes'    => array(
			'data-format' => 'video',
		  ),
		),
		array(
          'id'    => 'video_id',
          'type'  => 'textarea',
          'title' => esc_html__('Video Embeded Code','portfolio'),
          'sanitize' => 'disabled',
        ),
	
      ),
    ),

  ),
);


// -----------------------------------------
// Post Metabox Options For Quote          -
// -----------------------------------------
$options[]    = array(
  'id'        => '_quote_posts',
  'title'     => esc_html__('Post Format: Quote','portfolio'),
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_quote',
      'fields' => array(

		array(
		  'id'    => 'quote_textarea',
		  'type'  => 'textarea',
		  'title' => esc_html__('Quote','portfolio'),
		),
	
		array(
		  'id'    => 'quote', 
		  'type'  => 'text',
		  'title' => 'Author',esc_html__('Author','portfolio'),
		  'attributes'    => array(
			'data-format' => 'quote',
		  ),
		),
		array(
			'id'      => 'quote_font_clr',
			'type'    => 'color_picker',
			'title'   => esc_html__('Font Color','portfolio'),
			'default' => '#373737',
			'rgba'    => true,
			),
		array(
			'id'      => 'quote_background',
			'type'    => 'color_picker',
			'title'   => 'Background Color',esc_html__('Background Color','portfolio'),
			'default' => '#dddddd',
			'rgba'    => true,
			),
		array(
		  'id'    => 'quote_text', 
		  'type'  => 'text',
		  'title' => esc_html__('Author URL','portfolio'),
		),
	
      ),
    ),

  ),
);

// -----------------------------------------
// Post Metabox Options For Link     -
// -----------------------------------------
$options[]    = array(
  'id'        => '_link_posts',
  'title'     => esc_html__('Post Format: Link','portfolio'),
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_link',
      'fields' => array(

		array(
		  'id'            => 'link',
		  'type'          => 'text',
		  'title'         => esc_html__('Link','portfolio'),
		  'attributes'    => array(
			'data-format' => 'link',
		  ),
		),
		array(
		  'id'            => 'link_text',
		  'type'          => 'text',
		  'title'         => 'Text',esc_html__('Text','portfolio'),
		),
		array(
			'id'      => '',
			'type'    => 'color_picker',
			'title'   => 'Text',esc_html__('Font Color','portfolio'),
			'default' => '#373737',
			'rgba'    => true,
		),
		array(
			'id'      => 'link_background',
			'type'    => 'color_picker',
			'title'   => esc_html__('Background Color','portfolio'),
			'default' => '#dddddd',
			'rgba'    => true,
		),
      ),
    ),

  ),
);

// -----------------------------------------
// Post Metabox Options For Gallery  -
// -----------------------------------------
 $options[]    = array(
  'id'        => '_gallery_posts',
  'title'     => esc_html__('Post Format: Gallery','portfolio'),
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_gallery',
      'fields' => array(

		array(
		  'id'            => 'gallery',
		  'type'          => 'gallery',
		  'title'         => esc_html__('Select or Upload Image','portfolio'),
		  'desc'          => esc_html__('Add multiple images in this gallery and change their order','portfolio'),
		  'attributes'    => array(
			'data-format' => 'gallery',
		  ),
		),
      ),
    ),

  ),
); 


// -----------------------------------------
// Post Metabox Options For Audio          -
// -----------------------------------------
$options[]    = array(
  'id'        => '_audio_posts',
  'title'     => esc_html__('Poat Format: Audio','portfolio'),
  'post_type' => 'post',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_audio',
      'fields' => array(

		array(
		  'id'            => 'audio_title',
		  'type'          => 'text',
		  'title'          => esc_html__('Title','portfolio'),
		  'attributes'    => array(
			'data-format' => 'audio',
		  ),
		),
		array(
		  'id'            => 'audio_id',
		  'type'          => 'textarea',
		  'title'         => esc_html__('Audio Embeded Code','portfolio'),
		  'sanitize' => 'disabled',
		),
      ),
    ),

  ),
);

CSFramework_Metabox::instance( $options );