<?php
/**
 * DubsPress Theme Customizer.
 *
 * @package DubsPress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dubspress_customize_register( $wp_customize ) {
	/** Dubspress Settings **/
	$wp_customize->add_panel( 'dubspress_theme', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => 'DubsPress',
		'description'    => 'DubsPress Theme Settings',
	) );
	
	/** Dubspress General Options **/
	$wp_customize->add_section( 'dubspress_options', array(
	  'title' => __( 'General Options' ),
	  'description' => 'Change DubsPress General options', // Include html tags such as <p>.
	  'panel'  => 'dubspress_theme',
	  'priority' => 20 // Mixed with top-level-section hierarchy.
	) );
	
	$wp_customize->add_setting( 'dubspress_archive_sidebar', array(
		'default' => 'right'
	));
	
	$wp_customize->add_control( 'dubspress_archive_sidebar_control', array(
		'label' => __( 'Archive Sidebar Position', 'dubspress' ),
		'section' => 'dubspress_options',
		'settings' => 'dubspress_archive_sidebar',
		'type' => 'select',
		'choices'  => array(
			'left'  => 'Left',
			'right' => 'Right',
			'none' => 'None'
		),
	));
	
	$wp_customize->add_setting( 'dubspress_search_sidebar', array(
		'default' => 'right'
	));
	
	$wp_customize->add_control( 'dubspress_search_sidebar_control', array(
		'label' => __( 'Search Sidebar Position', 'dubspress' ),
		'section' => 'dubspress_options',
		'settings' => 'dubspress_search_sidebar',
		'type' => 'select',
		'choices'  => array(
			'left'  => 'Left',
			'right' => 'Right',
			'none' => 'None'
		),
	));
	
	$wp_customize->add_setting( 'dubspress_copyright_text', array(
		'default' => '&copy; 2016 seandubs.'
	));

	$wp_customize->add_control( 'dubspress_copyright_control', array(
		'label' => __( 'Footer Copyright text', 'dubspress' ),
		'section' => 'dubspress_options',
		'settings' => 'dubspress_copyright_text',
		'type' => 'text'
	));	
	
	/** Social sharing **/
	$wp_customize->add_section( 'dubspress_social', array(
	  'title' => __( 'Social' ),
	  'description' => 'Change DubsPress Social options', // Include html tags such as <p>.
	  'panel'  => 'dubspress_theme',
	  'priority' => 50 // Mixed with top-level-section hierarchy.
	) );
	
	global $dubspress_social_links;
	
	$dubspress_social_links = array(
		0 => 'linkedin',
		1 => 'facebook',
		2 => 'twitter',
		3 => 'google_plus',
		4 => 'dribbble',
		5 => 'pinterest',
		6 => 'behance',
		7 => 'youtube',
		8 => 'instagram',
		9 => 'vimeo',
		10 => 'flickr'
	);
	//write_log('social_links count is ' .count($social_links) );
	foreach( $dubspress_social_links as $val ){
		//write_log('social_links['.$key.'] is ' .$val );
		//write_log('social_links val is ' .$val );
		$wp_customize->add_setting( 'dubspress_social_' .$val, array(
			'default' => ''
		));
		
		$wp_customize->add_control( 'dubspress_social_'.$val.'_control', array(
			'label' => __( ucfirst($val). ' Profile URL', 'dubspress' ),
			'section' => 'dubspress_social',
			'settings' => 'dubspress_social_' .$val,
			'type' => 'url'
		));
	}
	
	/** Post settings **/
	$wp_customize->add_section( 'dubspress_posts', array(
	  'title' => __( 'Posts' ),
	  'description' => 'Change DubsPress Post options', // Include html tags such as <p>.
	  'panel'  => 'dubspress_theme',
	  'priority' => 30 // Mixed with top-level-section hierarchy.
	) );
	
	$wp_customize->add_setting( 'dubspress_post_comments', array(
		'default' => true
	));

	$wp_customize->add_control( 'dubspress_post_comments_control', array(
		'label' => __( 'Show Post Comment Section', 'dubspress' ),
		'section' => 'dubspress_posts',
		'settings' => 'dubspress_post_comments',
		'type' => 'checkbox'
	));
	
	$wp_customize->add_setting( 'dubspress_post_excerpt', array(
		'default' => true
	));

	$wp_customize->add_control( 'dubspress_post_excerpt_control', array(
		'label' => __( 'Show Post Excerpt on Blog page', 'dubspress' ),
		'section' => 'dubspress_posts',
		'settings' => 'dubspress_post_excerpt',
		'type' => 'checkbox'
	));
	
	/** Contact settings **/
	$wp_customize->add_section( 'dubspress_contact', array(
	  'title' => __( 'Contact' ),
	  'description' => 'Change DubsPress Contact options', // Include html tags such as <p>.
	  'panel'  => 'dubspress_theme',
	  'priority' => 50 // Mixed with top-level-section hierarchy.
	) );
	
	$wp_customize->add_setting( 'dubspress_contact_mailto', array(
		'default' => 'youremail@yourdomain.com'
	));
	
	$wp_customize->add_control( 'dubspress_contact_mailto_control', array(
		'label' => __( 'Email Address', 'dubspress' ),
		'section' => 'dubspress_contact',
		'settings' => 'dubspress_contact_mailto',
		'type' => 'email'
	));
	
	$wp_customize->add_setting( 'dubspress_contact_showmap', array(
		'default' => true
	));
	
	$wp_customize->add_control( 'dubspress_contact_showmap_control', array(
		'label' => __( 'Show Map', 'dubspress' ),
		'section' => 'dubspress_contact',
		'settings' => 'dubspress_contact_showmap',
		'type' => 'checkbox'
	));
	
	$wp_customize->add_setting( 'dubspress_contact_googlemapsapikey', array(
		'default' => ''
	));
	
	$wp_customize->add_control( 'dubspress_contact_googlemapsapikey_control', array(
		'label' => __( 'Google Maps API Key', 'dubspress' ),
		'section' => 'dubspress_contact',
		'settings' => 'dubspress_contact_googlemapsapikey',
		'type' => 'text'
	));
	
	$wp_customize->add_setting( 'dubspress_contact_mapx', array(
		'default' => '0.01'
	));
	
	$wp_customize->add_control( 'dubspress_contact_mapx_control', array(
		'label' => __( 'Map X Coordinate', 'dubspress' ),
		'section' => 'dubspress_contact',
		'settings' => 'dubspress_contact_mapx',
		'type' => 'number'
	));
	
	$wp_customize->add_setting( 'dubspress_contact_mapy', array(
		'default' => '0.01'
	));
	
	$wp_customize->add_control( 'dubspress_contact_mapy_control', array(
		'label' => __( 'Map Y Coordinate', 'dubspress' ),
		'section' => 'dubspress_contact',
		'settings' => 'dubspress_contact_mapy',
		'type' => 'number'
	));
	
	$wp_customize->add_setting( 'dubspress_contact_mapzoom', array(
		'default' => '15'
	));
	
	$wp_customize->add_control( 'dubspress_contact_mapzoom_control', array(
		'label' => __( 'Map Zoom Factor', 'dubspress' ),
		'section' => 'dubspress_contact',
		'settings' => 'dubspress_contact_mapzoom',
		'type' => 'number'
	));
	
	$wp_customize->add_setting( 'dubspress_contact_markertitle', array(
		'default' => 'Marker'
	));
	
	$wp_customize->add_control( 'dubspress_contact_markertitle_control', array(
		'label' => __( 'Map Marker Title', 'dubspress' ),
		'section' => 'dubspress_contact',
		'settings' => 'dubspress_contact_markertitle',
		'type' => 'text'
	));
	
	$wp_customize->add_setting( 'dubspress_contact_maptype', array(
		'default' => 'Hybrid'
	));
	
	$wp_customize->add_control( 'dubspress_contact_maptype_control', array(
		'label' => __( 'Map Type', 'dubspress' ),
		'section' => 'dubspress_contact',
		'settings' => 'dubspress_contact_maptype',
		'type' => 'select',
		'choices'  => array(
			'hybrid'  => 'Hybrid',
			'roadmap' => 'Roadmap',
			'satellite' => 'Satellite',
			'terrain' => 'Terrain'
		)
	));
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'dubspress_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dubspress_customize_preview_js() {
	wp_enqueue_script( 'dubspress_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dubspress_customize_preview_js' );

function sanitize_text_field_keep_breaks ($textobject){
	return implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $textobject ) ) );
}
