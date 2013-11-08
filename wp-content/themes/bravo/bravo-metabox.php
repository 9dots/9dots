<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'bravo_';

global $meta_boxes;

$meta_boxes = array();

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box
	'id' => 'music',

	// Meta box title - Will appear at the drag and drop handle bar
	'title' => 'Music Post Type',

	// Post types, accept custom post types as well - DEFAULT is array('post'); (optional)
	'pages' => array( 'music' ),

	// Where the meta box appear: normal (default), advanced, side; optional
	'context' => 'normal',

	// Order of meta box: high (default), low; optional
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array (
			// Field name - Will be used as label
			'name'		=> __('Upload Song','bravo'),
			// Field ID, i.e. the meta key
			'id'	=> "song_url",
			// Field description (optional)
			'desc'		=> 'Choose a music file',
			
			'type'		=> 'file',
			// Default value (optional)
			'max_file_uploads' => 1,
		),
		array (
			// Field name - Will be used as label
			'name'		=> __('Duration of the Song','bravo'),
			// Field ID, i.e. the meta key
			'id'	=> "duration",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'text',
			// Default value (optional)
			'std'		=> ''
		)		
	)
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box
	'id' => 'post_format_options',

	// Meta box title - Will appear at the drag and drop handle bar
	'title' => 'Post Format Options',

	// Post types, accept custom post types as well - DEFAULT is array('post'); (optional)
	'pages' => array( 'post' ),

	// Where the meta box appear: normal (default), advanced, side; optional
	'context' => 'normal',

	// Order of meta box: high (default), low; optional
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array (
			// Field name - Will be used as label
			'name'		=> 'Youtube / Vimeo Video Url',
			// Field ID, i.e. the meta key
			'id'	=> "video_url",
			// Field description (optional)
			'desc'		=> 'If Video Url Enter Youtube or Vimeo Url',
			
			'type'		=> 'text',
			// Default value (optional)
			'std'		=> ''
		),
		array (
			// Field name - Will be used as label
			'name'		=> 'Audio Url',
			// Field ID, i.e. the meta key
			'id'	=> "audio_url",
			// Field description (optional)
			'desc'		=> 'If Audio Post Type Enter Audio Url',
			
			'type'		=> 'text',
			// Default value (optional)
			'std'		=> ''
		),
		array (
			// Field name - Will be used as label
			'name'		=> 'Quote Title',
			// Field ID, i.e. the meta key
			'id'	=> "quote_title",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'text',
			// Default value (optional)
			'std'		=> ''
		),
		array (
			// Field name - Will be used as label
			'name'		=> 'Quote Author',
			// Field ID, i.e. the meta key
			'id'	=> "quote_author",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'text',
			// Default value (optional)
			'std'		=> ''
		),
		array (
			// Field name - Will be used as label
			'name'		=> 'Quote Author Link',
			// Field ID, i.e. the meta key
			'id'	=> "quote_author_link",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'text',
			// Default value (optional)
			'std'		=> ''
		),					
		array (
			// Field name - Will be used as label
			'name'		=> 'Gallery Post Format Images',
			// Field ID, i.e. the meta key
			'id'	=> "gal_post_format",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'thickbox_image',
			// Default value (optional)
			'max_file_uploads' => 10,
		),
		array (
			// Field name - Will be used as label
			'name'		=> 'Link Post Format Url',
			// Field ID, i.e. the meta key
			'id'	=> "link_url",
			// Field description (optional)
			'desc'		=> '',	
			'type'		=> 'text',
		),						


	)
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box
	'id' => 'post_background',

	// Meta box title - Will appear at the drag and drop handle bar
	'title' => 'Post Title Background Options',

	// Post types, accept custom post types as well - DEFAULT is array('post'); (optional)
	'pages' => array( 'post','portfolio' ),

	// Where the meta box appear: normal (default), advanced, side; optional
	'context' => 'normal',

	// Order of meta box: high (default), low; optional
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array (
			// Field name - Will be used as label
			'name'		=> 'Background Image',
			// Field ID, i.e. the meta key
			'id'	=> "post_bg_image",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'thickbox_image',
			// Default value (optional)
			'max_file_uploads' => 1,
		),			
		array (
			// Field name - Will be used as label
			'name'		=> 'Background Color',
			// Field ID, i.e. the meta key
			'id'	=> "post_bg_color",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'color',
			// Default value (optional)
			'std'		=> '#000000'
		),
		array (
			// Field name - Will be used as label
			'name'		=> 'Background Repeat',
			// Field ID, i.e. the meta key
			'id'	=> "post_bg_repeat",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'select',
			// Default value (optional)
			'options' => array('repeat'=>'Repeat Horizontally and Vertically','repeat-x'=>'Repeat Horizontally','repeat-y'=>'Repeat Vertically','no-repeat'=>'No Repeat'),
			'std'=>''
			
		),	
		array (
			// Field name - Will be used as label
			'name'		=> 'Background Attachment',
			// Field ID, i.e. the meta key
			'id'	=> "post_bg_attachment",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'select',
			// Default value (optional)
			'options' => array('fixed'=>'fixed','scroll'=>'scroll')
			
		),
		array (
			// Field name - Will be used as label
			'name'		=> 'Background Position',
			// Field ID, i.e. the meta key
			'id'	=> "post_bg_position",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'select',
			// Default value (optional)
			'options'=> array('left top'=>'left top','left center'=>'left center','left bottom'=>'left bottom','right top'=>'right top','right center'=>'right center','right bottom'=>'right bottom','center top'=>'center top','center center'=>'center center','center bottom'=>'center bottom')
			
		),		
		array (
			// Field name - Will be used as label
			'name'		=> 'Parallax Title Area',
			// Field ID, i.e. the meta key
			'id'	=> "post_title_parallax",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'checkbox',
			// Default value (optional)
			'std' => 'yes'
		
		),
		array (
			// Field name - Will be used as label
			'name'		=> 'Top and Bottom Margin of Title Area (px)',
			// Field ID, i.e. the meta key
			'id'	=> "post_title_padding",
			// Field description (optional)
			'desc'		=> '',
			
			'type'		=> 'text',
			// Default value (optional)
			'std' => '250'
		
		)					
			


	)
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box
	'id' => 'portfolio',

	// Meta box title - Will appear at the drag and drop handle bar
	'title' => 'Portfolio Post Type',

	// Post types, accept custom post types as well - DEFAULT is array('post'); (optional)
	'pages' => array( 'portfolio' ),

	// Where the meta box appear: normal (default), advanced, side; optional
	'context' => 'normal',

	// Order of meta box: high (default), low; optional
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		array(
			// Field name - Will be used as label
			'name'		=> __('Thumbnail Link Options','bravo'),
			// Field ID, i.e. the meta key
			'id'	=> "{$prefix}portfolio_thumb_link_options",
			// Field description (optional)
			'desc'		=> '',
			// Field description (optional)
			'type' => 'radio',
			'options'	=> array(
				'single_page'			=> 'Link to Single Page',
				'lightbox'			=> 'Open Gallery Images in Lightbox',
				'external_link' => 'Link to External / Custom Url',
			),
			'std'  => 'single_page'
		),	
		array(
			// Field name - Will be used as label
			'name'		=> 'Enter website URL',
			// Field ID, i.e. the meta key
			'id'	=> "{$prefix}portfolio_external_link",
			// Field description (optional)
			'desc'		=> 'URL',
			// Field description (optional)
			'type'		=> 'text'
		)
	)
);

/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function bravo_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'bravo_register_meta_boxes' );